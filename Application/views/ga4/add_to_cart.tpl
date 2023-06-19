[{$smarty.block.parent}]

[{* variable $gtmProduct is passed from parent tempalte *}]
[{assign var="d3PriceObject" value=$gtmProduct->getPrice()}]
[{assign var="gtmCurrency" value=$oView->getActCurrency()}]
[{assign var="gtmManufacturer" value=$gtmProduct->getManufacturer()}]
[{assign var="gtmCategory" value=$gtmProduct->getCategory()}]

[{capture assign=d3_ga4_add_to_cart}]
  [{block name="d3_ga4_add_to_basket"}]
  $("#toBasket").click(function(event) {
  dataLayer.push({"event": null, "eventLabel": null, "ecommerce": null});  /* Clear the previous ecommerce object. */

  let itemCategories = '[{if $gtmCategory}][{$gtmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]no category[{/if}]'.split('/');

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
        'item_category':  itemCategories[0] || 'no category',
        'item_category_2':itemCategories[1] || '',
        'item_category_3':itemCategories[2] || '',
        'item_category_4':itemCategories[3] || '',
        'quantity': iArtQuantity
        }
      ]
      }
    });
  });
  [{/block}]
  [{/capture}]
[{oxscript add=$d3_ga4_add_to_cart}]