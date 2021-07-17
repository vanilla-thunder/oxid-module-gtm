[{strip}]
<script>
    dataLayer.push({"event": null, "eventLabel": null, "ecommerce": null});  /* Clear the previous ecommerce object. */
    dataLayer.push({
        'event':'ee.checkout',
        'eventLabel':'Checkout Step 2',
        'ecommerce': {
            'checkout': {
                'actionField': {
                    'step': 2,
                    'option':'[{oxmultilang ident="VT_GTM_EE_LOGINOPTION"|cat:$oView->getLoginOption()}]'
                }
            }
        }
    });
</script>
[{/strip}]
[{$smarty.block.parent}]