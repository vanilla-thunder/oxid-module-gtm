[{strip}]
<script>
    dataLayer.push({"event": null, "eventLabel": null, "ecommerce": null});  /* Clear the previous ecommerce object. */
    [{assign var="_gtmOrder" value=$oView->getOrder()}]
    [{assign var="_gtmArticles" value=$_gtmOrder->getOrderArticles()}]
    
    dataLayer.push({
        'event': 'purchase',
        'eventLabel':'Checkout Step 5',
        'ecommerce': {
            'purchase': {
                'actionField': {
                    'id':'[{$_gtmOrder->oxorder__oxordernr->value}]',
                    'affiliation':'[{$oxcmp_shop->oxshops__oxname->value}]',
                    'revenue':'[{$_gtmOrder->oxorder__oxtotalordersum->value}]',
                    'tax':'[{math equation="x+y" x=$_gtmOrder->oxorder__oxartvatprice1->value y=$_gtmOrder->oxorder__oxartvatprice2->value }]',
                    'shipping':'[{$_gtmOrder->oxorder__oxdelcost->value}]',
                    'currency': "[{$_gtmOrder->getFieldData('oxcurrency')}]"
                },
                'products':[
                    [{foreach from=$_gtmArticles item="_gtmArticle" name="gtmArticles"}]
                    {
                        'id':'[{$_gtmArticle->oxorderarticles__oxartnum->value}]',
                        'name': '[{$_gtmArticle->oxorderarticles__oxtitle->value}]',
                        'variant':'[{$_gtmArticle->oxorderarticles__oxselvariant->value}]',
                        'price': [{$_gtmArticle->oxorderarticles__oxprice->value}],
                        'quantity':[{$_gtmArticle->oxorderarticles__oxamount->value}],
                        'position':[{$smarty.foreach.gtmArticles.iteration}]
                    }[{if !$smarty.foreach.gtmArticles.last}],[{/if}]
                    [{/foreach}]
                ]
            }
        }
    });
</script>
[{/strip}]
[{$smarty.block.parent}]
