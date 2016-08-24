<?php /* Smarty version Smarty-3.0.8, created on 2015-02-16 01:58:26
         compiled from "/var/www/app/templates/./email/user-register-alert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:71853501754e140b2a7c062-05492679%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e87ab82634426a97e5f4a159ebff63814d56c897' => 
    array (
      0 => '/var/www/app/templates/./email/user-register-alert.tpl',
      1 => 1423691256,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71853501754e140b2a7c062-05492679',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
Nuevo usuario registrado en WebProAdmin!
<p>Hello!,</p>

<p>Un nuevo usuario acaba de registrarse en WebProAdmin.</p>

<p>El detalle de su informaci&oacute;n es la siguiente:</p>

Usuario: <?php echo $_smarty_tpl->getVariable('user')->value->username;?>
<br>
Email: <?php echo $_smarty_tpl->getVariable('user')->value->profile->email;?>
</p>

<p>&Eacute;xitos,</p>

<p><a href="http://webproadmin.com" target="_blank">WebProAdmin</a></p>