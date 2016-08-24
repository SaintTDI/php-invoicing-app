<?php /* Smarty version Smarty-3.0.8, created on 2015-06-23 13:17:29
         compiled from "/var/www/app/templates/./finanzas/tesoreria/agregar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120238266555894049142208-37806671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd82e0491578d8e5578b09ffcbe4c1e1549b6f291' => 
    array (
      0 => '/var/www/app/templates/./finanzas/tesoreria/agregar.tpl',
      1 => 1423691264,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120238266555894049142208-37806671',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<?php if ($_smarty_tpl->getVariable('authenticated')->value){?><link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" /><?php }else{ ?><link rel="stylesheet" href="/css/outside.css" type="text/css" media="all" /><?php }?>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
<title>WebProAdmin</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="/css/jquery-ui.css" type="text/css" media="all" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/malsup.js"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
<script type="text/javascript" src="/js/autoNumeric.js"></script>
</head>
<body id="popup">
<form method="post" id="agregar_tes_id" action="<?php echo smarty_function_geturl(array('action'=>'agregar'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('fp')->value->account->getId();?>
" onsubmit="return onSubmitForm()">

    <?php if ($_smarty_tpl->getVariable('fp')->value->hasError()){?>
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    <?php }?>
    
	 <div class="title" id="form_total_invoices">
		 <label for="form_total_invoices"><h3>Registro de Ingreso o Egreso de Capital:</h3></label>
	</div>
    <div class="row" id="form_datepay_invoice_container_">
        <label for="form_datepay_invoice_">Fecha <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_datepay" name="datepay" value="<?php if ($_POST['datepay']){?><?php echo $_POST['datepay'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('now__')->value;?>
<?php }?>" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('datepay')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
     </div>
     
    <div class="row" id="form_waypay_">
    	<label for="form_waypay__">Forma del Ingreso:</label>
        <select class="_waypay" id="form_waypay" name="waypay">
			<option value="Efectivo" selected="selected">Efectivo</option>
			<option value="Cheque">Cheque</option>
			<option value="Transferencia">Transferencia/Dep&oacute;sito</option>
			<option value="Nota de Crédito">Nota de Cr&eacute;dito</option>
		</select>
    </div>
    
    <div class="row" id="form_referencepay_container"> 
        <label for="form_referencepay_">Referencia:</label>
        <input type="text" id="form_referencepay" name="referencepay" value="<?php echo $_POST['referencepay'];?>
" placeholder="Ej: Aporte de Capital"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('referencepay')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_amountpay_container"> 
        <label for="form_amountpay_">Total <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>ARS &#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>CLP &#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>COP &#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>DOP &#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>USD &#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>QTD Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>HNL L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>MXN &#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>PAB B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>PEN S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>UYU &#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>VEF Bs.<?php }else{ ?>&#128;<?php }?> <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_amountpay" name="amountpay" value="<?php if ($_POST['amountpay']){?><?php echo $_POST['amountpay'];?>
<?php }else{ ?>0.00<?php }?>" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Importe Total"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('amountpay')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
	<div class="row" id="form_invoice_detailpay_container">
    		<label for="form_invoice_detailpay_">Detalle:</label>
    		<textarea id="form_invoice_detailpay" name="detailpay" rows="10" cols="50" placeholder="Ej: Dep&oacute;sito en cuenta XXX-8282"><?php echo $_POST['detailpay'];?>
</textarea>
    		<?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('detailpay')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    	</div>

    
    <script type="text/javascript">
        		jQuery(window).load(function()  {
       				jQuery('#form_amountpay').autoNumeric("init");
      		});
      		
      		function onSubmitForm() {
     			var r = jQuery('#form_amountpay').autoNumeric('get');
        			
        			if (r == 0) {
        			    alert("El importe a aportes no puede ser igual a cero");
            			return false;
        			}
			}
     </script>
     

	<div class="row">
    		<button class="submit" type="submit" name="add" id="add" value="add">Agregar</button> 
	</div>
	
	<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
    	</div>

	</form>         
    </body>
</html>