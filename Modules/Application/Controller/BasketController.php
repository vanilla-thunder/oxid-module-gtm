<?php

namespace D3\GoogleAnalytics4\Modules\Application\Controller;

use OxidEsales\Eshop\Application\Component\BasketComponent;
use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Application\Model\ArticleList;
use OxidEsales\Eshop\Core\Registry;
use oxSystemComponentException;

class BasketController extends BasketController_parent
{
    /**
     * @throws oxSystemComponentException
     */
    public function render()
    {
        $return = parent::render();

        $this->d3GA4getRemovedArticlesListObject();

        return $return;
    }

    /**
     * @return void
     * @throws oxSystemComponentException
     */
    public function d3GA4getRemovedArticlesListObject() :void
    {
        $this->addTplParam('hasBeenReloaded', false);
        // collecting items to add
        $aProducts = Registry::getRequest()->getRequestEscapedParameter('aproducts');

        // collecting specified item
        $sProductId = $sProductId ?? Registry::getRequest()->getRequestEscapedParameter('aid');
        if ($sProductId) {
            // additionally fetching current product info
            $dAmount = $dAmount ?? Registry::getRequest()->getRequestEscapedParameter('am');

            // select lists
            $aSel = $aSel ?? Registry::getRequest()->getRequestEscapedParameter('sel');

            // persistent parameters
            if (empty($aPersParam)) {

                /** @var BasketComponent $oBasketComponent */
                $oBasketComponent = $this->getComponent('oxcmp_basket');

                $aPersParam = $oBasketComponent->__call('getPersistedParameters', []);
            }

            $sBasketItemId = Registry::getRequest()->getRequestEscapedParameter('bindex');

            $aProducts[$sProductId] = ['am'           => $dAmount,
                'sel'          => $aSel,
                'persparam'    => $aPersParam,
                'basketitemid' => $sBasketItemId
            ];
        }

        if (is_array($aProducts) && count($aProducts)) {
            $toRemoveArticleIdList = [];
            $artIdOnArtAmountList = [];

            if (Registry::getRequest()->getRequestEscapedParameter('removeBtn') !== null
                or Registry::getRequest()->getRequestParameter('updateBtn') !== null) {

                //setting amount to 0 if removing article from basket
                foreach ($aProducts as $sProductId => $aProduct) {
                    if ((isset($aProduct['remove']) && $aProduct['remove']) or intval($aProduct['am']) === 0) {
                        if (!in_array($aProduct, $toRemoveArticleIdList)) {
                            $toRemoveArticleIdList[] = $aProduct['aid'];
                            $artIdOnArtAmountList[$aProduct['aid']] = $aProduct['am'];
                        }

                        $aProducts[$sProductId]['am'] = 0;
                        #for GA4 Event
                        $this->addTplParam('hasBeenReloaded', true);
                    } else {
                        unset($aProducts[$sProductId]);
                    }
                }
            }

            $oArtList = oxNew(ArticleList::class);
            $oArtList->loadIds($toRemoveArticleIdList);

            #dumpVar($this->getBasketArticles());

            /** @var Article $item */
            foreach ($oArtList->getArray() as $item){
                foreach ($artIdOnArtAmountList as $artId => $artAmount){
                    if ($item->getId() === $artId){
                        $item->assign(['d3AmountThatGotRemoved' => $artAmount]);
                    }
                }
            }

            $this->addTplParam('toRemoveArticles', $oArtList);
        }
    }
}