{include file='header.tpl' section='cuenta' subsection='removerresumen'}

<div class="title" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Dar mi correo de baja:</h3></label>
</div>

<form id="account_id" method="post" action="{geturl action='removerresumen'}">

    {if $fp->hasError()}
        		<div class="error">
            		Por favor revisa los campos resaltados.
        		</div>
    {else}
    		{if $smarty.get.submitted}
        		<div class="success">
            		Tu correo ha sido dado de baja con &eacute;xito.
        		</div>
        	{/if}
    {/if}

     <div class="row" id="form_email_container">
        <label for="form_email">Correo Electr&oacute;nico <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_email" name="email" value="{if $fp->email}{$fp->email}{else}{$smarty.post.email}{/if}" placeholder="Ej: ejemplo@webproadmin.com"/>
        {include file="lib/error.tpl" error=$fp->getError('email')}
    </div>

	<div class="row">
	    <button class="submit" type="submit">Darme de baja</button> 
	</div>

	<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
    	</div>

</form>

{include file='footer.tpl'}