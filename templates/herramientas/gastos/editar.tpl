{include file='header.tpl' section='gastos'}
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Editar Nota de Gasto:</h3></label>
</div>
<form method="post" id="expense_id" enctype="multipart/form-data" action="{geturl action='editar'}?id={$fp->expense->getId()}">

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
    
    {* if $fp->expense_consecutive}
    <div class="row" id="form_consecutive_">
        <label for="form_consecutive_">Consecutivo Gasto:</label>
        <input type="text" id="form_consecutive" class="stored" name="expense_consecutive" value="{$fp->expense_consecutive}" placeholder="Ej: 282"/>
        {include file="lib/error.tpl" error=$fp->getError('expense_consecutive')}
    </div>
    {else}
    {/if *}
    <input type="hidden" id="form_consecutive" class="stored" name="expense_consecutive" value="" />
    <input type="hidden" id="form_currency" class="stored" name="currency" value="{$fp->currency}">
    
	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_expense_number_">
		        <label for="form_expense_number__">Nota de Gasto N&ordm; <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_expense_number" name="expense_number" value="{$fp->expense_number}" onkeypress='validate(event)' placeholder="Ej: 999"/>
		        {include file="lib/error.tpl" error=$fp->getError('expense_number')}
	   		</div>
		    <div class="row" id="form_invc_valid_">
		    	<label for="form_invc_vali">Vencimiento:</label>
		        <select class="frecuency stored" id="form_expense_vali" name="expense_valid">
					<option value="0.00" {if $fp->expense_valid == '0.00'} selected="selected" {/if}>Contado</option>
					<option value="7" {if $fp->expense_valid == '7'} selected="selected" {/if}>7 d&iacute;as</option>
					<option value="15" {if $fp->expense_valid == '15'} selected="selected" {/if}>15 d&iacute;as</option>
					<option value="21" {if $fp->expense_valid == '21'} selected="selected" {/if}>21 d&iacute;as</option>
					<option value="30" {if $fp->expense_valid == '30'} selected="selected" {/if}>30 d&iacute;as</option>
					<option value="45" {if $fp->expense_valid == '45'} selected="selected" {/if}>45 d&iacute;as</option>
					<option value="60" {if $fp->expense_valid == '60'} selected="selected" {/if}>60 d&iacute;as</option>
					<option value="75" {if $fp->expense_valid == '75'} selected="selected" {/if}>75 d&iacute;as</option>
					<option value="90" {if $fp->expense_valid == '90'} selected="selected" {/if}>90 d&iacute;as</option>
					<option value="120" {if $fp->expense_valid == '120'} selected="selected" {/if}>120 d&iacute;as</option>
					<option value="180" {if $fp->expense_valid == '180'} selected="selected" {/if}>180 d&iacute;as</option>
				</select>
		        {* include file="lib/error.tpl" error=$fp->getError('expense_valid') *}
		    </div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_expense_date_">
		        <label for="form_expense_date_">Fecha <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_expense_date" name="expense_date" value="{$fp->expense_date}" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
		        {include file="lib/error.tpl" error=$fp->getError('expense_date')}
		    </div>
		    <div class="row" id="form_expense_type">
		    	<label for="form_expense_type">Tipo de Gasto:</label>
		        <select class="frecuency stored" id="form_expense_type" name="expense_type">
					<option value="Alquileres" {if $fp->expense_type == 'Alquileres'} selected="selected" {/if}>Alquileres</option>
					<option value="Reparaciones" {if $fp->expense_type == 'Reparaciones'} selected="selected" {/if}>Reparaciones</option>
					<option value="Servicios Prof. Independientes" {if $fp->expense_type == 'Servicios Prof. Independientes'} selected="selected" {/if}>Servicios Prof. Independientes</option>
					<option value="Viajes y Transportes" {if $fp->expense_type == 'Viajes y Transportes'} selected="selected" {/if}>Viajes y Transportes</option>
					<option value="Primas de Seguros" {if $fp->expense_type == 'Primas de Seguros'} selected="selected" {/if}>Primas de Seguros</option>
					<option value="Marketing y Publicidad" {if $fp->expense_type == 'Marketing y Publicidad'} selected="selected" {/if}>Marketing y Publicidad</option>	
					<option value="Manutención" {if $fp->expense_type == 'Manutención'} selected="selected" {/if}>Manutenci&oacute;n</option>
					<option value="Oficina" {if $fp->expense_type == 'Oficina'} selected="selected" {/if}>Oficina</option>
					<option value="Suministros" {if $fp->expense_type == 'Suministros'} selected="selected" {/if}>Suministros</option>
					<option value="Mercaderías" {if $fp->expense_type == 'Mercaderías'} selected="selected" {/if}>Mercader&iacute;as</option>	
					<option value="Empleados" {if $fp->expense_type == 'Empleados'} selected="selected" {/if}>Empleados</option>
					<option value="Gastos Financieros" {if $fp->expense_type == 'Gastos Financieros'} selected="selected" {/if}>Gastos Financieros</option>
					<option value="Tributos" {if $fp->expense_type == 'Tributos'} selected="selected" {/if}>Tributos</option>
					<option value="Gastos Varios" {if $fp->expense_type == 'Gastos Varios'} selected="selected" {/if}>Gastos Varios</option>
				</select>
		        {include file="lib/error.tpl" error=$fp->getError('expense_type')}
		    </div>
		</div>
	</div>
    
   

	<div class="row">
    {if $company|@count == 0}
         <label for="form_company_ids">Proveedor <strong>&#x28;&#x2A;&#x29;</strong>:</label>
    		<a class="fancybox fancybox.iframe submit2" href="{geturl controller='cexpense' action='agregarcompania'}?document_id={$fp->expense->getId()}">Agregar Proveedor</a>
    		<input type="hidden" id="form_add_check" name="add_check" value="false">
    		{include file="lib/error.tpl" error=$fp->getError('add_check')}
    {else}<input type="hidden" id="form_add_check" name="add_check" value="true">
    <label for="form_company_ids">Proveedor <strong>&#x28;&#x2A;&#x29;</strong>:</label>
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
	  <td ><input type="checkbox" name="comp_id" value="{$comp->company_id}"></td>
	  <td class="links"><span><a class="fancybox fancybox.iframe" href="{geturl controller='cexpense' action='editarcompania'}?id={$comp->company_id}&document_id={$fp->expense->getId()}">
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
		    <div class="row" id="form_invoice_number_">
		   		 <label for="form_invoice_number__">N&ordm; de Factura:</label>
		        <input type="text" class="stored" id="form_invoice_number" name="invoice_number" value="{$fp->invoice_number}" placeholder="Ej: A201"/>
		        {include file="lib/error.tpl" error=$fp->getError('invoice_number')}
		    </div>
		</div>
		<div class="form_right">
		    {foreach from=$fp->expenseDocument key='key' item='label'}
			    <div class="row" id="form_{$key}_container">
			                		<label for="form_{$key}">Adjuntar imagen de factura original:</label>
			             		<input type="file" class="files" id="form_{$key}" name="{$key}" value="{$fp->$key}"/>
			             		{assign var="url" value=$fp->$key}
			             		{if $url}<a href="/documents/expenses/documents/{$url}" target="_blank">Descargar</a>{/if}
			                    {include file="lib/error.tpl" error=$fp->getError($key)}
				</div>
		    {/foreach}
		</div>
	</div>
	
	<div class="form_box">
		<div class="form_left">
		 	<div class="row" id="form_contact_container">
		        <label for="form_contact_ids">Contacto:</label>
		        	    <input type="text" class="stored" id="form_contact" name="expense_contact" value="{$fp->expense_contact}" placeholder="Nombre Apellido"/>
		        		<input type="hidden" class="stored" id="form_contact_id" name="contact_id" value="{$fp->contact_id}" />
		        		<input type="hidden" class="stored" id="form_contact_address" name="contact_address" value="{$fp->company_address}" />
		        
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
		        	    <input type="text" class="stored" id="form_project" name="expense_project" value="{$fp->expense_project}" placeholder="Ej: Proyecto Vi&ntilde;edo"/>
		        		<input type="hidden" class="stored" id="form_project_id" name="project_id" value="{$fp->project_id}" />
		        
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

   <div class="form_box">
    {if $items|@count == 0}
    		<label for="form_item">Item(s) <strong>&#x28;&#x2A;&#x29;</strong>:</label>	
    		<a class="fancybox fancybox.iframe submit2" href="{geturl action='agregaritem'}?document_type=expense&document_id={$fp->expense->getId()}">Agregar Nuevo Item</a>
    		{include file='herramientas/gastos/item.tpl' document_type='expense' document_id=$fp->expense->getId()}
	    	<input type="hidden" id="form_add_check2" name="add_check2" value="false">
	    	{include file="lib/error.tpl" error=$fp->getError('add_check2')}
    {else}
    		<label for="form_item">Item(s) <strong>&#x28;&#x2A;&#x29;</strong>:</label>
    		{include file='herramientas/gastos/item.tpl' document_type='expense' document_id=$fp->expense->getId()}
    		<a class="fancybox fancybox.iframe submit2" href="{geturl action='agregaritem'}?document_type=expense&document_id={$fp->expense->getId()}">Agregar Nuevo Item</a>
    		<input type="hidden" id="form_add_check2" name="add_check2" value="true">
    {/if}
	</div>
	
	<div class="form_box">
	    <div class="row" id="form_subtotal_">
	        <label for="form_subtotal_">Subtotal {if $fp->currency == 'Peso Argentino'}(&#36;){elseif $fp->currency == 'Peso Boliviano'}(b&#36){elseif $fp->currency == 'Peso Chileno'}(&#36;){elseif $fp->currency == 'Peso Colombiano'}(&#36;){elseif $fp->currency == 'Colon'}(&#162;){elseif $fp->currency == 'Peso Dominicano'}(&#36;){elseif $fp->currency == 'Dolar'}(&#36;){elseif $fp->currency == 'Euro'}(&#128;){elseif $fp->currency == 'Quetzal'}(Q){elseif $fp->currency == 'Lempira'}(L){elseif $fp->currency == 'Peso Mexicano'}(&#36;){elseif $fp->currency == 'Cordoba'}(C&#36;){elseif $fp->currency == 'Balboa'}(B/.){elseif $fp->currency == 'Guarani'}(&#8370;){elseif $fp->currency == 'Nuevo Sol'}(S/.){elseif $fp->currency == 'Libra'}(&#163;){elseif $fp->currency == 'Peso Uruguayo'}(&#36;){elseif $fp->currency == 'Bolivar'}(Bs.){else}(&#128;){/if}:</label>
	        <input type="text" id="form_subtotal" name="subtotal" value="{$subtotal}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" />
	        {include file="lib/error.tpl" error=$fp->getError('subtotal')}
	    </div>
    </div>
    
    <div class="form_box">
	    <div class="row" id="form_discount_">
	        <label for="form_discount_">Descuento (&#37;):</label>
	        <input type="text" class="stored" id="form_discount" name="discount" value="{$fp->discount}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" data-v-max="100" />
	        {include file="lib/error.tpl" error=$fp->getError('discount')}
	    </div>
    </div>
    
    <div class="form_box">
	    <div class="row" id="form_base_">
	        <label for="form_base_">Base imponible {if $fp->currency == 'Peso Argentino'}(&#36;){elseif $fp->currency == 'Peso Boliviano'}(b&#36){elseif $fp->currency == 'Peso Chileno'}(&#36;){elseif $fp->currency == 'Peso Colombiano'}(&#36;){elseif $fp->currency == 'Colon'}(&#162;){elseif $fp->currency == 'Peso Dominicano'}(&#36;){elseif $fp->currency == 'Dolar'}(&#36;){elseif $fp->currency == 'Euro'}(&#128;){elseif $fp->currency == 'Quetzal'}(Q){elseif $fp->currency == 'Lempira'}(L){elseif $fp->currency == 'Peso Mexicano'}(&#36;){elseif $fp->currency == 'Cordoba'}(C&#36;){elseif $fp->currency == 'Balboa'}(B/.){elseif $fp->currency == 'Guarani'}(&#8370;){elseif $fp->currency == 'Nuevo Sol'}(S/.){elseif $fp->currency == 'Libra'}(&#163;){elseif $fp->currency == 'Peso Uruguayo'}(&#36;){elseif $fp->currency == 'Bolivar'}(Bs.){else}(&#128;){/if}:</label>
	        {assign var='current_base' value=$subtotal * (100 - $fp->discount) * 0.01}
	        <input type="text" id="form_base" name="base" value="{$current_base}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" />
	        {include file="lib/error.tpl" error=$fp->getError('base')}
	    </div>
    </div>
    
	{include file='herramientas/gastos/taxes.tpl'}
    
    <div class="form_box">
	    <div class="row" id="form_retention_">
	        <label for="form_retention_">Retenci&oacute;n (&#37;):</label>
	        {assign var='current_ret' value=$default_retention_provider} {assign var='current_retention' value=$current_base * $default_retention_provider * 0.01}
	        <input type="text" class="stored" id="form_retention" name="retention" value="{if $current_ret}{$current_ret}{else}0.00{/if}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" />
	        {include file="lib/error.tpl" error=$fp->getError('retention')}
	    </div>
    </div>
    
    <div class="form_box">
	    <div class="row" id="form_total_">
	        <label for="form_total_">Total ({if $fp->currency == 'Peso Argentino'}ARS &#36;{elseif $fp->currency == 'Peso Boliviano'}b&#36{elseif $fp->currency == 'Peso Chileno'}CLP &#36;{elseif $fp->currency == 'Peso Colombiano'}COP &#36;{elseif $fp->currency == 'Colon'}&#162;{elseif $fp->currency == 'Peso Dominicano'}DOP &#36;{elseif $fp->currency == 'Dolar'}USD &#36;{elseif $fp->currency == 'Euro'}&#128;{elseif $fp->currency == 'Quetzal'}QTD Q{elseif $fp->currency == 'Lempira'}HNL L{elseif $fp->currency == 'Peso Mexicano'}MXN &#36;{elseif $fp->currency == 'Cordoba'}C&#36;{elseif $fp->currency == 'Balboa'}PAB B/.{elseif $fp->currency == 'Guarani'}&#8370;{elseif $fp->currency == 'Nuevo Sol'}PEN S/.{elseif $fp->currency == 'Libra'}&#163;{elseif $fp->currency == 'Peso Uruguayo'}UYU &#36;{elseif $fp->currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}):</label>
	        {assign var='current_total' value=$current_base  + $total_iva_1 + $total_iva_2 - $current_retention}
	        <input type="text" id="form_total" name="total" value="{$current_total}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" />
	        {include file="lib/error.tpl" error=$fp->getError('total')}
	    </div>
    </div>
    
    <div class="form_box">
	    <div class="row" id="form_recc_">
	    		<span for="form_recc_">Esta factura se emite en RECC:</span>
	    		<input type="checkbox" class="stored" id="form_recc" name="recc" value="true" {if $fp->recc  == "true"}checked="checked"{elseif $default_recc_ == "true"}checked="checked"{/if}> 
		</div>
	</div>
    
    {* <div class="row" id="form_expense_paid_">
    		<span for="form_expense_paid_">Gasto Pagado:</span>
    		<input type="checkbox" class="stored" id="form_expense_paid" name="expense_paid" value="true" {if $fp->expense_paid}checked="checked"{/if}> 
	</div>
	
	    <div class="row" id="form_expense_terms">
    		<label for="form_expense_terms">T&eacute;rminos:</label>
    		<textarea id="form_expense_terms" class="big_textarea stored" name="terms" rows="6" cols="50" placeholder="Coloca aqu&iacute; cualquier condici&oacute;n de pago o mensaje que desees que aparezca en la Nota de Gasto.">{$fp->terms}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('terms')}
    	</div> *}
    	
	<div class="row" id="form_expense_notes">
    		<label for="form_expense_notes">Notas personales:</label>
    		<textarea id="form_expense_notes" class="big_textarea stored" name="notes" rows="6" cols="50" placeholder="Coloca aqu&iacute; cualquier nota o comentario personal sobre este documento. Lo que escribas s&oacute;lo ser&aacute; visible para los usuarios de tu cuenta.">{$fp->notes}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('notes')}
    	</div>
    	
    	<div class="form_box">
		<div class="row">
	    		{if $identity->trial_expired}{else}<button class="submit" type="submit" name="edit" id="edit" value="edit">Actualizar</button>{/if}
	    		{* <span><a class="fancybox fancybox.iframe submit2" href="{geturl controller='herramientas/gastos' action='preview'}?id={$fp->expense->getId()}&popup=true">Vista Previa</a></span> *}
		</div>
	</div>
	<div class="form_box">
		<div class="row" id="form_contact_notes">
	    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
	    	</div>
	</div>
</form>

{include file='footer.tpl'}