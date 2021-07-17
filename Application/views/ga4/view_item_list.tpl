[{if $gtmProducts|@count}]
[{strip}]
    <script>
        /* ga4 */
        dataLayer.push({ecommerce: null});
        dataLayer.push({
            'event':'GA4_event',
            'event_name': 'view_item_list',
            'ecommerce': {
                'items': [
                    [{foreach from=$gtmProducts name="gtmProducts" item="gtmProduct"}]
                    [{assign var="gtmManufacturer" value=$gtmProduct->getManufacturer()}]
                    [{if !$gtmCategory}][{assign var="gtmCategory" value=$gtmProduct->getCategory()}][{/if}]
                    {
                        'item_id': '[{$gtmProduct->getFieldData("oxartnum")}]',
                        'item_name': '[{$gtmProduct->getFieldData("oxtitle")}]',
                        'price': [{$gtmProduct->oxarticles__oxprice->value|default:'0'}],
                        'item_brand': '[{if $gtmManufacturer}][{$gtmManufacturer->oxmanufacturers__oxtitle->value}][{/if}]',
                        'item_category': '[{if $gtmCategory}][{$gtmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]-[{/if}]',
                        'quantity': 1
                    }[{if !$smarty.foreach.gtmProducts.last}],[{/if}]
                    [{/foreach}]
                ]
            }
        });
        /* ua */
        dataLayer.push({ecommerce: null});
        dataLayer.push({
            'event':'UA_event',
            'event_name': 'view_item_list',
            'ecommerce': {
                'currencyCode':'EUR',
                'impressions': [
                    [{foreach from=$gtmProducts name="gtmProducts" item="gtmProduct"}]
                    [{assign var="gtmManufacturer" value=$gtmProduct->getManufacturer()}]
                    [{if !$gtmCategory}][{assign var="gtmCategory" value=$gtmProduct->getCategory()}][{/if}]
                    {
                        'id': '[{$gtmProduct->getFieldData("oxartnum")}]',
                        'name': '[{$gtmProduct->getFieldData("oxtitle")}]',
                        'price': [{$gtmProduct->oxarticles__oxprice->value|default:'0'}],
                        'brand': '[{if $gtmManufacturer}][{$gtmManufacturer->oxmanufacturers__oxtitle->value}][{/if}]',
                        'category': '[{if $gtmCategory}][{$gtmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]-[{/if}]',
                        'position': [{$smarty.foreach.gtmProducts.iterator|default:1}]
                    }[{if !$smarty.foreach.gtmProducts.last}],[{/if}]
                    [{/foreach}]
                ]
            }
        });
    </script>
[{/strip}]
[{/if}]