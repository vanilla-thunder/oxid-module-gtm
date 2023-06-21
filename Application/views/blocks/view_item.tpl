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
          'item_name': '[{$gtmProduct->getFieldData("oxtitle")}]',
          'item_id': '[{$gtmProduct->getFieldData("oxartnum")}]',
          'item_brand': '[{if $gtmManufacturer}][{$gtmManufacturer->oxmanufacturers__oxtitle->value}][{/if}]',
          'item_variant': '[{if $gtmProduct->getFieldData("oxvarselect")}][{$gtmProduct->getFieldData("oxvarselect")}][{/if}]',
          'item_category':  '[{$gtmCategory->getSplitCategoryArray(0)}]',
          'item_category_2':'[{$gtmCategory->getSplitCategoryArray(1)}]',
          'item_category_3':'[{$gtmCategory->getSplitCategoryArray(2)}]',
          'item_category_4':'[{$gtmCategory->getSplitCategoryArray(3)}]',
          'item_list_name':'[{$gtmCategory->getSplitCategoryArray()}]',
          [{assign var="d3PriceObject" value=$gtmProduct->getPrice()}]
          'price': [{$d3PriceObject->getPrice()}]
        }
      ]
    }
  });
</script>