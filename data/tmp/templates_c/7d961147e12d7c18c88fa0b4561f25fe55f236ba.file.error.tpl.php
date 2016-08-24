<?php /* Smarty version Smarty-3.0.8, created on 2015-02-16 01:14:25
         compiled from "/var/www/app/templates/./error/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6961831454e136614d08e5-01034420%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d961147e12d7c18c88fa0b4561f25fe55f236ba' => 
    array (
      0 => '/var/www/app/templates/./error/error.tpl',
      1 => 1423691259,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6961831454e136614d08e5-01034420',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="boxes3">
	<div class="title">
		<p>Ups! Se ha producido un error.</p>
		<p>El equipo de Soporte ha sido informado.</p>
		<p>Reintenta en unos minutos.</p>
		<p><strong>Disculpa las molestias.</strong></p>
	</div>
</div>
<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>