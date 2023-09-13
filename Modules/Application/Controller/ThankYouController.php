<?php

namespace D3\GoogleAnalytics4\Modules\Application\Controller;

use OxidEsales\Eshop\Application\Model\Country;

class ThankYouController extends ThankYouController_parent
{
    /**
     * @return Country
     */
    public function d3GAGetUserCountry()
    {
        $sCountryId = $this->getOrder()->getFieldData('oxbillcountryid');

        /** @var Country $oCountry */
        $oCountry = oxNew(Country::class);
        $oCountry->load($sCountryId);

        return $oCountry;
    }
}