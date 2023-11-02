<?php

use D3\GoogleAnalytics4\Modules\Application\Component\d3GtmBasketComponentExtension;
use D3\GoogleAnalytics4\Modules\Application\Controller\ArticleListController_AddToCartHelpMethods;
use D3\GoogleAnalytics4\Modules\Application\Controller\BasketController;
use D3\GoogleAnalytics4\Modules\Application\Controller\ThankYouController;
use D3\GoogleAnalytics4\Modules\Application\Model\Basket as Basket;
use D3\GoogleAnalytics4\Modules\Application\Model\Category as Category;
use D3\GoogleAnalytics4\Modules\Application\Model\Manufacturer as Manufacturer;
use D3\GoogleAnalytics4\Modules\Core\ViewConfig;
use OxidEsales\Eshop\Application\Component\BasketComponent as OEBasketComponent;
use OxidEsales\Eshop\Application\Controller\ArticleListController as OEArticleListController;
use OxidEsales\Eshop\Application\Controller\BasketController as OEBasketController;
use OxidEsales\Eshop\Application\Controller\ThankYouController as OEThankYouController;
use OxidEsales\Eshop\Application\Model\Basket as OEBasket;
use OxidEsales\Eshop\Application\Model\Category as OECategory;
use OxidEsales\Eshop\Application\Model\Manufacturer as OEManufacturer;
use OxidEsales\Eshop\Core\ViewConfig as OEViewConfig;

$sMetadataVersion = '2.1';
$aModule          = [
    'id'          => 'd3googleanalytics4',
    'title'       => 'Google Analytics 4',
    'description' => "Dieses Modul bietet die Möglichkeit in Ihrem OXID eShop (6.x) die neue 'Property' 
                      Google Analytics 4 (GA4) von Google zu integrieren.<br>
                      Hierfür stehen Ihnen verschiedene 'templates' zur verfügung, 
                      mit denen Sie bestimmte Events tracken können.<br>
                      Beispiele dafür sind: view_item, add_to_basket, purchase, ...<br><br>
                      Die Integration und Verbindung zu Google wird mithilfe des gtag (Google Tag Manager) realisiert.<br><br>
                      Weiterführende Informationen: https://developers.google.com/analytics/devguides/collection/ga4<br>
                      <hr>
                      Die Entwicklung basiert auf einem Fork von Marat Bedoev - <a href='https://github.com/vanilla-thunder/oxid-module-gtm'>Github-Link</a>
                      ",
    'thumbnail'   => 'thumbnail.png',
    'version'     => '1.13.0',
    'author'      => 'Data Development (Inh.: Thomas Dartsch)',
    'email'       => 'support@shopmodule.com',
    'url'         => 'https://www.oxidmodule.com/',
    'extend'      => [
        OEViewConfig::class => ViewConfig::class,
        OECategory::class => Category::class,
        OEBasket::class => Basket::class,
        OEBasketController::class => BasketController::class,
        OEManufacturer::class => Manufacturer::class,
        OEThankYouController::class => ThankYouController::class,
        OEArticleListController::class => ArticleListController_AddToCartHelpMethods::class,
        OEBasketComponent::class => d3GtmBasketComponentExtension::class
    ],
    'templates'   => [],
    'blocks'      => [
        // tag manager js
        [
            'template' => 'layout/base.tpl',
            'block'    => 'head_meta_robots',
            'file'     => '/Application/views/blocks/_gtm_js.tpl',
            'position' => 150
        ],
        // tag manager nojs
        [
            'template' => 'layout/base.tpl',
            'block'    => 'theme_svg_icons',
            'file'     => '/Application/views/blocks/_gtm_nojs.tpl'
        ],
        // details
        [
            'template' => 'page/details/inc/productmain.tpl',
            'block'    => 'details_productmain_title',
            'file'     => '/Application/views/blocks/view_item.tpl',
            'position' => 150
        ],
        // checkout
        [
            'template' => 'page/checkout/basket.tpl',
            'block'    => 'checkout_basket_main',
            'file'     => '/Application/views/blocks/view_cart.tpl'
        ],
        [
            'template' => 'page/checkout/thankyou.tpl',
            'block'    => 'checkout_thankyou_main',
            'file'     => '/Application/views/blocks/purchase.tpl'
        ],
        // Lists
        // view_item_list
        [
            'template' => 'page/list/list.tpl',
            'block'    => 'page_list_productlist',
            'file'     => '/Application/views/ga4/view_item_list.tpl',
            'position' => 150
        ],
        // view_search_result
        [
            'template' => 'page/search/search.tpl',
            'block'    => 'search_results',
            'file'     => '/Application/views/ga4/view_search_result.tpl',
            'position' => 150
        ],
        // add_to_cart
        [
            'template' => 'page/details/inc/productmain.tpl',
            'block'    => 'details_productmain_tobasket',
            'file'     => '/Application/views/ga4/add_to_cart.tpl',
            'position' => 150
        ],
        [
            'template' => 'page/list/list.tpl',
            'block'    => 'page_list_listbody',
            'file'     => '/Application/views/ga4/add_to_cart_listtpl.tpl',
            'position' => 150
        ],
        // remove_from_cart
        [
            'template' => 'page/checkout/basket.tpl',
            'block'    => 'checkout_basket_main',
            'file'     => '/Application/views/ga4/remove_from_cart.tpl',
            'position' => 150
        ]
    ],
    'settings'    => [
        [
            'group'    => 'd3_gtm_settings',
            'name'     => 'd3_gtm_sContainerID',
            'type'     => 'str',
            'value'    => 'GTM-',
            'position' => 0
        ],
        [
            'group'    => 'd3_gtm_settings',
            'name'     => 'd3_gtm_blGA4enab',
            'type'     => 'bool',
            'value'    => true,
            'position' => 1
        ],
        [
            'group'    => 'd3_gtm_settings',
            'name'     => 'd3_gtm_blEnableDebug',
            'type'     => 'bool',
            'value'    => false,
            'position' => 999
        ],
        [
            'group'    => 'd3_gtm_settings_cookiemanager',
            'name'     => 'd3_gtm_settings_hasOwnCookieManager',
            'type'     => 'bool',
            'value'    => false,
            'position' => 999
        ],
        [
            'group'    => 'd3_gtm_settings_cookiemanager',
            'name'     => 'd3_gtm_settings_controlParameter',
            'type'     => 'str',
            'value'    => '',
            'position' => 999
        ],
        [
            'group' => 'd3_gtm_settings_cookiemanager',
            'name' => 'd3_gtm_settings_HAS_STD_MANAGER',
            'type' => 'select',
            'value' => 'none',
            'constraints' => 'NONE|CONSENTMANAGER|USERCENTRICS|COOKIEFIRST|COOKIEBOT',
        ],
    ]
];