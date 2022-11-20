[{strip}]
    [{* variable $gtmProduct is passed from parent template *}]
    [{assign var="gtmPrice" value=$gtmProduct->getPrice()}]
    [{assign var="gtmCurrency" value=$oView->getActCurrency()}]
    [{assign var="gtmManufacturer" value=$gtmProduct->getManufacturer()}]
    [{assign var="gtmCategory" value=$gtmProduct->getCategory()}]
    <script type="text/javascript">
        gtag('event', 'gtm_ga4_event', {
            'ga4_event': 'view_item',
            'value': [{$gtmPrice->getBruttoPrice()}],
            'currency': '[{$gtmCurrency->name}]',
            'items': [ {
                'index': 0,
                'item_id': '[{$gtmProduct->getFieldData("oxartnum")}]',
                'item_name': '[{$gtmProduct->getFieldData("oxtitle")}]',
                'item_variant': '[{$gtmProduct->getFieldData("oxvarselect")}]',
                'item_brand': '[{if $gtmManufacturer}][{$gtmManufacturer->getFieldData("oxtitle")}][{/if}]',
                'item_category': '[{if $gtmCategory}][{$gtmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]-[{/if}]',
                'price': [{$gtmProduct->oxarticles__oxprice->value|default:0}],
                'currency': '[{$gtmCurrency->name}]',
                'quantity': 1
            } ]
        });
    </script>
[{/strip}]