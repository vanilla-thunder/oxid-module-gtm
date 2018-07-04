[{$smarty.block.parent}]
<tr><td colspan=2><br></td></tr>
[{if $edit->oxorder__blaref->value}]
<tr>
    <td class="edittext"><b>REF:</b></td>
    <td class="edittext">[{$edit->oxorder__blaref->value}]</td>
</tr>
[{/if}]
[{if $edit->oxorder__blasubref->value}]
<tr>
    <td class="edittext"><b>SUB-REF:</b></td>
    <td class="edittext">[{$edit->oxorder__blasubref->value}]</td>
</tr>
[{/if}]
[{if $edit->oxorder__blahttpref->value}]
<tr>
    <td class="edittext"><b>HTTP REF:</b></td>
    <td class="edittext">[{$edit->oxorder__blahttpref->value}]</td>
</tr>
[{/if}]