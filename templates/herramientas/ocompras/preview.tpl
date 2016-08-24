<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
<title>WebProAdmin</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="/css/jquery-ui.css" type="text/css" media="all" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/malsup.js"></script>
<script type="text/javascript" src="/js/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="/js/autoNumeric.js"></script>
{literal}
	<script type="text/javascript">
	  		jQuery(document).ready(function() {
	       		jQuery('#purchas_id2').ajaxForm(function() { 
					alert("El documento fue enviado exitosamente");
				}); 
	  		});
	
		function showDiv() {
   			jQuery('.row_small').css('display', 'block');
		}
	</script>
{/literal}
</head>
<body>

<form method="post" action="{geturl id="purchas_id" action='preview'}?id={$smarty.get.id}">
    <div class="row_small_on" id="form_name_beg">  
        <label for="form_source">&nbsp;</label>
    		<button class="button" type="button" name="send" id="send" value="send" onclick="showDiv()">Enviar...</button> 

    		<button class="button" type="submit" name="download" id="download" value="download" {if !isset($purchase->profile->purchase_file)}onclick="return confirmDone()"{/if}>Descargar</button> 

		{if $purchase->profile->transformed != 'yes'}<label for="form_source">&nbsp;</label>
	    	<button class="button" type="submit" name="convert" id="convert" value="convert" onclick="return confirmDone3()">Transformar a Nota de Gasto</button>{/if}
    </div>
</form>


<form method="post" id="purchas_id2" action="{geturl action='preview'}?id={$smarty.get.id}">

    {* if $fp->hasError()}
        <div class="error">
            Ha ocurrido un error. Por favor chequee los campos resaltados.
        </div>
    {/if *}
    
    <div class="row_small" id="form_name_send">
        <label for="form_name_">Nombre <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input class="social" type="text" id="form_name" name="name" value="" placeholder="Ej: Alejandro"/>
        <input type="hidden" id="form_id" name="id" value="{$smarty.get.id}" />
        <input type="hidden" id="form_company" name="company" value="{$company->thecompany}" />
		<input type="hidden" id="form_phone_comp" name="phone" value="{$company->profile->phone_country} {$company->profile->phone_area} {$company->profile->phone}" />
		<input type="hidden" id="form_email_comp" name="email2" value="{$company->profile->email_c}" />
		<input type="hidden" id="form_amount" name="amount" value="{$purchase->profile->total|number_format:2:',':'.'} {if $purchase->profile->currency == 'Peso Argentino'}ARS &#36;{elseif $purchase->profile->currency == 'Peso Boliviano'}b&#36{elseif $purchase->profile->currency == 'Peso Chileno'}CLP &#36;{elseif $purchase->profile->currency == 'Peso Colombiano'}COP &#36;{elseif $purchase->profile->currency == 'Colon'}&#162;{elseif $purchase->profile->currency == 'Peso Dominicano'}DOP &#36;{elseif $purchase->profile->currency == 'Dolar'}USD &#36;{elseif $purchase->profile->currency == 'Euro'}&#128;{elseif $purchase->profile->currency == 'Quetzal'}QTD Q{elseif $purchase->profile->currency == 'Lempira'}HNL L{elseif $purchase->profile->currency == 'Peso Mexicano'}MXN &#36;{elseif $purchase->profile->currency == 'Cordoba'}C&#36;{elseif $purchase->profile->currency == 'Balboa'}PAB B/.{elseif $purchase->profile->currency == 'Guarani'}&#8370;{elseif $purchase->profile->currency == 'Nuevo Sol'}PEN S/.{elseif $purchase->profile->currency == 'Libra'}&#163;{elseif $purchase->profile->currency == 'Peso Uruguayo'}UYU &#36;{elseif $purchase->profile->currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}" />
		<input type="hidden" id="form_doc_number" name="doc_number" value="{$purchase->purchase_number}" />
        <label for="form_name_">Apellido <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input class="social" type="text" id="form_last_name" name="last_name" value="" placeholder="Ej: Bastida"/>
    </div>
    <div class="row_small" id="form_email_send">  
        <label for="form_email_">Correo electr&oacute;nico <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input class="social" type="text" id="form_email" name="email" value="" placeholder="Ej: ejemplo@webproadmin.com"/>

    		<button class="submit" type="submit" name="send" id="send" value="send" {if !isset($purchase->profile->purchase_file)}onclick="return confirmDone()"{/if}>Enviar</button> 
        {* include file="lib/error.tpl" error=$fp->getError('email') *}
    </div>
	<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
    	</div>
