<?php /* Smarty version Smarty-3.0.8, created on 2015-02-15 21:38:18
         compiled from "/var/www/app/templates/./lib/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:156867249754e103bac434f5-02643896%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcccae63c8dbed8bab34be85fd398a5a067919e3' => 
    array (
      0 => '/var/www/app/templates/./lib/error.tpl',
      1 => 1423691327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156867249754e103bac434f5-02643896',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (is_array($_smarty_tpl->getVariable('error')->value)||strlen($_smarty_tpl->getVariable('error')->value)>0){?>
    <?php $_smarty_tpl->tpl_vars['hasError'] = new Smarty_variable(true, null, null);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['hasError'] = new Smarty_variable(false, null, null);?>
<?php }?>

<div class="error"<?php if (!$_smarty_tpl->getVariable('hasError')->value){?> style="display:none"<?php }?>>
    <?php if (is_array($_smarty_tpl->getVariable('error')->value)){?>
            <?php  $_smarty_tpl->tpl_vars['str'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('error')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['str']->key => $_smarty_tpl->tpl_vars['str']->value){
?>
               <span><?php echo $_smarty_tpl->tpl_vars['str']->value;?>
</span>
            <?php }} ?>
    <?php }else{ ?>
        <span><?php echo $_smarty_tpl->getVariable('error')->value;?>
</span>
    <?php }?>
</div>