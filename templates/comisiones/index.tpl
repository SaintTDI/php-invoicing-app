{include file='header.tpl' section='comisiones'}
<div id="">
    <div id="">
   Comisiones: 
    </div>
</div>

    	    <table class="table_p">
    	  	 <tr>
			<td class="table_p_top">Mes</td>
			<td class="table_p_top">Cuentas Activas</td>
			<td class="table_p_top">Comisi&oacute;n Mensual Generada</td>
		</tr>
    	  	 <tr>
			<td class="table_p_top">Enero {$year_}</td>
			<td>{$account_1}</td>
			<td>{$tot_month_1|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</td>
		 </tr> 
    	  	 <tr>
			<td class="table_p_top">Febrero {$year_}</td>
			<td>{$account_2}</td>
			<td>{$tot_month_2|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</td>
		 </tr> 
    	  	 <tr>
			<td class="table_p_top">Marzo {$year_}</td>
			<td>{$account_3}</td>
			<td>{$tot_month_3|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</td>
		 </tr> 
    	  	 <tr>
			<td class="table_p_top">Abril {$year_}</td>
			<td>{$account_4}</td>
			<td>{$tot_month_4|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</td>
		 </tr>
    	  	 <tr>
			<td class="table_p_top">Mayo {$year_}</td>
			<td>{$account_5}</td>
			<td>{$tot_month_5|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</td>
		 </tr>
    	  	 <tr>
			<td class="table_p_top">Junio {$year_}</td>
			<td>{$account_6}</td>
			<td>{$tot_month_6|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</td>
		 </tr>
    	  	 <tr>
			<td class="table_p_top">Julio {$year_}</td>
			<td>{$account_7}</td>
			<td>{$tot_month_7|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</td>
		 </tr> 
    	  	 <tr>
			<td class="table_p_top">Agosto {$year_}</td>
			<td>{$account_8}</td>
			<td>{$tot_month_8|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</td>
		 </tr> 
    	  	 <tr>
			<td class="table_p_top">Septiembre {$year_}</td>
			<td>{$account_9}</td>
			<td>{$tot_month_9|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</td>
		 </tr> 
    	  	 <tr>
			<td class="table_p_top">Octubre {$year_}</td>
			<td>{$account_10}</td>
			<td>{$tot_month_10|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</td>
		 </tr>
    	  	 <tr>
			<td class="table_p_top">Noviembre {$year_}</td>
			<td>{$account_11}</td>
			<td>{$tot_month_11|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</td>
		 </tr>
    	  	 <tr>
			<td class="table_p_top">Diciembre {$year_}</td>
			<td>{$account_12}</td>
			<td>{$tot_month_12|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}</td>
		 </tr>
       </table>
      
    <div id="">
    		Total Comisión Anual Generada {$total|number_format:2:',':'.'}  {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if}
    </div>


{include file='footer.tpl'}