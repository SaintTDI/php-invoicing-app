{include file='header.tpl' section='cuenta' subsection='empresa'}

<div class="title" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Tus datos de Empresa:</h3></label>
</div>

<form id="cmpd_id" method="post" action="{geturl action='empresa'}" enctype="multipart/form-data">

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

    <div class="form_box">
	    <div class="form_left">
		    <div class="row" id="form_thecompany_container">
		        <label for="form_thecompany">Raz&oacute;n Social <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_thecompany" name="thecompany" value="{if $fp->thecompany}{$fp->thecompany}{else}{$smarty.post.thecompany}{/if}" placeholder="Empresa, sociedad o persona"/>
		        {include file="lib/error.tpl" error=$fp->getError('thecompany')}
		    </div>
		    <div class="row" id="form_identification_container">
		        <label for="form_identification">N&uacute;mero de dentificaci&oacute;n Fiscal <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_identification" name="identification" value="{if $fp->identification}{$fp->identification}{else}{$smarty.post.identification}{/if}" placeholder="Ej: 99999999-R"/>
		        {include file="lib/error.tpl" error=$fp->getError('identification')}
		    </div>
	    </div>
	    
	    <div class="form_right">
		    <div class="row" id="form_commercial_container">
		        <label for="form_commercial">Nombre Comercial:</label>
		        <input type="text" class="stored" id="form_commercial" name="commercial" value="{if $fp->commercial}{$fp->commercial}{else}{$smarty.post.commercial}{/if}" placeholder="Nombre Comercial"/>
		        {include file="lib/error.tpl" error=$fp->getError('commercial')}
		    </div>
		    <div class="row" id="form_year_start_container">
		        <label for="form_year_start">Inicio del per&iacute;odo fiscal <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_year_start" name="year_start" value="{if $fp->year_start}{$fp->year_start}{else}{$now_}{/if}" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
		        {include file="lib/error.tpl" error=$fp->getError('year_start')}
		    </div>
	    </div>
    </div>
    <div class="row" id="form_address_">
	    {if $addresses|@count == 0}
	        <label for="form_address">Direcci&oacute;n <strong>&#x28;&#x2A;&#x29;</strong>:</label>
	        {include file='direccion/direcciones.tpl'}
	    		<a class="fancybox fancybox.iframe submit2" href="{geturl controller='direccion' action='agregardirecciones'}?doc_type=company&doc_id={$company_id2}">Agregar Direcci&oacute;n</a>
	    		<input type="hidden" id="form_add_check" name="add_check" value="false">
	    		{include file="lib/error.tpl" error=$fp->getError('add_check')}
	    {else}
	    		<label for="form_address">Direcci&oacute;n <strong>&#x28;&#x2A;&#x29;</strong>:</label>
	        {include file='direccion/direcciones.tpl'}
	        <a class="fancybox fancybox.iframe submit2" href="{geturl controller='direccion' action='agregardirecciones'}?doc_type=company&doc_id={$company_id2}">Agregar Direcci&oacute;n</a>
	    		<input type="hidden" id="form_add_check" name="add_check" value="true">
	    		{include file="lib/error.tpl" error=$fp->getError('add_check')}
	    {/if}
    </div>
    <div class="form_box">
	    <div class="form_left">
		    <div class="row" id="form_email_container">
		        <label for="form_email">Email Principal <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_email" name="email_c" value="{if $fp->email_c}{$fp->email_c}{else}{$smarty.post.email_c}{/if}" placeholder="Ej: ejemplo@webproadmin.com"/>
		        {include file="lib/error.tpl" error=$fp->getError('email_c')}
		    </div>
		    
		    <div class="row" id="form_mobile_container">
		        <label for="form_mobile">Tel&eacute;fono M&oacute;vil:</label>
		        <input class="phone stored" type="text" id="form_mobile_country" name="mobile_country" value="{if $fp->mobile_country}{$fp->mobile_country}{else}{$smarty.post.mobile_country}{/if}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_mobile_area" name="mobile_area" value="{if $fp->mobile_area}{$fp->mobile_area}{else}{$smarty.post.mobile_area}{/if}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_mobile" name="mobile" value="{if $fp->mobile}{$fp->mobile}{else}{$smarty.post.mobile}{/if}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        {include file="lib/error.tpl" error=$fp->getError('mobile')}
		    </div>
		    
		    <div class="row" id="form_phone_container">
		        <label for="form_phone">Tel&eacute;fono Principal:</label>
		        <input class="phone stored" type="text" id="form_phone_country" name="phone_country" value="{if $fp->phone_country}{$fp->phone_country}{else}{$smarty.post.phone_country}{/if}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_phone_area" name="phone_area" value="{if $fp->phone_area}{$fp->phone_area}{else}{$smarty.post.phone_area}{/if}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_phone" name="phone" value="{if $fp->phone}{$fp->phone}{else}{$smarty.post.phone}{/if}" onkeypress='validate(event)'  placeholder="Tel&eacute;fono"/>
		        {include file="lib/error.tpl" error=$fp->getError('phone')}
		    </div>
		    
        {foreach from=$fp->companyProfile key='key' item='label'}
        	<div class="row" id="form_{$key}_container">
                {if $label == 'Profile Picture'}
                		<label for="form_{$key}">Sube un logo de tu empresa:</label>
             		<input type="file" class="files" id="form_{$key}" name="{$key}" value="{if $fp->$key}{$fp->$key}{else}{$smarty.post.$key}{/if}"/>
                    {include file="lib/error.tpl" error=$fp->getError($key)}
                	{/if}
        </div>
        {/foreach}
		</div>
		
		<div class="form_right">
		    <div class="row" id="form_email2_container">
		        <label for="form_email2">Email Secundario:</label>
		        <input type="text" class="stored" id="form_email2" name="email2" value="{if $fp->email2}{$fp->email2}{else}{$smarty.post.email2}{/if}" placeholder="Ej: ejemplo@webproadmin.com"/>
		        {include file="lib/error.tpl" error=$fp->getError('email2')}
		    </div>
		   
		    <div class="row" id="form_phone2_container">
		        <label for="form_phone2">Tel&eacute;fono Secundario:</label>
		        <input class="phone stored" type="text" id="form_phone2_country" name="phone2_country" value="{if $fp->phone2_country}{$fp->phone2_country}{else}{$smarty.post.phone2_country}{/if}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_phone2_area" name="phone2_area" value="{if $fp->phone2_area}{$fp->phone2_area}{else}{$smarty.post.phone2_area}{/if}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_phone2" name="phone2" value="{if $fp->phone2}{$fp->phone2}{else}{$smarty.post.phone2}{/if}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        {include file="lib/error.tpl" error=$fp->getError('phone2')}
		    </div>
		    
		    <div class="row" id="form_fax_container">
		        <label for="form_fax">Fax:</label>
		        <input class="phone stored" type="text" id="form_fax_country" name="fax_country" value="{if $fp->fax_country}{$fp->fax_country}{else}{$smarty.post.fax_country}{/if}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_fax_area" name="fax_area" value="{if $fp->fax_area}{$fp->fax_area}{else}{$smarty.post.fax_area}{/if}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_fax" name="fax" value="{if $fp->fax}{$fp->fax}{else}{$smarty.post.fax}{/if}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        {include file="lib/error.tpl" error=$fp->getError('fax')}
		    </div>
		   
        {foreach from=$fp->companyProfile key='key' item='label'}
        	<div class="row" id="form_{$key}_container">
                {if $label == 'Picture Preview'}
                		<label for="form_{$key}">Logo de tu empresa:</label>
                		{if $fp->$key != ''}
                				{assign var="url" value=$fp->$key}
                            	<img src="/profiles/tmp/company/pictures/{$url}" />
                        	{else}
                            	<img src="/profiles/tmp/company/pictures/profile.png" />
                        {/if}
                	{/if}
         </div>
        {/foreach}
		</div>
	</div>

        {* foreach from=$fp->companyProfile key='key' item='label'}
                {if $label == 'Industry'}
     				<div class="row" id="form_industry_container">
     				<label for="form_industry">&Aacute;rea o Sector:</label>
        				<select id="form_industry" name="company_industry" class="stored"/>
       						<option value="" {if $company_industry == '' || $smarty.post.company_industry  == ''} selected="selected" {/if}>Seleccione...</option>
							<option value="Agricultura" {if $company_industry == 'Agricultura' || $smarty.post.company_industry  == 'Agricultura'} selected="selected" {/if}>Agricultura</option>
							<option value="Actividades Culturales" {if $company_industry == 'Actividades Culturales' || $smarty.post.company_industry  == 'Actividades Culturales'} selected="selected" {/if}>Actividades Culturales</option>
							<option value="Actividades Deportivas" {if $company_industry == 'Actividades Deportivas' || $smarty.post.company_industry  == 'Actividades Deportivas'} selected="selected" {/if}>Actividades Deportivas</option>
							<option value="Medicina y Salud" {if $company_industry == 'Medicina y Salud' || $smarty.post.company_industry  == 'Medicina y Salud'} selected="selected" {/if}>Medicina y Salud</option>
							<option value="Fabricaci&oacute;n Artesanal" {if $company_industry == 'Fabricacion Artesanal' || $smarty.post.company_industry  == 'Fabricacion Artesanal'} selected="selected" {/if}>Fabricaci&oacute;n Artesanal</option>
							<option value="Veterinaria" {if $company_industry == 'Veterinaria' || $smarty.post.company_industry  == 'Veterinaria'} selected="selected" {/if}>Veterinaria</option>
							<option value="Administraci&oacute;n P&uacute;blica" {if $company_industry == 'Administracion Publica' || $smarty.post.company_industry  == 'Administracion Publica'} selected="selected" {/if}>Administraci&oacute;n P&uacute;blica</option>
							<option value="Alimentaci&oacute;n y Bebidas" {if $company_industry == 'Alimentacion y Bebidas' || $smarty.post.company_industry  == 'Alimentacion y Bebidas'} selected="selected" {/if}>Alimentaci&oacute;n y Bebidas</option>
							<option value="Artes gr&aacute;ficas" {if $company_industry == 'Artes graficas' || $smarty.post.company_industry  == 'Artes graficas'} selected="selected" {/if}>Artes gr&aacute;ficas</option>
							<option value="Artes y Espect&aacute;culos" {if $company_industry == 'Artes y Espectaculos' || $smarty.post.company_industry  == 'Artes y Espectaculos'} selected="selected" {/if}>Artes y Espect&aacute;culos</option>
							<option value="Asesor&iacute;a Contable" {if $company_industry == 'Asesoria Contable' || $smarty.post.company_industry  == 'Asesoria Contable'} selected="selected" {/if}>Asesor&iacute;a Contable</option>
							<option value="Asesor&iacute;a Jur&iacute;dica" {if $company_industry == 'Asesoria Juridica' || $smarty.post.company_industry  == 'Asesoria Juridica'} selected="selected" {/if}>Asesor&iacute;a Jur&iacute;dica</option>
							<option value="Audiovisual" {if $company_industry == 'Audiovisual' || $smarty.post.company_industry  == 'Audiovisual'} selected="selected" {/if}>Audiovisual</option>
							<option value="Automoci&oacute;n" {if $company_industry == 'Automocion' || $smarty.post.company_industry  == 'Automocion'} selected="selected" {/if}>Automoci&oacute;n</option>
							<option value="Comercio al por Mayor" {if $company_industry == 'Comercio al por Mayor' || $smarty.post.company_industry  == 'Comercio al por Mayor'} selected="selected" {/if}>Comercio al por Mayor</option>
							<option value="Comercio al por Menor" {if $company_industry == 'Comercio al por Menor' || $smarty.post.company_industry  == 'Comercio al por Menor'} selected="selected" {/if}>Comercio al por Menor</option>
							<option value="Construcci&oacute;n" {if $company_industry == 'Construccion' || $smarty.post.company_industry  == 'Construccion'} selected="selected" {/if}>Construcci&oacute;n</option>
							<option value="Defensa" {if $company_industry == 'Defensa' || $smarty.post.company_industry  == 'Defensa'} selected="selected" {/if}>Defensa</option>
							<option value="Editorial" {if $company_industry == 'Editorial' || $smarty.post.company_industry  == 'Editorial'} selected="selected" {/if}>Editorial</option>
							<option value="Educaci&oacute;n" {if $company_industry == 'Educacion' || $smarty.post.company_industry  == 'Educacion'} selected="selected" {/if}>Educaci&oacute;n</option>
							<option value="Ganader&iacute;a" {if $company_industry == 'Ganaderia' || $smarty.post.company_industry  == 'Ganaderia'} selected="selected" {/if}>Ganader&iacute;a</option>
							<option value="Gesti&oacute;n de residuos" {if $company_industry == 'Gestion de residuos' || $smarty.post.company_industry  == 'Gestion de residuos'} selected="selected" {/if}>Gesti&oacute;n de residuos</option>
							<option value="Hosteler&iacute;a" {if $company_industry == 'Hosteleria' || $smarty.post.company_industry  == 'Hosteleria'} selected="selected" {/if}>Hosteler&iacute;a</option>
							<option value="Fabricaci&oacute;n Industrial" {if $company_industry == 'Fabricacion Industrial' || $smarty.post.company_industry  == 'Fabricacion Industrial'} selected="selected" {/if}>Fabricaci&oacute;n Industrial</option>
							<option value="Inform&aacute;tica" {if $company_industry == 'Informatica' || $smarty.post.company_industry  == 'Informatica'} selected="selected" {/if}>Inform&aacute;tica</option>
							<option value="Miner&iacute;a" {if $company_industry == 'Mineria' || $smarty.post.company_industry  == 'Mineria'} selected="selected" {/if}>Miner&iacute;a</option>
							<option value="Otras actividades profesionales, cient&iacute;ficas y t&eacute;cnicas" {if $company_industry == 'Otras actividades profesionales, cientificas y tecnicas' || $smarty.post.company_industry  == 'Otras actividades profesionales, cientificas y tecnicas'} selected="selected" {/if}>Otras actividades profesionales, cient&iacute;ficas y t&eacute;cnicas</option>
							<option value="Farmacia" {if $company_industry == 'Farmacia' || $smarty.post.company_industry  == 'Farmacia'} selected="selected" {/if}>Farmacia</option>
							<option value="Pesca / acuicultura" {if $company_industry == 'Pesca / acuicultura' || $smarty.post.company_industry  == 'Pesca / acuicultura'} selected="selected" {/if}>Pesca / acuicultura</option>
							<option value="Promoci&oacute;n y gesti&oacute;n Inmobiliaria" {if $company_industry == 'Promocion y gestion Inmobiliaria' || $smarty.post.company_industry  == 'Promocion y gestion Inmobiliaria'} selected="selected" {/if}>Promoci&oacute;n y gesti&oacute;n Inmobiliaria</option>
							<option value="Publicidad y estudios de mercado" {if $company_industry == 'Publicidad y estudios de mercado' || $smarty.post.company_industry  == ''} selected="selected" {/if}>Publicidad y estudios de mercado</option>
							<option value="Reparaci&oacute;n y Mantenimiento" {if $company_industry == 'Reparacion y Mantenimiento' || $smarty.post.company_industry  == 'Reparacion y Mantenimiento'} selected="selected" {/if}>Reparaci&oacute;n y Mantenimiento</option>
							<option value="Seguridad Privada" {if $company_industry == 'Seguridad Privada' || $smarty.post.company_industry  == 'Seguridad Privada'} selected="selected" {/if}>Seguridad Privada</option>
							<option value="Servicios de Arquitectura y paisajismo" {if $company_industry == 'Servicios de Arquitectura y paisajismo' || $smarty.post.company_industry  == 'Servicios de Arquitectura y paisajismo'} selected="selected" {/if}>Servicios de Arquitectura y paisajismo</option>
							<option value="Servicios de Ingenier&iacute;a" {if $company_industry == 'Servicios de Ingenieria' || $smarty.post.company_industry  == ''} selected="selected" {/if}>Servicios de Ingenier&iacute;a</option>
							<option value="Servicios de Recursos Humanos" {if $company_industry == 'Servicios de Recursos Humanos' || $smarty.post.company_industry  == 'Servicios de Recursos Humanos'} selected="selected" {/if}>Servicios de Recursos Humanos</option>
							<option value="Transporte" {if $company_industry == 'Transporte' || $smarty.post.company_industry  == 'Transporte'} selected="selected" {/if}>Transporte</option>
							<option value="Servicios Financieros" {if $company_industry == 'Servicios Financieros' || $smarty.post.company_industry  == 'Servicios Financieros'} selected="selected" {/if}>Servicios Financieros</option>
							<option value="Telecomunicaciones" {if $company_industry == 'Telecomunicaciones' || $smarty.post.company_industry  == 'Telecomunicaciones'} selected="selected" {/if}>Telecomunicaciones</option>
							<option value="Turismo" {if $company_industry == 'Turismo' || $smarty.post.company_industry  == 'Turismo'} selected="selected" {/if}>Turismo</option>
							<option value="Seguros y Reaseguros" {if $company_industry == 'Seguros y Reaseguros' || $smarty.post.company_industry  == 'Seguros y Reaseguros'} selected="selected" {/if}>Seguros y Reaseguros</option>
							<option value="Qu&iacute;mica" {if $company_industry == 'Quimica' || $smarty.post.company_industry  == 'Quimica'} selected="selected" {/if}>Qu&iacute;mica</option>
						</select>
        					{include file="lib/error.tpl" error=$fp->getError('company_industry')}
    					</div>
                {elseif $label == 'Specialty'}
                		<div class="row" id="form_specialty_container">
                			<label for="form_specialty">Especialidad:</label>
						<input type="text" class="stored" id="form_{$key}" maxlength="200" name="{$key}" value="{if $fp->$key}{$fp->$key}{else}{$smarty.post.$key}{/if}" placeholder="Ej: Branding y Mercadeo"/> 
                	     	{include file="lib/error.tpl" error=$fp->getError($key)}
                	    </div>
                	{/if}
        {/foreach *}
        
	{* 
	<div class="row" id="form_speech_container">
    		<label for="form_speech">Sales Speech:</label>
    		<textarea id="form_speech" class="stored" name="speech" rows="10" cols="50">{if $fp->speech}{$fp->speech}{else}{$smarty.post.speech}{/if}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError(speech)}
    	</div>
    	*}
    	{* 
     {foreach from=$fp->companyProfile key='key' item='label'}
     <div class="row" id="form_{$key}_container">
     	{if $label == 'Website'}
     		<label for="form_{$label}">Sitio Web:</label>
     		<input class="social stored" type="text" id="form_help" name="help" value="http://www." disabled="disabled" />
     		<input class="social stored" type="text" id="form_{$key}" maxlength="200" name="{$key}" value="{if $fp->$key}{$fp->$key}{else}{$smarty.post.$key}{/if}" placeholder="Ej: pagina.com"/>   
    		    {include file="lib/error.tpl" error=$fp->getError($key)}
    		{elseif $label == 'Twitter'}
     		<label for="form_{$label}">Cuenta en Twitter:</label>
     		<input class="social stored" type="text" id="form_help1" name="help1" value="https://twitter.com/" disabled="disabled" />
     		<input class="social stored" type="text" id="form_{$key}" maxlength="200" name="{$key}" value="{if $fp->$key}{$fp->$key}{else}{$smarty.post.$key}{/if}" placeholder="Ej: usuario"/>   
    		    {include file="lib/error.tpl" error=$fp->getError($key)}
     	{/if}
     </div>
     {/foreach}
	 *}
	 
    {* <div class="row" id="form_invoice_number_container">
    	<label for="form_invoice_number">N&uacute;mero de factura:</label>
        <select id="form_invoice_number" name="invoice_number" class="stored" />
			<option value="unico" {if $fp->invoice_number == 'unico' || $smarty.post.invoice_number  == 'unico'} selected="selected" {/if}>&Uacute;nico</option>
        		<option value="consecutivo" {if $fp->invoice_number == 'consecutivo' || $smarty.post.invoice_number  == 'consecutivo'} selected="selected" {/if}>Consecutivo</option>
        		<option value="ambos" {if $fp->invoice_number == 'ambos' || $smarty.post.invoice_number  == 'ambos'} selected="selected" {/if}>Ambos</option>
		</select>
        {include file="lib/error.tpl" error=$fp->getError('invoice_number')}
    </div> *}

		    {if $fp->currency}<input type="hidden" id="form_currency" name="currency" value="{$fp->currency}">
		    {else}
		    <div class="row" id="form_currency_container">
		    	<label for="form_currency">Moneda utilizada <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <select id="form_currency" name="currency" class="stored"/>
		       		<option value="">Seleccione...</option>
		       		<option value="Euro" {if $default_country == 'ES' || $smarty.post.currency  == 'ES'} selected="selected" {/if}>&#128; Euro</option>
					<option value="Peso Argentino" {if $default_country == 'AR' || $smarty.post.currency  == 'AR'} selected="selected" {/if}>&#36; Peso Argentino</option>
		        		<option value="Peso Boliviano" {if $default_country == 'BO' || $smarty.post.currency  == 'BO'} selected="selected" {/if}>b&#36; Peso Boliviano</option>
		        		<option value="Peso Chileno" {if $default_country == 'CL' || $smarty.post.currency  == 'CL'} selected="selected" {/if}>&#36; Peso Chileno</option>
		        		<option value="Peso Colombiano" {if $default_country == 'CO' || $smarty.post.currency  == 'CO'} selected="selected" {/if}>&#36; Peso Colombiano</option>
		        		<option value="Colon" {if $default_country == 'CR' || $smarty.post.currency  == 'CR'} selected="selected" {/if}>&#162; Col&oacute;n</option>
		        		<option value="Peso Dominicano" {if $default_country == 'DO' || $smarty.post.currency  == 'DO'} selected="selected" {/if}>&#36; Peso Dominicano</option>
		        		<option value="Dolar" {if $default_country == 'US' || $default_country == 'PR' || $default_country == 'SV' || $default_country == 'EC'} selected="selected" {/if}>USD &#36; Dolar</option>
		        		<option value="Quetzal" {if $default_country == 'GT' || $smarty.post.currency  == 'GT'} selected="selected" {/if}>Q Quetzal</option>
		        		<option value="Lempira" {if $default_country == 'HN' || $smarty.post.currency  == 'HN'} selected="selected" {/if}>L Lempira</option>
		        		<option value="Peso Mexicano" {if $default_country == 'MX' || $smarty.post.currency  == 'MX'} selected="selected" {/if}>&#36; Peso Mexicano</option>
					<option value="Cordoba" {if $default_country == 'NI' || $smarty.post.currency  == 'NI'} selected="selected" {/if}>C&#36; C&oacute;rdoba</option>		
		        		<option value="Balboa" {if $default_country == 'PA' || $smarty.post.currency  == 'PA'} selected="selected" {/if}>B/. Balboa</option>
		        		<option value="Guarani" {if $default_country == 'PG' || $smarty.post.currency  == 'PG'} selected="selected" {/if}>&#8370; Guaran&iacute;</option>
		        		<option value="Nuevo Sol" {if $default_country == 'PE' || $smarty.post.currency  == 'PE'} selected="selected" {/if}>S/. Nuevo Sol</option>
		        		<option value="Libra" {if $default_country == 'GBR' || $smarty.post.currency  == 'GBR'} selected="selected" {/if}>&#163; Libra Esterlina</option>
		        		<option value="Peso Uruguayo" {if $default_country == 'UY' || $smarty.post.currency  == 'UY'} selected="selected" {/if}>&#36; Peso Uruguayo</option>
		        		<option value="Bolivar" {if $default_country == 'VE' || $smarty.post.currency  == 'VE'} selected="selected" {/if}>Bs. Bol&iacute;var</option>  		
				</select>
		        {include file="lib/error.tpl" error=$fp->getError('currency')}
		    </div>
		    {/if}
    
 	<div class="form_box">
	    <div class="form_left">
		    <div class="row" id="form_iva_container">
		        <label for="form_iva_">Tu r&eacute;gimen habitual de IVA en &#37; <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_iva" name="iva" value="{if $fp->iva}{$fp->iva}{elseif $default_country == 'ES'}21{elseif $default_country == 'AR'}21{elseif $default_country == 'BO'}14.94{elseif $default_country == 'CL'}19{elseif $default_country == 'CO'}16{elseif $default_country == 'CR'}13{elseif $default_country == 'DO'}18{elseif $default_country == 'GT'}12{elseif $default_country == 'HN'}15{elseif $default_country == 'MX'}16{elseif $default_country == 'NI'}15{elseif $default_country == 'PA'}7{elseif $default_country == 'PG'}10{elseif $default_country == 'PE'}18{elseif $default_country == 'PR'}7{elseif $default_country == 'VE'}12{elseif $default_country == 'UY'}22{elseif $default_country == 'VE'}12{elseif $default_country == 'SV'}13{elseif $default_country == 'EC'}12{else}{$smarty.post.iva}{/if}" data-a-dec="," data-a-sep="." placeholder="Escribe 21 para el 21&#x25; de impuesto"/> 
		        {include file="lib/error.tpl" error=$fp->getError('iva')}
		    </div>
		    <div class="row" id="form_iva2_name_container">
		        <label for="form_iva2_name">&iquest;Facturas alg&uacute;n impuesto adicional? Coloca el nombre:</label>
		        <input type="text" class="stored" id="form_iva2_name" name="iva2_name" value="{if $fp->iva2_name}{$fp->iva2_name}{else}{$smarty.post.iva2_name}{/if}" placeholder="Ej: Impuesto al lujo"/>
		        {include file="lib/error.tpl" error=$fp->getError('iva2_name')}
		    </div>
		     <div class="row" id="form_number_start_container">
		        <label for="form_number_start">Serie y N&ordm; de Factura <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input class="invoice_1 stored" type="text" id="form_number_start_letter" name="number_start_letter" value="{if $fp->number_start_letter}{$fp->number_start_letter}{else}A{/if}" /> -
		        <input class="invoice_2 stored" type="text" id="form_number_zero" name="number_zero" value="{if $fp->number_zero}{$fp->number_zero}{else}00000{/if}" />
		        <input class="invoice_3 stored" type="text" id="form_number_start" name="number_start" value="{if $fp->number_start}{$fp->number_start}{else}1{/if}" />
		        {include file="lib/error.tpl" error=$fp->getError('number_start')}
		    </div>
	    </div>
	    
	    <div class="form_right">
			<div class="row" id="form_retention_container">
		        <label for="form_retention_">Retenci&oacute;n IRPF (en &#37;):</label>
		        <input type="hidden" id="form_retention_q" class="stored" name="retention_q" value="">
		        <input type="hidden" id="form_contact_id_" class="stored" name="contact_id_" value="{$fp->contact_id_}">
		        <input type="text" id="form_retention" class="stored" name="retention" value="{if $fp->retention}{$fp->retention}{else}{$smarty.post.retention}{/if}" data-a-dec="," data-a-sep="." placeholder="Escribe 24&#x25; para el 24 de retenci&oacute;n"/>
		        {include file="lib/error.tpl" error=$fp->getError('retention')}
		    </div>
		    <div class="row" id="form_iva2_container">
		        <label for="form_iva2_">Impuesto adicional (en &#37;):</label>
		        <input type="text" id="form_iva2" class="stored" name="iva2" value="{if $fp->iva2}{$fp->iva2}{else}{$smarty.post.iva2}{/if}" data-a-dec="," data-a-sep="." placeholder="Escribe 2 para el 2&#x25; de impuesto"/>
		        {include file="lib/error.tpl" error=$fp->getError('iva2')}
		    </div>
		    <div class="row" id="form_consecutive_container">
		        <label for="form_consecutive_">N&ordm; consecutivo (si aplica):</label>
		        <input type="text" id="form_consecutive" class="stored" name="consecutive" value="{if $fp->consecutive}{$fp->consecutive}{else}{$smarty.post.consecutive}{/if}" data-v-min="0.00" data-v-max="999999999" data-a-sep="" placeholder="Ej: 999"/>
		        {include file="lib/error.tpl" error=$fp->getError('consecutive')}
		    </div>
	    </div>
    </div>

    <input type="hidden" id="form_invoice_number" name="invoice_number" value="unico">
    
    <div class="form_box">
	    <div class="row" id="form_recc_">
	    		<span for="form_recc_">Mi empresa est&aacute; acogida al R&eacute;gimen Especial de Criterio de Caja:</span>
	    		<input type="checkbox" class="stored" name="recc" id="form_recc" value="true" {if $fp->recc == "true" || $smarty.post.recc  == 'true'}checked="checked"{/if}> 
		</div>
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
	
	<div class="form_box">
		<div class="row">
	    		{if $identity->trial_expired}{else}<button class="submit" type="submit" name="add" id="add" value="add">Guardar Cambios</button>{/if}
		</div>
	</div>
	<div class="form_box">
		<div class="row" id="form_contact_notes">
	    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
	    	</div>
    	</div>
</form>

{include file='footer.tpl'}