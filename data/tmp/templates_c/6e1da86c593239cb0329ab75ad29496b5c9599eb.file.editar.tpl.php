<?php /* Smarty version Smarty-3.0.8, created on 2015-03-18 18:07:35
         compiled from "/var/www/app/templates/./herramientas/facturas/editar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17660067265509b0d7a437e6-31389463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e1da86c593239cb0329ab75ad29496b5c9599eb' => 
    array (
      0 => '/var/www/app/templates/./herramientas/facturas/editar.tpl',
      1 => 1423691277,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17660067265509b0d7a437e6-31389463',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','facturas'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Editar Factura:</h3></label>
</div>

<form method="post" id="edit_id" action="<?php echo smarty_function_geturl(array('action'=>'editar'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('fp')->value->invoice->getId();?>
">

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
     <div class="form_box"><?php if ($_smarty_tpl->getVariable('fp')->value->invoice_consecutive){?>
	    <div class="row" id="form_consecutive_">
	        <label for="form_consecutive_">Consecutivo Factura:</label>
	        <input type="text" id="form_consecutive" class="stored" name="invoice_consecutive" value="<?php echo $_smarty_tpl->getVariable('fp')->value->invoice_consecutive;?>
" placeholder="Ej: 999"/>
	        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('invoice_consecutive')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    </div>
	    <?php }else{ ?>
	    <input type="hidden" class="stored" id="form_consecutive" name="invoice_consecutive" value="" />
    <?php }?></div>
    	 
    <input type="hidden" class="stored" id="form_currency" name="currency" value="<?php echo $_smarty_tpl->getVariable('fp')->value->currency;?>
">

	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_invoice_number_">
		        <label for="form_invoice_number_">N&ordm; de Factura <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input class="invoice_1 stored" type="text" id="form_start_letter" name="start_letter" value="<?php echo $_smarty_tpl->getVariable('fp')->value->start_letter;?>
" /> -
		        <input class="invoice_2 stored" type="text" id="form_number_zero" name="number_zero" value="<?php echo $_smarty_tpl->getVariable('fp')->value->number_zero;?>
" />
		        <input class="invoice_3 stored" type="text" id="form_invoice_number" name="invoice_number" value="<?php echo $_smarty_tpl->getVariable('fp')->value->invoice_number;?>
" onkeypress='validate(event)' placeholder="Ej: 822"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('invoice_number')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		    <div class="row" id="form_invc_valid_">
		    	<label for="form_invc_vali">Vencimiento:</label>
		        <select class="frecuency stored" id="form_invoice_vali" name="invoice_valid">
					<option value="0.00" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_valid=='0.00'){?> selected="selected" <?php }?>>Contado</option>
					<option value="7" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_valid=='7'){?> selected="selected" <?php }?>>7 d&iacute;as</option>
					<option value="15" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_valid=='15'){?> selected="selected" <?php }?>>15 d&iacute;as</option>
					<option value="21" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_valid=='21'){?> selected="selected" <?php }?>>21 d&iacute;as</option>
					<option value="30" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_valid=='30'){?> selected="selected" <?php }?>>30 d&iacute;as</option>
					<option value="45" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_valid=='45'){?> selected="selected" <?php }?>>45 d&iacute;as</option>
					<option value="60" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_valid=='60'){?> selected="selected" <?php }?>>60 d&iacute;as</option>
					<option value="75" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_valid=='75'){?> selected="selected" <?php }?>>75 d&iacute;as</option>
					<option value="90" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_valid=='90'){?> selected="selected" <?php }?>>90 d&iacute;as</option>
					<option value="120" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_valid=='120'){?> selected="selected" <?php }?>>120 d&iacute;as</option>
					<option value="180" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_valid=='180'){?> selected="selected" <?php }?>>180 d&iacute;as</option>
				</select>
		    </div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_invoice_date_">
		        <label for="form_invoice_date_">Fecha <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" id="form_invoice_date" name="invoice_date" class="stored" value="<?php echo $_smarty_tpl->getVariable('fp')->value->invoice_date;?>
" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('invoice_date')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		    <div class="row" id="form_invoice_frequency">
		    	<label for="form_invoice_frequency">Frecuencia:</label>
		        <select class="frecuency stored" id="form_invoice_frequency" name="invoice_frequency">
					<option value="una vez" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_frequency=='una vez'){?> selected="selected" <?php }?>>Una vez</option>
					<option value="semanal" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_frequency=='semanal'){?> selected="selected" <?php }?>>Semanal</option>
					<option value="quincenal" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_frequency=='quincenal'){?> selected="selected" <?php }?>>Quincenal</option>
					<option value="mensual" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_frequency=='mensual'){?> selected="selected" <?php }?>>Mensual</option>
					<option value="bimensual" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_frequency=='bimensual'){?> selected="selected" <?php }?>>Bimensual</option>
					<option value="trimestral" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_frequency=='trimestral'){?> selected="selected" <?php }?>>Trimestral</option>
					<option value="semestral" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_frequency=='semestral'){?> selected="selected" <?php }?>>Semestral</option>
				</select>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('invoice_frequency')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
		</div>
	</div>

    	<div class="row" id="form_clien__">
    <?php if (count($_smarty_tpl->getVariable('company')->value)==0){?>
         <label for="form_company_ids">Cliente <strong>&#x28;&#x2A;&#x29;</strong>:</label>
    		<a class="fancybox fancybox.iframe submit2" href="<?php echo smarty_function_geturl(array('controller'=>'cinvoice','action'=>'agregarcompania'),$_smarty_tpl);?>
?document_id=<?php echo $_smarty_tpl->getVariable('fp')->value->invoice->getId();?>
">Agregar Cliente</a>
    		<input type="hidden" id="form_add_check" name="add_check" value="false">
    		<?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('add_check')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    <?php }else{ ?><input type="hidden" id="form_add_check" name="add_check" value="true">
    <label for="form_company_ids">Cliente <strong>&#x28;&#x2A;&#x29;</strong>:</label>
    <table class="table_p2"><?php $_smarty_tpl->tpl_vars['counter'] = new Smarty_variable(0, null, null);?>
    <?php  $_smarty_tpl->tpl_vars['comp'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('company')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['comp']->key => $_smarty_tpl->tpl_vars['comp']->value){
?>
    <?php if ($_smarty_tpl->getVariable('comp')->value->profile->thecompany!=''){?>
    <?php if ($_smarty_tpl->getVariable('counter')->value==0){?><?php $_smarty_tpl->tpl_vars['counter'] = new Smarty_variable($_smarty_tpl->getVariable('counter')->value+1, null, null);?>
    <tr>
      <?php if ($_smarty_tpl->getVariable('fp')->value->published=='yes'){?><?php }else{ ?><td class="table_button"><button class="submit7" type="submit" name="delete3" id="delete3" value="delete">Borrar</button></td><?php }?>
	  <td class="table_p_top">Nombre</td>
	  <td class="table_p_top">Calle</td>
	  <td class="table_p_top">Casa/Edificio</td>
	  <td class="table_p_top">Ciudad</td>
	  <td class="table_p_top">Pa&iacute;s</td>
	</tr>
	<tr>
	  <?php if ($_smarty_tpl->getVariable('fp')->value->published=='yes'){?><?php }else{ ?><td class="table_input"><input type="checkbox" name="comp_id" value="<?php echo $_smarty_tpl->getVariable('comp')->value->company_id;?>
"></td><?php }?>
	  <td class="links"><span>	<?php if ($_smarty_tpl->getVariable('fp')->value->published!='yes'){?><a class="fancybox fancybox.iframe" href="<?php echo smarty_function_geturl(array('controller'=>'cinvoice','action'=>'editarcompania'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('comp')->value->company_id;?>
&document_id=<?php echo $_smarty_tpl->getVariable('fp')->value->invoice->getId();?>
">
	  <?php echo ucfirst($_smarty_tpl->getVariable('comp')->value->profile->thecompany);?>
</a><?php }else{ ?><?php echo ucfirst($_smarty_tpl->getVariable('comp')->value->profile->thecompany);?>
<?php }?></span></td>
	  <td><?php echo ucfirst($_smarty_tpl->getVariable('comp')->value->profile->street);?>
</td>
	  <td><?php echo ucfirst($_smarty_tpl->getVariable('comp')->value->profile->house);?>
<input type="hidden" id="form_identification" name="identification" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->identification;?>
" /><input type="hidden" id="form_street_company" name="street" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->street;?>
" /><input type="hidden" id="form_house_company" name="house" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->house;?>
" /><input type="hidden" id="form_city_company" name="city" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->city;?>
" /><input type="hidden" id="form_province_company" name="province" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->province;?>
" /><input type="hidden" id="form_state_company" name="state" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->state;?>
" /><input type="hidden" id="form_postal_code_company" name="postal_code" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->postal_code;?>
" /><input type="hidden" id="form_country_company" name="country" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->country;?>
" /><input type="hidden" id="form_email" name="email_c" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->email_c;?>
" /><input type="hidden" id="form_email2" name="email2" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->email2;?>
" /><input type="hidden" id="form_company_website" name="company_website" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->company_website;?>
"/><input type="hidden" id="form_phone_country" name="phone_country" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->phone_country;?>
" /><input type="hidden" id="form_phone_area" name="phone_area" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->phone_area;?>
" /><input type="hidden" id="form_phone" name="phone" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->phone;?>
" /><input type="hidden" id="form_phone2_country" name="phone2_country" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->phone2_country;?>
" /><input type="hidden" id="form_phone2_area" name="phone2_area" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->phone2_area;?>
" /><input type="hidden" id="form_phone2" name="phone2" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->phone2;?>
" /><input type="hidden" id="form_fax_country" name="fax_country" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->fax_country;?>
" /><input type="hidden" id="form_fax_area" name="fax_area" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->fax_area;?>
" /><input type="hidden" id="form_fax" name="fax" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->fax;?>
" /></td>
	  <td><?php echo ucfirst($_smarty_tpl->getVariable('comp')->value->profile->city);?>
</td>
	  <td><?php echo ucfirst($_smarty_tpl->getVariable('comp')->value->profile->country);?>
<input type="hidden" id="form_company" name="thecompany" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->thecompany;?>
" />
	  <input type="hidden" id="form_company_id" name="company_id" value="<?php echo $_smarty_tpl->getVariable('comp')->value->company_id;?>
" /><input type="hidden" id="form_original_company_id" name="original_company_id" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->original_company_id;?>
" />
	  <input type="hidden" id="form_original_company_address" name="original_company_address" value="<?php echo $_smarty_tpl->getVariable('comp')->value->profile->original_company_address;?>
" /></td><?php $_smarty_tpl->tpl_vars['default_retention_provider'] = new Smarty_variable($_smarty_tpl->getVariable('comp')->value->profile->irpf, null, null);?><?php $_smarty_tpl->tpl_vars['default_recc_'] = new Smarty_variable($_smarty_tpl->getVariable('comp')->value->profile->recc, null, null);?>
	</tr>
	<?php }?>
	<?php }?>
  <?php }} ?>
  </table>
 	<?php }?>
  	</div>
  	
	<div class="form_box">
		<div class="form_left">
		 	<div class="row" id="form_contact_container">
		        <label for="form_contact_ids">Contacto:</label>
		        	    <input type="text" id="form_contact" class="stored" name="invoice_contact" value="<?php echo $_smarty_tpl->getVariable('fp')->value->invoice_contact;?>
" placeholder="Nombre Apellido"/>
		        		<input type="hidden" id="form_contact_id" class="stored" name="contact_id" value="<?php echo $_smarty_tpl->getVariable('fp')->value->contact_id;?>
" />
		        		<input type="hidden" id="form_contact_address" class="stored" name="contact_address" value="<?php echo $_smarty_tpl->getVariable('fp')->value->company_address;?>
" />
		        
		        		
		        		<script type="text/javascript">
					jQuery(function(){
		  			var contacts = [
		    			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('contactslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value){
?>{ value: '<?php echo $_smarty_tpl->getVariable('contact_')->value[$_smarty_tpl->getVariable('i')->value];?>
', data: '<?php echo $_smarty_tpl->getVariable('data_c')->value[$_smarty_tpl->getVariable('i')->value];?>
', address: '<?php echo $_smarty_tpl->getVariable('address_c')->value[$_smarty_tpl->getVariable('i')->value];?>
' },<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php }} ?>
		  			];
		  
		  					// setup autocomplete function pulling from contacts[] array
		  						jQuery('#form_contact').autocomplete({
		    						lookup: contacts,
		    						onSelect: function (suggestion) {
		    						if (suggestion.value && suggestion.data){
		    							jQuery('#form_contact').val(suggestion.value);
		      						jQuery('#form_contact_id').val(suggestion.data);
		      						jQuery('#form_contact_address').val(suggestion.address);
		      						jQuery('#form_contact').trigger('change');
		      					} 
		    					}
		  				});
		  				
					});
		        		</script>
		        		
		  	</div>
		</div>
		<div class="form_right">
		 	<div class="row" id="form_project_container">
		        <label for="form_project_ids">Proyecto:</label>
		        	    <input type="text" id="form_project" class="stored" name="invoice_project" value="<?php echo $_smarty_tpl->getVariable('fp')->value->invoice_project;?>
" placeholder="Ej: Proyecto Vi&ntilde;edo"/>
		        		<input type="hidden" id="form_project_id" class="stored" name="project_id" value="<?php echo $_smarty_tpl->getVariable('fp')->value->project_id;?>
" />
		        
		        		
		        		<script type="text/javascript">
					jQuery(function(){
		  			var projects = [
		    			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['project'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('projectslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['project']->key => $_smarty_tpl->tpl_vars['project']->value){
?>{ value: '<?php echo $_smarty_tpl->getVariable('project_')->value[$_smarty_tpl->getVariable('i')->value];?>
', data: '<?php echo $_smarty_tpl->getVariable('data_p')->value[$_smarty_tpl->getVariable('i')->value];?>
' },<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php }} ?>
		  			];
		  
		  					// setup autocomplete function pulling from projects[] array
		  						jQuery('#form_project').autocomplete({
		    						lookup: projects,
		    						onSelect: function (suggestion) {
		    						if (suggestion.value && suggestion.data){
		    							jQuery('#form_project').val(suggestion.value);
		      						jQuery('#form_project_id').val(suggestion.data);
		      						jQuery('#form_project').trigger('change');
		      					} 
		    					}
		  				});
		  				
					});
		        		</script>
		        		
		  	</div>
		</div>
	</div>

	<div class="row" id="form_item_">
    <?php if (count($_smarty_tpl->getVariable('items')->value)==0){?>
    		<label for="form_item">Item(s) <strong>&#x28;&#x2A;&#x29;</strong>:</label>	
    		<a class="fancybox fancybox.iframe submit2" href="<?php echo smarty_function_geturl(array('action'=>'agregaritem'),$_smarty_tpl);?>
?document_type=invoice&document_id=<?php echo $_smarty_tpl->getVariable('fp')->value->invoice->getId();?>
">Agregar Nuevo Item</a>
    		<?php $_template = new Smarty_Internal_Template('herramientas/facturas/item.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('document_type','invoice');$_template->assign('document_id',$_smarty_tpl->getVariable('fp')->value->invoice->getId()); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	    	<input type="hidden" id="form_add_check2" name="add_check2" value="false">
	    	<?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('add_check2')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    <?php }else{ ?>
    		<label for="form_item">Item(s) <strong>&#x28;&#x2A;&#x29;</strong>:</label>
    		<?php $_template = new Smarty_Internal_Template('herramientas/facturas/item.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('document_type','invoice');$_template->assign('document_id',$_smarty_tpl->getVariable('fp')->value->invoice->getId()); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    		<?php if ($_smarty_tpl->getVariable('fp')->value->published!='yes'){?><a class="fancybox fancybox.iframe submit2" href="<?php echo smarty_function_geturl(array('action'=>'agregaritem'),$_smarty_tpl);?>
?document_type=invoice&document_id=<?php echo $_smarty_tpl->getVariable('fp')->value->invoice->getId();?>
">Agregar Nuevo Item</a><?php }?>
	    	<input type="hidden" id="form_add_check2" name="add_check2" value="true">
    <?php }?>
    </div>

	<div class="form_box">
		   <div class="row" id="form_subtotal_">
		        <label for="form_subtotal_">Subtotal <?php if ($_smarty_tpl->getVariable('fp')->value->currency=='Peso Argentino'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Boliviano'){?>(b&#36)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Chileno'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Colombiano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Colon'){?>(&#162;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Dominicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Dolar'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Euro'){?>(&#128;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Quetzal'){?>(Q)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Lempira'){?>(L)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Mexicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Cordoba'){?>(C&#36;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Balboa'){?>(B/.)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Guarani'){?>(&#8370;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Nuevo Sol'){?>(S/.)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Libra'){?>(&#163;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Uruguayo'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Bolivar'){?>(Bs.)<?php }else{ ?>(&#128;)<?php }?>:</label>
		        <input type="text" id="form_subtotal" name="subtotal" value="<?php echo $_smarty_tpl->getVariable('subtotal')->value;?>
" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" />
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('subtotal')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		   </div>
	</div>
	
	<div class="form_box">
		    <div class="row" id="form_discount_">
		        <label for="form_discount_">Descuento (&#37;):</label>
		        <input type="text" id="form_discount" name="discount" value="<?php echo $_smarty_tpl->getVariable('fp')->value->discount;?>
" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" data-v-max="100" />
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('discount')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
	</div>
	
	<div class="form_box">
		    <div class="row" id="form_base_">
		        <label for="form_base_">Base imponible <?php if ($_smarty_tpl->getVariable('fp')->value->currency=='Peso Argentino'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Boliviano'){?>(b&#36)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Chileno'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Colombiano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Colon'){?>(&#162;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Dominicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Dolar'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Euro'){?>(&#128;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Quetzal'){?>(Q)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Lempira'){?>(L)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Mexicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Cordoba'){?>(C&#36;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Balboa'){?>(B/.)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Guarani'){?>(&#8370;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Nuevo Sol'){?>(S/.)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Libra'){?>(&#163;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Uruguayo'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Bolivar'){?>(Bs.)<?php }else{ ?>(&#128;)<?php }?>:</label>
		        <?php $_smarty_tpl->tpl_vars['current_base'] = new Smarty_variable($_smarty_tpl->getVariable('subtotal')->value*(100-$_smarty_tpl->getVariable('fp')->value->discount)*0.01, null, null);?>
		        <input type="text" id="form_base" name="base" value="<?php echo $_smarty_tpl->getVariable('current_base')->value;?>
" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" />
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('base')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
	</div>
	
	<?php $_template = new Smarty_Internal_Template('herramientas/facturas/taxes.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	

	<div class="form_box">
		    <div class="row" id="form_retention_">
		        <label for="form_retention_">Retenci&oacute;n (&#37;):</label>
		        <?php $_smarty_tpl->tpl_vars['current_ret'] = new Smarty_variable($_smarty_tpl->getVariable('default_retention')->value, null, null);?> <?php $_smarty_tpl->tpl_vars['current_retention'] = new Smarty_variable($_smarty_tpl->getVariable('current_base')->value*$_smarty_tpl->getVariable('default_retention')->value*0.01, null, null);?>
		        <input type="text" class="stored" class="stored" id="form_retention" name="retention" value="<?php if ($_smarty_tpl->getVariable('current_ret')->value){?><?php echo $_smarty_tpl->getVariable('current_ret')->value;?>
<?php }else{ ?>0<?php }?>" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" />
		        <input type="hidden" id="form_retention_p" name="retention_p" value="<?php if ($_smarty_tpl->getVariable('default_ret')->value){?><?php echo $_smarty_tpl->getVariable('current_ret')->value;?>
<?php }else{ ?>0<?php }?>"/>
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('retention')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
	</div>
	<div class="form_box">
			<div class="row" id="form_total_">
		        <label for="form_total_">Total (<?php if ($_smarty_tpl->getVariable('fp')->value->currency=='Peso Argentino'){?>ARS &#36;<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Chileno'){?>CLP &#36;<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Colombiano'){?>COP &#36;<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Dominicano'){?>DOP &#36;<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Dolar'){?>USD &#36;<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Quetzal'){?>QTD Q<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Lempira'){?>HNL L<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Mexicano'){?>MXN &#36;<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Balboa'){?>PAB B/.<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Nuevo Sol'){?>PEN S/.<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Peso Uruguayo'){?>UYU &#36;<?php }elseif($_smarty_tpl->getVariable('fp')->value->currency=='Bolivar'){?>VEF Bs.<?php }else{ ?>&#128;<?php }?>):</label>
		        <?php $_smarty_tpl->tpl_vars['current_total'] = new Smarty_variable($_smarty_tpl->getVariable('current_base')->value+$_smarty_tpl->getVariable('total_iva_1')->value+$_smarty_tpl->getVariable('total_iva_2')->value-$_smarty_tpl->getVariable('current_retention')->value, null, null);?>
		        <input type="text" id="form_total" name="total" value="<?php echo $_smarty_tpl->getVariable('current_total')->value;?>
" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" />
		        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('total')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		    </div>
	</div>
	
	<div class="form_box">
		<div class="form_left">
		    	<div class="row" id="form_recc_">
		    		<span for="form_recc_">Esta factura se emite en RECC:</span>
		    		<input type="checkbox" class="stored" id="form_recc" name="recc" value="true" <?php if ($_smarty_tpl->getVariable('fp')->value->recc=="true"){?>checked="checked"<?php }elseif($_smarty_tpl->getVariable('default_recc_')->value=="true"){?>checked="checked"<?php }?>> 
			</div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_invoice_copy_">
		    		<span for="form_invoice_copy_">Esta factura es una copia:</span>
		    		<input type="checkbox" class="stored" id="form_invoice_copy" name="invoice_copy" value="true" <?php if ($_smarty_tpl->getVariable('fp')->value->invoice_copy){?>checked="checked"<?php }?>> 
			</div>
		</div>
	</div>
	
	<div class="row" id="form_invoice_terms">
    		<label for="form_invoice_terms">T&eacute;rminos:</label>
    		<textarea id="form_invoice_terms" class="big_textarea stored" name="terms" rows="6" cols="50" placeholder="Coloca aqu&iacute; cualquier condici&oacute;n de pago o mensaje que desees que aparezca en la factura."><?php echo $_smarty_tpl->getVariable('fp')->value->terms;?>
</textarea>
    		<?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('terms')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    	</div>
    	
	<div class="row" id="form_invoice_notes">
    		<label for="form_invoice_notes">Notas personales:</label>
    		<textarea id="form_invoice_notes" class="big_textarea stored" name="notes" rows="6" cols="50" placeholder="Coloca aqu&iacute; cualquier nota o comentario personal sobre este documento. Lo que escribas s&oacute;lo ser&aacute; visible para los usuarios de tu cuenta."><?php echo $_smarty_tpl->getVariable('fp')->value->notes;?>
</textarea>
    		<?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('notes')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    	</div>
    	
    	<?php if ($_smarty_tpl->getVariable('fp')->value->published=='yes'){?>
    	<div class="form_box">
		<div class="row center">
	    		<span><a class="fancybox fancybox.iframe submit2" href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/facturas','action'=>'preview'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('fp')->value->invoice->getId();?>
&popup=true">Enviar</a></span>
		</div>
	</div>
	<?php }else{ ?>
	<div class="form_box">
		<div class="row">
	    		<?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?><button class="submit" type="submit" name="edit" id="edit" value="edit">Actualizar</button><?php }?>
		</div>
	</div>
	<div class="form_box">
		<div class="row" id="form_contact_notes">
	    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
	    	</div>
    	</div>
	<?php }?>
	
	<script type="text/javascript">
			jQuery(function(){
  			var products = [
    			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['start_letter'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('invoice_letter_array')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['start_letter']->key => $_smarty_tpl->tpl_vars['start_letter']->value){
?>{ value: '<?php echo $_smarty_tpl->getVariable('invoice_letter_array')->value[$_smarty_tpl->getVariable('i')->value];?>
', zero: '<?php echo $_smarty_tpl->getVariable('default_number_zero')->value[$_smarty_tpl->getVariable('i')->value];?>
', data: '<?php echo $_smarty_tpl->getVariable('invoice_num_array')->value[$_smarty_tpl->getVariable('i')->value];?>
'},<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php }} ?>
    			];
  					// setup autocomplete function pulling from companies[] array
  						jQuery('#form_start_letter').autocomplete({
    						lookup: products,
    						onSelect: function (suggestion) {
    						if (suggestion.value){
							jQuery('#form_start_letter').val(suggestion.value);
							jQuery('#form_number_zero').val(suggestion.zero); 
							jQuery('#form_invoice_number').val(suggestion.data);
							jQuery('#form_invoice_number').trigger('change'); 
							jQuery('#form_start_letter').trigger('change');  						
      					} 
    					}
  				});
			});
	</script>
	

</form>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>