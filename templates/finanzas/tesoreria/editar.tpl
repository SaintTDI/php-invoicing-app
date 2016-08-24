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
<form method="post" id="agregar_tes_id" action="{geturl action='editar'}?id={$fp->account->getId()}" onsubmit="return onSubmitForm()">

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

	 <div class="title" id="form_total_invoices">
		 <label for="form_total_invoices"><h3>Editar Registro de Ingreso o Egreso de Capital:</h3></label>
	</div>
    <div class="row" id="form_datepay_invoice_container_">
        <label for="form_datepay_invoice_">Fecha <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_datepay" name="datepay" value="{$fp->datepay}" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
        {include file="lib/error.tpl" error=$fp->getError('datepay')}
     </div>
     
    <div class="row" id="form_waypay_">
    	<label for="form_waypay__">Forma del Ingreso:</label>
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
        <input type="text" id="form_referencepay" name="referencepay" value="{$fp->referencepay}" placeholder="Ej: Aporte de Capital"/>
        {include file="lib/error.tpl" error=$fp->getError('referencepay')}
    </div>
    
    <div class="row" id="form_amountpay_container"> 
        <label for="form_amountpay_">Total {if $default_currency == 'Peso Argentino'}ARS &#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}CLP &#36;{elseif $default_currency == 'Peso Colombiano'}COP &#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}DOP &#36;{elseif $default_currency == 'Dolar'}USD &#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}QTD Q{elseif $default_currency == 'Lempira'}HNL L{elseif $default_currency == 'Peso Mexicano'}MXN &#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}PAB B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}PEN S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}UYU &#36;{elseif $default_currency == 'Bolivar'}VEF Bs.{else}&#128;{/if} <strong>&#x28;&#x2A;&#x29;</strong>:</label>{assign var='totalpay' scope=global value=$invoice->profile->total - $amountpay}
        <input type="text" id="form_amountpay" name="amountpay" value="{$fp->amountpay}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Importe Total"/>
        {include file="lib/error.tpl" error=$fp->getError('amountpay')}
    </div>
    
	<div class="row" id="form_invoice_detailpay_container">
    		<label for="form_invoice_detailpay_">Detalle:</label>
    		<textarea id="form_invoice_detailpay" name="detailpay" rows="10" cols="50" placeholder="Ej: Dep&oacute;sito en cuenta XXX-8282">{$fp->detailpay}</textarea>
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
        			    alert("El importe a aportes no puede ser igual a cero");
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
	
	{if $account->getId()}
    <div class="form_row_trib" id="form_invoice_">
    			<label for="form_invoice_client">&nbsp;</label>
        		<span>Aporte de Capital Realizados</span>
				<form method="post" action="{geturl action='editar'}?id={$fp->account->getId()}">
        			<label for="form_datepay_invoice_">Fecha: {$account->profile->datepay}</label>
				<label>Importe: {$account->profile->amountpay|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}ARS &#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}CLP &#36;{elseif $default_currency == 'Peso Colombiano'}COP &#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}DOP &#36;{elseif $default_currency == 'Dolar'}USD &#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}QTD Q{elseif $default_currency == 'Lempira'}HNL L{elseif $default_currency == 'Peso Mexicano'}MXN &#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}PAB B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}PEN S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}UYU &#36;{elseif $default_currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}</label>
				{if $account->profile->waypay}<label for="form_waypay_invoice_">Aporte v&iacute;a: {$account->profile->waypay}</label>{/if}
				{if $account->profile->referencepay}<label for="form_datepay_invoice_">Referencia: {$account->profile->referencepay}</label>{/if}
				{if $account->profile->detailpay}<label for="form_datepay_invoice_">Detalle: {$account->profile->detailpay}</label>{/if}
				<button class="submit3" type="submit" id="delete" name="delete" value="delete"/>X</button></li><input type="hidden" name="cash_id"  value="{$account->getId()}" />
				</form>
	</div>
	{/if}       
    </body>
</html>