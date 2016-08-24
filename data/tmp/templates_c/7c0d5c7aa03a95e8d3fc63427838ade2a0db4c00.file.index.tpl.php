<?php /* Smarty version Smarty-3.0.8, created on 2015-02-23 01:53:05
         compiled from "/var/www/app/templates/./proyectos/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17069797754ea79f1973d56-28453789%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c0d5c7aa03a95e8d3fc63427838ade2a0db4c00' => 
    array (
      0 => '/var/www/app/templates/./proyectos/index.tpl',
      1 => 1423691338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17069797754ea79f1973d56-28453789',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','proyectos');$_template->assign('subsection','index'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="boxes3">
	<div class="title2" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Proyectos:</h3></label>
	</div>
	<div class="boton_top">
	        <label for="bt_">
	       	 	<a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'agregar'),$_smarty_tpl);?>
"<?php }?> onclick="clearLocalStorage();">Nuevo proyecto</a>
			</label>
	</div>
</div>
<?php echo $_smarty_tpl->getVariable('out')->value;?>


<div class="title" id="form_total_project">
	<label for="form_total_invoices"><h3>Directorio de Proyectos:</h3></label>
</div>

<?php if (count($_smarty_tpl->getVariable('projects')->value)==0){?>
		<div class="title" id="form_total_invoices">
			<label for="form_total_invoices">No tiene proyectos actualmente.</label>
		</div>
		<div id="parrafo2">
		        <p>&#x2771; Controla las finanzas de cada uno de tus Proyectos. Establece tareas y as&iacute;gnales un l&iacute;der. Cronometra tu tiempo si has de facturar tu trabajo por horas.</p>
		</div>
		<div id="parrafo6">
		        <p>&#x2771; En cada proyecto tambi&eacute;n tendr&aacute;s un relaci&oacute;n de todos los documentos vinculados, para que agilices tu gesti&oacute;n.</p>
		</div>
<?php }else{ ?>
    	   <form method="post" id="projec_id" action="<?php echo smarty_function_geturl(array('action'=>'index'),$_smarty_tpl);?>
">
    	    <table class="table_p">
    	  	 <tr>
    	  		<td class="table_button"><button class="submit7" type="submit" name="delete" id="delete" value="delete" onclick="return confirmDone5()">Borrar</button></td>
			<td class="table_p_top">Proyecto</td>
			<td class="table_p_top">Cliente</td>
			<td class="table_p_top">Inicio</td>
			<td class="table_p_top">Duraci&oacute;n</td>
			<td class="table_p_top">Prespuesto <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>(b&#36)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>(&#162;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>(&#128;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>(Q)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>(L)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>(C&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>(B/.)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>(&#8370;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>(S/.)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>(&#163;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>(Bs.)<?php }else{ ?>(&#128;)<?php }?></td>
			<td class="table_p_top">Responsable</td>
		</tr>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['project'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('projects')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['project']->key => $_smarty_tpl->tpl_vars['project']->value){
?>
			<tr>
				<td class="table_input"><input type="checkbox" name="project_id[]" value="<?php echo $_smarty_tpl->getVariable('project')->value->getId();?>
"></td>
				<td class="links"><span><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'fichaproyecto'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('project')->value->getId();?>
"<?php }?>><?php echo ucfirst($_smarty_tpl->getVariable('project')->value->project_title);?>
</a></span></td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('project')->value->profile->client);?>
</td>
				<td><?php if ($_smarty_tpl->getVariable('project')->value->profile->start){?><?php echo $_smarty_tpl->getVariable('project')->value->profile->start;?>
<?php }else{ ?>N/A<?php }?></td>
				<td><?php echo $_smarty_tpl->getVariable('timeleft')->value[$_smarty_tpl->getVariable('project')->value->getId()];?>
</td>
				<td><?php echo number_format($_smarty_tpl->getVariable('project')->value->profile->budget,2,',','.');?>
</td>
				<td><?php echo substr(ucfirst($_smarty_tpl->getVariable('project')->value->profile->responsible),0,30);?>
</td>
			</tr>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php }} ?>
       </table>
      </form>
<?php }?>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>