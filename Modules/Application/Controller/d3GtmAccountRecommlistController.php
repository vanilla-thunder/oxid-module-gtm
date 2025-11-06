<?php

namespace D3\GoogleAnalytics4\Modules\Application\Controller;

use D3\GoogleAnalytics4\Application\Model\Constants;

class d3GtmAccountRecommlistController extends d3GtmAccountRecommlistController_parent
{
    protected $_sThisTemplate = '@' . Constants::OXID_MODULE_ID . '/d3gtmrecommendationlist.tpl';

    public function render()
    {
        $return = parent::render();

        $this->addTplParam('d3CmpBasket', $this->getComponent('oxcmp_basket'));

        return $return;
    }
}