</form>

     <div class="box">
     		<div class="form_row_l2" id="form_purchase_client_">
                		{if $company->profile->company_pict_preview != ''}
                				{assign var="url" value=$company->profile->company_pict_preview}
                            	<img src="/profiles/tmp/company/pictures/{$url}" />
                        	{else}
                            	<img src="/profiles/tmp/company/pictures/profile.png" />
                        {/if}
    	 		 </div>
    	 		 <div class="form_row_r2" id="form_purchase_client_">
        			<div class="form_row_r_1_2">N&ordm; de O/C:</div>
        			<div class="form_row_r_2_2">{$purchase->purchase_number}</div>
        			
         		{* if $purchase->profile->purchase_consecutive > 0}<div class="form_row_r_1_2">Consecutivo:</div>
        			<div class="form_row_r_2_2">{$purchase->profile->purchase_consecutive} </div>{/if *}
        		</div>
     </div>
	
	<div class="box" id="form_box_">
      <div class="form_row_l" id="form_purchase_company_">
		<span>{$company->thecompany}</span>
		<span>RIF: {$company->identification}</span>

		{assign var='counter3' value=0}
    	    {foreach from=$addresses item=address}
  			{if $counter3 == 0}{assign var='counter3' value=$counter3 +1}
					<span>{if $address->profile->street}{$address->profile->street}{/if}{if $address->profile->house}, {$address->profile->house}{/if}{if $address->profile->city}, {$address->profile->city}{/if}
					{if $address->profile->province}, {$address->profile->province}{/if}{if $address->profile->state}, {$address->profile->state} {$address->profile->postal_code}{/if}{if $address->profile->country}, {$address->profile->country}{/if}</span>
			{/if}
		{/foreach}

		<span>{if $company->profile->phone_country}({$company->profile->phone_country}){/if} {$company->profile->phone_area} {$company->profile->phone}</span>
			
		<span>{$company->profile->email_c}</span>
	   </div>
	
        <div class="form_row_r" id="form_purchase_client_">
        		<span>Emisi&oacute;n: {$purchase->profile->purchase_date}</span>
        		<span>Validez: {$purchase->profile->purchase_valid} d&iacute;a(s)</span>
        		{if $purchase->profile->budget_number}<span>Presupuesto N&ordm;: {$purchase->profile->budget_number}</span>{/if}
			<label for="form_purchase_client">&nbsp;</label>
			{foreach from=$client item=client_}
    			{if $client_->profile->thecompany != ""}
			<span>{$client_->profile->thecompany}</span>
			
			<span>RIF: {$client_->profile->identification}</span>
		
			<span>Contacto: {$purchase->profile->purchase_contact}</span>

			<span>{if $client_->profile->street}{$client_->profile->street}{/if}{if $client_->profile->house}, {$client_->profile->house}{/if}{if $client_->profile->city}, {$client_->profile->city}{/if}
			{if $client_->profile->province}, {$client_->profile->province}{/if}{if $client_->profile->state}, {$client_->profile->state} {$client_->profile->postal_code}{/if}{if $client_->profile->country}, {$client_->profile->country}{/if}</span>

			<span>{if $client_->profile->phone_country}({$client_->profile->phone_country}){/if} {$client_->profile->phone_area} {$client_->profile->phone}</span>
			
			<span>{$client_->profile->email_c}</span>
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
					<td class="table_p_top">Precio Unitario ({if $purchase->profile->currency == 'Peso Argentino'}&#36;{elseif $purchase->profile->currency == 'Peso Boliviano'}b&#36{elseif $purchase->profile->currency == 'Peso Chileno'}&#36;{elseif $purchase->profile->currency == 'Peso Colombiano'}&#36;{elseif $purchase->profile->currency == 'Colon'}&#162;{elseif $purchase->profile->currency == 'Peso Dominicano'}&#36;{elseif $purchase->profile->currency == 'Dolar'}&#36;{elseif $purchase->profile->currency == 'Euro'}&#128;{elseif $purchase->profile->currency == 'Quetzal'}Q{elseif $purchase->profile->currency == 'Lempira'}L{elseif $purchase->profile->currency == 'Peso Mexicano'}&#36;{elseif $purchase->profile->currency == 'Cordoba'}C&#36;{elseif $purchase->profile->currency == 'Balboa'}B/.{elseif $purchase->profile->currency == 'Guarani'}&#8370;{elseif $purchase->profile->currency == 'Nuevo Sol'}S/.{elseif $purchase->profile->currency == 'Libra'}&#163;{elseif $purchase->profile->currency == 'Peso Uruguayo'}&#36;{elseif $purchase->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if})</td>
					<td class="table_p_top">IVA (&#37;)</td>
					<td class="table_p_top">Otros (&#37;)</td>
					<td class="table_p_top">Subtotal {if $purchase->profile->currency == 'Peso Argentino'}(&#36;){elseif $purchase->profile->currency == 'Peso Boliviano'}(b&#36){elseif $purchase->profile->currency == 'Peso Chileno'}(&#36;){elseif $purchase->profile->currency == 'Peso Colombiano'}(&#36;){elseif $purchase->profile->currency == 'Colon'}(&#162;){elseif $purchase->profile->currency == 'Peso Dominicano'}(&#36;){elseif $purchase->profile->currency == 'Dolar'}(&#36;){elseif $purchase->profile->currency == 'Euro'}(&#128;){elseif $purchase->profile->currency == 'Quetzal'}(Q){elseif $purchase->profile->currency == 'Lempira'}(L){elseif $purchase->profile->currency == 'Peso Mexicano'}(&#36;){elseif $purchase->profile->currency == 'Cordoba'}(C&#36;){elseif $purchase->profile->currency == 'Balboa'}(B/.){elseif $purchase->profile->currency == 'Guarani'}(&#8370;){elseif $purchase->profile->currency == 'Nuevo Sol'}(S/.){elseif $purchase->profile->currency == 'Libra'}(&#163;){elseif $purchase->profile->currency == 'Peso Uruguayo'}(&#36;){elseif $purchase->profile->currency == 'Bolivar'}(Bs.){else}(&#128;){/if}</td>
				</tr>
			{/if}
		{/foreach}
        {foreach from=$items item=item}
        	   {if $item->getId()}
				<tr>
					<td>{$item->profile->code|ucfirst}</td>
					<td>{$item->profile->detail|ucfirst}</td>
					<td>{$item->profile->quantity|number_format:2:',':'.'}</td>
					<td>{$item->profile->unit_cost|number_format:2:',':'.'}</td>
					<td>{$item->profile->iva_p|number_format:2:',':'.'}</td>
					<td>{$item->profile->iva_p2|number_format:2:',':'.'}</td>
					<td>{$item->profile->subtotal|number_format:2:',':'.'}</td>
				</tr>
			{/if}
        {/foreach}
       </table>
	 {/if}
  	
  	<div class="box" id="form_box_">
  	  <div class="form_row_l33" id="form_purchase_company_">
  	  &nbsp;
  	  </div> 
      <div class="form_row_r" id="form_purchase_company_">
			<div class="form_row_r_1">Subtotal:</div> 
			<div class="form_row_r_2">{$purchase->profile->subtotal|number_format:2:',':'.'} {if $purchase->profile->currency == 'Peso Argentino'}&#36;{elseif $purchase->profile->currency == 'Peso Boliviano'}b&#36{elseif $purchase->profile->currency == 'Peso Chileno'}&#36;{elseif $purchase->profile->currency == 'Peso Colombiano'}&#36;{elseif $purchase->profile->currency == 'Colon'}&#162;{elseif $purchase->profile->currency == 'Peso Dominicano'}&#36;{elseif $purchase->profile->currency == 'Dolar'}&#36;{elseif $purchase->profile->currency == 'Euro'}&#128;{elseif $purchase->profile->currency == 'Quetzal'}Q{elseif $purchase->profile->currency == 'Lempira'}L{elseif $purchase->profile->currency == 'Peso Mexicano'}&#36;{elseif $purchase->profile->currency == 'Cordoba'}C&#36;{elseif $purchase->profile->currency == 'Balboa'}B/.{elseif $purchase->profile->currency == 'Guarani'}&#8370;{elseif $purchase->profile->currency == 'Nuevo Sol'}S/.{elseif $purchase->profile->currency == 'Libra'}&#163;{elseif $purchase->profile->currency == 'Peso Uruguayo'}&#36;{elseif $purchase->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
			{if $purchase->profile->discount > 0}{assign var='current_desc' value=$purchase->profile->subtotal * $purchase->profile->discount * 0.01}
			<div class="form_row_r_1">Descuento ({$purchase->profile->discount} %):</div>
			<div class="form_row_r_2">{$current_desc|number_format:2:',':'.'} {if $purchase->profile->currency == 'Peso Argentino'}&#36;{elseif $purchase->profile->currency == 'Peso Boliviano'}b&#36{elseif $purchase->profile->currency == 'Peso Chileno'}&#36;{elseif $purchase->profile->currency == 'Peso Colombiano'}&#36;{elseif $purchase->profile->currency == 'Colon'}&#162;{elseif $purchase->profile->currency == 'Peso Dominicano'}&#36;{elseif $purchase->profile->currency == 'Dolar'}&#36;{elseif $purchase->profile->currency == 'Euro'}&#128;{elseif $purchase->profile->currency == 'Quetzal'}Q{elseif $purchase->profile->currency == 'Lempira'}L{elseif $purchase->profile->currency == 'Peso Mexicano'}&#36;{elseif $purchase->profile->currency == 'Cordoba'}C&#36;{elseif $purchase->profile->currency == 'Balboa'}B/.{elseif $purchase->profile->currency == 'Guarani'}&#8370;{elseif $purchase->profile->currency == 'Nuevo Sol'}S/.{elseif $purchase->profile->currency == 'Libra'}&#163;{elseif $purchase->profile->currency == 'Peso Uruguayo'}&#36;{elseif $purchase->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
			{/if}
			{if $purchase->profile->discount > 0}{assign var='current_base' value=$purchase->profile->subtotal - $current_desc}
			<div class="form_row_r_1">Base Imponible:</div>
			<div class="form_row_r_2">{$current_base|number_format:2:',':'.'} {if $purchase->profile->currency == 'Peso Argentino'}&#36;{elseif $purchase->profile->currency == 'Peso Boliviano'}b&#36{elseif $purchase->profile->currency == 'Peso Chileno'}&#36;{elseif $purchase->profile->currency == 'Peso Colombiano'}&#36;{elseif $purchase->profile->currency == 'Colon'}&#162;{elseif $purchase->profile->currency == 'Peso Dominicano'}&#36;{elseif $purchase->profile->currency == 'Dolar'}&#36;{elseif $purchase->profile->currency == 'Euro'}&#128;{elseif $purchase->profile->currency == 'Quetzal'}Q{elseif $purchase->profile->currency == 'Lempira'}L{elseif $purchase->profile->currency == 'Peso Mexicano'}&#36;{elseif $purchase->profile->currency == 'Cordoba'}C&#36;{elseif $purchase->profile->currency == 'Balboa'}B/.{elseif $purchase->profile->currency == 'Guarani'}&#8370;{elseif $purchase->profile->currency == 'Nuevo Sol'}S/.{elseif $purchase->profile->currency == 'Libra'}&#163;{elseif $purchase->profile->currency == 'Peso Uruguayo'}&#36;{elseif $purchase->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
			{else}{assign var='current_base' value=$purchase->profile->subtotal}
			<div class="form_row_r_1">Base Imponible:</div>
			<div class="form_row_r_2">{$purchase->profile->base|number_format:2:',':'.'} {if $purchase->profile->currency == 'Peso Argentino'}&#36;{elseif $purchase->profile->currency == 'Peso Boliviano'}b&#36{elseif $purchase->profile->currency == 'Peso Chileno'}&#36;{elseif $purchase->profile->currency == 'Peso Colombiano'}&#36;{elseif $purchase->profile->currency == 'Colon'}&#162;{elseif $purchase->profile->currency == 'Peso Dominicano'}&#36;{elseif $purchase->profile->currency == 'Dolar'}&#36;{elseif $purchase->profile->currency == 'Euro'}&#128;{elseif $purchase->profile->currency == 'Quetzal'}Q{elseif $purchase->profile->currency == 'Lempira'}L{elseif $purchase->profile->currency == 'Peso Mexicano'}&#36;{elseif $purchase->profile->currency == 'Cordoba'}C&#36;{elseif $purchase->profile->currency == 'Balboa'}B/.{elseif $purchase->profile->currency == 'Guarani'}&#8370;{elseif $purchase->profile->currency == 'Nuevo Sol'}S/.{elseif $purchase->profile->currency == 'Libra'}&#163;{elseif $purchase->profile->currency == 'Peso Uruguayo'}&#36;{elseif $purchase->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div>
			{/if}
		{assign var='iva_t2__' value=0 scope=global}{assign var='iva_t__' value=0 scope=global}{assign var='tot_item2' value=0 scope=global}{assign var='tot_item' value=0 scope=global}{assign var='iva' value=0 scope=global}{assign var='iva2' value=0 scope=global}{assign var='iva_total' value=0 scope=global}{assign var='iva2_total' value=0 scope=global}
		{assign var='total_iva_1' value=0 scope=global}{assign var='total_iva_2' value=0 scope=global}
        {foreach from=$items2 item=item}
           {if $item->profile->iva_p != $iva && $item->profile->iva_p > 0}   		
  				{if $purchase->profile->discount}
    					{assign var='discount__' value=100 - $purchase->profile->discount}
    					{assign var='iva_tot' scope=global value=$item->profile->iva_p_total * $discount__ * 0.01}
    				{else}
    					{assign var='iva_tot' scope=global value=$item->profile->iva_p_total}
    				{/if}  
    				    	{assign var='iva_t__' value=$item->profile->iva_p_total scope=global}
        				{assign var='iva_total' value=$iva_tot scope=global}
        				{assign var='tot_item' scope=global value=$tot_item + 1}
        				{assign var='iva' scope=global value=$item->profile->iva_p}

        				{if $ivas_[$tot_item] == $iva_t__}
        				<div class="form_row_r_1">I.V.A. ({$item->profile->iva_p}) %:</div>
        				<div class="form_row_r_2">{$iva_total|number_format:2:',':'.'} {if $purchase->profile->currency == 'Peso Argentino'}&#36;{elseif $purchase->profile->currency == 'Peso Boliviano'}b&#36{elseif $purchase->profile->currency == 'Peso Chileno'}&#36;{elseif $purchase->profile->currency == 'Peso Colombiano'}&#36;{elseif $purchase->profile->currency == 'Colon'}&#162;{elseif $purchase->profile->currency == 'Peso Dominicano'}&#36;{elseif $purchase->profile->currency == 'Dolar'}&#36;{elseif $purchase->profile->currency == 'Euro'}&#128;{elseif $purchase->profile->currency == 'Quetzal'}Q{elseif $purchase->profile->currency == 'Lempira'}L{elseif $purchase->profile->currency == 'Peso Mexicano'}&#36;{elseif $purchase->profile->currency == 'Cordoba'}C&#36;{elseif $purchase->profile->currency == 'Balboa'}B/.{elseif $purchase->profile->currency == 'Guarani'}&#8370;{elseif $purchase->profile->currency == 'Nuevo Sol'}S/.{elseif $purchase->profile->currency == 'Libra'}&#163;{elseif $purchase->profile->currency == 'Peso Uruguayo'}&#36;{elseif $purchase->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
       			    {assign var='total_iva_1' scope=global value=$total_iva_1 + $iva_total}
       			    {/if}
    			{elseif $item->profile->iva_p > 0}	
    				{if $purchase->profile->discount}
    					{assign var='discount__' value=100 - $purchase->profile->discount}
    					{assign var='iva_tot_' scope=global value=$item->profile->iva_p_total * $discount__ * 0.01}
    				{else}
    					{assign var='iva_tot_' scope=global value=$item->profile->iva_p_total}
    				{/if}
    					{assign var='iva_t_' value=$item->profile->iva_p_total scope=global}
    					{assign var='iva_t__' scope=global value=$iva_t__ + $iva_t_}
    					
        				{assign var='iva_total' scope=global value=$iva_total + $iva_tot_}
        				
        				{if $ivas_[$tot_item] == $iva_t__}
        				<div class="form_row_r_1">I.V.A. ({$item->profile->iva_p}) %:</div> 
        				<div class="form_row_r_2">{$iva_total|number_format:2:',':'.'} {if $purchase->profile->currency == 'Peso Argentino'}&#36;{elseif $purchase->profile->currency == 'Peso Boliviano'}b&#36{elseif $purchase->profile->currency == 'Peso Chileno'}&#36;{elseif $purchase->profile->currency == 'Peso Colombiano'}&#36;{elseif $purchase->profile->currency == 'Colon'}&#162;{elseif $purchase->profile->currency == 'Peso Dominicano'}&#36;{elseif $purchase->profile->currency == 'Dolar'}&#36;{elseif $purchase->profile->currency == 'Euro'}&#128;{elseif $purchase->profile->currency == 'Quetzal'}Q{elseif $purchase->profile->currency == 'Lempira'}L{elseif $purchase->profile->currency == 'Peso Mexicano'}&#36;{elseif $purchase->profile->currency == 'Cordoba'}C&#36;{elseif $purchase->profile->currency == 'Balboa'}B/.{elseif $purchase->profile->currency == 'Guarani'}&#8370;{elseif $purchase->profile->currency == 'Nuevo Sol'}S/.{elseif $purchase->profile->currency == 'Libra'}&#163;{elseif $purchase->profile->currency == 'Peso Uruguayo'}&#36;{elseif $purchase->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
       			    {assign var='total_iva_1' scope=global value=$total_iva_1 + $iva_total}
       			    {/if}	
			{/if}
        {/foreach}
		
        {foreach from=$items3 item=item}      		
			{if $item->profile->iva_p2 != $iva2 && $item->profile->iva_p2 > 0}      		
				
    				{if $purchase->profile->discount}
    					{assign var='discount2__' value=100 - $purchase->profile->discount}
    					{assign var='iva2_tot' scope=global value=$item->profile->iva_p2_total * $discount2__ * 0.01}
    				{else}
    					{assign var='iva2_tot' scope=global value=$item->profile->iva_p2_total}
    				{/if}
    					{assign var='iva_t2__' value=$item->profile->iva_p2_total scope=global}
        				
        				{assign var='iva2_total' value=$iva2_tot scope=global}
        				{assign var='tot_item2' scope=global value=$tot_item2 + 1}
        				{assign var='iva2' scope=global value=$item->profile->iva_p2}
			
        				{if $ivas2_[$tot_item2] == $iva_t2__}
        				<div class="form_row_r_1">Otros Imp. ({$item->profile->iva_p2}) %:</div> 
        				<div class="form_row_r_2">{$iva2_total|number_format:2:',':'.'} {if $purchase->profile->currency == 'Peso Argentino'}&#36;{elseif $purchase->profile->currency == 'Peso Boliviano'}b&#36{elseif $purchase->profile->currency == 'Peso Chileno'}&#36;{elseif $purchase->profile->currency == 'Peso Colombiano'}&#36;{elseif $purchase->profile->currency == 'Colon'}&#162;{elseif $purchase->profile->currency == 'Peso Dominicano'}&#36;{elseif $purchase->profile->currency == 'Dolar'}&#36;{elseif $purchase->profile->currency == 'Euro'}&#128;{elseif $purchase->profile->currency == 'Quetzal'}Q{elseif $purchase->profile->currency == 'Lempira'}L{elseif $purchase->profile->currency == 'Peso Mexicano'}&#36;{elseif $purchase->profile->currency == 'Cordoba'}C&#36;{elseif $purchase->profile->currency == 'Balboa'}B/.{elseif $purchase->profile->currency == 'Guarani'}&#8370;{elseif $purchase->profile->currency == 'Nuevo Sol'}S/.{elseif $purchase->profile->currency == 'Libra'}&#163;{elseif $purchase->profile->currency == 'Peso Uruguayo'}&#36;{elseif $purchase->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
       			    {assign var='total_iva_2' scope=global value=$total_iva_2 + $iva2_total}
       			    {/if}       				
    			{elseif $item->profile->iva_p2 > 0}	
    				{if $purchase->profile->discount}
    					{assign var='discount2__' value=100 - $purchase->profile->discount}
    					{assign var='iva2_tot' scope=global value=$item->profile->iva_p2_total * $discount2__ * 0.01}
    				{else}
    					{assign var='iva2_tot' scope=global value=$item->profile->iva_p2_total}
    				{/if}
    					{assign var='iva_t2_' value=$item->profile->iva_p2_total scope=global}
    					{assign var='iva_t2__' scope=global value=$iva_t2__ + $iva_t2_}		
        	
        				{assign var='iva2_total' scope=global value=$iva2_total + $iva2_tot}
        				
        				{if $ivas2_[$tot_item2] == $iva_t2__}
        				<div class="form_row_r_1">Otros Imp. ({$item->profile->iva_p2}) %:</div> 
        				<div class="form_row_r_2">{$iva2_total|number_format:2:',':'.'} {if $purchase->profile->currency == 'Peso Argentino'}&#36;{elseif $purchase->profile->currency == 'Peso Boliviano'}b&#36{elseif $purchase->profile->currency == 'Peso Chileno'}&#36;{elseif $purchase->profile->currency == 'Peso Colombiano'}&#36;{elseif $purchase->profile->currency == 'Colon'}&#162;{elseif $purchase->profile->currency == 'Peso Dominicano'}&#36;{elseif $purchase->profile->currency == 'Dolar'}&#36;{elseif $purchase->profile->currency == 'Euro'}&#128;{elseif $purchase->profile->currency == 'Quetzal'}Q{elseif $purchase->profile->currency == 'Lempira'}L{elseif $purchase->profile->currency == 'Peso Mexicano'}&#36;{elseif $purchase->profile->currency == 'Cordoba'}C&#36;{elseif $purchase->profile->currency == 'Balboa'}B/.{elseif $purchase->profile->currency == 'Guarani'}&#8370;{elseif $purchase->profile->currency == 'Nuevo Sol'}S/.{elseif $purchase->profile->currency == 'Libra'}&#163;{elseif $purchase->profile->currency == 'Peso Uruguayo'}&#36;{elseif $purchase->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
       			    {assign var='total_iva_2' scope=global value=$total_iva_2 + $iva2_total}
       			    {/if}
			{/if}	
        {/foreach}
        {if $purchase->profile->retention > 0}
			{assign var='retention_total' value=$current_base * $purchase->profile->retention * 0.01}
			<div class="form_row_r_1">Retenci&oacute;n IRPF ({$purchase->profile->retention}) %:</div> 
			<div class="form_row_r_2">{$retention_total|number_format:2:',':'.'} {if $purchase->profile->currency == 'Peso Argentino'}&#36;{elseif $purchase->profile->currency == 'Peso Boliviano'}b&#36{elseif $purchase->profile->currency == 'Peso Chileno'}&#36;{elseif $purchase->profile->currency == 'Peso Colombiano'}&#36;{elseif $purchase->profile->currency == 'Colon'}&#162;{elseif $purchase->profile->currency == 'Peso Dominicano'}&#36;{elseif $purchase->profile->currency == 'Dolar'}&#36;{elseif $purchase->profile->currency == 'Euro'}&#128;{elseif $purchase->profile->currency == 'Quetzal'}Q{elseif $purchase->profile->currency == 'Lempira'}L{elseif $purchase->profile->currency == 'Peso Mexicano'}&#36;{elseif $purchase->profile->currency == 'Cordoba'}C&#36;{elseif $purchase->profile->currency == 'Balboa'}B/.{elseif $purchase->profile->currency == 'Guarani'}&#8370;{elseif $purchase->profile->currency == 'Nuevo Sol'}S/.{elseif $purchase->profile->currency == 'Libra'}&#163;{elseif $purchase->profile->currency == 'Peso Uruguayo'}&#36;{elseif $purchase->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
		{/if}
		</div>
	</div>
	
	<div class="bottom_row" id="form_name_">
	{if $purchase->profile->discount > 0}{assign var='current_tot' value=$current_base + $total_iva_1 + $total_iva_2 - $retention_total}
			<label>Total O/C:</label>
			<div class="form_row_r_3">{$current_tot|number_format:2:',':'.'} {if $purchase->profile->currency == 'Peso Argentino'}ARS &#36;{elseif $purchase->profile->currency == 'Peso Boliviano'}b&#36{elseif $purchase->profile->currency == 'Peso Chileno'}CLP &#36;{elseif $purchase->profile->currency == 'Peso Colombiano'}COP &#36;{elseif $purchase->profile->currency == 'Colon'}&#162;{elseif $purchase->profile->currency == 'Peso Dominicano'}DOP &#36;{elseif $purchase->profile->currency == 'Dolar'}USD &#36;{elseif $purchase->profile->currency == 'Euro'}&#128;{elseif $purchase->profile->currency == 'Quetzal'}QTD Q{elseif $purchase->profile->currency == 'Lempira'}HNL L{elseif $purchase->profile->currency == 'Peso Mexicano'}MXN &#36;{elseif $purchase->profile->currency == 'Cordoba'}C&#36;{elseif $purchase->profile->currency == 'Balboa'}PAB B/.{elseif $purchase->profile->currency == 'Guarani'}&#8370;{elseif $purchase->profile->currency == 'Nuevo Sol'}PEN S/.{elseif $purchase->profile->currency == 'Libra'}&#163;{elseif $purchase->profile->currency == 'Peso Uruguayo'}UYU &#36;{elseif $purchase->profile->currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}</div> 
	{else}
    
			<label>Total O/C:</label>
			<div class="form_row_r_3">{$purchase->profile->total|number_format:2:',':'.'} {if $purchase->profile->currency == 'Peso Argentino'}ARS &#36;{elseif $purchase->profile->currency == 'Peso Boliviano'}b&#36{elseif $purchase->profile->currency == 'Peso Chileno'}CLP &#36;{elseif $purchase->profile->currency == 'Peso Colombiano'}COP &#36;{elseif $purchase->profile->currency == 'Colon'}&#162;{elseif $purchase->profile->currency == 'Peso Dominicano'}DOP &#36;{elseif $purchase->profile->currency == 'Dolar'}USD &#36;{elseif $purchase->profile->currency == 'Euro'}&#128;{elseif $purchase->profile->currency == 'Quetzal'}QTD Q{elseif $purchase->profile->currency == 'Lempira'}HNL L{elseif $purchase->profile->currency == 'Peso Mexicano'}MXN &#36;{elseif $purchase->profile->currency == 'Cordoba'}C&#36;{elseif $purchase->profile->currency == 'Balboa'}PAB B/.{elseif $purchase->profile->currency == 'Guarani'}&#8370;{elseif $purchase->profile->currency == 'Nuevo Sol'}PEN S/.{elseif $purchase->profile->currency == 'Libra'}&#163;{elseif $purchase->profile->currency == 'Peso Uruguayo'}UYU &#36;{elseif $purchase->profile->currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}</div> 
    {/if}
     </div>
    
    <div class="conditions_row" id="form_name_">
			<label for="form_purchase_company_">Condiciones:</label>
			<span>{$purchase->profile->terms}</span>
    </div>

    </body>
</html>