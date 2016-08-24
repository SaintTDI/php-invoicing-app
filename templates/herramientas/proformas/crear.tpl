{include file='header.tpl' section='proformas'}
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Nueva Factura Pro-Forma:</h3></label>
</div>
<form method="post" id="prof_id" action="{geturl action='crear'}?id={$fp->proforma->getId()}">

    {if $fp->hasError()}
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    {/if}
    
    {if $comp22 == ""}
	{literal}
    <script type="text/javascript">
      jQuery(document).ready(function() {
   		var r = confirm('Por favor completa el perfil de tu Empresa antes de crear una Factura Pro-Forma.');
        if (r) {
            window.location.href = "/cuenta/empresa";
        }
        else {
        		return false;
        }
      });
   </script>
   {/literal}
   {/if}
   {* if $default_consecutive}
    <div class="row" id="form_consecutive_">
        <label for="form_consecutive_">Consecutivo Pro-Forma:</label>
        <input type="text" class="stored" id="form_consecutive" name="proforma_consecutive" value="{$default_consecutive + $proformacount}" placeholder="Ej: 282"/>
        {include file="lib/error.tpl" error=$fp->getError('proforma_consecutive')}
    </div>
    {else}
    {/if *}
	<input type="hidden" class="stored" id="form_consecutive" name="proforma_consecutive" value="{$smarty.post.proforma_consecutive}" />
	<input type="hidden" class="stored" id="form_currency" name="currency" value="{if $smarty.post.currency}{$smarty.post.currency}{else}{$default_currency}{/if}">

	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_proforma_number_">
		        <label for="form_proforma_number_">N&ordm; de Pro-Forma <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_proforma_number" name="proforma_number" value="{if $smarty.post.proforma_number}{$smarty.post.proforma_number}{else}{$proformacount + 1}{/if}" onkeypress='validate(event)' placeholder="Ej: 999"/>
		        {include file="lib/error.tpl" error=$fp->getError('proforma_number')}
		    </div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_proforma_date_">
		        <label for="form_proforma_date_">Fecha <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_proforma_date" name="proforma_date" value="{if $smarty.post.proforma_date}{$smarty.post.proforma_date}{else}{$ts_date}{/if}" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
		        {include file="lib/error.tpl" error=$fp->getError('proforma_date')}
		    </div>
		</div>
	</div>

	<div class="form_box">
	    <div class="row" id="form_invc_valid_">
	    	<label for="form_invc_vali">Validez:</label>
	        <select class="frecuency stored" id="form_proforma_vali" name="proforma_valid">
				<option value="1" {if $smarty.post.proforma_valid == '1'}selected="selected" {/if}>1 d&iacute;a</option>
				<option value="7" {if $smarty.post.proforma_valid == '7'}selected="selected" {/if}>7 d&iacute;as</option>
				<option value="15" {if $smarty.post.proforma_valid == '15'}selected="selected" {/if}>15 d&iacute;as</option>
				<option value="30" {if $smarty.post.proforma_valid == '30'}selected="selected" {/if}>30 d&iacute;as</option>
				<option value="45" {if $smarty.post.proforma_valid == '45'}selected="selected" {/if}>45 d&iacute;as</option>
				<option value="60" {if $smarty.post.proforma_valid == '60'}selected="selected" {/if}>60 d&iacute;as</option>
			</select>
	        {* include file="lib/error.tpl" error=$fp->getError('proforma_valid') *}
	    </div>
	</div>

   {* 
    <div class="row" id="form_proforma_frequency">
    	<label for="form_proforma_frequency">Frecuencia:</label>
        <select class="frecuency stored" id="form_proforma_frequency" name="proforma_frequency">
			<option value="una vez" {if $smarty.post.proforma_frequency == 'una vez'}selected="selected" {/if}>Una vez</option>
			<option value="semanal" {if $smarty.post.proforma_frequency == 'semanal'}selected="selected" {/if}>Semanal</option>
			<option value="quincenal" {if $smarty.post.proforma_frequency == 'quincenal'}selected="selected" {/if}>Quincenal</option>
			<option value="mensual" {if $smarty.post.proforma_frequency == 'mensual'}selected="selected" {/if}>Mensual</option>
			<option value="bimensual" {if $smarty.post.proforma_frequency == 'bimensual'}selected="selected" {/if}>Bimensual</option>
			<option value="trimestral" {if $smarty.post.proforma_frequency == 'trimestral'}selected="selected" {/if}>Trimestral</option>
			<option value="semestral" {if $smarty.post.proforma_frequency == 'semestral'}selected="selected" {/if}>Semestral</option>
		</select>
        {include file="lib/error.tpl" error=$fp->getError('proforma_frequency')}
    </div>
    *}
    
	<div class="row">
    {if $company|@count == 0}
         <label for="form_company_ids">Cliente:</label>
    		<a class="fancybox fancybox.iframe submit2" href="{geturl controller='cproforma' action='agregarcompania'}?document_id={$inv_id}">Agregar Cliente</a>
    		<input type="hidden" id="form_add_check" name="add_check" value="false">
    		{include file="lib/error.tpl" error=$fp->getError('add_check')}
    {else}<input type="hidden" id="form_add_check" name="add_check" value="true">
    <label for="form_company_ids">Cliente:</label>
    <table class="table_p2">{assign var='counter' value=0}
    {foreach from=$company item=comp}
    {if $comp->profile->thecompany != ""}
    {if $counter == 0}{assign var='counter' value=$counter +1}
    <tr>
      <td class="table_button"><button class="submit7" type="submit" name="delete3" id="delete3" value="delete">Borrar</button></td>
	  <td class="table_p_top">Nombre</td>
	  <td class="table_p_top">Calle</td>
	  <td class="table_p_top">Casa/Edificio</td>
	  <td class="table_p_top">Ciudad</td>
	  <td class="table_p_top">Pa&iacute;s</td>
	</tr>
	<tr>
	  <td class="table_input"><input type="checkbox" name="comp_id" value="{$comp->company_id}"></td>
	  <td class="links"><span><a class="fancybox fancybox.iframe" href="{geturl controller='cproforma' action='editarcompania'}?id={$comp->company_id}&document_id={$inv_id}">
	  {$comp->profile->thecompany|ucfirst}</a></span></td>
	  <td>{$comp->profile->street|ucfirst}</td>
	  <td>{$comp->profile->house|ucfirst}<input type="hidden" id="form_identification" name="identification" value="{$comp->profile->identification}" /><input type="hidden" id="form_street_company" name="street" value="{$comp->profile->street}" /><input type="hidden" id="form_house_company" name="house" value="{$comp->profile->house}" /><input type="hidden" id="form_city_company" name="city" value="{$comp->profile->city}" /><input type="hidden" id="form_province_company" name="province" value="{$comp->profile->province}" /><input type="hidden" id="form_state_company" name="state" value="{$comp->profile->state}" /><input type="hidden" id="form_postal_code_company" name="postal_code" value="{$comp->profile->postal_code}" /><input type="hidden" id="form_country_company" name="country" value="{$comp->profile->country}" /><input type="hidden" id="form_email" name="email_c" value="{$comp->profile->email_c}" /><input type="hidden" id="form_email2" name="email2" value="{$comp->profile->email2}" /><input type="hidden" id="form_company_website" name="company_website" value="{$comp->profile->company_website}"/><input type="hidden" id="form_phone_country" name="phone_country" value="{$comp->profile->phone_country}" /><input type="hidden" id="form_phone_area" name="phone_area" value="{$comp->profile->phone_area}" /><input type="hidden" id="form_phone" name="phone" value="{$comp->profile->phone}" /><input type="hidden" id="form_phone2_country" name="phone2_country" value="{$comp->profile->phone2_country}" /><input type="hidden" id="form_phone2_area" name="phone2_area" value="{$comp->profile->phone2_area}" /><input type="hidden" id="form_phone2" name="phone2" value="{$comp->profile->phone2}" /><input type="hidden" id="form_fax_country" name="fax_country" value="{$comp->profile->fax_country}" /><input type="hidden" id="form_fax_area" name="fax_area" value="{$comp->profile->fax_area}" /><input type="hidden" id="form_fax" name="fax" value="{$comp->profile->fax}" /></td>
	  <td>{$comp->profile->city|ucfirst}</td>
	  <td>{$comp->profile->country|ucfirst}<input type="hidden" id="form_company" name="thecompany" value="{$comp->profile->thecompany}" />
	  <input type="hidden" id="form_company_id" name="company_id" value="{$comp->company_id}" /><input type="hidden" id="form_original_company_id" name="original_company_id" value="{$comp->profile->original_company_id}" />
	  <input type="hidden" id="form_original_company_address" name="original_company_address" value="{$comp->profile->original_company_address}" /></td>{assign var='default_retention_provider' value=$comp->profile->irpf}{assign var='default_recc_' value=$comp->profile->recc}
	</tr>
	{/if}
	{/if}
   {/foreach}
   </table>
 	{/if}
  	</div>
  	
	<div class="form_box">
		<div class="form_left">
		 	<div class="row" id="form_contact_container">
		        <label for="form_contact_ids">Contacto:</label>
		        	    <input type="text" class="stored" id="form_contact" name="proforma_contact" value="{$smarty.post.proforma_contact}" placeholder="Nombre Apellido"/>
		        		<input type="hidden" class="stored" id="form_contact_id" name="contact_id" value="{$smarty.post.contact_id}" />
		        		<input type="hidden" class="stored" id="form_contact_address" name="contact_address" value="{$smarty.post.contact_address}" />
		        		{literal}
		        		<script type="text/javascript">
					jQuery(function(){
		  			var contacts = [
		    			{/literal}{assign var='i' value=0}{foreach from=$contactslist item=contact}{literal}{ value: '{/literal}{$contact_[$i]}{literal}', data: '{/literal}{$data_c[$i]}{literal}', address: '{/literal}{$address_c[$i]}{literal}' },{/literal}{assign var='i' value=$i+1}{/foreach}{literal}
		  			];
		  
		  					// setup autocomplete function pulling from contacts[] array
		  						jQuery('#form_contact').autocomplete({
		    						lookup: contacts,
		    						onSelect: function (suggestion) {
		    						if (suggestion.value && suggestion.data){
		    							jQuery('#form_contact').val(suggestion.value);
		      						jQuery('#form_contact_id').val(suggestion.data);
		      						jQuery('#form_contact_address').val(suggestion.address);
		      						jQuery('#form_contact').trigger('change');
		      					} 
		    					}
		  				});
		  				
					});
		        		</script>
		        		{/literal}
		  	</div>
		</div>
		<div class="form_right">
		 	<div class="row" id="form_project_container">
		        <label for="form_project_ids">Proyecto:</label>
		        	    <input type="text" class="stored" id="form_project" name="proforma_project" value="{$smarty.post.proforma_project}" placeholder="Ej: Proyecto Vi&ntilde;edo"/>
		        		<input type="hidden" class="stored" id="form_project_id" name="project_id" value="{$smarty.post.project_id}" />
		        
		        		{literal}
		        		<script type="text/javascript">
					jQuery(function(){
		  			var projects = [
		    			{/literal}{assign var='i' value=0}{foreach from=$projectslist item=project}{literal}{ value: '{/literal}{$project_[$i]}{literal}', data: '{/literal}{$data_p[$i]}{literal}' },{/literal}{assign var='i' value=$i+1}{/foreach}{literal}
		  			];
		  
		  					// setup autocomplete function pulling from projects[] array
		  						jQuery('#form_project').autocomplete({
		    						lookup: projects,
		    						onSelect: function (suggestion) {
		    						if (suggestion.value && suggestion.data){
		    							jQuery('#form_project').val(suggestion.value);
		      						jQuery('#form_project_id').val(suggestion.data);
		      						jQuery('#form_project').trigger('change');
		      						
		      					} 
		    					}
		  				});
		  				
					});
		        		</script>
		        		{/literal}
		  	</div>
		</div>
	</div>

	<div class="row">
    {if $items|@count == 0}
    		<label for="form_item">Item(s):</label>	
    		<a class="fancybox fancybox.iframe submit2" href="{geturl action='agregaritem'}?document_type=proforma&document_id={$inv_id}">Agregar Nuevo Item</a>
    		{include file='herramientas/proformas/item.tpl' document_type='proforma' document_id=$inv_id}
	    	<input type="hidden" id="form_add_check2" name="add_check2" value="false">
	    	{include file="lib/error.tpl" error=$fp->getError('add_check2')}
    {else}
    		<label for="form_item">Item(s):</label>
    		{include file='herramientas/proformas/item.tpl' document_type='proforma' document_id=$inv_id}
    		<a class="fancybox fancybox.iframe submit2" href="{geturl action='agregaritem'}?document_type=proforma&document_id={$inv_id}">Agregar Nuevo Item</a>
		<input type="hidden" id="form_add_check2" name="add_check2" value="true">
    {/if}
    </div>
    
	<div class="form_box">
	    <div class="row" id="form_subtotal_">
	        <label for="form_subtotal_">Subtotal {if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if}:</label>
	        <input type="text" id="form_subtotal" name="subtotal" value="{$subtotal}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" />
	        {include file="lib/error.tpl" error=$fp->getError('subtotal')}
	    </div>
	</div>
    
	<div class="form_box">
	    <div class="row" id="form_discount_">
	        <label for="form_discount_">Descuento (%):</label>
	        <input type="text" class="stored" id="form_discount" name="discount" value="{if $smarty.post.discount}{$smarty.post.discount}{else}0{/if}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" data-v-max="100"/>
	        {include file="lib/error.tpl" error=$fp->getError('discount')}
	    </div>
	</div>

	<div class="form_box">
	    <div class="row" id="form_base_">
	        <label for="form_base_">Base imponible {if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if}:</label>
	        {assign var='current_base' value=$subtotal}
	        <input type="text" id="form_base" name="base" value="{$current_base}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99"  />
	        {include file="lib/error.tpl" error=$fp->getError('base')}
	    </div>
	</div>

	{include file='herramientas/proformas/taxes.tpl'}
	
	<div class="form_box">
	   <div class="row" id="form_retention_">
	        <label for="form_retention_">Retenci&oacute;n (&#37;):</label>
	         {assign var='current_retention' value=$default_retention}{assign var='current_ret' value=$current_retention * 0.01 * $current_base}
	        <input type="text" class="stored" id="form_retention" name="retention" value="{if $current_retention}{$current_retention}{else}0{/if}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99"  />
	        <input type="hidden" class="stored" id="form_retention_p" name="retention_p" value="{if $current_retention}{$current_retention}{else}0{/if}"/><input type="hidden" id="form_recc" name="recc" value="{$default_recc_}"/>
	        {include file="lib/error.tpl" error=$fp->getError('retention')}
	    </div>
	</div>
  
	<div class="form_box">
	    <div class="row" id="form_total_">
	        <label for="form_total_">Total ({if $default_currency == 'Peso Argentino'}ARS &#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}CLP &#36;{elseif $default_currency == 'Peso Colombiano'}COP &#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}DOP &#36;{elseif $default_currency == 'Dolar'}USD &#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}QTD Q{elseif $default_currency == 'Lempira'}HNL L{elseif $default_currency == 'Peso Mexicano'}MXN &#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}PAB B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}PEN S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}UYU &#36;{elseif $default_currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}):</label>
	        {assign var='current_total' value=$current_base  + $total_iva_1 + $total_iva_2 - $current_ret}
	        <input type="text" id="form_total" name="total" value="{$current_total}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" />
	        {include file="lib/error.tpl" error=$fp->getError('total')}
	    </div>
	</div>

	{*
    <div class="row" id="form_proforma_copy_">
    		<span for="form_proforma_copy_">Copia de Pro-Forma:</span>
    		<input type="checkbox" class="stored" id="form_proforma_copy" name="proforma_copy" value="true" {if $smarty.post.proforma_copy}checked="checked"{/if}> 
	</div>
	*}
	<div class="row" id="form_proforma_terms">
    		<label for="form_proforma_terms">T&eacute;rminos:</label>
    		<textarea id="form_proforma_terms" class="big_textarea stored" name="terms" rows="6" cols="50" placeholder="Coloca aqu&iacute; cualquier condici&oacute;n de pago o mensaje que desees que aparezca en la Factura Pro-Forma.">{$smarty.post.terms}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('terms')}
    	</div>
    	
	<div class="row" id="form_proforma_notes">
    		<label for="form_proforma_notes">Notas personales:</label>
    		<textarea id="form_proforma_notes" class="big_textarea stored" name="notes" rows="6" cols="50" placeholder="Coloca aqu&iacute; cualquier nota o comentario personal sobre este documento. Lo que escribas s&oacute;lo ser&aacute; visible para los usuarios de tu cuenta.">{$smarty.post.notes}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('notes')}
    	</div>
    	
    	<div class="form_box">
		<div class="row">
	    		{if $identity->trial_expired}{else}<button class="submit" type="submit" name="add" id="add" value="add" 	{if $comp22 == ""}disabled="disabled"{/if}>Guardar</button>{/if} 
		</div>
	</div>
	<div class="form_box">
		<div class="row" id="form_contact_notes">
	    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
	    	</div>
	</div>
</form>

{include file='footer.tpl'}