{if $error|@is_array || $error|strlen > 0}
    {assign var=hasError value=true}
{else}
    {assign var=hasError value=false}
{/if}

<div class="error"{if !$hasError} style="display:none"{/if}>
    {if $error|@is_array}
            {foreach $error as $str}
               <span>{$str}</span>
            {/foreach}
    {else}
        <span>{$error}</span>
    {/if}
</div>