<?php

namespace D3\GoogleAnalytics4\Modules\Application\Controller;

class ArticleDetailsController extends ArticleDetailsController_parent
{
    public function render()
    {
        $return = parent::render();

        $this->addTplParam('d3CmpBasket', $this->getComponent('oxcmp_basket'));

        return $return;
    }
}