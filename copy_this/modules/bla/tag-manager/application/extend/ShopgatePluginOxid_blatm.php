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

class ShopgatePluginOxid_blatm extends ShopgatePluginOxid_blatm_parent
{

    // das hat für andere Shopbetreiber eigentlich keinen Zweck, es ist nur für Shopgate Apps
    public function addOrder(ShopgateOrder $order)
    {
        oxRegistry::getSession()->setVariable("shopgateorder","jaaaaaa");
        return parent::addOrder($order);
    }
    /*
    protected function loadOrderAdditionalInfo(oxOrder &$oxOrder)
    {
        $oxOrder->oxorder__blamediacode = new oxField(oxRegistry::getConfig()->getConfigParam("bla-mediacode_shopgatemediacode"));
        parent::loadOrderAdditionalInfo($oxOrder);
    }
    */
}