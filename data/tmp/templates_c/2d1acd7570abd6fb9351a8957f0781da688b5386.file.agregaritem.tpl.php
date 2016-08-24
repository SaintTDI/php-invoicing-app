<?php /* Smarty version Smarty-3.0.8, created on 2015-03-18 16:38:10
         compiled from "/var/www/app/templates/./herramientas/gastos/agregaritem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186615184755099be207e5a4-37099133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d1acd7570abd6fb9351a8957f0781da688b5386' => 
    array (
      0 => '/var/www/app/templates/./herramientas/gastos/agregaritem.tpl',
      1 => 1423691286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186615184755099be207e5a4-37099133',
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
<script type="text/javascript" src="/js/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="/js/autoNumeric.js"></script>
</head>
<body id="popup">
<form method="post" id="expense_id" action="<?php echo smarty_function_geturl(array('action'=>'agregaritem'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('fp')->value->item->getId();?>
">

    <?php if ($_smarty_tpl->getVariable('fp')->value->hasError()){?>
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    <?php }?>

    <div class="row" id="form_code_item_container_">
        <label for="form_code_item_">C&oacute;digo:</label>
        <input type="text" id="form_code_item" name="code" value="<?php echo $_POST['code'];?>
" placeholder="Ej: 123"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('code')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
     </div>
    
	<div class="row" id="form_item_detail_container">
    		<label for="form_item_detail_">Nombre <strong>&#x28;&#x2A;&#x29;</strong>:</label>
    		<textarea id="form_item_detail" name="detail" rows="10" cols="50" placeholder="Ej: Servicio de Internet"><?php echo $_POST['detail'];?>
</textarea>
    		<?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('detail')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    		
        		
        		<script type="text/javascript"> 	
			jQuery(window).load(function(){
			var texto = "";
  			var products = [
    			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('productslist3')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>{ value: '<?php echo $_smarty_tpl->getVariable('name_')->value[$_smarty_tpl->getVariable('i')->value];?>
', name: '<?php echo $_smarty_tpl->getVariable('product_')->value[$_smarty_tpl->getVariable('i')->value];?>
', price: '<?php echo $_smarty_tpl->getVariable('price_')->value[$_smarty_tpl->getVariable('i')->value];?>
', unit: '<?php echo $_smarty_tpl->getVariable('unit_')->value[$_smarty_tpl->getVariable('i')->value];?>
', iva: '<?php echo $_smarty_tpl->getVariable('iva_')->value[$_smarty_tpl->getVariable('i')->value];?>
', iva2: '<?php echo $_smarty_tpl->getVariable('iva2_')->value[$_smarty_tpl->getVariable('i')->value];?>
', iva_name: '<?php echo $_smarty_tpl->getVariable('iva2_name_')->value[$_smarty_tpl->getVariable('i')->value];?>
', currency: '<?php echo $_smarty_tpl->getVariable('currency_')->value[$_smarty_tpl->getVariable('i')->value];?>
', data: '<?php echo $_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('i')->value];?>
'},<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php }} ?><?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('productslist2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>{ value: '<?php echo $_smarty_tpl->getVariable('name_')->value[$_smarty_tpl->getVariable('i')->value];?>
', name: '<?php echo $_smarty_tpl->getVariable('product_')->value[$_smarty_tpl->getVariable('i')->value];?>
', price: '<?php echo $_smarty_tpl->getVariable('price_')->value[$_smarty_tpl->getVariable('i')->value];?>
', unit: '<?php echo $_smarty_tpl->getVariable('unit_')->value[$_smarty_tpl->getVariable('i')->value];?>
', iva: '<?php echo $_smarty_tpl->getVariable('iva_')->value[$_smarty_tpl->getVariable('i')->value];?>
', iva2: '<?php echo $_smarty_tpl->getVariable('iva2_')->value[$_smarty_tpl->getVariable('i')->value];?>
', iva_name: '<?php echo $_smarty_tpl->getVariable('iva2_name_')->value[$_smarty_tpl->getVariable('i')->value];?>
', currency: '<?php echo $_smarty_tpl->getVariable('currency_')->value[$_smarty_tpl->getVariable('i')->value];?>
', data: '<?php echo $_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('i')->value];?>
'},<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php }} ?><?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('productslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>{ value: '<?php echo $_smarty_tpl->getVariable('name_')->value[$_smarty_tpl->getVariable('i')->value];?>
', name: '<?php echo $_smarty_tpl->getVariable('product_')->value[$_smarty_tpl->getVariable('i')->value];?>
', price: '<?php echo $_smarty_tpl->getVariable('price_')->value[$_smarty_tpl->getVariable('i')->value];?>
', unit: '<?php echo $_smarty_tpl->getVariable('unit_')->value[$_smarty_tpl->getVariable('i')->value];?>
', iva: '<?php echo $_smarty_tpl->getVariable('iva_')->value[$_smarty_tpl->getVariable('i')->value];?>
', iva2: '<?php echo $_smarty_tpl->getVariable('iva2_')->value[$_smarty_tpl->getVariable('i')->value];?>
', iva_name: '<?php echo $_smarty_tpl->getVariable('iva2_name_')->value[$_smarty_tpl->getVariable('i')->value];?>
', currency: '<?php echo $_smarty_tpl->getVariable('currency_')->value[$_smarty_tpl->getVariable('i')->value];?>
', data: '<?php echo $_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('i')->value];?>
'},<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php }} ?>
  			];
  
  					// setup autocomplete function pulling from products[] array
  						jQuery('#form_item_detail').autocomplete({
    						lookup: products,
    						onSelect: function (suggestion) {
    						if (suggestion.value && suggestion.data){
    							jQuery('#form_code_item').val(suggestion.name);
      						jQuery('#form_product_id').val(suggestion.data);
      						jQuery('#form_item_detail').val(suggestion.value);
      						jQuery('#form_unit_cost').val(suggestion.price);
      						jQuery('#form_product_unit').val(suggestion.unit);
      						jQuery('#form_iva').val(suggestion.iva);
      						jQuery('#form_iva2').val(suggestion.iva2);
      						jQuery('#form_iva2_name').val(suggestion.iva_name);
      						jQuery('#form_currency').val(suggestion.currency);
      						if (suggestion.currency == 'Peso Argentino') {
      							var texto = '&#36;';
      						}
      						else if (suggestion.currency == 'Peso Boliviano') {
      							var texto = 'b&#36';
      						}
      						else if (suggestion.currency == 'Peso Chileno') {
      							var texto = '&#36;';
      						}
      						else if (suggestion.currency == 'Peso Colombiano') {
      							var texto = '&#36;';
      						}
      						else if (suggestion.currency == 'Colon') {
      							var texto = '&#162;';
      						}
      						else if (suggestion.currency == 'Peso Dominicano') {
      							var texto = '&#36;';
      						}
      						else if (suggestion.currency == 'Dolar') {
      							var texto = '&#36;';
      						}
      						else if (suggestion.currency == 'Euro') {
      							var texto = '&#128;';
      						}
      						else if (suggestion.currency == 'Quetzal') {
      							var texto = 'Q';
      						}
      						else if (suggestion.currency == 'Lempira') {
      							var texto = 'L';
      						}
      						else if (suggestion.currency == 'Peso Mexicano') {
      							var texto = '&#36;';
      						}
      						else if (suggestion.currency == 'Cordoba') {
      							var texto = 'C&#36;';
      						}
      						else if (suggestion.currency == 'Balboa') {
      							var texto = 'B/.';
      						}
      						else if (suggestion.currency == 'Guarani') {
      							var texto = '&#8370;';
      						}
      						else if (suggestion.currency == 'Nuevo Sol') {
      							var texto = 'S/.';
      						}
      						else if (suggestion.currency == 'Libra') {
      							var texto = '&#163;';
      						}
      						else if (suggestion.currency == 'Peso Uruguayo') {
      							var texto = '&#36;';
      						}
      						else if (suggestion.currency == 'Bolivar') {
      							var texto = 'Bs.';
      						}
      						else {
      							var texto = '&#128;';
      						}
      						var thehtml3 = '(' + texto + ')';
      						jQuery('#outputcontent3').html(thehtml3);
      					} 
    					}
  				});
			});
        		</script>
        		
    		
    	</div>
    	
    <div class="row" id="form_product_unit_container">
    	<label for="form_product_unit">Unidad del item:</label>
        <select id="form_product_unit" name="product_unit"/>
       		<option value="" <?php if ($_POST['product_unit']==''){?> selected="selected" <?php }?>>Seleccione...</option>
			<option value="unidad" <?php if ($_POST['product_unit']=='unidad'){?> selected="selected" <?php }?>>Unidad(es) (1)</option>
			<option value="decena" <?php if ($_POST['product_unit']=='decena'){?> selected="selected" <?php }?>>Decena(s) (10)</option>
        		<option value="docena" <?php if ($_POST['product_unit']=='docuena'){?> selected="selected" <?php }?>>Docena(s) (12)</option>
        		<option value="centena" <?php if ($_POST['product_unit']=='centena'){?> selected="selected" <?php }?>>Centena(s) (100)</option>
        		<option value="metro" <?php if ($_POST['product_unit']=='metro'){?> selected="selected" <?php }?>>Metro(s) (m)</option>
        		<option value="litro" <?php if ($_POST['product_unit']=='litro'){?> selected="selected" <?php }?>>Litro(s) (l)</option>
        		<option value="kilo" <?php if ($_POST['product_unit']=='kilo'){?> selected="selected" <?php }?>>Kilo(s) (kg)</option>
		</select>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('product_unit')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    
    <input type="hidden" id="form_currency" name="currency" value="<?php echo $_smarty_tpl->getVariable('default_currency')->value;?>
">
    	
    <div class="row" id="form_quantity_container"> 
        <label for="form_quantity_">Cantidad <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_quantity" name="quantity" value="<?php echo $_POST['quantity'];?>
" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Cantidad"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('quantity')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_unit_cost_container"> 
        <label for="form_unit_cost_">Costo Unitario sin Impuestos <span id="outputcontent3"><?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?> <strong>&#x28;&#x2A;&#x29;</strong>:</span></label>
        <input type="text" id="form_unit_cost" name="unit_cost" value="<?php echo $_POST['unit_cost'];?>
" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Costo Unitario sin Impuestos"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('unit_cost')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_iva_container"> 
        <label for="form_iva_">I.V.A. &#x25; <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_iva" name="iva" value="<?php if ($_POST['iva']){?><?php echo $_POST['iva'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('default_iva')->value;?>
<?php }?>" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Escribe 21 para el 21&#x25; de impuesto"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('iva')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_iva2_name_container"> 
        <label for="form_iva2_name_">Otros Impuestos (Nombre):</label>
        <input type="text" id="form_iva2_name" name="iva2_name" value="<?php if ($_POST['iva2_name']){?><?php echo $_POST['iva2_name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('default_iva2_name')->value;?>
<?php }?>" placeholder="Ej: Impuesto al lujo"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('iva2_name')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_iva2_container"> 
        <label for="form_iva2_">Otros Impuestos (&#x25;):</label>
        <input type="text" id="form_iva2" name="iva2" value="<?php if ($_POST['iva2']){?><?php echo $_POST['iva2'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('default_iva2')->value;?>
<?php }?>" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Escribe 2 para el 2&#x25; de impuesto"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('iva2')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>

	<input type="hidden" id="form_document_type" name="document_type" value="<?php if ($_POST['document_type']){?><?php echo $_POST['document_type'];?>
<?php }else{ ?><?php echo $_GET['document_type'];?>
<?php }?>">
    <input type="hidden" id="form_document_id" name="document_id" value="<?php if ($_POST['document_id']){?><?php echo $_POST['document_id'];?>
<?php }else{ ?><?php echo $_GET['document_id'];?>
<?php }?>">
    <input type="hidden" id="form_product_id" name="product_id" value="<?php echo $_POST['product_id'];?>
">

    
    <script type="text/javascript"> 		
        		jQuery(window).load(function()  {
       				jQuery('#form_quantity').autoNumeric("init");
      				jQuery('#form_unit_cost').autoNumeric("init");
      				jQuery('#form_iva').autoNumeric("init");
      				jQuery('#form_iva2').autoNumeric("init");
      				
					jQuery("#form_item_detail").on("input", function() {
    						jQuery('#form_product_id').val('');
					});	
      		});
     </script>
     

	<div class="row">
    		<button class="submit" type="submit" name="add" id="add" value="add">Guardar</button> 
	</div>
	
	<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
    	</div>

	</form>         
    </body>
</html>