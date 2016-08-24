<?php /* Smarty version Smarty-3.0.8, created on 2015-02-15 21:38:18
         compiled from "/var/www/app/templates/./cuenta/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186722633954e103ba801fb1-55606751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16ce34313e460e7e600e641807a76db793cbf9f8' => 
    array (
      0 => '/var/www/app/templates/./cuenta/login.tpl',
      1 => 1423691232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186722633954e103ba801fb1-55606751',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','cuenta');$_template->assign('subsection','login'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div id="login">
	<div class="titulo-hi">
		<label for="form_total_invoices">&iexcl;Bienvenid&#x40;&#x21;</label>
	</div>
	
	<div class="titulo-lo">
		<label for="form_total_invoices">Por favor introduce tus datos de acceso:</label>
	</div>
	
	<form method="post" id="login_id" name="login" action="<?php echo smarty_function_geturl(array('action'=>'login'),$_smarty_tpl);?>
">
	        <div class="row" id="form_username_container">
	            <label for="form_username">Usuario:</label>
	            <input type="text" class="stored" id="form_username" name="username" value="<?php echo $_POST['username'];?>
" placeholder="Usuario" />
	            <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',($_smarty_tpl->getVariable('errors')->value['username'])); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	        </div>
	        <div class="row" id="form_password_container">
	            <label for="form_password">Contrase&ntilde;a:</label>
	            <input type="password" class="stored" id="form_password" name="password" value="<?php echo $_POST['password'];?>
" placeholder="Contrase&ntilde;a" />
	            <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',($_smarty_tpl->getVariable('errors')->value['password'])); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	        </div>
	        <div class="row">
	            <button class="submit" type="submit" name="login_" id="login_" value="login_">Ingresar &raquo;</button>
	        </div>
	        <div class="row">
	        		<span class="recover"><a href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'recuperarpassword'),$_smarty_tpl);?>
">Recuperar contrase&ntilde;a</a> &#x7C; <a href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'registro'),$_smarty_tpl);?>
">Pru&eacute;balo gratis</a></span>
			</div>
	</form>
</div>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>