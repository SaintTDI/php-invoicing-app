<?php /* Smarty version Smarty-3.0.8, created on 2015-11-20 07:14:16
         compiled from "/var/www/app/templates/./recomendador/registro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:870630863564eba3890f8f2-35240114%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe5a0e7c83bd705445148b3131bcb40f81346260' => 
    array (
      0 => '/var/www/app/templates/./recomendador/registro.tpl',
      1 => 1423691345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '870630863564eba3890f8f2-35240114',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','recomendador'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

<div id="registro">
	<div class="titulo">
		<label for="form_total_invoices">Registro exclusivo de Asociaciones y Advisors:</label>
	</div>
<form method="post" id="rec_id" action="<?php echo smarty_function_geturl(array('action'=>'registro'),$_smarty_tpl);?>
">

    <div class="row" id="form_email_container">
    		<label for="form_email">Correo Electr&oacute;nico:</label>
        <input type="text" id="form_email" name="email" value="<?php if ($_GET['email']){?><?php echo $_GET['email'];?>
<?php }else{ ?><?php echo $_POST['email'];?>
<?php }?>" placeholder="Email" />
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('email')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
   
    <div class="row" id="form_first_name_container">
    		<label for="form_first_name">Nombre:</label>
        <input type="first_name" id="form_first_name" name="first_name" value="<?php echo $_POST['first_name'];?>
" placeholder="Nombre" />
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('first_name')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_country_container">
    	<label for="form_country">Pa&iacute;s:</label>
        <select id="form_country" name="country"/>
        		<option value="AR" <?php if ($_POST['country']=='AR'){?>selected="selected" <?php }?>>Argentina</option>
        		<option value="BO" <?php if ($_POST['country']=='BO'){?>selected="selected" <?php }?>>Bolivia</option>
        		<option value="CL" <?php if ($_POST['country']=='CL'){?>selected="selected" <?php }?>>Chile</option>
        		<option value="CO" <?php if ($_POST['country']=='CO'){?>selected="selected" <?php }?>>Colombia</option>
        		<option value="CR" <?php if ($_POST['country']=='CR'){?>selected="selected" <?php }?>>Costa Rica</option>
        		<option value="DO" <?php if ($_POST['country']=='DO'){?>selected="selected" <?php }?>>Rep&uacute;blica Dominicana</option>
        		<option value="EC" <?php if ($_POST['country']=='EC'){?>selected="selected" <?php }?>>Ecuador</option>
        		<option value="SV" <?php if ($_POST['country']=='SV'){?>selected="selected" <?php }?>>El Salvador</option>
        		<option value="US" <?php if ($_POST['country']=='US'){?>selected="selected" <?php }?>>Estados Unidos</option>
        		<option value="ES" <?php if ($_POST['country']=='ES'||$_POST['country']==''){?>selected="selected" <?php }?>>Espa&ntilde;a</option>
        		<option value="GT" <?php if ($_POST['country']=='GT'){?>selected="selected" <?php }?>>Guatemala</option>
        		<option value="HN" <?php if ($_POST['country']=='HN'){?>selected="selected" <?php }?>>Honduras</option>
        		<option value="MX" <?php if ($_POST['country']=='MX'){?>selected="selected" <?php }?>>M&eacute;xico</option>
        		<option value="NI" <?php if ($_POST['country']=='NI'){?>selected="selected" <?php }?>>Nicaragua</option>
        		<option value="PA" <?php if ($_POST['country']=='PA'){?>selected="selected" <?php }?>>Panam&aacute;</option>
        		<option value="PG" <?php if ($_POST['country']=='PG'){?>selected="selected" <?php }?>>Paraguay</option>
        		<option value="PE" <?php if ($_POST['country']=='PE'){?>selected="selected" <?php }?>>Per&uacute;</option>
        		<option value="PR" <?php if ($_POST['country']=='PR'){?>selected="selected" <?php }?>>Puerto Rico</option>
        		<option value="UY" <?php if ($_POST['country']=='UY'){?>selected="selected" <?php }?>>Uruguay</option>
        		<option value="VE" <?php if ($_POST['country']=='VE'){?>selected="selected" <?php }?>>Venezuela</option>
		</select>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('country')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_phone_container">
    		<label for="form_phone">Tel&eacute;fono:</label>
        <input type="phone" id="form_phone" name="phone" value="<?php echo $_POST['phone'];?>
" onkeypress='validate(event)' placeholder="Tel&eacute;fono" />
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('phone')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>

    <div class="row" id="form_contact_user_type">
    		<label for="form_contact_user_type">Perfil:</label>
        <select id="form_contact_user_type" name="user_type"/>
			<option value="advisor" <?php if ($_POST['user_type']=='advisor'||$_POST['user_type']==''){?>selected="selected" <?php }?>>Advisor Independiente</option>
			<option value="association" <?php if ($_POST['user_type']=='association'){?>selected="selected" <?php }?>>Asociaci&oacute;n Profesional</option>
		</select>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('user_type')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
 
    <div class="captcha">
    	<img src="/utility/captcha" alt="Captcha Image"/>
    </div>
    
    <div class="row" id="form_captcha_container">
    	<label for="form_captcha">Introduzca la frase:</label>
        <input type="text" id="form_captcha" name="captcha" value="<?php echo $_POST['captcha'];?>
" />
    <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('captcha')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
	<div class="row" id="form_agreement_container">
	        <span id="recover2"><input type="checkbox" id="form_agreement" name="agreement" value="yes" checked="checked"> Estoy de acuerdo con la <a class="fancybox fancybox.iframe submit2" href="<?php echo smarty_function_geturl(array('controller'=>'privacidad','action'=>'index'),$_smarty_tpl);?>
">Política de Privacidad</a> y las <a class="fancybox fancybox.iframe submit2" href="<?php echo smarty_function_geturl(array('controller'=>'condiciones','action'=>'index'),$_smarty_tpl);?>
">Condiciones de Uso</a>.</span>
	        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('agreement')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	 </div>
    
	<?php if ($_GET['action']=='confirm'){?>
	<input type="hidden" name="invited" value="<?php if ($_GET['id']){?><?php echo $_GET['id'];?>
<?php }else{ ?><?php echo $_POST['id'];?>
<?php }?>">
	<input type="hidden" name="invitation_code" value="<?php if ($_GET['key']){?><?php echo $_GET['key'];?>
<?php }else{ ?><?php echo $_POST['key'];?>
<?php }?>">
	<?php }?>
    
	<div class="row">
		    	<button class="submit" type="submit" name="register_" id="register_">Registrarme</button>
	</div>
	<div class="row">
	        	<span id="recover"><a href="<?php echo smarty_function_geturl(array('controller'=>'recomendador','action'=>'recuperarpassword'),$_smarty_tpl);?>
">Recuperar contrase&ntilde;a</a> &#x7C; <a href="<?php echo smarty_function_geturl(array('controller'=>'recomendador','action'=>'login'),$_smarty_tpl);?>
">Ingresar</a></span>
	</div>

</form>
</div>
    
<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>