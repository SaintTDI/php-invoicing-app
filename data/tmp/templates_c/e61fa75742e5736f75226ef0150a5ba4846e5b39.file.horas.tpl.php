<?php /* Smarty version Smarty-3.0.8, created on 2015-06-23 13:16:02
         compiled from "/var/www/app/templates/./proyectos/horas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116576013355893ff28e7756-24328732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e61fa75742e5736f75226ef0150a5ba4846e5b39' => 
    array (
      0 => '/var/www/app/templates/./proyectos/horas.tpl',
      1 => 1423691337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116576013355893ff28e7756-24328732',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','proyectos');$_template->assign('subsection','horas'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>


<script type="text/javascript">
		function openpopup(popurl,winName){
		    winpops=window.open(popurl,winName,'toolbar=no,location=no,status=no,menubar=yes,scrollbars=no,resizable=yes,width=650px,height=750px,left=200px,top=200px,scrollbars=no',true)
		    winpops.focus();
		} 
</script>

<div class="boxes3">
	<div class="title2" id="form_total_project">
		<label for="form_total_invoices"><h3>Contador Horas:</h3></label>
	</div>
	<div class="boton_top">
	        <label for="bt_"><a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('controller'=>'proyectos','action'=>'agregarhora'),$_smarty_tpl);?>
?doc_type=ventana" onclick="openpopup(this.href,'window1'); return false;"<?php }?>>Agregar Horas</a></label>
	</div>
</div>

<?php if (count($_smarty_tpl->getVariable('times')->value)==0){?>
		<div class="title" id="form_total_invoices">
			<label for="form_total_invoices">No hay Horas registradas.</label>
		</div>
<?php }else{ ?>
    	   <form method="post" id="projec_id" action="<?php echo smarty_function_geturl(array('action'=>'horas'),$_smarty_tpl);?>
">
    	    <table class="table_p">
    	  	 <tr>
    	  		<td class="table_button"><button class="submit7" type="submit" name="delete" id="delete" value="delete" onclick="return confirmDone5()">Borrar</button></td>
			<td class="table_p_top">Fecha</td>
			<td class="table_p_top">Proyecto</td>
			<td class="table_p_top">Tarea</td>
			<td class="table_p_top">Duraci&oacute;n</td>
			<td class="table_button"><button class="submit7" type="submit" name="convert" id="convert" value="convert" onclick="return confirmDone4()">Facturar</button></td>
		</tr>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['time'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('times')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['time']->key => $_smarty_tpl->tpl_vars['time']->value){
?>
			<tr>
				<td class="table_input"><input type="checkbox" id="form_time_id" name="time_id[]" value="<?php echo $_smarty_tpl->getVariable('time')->value->getId();?>
"></td>
				<td class="links"><span><?php if ($_smarty_tpl->getVariable('time')->value->profile->transformed){?><?php echo ucfirst($_smarty_tpl->getVariable('time')->value->profile->date_time);?>
<?php }else{ ?><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('controller'=>'proyectos','action'=>'editarhora'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('time')->value->getId();?>
&doc_type=ventana" onclick="openpopup(this.href,'window2'); return false;"<?php }?>><?php echo ucfirst($_smarty_tpl->getVariable('time')->value->profile->date_time);?>
</a><?php }?></span></td>
				<td><?php if ($_smarty_tpl->getVariable('time')->value->profile->project){?><?php echo ucfirst($_smarty_tpl->getVariable('time')->value->profile->project);?>
<?php }else{ ?>N/A<?php }?></td>
				<td><?php if ($_smarty_tpl->getVariable('time')->value->profile->task){?><?php echo ucfirst($_smarty_tpl->getVariable('time')->value->profile->task);?>
<?php }else{ ?>N/A<?php }?></td>
				<td><?php echo $_smarty_tpl->getVariable('time')->value->profile->time_;?>
</td>
				<td class="table_input"><input type="checkbox" id="form_time_id2" name="time_id2[]" value="<?php echo $_smarty_tpl->getVariable('time')->value->getId();?>
" <?php if ($_smarty_tpl->getVariable('time')->value->profile->transformed){?>disabled<?php }?>></td>
			</tr>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php }} ?>
       </table>
      </form>
<?php }?>


<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>