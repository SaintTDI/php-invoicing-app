{include file='header.tpl' section='contacto' subsection='companias'}
<div class="boxes3">
	<div class="title2" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Compa&ntilde;ias:</h3></label>
	</div>
	<div class="boton_top">
	        <label for="bt_">
	        		<a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='agregarcompania'}"{/if} onclick="clearLocalStorage();">Nueva Compa&ntilde;ia</a>
			</label>
	</div>
</div>
{if $companieslist|@count == 0}
	<div class="title" id="form_total_contacts">
		<label for="form_total_contacts">No existen compa&ntilde;&iacute;as actualmente.</label>
	</div>
	<div id="parrafo2">
	        <p>&#x2771; Registrar tus Compa&ntilde;ias Contactos acelera la creaci&oacute;n de facturas, presupuestos, gastos y &oacute;rdenes de compra.</p>
	</div>
	<div id="parrafo6">
	        <p>&#x2771; Adem&aacute;s, en la ficha de cada Compa&ntilde;ia Contacto que hayas dado de alta podr&aacute;s ver r&aacute;pidamente todo el detalle comercial.</p>
	</div>
{else}
	  <form method="post" action="{geturl action='companias'}">
    	    <table class="table_p">
    	  	 <tr>
    	  		<td class="table_button"><button class="submit7" type="submit" name="delete" id="delete" value="delete" onclick="return confirmDone5()">Borrar</button></td>
			<td class="table_p_top">Nombre</td>
			<td class="table_p_top">Industria</td>
			<td class="table_p_top">Especialidad</td>
			{* <td class="table_p_top">Sitio Web</td> *}
			<td class="table_p_top">Email</td>
			<td class="table_p_top">Tel&eacute;fono</td>
			<td class="table_p_top">Relaci&oacute;n</td>
		</tr>
        {foreach from=$companieslist item=company}
			<tr>
				<td class="table_input"><input type="checkbox" name="company_id[]" value="{$company->getId()}"></td>
				<td class="links"><span><a {if $identity->trial_expired}{else}href="{geturl controller='contacto' action='fichacompania'}?id={$company->getId()}"{/if} onclick="clearLocalStorage();">{$company->profile->thecompany|ucfirst}</a></span></td>
				<td>{$company->profile->company_industry|ucfirst}</td>
				<td>{$company->profile->company_specialty|ucfirst}</td>
				{* <td class="links"><a {if $identity->trial_expired}{else}href="http://www.{$company->profile->company_website}" target="_blank"{/if}>{$company->profile->company_website|ucfirst}</a></td> *}
				<td class="links"><a href="mailto:{$company->profile->email_c}">{$company->profile->email_c}</a></td>
				<td>{$company->profile->phone_country} {$company->profile->phone_area} {$company->profile->phone}</td>
				<td>{$company->profile->relationship|ucfirst}</td>
			</tr>
        {/foreach}
       </table>
     </form>
{/if}

{include file='footer.tpl'}