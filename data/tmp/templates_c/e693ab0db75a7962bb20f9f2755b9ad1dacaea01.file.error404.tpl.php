<?php /* Smarty version Smarty-3.0.8, created on 2015-02-16 01:28:55
         compiled from "/var/www/app/templates/./error/error404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166758986854e139c7e9ad85-01205960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e693ab0db75a7962bb20f9f2755b9ad1dacaea01' => 
    array (
      0 => '/var/www/app/templates/./error/error404.tpl',
      1 => 1423691260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166758986854e139c7e9ad85-01205960',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="boxes3">
	<div class="title">
    		<p>La direcci&oacute;n <strong><?php echo $_smarty_tpl->getVariable('requestedAddress')->value;?>
</strong> no pudo ser encontrada.</p>
    	</div>
</div>
<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>