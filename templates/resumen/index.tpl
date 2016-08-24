{include file='header.tpl' section='resumen'}

	<div class="boxes3">
		<div class="title2" id="form_total_invoices">
			<label for="form_total_invoices"><h3>Datos del Cliente:</h3></label>
		</div>
	</div>

    {foreach from=$fp->companyProfile key='key' item='label'}
        	<div class="row" id="form_{$key}_container">
                {if $label == 'Picture Preview'}
                		{if $fp->$key != ''}
                				{assign var="url" value=$fp->$key}
                            	<img src="/profiles/tmp/company/pictures/{$url}" />
                        	{else}
                            	<img src="/profiles/tmp/company/pictures/profile.png" />
                        {/if}
                	{/if}
		</div>
    {/foreach}

    {if $fp->thecompany}
    <div class="ficha_row" id="form_thecompany_container">
        <label for="form_thecompany">Raz&oacute;n Social:</label>
        <div class="ficha_text">{$fp->thecompany|ucfirst}</div>
    </div>
    {/if}
    {if $fp->commercial}
    <div class="ficha_row" id="form_commercial_container">
        <label for="form_commercial">Nombre Comercial:</label>
        <div class="ficha_text">{$fp->commercial|ucfirst}</div>
    </div>
	{/if}
	{if $fp->identification}
    <div class="ficha_row" id="form_identification_container">
        <label for="form_identification">Identificaci&oacute;n Fiscal:</label>
        <div class="ficha_text">{$fp->identification|ucfirst}</div>
    </div>
    	{/if}

    <label for="form_address">Direcci&oacute;n:</label>
    {include file='direccion/direcciones.tpl'}
        
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
     		<label for="form_{$label}">Sitio Web:</label>
     		<div class="ficha_text"><a href="http://www.{$fp->$key}" target="_blank">{$fp->$key}</a></div>
    		{elseif $label == 'Twitter'}
     		<label for="form_{$label}">Cuenta en Twitter:</label>
     		<div class="ficha_text"><a href="https://twitter.com/{$fp->$key}" target="_blank">twitter.com/{$fp->$key}</a></div> 
     	{/if}
     </div>
     {/foreach}
    {if $fp->mobile}
    <div class="ficha_row" id="form_mobile_container">
        <label for="form_mobile">Tel&eacute;fono M&oacute;vil:</label>
        <div class="ficha_text">{if $fp->mobile_country}({$fp->mobile_country}){/if} {$fp->mobile_area} {$fp->mobile}</div>
    </div>
    {/if}
    {if $fp->phone}
    <div class="ficha_row" id="form_phone_container">
        <label for="form_phone">Tel&eacute;fono Principal:</label>
        <div class="ficha_text">{if $fp->phone_country}({$fp->phone_country}){/if} {$fp->phone_area} {$fp->phone}</div>
    </div>
    {/if}
    {if $fp->phone2}
    <div class="ficha_row" id="form_phone2_container">
        <label for="form_phone2">Tel&eacute;fono Secundario:</label>
        <div class="ficha_text">{if $fp->phone2_country}({$fp->phone2_country}){/if} {$fp->phone2_area} {$fp->phone2}</div>
    </div>
    {/if}
    {if $fp->fax}
    <div class="ficha_row" id="form_fax_container">
        <label for="form_fax">Fax:</label>
        <div class="ficha_text">{if $fp->fax_country}({$fp->fax_country}){/if} {$fp->fax_area} {$fp->fax}</div>
    </div>
    {/if}
    {if $fp->year_start}
    <div class="ficha_row" id="form_year_start_container">
        <label for="form_year_start">Inicio del per&iacute;odo fiscal:</label>
        <div class="ficha_text">{$fp->year_start}</div>
    </div>
    {/if}
    {if $fp->iva}
    <div class="ficha_row" id="form_iva_container">
        <label for="form_iva_">R&eacute;gimen habitual de IVA (&#37;):</label>
        <div class="ficha_text">{$fp->iva|number_format:2:',':'.'}</div>
    </div>
    {/if}
    {if $fp->iva2_name}
    <div class="ficha_row" id="form_iva2_name_container">
        <label for="form_iva2_name">Otros impuestos (Nombre):</label>
        <div class="ficha_text">{$fp->iva2_name|ucfirst}</div>
    </div>
    {/if}
    {if $fp->iva2}
    <div class="ficha_row" id="form_iva2_container">
        <label for="form_iva2_">Otros impuestos (&#37;):</label>
        <div class="ficha_text">{$fp->iva2|number_format:2:',':'.'}</div>
    </div>
    {/if}
    {if $fp->retention}
    <div class="ficha_row" id="form_retention_container">
        <label for="form_retention_">Retenci&oacute;n de impuesto (&#37;):</label>
        <div class="ficha_text">{$fp->retention|number_format:2:',':'.'}</div>
    </div>
	{/if}
	{if $fp->currency}
    <div class="ficha_row" id="form_currency_container">
    	<label for="form_currency">Moneda utilizada:</label>
    <div class="ficha_text">{$fp->currency}</div>
    </div>
    {/if}

    <div class="ficha_row" id="form_recc_">
    		<label for="form_recc_">Regimen especial (RECC):</label>
    		<div class="ficha_text">{if $fp->recc == "true"}Si{else}No{/if}</div>
	</div>
    

{include file='footer.tpl'}