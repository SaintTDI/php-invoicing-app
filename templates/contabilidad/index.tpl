{include file='header.tpl' section='contabilidad'}

<div class="row" id="form_total_invoices">
	<label><h3>Resumen para Contadores</h3></label>
</div>

<div class="boxes2">
{if $cashflow || $profit}
	<div class="cashflow" id="form_total_invoices">
	    	<span class="imp_text">Tesorer&iacute;a:</span>
	    	<span class="imp_text_2">{$cashflow|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span>
	</div>
	   
	<div class="benefit" id="form_total_invoices4">
	    	<span class="imp_text">Beneficio:</span>
	    	<span class="imp_text_2">{$profit|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span>
	</div>
{/if}
	
{if $total_i || $total_net_i || $total_iva_i || $total_up_i || $total_net_up_i || $total_iva_up_i}
	<div class="invoice" id="form_total_invoices">
	    <p><span class="imp_text">Facturado:</span>
	    	<span class="imp_text_2">{$total_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	    	<p><span class="imp_text">Neto:</span>
	    	<span class="imp_text_2">{$total_net_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	    <p><span class="imp_text">IVA:</span>
	    	<span class="imp_text_2">{$total_iva_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	</div> 
{/if}
{if $total_e || $total_net_e || $total_iva_e || $total_up_e || $total_net_up_e || $total_iva_up_e}
	<div class="invoice_pending" id="form_total_invoices">
	    <p><span class="imp_text">Gastado:</span>
	    	<span class="imp_text_2">{$total_e|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	    	<p><span class="imp_text">Neto:</span>
	    	<span class="imp_text_2">{$total_net_e|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	    	<p><span class="imp_text">IVA:</span>
	    	<span class="imp_text_2">{$total_iva_e|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	</div>
{/if}
{if $total_iva_tri || $total_iva_tri_inv || $total_iva_tri_exp || $total_iva_now || $total_iva_now_inv || $total_iva_now_exp}
	<div class="iva_before" id="form_iva_total_">
	   	<p><span class="imp_text">IVA del trimestre anterior:</span>
	    	<span class="imp_text_2">{$total_iva_tri|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	    	<p><span class="imp_text">IVA Soportado:</span>
	    	<span class="imp_text_2">{$total_iva_tri_inv|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	    	<p><span class="imp_text">IVA Repercutido:</span>
	    	<span class="imp_text_2">{$total_iva_tri_exp|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	</div>
	
	<div class="iva_now" id="form_iva_total_">
	    	<p><span class="imp_text">IVA Acumulado este trimestre:</span>
	    	<span class="imp_text_2">{$total_iva_now|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	    	<p><span class="imp_text">IVA Soportado:</span>
	    	<span class="imp_text_2">{$total_iva_now_inv|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	    	<p><span class="imp_text">IVA Repercutido:</span>
	    	<span class="imp_text_2">{$total_iva_now_exp|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	</div>
{/if}
</div>

{if $invoices|@count == 0}
	  <div class="ficha_table" id="form_total_invoices">
		 <label for="form_total_invoices">No tiene facturas actualmente.</label>
	  </div>
{else}
	  <div class="ficha_table" id="form_total_invoices">
		 <label for="form_total_invoices">Listado de Facturas emitidas:</label>
	  </div>
    	   <form method="post" id="inc_id" action="{geturl action='index'}">
    	    <table class="table_p">
    	  	 <tr>
			<td class="table_p_top">Factura No</td>
			<td class="table_p_top">Fecha</td>
			<td class="table_p_top">Cliente</td>
			<td class="table_p_top">Total {if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if}</td>
			<td class="table_p_top">Estatus</td>
			<td class="table_p_top">Vencimiento</td>
		</tr>
         {assign var='iva_' value=0}{assign var='iva2_' value=0}{assign var='i' value=0}{foreach from=$invoices item=invoice}
			<tr>
				<td class="links"><span><a href="{geturl controller='contabilidad' action='fichafactura'}?id={$invoice->getId()}" onclick="clearLocalStorage();">{if $invoice->profile->start_letter}{$invoice->profile->start_letter} -{/if} {$invoice->profile->number_zero}{$invoice->invoice_number}</a></span></td>
				<td>{$invoice->profile->invoice_date}</td>
				<td>{$invoice->profile->thecompany|ucfirst}</td>
				<td>{$invoice->profile->total|number_format:2:',':'.'}</td>
				<td>{$valid_until[$i]|ucfirst}</td>
				<td><span>{$status_i[$i]|ucfirst}</span></td>
			</tr>
        {assign var='i' value=$i+1}{assign var='iva_' value=0}{assign var='iva2_' value=0}{/foreach}
   	  	 	<tr>
				<td colspan="9" class="table_list" align="center"><button class="submit" type="submit" name="download" id="download" value="download">Descargar Facturas</button></td>
			</tr>
       </table>
      </form>
{/if}

{if $expenses|@count == 0}
	  <div class="ficha_table" id="form_total_invoices">
		 <label for="form_total_invoices">No tiene Notas de Gastos actualmente.</label>
	  </div>
{else}
	  <div class="ficha_table" id="form_total_invoices">
		 <label for="form_total_invoices">Listado de Notas de Gastos emitidas:</label>
	  </div>

    	   <form id="exp_id" method="post" action="{geturl action='index'}">
    	    <table class="table_p">
    	  	 <tr>
			<td class="table_p_top">N&uacute;mero</td>
			<td class="table_p_top">Fecha</td>
			<td class="table_p_top">Proveedor</td>
			<td class="table_p_top">Total {if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if}</td>
			<td class="table_p_top">Vencimiento</td>
			<td class="table_p_top">Estatus</td>
		</tr>
         {assign var='iva_' value=0}{assign var='iva2_' value=0}{assign var='i' value=0}{foreach from=$expenses item=expense}
			<tr>
				<td class="links"><span><a href="{geturl controller='contabilidad' action='fichagasto'}?id={$expense->getId()}" onclick="clearLocalStorage();">{if $expense->profile->start_letter}{$expense->profile->start_letter} -{/if} {$expense->profile->number_zero}{$expense->expense_number}</a></span></td>
				<td>{$expense->profile->expense_date}</td>
				<td>{$expense->profile->thecompany|ucfirst}</td>
				<td>{$expense->profile->total|number_format:2:',':'.'}</td>
				<td>{$valid_until_e[$i]|ucfirst}</td>
				<td><span>{$status_ii_e[$i]|ucfirst}</span></td>
			</tr>
        {assign var='i' value=$i+1}{assign var='iva_' value=0}{assign var='iva2_' value=0}{/foreach}
    	  	 	<tr>
				<td colspan="9" class="table_list" align="center"><button class="submit" type="submit" name="download_e" id="download_e" value="download_e">Descargar Gastos</button></td>
			</tr>
       </table>
      </form>
{/if}

{include file='footer.tpl'}