[{$smarty.block.parent}]
[{assign var="gtmProduct" value=$oView->getProduct()}]
[{assign var="gtmCategory" value=$gtmProduct->getCategory()}]
[{assign var="gtmManufacturer" value=$gtmProduct->getManufacturer()}]
[{strip}][{/strip}]
<script>
    dataLayer.push({"event": null, "eventLabel": null, "ecommerce": null});  /* Clear the previous ecommerce object. */
    dataLayer.push({
        'event': 'view_item',
        'eventLabel':'Product View',
        'ecommerce': {
            'currencyCode': '[{$currency->name}]',
            'detail': {
                'products': [
                    {
                        'name': '[{$gtmProduct->oxarticles__oxtitle->value}]',
                        'id': '[{$gtmProduct->oxarticles__oxartnum->value}]',
                        'price': [{$gtmProduct->oxarticles__oxprice->value}],
                        'brand': '[{if $gtmManufacturer}][{$gtmManufacturer->oxmanufacturers__oxtitle->value}][{/if}]',
                        'category': '[{if $gtmCategory}][{$gtmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]-[{/if}]',
                        'variant': '[{if $gtmProduct->oxarticles__oxvarselect->value}][{$gtmProduct->oxarticles__oxvarselect->value}][{/if}]'
                    }
                ]
            }
        }
    });
</script>