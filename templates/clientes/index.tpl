{include file='header.tpl' section='clientes'}
<div class="boxes3">
	<div class="title2" id="form_total_invoices">
	    <label for="form_total_invoices"><h3>Directorio de Clientes</h3></label>
	</div>
	<div class="boton_top">
	        <label for="bt_">
	       	 	<a class="submit6" href="{geturl action='agregar'}">Invitar Nuevo Cliente</a>
			</label>
	</div>
</div>
{if $clients|@count == 0}
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices">No tiene Clientes actualmente.</label>
</div>
{else}
    	   <form method="post" action="{geturl action='index'}">
    	    <table class="table_p">
    	  	 <tr>
    	  		<td class="table_button"><button class="submit7" type="submit" name="delete" id="delete" value="delete" onclick="return confirmDone5()">Borrar</button></td>
			<td class="table_p_top">Cuenta</td>
			<td class="table_p_top">Fecha Invitaci&oacute;n</td>
			<td class="table_p_top">Estatus Cuenta</td>
			<td class="table_p_top">Fecha Activaci&oacute;n</td>
			<td class="table_p_top">Comisi&oacute;n Mensual Generada</td>
		</tr>
        {foreach from=$clients item=client}{assign var='i' value=$client->getId()}
			<tr>
				<td class="table_input"><input type="checkbox" name="client_id[]" value="{$client->getId()}"></td>
				<td class="links"><span><a href="{geturl action='editar'}?id={$client->getId()}">{$client->profile->first_name|ucfirst} {$client->profile->second_last_name|ucfirst}</a></span></td>
				<td>{$client->profile->invitation_date|ucfirst}</td>
				<td>{if $status[$i]}{$status[$i]|ucfirst}{else}Sin Subscribirse{/if}</td>
				<td>{if $activation_date[$i]}{$activation_date[$i]|ucfirst}{else}N/A{/if}</a></td>
				<td>{if $comission[$i]}{$comission[$i]|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}{else}0,00  {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}{/if}</td>
			</tr>
        {/foreach}
       </table>
      </form>
      
    <div id="">
    		Total Comisión Mensual Generada {$total|number_format:2:',':'.'}  {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}
    </div>
{/if}


{include file='footer.tpl'}