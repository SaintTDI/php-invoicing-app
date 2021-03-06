<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
{if $authenticated}<link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" />{else}<link rel="stylesheet" href="/css/outside.css" type="text/css" media="all" />{/if}
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
<title>WebProAdmin</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="/css/jquery-ui.css" type="text/css" media="all" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/malsup.js"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
<script type="text/javascript" src="/js/autoNumeric.js"></script>
</head>
<body id="popup">
<form method="post" id="editarp_id" action="{geturl action='editarpago'}?id={$fp->invoice->getId()}" onsubmit="return onSubmitForm()">

	{if $smarty.get.command == 'cerrar'}
	    {literal}
	    <script type="text/javascript">
	        		jQuery(window).load(function()  {
				     	parent.jQuery.fancybox.close(); 
	      		});
	     </script>
	     {/literal}
     {/if}

    {if $fp->hasError()}
        		<div class="error">
            		Por favor revisa los campos resaltados.
        		</div>
    {else}
    		{if $smarty.get.submitted}
			 {literal}
			 <script type="text/javascript">
			  jQuery(window).load(function()  {
				parent.jQuery.fancybox.close(); 
			 });
			 </script>
			 {/literal}
        	{/if}
    {/if}
    
    {assign var='amountpay' scope=global value=0}
    {foreach from=$cashes item=invoice3}
    {assign var='amountpay' scope=global value=$amountpay + $invoice3->profile->amountpay}
    {/foreach}
    
    <div class="form_row_r" id="form_invoice_">
        		<span>Vencimiento: {$valid_until}</span>
        		<span>N&ordm; Factura: {$invoice->profile->start_letter} - {$invoice->profile->number_zero}{$invoice->invoice_number}</span>
        		<span>Emisi&oacute;n: {$invoice->profile->invoice_date}</span>
			<label for="form_invoice_client">&nbsp;</label>
			{foreach from=$client item=client_}{if $client_->profile->thecompany != ""}
			<span>Cliente: {$client_->profile->thecompany}</span>
			{/if}{/foreach}
			<label>Total: {$invoice->profile->total|number_format:2:',':'.'} {if $invoice->profile->currency == 'Peso Argentino'}ARS &#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}CLP &#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}COP &#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}DOP &#36;{elseif $invoice->profile->currency == 'Dolar'}USD &#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}QTD Q{elseif $invoice->profile->currency == 'Lempira'}HNL L{elseif $invoice->profile->currency == 'Peso Mexicano'}MXN &#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}PAB B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}PEN S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}UYU &#36;{elseif $invoice->profile->currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}</label>
	    </div>
	</div>

    <div class="row" id="form_datepay_invoice_container_">
        <label for="form_datepay_invoice_">Fecha <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_datepay" name="datepay" value="{$ts_date}" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
        {include file="lib/error.tpl" error=$fp->getError('datepay')}
     </div>
     
    <div class="row" id="form_waypay_">
    	<label for="form_waypay__">Forma de Cobro:</label>
        <select class="_waypay" id="form_waypay" name="waypay" >
			<option value="Efectivo" {if $fp->waypay == 'Efectivo'} selected="selected" {/if}>Efectivo</option>
			<option value="Cheque" {if $fp->waypay == 'Cheque'} selected="selected" {/if}>Cheque</option>
			<option value="Transferencia" {if $fp->waypay == 'Transferencia'} selected="selected" {/if}>Transferencia/Dep&oacute;sito</option>
			<option value="Nota de Crédito" {if $fp->waypay == 'Nota de Crédito'} selected="selected" {/if}>Nota de Cr&eacute;dito</option>
		</select>
        {* include file="lib/error.tpl" error=$fp->getError('waypay') *}
    </div>
    
    <div class="row" id="form_referencepay_container"> 
        <label for="form_referencepay_">Referencia:</label>
        <input type="text" id="form_referencepay" name="referencepay" value="" placeholder="Ej: Factura 282"/>
        {include file="lib/error.tpl" error=$fp->getError('referencepay')}
    </div>
    
    <div class="row" id="form_amountpay_container"> 
        <label for="form_amountpay_">Importe {if $invoice->profile->currency == 'Peso Argentino'}ARS &#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}CLP &#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}COP &#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}DOP &#36;{elseif $invoice->profile->currency == 'Dolar'}USD &#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}QTD Q{elseif $invoice->profile->currency == 'Lempira'}HNL L{elseif $invoice->profile->currency == 'Peso Mexicano'}MXN &#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}PAB B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}PEN S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}UYU &#36;{elseif $invoice->profile->currency == 'Bolivar'}VEF Bs.{else}&#128;{/if} <strong>&#x28;&#x2A;&#x29;</strong>:</label>{assign var='totalpay' scope=global value=$invoice->profile->total - $amountpay}
        <input type="text" id="form_amountpay" name="amountpay" value="{$totalpay}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Importe a cobrar"/>
        {include file="lib/error.tpl" error=$fp->getError('amountpay')}
    </div>
    
	<div class="row" id="form_invoice_detailpay_container">
    		<label for="form_invoice_detailpay_">Detalle:</label>
    		<textarea id="form_invoice_detailpay" name="detailpay" rows="10" cols="50" placeholder="Ej: Dep&oacute;sito en cuenta XXX-8282"></textarea>
    		{include file="lib/error.tpl" error=$fp->getError('detailpay')}
    	</div>
    	
    {literal}
    <script type="text/javascript">
        		jQuery(window).load(function()  {
       				jQuery('#form_amountpay').autoNumeric("init");
      		});
      		
      		function onSubmitForm() {
     			var r = jQuery('#form_amountpay').autoNumeric('get');
        			
        			if (r == 0) {
        				alert("El importe a cobrar no puede ser igual a cero");
            			return false;
            			
        			}
			}
     </script>
     {/literal}

	<div class="row">
    		<button class="submit" type="submit" name="editar" id="editar" value="editar" >Editar</button> 
	</div>

	<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
    	</div>
    	
	</form>
	
	{if $cashes}
    <div class="form_row_r" id="form_invoice_">
    			<label for="form_invoice_client">&nbsp;</label>
        		<span>Cobros Realizados</span>
			{foreach from=$cashes item=invoice2}
				<form method="post" id="editarp2_id" action="{geturl action='editarpago'}?id={$fp->invoice->getId()}">
        			<label for="form_datepay_invoice_">Fecha: {$invoice2->profile->datepay}</label>
				<label>Total: {$invoice2->profile->amountpay|number_format:2:',':'.'} {if $invoice->profile->currency == 'Peso Argentino'}ARS &#36;{elseif $invoice->profile->currency == 'Peso Boliviano'}b&#36{elseif $invoice->profile->currency == 'Peso Chileno'}CLP &#36;{elseif $invoice->profile->currency == 'Peso Colombiano'}COP &#36;{elseif $invoice->profile->currency == 'Colon'}&#162;{elseif $invoice->profile->currency == 'Peso Dominicano'}DOP &#36;{elseif $invoice->profile->currency == 'Dolar'}USD &#36;{elseif $invoice->profile->currency == 'Euro'}&#128;{elseif $invoice->profile->currency == 'Quetzal'}QTD Q{elseif $invoice->profile->currency == 'Lempira'}HNL L{elseif $invoice->profile->currency == 'Peso Mexicano'}MXN &#36;{elseif $invoice->profile->currency == 'Cordoba'}C&#36;{elseif $invoice->profile->currency == 'Balboa'}PAB B/.{elseif $invoice->profile->currency == 'Guarani'}&#8370;{elseif $invoice->profile->currency == 'Nuevo Sol'}PEN S/.{elseif $invoice->profile->currency == 'Libra'}&#163;{elseif $invoice->profile->currency == 'Peso Uruguayo'}UYU &#36;{elseif $invoice->profile->currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}</label>
				{if $invoice2->profile->waypay}<label for="form_waypay">Forma de Cobro: {$invoice2->profile->waypay}</label>{/if}
				{if $invoice2->profile->referencepay}<label for="form_datepay_invoice_">Referencia: {$invoice2->profile->referencepay}</label>{/if}
				{if $invoice2->profile->detailpay}<label for="form_datepay_invoice_">Detalle: {$invoice2->profile->detailpay}</label>{/if}
				<button type="submit3" type="submit" id="delete" name="delete" value="delete"/>X</button></li><input type="hidden" name="cash_id"  value="{$invoice2->getId()}" />
				</form>
				<br>
			{/foreach}
	    </div>
	</div>
	{/if}       
    </body>
</html>