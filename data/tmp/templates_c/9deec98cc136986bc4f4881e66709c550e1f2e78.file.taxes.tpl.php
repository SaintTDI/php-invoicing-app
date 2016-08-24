<?php /* Smarty version Smarty-3.0.8, created on 2015-02-23 01:50:44
         compiled from "/var/www/app/templates/./herramientas/facturas/taxes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200246176154ea7964a94ef0-76723981%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9deec98cc136986bc4f4881e66709c550e1f2e78' => 
    array (
      0 => '/var/www/app/templates/./herramientas/facturas/taxes.tpl',
      1 => 1423691284,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200246176154ea7964a94ef0-76723981',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (count($_smarty_tpl->getVariable('items')->value)==0){?>
		<?php $_smarty_tpl->tpl_vars['currency_1'] = new Smarty_variable($_smarty_tpl->getVariable('default_currency')->value, null, null);?><?php $_smarty_tpl->tpl_vars['currency_2'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->currency, null, null);?>
        <?php if ($_smarty_tpl->getVariable('currency_2')->value){?><?php $_smarty_tpl->tpl_vars['currency_'] = new Smarty_variable($_smarty_tpl->getVariable('currency_2')->value, null, null);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['currency_'] = new Smarty_variable($_smarty_tpl->getVariable('currency_1')->value, null, null);?><?php }?>	
   <div class="form_box">
	      <div class="row" id="form_iva_">
	        <label for="form_iva_">Total I.V.A. <?php if ($_smarty_tpl->getVariable('currency_')->value=='Peso Argentino'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Boliviano'){?>(b&#36)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Chileno'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Colombiano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Colon'){?>(&#162;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Dominicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Dolar'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Euro'){?>(&#128;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Quetzal'){?>(Q)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Lempira'){?>(L)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Mexicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Cordoba'){?>(C&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Balboa'){?>(B/.)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Guarani'){?>(&#8370;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Nuevo Sol'){?>(S/.)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Libra'){?>(&#163;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Uruguayo'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Bolivar'){?>(Bs.)<?php }else{ ?>(&#128;)<?php }?>:</label>
	        <?php $_smarty_tpl->tpl_vars['current_iva'] = new Smarty_variable(0, null, null);?>
	        <input type="text" id="form_iva" name="iva" value="<?php echo $_smarty_tpl->getVariable('current_iva')->value;?>
" data-a-dec="," data-a-sep="." data-v-min="-999999999.99"  />
	        <input type="hidden" id="form_iva_p" name="iva_p" value="<?php echo $_smarty_tpl->getVariable('default_iva')->value;?>
"/>
	     </div>
	</div>
	<div class="form_box">
	    <div class="row" id="form_iva2_">
	        <label for="form_iva2_">Otros impuestos <?php if ($_smarty_tpl->getVariable('currency_')->value=='Peso Argentino'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Boliviano'){?>(b&#36)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Chileno'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Colombiano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Colon'){?>(&#162;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Dominicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Dolar'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Euro'){?>(&#128;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Quetzal'){?>(Q)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Lempira'){?>(L)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Mexicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Cordoba'){?>(C&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Balboa'){?>(B/.)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Guarani'){?>(&#8370;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Nuevo Sol'){?>(S/.)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Libra'){?>(&#163;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Uruguayo'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Bolivar'){?>(Bs.)<?php }else{ ?>(&#128;)<?php }?>:</label>
	        <?php $_smarty_tpl->tpl_vars['current_iva2'] = new Smarty_variable(0, null, null);?>
	        <input type="text" id="form_iva2" name="iva2" value="<?php echo $_smarty_tpl->getVariable('current_iva2')->value;?>
" data-a-dec="," data-a-sep="." data-v-min="-999999999.99"/>
	        <input type="hidden" id="form_iva2_p" name="iva2_p" value="<?php echo $_smarty_tpl->getVariable('default_iva2')->value;?>
"/>
	    </div>
    </div>
    
    <script type="text/javascript"> 		
 			jQuery(document).ready(function() {
       				jQuery('#form_subtotal').autoNumeric("init");
      				jQuery('#form_discount').autoNumeric("init");
      				jQuery('#form_base').autoNumeric("init");
      				jQuery('#form_iva').autoNumeric("init");
      				jQuery('#form_iva2').autoNumeric("init");
      				jQuery('#form_retention').autoNumeric("init");
      				jQuery('#form_total').autoNumeric("init");
			 		jQuery('#form_subtotal').keyup(doMath);
			 		jQuery('#form_discount').keyup(doMath);
			 		jQuery('#form_base').keyup(doMath);
			 		jQuery('#form_iva').keyup(doMath);
			 		jQuery('#form_iva2').keyup(doMath);
			 		jQuery('#form_retention').keyup(doMath);
			 		jQuery('#form_total').keyup(doMath);
			 		
					jQuery("#form_project").on("input", function() {
    						jQuery('#form_project_id').val('');
					});
			});
	
      		function doMath() {			
   				var subtotal_ = jQuery("#form_subtotal").autoNumeric('get');
 				var discount_ = jQuery("#form_discount").autoNumeric('get');
 				var base_ = jQuery("#form_base").autoNumeric('get');		
   				var iva_ = jQuery("#form_iva_p").val();
   				var iva2_ = jQuery("#form_iva2_p").val();
				var retention_ = jQuery("#form_retention").autoNumeric('get');
   				var total_ = jQuery("#form_total").autoNumeric('get');
				var amrs__ = 100 - discount_;
				var amr__ = amrs__ * 0.01;
   				var amount = subtotal_ * amr__;
				var amt2_ = amount / subtotal_;
   				var amount2 = amt2_ * iva_;
   				var amount3 =  amt2_ * iva2_;
   				var amount4 = retention_ * 0.01 * amount;
   				var amount5 = amount + amount2 + amount3 - amount4;
      			jQuery('#form_base').autoNumeric('set', amount);
      			jQuery('#form_iva').autoNumeric('set', amount2);
      			jQuery('#form_iva2').autoNumeric('set', amount3);
      			//jQuery('#form_retention').autoNumeric('set', amount4);
      			jQuery('#form_total').autoNumeric('set', amount5);
			}
     </script>
     
    
<?php }else{ ?>
		<?php $_smarty_tpl->tpl_vars['currency_1'] = new Smarty_variable($_smarty_tpl->getVariable('default_currency')->value, null, null);?><?php $_smarty_tpl->tpl_vars['currency_2'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->currency, null, null);?>
        <?php if ($_smarty_tpl->getVariable('currency_2')->value){?><?php $_smarty_tpl->tpl_vars['currency_'] = new Smarty_variable($_smarty_tpl->getVariable('currency_2')->value, null, null);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['currency_'] = new Smarty_variable($_smarty_tpl->getVariable('currency_1')->value, null, null);?><?php }?>	
    
    <script type="text/javascript"> 		
 			jQuery(document).ready(function() {
       				jQuery('#form_subtotal').autoNumeric("init");
      				jQuery('#form_discount').autoNumeric("init");
      				jQuery('#form_base').autoNumeric("init");
      				jQuery('#form_retention').autoNumeric("init");
      				jQuery('#form_total').autoNumeric("init");
			});
      </script>
     

		<?php $_smarty_tpl->tpl_vars['iva_t2__'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['iva_t__'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['total_iva_1'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['total_iva_2'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['total_1'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['total_2'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['iva'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['iva2'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['iva_total'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['iva2_total'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['tot_item'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['tot_item2'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['current_iva_total'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['current_iva2_total'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['counter1'] = new Smarty_variable(0, null, 3);?><?php $_smarty_tpl->tpl_vars['counter2'] = new Smarty_variable(0, null, 3);?>
		
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
           <?php if ($_smarty_tpl->getVariable('item')->value->profile->iva!=$_smarty_tpl->getVariable('iva')->value&&$_smarty_tpl->getVariable('item')->value->profile->iva>0){?>
   			 <div class="form_box">  		
    				<div class="row" id="form_iva_">        		
    				<?php if ($_smarty_tpl->getVariable('fp')->value->discount){?>
    					<?php $_smarty_tpl->tpl_vars['discount__'] = new Smarty_variable(100-$_smarty_tpl->getVariable('fp')->value->discount, null, null);?>
    					<?php $_smarty_tpl->tpl_vars['iva_tot'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva_total*$_smarty_tpl->getVariable('discount__')->value*0.01, null, 3);?>
    				<?php }else{ ?>
    					<?php $_smarty_tpl->tpl_vars['iva_tot'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva_total, null, 3);?>
    				<?php }?>
    					<?php $_smarty_tpl->tpl_vars['iva_t__'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva_total, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['iva_total'] = new Smarty_variable($_smarty_tpl->getVariable('iva_tot')->value, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['tot_item'] = new Smarty_variable($_smarty_tpl->getVariable('tot_item')->value+1, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['iva'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['total_1'] = new Smarty_variable($_smarty_tpl->getVariable('total_1')->value+1, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['current_iva_total'] = new Smarty_variable($_smarty_tpl->getVariable('current_iva_total')->value+$_smarty_tpl->getVariable('iva_tot')->value, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['counter1'] = new Smarty_variable($_smarty_tpl->getVariable('total_1')->value, null, 3);?>
    				<?php if ($_smarty_tpl->getVariable('fp')->value->discount){?>
    					<?php $_smarty_tpl->tpl_vars['discount__'] = new Smarty_variable(100-$_smarty_tpl->getVariable('fp')->value->discount, null, null);?>
    					<?php $_smarty_tpl->tpl_vars['add__'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva_total*$_smarty_tpl->getVariable('discount__')->value*0.01, null, null);?>
    					<?php $_smarty_tpl->tpl_vars['total_iva_1'] = new Smarty_variable($_smarty_tpl->getVariable('total_iva_1')->value+$_smarty_tpl->getVariable('add__')->value, null, 3);?>
    				<?php }else{ ?>
    					<?php $_smarty_tpl->tpl_vars['total_iva_1'] = new Smarty_variable($_smarty_tpl->getVariable('total_iva_1')->value+$_smarty_tpl->getVariable('item')->value->profile->iva_total, null, 3);?>
    				<?php }?>
       				<label for="form_iva_">I.V.A.<?php echo $_smarty_tpl->getVariable('item')->value->profile->iva;?>
 % <?php if ($_smarty_tpl->getVariable('currency_')->value=='Peso Argentino'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Boliviano'){?>(b&#36)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Chileno'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Colombiano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Colon'){?>(&#162;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Dominicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Dolar'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Euro'){?>(&#128;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Quetzal'){?>(Q)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Lempira'){?>(L)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Mexicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Cordoba'){?>(C&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Balboa'){?>(B/.)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Guarani'){?>(&#8370;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Nuevo Sol'){?>(S/.)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Libra'){?>(&#163;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Uruguayo'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Bolivar'){?>(Bs.)<?php }else{ ?>(&#128;)<?php }?>:</label>

        				<input type="text" id="form_iva_<?php echo $_smarty_tpl->getVariable('tot_item')->value;?>
" name="iva_<?php echo $_smarty_tpl->getVariable('tot_item')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('iva_total')->value;?>
" data-a-dec="," data-a-sep="." data-v-min="-999999999.99"  />
        				<input type="hidden" id="form_iva_p_<?php echo $_smarty_tpl->getVariable('tot_item')->value;?>
" name="iva_p_<?php echo $_smarty_tpl->getVariable('tot_item')->value;?>
" value="<?php if ($_smarty_tpl->getVariable('item')->value->profile->iva){?><?php echo number_format($_smarty_tpl->getVariable('item')->value->profile->iva,2,',','.');?>
<?php }else{ ?>0<?php }?>"/>

      				<?php if ($_smarty_tpl->getVariable('ivas_')->value[$_smarty_tpl->getVariable('tot_item')->value]==$_smarty_tpl->getVariable('iva_t__')->value){?>
        				<script type="text/javascript"> 		
 					jQuery(document).ready(function() {
						jQuery('#form_iva_<?php echo $_smarty_tpl->getVariable('tot_item')->value;?>
').autoNumeric("init");
						jQuery('#form_iva_<?php echo $_smarty_tpl->getVariable('tot_item')->value;?>
').autoNumeric('set', <?php echo $_smarty_tpl->getVariable('iva_total')->value;?>
);
					});
     				</script>
        				<?php }?>
				</div>  
    			</div> 				
    			<?php }else{ ?>	
    				<?php if ($_smarty_tpl->getVariable('fp')->value->discount){?>
    					<?php $_smarty_tpl->tpl_vars['discount__'] = new Smarty_variable(100-$_smarty_tpl->getVariable('fp')->value->discount, null, null);?>
    					<?php $_smarty_tpl->tpl_vars['iva_tot'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva_total*$_smarty_tpl->getVariable('discount__')->value*0.01, null, 3);?>
    				<?php }else{ ?>
    					<?php $_smarty_tpl->tpl_vars['iva_tot'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva_total, null, 3);?>
    				<?php }?>
    					<?php $_smarty_tpl->tpl_vars['iva_t_'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva_total, null, 3);?>
    					<?php $_smarty_tpl->tpl_vars['iva_t__'] = new Smarty_variable($_smarty_tpl->getVariable('iva_t__')->value+$_smarty_tpl->getVariable('iva_t_')->value, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['iva_total'] = new Smarty_variable($_smarty_tpl->getVariable('iva_total')->value+$_smarty_tpl->getVariable('iva_tot')->value, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['counter1'] = new Smarty_variable($_smarty_tpl->getVariable('counter1')->value+1, null, 3);?>
    				<?php if ($_smarty_tpl->getVariable('fp')->value->discount){?>
    					<?php $_smarty_tpl->tpl_vars['discount__'] = new Smarty_variable(100-$_smarty_tpl->getVariable('fp')->value->discount, null, null);?>
    					<?php $_smarty_tpl->tpl_vars['add__'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva_total*$_smarty_tpl->getVariable('discount__')->value*0.01, null, null);?>
    					<?php $_smarty_tpl->tpl_vars['total_iva_1'] = new Smarty_variable($_smarty_tpl->getVariable('total_iva_1')->value+$_smarty_tpl->getVariable('add__')->value, null, 3);?>
    				<?php }else{ ?>
    					<?php $_smarty_tpl->tpl_vars['total_iva_1'] = new Smarty_variable($_smarty_tpl->getVariable('total_iva_1')->value+$_smarty_tpl->getVariable('item')->value->profile->iva_total, null, 3);?>
    				<?php }?>
      				<?php if ($_smarty_tpl->getVariable('ivas_')->value[$_smarty_tpl->getVariable('tot_item')->value]==$_smarty_tpl->getVariable('iva_t__')->value){?> 
        				<script type="text/javascript"> 		
 					jQuery(document).ready(function() {
						jQuery('#form_iva_<?php echo $_smarty_tpl->getVariable('tot_item')->value;?>
').autoNumeric("init");
						jQuery('#form_iva_<?php echo $_smarty_tpl->getVariable('tot_item')->value;?>
').autoNumeric('set', <?php echo $_smarty_tpl->getVariable('iva_total')->value;?>
);
					});
     				</script>
        				<?php }?>
			<?php }?>
        <?php }} ?>
        
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items3')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>      		
			<?php if ($_smarty_tpl->getVariable('item')->value->profile->iva2!=$_smarty_tpl->getVariable('iva2')->value&&$_smarty_tpl->getVariable('item')->value->profile->iva2>0){?>
			<div class="form_box">  
    				<div class="row" id="form_iva2_">        		
    				<?php if ($_smarty_tpl->getVariable('fp')->value->discount){?>
    					<?php $_smarty_tpl->tpl_vars['discount2__'] = new Smarty_variable(100-$_smarty_tpl->getVariable('fp')->value->discount, null, null);?>
    					<?php $_smarty_tpl->tpl_vars['iva2_tot'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva2_total*$_smarty_tpl->getVariable('discount2__')->value*0.01, null, 3);?>
    				<?php }else{ ?>
    					<?php $_smarty_tpl->tpl_vars['iva2_tot'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva2_total, null, 3);?>
    				<?php }?>
    					<?php $_smarty_tpl->tpl_vars['iva_t2__'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva2_total, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['iva2_total'] = new Smarty_variable($_smarty_tpl->getVariable('iva2_tot')->value, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['tot_item2'] = new Smarty_variable($_smarty_tpl->getVariable('tot_item2')->value+1, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['iva2'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva2, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['total_2'] = new Smarty_variable($_smarty_tpl->getVariable('total_2')->value+1, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['current_iva2_total'] = new Smarty_variable($_smarty_tpl->getVariable('current_iva2_total')->value+$_smarty_tpl->getVariable('iva2_tot')->value, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['counter2'] = new Smarty_variable($_smarty_tpl->getVariable('total_2')->value, null, 3);?>
    				<?php if ($_smarty_tpl->getVariable('fp')->value->discount){?>
    					<?php $_smarty_tpl->tpl_vars['discount2__'] = new Smarty_variable(100-$_smarty_tpl->getVariable('fp')->value->discount, null, null);?>
    					<?php $_smarty_tpl->tpl_vars['add2__'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva2_total*$_smarty_tpl->getVariable('discount2__')->value*0.01, null, null);?>
    					<?php $_smarty_tpl->tpl_vars['total_iva_2'] = new Smarty_variable($_smarty_tpl->getVariable('total_iva_2')->value+$_smarty_tpl->getVariable('add2__')->value, null, 3);?>
    				<?php }else{ ?>
    					<?php $_smarty_tpl->tpl_vars['total_iva_2'] = new Smarty_variable($_smarty_tpl->getVariable('total_iva_2')->value+$_smarty_tpl->getVariable('item')->value->profile->iva2_total, null, 3);?>
    				<?php }?>
       				<label for="form_iva2_">Otros Imp. <?php echo $_smarty_tpl->getVariable('item')->value->profile->iva2;?>
 % <?php if ($_smarty_tpl->getVariable('currency_')->value=='Peso Argentino'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Boliviano'){?>(b&#36)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Chileno'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Colombiano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Colon'){?>(&#162;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Dominicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Dolar'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Euro'){?>(&#128;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Quetzal'){?>(Q)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Lempira'){?>(L)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Mexicano'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Cordoba'){?>(C&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Balboa'){?>(B/.)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Guarani'){?>(&#8370;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Nuevo Sol'){?>(S/.)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Libra'){?>(&#163;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Peso Uruguayo'){?>(&#36;)<?php }elseif($_smarty_tpl->getVariable('currency_')->value=='Bolivar'){?>(Bs.)<?php }else{ ?>(&#128;)<?php }?>:</label>

        				<input type="text" id="form_iva2_<?php echo $_smarty_tpl->getVariable('tot_item2')->value;?>
" name="iva2_<?php echo $_smarty_tpl->getVariable('tot_item2')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('iva2_total')->value;?>
" data-a-dec="," data-a-sep="." data-v-min="-999999999.99"  />
        				<input type="hidden" id="form_iva2_p_<?php echo $_smarty_tpl->getVariable('tot_item2')->value;?>
" name="iva2_p_<?php echo $_smarty_tpl->getVariable('tot_item2')->value;?>
" value="<?php if ($_smarty_tpl->getVariable('item')->value->profile->iva2){?><?php echo number_format($_smarty_tpl->getVariable('item')->value->profile->iva2,2,',','.');?>
<?php }else{ ?>0<?php }?>"/>
        				
        				<?php if ($_smarty_tpl->getVariable('ivas2_')->value[$_smarty_tpl->getVariable('tot_item2')->value]==$_smarty_tpl->getVariable('iva_t2__')->value){?>
        				<script type="text/javascript"> 		
 					jQuery(document).ready(function() {
						jQuery('#form_iva2_<?php echo $_smarty_tpl->getVariable('tot_item2')->value;?>
').autoNumeric("init");
						jQuery('#form_iva2_<?php echo $_smarty_tpl->getVariable('tot_item2')->value;?>
').autoNumeric('set', <?php echo $_smarty_tpl->getVariable('iva2_total')->value;?>
);
					});
     				</script>
       			    <?php }?>	
        			</div>
    			 </div>	       				
    			<?php }else{ ?>	
    				<?php if ($_smarty_tpl->getVariable('fp')->value->discount){?>
    					<?php $_smarty_tpl->tpl_vars['discount2__'] = new Smarty_variable(100-$_smarty_tpl->getVariable('fp')->value->discount, null, null);?>
    					<?php $_smarty_tpl->tpl_vars['iva2_tot'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva2_total*$_smarty_tpl->getVariable('discount2__')->value*0.01, null, 3);?>
    				<?php }else{ ?>
    					<?php $_smarty_tpl->tpl_vars['iva2_tot'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva2_total, null, 3);?>
    				<?php }?>
    					<?php $_smarty_tpl->tpl_vars['iva_t2_'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva2_total, null, 3);?>
    					<?php $_smarty_tpl->tpl_vars['iva_t2__'] = new Smarty_variable($_smarty_tpl->getVariable('iva_t2__')->value+$_smarty_tpl->getVariable('iva_t2_')->value, null, 3);?>
    					
        				<?php $_smarty_tpl->tpl_vars['iva2_total'] = new Smarty_variable($_smarty_tpl->getVariable('iva2_total')->value+$_smarty_tpl->getVariable('iva2_tot')->value, null, 3);?>
        				<?php $_smarty_tpl->tpl_vars['counter2'] = new Smarty_variable($_smarty_tpl->getVariable('counter2')->value+1, null, 3);?>
     			<?php if ($_smarty_tpl->getVariable('fp')->value->discount){?>
    					<?php $_smarty_tpl->tpl_vars['discount2__'] = new Smarty_variable(100-$_smarty_tpl->getVariable('fp')->value->discount, null, null);?>
    					<?php $_smarty_tpl->tpl_vars['add2__'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->profile->iva2_total*$_smarty_tpl->getVariable('discount2__')->value*0.01, null, null);?>
    					<?php $_smarty_tpl->tpl_vars['total_iva_2'] = new Smarty_variable($_smarty_tpl->getVariable('total_iva_2')->value+$_smarty_tpl->getVariable('add2__')->value, null, 3);?>
    				<?php }else{ ?>
    					<?php $_smarty_tpl->tpl_vars['total_iva_2'] = new Smarty_variable($_smarty_tpl->getVariable('total_iva_2')->value+$_smarty_tpl->getVariable('item')->value->profile->iva2_total, null, 3);?>
    				<?php }?>
        				<?php if ($_smarty_tpl->getVariable('ivas2_')->value[$_smarty_tpl->getVariable('tot_item2')->value]==$_smarty_tpl->getVariable('iva_t2__')->value){?>
        				<script type="text/javascript"> 		
 					jQuery(document).ready(function() {
						jQuery('#form_iva2_<?php echo $_smarty_tpl->getVariable('tot_item2')->value;?>
').autoNumeric("init");
						jQuery('#form_iva2_<?php echo $_smarty_tpl->getVariable('tot_item2')->value;?>
').autoNumeric('set', <?php echo $_smarty_tpl->getVariable('iva2_total')->value;?>
);
					});
     				</script>
       			    <?php }?>
			<?php }?>	
        <?php }} ?>

        <?php $_smarty_tpl->tpl_vars['items_totales'] = new Smarty_variable(1, null, 3);?><?php $_smarty_tpl->tpl_vars['items_totales2'] = new Smarty_variable(1, null, 3);?><?php $_smarty_tpl->tpl_vars['items_totales3'] = new Smarty_variable(1, null, 3);?><?php $_smarty_tpl->tpl_vars['items_totales4'] = new Smarty_variable(1, null, 3);?><?php $_smarty_tpl->tpl_vars['items_totales5'] = new Smarty_variable(1, null, 3);?><?php $_smarty_tpl->tpl_vars['items_totales6'] = new Smarty_variable(1, null, 3);?><?php $_smarty_tpl->tpl_vars['items_totales7'] = new Smarty_variable(1, null, 3);?><?php $_smarty_tpl->tpl_vars['items_totales8'] = new Smarty_variable(1, null, 3);?><?php $_smarty_tpl->tpl_vars['items_totales9'] = new Smarty_variable(1, null, 3);?><?php $_smarty_tpl->tpl_vars['items_totales10'] = new Smarty_variable(1, null, 3);?><?php $_smarty_tpl->tpl_vars['items_totales11'] = new Smarty_variable(1, null, 3);?><?php $_smarty_tpl->tpl_vars['items_totales12'] = new Smarty_variable(1, null, 3);?><?php $_smarty_tpl->tpl_vars['items_totales13'] = new Smarty_variable(1, null, 3);?><?php $_smarty_tpl->tpl_vars['items_totales14'] = new Smarty_variable(1, null, 3);?><?php $_smarty_tpl->tpl_vars['items_totales15'] = new Smarty_variable(1, null, 3);?>

    	   <script type="text/javascript"> 		
 			jQuery(document).ready(function() {
		 			jQuery('#form_subtotal').keyup(doMath);
			 		jQuery('#form_discount').keyup(doMath);
			 		jQuery('#form_base').keyup(doMath);
			 		jQuery('#form_retention').keyup(doMath);
			 		jQuery('#form_total').keyup(doMath);
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?><?php if ($_smarty_tpl->getVariable('items_totales2')->value<=$_smarty_tpl->getVariable('total_1')->value){?>jQuery('#form_iva_<?php echo $_smarty_tpl->getVariable('items_totales2')->value;?>
').keyup(doMath); <?php }?><?php $_smarty_tpl->tpl_vars['items_totales2'] = new Smarty_variable($_smarty_tpl->getVariable('items_totales2')->value+1, null, 3);?><?php }} ?>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items3')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?><?php if ($_smarty_tpl->getVariable('items_totales11')->value<=$_smarty_tpl->getVariable('total_2')->value){?>jQuery('#form_iva2_<?php echo $_smarty_tpl->getVariable('items_totales11')->value;?>
').keyup(doMath); <?php }?><?php $_smarty_tpl->tpl_vars['items_totales11'] = new Smarty_variable($_smarty_tpl->getVariable('items_totales11')->value+1, null, 3);?><?php }} ?>
					jQuery("#form_project").on("input", function() {
    						jQuery('#form_project_id').val('');
					});
			});
			
		    function doMath() {		
   				var subtotal_ = jQuery("#form_subtotal").autoNumeric('get');
 				var discount_ = jQuery("#form_discount").autoNumeric('get');
 				var base_ = jQuery("#form_base").autoNumeric('get');
 				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?><?php if ($_smarty_tpl->getVariable('items_totales3')->value<=$_smarty_tpl->getVariable('total_1')->value){?>var iva_<?php echo $_smarty_tpl->getVariable('items_totales3')->value;?>
 = jQuery("#form_iva_p_<?php echo $_smarty_tpl->getVariable('items_totales3')->value;?>
").val(); <?php }?><?php $_smarty_tpl->tpl_vars['items_totales3'] = new Smarty_variable($_smarty_tpl->getVariable('items_totales3')->value+1, null, 3);?><?php }} ?>
 				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items3')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?><?php if ($_smarty_tpl->getVariable('items_totales12')->value<=$_smarty_tpl->getVariable('total_2')->value){?>var iva2_<?php echo $_smarty_tpl->getVariable('items_totales12')->value;?>
 = jQuery("#form_iva2_p_<?php echo $_smarty_tpl->getVariable('items_totales12')->value;?>
").val(); <?php }?><?php $_smarty_tpl->tpl_vars['items_totales12'] = new Smarty_variable($_smarty_tpl->getVariable('items_totales12')->value+1, null, 3);?><?php }} ?>
				var retention_ = jQuery("#form_retention").autoNumeric('get');
   				var total_ = jQuery("#form_total").autoNumeric('get');
				var amrs__ = 100 - discount_;
				var amr__ = amrs__ * 0.01;
   				var amount = subtotal_ * amr__;
				var amt2_ = amount / subtotal_;
				
				<?php  $_smarty_tpl->tpl_vars['iva_'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ivas_')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['iva_']->key => $_smarty_tpl->tpl_vars['iva_']->value){
?>var iva__<?php echo $_smarty_tpl->getVariable('items_totales7')->value;?>
 = <?php if ($_smarty_tpl->getVariable('ivas_')->value[$_smarty_tpl->getVariable('items_totales8')->value]){?><?php echo $_smarty_tpl->getVariable('ivas_')->value[$_smarty_tpl->getVariable('items_totales8')->value];?>
<?php }else{ ?>0<?php }?>; <?php $_smarty_tpl->tpl_vars['items_totales7'] = new Smarty_variable($_smarty_tpl->getVariable('items_totales7')->value+1, null, 3);?><?php $_smarty_tpl->tpl_vars['items_totales8'] = new Smarty_variable($_smarty_tpl->getVariable('items_totales8')->value+1, null, 3);?><?php }} ?>
				
				<?php  $_smarty_tpl->tpl_vars['iva2_'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ivas2_')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['iva2_']->key => $_smarty_tpl->tpl_vars['iva2_']->value){
?>var iva2__<?php echo $_smarty_tpl->getVariable('items_totales9')->value;?>
 = <?php if ($_smarty_tpl->getVariable('ivas2_')->value[$_smarty_tpl->getVariable('items_totales10')->value]){?><?php echo $_smarty_tpl->getVariable('ivas2_')->value[$_smarty_tpl->getVariable('items_totales10')->value];?>
<?php }else{ ?>0<?php }?>; <?php $_smarty_tpl->tpl_vars['items_totales9'] = new Smarty_variable($_smarty_tpl->getVariable('items_totales9')->value+1, null, 3);?><?php $_smarty_tpl->tpl_vars['items_totales10'] = new Smarty_variable($_smarty_tpl->getVariable('items_totales10')->value+1, null, 3);?><?php }} ?>
				
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?><?php if ($_smarty_tpl->getVariable('items_totales4')->value<=$_smarty_tpl->getVariable('total_1')->value){?><?php $_smarty_tpl->tpl_vars['myiva'] = new Smarty_variable("iva__".($_smarty_tpl->getVariable('items_totales4')->value), null, null);?>var amount2_<?php echo $_smarty_tpl->getVariable('items_totales4')->value;?>
 = amt2_ * <?php echo $_smarty_tpl->getVariable('myiva')->value;?>
; <?php }?><?php $_smarty_tpl->tpl_vars['items_totales4'] = new Smarty_variable($_smarty_tpl->getVariable('items_totales4')->value+1, null, 3);?><?php }} ?>
      			
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items3')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?><?php if ($_smarty_tpl->getVariable('items_totales13')->value<=$_smarty_tpl->getVariable('total_2')->value){?><?php $_smarty_tpl->tpl_vars['myiva2'] = new Smarty_variable("iva2__".($_smarty_tpl->getVariable('items_totales13')->value), null, null);?>var amount3_<?php echo $_smarty_tpl->getVariable('items_totales13')->value;?>
 =  amt2_ * <?php echo $_smarty_tpl->getVariable('myiva2')->value;?>
; <?php }?><?php $_smarty_tpl->tpl_vars['items_totales13'] = new Smarty_variable($_smarty_tpl->getVariable('items_totales13')->value+1, null, 3);?><?php }} ?>
   				
   				var amount4 = retention_ * 0.01 * amount;
   				var amount5 = amount <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?><?php if ($_smarty_tpl->getVariable('items_totales6')->value<=$_smarty_tpl->getVariable('total_1')->value){?> + amount2_<?php echo $_smarty_tpl->getVariable('items_totales6')->value;?>
<?php }?><?php $_smarty_tpl->tpl_vars['items_totales6'] = new Smarty_variable($_smarty_tpl->getVariable('items_totales6')->value+1, null, 3);?><?php }} ?><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items3')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?><?php if ($_smarty_tpl->getVariable('items_totales14')->value<=$_smarty_tpl->getVariable('total_2')->value){?> + amount3_<?php echo $_smarty_tpl->getVariable('items_totales14')->value;?>
<?php }?><?php $_smarty_tpl->tpl_vars['items_totales14'] = new Smarty_variable($_smarty_tpl->getVariable('items_totales14')->value+1, null, 3);?><?php }} ?> - amount4;
   				 
   				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?><?php if ($_smarty_tpl->getVariable('items_totales5')->value<=$_smarty_tpl->getVariable('total_1')->value){?>jQuery('#form_iva_<?php echo $_smarty_tpl->getVariable('items_totales5')->value;?>
').autoNumeric('set', amount2_<?php echo $_smarty_tpl->getVariable('items_totales5')->value;?>
); <?php }?><?php $_smarty_tpl->tpl_vars['items_totales5'] = new Smarty_variable($_smarty_tpl->getVariable('items_totales5')->value+1, null, 3);?><?php }} ?>

      			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items3')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?><?php if ($_smarty_tpl->getVariable('items_totales15')->value<=$_smarty_tpl->getVariable('total_2')->value){?>jQuery('#form_iva2_<?php echo $_smarty_tpl->getVariable('items_totales15')->value;?>
').autoNumeric('set', amount3_<?php echo $_smarty_tpl->getVariable('items_totales15')->value;?>
); <?php }?><?php $_smarty_tpl->tpl_vars['items_totales15'] = new Smarty_variable($_smarty_tpl->getVariable('items_totales15')->value+1, null, 3);?><?php }} ?>

      			jQuery('#form_base').autoNumeric('set', amount);
				//jQuery('#form_retention').autoNumeric('set', amount4);
      			jQuery('#form_total').autoNumeric('set', amount5);
			}
     		</script>
<?php }?>