[{if $oViewConf->getGTMid() || $oViewConf->getYMid() }][{strip}]
    <noscript>
        [{if $oViewConf->getGTMid()}]<iframe src="//www.googletagmanager.com/ns.html?id=[{$oViewConf->getGTMid()}]" height="0" width="0" style="display:none;visibility:hidden"></iframe>[{/if}]
        [{* [{if $oViewConf->getMTMid()}][{/if}] *}]
        [{if $oViewConf->getYMid()}]<img src="https://mc.yandex.ru/watch/[{$oViewConf->getYMid()}]" style="position:absolute; left:-9999px;" alt=""/>[{/if}]
    </noscript>
[{/strip}][{/if}]
[{$smarty.block.parent}]