{include file='header.tpl' section='contacto' subsection='agregar'}
{literal}<script type="text/javascript"> 		
 			jQuery(document).ready(function() {
      				jQuery('#form_irpf').autoNumeric("init");
			});
</script>{/literal}
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Nuevo Contacto:</h3></label>
</div>
<form method="post" id="cmp_id" action="{geturl action='agregar'}?id={$fp->contact->getId()}" enctype="multipart/form-data">

    {if $fp->hasError()}
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    {/if}
    
	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_contact_first_name">
		        <label for="form_contact_first_name">Nombre:</label>
		        <input type="text" class="stored" id="form_contact_first_name" name="first_name" value="{$smarty.post.first_name}" placeholder="Primer Nombre"/>
		        {include file="lib/error.tpl" error=$fp->getError('first_name')}
		    </div>
		    <div class="row" id="form_contact_last_name">
		        <label for="form_contact_last_name">Apellido <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_contact_last_name" name="last_name" value="{$smarty.post.last_name}" placeholder="Primer Apellido"/>
		        {include file="lib/error.tpl" error=$fp->getError('last_name')}
		    </div>
		    <div class="row" id="form_contact_identification">
		        <label for="form_contact_identification">Identificaci&oacute;n Fiscal:</label>
		        <input type="text" class="stored" id="form_contact_identification" name="identification" value="{$smarty.post.identification}" placeholder="Ej: 99999999-R"/>
		        {include file="lib/error.tpl" error=$fp->getError('identification')}
		    </div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_contact_middle_name">
		        <label for="form_contact_middle_name">Segundo Nombre:</label>
		        <input type="text" class="stored" id="form_contact_middle_name" name="middle_name" value="{$smarty.post.middle_name}" placeholder="Segundo Nombre"/>
		        {include file="lib/error.tpl" error=$fp->getError('middle_name')}
		    </div>
		    <div class="row" id="form_contact_second_last_name">
		        <label for="form_contact_second_last_name">Segundo Apellido:</label>
		        <input type="text" class="stored" id="form_contact_second_last_name" name="second_last_name" value="{$smarty.post.second_last_name}" placeholder="Segundo Apellido"/>
		        {include file="lib/error.tpl" error=$fp->getError('second_last_name')}
		    </div>
		    <div class="row" id="form_contact_position">
		        <label for="form_contact_position">Cargo:</label>
		        <input type="text" class="stored" id="form_contact_position" name="position" value="{$smarty.post.position}" placeholder="Ej: Administrador"/>
		        {include file="lib/error.tpl" error=$fp->getError('position')}
		    </div>
		</div>
	</div>

	<div class="form_box">
		<div class="form_left">
	 	<div class="row" id="form_company_container">
	        <label for="form_company_ids">Compa&ntilde;&iacute;a:</label>
	        	    <input type="text" class="stored" id="form_company" name="company" value="{if $smarty.post.company}{$smarty.post.company}{else}{assign var='id' value=$contact->profile->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $data_[$b] == $id}{$company_[$b]|ucfirst}{break}{/if}{assign var='b' value=$b+1}{/foreach}{/if}" placeholder="Empresa, sociedad o persona"/>
	        		<input type="hidden" class="stored" id="form_company_id" name="company_id" value="{if $smarty.post.company_id}{$smarty.post.company_id}{else}0{/if}" />
	        		<input type="hidden" class="stored" name="doc_type" id="form_doc_type" value="ccompany" />
	        		<input type="hidden" class="stored" name="comp_doc_type" id="form_comp_doc_type" value="contact" />
	        		<input type="hidden" class="stored" id="form_contact_id" name="contact_id" value="{$company_id2}" />
	            {* <div id="outputbox"><p id="outputcontent"></p></div>
	        
	        		{literal}
	        		<script type="text/javascript"> 		
	        		jQuery(document).ready(function() {
	      				var thehtml2 = '<span><a class="fancybox fancybox.iframe" href="{/literal}{geturl controller='compania' action='editarcompania'}?id={$contact->profile->company_id}&id2={assign var='id' value=$contact->profile->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $data_[$b] == $id}{if $address_[$b]|is_array}{foreach from=$address_[$b] item=address}{$address}{break}{/foreach}{else}{$address_[$b]}{break}{/if}{/if}{assign var='b' value=$b+1}{/foreach}&doc_type=ccompany&doc_id={$contact->profile->company_id}">{assign var='id' value=$contact->profile->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $data_[$b] == $id}{$company_[$b]|ucfirst}{break}{/if}{assign var='b' value=$b+1}{/foreach}</a></span>{literal}';
	      				jQuery('#outputcontent').html(thehtml2);
	      		});
	        		</script>
	        		{/literal} *}
				 <input type="hidden" class="stored" id="form_addr_id2" name="addr_id2" value="0" />
				 <input type="hidden" class="stored" id="form_comp" name="comp_id" value="0" />
	         {include file="compania/companias.tpl" contact=true contact_id=$fp->contact->getId() id=$fp->contact->getId()}
	        {* <a class="fancybox fancybox.iframe submit2" href="{geturl controller='compania' action='agregarcompania'}?doc_type=ccompany&comp_doc_type=contact&contact_id={$company_id2}">Agregar</a> *}
	  	</div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_contact_relationship">
		    	<label for="form_contact_relationship">Relaci&oacute;n:</label>
		        <select id="form_contact_relationship" name="relationship" class="stored"/>
		       		<option value="" {if $smarty.post.relationship == ''} selected="selected" {/if}>Seleccione...</option>
					<option value="empleado" {if $smarty.post.relationship == 'empleado'} selected="selected" {/if}>Empleado</option>
					<option value="proveedor" {if $smarty.post.relationship == 'proveedor'} selected="selected" {/if}>Proveedor</option>
		        		<option value="cliente" {if $smarty.post.relationship == 'cliente'} selected="selected" {/if}>Cliente</option>
		        		<option value="potencial" {if $smarty.post.relationship == 'potencial'} selected="selected" {/if}>Cliente Potencial</option>
		        		<option value="personal" {if $smarty.post.relationship == 'personal'} selected="selected" {/if}>Personal</option>
				</select>
		        {include file="lib/error.tpl" error=$fp->getError('relationship')}
		    </div>
		</div>
	</div>
	
	<div class="form_box">
	  	<div class="row" id="form_add_">
	    {if $addresses|@count == 0}
	        <label for="form_address">Direcci&oacute;n:</label>
	        {include file="direccion/direcciones.tpl" contact=true doc_type='contact' contact_id=$fp->contact->getId()}
	    		<a class="fancybox fancybox.iframe submit2" href="{geturl controller='direccion' action='agregardirecciones'}?doc_type=contact&doc_id={$company_id3}">Agregar Direcci&oacute;n</a>
	    {else}
	    		<label for="form_address">Direcci&oacute;n:</label>
	        {include file="direccion/direcciones.tpl" contact=true doc_type='contact' contact_id=$fp->contact->getId()}
	    {/if}
	    </div>
	</div>
	
	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_recc_">
		    		<span for="form_recc__">Acogido al RECC:</span>
		    		<input type="checkbox" class="stored" id="form_recc" name="recc" value="true" {if $smarty.post.recc}checked="checked"{/if}> 
			</div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_irpf_">
		    		<label for="form_irpf__">Retenci&oacute;n IRPF (&#37;):</label>
		        <input type="text" class="stored" id="form_irpf" name="irpf" value="{$smarty.post.irpf}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Escribe 24&#x25; para el 24 de retenci&oacute;n"/>
			</div>
		</div>
	</div>
	
	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_contact_email"> 
		        <label for="form_contact_email">Email Principal <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_contact_email" name="email" value="{$smarty.post.email}" placeholder="Ej: ejemplo@webproadmin.com"/>
		        {include file="lib/error.tpl" error=$fp->getError('email')}
		    </div>
		    <div class="row" id="form_mobile_container">
		        <label for="form_mobile">Tel&eacute;fono M&oacute;vil:</label>
		        <input class="phone stored" type="text" id="form_mobile_country" name="mobile_country" value="{$smarty.post.mobile_country}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_mobile_area" name="mobile_area" value="{$smarty.post.mobile_area}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_mobile" name="mobile" value="{$smarty.post.mobile}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        {include file="lib/error.tpl" error=$fp->getError('mobile')}
		    </div>
		    <div class="row" id="form_phone2_container">
		        <label for="form_phone2">Tel&eacute;fono Secundario:</label>
		        <input class="phone stored" type="text" id="form_phone2_country" name="phone2_country" value="{$smarty.post.phone2_country}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_phone2_area" name="phone2_area" value="{$smarty.post.phone2_area}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_phone2" name="phone2" value="{$smarty.post.phone2}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        {include file="lib/error.tpl" error=$fp->getError('phone2')}
		    </div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_contact_email2">
		        <label for="form_contact_email2">Email Secundario:</label>
		        <input type="text" class="stored" id="form_contact_email2" name="email2" value="{$smarty.post.email2}" placeholder="Ej: ejemplo@webproadmin.com"/>
		        {include file="lib/error.tpl" error=$fp->getError('email2')}
		    </div>
		    <div class="row" id="form_phone_container">
		        <label for="form_phone">Tel&eacute;fono Principal:</label>
		        <input class="phone stored" type="text" id="form_phone_country" name="phone_country" value="{$smarty.post.phone_country}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_phone_area" name="phone_area" value="{$smarty.post.phone_area}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_phone" name="phone" value="{$smarty.post.phone}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        {include file="lib/error.tpl" error=$fp->getError('phone')}
		    </div>
		    <div class="row" id="form_fax_container">
		        <label for="form_fax">Fax:</label>
		        <input class="phone stored" type="text" id="form_fax_country" name="fax_country" value="{$smarty.post.fax_country}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_fax_area" name="fax_area" value="{$smarty.post.fax_area}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_fax" name="fax" value="{$smarty.post.fax}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        {include file="lib/error.tpl" error=$fp->getError('fax')}
		    </div>
		</div>
	</div>

	<div class="form_box">
		<div class="form_left">
        {foreach from=$fp->contactProfile key='key' item='label'}
        	<div class="row" id="form_{$key}_container">
                {if $label == 'Profile Picture'}
                		<label for="form_{$key}">Foto:</label>
             		<input type="file" class="files" id="form_{$key}" name="{$key}" value="{$smarty.post.$key}"/>
                    {include file="lib/error.tpl" error=$fp->getError($key)}
                	{/if}</div>
        {/foreach}
		</div>
		<div class="form_right">
        {foreach from=$fp->contactProfile key='key' item='label'}
        	<div class="row" id="form_{$key}_container">
                {if $label == 'Picture Preview'}		
                		{if $contact->profile->$key != ''}
                		<label for="form_{$key}">Vista Previa:</label>
                				{assign var="url" value=$contact->profile->$key}
                            	<img src="/profiles/tmp/contact/pictures/{$url}" />
                    {/if}
                	{/if}</div>
        {/foreach}
		</div>
	</div>

	<div class="row" id="form_contact_notes">
    		<label for="form_contact_notes">Notas personales:</label>
    		<textarea class="big_textarea stored" id="form_contact_notes" name="notes" rows="6" cols="50" placeholder="Coloca aqu&iacute; cualquier nota o comentario personal sobre este perfil. Lo que escribas s&oacute;lo ser&aacute; visible para los usuarios de tu cuenta.">{$smarty.post.notes}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('notes')}
    	</div>
	
	<div class="form_box">
		<div class="row">
	    		{if $identity->trial_expired}{else}<button class="submit" type="submit" name="add" id="add" value="add">Guardar</button>{/if}
		</div>
	</div>
	<div class="form_box">
		<div class="row" id="form_contact_notes">
	    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
	    	</div>
    	</div>
</form>

{include file='footer.tpl'}