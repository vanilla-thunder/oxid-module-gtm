<?php

/*
 * vanilla-thunder/oxid-module-gtm
 * Google Tag Manager Integration for OXID eShop v6.2+
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 *  without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */

namespace VanillaThunder\GoogleTagManager\Application\Extend;

use OxidEsales\Eshop\Application\Controller\FrontendController;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Module\Configuration\Bridge\ModuleSettingBridgeInterface;
use VanillaThunder\GoogleTagManager\Application\Traits\GA4Trait;
use VanillaThunder\GoogleTagManager\Application\Traits\UATrait;

class ViewConfig extends ViewConfig_parent
{
    use UATrait;
    use GA4Trait;

    // Google Tag Manager Container ID
    private $sContainerId = null;

    public function getGtmContainerId()
    {
        if ($this->sContainerId === null)
        {
            $this->sContainerId = ContainerFactory::getInstance()
                                                  ->getContainer()
                                                  ->get(ModuleSettingBridgeInterface::class)
                                                  ->get('vt_gtm_sContainerID', 'vt-gtm');
        }
        return $this->sContainerId;
    }

    private $oConfig;
    private $oView;
    private $oShop;
    private $oUser;
    private $cl;

    public function getGtmDataLayer()
    {
        if (!$this->getGtmContainerId()) return "[]";

        $this->oConfig = Registry::getConfig();
        $this->oView   = $this->oConfig->getTopActiveView();
        /** @var FrontendController $oShop */
        //$this->oShop = oxRegistry::getConfig()->getActiveShop(); /** @var oxShop $oShop */
        $this->oUser = $this->oConfig->getUser();

        $this->cl         = $this->getTopActionClassName();

        $dataLayer = array_merge(
            $this->_getUABasicDatalayer(),
            $this->_getGA4BasicDatalayer()
        );

        unset($dataLayer["user"]["http"]); // das brauchen wir hier nicht

        return json_encode([$dataLayer], JSON_PRETTY_PRINT);
        /*
                // --- Produktdaten ---
                $transactionProducts = [];
                foreach($oOrder->getOrderArticles() as $_prod ) $transactionProducts[] = [
                    'name' => '', // (erforderlich)	Produktname	String
                    'sku' => '', // (erforderlich)	Produkt-SKU	String
                    'category' => '', // (optional)	Produktkategorie	String
                    'price' => '', // (erforderlich)	Preis pro Einheit	Numerischer Wert
                    'quantity' => '' // (erforderlich)	Anzahl der Artikel	Numerischer Wert
                ];

                // --- Transaktionsdaten ---

                $dataLayer['transactionId'] = $oOrder->oxorder__oxordernr->value; // (erforderlich)	Eindeutige Transaktionskennung	String
                $dataLayer['transactionAffiliation'] = $oShop->oxshops__oxname->value; // (optional)	Partner oder Geschäft	String
                $dataLayer['transactionTotal'] = $oOrder->oxorder__oxtotalordersum->value; // (erforderlich)	Gesamtwert der Transaktion	Numerischer Wert
                $dataLayer['transactionShipping'] = $oOrder->oxorder__oxdelcost->value; // (optional)	Versandkosten für die Transaktion	Numerischer Wert
                $dataLayer['transactionTax'] = ''; // (optional)	Steuerbetrag für die Transaktion	Numerischer Wert
                $dataLayer['transactionProducts'] = $transactionProducts; // (optional)	Liste der bei der Transaktion erworbenen Artikel	Array von Produktobjekten
        */
    }

    public function triggerGA4events()
    {
        // general events

    }

    public function isPromotionList($listId)
    {
        $oConfig           = Registry::getConfig();
        $aPromotionListIds = $oConfig->getConfigParam("") ?? ['bargainItems', 'newItems', 'topBox', 'alsoBought', 'accessories', 'cross'];
    }
}