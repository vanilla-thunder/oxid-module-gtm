<?php

namespace D3\GoogleAnalytics4\Modules\Application\Component;

use OxidEsales\Eshop\Core\Registry;

class d3GtmBasketComponentExtension extends d3GtmBasketComponentExtension_parent
{
    public function toBasket($sProductId = null, $dAmount = null, $aSel = null, $aPersParam = null, $blOverride = false)
    {
        $return = parent::toBasket($sProductId, $dAmount, $aSel, $aPersParam, $blOverride);

        Registry::getSession()->setVariable('d3GtmAddToBasketTrigger', true);

        return $return;
    }
}