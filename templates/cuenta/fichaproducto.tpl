{include file='header.tpl' section='cuenta' subsection='fichaproducto'}

	<div class="boxes3">
		<div class="title2" id="form_total_invoices">
			<label for="form_total_invoices"><h3>Ficha del producto o servicio:</h3></label>
		</div>
		<div class="boton_top">
		        <label for="bt_">
		       	 	<a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='editarproducto'}?id={$fp->product->getId()}"{/if}>Editar</a>
				</label>
		</div>
	</div>
	
    {foreach from=$fp->productProfile key='key' item='label'}
                {if $label == 'Profile Picture'}
                {elseif $label == 'Picture Preview'}
	                {if $fp->$key != ''}
	                	<div class="ficha_row" id="form_{$key}_container">
	                				{assign var="url" value=$fp->$key}
	                            	<img src="/profiles/tmp/product/pictures/{$url}" />
	                </div>
	                	{/if}
                	{/if}
    {/foreach}
    
	{if $fp->product_code}
    <div class="ficha_row" id="form_product_code_container">
        <label for="form_product_code">C&oacute;digo:</label>
        <div class="ficha_text">{if $fp->product_code}{$fp->product_code}{else}000001{/if}</div>
    </div>
    {/if}
    {if $fp->product_name}
    <div class="ficha_row" id="form_product_name_container">
        <label for="form_product_name">Nombre del producto:</label>
        <div class="ficha_text">{$fp->product_name|ucfirst}</div>
    </div>
    {/if}
    {if $fp->product_description}
	<div class="ficha_row" id="form_product_description_container">
    		<label for="form_product_description">Descripci&oacute;n del producto:</label>
    		<div class="ficha_text">{$fp->product_description|ucfirst}</div>
    	</div>
    {/if}  
    {if $fp->product_unit}
    <div class="ficha_row" id="form_product_unit_container">
    	<label for="form_product_unit">Unidad de facturaci&oacute;n:</label>
    <div class="ficha_text">{$fp->product_unit|ucfirst}</div>
    </div>
    {/if}
    {if $fp->unit_price}
    <div class="ficha_row" id="form_unit_price_container">
        <label for="form_unit_price">Precio Unitario {if $fp->product_currency == 'Peso Argentino'}(&#36; ARS){elseif $fp->product_currency == 'Peso Boliviano'}(b&#36; BOB){elseif $fp->product_currency == 'Peso Chileno'}(&#36; CLP){elseif $fp->product_currency == 'Peso Colombiano'}(&#36; COP){elseif $fp->product_currency == 'Colon'}(&#162; CRC){elseif $fp->product_currency == 'Peso Dominicano'}(&#36; DOP){elseif $fp->product_currency == 'Dolar'}(&#36; USD){elseif $fp->product_currency == 'Euro'}(&#128; EUR){elseif $fp->product_currency == 'Quetzal'}(Q GTQ){elseif $fp->product_currency == 'Lempira'}(L HNL){elseif $fp->product_currency == 'Peso Mexicano'}(&#36; MXN){elseif $fp->product_currency == 'Cordoba'}(C&#36; NIO){elseif $fp->product_currency == 'Balboa'}(B/. PAB){elseif $fp->product_currency == 'Guarani'}(&#8370; PYG){elseif $fp->product_currency == 'Nuevo Sol'}(S/. PEN){elseif $fp->product_currency == 'Libra'}(&#163; GBP){elseif $fp->product_currency == 'Peso Uruguayo'}(&#36; UYU){elseif $fp->product_currency == 'Bolivar'}(Bs. VEF){else}(&#128; EUR){/if}:</label>
        <div class="ficha_text">{$fp->unit_price|number_format:2:',':'.'}</div>
    </div>
    {/if}
    {if $fp->iva}
    <div class="ficha_row" id="form_iva_container">
        <label for="form_iva">R&eacute;gimen de IVA (&#37;):</label>
        <div class="ficha_text">{if $fp->iva}{$fp->iva|number_format:2:',':'.'}{else}0,00{/if}</div>
    </div>
    {/if}
    {if $fp->iva2_name}
    <div class="ficha_row" id="form_iva2_name_container">
        <label for="form_iva2_name">Impuesto Adic. (Nombre):</label>
        <div class="ficha_text">{$fp->iva2_name}</div>
    </div>
    {/if}
    {if $fp->iva2}
    <div class="ficha_row" id="form_iva2_container">
        <label for="form_iva2">Impuesto Adicional (&#37;):</label>
        <div class="ficha_text">{if $fp->iva2}{$fp->iva2|number_format:2:',':'.'}{else}0,00{/if}</div>
    </div>
    {/if}
    <div class="ficha_row" id="form_unit_cost_container">{assign var='tax1_' value=$fp->iva/100}{assign var='tax2_' value=$fp->iva2/100}{assign var='pvp' value=$fp->unit_price * (1 + $tax1_ + $tax2_)} 
        <label for="form_unit_cost">Precio de Venta al P&uacute;blico {if $fp->product_currency == 'Peso Argentino'}(&#36; ARS){elseif $fp->product_currency == 'Peso Boliviano'}(b&#36; BOB){elseif $fp->product_currency == 'Peso Chileno'}(&#36; CLP){elseif $fp->product_currency == 'Peso Colombiano'}(&#36; COP){elseif $fp->product_currency == 'Colon'}(&#162; CRC){elseif $fp->product_currency == 'Peso Dominicano'}(&#36; DOP){elseif $fp->product_currency == 'Dolar'}(&#36; USD){elseif $fp->product_currency == 'Euro'}(&#128; EUR){elseif $fp->product_currency == 'Quetzal'}(Q GTQ){elseif $fp->product_currency == 'Lempira'}(L HNL){elseif $fp->product_currency == 'Peso Mexicano'}(&#36; MXN){elseif $fp->product_currency == 'Cordoba'}(C&#36; NIO){elseif $fp->product_currency == 'Balboa'}(B/. PAB){elseif $fp->product_currency == 'Guarani'}(&#8370; PYG){elseif $fp->product_currency == 'Nuevo Sol'}(S/. PEN){elseif $fp->product_currency == 'Libra'}(&#163; GBP){elseif $fp->product_currency == 'Peso Uruguayo'}(&#36; UYU){elseif $fp->product_currency == 'Bolivar'}(Bs. VEF){else}(&#128; EUR){/if}:</label>
        <div class="ficha_text">{$pvp|number_format:2:',':'.'}</div>
    </div>
    {if $fp->unit_cost}
    <div class="ficha_row" id="form_unit_cost_container">
        <label for="form_unit_cost">Precio Costo {if $fp->product_currency == 'Peso Argentino'}(&#36; ARS){elseif $fp->product_currency == 'Peso Boliviano'}(b&#36; BOB){elseif $fp->product_currency == 'Peso Chileno'}(&#36; CLP){elseif $fp->product_currency == 'Peso Colombiano'}(&#36; COP){elseif $fp->product_currency == 'Colon'}(&#162; CRC){elseif $fp->product_currency == 'Peso Dominicano'}(&#36; DOP){elseif $fp->product_currency == 'Dolar'}(&#36; USD){elseif $fp->product_currency == 'Euro'}(&#128; EUR){elseif $fp->product_currency == 'Quetzal'}(Q GTQ){elseif $fp->product_currency == 'Lempira'}(L HNL){elseif $fp->product_currency == 'Peso Mexicano'}(&#36; MXN){elseif $fp->product_currency == 'Cordoba'}(C&#36; NIO){elseif $fp->product_currency == 'Balboa'}(B/. PAB){elseif $fp->product_currency == 'Guarani'}(&#8370; PYG){elseif $fp->product_currency == 'Nuevo Sol'}(S/. PEN){elseif $fp->product_currency == 'Libra'}(&#163; GBP){elseif $fp->product_currency == 'Peso Uruguayo'}(&#36; UYU){elseif $fp->product_currency == 'Bolivar'}(Bs. VEF){else}(&#128; EUR){/if}:</label>
        <div class="ficha_text">{$fp->unit_cost|number_format:2:',':'.'}</div>
    </div>
    {/if}
    {if $fp->iva_p}
    <div class="ficha_row" id="form_iva_p_container">
        <label for="form_iva_p">IVA del Proveedor (&#37;):</label>
        <div class="ficha_text">{$fp->iva_p|number_format:2:',':'.'}</div>
    </div>
    {/if}
    {if $fp->iva_p2_name}
    <div class="ficha_row" id="form_iva_p2_name_container">
        <label for="form_iva_p2_name">Imp. Adic. Prov. (Nombre):</label>
        <div class="ficha_text">{$fp->iva_p2_name}</div>
    </div>
    {/if}
    {if $fp->iva_p2}
    <div class="ficha_row" id="form_iva_p2_container">
        <label for="form_iva_p2">Imp. Adic. Proveedor (&#37;):</label>
        <div class="ficha_text">{$fp->iva_p2|number_format:2:',':'.'}</div>
    </div>
    {/if}
	
	{if $fp->company_id}  	
	   <div class="ficha_table" id="form_company_container">
      	<label for="form_company">Proveedor(es):</label>	
		 {if $fp->company_id|@count > 0}
		   <table class="table_p">
		    <tr>
			  <td class="table_p_top">Nombre</td>
			  <td class="table_p_top">Industria</td>
			  <td class="table_p_top">Relaci&oacute;n</td>
			</tr>
			{if $fp->company_id|is_array}
		   	{foreach from=$fp->company_id item=company__}
		      {assign var='id' value=$company__}
		      {assign var='b' value=0}  
		        {foreach from=$companieslist item=company}
					{if $data_[$b] == $id}
						<tr>
							<td>{$company_[$b]|ucfirst}</td>
							<td>{$industry_[$b]|ucfirst}</td>
							<td>{$relationship_[$b]|ucfirst}</td>
						</tr>
					{/if}
					{assign var='b' value=$b+1}
		       {/foreach}
		    {/foreach}
		   </table>	
		  {else}
				{assign var='id' value=$fp->company_id}
		        {assign var='b' value=0} 
		        {foreach from=$companieslist item=company}
				   {if $data_[$b] == $id}
					<tr>
						<td>{$company_[$b]|ucfirst}</td>
						<td>{$industry_[$b]|ucfirst}</td>
						<td>{$relationship_[$b]|ucfirst}</td>
					</tr>
			       {/if}
					 {assign var='b' value=$b+1}
		        {/foreach} 
		    </table>
			{/if}
		 {/if}
		</div>
	{/if}
	
	
    <div class="ficha_row" id="form_unit_cost_container">
        <label for="form_tot_product">Facturado Producto {if $fp->product_currency == 'Peso Argentino'}(&#36; ARS){elseif $fp->product_currency == 'Peso Boliviano'}(b&#36; BOB){elseif $fp->product_currency == 'Peso Chileno'}(&#36; CLP){elseif $fp->product_currency == 'Peso Colombiano'}(&#36; COP){elseif $fp->product_currency == 'Colon'}(&#162; CRC){elseif $fp->product_currency == 'Peso Dominicano'}(&#36; DOP){elseif $fp->product_currency == 'Dolar'}(&#36; USD){elseif $fp->product_currency == 'Euro'}(&#128; EUR){elseif $fp->product_currency == 'Quetzal'}(Q GTQ){elseif $fp->product_currency == 'Lempira'}(L HNL){elseif $fp->product_currency == 'Peso Mexicano'}(&#36; MXN){elseif $fp->product_currency == 'Cordoba'}(C&#36; NIO){elseif $fp->product_currency == 'Balboa'}(B/. PAB){elseif $fp->product_currency == 'Guarani'}(&#8370; PYG){elseif $fp->product_currency == 'Nuevo Sol'}(S/. PEN){elseif $fp->product_currency == 'Libra'}(&#163; GBP){elseif $fp->product_currency == 'Peso Uruguayo'}(&#36; UYU){elseif $fp->product_currency == 'Bolivar'}(Bs. VEF){else}(&#128; EUR){/if}:</label>
        <div class="ficha_text">{$tot_product|number_format:2:',':'.'}</div>
    </div>
    
    
    <div class="ficha_row" id="form_unit_cost_container">
        <label for="form_unit_net_product">Facturado Neto Producto {if $fp->product_currency == 'Peso Argentino'}(&#36; ARS){elseif $fp->product_currency == 'Peso Boliviano'}(b&#36; BOB){elseif $fp->product_currency == 'Peso Chileno'}(&#36; CLP){elseif $fp->product_currency == 'Peso Colombiano'}(&#36; COP){elseif $fp->product_currency == 'Colon'}(&#162; CRC){elseif $fp->product_currency == 'Peso Dominicano'}(&#36; DOP){elseif $fp->product_currency == 'Dolar'}(&#36; USD){elseif $fp->product_currency == 'Euro'}(&#128; EUR){elseif $fp->product_currency == 'Quetzal'}(Q GTQ){elseif $fp->product_currency == 'Lempira'}(L HNL){elseif $fp->product_currency == 'Peso Mexicano'}(&#36; MXN){elseif $fp->product_currency == 'Cordoba'}(C&#36; NIO){elseif $fp->product_currency == 'Balboa'}(B/. PAB){elseif $fp->product_currency == 'Guarani'}(&#8370; PYG){elseif $fp->product_currency == 'Nuevo Sol'}(S/. PEN){elseif $fp->product_currency == 'Libra'}(&#163; GBP){elseif $fp->product_currency == 'Peso Uruguayo'}(&#36; UYU){elseif $fp->product_currency == 'Bolivar'}(Bs. VEF){else}(&#128; EUR){/if}:</label>
        <div class="ficha_text">{$net_product|number_format:2:',':'.'}</div>
    </div>
    
    <div class="ficha_row" id="form_unit_cost_container">
        <label for="form_iva_product">Facturado IVA Producto {if $fp->product_currency == 'Peso Argentino'}(&#36; ARS){elseif $fp->product_currency == 'Peso Boliviano'}(b&#36; BOB){elseif $fp->product_currency == 'Peso Chileno'}(&#36; CLP){elseif $fp->product_currency == 'Peso Colombiano'}(&#36; COP){elseif $fp->product_currency == 'Colon'}(&#162; CRC){elseif $fp->product_currency == 'Peso Dominicano'}(&#36; DOP){elseif $fp->product_currency == 'Dolar'}(&#36; USD){elseif $fp->product_currency == 'Euro'}(&#128; EUR){elseif $fp->product_currency == 'Quetzal'}(Q GTQ){elseif $fp->product_currency == 'Lempira'}(L HNL){elseif $fp->product_currency == 'Peso Mexicano'}(&#36; MXN){elseif $fp->product_currency == 'Cordoba'}(C&#36; NIO){elseif $fp->product_currency == 'Balboa'}(B/. PAB){elseif $fp->product_currency == 'Guarani'}(&#8370; PYG){elseif $fp->product_currency == 'Nuevo Sol'}(S/. PEN){elseif $fp->product_currency == 'Libra'}(&#163; GBP){elseif $fp->product_currency == 'Peso Uruguayo'}(&#36; UYU){elseif $fp->product_currency == 'Bolivar'}(Bs. VEF){else}(&#128; EUR){/if}:</label>
        <div class="ficha_text">{$iva_product|number_format:2:',':'.'}</div>
    </div>

<div class="title3" id="form_total_invoices">
	<label for="form_total_invoices">Ventas {$fp->product_name|ucwords} - {$year__}</label>
</div>

<canvas id="finantial_report3" height="600" width="800"></canvas>

{literal}
	<script>

		var barChartData = {
			labels : ["{/literal}{if $month_start == 1}Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre{elseif $month_start == 2}Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero{elseif $month_start == 3}Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero{elseif $month_start == 4}Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo{elseif $month_start == 5}Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril{elseif $month_start == 6}Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo{elseif $month_start == 7}Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio{elseif $month_start == 8}Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio{elseif $month_start == 9}Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto{elseif $month_start == 10}Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto","Septiembre{elseif $month_start == 11}Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre{else}Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre{/if}{literal}"],
					
			datasets : [
				{
					fillColor : "rgba(0,172,215,1)",
					strokeColor : "rgba(0,128,187,1)",
					data : [{/literal}{if $month_start == 1}{if $tot_month_1}{$tot_month_1}{else}0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{elseif $month_start == 2}{if $tot_month_2}{$tot_month_2}{else}0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{elseif $month_start == 3}{if $tot_month_3}{$tot_month_3}{else}0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{elseif $month_start == 4}{if $tot_month_4}{$tot_month_4}{else}0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{elseif $month_start == 5}{if $tot_month_5}{$tot_month_5}{else}0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{elseif $month_start == 6}{if $tot_month_6}{$tot_month_6}{else}0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{elseif $month_start == 7}{if $tot_month_7}{$tot_month_7}{else}0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{elseif $month_start == 8}{if $tot_month_8}{$tot_month_8}{else}0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{elseif $month_start == 9}{if $tot_month_9}{$tot_month_9}{else}0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{elseif $month_start == 10}{if $tot_month_10}{$tot_month_10}{else}0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{elseif $month_start == 11}{if $tot_month_11}{$tot_month_11}{else}0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{else}{if $tot_month_12}{$tot_month_12}{else}0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{/if}{literal}]
				}
			]
			
		}
		
	var steps = 10;
		
	var max_1 = Math.max({/literal}{if $month_start == 1}{if $tot_month_1}{$tot_month_1}{else}0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{elseif $month_start == 2}{if $tot_month_2}{$tot_month_2}{else}0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{elseif $month_start == 3}{if $tot_month_3}{$tot_month_3}{else}0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{elseif $month_start == 4}{if $tot_month_4}{$tot_month_4}{else}0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{elseif $month_start == 5}{if $tot_month_5}{$tot_month_5}{else}0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{elseif $month_start == 6}{if $tot_month_6}{$tot_month_6}{else}0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{elseif $month_start == 7}{if $tot_month_7}{$tot_month_7}{else}0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{elseif $month_start == 8}{if $tot_month_8}{$tot_month_8}{else}0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{elseif $month_start == 9}{if $tot_month_9}{$tot_month_9}{else}0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{elseif $month_start == 10}{if $tot_month_10}{$tot_month_10}{else}0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{elseif $month_start == 11}{if $tot_month_11}{$tot_month_11}{else}0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{else}{if $tot_month_12}{$tot_month_12}{else}0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{/if}{literal});
	
	if (max_1 > 0){
		var max_e = max_1;
	}
	else if (max_1 < 0){
		var max_e = max_1;
	}
	else {
		var max_e = 1;
	}
	
	var allopts = {scaleOverride: true, scaleSteps: steps, scaleStepWidth: Math.ceil(max_e/steps), scaleStartValue: 0}

	var myLine = new Chart(document.getElementById("finantial_report3").getContext("2d")).Bar(barChartData,allopts);
	
	</script>
{/literal}

	{if $clients|@count > 0}  	
	   <div class="ficha_table" id="form_client_container">
      	<label for="form_client">Clientes que han comprado este item:</label>	
		   <table class="table_p">
		    <tr>
			  <td class="table_p_top">Nombre</td>
			  <td class="table_p_top">Importe a la fecha</td>
			  <td class="table_p_top">Fecha &uacute;ltima compra</td>
			</tr>
		        {assign var='b' value=0} 
		        {foreach from=$clients item=company}
					<tr>
						<td class="links"><span>{if $fichawhat_[$b]}{if $client_id_[$b]}<a href="{geturl controller='contacto' action={$fichawhat_[$b]}}?id={$client_id_[$b]}">{$clients[$b]|ucfirst}</a></span>{else}<span>{$clients[$b]|ucfirst}</span>{/if}{else}<span>{$clients[$b]|ucfirst}</span>{/if}</td>
						<td>{$amount[$b]|number_format:2:',':'.'}</td>
						<td>{$last[$b]}</td>
					</tr>
					 {assign var='b' value=$b+1}
		        {/foreach} 
		    </table>
		</div>
	{/if}
   

{include file='footer.tpl'}