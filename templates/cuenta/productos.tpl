{include file='header.tpl' section='cuenta' subsection='productos'}
<div class="boxes3">
	<div class="title2" id="form_total_invoices">
			<label for="form_total_invoices"><h3>Tus Productos y Servicios:</h3></label>
	</div>
	<div class="boton_top">
	        <label for="bt_">
	        		<a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='agregarproductos'}"{/if} onclick="clearLocalStorage();">Nuevo Producto</a>
			</label>
	</div>
</div>
{if $products|@count == 0}
		<div class="title" id="form_total_products">
			<label for="form_total_products">No hay Productos o Servicios registrados.</label>
		</div>
		<div id="parrafo2">
		        <p>&#x2771; Registrar tus productos o servicios acelera la creaci&oacute;n de facturas, presupuestos, gastos y &oacute;rdenes de compra.</p>
		</div>
		<div id="parrafo6">
		        <p>&#x2771; Adem&aacute;s, en la ficha de cada producto o servicio que hayas dado de alta podr&aacute;s ver r&aacute;pidamente todo el detalle comercial.</p>
		</div>
{else}
    	   <form id="account_id" name="account" method="post" action="{geturl action='productos'}">
    	    <table class="table_p">
    	  	 <tr>
    	  		<td class="table_button"><button class="submit7" type="submit" name="delete" id="delete" value="delete" onclick="return confirmDone5()">Borrar</button></td>
			<td class="table_p_top">C&oacute;digo</td>
			<td class="table_p_top">Nombre</td>
			{* <td class="table_p_top">Descripci&oacute;n</td> *}
			<td class="table_p_top">Imagen</td>
			<td class="table_p_top">Unidad</td>
			<td class="table_p_top">Precio {if $product->profile->product_currency == 'Peso Argentino'}(&#36; ARS){elseif $product->profile->product_currency == 'Peso Boliviano'}(b&#36; BOB){elseif $product->profile->product_currency == 'Peso Chileno'}(&#36; CLP){elseif $product->profile->product_currency == 'Peso Colombiano'}(&#36; COP){elseif $product->profile->product_currency == 'Colon'}(&#162; CRC){elseif $product->profile->product_currency == 'Peso Dominicano'}(&#36; DOP){elseif $product->profile->product_currency == 'Dolar'}(&#36; USD){elseif $product->profile->product_currency == 'Euro'}(&#128; EUR){elseif $product->profile->product_currency == 'Quetzal'}(Q GTQ){elseif $product->profile->product_currency == 'Lempira'}(L HNL){elseif $product->profile->product_currency == 'Peso Mexicano'}(&#36; MXN){elseif $product->profile->product_currency == 'Cordoba'}(C&#36; NIO){elseif $product->profile->product_currency == 'Balboa'}(B/. PAB){elseif $product->profile->product_currency == 'Guarani'}(&#8370; PYG){elseif $product->profile->product_currency == 'Nuevo Sol'}(S/. PEN){elseif $product->profile->product_currency == 'Libra'}(&#163; GBP){elseif $product->profile->product_currency == 'Peso Uruguayo'}(&#36; UYU){elseif $product->profile->product_currency == 'Bolivar'}(Bs. VEF){else}(&#128; EUR){/if}</td>
			<td class="table_p_top">IVA (&#37;)</td>
			<td class="table_p_top">Otros Imp. (&#37;)</td>
			{* <td class="table_p_top">Proveedor</td> *}
		</tr>{assign var='f' value=0}
        {foreach from=$products item=product}
			<tr>
				<td class="table_input"><input type="checkbox" name="product_id[]" value="{$product->getId()}"></td>
				<td>{$product->profile->product_code}</td>
				<td class="links"><span><a href="{geturl action='fichaproducto'}?id={$product->getId()}" onclick="clearLocalStorage();">{$product->profile->product_name|ucfirst}</a></span></td>
				{* <td>{$product->profile->product_description|ucfirst}</td> *}
				<td>{if $product->profile->product_pict_preview}<img src="/profiles/tmp/product/thumbnails/{$product->profile->product_pict_preview}" />{else}N/A{/if}</td>
				<td>{$product->profile->product_unit|ucfirst}</td>
				<td>{$product->profile->unit_price|number_format:2:',':'.'}</td>
				<td>{if $product->profile->iva}{$product->profile->iva|number_format:2:',':'.'}{else}N/A{/if}</td>
				<td>{if $product->profile->iva2}{$product->profile->iva2|number_format:2:',':'.'}{else}N/A{/if}</td>
				{* <td>{if $product_} 
					  {if $product_|is_array}
						{assign var='e' value=0}
					     {foreach from=$product_ item=product__}
					      {if $p_id_[$e] == $product->getId()} 
					        {foreach from=$product__ item=producto}  
					     	     {assign var='id' value=$producto} 
							     {assign var='b' value=0}
							     {foreach from=$companieslist item=company}
									{if $data_[$b] == $id} 
										{$company_[$b]|ucfirst}</br>
										{assign var='vacio' value=true}
									{/if}
									{assign var='b' value=$b+1}
							     {/foreach}
							 {/foreach}
							 {if !isset($vacio)} 
								N/A
							 {/if}
						  {/if}
						  {assign var='e' value=$e+1}
						{/foreach}
					 {/if}
					{else}
					  N/A
					{/if}</td> *}
			</tr>
			<input type="hidden" id="form_comp" name="prod_id[]" value="{$product->getId()}" />
		   {assign var='f' value=$f+1}
        {/foreach}
       </table>
      </form>
{/if}
{include file='footer.tpl'}