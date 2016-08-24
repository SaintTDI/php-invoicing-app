{include file='header.tpl' section='proyectos' subsection='fichaproyecto'}
	<div class="boxes3">
		<div class="title2" id="form_total_invoices">
			<label for="form_total_invoices"><h3>Ficha Proyecto: </h3></label>
		</div>
		<div class="boton_top">
		        <label for="bt_">
		       	 	<a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='editar'}?id={$fp->project->getId()}"{/if}>Editar</a>
				</label>
		</div>
	</div>
    {if $fp->project_title}
    <div class="ficha_row" id="form_project_title">
        <label for="form_project_title">Nombre del Proyecto:</label>
        <div class="ficha_text">{$fp->project_title|ucfirst}</div>
    </div>
    {/if}
    {if $fp->client}
 	<div class="ficha_row" id="form_company_container">
        <label for="form_company_ids">Cliente:</label>
        <div class="ficha_text">{$fp->client}</div>
  	</div>
    {/if}
    {if $fp->start}
    <div class="ficha_row" id="form_project_start">
        <label for="form_project_start">Fecha de inicio:</label>
        <div class="ficha_text">{$fp->start}</div>
    </div>
    {/if}
    {if $fp->ends}
    <div class="ficha_row" id="form_project_ends">
        <label for="form_project_ends">Fecha de culminaci&oacute;n:</label>
        <div class="ficha_text">{$fp->ends}</div>
    </div>
    {/if}
    <div class="ficha_row" id="form_project_budget_">
        <label for="form_project_budge">Presupuesto {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}:</label>
        <div class="ficha_text">{if $fp->budget}{$fp->budget|number_format:2:',':'.'}{else}0,00{/if}</div>
    </div>
    {if $fp->responsible}
 	<div class="ficha_row" id="form_contact_container">
        <label for="form_contact_ids">Responsable:</label>
        <div class="ficha_text">{$fp->responsible|ucfirst}</div>
  	</div>
    {/if}
    {*
    {if $fp->expense}
    <div class="ficha_row" id="form_project_expense_"> 
        <label for="form_project_expens">Gasto(s):</label>
        <div class="ficha_text">{$fp->expense|number_format:2:',':'.'}</div>
    </div>
    {/if}
	*}
          {foreach from=$fp->projectProfile key='key' item='label'}
          {assign var="url" value=$fp->$key}
          {if $url}
        		<div class="ficha_row" id="form_{$key}_container">
                		<label for="form_{$key}">{$label}:</label>
             		{if $url}<a href="/documents/projects/{$url}" target="_blank">Descargar</a>{/if}
			</div>
		  {/if}
        {/foreach}

    {if $fp->notes}
	<div class="ficha_row" id="form_project_notes">
    		<label for="form_project_notes">Notas del Proyecto:</label>
    		<div class="ficha_text">{$fp->notes|ucfirst}</div>
    	</div>
    {/if}
    
	{if $gantti}{$gantti}{/if}
    <div class="boxes2">
	{if $total_i || $total_net_i || $total_iva_i || $total_up_i || $total_net_up_i || $total_iva_up_i}
	<div class="invoice" id="form_total_invoices">
	    <p><span class="imp_text">Facturado:</span>
	    <span class="imp_text_2">{$total_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	    	<p><span class="text">Neto:</span>
	    	<span class="text_2">{$total_net_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	    <p><span class="text">IVA:</span>
	    	<span class="text_2">{$total_iva_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	</div>
	   
	<div class="invoice_pending" id="form_total_invoices4">
	     <p><span class="imp_text">Pendiente de Cobro:</span>
	     <span class="imp_text_2">{$total_up_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	    	 <p><span class="text">Neto:</span>
	     <span class="text_2">{$total_net_up_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	     <p><span class="text">IVA:</span>
	    	 <span class="text_2">{$total_iva_up_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	</div>
	{/if}
	{if $total_e || $total_net_e || $total_iva_e || $total_up_e || $total_net_up_e || $total_iva_up_e}
	<div class="expense" id="form_total_expenses">
	    	 <p><span class="imp_text">Gastado:</span>
	     <span class="imp_text_2">{$total_e|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	     <p><span class="text">Neto:</span>
	    	 <span class="text_2">{$total_net_e|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	     <p><span class="text">IVA:</span>
	     <span class="text_2">{$total_iva_e|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	</div>
	   
	<div class="expense_pending" id="form_total_expenses4">
	    	 <p><span class="imp_text">Pendiente de Pago:</span>
	     <span class="imp_text_2">{$total_up_e|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	    	 <p><span class="text">Neto:</span>
	     <span class="text_2">{$total_net_up_e|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	    	 <p><span class="text">IVA:</span>
	    	 <span class="text_2">{$total_iva_up_e|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</span></p>
	</div>
	{/if}
	</div>
	{if $invoices_up|@count == 0}
	{else}
		<div class="title" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Facturas asociadas a este proyecto: </h3></label>
		</div>
	    	   <form method="post" id="projec_id2" action="{geturl action='index'}">
	    	    <table class="table_p">
	    	  	 <tr>
				<td class="table_p_top">Factura No</td>
				<td class="table_p_top">Fecha</td>
				<td class="table_p_top">Cliente</td>
				<td class="table_p_top">Total {if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if}</td>
				<td class="table_p_top">Vencimiento</td>
				<td class="table_p_top">Estatus</td>
			</tr>
	         {assign var='n' value=0}{assign var='iva_2' value=0}{assign var='iva2_2' value=0}{assign var='i' value=0}{foreach from=$invoices item=invoice}
	         {assign var='id__' value=$invoice->getId()}
	         {if $id__ == $invoices_up[$n]}
				<tr>
					<td class="links"><span><a href="{geturl controller='herramientas/facturas' action='fichafactura'}?id={$invoice->getId()}">{if $invoice->profile->start_letter}{$invoice->profile->start_letter} -{/if} {$invoice->profile->number_zero}{$invoice->invoice_number}</a></span></td>
					<td>{$invoice->profile->invoice_date}</td>
					<td>{$invoice->profile->thecompany|ucfirst}</td>
					<td>{$invoice->profile->total|number_format:2:',':'.'}</td>
					<td>{$valid_until_up[$i]|ucfirst}</td>
					{if $invoice->profile->amountpay}<td class="links {$class_ii[$i]}"><span><a class="fancybox fancybox.iframe" href="{geturl controller='herramientas/facturas' action='editarpago'}?id={$invoice->getId()}">{$status_ii[$i]|ucfirst}</a></span></td>{else}<td class="links {$class_ii[$i]}"><span><a class="fancybox fancybox.iframe" href="{geturl controller='herramientas/facturas' action='pagofactura'}?id={$invoice->getId()}">{$status_ii[$i]|ucfirst}</a></span></td>{/if}
				</tr>
	        {assign var='n' value=$n+1}{assign var='i' value=$i+1}{assign var='iva_2' value=0}{assign var='iva2_2' value=0}
			{* foreach from=$totalIva key='key' item='label'}{if $label == 'I.V.A.'}{assign var='iva_2' value=$iva_2 + $invoice->profile->$key}{/if}{/foreach}{foreach from=$totalIva key='key' item='label'}{if $label == 'Otros Imp.'}{assign var='iva2_2' value=$iva2_2 + $invoice->profile->$key}{/if}{/foreach *}
	        {/if}
	        {/foreach}
	       </table>
	      </form>
	{/if}
	
	{if $expenses_up|@count == 0}
	{else}
		<div class="title" id="form_total_invoices">
			<label for="form_total_invoices"><h3>Notas de Gasto asociadas a este proyecto: </h3></label>
		</div>
	    	   <form method="post" action="{geturl action='index'}">
	    	    <table class="table_p">
	    	  	 <tr>
				<td class="table_p_top">N&uacute;mero</td>
				<td class="table_p_top">Fecha</td>
				<td class="table_p_top">Proveedor</td>
				<td class="table_p_top">Total {if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if}</td>
				<td class="table_p_top">Vencimiento</td>
				<td class="table_p_top">Estatus</td>
			</tr>
	         {assign var='m' value=0}{assign var='iva_2' value=0}{assign var='iva2_2' value=0}{assign var='ii' value=0}{foreach from=$expenses item=expense}
	         {assign var='id_' value=$expense->getId()}
	         {if $id_ == $expenses_up[$m]}
				<tr>
					<td class="links"><span><a href="{geturl controller='herramientas/gastos' action='fichagasto'}?id={$expense->getId()}">{if $expense->profile->start_letter}{$expense->profile->start_letter} -{/if} {$expense->profile->number_zero}{$expense->expense_number}</a></span></td>
					<td>{$expense->profile->expense_date}</td>
					<td>{$expense->profile->thecompany|ucfirst}</td>
					<td>{$expense->profile->total|number_format:2:',':'.'}</td>
					<td>{$valid_until_up_e[$ii]|ucfirst}</td>
					{if $expense->profile->amountpay}<td class="links {$class_ii_e[$ii]}"><span><a class="fancybox fancybox.iframe" href="{geturl controller='herramientas/gastos' action='editarpago'}?id={$expense->getId()}">{$status_ii_e[$ii]|ucfirst}</a></span></td>{else}<td class="links {$class_ii_e[$ii]}"><span><a class="fancybox fancybox.iframe" href="{geturl controller='herramientas/gastos' action='pagogasto'}?id={$expense->getId()}">{$status_ii_e[$ii]|ucfirst}</a></span></td>{/if}
				</tr>
	        {assign var='m' value=$m+1}{assign var='ii' value=$ii+1}{assign var='iva_2' value=0}{assign var='iva2_2' value=0}
	        {* {foreach from=$totalIva key='key' item='label'}{if $label == 'I.V.A.'}{assign var='iva_' value=$iva_ + $expense->profile->$key}{/if}{/foreach}{foreach from=$totalIva key='key' item='label'}{if $label == 'Otros Imp.'}{assign var='iva2_' value=$iva2_ + $expense->profile->$key}{/if}{/foreach} *}
	       {/if}
	       {/foreach}
	       </table>
	      </form>
	{/if}
	
{if $budget_p|@count == 0}
{else}
		<div class="title" id="form_total_invoices">
			<label for="form_total_invoices"><h3>Presupuestos asociados a este proyecto:</h3></label>
		</div>
    	   <form method="post" id="projec_id" action="{geturl action='index'}">
    	    <table class="table_p">
    	  	 <tr>
			<td class="table_p_top">Presupuesto No</td>
			<td class="table_p_top">Fecha</td>
			<td class="table_p_top">Empresa</td>
			<td class="table_p_top">Importe {if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if}</td>
			<td class="table_p_top">Vencimiento</td>
			<td class="table_p_top">Estatus</td>
		</tr>
         {assign var='q' value=0}{foreach from=$budgets item=budget}
	     {assign var='id2_' value=$budget->getId()}
	     {if $id2_ == $budget_p[$q]}
			<tr>
				<td class="links"><span><a href="{geturl controller='herramientas/presupuestos' action='fichapresupuesto'}?id={$budget_number[$q]}">{$budget_number[$q]}</a></span></td>
				<td>{$budget_date[$q]}</td>
				<td>{$thecompany_b[$q]|ucfirst}</td>
				<td>{$total_b[$q]|number_format:2:',':'.'}</td>
				<td>{$valid_until[$q]|ucfirst}</td>
				<td class="links {$class_b[$q]}">{$status_b[$q]|ucfirst}</td>
			</tr>
        {assign var='q' value=$q+1}{/if}{/foreach}
       </table>
      </form>
{/if}

{include file='footer.tpl'}