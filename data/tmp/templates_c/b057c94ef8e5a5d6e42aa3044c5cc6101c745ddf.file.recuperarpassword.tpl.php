<?php /* Smarty version Smarty-3.0.8, created on 2015-11-20 07:14:16
         compiled from "/var/www/app/templates/./recomendador/recuperarpassword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1856883376564eba382a3378-83949595%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b057c94ef8e5a5d6e42aa3044c5cc6101c745ddf' => 
    array (
      0 => '/var/www/app/templates/./recomendador/recuperarpassword.tpl',
      1 => 1423691343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1856883376564eba382a3378-83949595',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','recomendador');$_template->assign('title','Recupere tu contrase&ntilde;a'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

<?php if ($_smarty_tpl->getVariable('action')->value=='confirm'){?>
<div class="title" id="form_total_invoices">
		<label for="form_total_invoices"><h3><strong>Importante</strong></h3></label>
</div>
<div id="">
    <?php if (count($_smarty_tpl->getVariable('errors')->value)==0){?>
        <div id="parrafo">
        		<p>Tu nueva contrase&ntilde;a ha sido activada.</p>
        </div>
		<div id="parrafo">
		 	<a class="submit4" href="<?php echo smarty_function_geturl(array('action'=>'login'),$_smarty_tpl);?>
">Ingresar</a>
		</div>
    <?php }else{ ?>
        <div id="parrafo">
        		<p>Tu contrase&ntilde;a no fue confirmada. Por favor intenta nuevamente.</p>
        </div>
    <?php }?>
</div>
<?php }elseif($_smarty_tpl->getVariable('action')->value=='complete'){?>
<div class="title" id="form_total_invoices">
		<label for="form_total_invoices"><h3><strong>Importante</strong></h3></label>
</div>
<div id="parrafo">
		<p></p>
        <p>En breve recibir&aacute;s un mensaje con las instrucciones en tu cuenta de correo.</p>
</div>
<div id="parrafo">
		 <a class="submit4" href="<?php echo smarty_function_geturl(array('action'=>'login'),$_smarty_tpl);?>
">Entrar a mi cuenta</a>
</div>
<?php }else{ ?>
<div id="registro">
	<div class="titulo">
		<label for="form_total_invoices">Inicia el proceso de recuperaci&oacute;n de contrase&ntilde;a:</label>
	</div>

    <form id="recover_id" name="recover" method="post" action="<?php echo smarty_function_geturl(array('action'=>'recuperarpassword'),$_smarty_tpl);?>
">
            <div class="row" id="form_username_container">
                <label for="form_username">Correo Electr&oacute;nico:</label>
                <input type="text" id="form_email" name="email" value="" placeholder="Email" />
                <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',($_smarty_tpl->getVariable('errors')->value['email'])); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
            </div>
		    <div class="row">
			    <button class="submit" type="submit">Continuar</button>
		    	</div>
	        <div class="row">
	        		<span class="recover"><a href="<?php echo smarty_function_geturl(array('controller'=>'recomendador','action'=>'login'),$_smarty_tpl);?>
">Ingresar</a> &#x7C; <a href="<?php echo smarty_function_geturl(array('controller'=>'recomendador','action'=>'registro'),$_smarty_tpl);?>
">Reg&iacute;strate sin costo</a></span>
			</div>
    </form>
</div>
<?php }?>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>