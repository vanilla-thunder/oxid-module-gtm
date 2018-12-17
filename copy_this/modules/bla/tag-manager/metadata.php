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

$sMetadataVersion = '1.1';
$aModule = [
	'id'          => 'tag-manager',
	'title'       => '<strong style="color:#95b900;font-size:125%;">best</strong><strong style="color:#c4ca77;font-size:125%;">life</strong> <strong>Tag Manager</strong>',
	'description' => 'Tag Manager integration for OXID eShop: Google, Matomo and Yandex',
	'thumbnail'   => '../bestlife.png',
	'version'     => '0.2.0 ( 2018-12-04 )',
	'author'      => 'Marat Bedoev, bestlife AG',
	'email'       => 'oxid@bestlife.ag',
	'url'         => 'https://github.com/vanilla-thunder/oxid-module-tag-manager',
	'extend'      => [
		// ecommerce tracking
		'oxviewconfig'       => 'bla/tag-manager/application/extend/oxviewconf_blatm'
	],
	'files'       => [
		'blatm_events' => 'bla/tag-manager/application/files/blatm_events.php',
	],
	'events' => [
		'onActivate' => 'blatm_events::onActivate'
	],
	'templates'   => [],
	'blocks'      => [
		// tag manager js
		[
			'template' => 'layout/base.tpl',
			'block'    => 'head_meta_robots',
			'file'     => '/application/views/blocks/base_head_meta_robots.tpl'
		],
		// tag manager nojs
		[
			'template' => 'layout/base.tpl',
			'block'    => 'theme_svg_icons',
			'file'     => '/application/views/blocks/theme_svg_icons.tpl'
		],
		// detail + click + add to basket
		[
		  'template' => 'page/details/inc/productmain.tpl',
		  'block'    => 'details_productmain_title',
		  'file'     => '/application/views/blocks/ee/detail.tpl'
		],
		// impression
		[
			'template' => 'widget/product/listitem_grid.tpl',
			'block'    => 'widget_product_listitem_grid_tobasket',
			'file'     => '/application/views/blocks/ee/impression.tpl'
		],
		[
			'template' => 'widget/product/listitem_infogrid.tpl',
			'block'    => 'widget_product_listitem_infogrid_tobasket',
			'file'     => '/application/views/blocks/ee/impression.tpl'
		],
		[
			'template' => 'widget/product/listitem_line.tpl',
			'block'    => 'widget_product_listitem_line_tobasket',
			'file'     => '/application/views/blocks/ee/impression.tpl'
		],
		[
			'template' => 'widget/product/boxproduct.tpl',
			'block'    => 'widget_product_boxproduct_price',
			'file'     => '/application/views/blocks/ee/impression.tpl'
		],
		// checkout
		[
			'template' => 'page/checkout/basket.tpl',
			'block'    => 'checkout_basket_main',
			'file'     => '/application/views/blocks/ee/s1_cart.tpl'
		],
		[
			'template' => 'form/user_checkout_change.tpl',
			'block'    => 'user_checkout_change',
			'file'     => '/application/views/blocks/ee/s2_user.tpl'
		],
		[
			'template' => 'form/user_checkout_register.tpl',
			'block'    => 'user_checkout_register',
			'file'     => '/application/views/blocks/ee/s2_user.tpl'
		],
		[
			'template' => 'form/user_checkout_noregister.tpl',
			'block'    => 'user_checkout_noregister',
			'file'     => '/application/views/blocks/ee/s2_user.tpl'
		],
		[
			'template' => 'page/checkout/payment.tpl',
			'block'    => 'checkout_payment_main',
			'file'     => '/application/views/blocks/ee/s3_payment.tpl'
		],
		[
			'template' => 'page/checkout/order.tpl',
			'block'    => 'checkout_order_main',
			'file'     => '/application/views/blocks/ee/s4_order.tpl'
		],
		[
			'template' => 'page/checkout/thankyou.tpl',
			'block'    => 'checkout_thankyou_main',
			'file'     => '/application/views/blocks/ee/s5_thankyou.tpl'
		]
	],
	'settings'    => [
		[
			'group' => 'bla_tm_Main',
			'name'  => 'bla_gtm_id',
			'type'  => 'str',
			'value' => ''
		],
		[
			'group' => 'bla_tm_Main',
			'name'  => 'bla_tm_productlistcategories',
			'type'  => 'select',
			'value' => '0',
			'constraints' => '0|1|2'
		],
		[
			'group' => 'bla_tm_Main',
			'name'  => 'bla_mtm_id',
			'type'  => 'str',
			'value' => ''
		],
		[
			'group' => 'bla_tm_Main',
			'name'  => 'bla_ym_id',
			'type'  => 'str',
			'value' => ''
		],
	],
];

/* todo:
        modified:   application/translations/de/blagtm_lang.php
        modified:   application/views/blocks/base_head_meta_robots.tpl
        modified:   application/views/blocks/ee/impression.tpl
        modified:   application/views/blocks/ee/s5_thankyou.tpl
        modified:   application/views/blocks/theme_svg_icons.tpl
*/
