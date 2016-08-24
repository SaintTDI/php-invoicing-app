<?php /* Smarty version Smarty-3.0.8, created on 2015-04-10 22:55:49
         compiled from "/var/www/app/templates/./cuenta/empresa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:254682401552838d559b374-23066459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23130286a3bd751fb4e90a8a1863daabf0ab2221' => 
    array (
      0 => '/var/www/app/templates/./cuenta/empresa.tpl',
      1 => 1423691228,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '254682401552838d559b374-23066459',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','cuenta');$_template->assign('subsection','empresa'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

<div class="title" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Tus datos de Empresa:</h3></label>
</div>

<form id="cmpd_id" method="post" action="<?php echo smarty_function_geturl(array('action'=>'empresa'),$_smarty_tpl);?>
" enctype="multipart/form-data">

    <?php if ($_smarty_tpl->getVariable('fp')->value->hasError()){?>
        		<div class="error">
            		Por favor revisa los campos resaltados.
        		</div>
    <?php }else{ ?>
    		<?php if ($_GET['submitted']){?>
        		<div class="success">
            		Tu informaci&oacute;n fue guardada con &eacute;xito.
        		</div>
        	<?php }?>
    <?php }?>

    <div class="form_box">
	    <div class="form_left">
		    <div class="row" id="form_thecompany_container">
		        <label for="form_thecompany">Raz&oacute;n Social <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_thecompany" name="thecompany" value="<?php if ($_smarty_tpl->getVariable('fp')->value->thecompany){?><?php echo $_smarty_tpl->getVariable('fp')->value->thecompany;?>
<?php }else{ ?><?php echo $_POST['thecompany'];?>
<?php }?>" placeholder="Empresa, sociedad o persona"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('thecompany')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		    <div class="row" id="form_identification_container">
		        <label for="form_identification">N&uacute;mero de dentificaci&oacute;n Fiscal <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_identification" name="identification" value="<?php if ($_smarty_tpl->getVariable('fp')->value->identification){?><?php echo $_smarty_tpl->getVariable('fp')->value->identification;?>
<?php }else{ ?><?php echo $_POST['identification'];?>
<?php }?>" placeholder="Ej: 99999999-R"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('identification')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
	    </div>
	    
	    <div class="form_right">
		    <div class="row" id="form_commercial_container">
		        <label for="form_commercial">Nombre Comercial:</label>
		        <input type="text" class="stored" id="form_commercial" name="commercial" value="<?php if ($_smarty_tpl->getVariable('fp')->value->commercial){?><?php echo $_smarty_tpl->getVariable('fp')->value->commercial;?>
<?php }else{ ?><?php echo $_POST['commercial'];?>
<?php }?>" placeholder="Nombre Comercial"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('commercial')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		    <div class="row" id="form_year_start_container">
		        <label for="form_year_start">Inicio del per&iacute;odo fiscal <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_year_start" name="year_start" value="<?php if ($_smarty_tpl->getVariable('fp')->value->year_start){?><?php echo $_smarty_tpl->getVariable('fp')->value->year_start;?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('now_')->value;?>
<?php }?>" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('year_start')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
	    </div>
    </div>
    <div class="row" id="form_address_">
	    <?php if (count($_smarty_tpl->getVariable('addresses')->value)==0){?>
	        <label for="form_address">Direcci&oacute;n <strong>&#x28;&#x2A;&#x29;</strong>:</label>
	        <?php $_template = new Smarty_Internal_Template('direccion/direcciones.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    		<a class="fancybox fancybox.iframe submit2" href="<?php echo smarty_function_geturl(array('controller'=>'direccion','action'=>'agregardirecciones'),$_smarty_tpl);?>
?doc_type=company&doc_id=<?php echo $_smarty_tpl->getVariable('company_id2')->value;?>
">Agregar Direcci&oacute;n</a>
	    		<input type="hidden" id="form_add_check" name="add_check" value="false">
	    		<?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('add_check')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    <?php }else{ ?>
	    		<label for="form_address">Direcci&oacute;n <strong>&#x28;&#x2A;&#x29;</strong>:</label>
	        <?php $_template = new Smarty_Internal_Template('direccion/direcciones.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	        <a class="fancybox fancybox.iframe submit2" href="<?php echo smarty_function_geturl(array('controller'=>'direccion','action'=>'agregardirecciones'),$_smarty_tpl);?>
?doc_type=company&doc_id=<?php echo $_smarty_tpl->getVariable('company_id2')->value;?>
">Agregar Direcci&oacute;n</a>
	    		<input type="hidden" id="form_add_check" name="add_check" value="true">
	    		<?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('add_check')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    <?php }?>
    </div>
    <div class="form_box">
	    <div class="form_left">
		    <div class="row" id="form_email_container">
		        <label for="form_email">Email Principal <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_email" name="email_c" value="<?php if ($_smarty_tpl->getVariable('fp')->value->email_c){?><?php echo $_smarty_tpl->getVariable('fp')->value->email_c;?>
<?php }else{ ?><?php echo $_POST['email_c'];?>
<?php }?>" placeholder="Ej: ejemplo@webproadmin.com"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('email_c')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		    
		    <div class="row" id="form_mobile_container">
		        <label for="form_mobile">Tel&eacute;fono M&oacute;vil:</label>
		        <input class="phone stored" type="text" id="form_mobile_country" name="mobile_country" value="<?php if ($_smarty_tpl->getVariable('fp')->value->mobile_country){?><?php echo $_smarty_tpl->getVariable('fp')->value->mobile_country;?>
<?php }else{ ?><?php echo $_POST['mobile_country'];?>
<?php }?>" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_mobile_area" name="mobile_area" value="<?php if ($_smarty_tpl->getVariable('fp')->value->mobile_area){?><?php echo $_smarty_tpl->getVariable('fp')->value->mobile_area;?>
<?php }else{ ?><?php echo $_POST['mobile_area'];?>
<?php }?>" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_mobile" name="mobile" value="<?php if ($_smarty_tpl->getVariable('fp')->value->mobile){?><?php echo $_smarty_tpl->getVariable('fp')->value->mobile;?>
<?php }else{ ?><?php echo $_POST['mobile'];?>
<?php }?>" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('mobile')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		    
		    <div class="row" id="form_phone_container">
		        <label for="form_phone">Tel&eacute;fono Principal:</label>
		        <input class="phone stored" type="text" id="form_phone_country" name="phone_country" value="<?php if ($_smarty_tpl->getVariable('fp')->value->phone_country){?><?php echo $_smarty_tpl->getVariable('fp')->value->phone_country;?>
<?php }else{ ?><?php echo $_POST['phone_country'];?>
<?php }?>" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_phone_area" name="phone_area" value="<?php if ($_smarty_tpl->getVariable('fp')->value->phone_area){?><?php echo $_smarty_tpl->getVariable('fp')->value->phone_area;?>
<?php }else{ ?><?php echo $_POST['phone_area'];?>
<?php }?>" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_phone" name="phone" value="<?php if ($_smarty_tpl->getVariable('fp')->value->phone){?><?php echo $_smarty_tpl->getVariable('fp')->value->phone;?>
<?php }else{ ?><?php echo $_POST['phone'];?>
<?php }?>" onkeypress='validate(event)'  placeholder="Tel&eacute;fono"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('phone')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		    
        <?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fp')->value->companyProfile; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['label']->key;
?>
        	<div class="row" id="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_container">
                <?php if ($_smarty_tpl->tpl_vars['label']->value=='Profile Picture'){?>
                		<label for="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">Sube un logo de tu empresa:</label>
             		<input type="file" class="files" id="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="<?php if ($_smarty_tpl->getVariable('fp')->value->{$_smarty_tpl->getVariable('key')->value}){?><?php echo $_smarty_tpl->getVariable('fp')->value->{$_smarty_tpl->getVariable('key')->value};?>
<?php }else{ ?><?php echo $_POST[$_smarty_tpl->getVariable('key')->value];?>
<?php }?>"/>
                    <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError($_smarty_tpl->tpl_vars['key']->value)); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
                	<?php }?>
        </div>
        <?php }} ?>
		</div>
		
		<div class="form_right">
		    <div class="row" id="form_email2_container">
		        <label for="form_email2">Email Secundario:</label>
		        <input type="text" class="stored" id="form_email2" name="email2" value="<?php if ($_smarty_tpl->getVariable('fp')->value->email2){?><?php echo $_smarty_tpl->getVariable('fp')->value->email2;?>
<?php }else{ ?><?php echo $_POST['email2'];?>
<?php }?>" placeholder="Ej: ejemplo@webproadmin.com"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('email2')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		   
		    <div class="row" id="form_phone2_container">
		        <label for="form_phone2">Tel&eacute;fono Secundario:</label>
		        <input class="phone stored" type="text" id="form_phone2_country" name="phone2_country" value="<?php if ($_smarty_tpl->getVariable('fp')->value->phone2_country){?><?php echo $_smarty_tpl->getVariable('fp')->value->phone2_country;?>
<?php }else{ ?><?php echo $_POST['phone2_country'];?>
<?php }?>" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_phone2_area" name="phone2_area" value="<?php if ($_smarty_tpl->getVariable('fp')->value->phone2_area){?><?php echo $_smarty_tpl->getVariable('fp')->value->phone2_area;?>
<?php }else{ ?><?php echo $_POST['phone2_area'];?>
<?php }?>" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_phone2" name="phone2" value="<?php if ($_smarty_tpl->getVariable('fp')->value->phone2){?><?php echo $_smarty_tpl->getVariable('fp')->value->phone2;?>
<?php }else{ ?><?php echo $_POST['phone2'];?>
<?php }?>" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('phone2')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		    
		    <div class="row" id="form_fax_container">
		        <label for="form_fax">Fax:</label>
		        <input class="phone stored" type="text" id="form_fax_country" name="fax_country" value="<?php if ($_smarty_tpl->getVariable('fp')->value->fax_country){?><?php echo $_smarty_tpl->getVariable('fp')->value->fax_country;?>
<?php }else{ ?><?php echo $_POST['fax_country'];?>
<?php }?>" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
		        <input class="phone stored" type="text" id="form_fax_area" name="fax_area" value="<?php if ($_smarty_tpl->getVariable('fp')->value->fax_area){?><?php echo $_smarty_tpl->getVariable('fp')->value->fax_area;?>
<?php }else{ ?><?php echo $_POST['fax_area'];?>
<?php }?>" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
		        <input class="social stored" type="text" id="form_fax" name="fax" value="<?php if ($_smarty_tpl->getVariable('fp')->value->fax){?><?php echo $_smarty_tpl->getVariable('fp')->value->fax;?>
<?php }else{ ?><?php echo $_POST['fax'];?>
<?php }?>" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('fax')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		   
        <?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fp')->value->companyProfile; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['label']->key;
?>
        	<div class="row" id="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_container">
                <?php if ($_smarty_tpl->tpl_vars['label']->value=='Picture Preview'){?>
                		<label for="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">Logo de tu empresa:</label>
                		<?php if ($_smarty_tpl->getVariable('fp')->value->{$_smarty_tpl->getVariable('key')->value}!=''){?>
                				<?php $_smarty_tpl->tpl_vars["url"] = new Smarty_variable($_smarty_tpl->getVariable('fp')->value->{$_smarty_tpl->getVariable('key')->value}, null, null);?>
                            	<img src="/profiles/tmp/company/pictures/<?php echo $_smarty_tpl->getVariable('url')->value;?>
" />
                        	<?php }else{ ?>
                            	<img src="/profiles/tmp/company/pictures/profile.png" />
                        <?php }?>
                	<?php }?>
         </div>
        <?php }} ?>
		</div>
	</div>
        
	 

		    <?php if ($_smarty_tpl->getVariable('fp')->value->currency){?><input type="hidden" id="form_currency" name="currency" value="<?php echo $_smarty_tpl->getVariable('fp')->value->currency;?>
">
		    <?php }else{ ?>
		    <div class="row" id="form_currency_container">
		    	<label for="form_currency">Moneda utilizada <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <select id="form_currency" name="currency" class="stored"/>
		       		<option value="">Seleccione...</option>
		       		<option value="Euro" <?php if ($_smarty_tpl->getVariable('default_country')->value=='ES'||$_POST['currency']=='ES'){?> selected="selected" <?php }?>>&#128; Euro</option>
					<option value="Peso Argentino" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AR'||$_POST['currency']=='AR'){?> selected="selected" <?php }?>>&#36; Peso Argentino</option>
		        		<option value="Peso Boliviano" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BO'||$_POST['currency']=='BO'){?> selected="selected" <?php }?>>b&#36; Peso Boliviano</option>
		        		<option value="Peso Chileno" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CL'||$_POST['currency']=='CL'){?> selected="selected" <?php }?>>&#36; Peso Chileno</option>
		        		<option value="Peso Colombiano" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CO'||$_POST['currency']=='CO'){?> selected="selected" <?php }?>>&#36; Peso Colombiano</option>
		        		<option value="Colon" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CR'||$_POST['currency']=='CR'){?> selected="selected" <?php }?>>&#162; Col&oacute;n</option>
		        		<option value="Peso Dominicano" <?php if ($_smarty_tpl->getVariable('default_country')->value=='DO'||$_POST['currency']=='DO'){?> selected="selected" <?php }?>>&#36; Peso Dominicano</option>
		        		<option value="Dolar" <?php if ($_smarty_tpl->getVariable('default_country')->value=='US'||$_smarty_tpl->getVariable('default_country')->value=='PR'||$_smarty_tpl->getVariable('default_country')->value=='SV'||$_smarty_tpl->getVariable('default_country')->value=='EC'){?> selected="selected" <?php }?>>USD &#36; Dolar</option>
		        		<option value="Quetzal" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GT'||$_POST['currency']=='GT'){?> selected="selected" <?php }?>>Q Quetzal</option>
		        		<option value="Lempira" <?php if ($_smarty_tpl->getVariable('default_country')->value=='HN'||$_POST['currency']=='HN'){?> selected="selected" <?php }?>>L Lempira</option>
		        		<option value="Peso Mexicano" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MX'||$_POST['currency']=='MX'){?> selected="selected" <?php }?>>&#36; Peso Mexicano</option>
					<option value="Cordoba" <?php if ($_smarty_tpl->getVariable('default_country')->value=='NI'||$_POST['currency']=='NI'){?> selected="selected" <?php }?>>C&#36; C&oacute;rdoba</option>		
		        		<option value="Balboa" <?php if ($_smarty_tpl->getVariable('default_country')->value=='PA'||$_POST['currency']=='PA'){?> selected="selected" <?php }?>>B/. Balboa</option>
		        		<option value="Guarani" <?php if ($_smarty_tpl->getVariable('default_country')->value=='PG'||$_POST['currency']=='PG'){?> selected="selected" <?php }?>>&#8370; Guaran&iacute;</option>
		        		<option value="Nuevo Sol" <?php if ($_smarty_tpl->getVariable('default_country')->value=='PE'||$_POST['currency']=='PE'){?> selected="selected" <?php }?>>S/. Nuevo Sol</option>
		        		<option value="Libra" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GBR'||$_POST['currency']=='GBR'){?> selected="selected" <?php }?>>&#163; Libra Esterlina</option>
		        		<option value="Peso Uruguayo" <?php if ($_smarty_tpl->getVariable('default_country')->value=='UY'||$_POST['currency']=='UY'){?> selected="selected" <?php }?>>&#36; Peso Uruguayo</option>
		        		<option value="Bolivar" <?php if ($_smarty_tpl->getVariable('default_country')->value=='VE'||$_POST['currency']=='VE'){?> selected="selected" <?php }?>>Bs. Bol&iacute;var</option>  		
				</select>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('currency')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		    <?php }?>
    
 	<div class="form_box">
	    <div class="form_left">
		    <div class="row" id="form_iva_container">
		        <label for="form_iva_">Tu r&eacute;gimen habitual de IVA en &#37; <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" class="stored" id="form_iva" name="iva" value="<?php if ($_smarty_tpl->getVariable('fp')->value->iva){?><?php echo $_smarty_tpl->getVariable('fp')->value->iva;?>
<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='ES'){?>21<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='AR'){?>21<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='BO'){?>14.94<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='CL'){?>19<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='CO'){?>16<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='CR'){?>13<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='DO'){?>18<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='GT'){?>12<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='HN'){?>15<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='MX'){?>16<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='NI'){?>15<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='PA'){?>7<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='PG'){?>10<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='PE'){?>18<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='PR'){?>7<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='VE'){?>12<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='UY'){?>22<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='VE'){?>12<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='SV'){?>13<?php }elseif($_smarty_tpl->getVariable('default_country')->value=='EC'){?>12<?php }else{ ?><?php echo $_POST['iva'];?>
<?php }?>" data-a-dec="," data-a-sep="." placeholder="Escribe 21 para el 21&#x25; de impuesto"/> 
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('iva')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		    <div class="row" id="form_iva2_name_container">
		        <label for="form_iva2_name">&iquest;Facturas alg&uacute;n impuesto adicional? Coloca el nombre:</label>
		        <input type="text" class="stored" id="form_iva2_name" name="iva2_name" value="<?php if ($_smarty_tpl->getVariable('fp')->value->iva2_name){?><?php echo $_smarty_tpl->getVariable('fp')->value->iva2_name;?>
<?php }else{ ?><?php echo $_POST['iva2_name'];?>
<?php }?>" placeholder="Ej: Impuesto al lujo"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('iva2_name')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		     <div class="row" id="form_number_start_container">
		        <label for="form_number_start">Serie y N&ordm; de Factura <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input class="invoice_1 stored" type="text" id="form_number_start_letter" name="number_start_letter" value="<?php if ($_smarty_tpl->getVariable('fp')->value->number_start_letter){?><?php echo $_smarty_tpl->getVariable('fp')->value->number_start_letter;?>
<?php }else{ ?>A<?php }?>" /> -
		        <input class="invoice_2 stored" type="text" id="form_number_zero" name="number_zero" value="<?php if ($_smarty_tpl->getVariable('fp')->value->number_zero){?><?php echo $_smarty_tpl->getVariable('fp')->value->number_zero;?>
<?php }else{ ?>00000<?php }?>" />
		        <input class="invoice_3 stored" type="text" id="form_number_start" name="number_start" value="<?php if ($_smarty_tpl->getVariable('fp')->value->number_start){?><?php echo $_smarty_tpl->getVariable('fp')->value->number_start;?>
<?php }else{ ?>1<?php }?>" />
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('number_start')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
	    </div>
	    
	    <div class="form_right">
			<div class="row" id="form_retention_container">
		        <label for="form_retention_">Retenci&oacute;n IRPF (en &#37;):</label>
		        <input type="hidden" id="form_retention_q" class="stored" name="retention_q" value="">
		        <input type="hidden" id="form_contact_id_" class="stored" name="contact_id_" value="<?php echo $_smarty_tpl->getVariable('fp')->value->contact_id_;?>
">
		        <input type="text" id="form_retention" class="stored" name="retention" value="<?php if ($_smarty_tpl->getVariable('fp')->value->retention){?><?php echo $_smarty_tpl->getVariable('fp')->value->retention;?>
<?php }else{ ?><?php echo $_POST['retention'];?>
<?php }?>" data-a-dec="," data-a-sep="." placeholder="Escribe 24&#x25; para el 24 de retenci&oacute;n"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('retention')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		    <div class="row" id="form_iva2_container">
		        <label for="form_iva2_">Impuesto adicional (en &#37;):</label>
		        <input type="text" id="form_iva2" class="stored" name="iva2" value="<?php if ($_smarty_tpl->getVariable('fp')->value->iva2){?><?php echo $_smarty_tpl->getVariable('fp')->value->iva2;?>
<?php }else{ ?><?php echo $_POST['iva2'];?>
<?php }?>" data-a-dec="," data-a-sep="." placeholder="Escribe 2 para el 2&#x25; de impuesto"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('iva2')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		    <div class="row" id="form_consecutive_container">
		        <label for="form_consecutive_">N&ordm; consecutivo (si aplica):</label>
		        <input type="text" id="form_consecutive" class="stored" name="consecutive" value="<?php if ($_smarty_tpl->getVariable('fp')->value->consecutive){?><?php echo $_smarty_tpl->getVariable('fp')->value->consecutive;?>
<?php }else{ ?><?php echo $_POST['consecutive'];?>
<?php }?>" data-v-min="0.00" data-v-max="999999999" data-a-sep="" placeholder="Ej: 999"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('consecutive')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
	    </div>
    </div>

    <input type="hidden" id="form_invoice_number" name="invoice_number" value="unico">
    
    <div class="form_box">
	    <div class="row" id="form_recc_">
	    		<span for="form_recc_">Mi empresa est&aacute; acogida al R&eacute;gimen Especial de Criterio de Caja:</span>
	    		<input type="checkbox" class="stored" name="recc" id="form_recc" value="true" <?php if ($_smarty_tpl->getVariable('fp')->value->recc=="true"||$_POST['recc']=='true'){?>checked="checked"<?php }?>> 
		</div>
	</div>
	
   
    <script type="text/javascript"> 		
        		jQuery(document).ready(function() {
       				jQuery('#form_retention').autoNumeric("init");
      				jQuery('#form_iva2').autoNumeric("init");
      				jQuery('#form_iva').autoNumeric("init");
      				jQuery('#form_consecutive').autoNumeric("init", {mDec: '0'});
      		});
     </script>
     
	
	<div class="form_box">
		<div class="row">
	    		<?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?><button class="submit" type="submit" name="add" id="add" value="add">Guardar Cambios</button><?php }?>
		</div>
	</div>
	<div class="form_box">
		<div class="row" id="form_contact_notes">
	    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
	    	</div>
    	</div>
</form>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>