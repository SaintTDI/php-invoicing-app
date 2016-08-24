{if $addresses|@count == 0}
	{if !$contact}
        <input type="hidden" id="form_contact_id" name="contact_id" value="0">
        <input type="hidden" id="form_addr_id" name="addr_id" value="0" />
    {/if}
    {if $contact}
    		<input type="hidden" id="form_addr_id" name="addr_id" value="0" />
    {/if}
{else}	
		<input type="hidden" id="form_contact_id" name="contact_id" value="{$contact_id}">
    	    <table class="table_p2">
    	  	 <tr>
    	  		{if $identity->user_type == "proprietary" || $identity->user_type == "employee" }<td class="table_button"><button class="submit7" type="submit" name="delete2" id="delete2" value="delete" onclick="return confirmDone5()">Borrar</button></td>{/if}
			<td class="table_p_top">Tipo</td>
			<td class="table_p_top">Calle/Av</td>
			<td class="table_p_top">N&ordm;</td>
			<td class="table_p_top">Ciudad</td>
			<td class="table_p_top">Provincia</td>
			<td class="table_p_top">Comunidad</td>
			{* <td class="table_p_top">C&oacute;digo</td> *}
			<td class="table_p_top">Pa&iacute;s</td>
		</tr>
		{if $contact}
        {foreach from=$addresses item=address name=foo}      		
        		{if $smarty.foreach.foo.index < 1}
			<tr>
				{if $identity->user_type == "proprietary" || $identity->user_type == "employee" }
				<td class="table_input"><input type="hidden" id="form_addr_id" name="addr_id[]" value="{$address->getId()}" />
				<input type="checkbox" name="address_id[]" value="{$address->getId()}"></td>{/if}
				<td>{$address->profile->type|ucfirst}</td>
				<td class="links">{if $identity->user_type == "proprietary" || $identity->user_type == "employee" }<a class="fancybox fancybox.iframe" href="{geturl controller='direccion' action='editardireccion'}?id={$address->getId()}&popup=true">{$address->profile->street}</a>{else}{$address->profile->street}{/if}</td>
				<td>{$address->profile->house}</td>
				<td>{$address->profile->city}</td>
				<td>{$address->profile->province}</td>
				<td>{$address->profile->state}</td>
				{* <td>{$address->profile->postal_code}</td> *}
				<td>{$address->profile->country}</td>
			</tr>
			{break}{/if}
        {/foreach}
        	{else}
        {foreach from=$addresses item=address}      		
			<tr>
				{if $identity->user_type == "proprietary" || $identity->user_type == "employee" }
				<td class="table_input"><input type="hidden" id="form_addr_id" name="addr_id[]" value="{$address->getId()}" />
				<input type="checkbox" name="address_id[]" value="{$address->getId()}"></td>{/if}
				<td>{$address->profile->type|ucfirst}</td>
				<td class="links">{if $identity->user_type == "proprietary" || $identity->user_type == "employee" }<a class="fancybox fancybox.iframe" href="{geturl controller='direccion' action='editardireccion'}?id={$address->getId()}">{$address->profile->street}</a>{else}{$address->profile->street}{/if}</td>
				<td>{$address->profile->house}</td>
				<td>{$address->profile->city}</td>
				<td>{$address->profile->province}</td>
				<td>{$address->profile->state}</td>
				{* <td>{$address->profile->postal_code}</td> *}
				<td>{$address->profile->country}</td>
			</tr>
        {/foreach}
		{/if}	
       </table>
{/if}