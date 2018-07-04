<script>
    dataLayer.push({
        'event':'ee.checkout',
        'eventLabel':'Checkout 2',
        'ecommerce': {
            'checkout': { 'actionField': {
                'step': 2,
                'option':'[{oxmultilang ident="BLA_GTM_EE_LOGINOPTION"|cat:$oView->getLoginOption()}]'
            } }
        }
    });
</script>
[{$smarty.block.parent}]