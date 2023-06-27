[{* Always prepare the data layer to avoid errors *}]
<script>
  var dataLayer = [{$oViewConf->getGtmDataLayer()}] || [];
</script>

[{if $oViewConf->D3blShowGtmScript()}]
    [{if $oViewConf->getGtmContainerId()}]
        [{strip}]
            <!-- Google Tag Manager -->
            <script [{$oViewConf->getGtmScriptAttributes()}]>
              (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
                var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
              })(window, document, 'script', 'dataLayer', '[{$oViewConf->getGtmContainerId()}]');
            </script>
            <!-- End Google Tag Manager -->
        [{/strip}]
    [{/if}]
[{/if}]

[{$smarty.block.parent}]