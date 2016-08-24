{include file='header.tpl' section='cuenta' subsection='editarproducto'}

<div class="title" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Editar Producto/Servicio:</h3></label>
</div>

<form id="account_id" name="account" method="post" action="{geturl action='editarproducto'}?id={$fp->product->getId()}" enctype="multipart/form-data">

    {if $fp->hasError()}
        		<div class="error">
            		Por favor revisa los campos resaltados.
        		</div>
    {else}
    		{if $smarty.get.submitted}
        		<div class="success">
            		Tu informaci&oacute;n fue guardada con &eacute;xito.
        		</div>
        	{/if}
    {/if}
    
	<div class="form_box">
		<div class="form_left">
		    <div class="row" id="form_product_code_container">
		        <label for="form_product_code">C&oacute;digo <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <input type="text" id="form_prodt_code_" name="product_code" value="{if $fp->product_code}{$fp->product_code}{else}000001{/if}" placeholder="Ej: 123"/>
		        {include file="lib/error.tpl" error=$fp->getError('product_code')}
		    </div>
		</div>
		<div class="form_right">
		    <div class="row" id="form_product_name_container">
	        		<label for="form_product_name">Nombre <strong>&#x28;&#x2A;&#x29;</strong>:</label>
	        		<input type="text" id="form_product_name" name="product_name" value="{$fp->product_name}" placeholder="Nombre Producto o Servicio"/>
	        		{include file="lib/error.tpl" error=$fp->getError('product_name')}
	    		</div>
		</div>
	</div>
 
	<div class="row" id="form_product_description_container">
    		<label for="form_product_description">Descripci&oacute;n:</label>
    		<textarea class="big_textarea" id="form_product_description" name="product_description" rows="10" cols="50" placeholder="Descripci&oacute;n del Producto o Servicio">{$fp->product_description}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('product_description')}
    	</div>
    	
	<div class="form_box">
		<div class="form_left">
	    <div class="row" id="form_iva_container">
	        <label for="form_iva">R&eacute;gimen de IVA en &#37; <strong>&#x28;&#x2A;&#x29;</strong>:</label>
	        <input type="text" id="form_iva" name="iva" value="{$fp->iva}" data-a-dec="," data-a-sep="." placeholder="Escribe 21 para el 21&#x25; de impuesto (Venta)"/> 
	        {include file="lib/error.tpl" error=$fp->getError('iva')}
	    </div>
        {foreach from=$fp->productProfile key='key' item='label'}
        	<div class="row" id="form_{$key}_container">
                {if $label == 'Profile Picture'}
                		<label for="form_{$key}">Sube una Imagen:</label>
             		<input type="file" class="files" id="form_{$key}" name="{$key}" value="{$fp->$key}"/>
                    {include file="lib/error.tpl" error=$fp->getError($key)}
                	{/if}</div>
        {/foreach}
        	</div>
		<div class="form_right">
	    <div class="row" id="form_unit_price_container">
	        <label for="form_unit_cost">Precio Unitario sin Impuestos {if $fp->product_currency == 'Peso Argentino'}(&#36; ARS){elseif $fp->product_currency == 'Peso Boliviano'}(b&#36; BOB){elseif $fp->product_currency == 'Peso Chileno'}(&#36; CLP){elseif $fp->product_currency == 'Peso Colombiano'}(&#36; COP){elseif $fp->product_currency == 'Colon'}(&#162; CRC){elseif $fp->product_currency == 'Peso Dominicano'}(&#36; DOP){elseif $fp->product_currency == 'Dolar'}(&#36; USD){elseif $fp->product_currency == 'Euro'}(&#128; EUR){elseif $fp->product_currency == 'Quetzal'}(Q GTQ){elseif $fp->product_currency == 'Lempira'}(L HNL){elseif $fp->product_currency == 'Peso Mexicano'}(&#36; MXN){elseif $fp->product_currency == 'Cordoba'}(C&#36; NIO){elseif $fp->product_currency == 'Balboa'}(B/. PAB){elseif $fp->product_currency == 'Guarani'}(&#8370; PYG){elseif $fp->product_currency == 'Nuevo Sol'}(S/. PEN){elseif $fp->product_currency == 'Libra'}(&#163; GBP){elseif $fp->product_currency == 'Peso Uruguayo'}(&#36; UYU){elseif $fp->product_currency == 'Bolivar'}(Bs. VEF){else}(&#128; EUR){/if}:</label>
	        <input type="text" id="form_unit_price" name="unit_price" value="{$fp->unit_price}" data-a-dec="," data-a-sep="." placeholder="Precio Unitario (Venta)"/>
	        {include file="lib/error.tpl" error=$fp->getError('unit_price')}
	    </div>
        {foreach from=$fp->productProfile key='key' item='label'}
        	<div class="row" id="form_{$key}_container">
                {if $label == 'Picture Preview'}
                		<label for="form_{$key}">Imagen:</label>
                		{if $fp->$key != ''}
                				{assign var="url" value=$fp->$key}
                            	<img src="/profiles/tmp/product/pictures/{$url}" />
                        	{else}
                            	<img src="/profiles/tmp/product/pictures/profile.png" />
                        {/if}
                	{/if}</div>
        {/foreach}
	   </div>
	</div>
	    
	<div class="form_box">
		<div class="form_left"> 
		    <div class="row" id="form_iva2_name_container">
		        <label for="form_iva2_name">Impuesto Adic. (Nombre):</label>
		        <input type="text" id="form_iva2_name" name="iva2_name" value="{$fp->iva2_name}" placeholder="Ej: Impuesto al lujo"/>
		        {include file="lib/error.tpl" error=$fp->getError('iva2_name')}
		    </div>	
		    <div class="row" id="form_product_unit_container">
		    	<label for="form_product_unit">Unidad de facturaci&oacute;n <strong>&#x28;&#x2A;&#x29;</strong>:</label>
		        <select id="form_product_unit" name="product_unit"/>
		       		<option value="" {if $fp->product_unit == ''} selected="selected" {/if}>Seleccione...</option>
					<option value="unidad" {if $fp->product_unit == 'unidad'} selected="selected" {/if}>Unidad(es) (1)</option>
					<option value="decena" {if $fp->product_unit == 'decena'} selected="selected" {/if}>Decena(s) (10)</option>
		        		<option value="docena" {if $fp->product_unit == 'docena'} selected="selected" {/if}>Docena(s) (12)</option>
		        		<option value="centena" {if $fp->product_unit == 'centena'} selected="selected" {/if}>Centena(s) (100)</option>
		        		<option value="metro" {if $fp->product_unit == 'metro'} selected="selected" {/if}>Metro(s) (m)</option>
		        		<option value="litro" {if $fp->product_unit == 'litro'} selected="selected" {/if}>Litro(s) (l)</option>
		        		<option value="kilo" {if $fp->product_unit == 'kilo'} selected="selected" {/if}>Kilo(s) (kg)</option>
				</select>
		        {include file="lib/error.tpl" error=$fp->getError('product_unit')}
		    </div>

		</div>
		<div class="form_right">
	    <div class="row" id="form_iva2_container">
	        <label for="form_iva2">Impuesto Adicional (&#37;):</label>
	        <input type="text" id="form_iva2" name="iva2" value="{$fp->iva2}" data-a-dec="," data-a-sep="." placeholder="Escribe 2 para el 2&#x25; de impuesto (Venta)"/>
	        {include file="lib/error.tpl" error=$fp->getError('iva2')}
	    </div>
	
	 	<div class="row" id="form_company_container">
	        <label for="form_company">Proveedor(es):</label>
	        	    <input type="text" id="form_company" name="company" value="" placeholder="Empresa, sociedad o persona"/>
	        		<input type="hidden" id="form_company_id" name="company_id" value="" />
	        		<input type="hidden" id="form_address_id" name="address_id" value="" />
	        		<input type="hidden" id="form_doc_type" name="doc_type" value="ccompany" />
	        		<input type="hidden" id="form_comp_doc_type" name="comp_doc_type" value="product" />
	        		<input type="hidden" id="form_contact_id" name="contact_id" value="{$fp->product->getId()}" />
	            {* if $fp->company_id}<div id="outputbox"><p id="outputcontent"></p></div>{/if *}
	        
	        		{literal}
	        		<script type="text/javascript"> 		
	        		jQuery(document).ready(function() {
	      				var thehtml2 = '<span><a class="fancybox fancybox.iframe" href="{/literal}{geturl controller='compania' action='editarcompania'}?id={if $fp->company_id|is_array}{foreach from=$fp->company_id item=company}{assign var='id' value=$company->profile->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company name=foo}{if $data_[$b] == $id}{$data_[$b]}{assign var='b' value=$b+1}{break}{/if}{/foreach}{/foreach}{else}{assign var='id_' value=$fp->company_id}{assign var='c' value=0}{foreach from=$companieslist item=company}{if $data_[$c] == $id_}{$data_[$c]}{assign var='c' value=$c+1}{/if}{/foreach}{/if}&id2={if $fp->company_id|is_array}{foreach from=$fp->company_id item=company}{assign var='id' value=$company->profile->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company name=foo}{if $data_[$b] == $id}{$address_[$b]}{assign var='b' value=$b+1}{break}{/if}{/foreach}{/foreach}{else}{assign var='id_' value=$fp->company_id}{assign var='c' value=0}{foreach from=$companieslist item=company}{if $data_[$c] == $id_}{$address_[$c]}{assign var='c' value=$c+1}{/if}{/foreach}{/if}&doc_type=ccompany&doc_id={if $fp->company_id|is_array}{foreach from=$fp->company_id item=company}{assign var='id' value=$company->profile->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company name=foo}{if $data_[$b] == $id}{$data_[$b]}{assign var='b' value=$b+1}{break}{/if}{/foreach}{/foreach}{else}{assign var='id_' value=$fp->company_id}{assign var='c' value=0}{foreach from=$companieslist item=company}{if $data_[$c] == $id_}{$data_[$c]}{assign var='c' value=$c+1}{/if}{/foreach}{/if}
	">{if $fp->company_id|is_array}{foreach from=$fp->company_id item=company}{assign var='id' value=$company->profile->company_id}{assign var='b' value=0}{foreach from=$companieslist item=company name=foo}{if $data_[$b] == $id}{$company_[$b]}{assign var='b' value=$b+1}{break}{/if}{/foreach}{/foreach}{else}{assign var='id_' value=$fp->company_id}{assign var='c' value=0}{foreach from=$companieslist item=company}{if $data_[$c] == $id_}{$company_[$c]}{assign var='c' value=$c+1}{/if}{/foreach}{/if}</a></span>{literal}';
	      				jQuery('#outputcontent').html(thehtml2);
	      				jQuery('#form_unit_price').autoNumeric("init");
	      				jQuery('#form_iva').autoNumeric("init");
	      				jQuery('#form_iva2').autoNumeric("init");
	      				jQuery('#form_unit_cost').autoNumeric("init");
	      				jQuery('#form_iva_p').autoNumeric("init");
	      				jQuery('#form_iva_p2').autoNumeric("init");
	      		});
	        		</script>
	        		{/literal}
	{* if $fp->company_id}  		
	 {if $fp->company_id|@count > 0}
	   <table class="table_small">
	    <tr>
	      <td class="table_button"><button class="submit7" type="submit" name="delete3" id="delete3" value="delete">Borrar</button></td>
		  <td class="table_small_top">Nombre</td>
		  <td class="table_small_top">Industria</td>
		  <td class="table_small_top">Relaci&oacute;n</td>
		</tr>
		{if $fp->company_id|is_array}
	   	{foreach from=$fp->company_id item=company__}
	      {assign var='id' value=$company__}
	      {assign var='b' value=0}  
	        {foreach from=$companieslist item=company}
				{if $data_[$b] == $id}
					<tr>
						<td class="table_input"><input type="checkbox" name="company_id[]" value="{$data_[$b]}"></td>
						<td class="links"><span><a class="fancybox fancybox.iframe" href="{geturl controller='compania' action='editarcompania'}?id={$data_[$b]}&id2={assign var='id' value=$data_[$b]}{assign var='c' value=0}{foreach from=$companieslist item=company}{if $data_[$c] == $id}{if $address_[$c]|is_array}{foreach from=$address_[$c] item=address}{$address}{break}{/foreach}{else}{$address_[$c]}{break}{/if}{/if}{assign var='c' value=$c+1}{/foreach}&doc_type=ccompany&doc_id={$data_[$b]}">
					{$company_[$b]|ucfirst}</a></span></td>
						<td>{$industry_[$b]|ucfirst}</td>
						<td>{$relationship_[$b]|ucfirst}</td>
					</tr>
				 	<input type="hidden" id="form_addr_id2" name="addr_id2[]" value="{$address_[$b]}" />
				 	<input type="hidden" id="form_comp" name="comp_id[]" value="{$data_[$b]}" />
				{/if}
				{assign var='b' value=$b+1}
	       {/foreach}
	    {/foreach}
	   </table>	
	  {else}
			{assign var='id' value=$fp->company_id}
	        {assign var='b' value=0} 
	        {foreach from=$companieslist item=company}
			   {if $data_[$b] == $id}
				<tr>
					<td><input type="checkbox" name="company_id[]" value="{$data_[$b]}"></td>
					<td><span><a class="fancybox fancybox.iframe submit2" href="{geturl controller='compania' action='editarcompania'}?id={$data_[$b]}&id2={$address_[$b]}&doc_type=ccompany&doc_id={$data_[$b]}">
					{$company_[$b]|ucfirst}</a></span></td>
					<td>{$industry_[$b]|ucfirst}</td>
					<td>{$relationship_[$b]|ucfirst}</td>
				</tr>
				 <input type="hidden" id="form_addr_id2" name="addr_id2[]" value="{$address_[$b]}" />
				 <input type="hidden" id="form_comp" name="comp_id[]" value="{$data_[$b]}" />
		       {/if}
				 {assign var='b' value=$b+1}
	        {/foreach} 
	    </table>
		{/if}
	 {/if}
	{/if *}	
	         {include file='compania/companias.tpl' product=true  id=$fp->product->getId()}
	        {* <div class="row"><a class="fancybox fancybox.iframe submit2" href="{geturl controller='compania' action='agregarcompania'}?doc_type=ccompany&comp_doc_type=product&contact_id={$fp->product->getId()}&comp_type=proveedor">Agregar Proveedor</a></div> *}
	  	</div>
	</div>
  </div> 
  
	<div class="form_box">
		<div class="form_left">
			    <div class="row" id="form_unit_cost_container">
			        <label for="form_unit_cost">Precio de compra o coste {if $fp->product_currency == 'Peso Argentino'}(&#36; ARS){elseif $fp->product_currency == 'Peso Boliviano'}(b&#36; BOB){elseif $fp->product_currency == 'Peso Chileno'}(&#36; CLP){elseif $fp->product_currency == 'Peso Colombiano'}(&#36; COP){elseif $fp->product_currency == 'Colon'}(&#162; CRC){elseif $fp->product_currency == 'Peso Dominicano'}(&#36; DOP){elseif $fp->product_currency == 'Dolar'}(&#36; USD){elseif $fp->product_currency == 'Euro'}(&#128; EUR){elseif $fp->product_currency == 'Quetzal'}(Q GTQ){elseif $fp->product_currency == 'Lempira'}(L HNL){elseif $fp->product_currency == 'Peso Mexicano'}(&#36; MXN){elseif $fp->product_currency == 'Cordoba'}(C&#36; NIO){elseif $fp->product_currency == 'Balboa'}(B/. PAB){elseif $fp->product_currency == 'Guarani'}(&#8370; PYG){elseif $fp->product_currency == 'Nuevo Sol'}(S/. PEN){elseif $fp->product_currency == 'Libra'}(&#163; GBP){elseif $fp->product_currency == 'Peso Uruguayo'}(&#36; UYU){elseif $fp->product_currency == 'Bolivar'}(Bs. VEF){else}(&#128; EUR){/if}:</label>
			        <input type="text" id="form_unit_cost" name="unit_cost" value="{$fp->unit_cost}" data-a-dec="," data-a-sep="." placeholder="Costo Unitario (Compra)"/>
			        {include file="lib/error.tpl" error=$fp->getError('unit_cost')}
			    </div>
			    <div class="row" id="form_iva_p2_name_container">
			        <label for="form_iva_p2_name">&iquest;Pagas alg&uacute;n impuesto adicional de compra?:</label>
			        <input type="text" id="form_iva_p2_name" name="iva_p2_name" value="{$fp->iva_p2_name}" placeholder="Ej: Impuesto al lujo"/>
			        {include file="lib/error.tpl" error=$fp->getError('iva_p2_name')}
			    </div>
		</div>
		<div class="form_right">
			    <div class="row" id="form_iva_p_container">
			        <label for="form_iva_p">IVA de compra (en &#37;):</label>
			        <input type="text" id="form_iva_p" name="iva_p" value="{$fp->iva_p}" data-a-dec="," data-a-sep="." placeholder="Escribe 21 para el 21&#x25; de impuesto (Compra)"/> 
			        {include file="lib/error.tpl" error=$fp->getError('iva_p')}
			    </div>
			    <div class="row" id="form_iva_p2_container">
			        <label for="form_iva_p2">Impuesto adicional (en &#37;):</label>
			        <input type="text" id="form_iva_p2" name="iva_p2" value="{$fp->iva_p2}" data-a-dec="," data-a-sep="." placeholder="Escribe 2 para el 2&#x25; de impuesto (Compra)"/>
			        {include file="lib/error.tpl" error=$fp->getError('iva_p2')}
			    </div>
		</div>
	</div>
		  
    {*
    <div class="row" id="form_product_currency_container">
    	<label for="form_product_currency">Moneda utilizada <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <select id="form_product_currency" name="product_currency"/>
       		<option value="" {if $fp->product_currency == ''} selected="selected" {/if}>Seleccione...</option>
			<option value="Peso Argentino" {if $fp->product_currency == 'Peso Argentino'} selected="selected" {/if}>&#36; Peso Argentino</option>
        		<option value="Peso Boliviano" {if $fp->product_currency == 'Peso Boliviano'} selected="selected" {/if}>b&#36; Peso Boliviano</option>
        		<option value="Peso Chileno" {if $fp->product_currency == 'Peso Chileno'} selected="selected" {/if}>&#36; Peso Chileno</option>
        		<option value="Peso Colombiano" {if $fp->product_currency == 'Peso Colombiano'} selected="selected" {/if}>&#36; Peso Colombiano</option>
        		<option value="Colon" {if $fp->product_currency == 'Colon'} selected="selected" {/if}>&#162; Col&oacute;n</option>
        		<option value="Peso Dominicano" {if $fp->product_currency == 'Peso Dominicano'} selected="selected" {/if}>&#36; Peso Dominicano</option>
        		<option value="Dolar" {if $fp->product_currency == 'Dolar'} selected="selected" {/if}>US&#36; Dolar</option>
        		<option value="Euro" {if $fp->product_currency == 'Euro'} selected="selected" {/if}>&#128; Euro</option>
        		<option value="Quetzal" {if $fp->product_currency == 'Quetzal'} selected="selected" {/if}>Q Quetzal</option>
        		<option value="Lempira" {if $fp->product_currency == 'Lempira'} selected="selected" {/if}>L Lempira</option>
        		<option value="Peso Mexicano" {if $fp->product_currency == 'Peso Mexicano'} selected="selected" {/if}>&#36; Peso Mexicano</option>
			<option value="Cordoba" {if $fp->product_currency == 'Cordoba'} selected="selected" {/if}>C&#36; C&oacute;rdoba</option>		
        		<option value="Balboa" {if $fp->product_currency == 'Balboa'} selected="selected" {/if}>B/. Balboa</option>
        		<option value="Guarani" {if $fp->product_currency == 'Guarani'} selected="selected" {/if}>&#8370; Guaran&iacute;</option>
        		<option value="Nuevo Sol" {if $fp->product_currency == 'Nuevo Sol'} selected="selected" {/if}>S/. Nuevo Sol</option>
        		<option value="Libra" {if $fp->product_currency == 'Libra'} selected="selected" {/if}>&#163; Libra Esterlina</option>
        		<option value="Peso Uruguayo" {if $fp->product_currency == 'Peso Uruguayo'} selected="selected" {/if}>&#36; Peso Uruguayo</option>
        		<option value="Bolivar" {if $fp->product_currency == 'Bolivar'} selected="selected" {/if}>Bs. Bol&iacute;var</option>  
		</select>
        {include file="lib/error.tpl" error=$fp->getError('product_currency')}
    </div>  
    *}
    <input type="hidden" id="form_product_currency" name="product_currency" value="{$fp->product_currency}" /> 
    
	<div class="form_box">
		<div class="row">
    		{if $identity->trial_expired}{else}<button class="submit" type="submit" name="edit" value="edit" id="edit">Actualizar</button>{/if}
		</div>
	</div>
	<div class="form_box">
		<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
	    	</div>
    	</div>

</form>

{include file='footer.tpl'}