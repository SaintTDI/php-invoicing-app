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
<form method="post" id="prof_id" action="{geturl action='agregaritem'}?id={$fp->item->getId()}">

    {if $fp->hasError()}
        <div class="error">
             Por favor revisa los campos resaltados.
        </div>
    {/if}

    <div class="row" id="form_code_item_container_">
        <label for="form_code_item_">C&oacute;digo <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_code_item" name="code" value="{$smarty.post.code}" placeholder="Ej: 123"/>
        {include file="lib/error.tpl" error=$fp->getError('code')}
        
        		{literal}
        		<script type="text/javascript"> 	
			jQuery(window).load(function(){
			var texto = "";
  			var products = [
    			{/literal}{assign var='i' value=0}{foreach from=$productslist item=product}{literal}{ value: '{/literal}{$product_[$i]}{literal}', name: '{/literal}{$name_[$i]}{literal}', price: '{/literal}{$price_[$i]}{literal}', unit: '{/literal}{$unit_[$i]}{literal}', iva: '{/literal}{$iva_[$i]}{literal}', iva2: '{/literal}{$iva2_[$i]}{literal}', iva_name: '{/literal}{$iva2_name_[$i]}{literal}', currency: '{/literal}{$currency_[$i]}{literal}', data: '{/literal}{$data_[$i]}{literal}'},{/literal}{assign var='i' value=$i+1}{/foreach}{literal}
  			];
  
  					// setup autocomplete function pulling from products[] array
  						jQuery('#form_code_item').autocomplete({
    						lookup: products,
    						onSelect: function (suggestion) {
    						if (suggestion.value && suggestion.data){
    							jQuery('#form_code_item').val(suggestion.value);
      						jQuery('#form_product_id').val(suggestion.data);
      						jQuery('#form_item_detail').val(suggestion.name);
      						jQuery('#form_unit_price').val(suggestion.price);
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
    
	<div class="row" id="form_item_detail_container">
    		<label for="form_item_detail_">Nombre <strong>&#x28;&#x2A;&#x29;</strong>:</label>
    		<textarea id="form_item_detail" name="detail" rows="10" cols="50" placeholder="Ej: Servicio de Internet">{$smarty.post.detail}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('detail')}
    	</div>
    	
    <div class="row" id="form_quantity_container"> 
        <label for="form_quantity_">Cantidad <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_quantity" name="quantity" value="{$smarty.post.quantity}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Cantidad"/>
        {include file="lib/error.tpl" error=$fp->getError('quantity')}
    </div>
    
    <div class="row" id="form_unit_price_container"> 
        <label for="form_unit_price_">Precio Unitario sin Impuestos <span id="outputcontent3">{if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if} <strong>&#x28;&#x2A;&#x29;</strong>:</span></label>
        <input type="text" id="form_unit_price" name="unit_price" value="{$smarty.post.unit_price}" data-a-dec="," data-a-sep="." data-v-min="-999999999.99" placeholder="Precio Unitario sin Impuestos"/>
        {include file="lib/error.tpl" error=$fp->getError('unit_price')}
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
    <input type="hidden" id="form_currency" name="currency" value="{if $smarty.post.currency}{$smarty.post.currency}{else}{$default_currency}{/if}">

    {literal}
    <script type="text/javascript"> 		
        		jQuery(window).load(function()  {
       				jQuery('#form_quantity').autoNumeric("init");
      				jQuery('#form_unit_price').autoNumeric("init");
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