[{strip}]
    [{assign var="_cur" value=$oView->getActCurrency()}]
    [{assign var="_product" value=$oView->getProduct()}]
    [{assign var="_manufacturer" value=$_product->getManufacturer()}]
    [{assign var="_category" value=$_product->getCategory()}]
    <script type="text/javascript">
        var _products = [
            {
                'name': '[{$_product->oxarticles__oxtitle->value}]',
                'variant':'[{$_product->oxarticles__oxvarselect->value}]',
                'id': '[{$_product->oxarticles__oxartnum->value}]',
                'price': [{$_product->oxarticles__oxprice->value}],
                [{if $_manufacturer}]'brand':'[{$_manufacturer->oxmanufacturers__oxtitle->value}]',[{/if}]
                'category': '[{if _category}][{$_category->getLink()|replace:$oViewConf->getHomeLink():""|rtrim:"/"}][{else}]-[{/if}]'
            }
        ];

        if(typeof document.referrer !== "undefined" && document.referrer.indexOf("[{$oViewConf->getHomeLink()}]") === 0)
        {
            var _ref = document.referrer.replace("[{$oViewConf->getHomeLink()}]","");
            if( _ref.indexOf('?') > -1 ) _ref = _ref.substring(0,_ref.indexOf('?'));

            if( _ref.lastIndexOf('/') === (_ref.length-1) )
            {
                console.log("jap, der kommt von hier!");
                dataLayer.push({
                    'event': 'ee.click',
                    'eventLabel':'Click',
                    'ecommerce': {
                        'currencyCode': '[{$_cur->name}]',
                        'click': {
                            'actionField': {'list': _ref.replace(/\/$/, "")},
                            'products': _products
                        }
                    }
                });
            }
        }
        dataLayer.push({
            'event':'ee.product',
            'eventLabel':'Product View',
            'ecommerce': {
                'currencyCode': '[{$_cur->name}]',
                'detail': {
                    [{* 'actionField': { 'list': document.referrer.replace("[{$oViewConf->getHomeLink()}]","").replace(/\/$/, "") }, *}]
                    'products': _products
                }
            }
        });
[{oxscript add="$('#toBasket').parents('form').on('submit',function(e) {dataLayer.push({'event':'ee.addToCart','ecommerce':{'currencyCode':'`$_cur->name`','add':{'products':_products}}});return true;});"}]
    </script>
[{/strip}]
[{$smarty.block.parent}]