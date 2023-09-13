<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author        D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

namespace D3\GoogleAnalytics4\Modules\Core{
    class ViewConfig_parent extends \OxidEsales\Eshop\Core\ViewConfig{}
}

namespace D3\GoogleAnalytics4\Modules\Application\Model{
    class Category_parent extends \OxidEsales\Eshop\Application\Model\Category {}
    class Basket_parent extends \OxidEsales\Eshop\Application\Model\Basket {}
}

namespace D3\GoogleAnalytics4\Modules\Application\Controller{
    class BasketController_parent extends \OxidEsales\Eshop\Application\Controller\BasketController {}
    class ThankYouController_parent extends \OxidEsales\Eshop\Application\Controller\ThankYouController {}
}