[{if $oViewConf->isTagmanagerEnabled()}]
    [{strip}]
        <script type="text/javascript">
            var dataLayer = dataLayer || [{$oViewConf->getDataLayer()}];
            [{if $oViewConf->getGTMid()}]
            /* Google Tag Manager */
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
                var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', '[{$oViewConf->getGTMid()}]');
            /* End Google Tag Manager */
            [{/if}]
            [{if $oViewConf->getMTMid()}]
            /* Matomo Tag Manager */
            var _mtm = _mtm || [];
            _mtm.push({'mtm.startTime': (new Date().getTime()), 'event': 'mtm.Start'});
            var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
            g.type = 'text/javascript';
            g.async = true;
            g.defer = true;
            g.src = '[{$oViewConf->getMTMid()}]';
            s.parentNode.insertBefore(g, s);
            /* End Matomo Tag Manager */
            [{/if}]
            [{if $oViewConf->getYMid()}]
            /* Yandex.Metrika */
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function () {
                    try {
                        w.yaCounter[{$oViewConf->getYMid()}] = new Ya.Metrika2({
                            id: [{$oViewConf->getYMid()}],
                            clickmap: true,
                            trackLinks: true,
                            accurateTrackBounce: true,
                            webvisor: true,
                            ecommerce: "dataLayer"
                        });
                    } catch (e) {}
                });

                var n = d.getElementsByTagName("script")[0],
                    s = d.createElement("script"),
                    f = function () {
                        n.parentNode.insertBefore(s, n);
                    };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://mc.yandex.ru/metrika/tag.js";
                if (w.opera == "[object Opera]") d.addEventListener("DOMContentLoaded", f, false);
                else f();
            })(document, window, "yandex_metrika_callbacks2");
            /* END Yandex.Metrika counter */
            [{/if}]
        </script>
    [{/strip}]
[{/if}]
[{$smarty.block.parent}]
