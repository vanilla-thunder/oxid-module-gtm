<?php

declare(strict_types=1);

namespace D3\GoogleAnalytics4\Modules\Application\Component\Widget;


class d3GtmWidgetArticleDetails extends d3GtmWidgetArticleDetails_parent
{
    public function render()
    {
        $return = parent::render();

        $this->addTplParam('d3CmpBasket', $this->getComponent('oxcmp_basket'));

        return $return;
    }
}