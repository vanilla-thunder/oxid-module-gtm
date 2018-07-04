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

class oxorder_blatm extends oxorder_blatm_parent
{

    protected function _setUser ($oUser)
    {
        parent::_setUser($oUser);

        $cfg = oxRegistry::getConfig();
        $oxSession = oxRegistry::getSession();

        $aRefs = $oxSession->getVariable('bla_refs');

        $this->assign(['oxorder__blahttpref' =>  $aRefs['http']]);

        if ($oxSession->getVariable('shopgateorder')) {
            $this->assign(['oxorder__blaref' => $cfg->getConfigParam("bla_tm_shopgateref")]);
            $oxSession->deleteVariable('shopgateorder');
        }
        else $this->assign(['oxorder__blaref' =>  ($aRefs['ref'] ? $aRefs['ref'] : $cfg->getConfigParam('bla_tm_defaultref'))]);

        $this->assign(['oxorder__blasubref' =>  $aRefs['subref']]);
    }
}
