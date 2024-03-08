<?php

declare(strict_types=1);

namespace D3\GoogleAnalytics4\Modules\Application\Controller;


class d3GtmSearchController extends d3GtmSearchController_parent
{
    /**
     * @return string
     */
    public function render()
    {
        $return = parent::render();

        if (false === in_array('oxcmp_basket', $this->getComponents())){
            $this->addTplParam('d3CmpBasket', $this->getComponent('oxcmp_basket'));
        }

        return $return;
    }
}