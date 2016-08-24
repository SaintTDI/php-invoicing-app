<?php /* Smarty version Smarty-3.0.8, created on 2015-06-23 13:13:57
         compiled from "/var/www/app/templates/./cuenta/productos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54546688555893f75b85288-93207884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb1a897b7b7278ec58a1929a6f6938c6b53aed70' => 
    array (
      0 => '/var/www/app/templates/./cuenta/productos.tpl',
      1 => 1423691234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54546688555893f75b85288-93207884',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','cuenta');$_template->assign('subsection','productos'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="boxes3">
	<div class="title2" id="form_total_invoices">
			<label for="form_total_invoices"><h3>Tus Productos y Servicios:</h3></label>
	</div>
	<div class="boton_top">
	        <label for="bt_">
	        		<a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'agregarproductos'),$_smarty_tpl);?>
"<?php }?> onclick="clearLocalStorage();">Nuevo Producto</a>
			</label>
	</div>
</div>
<?php if (count($_smarty_tpl->getVariable('products')->value)==0){?>
		<div class="title" id="form_total_products">
			<label for="form_total_products">No hay Productos o Servicios registrados.</label>
		</div>
		<div id="parrafo2">
		        <p>&#x2771; Registrar tus productos o servicios acelera la creaci&oacute;n de facturas, presupuestos, gastos y &oacute;rdenes de compra.</p>
		</div>
		<div id="parrafo6">
		        <p>&#x2771; Adem&aacute;s, en la ficha de cada producto o servicio que hayas dado de alta podr&aacute;s ver r&aacute;pidamente todo el detalle comercial.</p>
		</div>
<?php }else{ ?>
    	   <form id="account_id" name="account" method="post" action="<?php echo smarty_function_geturl(array('action'=>'productos'),$_smarty_tpl);?>
">
    	    <table class="table_p">
    	  	 <tr>
    	  		<td class="table_button"><button class="submit7" type="submit" name="delete" id="delete" value="delete" onclick="return confirmDone5()">Borrar</button></td>
			<td class="table_p_top">C&oacute;digo</td>
			<td class="table_p_top">Nombre</td>
			<td class="table_p_top">Imagen</td>
			<td class="table_p_top">Unidad</td>
			<td class="table_p_top">Precio <?php if ($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Peso Argentino'){?>(&#36; ARS)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Peso Boliviano'){?>(b&#36; BOB)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Peso Chileno'){?>(&#36; CLP)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Peso Colombiano'){?>(&#36; COP)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Colon'){?>(&#162; CRC)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Peso Dominicano'){?>(&#36; DOP)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Dolar'){?>(&#36; USD)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Euro'){?>(&#128; EUR)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Quetzal'){?>(Q GTQ)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Lempira'){?>(L HNL)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Peso Mexicano'){?>(&#36; MXN)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Cordoba'){?>(C&#36; NIO)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Balboa'){?>(B/. PAB)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Guarani'){?>(&#8370; PYG)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Nuevo Sol'){?>(S/. PEN)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Libra'){?>(&#163; GBP)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Peso Uruguayo'){?>(&#36; UYU)<?php }elseif($_smarty_tpl->getVariable('product')->value->profile->product_currency=='Bolivar'){?>(Bs. VEF)<?php }else{ ?>(&#128; EUR)<?php }?></td>
			<td class="table_p_top">IVA (&#37;)</td>
			<td class="table_p_top">Otros Imp. (&#37;)</td>
		</tr><?php $_smarty_tpl->tpl_vars['f'] = new Smarty_variable(0, null, null);?>
        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('products')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
			<tr>
				<td class="table_input"><input type="checkbox" name="product_id[]" value="<?php echo $_smarty_tpl->getVariable('product')->value->getId();?>
"></td>
				<td><?php echo $_smarty_tpl->getVariable('product')->value->profile->product_code;?>
</td>
				<td class="links"><span><a href="<?php echo smarty_function_geturl(array('action'=>'fichaproducto'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('product')->value->getId();?>
" onclick="clearLocalStorage();"><?php echo ucfirst($_smarty_tpl->getVariable('product')->value->profile->product_name);?>
</a></span></td>
				<td><?php if ($_smarty_tpl->getVariable('product')->value->profile->product_pict_preview){?><img src="/profiles/tmp/product/thumbnails/<?php echo $_smarty_tpl->getVariable('product')->value->profile->product_pict_preview;?>
" /><?php }else{ ?>N/A<?php }?></td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('product')->value->profile->product_unit);?>
</td>
				<td><?php echo number_format($_smarty_tpl->getVariable('product')->value->profile->unit_price,2,',','.');?>
</td>
				<td><?php if ($_smarty_tpl->getVariable('product')->value->profile->iva){?><?php echo number_format($_smarty_tpl->getVariable('product')->value->profile->iva,2,',','.');?>
<?php }else{ ?>N/A<?php }?></td>
				<td><?php if ($_smarty_tpl->getVariable('product')->value->profile->iva2){?><?php echo number_format($_smarty_tpl->getVariable('product')->value->profile->iva2,2,',','.');?>
<?php }else{ ?>N/A<?php }?></td>
			</tr>
			<input type="hidden" id="form_comp" name="prod_id[]" value="<?php echo $_smarty_tpl->getVariable('product')->value->getId();?>
" />
		   <?php $_smarty_tpl->tpl_vars['f'] = new Smarty_variable($_smarty_tpl->getVariable('f')->value+1, null, null);?>
        <?php }} ?>
       </table>
      </form>
<?php }?>
<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>