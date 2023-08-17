[{$smarty.block.parent}]

[{* variable $gtmProduct is passed from parent tempalte *}]
[{assign var="d3PriceObject" value=$gtmProduct->getPrice()}]
[{assign var="gtmCurrency" value=$oView->getActCurrency()}]
[{assign var="gtmManufacturer" value=$gtmProduct->getManufacturer()}]
[{assign var="gtmCategory" value=$gtmProduct->getCategory()}]

[{block name="d3_ga4_add_to_cart_block"}]
  [{capture assign=d3_ga4_add_to_cart}]
    [{strip}]
      $("#toBasket").click(function(event) {
        dataLayer.push({"event": null, "eventLabel": null, "ecommerce": null});  /* Clear the previous ecommerce object. */

        [{*** Debug cases ***}]
        [{*event.preventDefault();*}]

        let iArtQuantity = $("#amountToBasket").val();

        dataLayer.push({
          'isAddToBasket': true,
          'event':'add_to_cart',
          'eventLabel': 'add_to_cart',
          'ecommerce': {
            'currency':   "[{$currency->name}]",
            'value':      iArtQuantity*[{$d3PriceObject->getPrice()}],
            'items':      [
              {
              'item_id':        '[{$gtmProduct->getFieldData('oxartnum')}]',
              'item_name':      '[{$gtmProduct->getFieldData('oxtitle')}]',
              'price':          [{$d3PriceObject->getPrice()}],
              'item_brand':     '[{if $gtmManufacturer}][{$gtmManufacturer->oxmanufacturers__oxtitle->value}][{/if}]',
              'item_variant':   '[{if $gtmProduct->getFieldData('oxvarselect')}][{$gtmProduct->getFieldData('oxvarselect')}][{/if}]',
              [{if $gtmCategory}]
              'item_category':  '[{$gtmCategory->getSplitCategoryArray(0)}]',
              'item_category_2':'[{$gtmCategory->getSplitCategoryArray(1)}]',
              'item_category_3':'[{$gtmCategory->getSplitCategoryArray(2)}]',
              'item_category_4':'[{$gtmCategory->getSplitCategoryArray(3)}]',
              'item_list_name':'[{$gtmCategory->getSplitCategoryArray()}]',
              [{/if}]
              'quantity': iArtQuantity
              }
            ]
          }[{if $oViewConf->isDebugModeOn()}],
          'debug_mode': 'true'
          [{/if}]
        });
      });
    [{/strip}]
  [{/capture}]
  [{oxscript add=$d3_ga4_add_to_cart}]
[{/block}]