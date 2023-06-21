[{$smarty.block.parent}]

[{*$oxcmp_basket|get_class_methods|dumpvar*}]

[{assign var="d3BasketPrice" value=$oxcmp_basket->getPrice()}]
[{assign var='gtmCartArticles' value=$oView->getBasketArticles()}]

[{strip}][{capture assign=d3_ga4_view_cart}]
    dataLayer.push({"event": null, "eventLabel": null, "ecommerce": null});  /* Clear the previous ecommerce object. */
    dataLayer.push({
        'event': 'view_cart',
        'eventLabel':'Checkout Step 1',
        'ecommerce': {
            'actionField': "step: 1",
            'currency': "[{$currency->name}]",
            'value': [{$d3BasketPrice->getPrice()}],
            'items': [
                [{foreach from=$oxcmp_basket->getContents() item=basketitem name=gtmCartContents  key=basketindex}]
                    [{assign var="d3oItemPrice" value=$basketitem->getPrice()}]
                    [{assign var="gtmBasketItem" value=$basketitem->getArticle()}]
                    [{assign var="gtmBasketItemCategory" value=$gtmBasketItem->getCategory()}]
                    {
                        'item_id':          '[{$gtmCartArticles[$basketindex]->getFieldData('oxartnum')}]',
                        'item_name':        '[{$gtmCartArticles[$basketindex]->getFieldData('oxtitle')}]',
                        'item_variant':     '[{$gtmCartArticles[$basketindex]->getFieldData('oxvarselect')}]',
                        'item_category':    '[{$gtmBasketItemCategory->getSplitCategoryArray(0)}]',
                        'item_category_2':  '[{$gtmBasketItemCategory->getSplitCategoryArray(1)}]',
                        'item_category_3':  '[{$gtmBasketItemCategory->getSplitCategoryArray(2)}]',
                        'item_category_4':  '[{$gtmBasketItemCategory->getSplitCategoryArray(3)}]',
                        'item_list_name':   '[{$gtmBasketItemCategory->getSplitCategoryArray()}]',
                        'price':            [{$d3oItemPrice->getPrice()}],
                        'quantity':         [{$basketitem->getAmount()}],
                        'position':         [{$smarty.foreach.gtmCartContents.index}]
                    }[{if !$smarty.foreach.gtmCartContents.last}],[{/if}]
                [{/foreach}]
                ]
        }
    });
[{/capture}][{/strip}]
[{oxscript add=$d3_ga4_view_cart}]