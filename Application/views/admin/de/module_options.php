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
    'charset'                               => 'UTF-8',
    'SHOP_MODULE_d3_gtm_sContainerID'      => 'Container ID',
    'SHOP_MODULE_GROUP_d3_gtm_settings'     => 'Einstellungen',
    'SHOP_MODULE_d3_gtm_blGA4enab'          => 'GA4 Aktivieren',
    'SHOP_MODULE_d3_gtm_blUAenabled'        => 'UA Aktivieren',
    'SHOP_MODULE_d3_gtm_blEnableDebug'      => 'Debug-Modus aktivieren',

    // for cookie manager settings
    'SHOP_MODULE_GROUP_d3_gtm_settings_cookiemanager'   => 'Cookie Manager Einstellungen',
    'SHOP_MODULE_d3_gtm_settings_hasOwnCookieManager'   => 'Cookie Manager nutzen?',
    'SHOP_MODULE_d3_gtm_settings_HAS_CONSENTMANAGER'      => 'Nutzen Sie die Consentmanager-Einbindung?',
    'SHOP_MODULE_d3_gtm_settings_HAS_CONSENTMANAGER_NO'   => 'Nein',
    'SHOP_MODULE_d3_gtm_settings_HAS_CONSENTMANAGER_YES'  => 'Ja',
    'SHOP_MODULE_d3_gtm_settings_cookieName'  => 'CookieID',
];
