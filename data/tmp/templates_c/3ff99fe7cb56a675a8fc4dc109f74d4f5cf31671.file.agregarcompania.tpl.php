<?php /* Smarty version Smarty-3.0.8, created on 2015-02-23 01:52:02
         compiled from "/var/www/app/templates/./contacto/agregarcompania.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100022748454ea79b293e586-14929401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ff99fe7cb56a675a8fc4dc109f74d4f5cf31671' => 
    array (
      0 => '/var/www/app/templates/./contacto/agregarcompania.tpl',
      1 => 1423691206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100022748454ea79b293e586-14929401',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','contacto');$_template->assign('subsection','agregarcompania'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<script type="text/javascript"> 		
 			jQuery(document).ready(function() {
      				jQuery('#form_irpf').autoNumeric("init");
			});
</script>
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Nueva Compa&ntilde;ia Contacto:</h3></label>
</div>
<form method="post" id="comp_id" action="<?php echo smarty_function_geturl(array('action'=>'agregarcompania'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('fp')->value->company->getId();?>
" enctype="multipart/form-data">
    <?php if ($_smarty_tpl->getVariable('fp')->value->hasError()){?>
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    <?php }?>
    
    <input type="hidden" id="form_comp_doc_type" name="comp_doc_type" value="contact">
    
    
	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_thecompany_container">
		        <label for="form_thecompany">Raz&oacute;n Social <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_thecompany" name="thecompany" value="<?php echo $_POST['thecompany'];?>
" placeholder="Empresa, sociedad o persona"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('thecompany')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
	        <?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fp')->value->companyProfile; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['label']->key;
?>
	                <?php if ($_smarty_tpl->tpl_vars['label']->value=='Industry'){?>
	     				<div class="row" id="form_industry_container">
	     				<label for="form_industry">&Aacute;rea o Sector:</label>
	        				<select id="form_industry" name="company_industry" class="stored"/>
	       						<option value="" <?php if ($_POST['company_industry']==''){?> selected="selected" <?php }?>>Seleccione...</option>
								<option value="Agricultura" <?php if ($_POST['company_industry']=='Agricultura'){?> selected="selected" <?php }?>>Agricultura</option>
								<option value="Actividades Culturales" <?php if ($_POST['company_industry']=='Actividades Culturales'){?> selected="selected" <?php }?>>Actividades Culturales</option>
								<option value="Actividades Deportivas" <?php if ($_POST['company_industry']=='Actividades Deportivas'){?> selected="selected" <?php }?>>Actividades Deportivas</option>
								<option value="Medicina y Salud" <?php if ($_POST['company_industry']=='Medicina y Salud'){?> selected="selected" <?php }?>>Medicina y Salud</option>
								<option value="Fabricaci&oacute;n Artesanal" <?php if ($_POST['company_industry']=='Fabricacion Artesanal'){?> selected="selected" <?php }?>>Fabricaci&oacute;n Artesanal</option>
								<option value="Veterinaria" <?php if ($_POST['company_industry']=='Veterinaria'){?> selected="selected" <?php }?>>Veterinaria</option>
								<option value="Administraci&oacute;n P&uacute;blica" <?php if ($_POST['company_industry']=='Administracion Publica'){?> selected="selected" <?php }?>>Administraci&oacute;n P&uacute;blica</option>
								<option value="Alimentaci&oacute;n y Bebidas" <?php if ($_POST['company_industry']=='Alimentacion y Bebidas'){?> selected="selected" <?php }?>>Alimentaci&oacute;n y Bebidas</option>
								<option value="Artes gr&aacute;ficas" <?php if ($_POST['company_industry']=='Artes graficas'){?> selected="selected" <?php }?>>Artes gr&aacute;ficas</option>
								<option value="Artes y Espect&aacute;culos" <?php if ($_POST['company_industry']=='Artes y Espectaculos'){?> selected="selected" <?php }?>>Artes y Espect&aacute;culos</option>
								<option value="Asesor&iacute;a Contable" <?php if ($_POST['company_industry']=='Asesoria Contable'){?> selected="selected" <?php }?>>Asesor&iacute;a Contable</option>
								<option value="Asesor&iacute;a Jur&iacute;dica" <?php if ($_POST['company_industry']=='Asesoria Juridica'){?> selected="selected" <?php }?>>Asesor&iacute;a Jur&iacute;dica</option>
								<option value="Audiovisual" <?php if ($_POST['company_industry']=='Audiovisual'){?> selected="selected" <?php }?>>Audiovisual</option>
								<option value="Automoci&oacute;n" <?php if ($_POST['company_industry']=='Automocion'){?> selected="selected" <?php }?>>Automoci&oacute;n</option>
								<option value="Comercio al por Mayor" <?php if ($_POST['company_industry']=='Comercio al por Mayor'){?> selected="selected" <?php }?>>Comercio al por Mayor</option>
								<option value="Comercio al por Meno" <?php if ($_POST['company_industry']=='Comercio al por Meno'){?> selected="selected" <?php }?>>Comercio al por Menor</option>
								<option value="Construcci&oacute;n" <?php if ($_POST['company_industry']=='Construccion'){?> selected="selected" <?php }?>>Construcci&oacute;n</option>
								<option value="Defensa" <?php if ($_POST['company_industry']=='Defensa'){?> selected="selected" <?php }?>>Defensa</option>
								<option value="Editorial" <?php if ($_POST['company_industry']=='Editorial'){?> selected="selected" <?php }?>>Editorial</option>
								<option value="Educaci&oacute;n" <?php if ($_POST['company_industry']=='Educacion'){?> selected="selected" <?php }?>>Educaci&oacute;n</option>
								<option value="Ganader&iacute;a" <?php if ($_POST['company_industry']=='Ganaderia'){?> selected="selected" <?php }?>>Ganader&iacute;a</option>
								<option value="Gesti&oacute;n de residuos" <?php if ($_POST['company_industry']=='Gestion de residuos'){?> selected="selected" <?php }?>>Gesti&oacute;n de residuos</option>
								<option value="Hosteler&iacute;a" <?php if ($_POST['company_industry']=='Hosteleria'){?> selected="selected" <?php }?>>Hosteler&iacute;a</option>
								<option value="Fabricaci&oacute;n Industrial" <?php if ($_POST['company_industry']=='Fabricacion Industrial'){?> selected="selected" <?php }?>>Fabricaci&oacute;n Industrial</option>
								<option value="Inform&aacute;tica" <?php if ($_POST['company_industry']=='Informatica'){?> selected="selected" <?php }?>>Inform&aacute;tica</option>
								<option value="Miner&iacute;a" <?php if ($_POST['company_industry']=='Mineria'){?> selected="selected" <?php }?>>Miner&iacute;a</option>
								<option value="Otras actividades profesionales, cient&iacute;ficas y t&eacute;cnicas" <?php if ($_POST['company_industry']=='Otras actividades profesionales, cientificas y tecnicas'){?> selected="selected" <?php }?>>Otras actividades profesionales, cient&iacute;ficas y t&eacute;cnicas</option>
								<option value="Farmacia" <?php if ($_POST['company_industry']=='Farmacia'){?> selected="selected" <?php }?>>Farmacia</option>
								<option value="Pesca / acuicultura" <?php if ($_POST['company_industry']=='Pesca / acuicultura'){?> selected="selected" <?php }?>>Pesca / acuicultura</option>
								<option value="Promoci&oacute;n y gesti&oacute;n Inmobiliaria" <?php if ($_POST['company_industry']=='Promocion y gestion Inmobiliaria'){?> selected="selected" <?php }?>>Promoci&oacute;n y gesti&oacute;n Inmobiliaria</option>
								<option value="Publicidad y estudios de mercado" <?php if ($_POST['company_industry']=='Publicidad y estudios de mercado'){?> selected="selected" <?php }?>>Publicidad y estudios de mercado</option>
								<option value="Reparaci&oacute;n y Mantenimiento" <?php if ($_POST['company_industry']=='Reparacion y Mantenimiento'){?> selected="selected" <?php }?>>Reparaci&oacute;n y Mantenimiento</option>
								<option value="Seguridad Privada" <?php if ($_POST['company_industry']=='Seguridad Privada'){?> selected="selected" <?php }?>>Seguridad Privada</option>
								<option value="Servicios de Arquitectura y paisajismo" <?php if ($_POST['company_industry']=='Servicios de Arquitectura y paisajismo'){?> selected="selected" <?php }?>>Servicios de Arquitectura y paisajismo</option>
								<option value="Servicios de Ingenier&iacute;a" <?php if ($_POST['company_industry']=='Servicios de Ingenieria'){?> selected="selected" <?php }?>>Servicios de Ingenier&iacute;a</option>
								<option value="Servicios de Recursos Humanos" <?php if ($_POST['company_industry']=='Servicios de Recursos Humanos'){?> selected="selected" <?php }?>>Servicios de Recursos Humanos</option>
								<option value="Transporte" <?php if ($_POST['company_industry']=='Transporte'){?> selected="selected" <?php }?>>Transporte</option>
								<option value="Servicios Financieros" <?php if ($_POST['company_industry']=='Servicios Financieros'){?> selected="selected" <?php }?>>Servicios Financieros</option>
								<option value="Telecomunicaciones" <?php if ($_POST['company_industry']=='Telecomunicaciones'){?> selected="selected" <?php }?>>Telecomunicaciones</option>
								<option value="Turismo" <?php if ($_POST['company_industry']=='Turismo'){?> selected="selected" <?php }?>>Turismo</option>
								<option value="Seguros y Reaseguros" <?php if ($_POST['company_industry']=='Seguros y Reaseguros'){?> selected="selected" <?php }?>>Seguros y Reaseguros</option>
								<option value="Qu&iacute;mica" <?php if ($_POST['company_industry']=='Quimica'){?> selected="selected" <?php }?>>Qu&iacute;mica</option>
							</select>
	        					<?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('company_industry')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    					</div>
	                	<?php }?>
	        <?php }} ?>
		</div>
		<div class="form_right">
		    <div class="row" id="form_identification_container">
		        <label for="form_identification">Identificaci&oacute;n Fiscal:</label>
		        <input type="text" class="stored" id="form_identification" name="identification" value="<?php echo $_POST['identification'];?>
" placeholder="Ej: 99999999-R"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('identification')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
	        <?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fp')->value->companyProfile; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['label']->key;
?>
	                <?php if ($_smarty_tpl->tpl_vars['label']->value=='Specialty'){?>
	                		<div class="row" id="form_specialty_container">
	                			<label for="form_specialty">Especialidad:</label>
							<input type="text" class="stored" id="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" maxlength="200" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="<?php echo $_POST[$_smarty_tpl->getVariable('key')->value];?>
" placeholder="Ej: Branding y Mercadeo"/> 
	                	     	<?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError($_smarty_tpl->tpl_vars['key']->value)); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	                	    </div>
	                	<?php }?>
	        <?php }} ?>
		</div>
	</div>

	<div class="form_box">
		<div class="row" id="form_add">
	    <?php if (count($_smarty_tpl->getVariable('addresses')->value)==0){?>
	        <label for="form_address">Direcci&oacute;n:</label>
	        <?php $_template = new Smarty_Internal_Template('direccion/direcciones.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    		<a class="fancybox fancybox.iframe submit2" href="<?php echo smarty_function_geturl(array('controller'=>'direccion','action'=>'agregardirecciones'),$_smarty_tpl);?>
?doc_type=ccompany&doc_id=<?php echo $_smarty_tpl->getVariable('company_id2')->value;?>
">Agregar Direcci&oacute;n</a>
	    <?php }else{ ?>
	    		<label for="form_address">Direcci&oacute;n:</label>
	        <?php $_template = new Smarty_Internal_Template('direccion/direcciones.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	        <a class="fancybox fancybox.iframe submit2" href="<?php echo smarty_function_geturl(array('controller'=>'direccion','action'=>'agregardirecciones'),$_smarty_tpl);?>
?doc_type=ccompany&doc_id=<?php echo $_smarty_tpl->getVariable('company_id2')->value;?>
">Agregar Direcci&oacute;n</a>
	    <?php }?>
		</div>
	</div>

	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_email_container">
		        <label for="form_email">Email Principal <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_email" name="email_c" value="<?php echo $_POST['email_c'];?>
" placeholder="Ej: ejemplo@webproadmin.com"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('email_c')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		     <?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fp')->value->companyProfile; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['label']->key;
?>
		     <div class="row" id="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_container">
		     	<?php if ($_smarty_tpl->tpl_vars['label']->value=='Website'){?>
		     		<label for="form_<?php echo $_smarty_tpl->tpl_vars['label']->value;?>
">Sitio Web:</label>
		     		<span class="url">http://www.</span>
		     		<input class="url_add stored" type="text" id="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" maxlength="200" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="<?php echo $_POST[$_smarty_tpl->getVariable('key')->value];?>
" placeholder="Ej: pagina.com"/>   
		    		    <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError($_smarty_tpl->tpl_vars['key']->value)); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		     	<?php }?>
		     </div>
		     <?php }} ?>
		    <div class="row" id="form_phone_container">
		        <label for="form_phone">Tel&eacute;fono Principal:</label>
		        <input class="phone stored" type="text" id="form_phone_country" name="phone_country" value="<?php echo $_POST['phone_country'];?>
" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_phone_area" name="phone_area" value="<?php echo $_POST['phone_area'];?>
" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_phone" name="phone" value="<?php echo $_POST['phone'];?>
" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('phone')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_email2_container">
		        <label for="form_email2">Email Secundario:</label>
		        <input type="text" class="stored" id="form_email2" name="email2" value="<?php echo $_POST['email2'];?>
" placeholder="Ej: ejemplo@webproadmin.com"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('email2')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		     <?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fp')->value->companyProfile; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['label']->key;
?>
		     <div class="row" id="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_container">
		     	<?php if ($_smarty_tpl->tpl_vars['label']->value=='Twitter'){?>
		     		<label for="form_<?php echo $_smarty_tpl->tpl_vars['label']->value;?>
">Cuenta en Twitter:</label>
		     		<input class="twitter" type="text" id="form_help" name="help" value="https://twitter.com/" disabled="disabled" />
		     		<input class="t_user stored" type="text" id="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" maxlength="200" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="<?php echo $_POST[$_smarty_tpl->getVariable('key')->value];?>
" placeholder="Ej: usuario"/>   
		    		    <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError($_smarty_tpl->tpl_vars['key']->value)); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		     	<?php }?>
		     </div>
		     <?php }} ?>
		    <div class="row" id="form_phone2_container">
		        <label for="form_phone2">Tel&eacute;fono Secundario:</label>
		        <input class="phone stored" type="text" id="form_phone2_country" name="phone2_country" value="<?php echo $_POST['phone2_country'];?>
" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_phone2_area" name="phone2_area" value="<?php echo $_POST['phone2_area'];?>
" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_phone2" name="phone2" value="<?php echo $_POST['phone2'];?>
" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('phone2')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		</div>
	</div>
	
	
	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_fax_container">
		        <label for="form_fax">Fax:</label>
		        <input class="phone stored" type="text" id="form_fax_country" name="fax_country" value="<?php echo $_POST['fax_country'];?>
" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_fax_area" name="fax_area" value="<?php echo $_POST['fax_area'];?>
" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_fax" name="fax" value="<?php echo $_POST['fax'];?>
" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('fax')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		</div>
		<div class="form_right">
		  <div class="row" id="form_company_relationship">
		    	<label for="form_company_relationship">Relaci&oacute;n:</label>
		        <select id="form_company_relationship" name="relationship" class="stored"/>
		       		<option value="" <?php if ($_POST['relationship']==''){?> selected="selected" <?php }?>>Seleccione...</option>
					<option value="proveedor" <?php if ($_POST['relationship']=='proveedor'){?> selected="selected" <?php }?>>Proveedor</option>
		        		<option value="cliente" <?php if ($_POST['relationship']=='cliente'){?> selected="selected" <?php }?>>Cliente</option>
		        		<option value="potencial" <?php if ($_POST['relationship']=='potencial'){?> selected="selected" <?php }?>>Cliente Potencial</option>
		        		<option value="gobierno" <?php if ($_POST['relationship']=='gobierno'){?> selected="selected" <?php }?>>Gobierno</option>
				</select>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('relationship')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		</div>
	</div>

	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_recc_">
		    		<span for="form_recc__">Acogida al RECC:</span>
		    		<input type="checkbox" class="stored" id="form_recc" name="recc" value="true" <?php if ($_POST['recc']){?>checked="checked"<?php }?>> 
			</div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_irpf_">
		    		<label for="form_irpf__">Retenci&oacute;n IRPF (&#37;):</label>
		        <input type="text" class="stored" id="form_irpf" name="irpf" value="<?php echo $_POST['irpf'];?>
" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Escribe 24&#x25; para el 24 de retenci&oacute;n"/>
			</div>
		</div>
	</div>
	
	<div class="row" id="form_notes_container">
    		<label for="form_notes">Notas Personales:</label>
    		<textarea class="big_textarea stored" id="form_notes" name="notes" rows="10" cols="50" placeholder="Coloca aqu&iacute; cualquier nota o comentario personal sobre este perfil. Lo que escribas s&oacute;lo ser&aacute; visible para los usuarios de tu cuenta."><?php echo $_POST['notes'];?>
</textarea>
    		<?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('notes')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    	</div>
    	
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