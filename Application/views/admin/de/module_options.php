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
    'HELP_SHOP_MODULE_d3_gtm_settings_HAS_STD_MANAGER'              => 'Mehr Informationen zu den genannten Coookie-Manager finden Sie auf den folgenden Home-Pages<br><br>
                                                                        <a href="https://consentmanager.net/">Consentmanager</a><br>
                                                                        <a href="https://usercentrics.com/">Usercentrics</a><br>
                                                                        <a href="https://cookiefirst.com">Cookiefirst</a><br>
                                                                        <hr>
                                                                        Bei weiteren Fragen stehen wir gern zur Verfügung! Kontaktieren Sie uns einfach unter <a href="https://www.d3data.de/">https://www.d3data.de/</a>',
    'SHOP_MODULE_d3_gtm_settings_HAS_STD_MANAGER'                   => 'Nutzen Sie eine der folgenden Einbindungen?<br>
                                                                        Dann wählen Sie bitte die zutreffende aus.',
    'SHOP_MODULE_d3_gtm_settings_HAS_STD_MANAGER_NONE'              => '---',
    'SHOP_MODULE_d3_gtm_settings_HAS_STD_MANAGER_CONSENTMANAGER'    => 'consentmanager',
    'SHOP_MODULE_d3_gtm_settings_HAS_STD_MANAGER_USERCENTRICS'      => 'usercentrics',
    'SHOP_MODULE_d3_gtm_settings_HAS_STD_MANAGER_COOKIEFIRST'       => 'cookiefirst',
    'SHOP_MODULE_d3_gtm_settings_HAS_STD_MANAGER_COOKIEBOT'         => 'Cookiebot',
    'SHOP_MODULE_d3_gtm_settings_cookieName'        => 'Steuerungsparameter',
    'HELP_SHOP_MODULE_d3_gtm_settings_cookieName'   => 'Nähere infos zum <a target="_blank" href="https://git.d3data.de/D3Public/GoogleAnalytics4/src/branch/master/Docs">"<strong>Steuerungsparameter</strong>"</a><hr>
                                                        <strong>Beachte:</strong><br>
                                                        Sofern Sie die <a target="_blank" href="https://consentmanager.net" style="color: blue">consentmanager</a> CMP verwenden,
                                                        bitte ich Sie, gründlichst, die Hinweise der <a target="_blank" href="https://git.d3data.de/D3Public/GoogleAnalytics4/src/branch/master/Docs/CMP/consentmanager.md">Moduldokumentation/Consentmanager</a> zu lesen.
                                                        '
];
