<?php /* Smarty version Smarty-3.0.8, created on 2015-02-15 22:49:18
         compiled from "/var/www/app/templates/./finanzas/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142499063854e1145ec52cb0-31928890%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7d8dbe409b08f1cdf5c3e1141c19ee3f0371570' => 
    array (
      0 => '/var/www/app/templates/./finanzas/index.tpl',
      1 => 1423691263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142499063854e1145ec52cb0-31928890',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','finanzas');$_template->assign('subsection','index'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Panel de Negocio</h3></label>
</div>

<?php if (count($_smarty_tpl->getVariable('invoices_up')->value)==0&&count($_smarty_tpl->getVariable('expenses_up')->value)==0){?>
		  <div class="e_background">
			<img src="/images/preview/finanzas.jpg">
		  </div>
		  <div class="title" id="form_total_invoices">
			 <label for="form_total_invoices">No hay Facturas pendientes de cobro actualmente, ni Notas de Gastos pendientes de pago actualmente.</label>
		  </div>
		  <?php if ($_smarty_tpl->getVariable('identity')->value->first_time=='TRUE'){?>	
			<script type="text/javascript">
			    jQuery(document).ready(function() {
				        jQuery.fancybox({
				            'width': '640',
				            'height': '700',
				            'type': 'iframe',
				            'href': '/cuenta/registrocompleto'
				        });
			    });
			</script>
        <?php }?>
		  <?php if ($_smarty_tpl->getVariable('comp22')->value){?>
		  <div id="parrafo2">
		        <p>&#x2771; Aqu&iacute; podr&aacute;s ver los datos financieros m&aacute;s relevantes: flujo de caja, facturaci&oacute;n, gastos, facturas pendientes o la previsi&oacute;n de IVA.</p>
		  </div>
		  <?php }else{ ?>
		  <div id="parrafo3">
		        <p><a href="/cuenta/empresa">&#x2771; El primer paso es completar los datos de tu Empresa en la opci&oacute;n &ldquo;Cuenta" en el men&uacute; a tu izquierda, o haciendo click aqu&iacute;.</a></p>
		  </div>
		  <?php }?>
<?php }elseif(count($_smarty_tpl->getVariable('invoices_up')->value)==0){?>
	  <div class="title" id="form_total_invoices">
		 <label for="form_total_invoices">No hay Facturas pendientes de cobro actualmente.</label>
	  </div>
<?php }elseif(count($_smarty_tpl->getVariable('expenses_up')->value)==0){?>
	<div class="title" id="form_total_invoices">
		<label for="form_total_invoices">No hay Notas de Gastos pendientes de pago actualmente.</label>
	</div>
<?php }?>

<div class="boxes">
	<?php if ($_smarty_tpl->getVariable('cashflow')->value||$_smarty_tpl->getVariable('profit')->value){?>
	<div class="cashflow" id="form_total_invoices">
		<span class="imp_text">Flujo de Caja:</span>
		<span class="imp_text_2"><?php echo number_format($_smarty_tpl->getVariable('cashflow')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span>
	</div>
	   
	<div class="benefit" id="form_total_invoices4">
		<span class="imp_text">	Beneficio:</span>
		<span class="imp_text_2"><?php echo number_format($_smarty_tpl->getVariable('profit')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span>
	</div>
	<?php }?>
	
	<?php if ($_smarty_tpl->getVariable('total_i')->value||$_smarty_tpl->getVariable('total_net_i')->value||$_smarty_tpl->getVariable('total_iva_i')->value||$_smarty_tpl->getVariable('total_up_i')->value||$_smarty_tpl->getVariable('total_net_up_i')->value||$_smarty_tpl->getVariable('total_iva_up_i')->value){?>
	<div class="invoice" id="form_total_invoices">
		<p><span class="imp_text">Facturado:</span>
		<span class="imp_text_2"><?php echo number_format($_smarty_tpl->getVariable('total_i')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
		<p><span class="text">Neto:</span>
		<span class="text_2"><?php echo number_format($_smarty_tpl->getVariable('total_net_i')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif('default_currency'=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
		<p><span class="text">IVA:</span>
		<span class="text_2"><?php echo number_format($_smarty_tpl->getVariable('total_iva_i')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
	</div>
	   
	<div class="invoice_pending" id="form_total_invoices4">
		<p><span class="imp_text">Pendiente de Cobro:</span>
		<span class="imp_text_2"><?php echo number_format($_smarty_tpl->getVariable('total_up_i')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
		<p><span class="text">Neto:</span>
		<span class="text_2"><?php echo number_format($_smarty_tpl->getVariable('total_net_up_i')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
		<p><span class="text">IVA:</span>
		<span class="text_2"><?php echo number_format($_smarty_tpl->getVariable('total_iva_up_i')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
	</div>
	<?php }?>
	<?php if ($_smarty_tpl->getVariable('total_e')->value||$_smarty_tpl->getVariable('total_net_e')->value||$_smarty_tpl->getVariable('total_iva_e')->value||$_smarty_tpl->getVariable('total_up_e')->value||$_smarty_tpl->getVariable('total_net_up_e')->value||$_smarty_tpl->getVariable('total_iva_up_e')->value){?>
	<div class="expense" id="form_total_expenses">
		<p><span class="imp_text">Gastado:</span>
		<span class="imp_text_2"><?php echo number_format($_smarty_tpl->getVariable('total_e')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
		<p><span class="text">Neto:</span>
		<span class="text_2">	<?php echo number_format($_smarty_tpl->getVariable('total_net_e')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
		<p><span class="text">	IVA:</span>
		<span class="text_2"><?php echo number_format($_smarty_tpl->getVariable('total_iva_e')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
	</div>
	   
	<div class="expense_pending" id="form_total_expenses4">
		<p><span class="imp_text">Pendiente de Pago:</span>
		<span class="imp_text_2"><?php echo number_format($_smarty_tpl->getVariable('total_up_e')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
		<p><span class="text">Neto:</span>
		<span class="text_2"><?php echo number_format($_smarty_tpl->getVariable('total_net_up_e')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
		<p><span class="text">IVA:</span>
		<span class="text_2"><?php echo number_format($_smarty_tpl->getVariable('total_iva_up_e')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
	</div>
	<?php }?>
	<?php if ($_smarty_tpl->getVariable('total_iva_tri')->value||$_smarty_tpl->getVariable('total_iva_tri_inv')->value||$_smarty_tpl->getVariable('total_iva_tri_exp')->value||$_smarty_tpl->getVariable('total_iva_now')->value||$_smarty_tpl->getVariable('total_iva_now_inv')->value||$_smarty_tpl->getVariable('total_iva_now_exp')->value){?>
	<div class="iva_before" id="form_iva_total_">
		<p><span class="imp_text">IVA pendiente:</span>
		<span class="imp_text_2"><?php echo number_format($_smarty_tpl->getVariable('total_iva_tri')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
		<p><span class="text">IVA Soportado:</span>
		<span class="text_2"><?php echo number_format($_smarty_tpl->getVariable('total_iva_tri_inv')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
		<p><span class="text">IVA Repercutido:</span>
		<span class="text_2"><?php echo number_format($_smarty_tpl->getVariable('total_iva_tri_exp')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
	</div>
	
	<div class="iva_now" id="form_iva_total_">
		<p><span class="imp_text">IVA acumulado:</span>
		<span class="imp_text_2"><?php echo number_format($_smarty_tpl->getVariable('total_iva_now')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
		<p><span class="text">IVA Soportado:</span>
		<span class="text_2"><?php echo number_format($_smarty_tpl->getVariable('total_iva_now_inv')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
		<p><span class="text">IVA Repercutido:</span>
		<span class="text_2"><?php echo number_format($_smarty_tpl->getVariable('total_iva_now_exp')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></span></p>
	</div>
	<?php }?>
</div>

<?php if ($_smarty_tpl->getVariable('month_start')->value){?>

<div class="title3" id="form_total_invoices">
	<label for="form_total_invoices">Facturaci&oacute;n, Gastos e IVA <?php echo $_smarty_tpl->getVariable('year__')->value;?>
</label>
</div>

<canvas id="finantial_report_1" height="600" width="800"></canvas>


	<script>

		var barChartData = {
			labels : ["<?php if ($_smarty_tpl->getVariable('month_start')->value==1){?>Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre<?php }elseif($_smarty_tpl->getVariable('month_start')->value==2){?>Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero<?php }elseif($_smarty_tpl->getVariable('month_start')->value==3){?>Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero<?php }elseif($_smarty_tpl->getVariable('month_start')->value==4){?>Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo<?php }elseif($_smarty_tpl->getVariable('month_start')->value==5){?>Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril<?php }elseif($_smarty_tpl->getVariable('month_start')->value==6){?>Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo<?php }elseif($_smarty_tpl->getVariable('month_start')->value==7){?>Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio<?php }elseif($_smarty_tpl->getVariable('month_start')->value==8){?>Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio<?php }elseif($_smarty_tpl->getVariable('month_start')->value==9){?>Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto<?php }elseif($_smarty_tpl->getVariable('month_start')->value==10){?>Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto","Septiembre<?php }elseif($_smarty_tpl->getVariable('month_start')->value==11){?>Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre<?php }else{ ?>Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre<?php }?>"],
					
			datasets : [
				{
					fillColor : "rgba(61,170,217,1)",
					strokeColor : "rgba(43,121,154,1)",
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
				},
				{
					fillColor : "rgba(252,183,71,1)",
					strokeColor : "rgba(247,144,29,1)",
					data : [<?php if ($_smarty_tpl->getVariable('month_start')->value==1){?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==2){?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==3){?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==4){?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==5){?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==6){?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==7){?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==8){?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==9){?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==10){?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==11){?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php }else{ ?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php }?>]
				},
				{
					fillColor : "rgba(153,152,153,1)",
					strokeColor : "rgba(100,100,105,1)",
					data : [<?php if ($_smarty_tpl->getVariable('month_start')->value==1){?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==2){?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==3){?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==4){?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==5){?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==6){?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==7){?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==8){?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==9){?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==10){?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==11){?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }else{ ?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }?>]
				}
			  ]
			}
		
		var steps = 10;
		
		var max_a = Math.max(<?php if ($_smarty_tpl->getVariable('month_start')->value==1){?><?php if ($_smarty_tpl->getVariable('tot_month_1')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_1')->value;?>
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

		var max_b = Math.max(<?php if ($_smarty_tpl->getVariable('month_start')->value==1){?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==2){?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==3){?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==4){?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==5){?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==6){?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==7){?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==8){?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==9){?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==10){?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==11){?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php }else{ ?><?php if ($_smarty_tpl->getVariable('tot_month_12e')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_12e')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10e')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11e')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11e')->value;?>
<?php }else{ ?>,0<?php }?><?php }?>);
		
		var max_c = Math.max(<?php if ($_smarty_tpl->getVariable('month_start')->value==1){?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==2){?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==3){?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==4){?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==5){?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==6){?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==7){?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==8){?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==9){?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==10){?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }elseif($_smarty_tpl->getVariable('month_start')->value==11){?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }else{ ?><?php if ($_smarty_tpl->getVariable('tot_month_12iva')->value){?><?php echo $_smarty_tpl->getVariable('tot_month_12iva')->value;?>
<?php }else{ ?>0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_1iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_1iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_2iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_2iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_3iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_3iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_4iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_4iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_5iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_5iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_6iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_6iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_7iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_7iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_8iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_8iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_9iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_9iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_10iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_10iva')->value;?>
<?php }else{ ?>,0<?php }?><?php if ($_smarty_tpl->getVariable('tot_month_11iva')->value){?>,<?php echo $_smarty_tpl->getVariable('tot_month_11iva')->value;?>
<?php }else{ ?>,0<?php }?><?php }?>);

		var max_1 = Math.max(max_a,max_b,max_c);
		
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

<?php if (count($_smarty_tpl->getVariable('invoices_up')->value)>0){?>
	  <div class="ficha_table" id="form_total_invoices">
		 <label for="form_total_invoices">Pr&oacute;ximas Facturas por cobrar:</label>
	  </div>
    	   <form method="post" action="<?php echo smarty_function_geturl(array('action'=>'index'),$_smarty_tpl);?>
">
    	    <table class="table_p">
    	  	 <tr>
			<td class="table_p_top">Factura No</td>
			<td class="table_p_top">Fecha</td>
			<td class="table_p_top">Cliente</td>
			<td class="table_p_top">Total <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>(b&#36)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>(&#162;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>(&#128;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>(Q)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>(L)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>(C&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>(B/.)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>(&#8370;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>(S/.)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>(&#163;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>(Bs.)<?php }else{ ?>(&#128;)<?php }?></td>
			<td class="table_p_top">Vencimiento</td>
			<td class="table_p_top">Estatus</td>
		</tr>
         <?php $_smarty_tpl->tpl_vars['n'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['iva_2'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['iva2_2'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['invoice'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('invoices')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['invoice']->key => $_smarty_tpl->tpl_vars['invoice']->value){
?>
         <?php $_smarty_tpl->tpl_vars['id__'] = new Smarty_variable($_smarty_tpl->getVariable('invoice')->value->getId(), null, null);?>
         <?php if ($_smarty_tpl->getVariable('id__')->value==$_smarty_tpl->getVariable('invoices_up')->value[$_smarty_tpl->getVariable('n')->value]){?>
			<tr>
				<td class="links"><a href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/facturas','action'=>'fichafactura'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('invoice')->value->getId();?>
"><?php if ($_smarty_tpl->getVariable('invoice')->value->profile->start_letter){?><?php echo $_smarty_tpl->getVariable('invoice')->value->profile->start_letter;?>
 -<?php }?> <?php echo $_smarty_tpl->getVariable('invoice')->value->profile->number_zero;?>
<?php echo $_smarty_tpl->getVariable('invoice')->value->invoice_number;?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('invoice')->value->profile->invoice_date;?>
</td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('invoice')->value->profile->thecompany);?>
</td>
				<td><?php echo number_format($_smarty_tpl->getVariable('invoice')->value->profile->total,2,',','.');?>
</td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('valid_until_up')->value[$_smarty_tpl->getVariable('i')->value]);?>
</td>
				<?php if ($_smarty_tpl->getVariable('invoice')->value->profile->amountpay){?><td class="links <?php echo $_smarty_tpl->getVariable('class_ii')->value[$_smarty_tpl->getVariable('i')->value];?>
"><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>class="fancybox fancybox.iframe" href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/facturas','action'=>'editarpago'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('invoice')->value->getId();?>
"<?php }?>><?php echo ucfirst($_smarty_tpl->getVariable('status_ii')->value[$_smarty_tpl->getVariable('i')->value]);?>
</a></td><?php }else{ ?><td class="links <?php echo $_smarty_tpl->getVariable('class_ii')->value[$_smarty_tpl->getVariable('i')->value];?>
"><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>class="fancybox fancybox.iframe" href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/facturas','action'=>'pagofactura'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('invoice')->value->getId();?>
"<?php }?>><?php echo ucfirst($_smarty_tpl->getVariable('status_ii')->value[$_smarty_tpl->getVariable('i')->value]);?>
</a></td><?php }?>
			</tr>
        <?php $_smarty_tpl->tpl_vars['n'] = new Smarty_variable($_smarty_tpl->getVariable('n')->value+1, null, null);?><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php $_smarty_tpl->tpl_vars['iva_2'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['iva2_2'] = new Smarty_variable(0, null, null);?>
        <?php }?>
        <?php }} ?>
       </table>
      </form>
<?php }?>

<?php if (count($_smarty_tpl->getVariable('expenses_up')->value)>0){?>
	  <div class="ficha_table" id="form_total_invoices">
		 <label for="form_total_invoices">Pr&oacute;ximas Notas de Gasto por pagar:</label>
	  </div>

    	   <form method="post" action="<?php echo smarty_function_geturl(array('action'=>'index'),$_smarty_tpl);?>
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
         <?php $_smarty_tpl->tpl_vars['id_'] = new Smarty_variable($_smarty_tpl->getVariable('expense')->value->getId(), null, null);?>
         <?php if ($_smarty_tpl->getVariable('id_')->value==$_smarty_tpl->getVariable('expenses_up')->value[$_smarty_tpl->getVariable('m')->value]){?>
			<tr>
				<td class="links"><a href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/gastos','action'=>'fichagasto'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('expense')->value->getId();?>
"><?php if ($_smarty_tpl->getVariable('expense')->value->profile->start_letter){?><?php echo $_smarty_tpl->getVariable('expense')->value->profile->start_letter;?>
 -<?php }?> <?php echo $_smarty_tpl->getVariable('expense')->value->profile->number_zero;?>
<?php echo $_smarty_tpl->getVariable('expense')->value->expense_number;?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('expense')->value->profile->expense_date;?>
</td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('expense')->value->profile->thecompany);?>
</td>
				<td><?php echo number_format($_smarty_tpl->getVariable('expense')->value->profile->total,2,',','.');?>
</td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('valid_until_up_e')->value[$_smarty_tpl->getVariable('ii')->value]);?>
</td>
				<?php if ($_smarty_tpl->getVariable('expense')->value->profile->amountpay){?><td class="links <?php echo $_smarty_tpl->getVariable('class_ii_e')->value[$_smarty_tpl->getVariable('ii')->value];?>
"><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>class="fancybox fancybox.iframe" href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/gastos','action'=>'editarpago'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('expense')->value->getId();?>
"<?php }?>><?php echo ucfirst($_smarty_tpl->getVariable('status_ii_e')->value[$_smarty_tpl->getVariable('ii')->value]);?>
</a></td><?php }else{ ?><td class="links <?php echo $_smarty_tpl->getVariable('class_ii_e')->value[$_smarty_tpl->getVariable('ii')->value];?>
"><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>class="fancybox fancybox.iframe" href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/gastos','action'=>'pagogasto'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('expense')->value->getId();?>
"<?php }?>><?php echo ucfirst($_smarty_tpl->getVariable('status_ii_e')->value[$_smarty_tpl->getVariable('ii')->value]);?>
</a></td><?php }?>
			</tr>
        <?php $_smarty_tpl->tpl_vars['m'] = new Smarty_variable($_smarty_tpl->getVariable('m')->value+1, null, null);?><?php $_smarty_tpl->tpl_vars['ii'] = new Smarty_variable($_smarty_tpl->getVariable('ii')->value+1, null, null);?><?php $_smarty_tpl->tpl_vars['iva_2'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['iva2_2'] = new Smarty_variable(0, null, null);?>
       <?php }?>
       <?php }} ?>
       </table>
      </form>
<?php }?>


<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>