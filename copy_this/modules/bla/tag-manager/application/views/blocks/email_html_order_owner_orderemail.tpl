[{$smarty.block.parent}]
[{if $order->oxorder__blaref->value || $order->oxorder__blasubref->value || $order->oxorder__blahttpref->value}]
    <table style="width:90%; margin: 10px auto; font-sizer: 12px; color:black;">
        [{if $order->oxorder__blaref->value}]
            <tr>
                <td class="edittext"><b>REF:</b></td>
                <td class="edittext">[{$order->oxorder__blaref->value}]</td>
            </tr>
        [{/if}]
        [{if $order->oxorder__blasubref->value}]
            <tr>
                <td class="edittext"><b>SUB-REF:</b></td>
                <td class="edittext">[{$order->oxorder__blasubref->value}]</td>
            </tr>
        [{/if}]
        [{if $order->oxorder__blahttpref->value}]
            <tr>
                <td class="edittext"><b>HTTP REF:</b></td>
                <td class="edittext">[{$order->oxorder__blahttpref->value}]</td>
            </tr>
        [{/if}]
    </table>
[{/if}]