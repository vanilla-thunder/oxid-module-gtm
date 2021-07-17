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

class ViewConfig extends ViewConfig_parent
{

    // Google Tag Manager Container ID
    private $sContainerId = null;
    public function getGtmContainerId()
    {
        if ( $this->sContainerId === null ) {
            $this->sContainerId = ContainerFactory::getInstance()
                ->getContainer()
                ->get(ModuleSettingBridgeInterface::class)
                ->get('vt_gtm_containerid', 'vt-gtm');
        }
        return $this->sContainerId;
    }



    public function getGtmDataLayer()
    {
    	if( !$this->getGtmContainerId() ) return "[]";

        $oConfig = Registry::getConfig();
        $oView = $oConfig->getTopActiveView(); /** @var FrontendController $oShop */
        //$oShop = oxRegistry::getConfig()->getActiveShop(); /** @var oxShop $oShop */
        $oUser = $oConfig->getUser();

        $dataLayer = [
            'page_title' => $oView->getTitle(),
            'controller' => $this->getTopActionClassName(),
            'user' => ( $oUser ? "true" : "false" )
        ];

        return json_encode([$dataLayer],JSON_PRETTY_PRINT);

        unset($dataLayer["user"]["http"]); // das brauchen wir hier nicht

        $cl = $this->getActiveClassName();
        if( $cl === "content" ) $dataLayer["page"]["type"] = "cms";
        elseif( $cl === "details" ) $dataLayer["page"]["type"] = "product";
        elseif( in_array($cl,["alist","search"]) ) $dataLayer["page"]["type"] = "listing";
        elseif( in_array($cl,["basket","user","payment","order","thankyou"]) ) $dataLayer["page"]["type"] = "checkout";


        return json_encode([$dataLayer],JSON_PRETTY_PRINT);
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

    public function isPromotionList($listId)
    {
        $oConfig = Registry::getConfig();
        $aPromotionListIds = $oConfig->getConfigParam("") ?? [ 'bargainItems', 'newItems', 'topBox', 'alsoBought', 'accessories', 'cross' ];


    }
}