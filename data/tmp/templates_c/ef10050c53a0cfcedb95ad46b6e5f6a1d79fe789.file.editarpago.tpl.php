<?php /* Smarty version Smarty-3.0.8, created on 2015-03-18 16:28:18
         compiled from "/var/www/app/templates/./herramientas/gastos/editarpago.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164848672555099992d5bcf6-72643195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef10050c53a0cfcedb95ad46b6e5f6a1d79fe789' => 
    array (
      0 => '/var/www/app/templates/./herramientas/gastos/editarpago.tpl',
      1 => 1423691290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164848672555099992d5bcf6-72643195',
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
<form method="post" id="expens_id" action="<?php echo smarty_function_geturl(array('action'=>'editarpago'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('fp')->value->expense->getId();?>
" onsubmit="onSubmitForm()">

	<?php if ($_GET['command']=='cerrar'){?>
	    
	    <script type="text/javascript">
	        		jQuery(window).load(function()  {
				    parent.jQuery.fancybox.close(); 
	      		});
	     </script>
	     
     <?php }?>

    <?php if ($_smarty_tpl->getVariable('fp')->value->hasError()){?>
        		<div class="error">
            		Por favor revisa los campos resaltados.
        		</div>
    <?php }else{ ?>
    		<?php if ($_GET['submitted']){?>
			 
			 <script type="text/javascript">
			  jQuery(window).load(function()  {
				parent.jQuery.fancybox.close(); 
			 });
			 </script>
			 
        	<?php }?>
    <?php }?>
    
    <?php $_smarty_tpl->tpl_vars['amountpay'] = new Smarty_variable(0, null, 3);?>
    <?php  $_smarty_tpl->tpl_vars['expense3'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cashes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['expense3']->key => $_smarty_tpl->tpl_vars['expense3']->value){
?>
    <?php $_smarty_tpl->tpl_vars['amountpay'] = new Smarty_variable($_smarty_tpl->getVariable('amountpay')->value+$_smarty_tpl->getVariable('expense3')->value->profile->amountpay, null, 3);?>
    <?php }} ?>
    
    <div class="form_row_r" id="form_expense_">
        		<span>Vencimiento: <?php echo $_smarty_tpl->getVariable('valid_until')->value;?>
</span>
        		<span>N&ordm; Gasto: <?php echo $_smarty_tpl->getVariable('expense')->value->expense_number;?>
</span>
        		<span>Emisi&oacute;n: <?php echo $_smarty_tpl->getVariable('expense')->value->profile->expense_date;?>
</span>
			<label for="form_expense_client">&nbsp;</label>
			<?php  $_smarty_tpl->tpl_vars['client_'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('client')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['client_']->key => $_smarty_tpl->tpl_vars['client_']->value){
?><?php if ($_smarty_tpl->getVariable('client_')->value->profile->thecompany!=''){?>
			<span>Proveedor: <?php echo $_smarty_tpl->getVariable('client_')->value->profile->thecompany;?>
</span>
			<?php }?><?php }} ?>
			<label>Total: <?php echo number_format($_smarty_tpl->getVariable('expense')->value->profile->total,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Argentino'){?>ARS &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Chileno'){?>CLP &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Colombiano'){?>COP &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Dominicano'){?>DOP &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Dolar'){?>USD &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Quetzal'){?>QTD Q<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Lempira'){?>HNL L<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Mexicano'){?>MXN &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Balboa'){?>PAB B/.<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Nuevo Sol'){?>PEN S/.<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Uruguayo'){?>UYU &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Bolivar'){?>VEF Bs.<?php }else{ ?>&#128;<?php }?></label>
	    </div>
	</div>

    <div class="row" id="form_datepay_expense_container_">
        <label for="form_datepay_expense_">Fecha <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_datepay" name="datepay" value="<?php echo $_smarty_tpl->getVariable('ts_date')->value;?>
" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('datepay')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
     </div>
     
    <div class="row" id="form_waypay_">
    	<label for="form_waypay__">Forma de Pago:</label>
        <select class="_waypay" id="form_waypay" name="waypay" >
			<option value="Efectivo" <?php if ($_smarty_tpl->getVariable('fp')->value->waypay=='Efectivo'){?> selected="selected" <?php }?>>Efectivo</option>
			<option value="Cheque" <?php if ($_smarty_tpl->getVariable('fp')->value->waypay=='Cheque'){?> selected="selected" <?php }?>>Cheque</option>
			<option value="Transferencia" <?php if ($_smarty_tpl->getVariable('fp')->value->waypay=='Transferencia'){?> selected="selected" <?php }?>>Transferencia/Dep&oacute;sito</option>
			<option value="Nota de Crédito" <?php if ($_smarty_tpl->getVariable('fp')->value->waypay=='Nota de Crédito'){?> selected="selected" <?php }?>>Nota de Cr&eacute;dito</option>
		</select>
    </div>
    
    <div class="row" id="form_referencepay_container"> 
        <label for="form_referencepay_">Referencia:</label>
        <input type="text" id="form_referencepay" name="referencepay" value="" placeholder="Ej: Factura 282"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('referencepay')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_amountpay_container"> 
        <label for="form_amountpay_">Importe <?php if ($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Argentino'){?>ARS &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Chileno'){?>CLP &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Colombiano'){?>COP &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Dominicano'){?>DOP &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Dolar'){?>USD &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Quetzal'){?>QTD Q<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Lempira'){?>HNL L<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Mexicano'){?>MXN &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Balboa'){?>PAB B/.<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Nuevo Sol'){?>PEN S/.<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Uruguayo'){?>UYU &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Bolivar'){?>VEF Bs.<?php }else{ ?>&#128;<?php }?> <strong>&#x28;&#x2A;&#x29;</strong>:</label><?php $_smarty_tpl->tpl_vars['totalpay'] = new Smarty_variable($_smarty_tpl->getVariable('expense')->value->profile->total-$_smarty_tpl->getVariable('amountpay')->value, null, 3);?>
        <input type="text" id="form_amountpay" name="amountpay" value="<?php echo $_smarty_tpl->getVariable('totalpay')->value;?>
" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Importe a pagar"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('amountpay')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
	<div class="row" id="form_expense_detailpay_container">
    		<label for="form_expense_detailpay_">Detalle:</label>
    		<textarea id="form_expense_detailpay" name="detailpay" rows="10" cols="50" placeholder="Ej: Dep&oacute;sito en cuenta XXX-8282"></textarea>
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
        				alert("El importe a pagar no puede ser igual a cero");
            			return false;
            			
        			}
			}
     </script>
     

	<div class="row">
    		<button class="submit" type="submit" name="editar" id="editar" value="editar" >Editar</button> 
	</div>

	<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
    	</div>

	</form>
	
	<?php if ($_smarty_tpl->getVariable('cashes')->value){?>
    <div class="form_row_r" id="form_expense_">
    			<label for="form_expense_client">&nbsp;</label>
        		<span>Pagos Realizados</span>
			<?php  $_smarty_tpl->tpl_vars['expense2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cashes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['expense2']->key => $_smarty_tpl->tpl_vars['expense2']->value){
?>
			    <form method="post" id="expense_id2" action="<?php echo smarty_function_geturl(array('action'=>'editarpago'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('fp')->value->expense->getId();?>
">
        			<label for="form_datepay_expense_">Fecha: <?php echo $_smarty_tpl->getVariable('expense2')->value->profile->datepay;?>
</label>
				<label>Total: <?php echo number_format($_smarty_tpl->getVariable('expense2')->value->profile->amountpay,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Argentino'){?>ARS &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Chileno'){?>CLP &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Colombiano'){?>COP &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Dominicano'){?>DOP &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Dolar'){?>USD &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Quetzal'){?>QTD Q<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Lempira'){?>HNL L<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Mexicano'){?>MXN &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Balboa'){?>PAB B/.<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Nuevo Sol'){?>PEN S/.<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Peso Uruguayo'){?>UYU &#36;<?php }elseif($_smarty_tpl->getVariable('expense')->value->profile->currency=='Bolivar'){?>VEF Bs.<?php }else{ ?>&#128;<?php }?></label>
				<?php if ($_smarty_tpl->getVariable('expense2')->value->profile->waypay){?><label for="form_waypay">Forma de Pago: <?php echo $_smarty_tpl->getVariable('expense2')->value->profile->waypay;?>
</label><?php }?>
				<?php if ($_smarty_tpl->getVariable('expense2')->value->profile->referencepay){?><label for="form_datepay_expense_">Referencia: <?php echo $_smarty_tpl->getVariable('expense2')->value->profile->referencepay;?>
</label><?php }?>
				<?php if ($_smarty_tpl->getVariable('expense2')->value->profile->detailpay){?><label for="form_datepay_expense_">Detalle: <?php echo $_smarty_tpl->getVariable('expense2')->value->profile->detailpay;?>
</label><?php }?>
				<button class="submit3" type="submit" id="delete" name="delete" value="delete"/>X</button></li><input type="hidden" name="cash_id"  value="<?php echo $_smarty_tpl->getVariable('expense2')->value->getId();?>
" />
				</form>
				<br>
			<?php }} ?>
	    </div>
	</div>
	<?php }?>       
    </body>
</html>