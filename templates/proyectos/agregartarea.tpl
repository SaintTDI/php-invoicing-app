{if $smarty.get.doc_type == 'invoice'}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="es">
<head>
<link rel="stylesheet" href="/css/jquery-ui.css" type="text/css" media="all" /><script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script><script type="text/javascript" src="/js/malsup.js"></script>
{if $authenticated}<link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" />{else}<link rel="stylesheet" href="/css/outside.css" type="text/css" media="all" />{/if}
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
<title>WebProAdmin</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no">
{literal}<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChZwN3axAbbT9k9K3VRX-5LBQwJX76LLM&sensor=false&language=es&region=SP"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
{/literal}</head>
<body>
{else}
{include file='header.tpl' section='proyectos' subsection='agregartarea'}
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Nueva Tarea:</h3></label>
</div>
{/if}
<form method="post" id="projec_id" action="{geturl action='agregartarea'}?id={$fp->task->getId()}" enctype="multipart/form-data">

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
    
    <div class="row" id="form_task_title">
        <label for="form_task_title">Nombre de la Tarea: (*)</label>
        <input type="text" id="form_task_title" name="task_title" value="{$smarty.post.task_title}" placeholder="Ej: Selecci&oacute;n de Materiales"/>
        {include file="lib/error.tpl" error=$fp->getError('task_title')}
    </div>
    
 	<div class="row" id="form_project_container">
        <label for="form_project_ids">Projecto:</label>
        	    <input type="text" id="form_project" name="project" value="{$smarty.post.project}" placeholder="Ej: Proyecto Vi&ntilde;edo"/>
        		<input type="hidden" id="form_project_id" name="project_id" value="{$smarty.post.project_id}" />
        
        		{literal}
        		<script type="text/javascript">
			jQuery(function(){
  			var projects = [
    			{/literal}{assign var='i' value=0}{foreach from=$projectslist item=project}{literal}{ value: '{/literal}{$project_[$i]}{literal}', data: '{/literal}{$data_p[$i]}{literal}' },{/literal}{assign var='i' value=$i+1}{/foreach}{literal}
  			];
  
  					// setup autocomplete function pulling from projects[] array
  						jQuery('#form_project').autocomplete({
    						lookup: projects,
    						onSelect: function (suggestion) {
    						if (suggestion.value && suggestion.data){
    							jQuery('#form_project').val(suggestion.value);
      						jQuery('#form_project_id').val(suggestion.data);
      					} 
    					}
  				});
  				
			});
        		</script>
        		{/literal}
  	</div>
    
    <div class="row" id="form_task_start_">
        <label for="form_task_start">Fecha de inicio:</label>
        <input type="text" id="form_task_start" name="start" value="{if $smarty.post.start}{$smarty.post.start}{else}{$now__}{/if}" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
        {include file="lib/error.tpl" error=$fp->getError('start')}
    </div>
    
    <div class="row" id="form_task_ends_">
        <label for="form_task_ends">Fecha de culminaci&oacute;n:</label>
        <input type="text" id="form_task_ends" name="ends" value="{if $smarty.post.ends}{$smarty.post.ends}{else}{$next__}{/if}" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
        {include file="lib/error.tpl" error=$fp->getError('ends')}
    </div>
    
 	<div class="row" id="form_contact_container">
        <label for="form_contact_ids">Responsable:</label>
        	    <input type="text" id="form_responsible" name="responsible" value="{if $smarty.post.responsible}{$smarty.post.responsible}{else}{assign var='id' value=$task->profile->contact_id}{assign var='b' value=0}{foreach from=$contactslist item=contact}{if $data_c[$b] == $id}{$contact_[$b]|ucfirst}{break}{/if}{assign var='b' value=$b+1}{/foreach}{/if}"  placeholder="Nombre del Responsable"/>
        		<input type="hidden" id="form_contact_id2" name="contact_id2" value="{if $smarty.post.contact_id2}{$smarty.post.contact_id2}{else}{assign var='id' value=$task->profile->contact_id}{assign var='b' value=0}{foreach from=$contactslist item=contact}{if $data_c[$b] == $id}{$data_c[$b]}{break}{/if}{assign var='b' value=$b+1}{/foreach}{/if}" />
        
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
    <div class="row" id="form_task_expense_"> 
        <label for="form_task_expens">Gasto(s) {if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if}:</label>
        <input type="text" id="form_task_expense" name="expense" value="{$smarty.post.expense}" data-a-dec="," data-a-sep="." placeholder="Importe de Gasto"/>
        {include file="lib/error.tpl" error=$fp->getError('expense')}
    </div>
    *}
	<div class="row" id="form_task_notes">
    		<label for="form_task_notes">Descripci&oacute;n de la Tarea:</label>
    		<textarea id="form_task_notes" name="notes" rows="6" cols="50" placeholder="Ej: Se deber&aacute; hacer un listado de los materiales disponibles, destacando su densidad y elasticidad.">{$smarty.post.notes}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('notes')}
    	</div>
    	
    {literal}
    <script type="text/javascript"> 		
        		jQuery(document).ready(function() {
      				jQuery('#form_task_expense').autoNumeric("init");
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