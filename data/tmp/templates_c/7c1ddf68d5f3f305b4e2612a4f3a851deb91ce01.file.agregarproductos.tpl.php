<?php /* Smarty version Smarty-3.0.8, created on 2015-06-23 13:14:01
         compiled from "/var/www/app/templates/./cuenta/agregarproductos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:71026297455893f79e77835-08728038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c1ddf68d5f3f305b4e2612a4f3a851deb91ce01' => 
    array (
      0 => '/var/www/app/templates/./cuenta/agregarproductos.tpl',
      1 => 1423691223,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71026297455893f79e77835-08728038',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','cuenta');$_template->assign('subsection','agregarproductos'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

<div class="title" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Agregar Producto/Servicio:</h3></label>
</div>

<form id="account_id" name="account" method="post" action="<?php echo smarty_function_geturl(array('action'=>'agregarproductos'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('fp')->value->product->getId();?>
" enctype="multipart/form-data">

    <?php if ($_smarty_tpl->getVariable('fp')->value->hasError()){?>
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    <?php }?>
    
	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_product_code_container">
		        <label for="form_product_code">C&oacute;digo <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" id="form_product_code" name="product_code" value="<?php if ($_smarty_tpl->getVariable('product')->value->profile->product_code){?><?php echo $_smarty_tpl->getVariable('product')->value->profile->product_code;?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('invoicenumber')->value+1;?>
<?php }?>" placeholder="Ej: 123"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('product_code')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_product_name_container">
		        <label for="form_product_name">Nombre <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" id="form_product_name" name="product_name" value="<?php echo $_POST['product_name'];?>
" placeholder="Nombre del Producto o Servicio"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('product_name')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		</div>
	</div>
    
	<div class="row" id="form_product_description_container">
    		<label for="form_product_description">Descripci&oacute;n :</label>
    		<textarea class="big_textarea" id="form_product_description" name="product_description" rows="10" cols="50" placeholder="Descripci&oacute;n del Producto o Servicio"><?php echo $_POST['product_description'];?>
</textarea>
    		<?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('product_description')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    	</div>

	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_iva_container">
		        <label for="form_iva">R&eacute;gimen de IVA en &#37; <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" id="form_iva" name="iva" value="<?php if ($_smarty_tpl->getVariable('default_iva')->value){?><?php echo $_smarty_tpl->getVariable('default_iva')->value;?>
<?php }else{ ?><?php echo $_POST['iva'];?>
<?php }?>" data-a-dec="," data-a-sep="." placeholder="Escribe 21 para el 21&#x25; de impuesto (Venta)"/> 
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('iva')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div> 
	        <?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fp')->value->productProfile; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['label']->key;
?>
	        	<div class="row" id="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_container">
	                <?php if ($_smarty_tpl->tpl_vars['label']->value=='Profile Picture'){?>
	                		<label for="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">Sube una Imagen:</label>
	             		<input type="file" class="files" id="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="<?php echo $_POST[$_smarty_tpl->getVariable('key')->value];?>
"/>
	                    <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError($_smarty_tpl->tpl_vars['key']->value)); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	                	<?php }?></div>
	        <?php }} ?>
	     	</div>
			<div class="form_right">
			    <div class="row" id="form_unit_price_container">
			        <label for="form_unit_price">Precio Unitario sin Impuestos <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>(&#36; ARS)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>(b&#36; BOB)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>(&#36; CLP)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>(&#36; COP)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>(&#162; CRC)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>(&#36; DOP)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>(&#36; USD)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>(&#128; EUR)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>(Q GTQ)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>(L HNL)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>(&#36; MXN)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>(C&#36; NIO)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>(B/. PAB)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>(&#8370; PYG)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>(S/. PEN)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>(&#163; GBP)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>(&#36; UYU)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>(Bs. VEF)<?php }else{ ?>(&#128; EUR)<?php }?></label>
			        <input type="text" id="form_unit_price" name="unit_price" value="<?php echo $_POST['unit_price'];?>
" data-a-dec="," data-a-sep="." placeholder="Precio Unitario (Venta)"/>
			        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('unit_price')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
			    </div>
			    <?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fp')->value->productProfile; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['label']->key;
?>
		        	<div class="row" id="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_container">
		                <?php if ($_smarty_tpl->tpl_vars['label']->value=='Picture Preview'){?>
		                		<label for="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">Imagen:</label>
		                		<?php if ($_smarty_tpl->getVariable('product')->value->profile->{$_smarty_tpl->getVariable('key')->value}!=''){?>
		                				<?php $_smarty_tpl->tpl_vars["url"] = new Smarty_variable($_smarty_tpl->getVariable('product')->value->profile->{$_smarty_tpl->getVariable('key')->value}, null, null);?>
		                            	<img src="/profiles/tmp/product/pictures/<?php echo $_smarty_tpl->getVariable('url')->value;?>
" />
		                        	<?php }else{ ?>
		                            	<img src="/profiles/tmp/product/pictures/profile.png" />
		                        <?php }?>
		                	<?php }?></div>
		        <?php }} ?>
	        </div>
		</div>
	    
	<div class="form_box">
		<div class="form_left">    
		    <div class="row" id="form_iva2_name_container">
		        <label for="form_iva2_name">Impuesto Adic. (Nombre):</label>
		        <input type="text" id="form_iva2_name" name="iva2_name" value="<?php if ($_smarty_tpl->getVariable('default_iva2_name')->value){?><?php echo $_smarty_tpl->getVariable('default_iva2_name')->value;?>
<?php }else{ ?><?php echo $_POST['iva2_name'];?>
<?php }?>" placeholder="Ej: Impuesto al lujo"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('iva2_name')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		    <div class="row" id="form_product_unit_container">
		    		<label for="form_product_unit">Unidad de facturaci&oacute;n <strong>&#x28;&#x2A;&#x29;</strong>:</label>
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
		</div>     
		<div class="form_right">
		    <div class="row" id="form_iva2_container">
		        <label for="form_iva2">Impuesto Adicional (&#37;):</label>
		        <input type="text" id="form_iva2" name="iva2" value="<?php if ($_smarty_tpl->getVariable('default_iva2')->value){?><?php echo $_smarty_tpl->getVariable('default_iva2')->value;?>
<?php }else{ ?><?php echo $_POST['iva2'];?>
<?php }?>" data-a-dec="," data-a-sep="." placeholder="Escribe 2 para el 2&#x25; de impuesto (Venta)"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('iva2')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		 	<div class="row" id="form_company_container">
		        <label for="form_company">Proveedor(es):</label>
		        	    <input type="text" id="form_company" name="company" value="<?php echo $_POST['company'];?>
" placeholder="Empresa, sociedad o persona"/>
		        		<input type="hidden" id="form_company_id" name="company_id" value="<?php echo $_POST['company_id'];?>
" />
		        		<input type="hidden" id="form_address_id" name="address_id" value="<?php echo $_POST['address_id'];?>
" />
		        		<input type="hidden" id="form_contact_id" name="contact_id" value="<?php echo $_smarty_tpl->getVariable('company_id2')->value;?>
" />
		        
		        		
		        		<script type="text/javascript"> 		
		        		jQuery(document).ready(function() {
		      				var thehtml2 = '<span><a class="fancybox fancybox.iframe" href="<?php echo smarty_function_geturl(array('controller'=>'compania','action'=>'editarcompania'),$_smarty_tpl);?>
?id=<?php if (is_array($_smarty_tpl->getVariable('product')->value->profile->company_id)){?><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product')->value->profile->company_id; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?><?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->getVariable('company')->value->profile->company_id, null, null);?><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companieslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?><?php if ($_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('b')->value]==$_smarty_tpl->getVariable('id')->value){?><?php echo $_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('b')->value];?>
<?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable($_smarty_tpl->getVariable('b')->value+1, null, null);?><?php break 1?><?php }?><?php }} ?><?php }} ?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['id_'] = new Smarty_variable($_smarty_tpl->getVariable('product')->value->profile->company_id, null, null);?><?php $_smarty_tpl->tpl_vars['c'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companieslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?><?php if ($_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('c')->value]==$_smarty_tpl->getVariable('id_')->value){?><?php echo $_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('c')->value];?>
<?php $_smarty_tpl->tpl_vars['c'] = new Smarty_variable($_smarty_tpl->getVariable('c')->value+1, null, null);?><?php }?><?php }} ?><?php }?>&id2=<?php if (is_array($_smarty_tpl->getVariable('product')->value->profile->company_id)){?><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product')->value->profile->company_id; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?><?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->getVariable('company')->value->profile->company_id, null, null);?><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companieslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?><?php if ($_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('b')->value]==$_smarty_tpl->getVariable('id')->value){?><?php echo $_smarty_tpl->getVariable('address_')->value[$_smarty_tpl->getVariable('b')->value];?>
<?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable($_smarty_tpl->getVariable('b')->value+1, null, null);?><?php break 1?><?php }?><?php }} ?><?php }} ?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['id_'] = new Smarty_variable($_smarty_tpl->getVariable('product')->value->profile->company_id, null, null);?><?php $_smarty_tpl->tpl_vars['c'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companieslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?><?php if ($_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('c')->value]==$_smarty_tpl->getVariable('id_')->value){?><?php echo $_smarty_tpl->getVariable('address_')->value[$_smarty_tpl->getVariable('c')->value];?>
<?php $_smarty_tpl->tpl_vars['c'] = new Smarty_variable($_smarty_tpl->getVariable('c')->value+1, null, null);?><?php }?><?php }} ?><?php }?>&doc_type=ccompany&doc_id=<?php if (is_array($_smarty_tpl->getVariable('product')->value->profile->company_id)){?><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product')->value->profile->company_id; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?><?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->getVariable('company')->value->profile->company_id, null, null);?><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companieslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?><?php if ($_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('b')->value]==$_smarty_tpl->getVariable('id')->value){?><?php echo $_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('b')->value];?>
<?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable($_smarty_tpl->getVariable('b')->value+1, null, null);?><?php break 1?><?php }?><?php }} ?><?php }} ?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['id_'] = new Smarty_variable($_smarty_tpl->getVariable('product')->value->profile->company_id, null, null);?><?php $_smarty_tpl->tpl_vars['c'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companieslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?><?php if ($_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('c')->value]==$_smarty_tpl->getVariable('id_')->value){?><?php echo $_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('c')->value];?>
<?php $_smarty_tpl->tpl_vars['c'] = new Smarty_variable($_smarty_tpl->getVariable('c')->value+1, null, null);?><?php }?><?php }} ?><?php }?>
		"><?php if (is_array($_smarty_tpl->getVariable('product')->value->profile->company_id)){?><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product')->value->profile->company_id; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?><?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->getVariable('company')->value->profile->company_id, null, null);?><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companieslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?><?php if ($_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('b')->value]==$_smarty_tpl->getVariable('id')->value){?><?php echo $_smarty_tpl->getVariable('company_')->value[$_smarty_tpl->getVariable('b')->value];?>
<?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable($_smarty_tpl->getVariable('b')->value+1, null, null);?><?php break 1?><?php }?><?php }} ?><?php }} ?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['id_'] = new Smarty_variable($_smarty_tpl->getVariable('product')->value->profile->company_id, null, null);?><?php $_smarty_tpl->tpl_vars['c'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companieslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?><?php if ($_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('c')->value]==$_smarty_tpl->getVariable('id_')->value){?><?php echo $_smarty_tpl->getVariable('company_')->value[$_smarty_tpl->getVariable('c')->value];?>
<?php $_smarty_tpl->tpl_vars['c'] = new Smarty_variable($_smarty_tpl->getVariable('c')->value+1, null, null);?><?php }?><?php }} ?><?php }?></a></span>';
		      				jQuery('#outputcontent').html(thehtml2);
		      				jQuery('#form_unit_price').autoNumeric("init");
		      				jQuery('#form_iva').autoNumeric("init");
		      				jQuery('#form_iva2').autoNumeric("init");
		      				jQuery('#form_unit_cost').autoNumeric("init");
		      				jQuery('#form_iva_p').autoNumeric("init");
		      				jQuery('#form_iva_p2').autoNumeric("init");
		      		});
		        		</script>
		        		
		        		        
		         <?php $_template = new Smarty_Internal_Template('compania/companias.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('product',true);$_template->assign('contact_id',$_smarty_tpl->getVariable('fp')->value->product->getId()); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		  	</div>
		 </div>
	</div>
		    
	<div class="form_box">
		<div class="form_left">
			    <div class="row" id="form_unit_cost_container">
			        <label for="form_unit_cost">Precio de compra o coste <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>(&#36; ARS)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>(b&#36; BOB)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>(&#36; CLP)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>(&#36; COP)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>(&#162; CRC)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>(&#36; DOP)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>(&#36; USD)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>(&#128; EUR)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>(Q GTQ)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>(L HNL)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>(&#36; MXN)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>(C&#36; NIO)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>(B/. PAB)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>(&#8370; PYG)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>(S/. PEN)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>(&#163; GBP)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>(&#36; UYU)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>(Bs. VEF)<?php }else{ ?>(&#128; EUR)<?php }?>:</label>
			        <input type="text" id="form_unit_cost" name="unit_cost" value="<?php echo $_POST['unit_cost'];?>
" data-a-dec="," data-a-sep="." placeholder="Costo Unitario (Compra)"/>
			        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('unit_cost')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
			    </div>
			    <div class="row" id="form_iva_p2_name_container">
			        <label for="form_iva_p2_name">&iquest;Pagas alg&uacute;n impuesto adicional de compra?:</label>
			        <input type="text" id="form_iva_p2_name" name="iva_p2_name" value="<?php echo $_POST['iva_p2_name'];?>
" placeholder="Ej: Impuesto al lujo"/>
			        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('iva_p2_name')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
			    </div>
		</div>
		<div class="form_right">
				<div class="row" id="form_iva_p_container">
		        		<label for="form_iva_p">IVA de compra (&#37;):</label>
		        		<input type="text" id="form_iva_p" name="iva_p" value="<?php if ($_POST['iva_p']){?><?php echo $_POST['iva_p'];?>
<?php }else{ ?>0.00<?php }?>" data-a-dec="," data-a-sep="." placeholder="Escribe 21 para el 21&#x25; de impuesto (Compra)"/> 
		        		<?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('iva_p')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    		</div>
		    		<div class="row" id="form_iva_p2_container">
		        		<label for="form_iva_p2">Impuesto adicional de compra (en &#37;):</label>
		        		<input type="text" id="form_iva_p2" name="iva_p2" value="<?php if ($_POST['iva_p2']){?><?php echo $_POST['iva_p2'];?>
<?php }?>" data-a-dec="," data-a-sep="." placeholder="Escribe 2 para el 2&#x25; de impuesto (Compra)"/>
		        		<?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('iva_p2')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    		</div>
		</div>
	</div>
    <input type="hidden" id="form_product_currency" name="product_currency" value="<?php echo $_smarty_tpl->getVariable('default_currency')->value;?>
" /> 

    <?php if ($_smarty_tpl->getVariable('comp22')->value==''){?>
	
    <script type="text/javascript"> 		
      jQuery(document).ready(function() {
   		var r = confirm('Por favor complete el perfil de su compa\u00F1\u00EDa antes de crear un producto.');
        if (r) {
            window.location.href = "/cuenta/empresa";
        }
        else {
        		return false;
        }
      });
   </script>
   
   <?php }?>

	<div class="form_box">
		<div class="row">
	    		<?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?><button class="submit" type="submit" name="add" id="add" value="add">Guardar</button><?php }?>
		</div>
	</div>
	<div class="form_box">
		<div class="row" id="form_contact_notes">
	    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
	    	</div>
    	</div>

</form>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>