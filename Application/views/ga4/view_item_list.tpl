[{$smarty.block.parent}]
[{assign var="gtmProducts" value=$oView->getArticleList()}]
[{assign var="gtmCategory" value=$oView->getActiveCategory()}]

[{assign var="breadCrumb" value=''}]

[{if $gtmProducts|@count}]
[{strip}]
    <script>
        /* ga4 */
        dataLayer.push({ecommerce: null});
        dataLayer.push({
            'event':'view_item_list',
            'event_name': 'view_item_list',
            'ecommerce': {
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
                        'item_category':  '[{$gtmCategory->getSplitCategoryArray(0)}]',
                        'item_category_2':'[{$gtmCategory->getSplitCategoryArray(1)}]',
                        'item_category_3':'[{$gtmCategory->getSplitCategoryArray(2)}]',
                        'item_category_4':'[{$gtmCategory->getSplitCategoryArray(3)}]',
                        'quantity': 1
                    }[{if !$smarty.foreach.gtmProducts.last}],[{/if}]
                    [{/foreach}]
                ]
            }
        });
    </script>
[{/strip}]
[{/if}]