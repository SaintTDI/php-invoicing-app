{include file='header.tpl' section='recomendador'}
<div id="">
    <div id="">
    Editar detalles de su Empresa: 
    </div>
</div>

<form method="post" action="{geturl action='empresa'}" enctype="multipart/form-data">

    {if $fp->hasError()}
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    {/if}
    
    <div class="row" id="form_thecompany_container">
        <label for="form_thecompany">Raz&oacute;n Social:</label>
        <input type="text" id="form_thecompany"
               name="thecompany" value="{$fp->thecompany}" />
        {include file="lib/error.tpl" error=$fp->getError('thecompany')}
    </div>
    
    <div class="row" id="form_commercial_container">
        <label for="form_commercial">Nombre Comercial:</label>
        <input type="text" id="form_commercial"
               name="commercial" value="{$fp->commercial}" />
        {include file="lib/error.tpl" error=$fp->getError('commercial')}
    </div>

    <div class="row" id="form_identification_container">
        <label for="form_identification">Identificaci&oacute;n Fiscal:</label>
        <input type="text" id="form_identification"
               name="identification" value="{$fp->identification}" />
        {include file="lib/error.tpl" error=$fp->getError('identification')}
    </div>
 
        {* foreach from=$fp->companyProfile key='key' item='label'}
                {if $label == 'Industry'}
     				<div class="row" id="form_industry_container">
     				<label for="form_industry">&Aacute;rea o Sector:</label>
        				<select id="form_industry" name="company_industry"/>
       						<option value="" {if $company_industry == ''} selected="selected" {/if}>Seleccione...</option>
							<option value="Agricultura" {if $company_industry == 'Agricultura'} selected="selected" {/if}>Agricultura</option>
							<option value="Actividades Culturales" {if $company_industry == 'Actividades Culturales'} selected="selected" {/if}>Actividades Culturales</option>
							<option value="Actividades Deportivas" {if $company_industry == 'Actividades Deportivas'} selected="selected" {/if}>Actividades Deportivas</option>
							<option value="Medicina y Salud" {if $company_industry == 'Medicina y Salud'} selected="selected" {/if}>Medicina y Salud</option>
							<option value="Fabricaci&oacute;n Artesanal" {if $company_industry == 'Fabricacion Artesanal'} selected="selected" {/if}>Fabricaci&oacute;n Artesanal</option>
							<option value="Veterinaria" {if $company_industry == 'Veterinaria'} selected="selected" {/if}>Veterinaria</option>
							<option value="Administraci&oacute;n P&uacute;blica" {if $company_industry == 'Administracion Publica'} selected="selected" {/if}>Administraci&oacute;n P&uacute;blica</option>
							<option value="Alimentaci&oacute;n y Bebidas" {if $company_industry == 'Alimentacion y Bebidas'} selected="selected" {/if}>Alimentaci&oacute;n y Bebidas</option>
							<option value="Artes gr&aacute;ficas" {if $company_industry == 'Artes graficas'} selected="selected" {/if}>Artes gr&aacute;ficas</option>
							<option value="Artes y Espect&aacute;culos" {if $company_industry == 'Artes y Espectaculos'} selected="selected" {/if}>Artes y Espect&aacute;culos</option>
							<option value="Asesor&iacute;a Contable" {if $company_industry == 'Asesoria Contable'} selected="selected" {/if}>Asesor&iacute;a Contable</option>
							<option value="Asesor&iacute;a Jur&iacute;dica" {if $company_industry == 'Asesoria Juridica'} selected="selected" {/if}>Asesor&iacute;a Jur&iacute;dica</option>
							<option value="Audiovisual" {if $company_industry == 'Audiovisual'} selected="selected" {/if}>Audiovisual</option>
							<option value="Automoci&oacute;n" {if $company_industry == 'Automocion'} selected="selected" {/if}>Automoci&oacute;n</option>
							<option value="Comercio al por Mayor" {if $company_industry == 'Comercio al por Mayor'} selected="selected" {/if}>Comercio al por Mayor</option>
							<option value="Comercio al por Meno" {if $company_industry == 'Comercio al por Meno'} selected="selected" {/if}>Comercio al por Menor</option>
							<option value="Construcci&oacute;n" {if $company_industry == 'Construccion'} selected="selected" {/if}>Construcci&oacute;n</option>
							<option value="Defensa" {if $company_industry == 'Defensa'} selected="selected" {/if}>Defensa</option>
							<option value="Editorial" {if $company_industry == 'Editorial'} selected="selected" {/if}>Editorial</option>
							<option value="Educaci&oacute;n" {if $company_industry == 'Educacion'} selected="selected" {/if}>Educaci&oacute;n</option>
							<option value="Ganader&iacute;a" {if $company_industry == 'Ganaderia'} selected="selected" {/if}>Ganader&iacute;a</option>
							<option value="Gesti&oacute;n de residuos" {if $company_industry == 'Gestion de residuos'} selected="selected" {/if}>Gesti&oacute;n de residuos</option>
							<option value="Hosteler&iacute;a" {if $company_industry == 'Hosteleria'} selected="selected" {/if}>Hosteler&iacute;a</option>
							<option value="Fabricaci&oacute;n Industrial" {if $company_industry == 'Fabricacion Industrial'} selected="selected" {/if}>Fabricaci&oacute;n Industrial</option>
							<option value="Inform&aacute;tica" {if $company_industry == 'Informatica'} selected="selected" {/if}>Inform&aacute;tica</option>
							<option value="Miner&iacute;a" {if $company_industry == 'Mineria'} selected="selected" {/if}>Miner&iacute;a</option>
							<option value="Otras actividades profesionales, cient&iacute;ficas y t&eacute;cnicas" {if $company_industry == 'Otras actividades profesionales, cientificas y tecnicas'} selected="selected" {/if}>Otras actividades profesionales, cient&iacute;ficas y t&eacute;cnicas</option>
							<option value="Farmacia" {if $company_industry == 'Farmacia'} selected="selected" {/if}>Farmacia</option>
							<option value="Pesca / acuicultura" {if $company_industry == 'Pesca / acuicultura'} selected="selected" {/if}>Pesca / acuicultura</option>
							<option value="Promoci&oacute;n y gesti&oacute;n Inmobiliaria" {if $company_industry == 'Promocion y gestion Inmobiliaria'} selected="selected" {/if}>Promoci&oacute;n y gesti&oacute;n Inmobiliaria</option>
							<option value="Publicidad y estudios de mercado" {if $company_industry == 'Publicidad y estudios de mercado'} selected="selected" {/if}>Publicidad y estudios de mercado</option>
							<option value="Reparaci&oacute;n y Mantenimiento" {if $company_industry == 'Reparacion y Mantenimiento'} selected="selected" {/if}>Reparaci&oacute;n y Mantenimiento</option>
							<option value="Seguridad Privada" {if $company_industry == 'Seguridad Privada'} selected="selected" {/if}>Seguridad Privada</option>
							<option value="Servicios de Arquitectura y paisajismo" {if $company_industry == 'Servicios de Arquitectura y paisajismo'} selected="selected" {/if}>Servicios de Arquitectura y paisajismo</option>
							<option value="Servicios de Ingenier&iacute;a" {if $company_industry == 'Servicios de Ingenieria'} selected="selected" {/if}>Servicios de Ingenier&iacute;a</option>
							<option value="Servicios de Recursos Humanos" {if $company_industry == 'Servicios de Recursos Humanos'} selected="selected" {/if}>Servicios de Recursos Humanos</option>
							<option value="Transporte" {if $company_industry == 'Transporte'} selected="selected" {/if}>Transporte</option>
							<option value="Servicios Financieros" {if $company_industry == 'Servicios Financieros'} selected="selected" {/if}>Servicios Financieros</option>
							<option value="Telecomunicaciones" {if $company_industry == 'Telecomunicaciones'} selected="selected" {/if}>Telecomunicaciones</option>
							<option value="Turismo" {if $company_industry == 'Turismo'} selected="selected" {/if}>Turismo</option>
							<option value="Seguros y Reaseguros" {if $company_industry == 'Seguros y Reaseguros'} selected="selected" {/if}>Seguros y Reaseguros</option>
							<option value="Qu&iacute;mica" {if $company_industry == 'Quimica'} selected="selected" {/if}>Qu&iacute;mica</option>
						</select>
        					{include file="lib/error.tpl" error=$fp->getError('company_industry')}
    					</div>
                {elseif $label == 'Specialty'}
                		<div class="row" id="form_specialty_container">
                			<label for="form_specialty">Especialidad:</label>
						<input class="social" type="text" id="form_{$key}" maxlength="200" name="{$key}" value="{$fp->$key}"/> 
                	     	{include file="lib/error.tpl" error=$fp->getError($key)}
                	    </div>
                	{/if}
        {/foreach *}
        
	{* 
	<div class="row" id="form_speech_container">
    		<label for="form_speech">Sales Speech:</label>
    		<textarea id="form_speech" name="speech" rows="10" cols="50">{$fp->speech}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError(speech)}
    	</div>
    	*}
	
    {if $addresses|@count == 0}
        <label for="form_address">Direcci&oacute;n:</label>
        {include file='direccion/direcciones.tpl'}
    		<a class="fancybox fancybox.iframe" href="{geturl controller='direccion' action='agregardirecciones'}?doc_type=company&doc_id={$company_id2}">+Agregar</a>
    {else}
        {include file='direccion/direcciones.tpl'}
        <a class="fancybox fancybox.iframe" href="{geturl controller='direccion' action='agregardirecciones'}?doc_type=company&doc_id={$company_id2}">+Agregar</a>
    {/if}
  
    <div class="row" id="form_email_container">
        <label for="form_email">Email Principal:</label>
        <input type="text" id="form_email"
               name="email_c" value="{$fp->email_c}" />
        {include file="lib/error.tpl" error=$fp->getError('email_c')}
    </div>
    
    <div class="row" id="form_email2_container">
        <label for="form_email2">Email Secundario:</label>
        <input type="text" id="form_email2"
               name="email2" value="{$fp->email2}" />
        {include file="lib/error.tpl" error=$fp->getError('email2')}
    </div>
    
     {foreach from=$fp->companyProfile key='key' item='label'}
     <div class="row" id="form_{$key}_container">
     	{if $label == 'Website'}
     		<label for="form_{$label}">Sitio Web:</label>
     		<input class="social" type="text" id="form_help" name="help" value="http://www." disabled="disabled" />
     		<input class="social" type="text" id="form_{$key}" maxlength="200" name="{$key}" value="{$fp->$key}"/>   
    		    {include file="lib/error.tpl" error=$fp->getError($key)}
    		{elseif $label == 'Twitter'}
     		<label for="form_{$label}">Cuenta en Twitter:</label>
     		<input class="social" type="text" id="form_help" name="help" value="https://twitter.com/" disabled="disabled" />
     		<input class="social" type="text" id="form_{$key}" maxlength="200" name="{$key}" value="{$fp->$key}"/>   
    		    {include file="lib/error.tpl" error=$fp->getError($key)}
     	{/if}
     </div>
     {/foreach}
     
    <div class="row" id="form_mobile_container">
        <label for="form_mobile">Tel&eacute;fono M&oacute;vil:</label>
        <input class="phone" type="text" id="form_mobile_country"
               name="mobile_country" value="{$fp->mobile_country}" onkeypress='validate(event)' />
        <input class="phone" type="text" id="form_mobile_area"
               name="mobile_area" value="{$fp->mobile_area}" onkeypress='validate(event)' />
        <input class="social" type="text" id="form_mobile"
               name="mobile" value="{$fp->mobile}" onkeypress='validate(event)' />
        {include file="lib/error.tpl" error=$fp->getError('mobile')}
    </div>
    
    <div class="row" id="form_phone_container">
        <label for="form_phone">Tel&eacute;fono Principal:</label>
        <input class="phone" type="text" id="form_phone_country"
               name="phone_country" value="{$fp->phone_country}" onkeypress='validate(event)' />
        <input class="phone" type="text" id="form_phone_area"
               name="phone_area" value="{$fp->phone_area}" onkeypress='validate(event)' />
        <input class="social" type="text" id="form_phone"
               name="phone" value="{$fp->phone}" onkeypress='validate(event)' />
        {include file="lib/error.tpl" error=$fp->getError('phone')}
    </div>
    
    <div class="row" id="form_phone2_container">
        <label for="form_phone2">Tel&eacute;fono Secundario:</label>
        <input class="phone" type="text" id="form_phone2_country"
               name="phone2_country" value="{$fp->phone2_country}" onkeypress='validate(event)' />
        <input class="phone" type="text" id="form_phone2_area"
               name="phone2_area" value="{$fp->phone2_area}" onkeypress='validate(event)' />
        <input class="social" type="text" id="form_phone2"
               name="phone2" value="{$fp->phone2}" onkeypress='validate(event)' />
        {include file="lib/error.tpl" error=$fp->getError('phone2')}
    </div>
    
    <div class="row" id="form_fax_container">
        <label for="form_fax">Fax:</label>
        <input class="phone" type="text" id="form_fax_country"
               name="fax_country" value="{$fp->fax_country}" onkeypress='validate(event)' />
        <input class="phone" type="text" id="form_fax_area"
               name="fax_area" value="{$fp->fax_area}" onkeypress='validate(event)' />
        <input class="social" type="text" id="form_fax"
               name="fax" value="{$fp->fax}" onkeypress='validate(event)' />
        {include file="lib/error.tpl" error=$fp->getError('fax')}
    </div>

        {foreach from=$fp->companyProfile key='key' item='label'}
        	<div class="row" id="form_{$key}_container">
                {if $label == 'Profile Picture'}
                		<label for="form_{$key}">Logo de su empresa:</label>
             		<input type="file" class="files" id="form_{$key}" name="{$key}" value="{$fp->$key}"/>
                    {include file="lib/error.tpl" error=$fp->getError($key)}
                {elseif $label == 'Picture Preview'}
                		<label for="form_{$key}">Vista Previa del logo:</label>
                		{if $fp->$key != ''}
                				{assign var="url" value=$fp->$key}
                            	<img src="/profiles/tmp/company/pictures/{$url}" />
                        	{else}
                            	<img src="/profiles/tmp/company/pictures/profile.png" />
                        {/if}
                	{/if}</div>
        {/foreach}
        
    <div class="row" id="form_year_start_container">
        <label for="form_year_start">Inicio del per&iacute;odo fiscal:</label>
        <input class="social" type="text" id="form_year_start" name="year_start" value="{if $fp->year_start}{$fp->year_start}{else}{$now_}{/if}" />
        {include file="lib/error.tpl" error=$fp->getError('year_start')}
    </div>
    
    <div class="row" id="form_iva_container">
        <label for="form_iva_">&iquest;Cual es su r&eacute;gimen habitual de IVA? (&#37;):</label>
        <input class="social" type="text" id="form_iva" name="iva" value="{if $fp->iva}{$fp->iva}{elseif $default_country == 'ES'}21{elseif $default_country == 'AR'}21{elseif $default_country == 'BO'}14.94{elseif $default_country == 'CL'}19{elseif $default_country == 'CO'}16{elseif $default_country == 'CR'}13{elseif $default_country == 'DO'}18{elseif $default_country == 'GT'}12{elseif $default_country == 'HN'}15{elseif $default_country == 'MX'}16{elseif $default_country == 'NI'}15{elseif $default_country == 'PA'}7{elseif $default_country == 'PG'}10{elseif $default_country == 'PE'}18{elseif $default_country == 'PR'}7{elseif $default_country == 'VE'}12{elseif $default_country == 'UY'}22{elseif $default_country == 'VE'}12{elseif $default_country == 'SV'}13{elseif $default_country == 'EC'}12{/if}" data-a-dec="," data-a-sep="." /> 
        {include file="lib/error.tpl" error=$fp->getError('iva')}
    </div>
    
    <div class="row" id="form_iva2_name_container">
        <label for="form_iva2_name">&iquest;Factura adicionalmente con otro impuesto? (Nombre):</label>
        <input class="social" type="text" id="form_iva2_name" name="iva2_name" value="{$fp->iva2_name}" />
        {include file="lib/error.tpl" error=$fp->getError('iva2_name')}
    </div>
    
    <div class="row" id="form_iva2_container">
        <label for="form_iva2_">&iquest;Factura adicionalmente con otro impuesto? (&#37;):</label>
        <input class="social" type="text" id="form_iva2" name="iva2" value="{$fp->iva2}" data-a-dec="," data-a-sep="." />
        {include file="lib/error.tpl" error=$fp->getError('iva2')}
    </div>
    
    <div class="row" id="form_retention_container">
        <label for="form_retention_">&iquest;Utiliza retenci&oacute;n de impuesto? (&#37;):</label>
        <input type="hidden" name="retention_q" value="">
        <input type="hidden" name="contact_id_" value="{$fp->contact_id_}">
        <input class="social" type="text" id="form_retention" name="retention" value="{$fp->retention}" data-a-dec="," data-a-sep="." />
        {include file="lib/error.tpl" error=$fp->getError('retention')}
    </div>
    
    {* <div class="row" id="form_invoice_number_container">
    	<label for="form_invoice_number">N&uacute;mero de factura:</label>
        <select id="form_invoice_number" name="invoice_number"/>
			<option value="unico" {if $fp->invoice_number == 'unico'} selected="selected" {/if}>&Uacute;nico</option>
        		<option value="consecutivo" {if $fp->invoice_number == 'consecutivo'} selected="selected" {/if}>Consecutivo</option>
        		<option value="ambos" {if $fp->invoice_number == 'ambos'} selected="selected" {/if}>Ambos</option>
		</select>
        {include file="lib/error.tpl" error=$fp->getError('invoice_number')}
    </div> *}
    <input type="hidden" id="form_invoice_number" name="invoice_number" value="unico">
    
    <div class="row" id="form_number_start_container">
        <label for="form_number_start">Serie y N&ordm; de Factura:</label>
        <input class="phone" type="text" id="form_number_start_letter"
               name="number_start_letter" value="{if $fp->number_start_letter}{$fp->number_start_letter}{else}A{/if}" /> -
        <input class="phone" type="text" id="form_number_zero"
               name="number_zero" value="{if $fp->number_zero}{$fp->number_zero}{else}00000{/if}" />
        <input class="phone" type="text" id="form_number_start"
               name="number_start" value="{if $fp->number_start}{$fp->number_start}{else}1{/if}" />
        {include file="lib/error.tpl" error=$fp->getError('number_start')}
    </div>
    
    <div class="row" id="form_consecutive_container">
        <label for="form_consecutive_">N&ordm; consecutivo (si aplica):</label>
        <input class="social" type="text" id="form_consecutive" name="consecutive" value="{if $fp->consecutive}{$fp->consecutive}{/if}" data-v-min="0.00" data-v-max="999999999" data-a-sep=""/>
        {include file="lib/error.tpl" error=$fp->getError('consecutive')}
    </div>
    
    {if $fp->currency}<input type="hidden" id="form_currency" name="currency" value="{$fp->currency}">
    {else}
    <div class="row" id="form_currency_container">
    	<label for="form_currency">Moneda utilizada:</label>
        <select id="form_currency" name="currency"/>
       		<option value="">Seleccione...</option>
       		<option value="Euro" {if $default_country == 'ES'} selected="selected" {/if}>&#128; Euro</option>
			<option value="Peso Argentino" {if $default_country == 'AR'} selected="selected" {/if}>&#36; Peso Argentino</option>
        		<option value="Peso Boliviano" {if $default_country == 'BO'} selected="selected" {/if}>b&#36; Peso Boliviano</option>
        		<option value="Peso Chileno" {if $default_country == 'CL'} selected="selected" {/if}>&#36; Peso Chileno</option>
        		<option value="Peso Colombiano" {if $default_country == 'CO'} selected="selected" {/if}>&#36; Peso Colombiano</option>
        		<option value="Colon" {if $default_country == 'CR'} selected="selected" {/if}>&#162; Col&oacute;n</option>
        		<option value="Peso Dominicano" {if $default_country == 'DO'} selected="selected" {/if}>&#36; Peso Dominicano</option>
        		<option value="Dolar" {if $default_country == 'US' || $default_country == 'PR' || $default_country == 'SV' || $default_country == 'EC'} selected="selected" {/if}>USD &#36; Dolar</option>
        		<option value="Quetzal" {if $default_country == 'GT'} selected="selected" {/if}>Q Quetzal</option>
        		<option value="Lempira" {if $default_country == 'HN'} selected="selected" {/if}>L Lempira</option>
        		<option value="Peso Mexicano" {if $default_country == 'MX'} selected="selected" {/if}>&#36; Peso Mexicano</option>
			<option value="Cordoba" {if $default_country == 'NI'} selected="selected" {/if}>C&#36; C&oacute;rdoba</option>		
        		<option value="Balboa" {if $default_country == 'PA'} selected="selected" {/if}>B/. Balboa</option>
        		<option value="Guarani" {if $default_country == 'PG'} selected="selected" {/if}>&#8370; Guaran&iacute;</option>
        		<option value="Nuevo Sol" {if $default_country == 'PE'} selected="selected" {/if}>S/. Nuevo Sol</option>
        		<option value="Libra" {if $default_country == 'GBR'} selected="selected" {/if}>&#163; Libra Esterlina</option>
        		<option value="Peso Uruguayo" {if $default_country == 'UY'} selected="selected" {/if}>&#36; Peso Uruguayo</option>
        		<option value="Bolivar" {if $default_country == 'VE'} selected="selected" {/if}>Bs. Bol&iacute;var</option>  		
		</select>
        {include file="lib/error.tpl" error=$fp->getError('currency')}
    </div>
    {/if}
    
    <div class="row" id="form_recc_">
    		<label for="form_recc_">Empresa de Regimen especial (RECC):</label>
    		<input type="checkbox" name="recc" value="true" {if $fp->recc == "true"}checked="checked"{/if}> 
	</div>
    
   {literal}
    <script type="text/javascript"> 		
        		jQuery(document).ready(function() {
       				jQuery('#form_retention').autoNumeric("init");
      				jQuery('#form_iva2').autoNumeric("init");
      				jQuery('#form_iva').autoNumeric("init");
      				jQuery('#form_consecutive').autoNumeric("init", {mDec: '0'});
      		});
     </script>
     {/literal}

	<div class="row">
			<label for="form_source">&nbsp;</label>
    			<button class="submit" type="submit" name="add" id="add" value="add">Guardar</button> 
	</div>
</form>

{include file='footer.tpl'}