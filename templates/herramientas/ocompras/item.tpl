{if $items|@count == 0}
        <input type="hidden" id="form_product_id" name="product_id" value="0">
        {assign var='subtotal' value=0 scope=global}
{else}	
		{assign var='currency_1' value=$default_currency}{assign var='currency_2' value=$item->profile->currency}
        {if $currency_2}{assign var='currency_' value=$currency_2}{else}{assign var='currency_' value=$currency_1}{/if}
    	    <table class="table_p2">
    	  	 <tr>
    	  		{if $fp->published == 'yes'}{else}<td class="table_button"><button class="submit7" type="submit" name="delete2" id="delete2" value="delete">Borrar</button></td>{/if}
			<td class="table_p_top">C&oacute;digo</td>
			<td class="table_p_top">Nombre</td>
			<td class="table_p_top">Cantidad</td>
			<td class="table_p_top">Precio Unitario {if $currency_ == 'Peso Argentino'}(&#36;){elseif $currency_ == 'Peso Boliviano'}(b&#36){elseif $currency_ == 'Peso Chileno'}(&#36;){elseif $currency_ == 'Peso Colombiano'}(&#36;){elseif $currency_ == 'Colon'}(&#162;){elseif $currency_ == 'Peso Dominicano'}(&#36;){elseif $currency_ == 'Dolar'}(&#36;){elseif $currency_ == 'Euro'}(&#128;){elseif $currency_ == 'Quetzal'}(Q){elseif $currency_ == 'Lempira'}(L){elseif $currency_ == 'Peso Mexicano'}(&#36;){elseif $currency_ == 'Cordoba'}(C&#36;){elseif $currency_ == 'Balboa'}(B/.){elseif $currency_ == 'Guarani'}(&#8370;){elseif $currency_ == 'Nuevo Sol'}(S/.){elseif $currency_ == 'Libra'}(&#163;){elseif $currency_ == 'Peso Uruguayo'}(&#36;){elseif $currency_ == 'Bolivar'}(Bs.){else}(&#128;){/if}</td>
			<td class="table_p_top">IVA (&#37;)</td>
			<td class="table_p_top">Otros (&#37;)</td>
			<td class="table_p_top">Subtotal {if $currency_ == 'Peso Argentino'}(&#36;){elseif $currency_ == 'Peso Boliviano'}(b&#36){elseif $currency_ == 'Peso Chileno'}(&#36;){elseif $currency_ == 'Peso Colombiano'}(&#36;){elseif $currency_ == 'Colon'}(&#162;){elseif $currency_ == 'Peso Dominicano'}(&#36;){elseif $currency_ == 'Dolar'}(&#36;){elseif $currency_ == 'Euro'}(&#128;){elseif $currency_ == 'Quetzal'}(Q){elseif $currency_ == 'Lempira'}(L){elseif $currency_ == 'Peso Mexicano'}(&#36;){elseif $currency_ == 'Cordoba'}(C&#36;){elseif $currency_ == 'Balboa'}(B/.){elseif $currency_ == 'Guarani'}(&#8370;){elseif $currency_ == 'Nuevo Sol'}(S/.){elseif $currency_ == 'Libra'}(&#163;){elseif $currency_ == 'Peso Uruguayo'}(&#36;){elseif $currency_ == 'Bolivar'}(Bs.){else}(&#128;){/if}</td>
		</tr>
		{assign var='subtotal' value=0 scope=global}
		{assign var='iva_total_r1' value=0 scope=global}
		{assign var='iva2_total_r1' value=0 scope=global}
		{assign var='total_items' value=0 scope=global}
        {foreach from=$items item=item}      		
		<tr>
			{if $fp->published == 'yes'}{else}<td class="table_input"><input type="hidden" id="form_product_id" name="product_id[]" value="{$item->profile->product_id}" /><input type="hidden" id="form_item_id2" name="item_id2[]" value="{$item->getId()}"><input type="checkbox" id="form_item_id" name="item_id[]" value="{$item->getId()}"></td>{/if}
			<td class="links"><span>{if $fp->published != 'yes'}<a class="fancybox fancybox.iframe" href="{geturl controller='herramientas/ocompras' action='editaritem'}?id={$item->getId()}&popup=true">{$item->profile->code|ucfirst}</a>{else}{$item->profile->code|ucfirst}{/if}</span></td>
			<td>{$item->profile->detail|ucfirst}</td>
			<td>{$item->profile->quantity|number_format:2:',':'.'}</td>
			<td>{$item->profile->unit_cost|number_format:2:',':'.'}</td>
			<td>{$item->profile->iva_p|number_format:2:',':'.'}</td>
			<td>{$item->profile->iva_p2|number_format:2:',':'.'}</td>
			<td>{$item->profile->subtotal|number_format:2:',':'.'}</td>
		</tr>
		{assign var='iva_total__' scope=global value=$item->profile->quantity * $item->profile->unit_cost}
		{assign var='subtotal' scope=global value=$subtotal + $iva_total__}
		{assign var='iva_total_r1' scope=global value=$iva_total_r1 + $item->profile->iva_p_total}
		{assign var='iva2_total_r1' scope=global value=$iva2_total_r1 + $item->profile->iva_p2_total}
		{assign var='total_items' scope=global value=$total_items + 1}
        {/foreach}
       </table>
{/if}