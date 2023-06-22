[{$smarty.block.parent}]

[{strip}]
<script>
    dataLayer.push({"event": null, "eventLabel": null, "ecommerce": null});  /* Clear the previous ecommerce object. */
    [{assign var="gtmOrder"         value=$oView->getOrder()}]
    [{assign var="gtmArticles"      value=$gtmOrder->getOrderArticles()}]
    [{assign var="gtmOrderPayment"  value=$gtmOrder->getPayment()}]
    [{assign var="gtmOrderVouchers"  value=$gtmOrder->getVoucherNrList()}]

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
            'coupon':           '[{foreach from=$gtmOrderVouchers item="gtmOrderVoucher" name="gtmOrderVoucherIteration"}][{$gtmOrderVoucher}][{if !$smarty.foreach.gtmOrderVoucherIteration.last}], [{/if}][{/foreach}]',
            'paymentType':    '[{*$gtmOrderPayment->getFieldData('oxdesc')*}]',
            'items': [
                [{foreach from=$gtmArticles item="gtmBasketItem" name="gtmArticles"}]
                    [{assign var="gtmPurchaseItemPriceObject"   value=$gtmBasketItem->getPrice()}]
                    [{assign var="gtmPurchaseItem"              value=$gtmBasketItem->getArticle()}]
                    [{assign var="gtmPurchaseItemCategory"      value=$gtmPurchaseItem->getCategory()}]

                    {
                        'item_id':          '[{$gtmBasketItem->getFieldData("oxartnum")}]',
                        'item_name':        '[{$gtmBasketItem->getFieldData("oxtitle")}]',
                        'affiliation':      '[{$gtmBasketItem->getFieldData("oxtitle")}]',
                        'coupon':           '[{foreach from=$gtmOrderVouchers item="gtmOrderVoucher" name="gtmOrderVoucherIteration"}][{$gtmOrderVoucher}][{if !$smarty.foreach.gtmOrderVoucherIteration.last}], [{/if}][{/foreach}]',
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
