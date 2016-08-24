{include file='header.tpl' section='recomendador' subsection='login'}
<div id="login">
	<div class="titulo">
		<label for="form_total_invoices">&Aacute;rea exclusiva de Asociaciones y Advisors:</label>
	</div>
	
	<form method="post" id="login_id" name="login" action="{geturl action='login'}">        
        <div class="row" id="form_username_container">
            <label for="form_username">Usuario:</label>
            <input type="text" id="form_username" name="username" value="{$smarty.post.username}" placeholder="Usuario" />
            {include file="lib/error.tpl" error="{$errors.username}"}
        </div>
        <div class="row" id="form_password_container">
            <label for="form_password">Contrase&ntilde;a:</label>
            <input type="password" id="form_password" name="password" value="{$smarty.post.password}" placeholder="Contrase&ntilde;a" />
            {include file="lib/error.tpl" error="{$errors.password}"}
        </div>
	      <div class="row">
	            <button class="submit" type="submit" name="login_" id="login_" value="login_">Ingresar</button>
	      </div>
	      <div class="row">
	        		<span class="recover"><a href="{geturl controller='recomendador' action='recuperarpassword'}">Recuperar contrase&ntilde;a</a> &#x7C; <a href="{geturl controller='recomendador' action='registro'}">Reg&iacute;strate sin costo</a></span>
		  </div>
	</form>
</div>

{include file='footer.tpl'}