<?php

declare(strict_types=1);

namespace D3\GoogleAnalytics4\Modules\Application\Controller;


class d3GtmManufacturerListController extends d3GtmManufacturerListController_parent
{
    public function render()
    {
        $return = parent::render();

        $this->addTplParam('d3CmpBasket', $this->getComponent('oxcmp_basket'));

        return $return;
    }
}