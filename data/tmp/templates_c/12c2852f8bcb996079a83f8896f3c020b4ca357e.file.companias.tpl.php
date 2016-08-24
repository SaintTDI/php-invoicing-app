<?php /* Smarty version Smarty-3.0.8, created on 2015-06-23 13:14:02
         compiled from "/var/www/app/templates/./compania/companias.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207102757755893f7a289cb8-91816830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12c2852f8bcb996079a83f8896f3c020b4ca357e' => 
    array (
      0 => '/var/www/app/templates/./compania/companias.tpl',
      1 => 1423691195,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207102757755893f7a289cb8-91816830',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php if ($_smarty_tpl->getVariable('companieslist')->value){?>
<?php if (count($_smarty_tpl->getVariable('companieslist')->value)==0){?>
        		 <input type="hidden" id="form_addr_id2" name="addr_id2" value="0" />
			 <input type="hidden" id="form_comp" name="comp_id" value="0" /> 
<?php }else{ ?>
		<input type="hidden" id="form_contact_id" name="contact_id" value="<?php echo $_smarty_tpl->getVariable('contact_id')->value;?>
">
<?php }?>
<?php }?>

<?php if ($_smarty_tpl->getVariable('companieslist')->value){?>
		
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
' },<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?><?php }} ?>
  			];
  
  					// setup autocomplete function pulling from companies[] array
  						jQuery('#form_company').autocomplete({
    						lookup: companies,
    						onSelect: function (suggestion) {
    						if (suggestion.value && suggestion.data){
    							jQuery('#form_company').val(suggestion.value);
      						jQuery('#form_company_id').val(suggestion.data);
      						jQuery('#form_addr_id2').val(suggestion.address);
      						var thehtml2 = '<span><a class="fancybox fancybox.iframe" href="<?php echo smarty_function_geturl(array('controller'=>'compania','action'=>'editarcompania'),$_smarty_tpl);?>
?id=' + suggestion.data + '&id2=' + suggestion.address + '&doc_type=ccompany&doc_id=' + suggestion.data + '&contact_id=<?php echo $_smarty_tpl->getVariable('contact_id')->value;?>
&popup=true">' + suggestion.value + '</a></span>';
      						jQuery('#outputcontent').html(thehtml2);
      					} 
    					}
  				});
  			
  					 jQuery('#form_company').bind('input', function() { 
    							jQuery(this).val();
      						jQuery('#form_company_id').val("");
      						jQuery('#form_addr_id2').val("");
					});
			});
		</script>	
		
<?php }?>