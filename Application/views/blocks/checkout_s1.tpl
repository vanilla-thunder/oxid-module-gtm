[{$smarty.block.parent}]

[{$oxcmp_basket|get_class_methods|dumpvar}]

[{assign var='gtmCartArticles' value=$oView->getBasketArticles()}]
[{strip}][{capture assign=d3_ga4_view_cart}]
    dataLayer.push({"event": null, "eventLabel": null, "ecommerce": null});  /* Clear the previous ecommerce object. */
    dataLayer.push({
        'event': 'view_cart',
        'eventLabel':'Checkout Step 1',
        'ecommerce': {
            'actionField': "step: 1",
            'currency': "[{$currency->name}]",
            'value': [{$oxcmp_basket->getBruttoSum()}],
            'items': [
                [{foreach from=$oxcmp_basket->getContents() item=basketitem name=gtmCartContents  key=basketindex}]
                [{assign var='_price' value=$basketitem->getUnitPrice()}]
                {
                    'item_id': '[{$gtmCartArticles[$basketindex]->oxarticles__oxartnum->value}]',
                    'item_name': '[{$gtmCartArticles[$basketindex]->oxarticles__oxtitle->value}]',
                    'item_variant': '[{$gtmCartArticles[$basketindex]->oxarticles__oxvarselect->value}]',
                    'price': [{$_price->getPrice()}],
                    'quantity':[{$basketitem->getAmount()}],
                    'position':[{$smarty.foreach.gtmCartContents.index}]
                }[{if !$smarty.foreach.gtmCartContents.last}],[{/if}]
                [{/foreach}]
                ]
        }
    });
[{/capture}][{/strip}]
[{oxscript add=$d3_ga4_view_cart}]