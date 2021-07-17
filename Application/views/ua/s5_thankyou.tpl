<script>
[{*
    dataLayer.push({
        'event': 'ee.checkout',
            'eventLabel':'Checkout 5',
        'ecommerce': {'checkout': {'actionField': {'step': 5}}}
    });
*}]
    [{assign var="_gtmOrder" value=$oView->getOrder()}]
    [{assign var="_gtmBasket" value=$_gtmOrder->getBasket()}]
    [{assign var="_gtmArticles" value=$_gtmOrder->getOrderArticles()}]
    
    dataLayer.push({
        'event': 'ee.transaction',
        'eventLabel':'[{oxmultilang ident="ORDER_COMPLETED"}]',
        'ecommerce': {
            'purchase': {
                'actionField': {
                    'id':'[{$_gtmOrder->oxorder__oxordernr->value}]',
                    'affiliation':'[{$oxcmp_shop->oxshops__oxname->value}]',
                    'revenue':'[{$_gtmOrder->oxorder__oxtotalordersum->value}]',
                    'tax':'[{math equation="x+y" x=$_gtmOrder->oxorder__oxartvatprice1->value y=$_gtmOrder->oxorder__oxartvatprice2->value }]',
                    'shipping':'[{$_gtmOrder->oxorder__oxdelcost->value}]'
                    /*'coupon':'CANO25' //if a coupon code was used for this order*/
                },
                'products':[
                    [{foreach key="_index" from=$_gtmBasket->getContents() item="_gtmBasketitem" name="gtmTransactionProducts"}]
                    [{assign var="_price" value=$_gtmBasketitem->getPrice()}]
                    {
                        'id':'[{$_gtmArticles[$_index]->oxarticles__oxartnum->value}]',
                        'name': '[{$_gtmArticles[$_index]->oxarticles__oxtitle->value}]',
                        'variant':'[{$_gtmArticles[$_index]->oxarticles__oxvarselect->value}]',
                        'price': [{$_price->getPrice()}],
                        'item_price': [{$_price->getPrice()}],
                        'quantity':[{$_gtmBasketitem->getAmount()}],
                        'position':[{$smarty.foreach.gtmTransactionProducts.iteration}]
                    }[{if !$smarty.foreach.gtmTransactionProducts.last}],[{/if}]
                    [{/foreach}]
                ]
            }
        }
    });
</script>
[{$smarty.block.parent}]
