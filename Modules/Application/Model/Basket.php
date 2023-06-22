<?php

namespace D3\GoogleAnalytics4\Modules\Application\Model;

use OxidEsales\Eshop\Application\Model\Payment;

class Basket extends Basket_parent
{
    /**
     * @return void
     */
    public function getPaymentOnPaymentId() :string
    {
        if ($this->getPaymentId()){
            $oPayment = oxNew(Payment::class);
            if ($oPayment->load($this->getPaymentId())){
                return $oPayment->getFieldData('oxdesc');
            }
        }

        return "couldn't load payment!";
    }
}