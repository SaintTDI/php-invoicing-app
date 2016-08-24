<?php /* Smarty version Smarty-3.0.8, created on 2015-02-23 01:52:02
         compiled from "/var/www/app/templates/./direccion/direcciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13678122754ea79b2c15cf0-75787911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c917f3c1bc852969892aed3247c732e06ad4b8d9' => 
    array (
      0 => '/var/www/app/templates/./direccion/direcciones.tpl',
      1 => 1423691246,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13678122754ea79b2c15cf0-75787911',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php if (count($_smarty_tpl->getVariable('addresses')->value)==0){?>
	<?php if (!$_smarty_tpl->getVariable('contact')->value){?>
        <input type="hidden" id="form_contact_id" name="contact_id" value="0">
        <input type="hidden" id="form_addr_id" name="addr_id" value="0" />
    <?php }?>
    <?php if ($_smarty_tpl->getVariable('contact')->value){?>
    		<input type="hidden" id="form_addr_id" name="addr_id" value="0" />
    <?php }?>
<?php }else{ ?>	
		<input type="hidden" id="form_contact_id" name="contact_id" value="<?php echo $_smarty_tpl->getVariable('contact_id')->value;?>
">
    	    <table class="table_p2">
    	  	 <tr>
    	  		<?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->user_type=="employee"){?><td class="table_button"><button class="submit7" type="submit" name="delete2" id="delete2" value="delete" onclick="return confirmDone5()">Borrar</button></td><?php }?>
			<td class="table_p_top">Tipo</td>
			<td class="table_p_top">Calle/Av</td>
			<td class="table_p_top">N&ordm;</td>
			<td class="table_p_top">Ciudad</td>
			<td class="table_p_top">Provincia</td>
			<td class="table_p_top">Comunidad</td>
			<td class="table_p_top">Pa&iacute;s</td>
		</tr>
		<?php if ($_smarty_tpl->getVariable('contact')->value){?>
        <?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('addresses')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']++;
?>      		
        		<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['index']<1){?>
			<tr>
				<?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->user_type=="employee"){?>
				<td class="table_input"><input type="hidden" id="form_addr_id" name="addr_id[]" value="<?php echo $_smarty_tpl->getVariable('address')->value->getId();?>
" />
				<input type="checkbox" name="address_id[]" value="<?php echo $_smarty_tpl->getVariable('address')->value->getId();?>
"></td><?php }?>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('address')->value->profile->type);?>
</td>
				<td class="links"><?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->user_type=="employee"){?><a class="fancybox fancybox.iframe" href="<?php echo smarty_function_geturl(array('controller'=>'direccion','action'=>'editardireccion'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('address')->value->getId();?>
&popup=true"><?php echo $_smarty_tpl->getVariable('address')->value->profile->street;?>
</a><?php }else{ ?><?php echo $_smarty_tpl->getVariable('address')->value->profile->street;?>
<?php }?></td>
				<td><?php echo $_smarty_tpl->getVariable('address')->value->profile->house;?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('address')->value->profile->city;?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('address')->value->profile->province;?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('address')->value->profile->state;?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('address')->value->profile->country;?>
</td>
			</tr>
			<?php break 1?><?php }?>
        <?php }} ?>
        	<?php }else{ ?>
        <?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('addresses')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value){
?>      		
			<tr>
				<?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->user_type=="employee"){?>
				<td class="table_input"><input type="hidden" id="form_addr_id" name="addr_id[]" value="<?php echo $_smarty_tpl->getVariable('address')->value->getId();?>
" />
				<input type="checkbox" name="address_id[]" value="<?php echo $_smarty_tpl->getVariable('address')->value->getId();?>
"></td><?php }?>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('address')->value->profile->type);?>
</td>
				<td class="links"><?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->user_type=="employee"){?><a class="fancybox fancybox.iframe" href="<?php echo smarty_function_geturl(array('controller'=>'direccion','action'=>'editardireccion'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('address')->value->getId();?>
"><?php echo $_smarty_tpl->getVariable('address')->value->profile->street;?>
</a><?php }else{ ?><?php echo $_smarty_tpl->getVariable('address')->value->profile->street;?>
<?php }?></td>
				<td><?php echo $_smarty_tpl->getVariable('address')->value->profile->house;?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('address')->value->profile->city;?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('address')->value->profile->province;?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('address')->value->profile->state;?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('address')->value->profile->country;?>
</td>
			</tr>
        <?php }} ?>
		<?php }?>	
       </table>
<?php }?>