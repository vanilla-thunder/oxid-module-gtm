<?php

namespace D3\GoogleAnalytics4\Application\Model;

use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\ViewConfig;

class ManagerHandler
{
    /**
     * @param string $sParam
     * @return void
     */
    public function d3SaveShopConfVar(string $sParam){
        Registry::getConfig()->saveShopConfVar(
            'select',
            Constants::OXID_MODULE_ID."_HAS_STD_MANAGER",
            $sParam,
            Registry::getConfig()->getShopId(),
            Constants::OXID_MODULE_ID
        );
    }

    /**
     * @return string
     */
    public function getActManager() :string
    {
		return Registry::get(ViewConfig::class)->d3GetModuleConfigParam('_HAS_STD_MANAGER')?:"";
    }
}