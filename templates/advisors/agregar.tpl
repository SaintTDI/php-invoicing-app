{include file='header.tpl' section='advisors'}

<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Nuevo Advisor:</h3></label>
</div>
<form method="post" id="adv_id" action="{geturl action='agregar'}?id={$fp->advisor->getId()}" enctype="multipart/form-data">

    {if $fp->hasError()}
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    {/if}
    
    <div class="row" id="form_contact_first_name">
        <label for="form_contact_first_name">Nombre <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_contact_first_name" name="first_name" value="{$smarty.post.first_name}" placeholder="Nombre"/>
        {include file="lib/error.tpl" error=$fp->getError('first_name')}
    </div>
    
    <div class="row" id="form_contact_last_name">
        <label for="form_contact_last_name">Apellido <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_contact_last_name" name="last_name" value="{$smarty.post.last_name}" placeholder="Apellido"/>
        {include file="lib/error.tpl" error=$fp->getError('last_name')}
    </div>
    
 	<div class="row" id="form_company_container">
        <label for="form_company_ids">Empresa:</label>
        	    <input type="text" id="form_company" name="company" value="{if $smarty.post.company}{$smarty.post.company}{else}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $company_id_[$b] == $id}{$company_[$b]|ucfirst}{break}{/if}{assign var='b' value=$b+1}{/foreach}{/if}" placeholder="Empresa, Sociedad o Persona"/>
        		<input type="hidden" id="form_company_id" name="company_id" value="{assign var='id' value=$advisor->profile->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $company_id_[$b] == $id}{$company_id_[$b]}{break}{/if}{assign var='b' value=$b+1}{/foreach}" />
        		<input type="hidden" id="form_address_id" name="address_id" value="{assign var='b' value=0}{foreach from=$companieslist item=company}{if $company_id_[$b] == $id}{if $address_id_[$b]|is_array}{foreach from=$address_id_[$b] item=address}{$address}{break}{/foreach}{else}{$address_id_[$b]}{break}{/if}{/if}{assign var='b' value=$b+1}{/foreach}" />

			<input type="hidden" id="form_comp" name="comp_id" value="0" />
  	</div>
  	
    <div class="row" id="form_contact_position">
        <label for="form_contact_position">Posici&oacute;n:</label>
        <input type="text" id="form_contact_position" name="position" value="{$smarty.post.position}" placeholder="Posici&oacute;n"/>
        {include file="lib/error.tpl" error=$fp->getError('position')}
    </div>
    
    <div class="row" id="form_contact_email"> 
        <label for="form_contact_email">Email Principal <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_contact_email" name="email" value="{$smarty.post.email}" placeholder="Ej: ejemplo@webproadmin.com"/>
        {include file="lib/error.tpl" error=$fp->getError('email')}
    </div>
    
    <div class="row" id="form_contact_email2">
        <label for="form_contact_email2">Email Secundario:</label>
        <input type="text" id="form_contact_email2" name="email2" value="{$smarty.post.email2}" placeholder="Ej: ejemplo@webproadmin.com"/>
        {include file="lib/error.tpl" error=$fp->getError('email2')}
    </div>
    {*
    <div class="row" id="form_mobile_container">
        <label for="form_mobile">Tel&eacute;fono M&oacute;vil:</label>
        <input class="phone" type="text" id="form_mobile_country" name="mobile_country" value="{$smarty.post.mobile_country}" onkeypress='validate(event)' placeholder="Ej: 34"/>
        <input class="phone" type="text" id="form_mobile_area" name="mobile_area" value="{$smarty.post.mobile_area}" onkeypress='validate(event)' placeholder="Ej: 93"/>
        <input class="social" type="text" id="form_mobile" name="mobile" value="{$smarty.post.mobile}" onkeypress='validate(event)' placeholder="Ej: 807117222"/>
        {include file="lib/error.tpl" error=$fp->getError('mobile')}
    </div>
    
    <div class="row" id="form_phone_container">
        <label for="form_phone">Tel&eacute;fono Principal:</label>
        <input class="phone" type="text" id="form_phone_country" name="phone_country" value="{$smarty.post.phone_country}" onkeypress='validate(event)' placeholder="Ej: 34"/>
        <input class="phone" type="text" id="form_phone_area" name="phone_area" value="{$smarty.post.phone_area}" onkeypress='validate(event)' placeholder="Ej: 93"/>
        <input class="social" type="text" id="form_phone" name="phone" value="{$smarty.post.phone}" onkeypress='validate(event)' placeholder="Ej: 807117222"/>
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
    		<textarea id="form_contact_notes" name="notes" rows="6" cols="50" placeholder="Coloca aqu&iacute; cualquier nota o comentario personal sobre este Advisor. Lo que escribas s&oacute;lo ser&aacute; visible para los usuarios de tu cuenta.">{$smarty.post.notes}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('notes')}
    	</div>

	<div class="row">
    		<button class="submit" type="submit" name="add" id="add" value="add">Enviar Invitaci&oacute;n</button> 
	</div>

</form>

{include file='footer.tpl'}