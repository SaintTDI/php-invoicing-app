{include file='header.tpl' section='facturas'}
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Ficha Factura:</h3></label>
</div>

{literal}
<script type="text/javascript">
        // wait for the DOM to be loaded 
        jQuery(document).ready(function() { 
			//add message
        }); 

		function showDiv() {
   			jQuery('.row_small').css('display', 'block');
		}
</script>
{/literal}

	<form method="post" id="fichaf_id" action="{geturl controller='herramientas/facturas' action='fichafactura'}?id={if $smarty.post.id}{$smarty.post.id}{else}{$smarty.get.id}{/if}">
	    <div class="row_small_on" id="form_name_beg">  
	        	{if $invoice->profile->published != 'yes'}<label for="form_invoice_link"><a class="submit8" {if $identity->trial_expired}{else}href="{geturl controller='herramientas/facturas' action='editar'}?id={$invoice->getId()}"{/if}>Editar</a></label>{/if}
	        	
	    		<button class="submit8" type="button" name="send" id="send" value="send" onclick="showDiv()">Enviar...</button> 

	    		<button class="submit8" type="submit" name="download" id="download" value="download" {if !isset($invoice->profile->invoice_file)}onclick="return confirmDone()"{/if}>Descargar como PDF</button> 

			{if $invoice->profile->amountpay}{else}{if $invoice->profile->published != 'yes'}
	    		<button class="submit8" type="submit" name="delete" id="delete" value="delete" onclick="return confirmDone5()">Borrar Documento</button>{/if}{/if}
	    </div>
	</form>
	
	
	<form method="post" id="fichaf2_id" action="{geturl action='fichafactura'}?id={$smarty.get.id}&submitted=true">
	    {if $fp->hasError()}
	    		<div class="row_small2" id="form_name_send">
	    {else}
    		{if $smarty.get.submitted}
        		<div class="success down">
            		El documento fue enviado con &eacute;xito.
        		</div>
        	{/if}
	    		<div class="row_small" id="form_name_send">
	    {/if}
	        <label for="form_name_">Nombre <strong>&#x28;&#x2A;&#x29;</strong>:</label>
	        <input type="text" id="form_name" name="name" value="{$smarty.post.name}" placeholder="Nombre"/>
	        <input type="hidden" id="form_id" name="id" value="{if $smarty.post.id}{$smarty.post.id}{else}{$smarty.get.id}{/if}" />
	        <input type="hidden" id="form_company" name="company" value="{$company->thecompany}" />
			<input type="hidden" id="form_phone_comp" name="phone" value="{$company->profile->phone_country} {$company->profile->phone_area} {$company->profile->phone}" />
			<input type="hidden" id="form_email_comp" name="email2" value="{$company->profile->email_c}" />
			<input type="hidden" id="form_amount" name="amount" value="{$invoice->profile->total|number_format:2:',':'.'} {if $invoice->profile->currency == 'Peso Argentino'}ARS &#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}CLP &#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}COP &#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}DOP &#36;{elseif $invoice->profile->currency == 'Dolar'}USD &#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}QTD Q{elseif $invoice->profile->currency == 'Lempira'}HNL L{elseif $invoice->profile->currency == 'Peso Mexicano'}MXN &#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}PAB B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}PEN S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}UYU &#36;{elseif $invoice->profile->currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}" />
			<input type="hidden" id="form_doc_number" name="doc_number" value="{$invoice->profile->start_letter} - {$invoice->profile->number_zero}{$invoice->invoice_number}" />
	        <label for="form_name_">Apellido <strong>&#x28;&#x2A;&#x29;</strong>:</label>
	        <input type="text" id="form_last_name" name="last_name" value="{$smarty.post.last_name}" placeholder="Apellido"/>
	    		</div>
	    {if $fp->hasError()}
	    		<div class="row_small2" id="form_name_send">
	    {else}
	    		<div class="row_small" id="form_name_send">
	    {/if}
	        <label for="form_email_">Correo electr&oacute;nico <strong>&#x28;&#x2A;&#x29;</strong>:</label>
	        <input type="email" id="form_email" name="email" value="{$smarty.post.email}" placeholder="Email"/>
	    		<button class="submit7" type="submit" name="send" id="send" value="send" {if !isset($invoice->profile->invoice_file)}onclick="return confirmDone()"{/if}>Enviar</button> 
	    		</div>
		    <div class="row_small2" id="form_name_send">
		    {include file="lib/error.tpl" error=$fp->getError('email')}
		    </div>
	    {if $fp->hasError()}
	    		<div class="row_small2" id="form_name_send">
	    {else}
	    		<div class="row_small" id="form_name_send">
	    {/if}
	    		<span class="footnote2">Los campos marcados con asterisco (*) son obligatorios</span>
	    	</div>
	</form>

    <div class="box">
     		<div class="form_row_l2" id="form_invoice_client_">
                		{if $company->profile->company_pict_preview != ''}
                				{assign var="url" value=$company->profile->company_pict_preview}
                            	<img src="/profiles/tmp/company/pictures/{$url}" />
                        	{else}
                            	<img src="/profiles/tmp/company/pictures/profile.png" />
                        {/if}
    	 		 </div>
    	 		 <div class="form_row_r2" id="form_invoice_client_">
        			<div class="form_row_r_1_2">FACTURA N&ordm;:</div>
        			<div class="form_row_r_2_2">{$invoice->profile->start_letter} - {$invoice->profile->number_zero}{$invoice->invoice_number}</div>
        			
         		{if $invoice->profile->invoice_consecutive > 0}<div class="form_row_r_1_2">Consecutivo:</div>
        			<div class="form_row_r_2_2">{$invoice->profile->invoice_consecutive} </div>{/if}
        		</div>
     </div>
	
	<div class="box" id="form_box_">
      <div class="form_row_l" id="form_invoice_company_">
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
	
        <div class="form_row_r" id="form_invoice_client_">
        
       		<label>Emisi&oacute;n:</label>
        		<label>{$invoice->profile->invoice_date}</label>
        		
       		<label>Vencimiento:</label>
        		<label>{$valid_until}</label>

			{foreach from=$client item=client_}
    			{if $client_->profile->thecompany != ""}
			<span class="title">{$client_->profile->thecompany}</span>
			
			{if $client_->profile->identification}<span>{$client_->profile->identification}</span>{/if}
		
			{if $invoice->profile->invoice_contact}<span>Contacto: {$invoice->profile->invoice_contact}</span>{/if}

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
					<td class="table_p_top">Precio Unitario ({if $invoice->profile->currency == 'Peso Argentino'}&#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}&#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}&#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}&#36;{elseif $invoice->profile->currency == 'Dolar'}&#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}Q{elseif $invoice->profile->currency == 'Lempira'}L{elseif $invoice->profile->currency == 'Peso Mexicano'}&#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}&#36;{elseif $invoice->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if})</td>
					<td class="table_p_top">IVA (&#37;)</td>
					<td class="table_p_top">Otros (&#37;)</td>
					<td class="table_p_top">Subtotal {if $invoice->profile->currency == 'Peso Argentino'}(&#36;){elseif $invoice->profile->currency == 'Peso Boliviano'}(b&#36){elseif $invoice->profile->currency == 'Peso Chileno'}(&#36;){elseif $invoice->profile->currency == 'Peso Colombiano'}(&#36;){elseif $invoice->profile->currency == 'Colon'}(&#162;){elseif $invoice->profile->currency == 'Peso Dominicano'}(&#36;){elseif $invoice->profile->currency == 'Dolar'}(&#36;){elseif $invoice->profile->currency == 'Euro'}(&#128;){elseif $invoice->profile->currency == 'Quetzal'}(Q){elseif $invoice->profile->currency == 'Lempira'}(L){elseif $invoice->profile->currency == 'Peso Mexicano'}(&#36;){elseif $invoice->profile->currency == 'Cordoba'}(C&#36;){elseif $invoice->profile->currency == 'Balboa'}(B/.){elseif $invoice->profile->currency == 'Guarani'}(&#8370;){elseif $invoice->profile->currency == 'Nuevo Sol'}(S/.){elseif $invoice->profile->currency == 'Libra'}(&#163;){elseif $invoice->profile->currency == 'Peso Uruguayo'}(&#36;){elseif $invoice->profile->currency == 'Bolivar'}(Bs.){else}(&#128;){/if}</td>
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
  	  <div class="form_row_l33" id="form_invoice_company_">
  	  &nbsp;
  	  </div> 
      <div class="form_row_r" id="form_invoice_company_">
			<div class="form_row_r_1">Subtotal:</div> 
			<div class="form_row_r_2">{$invoice->profile->subtotal|number_format:2:',':'.'} {if $invoice->profile->currency == 'Peso Argentino'}&#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}&#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}&#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}&#36;{elseif $invoice->profile->currency == 'Dolar'}&#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}Q{elseif $invoice->profile->currency == 'Lempira'}L{elseif $invoice->profile->currency == 'Peso Mexicano'}&#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}&#36;{elseif $invoice->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
			{if $invoice->profile->discount > 0}{assign var='current_desc' value=$invoice->profile->subtotal * $invoice->profile->discount * 0.01}
			<div class="form_row_r_1">Descuento ({$invoice->profile->discount} &#37;):</div>
			<div class="form_row_r_2">{$current_desc|number_format:2:',':'.'} {if $invoice->profile->currency == 'Peso Argentino'}&#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}&#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}&#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}&#36;{elseif $invoice->profile->currency == 'Dolar'}&#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}Q{elseif $invoice->profile->currency == 'Lempira'}L{elseif $invoice->profile->currency == 'Peso Mexicano'}&#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}&#36;{elseif $invoice->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
			{/if}
			{if $invoice->profile->discount > 0}{assign var='current_base' value=$invoice->profile->subtotal - $current_desc}
			<div class="form_row_r_1">Base Imponible:</div>
			<div class="form_row_r_2">{$current_base|number_format:2:',':'.'} {if $invoice->profile->currency == 'Peso Argentino'}&#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}&#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}&#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}&#36;{elseif $invoice->profile->currency == 'Dolar'}&#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}Q{elseif $invoice->profile->currency == 'Lempira'}L{elseif $invoice->profile->currency == 'Peso Mexicano'}&#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}&#36;{elseif $invoice->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
			{else}{assign var='current_base' value=$invoice->profile->subtotal}
			<div class="form_row_r_1">Base Imponible:</div>
			<div class="form_row_r_2">{$invoice->profile->base|number_format:2:',':'.'} {if $invoice->profile->currency == 'Peso Argentino'}&#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}&#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}&#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}&#36;{elseif $invoice->profile->currency == 'Dolar'}&#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}Q{elseif $invoice->profile->currency == 'Lempira'}L{elseif $invoice->profile->currency == 'Peso Mexicano'}&#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}&#36;{elseif $invoice->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div>
			{/if}
		{assign var='iva_t2__' value=0 scope=global}{assign var='iva_t__' value=0 scope=global}{assign var='tot_item2' value=0 scope=global}{assign var='tot_item' value=0 scope=global}{assign var='iva' value=0 scope=global}{assign var='iva2' value=0 scope=global}{assign var='iva_total' value=0 scope=global}{assign var='iva2_total' value=0 scope=global}

		{assign var='total_iva_1' value=0 scope=global}{assign var='total_iva_2' value=0 scope=global}
        {foreach from=$items2 item=item}
           {if $item->profile->iva != $iva && $item->profile->iva > 0}   		
  				{if $invoice->profile->discount}
    					{assign var='discount__' value=100 - $invoice->profile->discount}
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
        				<div class="form_row_r_2">{$iva_total|number_format:2:',':'.'} {if $invoice->profile->currency == 'Peso Argentino'}&#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}&#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}&#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}&#36;{elseif $invoice->profile->currency == 'Dolar'}&#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}Q{elseif $invoice->profile->currency == 'Lempira'}L{elseif $invoice->profile->currency == 'Peso Mexicano'}&#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}&#36;{elseif $invoice->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
       			    {assign var='total_iva_1' scope=global value=$total_iva_1 + $iva_total}
       			    {/if}
    			{elseif $item->profile->iva > 0}	
    				{if $invoice->profile->discount}
    					{assign var='discount__' value=100 - $invoice->profile->discount}
    					{assign var='iva_tot_' scope=global value=$item->profile->iva_total * $discount__ * 0.01}
    				{else}
    					{assign var='iva_tot_' scope=global value=$item->profile->iva_total}
    				{/if}
    					{assign var='iva_t_' value=$item->profile->iva_total scope=global}
    					{assign var='iva_t__' scope=global value=$iva_t__ + $iva_t_}
    					
        				{assign var='iva_total' scope=global value=$iva_total + $iva_tot_}
        				
        				{if $ivas_[$tot_item] == $iva_t__}
        				<div class="form_row_r_1">I.V.A. ({$item->profile->iva|number_format:2:',':'.'}) &#37;:</div> 
        				<div class="form_row_r_2">{$iva_total|number_format:2:',':'.'} {if $invoice->profile->currency == 'Peso Argentino'}&#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}&#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}&#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}&#36;{elseif $invoice->profile->currency == 'Dolar'}&#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}Q{elseif $invoice->profile->currency == 'Lempira'}L{elseif $invoice->profile->currency == 'Peso Mexicano'}&#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}&#36;{elseif $invoice->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
       			    {assign var='total_iva_1' scope=global value=$total_iva_1 + $iva_total}
       			    {/if}	
			{/if}
        {/foreach}
		
        {foreach from=$items3 item=item}      		
			{if $item->profile->iva2 != $iva2 && $item->profile->iva2 > 0}      		
				
    				{if $invoice->profile->discount}
    					{assign var='discount2__' value=100 - $invoice->profile->discount}
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
        				<div class="form_row_r_2">{$iva2_total|number_format:2:',':'.'} {if $invoice->profile->currency == 'Peso Argentino'}&#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}&#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}&#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}&#36;{elseif $invoice->profile->currency == 'Dolar'}&#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}Q{elseif $invoice->profile->currency == 'Lempira'}L{elseif $invoice->profile->currency == 'Peso Mexicano'}&#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}&#36;{elseif $invoice->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
       			    {assign var='total_iva_2' scope=global value=$total_iva_2 + $iva2_total}
       			    {/if}       				
    			{elseif $item->profile->iva2 > 0}	
    				{if $invoice->profile->discount}
    					{assign var='discount2__' value=100 - $invoice->profile->discount}
    					{assign var='iva2_tot' scope=global value=$item->profile->iva2_total * $discount2__ * 0.01}
    				{else}
    					{assign var='iva2_tot' scope=global value=$item->profile->iva2_total}
    				{/if}
    					{assign var='iva_t2_' value=$item->profile->iva2_total scope=global}
    					{assign var='iva_t2__' scope=global value=$iva_t2__ + $iva_t2_}		
        	
        				{assign var='iva2_total' scope=global value=$iva2_total + $iva2_tot}
        				
        				{if $ivas2_[$tot_item2] == $iva_t2__}
        				<div class="form_row_r_1">Otros Imp. ({$item->profile->iva2|number_format:2:',':'.'}) &#37;:</div> 
        				<div class="form_row_r_2">{$iva2_total|number_format:2:',':'.'} {if $invoice->profile->currency == 'Peso Argentino'}&#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}&#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}&#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}&#36;{elseif $invoice->profile->currency == 'Dolar'}&#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}Q{elseif $invoice->profile->currency == 'Lempira'}L{elseif $invoice->profile->currency == 'Peso Mexicano'}&#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}&#36;{elseif $invoice->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
       			    {assign var='total_iva_2' scope=global value=$total_iva_2 + $iva2_total}
       			    {/if}
			{/if}	
        {/foreach}
        {if $invoice->profile->retention > 0}
			{assign var='retention_total' value=$current_base * $invoice->profile->retention * 0.01}
			<div class="form_row_r_1">Retenci&oacute;n IRPF ({$invoice->profile->retention}) &#37;:</div> 
			<div class="form_row_r_2">{$retention_total|number_format:2:',':'.'} {if $invoice->profile->currency == 'Peso Argentino'}&#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}&#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}&#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}&#36;{elseif $invoice->profile->currency == 'Dolar'}&#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}Q{elseif $invoice->profile->currency == 'Lempira'}L{elseif $invoice->profile->currency == 'Peso Mexicano'}&#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}&#36;{elseif $invoice->profile->currency == 'Bolivar'}Bs.{else}&#128;{/if}</div> 
		{/if}
		</div>
	</div>
	<div class="bottom_row" id="form_name_">
	{if $invoice->profile->discount > 0}{assign var='current_tot' value=$current_base + $total_iva_1 + $total_iva_2 - $retention_total}
			<label>Total Factura:</label>
			<div class="form_row_r_3">{$current_tot|number_format:2:',':'.'} {if $invoice->profile->currency == 'Peso Argentino'}ARS &#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}CLP &#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}COP &#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}DOP &#36;{elseif $invoice->profile->currency == 'Dolar'}USD &#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}QTD Q{elseif $invoice->profile->currency == 'Lempira'}HNL L{elseif $invoice->profile->currency == 'Peso Mexicano'}MXN &#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}PAB B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}PEN S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}UYU &#36;{elseif $invoice->profile->currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}</div> 
	{else}
    
			<label>Total Factura:</label>
			<div class="form_row_r_3">{$invoice->profile->total|number_format:2:',':'.'} {if $invoice->profile->currency == 'Peso Argentino'}ARS &#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}CLP &#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}COP &#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}DOP &#36;{elseif $invoice->profile->currency == 'Dolar'}USD &#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}QTD Q{elseif $invoice->profile->currency == 'Lempira'}HNL L{elseif $invoice->profile->currency == 'Peso Mexicano'}MXN &#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}PAB B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}PEN S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}UYU &#36;{elseif $invoice->profile->currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}</div> 
    {/if}
     </div>{if $invoice->profile->terms || $invoice->profile->recc}
    <div class="conditions_row" id="form_name_">
			<label for="form_invoice_company_">Condiciones:</label>
			<span>{$invoice->profile->terms}{if $invoice->profile->recc} &bull; Factura en R&eacute;gimen Especial de Criterio de Caja.{/if}</span>
    </div>{/if}
    {if $invoice->profile->notes}
    <div class="conditions_row" id="form_name_">
			<label for="form_invoice_company_">Notas Personales:</label>
			<span>{$invoice->profile->notes}</span>
    </div>
    {/if}
	{if $cashes}
    <div class="conditions_row" id="form_name_">
    			<label for="form_invoice_client">Cobros Realizados: </label>
        		{foreach from=$cashes item=invoice2}<span>
        			Fecha: {$invoice2->profile->datepay}
				Total: {$invoice2->profile->amountpay|number_format:2:',':'.'} {if $invoice->profile->currency == 'Peso Argentino'}ARS &#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}CLP &#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}COP &#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}DOP &#36;{elseif $invoice->profile->currency == 'Dolar'}USD &#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}QTD Q{elseif $invoice->profile->currency == 'Lempira'}HNL L{elseif $invoice->profile->currency == 'Peso Mexicano'}MXN &#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}PAB B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}PEN S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}UYU &#36;{elseif $invoice->profile->currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}
				{if $invoice2->profile->referencepay} Referencia: {$invoice2->profile->referencepay}{/if}
				{if $invoice2->profile->detailpay} Detalle: {$invoice2->profile->detailpay}{/if}
			</span>{/foreach}
	</div>
	{/if} 

{include file='footer.tpl'}