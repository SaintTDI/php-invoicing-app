<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es"><head><link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" /><link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Noto+Sans"><title>WebProAdmin</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no"></head><body>
<style>
html *
{
   font-size: 12px !important;
   font-family: Arial !important;
}
</style>
     <div class="box">
     		<div class="form_row_l2" id="form_budget_client_">
                		{if $company->profile->company_pict_preview != ''}
                				{assign var="url" value=$company->profile->company_pict_preview}
                            	<img src="/profiles/tmp/company/pictures/{$url}" boder="0" />
                        	{else}
                            	<img src="/profiles/tmp/company/pictures/profile.png" boder="0" />
                        {/if}
    	 		 </div>
    	 		 <div class="form_row_r2" id="form_budget_client_">
        			<div class="form_row_r_1_2">PRESUPUESTO N&ordm;:</div>
        			<div class="form_row_r_2_2">{$budget->budget_number}</div>
        			
         		{if $budget->profile->budget_consecutive > 0}<div class="form_row_r_1_2">Consecutivo:</div>
        			<div class="form_row_r_2_2">{$budget->profile->budget_consecutive} </div>{/if}
        		</div>
     </div>
	<div class="box" id="form_box_">
      <div class="form_row_l" id="form_budget_company_">
		<span class="title">{$company->thecompany}</span>
		{if $company->identification}<span>{$company->identification}</span>{/if}
		{assign var='counter3' value=0}
    	    {foreach from=$addresses item=address}
  			{if $counter3 == 0}{assign var='counter3' value=$counter3 +1}
				{if $address->profile->street || $address->profile->house}<span>{$address->profile->street}{if $address->profile->house}, {$address->profile->house}{/if}</span>{/if}
				{if $address->profile->postal_code || $address->profile->city || $address->profile->state || $address->profile->province}<span>{$address->profile->postal_code} {$address->profile->city}{if $address->profile->province}, {$address->profile->province}{/if}{if $address->profile->state}, {$address->profile->state}{/if}</span>{/if}
				{if $address->profile->country}<span>{$address->profile->country}</span>{/if}
			{/if}
		{/foreach}
		{if $company->profile->phone_country || $company->profile->phone_area || $company->profile->phone}<span>{if $company->profile->phone_country}({$company->profile->phone_country}){/if} {$company->profile->phone_area} {$company->profile->phone}</span>{/if}	
		{if $company->profile->email_c}<span>{$company->profile->email_c}</span>{/if}
	    </div>
        <div class="form_row_r" id="form_budget_client_">
       		<label>Emisi&oacute;n:</label>
        		<label>{$budget->profile->budget_date}</label>    		
       		<label>Validez:</label>
        		<label>{$budget->profile->budget_valid} d&iacute;a(s)</label>
			{foreach from=$client item=client_}
    			{if $client_->profile->thecompany != ""}
			<span class="title">{$client_->profile->thecompany}</span>
			{if $client_->profile->identification}<span>{$client_->profile->identification}</span>{/if}
			{if $budget->profile->budget_contact}<span>Contacto: {$budget->profile->budget_contact}</span>{/if}
			{if $client_->profile->street || $client_->profile->house}<span>{$client_->profile->street}{if $client_->profile->house}, {$client_->profile->house}{/if}</span>{/if}
			{if $client_->profile->postal_code || $client_->profile->city || $client_->profile->state || $client_->profile->province}<span>{$client_->profile->postal_code} {$client_->profile->city}{if $client_->profile->province}, {$client_->profile->province}{/if}{if $client_->profile->state}, {$client_->profile->state}{/if}</span>{/if}
			{if $client_->profile->country}<span>{$client_->profile->country}</span>{/if}
			{if $client_->profile->phone_country || $client_->profile->phone_area || $client_->profile->phone}<span>{if $client_->profile->phone_country}({$client_->profile->phone_country}){/if}{if $client_->profile->phone_area} {$client_->profile->phone_area}{/if}{if $client_->profile->phone} {$client_->profile->phone}{/if}</span>{/if}
			{if $client_->profile->email_c}<span>{$client_->profile->email_c}</span>{/if}
			{/if}
  			{/foreach}
	    </div>
	</div>
	{assign var='counter' value=0}
      {if $items|@count > 0}
    	    <table class="table_p">
    	    {foreach from=$items item=item}
  			{if $counter == 0}
  				{assign var='counter' value=$counter +1}
    	  	 		<tr>
					<td class="table_p_top">C&oacute;digo</td>
					<td class="table_p_top">Detalle</td>
					<td class="table_p_top">Cantidad</td>
					<td class="table_p_top">Precio Unitario ({if $budget->profile->currency == 'Peso Argentino'}&#36;{elseif $budget->profile->currency == 'Peso Boliviano'}b&#36{elseif $budget->profile->currency == 'Peso Chileno'}&#36;{elseif $budget->profile->currency == 'Peso Colombiano'}&#36;{elseif $budget->profile->currency == 'Colon'}&#162;{elseif $budget->profile->currency == 'Peso Dominicano'}&#36;{elseif $budget->profile->currency == 'Dolar'}&#36;{elseif $budget->profile->currency == 'Euro'}&#128;{elseif $budget->profile->currency == 'Quetzal'}Q{elseif $budget->profile->currency == 'Lempira'}L{elseif $budget->profile->currency == 'Peso Mexicano'}&#36;{elseif $budget->profile->currency == 'Cordoba'}C&#36;{elseif $budget->profile->currency == 'Balboa'}B/.{elseif $budget->profile->currency == 'Guarani'}&#8370;{elseif $budget->profile->currency == 'Nuevo Sol'}S/.{elseif $budget->profile->currency == 'Libra'}&#163;{elseif $budget->profile->currency == 'Peso Uruguayo'}&#36;{elseif $budget->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if})</td>
					<td class="table_p_top">IVA (&#37;)</td>
					<td class="table_p_top">Otros (&#37;)</td>
					<td class="table_p_top">Subtotal {if $budget->profile->currency == 'Peso Argentino'}(&#36;){elseif $budget->profile->currency == 'Peso Boliviano'}(b&#36){elseif $budget->profile->currency == 'Peso Chileno'}(&#36;){elseif $budget->profile->currency == 'Peso Colombiano'}(&#36;){elseif $budget->profile->currency == 'Colon'}(&#162;){elseif $budget->profile->currency == 'Peso Dominicano'}(&#36;){elseif $budget->profile->currency == 'Dolar'}(&#36;){elseif $budget->profile->currency == 'Euro'}(&#128;){elseif $budget->profile->currency == 'Quetzal'}(Q){elseif $budget->profile->currency == 'Lempira'}(L){elseif $budget->profile->currency == 'Peso Mexicano'}(&#36;){elseif $budget->profile->currency == 'Cordoba'}(C&#36;){elseif $budget->profile->currency == 'Balboa'}(B/.){elseif $budget->profile->currency == 'Guarani'}(&#8370;){elseif $budget->profile->currency == 'Nuevo Sol'}(S/.){elseif $budget->profile->currency == 'Libra'}(&#163;){elseif $budget->profile->currency == 'Peso Uruguayo'}(&#36;){elseif $budget->profile->currency == 'Bolivar'}(Bs.){else}(&#128;){/if}</td>
				</tr>
			{/if}
		{/foreach}
        {foreach from=$items item=item}
        	   {if $item->getId()}
				<tr>
					<td>{$item->profile->code|ucfirst}</td>
					<td>{$item->profile->detail|ucfirst}</td>
					<td>{$item->profile->quantity|number_format:2:',':'.'}</td>
					<td>{$item->profile->unit_price|number_format:2:',':'.'}</td>
					<td>{$item->profile->iva|number_format:2:',':'.'}</td>
					<td>{$item->profile->iva2|number_format:2:',':'.'}</td>
					<td>{$item->profile->subtotal|number_format:2:',':'.'}</td>
				</tr>
			{/if}
        {/foreach}
       </table>
	 {/if}
  	<div class="box" id="form_box_">
  	  <div class="form_row_l33" id="form_budget_company_">
  	  &nbsp;
  	  </div> 
      <div class="form_row_r" id="form_budget_company_">
			<div class="form_row_r_1">Subtotal:</div> 
			<div class="form_row_r_2">{$budget->profile->subtotal|number_format:2:',':'.'} {if $budget->profile->currency == 'Peso Argentino'}&#36;{elseif $budget->profile->currency == 'Peso Boliviano'}b&#36{elseif $budget->profile->currency == 'Peso Chileno'}&#36;{elseif $budget->profile->currency == 'Peso Colombiano'}&#36;{elseif $budget->profile->currency == 'Colon'}&#162;{elseif $budget->profile->currency == 'Peso Dominicano'}&#36;{elseif $budget->profile->currency == 'Dolar'}&#36;{elseif $budget->profile->currency == 'Euro'}&#128;{elseif $budget->profile->currency == 'Quetzal'}Q{elseif $budget->profile->currency == 'Lempira'}L{elseif $budget->profile->currency == 'Peso Mexicano'}&#36;{elseif $budget->profile->currency == 'Cordoba'}C&#36;{elseif $budget->profile->currency == 'Balboa'}B/.{elseif $budget->profile->currency == 'Guarani'}&#8370;{elseif $budget->profile->currency == 'Nuevo Sol'}S/.{elseif $budget->profile->currency == 'Libra'}&#163;{elseif $budget->profile->currency == 'Peso Uruguayo'}&#36;{elseif $budget->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
			{if $budget->profile->discount > 0}{assign var='current_desc' value=$budget->profile->subtotal * $budget->profile->discount * 0.01}
			<div class="form_row_r_1">Desc. ({$budget->profile->discount} &#37;):</div>
			<div class="form_row_r_2">{$current_desc|number_format:2:',':'.'} {if $budget->profile->currency == 'Peso Argentino'}&#36;{elseif $budget->profile->currency == 'Peso Boliviano'}b&#36{elseif $budget->profile->currency == 'Peso Chileno'}&#36;{elseif $budget->profile->currency == 'Peso Colombiano'}&#36;{elseif $budget->profile->currency == 'Colon'}&#162;{elseif $budget->profile->currency == 'Peso Dominicano'}&#36;{elseif $budget->profile->currency == 'Dolar'}&#36;{elseif $budget->profile->currency == 'Euro'}&#128;{elseif $budget->profile->currency == 'Quetzal'}Q{elseif $budget->profile->currency == 'Lempira'}L{elseif $budget->profile->currency == 'Peso Mexicano'}&#36;{elseif $budget->profile->currency == 'Cordoba'}C&#36;{elseif $budget->profile->currency == 'Balboa'}B/.{elseif $budget->profile->currency == 'Guarani'}&#8370;{elseif $budget->profile->currency == 'Nuevo Sol'}S/.{elseif $budget->profile->currency == 'Libra'}&#163;{elseif $budget->profile->currency == 'Peso Uruguayo'}&#36;{elseif $budget->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
			{/if}
			{if $budget->profile->discount > 0}{assign var='current_base' value=$budget->profile->subtotal - $current_desc}
			<div class="form_row_r_1">Base Imponible:</div>
			<div class="form_row_r_2">{$current_base|number_format:2:',':'.'} {if $budget->profile->currency == 'Peso Argentino'}&#36;{elseif $budget->profile->currency == 'Peso Boliviano'}b&#36{elseif $budget->profile->currency == 'Peso Chileno'}&#36;{elseif $budget->profile->currency == 'Peso Colombiano'}&#36;{elseif $budget->profile->currency == 'Colon'}&#162;{elseif $budget->profile->currency == 'Peso Dominicano'}&#36;{elseif $budget->profile->currency == 'Dolar'}&#36;{elseif $budget->profile->currency == 'Euro'}&#128;{elseif $budget->profile->currency == 'Quetzal'}Q{elseif $budget->profile->currency == 'Lempira'}L{elseif $budget->profile->currency == 'Peso Mexicano'}&#36;{elseif $budget->profile->currency == 'Cordoba'}C&#36;{elseif $budget->profile->currency == 'Balboa'}B/.{elseif $budget->profile->currency == 'Guarani'}&#8370;{elseif $budget->profile->currency == 'Nuevo Sol'}S/.{elseif $budget->profile->currency == 'Libra'}&#163;{elseif $budget->profile->currency == 'Peso Uruguayo'}&#36;{elseif $budget->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
			{else}{assign var='current_base' value=$budget->profile->subtotal}
			<div class="form_row_r_1">Base Imponible:</div>
			<div class="form_row_r_2">{$budget->profile->base|number_format:2:',':'.'} {if $budget->profile->currency == 'Peso Argentino'}&#36;{elseif $budget->profile->currency == 'Peso Boliviano'}b&#36{elseif $budget->profile->currency == 'Peso Chileno'}&#36;{elseif $budget->profile->currency == 'Peso Colombiano'}&#36;{elseif $budget->profile->currency == 'Colon'}&#162;{elseif $budget->profile->currency == 'Peso Dominicano'}&#36;{elseif $budget->profile->currency == 'Dolar'}&#36;{elseif $budget->profile->currency == 'Euro'}&#128;{elseif $budget->profile->currency == 'Quetzal'}Q{elseif $budget->profile->currency == 'Lempira'}L{elseif $budget->profile->currency == 'Peso Mexicano'}&#36;{elseif $budget->profile->currency == 'Cordoba'}C&#36;{elseif $budget->profile->currency == 'Balboa'}B/.{elseif $budget->profile->currency == 'Guarani'}&#8370;{elseif $budget->profile->currency == 'Nuevo Sol'}S/.{elseif $budget->profile->currency == 'Libra'}&#163;{elseif $budget->profile->currency == 'Peso Uruguayo'}&#36;{elseif $budget->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div>
			{/if}
		{assign var='iva_t2__' value=0 scope=global}{assign var='iva_t__' value=0 scope=global}{assign var='tot_item2' value=0 scope=global}{assign var='tot_item' value=0 scope=global}{assign var='iva' value=0 scope=global}{assign var='iva2' value=0 scope=global}{assign var='iva_total' value=0 scope=global}{assign var='iva2_total' value=0 scope=global}
		{assign var='total_iva_1' value=0 scope=global}{assign var='total_iva_2' value=0 scope=global}
        {foreach from=$items2 item=item}
           {if $item->profile->iva != $iva && $item->profile->iva > 0}   		
  				{if $budget->profile->discount}
    					{assign var='discount__' value=100 - $budget->profile->discount}
    					{assign var='iva_tot' scope=global value=$item->profile->iva_total * $discount__ * 0.01}
    				{else}
    					{assign var='iva_tot' scope=global value=$item->profile->iva_total}
    				{/if}  
    				    	{assign var='iva_t__' value=$item->profile->iva_total scope=global}
	 				{assign var='iva_total' value=$iva_tot scope=global}
        				{assign var='tot_item' scope=global value=$tot_item + 1}
        				{assign var='iva' scope=global value=$item->profile->iva}

        				{if $ivas_[$tot_item] == $iva_t__}
        				<div class="form_row_r_1">I.V.A. ({$item->profile->iva|number_format:2:',':'.'}) &#37;:</div>
        				<div class="form_row_r_2">{$iva_total|number_format:2:',':'.'} {if $budget->profile->currency == 'Peso Argentino'}&#36;{elseif $budget->profile->currency == 'Peso Boliviano'}b&#36{elseif $budget->profile->currency == 'Peso Chileno'}&#36;{elseif $budget->profile->currency == 'Peso Colombiano'}&#36;{elseif $budget->profile->currency == 'Colon'}&#162;{elseif $budget->profile->currency == 'Peso Dominicano'}&#36;{elseif $budget->profile->currency == 'Dolar'}&#36;{elseif $budget->profile->currency == 'Euro'}&#128;{elseif $budget->profile->currency == 'Quetzal'}Q{elseif $budget->profile->currency == 'Lempira'}L{elseif $budget->profile->currency == 'Peso Mexicano'}&#36;{elseif $budget->profile->currency == 'Cordoba'}C&#36;{elseif $budget->profile->currency == 'Balboa'}B/.{elseif $budget->profile->currency == 'Guarani'}&#8370;{elseif $budget->profile->currency == 'Nuevo Sol'}S/.{elseif $budget->profile->currency == 'Libra'}&#163;{elseif $budget->profile->currency == 'Peso Uruguayo'}&#36;{elseif $budget->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
       			    {assign var='total_iva_1' scope=global value=$total_iva_1 + $iva_total}
       			    {/if}
    			{elseif $item->profile->iva > 0}	
    				{if $budget->profile->discount}
    					{assign var='discount__' value=100 - $budget->profile->discount}
    					{assign var='iva_tot_' scope=global value=$item->profile->iva_total * $discount__ * 0.01}
    				{else}
    					{assign var='iva_tot_' scope=global value=$item->profile->iva_total}
    				{/if}
    					{assign var='iva_t_' value=$item->profile->iva_total scope=global}
    					{assign var='iva_t__' scope=global value=$iva_t__ + $iva_t_}
    					
        				{assign var='iva_total' scope=global value=$iva_total + $iva_tot_}
        				
        				{if $ivas_[$tot_item] == $iva_t__}
        				<div class="form_row_r_1">I.V.A. ({$item->profile->iva|number_format:2:',':'.'}) &#37;:</div> 
        				<div class="form_row_r_2">{$iva_total|number_format:2:',':'.'} {if $budget->profile->currency == 'Peso Argentino'}&#36;{elseif $budget->profile->currency == 'Peso Boliviano'}b&#36{elseif $budget->profile->currency == 'Peso Chileno'}&#36;{elseif $budget->profile->currency == 'Peso Colombiano'}&#36;{elseif $budget->profile->currency == 'Colon'}&#162;{elseif $budget->profile->currency == 'Peso Dominicano'}&#36;{elseif $budget->profile->currency == 'Dolar'}&#36;{elseif $budget->profile->currency == 'Euro'}&#128;{elseif $budget->profile->currency == 'Quetzal'}Q{elseif $budget->profile->currency == 'Lempira'}L{elseif $budget->profile->currency == 'Peso Mexicano'}&#36;{elseif $budget->profile->currency == 'Cordoba'}C&#36;{elseif $budget->profile->currency == 'Balboa'}B/.{elseif $budget->profile->currency == 'Guarani'}&#8370;{elseif $budget->profile->currency == 'Nuevo Sol'}S/.{elseif $budget->profile->currency == 'Libra'}&#163;{elseif $budget->profile->currency == 'Peso Uruguayo'}&#36;{elseif $budget->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
       			    {assign var='total_iva_1' scope=global value=$total_iva_1 + $iva_total}
       			    {/if}	
			{/if}
        {/foreach}
		
        {foreach from=$items3 item=item}      		
			{if $item->profile->iva2 != $iva2 && $item->profile->iva2 > 0}      		
				
    				{if $budget->profile->discount}
    					{assign var='discount2__' value=100 - $budget->profile->discount}
    					{assign var='iva2_tot' scope=global value=$item->profile->iva2_total * $discount2__ * 0.01}
    				{else}
    					{assign var='iva2_tot' scope=global value=$item->profile->iva2_total}
    				{/if}
    					{assign var='iva_t2__' value=$item->profile->iva2_total scope=global}
        				
        				{assign var='iva2_total' value=$iva2_tot scope=global}
        				{assign var='tot_item2' scope=global value=$tot_item2 + 1}
        				{assign var='iva2' scope=global value=$item->profile->iva2}
			
        				{if $ivas2_[$tot_item2] == $iva_t2__}
        				<div class="form_row_r_1">Otros Imp. ({$item->profile->iva2|number_format:2:',':'.'}) &#37;:</div> 
        				<div class="form_row_r_2">{$iva2_total|number_format:2:',':'.'} {if $budget->profile->currency == 'Peso Argentino'}&#36;{elseif $budget->profile->currency == 'Peso Boliviano'}b&#36{elseif $budget->profile->currency == 'Peso Chileno'}&#36;{elseif $budget->profile->currency == 'Peso Colombiano'}&#36;{elseif $budget->profile->currency == 'Colon'}&#162;{elseif $budget->profile->currency == 'Peso Dominicano'}&#36;{elseif $budget->profile->currency == 'Dolar'}&#36;{elseif $budget->profile->currency == 'Euro'}&#128;{elseif $budget->profile->currency == 'Quetzal'}Q{elseif $budget->profile->currency == 'Lempira'}L{elseif $budget->profile->currency == 'Peso Mexicano'}&#36;{elseif $budget->profile->currency == 'Cordoba'}C&#36;{elseif $budget->profile->currency == 'Balboa'}B/.{elseif $budget->profile->currency == 'Guarani'}&#8370;{elseif $budget->profile->currency == 'Nuevo Sol'}S/.{elseif $budget->profile->currency == 'Libra'}&#163;{elseif $budget->profile->currency == 'Peso Uruguayo'}&#36;{elseif $budget->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
       			    {assign var='total_iva_2' scope=global value=$total_iva_2 + $iva2_total}
       			    {/if}       				
    			{elseif $item->profile->iva2 > 0}	
    				{if $budget->profile->discount}
    					{assign var='discount2__' value=100 - $budget->profile->discount}
    					{assign var='iva2_tot' scope=global value=$item->profile->iva2_total * $discount2__ * 0.01}
    				{else}
    					{assign var='iva2_tot' scope=global value=$item->profile->iva2_total}
    				{/if}
    					{assign var='iva_t2_' value=$item->profile->iva2_total scope=global}
    					{assign var='iva_t2__' scope=global value=$iva_t2__ + $iva_t2_}		
        	
        				{assign var='iva2_total' scope=global value=$iva2_total + $iva2_tot}
        				
        				{if $ivas2_[$tot_item2] == $iva_t2__}
        				<div class="form_row_r_1">Otros Imp. ({$item->profile->iva2|number_format:2:',':'.'}) &#37;:</div> 
        				<div class="form_row_r_2">{$iva2_total|number_format:2:',':'.'} {if $budget->profile->currency == 'Peso Argentino'}&#36;{elseif $budget->profile->currency == 'Peso Boliviano'}b&#36{elseif $budget->profile->currency == 'Peso Chileno'}&#36;{elseif $budget->profile->currency == 'Peso Colombiano'}&#36;{elseif $budget->profile->currency == 'Colon'}&#162;{elseif $budget->profile->currency == 'Peso Dominicano'}&#36;{elseif $budget->profile->currency == 'Dolar'}&#36;{elseif $budget->profile->currency == 'Euro'}&#128;{elseif $budget->profile->currency == 'Quetzal'}Q{elseif $budget->profile->currency == 'Lempira'}L{elseif $budget->profile->currency == 'Peso Mexicano'}&#36;{elseif $budget->profile->currency == 'Cordoba'}C&#36;{elseif $budget->profile->currency == 'Balboa'}B/.{elseif $budget->profile->currency == 'Guarani'}&#8370;{elseif $budget->profile->currency == 'Nuevo Sol'}S/.{elseif $budget->profile->currency == 'Libra'}&#163;{elseif $budget->profile->currency == 'Peso Uruguayo'}&#36;{elseif $budget->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
       			    {assign var='total_iva_2' scope=global value=$total_iva_2 + $iva2_total}
       			    {/if}
			{/if}	
        {/foreach}
        {if $budget->profile->retention > 0}
			{assign var='retention_total' value=$current_base * $budget->profile->retention * 0.01}
			<div class="form_row_r_1">Retenci&oacute;n IRPF ({$budget->profile->retention}) &#37;:</div> 
			<div class="form_row_r_2">{$retention_total|number_format:2:',':'.'} {if $budget->profile->currency == 'Peso Argentino'}&#36;{elseif $budget->profile->currency == 'Peso Boliviano'}b&#36{elseif $budget->profile->currency == 'Peso Chileno'}&#36;{elseif $budget->profile->currency == 'Peso Colombiano'}&#36;{elseif $budget->profile->currency == 'Colon'}&#162;{elseif $budget->profile->currency == 'Peso Dominicano'}&#36;{elseif $budget->profile->currency == 'Dolar'}&#36;{elseif $budget->profile->currency == 'Euro'}&#128;{elseif $budget->profile->currency == 'Quetzal'}Q{elseif $budget->profile->currency == 'Lempira'}L{elseif $budget->profile->currency == 'Peso Mexicano'}&#36;{elseif $budget->profile->currency == 'Cordoba'}C&#36;{elseif $budget->profile->currency == 'Balboa'}B/.{elseif $budget->profile->currency == 'Guarani'}&#8370;{elseif $budget->profile->currency == 'Nuevo Sol'}S/.{elseif $budget->profile->currency == 'Libra'}&#163;{elseif $budget->profile->currency == 'Peso Uruguayo'}&#36;{elseif $budget->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
		{/if}
		</div>
	</div>
	<div class="bottom_row" id="form_name_">
	{if $budget->profile->discount > 0}{assign var='current_tot' value=$current_base + $total_iva_1 + $total_iva_2 - $retention_total}
			<label>Total Presupuesto:</label>
			<div class="form_row_r_3">{$current_tot|number_format:2:',':'.'} {if $budget->profile->currency == 'Peso Argentino'}ARS &#36;{elseif $budget->profile->currency == 'Peso Boliviano'}b&#36{elseif $budget->profile->currency == 'Peso Chileno'}CLP &#36;{elseif $budget->profile->currency == 'Peso Colombiano'}COP &#36;{elseif $budget->profile->currency == 'Colon'}&#162;{elseif $budget->profile->currency == 'Peso Dominicano'}DOP &#36;{elseif $budget->profile->currency == 'Dolar'}USD &#36;{elseif $budget->profile->currency == 'Euro'}&#128;{elseif $budget->profile->currency == 'Quetzal'}QTD Q{elseif $budget->profile->currency == 'Lempira'}HNL L{elseif $budget->profile->currency == 'Peso Mexicano'}MXN &#36;{elseif $budget->profile->currency == 'Cordoba'}C&#36;{elseif $budget->profile->currency == 'Balboa'}PAB B/.{elseif $budget->profile->currency == 'Guarani'}&#8370;{elseif $budget->profile->currency == 'Nuevo Sol'}PEN S/.{elseif $budget->profile->currency == 'Libra'}&#163;{elseif $budget->profile->currency == 'Peso Uruguayo'}UYU &#36;{elseif $budget->profile->currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}</div> 
	{else}
    
			<label>Total Presupuesto:</label>
			<div class="form_row_r_3">{$budget->profile->total|number_format:2:',':'.'} {if $budget->profile->currency == 'Peso Argentino'}ARS &#36;{elseif $budget->profile->currency == 'Peso Boliviano'}b&#36{elseif $budget->profile->currency == 'Peso Chileno'}CLP &#36;{elseif $budget->profile->currency == 'Peso Colombiano'}COP &#36;{elseif $budget->profile->currency == 'Colon'}&#162;{elseif $budget->profile->currency == 'Peso Dominicano'}DOP &#36;{elseif $budget->profile->currency == 'Dolar'}USD &#36;{elseif $budget->profile->currency == 'Euro'}&#128;{elseif $budget->profile->currency == 'Quetzal'}QTD Q{elseif $budget->profile->currency == 'Lempira'}HNL L{elseif $budget->profile->currency == 'Peso Mexicano'}MXN &#36;{elseif $budget->profile->currency == 'Cordoba'}C&#36;{elseif $budget->profile->currency == 'Balboa'}PAB B/.{elseif $budget->profile->currency == 'Guarani'}&#8370;{elseif $budget->profile->currency == 'Nuevo Sol'}PEN S/.{elseif $budget->profile->currency == 'Libra'}&#163;{elseif $budget->profile->currency == 'Peso Uruguayo'}UYU &#36;{elseif $budget->profile->currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}</div> 
    {/if}
     </div>{if $budget->profile->terms}
    <div class="conditions_row" id="form_name_">
			<label for="form_budget_company_">Condiciones:</label>
			<span>{$budget->profile->terms}</span>
    </div>{/if}
    </body></html>