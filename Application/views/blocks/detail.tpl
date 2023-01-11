[{$smarty.block.parent}]
[{assign var="gtmProduct" value=$oView->getProduct()}]
[{assign var="gtmCategory" value=$gtmProduct->getCategory()}]
[{assign var="gtmManufacturer" value=$gtmProduct->getManufacturer()}]

<script>
    dataLayer.push({"event": null, "eventLabel": null, "ecommerce": null});  /* Clear the previous ecommerce object. */
    dataLayer.push({
        'event': 'view_item',
        'eventLabel':'Product View',
        'ecommerce': {
            'currency': '[{$currency->name}]',
            'items': [
                {
                    'item_name': '[{$gtmProduct->oxarticles__oxtitle->value}]',
                    'item_id': '[{$gtmProduct->oxarticles__oxartnum->value}]',
                    'item_brand': '[{if $gtmManufacturer}][{$gtmManufacturer->oxmanufacturers__oxtitle->value}][{/if}]',
                    'item_category': '[{if $gtmCategory}][{$gtmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]-[{/if}]',
                    'item_variant': '[{if $gtmProduct->oxarticles__oxvarselect->value}][{$gtmProduct->oxarticles__oxvarselect->value}][{/if}]',
                    'price': [{$gtmProduct->oxarticles__oxprice->value}]
                }
            ]
        }
    });
</script>