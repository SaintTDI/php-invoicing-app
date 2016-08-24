{include file='header.tpl' section='proformas'}
<div class="boxes3">
	<div class="title2" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Facturas Pro-Forma</h3></label>
	</div>
	
	<div class="boton_top">
	    <label for="bt_">
			<a class="submit6" {if $identity->trial_expired}{else}href="{geturl controller='herramientas/proformas' action='crear'}"{/if} onclick="clearLocalStorage();">Nueva Pro-forma</a>
	 	</label>
	</div>
</div>
		{if $proformas|@count == 0}
		<div class="title" id="form_total_proformas">
			<label for="form_total_proformas">No hay Facturas Pro-Forma registradas.</label>
		</div>
		<div id="parrafo2">
		        <p>&#x2771; En esta p&aacute;gina tendr&aacute;s un listado de todas las Facturas Pro-Forma que has creado y el estatus de cada una de ellos.</p>
		</div>
		<div id="parrafo6">
		        <p>&#x2771; &iexcl;Recuerda que luego puedes transformar cualquiera de tus Facturas Pro-Forma en Facturas con s&oacute;lo un click!</p>
		</div>{/if}
	
{if $items|@count > 0}
<canvas id="finantial_report_3" height="500" width="750"></canvas>

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
      graphTitle : "Conversi\u00f3n a Factura",
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

	var myDoughnut = new Chart(document.getElementById("finantial_report_3").getContext("2d")).Doughnut(doughnutData,crosstxt);
	
	</script>
{/literal}
{/if}

{if $proformas|@count == 0}
{else}
		<div class="title" id="form_total_invoices">
			<label for="form_total_invoices"><h3>Listado de Facturas Proforma emitidas:</h3></label>
		</div>
    	   <form method="post" id="prof_id" action="{geturl action='index'}">
    	    <table class="table_p">
    	  	 <tr>
			<td class="table_p_top">Pro-Forma No</td>
			<td class="table_p_top">Fecha</td>
			<td class="table_p_top">Empresa</td>
			<td class="table_p_top">Total {if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if}</td>
			<td class="table_p_top">Vencimiento</td>
			<td class="table_p_top">Estatus</td>
		</tr>
         {assign var='iva_' value=0}{assign var='iva2_' value=0}{assign var='i' value=0}{foreach from=$proformas item=proforma}
			<tr>
				<td class="links"><span><a href="{geturl controller='herramientas/proformas' action='fichaproforma'}?id={$proforma->getId()}" onclick="clearLocalStorage();">{if $proforma->profile->start_letter}{$proforma->profile->start_letter} -{/if} {$proforma->profile->number_zero}{$proforma->proforma_number}</a></span></td>
				<td>{$proforma->profile->proforma_date}</td>
				<td>{$proforma->profile->thecompany|ucfirst}</td>
				<td>{$proforma->profile->total|number_format:2:',':'.'}</td>
				<td>{$valid_until[$i]|ucfirst}</td>
				<td class="links {$class_i[$i]}">{$status_i[$i]|ucfirst}</td>
			</tr>
        {assign var='i' value=$i+1}{assign var='iva_' value=0}{assign var='iva2_' value=0}{/foreach}
    	  	{* <td class="table_p_top"><button class="submit2" type="submit" name="delete" id="delete" value="delete">Borrar</button></td> *}
    	  	{* <td><input type="checkbox" name="proforma_id[]" value="{$proforma->getId()}"></td> *}
    	  	{* {foreach from=$totalIva key='key' item='label'}{if $label == 'I.V.A.'}{assign var='iva_' value=$iva_ + $proforma->profile->$key}{/if}{/foreach}{foreach from=$totalIva key='key' item='label'}{if $label == 'Otros Imp.'}{assign var='iva2_' value=$iva2_ + $proforma->profile->$key}{/if}{/foreach} *}
    	  	 	<tr>
				<td colspan="9" class="table_list" align="center"><button class="submit2" type="submit" name="download" id="download" value="download">Descargar Listado</button></td>
			</tr>
       </table>
      </form>
{/if}

{include file='footer.tpl'}