<?php
/**
 * vanilla-thunder/oxid-module-gtm
 * Google Tag Manager Integration for OXID eShop v6.2+
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 **/

$sMetadataVersion = '2.1';
$aModule          = [
    'id'          => 'vt-gtm',
    'title'       => '[vt] Google Tag Manager',
    'description' => 'Google Tag Manager Integration for OXID eShop v6.2+',
    'thumbnail'   => 'thumbnail.png',
    'version'     => '0.5.0 ( 2021-07-17 )',
    'author'      => 'Marat Bedoev',
    'email'       => openssl_decrypt("Az6pE7kPbtnTzjHlPhPCa4ktJLphZ/w9gKgo5vA//p4=", str_rot13("nrf-128-pop"), str_rot13("gvalzpr")),
    'url'         => 'https://github.com/vanilla-thunder/oxid-module-gtm',
    'extend'      => [
        \OxidEsales\Eshop\Core\ViewConfig::class => VanillaThunder\GoogleTagManager\Application\Extend\ViewConfig::class
    ],
    'templates'   => [
        // GA4 events
        'ga4_add_payment_info.tpl' => 'vt/GoogleTagManager/Application/views/ga4/add_payment_info.tpl',
        'add_shipping_info.tpl'    => 'vt/GoogleTagManager/Application/views/ga4/add_shipping_info.tpl',
        'ga4_add_to_cart.tpl'      => 'vt/GoogleTagManager/Application/views/ga4/add_to_cart.tpl',
        'ga4_begin_checkout.tpl'   => 'vt/GoogleTagManager/Application/views/ga4/begin_checkout.tpl',
        'ga4_generate_lead.tpl'    => 'vt/GoogleTagManager/Application/views/ga4/generate_lead.tpl',
        'ga4_login.tpl'            => 'vt/GoogleTagManager/Application/views/ga4/login.tpl',
        'ga4_purchase.tpl'         => 'vt/GoogleTagManager/Application/views/ga4/purchase.tpl',
        'ga4_remove_from_cart.tpl' => 'vt/GoogleTagManager/Application/views/ga4/remove_from_cart.tpl',
        'ga4_search.tpl'           => 'vt/GoogleTagManager/Application/views/ga4/search.tpl',
        'ga4_select_content.tpl'   => 'vt/GoogleTagManager/Application/views/ga4/select_content.tpl',
        'ga4_select_item.tpl'      => 'vt/GoogleTagManager/Application/views/ga4/select_item.tpl',
        'ga4_select_promotion.tpl' => 'vt/GoogleTagManager/Application/views/ga4/select_promotion.tpl',
        'ga4_sign_up.tpl'          => 'vt/GoogleTagManager/Application/views/ga4/sign_up.tpl',
        'ga4_view_cart.tpl'        => 'vt/GoogleTagManager/Application/views/ga4/view_cart.tpl',
        'ga4_view_item.tpl'        => 'vt/GoogleTagManager/Application/views/ga4/view_item.tpl',
        'ga4_view_item_list.tpl'   => 'vt/GoogleTagManager/Application/views/ga4/view_item_list.tpl',
        'ga4_view_promotion.tpl'   => 'vt/GoogleTagManager/Application/views/ga4/view_promotion.tpl',
        /*
        'gtm_ua_impression' => 'vt/GoogleTagManager/Application/views/ua/impression.tpl'
        'gtm_view_promotion.tpl'   => 'vt/GoogleTagManager/Application/views/view_promotion.tpl',
        'gtm_select_promotion.tpl' => 'vt/GoogleTagManager/Application/views/select_promotion.tpl',
        'gtm_begin_checkout.tpl'   => 'vt/GoogleTagManager/Application/views/begin_checkout.tpl',
        */
    ],
    'blocks'      => [
        // tag manager js
        [
            'template' => 'layout/base.tpl',
            'block'    => 'head_meta_robots',
            'file'     => '/Application/views/blocks/_gtm_js.tpl'
        ],
        // tag manager nojs
        [
            'template' => 'layout/base.tpl',
            'block'    => 'theme_svg_icons',
            'file'     => '/Application/views/blocks/_gtm_nojs.tpl'
        ],
        // add to cart
        [
            'template' => 'layout/header.tpl',
            'block'    => 'header_main',
            'file'     => '/Application/views/blocks/add_to_cart.tpl'
        ],
        // widget_product_list
        [
            'template' => 'widget/product/list.tpl',
            'block'    => 'widget_product_list',
            'file'     => '/Application/views/blocks/widget_product_list.tpl'
        ],
        // details
        [
            'template' => 'page/details/inc/productmain.tpl',
            'block'    => 'details_productmain_title',
            'file'     => '/Application/views/blocks/detail.tpl'
        ],
        // checkout
        [
            'template' => 'page/checkout/basket.tpl',
            'block'    => 'checkout_basket_main',
            'file'     => '/Application/views/blocks/checkout_s1.tpl'
        ],
        [
            'template' => 'form/user_checkout_change.tpl',
            'block'    => 'user_checkout_change',
            'file'     => '/Application/views/blocks/checkout_s2.tpl'
        ],
        [
            'template' => 'form/user_checkout_register.tpl',
            'block'    => 'user_checkout_register',
            'file'     => '/Application/views/blocks/checkout_s2.tpl'
        ],
        [
            'template' => 'form/user_checkout_noregister.tpl',
            'block'    => 'user_checkout_noregister',
            'file'     => '/Application/views/blocks/checkout_s2.tpl'
        ],
        [
            'template' => 'page/checkout/payment.tpl',
            'block'    => 'checkout_payment_main',
            'file'     => '/Application/views/blocks/checkout_s3.tpl'
        ],
        [
            'template' => 'page/checkout/order.tpl',
            'block'    => 'checkout_order_main',
            'file'     => '/Application/views/blocks/checkout_s4.tpl'
        ],
        [
            'template' => 'page/checkout/thankyou.tpl',
            'block'    => 'checkout_thankyou_main',
            'file'     => '/Application/views/blocks/checkout_s5.tpl'
        ],
        // Lists
        // view_item_list
        [
            'template' => 'widget/product/list.tpl',
            'block'    => 'd3Ga4_view_item_list',
            'file'     => '/Application/views/ga4/view_item_list.tpl'
        ],
        // view_search_result
        [
            'template' => 'page/search/search.tpl',
            'block'    => 'search_results',
            'file'     => '/Application/views/ga4/search.tpl'
        ],
        // add_to_cart
        [
            'template' => 'page/details/inc/productmain.tpl',
            'block'    => 'details_productmain_tobasket',
            'file'     => '/Application/views/ga4/add_to_cart.tpl'
        ]
    ],
    'settings'    => [
        [
            'group'    => 'vt_gtm_settings',
            'name'     => 'vt_gtm_sContainerID',
            'type'     => 'str',
            'value'    => 'GTM-',
            'position' => 0
        ],
        [
            'group'    => 'vt_gtm_settings',
            'name'     => 'vt_gtm_blGA4enab',
            'type'     => 'bool',
            'value'    => true,
            'position' => 1
        ],
        [
            'group'    => 'vt_gtm_settings',
            'name'     => 'vt_gtm_blUAenabled',
            'type'     => 'bool',
            'value'    => true,
            'position' => 2
        ],
        /*[
            I have no idea what this is
            'group'    => 'vt_gtm_settings',
            'name'     => 'vt_gtm_sMpapisecret',
            'type'     => 'str',
            'value'    => '',
            'position' => 3
        ],*/
        [
            'group'    => 'vt_gtm_settings',
            'name'     => 'vt_gtm_aPromotionlistIDs',
            'type'     => 'arr',
            'value'    => [],
            'position' => 4
        ],
        [
            'group'    => 'vt_gtm_settings',
            'name'     => 'vt_gtm_blEnableDebug',
            'type'     => 'bool',
            'value'    => false,
            'position' => 999
        ]

    ]
];