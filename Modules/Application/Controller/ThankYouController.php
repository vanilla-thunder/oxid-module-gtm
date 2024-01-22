<?php

namespace D3\GoogleAnalytics4\Modules\Application\Controller;

use OxidEsales\Eshop\Application\Model\Country;
use OxidEsales\Eshop\Application\Model\Order;

class ThankYouController extends ThankYouController_parent
{
    /**
     * @return Country
     */
    public function d3GAGetUserCountry()
    {
        /** @var Order $oOrder */
        $oOrder = $this->getOrder();
        $sCountryId = $oOrder->getFieldData('oxbillcountryid');

        /** @var Country $oCountry */
        $oCountry = oxNew(Country::class);
        $oCountry->load($sCountryId);

        return $oCountry;
    }
}