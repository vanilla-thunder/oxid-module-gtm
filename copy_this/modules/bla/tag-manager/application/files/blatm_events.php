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

class blatm_events extends oxI18n
{
    public static function onActivate()
    {
        /** @var oxLegacyDb $oDb */
        $oDb = oxDb::getDB();
        $aColumns = $oDb->getAssoc("SHOW COLUMNS FROM oxorder");

        // rename BLAREFERRER column -> BLAHTTPREF or create new
        if( array_key_exists( "BLAREFERRER", $aColumns )) $oDb->Execute("ALTER TABLE `oxorder` CHANGE `BLAREFERRER` `BLAHTTPREF` TEXT NOT NULL COMMENT 'bla/tag-manager http ref'");
        else if(!array_key_exists( "BLAHTTPREF", $aColumns )) $oDb->Execute("ALTER TABLE `oxorder` ADD `BLAHTTPREF` TEXT NOT NULL COMMENT 'bla/tag-manager http ref'");

        // rename BLAMEDIACODE column -> BLAREF or create new
        if( array_key_exists( "BLAMEDIACODE", $aColumns )) $oDb->Execute("ALTER TABLE `oxorder` CHANGE `BLAMEDIACODE` `BLAREF` VARCHAR( 64 ) NOT NULL COMMENT 'bla/tag-manager ref'");
        else if(!array_key_exists( "BLAREF",     $aColumns )) $oDb->Execute("ALTER TABLE `oxorder` ADD `BLAREF` VARCHAR( 64 ) NOT NULL COMMENT 'bla/tag-manager ref'");

        // rename BLASUBCODE column -> BLASUBREF or create new
        if( array_key_exists( "BLASUBCODE", $aColumns )) $oDb->Execute("ALTER TABLE `oxorder` CHANGE `BLASUBCODE` `BLASUBREF` VARCHAR( 64 ) NOT NULL COMMENT 'bla/tag-manager subref'");
        else if(!array_key_exists( "BLASUBREF",  $aColumns )) $oDb->Execute("ALTER TABLE `oxorder` ADD `BLASUBREF` VARCHAR( 64 ) NOT NULL COMMENT 'bla/tag-manager subref'");

        // regenerating DB views
        $oMetaData = oxNew('oxDbMetaDataHandler');
        $oMetaData->updateViews();

        //clear tmp
        foreach (glob(oxRegistry::getConfig()->getConfigParam("sCompileDir") . "smarty/*") as $item) if (!is_dir($item)) unlink($item);
    }

    /*
        public static function onDeactivate() {
        }
    */
}