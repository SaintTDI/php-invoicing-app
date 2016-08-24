{include file='header.tpl' section='clientes'}

<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Editar Cliente:</h3></label>
</div>
<form method="post" id="client_id_" action="{geturl action='editar'}?id={$fp->client->getId()}" enctype="multipart/form-data" onsubmit="onSubmitForm()">

    {if $fp->hasError()}
        		<div class="error">
            		Por favor revisa los campos resaltados.
        		</div>
    {else}
    		{if $smarty.get.submitted}
        		<div class="success">
            		Tu informaci&oacute;n fue guardada con &eacute;xito.
        		</div>
        	{/if}
    {/if}

    <div class="row" id="form_contact_first_name">
        <label for="form_contact_first_name">Nombre <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_contact_f" name="first_name" value="{$fp->first_name}" placeholder="Nombre"/>
        {include file="lib/error.tpl" error=$fp->getError('first_name')}
    </div>

    <div class="row" id="form_contact_last_name">
        <label for="form_contact_last_name">Apellido <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_contact_last_name" name="last_name" value="{$fp->last_name}" placeholder="Apellido"/>
        {include file="lib/error.tpl" error=$fp->getError('last_name')}
    </div>

 	<div class="row" id="form_company_container">
        <label for="form_company_ids">Empresa:</label>
        	    <input type="text" id="form_company" name="company" value="{if $fp->company_id}{assign var='id' value=$fp->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $data_[$b] == $id}{$company_[$b]|ucfirst}{break}{/if}{assign var='b' value=$b+1}{/foreach}{elseif $fp->thecompany && !$fp->company_id}{$fp->thecompany|ucfirst}{/if}" placeholder="Empresa, sociedad o persona"/>
        		<input type="hidden" id="form_company_id" name="company_id" value="{assign var='id' value=$fp->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $data_[$b] == $id}{$data_[$b]}{break}{/if}{assign var='b' value=$b+1}{/foreach}" />
        		<input type="hidden" id="form_address_id" name="address_id" value="{assign var='id' value=$fp->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $data_[$b] == $id}{if $address_[$b]|is_array}{foreach from=$address_[$b] item=address}{$address}{break}{/foreach}{else}{$address_[$b]}{break}{/if}{/if}{assign var='b' value=$b+1}{/foreach}" />

			 <input type="hidden" id="form_comp" name="comp_id" value="{$fp->company_id}" />
  	</div>
  	
    <div class="row" id="form_contact_position">
        <label for="form_contact_position">Posici&oacute;n:</label>
        <input type="text" id="form_contact_position" name="position" value="{$fp->position}" placeholder="Posici&oacute;n"/>
        {include file="lib/error.tpl" error=$fp->getError('position')}
    </div>
  
    <div class="row" id="form_contact_email">
        <label for="form_contact_email">Email Principal <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_contact_email" name="email" value="{$fp->email}" placeholder="Ej: ejemplo@webproadmin.com"/>
        {include file="lib/error.tpl" error=$fp->getError('email')}
    </div>
    
    <div class="row" id="form_contact_email2">
        <label for="form_contact_email2">Email Secundario:</label>
        <input type="text" id="form_contact_email2" name="email2" value="{$fp->email2}" placeholder="Ej: ejemplo@webproadmin.com"/>
        {include file="lib/error.tpl" error=$fp->getError('email2')}
    </div>
    {*
    <div class="row" id="form_mobile_container">
        <label for="form_mobile">Tel&eacute;fono M&oacute;vil:</label>
        <input class="phone" type="text" id="form_mobile_country" name="mobile_country" value="{$fp->mobile_country}" onkeypress='validate(event)' />
        <input class="phone" type="text" id="form_mobile_area" name="mobile_area" value="{$fp->mobile_area}" onkeypress='validate(event)' />
        <input type="text" id="form_mobile" name="mobile" value="{$fp->mobile}" onkeypress='validate(event)' />
        {include file="lib/error.tpl" error=$fp->getError('mobile')}
    </div>
    
    <div class="row" id="form_phone_container">
        <label for="form_phone">Tel&eacute;fono Principal:</label>
        <input class="phone" type="text" id="form_phone_country" name="phone_country" value="{$fp->phone_country}" onkeypress='validate(event)' />
        <input class="phone" type="text" id="form_phone_area" name="phone_area" value="{$fp->phone_area}" onkeypress='validate(event)' />
        <input type="text" id="form_phone" name="phone" value="{$fp->phone}" onkeypress='validate(event)' />
        {include file="lib/error.tpl" error=$fp->getError('phone')}
    </div>
 	*}
 	
 	<input type="hidden" id="form_invited" name="invited" value="{$invited}" />
 	
	{literal}<script type="text/javascript">
			jQuery(window).load(function(){
  			var products = [
			{/literal}{assign var='i' value=0}{foreach from=$companieslist item=company}{literal}{ data: '{/literal}{$company_id_[$i]}{literal}', value: '{/literal}{$company_[$i]}{literal}', address: '{/literal}{$address_id_[$i]}{literal}'},{/literal}{assign var='i' value=$i+1}{/foreach}{literal}
  			];
  					// setup autocomplete function pulling from companies[] array
  						jQuery('#form_company').autocomplete({
    						lookup: products,
    						onSelect: function (suggestion) {
    						if (suggestion.value){
							jQuery('#form_company_id').val(suggestion.data);
							jQuery('#form_company').val(suggestion.value);
							jQuery('#form_address_id').val(suggestion.address);					
      					} 
    					}
  				});
			});
	</script>{/literal}
 	
 	<div class="row" id="form_contact_notes">
    		<label for="form_contact_notes">Notas personales:</label>
    		<textarea id="form_contact_notes" name="notes" rows="6" cols="50" placeholder="Notas personales sobre el cliente">{$fp->notes}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('notes')}
    	</div>

	<div class="row">
		<label for="form_source">&nbsp;</label>
    		<button class="submit" type="submit" name="edit" id="edit" value="edit">Reenviar Invitaci&oacute;n</button> 
	</div>
	
	<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
    	</div>

</form>

{include file='footer.tpl'}