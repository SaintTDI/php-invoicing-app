<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
{if $authenticated}<link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" />{else}<link rel="stylesheet" href="/css/outside.css" type="text/css" media="all" />{/if}
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
<title>WebProAdmin - Index</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="/css/jquery-ui.css" type="text/css" media="all" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/malsup.js"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
<script type="text/javascript" src="/js/autoNumeric.js"></script>
</head>
<body id="popup">
<form method="post" id="expense_id" action="{geturl action='pagogasto'}?id={$fp->expense->getId()}" onsubmit="onSubmitForm()">

    {if $fp->hasError()}
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    {/if}
    
    <div class="form_row_r" id="form_expense_">
        		<span>Vencimiento: {$valid_until}</span>
        		<span>N&ordm; Gasto: {$expense->expense_number}</span>
        		<span>Emisi&oacute;n: {$expense->profile->expense_date}</span>
			<label for="form_expense_client">&nbsp;</label>
			{foreach from=$client item=client_}{if $client_->profile->thecompany != ""}
			<span>Proveedor: {$client_->profile->thecompany}</span>
			{/if}{/foreach}
			<label>Total: {$expense->profile->total|number_format:2:',':'.'} {if $expense->profile->currency == 'Peso Argentino'}ARS &#36;{elseif $expense->profile->currency == 'Peso Boliviano'}b&#36{elseif $expense->profile->currency == 'Peso Chileno'}CLP &#36;{elseif $expense->profile->currency == 'Peso Colombiano'}COP &#36;{elseif $expense->profile->currency == 'Colon'}&#162;{elseif $expense->profile->currency == 'Peso Dominicano'}DOP &#36;{elseif $expense->profile->currency == 'Dolar'}USD &#36;{elseif $expense->profile->currency == 'Euro'}&#128;{elseif $expense->profile->currency == 'Quetzal'}QTD Q{elseif $expense->profile->currency == 'Lempira'}HNL L{elseif $expense->profile->currency == 'Peso Mexicano'}MXN &#36;{elseif $expense->profile->currency == 'Cordoba'}C&#36;{elseif $expense->profile->currency == 'Balboa'}PAB B/.{elseif $expense->profile->currency == 'Guarani'}&#8370;{elseif $expense->profile->currency == 'Nuevo Sol'}PEN S/.{elseif $expense->profile->currency == 'Libra'}&#163;{elseif $expense->profile->currency == 'Peso Uruguayo'}UYU &#36;{elseif $expense->profile->currency == 'Bolivar'}VEF Bs.{else}&#128;{/if}</label>
	    </div>
	</div>

    <div class="row" id="form_datepay_expense_container_">
        <label for="form_datepay_expense_">Fecha <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_datepay" name="datepay" value="{if $smarty.post.datepay}{$smarty.post.datepay}{else}{$ts_date}{/if}" placeholder="Ej: 30/12/2015"/>
        {include file="lib/error.tpl" error=$fp->getError('datepay')}
     </div>
     
    <div class="row" id="form_waypay_">
    	<label for="form_waypay__">Forma de Pago:</label>
        <select class="_waypay" id="form_waypay" name="waypay">
			<option value="Efectivo" {if $smarty.post.waypay == 'Efectivo'} selected="selected" {/if}>Efectivo</option>
			<option value="Cheque" {if $smarty.post.waypay == 'Cheque'} selected="selected" {/if}>Cheque</option>
			<option value="Transferencia" {if $smarty.post.waypay == 'Transferencia'} selected="selected" {/if}>Transferencia/Dep&oacute;sito</option>
			<option value="Nota de Crédito" {if $smarty.post.waypay == 'Nota de Crédito'} selected="selected" {/if}>Nota de Cr&eacute;dito</option>
		</select>
        {* include file="lib/error.tpl" error=$fp->getError('waypay') *}
    </div>
    
    <div class="row" id="form_referencepay_container"> 
        <label for="form_referencepay_">Referencia:</label>
        <input type="text" id="form_referencepay" name="referencepay" value="{$smarty.post.referencepay}" placeholder="Ej: Factura 282"/>
        {include file="lib/error.tpl" error=$fp->getError('referencepay')}
    </div>
    
    <div class="row" id="form_amountpay_container"> 
        <label for="form_amountpay_">Importe {if $expense->profile->currency == 'Peso Argentino'}ARS &#36;{elseif $expense->profile->currency == 'Peso Boliviano'}b&#36{elseif $expense->profile->currency == 'Peso Chileno'}CLP &#36;{elseif $expense->profile->currency == 'Peso Colombiano'}COP &#36;{elseif $expense->profile->currency == 'Colon'}&#162;{elseif $expense->profile->currency == 'Peso Dominicano'}DOP &#36;{elseif $expense->profile->currency == 'Dolar'}USD &#36;{elseif $expense->profile->currency == 'Euro'}&#128;{elseif $expense->profile->currency == 'Quetzal'}QTD Q{elseif $expense->profile->currency == 'Lempira'}HNL L{elseif $expense->profile->currency == 'Peso Mexicano'}MXN &#36;{elseif $expense->profile->currency == 'Cordoba'}C&#36;{elseif $expense->profile->currency == 'Balboa'}PAB B/.{elseif $expense->profile->currency == 'Guarani'}&#8370;{elseif $expense->profile->currency == 'Nuevo Sol'}PEN S/.{elseif $expense->profile->currency == 'Libra'}&#163;{elseif $expense->profile->currency == 'Peso Uruguayo'}UYU &#36;{elseif $expense->profile->currency == 'Bolivar'}VEF Bs.{else}&#128;{/if} <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_amountpay" name="amountpay" value="{$smarty.post.amountpay}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Importe a pagar"/>
        {include file="lib/error.tpl" error=$fp->getError('amountpay')}
    </div>
    
	<div class="row" id="form_expense_detailpay_container">
    		<label for="form_expense_detailpay_">Detalle:</label>
    		<textarea id="form_expense_detailpay" name="detailpay" rows="10" cols="50" placeholder="Ej: Dep&oacute;sito en cuenta XXX-8282">{$smarty.post.detailpay}</textarea>
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
        				alert("El importe a pagar no puede ser igual a cero");
            			return false;
            			
        			}
			}
     </script>
     {/literal}

	<div class="row">
    		<button class="submit" type="submit" name="add" id="add" value="add">Guardar</button> 
	</div>
	
	<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
    	</div>


	</form>         
    </body>
</html>