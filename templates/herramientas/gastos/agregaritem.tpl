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
<script type="text/javascript" src="/js/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="/js/autoNumeric.js"></script>
</head>
<body id="popup">
<form method="post" id="expense_id" action="{geturl action='agregaritem'}?id={$fp->item->getId()}">

    {if $fp->hasError()}
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    {/if}

    <div class="row" id="form_code_item_container_">
        <label for="form_code_item_">C&oacute;digo:</label>
        <input type="text" id="form_code_item" name="code" value="{$smarty.post.code}" placeholder="Ej: 123"/>
        {include file="lib/error.tpl" error=$fp->getError('code')}
     </div>
    
	<div class="row" id="form_item_detail_container">
    		<label for="form_item_detail_">Nombre <strong>&#x28;&#x2A;&#x29;</strong>:</label>
    		<textarea id="form_item_detail" name="detail" rows="10" cols="50" placeholder="Ej: Servicio de Internet">{$smarty.post.detail}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('detail')}
    		
        		{literal}
        		<script type="text/javascript"> 	
			jQuery(window).load(function(){
			var texto = "";
  			var products = [
    			{/literal}{assign var='i' value=0}{foreach from=$productslist3 item=product}{literal}{ value: '{/literal}{$name_[$i]}{literal}', name: '{/literal}{$product_[$i]}{literal}', price: '{/literal}{$price_[$i]}{literal}', unit: '{/literal}{$unit_[$i]}{literal}', iva: '{/literal}{$iva_[$i]}{literal}', iva2: '{/literal}{$iva2_[$i]}{literal}', iva_name: '{/literal}{$iva2_name_[$i]}{literal}', currency: '{/literal}{$currency_[$i]}{literal}', data: '{/literal}{$data_[$i]}{literal}'},{/literal}{assign var='i' value=$i+1}{/foreach}{foreach from=$productslist2 item=product}{literal}{ value: '{/literal}{$name_[$i]}{literal}', name: '{/literal}{$product_[$i]}{literal}', price: '{/literal}{$price_[$i]}{literal}', unit: '{/literal}{$unit_[$i]}{literal}', iva: '{/literal}{$iva_[$i]}{literal}', iva2: '{/literal}{$iva2_[$i]}{literal}', iva_name: '{/literal}{$iva2_name_[$i]}{literal}', currency: '{/literal}{$currency_[$i]}{literal}', data: '{/literal}{$data_[$i]}{literal}'},{/literal}{assign var='i' value=$i+1}{/foreach}{foreach from=$productslist item=product}{literal}{ value: '{/literal}{$name_[$i]}{literal}', name: '{/literal}{$product_[$i]}{literal}', price: '{/literal}{$price_[$i]}{literal}', unit: '{/literal}{$unit_[$i]}{literal}', iva: '{/literal}{$iva_[$i]}{literal}', iva2: '{/literal}{$iva2_[$i]}{literal}', iva_name: '{/literal}{$iva2_name_[$i]}{literal}', currency: '{/literal}{$currency_[$i]}{literal}', data: '{/literal}{$data_[$i]}{literal}'},{/literal}{assign var='i' value=$i+1}{/foreach}{literal}
  			];
  
  					// setup autocomplete function pulling from products[] array
  						jQuery('#form_item_detail').autocomplete({
    						lookup: products,
    						onSelect: function (suggestion) {
    						if (suggestion.value && suggestion.data){
    							jQuery('#form_code_item').val(suggestion.name);
      						jQuery('#form_product_id').val(suggestion.data);
      						jQuery('#form_item_detail').val(suggestion.value);
      						jQuery('#form_unit_cost').val(suggestion.price);
      						jQuery('#form_product_unit').val(suggestion.unit);
      						jQuery('#form_iva').val(suggestion.iva);
      						jQuery('#form_iva2').val(suggestion.iva2);
      						jQuery('#form_iva2_name').val(suggestion.iva_name);
      						jQuery('#form_currency').val(suggestion.currency);
      						if (suggestion.currency == 'Peso Argentino') {
      							var texto = '&#36;';
      						}
      						else if (suggestion.currency == 'Peso Boliviano') {
      							var texto = 'b&#36';
      						}
      						else if (suggestion.currency == 'Peso Chileno') {
      							var texto = '&#36;';
      						}
      						else if (suggestion.currency == 'Peso Colombiano') {
      							var texto = '&#36;';
      						}
      						else if (suggestion.currency == 'Colon') {
      							var texto = '&#162;';
      						}
      						else if (suggestion.currency == 'Peso Dominicano') {
      							var texto = '&#36;';
      						}
      						else if (suggestion.currency == 'Dolar') {
      							var texto = '&#36;';
      						}
      						else if (suggestion.currency == 'Euro') {
      							var texto = '&#128;';
      						}
      						else if (suggestion.currency == 'Quetzal') {
      							var texto = 'Q';
      						}
      						else if (suggestion.currency == 'Lempira') {
      							var texto = 'L';
      						}
      						else if (suggestion.currency == 'Peso Mexicano') {
      							var texto = '&#36;';
      						}
      						else if (suggestion.currency == 'Cordoba') {
      							var texto = 'C&#36;';
      						}
      						else if (suggestion.currency == 'Balboa') {
      							var texto = 'B/.';
      						}
      						else if (suggestion.currency == 'Guarani') {
      							var texto = '&#8370;';
      						}
      						else if (suggestion.currency == 'Nuevo Sol') {
      							var texto = 'S/.';
      						}
      						else if (suggestion.currency == 'Libra') {
      							var texto = '&#163;';
      						}
      						else if (suggestion.currency == 'Peso Uruguayo') {
      							var texto = '&#36;';
      						}
      						else if (suggestion.currency == 'Bolivar') {
      							var texto = 'Bs.';
      						}
      						else {
      							var texto = '&#128;';
      						}
      						var thehtml3 = '(' + texto + ')';
      						jQuery('#outputcontent3').html(thehtml3);
      					} 
    					}
  				});
			});
        		</script>
        		{/literal}
    		
    	</div>
    	
    <div class="row" id="form_product_unit_container">
    	<label for="form_product_unit">Unidad del item:</label>
        <select id="form_product_unit" name="product_unit"/>
       		<option value="" {if $smarty.post.product_unit == ''} selected="selected" {/if}>Seleccione...</option>
			<option value="unidad" {if $smarty.post.product_unit == 'unidad'} selected="selected" {/if}>Unidad(es) (1)</option>
			<option value="decena" {if $smarty.post.product_unit == 'decena'} selected="selected" {/if}>Decena(s) (10)</option>
        		<option value="docena" {if $smarty.post.product_unit == 'docuena'} selected="selected" {/if}>Docena(s) (12)</option>
        		<option value="centena" {if $smarty.post.product_unit == 'centena'} selected="selected" {/if}>Centena(s) (100)</option>
        		<option value="metro" {if $smarty.post.product_unit == 'metro'} selected="selected" {/if}>Metro(s) (m)</option>
        		<option value="litro" {if $smarty.post.product_unit == 'litro'} selected="selected" {/if}>Litro(s) (l)</option>
        		<option value="kilo" {if $smarty.post.product_unit == 'kilo'} selected="selected" {/if}>Kilo(s) (kg)</option>
		</select>
        {include file="lib/error.tpl" error=$fp->getError('product_unit')}
    </div>
    
    {* <div class="row" id="form_product_currency_container">
    	<label for="form_product_currency">Moneda utilizada:</label>
        <select id="form_currency" name="currency"/>
       		<option value="" {if $default_currency == ''} selected="selected" {/if}>Seleccione...</option>
			<option value="Peso Argentino" {if $default_currency == 'Peso Argentino'} selected="selected" {/if}>&#36; Peso Argentino</option>
        		<option value="Peso Boliviano" {if $default_currency == 'Peso Boliviano'} selected="selected" {/if}>b&#36; Peso Boliviano</option>
        		<option value="Peso Chileno" {if $default_currency == 'Peso Chileno'} selected="selected" {/if}>&#36; Peso Chileno</option>
        		<option value="Peso Colombiano" {if $default_currency == 'Peso Colombiano'} selected="selected" {/if}>&#36; Peso Colombiano</option>
        		<option value="Colon" {if $default_currency == 'Colon'} selected="selected" {/if}>&#162; Col&oacute;n</option>
        		<option value="Peso Dominicano" {if $default_currency == 'Peso Dominicano'} selected="selected" {/if}>&#36; Peso Dominicano</option>
        		<option value="Dolar" {if $default_currency == 'Dolar'} selected="selected" {/if}>US&#36; Dolar</option>
        		<option value="Euro" {if $default_currency == 'Euro'} selected="selected" {/if}>&#128; Euro</option>
        		<option value="Quetzal" {if $default_currency == 'Quetzal'} selected="selected" {/if}>Q Quetzal</option>
        		<option value="Lempira" {if $default_currency == 'Lempira'} selected="selected" {/if}>L Lempira</option>
        		<option value="Peso Mexicano" {if $default_currency == 'Peso Mexicano'} selected="selected" {/if}>&#36; Peso Mexicano</option>
			<option value="Cordoba" {if $default_currency == 'Cordoba'} selected="selected" {/if}>C&#36; C&oacute;rdoba</option>		
        		<option value="Balboa" {if $default_currency == 'Balboa'} selected="selected" {/if}>B/. Balboa</option>
        		<option value="Guarani" {if $default_currency == 'Guarani'} selected="selected" {/if}>&#8370; Guaran&iacute;</option>
        		<option value="Nuevo Sol" {if $default_currency == 'Nuevo Sol'} selected="selected" {/if}>S/. Nuevo Sol</option>
        		<option value="Libra" {if $default_currency == 'Libra'} selected="selected" {/if}>&#163; Libra Esterlina</option>
        		<option value="Peso Uruguayo" {if $default_currency == 'Peso Uruguayo'} selected="selected" {/if}>&#36; Peso Uruguayo</option>
        		<option value="Bolivar" {if $default_currency == 'Bolivar'} selected="selected" {/if}>Bs. Bol&iacute;var</option>  
		</select>
        {include file="lib/error.tpl" error=$fp->getError('currency')}
    </div>  *}
    
    <input type="hidden" id="form_currency" name="currency" value="{$default_currency}">
    	
    <div class="row" id="form_quantity_container"> 
        <label for="form_quantity_">Cantidad <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_quantity" name="quantity" value="{$smarty.post.quantity}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Cantidad"/>
        {include file="lib/error.tpl" error=$fp->getError('quantity')}
    </div>
    
    <div class="row" id="form_unit_cost_container"> 
        <label for="form_unit_cost_">Costo Unitario sin Impuestos <span id="outputcontent3">{if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} <strong>&#x28;&#x2A;&#x29;</strong>:</span></label>
        <input type="text" id="form_unit_cost" name="unit_cost" value="{$smarty.post.unit_cost}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Costo Unitario sin Impuestos"/>
        {include file="lib/error.tpl" error=$fp->getError('unit_cost')}
    </div>
    
    <div class="row" id="form_iva_container"> 
        <label for="form_iva_">I.V.A. &#x25; <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_iva" name="iva" value="{if $smarty.post.iva}{$smarty.post.iva}{else}{$default_iva}{/if}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Escribe 21 para el 21&#x25; de impuesto"/>
        {include file="lib/error.tpl" error=$fp->getError('iva')}
    </div>
    
    <div class="row" id="form_iva2_name_container"> 
        <label for="form_iva2_name_">Otros Impuestos (Nombre):</label>
        <input type="text" id="form_iva2_name" name="iva2_name" value="{if $smarty.post.iva2_name}{$smarty.post.iva2_name}{else}{$default_iva2_name}{/if}" placeholder="Ej: Impuesto al lujo"/>
        {include file="lib/error.tpl" error=$fp->getError('iva2_name')}
    </div>
    
    <div class="row" id="form_iva2_container"> 
        <label for="form_iva2_">Otros Impuestos (&#x25;):</label>
        <input type="text" id="form_iva2" name="iva2" value="{if $smarty.post.iva2}{$smarty.post.iva2}{else}{$default_iva2}{/if}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Escribe 2 para el 2&#x25; de impuesto"/>
        {include file="lib/error.tpl" error=$fp->getError('iva2')}
    </div>

	<input type="hidden" id="form_document_type" name="document_type" value="{if $smarty.post.document_type}{$smarty.post.document_type}{else}{$smarty.get.document_type}{/if}">
    <input type="hidden" id="form_document_id" name="document_id" value="{if $smarty.post.document_id}{$smarty.post.document_id}{else}{$smarty.get.document_id}{/if}">
    <input type="hidden" id="form_product_id" name="product_id" value="{$smarty.post.product_id}">

    {literal}
    <script type="text/javascript"> 		
        		jQuery(window).load(function()  {
       				jQuery('#form_quantity').autoNumeric("init");
      				jQuery('#form_unit_cost').autoNumeric("init");
      				jQuery('#form_iva').autoNumeric("init");
      				jQuery('#form_iva2').autoNumeric("init");
      				
					jQuery("#form_item_detail").on("input", function() {
    						jQuery('#form_product_id').val('');
					});	
      		});
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