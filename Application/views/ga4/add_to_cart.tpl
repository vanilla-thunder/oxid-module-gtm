[{$smarty.block.parent}]

[{*$gtmProduct|get_class_methods|dumpvar*}]

[{capture assign=d3_ga4_add_to_cart}]
[{block name="d3_ga4_add_to_basket"}]
  $("#toBasket").click(function(event) {

    [{*** Debug cases ***}]
    [{*event.preventDefault();*}]

    let iArtQuantity = $("#amountToBasket").val();

    dataLayer.push({
        'isAddToBasket': true,
      'event':'add_to_cart',
      'eventLabel': 'add_to_cart',
      'ecommerce': {
        'currency':   "[{$currency->name}]",
        'value':      iArtQuantity*[{$gtmProduct->getFieldData('oxprice')}],
        'items':      [
          {
            'item_id':        '[{$gtmProduct->getFieldData('oxartnum')}]',
            'item_name':      '[{$gtmProduct->getFieldData('oxtitle')}]',
            'price':          '[{$gtmProduct->getFieldData('oxprice')}]',
            'item_brand':     '[{if $gtmManufacturer}][{$gtmManufacturer->oxmanufacturers__oxtitle->value}][{/if}]',
            'item_variant':   '[{if $gtmProduct->getFieldData('oxvarselect')}][{$gtmProduct->getFieldData('oxvarselect')}][{/if}]',
            'item_category':  itemCategories[0] || 'no category',
            'item_category_2':itemCategories[1] || '',
            'item_category_3':itemCategories[2] || '',
            'item_category_4':itemCategories[3] || '',
            [{if false}]
            'item_list_name': 'Search Results',  // If associated with a list selection.
            'item_list_id': 'SR123',  // If associated with a list selection.
            'index': 1,  // If associated with a list selection.
            [{/if}]
            'quantity': iArtQuantity
          }
        ]
      }
    });
  });
[{/block}]
[{/capture}]
[{oxscript add=$d3_ga4_add_to_cart}]

[{strip}]
    [{* variable $gtmProduct is passed from parent tempalte *}]

    [{assign var="gtmCurrency" value=$oView->getActCurrency()}]
    [{assign var="gtmManufacturer" value=$gtmProduct->getManufacturer()}]
    [{assign var="gtmCategory" value=$gtmProduct->getCategory()}]

    <script>
      dataLayer.push({"event": null, "eventLabel": null, "ecommerce": null});  /* Clear the previous ecommerce object. */

      let itemCategories = '[{if $gtmCategory}][{$gtmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]no category[{/if}]'.split('/');

    </script>
[{/strip}]