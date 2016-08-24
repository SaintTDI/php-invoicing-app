{include file='header.tpl' section='cuenta' subsection='detalles'}

<div class="title" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Tus datos personales:</h3></label>
</div>

<form id="account_id" method="post" action="{geturl action='detalles'}" enctype="multipart/form-data">

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
    
    <div class="row" id="form_first_name_container">
        <label for="form_first_name">Nombre <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_first_name" name="first_name" value="{if $fp->first_name}{$fp->first_name}{else}{$smarty.post.first_name}{/if}" placeholder="Primer Nombre"/>
        {include file="lib/error.tpl" error=$fp->getError('first_name')}
    </div>
    
    <div class="row" id="form_middle_name_container">
        <label for="form_middle_name">Segundo Nombre:</label>
        <input type="text" id="form_middle_name" name="middle_name" value="{if $fp->middle_name}{$fp->middle_name}{else}{$smarty.post.middle_name}{/if}" placeholder="Segundo Nombre"/>
        {include file="lib/error.tpl" error=$fp->getError('middle_name')}
    </div>

    <div class="row" id="form_last_name_container">
        <label for="form_last_name">Apellido <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_last_name" name="last_name" value="{if $fp->last_name}{$fp->last_name}{else}{$smarty.post.last_name}{/if}" placeholder="Primer Apellido"/>
        {include file="lib/error.tpl" error=$fp->getError('last_name')}
    </div>
    
    <div class="row" id="form_second_last_name_container">
        <label for="form_second_last_name">Segundo Apellido:</label>
        <input type="text" id="form_second_last_name" name="second_last_name" value="{if $fp->second_last_name}{$fp->second_last_name}{else}{$smarty.post.second_last_name}{/if}" placeholder="Segundo Apellido"/>
        {include file="lib/error.tpl" error=$fp->getError('second_last_name')}
    </div>
    
     <div class="row" id="form_email_container">
        <label for="form_email">Correo Electr&oacute;nico <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_email" name="email" value="{if $fp->email}{$fp->email}{else}{$smarty.post.email}{/if}" placeholder="Ej: ejemplo@webproadmin.com"/>
        {include file="lib/error.tpl" error=$fp->getError('email')}
    </div>
    
    {* <div class="row" id="form_sex_container">
    	<label for="form_sex">Sexo:</label>
        <select id="form_sex" name="sex"/>
       		<option value="" {if $fp->sex == '' || $smarty.post.sex  == ''} selected="selected" {/if}>Seleccione...</option>
			<option value="female" {if $fp->sex == 'female' || $smarty.post.sex  == 'female'} selected="selected" {/if}>Mujer</option>
        		<option value="male" {if $fp->sex == 'male' || $smarty.post.sex  == 'male'} selected="selected" {/if}>Hombre</option>
		</select>
        {include file="lib/error.tpl" error=$fp->getError('sex')}
    </div> *}
    
    <div class="row" id="form_country_container">
    	<label for="form_country">Pa&iacute;s <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <select id="form_country" name="country"/>
        		<option value="" {if $fp->country == '' || $smarty.post.country  == ''} selected="selected" {/if}>Seleccione...</option>
        		<option value="AR" {if $fp->country == 'AR' || $smarty.post.country  == 'AR'} selected="selected" {/if}>Argentina</option>
        		<option value="BO" {if $fp->country == 'BO' || $smarty.post.country  == 'BO'} selected="selected" {/if}>Bolivia</option>
        		<option value="CL" {if $fp->country == 'CL' || $smarty.post.country  == 'CL'} selected="selected" {/if}>Chile</option>
        		<option value="CO" {if $fp->country == 'CO' || $smarty.post.country  == 'CO'} selected="selected" {/if}>Colombia</option>
        		<option value="CR" {if $fp->country == 'CR' || $smarty.post.country  == 'CR'} selected="selected" {/if}>Costa Rica</option>
        		<option value="DO" {if $fp->country == 'DO' || $smarty.post.country  == 'DO'} selected="selected" {/if}>Rep&uacute;blica Dominicana</option>
        		<option value="EC" {if $fp->country == 'EC' || $smarty.post.country  == 'EC'} selected="selected" {/if}>Ecuador</option>
        		<option value="SV" {if $fp->country == 'SV' || $smarty.post.country  == 'SV'} selected="selected" {/if}>El Salvador</option>
        		<option value="US" {if $fp->country == 'US' || $smarty.post.country  == 'US'} selected="selected" {/if}>Estados Unidos</option>
        		<option value="ES" {if $fp->country == 'ES' || $smarty.post.country  == 'ES'} selected="selected" {/if}>Espa&ntilde;a</option>
        		<option value="GT" {if $fp->country == 'GT' || $smarty.post.country  == 'GT'} selected="selected" {/if}>Guatemala</option>
        		<option value="HN" {if $fp->country == 'HN' || $smarty.post.country  == 'HN'} selected="selected" {/if}>Honduras</option>
        		<option value="MX" {if $fp->country == 'MX' || $smarty.post.country  == 'MX'} selected="selected" {/if}>M&eacute;xico</option>
        		<option value="NI" {if $fp->country == 'NI' || $smarty.post.country  == 'NI'} selected="selected" {/if}>Nicaragua</option>
        		<option value="PA" {if $fp->country == 'PA' || $smarty.post.country  == 'PA'} selected="selected" {/if}>Panam&aacute;</option>
        		<option value="PG" {if $fp->country == 'PG' || $smarty.post.country  == 'PG'} selected="selected" {/if}>Paraguay</option>
        		<option value="PE" {if $fp->country == 'PE' || $smarty.post.country  == 'PE'} selected="selected" {/if}>Per&uacute;</option>
        		<option value="PR" {if $fp->country == 'PR' || $smarty.post.country  == 'PR'} selected="selected" {/if}>Puerto Rico</option>
        		<option value="UY" {if $fp->country == 'UY' || $smarty.post.country  == 'UY'} selected="selected" {/if}>Uruguay</option>
        		<option value="VE" {if $fp->country == 'VE' || $smarty.post.country  == 'VE'} selected="selected" {/if}>Venezuela</option>
		</select>
        {include file="lib/error.tpl" error=$fp->getError('country')}
    </div>
    
    <div class="row" id="form_region_container">
        <label for="form_region">Provincia, Estado o Regi&oacute;n:</label>
        <input type="text" id="form_region" name="region" value="{if $fp->region}{$fp->region}{else}{$smarty.post.region}{/if}" placeholder="Provincia, Estado o Regi&oacute;n"/>
        {include file="lib/error.tpl" error=$fp->getError('region')}
    </div>

    <div class="row" id="form_password_container">
        <label for="form_password">Crear nueva contrase&ntilde;a:</label>
        <input type="password" id="form_password" name="password" value="{if $fp->password}{$fp->password}{else}{$smarty.post.password}{/if}" />
        {include file="lib/error.tpl" error=$fp->getError('password')}
    </div>

    <div class="row" id="form_password_confirm_container">
        <label for="form_password_confirm">Repetir nueva contrase&ntilde;a:</label>
        <input type="password" id="form_password_confirm" name="password_confirm" value="{if $fp->password_confirm}{$fp->password_confirm}{else}{$smarty.post.password_confirm}{/if}" />
        {include file="lib/error.tpl" error=$fp->getError('password_confirm')}
    </div>
    
    {* <div class="row" id="form_profession_container">
        <label for="form_profession">Profesi&oacute;n u oficio:</label>
        <input type="text" id="form_profession" name="profession" value="{if $fp->profession}{$fp->profession}{else}{$smarty.post.profession}{/if}" placeholder="Ej: Empresario"/>
        {include file="lib/error.tpl" error=$fp->getError('profession')}
    </div> *}

        {* foreach from=$fp->publicProfile key='key' item='label'}
        	<div class="row" id="form_{$key}_container">
                {if $label == 'Bio'}
            			<label for="form_bio">Descripci&oacute;n:</label>
            			<textarea id="form_{$key}" maxlenght="255" name="{$key}" cols="30"/>{if $fp->$key}{$fp->$key}{else}{$smarty.post.$key}{/if}</textarea>
                    {include file="lib/error.tpl" error=$fp->getError($key)}
                {elseif $label == 'Profile Picture'}
                		<label for="form_{$key}">Foto del Perfil:</label>
             		<input type="file" class="files" id="form_{$key}" name="{$key}" value="{if $fp->$key}{$fp->$key}{else}{$smarty.post.$key}{/if}"/>
                    {include file="lib/error.tpl" error=$fp->getError($key)}
                {elseif $label == 'Picture Preview'}
                		<label for="form_{$key}">Vista Previa:</label>
                		{if $fp->$key != ''}
                				{assign var="url" value=$fp->$key}
                            	<img src="/profiles/tmp/pictures/{$url}" />
                        	{else}
                            	<img src="/profiles/tmp/pictures/profile.jpg" />
                        {/if}
                {else}
                {if $label == 'Website'}<label for="form_website">Sitio Web:</label>
                	{else}
                <label for="form_{$label}">	{$label}:</label> {/if}<input class="social" type="text" id="form_{$label}" maxlength="200" name="{$label}" disabled="disabled" value="{if $key == 'public_website'}http://www.{/if}{if $key == 'public_twitter'}https://twitter.com/{/if}{if $key == 'public_facebook'}https://www.facebook.com/{/if}{if $key == 'public_linkedin'}https://www.linkedin.com/{/if}{if $key == 'public_youtube'}http://www.youtube.com/channel/{/if}{if $key == 'public_googlep'}https://plus.google.com/{/if}{if $key == 'public_quora'}http://www.quora.com/{/if}"/>	<input class="social" type="text" id="form_{$key}" maxlength="200" name="{$key}" value="{if $fp->$key}{$fp->$key}{else}{$smarty.post.$key}{/if}"/>   
                	{include file="lib/error.tpl" error=$fp->getError($key)}{/if}</div>
        {/foreach *}

	<div class="row">
	    <button class="submit" type="submit">Salvar Informaci&oacute;n</button> 
	</div>

	<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
    	</div>

</form>

{include file='footer.tpl'}