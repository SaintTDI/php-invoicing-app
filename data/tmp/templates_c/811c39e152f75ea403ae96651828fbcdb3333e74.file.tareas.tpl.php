<?php /* Smarty version Smarty-3.0.8, created on 2015-02-23 01:51:49
         compiled from "/var/www/app/templates/./proyectos/tareas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87911555954ea79a5be55d4-84860222%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '811c39e152f75ea403ae96651828fbcdb3333e74' => 
    array (
      0 => '/var/www/app/templates/./proyectos/tareas.tpl',
      1 => 1423691338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87911555954ea79a5be55d4-84860222',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','proyectos');$_template->assign('subsection','tareas'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="boxes3">
	<div class="title2" id="form_total_project">
		<label for="form_total_invoices"><h3>Tareas:</h3></label>
	</div>
	<div class="boton_top">
	        <label for="bt_">
	       	 	<a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'agregartarea'),$_smarty_tpl);?>
"<?php }?> onclick="clearLocalStorage();">Nueva Tarea</a>
			</label>
	</div>
</div>
<?php if (count($_smarty_tpl->getVariable('tasks')->value)==0){?>
		<div class="title" id="form_total_invoices">
			<label for="form_total_invoices">No hay tareas registradas</label>
		</div>
<?php }else{ ?>
    	   <form method="post" id="projec_id" action="<?php echo smarty_function_geturl(array('action'=>'tareas'),$_smarty_tpl);?>
">
    	    <table class="table_p">
    	  	 <tr>
    	  		<td class="table_button"><button class="submit7" type="submit" name="delete" id="delete" value="delete" onclick="return confirmDone5()">Borrar</button></td>
			<td class="table_p_top">Tarea</td>
			<td class="table_p_top">Proyecto</td>
			<td class="table_p_top">Inicio</td>
			<td class="table_p_top">Duraci&oacute;n</td>
			<td class="table_p_top">Horas</td>
			<td class="table_p_top">Responsable</td>
		</tr>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['task'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tasks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['task']->key => $_smarty_tpl->tpl_vars['task']->value){
?>
			<tr>
				<td class="table_input"><input type="checkbox" name="task_id[]" value="<?php echo $_smarty_tpl->getVariable('task')->value->getId();?>
"></td>
				<td class="links"><span><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'editartarea'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('task')->value->getId();?>
"<?php }?>><?php echo ucfirst($_smarty_tpl->getVariable('task')->value->profile->task_title);?>
</a></span></td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('task')->value->profile->project);?>
</td>
				<td><?php if ($_smarty_tpl->getVariable('task')->value->profile->start){?><?php echo $_smarty_tpl->getVariable('task')->value->profile->start;?>
<?php }else{ ?>N/A<?php }?></td>
				<td><?php echo $_smarty_tpl->getVariable('timeleft')->value[$_smarty_tpl->getVariable('task')->value->getId()];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('hours2')->value[$_smarty_tpl->getVariable('task')->value->getId()];?>
</td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('task')->value->profile->responsible);?>
</td>
			</tr>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php }} ?>
       </table>
      </form>
<?php }?>



<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>