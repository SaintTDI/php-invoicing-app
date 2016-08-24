{include file='header.tpl' section='facturas'}
<div class="boxes3">
	<div class="title2" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Facturas</h3></label>
	</div>
	
	<div class="boton_top">
	        <label for="bt_">
	       	 	<a class="submit6" {if $identity->trial_expired}{else}href="{geturl controller='herramientas/facturas' action='crear'}"{/if} onclick="clearLocalStorage();">Nueva Factura</a>
			</label>
	</div>
</div>
		{if $invoices|@count == 0}
		<div class="e_background">
			<img src="/images/preview/facturas.jpg">
		</div>
		<div class="title" id="form_total_invoices">
			<label for="form_total_invoices">No hay Facturas registradas.</label>
		</div>
		<div id="parrafo2">
		        <p>&#x2771; En esta p&aacute;gina tendr&aacute;s un listado de todas las facturas que has creado y el estatus de cada una de ellas.</p>
		</div>{/if}

{if $total_i || $total_net_i || $total_iva_i || $total_up_i || $total_net_up_i || $total_iva_up_i}
<div class="boxes2">
   <div class="invoice" id="form_total_invoices">
    		<p><span class="imp_text">Facturado:</span>
    		<span class="imp_text_2">{$total_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
    		<p><span class="text">Neto:</span>
    		<span class="text_2">{$total_net_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
    		<p><span class="text">IVA:</span>
    		<span class="text_2">{$total_iva_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
   </div>
   <div class="invoice_pending" id="form_total_invoices4">
    		<p><span class="imp_text">Pendiente de Cobro:</span>
    		<span class="imp_text_2">{$total_up_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
    		<p><span class="text">Neto:</span>
    		<span class="text_2">{$total_net_up_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
    		<p><span class="text">IVA:</span>
    		<span class="text_2">{$total_iva_up_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
   </div>
</div>
{/if}

{if $month_start}
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Facturaci&oacute;n {$year__}</h3></label>
</div>
<canvas id="finantial_report_1" height="600" width="800"></canvas>

{literal}
	<script>

		var barChartData = {
			labels : ["{/literal}{if $month_start == 1}Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre{elseif $month_start == 2}Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero{elseif $month_start == 3}Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero{elseif $month_start == 4}Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo{elseif $month_start == 5}Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril{elseif $month_start == 6}Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo{elseif $month_start == 7}Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio{elseif $month_start == 8}Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio{elseif $month_start == 9}Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto{elseif $month_start == 10}Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto","Septiembre{elseif $month_start == 11}Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre{else}Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre{/if}{literal}"],
					
			datasets : [
				{
					fillColor : "rgba(61,170,217,1)",
					strokeColor : "rgba(43,121,154,1)",
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

	var myLine = new Chart(document.getElementById("finantial_report_1").getContext("2d")).Bar(barChartData,allopts);
	
	</script>
{/literal}
{/if}

{if $clients|@count > 0}
<canvas id="finantial_report_2" height="500" width="700"></canvas>

{literal}
	<script>
      
	  var crosstxt = {
     inGraphDataShow : true,
      datasetFill : true,
      scaleLabel: "<%=value%>",
      scaleTickSizeRight : 5,
      scaleTickSizeLeft : 5,
      scaleTickSizeBottom : 5,
      scaleTickSizeTop : 5,
      scaleFontSize : 16,
      canvasBorders : false,
      canvasBordersWidth : 3,
      canvasBordersColor : "black",
      graphTitle : "Clientes",
			graphTitleFontFamily : "'Arial'",
			graphTitleFontSize : 24,
			graphTitleFontStyle : "bold",
			graphTitleFontColor : "#000",
      graphSubTitle : "",
			graphSubTitleFontFamily : "'Arial'",
			graphSubTitleFontSize : 18,
			graphSubTitleFontStyle : "normal",
			graphSubTitleFontColor : "#000",
      footNote : "",
			footNoteFontFamily : "'Arial'",
			footNoteFontSize : 8,
			footNoteFontStyle : "bold",
			footNoteFontColor : "#000",
      legend : false,
	    legendFontFamily : "'Arial'",
	    legendFontSize : 12,
	    legendFontStyle : "normal",
	    legendFontColor : "#000",
      legendBlockSize : 15,
      legendBorders : false,
      legendBordersWidth : 1,
      legendBordersColors : "#000",
      yAxisLeft : true,
      yAxisRight : false,
      xAxisBottom : true,
      xAxisTop : false,
      yAxisLabel : "Y Axis Label",
			yAxisFontFamily : "'Arial'",
			yAxisFontSize : 16,
			yAxisFontStyle : "normal",
			yAxisFontColor : "#000",
      xAxisLabel : "pX Axis Label",
	 	  xAxisFontFamily : "'Arial'",
			xAxisFontSize : 16,
			xAxisFontStyle : "normal",
			xAxisFontColor : "#000",
      yAxisUnit : "Y Unit",
			yAxisUnitFontFamily : "'Arial'",
			yAxisUnitFontSize : 8,
			yAxisUnitFontStyle : "normal",
			yAxisUnitFontColor : "#000",
      annotateDisplay : true, 
      spaceTop : 0,
      spaceBottom : 0,
      spaceLeft : 0,
      spaceRight : 0,
      logarithmic: false,
//      showYAxisMin : false,
      rotateLabels : "smart",
      xAxisSpaceOver : 0,
      xAxisSpaceUnder : 0,
      xAxisLabelSpaceAfter : 0,
      xAxisLabelSpaceBefore : 0,
      legendBordersSpaceBefore : 0,
      legendBordersSpaceAfter : 0,
      footNoteSpaceBefore : 0,
      footNoteSpaceAfter : 0, 
      startAngle : 0,
      dynamicDisplay : true              
	}

		var doughnutData = [
{/literal}{assign var='p' value=0}{foreach from=$clients item=client}
				{if $p>0},{/if}{literal}
				{
					value: {/literal}{$value_c[$p]}{literal},
					color: "{/literal}{$color_c[$p]}{literal}",
					title: "{/literal}{$label_c[$p]}{literal}"
				}
{/literal}{assign var='p' value=$p+1}{/foreach}{literal}
			]

	var myDoughnut = new Chart(document.getElementById("finantial_report_2").getContext("2d")).Doughnut(doughnutData,crosstxt);
	
	</script>
{/literal}
{/if}

{if $items|@count > 0}
<canvas id="finantial_report_3" height="500" width="700"></canvas>

{literal}
	<script>

	  var crosstxt2 = {
     inGraphDataShow : true,
      datasetFill : true,
      scaleLabel: "<%=value%>",
      scaleTickSizeRight : 5,
      scaleTickSizeLeft : 5,
      scaleTickSizeBottom : 5,
      scaleTickSizeTop : 5,
      scaleFontSize : 16,
      canvasBorders : false,
      canvasBordersWidth : 3,
      canvasBordersColor : "black",
      graphTitle : "Items",
			graphTitleFontFamily : "'Arial'",
			graphTitleFontSize : 24,
			graphTitleFontStyle : "bold",
			graphTitleFontColor : "#000",
      graphSubTitle : "",
			graphSubTitleFontFamily : "'Arial'",
			graphSubTitleFontSize : 18,
			graphSubTitleFontStyle : "normal",
			graphSubTitleFontColor : "#000",
      footNote : "",
			footNoteFontFamily : "'Arial'",
			footNoteFontSize : 8,
			footNoteFontStyle : "bold",
			footNoteFontColor : "#000",
      legend : false,
	    legendFontFamily : "'Arial'",
	    legendFontSize : 12,
	    legendFontStyle : "normal",
	    legendFontColor : "#000",
      legendBlockSize : 15,
      legendBorders : false,
      legendBordersWidth : 1,
      legendBordersColors : "#000",
      yAxisLeft : true,
      yAxisRight : false,
      xAxisBottom : true,
      xAxisTop : false,
      yAxisLabel : "Y Axis Label",
			yAxisFontFamily : "'Arial'",
			yAxisFontSize : 16,
			yAxisFontStyle : "normal",
			yAxisFontColor : "#000",
      xAxisLabel : "pX Axis Label",
	 	  xAxisFontFamily : "'Arial'",
			xAxisFontSize : 16,
			xAxisFontStyle : "normal",
			xAxisFontColor : "#000",
      yAxisUnit : "Y Unit",
			yAxisUnitFontFamily : "'Arial'",
			yAxisUnitFontSize : 8,
			yAxisUnitFontStyle : "normal",
			yAxisUnitFontColor : "#000",
      annotateDisplay : true, 
      spaceTop : 0,
      spaceBottom : 0,
      spaceLeft : 0,
      spaceRight : 0,
      logarithmic: false,
//      showYAxisMin : false,
      rotateLabels : "smart",
      xAxisSpaceOver : 0,
      xAxisSpaceUnder : 0,
      xAxisLabelSpaceAfter : 0,
      xAxisLabelSpaceBefore : 0,
      legendBordersSpaceBefore : 0,
      legendBordersSpaceAfter : 0,
      footNoteSpaceBefore : 0,
      footNoteSpaceAfter : 0, 
      startAngle : 0,
      dynamicDisplay : true              
	}
		var doughnutData = [
{/literal}{assign var='t' value=0}{foreach from=$items item=item}
				{if $t>0},{/if}{literal}
				{
					value: {/literal}{$value_i[$t]}{literal},
					color: "{/literal}{$color_i[$t]}{literal}",
					title: "{/literal}{$label_i[$t]}{literal}"
				}
{/literal}{assign var='t' value=$t+1}{/foreach}{literal}
			]

	var myDoughnut = new Chart(document.getElementById("finantial_report_3").getContext("2d")).Doughnut(doughnutData,crosstxt2);
	
	</script>
{/literal}
{/if}

{if $invoices_up|@count == 0}
{else}
		<div class="title" id="form_total_invoices">
			<label for="form_total_invoices"><h3>Proximas Facturas pendiente de cobro:</h3></label>
		</div>
    	   <form method="post" id="expend_id2" action="{geturl action='index'}">
    	    <table class="table_p">
    	  	 <tr>
			<td class="table_p_top">Factura No</td>
			<td class="table_p_top">Fecha</td>
			<td class="table_p_top">Cliente</td>
			<td class="table_p_top">Total {if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if}</td>
			<td class="table_p_top">Vencimiento</td>
			<td class="table_p_top">Estatus</td>
		</tr>
         {assign var='m' value=0}{assign var='iva_2' value=0}{assign var='iva2_2' value=0}{assign var='ii' value=0}{foreach from=$invoices item=invoice}
         {assign var='id__' value=$invoice->getId()}
         {if $id__ == $invoices_up[$m]}
			<tr>
				<td class="links"><span><a href="{geturl controller='herramientas/facturas' action='fichafactura'}?id={$invoice->getId()}" onclick="clearLocalStorage();">{if $invoice->profile->start_letter}{$invoice->profile->start_letter} -{/if} {$invoice->profile->number_zero}{$invoice->invoice_number}</a></span></td>
				<td>{$invoice->profile->invoice_date}</td>
				<td>{$invoice->profile->thecompany|ucfirst}</td>
				<td>{$invoice->profile->total|number_format:2:',':'.'}</td>
				<td>{$valid_until_up[$ii]|ucfirst}</td>
				{if $invoice->profile->amountpay}<td class="links {$class_ii[$ii]}"><span><a {if $identity->trial_expired}{else}class="fancybox fancybox.iframe" href="{geturl controller='herramientas/facturas' action='editarpago'}?id={$invoice->getId()}"{/if} onclick="clearLocalStorage();">{$status_ii[$ii]|ucfirst}</a></span></td>{else}<td class="links {$class_ii[$ii]}"><span><a {if $identity->trial_expired}{else}class="fancybox fancybox.iframe" href="{geturl controller='herramientas/facturas' action='pagofactura'}?id={$invoice->getId()}"{/if} onclick="clearLocalStorage();">{$status_ii[$ii]|ucfirst}</a></span></td>{/if}
			</tr>
        {assign var='m' value=$m+1}{assign var='ii' value=$ii+1}{assign var='iva_2' value=0}{assign var='iva2_2' value=0}
		{* foreach from=$totalIva key='key' item='label'}{if $label == 'I.V.A.'}{assign var='iva_2' value=$iva_2 + $invoice->profile->$key}{/if}{/foreach}{foreach from=$totalIva key='key' item='label'}{if $label == 'Otros Imp.'}{assign var='iva2_2' value=$iva2_2 + $invoice->profile->$key}{/if}{/foreach *}
        {/if}
        {/foreach}
       </table>
      </form>
{/if}

{if $invoices|@count > 0}
		<div class="title" id="form_total_invoices">
			<label for="form_total_invoices"><h3>Listado de Facturas emitidas:</h3></label>
		</div>
    	   <form method="post" id="expend_id" action="{geturl action='index'}">
    	    <table class="table_p">
    	  	 <tr>
			<td class="table_p_top">Factura No</td>
			<td class="table_p_top">Fecha</td>
			<td class="table_p_top">Cliente</td>
			<td class="table_p_top">Total {if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if}</td>
			<td class="table_p_top">Vencimiento</td>
			<td class="table_p_top">Estatus</td>
		</tr>
         {assign var='iva_' value=0}{assign var='iva2_' value=0}{assign var='i' value=0}{foreach from=$invoices item=invoice}
			<tr>
				<td class="links"><span><a href="{geturl controller='herramientas/facturas' action='fichafactura'}?id={$invoice->getId()}" onclick="clearLocalStorage();">{if $invoice->profile->start_letter}{$invoice->profile->start_letter} -{/if} {$invoice->profile->number_zero}{$invoice->invoice_number}</a></span></td>
				<td>{$invoice->profile->invoice_date}</td>
				<td>{$invoice->profile->thecompany|ucfirst}</td>
				<td>{$invoice->profile->total|number_format:2:',':'.'}</td>
				<td>{$valid_until[$i]|ucfirst}</td>
				{if $invoice->profile->amountpay}{if $invoice->profile->published}<td class="links {$class_i[$i]}"><span><a {if $identity->trial_expired}{else}class="fancybox fancybox.iframe" href="{geturl controller='herramientas/facturas' action='editarpago'}?id={$invoice->getId()}"{/if} onclick="clearLocalStorage();">{$status_i[$i]|ucfirst}</a></span></td>{else}<td class="links {$class_i[$i]}">{$status_i[$i]|ucfirst}</td>{/if}{else}{if $invoice->profile->published}<td class="links {$class_i[$i]}"><span><a {if $identity->trial_expired}{else}class="fancybox fancybox.iframe" href="{geturl controller='herramientas/facturas' action='pagofactura'}?id={$invoice->getId()}"{/if} onclick="clearLocalStorage();">{$status_i[$i]|ucfirst}</a></span></td>{else}<td class="links {$class_i[$i]}">{$status_i[$i]|ucfirst}</td>{/if}{/if}
			</tr>
        {assign var='i' value=$i+1}{assign var='iva_' value=0}{assign var='iva2_' value=0}{/foreach}
		{* foreach from=$totalIva key='key' item='label'}{if $label == 'I.V.A.'}{assign var='iva_' value=$iva_ + $invoice->profile->$key}{/if}{/foreach}{foreach from=$totalIva key='key' item='label'}{if $label == 'Otros Imp.'}{assign var='iva2_' value=$iva2_ + $invoice->profile->$key}{/if}{/foreach *}
		{* <td class="table_p_top"><button type="submit" name="delete" id="delete" value="delete">Borrar</button></td>
		<td><input type="checkbox" name="invoice_id[]" value="{$invoice->getId()}" {if $invoice->profile->published == 'yes'}disabled="disabled"{/if}></td> *}
    	  	 	<tr>
				<td colspan="9" class="table_list" align="center"><button class="submit2" type="submit" name="download" id="download" value="download">Descargar Listado</button></td>
			</tr>
       </table>
      </form>
{/if}

{include file='footer.tpl'}