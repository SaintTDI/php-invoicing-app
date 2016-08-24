{if $items|@count == 0}
		{assign var='currency_1' value=$default_currency}{assign var='currency_2' value=$item->profile->currency}
        {if $currency_2}{assign var='currency_' value=$currency_2}{else}{assign var='currency_' value=$currency_1}{/if}	
    <div class="form_box">
	    <div class="row" id="form_iva_">
	        <label for="form_iva_">Total I.V.A. {if $currency_ == 'Peso Argentino'}(&#36;){elseif $currency_ == 'Peso Boliviano'}(b&#36){elseif $currency_ == 'Peso Chileno'}(&#36;){elseif $currency_ == 'Peso Colombiano'}(&#36;){elseif $currency_ == 'Colon'}(&#162;){elseif $currency_ == 'Peso Dominicano'}(&#36;){elseif $currency_ == 'Dolar'}(&#36;){elseif $currency_ == 'Euro'}(&#128;){elseif $currency_ == 'Quetzal'}(Q){elseif $currency_ == 'Lempira'}(L){elseif $currency_ == 'Peso Mexicano'}(&#36;){elseif $currency_ == 'Cordoba'}(C&#36;){elseif $currency_ == 'Balboa'}(B/.){elseif $currency_ == 'Guarani'}(&#8370;){elseif $currency_ == 'Nuevo Sol'}(S/.){elseif $currency_ == 'Libra'}(&#163;){elseif $currency_ == 'Peso Uruguayo'}(&#36;){elseif $currency_ == 'Bolivar'}(Bs.){else}(&#128;){/if}:</label>
	        {assign var='current_iva' value=0}
	        <input type="text" id="form_iva" name="iva" value="{$current_iva}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99"  />
	        <input type="hidden" id="form_iva_p" name="iva_p" value="{$default_iva}"/>
	    </div>
   </div>
   <div class="form_box">
	    <div class="row" id="form_iva2_">
	        <label for="form_iva2_">Otros impuestos {if $currency_ == 'Peso Argentino'}(&#36;){elseif $currency_ == 'Peso Boliviano'}(b&#36){elseif $currency_ == 'Peso Chileno'}(&#36;){elseif $currency_ == 'Peso Colombiano'}(&#36;){elseif $currency_ == 'Colon'}(&#162;){elseif $currency_ == 'Peso Dominicano'}(&#36;){elseif $currency_ == 'Dolar'}(&#36;){elseif $currency_ == 'Euro'}(&#128;){elseif $currency_ == 'Quetzal'}(Q){elseif $currency_ == 'Lempira'}(L){elseif $currency_ == 'Peso Mexicano'}(&#36;){elseif $currency_ == 'Cordoba'}(C&#36;){elseif $currency_ == 'Balboa'}(B/.){elseif $currency_ == 'Guarani'}(&#8370;){elseif $currency_ == 'Nuevo Sol'}(S/.){elseif $currency_ == 'Libra'}(&#163;){elseif $currency_ == 'Peso Uruguayo'}(&#36;){elseif $currency_ == 'Bolivar'}(Bs.){else}(&#128;){/if}:</label>
	        {assign var='current_iva2' value=0}
	        <input type="text" id="form_iva2" name="iva2" value="{$current_iva2}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99"/>
	        <input type="hidden" id="form_iva2_p" name="iva2_p" value="{$default_iva2}"/>
	    </div>
    </div>
    {literal}
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
     {/literal}
    
{else}	
		{assign var='currency_1' value=$default_currency}{assign var='currency_2' value=$item->profile->currency}
        {if $currency_2}{assign var='currency_' value=$currency_2}{else}{assign var='currency_' value=$currency_1}{/if}	
    {literal}
    <script type="text/javascript"> 		
 			jQuery(document).ready(function() {
       				jQuery('#form_subtotal').autoNumeric("init");
      				jQuery('#form_discount').autoNumeric("init");
      				jQuery('#form_base').autoNumeric("init");
      				jQuery('#form_retention').autoNumeric("init");
      				jQuery('#form_total').autoNumeric("init");
			});
      </script>
     {/literal}

		{assign var='iva_t2__' value=0 scope=global}{assign var='iva_t__' value=0 scope=global}{assign var='total_iva_1' value=0 scope=global}{assign var='total_iva_2' value=0 scope=global}{assign var='total_1' value=0 scope=global}{assign var='total_2' value=0 scope=global}{assign var='iva' value=0 scope=global}{assign var='iva2' value=0 scope=global}{assign var='iva_total' value=0 scope=global}{assign var='iva2_total' value=0 scope=global}{assign var='tot_item' value=0 scope=global}{assign var='tot_item2' value=0 scope=global}{assign var='current_iva_total' value=0 scope=global}{assign var='current_iva2_total' value=0 scope=global}{assign var='counter1' scope=global value=0}{assign var='counter2' scope=global value=0}
		
        {foreach from=$items2 item=item}
           {if $item->profile->iva_p != $iva && $item->profile->iva_p > 0}   		
    			  <div class="form_box"> 
    				<div class="row" id="form_iva_">        		
    				{if $fp->discount}
    					{assign var='discount__' value=100 - $fp->discount}
    					{assign var='iva_tot' scope=global value=$item->profile->iva_p_total * $discount__ * 0.01}
    				{else}
    					{assign var='iva_tot' scope=global value=$item->profile->iva_p_total}
    				{/if}
    					{assign var='iva_t__' value=$item->profile->iva_p_total scope=global}
        				{assign var='iva_total' value=$iva_tot scope=global}
        				{assign var='tot_item' scope=global value=$tot_item + 1}
        				{assign var='iva' scope=global value=$item->profile->iva_p}
        				{assign var='total_1' scope=global value=$total_1 + 1}
        				{assign var='current_iva_total' value=$current_iva_total + $iva_tot scope=global}
        				{assign var='counter1' scope=global value=$total_1}
    				{if $fp->discount}
    					{assign var='discount__' value=100 - $fp->discount}
    					{assign var='add__' value=$item->profile->iva_p_total * $discount__ * 0.01}
    					{assign var='total_iva_1' scope=global value=$total_iva_1 + $add__}
    				{else}
    					{assign var='total_iva_1' scope=global value=$total_iva_1 + $item->profile->iva_p_total}
    				{/if}
       				<label for="form_iva_">I.V.A. {$item->profile->iva_p} % {if $currency_ == 'Peso Argentino'}(&#36;){elseif $currency_ == 'Peso Boliviano'}(b&#36){elseif $currency_ == 'Peso Chileno'}(&#36;){elseif $currency_ == 'Peso Colombiano'}(&#36;){elseif $currency_ == 'Colon'}(&#162;){elseif $currency_ == 'Peso Dominicano'}(&#36;){elseif $currency_ == 'Dolar'}(&#36;){elseif $currency_ == 'Euro'}(&#128;){elseif $currency_ == 'Quetzal'}(Q){elseif $currency_ == 'Lempira'}(L){elseif $currency_ == 'Peso Mexicano'}(&#36;){elseif $currency_ == 'Cordoba'}(C&#36;){elseif $currency_ == 'Balboa'}(B/.){elseif $currency_ == 'Guarani'}(&#8370;){elseif $currency_ == 'Nuevo Sol'}(S/.){elseif $currency_ == 'Libra'}(&#163;){elseif $currency_ == 'Peso Uruguayo'}(&#36;){elseif $currency_ == 'Bolivar'}(Bs.){else}(&#128;){/if}:</label>

        				<input type="text" id="form_iva_{$tot_item}" name="iva_{$tot_item}" value="{$iva_total}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99"  />
        				<input type="hidden" id="form_iva_p_{$tot_item}" name="iva_p_{$tot_item}" value="{if $item->profile->iva_p}{$item->profile->iva_p|number_format:2:',':'.'}{else}0{/if}"/>

      				{if $ivas_[$tot_item] == $iva_t__}
        				{literal}<script type="text/javascript"> 		
 					jQuery(document).ready(function() {
						jQuery('#form_iva_{/literal}{$tot_item}{literal}').autoNumeric("init");
						jQuery('#form_iva_{/literal}{$tot_item}{literal}').autoNumeric('set', {/literal}{$iva_total}{literal});
					});
     				</script>{/literal}
        				{/if}
				   </div> 
    				</div>     				
    			{else}	
    				{if $fp->discount}
    					{assign var='discount__' value=100 - $fp->discount}
    					{assign var='iva_tot' scope=global value=$item->profile->iva_p_total * $discount__ * 0.01}
    				{else}
    					{assign var='iva_tot' scope=global value=$item->profile->iva_p_total}
    				{/if}
    					{assign var='iva_t_' value=$item->profile->iva_p_total scope=global}
    					{assign var='iva_t__' scope=global value=$iva_t__ + $iva_t_}
        				{assign var='iva_total' scope=global value=$iva_total + $iva_tot}
        				{assign var='counter1' scope=global value=$counter1 + 1}
    				{if $fp->discount}
    					{assign var='discount__' value=100 - $fp->discount}
    					{assign var='add__' value=$item->profile->iva_p_total * $discount__ * 0.01}
    					{assign var='total_iva_1' scope=global value=$total_iva_1 + $add__}
    				{else}
    					{assign var='total_iva_1' scope=global value=$total_iva_1 + $item->profile->iva_p_total}
    				{/if}
      				{if $ivas_[$tot_item] == $iva_t__} 
        				{literal}<script type="text/javascript"> 		
 					jQuery(document).ready(function() {
						jQuery('#form_iva_{/literal}{$tot_item}{literal}').autoNumeric("init");
						jQuery('#form_iva_{/literal}{$tot_item}{literal}').autoNumeric('set', {/literal}{$iva_total}{literal});
					});
     				</script>{/literal}
        				{/if}
			{/if}
        {/foreach}
        
        {foreach from=$items3 item=item}      		
			{if $item->profile->iva_p2 != $iva2 && $item->profile->iva_p2 > 0}
    			  <div class="form_box">
    				<div class="row" id="form_iva2_">        		
    				{if $fp->discount}
    					{assign var='discount2__' value=100 - $fp->discount}
    					{assign var='iva2_tot' scope=global value=$item->profile->iva_p2_total * $discount2__ * 0.01}
    				{else}
    					{assign var='iva2_tot' scope=global value=$item->profile->iva_p2_total}
    				{/if}
    					{assign var='iva_t2__' value=$item->profile->iva_p2_total scope=global}
        				{assign var='iva2_total' value=$iva2_tot scope=global}
        				{assign var='tot_item2' scope=global value=$tot_item2 + 1}
        				{assign var='iva2' scope=global value=$item->profile->iva_p2}
        				{assign var='total_2' scope=global value=$total_2 + 1}
        				{assign var='current_iva2_total' value=$current_iva2_total + $iva2_tot scope=global}
        				{assign var='counter2' scope=global value=$total_2}
    				{if $fp->discount}
    					{assign var='discount2__' value=100 - $fp->discount}
    					{assign var='add2__' value=$item->profile->iva_p2_total * $discount2__ * 0.01}
    					{assign var='total_iva_2' scope=global value=$total_iva_2 + $add2__}
    				{else}
    					{assign var='total_iva_2' scope=global value=$total_iva_2 + $item->profile->iva_p2_total}
    				{/if}
       				<label for="form_iva2_">Otros Imp. {$item->profile->iva_p2} % {if $currency_ == 'Peso Argentino'}(&#36;){elseif $currency_ == 'Peso Boliviano'}(b&#36){elseif $currency_ == 'Peso Chileno'}(&#36;){elseif $currency_ == 'Peso Colombiano'}(&#36;){elseif $currency_ == 'Colon'}(&#162;){elseif $currency_ == 'Peso Dominicano'}(&#36;){elseif $currency_ == 'Dolar'}(&#36;){elseif $currency_ == 'Euro'}(&#128;){elseif $currency_ == 'Quetzal'}(Q){elseif $currency_ == 'Lempira'}(L){elseif $currency_ == 'Peso Mexicano'}(&#36;){elseif $currency_ == 'Cordoba'}(C&#36;){elseif $currency_ == 'Balboa'}(B/.){elseif $currency_ == 'Guarani'}(&#8370;){elseif $currency_ == 'Nuevo Sol'}(S/.){elseif $currency_ == 'Libra'}(&#163;){elseif $currency_ == 'Peso Uruguayo'}(&#36;){elseif $currency_ == 'Bolivar'}(Bs.){else}(&#128;){/if}:</label>

        				<input type="text" id="form_iva2_{$tot_item2}" name="iva2_{$tot_item2}" value="{$iva2_total}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99"  />
        				<input type="hidden" id="form_iva2_p_{$tot_item2}" name="iva2_p_{$tot_item2}" value="{if $item->profile->iva_p2}{$item->profile->iva_p2|number_format:2:',':'.'}{else}0{/if}"/>
        				
        				{if $ivas2_[$tot_item2] == $iva_t2__}
        				{literal}<script type="text/javascript"> 		
 					jQuery(document).ready(function() {
						jQuery('#form_iva2_{/literal}{$tot_item2}{literal}').autoNumeric("init");
						jQuery('#form_iva2_{/literal}{$tot_item2}{literal}').autoNumeric('set', {/literal}{$iva2_total}{literal});
					});
     				</script>{/literal}
       			    {/if}	
        			  </div>
    				</div>	       				
    			{else}	
    				{if $fp->discount}
    					{assign var='discount2__' value=100 - $fp->discount}
    					{assign var='iva2_tot' scope=global value=$item->profile->iva_p2_total * $discount2__ * 0.01}
    				{else}
    					{assign var='iva2_tot' scope=global value=$item->profile->iva_p2_total}
    				{/if}
    					{assign var='iva_t2_' value=$item->profile->iva_p2_total scope=global}
    					{assign var='iva_t2__' scope=global value=$iva_t2__ + $iva_t2_}
    					
        				{assign var='iva2_total' scope=global value=$iva2_total + $iva2_tot}
        				{assign var='counter2' scope=global value=$counter2 + 1}
     			{if $fp->discount}
    					{assign var='discount2__' value=100 - $fp->discount}
    					{assign var='add2__' value=$item->profile->iva_p2_total * $discount2__ * 0.01}
    					{assign var='total_iva_2' scope=global value=$total_iva_2 + $add2__}
    				{else}
    					{assign var='total_iva_2' scope=global value=$total_iva_2 + $item->profile->iva_p2_total}
    				{/if}
        				{if $ivas2_[$tot_item2] == $iva_t2__}
        				{literal}<script type="text/javascript"> 		
 					jQuery(document).ready(function() {
						jQuery('#form_iva2_{/literal}{$tot_item2}{literal}').autoNumeric("init");
						jQuery('#form_iva2_{/literal}{$tot_item2}{literal}').autoNumeric('set', {/literal}{$iva2_total}{literal});
					});
     				</script>{/literal}
       			    {/if}
			{/if}	
        {/foreach}

        {assign var='items_totales' value=1 scope=global}{assign var='items_totales2' value=1 scope=global}{assign var='items_totales3' value=1 scope=global}{assign var='items_totales4' value=1 scope=global}{assign var='items_totales5' value=1 scope=global}{assign var='items_totales6' value=1 scope=global}{assign var='items_totales7' value=1 scope=global}{assign var='items_totales8' value=1 scope=global}{assign var='items_totales9' value=1 scope=global}{assign var='items_totales10' value=1 scope=global}{assign var='items_totales11' value=1 scope=global}{assign var='items_totales12' value=1 scope=global}{assign var='items_totales13' value=1 scope=global}{assign var='items_totales14' value=1 scope=global}{assign var='items_totales15' value=1 scope=global}

    	   {literal}<script type="text/javascript"> 		
 			jQuery(document).ready(function() {
		 			jQuery('#form_subtotal').keyup(doMath);
			 		jQuery('#form_discount').keyup(doMath);
			 		jQuery('#form_base').keyup(doMath);
			 		jQuery('#form_retention').keyup(doMath);
			 		jQuery('#form_total').keyup(doMath);
					{/literal}{foreach from=$items2 item=item}{if $items_totales2 <= $total_1}{literal}jQuery('#form_iva_{/literal}{$items_totales2}{literal}').keyup(doMath); {/literal}{/if}{assign var='items_totales2' scope=global value=$items_totales2 + 1}{/foreach}{literal}
					{/literal}{foreach from=$items3 item=item}{if $items_totales11 <= $total_2}{literal}jQuery('#form_iva2_{/literal}{$items_totales11}{literal}').keyup(doMath); {/literal}{/if}{assign var='items_totales11' scope=global value=$items_totales11 + 1}{/foreach}{literal}
					jQuery("#form_project").on("input", function() {
    						jQuery('#form_project_id').val('');
					});
			});
			
		    function doMath() {		
   				var subtotal_ = jQuery("#form_subtotal").autoNumeric('get');
 				var discount_ = jQuery("#form_discount").autoNumeric('get');
 				var base_ = jQuery("#form_base").autoNumeric('get');
 				{/literal}{foreach from=$items2 item=item}{if $items_totales3 <= $total_1}{literal}var iva_{/literal}{$items_totales3}{literal} = jQuery("#form_iva_p_{/literal}{$items_totales3}{literal}").val(); {/literal}{/if}{assign var='items_totales3' scope=global value=$items_totales3 + 1}{/foreach}{literal}
 				{/literal}{foreach from=$items3 item=item}{if $items_totales12 <= $total_2}{literal}var iva2_{/literal}{$items_totales12}{literal} = jQuery("#form_iva2_p_{/literal}{$items_totales12}{literal}").val(); {/literal}{/if}{assign var='items_totales12' scope=global value=$items_totales12 + 1}{/foreach}{literal}
				var retention_ = jQuery("#form_retention").autoNumeric('get');
   				var total_ = jQuery("#form_total").autoNumeric('get');
				var amrs__ = 100 - discount_;
				var amr__ = amrs__ * 0.01;
   				var amount = subtotal_ * amr__;
				var amt2_ = amount / subtotal_;
				
				{/literal}{foreach from=$ivas_ item=iva_}var iva__{$items_totales7} = {if $ivas_[$items_totales8]}{$ivas_[$items_totales8]}{else}0{/if}; {assign var='items_totales7' scope=global value=$items_totales7 + 1}{assign var='items_totales8' scope=global value=$items_totales8 + 1}{/foreach}{literal}
				
				{/literal}{foreach from=$ivas2_ item=iva2_}var iva2__{$items_totales9} = {if $ivas2_[$items_totales10]}{$ivas2_[$items_totales10]}{else}0{/if}; {assign var='items_totales9' scope=global value=$items_totales9 + 1}{assign var='items_totales10' scope=global value=$items_totales10 + 1}{/foreach}{literal}
				
				{/literal}{foreach from=$items2 item=item}{if $items_totales4 <= $total_1}{assign var='myiva' value="iva__{$items_totales4}"}var amount2_{$items_totales4} = amt2_ * {$myiva}; {/if}{assign var='items_totales4' scope=global value=$items_totales4 + 1}{/foreach}{literal}
      			
				{/literal}{foreach from=$items3 item=item}{if $items_totales13 <= $total_2}{assign var='myiva2' value="iva2__{$items_totales13}"}var amount3_{$items_totales13} =  amt2_ * {$myiva2}; {/if}{assign var='items_totales13' scope=global value=$items_totales13 + 1}{/foreach}{literal}
   				
   				var amount4 = retention_ * 0.01 * amount;
   				var amount5 = amount {/literal}{foreach from=$items2 item=item}{if $items_totales6 <= $total_1} + amount2_{$items_totales6}{/if}{assign var='items_totales6' scope=global value=$items_totales6 + 1}{/foreach}{foreach from=$items3 item=item}{if $items_totales14 <= $total_2} + amount3_{$items_totales14}{/if}{assign var='items_totales14' scope=global value=$items_totales14 + 1}{/foreach} - amount4;
   				 
   				{foreach from=$items2 item=item}{if $items_totales5 <= $total_1}{literal}jQuery('#form_iva_{/literal}{$items_totales5}{literal}').autoNumeric('set', amount2_{/literal}{$items_totales5}); {/if}{assign var='items_totales5' scope=global value=$items_totales5 + 1}{/foreach}

      			{foreach from=$items3 item=item}{if $items_totales15 <= $total_2}{literal}jQuery('#form_iva2_{/literal}{$items_totales15}{literal}').autoNumeric('set', amount3_{/literal}{$items_totales15}); {/if}{assign var='items_totales15' scope=global value=$items_totales15 + 1}{/foreach}{literal}

      			jQuery('#form_base').autoNumeric('set', amount);
				//jQuery('#form_retention').autoNumeric('set', amount4);
      			jQuery('#form_total').autoNumeric('set', amount5);
			}
     		</script>{/literal}
{/if}