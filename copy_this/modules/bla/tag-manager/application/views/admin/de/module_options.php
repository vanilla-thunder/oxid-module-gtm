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

$style = '<style type="text/css">
.groupExp a.rc b {font-size:medium;color:#ff3600;}
.groupExp dt input.txt {width:430px !important}
.groupExp dt .select {width:437px !important;}
.groupExp dt textarea.txtfield {width:430px height: 150px;}
.groupExp dl { display:block !important;}
input.confinput {position:fixed;top:20px;right:70px;background:#008B2D;padding:10px 25px;color:white;border:1px solid black;cursor:pointer;font-size:125%;}
input.confinput:hover {outline:3px solid #ff3600;}
</style>';
$aLang = [
	'charset'                                    => 'UTF-8',
	'SHOP_MODULE_GROUP_bla_tm_Main'              => $style . 'Einstellungen',
	'SHOP_MODULE_bla_gtm_id'                     => 'Google Tag Manager ID',
	'SHOP_MODULE_bla_tm_productlistcategories'   => 'Handhabung der Kategorien in Produktlisten Performance in Google Analytics',
	'SHOP_MODULE_bla_tm_productlistcategories_0' => 'Kategorien von Product Lists Performance ausschließen',
	'SHOP_MODULE_bla_tm_productlistcategories_1' => 'Alle Kategorien unter dem Namen "Kategorien" zusammenfassen',
	'SHOP_MODULE_bla_tm_productlistcategories_2' => 'Kategorien einzeln erfassen',
	'SHOP_MODULE_bla_mtm_id'                     => 'Matomo Container URL <small>( https://piwik.tld/js/container_ASFG123.js )</small>',
	'SHOP_MODULE_bla_ym_id'                      => 'Yandex Metrica ID',
	'SHOP_MODULE_bla_tm_defaultref'              => 'default REF',
	'SHOP_MODULE_bla_tm_shopgateref'             => 'shopgate orders REF'
];
