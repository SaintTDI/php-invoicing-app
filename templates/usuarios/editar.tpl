{include file='header.tpl' section='usuarios' subsection='editar'}
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Editar Usuario:</h3></label>
</div>

<form method="post" id="usr_id" action="{geturl action='editar'}?id={$fp->user->getId()}" enctype="multipart/form-data">

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
    
    <div class="row" id="form_user_email"> 
        <label for="form_user_email">Correo Electr&oacute;nico <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_user_email" name="email" disabled="disabled" value="{$fp->email}" placeholder="Ej: ejemplo@webproadmin.com"/>
        {include file="lib/error.tpl" error=$fp->getError('email')}
    </div>
    
    <div class="row" id="form_user_first_name">
        <label for="form_user_first_name">Nombre <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_user_first_name" name="first_name" value="{$fp->first_name}" placeholder="Nombre"/>
        {include file="lib/error.tpl" error=$fp->getError('first_name')}
    </div>
    
    <div class="row" id="form_user_last_name">
        <label for="form_user_last_name">Apellido <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_user_last_name" name="last_name" value="{$fp->last_name}" placeholder="Apellido"/>
        {include file="lib/error.tpl" error=$fp->getError('last_name')}
    </div>
    
    <div class="row" id="form_contact_user_type">
    	<label for="form_contact_user_type">Perfil:</label>
        <select id="form_contact_user_type_" name="user_type_" disabled="disabled">
			<option value="employee" {if $fp->user_type == "employee"}selected="selected"{/if}>Colaborador</option>
			<option value="accountant" {if $fp->user_type == "accountant"}selected="selected"{/if}>Contador</option>
		</select>
    </div>
    {if $fp->user_type != "accountant"}
    <div class="row_accountant" id="form_accountant">
	    <div class="row" id="form_user_section">
	        <label for="form_user_section">Acceso(s):</label>
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Proyectos:</span>
	        <div class="user_check"><input type="checkbox" id="form_section6" name="section6" value="yes" {if $fp->section6 == "yes"}checked="checked"{/if} /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section6')}
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Contactos:</span>
	        <div class="user_check"><input type="checkbox" id="form_section7" name="section7" value="yes" {if $fp->section7 == "yes"}checked="checked"{/if} /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section7')}
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Productos/Servicios:</span>
	        <div class="user_check"><input type="checkbox" id="form_section8" name="section8" value="yes" {if $fp->section8 == "yes"}checked="checked"{/if} /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section8')}
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Finanzas:</span>
	        <div class="user_check"><input type="checkbox" id="form_section9" name="section9" value="yes" {if $fp->section9 == "yes"}checked="checked"{/if} /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section9')}
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Factura:</span>
	        <div class="user_check"><input type="checkbox" id="form_section1" name="section1" value="yes" {if $fp->section1 == "yes"}checked="checked"{/if} /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section1')}
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Gastos:</span>
	        <div class="user_check"><input type="checkbox" id="form_section2" name="section2" value="yes" {if $fp->section2 == "yes"}checked="checked"{/if} /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section2')}
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">&Oacute;rdenes de Compra:</span>
	        <div class="user_check"><input type="checkbox" id="form_section3" name="section3" value="yes" {if $fp->section3 == "yes"}checked="checked"{/if} /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section3')}
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Prespuestos:</span>
	        <div class="user_check"><input type="checkbox" id="form_section4" name="section4" value="yes" {if $fp->section4 == "yes"}checked="checked"{/if} /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section4')}
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Facturas Proforma:</span>
	        <div class="user_check"><input type="checkbox" id="form_section5" name="section5" value="yes" {if $fp->section5 == "yes"}checked="checked"{/if} /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section5')}
	    </div>
    </div>
    {/if} 
    <div class="row" id="form_username">
        <label for="form_username">Usuario <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_username" name="username" disabled="disabled" value="{$fp->username}" placeholder="Usuario"/>
        {include file="lib/error.tpl" error=$fp->getError('username')}
    </div>
    <input type="hidden" id="form_contact_user_type" name="user_type" value="{$fp->user_type}" />
    <input type="hidden" id="form_company" name="company" value="{$fp->company}" />
    <input type="hidden" id="form_thecompany" name="thecompany" value="{$fp->thecompany}" />
    <input type="hidden" id="form_company_id" name="company_id" value="{$fp->company_id}" />
    
    <input type="hidden" id="form_plan" name="plan" value="{$fp->plan}" />
    <input type="hidden" id="form_contact" name="contact_id" value="{$fp->contact_id}" />
    
    <div class="row" id="form_user_password">
        <label for="form_user_password">Cambiar Contrase&ntilde;a <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="password" id="form_user_password" name="password" value="" placeholder="Contrase&ntilde;a"/>
        {include file="lib/error.tpl" error=$fp->getError('password')}
    </div>
    
    <div class="row" id="form_user_password2">
        <label for="form_user_password2">Confirmar Contrase&ntilde;a <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="password" id="form_user_password2" name="password2" value="" placeholder="Confirmar Contrase&ntilde;a"/>
        {include file="lib/error.tpl" error=$fp->getError('password2')}
    </div>
    
	<div class="row">
    		{if $identity->trial_expired}{else}<button class="submit" type="submit" name="edit" id="edit" value="edit">Editar</button>{/if}
	</div>
	
	<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
    	</div>

	
</form>

{include file='footer.tpl'}