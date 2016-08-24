{include file='header.tpl' section='usuarios' subsection='agregar'}

<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Agregar nuevo Usuario:</h3></label>
</div>

<form method="post" id="usr_id" action="{geturl action='agregar'}?id={$fp->user->getId()}" enctype="multipart/form-data" onsubmit="return emailsent()">

    {if $fp->hasError()}
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    {/if}
    
    <div class="row" id="form_user_email"> 
        <label for="form_user_email">Correo Electr&oacute;nico <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_user_email" name="email" value="{$smarty.post.email}" placeholder="Ej: ejemplo@webproadmin.com"/>
        {include file="lib/error.tpl" error=$fp->getError('email')}
    </div>
    
    <div class="row" id="form_user_first_name">
        <label for="form_user_first_name">Nombre <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_user_first_name" name="first_name" value="{$smarty.post.first_name}" placeholder="Nombre"/>
        {include file="lib/error.tpl" error=$fp->getError('first_name')}
    </div>
    
    <div class="row" id="form_user_last_name">
        <label for="form_user_last_name">Apellido <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_user_last_name" name="last_name" value="{$smarty.post.last_name}" placeholder="Apellido"/>
        {include file="lib/error.tpl" error=$fp->getError('last_name')}
    </div>
    
    <div class="row" id="form_contact_user_type">
    	<label for="form_contact_user_type">Perfil:</label>
        <select id="form_contact_user_type" name="user_type" {literal}onchange="hideOptions(this);"{/literal}>
			<option value="employee" {if $plan == "plan1" || $plan == "trial_plan1" || $smarty.post.user_type == "employee"}disabled="disabled"{elseif $smarty.get.emp}disabled="disabled"{else}selected="selected"{/if}>Colaborador</option>
			<option value="accountant" {if $plan == "plan1" || $plan == "trial_plan1" || $smarty.post.user_type == "accountant"}selected="selected"{elseif $smarty.get.acc}disabled="disabled"{/if}>Contador</option>
		</select>
        {include file="lib/error.tpl" error=$fp->getError('user_type')}
    </div>
    {if $smarty.get.emp}{elseif $plan == "plan1" || $plan == "trial_plan1"}{else}
    <div class="row_accountant" id="form_accountant">
	    <div class="row" id="form_user_section">
	        <label for="form_user_section">Acceso(s):</label>
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Proyectos:</span>
	        <div class="user_check"><input type="checkbox" id="form_section6" name="section6" value="yes" checked="checked" /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section6')}
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Contactos:</span>
	        <div class="user_check"><input type="checkbox" id="form_section7" name="section7" value="yes" checked="checked" /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section7')}
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Productos/Servicios:</span>
	        <div class="user_check"><input type="checkbox" id="form_section8" name="section8" value="yes" checked="checked" /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section8')}
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Finanzas:</span>
	        <div class="user_check"><input type="checkbox" id="form_section9" name="section9" value="yes" checked="checked" /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section9')}
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Factura:</span>
	        <div class="user_check"><input type="checkbox" id="form_section1" name="section1" value="yes" checked="checked" /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section1')}
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Gastos:</span>
	        <div class="user_check"><input type="checkbox" id="form_section2" name="section2" value="yes" checked="checked" /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section2')}
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">&Oacute;rdenes de Compra:</span>
	        <div class="user_check"><input type="checkbox" id="form_section3" name="section3" value="yes" checked="checked" /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section3')}
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Prespuestos:</span>
	        <div class="user_check"><input type="checkbox" id="form_section4" name="section4" value="yes" checked="checked" /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section4')}
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Facturas Proforma:</span>
	        <div class="user_check"><input type="checkbox" id="form_section5" name="section5" value="yes" checked="checked" /></div>
	        {include file="lib/error.tpl" error=$fp->getError('section5')}
	    </div>
    </div>
    	{/if}
    <div class="row" id="form_username">
        <label for="form_username">Usuario <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_username" name="username" value="{$smarty.post.username}" placeholder="Usuario"/>
        {include file="lib/error.tpl" error=$fp->getError('username')}
    </div>
    <input type="hidden" id="form_company" name="company" value="{$username}" />
    <input type="hidden" id="form_thecompany" name="thecompany" value="{$thecompany}" />
     <input type="hidden" id="form_company_id" name="company_id" value="{$company_id}" />
    <input type="hidden" id="form_plan" name="plan" value="{$plan}" />
    <input type="hidden" id="form_contact" name="contact_id" value="0" />
    
    <div class="row" id="form_user_password">
        <label for="form_user_password">Contrase&ntilde;a <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="password" id="form_user_password" name="password" value="{$smarty.post.password}" placeholder="Contrase&ntilde;a"/>
        {include file="lib/error.tpl" error=$fp->getError('password')}
    </div>
    
    <div class="row" id="form_user_password2">
        <label for="form_user_password2">Confirmar Contrase&ntilde;a <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="password" id="form_user_password2" name="password2" value="{$smarty.post.password2}" placeholder="Confirmar Contrase&ntilde;a"/>
        {include file="lib/error.tpl" error=$fp->getError('password2')}
    </div>

	<div class="row">
    		{if $identity->trial_expired}{else}<button class="submit" type="submit" name="add" id="add" value="add">Guardar</button>{/if}
	</div>
	
	<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
    	</div>


</form>

{include file='footer.tpl'}