{if $smarty.get.doc_type == 'project' || $smarty.get.doc_type == 'invoice'}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="es">
<head>
<link rel="stylesheet" href="/css/jquery-ui.css" type="text/css" media="all" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/malsup.js"></script>
{if $authenticated}<link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" />{else}<link rel="stylesheet" href="/css/outside.css" type="text/css" media="all" />{/if}
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
<title>WebProAdmin</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no">
{literal}<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChZwN3axAbbT9k9K3VRX-5LBQwJX76LLM&sensor=false&language=es&region=SP"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
<script type="text/javascript" src="/js/autoNumeric.js"></script>
{/literal}
</head>
<body>
{else}
{include file='header.tpl' section='contacto' subsection='editar'}
{literal}
<script type="text/javascript"> 		
 			jQuery(document).ready(function() {
      				jQuery('#form_irpf').autoNumeric("init");
			});
</script>
{/literal}
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Editar Contacto:</h3></label>
</div>
{/if}
<form method="post" id="cont_id" action="{geturl action='editar'}?id={$fp->contact->getId()}" enctype="multipart/form-data">
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
    {if $smarty.get.doc_type == 'project'}
   
    <div class="row" id="form_contact_first_name">
        <label for="form_contact_first_name">Primer Nombre <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_contact_f" name="first_name" value="{$fp->first_name}" placeholder="Primer Nombre"/>
        {include file="lib/error.tpl" error=$fp->getError('first_name')}
    </div>
    
    <div class="row" id="form_contact_middle_name">
        <label for="form_contact_middle_name">Nombre:</label>
        <input type="text" id="form_contact_middle_name" name="middle_name" value="{$fp->middle_name}" placeholder="Segundo Nombre"/>
        {include file="lib/error.tpl" error=$fp->getError('middle_name')}
    </div>
    
    <div class="row" id="form_contact_last_name">
        <label for="form_contact_last_name">Apellido <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_contact_last_name" name="last_name" value="{$fp->last_name}" placeholder="Primer Apellido"/>
        {include file="lib/error.tpl" error=$fp->getError('last_name')}
    </div>
    
    <div class="row" id="form_contact_second_last_name">
        <label for="form_contact_second_last_name">Segundo Apellido:</label>
        <input type="text" id="form_contact_second_last_name"
               name="second_last_name" value="{$fp->second_last_name}" placeholder="Segundo Apellido"/>
        {include file="lib/error.tpl" error=$fp->getError('second_last_name')}
    </div>
    
    <div class="row" id="form_contact_identification">
        <label for="form_contact_identification">Identificaci&oacute;n Fiscal:</label>
        <input type="text" id="form_contact_identification" name="identification" value="{$fp->identification}" placeholder="Ej: 2-222-222-8"/>
        {include file="lib/error.tpl" error=$fp->getError('identification')}
    </div>
    
 	<div class="row" id="form_company_container">
        <label for="form_company_ids">Compa&ntilde;&iacute;a:</label>
        	    <input type="text" id="form_company" name="company" value="{if $fp->company_id}{assign var='id' value=$fp->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $data_[$b] == $id}{$company_[$b]|ucfirst}{break}{/if}{assign var='b' value=$b+1}{/foreach}{elseif $fp->thecompany && !$fp->company_id}{$fp->thecompany|ucfirst}{/if}" placeholder="Empresa, sociedad o persona"/>
        		<input type="hidden" id="form_company_id" name="company_id" value="{assign var='id' value=$fp->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $data_[$b] == $id}{$data_[$b]}{break}{/if}{assign var='b' value=$b+1}{/foreach}" />
        		
        		<input type="hidden" id="form_contact_id" name="contact_id" value="{$company_id2}" />
           {if $fp->company_id}<div id="outputbox"><p id="outputcontent"></p></div>{/if}
        
        		{literal}
        		<script type="text/javascript"> 		
        		jQuery(document).ready(function() {
      				var thehtml2 = '<span><a class="fancybox fancybox.iframe submit2" href="{/literal}{geturl controller='compania' action='editarcompania'}?id={$fp->company_id}&id2={assign var='id' value=$fp->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $data_[$b] == $id}{if $address_[$b]|is_array}{foreach from=$address_[$b] item=address}{$address}{break}{/foreach}{else}{$address_[$b]}{break}{/if}{/if}{assign var='b' value=$b+1}{/foreach}&doc_type=ccompany&doc_id={$fp->company_id}&popup=true">{assign var='id' value=$fp->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $data_[$b] == $id}{$company_[$b]|ucfirst}{break}{/if}{assign var='b' value=$b+1}{/foreach}</a></span>{literal}';
      				jQuery('#outputcontent').html(thehtml2);
      		});
        		</script>
        		{/literal}
			 <input type="hidden" id="form_addr_id2" name="addr_id2" value="{if $fp->company_address|is_array}{$fp->company_address[0]}{else}{$fp->company_address}{/if}" />
			 <input type="hidden" id="form_comp" name="comp_id" value="{$fp->company_id}" />
         {include file="compania/companias.tpl" contact=true contact_id=$fp->contact->getId() id=$fp->contact->getId()}
        {* <a class="fancybox fancybox.iframe submit2" href="{geturl controller='compania' action='agregarcompania'}?doc_type=ccompany&comp_doc_type=contact&contact_id={$company_id2}">Agregar</a> *}
  	</div>
  	
    <div class="row" id="form_contact_position">
        <label for="form_contact_position">Cargo:</label>
        <input type="text" id="form_contact_position" name="position" value="{$fp->position}" placeholder="Ej: Administrador"/>
        {include file="lib/error.tpl" error=$fp->getError('position')}
    </div>
    	
    <div class="row" id="form_recc_">
    		<label for="form_recc__">Acogido al RECC:</label>
    		<input type="checkbox" id="form_recc" name="recc" value="true" {if $fp->recc}checked="checked"{/if}> 
	</div>
	
    <div class="row" id="form_irpf_">
    		<label for="form_irpf__">Retenci&oacute;n IRPF (&#37;):</label>
        <input type="text" id="form_irpf" name="irpf" value="{$fp->irpf}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Escribe 24&#x25; para el 24 de retenci&oacute;n"/>
	</div>
	
	<div class="row" id="form_fax_container">
	    {if $addresses|@count == 0}
	        <label for="form_address">Direcci&oacute;n:</label>
	        {include file='direccion/direcciones.tpl' contact=true doc_type='contact' contact_id=$fp->contact->getId()}
	    		<a class="fancybox fancybox.iframe submit2" href="{geturl controller='direccion' action='agregardirecciones'}?doc_type=contact&doc_id={$fp->contact->getId()}">Agregar</a>
	    {else}
	    		<label for="form_address">Direcci&oacute;n:</label>
	        {include file='direccion/direcciones.tpl' contact=true doc_type='contact' contact_id=$fp->contact->getId()}
	    {/if}
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
    
    <div class="row" id="form_mobile_container">
        <label for="form_mobile">Tel&eacute;fono M&oacute;vil:</label>
        <input class="phone" type="text" id="form_mobile_country" name="mobile_country" value="{$fp->mobile_country}" onkeypress='validate(event)' placeholder="Ej: 34"/>
        <input class="phone" type="text" id="form_mobile_area" name="mobile_area" value="{$fp->mobile_area}" onkeypress='validate(event)' placeholder="Ej: 93"/>
        <input class="social" type="text" id="form_mobile" name="mobile" value="{$fp->mobile}" onkeypress='validate(event)' placeholder="Ej: 807117222"/>
        {include file="lib/error.tpl" error=$fp->getError('mobile')}
    </div>
    
    <div class="row" id="form_phone_container">
        <label for="form_phone">Tel&eacute;fono Principal:</label>
        <input class="phone" type="text" id="form_phone_country" name="phone_country" value="{$fp->phone_country}" onkeypress='validate(event)' placeholder="Ej: 34"/>
        <input class="phone" type="text" id="form_phone_area" name="phone_area" value="{$fp->phone_area}" onkeypress='validate(event)' placeholder="Ej: 93"/>
        <input class="social" type="text" id="form_phone" name="phone" value="{$fp->phone}" onkeypress='validate(event)' placeholder="Ej: 807117222"/>
        {include file="lib/error.tpl" error=$fp->getError('phone')}
    </div>
    
    <div class="row" id="form_phone2_container">
        <label for="form_phone2">Tel&eacute;fono Secundario:</label>
        <input class="phone" type="text" id="form_phone2_country" name="phone2_country" value="{$fp->phone2_country}" onkeypress='validate(event)' placeholder="Ej: 34"/>
        <input class="phone" type="text" id="form_phone2_area" name="phone2_area" value="{$fp->phone2_area}" onkeypress='validate(event)' placeholder="Ej: 93"/>
        <input class="social" type="text" id="form_phone2" name="phone2" value="{$fp->phone2}" onkeypress='validate(event)' placeholder="Ej: 807117222"/>
        {include file="lib/error.tpl" error=$fp->getError('phone2')}
    </div>
    
    <div class="row" id="form_fax_container">
        <label for="form_fax">Fax:</label>
        <input class="phone" type="text" id="form_fax_country" name="fax_country" value="{$fp->fax_country}" onkeypress='validate(event)' placeholder="Ej: 34"/>
        <input class="phone" type="text" id="form_fax_area" name="fax_area" value="{$fp->fax_area}" onkeypress='validate(event)' placeholder="Ej: 93"/>
        <input class="social" type="text" id="form_fax" name="fax" value="{$fp->fax}" onkeypress='validate(event)' placeholder="Ej: 807117222"/>
        {include file="lib/error.tpl" error=$fp->getError('fax')}
    </div>

    <div class="row" id="form_contact_relationship">
    	<label for="form_contact_relationship">Relaci&oacute;n:</label>
        <select id="form_contact_relationship" name="relationship"/>
       		<option value="" {if $fp->relationship == ''} selected="selected" {/if}>Seleccione...</option>
			<option value="empleado" {if $fp->relationship == 'empleado'} selected="selected" {/if}>Empleado</option>
			<option value="proveedor" {if $fp->relationship == 'proveedor'} selected="selected" {/if}>Proveedor</option>
        		<option value="cliente" {if $fp->relationship == 'cliente'} selected="selected" {/if}>Cliente</option>
        		<option value="potencial" {if $fp->relationship == 'potencial'} selected="selected" {/if}>Cliente potencial</option>
        		<option value="personal" {if $fp->relationship == 'personal'} selected="selected" {/if}>Personal</option>
		</select>
        {include file="lib/error.tpl" error=$fp->getError('relationship')}
    </div>
    
        {foreach from=$fp->contactProfile key='key' item='label'}
        	<div class="row" id="form_{$key}_container">
                {if $label == 'Profile Picture'}
                		<label for="form_{$key}">Foto:</label>
             		<input type="file" class="files" id="form_{$key}" name="{$key}" value="{$fp->$key}"/>
                    {include file="lib/error.tpl" error=$fp->getError($key)}
                {elseif $label == 'Picture Preview'}
                		{if $fp->$key != ''}
                		<label for="form_{$key}">Vista Previa:</label>
                				{assign var="url" value=$fp->$key}
                            	<img src="/profiles/tmp/contact/pictures/{$url}" />
                    {/if}
                	{/if}</div>
        {/foreach}

	<div class="row" id="form_contact_notes">
    		<label for="form_contact_notes">Notas personales:</label>
    		<textarea id="form_contact_notes" name="notes" rows="6" cols="50" placeholder="Coloca aqu&iacute; cualquier nota o comentario personal sobre este documento. Lo que escribas s&oacute;lo ser&aacute; visible para los usuarios de tu cuenta.">{$fp->notes}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('notes')}
    	</div>
    	
    	{else}

	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_contact_first_name">
		        <label for="form_contact_first_name">Primer Nombre <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_contact_f" name="first_name" value="{$fp->first_name}" placeholder="Primer Nombre"/>
		        {include file="lib/error.tpl" error=$fp->getError('first_name')}
		    </div>
		    <div class="row" id="form_contact_last_name">
		        <label for="form_contact_last_name">Primer Apellido <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_contact_last_name" name="last_name" value="{$fp->last_name}" placeholder="Primer Apellido"/>
		        {include file="lib/error.tpl" error=$fp->getError('last_name')}
		    </div>
		    <div class="row" id="form_contact_identification">
		        <label for="form_contact_identification">Identificaci&oacute;n Fiscal:</label>
		        <input type="text" class="stored" id="form_contact_identification" name="identification" value="{$fp->identification}" placeholder="Ej: 99999999-R"/>
		        {include file="lib/error.tpl" error=$fp->getError('identification')}
		    </div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_contact_middle_name">
		        <label for="form_contact_middle_name">Segundo Nombre:</label>
		        <input type="text" class="stored" id="form_contact_middle_name" name="middle_name" value="{$fp->middle_name}" placeholder="Segundo Nombre"/>
		        {include file="lib/error.tpl" error=$fp->getError('middle_name')}
		    </div>
		    <div class="row" id="form_contact_second_last_name">
		        <label for="form_contact_second_last_name">Segundo Apellido:</label>
		        <input type="text" class="stored" id="form_contact_second_last_name"
		               name="second_last_name" value="{$fp->second_last_name}" placeholder="Segundo Apellido"/>
		        {include file="lib/error.tpl" error=$fp->getError('second_last_name')}
		    </div>
		    <div class="row" id="form_contact_position">
		        <label for="form_contact_position">Cargo:</label>
		        <input type="text" class="stored" id="form_contact_position" name="position" value="{$fp->position}" placeholder="Ej: Administrador"/>
		        {include file="lib/error.tpl" error=$fp->getError('position')}
		    </div>
		</div>
	</div>
	
	
	<div class="form_box">
		<div class="form_left">
		 	<div class="row" id="form_company_container">
		        <label for="form_company_ids">Compa&ntilde;&iacute;a:</label>
		        	    <input type="text" class="stored" id="form_company" name="company" value="{if $fp->company_id}{assign var='id' value=$fp->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $data_[$b] == $id}{$company_[$b]|ucfirst}{break}{/if}{assign var='b' value=$b+1}{/foreach}{elseif $fp->thecompany && !$fp->company_id}{$fp->thecompany|ucfirst}{/if}" placeholder="Empresa, sociedad o persona"/>
		        		<input type="hidden" class="stored" id="form_company_id" name="company_id" value="{assign var='id' value=$fp->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $data_[$b] == $id}{$data_[$b]}{break}{/if}{assign var='b' value=$b+1}{/foreach}" />
		        		
		        		<input type="hidden" class="stored" id="form_contact_id" name="contact_id" value="{$company_id2}" />
		           {* if $fp->company_id}<div id="outputbox"><p id="outputcontent"></p></div>{/if}
		        
		        		{literal}
		        		<script type="text/javascript"> 		
		        		jQuery(document).ready(function() {
		      				var thehtml2 = '<span><a class="fancybox fancybox.iframe submit2" href="{/literal}{geturl controller='compania' action='editarcompania'}?id={$fp->company_id}&id2={assign var='id' value=$fp->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $data_[$b] == $id}{if $address_[$b]|is_array}{foreach from=$address_[$b] item=address}{$address}{break}{/foreach}{else}{$address_[$b]}{break}{/if}{/if}{assign var='b' value=$b+1}{/foreach}&doc_type=ccompany&doc_id={$fp->company_id}&popup=true">{assign var='id' value=$fp->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $data_[$b] == $id}{$company_[$b]|ucfirst}{break}{/if}{assign var='b' value=$b+1}{/foreach}</a></span>{literal}';
		      				jQuery('#outputcontent').html(thehtml2);
		      		});
		        		</script>
		        		{/literal *}
					 <input type="hidden" class="stored" id="form_addr_id2" name="addr_id2" value="{if $fp->company_address|is_array}{$fp->company_address[0]}{else}{$fp->company_address}{/if}" />
					 <input type="hidden" class="stored" id="form_comp" name="comp_id" value="{$fp->company_id}" />
		         {include file="compania/companias.tpl" contact=true contact_id=$fp->contact->getId() id=$fp->contact->getId()}
		        {* <a class="fancybox fancybox.iframe submit2" href="{geturl controller='compania' action='agregarcompania'}?doc_type=ccompany&comp_doc_type=contact&contact_id={$company_id2}">Agregar</a> *}
		  	</div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_contact_relationship">
		    	<label for="form_contact_relationship">Relaci&oacute;n:</label>
		        <select id="form_contact_relationship" name="relationship" class="stored"/>
		       		<option value="" {if $fp->relationship == ''} selected="selected" {/if}>Seleccione...</option>
					<option value="empleado" {if $fp->relationship == 'empleado'} selected="selected" {/if}>Empleado</option>
					<option value="proveedor" {if $fp->relationship == 'proveedor'} selected="selected" {/if}>Proveedor</option>
		        		<option value="cliente" {if $fp->relationship == 'cliente'} selected="selected" {/if}>Cliente</option>
		        		<option value="potencial" {if $fp->relationship == 'potencial'} selected="selected" {/if}>Cliente potencial</option>
		        		<option value="personal" {if $fp->relationship == 'personal'} selected="selected" {/if}>Personal</option>
				</select>
		        {include file="lib/error.tpl" error=$fp->getError('relationship')}
		    </div>
		</div>
	</div>
	
	<div class="row">
	    {if $addresses|@count == 0}
	        <label for="form_address">Direcci&oacute;n:</label>
	        {include file='direccion/direcciones.tpl' contact=true doc_type='contact' contact_id=$fp->contact->getId()}
	    		<a class="fancybox fancybox.iframe submit2" href="{geturl controller='direccion' action='agregardirecciones'}?doc_type=contact&doc_id={$fp->contact->getId()}">Agregar Direcci&oacute;n</a>
	    {else}
	        {include file='direccion/direcciones.tpl' contact=true doc_type='contact' contact_id=$fp->contact->getId()}
	    {/if}
	</div>
    
	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_recc_">
		    		<span for="form_recc__">Acogido al RECC:</span>
		    		<input type="checkbox" class="stored" id="form_recc" name="recc" value="true" {if $fp->recc}checked="checked"{/if}> 
			</div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_irpf_">
		    		<label for="form_irpf__">Retenci&oacute;n IRPF (&#37;):</label>
		        <input type="text" class="stored" id="form_irpf" name="irpf" value="{$fp->irpf}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Porcentaje IRPF"/>
			</div>
		</div>
	</div>
	
	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_contact_email">
		        <label for="form_contact_email">Email Principal <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_contact_email" name="email" value="{$fp->email}" placeholder="Ej: ejemplo@webproadmin.com"/>
		        {include file="lib/error.tpl" error=$fp->getError('email')}
		    </div>
		    <div class="row" id="form_mobile_container">
		        <label for="form_mobile">Tel&eacute;fono M&oacute;vil:</label>
		        <input class="phone stored" type="text" id="form_mobile_country" name="mobile_country" value="{$fp->mobile_country}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_mobile_area" name="mobile_area" value="{$fp->mobile_area}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_mobile" name="mobile" value="{$fp->mobile}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        {include file="lib/error.tpl" error=$fp->getError('mobile')}
		    </div>
		    <div class="row" id="form_phone2_container">
		        <label for="form_phone2">Tel&eacute;fono Secundario:</label>
		        <input class="phone stored" type="text" id="form_phone2_country" name="phone2_country" value="{$fp->phone2_country}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_phone2_area" name="phone2_area" value="{$fp->phone2_area}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_phone2" name="phone2" value="{$fp->phone2}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        {include file="lib/error.tpl" error=$fp->getError('phone2')}
		    </div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_contact_email2">
		        <label for="form_contact_email2">Email Secundario:</label>
		        <input type="text" class="stored" id="form_contact_email2" name="email2" value="{$fp->email2}" placeholder="Ej: ejemplo@webproadmin.com"/>
		        {include file="lib/error.tpl" error=$fp->getError('email2')}
		    </div>
		    <div class="row" id="form_phone_container">
		        <label for="form_phone">Tel&eacute;fono Principal:</label>
		        <input class="phone stored" type="text" id="form_phone_country" name="phone_country" value="{$fp->phone_country}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_phone_area" name="phone_area" value="{$fp->phone_area}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_phone" name="phone" value="{$fp->phone}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        {include file="lib/error.tpl" error=$fp->getError('phone')}
		    </div>
		    <div class="row" id="form_fax_container">
		        <label for="form_fax">Fax:</label>
		        <input class="phone stored" type="text" id="form_fax_country" name="fax_country" value="{$fp->fax_country}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_fax_area" name="fax_area" value="{$fp->fax_area}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_fax" name="fax" value="{$fp->fax}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
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
	             		<input type="file" class="files" id="form_{$key}" name="{$key}" value="{$fp->$key}"/>
	                    {include file="lib/error.tpl" error=$fp->getError($key)}
	                	{/if}</div>
	        {/foreach}
		</div>
		<div class="form_right">
	   		{foreach from=$fp->contactProfile key='key' item='label'}
	        	<div class="row" id="form_{$key}_container">
	                {if $label == 'Picture Preview'}
	                		{if $fp->$key != ''}
	                		<label for="form_{$key}">Vista Previa:</label>
	                				{assign var="url" value=$fp->$key}
	                            	<img src="/profiles/tmp/contact/pictures/{$url}" />
	                    {/if}
	                	{/if}</div>
	        {/foreach}
		</div>
	</div>
	
	 <div class="row" id="form_contact_notes">
	    		<label for="form_contact_notes">Notas personales:</label>
	    		<textarea class="big_textarea stored" id="form_contact_notes" name="notes" rows="6" cols="50" placeholder="Coloca aqu&iacute; cualquier nota o comentario personal sobre este perfil. Lo que escribas s&oacute;lo ser&aacute; visible para los usuarios de tu cuenta.">{$fp->notes}</textarea>
	    		{include file="lib/error.tpl" error=$fp->getError('notes')}
	 </div>
	    	
	 {/if}
  	
 	<input type="hidden" class="stored" id="form_id" name="id" value="{$fp->contact->getId()}" />
 	<div class="form_box">
		<div class="row">
	    		{if $identity->trial_expired}{else}<button class="submit" type="submit" name="edit" id="edit" value="edit">Actualizar</button>{/if}
		</div>
	</div>
	<div class="form_box">
		<div class="row" id="form_contact_notes">
		    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
		</div>
    </div>
</form>

{if $smarty.get.doc_type == 'project'}
	</html>
{else}
	{include file='footer.tpl'}
{/if}