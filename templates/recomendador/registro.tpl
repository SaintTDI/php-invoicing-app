{include file='header.tpl' section='recomendador'}

<div id="registro">
	<div class="titulo">
		<label for="form_total_invoices">Registro exclusivo de Asociaciones y Advisors:</label>
	</div>
<form method="post" id="rec_id" action="{geturl action='registro'}">

    <div class="row" id="form_email_container">
    		<label for="form_email">Correo Electr&oacute;nico:</label>
        <input type="text" id="form_email" name="email" value="{if $smarty.get.email}{$smarty.get.email}{else}{$smarty.post.email}{/if}" placeholder="Email" />
        {include file="lib/error.tpl" error=$fp->getError('email')}
    </div>
   
    <div class="row" id="form_first_name_container">
    		<label for="form_first_name">Nombre:</label>
        <input type="first_name" id="form_first_name" name="first_name" value="{$smarty.post.first_name}" placeholder="Nombre" />
        {include file="lib/error.tpl" error=$fp->getError('first_name')}
    </div>
    
    <div class="row" id="form_country_container">
    	<label for="form_country">Pa&iacute;s:</label>
        <select id="form_country" name="country"/>
        		<option value="AR" {if $smarty.post.country  == 'AR'}selected="selected" {/if}>Argentina</option>
        		<option value="BO" {if $smarty.post.country  == 'BO'}selected="selected" {/if}>Bolivia</option>
        		<option value="CL" {if $smarty.post.country  == 'CL'}selected="selected" {/if}>Chile</option>
        		<option value="CO" {if $smarty.post.country  == 'CO'}selected="selected" {/if}>Colombia</option>
        		<option value="CR" {if $smarty.post.country  == 'CR'}selected="selected" {/if}>Costa Rica</option>
        		<option value="DO" {if $smarty.post.country  == 'DO'}selected="selected" {/if}>Rep&uacute;blica Dominicana</option>
        		<option value="EC" {if $smarty.post.country  == 'EC'}selected="selected" {/if}>Ecuador</option>
        		<option value="SV" {if $smarty.post.country  == 'SV'}selected="selected" {/if}>El Salvador</option>
        		<option value="US" {if $smarty.post.country  == 'US'}selected="selected" {/if}>Estados Unidos</option>
        		<option value="ES" {if $smarty.post.country  == 'ES' || $smarty.post.country  == ''}selected="selected" {/if}>Espa&ntilde;a</option>
        		<option value="GT" {if $smarty.post.country  == 'GT'}selected="selected" {/if}>Guatemala</option>
        		<option value="HN" {if $smarty.post.country  == 'HN'}selected="selected" {/if}>Honduras</option>
        		<option value="MX" {if $smarty.post.country  == 'MX'}selected="selected" {/if}>M&eacute;xico</option>
        		<option value="NI" {if $smarty.post.country  == 'NI'}selected="selected" {/if}>Nicaragua</option>
        		<option value="PA" {if $smarty.post.country  == 'PA'}selected="selected" {/if}>Panam&aacute;</option>
        		<option value="PG" {if $smarty.post.country  == 'PG'}selected="selected" {/if}>Paraguay</option>
        		<option value="PE" {if $smarty.post.country  == 'PE'}selected="selected" {/if}>Per&uacute;</option>
        		<option value="PR" {if $smarty.post.country  == 'PR'}selected="selected" {/if}>Puerto Rico</option>
        		<option value="UY" {if $smarty.post.country  == 'UY'}selected="selected" {/if}>Uruguay</option>
        		<option value="VE" {if $smarty.post.country  == 'VE'}selected="selected" {/if}>Venezuela</option>
		</select>
        {include file="lib/error.tpl" error=$fp->getError('country')}
    </div>
    
    <div class="row" id="form_phone_container">
    		<label for="form_phone">Tel&eacute;fono:</label>
        <input type="phone" id="form_phone" name="phone" value="{$smarty.post.phone}" onkeypress='validate(event)' placeholder="Tel&eacute;fono" />
        {include file="lib/error.tpl" error=$fp->getError('phone')}
    </div>

    <div class="row" id="form_contact_user_type">
    		<label for="form_contact_user_type">Perfil:</label>
        <select id="form_contact_user_type" name="user_type"/>
			<option value="advisor" {if $smarty.post.user_type  == 'advisor' || $smarty.post.user_type  == ''}selected="selected" {/if}>Advisor Independiente</option>
			<option value="association" {if $smarty.post.user_type  == 'association'}selected="selected" {/if}>Asociaci&oacute;n Profesional</option>
		</select>
        {include file="lib/error.tpl" error=$fp->getError('user_type')}
    </div>
 
    <div class="captcha">
    	<img src="/utility/captcha" alt="Captcha Image"/>
    </div>
    
    <div class="row" id="form_captcha_container">
    	<label for="form_captcha">Introduzca la frase:</label>
        <input type="text" id="form_captcha" name="captcha" value="{$smarty.post.captcha}" />
    {include file="lib/error.tpl" error=$fp->getError('captcha')}
    </div>
    
	<div class="row" id="form_agreement_container">
	        <span id="recover2"><input type="checkbox" id="form_agreement" name="agreement" value="yes" checked="checked"> Estoy de acuerdo con la <a class="fancybox fancybox.iframe submit2" href="{geturl controller='privacidad' action='index'}">Política de Privacidad</a> y las <a class="fancybox fancybox.iframe submit2" href="{geturl controller='condiciones' action='index'}">Condiciones de Uso</a>.</span>
	        {include file="lib/error.tpl" error=$fp->getError('agreement')}
	 </div>
    
	{if $smarty.get.action == 'confirm'}
	<input type="hidden" name="invited" value="{if $smarty.get.id}{$smarty.get.id}{else}{$smarty.post.id}{/if}">
	<input type="hidden" name="invitation_code" value="{if $smarty.get.key}{$smarty.get.key}{else}{$smarty.post.key}{/if}">
	{/if}
    
	<div class="row">
		    	<button class="submit" type="submit" name="register_" id="register_">Registrarme</button>
	</div>
	<div class="row">
	        	<span id="recover"><a href="{geturl controller='recomendador' action='recuperarpassword'}">Recuperar contrase&ntilde;a</a> &#x7C; <a href="{geturl controller='recomendador' action='login'}">Ingresar</a></span>
	</div>

</form>
</div>
    
{include file='footer.tpl'}