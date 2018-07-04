<?php

/**
 * [bla] tag-manager
 * Copyright (C) 2018  bestlife AG
 * info:  oxid@bestlife.ag
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 **/

class oxviewconf_blatm extends oxviewconf_blatm_parent
{

    // google tag manager stuff
    private $_sBlaGTMid = null;
    public function getGTMid()
    {
        if ( $this->_sBlaGTMid === null ) $this->_sBlaGTMid = oxRegistry::getConfig()->getConfigParam("bla_gtm_id");
        return $this->_sBlaGTMid;
    }
    
    private $_productlistcategories;
    public function getGTMproductListPerformanceSetting()
    {
        if ( $this->_productlistcategories === null ) $this->_productlistcategories = oxRegistry::getConfig()->getConfigParam("bla_tm_productlistcategories");
        return $this->_productlistcategories;
    }
    
    // matomo tag manager id
    private $_sBlaMTMid = null;
    public function getMTMid()
    {
        if ( $this->_sBlaMTMid === null ) $this->_sBlaMTMid = oxRegistry::getConfig()->getConfigParam("bla_mtm_id");
        return $this->_sBlaMTMid;
    }
    
    // yandex metrica id
    private $_sBlaYMid = null;
    public function getYMid()
    {
        if ( $this->_sBlaYMid === null ) $this->_sBlaYMid = oxRegistry::getConfig()->getConfigParam("bla_ym_id");
        return $this->_sBlaYMid;
    }

    private $_blTagmanagerEnabled = null;
    public function isTagmanagerEnabled()
	{
		if ( $this->_blTagmanagerEnabled === null ) $this->_blTagmanagerEnabled = (bool) $this->getGTMid() || $this->getMTMid() || $this->getYMid();
		return $this->_blTagmanagerEnabled;
	}

    public function getDataLayer()
    {
    	if( !$this->isTagmanagerEnabled() ) return false;

        $oConfig = oxRegistry::getConfig(); /** @var oxConfig $oConfig */
        $oView = $oConfig->getActiveView(); /** @var oxUbase $oShop */
        //$oShop = oxRegistry::getConfig()->getActiveShop(); /** @var oxShop $oShop */
        $oUser = $oConfig->getUser();

        $dataLayer = [
            'user' => array_merge(
                ['country' => ($oUser ? $oUser->getUserCountry() : 'unknown')],
                (oxRegistry::getSession()->getVariable("bla_refs") ? oxRegistry::getSession()->getVariable("bla_refs") : [])
            ),
            'page' => [
                "type" => "default",
                "class"=> $oView->getClassName(),
                "title" => (class_exists("matomo") ? oxRegistry::get("matomo")->getDocumentTitle($oView) : $oView->getTitle() )
            ]
        ];

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

}