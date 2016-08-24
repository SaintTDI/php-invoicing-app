<?php /* Smarty version Smarty-3.0.8, created on 2015-02-23 01:50:44
         compiled from "/var/www/app/templates/./herramientas/facturas/item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:43235940154ea796495c0b8-94991649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb85c9a1d6186d03acabb529206a9069e0be2f9c' => 
    array (
      0 => '/var/www/app/templates/./herramientas/facturas/item.tpl',
      1 => 1423691282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43235940154ea796495c0b8-94991649',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php if (count($_smarty_tpl->getVariable('items')->value)==0){?>
        <input type="hidden" id="form_product_id" name="product_id" value="0">
        <?php $_smarty_tpl->tpl_vars['subtotal'] = new Smarty_variable(0, null, 3);?>
<?php }else{ ?>	
		<?php $_smarty_tpl->tpl_vars['currency_1'] = new Smarty_variable($_smarty_tpl->getVariable('default_currency')->value, null, null);?><?php $_smarty_tpl->tpl_vars['currency_2'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->currency, null, null);?>
        <?php if ($_smarty_tpl->getVariable('currency_2')->value){?><?php $_smarty_tpl->tpl_vars['currency_'] = new Smarty_variable($_smarty_tpl->getVariable('currency_2')->value, null, null);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['currency_'] = new Smarty_variable($_smarty_tpl->getVariable('currency_1')->value, null, null);?><?php }?>
    	    <table class="table_p2">
    	  	 <tr>
    	  		<?php if ($_smarty_tpl->getVariable('fp')->value->published=='yes'){?><?php }else{ ?><td class="table_button"><button class="submit7" type="submit" name="delete2" id="delete2" value="delete">Borrar</button></td><?php }?>
			<td class="table_p_top">C&oacute;digo</td>
			<td class="table_p_top">Nombre</td>
			<td class="table_p_top">Cantidad</td>
			<td class="table_p_top">Precio Unitario <?php if ($_smarty_tpl->getVariable('currency_')->value=='Peso Argentino'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Boliviano'){?>(b&#36)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Chileno'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Colombiano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Colon'){?>(&#162;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Dominicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Dolar'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Euro'){?>(&#128;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Quetzal'){?>(Q)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Lempira'){?>(L)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Mexicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Cordoba'){?>(C&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Balboa'){?>(B/.)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Guarani'){?>(&#8370;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Nuevo Sol'){?>(S/.)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Libra'){?>(&#163;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Uruguayo'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Bolivar'){?>(Bs.)<?php }else{ ?>(&#128;)<?php }?></td>
			<td class="table_p_top">IVA (&#37;)</td>
			<td class="table_p_top">Otros (&#37;)</td>
			<td class="table_p_top">Subtotal <?php if ($_smarty_tpl->getVariable('currency_')->value=='Peso Argentino'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Boliviano'){?>(b&#36)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Chileno'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Colombiano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Colon'){?>(&#162;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Dominicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Dolar'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Euro'){?>(&#128;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Quetzal'){?>(Q)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Lempira'){?>(L)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Mexicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Cordoba'){?>(C&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Balboa'){?>(B/.)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Guarani'){?>(&#8370;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Nuevo Sol'){?>(S/.)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Libra'){?>(&#163;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Uruguayo'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Bolivar'){?>(Bs.)<?php }else{ ?>(&#128;)<?php }?></td>
		</tr>
		<?php $_smarty_tpl->tpl_vars['subtotal'] = new Smarty_variable(0, null, 3);?>
		<?php $_smarty_tpl->tpl_vars['iva_total_r1'] = new Smarty_variable(0, null, 3);?>
		<?php $_smarty_tpl->tpl_vars['iva2_total_r1'] = new Smarty_variable(0, null, 3);?>
		<?php $_smarty_tpl->tpl_vars['total_items'] = new Smarty_variable(0, null, 3);?>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>      		
		<tr>
			<?php if ($_smarty_tpl->getVariable('fp')->value->published=='yes'){?><?php }else{ ?><td class="table_input"><input type="hidden" id="form_product_id" name="product_id[]" value="<?php echo $_smarty_tpl->getVariable('item')->value->profile->product_id;?>
" /><input type="hidden" id="form_item_id2" name="item_id2[]" value="<?php echo $_smarty_tpl->getVariable('item')->value->getId();?>
"><input type="checkbox" id="form_item_id" name="item_id[]" value="<?php echo $_smarty_tpl->getVariable('item')->value->getId();?>
"></td><?php }?>
			<td class="links"><span><?php if ($_smarty_tpl->getVariable('fp')->value->published!='yes'){?><a class="fancybox fancybox.iframe" href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/facturas','action'=>'editaritem'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('item')->value->getId();?>
&popup=true"><?php echo ucfirst($_smarty_tpl->getVariable('item')->value->profile->code);?>
</a><?php }else{ ?><?php echo ucfirst($_smarty_tpl->getVariable('item')->value->profile->code);?>
<?php }?></span></td>
			<td><?php echo ucfirst($_smarty_tpl->getVariable('item')->value->profile->detail);?>
</td>
			<td><?php echo number_format($_smarty_tpl->getVariable('item')->value->profile->quantity,2,',','.');?>
</td>
			<td><?php echo number_format($_smarty_tpl->getVariable('item')->value->profile->unit_price,2,',','.');?>
</td>
			<td><?php echo number_format($_smarty_tpl->getVariable('item')->value->profile->iva,2,',','.');?>
</td>
			<td><?php echo number_format($_smarty_tpl->getVariable('item')->value->profile->iva2,2,',','.');?>
</td>
			<td><?php echo number_format($_smarty_tpl->getVariable('item')->value->profile->subtotal,2,',','.');?>
</td>
		</tr>
		<?php $_smarty_tpl->tpl_vars['iva_total__'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->quantity*$_smarty_tpl->getVariable('item')->value->profile->unit_price, null, 3);?>
		<?php $_smarty_tpl->tpl_vars['subtotal'] = new Smarty_variable($_smarty_tpl->getVariable('subtotal')->value+$_smarty_tpl->getVariable('iva_total__')->value, null, 3);?>
		<?php $_smarty_tpl->tpl_vars['iva_total_r1'] = new Smarty_variable($_smarty_tpl->getVariable('iva_total_r1')->value+$_smarty_tpl->getVariable('item')->value->profile->iva_total, null, 3);?>
		<?php $_smarty_tpl->tpl_vars['iva2_total_r1'] = new Smarty_variable($_smarty_tpl->getVariable('iva2_total_r1')->value+$_smarty_tpl->getVariable('item')->value->profile->iva2_total, null, 3);?>
		<?php $_smarty_tpl->tpl_vars['total_items'] = new Smarty_variable($_smarty_tpl->getVariable('total_items')->value+1, null, 3);?>
        <?php }} ?>
       </table>
<?php }?>