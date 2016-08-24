{include file='header.tpl' section='contacto' subsection='fichacompania'}
	<div class="boxes3">
		<div class="title2" id="form_total_invoices">
			<label for="form_total_invoices"><h3>Ficha Compa&ntilde;&iacute;a:</h3></label>
		</div>
		<div class="boton_top">
		        <label for="bt_">
		       	 	<a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='editarcompania'}?id={$fp->company->getId()}"{/if}>Editar</a>
				</label>
		</div>
	</div>
	{if $fp->thecompany}
    <div class="ficha_row" id="form_thecompany_container">
        <label for="form_thecompany">Raz&oacute;n Social:</label>
        <div class="ficha_text">{$fp->thecompany|ucfirst}</div>
    </div>
    {/if}
    {if $fp->identification}
    <div class="ficha_row" id="form_identification_container">
        <label for="form_identification">Identificaci&oacute;n Fiscal:</label>
        <div class="ficha_text">{$fp->identification|ucfirst}</div>
    </div>
    {/if}
    
	{foreach from=$fp->companyProfile key='key' item='label'}
        {if $label == 'Industry'}
        {if $company_industry}
         <div class="ficha_row" id="form_industry_container">
     		<label for="form_industry">&Aacute;rea o Sector:</label>
     		<div class="ficha_text">{$company_industry|ucfirst}</div>
     	</div>
     	 {/if}
        {elseif $label == 'Specialty'}
        {if $company_speciality}
        <div class="ficha_row" id="form_specialty_container">
             <label for="form_specialty">Especialidad:</label>
			 <div class="ficha_text">{$company_speciality|ucfirst}</div>
		</div>
		{/if}
        	{/if}
	{/foreach}
   
    {if $addresses|@count > 0}
    	<div class="ficha_table" id="form_address_container">
    	<label for="form_address">Direcci&oacute;n:</label>
		{if $addresses|@count == 0}
		{else}	
		    	    <table class="table_p">
		    	  	 <tr>
					{* <td class="table_p_top">Tipo</td> *}
					<td class="table_p_top">Calle</td>
					<td class="table_p_top">Casa/Apt</td>
					<td class="table_p_top">Zona</td>
					<td class="table_p_top">Ciudad</td>
					<td class="table_p_top">Estado</td>
					<td class="table_p_top">C&oacute;digo</td>
					<td class="table_p_top">Pa&iacute;s</td>
				</tr>
				{if $contact}
		        {foreach from=$addresses item=address name=foo}      		
		        		{if $smarty.foreach.foo.index < 1}
					<tr>
						{* <td>{$address->profile->type|ucfirst}</td> *}
						<td>{$address->profile->street|ucfirst}</td>
						<td>{$address->profile->house|ucfirst}</td>
						<td>{$address->profile->neighbourhood|ucfirst}</td>
						<td>{$address->profile->city|ucfirst}</td>
						<td>{$address->profile->province|ucfirst}</td>
						<td>{$address->profile->postal_code|ucfirst}</td>
						<td>{$address->profile->country|ucfirst}</td>
					</tr>
					{break}{/if}
		        {/foreach}
		        	{else}
		        {foreach from=$addresses item=address}      		
					<tr>
						{* <td>{$address->profile->type|ucfirst}</td> *}
						<td>{$address->profile->street|ucfirst}</td>
						<td>{$address->profile->house|ucfirst}</td>
						<td>{$address->profile->neighbourhood|ucfirst}</td>
						<td>{$address->profile->city|ucfirst}</td>
						<td>{$address->profile->province|ucfirst}</td>
						<td>{$address->profile->postal_code|ucfirst}</td>
						<td>{$address->profile->country|ucfirst}</td>
					</tr>
		        {/foreach}
				{/if}	
		       </table>
		{/if}
  	</div>
    {/if}
    {if $fp->email_c}
    <div class="ficha_row" id="form_email_container">
        <label for="form_email">Email Principal:</label>
       <div class="ficha_text"><a href="mailto:{$fp->email_c}">{$fp->email_c}</a></div>
    </div>
    {/if}
    {if $fp->email2}
    <div class="ficha_row" id="form_email2_container">
        <label for="form_email2">Email Secundario:</label>
        <div class="ficha_text"><a href="mailto:{$fp->email2}">{$fp->email2}</a></div>
    </div>
    {/if}
    
     {foreach from=$fp->companyProfile key='key' item='label'}
     <div class="ficha_row" id="form_{$key}_container">
     	{if $label == 'Website'}
     		{if $fp->$key}
     			<label for="form_{$label}">Sitio Web:</label>
     			<div class="ficha_text"><a href="http://www.{$fp->$key}" target="_blank">http://www.{$fp->$key}</a></div>
     		{/if}
    		{elseif $label == 'Twitter'}
    			{if $fp->$key}
     			<label for="form_{$label}">Cuenta en Twitter:</label>
     			<div class="ficha_text"><a href="https://twitter.com/{$fp->$key}" target="_blank">https://twitter.com/{$fp->$key}</a></div>
     		{/if}
    		{/if}
     </div>
     {/foreach}
    
    {if $fp->phone}
    <div class="ficha_row" id="form_phone_container">
        <label for="form_phone">Tel&eacute;fono Principal:</label>
        <div class="ficha_text">({$fp->phone_country}) - {$fp->phone_area} {$fp->phone}</div>
    </div>
    {/if}
    {if $fp->phone2}
    <div class="ficha_row" id="form_phone2_container">
        <label for="form_phone2">Tel&eacute;fono Secundario:</label>
        <div class="ficha_text">({$fp->phone2_country}) - {$fp->phone2_area} {$fp->phone2}</div>
    </div>
    {/if}
    {if $fp->fax}
    <div class="ficha_row" id="form_fax_container">
        <label for="form_fax">Fax:</label>
        <div class="ficha_text">({$fp->fax_country}) {$fp->fax_area} {$fp->fax}</div>
    </div>
    {/if}
    {if $fp->relationship}
    <div class="ficha_row" id="form_company_relationship">
    		<label for="form_company_relationship">Relaci&oacute;n:</label>
    		<div class="ficha_text">{$fp->relationship|ucfirst}</div>
    </div>
    {/if}
    {if $fp->recc}
    <div class="ficha_row" id="form_recc_">
    		<label for="form_recc_">Reg. especial (RECC):</label>
    		<div class="ficha_text">{if $fp->recc == true}S&iacute;{else}No{/if}</div>
	</div>
    {/if}
    {if $fp->irpf}
    <div class="ficha_row" id="form_irpf_">
    		<label for="form_irpf_">Retenci&oacute;n IRPF (&#37;):</label>
    		<div class="ficha_text">{$fp->irpf}</div>
	</div>
    {/if}
    {if $fp->notes}       
	<div class="ficha_row" id="form_notes_container">
    		<label for="form_notes">Notas:</label>
    		<div class="ficha_text">{$fp->notes|ucfirst}</div>
    	</div>
    {/if}
    <div class="boxes2">
	    	<div class="invoice" id="form_total_invoices">
	    		<p><span class="imp_text">Facturado a este contacto:</span>
	    		<span class="imp_text_2">{$total_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
	    		<p><span class="text">Neto:</span>
	    		<span class="text_2">{$total_net_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
	    		<p><span class="text">IVA:</span>
	    		<span class="text_2">{$total_iva_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
	    	</div>
	    	<div class="invoice_pending" id="form_total_invoices4">
	    		<p><span class="imp_text">Pendiente de Cobro:</span>
	    		<span class="imp_text_2">{$total_up_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
	    		<p><span class="text">Neto:</span>
	    		<span class="text_2">{$total_net_up_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
	    		<p><span class="text">IVA:</span>
	    		<span class="text_2">{$total_iva_up_i|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
	    	</div>
	    	<div class="expense" id="form_total_expenses">
	    		<p><span class="imp_text">Compras a este Contacto:</span>
	    		<span class="imp_text_2">{$total_e|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
	    		<p><span class="text">Neto:</span>
	    		<span class="text_2">{$total_net_e|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
	    		<p><span class="text">IVA:</span>
	    		<span class="text_2">{$total_iva_e|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
	    	</div>
	    	<div class="expense_pending" id="form_total_expenses4">
	    		<p><span class="imp_text">Pendiente de Pago:</span>
	    		<span class="imp_text_2">{$total_up_e|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
	    		<p><span class="text">Net:</span>
	    		<span class="text_2">{$total_net_up_e|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
	    		<p><span class="text">IVA:</span>
	    		<span class="text_2">{$total_iva_up_e|number_format:2:',':'.'} {if $default_currency == 'Peso Argentino'}&#36;{elseif $default_currency == 'Peso Boliviano'}b&#36{elseif $default_currency == 'Peso Chileno'}&#36;{elseif $default_currency == 'Peso Colombiano'}&#36;{elseif $default_currency == 'Colon'}&#162;{elseif $default_currency == 'Peso Dominicano'}&#36;{elseif $default_currency == 'Dolar'}&#36;{elseif $default_currency == 'Euro'}&#128;{elseif $default_currency == 'Quetzal'}Q{elseif $default_currency == 'Lempira'}L{elseif $default_currency == 'Peso Mexicano'}&#36;{elseif $default_currency == 'Cordoba'}C&#36;{elseif $default_currency == 'Balboa'}B/.{elseif $default_currency == 'Guarani'}&#8370;{elseif $default_currency == 'Nuevo Sol'}S/.{elseif $default_currency == 'Libra'}&#163;{elseif $default_currency == 'Peso Uruguayo'}&#36;{elseif $default_currency == 'Bolivar'}Bs.{else}&#128;{/if} </span></p>
	    	</div>
    	</div>
	{if $prospects|@count > 0}  	
	   <div class="ficha_table" id="form_prospect_container">
      	<label for="form_prospect">Presupuestos enviados a este contacto:</label>	
		   <table class="table_p">
		    <tr>
			  <td class="table_p_top">N&#186; Presupuesto</td>
			  <td class="table_p_top">Valor</td>
			  <td class="table_p_top">Proyecto</td>
			  <td class="table_p_top">V&aacute;lido hasta</td>
			  <td class="table_p_top">Estatus</td>
			</tr>
		        {assign var='a' value=0} 
		        {foreach from=$prospects item=prospect}
					<tr>
						<td class="links"><span><a href="{geturl controller='herramientas/presupuestos' action='fichapresupuesto'}?id={$budget_id_[$a]}">{$number_[$a]|ucfirst}</a></span></td>
						<td>{$value_[$a]|number_format:2:',':'.'}</td>
						<td>{$project_[$a]|ucfirst}</td>
						<td>{$expire_[$a]|ucfirst}</td>
						<td class="links {$class_[$a]}">{$status_[$a]|ucfirst}</td>
					</tr>
					 {assign var='a' value=$a+1}
		        {/foreach} 
		    </table>
		</div>
	{/if}

{if $month_start}

<div class="title3" id="form_total_invoices">
	<label for="form_total_invoices">Importe Total de Facturaci&oacute;n {$year__}</label>
</div>

<canvas id="finantial_report1" height="600" width="800"></canvas>

{literal}
	<script>

		var barChartData = {
			labels : ["{/literal}{if $month_start == 1}Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre{elseif $month_start == 2}Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero{elseif $month_start == 3}Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero{elseif $month_start == 4}Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo{elseif $month_start == 5}Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril{elseif $month_start == 6}Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo{elseif $month_start == 7}Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio{elseif $month_start == 8}Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio{elseif $month_start == 9}Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto{elseif $month_start == 10}Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto","Septiembre{elseif $month_start == 11}Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre{else}Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre{/if}{literal}"],
					
			datasets : [
				{
					fillColor : "rgba(0,172,215,1)",
					strokeColor : "rgba(0,128,187,1)",
					data : [{/literal}{if $month_start == 1}{if $tot_month_1}{$tot_month_1}{else}0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{elseif $month_start == 2}{if $tot_month_2}{$tot_month_2}{else}0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{elseif $month_start == 3}{if $tot_month_3}{$tot_month_3}{else}0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{elseif $month_start == 4}{if $tot_month_4}{$tot_month_4}{else}0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{elseif $month_start == 5}{if $tot_month_5}{$tot_month_5}{else}0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{elseif $month_start == 6}{if $tot_month_6}{$tot_month_6}{else}0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{elseif $month_start == 7}{if $tot_month_7}{$tot_month_7}{else}0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{elseif $month_start == 8}{if $tot_month_8}{$tot_month_8}{else}0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{elseif $month_start == 9}{if $tot_month_9}{$tot_month_9}{else}0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{elseif $month_start == 10}{if $tot_month_10}{$tot_month_10}{else}0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{elseif $month_start == 11}{if $tot_month_11}{$tot_month_11}{else}0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{else}{if $tot_month_12}{$tot_month_12}{else}0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{/if}{literal}]
				}
			]
			
		}
		
		var steps = 10;
			
		var max_1 = Math.max({/literal}{if $month_start == 1}{if $tot_month_1}{$tot_month_1}{else}0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{elseif $month_start == 2}{if $tot_month_2}{$tot_month_2}{else}0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{elseif $month_start == 3}{if $tot_month_3}{$tot_month_3}{else}0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{elseif $month_start == 4}{if $tot_month_4}{$tot_month_4}{else}0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{elseif $month_start == 5}{if $tot_month_5}{$tot_month_5}{else}0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{elseif $month_start == 6}{if $tot_month_6}{$tot_month_6}{else}0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{elseif $month_start == 7}{if $tot_month_7}{$tot_month_7}{else}0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{elseif $month_start == 8}{if $tot_month_8}{$tot_month_8}{else}0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{elseif $month_start == 9}{if $tot_month_9}{$tot_month_9}{else}0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{elseif $month_start == 10}{if $tot_month_10}{$tot_month_10}{else}0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{elseif $month_start == 11}{if $tot_month_11}{$tot_month_11}{else}0{/if}{if $tot_month_12},{$tot_month_12}{else},0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{else}{if $tot_month_12}{$tot_month_12}{else}0{/if}{if $tot_month_1},{$tot_month_1}{else},0{/if}{if $tot_month_2},{$tot_month_2}{else},0{/if}{if $tot_month_3},{$tot_month_3}{else},0{/if}{if $tot_month_4},{$tot_month_4}{else},0{/if}{if $tot_month_5},{$tot_month_5}{else},0{/if}{if $tot_month_6},{$tot_month_6}{else},0{/if}{if $tot_month_7},{$tot_month_7}{else},0{/if}{if $tot_month_8},{$tot_month_8}{else},0{/if}{if $tot_month_9},{$tot_month_9}{else},0{/if}{if $tot_month_10},{$tot_month_10}{else},0{/if}{if $tot_month_11},{$tot_month_11}{else},0{/if}{/if}{literal});
		
		if (max_1 > 0){
			var max_e = max_1;
		}
		else if (max_1 < 0){
			var max_e = max_1;
		}
		else {
			var max_e = 1;
		}
		
		var allopts = {scaleOverride: true, scaleSteps: steps, scaleStepWidth: Math.ceil(max_e/steps), scaleStartValue: 0}
	
		var myLine = new Chart(document.getElementById("finantial_report1").getContext("2d")).Bar(barChartData,allopts);
	
	</script>
{/literal}
{/if}

	{if $clients|@count > 0}  	
	   <div class="ficha_table" id="form_client_container">
      	<label for="form_client">Facturas enviadas a este contacto:</label>	
		   <table class="table_p">
		    <tr>
			  <td class="table_p_top">N&#186; Factura</td>
			  <td class="table_p_top">Valor</td>
			  <td class="table_p_top">Proyecto</td>
			  <td class="table_p_top">Vencimiento</td>
			  <td class="table_p_top">Estatus</td>
			</tr>
		        {assign var='b' value=0} 
		        {foreach from=$clients item=client}
					<tr>
						<td class="links"><span><a href="{geturl controller='herramientas/facturas' action='fichafactura'}?id={$invoice_id__[$b]}">{$number_i[$b]|ucfirst}</a></span></td>
						<td>{$value_i[$b]|number_format:2:',':'.'}</td>
						<td>{$project_i[$b]|ucfirst}</td>
						<td>{$expire_i[$b]|ucfirst}</td>
						<td class="links {$class_i[$b]}">{$status_i[$b]|ucfirst}</td>
					</tr>
					 {assign var='b' value=$b+1}
		        {/foreach} 
		    </table>
		</div>
	{/if}

	{if $products|@count > 0}  	
	   <div class="ficha_table" id="form_product_container">
      	<label for="form_product">Productos facturados a este contacto:</label>	
		   <table class="table_p">
		    <tr>
			  <td class="table_p_top">C&oacute;digo</td>
			  <td class="table_p_top">Nombre</td>
			  <td class="table_p_top">Precio Unitario</td>
			  <td class="table_p_top">IVA (&#37;)</td>
			  <td class="table_p_top">Otros (&#37;)</td>
			  <td class="table_p_top">Cantidad</td>
			  <td class="table_p_top">Importe Total</td>
			</tr>
		        {assign var='c' value=0} 
		        {foreach from=$products item=product}
					<tr>
						<td class="links"><span>{if $product_id_[$c]}<a href="{geturl controller='cuenta' action='fichaproducto'}?id={$product_id_[$c]}">{$code_p[$c]|ucfirst}</a>{else}{$code_p[$c]|ucfirst}{/if}</span></td>
						<td>{$name_p[$c]|ucfirst}</td>
						<td>{$punit_p[$c]|number_format:2:',':'.'}</td>
						<td>{$iva_p[$c]|number_format:2:',':'.'}</td>
						<td>{$iva2_p[$c]|number_format:2:',':'.'}</td>
						<td>{$quantity_p[$c]|number_format:2:',':'.'}</td>
						<td>{$total_p[$c]|number_format:2:',':'.'}</td>
					</tr>
					 {assign var='c' value=$c+1}
		        {/foreach} 
		    </table>
		</div>
	{/if}
	
	{if $projectlist|@count > 0}  	
	   <div class="ficha_table" id="form_project_container">
      	<label for="form_project">Proyectos asociados a este contacto:</label>	
		   <table class="table_p">
		   		{assign var='e' value=0}
		   		{assign var='d' value=0}
		   		
		   		{foreach from=$projectlist item=project}
		   			{if $namep_[$d]} 
		   			   {if $e < 1} 
		    					<tr>
			  					<td class="table_p_top">Nombre</td>
			  					<td class="table_p_top">Presupuesto</td>
			  					<td class="table_p_top">Responsable</td>
			 	 				<td class="table_p_top">Estatus</td>
							</tr>
							{assign var='e' value=1}
					  {/if}
				  {/if}
		        {/foreach} 
		       
		        {foreach from=$projectlist item=project}
		          {if $namep_[$d]} 
					<tr>
						<td class="links"><span><a href="{geturl controller='proyectos' action='fichaproyecto'}?id={$project_id_[$d]}">{$namep_[$d]|ucfirst}</a></span></td>
						<td>{$budgetp_[$d]|number_format:2:',':'.'}</td>
						<td>{$responsiblep_[$d]|ucfirst}</td>
						<td class="links {$classp[$d]}">{if $statusp_[$d]}{$statusp_[$d]|ucfirst}{else}Por Definir{/if}</td>
					</tr>
					 {assign var='d' value=$d+1}
				  {/if}
		        {/foreach} 
		    </table>
		</div>
	{/if}
	
{if $month_starte}

<div class="title3" id="form_total_invoices">
	<label for="form_total_invoices">Importe Total de Compras {$year__}</label>
</div>

<canvas id="finantial_report6" height="600" width="800"></canvas>

{literal}
	<script>

		var barChartData = {
			labels : ["{/literal}{if $month_starte == 1}Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre{elseif $month_starte == 2}Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero{elseif $month_starte == 3}Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero{elseif $month_starte == 4}Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo{elseif $month_starte == 5}Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril{elseif $month_starte == 6}Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo{elseif $month_starte == 7}Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio{elseif $month_starte == 8}Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio{elseif $month_starte == 9}Septiembre", "Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto{elseif $month_starte == 10}Octubre", "Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto","Septiembre{elseif $month_starte == 11}Noviembre", "Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre{else}Diciembre", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre{/if}{literal}"],
					
			datasets : [
				{
					fillColor : "rgba(255,197,86,1)",
					strokeColor : "rgba(255,163,0,1)",
					data : [{/literal}{if $month_starte == 1}{if $tot_month_1e}{$tot_month_1e}{else}0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{elseif $month_starte == 2}{if $tot_month_2e}{$tot_month_2e}{else}0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{elseif $month_starte == 3}{if $tot_month_3e}{$tot_month_3e}{else}0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{elseif $month_starte == 4}{if $tot_month_4e}{$tot_month_4e}{else}0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{elseif $month_starte == 5}{if $tot_month_5e}{$tot_month_5e}{else}0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{elseif $month_starte == 6}{if $tot_month_6e}{$tot_month_6e}{else}0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{elseif $month_starte == 7}{if $tot_month_7e}{$tot_month_7e}{else}0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{elseif $month_starte == 8}{if $tot_month_8e}{$tot_month_8e}{else}0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{elseif $month_starte == 9}{if $tot_month_9e}{$tot_month_9e}{else}0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{elseif $month_starte == 10}{if $tot_month_10e}{$tot_month_10e}{else}0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{elseif $month_starte == 11}{if $tot_month_11e}{$tot_month_11e}{else}0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{else}{if $tot_month_12e}{$tot_month_12e}{else}0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{/if}{literal}]
				}
			]
			
		}
		
		var steps = 10;
			
		var max_1 = Math.max({/literal}{if $month_starte == 1}{if $tot_month_1e}{$tot_month_1e}{else}0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{elseif $month_starte == 2}{if $tot_month_2e}{$tot_month_2e}{else}0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{elseif $month_starte == 3}{if $tot_month_3e}{$tot_month_3e}{else}0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{elseif $month_starte == 4}{if $tot_month_4e}{$tot_month_4e}{else}0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{elseif $month_starte == 5}{if $tot_month_5e}{$tot_month_5e}{else}0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{elseif $month_starte == 6}{if $tot_month_6e}{$tot_month_6e}{else}0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{elseif $month_starte == 7}{if $tot_month_7e}{$tot_month_7e}{else}0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{elseif $month_starte == 8}{if $tot_month_8e}{$tot_month_8e}{else}0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{elseif $month_starte == 9}{if $tot_month_9e}{$tot_month_9e}{else}0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{elseif $month_starte == 10}{if $tot_month_10e}{$tot_month_10e}{else}0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{elseif $month_starte == 11}{if $tot_month_11e}{$tot_month_11e}{else}0{/if}{if $tot_month_12e},{$tot_month_12e}{else},0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{else}{if $tot_month_12e}{$tot_month_12e}{else}0{/if}{if $tot_month_1e},{$tot_month_1e}{else},0{/if}{if $tot_month_2e},{$tot_month_2e}{else},0{/if}{if $tot_month_3e},{$tot_month_3e}{else},0{/if}{if $tot_month_4e},{$tot_month_4e}{else},0{/if}{if $tot_month_5e},{$tot_month_5e}{else},0{/if}{if $tot_month_6e},{$tot_month_6e}{else},0{/if}{if $tot_month_7e},{$tot_month_7e}{else},0{/if}{if $tot_month_8e},{$tot_month_8e}{else},0{/if}{if $tot_month_9e},{$tot_month_9e}{else},0{/if}{if $tot_month_10e},{$tot_month_10e}{else},0{/if}{if $tot_month_11e},{$tot_month_11e}{else},0{/if}{/if}{literal});
		
		if (max_1 > 0){
			var max_e = max_1;
		}
		else if (max_1 < 0){
			var max_e = max_1;
		}
		else {
			var max_e = 1;
		}
		
		var allopts = {scaleOverride: true, scaleSteps: steps, scaleStepWidth: Math.ceil(max_e/steps), scaleStartValue: 0}

		var myLine = new Chart(document.getElementById("finantial_report6").getContext("2d")).Bar(barChartData,allopts);
	
	</script>
{/literal}{/if}

	{if $providers|@count > 0}  	
	   <div class="ficha_table" id="form_client_container">
      	<label for="form_client">Compras realizadas a este contacto:</label>	
		   <table class="table_p">
		    <tr>
			  <td class="table_p_top">N&#186; Nota de Gasto</td>
			  <td class="table_p_top">Valor</td>
			  <td class="table_p_top">Proyecto</td>
			  <td class="table_p_top">Vencimiento</td>
			  <td class="table_p_top">Estatus</td>
			</tr>
		        {assign var='b' value=0} 
		        {foreach from=$providers item=provider}
					<tr>
						<td class="links"><span><a href="{geturl controller='herramientas/gastos' action='fichagasto'}?id={$expense_id__[$b]}">{$number_e[$b]|ucfirst}</a></span></td>
						<td>{$value_e[$b]|number_format:2:',':'.'}</td>
						<td>{$project_e[$b]|ucfirst}</td>
						<td>{$expire_e[$b]|ucfirst}</td>
						<td class="links {$class_e[$b]}">{$status_e[$b]|ucfirst}</td>
					</tr>
					 {assign var='b' value=$b+1}
		        {/foreach} 
		    </table>
		</div>
	{/if}
   


{include file='footer.tpl'}