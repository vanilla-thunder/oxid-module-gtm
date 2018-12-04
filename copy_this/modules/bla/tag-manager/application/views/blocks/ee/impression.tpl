[{$smarty.block.parent}]
[{strip}]
    [{assign var="_tmProduct" value=$oView->getProduct()}]
    [{assign var="_tmCategory" value=$_tmProduct->getCategory()}]
    [{* assign var="_tmManufacturer" value=$_tmProduct->getManufacturer() *}]
    [{* setting: [{ $oViewConf->getGTMproductListPerformanceSetting() }] || id: [{$listId}] *}]
    <script>
        dataLayer.push({
            'event':'ee.impression',
            'eventLabel':'Impression',
            'ecommerce': {
                'currencyCode': '[{$currency->name}]',
                'impressions': [
                    {
                        'name': '[{$_tmProduct->oxarticles__oxtitle->value}]',
                        'id':   '[{$_tmProduct->oxarticles__oxartnum->value}]',
                        'price': [{$_tmProduct->oxarticles__oxprice->value}],
                        'category': '[{if $_tmCategory}][{$_tmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]-[{/if}]',
                        [{if $listId == 'productList' || $listId == 'categoryList'}]
                            [{if $oViewConf->getGTMproductListPerformanceSetting() == "1"}]
                                'list': '[{oxmultilang ident="CATEGORIES"}]',
                            [{elseif $oViewConf->getGTMproductListPerformanceSetting() == "2"}]
                                'list': '[{if $_tmCategory}][{$_tmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]-[{/if}]',
                            [{/if}]
                        [{else}]
                            'list': '[{$listId|default:$oView->getClassName()}]',
                        [{/if}]
                        'position': [{$smarty.foreach.productlist.iteration|default:1}]
                    }
                ]
            }
        });
    </script>
[{/strip}]
