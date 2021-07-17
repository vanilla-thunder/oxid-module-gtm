[{$smarty.block.parent}]
[{*
[{strip}]
    [{assign var="gtmProduct" value=$oView->getProduct()}]
    [{assign var="gtmCategory" value=$gtmProduct->getCategory()}]
    [{assign var="gtmManufacturer" value=$gtmProduct->getManufacturer()}]

    [{if !$head }]
        [{assign var=$head value=$oView->getViewParameter('head')}]
    [{/if}]
    <script>
        var gtmItem = {
            'id': '[{$gtmProduct->oxarticles__oxartnum->value}]',
            'item_id': '[{$gtmProduct->oxarticles__oxartnum->value}]',

            'name': '[{$gtmProduct->oxarticles__oxtitle->value}]',
            'item_name': '[{$gtmProduct->oxarticles__oxtitle->value}]',

            'variant': '[{if $gtmProduct->oxarticles__oxvarselect->value}][{$gtmProduct->oxarticles__oxvarselect->value}][{/if}]',
            'item_variant': '[{if $gtmProduct->oxarticles__oxvarselect->value}][{$gtmProduct->oxarticles__oxvarselect->value}][{/if}]',

            'brand': '[{if $gtmManufacturer}][{$gtmManufacturer->oxmanufacturers__oxtitle->value}][{/if}]',
            'item_brand': '[{if $gtmManufacturer}][{$gtmManufacturer->oxmanufacturers__oxtitle->value}][{/if}]',

            'price': [{$gtmProduct->oxarticles__oxprice->value}],

            'category': '[{if $gtmCategory}][{$gtmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]no category[{/if}]',
            'item_category': '[{if $gtmCategory}][{$gtmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]no category[{/if}]',

            [{if $listId == 'productList' || $listId == 'categoryList'}]
                /* category list */
                'list': '[{$listId}]',
                'item_list_id': '[{$listId}]',
                'item_list_name': '[{$head}]',
            [{elseif $listId}]
                /* category list */
                'list': '[{$listId}]',
                'promotion_id': '[{$listId}]',
                'promotion_name': '[{$head}]',
            [{/if}]
            'position': [{$iIndex}],
            'index': [{$iIndex}],
            'quantity': '1'
        };
        /* UA */
        dataLayer.push({ ecommerce: null });
        dataLayer.push({
            'event': 'UA_event',
            'event_name': 'Impression',
            'ecommerce': {
                'currencyCode': '[{$currency->name}]',
                'impressions': [gtmItem]
            }
        });
        /* GA4 */
        dataLayer.push({ ecommerce: null });
        dataLayer.push({
            'event': 'GA4_event',
            'event_name': 'view_item_list',
            'ecommerce': {
                'items': [gtmItem]
            }
        });
    </script>
[{/strip}]
*}]