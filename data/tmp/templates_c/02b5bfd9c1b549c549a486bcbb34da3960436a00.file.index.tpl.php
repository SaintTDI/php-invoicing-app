<?php /* Smarty version Smarty-3.0.8, created on 2015-02-15 22:54:23
         compiled from "/var/www/app/templates/./usuarios/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53069389954e1158f319858-42308771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02b5bfd9c1b549c549a486bcbb34da3960436a00' => 
    array (
      0 => '/var/www/app/templates/./usuarios/index.tpl',
      1 => 1423691353,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53069389954e1158f319858-42308771',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','usuarios');$_template->assign('subsection','index'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="boxes3">
<div class="title2" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Directorio de Usuarios: </h3></label>
</div>
<div class="boton_top">
<?php if ($_smarty_tpl->getVariable('plan')->value=="plan1"||$_smarty_tpl->getVariable('plan')->value=="trial_plan1"){?>
	<?php if ($_smarty_tpl->getVariable('a')->value==0||$_smarty_tpl->getVariable('b')->value==0){?>
	        <label for="bt_"><a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'agregar'),$_smarty_tpl);?>
"<?php }?> onclick="clearLocalStorage();">Nuevo Usuario</a></label>
	<?php }?>
<?php }?>
<?php if ($_smarty_tpl->getVariable('plan')->value=="plan3"||$_smarty_tpl->getVariable('plan')->value=="trial_plan3"){?>
	<?php if ($_smarty_tpl->getVariable('a')->value==0||$_smarty_tpl->getVariable('b')->value==0||$_smarty_tpl->getVariable('c')->value<2){?>
		<?php if ($_smarty_tpl->getVariable('b')->value>0&&$_smarty_tpl->getVariable('c')->value>1){?>
	        <label for="bt_"><a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'agregar'),$_smarty_tpl);?>
?acc=1&emp=1"<?php }?> onclick="clearLocalStorage();">Nuevo Usuario</a></label>
		<?php }elseif($_smarty_tpl->getVariable('b')->value>0){?>
	        <label for="bt_"><a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'agregar'),$_smarty_tpl);?>
?acc=1"<?php }?> onclick="clearLocalStorage();">Nuevo Usuario</a></label>
		<?php }elseif($_smarty_tpl->getVariable('c')->value>1){?>
	        <label for="bt_"><a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'agregar'),$_smarty_tpl);?>
?emp=1"<?php }?> onclick="clearLocalStorage();">Nuevo Usuario</a></label>
	    <?php }else{ ?>
	    		<label for="bt_"><a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'agregar'),$_smarty_tpl);?>
"<?php }?> onclick="clearLocalStorage();">Nuevo Usuario</a></label>
	    <?php }?>
	<?php }?>
<?php }?>
<?php if ($_smarty_tpl->getVariable('plan')->value=="plan5"||$_smarty_tpl->getVariable('plan')->value=="trial_plan5"){?>
	<?php if ($_smarty_tpl->getVariable('a')->value==0||$_smarty_tpl->getVariable('b')->value==0||$_smarty_tpl->getVariable('c')->value<4){?>
		<?php if ($_smarty_tpl->getVariable('b')->value>0&&$_smarty_tpl->getVariable('c')->value>3){?>
	        <label for="bt_"><a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'agregar'),$_smarty_tpl);?>
?acc=1&emp=1"<?php }?> onclick="clearLocalStorage();">Nuevo Usuario</a></label>
		<?php }elseif($_smarty_tpl->getVariable('b')->value>0){?>
	        <label for="bt_"><a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'agregar'),$_smarty_tpl);?>
?acc=1"<?php }?> onclick="clearLocalStorage();">Nuevo Usuario</a></label>
		<?php }elseif($_smarty_tpl->getVariable('c')->value>3){?>
	        <label for="bt_"><a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'agregar'),$_smarty_tpl);?>
?emp=1"<?php }?> onclick="clearLocalStorage();">Nuevo Usuario</a></label>
	    <?php }else{ ?>
	    		<label for="bt_"><a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'agregar'),$_smarty_tpl);?>
"<?php }?> onclick="clearLocalStorage();">Nuevo Usuario</a></label>
	    <?php }?>
	<?php }?>
<?php }?>
<?php if ($_smarty_tpl->getVariable('plan2')->value){?>
	<?php if ($_smarty_tpl->getVariable('d')->value==0){?>
	        <label for="bt_"><a class="submit6" href="<?php echo smarty_function_geturl(array('action'=>'agregar'),$_smarty_tpl);?>
" onclick="clearLocalStorage();">Nuevo Usuario</a></label>
	<?php }?>
<?php }?>
</div>
</div>

<?php if (count($_smarty_tpl->getVariable('users')->value)==0){?>
<?php }else{ ?>   
    	   <form method="post" action="<?php echo smarty_function_geturl(array('action'=>'index'),$_smarty_tpl);?>
">
    	    <table class="table_p">
    	  	 <tr>
    	  		<td class="table_button"><button class="submit7" type="submit" name="delete" id="delete" value="delete" onclick="return confirmDone5()">Borrar</button></td>
			<td class="table_p_top">Nombres</td>
			<td class="table_p_top">Apellidos</td>
			<td class="table_p_top">Email</td>
			<td class="table_p_top">Perfil</td>
			<td class="table_p_top">Usuario</td>
		</tr>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['a'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['c'] = new Smarty_variable(0, null, null);?><?php $_smarty_tpl->tpl_vars['d'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('users')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
?><?php if ($_smarty_tpl->getVariable('user')->value->user_type=="proprietary"){?><?php $_smarty_tpl->tpl_vars['user_type'] = new Smarty_variable("Administrador", null, null);?><?php }elseif($_smarty_tpl->getVariable('user')->value->user_type=="employee"){?><?php $_smarty_tpl->tpl_vars['user_type'] = new Smarty_variable("Colaborador", null, null);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['user_type'] = new Smarty_variable("Contador", null, null);?><?php }?>
			<?php if ($_smarty_tpl->getVariable('user')->value->profile->plan=="plan1"||$_smarty_tpl->getVariable('user')->value->profile->plan=="trial_plan1"){?>
				<?php if ($_smarty_tpl->getVariable('user')->value->user_type=="proprietary"&&$_smarty_tpl->getVariable('a')->value==0){?>
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
" <?php if ($_smarty_tpl->getVariable('user')->value->user_type=="proprietary"){?>disabled="disabled"<?php }?>></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->first_name);?>
</td>
						<td class="links"><span><?php if ($_smarty_tpl->getVariable('user_type')->value=="Administrador"){?><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
<?php }else{ ?><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'editar'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
"<?php }?>><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
</a><?php }?></span></td>
						<td class="links"><a href="mailto:<?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
"><?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
</a></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user_type')->value);?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('user')->value->username;?>
</td><?php $_smarty_tpl->tpl_vars['a'] = new Smarty_variable($_smarty_tpl->getVariable('a')->value+1, null, null);?>
					</tr>
				<?php }elseif($_smarty_tpl->getVariable('user')->value->user_type=="accountant"&&$_smarty_tpl->getVariable('b')->value==0){?>
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
" <?php if ($_smarty_tpl->getVariable('user')->value->user_type=="proprietary"){?>disabled="disabled"<?php }?>></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->first_name);?>
</td>
						<td class="links"><span><?php if ($_smarty_tpl->getVariable('user_type')->value=="Administrador"){?><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
<?php }else{ ?><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'editar'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
"<?php }?>><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
</a><?php }?></span></td>
						<td class="links"><a href="mailto:<?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
"><?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
</a></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user_type')->value);?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('user')->value->username;?>
</td><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable($_smarty_tpl->getVariable('b')->value+1, null, null);?>
					</tr>
				<?php }?>
			<?php }?>
			<?php if ($_smarty_tpl->getVariable('user')->value->profile->plan=="plan3"||$_smarty_tpl->getVariable('user')->value->profile->plan=="trial_plan3"){?>
				<?php if ($_smarty_tpl->getVariable('user')->value->user_type=="proprietary"&&$_smarty_tpl->getVariable('a')->value==0){?>
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
" <?php if ($_smarty_tpl->getVariable('user')->value->user_type=="proprietary"){?>disabled="disabled"<?php }?>></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->first_name);?>
</td>
						<td class="links"><span><?php if ($_smarty_tpl->getVariable('user_type')->value=="Administrador"){?><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
<?php }else{ ?><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'editar'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
<?php if ($_smarty_tpl->getVariable('b')->value>0){?>&acc=1<?php }?>"<?php }?>><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
</a><?php }?></span></td>
						<td class="links"><a href="mailto:<?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
"><?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
</a></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user_type')->value);?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('user')->value->username;?>
</td><?php $_smarty_tpl->tpl_vars['a'] = new Smarty_variable($_smarty_tpl->getVariable('a')->value+1, null, null);?>
					</tr>
				<?php }elseif($_smarty_tpl->getVariable('user')->value->user_type=="accountant"&&$_smarty_tpl->getVariable('b')->value==0){?>
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
" <?php if ($_smarty_tpl->getVariable('user')->value->user_type=="proprietary"){?>disabled="disabled"<?php }?>></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->first_name);?>
</td>
						<td class="links"><span><?php if ($_smarty_tpl->getVariable('user_type')->value=="Administrador"){?><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
<?php }else{ ?><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'editar'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
"<?php }?>><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
</a><?php }?></span></td>
						<td class="links"><a href="mailto:<?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
"><?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
</a></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user_type')->value);?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('user')->value->username;?>
</td><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable($_smarty_tpl->getVariable('b')->value+1, null, null);?>
					</tr>
				<?php }elseif($_smarty_tpl->getVariable('user')->value->user_type=="employee"&&$_smarty_tpl->getVariable('c')->value<2){?>
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
" <?php if ($_smarty_tpl->getVariable('user')->value->user_type=="proprietary"){?>disabled="disabled"<?php }?>></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->first_name);?>
</td>
						<td class="links"><span><?php if ($_smarty_tpl->getVariable('user_type')->value=="Administrador"){?><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
<?php }else{ ?><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'editar'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
<?php if ($_smarty_tpl->getVariable('b')->value>0){?>&acc=1<?php }?>"<?php }?>><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
</a><?php }?></span></td>
						<td class="links"><a href="mailto:<?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
"><?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
</a></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user_type')->value);?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('user')->value->username;?>
</td><?php $_smarty_tpl->tpl_vars['c'] = new Smarty_variable($_smarty_tpl->getVariable('c')->value+1, null, null);?>
					</tr>
				<?php }?>
			<?php }?>
			<?php if ($_smarty_tpl->getVariable('user')->value->profile->plan=="plan5"||$_smarty_tpl->getVariable('user')->value->profile->plan=="trial_plan5"){?>
				<?php if ($_smarty_tpl->getVariable('user')->value->user_type=="proprietary"&&$_smarty_tpl->getVariable('a')->value==0){?>
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
" <?php if ($_smarty_tpl->getVariable('user')->value->user_type=="proprietary"){?>disabled="disabled"<?php }?>></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->first_name);?>
</td>
						<td class="links"><span><?php if ($_smarty_tpl->getVariable('user_type')->value=="Administrador"){?><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
<?php }else{ ?><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'editar'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
<?php if ($_smarty_tpl->getVariable('b')->value>0){?>&acc=1<?php }?>"<?php }?>><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
</a><?php }?></span></td>
						<td class="links"><a href="mailto:<?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
"><?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
</a></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user_type')->value);?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('user')->value->username;?>
</td><?php $_smarty_tpl->tpl_vars['a'] = new Smarty_variable($_smarty_tpl->getVariable('a')->value+1, null, null);?>
					</tr>
				<?php }elseif($_smarty_tpl->getVariable('user')->value->user_type=="accountant"&&$_smarty_tpl->getVariable('b')->value==0){?>
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
" <?php if ($_smarty_tpl->getVariable('user')->value->user_type=="proprietary"){?>disabled="disabled"<?php }?>></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->first_name);?>
</td>
						<td class="links"><span><?php if ($_smarty_tpl->getVariable('user_type')->value=="Administrador"){?><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
<?php }else{ ?><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'editar'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
"<?php }?>><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
</a><?php }?></span></td>
						<td class="links"><a href="mailto:<?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
"><?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
</a></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user_type')->value);?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('user')->value->username;?>
</td><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable($_smarty_tpl->getVariable('b')->value+1, null, null);?>
					</tr>
				<?php }elseif($_smarty_tpl->getVariable('user')->value->user_type=="employee"&&$_smarty_tpl->getVariable('c')->value<4){?>
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
" <?php if ($_smarty_tpl->getVariable('user')->value->user_type=="proprietary"){?>disabled="disabled"<?php }?>></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->first_name);?>
</td>
						<td class="links"><span><?php if ($_smarty_tpl->getVariable('user_type')->value=="Administrador"){?><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
<?php }else{ ?><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'editar'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
<?php if ($_smarty_tpl->getVariable('b')->value>0){?>&acc=1<?php }?>"<?php }?>><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
</a><?php }?></span></td>
						<td class="links"><a href="mailto:<?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
"><?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
</a></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user_type')->value);?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('user')->value->username;?>
</td><?php $_smarty_tpl->tpl_vars['c'] = new Smarty_variable($_smarty_tpl->getVariable('c')->value+1, null, null);?>
					</tr>
				<?php }?>
			<?php }?>
			<?php if ($_smarty_tpl->getVariable('user')->value->profile->plan2){?>
				<?php if ($_smarty_tpl->getVariable('user')->value->user_type=="employee"&&$_smarty_tpl->getVariable('d')->value==0){?>
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
" <?php if ($_smarty_tpl->getVariable('user')->value->user_type=="proprietary"){?>disabled="disabled"<?php }?>></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->first_name);?>
</td>
						<td class="links"><span><?php if ($_smarty_tpl->getVariable('user_type')->value=="Administrador"){?><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
<?php }else{ ?><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'editar'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('user')->value->getId();?>
"<?php }?>><?php echo ucfirst($_smarty_tpl->getVariable('user')->value->profile->last_name);?>
</a><?php }?></span></td>
						<td class="links"><a href="mailto:<?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
"><?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
</a></td>
						<td><?php echo ucfirst($_smarty_tpl->getVariable('user_type')->value);?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('user')->value->username;?>
</td><?php $_smarty_tpl->tpl_vars['d'] = new Smarty_variable($_smarty_tpl->getVariable('d')->value+1, null, null);?>
					</tr>
				<?php }?>
			<?php }?>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php }} ?>
       </table>
      </form>
<?php }?>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>