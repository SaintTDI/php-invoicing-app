<?php /* Smarty version Smarty-3.0.8, created on 2015-02-16 01:57:52
         compiled from "/var/www/app/templates/./cuenta/registro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55430579554e14090149c81-62559944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cf683235370abf744bfd82ebd33f25681751c5b' => 
    array (
      0 => '/var/www/app/templates/./cuenta/registro.tpl',
      1 => 1424048235,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55430579554e14090149c81-62559944',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('headerlight.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','cuenta');$_template->assign('subsection','registro'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

<div id="registro">
	<div class="titulo-hi2">
		<label for="form_total_invoices">Facturaci&oacute;n Online F&aacute;cil</label>
	</div>
	
	<div class="titulo-lo2">
		<label for="form_total_invoices">Facturaci&oacute;n electr&oacute;nica y gesti&oacute;n de empresa<br>
										para aut&oacute;nomos y profesionales independientes.</label>
	</div>
	
	<div class="titulo-lo3">
		<label for="form_total_invoices">Pru&eacute;balo totalmente gratis por 30 d&iacute;as.<br>
										Sin compromiso. Sin tarjeta de cr&eacute;dito.</label>
	</div>

	<form id="registration_id" name="registration" method="post" action="<?php echo smarty_function_geturl(array('action'=>'registro'),$_smarty_tpl);?>
">
	
	    <div class="row" id="form_email_container">
	    	<label for="form_email">Correo Electr&oacute;nico <strong>&#x28;&#x2A;&#x29;</strong>:</label>
	        <input type="text" class="stored" id="form_email" name="email" value="<?php if ($_GET['email']){?><?php echo $_GET['email'];?>
<?php }else{ ?><?php echo $_POST['email'];?>
<?php }?>" placeholder="Email" />
	        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('email')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    </div>
	    
	    <div class="row" id="form_username_container">
	    	<label for="form_username">Usuario <strong>&#x28;&#x2A;&#x29;</strong>:</label>
	        <input type="text" class="stored" id="form_username" name="username" value="<?php echo $_POST['username'];?>
" placeholder="Usuario" />
	        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('username')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    </div>
	    
	    <div class="row" id="form_password_container">
	    	<label for="form_password">Contrase&ntilde;a <strong>&#x28;&#x2A;&#x29;</strong>:</label>
	        <input type="password" class="stored" id="form_password" name="password" value="<?php echo $_POST['password'];?>
" placeholder="Contrase&ntilde;a" />
	        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('password')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    </div>

	    <input type="hidden" name="plan" value="plan1">
	    
		<?php if ($_GET['action']=='confirm'){?><input type="hidden" name="invited" value="<?php echo $_GET['id'];?>
"><input type="hidden" name="invitation_code" value="<?php echo $_GET['key'];?>
"><?php }?>
		
	    <div class="row" id="form_agreement_container">
	        <span id="recover2"><input type="checkbox" id="form_agreement" name="agreement" value="yes" checked="checked"> Estoy de acuerdo con la <a class="fancybox fancybox.iframe submit2" href="<?php echo smarty_function_geturl(array('controller'=>'privacidad','action'=>'index'),$_smarty_tpl);?>
">Política de Privacidad</a> y las <a class="fancybox fancybox.iframe submit2" href="<?php echo smarty_function_geturl(array('controller'=>'condiciones','action'=>'index'),$_smarty_tpl);?>
">Condiciones de Uso</a>.</span>
	        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('agreement')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    </div>
	    <div class="row">
		    	<button class="submit" type="submit" name="register_" id="register_">&iexcl;Quiero Probarlo Ya!</button>
	    	</div>
	    <div class="row">
	        		<span id="recover"><a href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'recuperarpassword'),$_smarty_tpl);?>
">Recuperar contrase&ntilde;a</a> &#x7C; <a href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'login'),$_smarty_tpl);?>
">Ingresar</a></span>
		</div>
	</form>
</div>

	<div class="content3">
			<div class="block-left">&nbsp;</div>
			<div class="block-right2">
				<img src="/images/reg_light/welcome.jpg">
			</div>
	</div>

	<div class="content4">
			<div class="block-left">&nbsp;</div>
			<div class="block-right2">
				<img src="/images/reg_light/running31.png"><label>Agiliza tu facturaci&oacute;n</label><br>
				Crea y env&iacute;a facturas profesionales mucho m&aacute;s r&aacute;pidamente y reduce los tiempos de cobro.
			</div>
	</div>
	
	<div class="content5">
			<div class="block-left">&nbsp;</div>
			<div class="block-right2">
				<img src="/images/reg_light/checkbox.png"><label>Simplifica la gesti&oacute;n de tu negocio</label><br>
				Maneja las finanzas de tu empresa, proyectos y clientes con un programa f&aacute;cil de utilizar.
			</div>
	</div>
	
	<div class="content6">
			<div class="block-left">&nbsp;</div>
			<div class="block-right2">
				<img src="/images/reg_light/stopwatch6.png"><label>Reduce gastos y optimiza tu tiempo</label><br>
				Ahorra tiempo en papeleo y ded&iacute;calo a lo que vale la pena.
			</div>
	</div>
 
<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>