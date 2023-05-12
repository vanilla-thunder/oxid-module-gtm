[{$smarty.block.parent}]

[{strip}]
<script>
    dataLayer.push({"event": null, "eventLabel": null, "ecommerce": null});  /* Clear the previous ecommerce object. */
    [{assign var="_gtmOrder" value=$oView->getOrder()}]
    [{assign var="_gtmArticles" value=$_gtmOrder->getOrderArticles()}]
    
    dataLayer.push({
        'event': 'purchase',
        'eventLabel':'Checkout Step 5',
        'ecommerce': {
          'transaction_id': '[{$_gtmOrder->getFieldData("oxordernr")}]',
          'affiliation':    '[{$oxcmp_shop->getFieldData("oxname")}]',
          'value':          [{$_gtmOrder->getTotalOrderSum()}],
          'tax':            [{math equation="x+y" x=$_gtmOrder->getFieldData("oxartvatprice1") y=$_gtmOrder->getFieldData("oxartvatprice2") }],
          'shipping':       [{$_gtmOrder->getFieldData("oxdelcost")}],
          'currency':       '[{$_gtmOrder->getFieldData('oxcurrency')}]',
          'items':
              [
                [{foreach from=$_gtmArticles item="d3BasketArticle" name="gtmArticles"}]
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
