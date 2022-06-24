<?php

namespace VanillaThunder\GoogleTagManager\Application\Traits;

use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Module\Configuration\Bridge\ModuleSettingBridgeInterface;

trait GA4Trait
{

    private $_blGA4enabled = null;

    public function isGA4enabled()
    {
        if ($this->_blGA4enabled === null)
        {
            $this->_blGA4enabled = ContainerFactory::getInstance()
                ->getContainer()
                ->get(ModuleSettingBridgeInterface::class)
                ->get('vt_gtm_blGA4enabled', 'vt-gtm');
        }

        return $this->_blGA4enabled;
    }

    private function _getGA4BasicDatalayer()
    {
        $dataLayer = [];

        if ($this->isGA4enabled()) {
            /* TODO: Add Basic GA4 DataLayer Information */
        }

        return $dataLayer;
    }

}