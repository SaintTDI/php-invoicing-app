<?php /* Smarty version Smarty-3.0.8, created on 2015-02-15 22:49:33
         compiled from "/var/www/app/templates/./contacto/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84203537454e1146dd0bae2-34575432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1a2067269d23525372679cea9a76e93d25de31d' => 
    array (
      0 => '/var/www/app/templates/./contacto/index.tpl',
      1 => 1423691215,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84203537454e1146dd0bae2-34575432',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','contacto');$_template->assign('subsection','index'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="boxes3">
	<div class="title2" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Contactos:</h3></label>
	</div>
	<div class="boton_top">
	        <label for="bt_">
	        		<a class="submit6" <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'agregar'),$_smarty_tpl);?>
"<?php }?> onclick="clearLocalStorage();">Nuevo contacto</a>
			</label>
	</div>
</div>
<?php if (count($_smarty_tpl->getVariable('contacts')->value)==0){?>
	<div class="title" id="form_total_contacts">
		<label for="form_total_contacts">No tiene contactos actualmente.</label>
	</div>
	<div id="parrafo2">
	        <p>&#x2771; Registrar tus Contactos acelera la creaci&oacute;n de facturas, presupuestos, gastos y &oacute;rdenes de compra.</p>
	</div>
	<div id="parrafo6">
	        <p>&#x2771; Adem&aacute;s, en la ficha de cada Contacto que hayas dado de alta podr&aacute;s ver r&aacute;pidamente todo el detalle comercial.</p>
	</div>
<?php }else{ ?>
    	   <form method="post" action="<?php echo smarty_function_geturl(array('action'=>'index'),$_smarty_tpl);?>
">
    	    <table class="table_p">
    	  	 <tr>
    	  		<td class="table_button"><button class="submit7" type="submit" name="delete" id="delete" value="delete" onclick="return confirmDone5()">Borrar</button></td>
			<td class="table_p_top">Nombres</td>
			<td class="table_p_top">Apellidos</td>
			<td class="table_p_top">Compan&iacute;a</td>
			<td class="table_p_top">Email</td>
			<td class="table_p_top">M&oacute;vil</td>
			<td class="table_p_top">Relaci&oacute;n</td>
		</tr>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('contacts')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value){
?>
			<tr>
				<td class="table_input"><input type="checkbox" name="contact_id[]" value="<?php echo $_smarty_tpl->getVariable('contact')->value->getId();?>
"></td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('contact')->value->profile->first_name);?>
 <?php echo ucfirst($_smarty_tpl->getVariable('contact')->value->profile->middle_name);?>
</td>
				<td class="links"><span><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>href="<?php echo smarty_function_geturl(array('action'=>'fichacontacto'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('contact')->value->getId();?>
"<?php }?> onclick="clearLocalStorage();"><?php echo ucfirst($_smarty_tpl->getVariable('contact')->value->profile->last_name);?>
 <?php echo ucfirst($_smarty_tpl->getVariable('contact')->value->profile->second_last_name);?>
</a></span></td>
				<td class="links"><?php if ($_smarty_tpl->getVariable('contact')->value->profile->company_id){?><a <?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?>class="fancybox fancybox.iframe" href="<?php echo smarty_function_geturl(array('controller'=>'compania','action'=>'editarcompania'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('contact')->value->profile->company_id;?>
&id2=<?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->getVariable('contact')->value->profile->company_id, null, null);?><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companieslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?><?php if ($_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('b')->value]==$_smarty_tpl->getVariable('id')->value){?><?php if (is_array($_smarty_tpl->getVariable('address_')->value[$_smarty_tpl->getVariable('b')->value])){?><?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('address_')->value[$_smarty_tpl->getVariable('b')->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value){
?><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
<?php break 1?><?php }} ?><?php }else{ ?><?php echo $_smarty_tpl->getVariable('address_')->value[$_smarty_tpl->getVariable('b')->value];?>
<?php break 1?><?php }?><?php }?><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable($_smarty_tpl->getVariable('b')->value+1, null, null);?><?php }} ?>&doc_type=ccompany&doc_id=<?php echo $_smarty_tpl->getVariable('contact')->value->profile->company_id;?>
&popup=true"<?php }?>><?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->getVariable('contact')->value->profile->company_id, null, null);?><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companieslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?><?php if ($_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('b')->value]==$_smarty_tpl->getVariable('id')->value){?><?php echo ucfirst($_smarty_tpl->getVariable('company_')->value[$_smarty_tpl->getVariable('b')->value]);?>
<?php $_smarty_tpl->tpl_vars['vacio'] = new Smarty_variable(true, null, null);?><?php break 1?><?php }?><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable($_smarty_tpl->getVariable('b')->value+1, null, null);?><?php }} ?></a><?php if (!isset($_smarty_tpl->getVariable('vacio',null,true,false)->value)){?>N/A<?php }?><?php }elseif($_smarty_tpl->getVariable('contact')->value->profile->thecompany&&!$_smarty_tpl->getVariable('contact')->value->profile->company_id){?><?php echo ucfirst($_smarty_tpl->getVariable('contact')->value->profile->thecompany);?>
<?php }else{ ?>N/A<?php }?></td>
				<td class="links"><a href="mailto:<?php echo $_smarty_tpl->getVariable('contact')->value->email;?>
"><?php echo $_smarty_tpl->getVariable('contact')->value->email;?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('contact')->value->profile->mobile_country;?>
 <?php echo $_smarty_tpl->getVariable('contact')->value->profile->mobile_area;?>
 <?php echo $_smarty_tpl->getVariable('contact')->value->profile->mobile;?>
</td>
				<td><?php echo ucfirst($_smarty_tpl->getVariable('contact')->value->profile->relationship);?>
</td>
			</tr>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php }} ?>
       </table>
      </form>
<?php }?>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>