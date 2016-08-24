{if $smarty.get.doc_type == 'ventana'}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="es">
<head>
{if $authenticated}<link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" />{else}<link rel="stylesheet" href="/css/outside.css" type="text/css" media="all" />{/if}
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
<title>WebProAdmin</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no">
{literal}<script type="text/javascript" src="/js/scripts.js"></script>
<link rel="stylesheet" href="/css/jquery-ui.css" type="text/css" media="all" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/malsup.js"></script>
<script type="text/javascript" src="/js/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="/js/autoNumeric.js"></script>
<script type="text/javascript" src="/js/jquery.timer.js"></script>
{/literal}</head>
<body {literal}style="margin:20px;padding:0"{/literal}>
{else}
{include file='header.tpl' section='proyectos' subsection='agregarhora'}
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Nuevo Registro de Horas:</h3></label>
</div>
{/if}
<form method="post" id="projec_id" action="{geturl action='agregarhora'}?id={$fp->time->getId()}" enctype="multipart/form-data">

    {if $fp->hasError()}
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    {/if}
    
    {if $smarty.get.doc_type == 'ventana'}
    {literal}
    <script type="text/javascript">
	/**
	 * jQuery Timer doesn't natively act like a stopwatch, it only
	 * aids in building one.  You need to keep track of the current
	 * time in a variable and increment it manually.  Then on each
	 * incrementation, update the page.
	 */
	var Example1 = new (function() {
	    var $stopwatch, // Stopwatch element on the page
	    		$value_,
	        incrementTime = 60, // Timer speed in milliseconds
	        currentTime = 0, // Current time in hundredths of a second
	        updateTimer = function() {
	        		var timeString = formatTime(currentTime);
	       		$stopwatch.html(timeString);
	       		$value_ = formatTime(currentTime);
	       		$value_2 = currentTime;
	            currentTime += incrementTime;
	            jQuery('#form_time_').val($value_);
	            jQuery('#form_time_2').val($value_2);
	        },
	        init = function() {
	            $stopwatch = jQuery('#stopwatch');
	            Example1.Timer = jQuery.timer(updateTimer, incrementTime, false);
	        };
	    this.resetStopwatch = function() {
	        currentTime = 0;
	        this.Timer.stop().once();
	    };
	    jQuery(init);
	});
	</script>
	<script>
	    window.onunload = refreshParent;
	    function refreshParent() {
	        window.opener.location.reload();
	    }
	</script>
   {/literal}
   {else}
   {literal}
    <script type="text/javascript">
	/**
	 * jQuery Timer doesn't natively act like a stopwatch, it only
	 * aids in building one.  You need to keep track of the current
	 * time in a variable and increment it manually.  Then on each
	 * incrementation, update the page.
	 */
	var Example1 = new (function() {
	    var $stopwatch, // Stopwatch element on the page
	    		$value_,
	        incrementTime = 60, // Timer speed in milliseconds
	        currentTime = 0, // Current time in hundredths of a second
	        updateTimer = function() {
	        		var timeString = formatTime(currentTime);
	       		$stopwatch.html(timeString);
	       		$value_ = formatTime(currentTime);
	       		$value_2 = currentTime;
	            currentTime += incrementTime;
	            jQuery('#form_time_').val($value_);
	            jQuery('#form_time_2').val($value_2);
	        },
	        init = function() {
	            $stopwatch = jQuery('#stopwatch');
	            Example1.Timer = jQuery.timer(updateTimer, incrementTime, false);
	        };
	    this.resetStopwatch = function() {
	        currentTime = 0;
	        this.Timer.stop().once();
	    };
	    jQuery(init);
	});
	</script>
   {/literal}
   {/if}
   
    <div class="row" id="form_date_time">
        <label for="form_date_time">Fecha de la actividad:</label>
        <input type="text" id="form_date_time" name="date_time" value="{if $smarty.post.date_time}{$smarty.post.date_time}{else}{$now__}{/if}" placeholder="D&iacute;a-Mes-A&ntilde;o"/>
        {include file="lib/error.tpl" error=$fp->getError('date_time')}
    </div>
	<div class="row" id="form_date__">
				<label for="form_time_">Cron&oacute;metro: <span id="stopwatch">00 Horas 00 Minutos 00 Segundos</span></label>
        			<button class="submit9" type="button" value='Play/Pausa' onclick='Example1.Timer.toggle();'>Play/Pausa</button> 
       		 	{* <input type='button' value='Resetear' onclick='Example1.resetStopwatch();' /> *}
       		 	<input type="hidden" id="form_time_" name="time_" />
       		 	<input type="hidden" id="form_time_2" name="time_2" />
         		{include file="lib/error.tpl" error=$fp->getError('time_')}
    </div>
      
    <div class="row" id="form_time_hours_"> 
        <label for="form_time_expens">Tiempo en Horas:</label>
        <input type="text" id="form_time_hours" name="hours" value="{$smarty.post.hours}" data-a-dec="," data-a-sep="." placeholder="Ej: 2,5"/>
        {include file="lib/error.tpl" error=$fp->getError('hours')}
    </div>
    
    <div class="row" id="form_rate_hours_"> 
        <label for="form_time_expens">Tarifa {if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if}:</label>
        <input type="text" id="form_rate_hours" name="rate" value="{$smarty.post.rate}" data-a-dec="," data-a-sep="." placeholder="Tarifa por Hora"/>
        {include file="lib/error.tpl" error=$fp->getError('rate')}
    </div>
    
 	<div class="row" id="form_project_container">
        <label for="form_project_ids">Proyecto:</label>
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
  	
 	<div class="row" id="form_task_container">
        <label for="form_task_ids">Tarea:</label>
        	    <input type="text" id="form_task" name="task" value="{$smarty.post.task}" placeholder="Ej: Selecci&oacute;n de Materiales"/>
        		<input type="hidden" id="form_task_id" name="task_id" value="{$smarty.post.task_id}" />
        
        		{literal}
        		<script type="text/javascript">
			jQuery(function(){
  			var tasks = [
    			{/literal}{assign var='i' value=0}{foreach from=$taskslist item=task}{literal}{ value: '{/literal}{$task_[$i]}{literal}', data: '{/literal}{$data_t[$i]}{literal}' },{/literal}{assign var='i' value=$i+1}{/foreach}{literal}
  			];
  
  					// setup autocomplete function pulling from tasks[] array
  						jQuery('#form_task').autocomplete({
    						lookup: tasks,
    						onSelect: function (suggestion) {
    						if (suggestion.value && suggestion.data){
    							jQuery('#form_task').val(suggestion.value);
      						jQuery('#form_task_id').val(suggestion.data);
      					} 
    					}
  				});
  				
			});
        		</script>
        		{/literal}
  	</div>
  
	<div class="row" id="form_time_notes">
    		<label for="form_time_notes">Descripci&oacute;n de la actividad:</label>
    		<textarea id="form_time_notes" name="notes" rows="6" cols="50" placeholder="Ej: Se deber&aacute; hacer un listado de los materiales disponibles, destacando su densidad y elasticidad.">{$time->profile->notes}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('notes')}
    	</div>
    	
    {literal}
    <script type="text/javascript"> 		
        		jQuery(document).ready(function() {
      				jQuery('#form_time_hours').autoNumeric("init");
      				jQuery('#form_rate_hours').autoNumeric("init");
      		});
     </script>
     {/literal}

	<div class="row">
    		{if $identity->trial_expired}{else}<button class="submit" type="submit" name="add" id="add" value="add">Registrar</button>{/if}
	</div>
	
	<div class="row" id="form_contact_notes">
    		<span class="footnote">Los campos marcados con asterisco (*) son obligatorios</span>
    	</div>

	</form>         
    </body>
</html>