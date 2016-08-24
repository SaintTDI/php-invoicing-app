<?php /* Smarty version Smarty-3.0.8, created on 2015-07-27 17:54:22
         compiled from "/var/www/app/templates/./proyectos/agregar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:49127308655b6542e4a6798-73543968%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8bd4e6b15b7885ad389ea6bf7fdfcf812ed1cc4' => 
    array (
      0 => '/var/www/app/templates/./proyectos/agregar.tpl',
      1 => 1423691331,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49127308655b6542e4a6798-73543968',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php if ($_GET['doc_type']=='invoice'){?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="es">
<head>
<link rel="stylesheet" href="/css/jquery-ui.css" type="text/css" media="all" /><script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script><script type="text/javascript" src="/js/malsup.js"></script>
<?php if ($_smarty_tpl->getVariable('authenticated')->value){?><link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" /><?php }else{ ?><link rel="stylesheet" href="/css/outside.css" type="text/css" media="all" /><?php }?>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
<title>WebProAdmin - Index</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChZwN3axAbbT9k9K3VRX-5LBQwJX76LLM&sensor=false&language=es&region=SP"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
</head>
<body>
<?php }else{ ?>
<?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','proyectos');$_template->assign('subsection','agregar'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Nuevo Proyecto:</h3></label>
</div>
<?php }?>
<form method="post" id="projec_id" action="<?php echo smarty_function_geturl(array('action'=>'agregar'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('fp')->value->project->getId();?>
" enctype="multipart/form-data">

    <?php if ($_smarty_tpl->getVariable('fp')->value->hasError()){?>
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    <?php }?>
    
    
    <div class="row" id="form_project_title">
        <label for="form_project_title">Nombre del Proyecto: (*)</label>
        <input type="text" id="form_project_title" name="project_title" value="<?php echo $_POST['project_title'];?>
" placeholder="Ej: Proyecto Vi&ntilde;edo"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('project_title')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
 	<div class="row" id="form_company_container">
        <label for="form_company_ids">Cliente:</label>
        	    <input type="text" id="form_company" name="company" value="<?php echo $_POST['company'];?>
" placeholder="Empresa, sociedad o persona"/>
        		<input type="hidden" id="form_company_id" name="company_id" value="<?php echo $_POST['company_id'];?>
" />
        		<input type="hidden" id="form_company_address" name="company_address" value="<?php echo $_POST['company_address'];?>
" />
        		<input type="hidden" id="form_data_type" name="data_type" value="company" />
        		<input type="hidden" name="doc_type" id="form_doc_type" value="ccompany" />
        		<input type="hidden" name="comp_doc_type" id="form_comp_doc_type" value="project" />
        		<input type="hidden" id="form_project_id" name="project_id" value="<?php if ($_POST['project_id']){?><?php echo $_POST['project_id'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('company_id2')->value;?>
<?php }?>" />
            
			<input type="hidden" id="form_addr_id2" name="addr_id2" value="0" />
			<input type="hidden" id="form_comp" name="comp_id" value="0" />

			<?php if ($_smarty_tpl->getVariable('companieslist')->value||$_smarty_tpl->getVariable('contactslist')->value){?>
			<?php if (count($_smarty_tpl->getVariable('companieslist')->value)==0){?>
			        		 <input type="hidden" id="form_addr_id2" name="addr_id2" value="0" />
						 <input type="hidden" id="form_comp" name="comp_id" value="0" /> 
			<?php }else{ ?>
					<input type="hidden" id="form_contact_id" name="contact_id" value="<?php if ($_POST['contact_id']){?><?php echo $_POST['contact_id'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('contact_id')->value;?>
<?php }?>">
			<?php }?>
			<?php }?>
			
			<?php if ($_smarty_tpl->getVariable('companieslist')->value||$_smarty_tpl->getVariable('contactslist')->value){?>
					
					<script type="text/javascript">		 
						jQuery(function(){
			  			var companies = [
			    			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companieslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?>{ value: '<?php echo $_smarty_tpl->getVariable('company_')->value[$_smarty_tpl->getVariable('i')->value];?>
', data: '<?php echo $_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('i')->value];?>
', address: '<?php echo $_smarty_tpl->getVariable('addressid')->value[$_smarty_tpl->getVariable('i')->value];?>
', data_type: '<?php echo $_smarty_tpl->getVariable('data_type_')->value[$_smarty_tpl->getVariable('i')->value];?>
' },<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php }} ?><?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('contactslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value){
?>{ value: '<?php echo $_smarty_tpl->getVariable('company_')->value[$_smarty_tpl->getVariable('i')->value];?>
', data: '<?php echo $_smarty_tpl->getVariable('data_')->value[$_smarty_tpl->getVariable('i')->value];?>
', address: '<?php echo $_smarty_tpl->getVariable('addressid')->value[$_smarty_tpl->getVariable('i')->value];?>
', data_type: '<?php echo $_smarty_tpl->getVariable('data_type_')->value[$_smarty_tpl->getVariable('i')->value];?>
' },<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php }} ?>
			  			];
			  
			  					// setup autocomplete function pulling from companies[] array
			  						jQuery('#form_company').autocomplete({
			    						lookup: companies,
			    						onSelect: function (suggestion) {
			    						if (suggestion.value && suggestion.data){
			    							jQuery('#form_company').val(suggestion.value);
			      						jQuery('#form_company_id').val(suggestion.data);
			      						jQuery('#form_company_address').val(suggestion.address);
			      						jQuery('#form_data_type').val(suggestion.data_type);
			      					} 
			    					}
			  				});

						});
					</script>	
					
			<?php }?>
  	</div>
    
    <div class="row" id="form_project_start_">
        <label for="form_project_start">Fecha de inicio:</label>
        <input type="text" id="form_project_start" name="start" value="<?php if ($_POST['start']){?><?php echo $_POST['start'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('now__')->value;?>
<?php }?>" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('start')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_project_ends_">
        <label for="form_project_ends">Fecha de culminaci&oacute;n:</label>
        <input type="text" id="form_project_ends" name="ends" value="<?php if ($_POST['ends']){?><?php echo $_POST['ends'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('next__')->value;?>
<?php }?>" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('ends')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
 	<div class="row" id="form_contact_container">
        <label for="form_contact_ids">Responsable:</label>
        	    <input type="text" id="form_responsible" name="responsible" value="<?php if ($_POST['responsible']){?><?php echo $_POST['responsible'];?>
<?php }else{ ?><?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->getVariable('project')->value->profile->contact_id, null, null);?><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('contactslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value){
?><?php if ($_smarty_tpl->getVariable('data_c')->value[$_smarty_tpl->getVariable('b')->value]==$_smarty_tpl->getVariable('id')->value){?><?php echo ucfirst($_smarty_tpl->getVariable('contact_')->value[$_smarty_tpl->getVariable('b')->value]);?>
<?php break 1?><?php }?><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable($_smarty_tpl->getVariable('b')->value+1, null, null);?><?php }} ?><?php }?>" placeholder="Nombre del Responsable"/>
        		<input type="hidden" id="form_contact_id2" name="contact_id2" value="<?php if ($_POST['contact_id2']){?><?php echo $_POST['contact_id2'];?>
<?php }else{ ?><?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->getVariable('project')->value->profile->contact_id, null, null);?><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('contactslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value){
?><?php if ($_smarty_tpl->getVariable('data_c')->value[$_smarty_tpl->getVariable('b')->value]==$_smarty_tpl->getVariable('id')->value){?><?php echo $_smarty_tpl->getVariable('data_c')->value[$_smarty_tpl->getVariable('b')->value];?>
<?php break 1?><?php }?><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable($_smarty_tpl->getVariable('b')->value+1, null, null);?><?php }} ?><?php }?>" />
        
        		
        		<script type="text/javascript"> 	
			jQuery(function(){
  			var contacts = [
    			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, null);?><?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('contactslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value){
?>{ value: '<?php echo $_smarty_tpl->getVariable('contact_')->value[$_smarty_tpl->getVariable('i')->value];?>
', data: '<?php echo $_smarty_tpl->getVariable('data_c')->value[$_smarty_tpl->getVariable('i')->value];?>
' },<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php }} ?>
  			];
  
  					// setup autocomplete function pulling from contacts[] array
  						jQuery('#form_responsible').autocomplete({
    						lookup: contacts,
    						onSelect: function (suggestion) {
    						if (suggestion.value && suggestion.data){
    							jQuery('#form_responsible').val(suggestion.value);
      						jQuery('#form_contact_id2').val(suggestion.data);
      					} 
    					}
  				});
  				
			});
        		</script>
        		
  	</div>
    <div class="row" id="form_project_budget_">
        <label for="form_project_budge">Presupuesto <?php if ($_smarty_tpl->getVariable('default_currency')->value=='Peso Argentino'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Boliviano'){?>(b&#36)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Chileno'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Colombiano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Colon'){?>(&#162;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Dominicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Dolar'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Euro'){?>(&#128;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Quetzal'){?>(Q)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Lempira'){?>(L)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Mexicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Cordoba'){?>(C&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Balboa'){?>(B/.)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Guarani'){?>(&#8370;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Nuevo Sol'){?>(S/.)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Libra'){?>(&#163;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Peso Uruguayo'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('default_currency')->value=='Bolivar'){?>(Bs.)<?php }else{ ?>(&#128;)<?php }?>:</label>
        <input type="text" id="form_project_budget" name="budget" value="<?php echo $_POST['budget'];?>
" data-a-dec="," data-a-sep="." placeholder="Importe Presupuesto"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('budget')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
          <?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fp')->value->projectProfile; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['label']->key;
?>
        		<div class="row" id="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_container">
                		<label for="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['label']->value;?>
:</label>
             		<input type="file" class="files" id="form_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="<?php echo $_POST[$_smarty_tpl->getVariable('key')->value];?>
"/>
             		<?php $_smarty_tpl->tpl_vars["url"] = new Smarty_variable($_smarty_tpl->getVariable('project')->value->profile->{$_smarty_tpl->getVariable('key')->value}, null, null);?>
             		<?php if ($_smarty_tpl->getVariable('url')->value){?><a href="/documents/projects/<?php echo $_smarty_tpl->getVariable('url')->value;?>
" target="_blank">Descargar</a><?php }?>
                    <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError($_smarty_tpl->tpl_vars['key']->value)); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
			</div>
        <?php }} ?>
  
	<div class="row" id="form_project_notes">
    		<label for="form_project_notes">Notas del Proyecto:</label>
    		<textarea id="form_project_notes" name="notes" rows="6" cols="50" placeholder="Coloca aqu&iacute; cualquier nota o comentario personal sobre este proyecto. Lo que escribas s&oacute;lo ser&aacute; visible para los usuarios de tu cuenta."><?php echo $_POST['notes'];?>
</textarea>
    		<?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('notes')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    	</div>
    	
    
    <script type="text/javascript"> 		
        		jQuery(document).ready(function() {
       				jQuery('#form_project_budget').autoNumeric("init");
      				jQuery('#form_project_expense').autoNumeric("init");
      		});
     </script>
     

	<div class="row">
    		<?php if ($_smarty_tpl->getVariable('identity')->value->trial_expired){?><?php }else{ ?><button class="submit" type="submit" name="add" id="add" value="add">Guardar</button><?php }?>
	</div>
	
	<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
    	</div>

</form>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>