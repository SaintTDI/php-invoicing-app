<?php /* Smarty version Smarty-3.0.8, created on 2015-02-23 01:52:52
         compiled from "/var/www/app/templates/./herramientas/gastos/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58769436054ea79e4b4f241-20134488%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27e57bfcd6a35a07fc469afe3c11eeaa5891a945' => 
    array (
      0 => '/var/www/app/templates/./herramientas/gastos/index.tpl',
      1 => 1423691292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58769436054ea79e4b4f241-20134488',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','gastos'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="boxes3">
	<div class="title2" id="form_total_expenses">
		<label for="form_total_expenses"><h3>Gastos</h3></label>
	</div>
	
	<div class="boton_top">
	        <label for="bt_">
	       	 	<a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/gastos','action'=>'crear'),$_smarty_tpl);?>
"<?php }?> onclick="clearLocalStorage();">Nuevo Gasto</a>
			</label>
	</div>
</div>

		<?php if (count($_smarty_tpl->getVariable('expenses')->value)==0){?>
		<div class="e_background">
			<img src="/images/preview/gastos.jpg">
		</div>
		<div class="title" id="form_total_expenses">
			<label for="form_total_invoices">No hay Gastos registrados.</label>
		</div>
		<div id="parrafo5">
		        <p>&#x2771; En esta p&aacute;gina tendr&aacute;s un listado de todas las facturas que has recibido y el estatus de cada una de ellas.</p>
		</div>
		<?php }?>

<?php if ($_smarty_tpl->getVariable('total_i')->value||$_smarty_tpl->getVariable('total_net_i')->value||$_smarty_tpl->getVariable('total_iva_i')->value||$_smarty_tpl->getVariable('total_up_i')->value||$_smarty_tpl->getVariable('total_net_up_i')->value||$_smarty_tpl->getVariable('total_iva_up_i')->value){?>
<div class="boxes2">
   <div class="invoice" id="form_total_expenses">
    		<p><span class="imp_text">Gastado:</span>
    		<span class="imp_text_2"><?php echo number_format($_smarty_tpl->getVariable('total_i')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?> </span></p>
    		<p><span class="text">Neto:</span>
    		<span class="text_2"><?php echo number_format($_smarty_tpl->getVariable('total_net_i')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?> </span></p>
    		<p><span class="text">IVA:</span>
    		<span class="text_2"><?php echo number_format($_smarty_tpl->getVariable('total_iva_i')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?> </span></p>
   </div>
   <div class="invoice_pending" id="form_total_expenses4">
    		<p><span class="imp_text">Pendiente de Pago:</span>
    		<span class="imp_text_2"><?php echo number_format($_smarty_tpl->getVariable('total_up_i')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?> </span></p>
    		<p><span class="text">Neto:</span>
    		<span class="text_2"><?php echo number_format($_smarty_tpl->getVariable('total_net_up_i')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?> </span></p>
    		<p><span class="text">IVA:</span>
    		<span class="text_2"><?php echo number_format($_smarty_tpl->getVariable('total_iva_up_i')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?> </span></p>
   </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->getVariable('month_start')->value){?>
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Historial de Gastos <?php echo $_smarty_tpl->getVariable('year__')->value;?>
</h3></label>
</div>

<canvas id="finantial_report_1" height="600" width="800"></canvas>


	<script>

		var barChartData = {
			labels : ["<?php if ($_smarty_tpl->getVariable('month_start')->value==1){?>Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre<?php }elseif($_smarty_tpl->getVariable('month_start')->value==2){?>Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero<?php }elseif($_smarty_tpl->getVariable('month_start')->value==3){?>Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero<?php }elseif($_smarty_tpl->getVariable('month_start')->value==4){?>Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo<?php }elseif($_smarty_tpl->getVariable('month_start')->value==5){?>Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril<?php }elseif($_smarty_tpl->getVariable('month_start')->value==6){?>Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo<?php }elseif($_smarty_tpl->getVariable('month_start')->value==7){?>Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio<?php }elseif($_smarty_tpl->getVariable('month_start')->value==8){?>Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio<?php }elseif($_smarty_tpl->getVariable('month_start')->value==9){?>Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto<?php }elseif($_smarty_tpl->getVariable('month_start')->value==10){?>Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto","Septiembre<?php }elseif($_smarty_tpl->getVariable('month_start')->value==11){?>Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre<?php }else{ ?>Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre<?php }?>"],
					
			datasets : [
				{
					fillColor : "rgba(252,183,71,1)",
					strokeColor : "rgba(247,144,29,1)",
					data : [<?php if ($_smarty_tpl->getVariable('month_start')->value==1){?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==2){?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==3){?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==4){?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==5){?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==6){?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==7){?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==8){?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==9){?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==10){?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==11){?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php }else{ ?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php }?>]
				}
			]
			
		}
		
	var steps = 10;
		
	var max_1 = Math.max(<?php if ($_smarty_tpl->getVariable('month_start')->value==1){?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==2){?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==3){?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==4){?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==5){?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==6){?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==7){?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==8){?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==9){?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==10){?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==11){?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php }else{ ?><?php if ($_smarty_tpl->getVariable('tot_month_12')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_12')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11')->value;?>
<?php }else{ ?>,0<?php }?><?php }?>);
	
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

<?php }?>

<?php if (count($_smarty_tpl->getVariable('providers')->value)>0){?>
<canvas id="finantial_report_2" height="500" width="700"></canvas>


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
      graphTitle : "Proveedores",
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
<?php $_smarty_tpl->tpl_vars['p'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['client'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('providers')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['client']->key => $_smarty_tpl->tpl_vars['client']->value){
?>
				<?php if ($_smarty_tpl->getVariable('p')->value>0){?>,<?php }?>
				{
					value: <?php echo $_smarty_tpl->getVariable('value_c')->value[$_smarty_tpl->getVariable('p')->value];?>
,
					color: "<?php echo $_smarty_tpl->getVariable('color_c')->value[$_smarty_tpl->getVariable('p')->value];?>
",
        				title: "<?php echo $_smarty_tpl->getVariable('label_c')->value[$_smarty_tpl->getVariable('p')->value];?>
"
				}
<?php $_smarty_tpl->tpl_vars['p'] = new Smarty_variable($_smarty_tpl->getVariable('p')->value+1, null, null);?><?php }} ?>
			]

	var myDoughnut = new Chart(document.getElementById("finantial_report_2").getContext("2d")).Doughnut(doughnutData,crosstxt);
	
	</script>

<?php }?>

<?php if (count($_smarty_tpl->getVariable('items')->value)>0){?>
<canvas id="finantial_report_3" height="500" width="700"></canvas>


	<script>

	  var crosstxt2 = {
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
      graphTitle : "Categor\u00edas",
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
			];

	var myDoughnut = new Chart(document.getElementById("finantial_report_3").getContext("2d")).Doughnut(doughnutData,crosstxt2);
	
	</script>

<?php }?>

<?php if (count($_smarty_tpl->getVariable('expenses_up')->value)==0){?>
<?php }else{ ?>
	<div class="title" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Pr&oacute;ximos Gastos pendientes de pago:</h3></label>
	</div>

    	   <form method="post" id="expense_id" action="<?php echo smarty_function_geturl(array('action'=>'index'),$_smarty_tpl);?>
">
    	    <table class="table_p">
    	  	 <tr>
			<td class="table_p_top">N&uacute;mero</td>
			<td class="table_p_top">Fecha</td>
			<td class="table_p_top">Proveedor</td>
			<td class="table_p_top">Total <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>(b&#36)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>(&#162;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>(&#128;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>(Q)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>(L)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>(C&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>(B/.)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>(&#8370;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>(S/.)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>(&#163;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>(Bs.)<?php }else{ ?>(&#128;)<?php }?></td>
			<td class="table_p_top">Vencimiento</td>
			<td class="table_p_top">Estatus</td>
		</tr>
         <?php $_smarty_tpl->tpl_vars['m'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['iva_2'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['iva2_2'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['ii'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['expense'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('expenses')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['expense']->key => $_smarty_tpl->tpl_vars['expense']->value){
?>
         <?php $_smarty_tpl->tpl_vars['id__'] = new Smarty_variable($_smarty_tpl->getVariable('expense')->value->getId(), null, null);?>
         <?php if ($_smarty_tpl->getVariable('id__')->value==$_smarty_tpl->getVariable('expenses_up')->value[$_smarty_tpl->getVariable('m')->value]){?>
			<tr>
				<td class="links"><span><a href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/gastos','action'=>'fichagasto'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('expense')->value->getId();?>
" onclick="clearLocalStorage();"><?php if ($_smarty_tpl->getVariable('expense')->value->profile->start_letter){?><?php echo $_smarty_tpl->getVariable('expense')->value->profile->start_letter;?>
 -<?php }?> <?php echo $_smarty_tpl->getVariable('expense')->value->profile->number_zero;?>
<?php echo $_smarty_tpl->getVariable('expense')->value->expense_number;?>
</a></span></td>
				<td><?php echo $_smarty_tpl->getVariable('expense')->value->profile->expense_date;?>
</td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('expense')->value->profile->thecompany);?>
</td>
				<td><?php echo number_format($_smarty_tpl->getVariable('expense')->value->profile->total,2,',','.');?>
</td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('valid_until_up')->value[$_smarty_tpl->getVariable('ii')->value]);?>
</td>
				<?php if ($_smarty_tpl->getVariable('expense')->value->profile->amountpay){?><td class="links <?php echo $_smarty_tpl->getVariable('class_ii')->value[$_smarty_tpl->getVariable('ii')->value];?>
"><span><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>class="fancybox fancybox.iframe" href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/gastos','action'=>'editarpago'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('expense')->value->getId();?>
"<?php }?> onclick="clearLocalStorage();"><?php echo ucfirst($_smarty_tpl->getVariable('status_ii')->value[$_smarty_tpl->getVariable('ii')->value]);?>
</a></span></td><?php }else{ ?> <td class="links <?php echo $_smarty_tpl->getVariable('class_ii')->value[$_smarty_tpl->getVariable('ii')->value];?>
"><span> <a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>class="fancybox fancybox.iframe" href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/gastos','action'=>'pagogasto'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('expense')->value->getId();?>
"<?php }?> onclick="clearLocalStorage();"><?php echo ucfirst($_smarty_tpl->getVariable('status_ii')->value[$_smarty_tpl->getVariable('ii')->value]);?>
</a></span></td><?php }?>
			</tr>
        <?php $_smarty_tpl->tpl_vars['m'] = new Smarty_variable($_smarty_tpl->getVariable('m')->value+1, null, null);?><?php $_smarty_tpl->tpl_vars['ii'] = new Smarty_variable($_smarty_tpl->getVariable('ii')->value+1, null, null);?><?php $_smarty_tpl->tpl_vars['iva_2'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['iva2_2'] = new Smarty_variable(0, null, null);?>
       <?php }?>
       <?php }} ?>
       </table>
      </form>
<?php }?>

<?php if (count($_smarty_tpl->getVariable('expenses')->value)==0){?>
<?php }else{ ?>
	<div class="title" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Listado de Notas de Gastos (facturas recibidas): </h3></label>
	</div>
    	   <form method="post" id="expense_id2" action="<?php echo smarty_function_geturl(array('action'=>'index'),$_smarty_tpl);?>
">
    	    <table class="table_p">
    	  	 <tr>
			<td class="table_p_top">N&uacute;mero</td>
			<td class="table_p_top">Fecha</td>
			<td class="table_p_top">Proveedor</td>
			<td class="table_p_top">Total <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>(b&#36)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>(&#162;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>(&#128;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>(Q)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>(L)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>(C&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>(B/.)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>(&#8370;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>(S/.)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>(&#163;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>(Bs.)<?php }else{ ?>(&#128;)<?php }?></td>
			<td class="table_p_top">Vencimiento</td>
			<td class="table_p_top">Estatus</td>
		</tr>
         <?php $_smarty_tpl->tpl_vars['iva_'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['iva2_'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['expense'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('expenses')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['expense']->key => $_smarty_tpl->tpl_vars['expense']->value){
?>
			<tr>
				<td class="links"><span><a href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/gastos','action'=>'fichagasto'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('expense')->value->getId();?>
" onclick="clearLocalStorage();"><?php if ($_smarty_tpl->getVariable('expense')->value->profile->start_letter){?><?php echo $_smarty_tpl->getVariable('expense')->value->profile->start_letter;?>
 -<?php }?> <?php echo $_smarty_tpl->getVariable('expense')->value->profile->number_zero;?>
<?php echo $_smarty_tpl->getVariable('expense')->value->expense_number;?>
</a></span></td>
				<td><?php echo $_smarty_tpl->getVariable('expense')->value->profile->expense_date;?>
</td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('expense')->value->profile->thecompany);?>
</td>
				<td><?php echo number_format($_smarty_tpl->getVariable('expense')->value->profile->total,2,',','.');?>
</td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('valid_until')->value[$_smarty_tpl->getVariable('i')->value]);?>
</td>
				<?php if ($_smarty_tpl->getVariable('expense')->value->profile->amountpay){?><td class="links <?php echo $_smarty_tpl->getVariable('class_i')->value[$_smarty_tpl->getVariable('i')->value];?>
"><span><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>class="fancybox fancybox.iframe "fancybox fancybox.iframe"" href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/gastos','action'=>'editarpago'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('expense')->value->getId();?>
"<?php }?> onclick="clearLocalStorage();"><?php echo ucfirst($_smarty_tpl->getVariable('status_i')->value[$_smarty_tpl->getVariable('i')->value]);?>
</a></span></td><?php }else{ ?><td class="links <?php echo $_smarty_tpl->getVariable('class_i')->value[$_smarty_tpl->getVariable('i')->value];?>
"><span><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>class="fancybox fancybox.iframe" href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/gastos','action'=>'pagogasto'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('expense')->value->getId();?>
"<?php }?> onclick="clearLocalStorage();"><?php echo ucfirst($_smarty_tpl->getVariable('status_i')->value[$_smarty_tpl->getVariable('i')->value]);?>
</a></span></td><?php }?>
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