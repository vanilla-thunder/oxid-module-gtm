[{$smarty.block.parent}]
[{assign var="gtmProduct" value=$oView->getProduct()}]
[{if $gtmProduct}]
    [{assign var="gtmCategory" value=$gtmProduct->getCategory()}]
    [{assign var="gtmManufacturer" value=$gtmProduct->getManufacturer()}]
    <script>
      dataLayer.push({"event": null, "eventLabel": null, "ecommerce": null});  /* Clear the previous ecommerce object. */
      dataLayer.push({
        'event': 'ee.impression',
        'eventLabel':'Impression',
        'ecommerce': {
          'currencyCode': '[{$currency->name}]',
          'impressions': [
            {
              'name': '[{$gtmProduct->getFieldData('oxtitle')}]',
              'id': '[{$gtmProduct->getFieldData('oxartnum')}]',
              'price': [{$gtmProduct->getFieldData('oxprice')}],
              'brand': '[{if $gtmManufacturer}][{$gtmManufacturer->getFieldData('oxtitle')}][{/if}]',
              'category': '[{if $gtmCategory}][{$gtmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]-[{/if}]',
              'variant': '[{if $gtmProduct->getFieldData('oxvarselect')}][{$gtmProduct->getFieldData('oxvarselect')}][{/if}]'
                  [{if $list && $position}],
              'list': '[{$list}]',
              'position': [{"_"|str_replace:"":$position}]
                  [{/if}]
            }
          ]
        }
      });
    </script>
<!--
sWidgetType [{$sWidgetType}] | [{$oView->getViewParameter('sWidgetType')}]
sListType [{$sListType}] | [{$oView->getViewParameter('sListType')}]
iIndex [{$iIndex}] | [{$oView->getViewParameter('iIndex')}]
listId [{$listId}] | [{$oView->getViewParameter('listId')}]
testid [{$testid}] | [{$oView->getViewParameter('testid')}]
-->
[{/if}]