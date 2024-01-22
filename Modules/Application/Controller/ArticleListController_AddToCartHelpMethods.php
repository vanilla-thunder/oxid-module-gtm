<?php

namespace D3\GoogleAnalytics4\Modules\Application\Controller;

class ArticleListController_AddToCartHelpMethods extends ArticleListController_AddToCartHelpMethods_parent
{
    public function render()
    {
        $render = parent::render();

        $this->addTplParam('d3CmpBasket', $this->getComponent('oxcmp_basket'));

        return $render;
    }
}