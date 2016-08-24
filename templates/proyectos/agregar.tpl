{if $smarty.get.doc_type == 'invoice'}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="es">
<head>
<link rel="stylesheet" href="/css/jquery-ui.css" type="text/css" media="all" /><script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script><script type="text/javascript" src="/js/malsup.js"></script>
{if $authenticated}<link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" />{else}<link rel="stylesheet" href="/css/outside.css" type="text/css" media="all" />{/if}
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
<title>WebProAdmin - Index</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no">
{literal}<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChZwN3axAbbT9k9K3VRX-5LBQwJX76LLM&sensor=false&language=es&region=SP"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
{/literal}</head>
<body>
{else}
{include file='header.tpl' section='proyectos' subsection='agregar'}
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Nuevo Proyecto:</h3></label>
</div>
{/if}
<form method="post" id="projec_id" action="{geturl action='agregar'}?id={$fp->project->getId()}" enctype="multipart/form-data">

    {if $fp->hasError()}
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    {/if}
    
    {* if $smarty.get.doc_type == 'invoice'}
    {literal}
    <script type="text/javascript">
	function onSubmitForm() {
  		//parent.jQuery.fancybox.close();
  		alert("Su informaci\u00f3n  fue guardada exitosamente");
	}
	</script>
   {/literal}
   {/if *}
    
    <div class="row" id="form_project_title">
        <label for="form_project_title">Nombre del Proyecto: (*)</label>
        <input type="text" id="form_project_title" name="project_title" value="{$smarty.post.project_title}" placeholder="Ej: Proyecto Vi&ntilde;edo"/>
        {include file="lib/error.tpl" error=$fp->getError('project_title')}
    </div>
    
 	<div class="row" id="form_company_container">
        <label for="form_company_ids">Cliente:</label>
        	    <input type="text" id="form_company" name="company" value="{$smarty.post.company}" placeholder="Empresa, sociedad o persona"/>
        		<input type="hidden" id="form_company_id" name="company_id" value="{$smarty.post.company_id}" />
        		<input type="hidden" id="form_company_address" name="company_address" value="{$smarty.post.company_address}" />
        		<input type="hidden" id="form_data_type" name="data_type" value="company" />
        		<input type="hidden" name="doc_type" id="form_doc_type" value="ccompany" />
        		<input type="hidden" name="comp_doc_type" id="form_comp_doc_type" value="project" />
        		<input type="hidden" id="form_project_id" name="project_id" value="{if $smarty.post.project_id}{$smarty.post.project_id}{else}{$company_id2}{/if}" />
            
			<input type="hidden" id="form_addr_id2" name="addr_id2" value="0" />
			<input type="hidden" id="form_comp" name="comp_id" value="0" />

			{if $companieslist || $contactslist}
			{if $companieslist|@count == 0}
			        		 <input type="hidden" id="form_addr_id2" name="addr_id2" value="0" />
						 <input type="hidden" id="form_comp" name="comp_id" value="0" /> 
			{else}
					<input type="hidden" id="form_contact_id" name="contact_id" value="{if $smarty.post.contact_id}{$smarty.post.contact_id}{else}{$contact_id}{/if}">
			{/if}
			{/if}
			
			{if $companieslist || $contactslist}
					{literal}
					<script type="text/javascript">		 
						jQuery(function(){
			  			var companies = [
			    			{/literal}{assign var='i' value=0}{foreach from=$companieslist item=company}{literal}{ value: '{/literal}{$company_[$i]}{literal}', data: '{/literal}{$data_[$i]}{literal}', address: '{/literal}{$addressid[$i]}{literal}', data_type: '{/literal}{$data_type_[$i]}{literal}' },{/literal}{assign var='i' value=$i+1}{/foreach}{foreach from=$contactslist item=contact}{literal}{ value: '{/literal}{$company_[$i]}{literal}', data: '{/literal}{$data_[$i]}{literal}', address: '{/literal}{$addressid[$i]}{literal}', data_type: '{/literal}{$data_type_[$i]}{literal}' },{/literal}{assign var='i' value=$i+1}{/foreach}{literal}
			  			];
			  
			  					// setup autocomplete function pulling from companies[] array
			  						jQuery('#form_company').autocomplete({
			    						lookup: companies,
			    						onSelect: function (suggestion) {
			    						if (suggestion.value && suggestion.data){
			    							jQuery('#form_company').val(suggestion.value);
			      						jQuery('#form_company_id').val(suggestion.data);
			      						jQuery('#form_company_address').val(suggestion.address);
			      						jQuery('#form_data_type').val(suggestion.data_type);
			      					} 
			    					}
			  				});

						});
					</script>	
					{/literal}
			{/if}

        {* <a class="fancybox fancybox.iframe" href="{geturl controller='compania' action='agregarcompania'}?doc_type=ccompany&comp_doc_type=project&project_id={$company_id2}">Agregar</a> *}
  	</div>
    
    <div class="row" id="form_project_start_">
        <label for="form_project_start">Fecha de inicio:</label>
        <input type="text" id="form_project_start" name="start" value="{if $smarty.post.start}{$smarty.post.start}{else}{$now__}{/if}" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
        {include file="lib/error.tpl" error=$fp->getError('start')}
    </div>
    
    <div class="row" id="form_project_ends_">
        <label for="form_project_ends">Fecha de culminaci&oacute;n:</label>
        <input type="text" id="form_project_ends" name="ends" value="{if $smarty.post.ends}{$smarty.post.ends}{else}{$next__}{/if}" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
        {include file="lib/error.tpl" error=$fp->getError('ends')}
    </div>
    
 	<div class="row" id="form_contact_container">
        <label for="form_contact_ids">Responsable:</label>
        	    <input type="text" id="form_responsible" name="responsible" value="{if $smarty.post.responsible}{$smarty.post.responsible}{else}{assign var='id' value=$project->profile->contact_id}{assign var='b' value=0}{foreach from=$contactslist item=contact}{if $data_c[$b] == $id}{$contact_[$b]|ucfirst}{break}{/if}{assign var='b' value=$b+1}{/foreach}{/if}" placeholder="Nombre del Responsable"/>
        		<input type="hidden" id="form_contact_id2" name="contact_id2" value="{if $smarty.post.contact_id2}{$smarty.post.contact_id2}{else}{assign var='id' value=$project->profile->contact_id}{assign var='b' value=0}{foreach from=$contactslist item=contact}{if $data_c[$b] == $id}{$data_c[$b]}{break}{/if}{assign var='b' value=$b+1}{/foreach}{/if}" />
        
        		{literal}
        		<script type="text/javascript"> 	
			jQuery(function(){
  			var contacts = [
    			{/literal}{assign var='i' value=0}{foreach from=$contactslist item=contact}{literal}{ value: '{/literal}{$contact_[$i]}{literal}', data: '{/literal}{$data_c[$i]}{literal}' },{/literal}{assign var='i' value=$i+1}{/foreach}{literal}
  			];
  
  					// setup autocomplete function pulling from contacts[] array
  						jQuery('#form_responsible').autocomplete({
    						lookup: contacts,
    						onSelect: function (suggestion) {
    						if (suggestion.value && suggestion.data){
    							jQuery('#form_responsible').val(suggestion.value);
      						jQuery('#form_contact_id2').val(suggestion.data);
      					} 
    					}
  				});
  				
			});
        		</script>
        		{/literal}
  	</div>
     {*
    <div class="row" id="form_project_team">
        <label for="form_project_team">Equipo:</label>
        <input type="text" id="form_project_team" name="team" value="{$smarty.post.team}" placeholder="Ej: Mercadeo"/>
        {include file="lib/error.tpl" error=$fp->getError('team')}
    </div>
    *}
    <div class="row" id="form_project_budget_">
        <label for="form_project_budge">Presupuesto {if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if}:</label>
        <input type="text" id="form_project_budget" name="budget" value="{$smarty.post.budget}" data-a-dec="," data-a-sep="." placeholder="Importe Presupuesto"/>
        {include file="lib/error.tpl" error=$fp->getError('budget')}
    </div>
	{*
    <div class="row" id="form_project_expense_"> 
        <label for="form_project_expens">Gasto(s) {if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if}:</label>
        <input type="text" id="form_project_expense" name="expense" value="{$smarty.post.expense}" data-a-dec="," data-a-sep="." placeholder="Ej: 121"/>
        {include file="lib/error.tpl" error=$fp->getError('expense')}
    </div>
  	 *}
          {foreach from=$fp->projectProfile key='key' item='label'}
        		<div class="row" id="form_{$key}_container">
                		<label for="form_{$key}">{$label}:</label>
             		<input type="file" class="files" id="form_{$key}" name="{$key}" value="{$smarty.post.$key}"/>
             		{assign var="url" value=$project->profile->$key}
             		{if $url}<a href="/documents/projects/{$url}" target="_blank">Descargar</a>{/if}
                    {include file="lib/error.tpl" error=$fp->getError($key)}
			</div>
        {/foreach}
  
	<div class="row" id="form_project_notes">
    		<label for="form_project_notes">Notas del Proyecto:</label>
    		<textarea id="form_project_notes" name="notes" rows="6" cols="50" placeholder="Coloca aqu&iacute; cualquier nota o comentario personal sobre este proyecto. Lo que escribas s&oacute;lo ser&aacute; visible para los usuarios de tu cuenta.">{$smarty.post.notes}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('notes')}
    	</div>
    	
    {literal}
    <script type="text/javascript"> 		
        		jQuery(document).ready(function() {
       				jQuery('#form_project_budget').autoNumeric("init");
      				jQuery('#form_project_expense').autoNumeric("init");
      		});
     </script>
     {/literal}

	<div class="row">
    		{if $identity->trial_expired}{else}<button class="submit" type="submit" name="add" id="add" value="add">Guardar</button>{/if}
	</div>
	
	<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
    	</div>

</form>

{include file='footer.tpl'}