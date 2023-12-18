<?php

declare(strict_types=1);

namespace D3\GoogleAnalytics4\Modules\Application\Controller;

class d3GtmStartController extends d3GtmStartController_parent
{
    public function render()
    {
        $return = parent::render();

        if (false === in_array('oxcmp_basket', $this->getComponents())){
            $this->addTplParam('d3CmpBasket', $this->getComponent('oxcmp_basket'));
        }

        return $return;
    }
}