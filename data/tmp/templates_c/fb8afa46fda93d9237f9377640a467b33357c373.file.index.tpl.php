<?php /* Smarty version Smarty-3.0.8, created on 2015-03-18 15:56:40
         compiled from "/var/www/app/templates/./herramientas/ocompras/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1764616483550992285759d1-44573904%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb8afa46fda93d9237f9377640a467b33357c373' => 
    array (
      0 => '/var/www/app/templates/./herramientas/ocompras/index.tpl',
      1 => 1423691305,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1764616483550992285759d1-44573904',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','ocompras'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="boxes3">
	<div class="title2" id="form_total_invoices">
		<label for="form_total_invoices"><h3>&Oacute;rdenes de Compra</h3></label>
	</div>
	
	<div class="boton_top">
	    <label for="bt_">
			<a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/ocompras','action'=>'crear'),$_smarty_tpl);?>
"<?php }?> onclick="clearLocalStorage();">Nueva O/ Compra</a>
	 	</label>
	</div>
</div>
		<?php if (count($_smarty_tpl->getVariable('purchases')->value)==0){?>
		<div class="title" id="form_total_purchases">
			<label for="form_total_purchases">No hay &Oacute;rdenes de Compra registradas.</label>
		</div>
		<div id="parrafo2">
		        <p>&#x2771; En esta p&aacute;gina tendr&aacute;s un listado de todas las &oacute;rdenes de compra que has emitido.</p>
		</div>
		<div id="parrafo6">
		        <p>&#x2771; &iexcl;Recuerda que luego puedes transformar cualquiera de tus &oacute;rdenes de compra en notas de gasto con s&oacute;lo un click!</p>
		</div>
		<?php }?>

<?php if (count($_smarty_tpl->getVariable('items')->value)>0){?>
<canvas id="finantial_report_3" height="500" width="700"></canvas>


	<script>
  var crosstxt = {
     inGraphDataShow : true,
      datasetFill : true,
      scaleLabel: "<<?php ?>%=value%>",
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
<?php $_smarty_tpl->tpl_vars['t'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
				<?php if ($_smarty_tpl->getVariable('t')->value>0){?>,<?php }?>
				{
					value: <?php echo $_smarty_tpl->getVariable('value_i')->value[$_smarty_tpl->getVariable('t')->value];?>
,
					color: "<?php echo $_smarty_tpl->getVariable('color_i')->value[$_smarty_tpl->getVariable('t')->value];?>
",
        				title: "<?php echo $_smarty_tpl->getVariable('label_i')->value[$_smarty_tpl->getVariable('t')->value];?>
"
				}
<?php $_smarty_tpl->tpl_vars['t'] = new Smarty_variable($_smarty_tpl->getVariable('t')->value+1, null, null);?><?php }} ?>
			]

	var myDoughnut = new Chart(document.getElementById("finantial_report_3").getContext("2d")).Doughnut(doughnutData,crosstxt);
	
	</script>

<?php }?>

<?php if (count($_smarty_tpl->getVariable('purchases')->value)==0){?>
<?php }else{ ?>
		<div class="title" id="form_total_invoices">
			<label for="form_total_invoices"><h3>Listado de &Oacute;rdenes de Compra emitidas:</h3></label>
		</div>
    	   <form method="post" id="purchas_id" action="<?php echo smarty_function_geturl(array('action'=>'index'),$_smarty_tpl);?>
">
    	    <table class="table_p">
    	  	 <tr>
			<td class="table_p_top">O/C No</td>
			<td class="table_p_top">Fecha</td>
			<td class="table_p_top">Proveedor</td>
			<td class="table_p_top">Total <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>(b&#36)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>(&#162;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>(&#128;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>(Q)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>(L)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>(C&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>(B/.)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>(&#8370;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>(S/.)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>(&#163;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>(Bs.)<?php }else{ ?>(&#128;)<?php }?></td>
			<td class="table_p_top">Vencimiento</td>
			<td class="table_p_top">Estatus</td>
		</tr>
         <?php $_smarty_tpl->tpl_vars['iva_'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['iva2_'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['purchase'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('purchases')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->key => $_smarty_tpl->tpl_vars['purchase']->value){
?>
			<tr>
				<td class="links"><span><a href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/ocompras','action'=>'fichaocompra'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('purchase')->value->getId();?>
" onclick="clearLocalStorage();"><?php if ($_smarty_tpl->getVariable('purchase')->value->profile->start_letter){?><?php echo $_smarty_tpl->getVariable('purchase')->value->profile->start_letter;?>
 -<?php }?> <?php echo $_smarty_tpl->getVariable('purchase')->value->profile->number_zero;?>
<?php echo $_smarty_tpl->getVariable('purchase')->value->purchase_number;?>
</a></span></td>
				<td><?php echo $_smarty_tpl->getVariable('purchase')->value->profile->purchase_date;?>
</td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('purchase')->value->profile->thecompany);?>
</td>
				<td><?php echo number_format($_smarty_tpl->getVariable('purchase')->value->profile->total,2,',','.');?>
</td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('valid_until')->value[$_smarty_tpl->getVariable('i')->value]);?>
</td>
				<td class="links <?php echo $_smarty_tpl->getVariable('class_i')->value[$_smarty_tpl->getVariable('i')->value];?>
"><?php echo ucfirst($_smarty_tpl->getVariable('status_i')->value[$_smarty_tpl->getVariable('i')->value]);?>
</td>
			</tr>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php $_smarty_tpl->tpl_vars['iva_'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['iva2_'] = new Smarty_variable(0, null, null);?><?php }} ?>
    	  	 	<tr>
				<td colspan="9" class="table_list" align="center"><button class="submit2" type="submit" name="download" id="download" value="download">Descargar Listado</button></td>
			</tr>
       </table>
      </form>
<?php }?>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>