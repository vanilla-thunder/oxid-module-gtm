[{$smarty.block.parent}]
[{assign var="gtmProducts" value=$oView->getArticleList()}]
[{assign var="gtmCategory" value=$oView->getActiveCategory()}]

[{assign var="breadCrumb" value=''}]

[{if $gtmProducts|@count}]
[{strip}]
    <script>
        /* ga4 */
        dataLayer.push({ecommerce: null});

        let itemCategories = '[{if $gtmCategory}][{$gtmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]no category[{/if}]'.split('/');

        dataLayer.push({
            'event':'view_item_list',
            'event_name': 'view_item_list',
            'ecommerce': {
                'item_category':  itemCategories[0] || 'no category',
                'item_category_2':itemCategories[1] || '',
                'item_category_3':itemCategories[2] || '',
                'item_category_4':itemCategories[3] || '',
                'item_list_id': '[{$oView->getCategoryId()}]',
                'item_list_name': '[{foreach from=$oView->getBreadCrumb() item=sCrum}][{if $sCrum.title }][{$breadCrumb|cat:$sCrum.title|cat:" > "}][{/if}][{/foreach}]',
                'items': [
                    [{foreach from=$gtmProducts name="gtmProducts" item="gtmProduct"}]
                    [{assign var="d3PriceObject" value=$gtmProduct->getPrice()}]
                    [{assign var="gtmManufacturer" value=$gtmProduct->getManufacturer()}]
                    [{if !$gtmCategory}][{assign var="gtmCategory" value=$gtmProduct->getCategory()}][{/if}]
                    {
                        'item_id': '[{$gtmProduct->getFieldData("oxartnum")}]',
                        'item_name': '[{$gtmProduct->getFieldData("oxtitle")}]',
                        'price': [{$d3PriceObject->getPrice()}],
                        'item_brand': '[{if $gtmManufacturer}][{$gtmManufacturer->oxmanufacturers__oxtitle->value}][{/if}]',
                        'item_category': '[{if $gtmCategory}][{$gtmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]-[{/if}]',
                        'quantity': 1
                    }[{if !$smarty.foreach.gtmProducts.last}],[{/if}]
                    [{/foreach}]
                ]
            }
        });
    </script>
[{/strip}]
[{/if}]