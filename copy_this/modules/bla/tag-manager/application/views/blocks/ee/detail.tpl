[{strip}]
    [{assign var="_cur" value=$oView->getActCurrency()}]
    [{assign var="_tmProduct" value=$oView->getProduct()}]
    [{assign var="_tmManufacturer" value=$_tmProduct->getManufacturer()}]
    [{assign var="_tmCategory" value=$_tmProduct->getCategory()}]
    <script type="text/javascript">
        var _products = [
            {
                'name': '[{$_tmProduct->oxarticles__oxtitle->value}]',
                [{if $_tmProduct->oxarticles__oxvarselect->value}]'variant':'[{$_tmProduct->oxarticles__oxvarselect->value}]',[{/if}]
                'id': '[{$_tmProduct->oxarticles__oxartnum->value}]',
                'price': [{$_tmProduct->oxarticles__oxprice->value}],
                [{if $_tmManufacturer}]'brand':'[{$_tmManufacturer->oxmanufacturers__oxtitle->value}]',[{/if}]
                'category': '[{if $_tmCategory}][{$_tmCategory->getLink()|parse_url:5|ltrim:"/"|rtrim:"/"}][{else}]-[{/if}]'
            }
        ];

        var getRefPath = function() {
            var l = document.createElement("a");
            l.href = document.referrer;
            return l.pathname;
        };

        if( typeof document.referrer !== "undefined"
            && document.referrer.indexOf(document.location.hostname) !== -1 /* Besucher ist von hier */
            /*&& getRefPath() !== "/index.php" */
            && document.location.pathname !== "/index.php"
            && getRefPath() !== document.location.pathname)
        {
            /*console.log("jap, der kommt von hier!");*/
            dataLayer.push({
                'event': 'ee.click',
                'eventLabel':'Click',
                'ecommerce': {
                    'currencyCode': '[{$_cur->name}]',
                    'click': {
                        'actionField': {'list': getRefPath().replace(/^\//, "").replace(/\/$/, "")},
                        'products': _products
                    }
                }
            });
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