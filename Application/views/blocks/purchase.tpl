[{$smarty.block.parent}]

[{strip}]
<script>
    dataLayer.push({"event": null, "eventLabel": null, "ecommerce": null});  /* Clear the previous ecommerce object. */
    [{assign var="gtmOrder" value=$oView->getOrder()}]
    [{assign var="gtmArticles" value=$gtmOrder->getOrderArticles()}]
    
    dataLayer.push({
        'event': 'purchase',
        'eventLabel':'Checkout Step 5',
        'ecommerce': {
          'transaction_id': '[{$gtmOrder->getFieldData("oxordernr")}]',
          'affiliation':    '[{$oxcmp_shop->getFieldData("oxname")}]',
          'value':          [{$gtmOrder->getTotalOrderSum()}],
          'tax':            [{math equation="x+y" x=$gtmOrder->getFieldData("oxartvatprice1") y=$gtmOrder->getFieldData("oxartvatprice2") }],
          'shipping':       [{$gtmOrder->getFieldData("oxdelcost")}],
          'currency':       '[{$gtmOrder->getFieldData('oxcurrency')}]',
          'items':
              [
                [{foreach from=$gtmArticles item="d3BasketArticle" name="gtmArticles"}]
                  [{assign var="d3oArticlePrice" value=$d3BasketArticle->getPrice()}]
                {
                    'id':       '[{$d3BasketArticle->getFieldData("oxartnum")}]',
                    'name':     '[{$d3BasketArticle->getFieldData("oxtitle")}]',
                    'variant':  '[{$d3BasketArticle->getFieldData("oxselvariant")}]',
                    'price':    [{$d3oArticlePrice->getPrice()}],
                    'quantity': [{$d3BasketArticle->getFieldData("oxamount")}],
                    'position': [{$smarty.foreach.gtmArticles.iteration}]
                }[{if !$smarty.foreach.gtmArticles.last}],[{/if}]
                [{/foreach}]
              ]
        }
    })
</script>
[{/strip}]
