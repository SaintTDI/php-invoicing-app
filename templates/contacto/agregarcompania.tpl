{include file='header.tpl' section='contacto' subsection='agregarcompania'}
{literal}<script type="text/javascript"> 		
 			jQuery(document).ready(function() {
      				jQuery('#form_irpf').autoNumeric("init");
			});
</script>{/literal}
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Nueva Compa&ntilde;ia Contacto:</h3></label>
</div>
<form method="post" id="comp_id" action="{geturl action='agregarcompania'}?id={$fp->company->getId()}" enctype="multipart/form-data">
    {if $fp->hasError()}
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    {/if}
    
    <input type="hidden" id="form_comp_doc_type" name="comp_doc_type" value="contact">
    
    
	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_thecompany_container">
		        <label for="form_thecompany">Raz&oacute;n Social <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_thecompany" name="thecompany" value="{$smarty.post.thecompany}" placeholder="Empresa, sociedad o persona"/>
		        {include file="lib/error.tpl" error=$fp->getError('thecompany')}
		    </div>
	        {foreach from=$fp->companyProfile key='key' item='label'}
	                {if $label == 'Industry'}
	     				<div class="row" id="form_industry_container">
	     				<label for="form_industry">&Aacute;rea o Sector:</label>
	        				<select id="form_industry" name="company_industry" class="stored"/>
	       						<option value="" {if $smarty.post.company_industry == ''} selected="selected" {/if}>Seleccione...</option>
								<option value="Agricultura" {if $smarty.post.company_industry == 'Agricultura'} selected="selected" {/if}>Agricultura</option>
								<option value="Actividades Culturales" {if $smarty.post.company_industry == 'Actividades Culturales'} selected="selected" {/if}>Actividades Culturales</option>
								<option value="Actividades Deportivas" {if $smarty.post.company_industry == 'Actividades Deportivas'} selected="selected" {/if}>Actividades Deportivas</option>
								<option value="Medicina y Salud" {if $smarty.post.company_industry == 'Medicina y Salud'} selected="selected" {/if}>Medicina y Salud</option>
								<option value="Fabricaci&oacute;n Artesanal" {if $smarty.post.company_industry == 'Fabricacion Artesanal'} selected="selected" {/if}>Fabricaci&oacute;n Artesanal</option>
								<option value="Veterinaria" {if $smarty.post.company_industry == 'Veterinaria'} selected="selected" {/if}>Veterinaria</option>
								<option value="Administraci&oacute;n P&uacute;blica" {if $smarty.post.company_industry == 'Administracion Publica'} selected="selected" {/if}>Administraci&oacute;n P&uacute;blica</option>
								<option value="Alimentaci&oacute;n y Bebidas" {if $smarty.post.company_industry == 'Alimentacion y Bebidas'} selected="selected" {/if}>Alimentaci&oacute;n y Bebidas</option>
								<option value="Artes gr&aacute;ficas" {if $smarty.post.company_industry == 'Artes graficas'} selected="selected" {/if}>Artes gr&aacute;ficas</option>
								<option value="Artes y Espect&aacute;culos" {if $smarty.post.company_industry == 'Artes y Espectaculos'} selected="selected" {/if}>Artes y Espect&aacute;culos</option>
								<option value="Asesor&iacute;a Contable" {if $smarty.post.company_industry == 'Asesoria Contable'} selected="selected" {/if}>Asesor&iacute;a Contable</option>
								<option value="Asesor&iacute;a Jur&iacute;dica" {if $smarty.post.company_industry == 'Asesoria Juridica'} selected="selected" {/if}>Asesor&iacute;a Jur&iacute;dica</option>
								<option value="Audiovisual" {if $smarty.post.company_industry == 'Audiovisual'} selected="selected" {/if}>Audiovisual</option>
								<option value="Automoci&oacute;n" {if $smarty.post.company_industry == 'Automocion'} selected="selected" {/if}>Automoci&oacute;n</option>
								<option value="Comercio al por Mayor" {if $smarty.post.company_industry == 'Comercio al por Mayor'} selected="selected" {/if}>Comercio al por Mayor</option>
								<option value="Comercio al por Meno" {if $smarty.post.company_industry == 'Comercio al por Meno'} selected="selected" {/if}>Comercio al por Menor</option>
								<option value="Construcci&oacute;n" {if $smarty.post.company_industry == 'Construccion'} selected="selected" {/if}>Construcci&oacute;n</option>
								<option value="Defensa" {if $smarty.post.company_industry == 'Defensa'} selected="selected" {/if}>Defensa</option>
								<option value="Editorial" {if $smarty.post.company_industry == 'Editorial'} selected="selected" {/if}>Editorial</option>
								<option value="Educaci&oacute;n" {if $smarty.post.company_industry == 'Educacion'} selected="selected" {/if}>Educaci&oacute;n</option>
								<option value="Ganader&iacute;a" {if $smarty.post.company_industry == 'Ganaderia'} selected="selected" {/if}>Ganader&iacute;a</option>
								<option value="Gesti&oacute;n de residuos" {if $smarty.post.company_industry == 'Gestion de residuos'} selected="selected" {/if}>Gesti&oacute;n de residuos</option>
								<option value="Hosteler&iacute;a" {if $smarty.post.company_industry == 'Hosteleria'} selected="selected" {/if}>Hosteler&iacute;a</option>
								<option value="Fabricaci&oacute;n Industrial" {if $smarty.post.company_industry == 'Fabricacion Industrial'} selected="selected" {/if}>Fabricaci&oacute;n Industrial</option>
								<option value="Inform&aacute;tica" {if $smarty.post.company_industry == 'Informatica'} selected="selected" {/if}>Inform&aacute;tica</option>
								<option value="Miner&iacute;a" {if $smarty.post.company_industry == 'Mineria'} selected="selected" {/if}>Miner&iacute;a</option>
								<option value="Otras actividades profesionales, cient&iacute;ficas y t&eacute;cnicas" {if $smarty.post.company_industry == 'Otras actividades profesionales, cientificas y tecnicas'} selected="selected" {/if}>Otras actividades profesionales, cient&iacute;ficas y t&eacute;cnicas</option>
								<option value="Farmacia" {if $smarty.post.company_industry == 'Farmacia'} selected="selected" {/if}>Farmacia</option>
								<option value="Pesca / acuicultura" {if $smarty.post.company_industry == 'Pesca / acuicultura'} selected="selected" {/if}>Pesca / acuicultura</option>
								<option value="Promoci&oacute;n y gesti&oacute;n Inmobiliaria" {if $smarty.post.company_industry == 'Promocion y gestion Inmobiliaria'} selected="selected" {/if}>Promoci&oacute;n y gesti&oacute;n Inmobiliaria</option>
								<option value="Publicidad y estudios de mercado" {if $smarty.post.company_industry == 'Publicidad y estudios de mercado'} selected="selected" {/if}>Publicidad y estudios de mercado</option>
								<option value="Reparaci&oacute;n y Mantenimiento" {if $smarty.post.company_industry == 'Reparacion y Mantenimiento'} selected="selected" {/if}>Reparaci&oacute;n y Mantenimiento</option>
								<option value="Seguridad Privada" {if $smarty.post.company_industry == 'Seguridad Privada'} selected="selected" {/if}>Seguridad Privada</option>
								<option value="Servicios de Arquitectura y paisajismo" {if $smarty.post.company_industry == 'Servicios de Arquitectura y paisajismo'} selected="selected" {/if}>Servicios de Arquitectura y paisajismo</option>
								<option value="Servicios de Ingenier&iacute;a" {if $smarty.post.company_industry == 'Servicios de Ingenieria'} selected="selected" {/if}>Servicios de Ingenier&iacute;a</option>
								<option value="Servicios de Recursos Humanos" {if $smarty.post.company_industry == 'Servicios de Recursos Humanos'} selected="selected" {/if}>Servicios de Recursos Humanos</option>
								<option value="Transporte" {if $smarty.post.company_industry == 'Transporte'} selected="selected" {/if}>Transporte</option>
								<option value="Servicios Financieros" {if $smarty.post.company_industry == 'Servicios Financieros'} selected="selected" {/if}>Servicios Financieros</option>
								<option value="Telecomunicaciones" {if $smarty.post.company_industry == 'Telecomunicaciones'} selected="selected" {/if}>Telecomunicaciones</option>
								<option value="Turismo" {if $smarty.post.company_industry == 'Turismo'} selected="selected" {/if}>Turismo</option>
								<option value="Seguros y Reaseguros" {if $smarty.post.company_industry == 'Seguros y Reaseguros'} selected="selected" {/if}>Seguros y Reaseguros</option>
								<option value="Qu&iacute;mica" {if $smarty.post.company_industry == 'Quimica'} selected="selected" {/if}>Qu&iacute;mica</option>
							</select>
	        					{include file="lib/error.tpl" error=$fp->getError('company_industry')}
	    					</div>
	                	{/if}
	        {/foreach}
		</div>
		<div class="form_right">
		    <div class="row" id="form_identification_container">
		        <label for="form_identification">Identificaci&oacute;n Fiscal:</label>
		        <input type="text" class="stored" id="form_identification" name="identification" value="{$smarty.post.identification}" placeholder="Ej: 99999999-R"/>
		        {include file="lib/error.tpl" error=$fp->getError('identification')}
		    </div>
	        {foreach from=$fp->companyProfile key='key' item='label'}
	                {if $label == 'Specialty'}
	                		<div class="row" id="form_specialty_container">
	                			<label for="form_specialty">Especialidad:</label>
							<input type="text" class="stored" id="form_{$key}" maxlength="200" name="{$key}" value="{$smarty.post.$key}" placeholder="Ej: Branding y Mercadeo"/> 
	                	     	{include file="lib/error.tpl" error=$fp->getError($key)}
	                	    </div>
	                	{/if}
	        {/foreach}
		</div>
	</div>

	<div class="form_box">
		<div class="row" id="form_add">
	    {if $addresses|@count == 0}
	        <label for="form_address">Direcci&oacute;n:</label>
	        {include file='direccion/direcciones.tpl'}
	    		<a class="fancybox fancybox.iframe submit2" href="{geturl controller='direccion' action='agregardirecciones'}?doc_type=ccompany&doc_id={$company_id2}">Agregar Direcci&oacute;n</a>
	    {else}
	    		<label for="form_address">Direcci&oacute;n:</label>
	        {include file='direccion/direcciones.tpl'}
	        <a class="fancybox fancybox.iframe submit2" href="{geturl controller='direccion' action='agregardirecciones'}?doc_type=ccompany&doc_id={$company_id2}">Agregar Direcci&oacute;n</a>
	    {/if}
		</div>
	</div>

	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_email_container">
		        <label for="form_email">Email Principal <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_email" name="email_c" value="{$smarty.post.email_c}" placeholder="Ej: ejemplo@webproadmin.com"/>
		        {include file="lib/error.tpl" error=$fp->getError('email_c')}
		    </div>
		     {foreach from=$fp->companyProfile key='key' item='label'}
		     <div class="row" id="form_{$key}_container">
		     	{if $label == 'Website'}
		     		<label for="form_{$label}">Sitio Web:</label>
		     		<span class="url">http://www.</span>
		     		<input class="url_add stored" type="text" id="form_{$key}" maxlength="200" name="{$key}" value="{$smarty.post.$key}" placeholder="Ej: pagina.com"/>   
		    		    {include file="lib/error.tpl" error=$fp->getError($key)}
		     	{/if}
		     </div>
		     {/foreach}
		    <div class="row" id="form_phone_container">
		        <label for="form_phone">Tel&eacute;fono Principal:</label>
		        <input class="phone stored" type="text" id="form_phone_country" name="phone_country" value="{$smarty.post.phone_country}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_phone_area" name="phone_area" value="{$smarty.post.phone_area}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_phone" name="phone" value="{$smarty.post.phone}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        {include file="lib/error.tpl" error=$fp->getError('phone')}
		    </div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_email2_container">
		        <label for="form_email2">Email Secundario:</label>
		        <input type="text" class="stored" id="form_email2" name="email2" value="{$smarty.post.email2}" placeholder="Ej: ejemplo@webproadmin.com"/>
		        {include file="lib/error.tpl" error=$fp->getError('email2')}
		    </div>
		     {foreach from=$fp->companyProfile key='key' item='label'}
		     <div class="row" id="form_{$key}_container">
		     	{if $label == 'Twitter'}
		     		<label for="form_{$label}">Cuenta en Twitter:</label>
		     		<input class="twitter" type="text" id="form_help" name="help" value="https://twitter.com/" disabled="disabled" />
		     		<input class="t_user stored" type="text" id="form_{$key}" maxlength="200" name="{$key}" value="{$smarty.post.$key}" placeholder="Ej: usuario"/>   
		    		    {include file="lib/error.tpl" error=$fp->getError($key)}
		     	{/if}
		     </div>
		     {/foreach}
		    <div class="row" id="form_phone2_container">
		        <label for="form_phone2">Tel&eacute;fono Secundario:</label>
		        <input class="phone stored" type="text" id="form_phone2_country" name="phone2_country" value="{$smarty.post.phone2_country}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_phone2_area" name="phone2_area" value="{$smarty.post.phone2_area}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_phone2" name="phone2" value="{$smarty.post.phone2}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        {include file="lib/error.tpl" error=$fp->getError('phone2')}
		    </div>
		</div>
	</div>
	
	
	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_fax_container">
		        <label for="form_fax">Fax:</label>
		        <input class="phone stored" type="text" id="form_fax_country" name="fax_country" value="{$smarty.post.fax_country}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_fax_area" name="fax_area" value="{$smarty.post.fax_area}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_fax" name="fax" value="{$smarty.post.fax}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        {include file="lib/error.tpl" error=$fp->getError('fax')}
		    </div>
		</div>
		<div class="form_right">
		  <div class="row" id="form_company_relationship">
		    	<label for="form_company_relationship">Relaci&oacute;n:</label>
		        <select id="form_company_relationship" name="relationship" class="stored"/>
		       		<option value="" {if $smarty.post.relationship == ''} selected="selected" {/if}>Seleccione...</option>
					<option value="proveedor" {if $smarty.post.relationship == 'proveedor'} selected="selected" {/if}>Proveedor</option>
		        		<option value="cliente" {if $smarty.post.relationship == 'cliente'} selected="selected" {/if}>Cliente</option>
		        		<option value="potencial" {if $smarty.post.relationship == 'potencial'} selected="selected" {/if}>Cliente Potencial</option>
		        		<option value="gobierno" {if $smarty.post.relationship == 'gobierno'} selected="selected" {/if}>Gobierno</option>
				</select>
		        {include file="lib/error.tpl" error=$fp->getError('relationship')}
		    </div>
		</div>
	</div>

	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_recc_">
		    		<span for="form_recc__">Acogida al RECC:</span>
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
	
	<div class="row" id="form_notes_container">
    		<label for="form_notes">Notas Personales:</label>
    		<textarea class="big_textarea stored" id="form_notes" name="notes" rows="10" cols="50" placeholder="Coloca aqu&iacute; cualquier nota o comentario personal sobre este perfil. Lo que escribas s&oacute;lo ser&aacute; visible para los usuarios de tu cuenta.">{$smarty.post.notes}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError(notes)}
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