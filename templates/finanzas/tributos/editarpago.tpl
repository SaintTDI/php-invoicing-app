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
<form id="pagoiva_id" method="post" action="{geturl action='editarpago'}?id={$fp->iva->getId()}">

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
		 <label for="form_total_invoices"><h3>Editar Registro de declaraci&oacute;n de IVA:</h3></label>
	</div>
    
    <div class="form_row_trib" id="form_iva_">
        		<span>IVA declarado: {$fp->referencepay}</span>
			<label>Total: {$fp->amountpay|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}ARS &#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}CLP &#36;{elseif $default_currency == 'Peso Colombiano'}COP &#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}DOP &#36;{elseif $default_currency == 'Dolar'}USD &#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}QTD Q{elseif $default_currency == 'Lempira'}HNL L{elseif $default_currency == 'Peso Mexicano'}MXN &#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}PAB B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}PEN S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}UYU &#36;{elseif $default_currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}</label>
	</div>
	
    <input type="hidden" id="form_invoices" name="invoice_ids" value="{$fp->invoice_ids}" />
    <input type="hidden" id="form_expenses" name="expense_ids" value="{$fp->expense_ids}" />
    <input type="hidden" id="form_amountpay" name="amountpay" value="{$fp->amountpay}" />

    <div class="row" id="form_datepay_invoice_container_">
        <label for="form_datepay_invoice_">Fecha <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_datepay" name="datepay" value="{$fp->datepay}" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
        {include file="lib/error.tpl" error=$fp->getError('datepay')}
     </div>

    <div class="row" id="form_referencepay_container"> 
        <label for="form_referencepay_">Referencia <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_referencepay" name="referencepay" value="{$fp->referencepay}" placeholder="Ej: Trimestre 1 - 2015"/>
        {include file="lib/error.tpl" error=$fp->getError('referencepay')}
    </div>
    
    <div class="row" id="form_amountpay_container"> 
        <label for="form_amountpay_">Total {if $default_currency == 'Peso Argentino'}ARS &#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}CLP &#36;{elseif $default_currency == 'Peso Colombiano'}COP &#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}DOP &#36;{elseif $default_currency == 'Dolar'}USD &#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}QTD Q{elseif $default_currency == 'Lempira'}HNL L{elseif $default_currency == 'Peso Mexicano'}MXN &#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}PAB B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}PEN S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}UYU &#36;{elseif $default_currency == 'Bolivar'}VEF Bs.{else}&#128;{/if} <strong>&#x28;&#x2A;&#x29;</strong>:</label>{assign var='totalpay' scope=global value=$invoice->profile->total - $amountpay}
        <input type="text" disabled="disabled" id="form_amountpay_" name="amountpay_" value="{$fp->amountpay}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Importe Total"/>
        {include file="lib/error.tpl" error=$fp->getError('amountpay')}
    </div>
    
	<div class="row" id="form_invoice_detailpay_container">
    		<label for="form_invoice_detailpay_">Detalle:</label>
    		<textarea id="form_invoice_detailpay" name="detailpay" rows="10" cols="50" placeholder="Ej: Debitado de cuenta XXX-8282">{$fp->detailpay}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('detailpay')}
    	</div>
    	
    {literal}
    <script type="text/javascript">
        		jQuery(window).load(function()  {
       				jQuery('#form_amountpay_').autoNumeric("init");
      		});
     </script>
     {/literal}

	<div class="row">
    		<button class="submit" type="submit" name="editar" id="editar" value="editar" >Agregar</button> 
	</div>
	
	<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
    	</div>

	</form>
	
	{if $iva->getId()}
    <div class="form_row_trib" id="form_invoice_">
        		<span>Pagos de IVA Realizados</span>
				<form method="post" action="{geturl action='editarpago'}?id={$fp->iva->getId()}">
        			<label for="form_datepay_invoice_">Fecha: {$iva->profile->datepay}</label>
				<label>Importe: {$iva->profile->amountpay|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}ARS &#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}CLP &#36;{elseif $default_currency == 'Peso Colombiano'}COP &#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}DOP &#36;{elseif $default_currency == 'Dolar'}USD &#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}QTD Q{elseif $default_currency == 'Lempira'}HNL L{elseif $default_currency == 'Peso Mexicano'}MXN &#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}PAB B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}PEN S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}UYU &#36;{elseif $default_currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}</label>
				{if $iva->profile->referencepay}<label for="form_datepay_invoice_">Referencia: {$iva->profile->referencepay}</label>{/if}
				{if $iva->profile->detailpay}<label for="form_datepay_invoice_">Detalle: {$iva->profile->detailpay}</label>{/if}
				<button class="submit3" type="submit" id="delete" name="delete" value="delete"/>X</button></li><input type="hidden" name="iva_id"  value="{$iva->getId()}" />
				</form>
	</div>
	{/if}       
    </body>
</html>