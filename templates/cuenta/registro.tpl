{include file='headerlight.tpl' section='cuenta' subsection='registro'}

<div id="registro">
	<div class="titulo-hi2">
		<label for="form_total_invoices">Facturaci&oacute;n Online F&aacute;cil</label>
	</div>
	
	<div class="titulo-lo2">
		<label for="form_total_invoices">Facturaci&oacute;n electr&oacute;nica y gesti&oacute;n de empresa<br>
										para aut&oacute;nomos y profesionales independientes.</label>
	</div>
	
	<div class="titulo-lo3">
		<label for="form_total_invoices">Pru&eacute;balo totalmente gratis por 30 d&iacute;as.<br>
										Sin compromiso. Sin tarjeta de cr&eacute;dito.</label>
	</div>

	<form id="registration_id" name="registration" method="post" action="{geturl action='registro'}">
	
	    <div class="row" id="form_email_container">
	    	<label for="form_email">Correo Electr&oacute;nico <strong>&#x28;&#x2A;&#x29;</strong>:</label>
	        <input type="text" class="stored" id="form_email" name="email" value="{if $smarty.get.email}{$smarty.get.email}{else}{$smarty.post.email}{/if}" placeholder="Email" />
	        {include file="lib/error.tpl" error=$fp->getError('email')}
	    </div>
	    
	    <div class="row" id="form_username_container">
	    	<label for="form_username">Usuario <strong>&#x28;&#x2A;&#x29;</strong>:</label>
	        <input type="text" class="stored" id="form_username" name="username" value="{$smarty.post.username}" placeholder="Usuario" />
	        {include file="lib/error.tpl" error=$fp->getError('username')}
	    </div>
	    
	    <div class="row" id="form_password_container">
	    	<label for="form_password">Contrase&ntilde;a <strong>&#x28;&#x2A;&#x29;</strong>:</label>
	        <input type="password" class="stored" id="form_password" name="password" value="{$smarty.post.password}" placeholder="Contrase&ntilde;a" />
	        {include file="lib/error.tpl" error=$fp->getError('password')}
	    </div>

	    <input type="hidden" name="plan" value="plan1">
	    
		{if $smarty.get.action == 'confirm'}<input type="hidden" name="invited" value="{$smarty.get.id}"><input type="hidden" name="invitation_code" value="{$smarty.get.key}">{/if}
		
	    <div class="row" id="form_agreement_container">
	        <span id="recover2"><input type="checkbox" id="form_agreement" name="agreement" value="yes" checked="checked"> Estoy de acuerdo con la <a class="fancybox fancybox.iframe submit2" href="{geturl controller='privacidad' action='index'}">Política de Privacidad</a> y las <a class="fancybox fancybox.iframe submit2" href="{geturl controller='condiciones' action='index'}">Condiciones de Uso</a>.</span>
	        {include file="lib/error.tpl" error=$fp->getError('agreement')}
	    </div>
	    <div class="row">
		    	<button class="submit" type="submit" name="register_" id="register_">&iexcl;Quiero Probarlo Ya!</button>
	    	</div>
	    <div class="row">
	        		<span id="recover"><a href="{geturl controller='cuenta' action='recuperarpassword'}">Recuperar contrase&ntilde;a</a> &#x7C; <a href="{geturl controller='cuenta' action='login'}">Ingresar</a></span>
		</div>
	</form>
</div>

	<div class="content3">
			<div class="block-left">&nbsp;</div>
			<div class="block-right2">
				<img src="/images/reg_light/welcome.jpg">
			</div>
	</div>

	<div class="content4">
			<div class="block-left">&nbsp;</div>
			<div class="block-right2">
				<img src="/images/reg_light/running31.png"><label>Agiliza tu facturaci&oacute;n</label><br>
				Crea y env&iacute;a facturas profesionales mucho m&aacute;s r&aacute;pidamente y reduce los tiempos de cobro.
			</div>
	</div>
	
	<div class="content5">
			<div class="block-left">&nbsp;</div>
			<div class="block-right2">
				<img src="/images/reg_light/checkbox.png"><label>Simplifica la gesti&oacute;n de tu negocio</label><br>
				Maneja las finanzas de tu empresa, proyectos y clientes con un programa f&aacute;cil de utilizar.
			</div>
	</div>
	
	<div class="content6">
			<div class="block-left">&nbsp;</div>
			<div class="block-right2">
				<img src="/images/reg_light/stopwatch6.png"><label>Reduce gastos y optimiza tu tiempo</label><br>
				Ahorra tiempo en papeleo y ded&iacute;calo a lo que vale la pena.
			</div>
	</div>
 
{include file='footer.tpl'}