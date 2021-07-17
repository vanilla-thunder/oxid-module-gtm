[{strip}]
    [{assign var="gtmCategory" value=$gtmProduct->getCategory()}]
    [{assign var="gtmManufacturer" value=$gtmProduct->getManufacturer()}]
    <script>
        /* UA */
        dataLayer.push({ecommerce: null});
        dataLayer.push({
            'event': 'UA_ecommerce',
            'event_name': 'Impression',
            'ecommerce': {
                'currencyCode': '[{$currency->name}]',
                'impressions': [
                    {
                        'name': '[{$gtmProduct->oxarticles__oxtitle->value}]',
                        'id': '[{$gtmProduct->oxarticles__oxartnum->value}]',
                        'price': [{$gtmProduct->oxarticles__oxprice->value}],
                        'brand': '[{if $gtmManufacturer}][{$gtmManufacturer->oxmanufacturers__oxtitle->value}][{/if}]',
                        'category': '[{if $gtmCategory}][{$gtmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]no category[{/if}]',
                        'variant': '[{if $gtmProduct->oxarticles__oxvarselect->value}][{$gtmProduct->oxarticles__oxvarselect->value}][{/if}]'
                        [{if $list && $position}],
                        'list': '[{$list}]',
                        'position': [{"_"|str_replace:"":$position}]
                        [{/if}]
                    }
                ]
            }
        });
    </script>
[{/strip}]
