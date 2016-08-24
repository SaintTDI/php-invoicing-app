<?php /* Smarty version Smarty-3.0.8, created on 2015-02-23 01:51:57
         compiled from "/var/www/app/templates/./contacto/companias.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109794602954ea79ad3985c2-85512218%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7fe7184437e6ba66ca357999dfbc485ee4f264d' => 
    array (
      0 => '/var/www/app/templates/./contacto/companias.tpl',
      1 => 1423691207,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109794602954ea79ad3985c2-85512218',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','contacto');$_template->assign('subsection','companias'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="boxes3">
	<div class="title2" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Compa&ntilde;ias:</h3></label>
	</div>
	<div class="boton_top">
	        <label for="bt_">
	        		<a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'agregarcompania'),$_smarty_tpl);?>
"<?php }?> onclick="clearLocalStorage();">Nueva Compa&ntilde;ia</a>
			</label>
	</div>
</div>
<?php if (count($_smarty_tpl->getVariable('companieslist')->value)==0){?>
	<div class="title" id="form_total_contacts">
		<label for="form_total_contacts">No existen compa&ntilde;&iacute;as actualmente.</label>
	</div>
	<div id="parrafo2">
	        <p>&#x2771; Registrar tus Compa&ntilde;ias Contactos acelera la creaci&oacute;n de facturas, presupuestos, gastos y &oacute;rdenes de compra.</p>
	</div>
	<div id="parrafo6">
	        <p>&#x2771; Adem&aacute;s, en la ficha de cada Compa&ntilde;ia Contacto que hayas dado de alta podr&aacute;s ver r&aacute;pidamente todo el detalle comercial.</p>
	</div>
<?php }else{ ?>
	  <form method="post" action="<?php echo smarty_function_geturl(array('action'=>'companias'),$_smarty_tpl);?>
">
    	    <table class="table_p">
    	  	 <tr>
    	  		<td class="table_button"><button class="submit7" type="submit" name="delete" id="delete" value="delete" onclick="return confirmDone5()">Borrar</button></td>
			<td class="table_p_top">Nombre</td>
			<td class="table_p_top">Industria</td>
			<td class="table_p_top">Especialidad</td>
			<td class="table_p_top">Email</td>
			<td class="table_p_top">Tel&eacute;fono</td>
			<td class="table_p_top">Relaci&oacute;n</td>
		</tr>
        <?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companieslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?>
			<tr>
				<td class="table_input"><input type="checkbox" name="company_id[]" value="<?php echo $_smarty_tpl->getVariable('company')->value->getId();?>
"></td>
				<td class="links"><span><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('controller'=>'contacto','action'=>'fichacompania'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('company')->value->getId();?>
"<?php }?> onclick="clearLocalStorage();"><?php echo ucfirst($_smarty_tpl->getVariable('company')->value->profile->thecompany);?>
</a></span></td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('company')->value->profile->company_industry);?>
</td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('company')->value->profile->company_specialty);?>
</td>
				<td class="links"><a href="mailto:<?php echo $_smarty_tpl->getVariable('company')->value->profile->email_c;?>
"><?php echo $_smarty_tpl->getVariable('company')->value->profile->email_c;?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('company')->value->profile->phone_country;?>
 <?php echo $_smarty_tpl->getVariable('company')->value->profile->phone_area;?>
 <?php echo $_smarty_tpl->getVariable('company')->value->profile->phone;?>
</td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('company')->value->profile->relationship);?>
</td>
			</tr>
        <?php }} ?>
       </table>
     </form>
<?php }?>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>