[{strip}]
    [{$gtmProduct|@var_dump}]
    [{* variable $gtmProduct is passed from parent tempalte *}]
    [{*
    [{assign var="gtmCurrency" value=$oView->getActCurrency()}]
    [{assign var="gtmManufacturer" value=$gtmProduct->getManufacturer()}]
    [{assign var="gtmCategory" value=$gtmProduct->getCategory()}]
    <script type="text/javascript">

        var itemCategories = '[{if $gtmCategory}][{$gtmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]no category[{/if}]'.split('/');
        //console.log(itemCategories);
        var _gtmProduct = {
            'item_name': '[{$gtmProduct->oxarticles__oxtitle->value}]',
            'item_id': '[{$gtmProduct->oxarticles__oxartnum->value}]',
            'price': '[{$gtmProduct->oxarticles__oxprice->value}]',
            'item_brand': '[{if $gtmManufacturer}][{$gtmManufacturer->oxmanufacturers__oxtitle->value}][{/if}]',
            'item_variant': '[{if $gtmProduct->oxarticles__oxvarselect->value}][{$gtmProduct->oxarticles__oxvarselect->value}][{/if}]',
            'item_category': itemCategories[0] || 'no category',
            'item_category_2': itemCategories[1] || '',
            'item_category_3': itemCategories[2] || '',
            'item_category_4': itemCategories[3] || '',
            [{if false}]
            'item_list_name': 'Search Results',  // If associated with a list selection.
            'item_list_id': 'SR123',  // If associated with a list selection.
            'index': 1,  // If associated with a list selection.
            [{/if}]
            'quantity': '1'
        };

        console.log(_gtmProduct);
        dataLayer.push({
            'event':'ecommerce',
            'ga4event': 'add_to_cart',
            'ecommerce': {
                'items': [ _gtmProduct ]
            }
        });

    </script>
    *}]
[{/strip}]