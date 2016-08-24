<?php /* Smarty version Smarty-3.0.8, created on 2015-02-15 22:50:28
         compiled from "/var/www/app/templates/./documentos/invoice.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183698794954e114a43f1c23-97637535%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09d65b2c797e675a37de018e07905e5193b49a2a' => 
    array (
      0 => '/var/www/app/templates/./documentos/invoice.tpl',
      1 => 1423691251,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183698794954e114a43f1c23-97637535',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es"><head><link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" /><link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Noto+Sans"><title>WebProAdmin</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no"></head><body>
<style>
html *
{
   font-size: 12px !important;
   font-family: Arial !important;
}
</style>
 <div class="box">
     		<div class="form_row_l2" id="form_invoice_client_">
                		<?php if ($_smarty_tpl->getVariable('company')->value->profile->company_pict_preview!=''){?><?php $_smarty_tpl->tpl_vars["url"] = new Smarty_variable($_smarty_tpl->getVariable('company')->value->profile->company_pict_preview, null, null);?><img src="/profiles/tmp/company/pictures/<?php echo $_smarty_tpl->getVariable('url')->value;?>
" boder="0" /><?php }else{ ?><img src="/profiles/tmp/company/pictures/profile.png" boder="0" /><?php }?>
    	 		 </div>
    	 		 <div class="form_row_r2" id="form_invoice_client_">
        			<div class="form_row_r_1_2">FACTURA N&ordm;:</div>
        			<div class="form_row_r_2_2"><?php echo $_smarty_tpl->getVariable('invoice')->value->profile->start_letter;?>
 - <?php echo $_smarty_tpl->getVariable('invoice')->value->profile->number_zero;?>
<?php echo $_smarty_tpl->getVariable('invoice')->value->invoice_number;?>
</div>
         		<?php if ($_smarty_tpl->getVariable('invoice')->value->profile->invoice_consecutive>0){?><div class="form_row_r_1_2">Consecutivo:</div>
        			<div class="form_row_r_2_2"><?php echo $_smarty_tpl->getVariable('invoice')->value->profile->invoice_consecutive;?>
 </div><?php }?>
        		</div>
     </div>
	<div class="box" id="form_box_">
      <div class="form_row_l" id="form_invoice_company_">
		<span class="title"><?php echo $_smarty_tpl->getVariable('company')->value->thecompany;?>
</span>
		<?php if ($_smarty_tpl->getVariable('company')->value->identification){?><span><?php echo $_smarty_tpl->getVariable('company')->value->identification;?>
</span><?php }?>
		<?php $_smarty_tpl->tpl_vars['counter3'] = new Smarty_variable(0, null, null);?>
    	    <?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('addresses')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value){
?><?php if ($_smarty_tpl->getVariable('counter3')->value==0){?><?php $_smarty_tpl->tpl_vars['counter3'] = new Smarty_variable($_smarty_tpl->getVariable('counter3')->value+1, null, null);?>
 				<?php if ($_smarty_tpl->getVariable('address')->value->profile->street||$_smarty_tpl->getVariable('address')->value->profile->house){?><span><?php echo $_smarty_tpl->getVariable('address')->value->profile->street;?>
<?php if ($_smarty_tpl->getVariable('address')->value->profile->house){?>, <?php echo $_smarty_tpl->getVariable('address')->value->profile->house;?>
<?php }?></span><?php }?>
				<?php if ($_smarty_tpl->getVariable('address')->value->profile->postal_code||$_smarty_tpl->getVariable('address')->value->profile->city||$_smarty_tpl->getVariable('address')->value->profile->state||$_smarty_tpl->getVariable('address')->value->profile->province){?><span><?php echo $_smarty_tpl->getVariable('address')->value->profile->postal_code;?>
 <?php echo $_smarty_tpl->getVariable('address')->value->profile->city;?>
<?php if ($_smarty_tpl->getVariable('address')->value->profile->province){?>, <?php echo $_smarty_tpl->getVariable('address')->value->profile->province;?>
<?php }?><?php if ($_smarty_tpl->getVariable('address')->value->profile->state){?>, <?php echo $_smarty_tpl->getVariable('address')->value->profile->state;?>
<?php }?></span><?php }?>
				<?php if ($_smarty_tpl->getVariable('address')->value->profile->country){?><span><?php echo $_smarty_tpl->getVariable('address')->value->profile->country;?>
</span><?php }?>
    	    <?php }?><?php }} ?>
		<?php if ($_smarty_tpl->getVariable('company')->value->profile->phone_country||$_smarty_tpl->getVariable('company')->value->profile->phone_area||$_smarty_tpl->getVariable('company')->value->profile->phone){?><span><?php if ($_smarty_tpl->getVariable('company')->value->profile->phone_country){?>(<?php echo $_smarty_tpl->getVariable('company')->value->profile->phone_country;?>
)<?php }?> <?php echo $_smarty_tpl->getVariable('company')->value->profile->phone_area;?>
 <?php echo $_smarty_tpl->getVariable('company')->value->profile->phone;?>
</span><?php }?>	
		<?php if ($_smarty_tpl->getVariable('company')->value->profile->email_c){?><span><?php echo $_smarty_tpl->getVariable('company')->value->profile->email_c;?>
</span><?php }?>
	    </div>
        <div class="form_row_r" id="form_invoice_client_">
       		<label>Emisi&oacute;n:</label>
        		<label><?php echo $_smarty_tpl->getVariable('invoice')->value->profile->invoice_date;?>
</label>
       		<label>Vencimiento:</label>
        		<label><?php echo $_smarty_tpl->getVariable('valid_until')->value;?>
</label>
			<?php  $_smarty_tpl->tpl_vars['client_'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('client')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['client_']->key => $_smarty_tpl->tpl_vars['client_']->value){
?>
    			<?php if ($_smarty_tpl->getVariable('client_')->value->profile->thecompany!=''){?>
			<span class="title"><?php echo $_smarty_tpl->getVariable('client_')->value->profile->thecompany;?>
</span>
			<?php if ($_smarty_tpl->getVariable('client_')->value->profile->identification){?><span><?php echo $_smarty_tpl->getVariable('client_')->value->profile->identification;?>
</span><?php }?>
			<?php if ($_smarty_tpl->getVariable('invoice')->value->profile->invoice_contact){?><span>Contacto: <?php echo $_smarty_tpl->getVariable('invoice')->value->profile->invoice_contact;?>
</span><?php }?>
			<?php if ($_smarty_tpl->getVariable('client_')->value->profile->street||$_smarty_tpl->getVariable('client_')->value->profile->house){?><span><?php echo $_smarty_tpl->getVariable('client_')->value->profile->street;?>
<?php if ($_smarty_tpl->getVariable('client_')->value->profile->house){?>, <?php echo $_smarty_tpl->getVariable('client_')->value->profile->house;?>
<?php }?></span><?php }?>
			<?php if ($_smarty_tpl->getVariable('client_')->value->profile->postal_code||$_smarty_tpl->getVariable('client_')->value->profile->city||$_smarty_tpl->getVariable('client_')->value->profile->state||$_smarty_tpl->getVariable('client_')->value->profile->province){?><span><?php echo $_smarty_tpl->getVariable('client_')->value->profile->postal_code;?>
 <?php echo $_smarty_tpl->getVariable('client_')->value->profile->city;?>
<?php if ($_smarty_tpl->getVariable('client_')->value->profile->province){?>, <?php echo $_smarty_tpl->getVariable('client_')->value->profile->province;?>
<?php }?><?php if ($_smarty_tpl->getVariable('client_')->value->profile->state){?>, <?php echo $_smarty_tpl->getVariable('client_')->value->profile->state;?>
<?php }?></span><?php }?>
			<?php if ($_smarty_tpl->getVariable('client_')->value->profile->country){?><span><?php echo $_smarty_tpl->getVariable('client_')->value->profile->country;?>
</span><?php }?>
			<?php if ($_smarty_tpl->getVariable('client_')->value->profile->phone_country||$_smarty_tpl->getVariable('client_')->value->profile->phone_area||$_smarty_tpl->getVariable('client_')->value->profile->phone){?><span><?php if ($_smarty_tpl->getVariable('client_')->value->profile->phone_country){?>(<?php echo $_smarty_tpl->getVariable('client_')->value->profile->phone_country;?>
)<?php }?><?php if ($_smarty_tpl->getVariable('client_')->value->profile->phone_area){?> <?php echo $_smarty_tpl->getVariable('client_')->value->profile->phone_area;?>
<?php }?><?php if ($_smarty_tpl->getVariable('client_')->value->profile->phone){?> <?php echo $_smarty_tpl->getVariable('client_')->value->profile->phone;?>
<?php }?></span><?php }?>
			<?php if ($_smarty_tpl->getVariable('client_')->value->profile->email_c){?><span><?php echo $_smarty_tpl->getVariable('client_')->value->profile->email_c;?>
</span><?php }?>
			<?php }?>
  			<?php }} ?>
	    </div>
	</div>
	<?php $_smarty_tpl->tpl_vars['counter'] = new Smarty_variable(0, null, null);?>
      <?php if (count($_smarty_tpl->getVariable('items')->value)>0){?>
    	    <table class="table_p">
    	    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
  			<?php if ($_smarty_tpl->getVariable('counter')->value==0){?>
  				<?php $_smarty_tpl->tpl_vars['counter'] = new Smarty_variable($_smarty_tpl->getVariable('counter')->value+1, null, null);?>
    	  	 		<tr>
					<td class="table_p_top">C&oacute;digo</td>
					<td class="table_p_top">Detalle</td>
					<td class="table_p_top">Cantidad</td>
					<td class="table_p_top">Precio Unitario (<?php if ($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?>)</td>
					<td class="table_p_top">IVA (&#37;)</td>
					<td class="table_p_top">Otros (&#37;)</td>
					<td class="table_p_top">Subtotal <?php if ($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Argentino'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Boliviano'){?>(b&#36)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Chileno'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Colombiano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Colon'){?>(&#162;)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Dominicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Dolar'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Euro'){?>(&#128;)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Quetzal'){?>(Q)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Lempira'){?>(L)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Mexicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Cordoba'){?>(C&#36;)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Balboa'){?>(B/.)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Guarani'){?>(&#8370;)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Nuevo Sol'){?>(S/.)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Libra'){?>(&#163;)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Uruguayo'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Bolivar'){?>(Bs.)<?php }else{ ?>(&#128;)<?php }?></td>
				</tr>
			<?php }?>
		<?php }} ?>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
        	   <?php if ($_smarty_tpl->getVariable('item')->value->getId()){?>
				<tr>
					<td><?php echo ucfirst($_smarty_tpl->getVariable('item')->value->profile->code);?>
</td>
					<td><?php echo ucfirst($_smarty_tpl->getVariable('item')->value->profile->detail);?>
</td>
					<td><?php echo number_format($_smarty_tpl->getVariable('item')->value->profile->quantity,2,',','.');?>
</td>
					<td><?php echo number_format($_smarty_tpl->getVariable('item')->value->profile->unit_price,2,',','.');?>
</td>
					<td><?php echo number_format($_smarty_tpl->getVariable('item')->value->profile->iva,2,',','.');?>
</td>
					<td><?php echo number_format($_smarty_tpl->getVariable('item')->value->profile->iva2,2,',','.');?>
</td>
					<td><?php echo number_format($_smarty_tpl->getVariable('item')->value->profile->subtotal,2,',','.');?>
</td>
				</tr>
			<?php }?>
        <?php }} ?>
       </table>
	 <?php }?>
  	<div class="box" id="form_box_">
  	  <div class="form_row_l33" id="form_invoice_company_">
  	  &nbsp;
  	  </div> 
      <div class="form_row_r" id="form_invoice_company_">
			<div class="form_row_r_1">Subtotal:</div> 
			<div class="form_row_r_2"><?php echo number_format($_smarty_tpl->getVariable('invoice')->value->profile->subtotal,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></div> 
			<?php if ($_smarty_tpl->getVariable('invoice')->value->profile->discount>0){?><?php $_smarty_tpl->tpl_vars['current_desc'] = new Smarty_variable($_smarty_tpl->getVariable('invoice')->value->profile->subtotal*$_smarty_tpl->getVariable('invoice')->value->profile->discount*0.01, null, null);?>
			<div class="form_row_r_1">Desc. (<?php echo $_smarty_tpl->getVariable('invoice')->value->profile->discount;?>
 &#37;):</div>
			<div class="form_row_r_2"><?php echo number_format($_smarty_tpl->getVariable('current_desc')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></div> 
			<?php }?>
			<?php if ($_smarty_tpl->getVariable('invoice')->value->profile->discount>0){?><?php $_smarty_tpl->tpl_vars['current_base'] = new Smarty_variable($_smarty_tpl->getVariable('invoice')->value->profile->subtotal-$_smarty_tpl->getVariable('current_desc')->value, null, null);?>
			<div class="form_row_r_1">Base Imponible:</div>
			<div class="form_row_r_2"><?php echo number_format($_smarty_tpl->getVariable('current_base')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></div> 
			<?php }else{ ?><?php $_smarty_tpl->tpl_vars['current_base'] = new Smarty_variable($_smarty_tpl->getVariable('invoice')->value->profile->subtotal, null, null);?>
			<div class="form_row_r_1">Base Imponible:</div>
			<div class="form_row_r_2"><?php echo number_format($_smarty_tpl->getVariable('invoice')->value->profile->base,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></div>
			<?php }?>
			
		<?php $_smarty_tpl->tpl_vars['iva_t2__'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['iva_t__'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['tot_item2'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['tot_item'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['iva'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['iva2'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['iva_total'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['iva2_total'] = new Smarty_variable(0, null, 3);?>
		<?php $_smarty_tpl->tpl_vars['total_iva_1'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['total_iva_2'] = new Smarty_variable(0, null, 3);?>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
           <?php if ($_smarty_tpl->getVariable('item')->value->profile->iva!=$_smarty_tpl->getVariable('iva')->value&&$_smarty_tpl->getVariable('item')->value->profile->iva>0){?>   		
  				<?php if ($_smarty_tpl->getVariable('invoice')->value->profile->discount){?>
    					<?php $_smarty_tpl->tpl_vars['discount__'] = new Smarty_variable(100-$_smarty_tpl->getVariable('invoice')->value->profile->discount, null, null);?>
    					<?php $_smarty_tpl->tpl_vars['iva_tot'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva_total*$_smarty_tpl->getVariable('discount__')->value*0.01, null, 3);?>
    				<?php }else{ ?>
    					<?php $_smarty_tpl->tpl_vars['iva_tot'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva_total, null, 3);?>
    				<?php }?>  
    				    	<?php $_smarty_tpl->tpl_vars['iva_t__'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva_total, null, 3);?>	
        				<?php $_smarty_tpl->tpl_vars['iva_total'] = new Smarty_variable($_smarty_tpl->getVariable('iva_tot')->value, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['tot_item'] = new Smarty_variable($_smarty_tpl->getVariable('tot_item')->value+1, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['iva'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva, null, 3);?>

        				<?php if ($_smarty_tpl->getVariable('ivas_')->value[$_smarty_tpl->getVariable('tot_item')->value]==$_smarty_tpl->getVariable('iva_t__')->value){?>
        				<div class="form_row_r_1">I.V.A. (<?php echo number_format($_smarty_tpl->getVariable('item')->value->profile->iva,2,',','.');?>
) &#37;:</div>
        				<div class="form_row_r_2"><?php echo number_format($_smarty_tpl->getVariable('iva_total')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></div> 
       			    <?php $_smarty_tpl->tpl_vars['total_iva_1'] = new Smarty_variable($_smarty_tpl->getVariable('total_iva_1')->value+$_smarty_tpl->getVariable('iva_total')->value, null, 3);?>
       			    <?php }?>
    			<?php }elseif($_smarty_tpl->getVariable('item')->value->profile->iva>0){?>	
    				<?php if ($_smarty_tpl->getVariable('invoice')->value->profile->discount){?>
    					<?php $_smarty_tpl->tpl_vars['discount__'] = new Smarty_variable(100-$_smarty_tpl->getVariable('invoice')->value->profile->discount, null, null);?>
    					<?php $_smarty_tpl->tpl_vars['iva_tot_'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva_total*$_smarty_tpl->getVariable('discount__')->value*0.01, null, 3);?>
    				<?php }else{ ?>
    					<?php $_smarty_tpl->tpl_vars['iva_tot_'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva_total, null, 3);?>
    				<?php }?>
    					<?php $_smarty_tpl->tpl_vars['iva_t_'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva_total, null, 3);?>
    					<?php $_smarty_tpl->tpl_vars['iva_t__'] = new Smarty_variable($_smarty_tpl->getVariable('iva_t__')->value+$_smarty_tpl->getVariable('iva_t_')->value, null, 3);?>
    					
        				<?php $_smarty_tpl->tpl_vars['iva_total'] = new Smarty_variable($_smarty_tpl->getVariable('iva_total')->value+$_smarty_tpl->getVariable('iva_tot_')->value, null, 3);?>
        				
        				<?php if ($_smarty_tpl->getVariable('ivas_')->value[$_smarty_tpl->getVariable('tot_item')->value]==$_smarty_tpl->getVariable('iva_t__')->value){?>
        				<div class="form_row_r_1">I.V.A. (<?php echo number_format($_smarty_tpl->getVariable('item')->value->profile->iva,2,',','.');?>
) &#37;:</div> 
        				<div class="form_row_r_2"><?php echo number_format($_smarty_tpl->getVariable('iva_total')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></div> 
       			    <?php $_smarty_tpl->tpl_vars['total_iva_1'] = new Smarty_variable($_smarty_tpl->getVariable('total_iva_1')->value+$_smarty_tpl->getVariable('iva_total')->value, null, 3);?>
       			    <?php }?>	
			<?php }?>
        <?php }} ?>
		
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items3')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>      		
			<?php if ($_smarty_tpl->getVariable('item')->value->profile->iva2!=$_smarty_tpl->getVariable('iva2')->value&&$_smarty_tpl->getVariable('item')->value->profile->iva2>0){?>      		
				
    				<?php if ($_smarty_tpl->getVariable('invoice')->value->profile->discount){?>
    					<?php $_smarty_tpl->tpl_vars['discount2__'] = new Smarty_variable(100-$_smarty_tpl->getVariable('invoice')->value->profile->discount, null, null);?>
    					<?php $_smarty_tpl->tpl_vars['iva2_tot'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva2_total*$_smarty_tpl->getVariable('discount2__')->value*0.01, null, 3);?>
    				<?php }else{ ?>
    					<?php $_smarty_tpl->tpl_vars['iva2_tot'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva2_total, null, 3);?>
    				<?php }?>
    					<?php $_smarty_tpl->tpl_vars['iva_t2__'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva2_total, null, 3);?>
        				
        				<?php $_smarty_tpl->tpl_vars['iva2_total'] = new Smarty_variable($_smarty_tpl->getVariable('iva2_tot')->value, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['tot_item2'] = new Smarty_variable($_smarty_tpl->getVariable('tot_item2')->value+1, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['iva2'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva2, null, 3);?>
			
        				<?php if ($_smarty_tpl->getVariable('ivas2_')->value[$_smarty_tpl->getVariable('tot_item2')->value]==$_smarty_tpl->getVariable('iva_t2__')->value){?>
        				<div class="form_row_r_1">Otros Imp. (<?php echo number_format($_smarty_tpl->getVariable('item')->value->profile->iva2,2,',','.');?>
) &#37;:</div> 
        				<div class="form_row_r_2"><?php echo number_format($_smarty_tpl->getVariable('iva2_total')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></div> 
       			    <?php $_smarty_tpl->tpl_vars['total_iva_2'] = new Smarty_variable($_smarty_tpl->getVariable('total_iva_2')->value+$_smarty_tpl->getVariable('iva2_total')->value, null, 3);?>
       			    <?php }?>       				
    			<?php }elseif($_smarty_tpl->getVariable('item')->value->profile->iva2>0){?>	
    				<?php if ($_smarty_tpl->getVariable('invoice')->value->profile->discount){?>
    					<?php $_smarty_tpl->tpl_vars['discount2__'] = new Smarty_variable(100-$_smarty_tpl->getVariable('invoice')->value->profile->discount, null, null);?>
    					<?php $_smarty_tpl->tpl_vars['iva2_tot'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva2_total*$_smarty_tpl->getVariable('discount2__')->value*0.01, null, 3);?>
    				<?php }else{ ?>
    					<?php $_smarty_tpl->tpl_vars['iva2_tot'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva2_total, null, 3);?>
    				<?php }?>
    					<?php $_smarty_tpl->tpl_vars['iva_t2_'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva2_total, null, 3);?>
    					<?php $_smarty_tpl->tpl_vars['iva_t2__'] = new Smarty_variable($_smarty_tpl->getVariable('iva_t2__')->value+$_smarty_tpl->getVariable('iva_t2_')->value, null, 3);?>		
        	
        				<?php $_smarty_tpl->tpl_vars['iva2_total'] = new Smarty_variable($_smarty_tpl->getVariable('iva2_total')->value+$_smarty_tpl->getVariable('iva2_tot')->value, null, 3);?>
        				
        				<?php if ($_smarty_tpl->getVariable('ivas2_')->value[$_smarty_tpl->getVariable('tot_item2')->value]==$_smarty_tpl->getVariable('iva_t2__')->value){?>
        				<div class="form_row_r_1">Otros Imp. (<?php echo number_format($_smarty_tpl->getVariable('item')->value->profile->iva2,2,',','.');?>
) &#37;:</div> 
        				<div class="form_row_r_2"><?php echo number_format($_smarty_tpl->getVariable('iva2_total')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></div> 
       			    <?php $_smarty_tpl->tpl_vars['total_iva_2'] = new Smarty_variable($_smarty_tpl->getVariable('total_iva_2')->value+$_smarty_tpl->getVariable('iva2_total')->value, null, 3);?>
       			    <?php }?>
			<?php }?>	
        <?php }} ?>
        <?php if ($_smarty_tpl->getVariable('invoice')->value->profile->retention>0){?>
			<?php $_smarty_tpl->tpl_vars['retention_total'] = new Smarty_variable($_smarty_tpl->getVariable('current_base')->value*$_smarty_tpl->getVariable('invoice')->value->profile->retention*0.01, null, null);?>
			<div class="form_row_r_1">Retenci&oacute;n IRPF (<?php echo $_smarty_tpl->getVariable('invoice')->value->profile->retention;?>
) &#37;:</div> 
			<div class="form_row_r_2"><?php echo number_format($_smarty_tpl->getVariable('retention_total')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Argentino'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Chileno'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Colombiano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Dominicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Dolar'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Quetzal'){?>Q<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Lempira'){?>L<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Mexicano'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Balboa'){?>B/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Nuevo Sol'){?>S/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Uruguayo'){?>&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Bolivar'){?>Bs.<?php }else{ ?>&#128;<?php }?></div> 
		<?php }?>
		</div>
	</div>
	<div class="bottom_row" id="form_name_">
	<?php if ($_smarty_tpl->getVariable('invoice')->value->profile->discount>0){?><?php $_smarty_tpl->tpl_vars['current_tot'] = new Smarty_variable($_smarty_tpl->getVariable('current_base')->value+$_smarty_tpl->getVariable('total_iva_1')->value+$_smarty_tpl->getVariable('total_iva_2')->value-$_smarty_tpl->getVariable('retention_total')->value, null, null);?>
			<label>Total Factura:</label>
			<div class="form_row_r_3"><?php echo number_format($_smarty_tpl->getVariable('current_tot')->value,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Argentino'){?>ARS &#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Chileno'){?>CLP &#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Colombiano'){?>COP &#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Dominicano'){?>DOP &#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Dolar'){?>USD &#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Quetzal'){?>QTD Q<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Lempira'){?>HNL L<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Mexicano'){?>MXN &#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Balboa'){?>PAB B/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Nuevo Sol'){?>PEN S/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Uruguayo'){?>UYU &#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Bolivar'){?>VEF Bs.<?php }else{ ?>&#128;<?php }?></div> 
	<?php }else{ ?>
    
			<label>Total Factura:</label>
			<div class="form_row_r_3"><?php echo number_format($_smarty_tpl->getVariable('invoice')->value->profile->total,2,',','.');?>
 <?php if ($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Argentino'){?>ARS &#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Boliviano'){?>b&#36<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Chileno'){?>CLP &#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Colombiano'){?>COP &#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Colon'){?>&#162;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Dominicano'){?>DOP &#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Dolar'){?>USD &#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Euro'){?>&#128;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Quetzal'){?>QTD Q<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Lempira'){?>HNL L<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Mexicano'){?>MXN &#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Cordoba'){?>C&#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Balboa'){?>PAB B/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Guarani'){?>&#8370;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Nuevo Sol'){?>PEN S/.<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Libra'){?>&#163;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Peso Uruguayo'){?>UYU &#36;<?php }elseif($_smarty_tpl->getVariable('invoice')->value->profile->currency=='Bolivar'){?>VEF Bs.<?php }else{ ?>&#128;<?php }?></div> 
    <?php }?>
     </div><?php if ($_smarty_tpl->getVariable('invoice')->value->profile->terms||$_smarty_tpl->getVariable('invoice')->value->profile->recc){?>
    <div class="conditions_row" id="form_name_">
			<label for="form_invoice_company_">Condiciones:</label>
			<span><?php echo $_smarty_tpl->getVariable('invoice')->value->profile->terms;?>
<?php if ($_smarty_tpl->getVariable('invoice')->value->profile->recc){?> &bull; Factura en R&eacute;gimen Especial de Criterio de Caja.<?php }?></span>
    </div><?php }?>
    </body></html>