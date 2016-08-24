{include file='header.tpl' section='contacto' subsection='index'}
<div class="boxes3">
	<div class="title2" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Contactos:</h3></label>
	</div>
	<div class="boton_top">
	        <label for="bt_">
	        		<a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='agregar'}"{/if} onclick="clearLocalStorage();">Nuevo contacto</a>
			</label>
	</div>
</div>
{if $contacts|@count == 0}
	<div class="title" id="form_total_contacts">
		<label for="form_total_contacts">No tiene contactos actualmente.</label>
	</div>
	<div id="parrafo2">
	        <p>&#x2771; Registrar tus Contactos acelera la creaci&oacute;n de facturas, presupuestos, gastos y &oacute;rdenes de compra.</p>
	</div>
	<div id="parrafo6">
	        <p>&#x2771; Adem&aacute;s, en la ficha de cada Contacto que hayas dado de alta podr&aacute;s ver r&aacute;pidamente todo el detalle comercial.</p>
	</div>
{else}
    	   <form method="post" action="{geturl action='index'}">
    	    <table class="table_p">
    	  	 <tr>
    	  		<td class="table_button"><button class="submit7" type="submit" name="delete" id="delete" value="delete" onclick="return confirmDone5()">Borrar</button></td>
			<td class="table_p_top">Nombres</td>
			<td class="table_p_top">Apellidos</td>
			<td class="table_p_top">Compan&iacute;a</td>
			{* <td class="table_p_top">Cargo</td> *}
			<td class="table_p_top">Email</td>
			<td class="table_p_top">M&oacute;vil</td>
			<td class="table_p_top">Relaci&oacute;n</td>
		</tr>
        {assign var='i' value=0}{foreach from=$contacts item=contact}
			<tr>
				<td class="table_input"><input type="checkbox" name="contact_id[]" value="{$contact->getId()}"></td>
				<td>{$contact->profile->first_name|ucfirst} {$contact->profile->middle_name|ucfirst}</td>
				<td class="links"><span><a {if $identity->trial_expired}{else}href="{geturl action='fichacontacto'}?id={$contact->getId()}"{/if} onclick="clearLocalStorage();">{$contact->profile->last_name|ucfirst} {$contact->profile->second_last_name|ucfirst}</a></span></td>
				<td class="links">{if $contact->profile->company_id}<a {if $identity->trial_expired}{else}class="fancybox fancybox.iframe" href="{geturl controller='compania' action='editarcompania'}?id={$contact->profile->company_id}&id2={assign var='id' value=$contact->profile->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $data_[$b] == $id}{if $address_[$b]|is_array}{foreach from=$address_[$b] item=address}{$address}{break}{/foreach}{else}{$address_[$b]}{break}{/if}{/if}{assign var='b' value=$b+1}{/foreach}&doc_type=ccompany&doc_id={$contact->profile->company_id}&popup=true"{/if}>{assign var='id' value=$contact->profile->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company}{if $data_[$b] == $id}{$company_[$b]|ucfirst}{assign var='vacio' value=true}{break}{/if}{assign var='b' value=$b+1}{/foreach}</a>{if !isset($vacio)}N/A{/if}{elseif $contact->profile->thecompany && !$contact->profile->company_id}{$contact->profile->thecompany|ucfirst}{else}N/A{/if}</td>
				{* <td>{$contact->profile->position|ucfirst}</td> *}
				<td class="links"><a href="mailto:{$contact->email}">{$contact->email}</a></td>
				<td>{$contact->profile->mobile_country} {$contact->profile->mobile_area} {$contact->profile->mobile}</td>
				<td>{$contact->profile->relationship|ucfirst}</td>
			</tr>
        {assign var='i' value=$i+1}{/foreach}
       </table>
      </form>
{/if}

{include file='footer.tpl'}