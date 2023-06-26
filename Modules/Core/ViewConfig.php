<?php
/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * https://www.d3data.de
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <info@shopmodule.com>
 * @link      https://www.oxidmodule.com
 */

namespace D3\GoogleAnalytics4\Modules\Core;

use D3\GoogleAnalytics4\Application\Model\ManagerHandler;
use D3\GoogleAnalytics4\Application\Model\ManagerTypes;
use OxidEsales\Eshop\Application\Controller\FrontendController;
use OxidEsales\Eshop\Core\Config;
use OxidEsales\Eshop\Core\Registry;

class ViewConfig extends ViewConfig_parent
{

    // Google Tag Manager Container ID
    private $sContainerId = null;
    private $sCookieManagerType = null;

    public function getGtmContainerId()
    {
        if ($this->sContainerId === null)
        {
            $this->sContainerId = $this->getConfig()->getConfigParam('d3_gtm_sContainerID');
        }
        return $this->sContainerId;
    }

    /**
     * @return void
     */
    public function defineCookieManagerType() :void
    {
        if ($this->sCookieManagerType === null)
        {
            /** @var ManagerHandler $oManagerHandler */
            $oManagerHandler = oxNew(ManagerHandler::class);
            $this->sCookieManagerType = $oManagerHandler->getCurrManager();
        }
    }

    /**
     * @return bool
     */
    public function shallUseOwnCookieManager() :bool
    {
        return (bool) Registry::getConfig()->getConfigParam('d3_gtm_settings_hasOwnCookieManager');
    }

    /**
     * @return bool
     */
    public function D3blShowGtmScript()
    {
        /** @var Config $oConfig */
        $oConfig = Registry::getConfig();

        // No Cookie Manager in use
        if (!$this->shallUseOwnCookieManager()) {
            return true;
        }

        $this->defineCookieManagerType();

        $sCookieID = $oConfig->getConfigParam('d3_gtm_settings_cookieName');

        // Netensio Cookie Manager
        if ($this->sCookieManagerType === ManagerTypes::NET_COOKIE_MANAGER) {
            $oSession = Registry::getSession();
            $aCookies = $oSession->getVariable("aCookieSel");

            return (is_array($aCookies) && array_key_exists($sCookieID, $aCookies) && $aCookies[$sCookieID] == "1");
        }

        // Aggrosoft Cookie Consent
        if ($this->sCookieManagerType === ManagerTypes::AGCOOKIECOMPLIANCE) {
            if (method_exists($this, "isCookieCategoryEnabled")) {
                return $this->isCookieCategoryEnabled($sCookieID);
            }
        }

        // UserCentrics or consentmanager
        if (
            $this->sCookieManagerType       === ManagerTypes::USERCENTRICS_MODULE
            or $this->sCookieManagerType    === ManagerTypes::USERCENTRICS_MANUALLY
            or $this->sCookieManagerType    === ManagerTypes::CONSENTMANAGER
            or $this->sCookieManagerType    === ManagerTypes::EXTERNAL_SERVICE
        )
        {
            // Always needs the script-tags delivered to the DOM.
            return true;
        }

        // Cookie Manager not (yet) supported
        return false;
    }

    /**
     * Get additional attributes for script tags.
     * This is especially important for UserCentrics.
     * @return string
     */
    public function getGtmScriptAttributes() :string
    {
        $oConfig = Registry::getConfig();
        $sCookieId = $oConfig->getConfigParam('d3_gtm_settings_cookieName');

        if (false === $this->shallUseOwnCookieManager()){
            return "";
        }

        if (
            $this->sCookieManagerType === ManagerTypes::USERCENTRICS_MODULE
            or $this->sCookieManagerType === ManagerTypes::USERCENTRICS_MANUALLY
        )
        {
            if ($sCookieId) {
                return 'data-usercentrics="' . $sCookieId . '" type="text/plain" async=""';
            }
        }

        if ($this->sCookieManagerType === ManagerTypes::CONSENTMANAGER)
        {
            if ($sCookieId) {
                return 'async 
                        type="text/plain"
                        data-cmp-src="https://www.googletagmanager.com/gtm.js?id='.$this->getGtmContainerId().'"
                        class="cmplazyload"
                        data-cmp-vendor="s905"
                        ';
            }
        }

        return "";
    }

    private $blGA4enabled = null;

    public function isGA4enabled()
    {
        if ($this->blGA4enabled === null)
        {
            $this->sContainerId = $this->getConfig()->getConfigParam('d3_gtm_blEnableGA4');
        }

        return $this->blGA4enabled;
    }

    public function getGtmDataLayer()
    {
        if (!$this->getGtmContainerId()) return "[]";

        $oConfig = Registry::getConfig();
        $oView   = $oConfig->getTopActiveView();
        /** @var FrontendController $oShop */
        $oUser = $oConfig->getUser();

        $cl         = $this->getTopActiveClassName();
        $aPageTypes = [
            "content"  => "cms",
            "details"  => "product",
            "alist"    => "listing",
            "search"   => "listing",
            "basket"   => "checkout",
            "user"     => "checkout",
            "payment"  => "checkout",
            "order"    => "checkout",
            "thankyou" => "checkout",
            "start"    => "start",
        ];

        $dataLayer = [
            'page'      => [
                'type'  => $aPageTypes[$cl] ?? "unknown",
                'title' => $oView->getTitle(),
                'cl'    => $cl,
            ],
            'userid'    => ($oUser ? $oUser->getId() : false),
            'sessionid' => session_id() ?? false,
            //'httpref'   => $_SERVER["HTTP_REFERER"] ?? "unknown"
        ];

        return json_encode([$dataLayer], JSON_PRETTY_PRINT);
    }

    public function isPromotionList($listId)
    {
        $oConfig           = Registry::getConfig();
        $aPromotionListIds = $oConfig->getConfigParam("") ?? ['bargainItems', 'newItems', 'topBox', 'alsoBought', 'accessories', 'cross'];
    }
}