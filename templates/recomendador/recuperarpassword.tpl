{include file='header.tpl' section='recomendador' title='Recupere tu contrase&ntilde;a'}

{if $action == 'confirm'}
<div class="title" id="form_total_invoices">
		<label for="form_total_invoices"><h3><strong>Importante</strong></h3></label>
</div>
<div id="">
    {if $errors|@count == 0}
        <div id="parrafo">
        		<p>Tu nueva contrase&ntilde;a ha sido activada.</p>
        </div>
		<div id="parrafo">
		 	<a class="submit4" href="{geturl action='login'}">Ingresar</a>
		</div>
    {else}
        <div id="parrafo">
        		<p>Tu contrase&ntilde;a no fue confirmada. Por favor intenta nuevamente.</p>
        </div>
    {/if}
</div>
{elseif $action == 'complete'}
<div class="title" id="form_total_invoices">
		<label for="form_total_invoices"><h3><strong>Importante</strong></h3></label>
</div>
<div id="parrafo">
		<p></p>
        <p>En breve recibir&aacute;s un mensaje con las instrucciones en tu cuenta de correo.</p>
</div>
<div id="parrafo">
		 <a class="submit4" href="{geturl action='login'}">Entrar a mi cuenta</a>
</div>
{else}
<div id="registro">
	<div class="titulo">
		<label for="form_total_invoices">Inicia el proceso de recuperaci&oacute;n de contrase&ntilde;a:</label>
	</div>

    <form id="recover_id" name="recover" method="post" action="{geturl action='recuperarpassword'}">
            <div class="row" id="form_username_container">
                <label for="form_username">Correo Electr&oacute;nico:</label>
                <input type="text" id="form_email" name="email" value="" placeholder="Email" />
                {include file="lib/error.tpl" error="{$errors.email}"}
            </div>
		    <div class="row">
			    <button class="submit" type="submit">Continuar</button>
		    	</div>
	        <div class="row">
	        		<span class="recover"><a href="{geturl controller='recomendador' action='login'}">Ingresar</a> &#x7C; <a href="{geturl controller='recomendador' action='registro'}">Reg&iacute;strate sin costo</a></span>
			</div>
    </form>
</div>
{/if}

{include file='footer.tpl'}