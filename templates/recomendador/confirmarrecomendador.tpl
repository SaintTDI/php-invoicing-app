{include file='header.tpl' section='recomendador' title='Recupere su contrase&ntilde;a'}
<div class="title" id="form_total_invoices">
			<label for="form_total_invoices"><h3>Importante </h3></label>
</div>
{if $action == 'confirm'}
<div id="">
    {if $errors|@count == 0}
        <div id="parrafo">
            El registro ha sido activado. El correo de aprobacion ya puede ser enviado.
        </div>
    {else}
        <div id="parrafo">
            El registro no pudo ser confirmado. Por favor intenta nuevamente.
        </div>
    {/if}
</div>
{else}
	<div id="parrafo">
	  El registro no fue confirmado. Por favor intenta nuevamente.
	</div>
{/if}

{include file='footer.tpl'}