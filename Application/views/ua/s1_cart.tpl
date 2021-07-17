[{strip}]
    [{assign var="gtmCartArticles" value=$oView->getBasketArticles()}]
    <script>
        dataLayer.push({"event": null, "eventLabel": null, "ecommerce": null});
        dataLayer.push({
            "event":"enhanced-ecommerce",
            "ecommerce": {
                "checkout": {
                    "actionField": {"step":1},
                    "products": [
[{foreach key=basketindex from=$oxcmp_basket->getContents() item=basketitem name=gtmCartContents}]
                        [{assign var="_price" value=$basketitem->getPrice()}]
                        {
                            'id':'[{$gtmCartArticles[$basketindex]->oxarticles__oxartnum->value}]',
                            'name': '[{$gtmCartArticles[$basketindex]->oxarticles__oxtitle->value}]',
                            'variant':'[{$gtmCartArticles[$basketindex]->oxarticles__oxvarselect->value}]',
                            'price': [{$_price->getPrice()}],
                            'quantity':[{$basketitem->getAmount()}],
                            'position':[{$smarty.foreach.gtmCartContents.index}]
                        }[{if !$smarty.foreach.gtmCartContents.last}],[{/if}]
[{/foreach}]
                    ]
                }
            }
        });

        var gtmCartContents = {
            [{foreach key=basketindex from=$oxcmp_basket->getContents() item=basketitem name=gtmCartContents}]
            '[{$basketindex}]':{
                'id':'[{$gtmCartArticles[$basketindex]->oxarticles__oxartnum->value}]'
            }[{if !$smarty.foreach.gtmCartContents.last}],[{/if}]
            [{/foreach}]
        };

        [{capture name="removeFromBasket"}]
            $("#basketRemove").on("click", function() {
               var _checked = [],
                   _products = [];

               $("input:checkbox:checked[name^='aproducts'][name*='remove']").each(function() { _checked.push($(this).attr('name').replace("aproducts[","").replace("][remove]","")); });
                if(_checked.length == 0) return;
                _checked.forEach(function(_oxid) { _products.push({ 'id':gtmCartContents[_oxid].id}) });

                dataLayer.push({
                    'event':'ee.removeFromCart',
                    'ecommerce': {
                        'currencyCode': '[{$currency->name}]',
                        'remove': {
                            'products': _products
                        }
                    }

                });
            });
            /*

         */
        [{/capture}]
        [{oxscript add=$smarty.capture.removeFromBasket}]
    </script>
[{/strip}]
[{$smarty.block.parent}]