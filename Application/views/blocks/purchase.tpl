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
                [{foreach from=$gtmArticles item="gtmBasketItem" name="gtmArticles"}]
                    [{assign var="gtmPurchaseItemPriceObject"   value=$gtmBasketItem->getPrice()}]
                    [{assign var="gtmPurchaseItemCategory"      value=$gtmBasketItem->getCategory()}]
                    {
                        'item_id':          '[{$gtmBasketItem->getFieldData("oxartnum")}]',
                        'item_name':        '[{$gtmBasketItem->getFieldData("oxtitle")}]',
                        'affiliation':      '[{$gtmBasketItem->getFieldData("oxtitle")}]',
                        'coupon':           '[{$gtmBasketItem->getFieldData("oxtitle")}]',
                        'item_variant':     '[{$gtmBasketItem->getFieldData("oxselvariant")}]',
                        'item_category':    '[{$gtmPurchaseItemCategory->getSplitCategoryArray(0)}]',
                        'item_category_2':  '[{$gtmPurchaseItemCategory->getSplitCategoryArray(1)}]',
                        'item_category_3':  '[{$gtmPurchaseItemCategory->getSplitCategoryArray(2)}]',
                        'item_category_4':  '[{$gtmPurchaseItemCategory->getSplitCategoryArray(3)}]',
                        'item_list_name':   '[{$gtmPurchaseItemCategory->getSplitCategoryArray()}]',
                        'price':            [{$gtmPurchaseItemPriceObject->getPrice()}],
                        'quantity':         [{$gtmBasketItem->getFieldData("oxamount")}],
                        'position':         [{$smarty.foreach.gtmArticles.iteration}]
                    }[{if !$smarty.foreach.gtmArticles.last}],[{/if}]
                [{/foreach}]
              ]
        }
    })
</script>
[{/strip}]
