<?php /* Smarty version Smarty-3.0.8, created on 2015-02-15 22:54:28
         compiled from "/var/www/app/templates/./usuarios/agregar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177964012854e11594cc8bf0-74048930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2bd19eb3de2bc171b25b593c60184e4d95a2d92e' => 
    array (
      0 => '/var/www/app/templates/./usuarios/agregar.tpl',
      1 => 1423691351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177964012854e11594cc8bf0-74048930',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','usuarios');$_template->assign('subsection','agregar'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Agregar nuevo Usuario:</h3></label>
</div>

<form method="post" id="usr_id" action="<?php echo smarty_function_geturl(array('action'=>'agregar'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('fp')->value->user->getId();?>
" enctype="multipart/form-data" onsubmit="return emailsent()">

    <?php if ($_smarty_tpl->getVariable('fp')->value->hasError()){?>
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    <?php }?>
    
    <div class="row" id="form_user_email"> 
        <label for="form_user_email">Correo Electr&oacute;nico <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_user_email" name="email" value="<?php echo $_POST['email'];?>
" placeholder="Ej: ejemplo@webproadmin.com"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('email')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_user_first_name">
        <label for="form_user_first_name">Nombre <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_user_first_name" name="first_name" value="<?php echo $_POST['first_name'];?>
" placeholder="Nombre"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('first_name')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_user_last_name">
        <label for="form_user_last_name">Apellido <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_user_last_name" name="last_name" value="<?php echo $_POST['last_name'];?>
" placeholder="Apellido"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('last_name')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_contact_user_type">
    	<label for="form_contact_user_type">Perfil:</label>
        <select id="form_contact_user_type" name="user_type" onchange="hideOptions(this);">
			<option value="employee" <?php if ($_smarty_tpl->getVariable('plan')->value=="plan1"||$_smarty_tpl->getVariable('plan')->value=="trial_plan1"||$_POST['user_type']=="employee"){?>disabled="disabled"<?php }elseif($_GET['emp']){?>disabled="disabled"<?php }else{ ?>selected="selected"<?php }?>>Colaborador</option>
			<option value="accountant" <?php if ($_smarty_tpl->getVariable('plan')->value=="plan1"||$_smarty_tpl->getVariable('plan')->value=="trial_plan1"||$_POST['user_type']=="accountant"){?>selected="selected"<?php }elseif($_GET['acc']){?>disabled="disabled"<?php }?>>Contador</option>
		</select>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('user_type')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    <?php if ($_GET['emp']){?><?php }elseif($_smarty_tpl->getVariable('plan')->value=="plan1"||$_smarty_tpl->getVariable('plan')->value=="trial_plan1"){?><?php }else{ ?>
    <div class="row_accountant" id="form_accountant">
	    <div class="row" id="form_user_section">
	        <label for="form_user_section">Acceso(s):</label>
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Proyectos:</span>
	        <div class="user_check"><input type="checkbox" id="form_section6" name="section6" value="yes" checked="checked" /></div>
	        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('section6')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Contactos:</span>
	        <div class="user_check"><input type="checkbox" id="form_section7" name="section7" value="yes" checked="checked" /></div>
	        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('section7')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Productos/Servicios:</span>
	        <div class="user_check"><input type="checkbox" id="form_section8" name="section8" value="yes" checked="checked" /></div>
	        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('section8')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Finanzas:</span>
	        <div class="user_check"><input type="checkbox" id="form_section9" name="section9" value="yes" checked="checked" /></div>
	        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('section9')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Factura:</span>
	        <div class="user_check"><input type="checkbox" id="form_section1" name="section1" value="yes" checked="checked" /></div>
	        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('section1')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Gastos:</span>
	        <div class="user_check"><input type="checkbox" id="form_section2" name="section2" value="yes" checked="checked" /></div>
	        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('section2')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">&Oacute;rdenes de Compra:</span>
	        <div class="user_check"><input type="checkbox" id="form_section3" name="section3" value="yes" checked="checked" /></div>
	        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('section3')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Prespuestos:</span>
	        <div class="user_check"><input type="checkbox" id="form_section4" name="section4" value="yes" checked="checked" /></div>
	        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('section4')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    </div>
	    
	    <div class="row checkboxes" id="form_user_section">
	        <span for="form_user_section">Facturas Proforma:</span>
	        <div class="user_check"><input type="checkbox" id="form_section5" name="section5" value="yes" checked="checked" /></div>
	        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('section5')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    </div>
    </div>
    	<?php }?>
    <div class="row" id="form_username">
        <label for="form_username">Usuario <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_username" name="username" value="<?php echo $_POST['username'];?>
" placeholder="Usuario"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('username')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    <input type="hidden" id="form_company" name="company" value="<?php echo $_smarty_tpl->getVariable('username')->value;?>
" />
    <input type="hidden" id="form_thecompany" name="thecompany" value="<?php echo $_smarty_tpl->getVariable('thecompany')->value;?>
" />
     <input type="hidden" id="form_company_id" name="company_id" value="<?php echo $_smarty_tpl->getVariable('company_id')->value;?>
" />
    <input type="hidden" id="form_plan" name="plan" value="<?php echo $_smarty_tpl->getVariable('plan')->value;?>
" />
    <input type="hidden" id="form_contact" name="contact_id" value="0" />
    
    <div class="row" id="form_user_password">
        <label for="form_user_password">Contrase&ntilde;a <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="password" id="form_user_password" name="password" value="<?php echo $_POST['password'];?>
" placeholder="Contrase&ntilde;a"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('password')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_user_password2">
        <label for="form_user_password2">Confirmar Contrase&ntilde;a <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="password" id="form_user_password2" name="password2" value="<?php echo $_POST['password2'];?>
" placeholder="Confirmar Contrase&ntilde;a"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('password2')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>

	<div class="row">
    		<?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?><button class="submit" type="submit" name="add" id="add" value="add">Guardar</button><?php }?>
	</div>
	
	<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
    	</div>


</form>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>