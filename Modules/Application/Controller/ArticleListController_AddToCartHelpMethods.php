<?php

namespace D3\GoogleAnalytics4\Modules\Application\Controller;

use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Core\Registry;

class ArticleListController_AddToCartHelpMethods extends ArticleListController_AddToCartHelpMethods_parent
{
    /**
     * @return mixed|null
     */
    public function getAddToBasketDecision() :bool
    {
        $decision = Registry::getSession()->getVariable('d3GtmAddToBasketTrigger');

        Registry::getSession()->setVariable('d3GtmAddToBasketTrigger', false);

        return (bool) $decision;
    }

    /**
     * @return Article|null
     */
    public function d3GtmRequestedArticleLoadedByAnid()
    {
        $sAnid = Registry::getRequest()->getRequestEscapedParameter('anid');

        $oArticle = null;

        if ($sAnid){
            /** @var Article $oArticle */
            $oArticle = oxNew(Article::class);
            $oArticle->load($sAnid);
        }

        return $oArticle;
    }
}