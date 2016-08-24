<?php /* Smarty version Smarty-3.0.8, created on 2015-02-15 22:49:28
         compiled from "/var/www/app/templates/./soporte/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106801975654e114682b5bb8-68430490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77cddcddebd260150dcb4b92343de7fdcf233e07' => 
    array (
      0 => '/var/www/app/templates/./soporte/index.tpl',
      1 => 1423950691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106801975654e114682b5bb8-68430490',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','soporte');$_template->assign('subsection','index'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Formulario de Soporte:</h3></label>
</div>
<form id="suppo_form" method="post" action="<?php echo smarty_function_geturl(array('action'=>'index'),$_smarty_tpl);?>
" enctype="multipart/form-data" />

    <?php if ($_smarty_tpl->getVariable('fp')->value->hasError()){?>
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    <?php }else{ ?>
    		<?php if ($_GET['submitted']){?>
			 
        		<div class="success">
            		Tu mensaje fue enviado con &eacute;xito.
        		</div>
			 
        	<?php }?>
    <?php }?>
   
    <div class="row" id="form_support_name">
        <label for="form_support_name">Tu Nombre Completo:</label>
        <input type="text" id="form_name" name="name" value="<?php echo $_smarty_tpl->getVariable('default_name')->value;?>
"  placeholder="Nombre Apellido"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('name')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
   
    <div class="row" id="form_support_email">
        <label for="form_support_email">Tu correo electronico:</label>
        <input type="text" id="form_email" name="email" value="<?php echo $_smarty_tpl->getVariable('default_email')->value;?>
" placeholder="Ej: ejemplo@webproadmin.com"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('email')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
   
    <div class="row" id="form_subject_">
    	<label for="form_subject__">Selecciona el Asunto:</label>
        <select class="_subject" id="form_subject" name="subject" >
			<option value="Ventas" <?php if ($_smarty_tpl->getVariable('fp')->value->subject=='Ventas'){?> selected="selected" <?php }?>>Informaci&oacute;n de Ventas</option>
			<option value="Soporte" <?php if ($_smarty_tpl->getVariable('fp')->value->subject=='Soporte'){?> selected="selected" <?php }?>>Soporte T&eacute;cnico</option>
		</select>
    </div>
   
	<div class="row" id="form_support_message">
    		<label for="form_support_message">Tu Mensaje:</label>
    		<textarea id="form_support_message" class="stored" name="message_content" rows="6" cols="50" placeholder="Com&eacute;ntanos c&oacute;mo podemos ayudarte."><?php echo $_POST['message_content'];?>
</textarea>
    		<?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('message_content')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    	</div>

	<div class="row">
		<label for="form_source">&nbsp;</label>
    		<button class="submit" type="submit" name="add" id="add" value="add">Contactar a WebProAdmin</button> 
	</div>

</form>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>