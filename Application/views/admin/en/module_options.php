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

$style = '<style type="text/css">
.groupExp a.rc b {font-size:medium;color:#ff3600;}
.groupExp dt .txt,
.groupExp dt .select,
 .groupExp dt .txtfield {width:250px !important; margin: 2px !important; padding: 1px 4px !important; border: 1px solid #ccc !important; }
.groupExp dt textarea.txtfield { min-height: 125px;}
.groupExp dl { display:block !important;}
input.confinput {position:fixed;top:20px;right:70px;background:#008B2D;padding:10px 25px;color:white;border:1px solid black;cursor:pointer;font-size:125%;}
input.confinput:hover {outline:3px solid #ff3600;}
</style>';

$aLang = [
    'charset'                             => 'UTF-8',

    'SHOP_MODULE_GROUP_vt_gtm_settings'   => $style . 'Settings',
    'SHOP_MODULE_vt_gtm_sContainerID'      => 'Container ID',
    'SHOP_MODULE_vt_gtm_aPromotionlistIDs' => 'Promotion Product List IDs <div>Learn more about this settings: <b><u><a href="https://github.com/vanilla-thunder/oxid-module-gtm/wiki/Promotion-Produktlisten" target="_blank">Module Wiki</a></u></b></div>',
    'SHOP_MODULE_vt_gtm_blGA4enabled' => 'Enable Google Analytics 4',
    'SHOP_MODULE_vt_gtm_blUAenabled' => 'Enable Universal Analytics (Dreprecated)',
    'SHOP_MODULE_vt_gtm_sMpapisecret' => 'MP API Secret',
    'SHOP_MODULE_vt_gtm_blEnableDebug' => 'Enable Debug Mode',
];
