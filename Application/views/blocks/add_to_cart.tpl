[{if $oxcmp_basket->isNewItemAdded() && $smarty.session._newitem}]
    <!-- [{$smarty.session._newitem|@var_dump}] -->
    [{* include file="ga4_add_to_cart.tpl" gtmProduct=$smarty.session._newitem *}]
[{/if}]
[{$smarty.block.parent}]
