{include file='header.tpl' section='proyectos' subsection='tareas'}
<div class="boxes3">
	<div class="title2" id="form_total_project">
		<label for="form_total_invoices"><h3>Tareas:</h3></label>
	</div>
	<div class="boton_top">
	        <label for="bt_">
	       	 	<a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='agregartarea'}"{/if} onclick="clearLocalStorage();">Nueva Tarea</a>
			</label>
	</div>
</div>
{if $tasks|@count == 0}
		<div class="title" id="form_total_invoices">
			<label for="form_total_invoices">No hay tareas registradas</label>
		</div>
{else}
    	   <form method="post" id="projec_id" action="{geturl action='tareas'}">
    	    <table class="table_p">
    	  	 <tr>
    	  		<td class="table_button"><button class="submit7" type="submit" name="delete" id="delete" value="delete" onclick="return confirmDone5()">Borrar</button></td>
			<td class="table_p_top">Tarea</td>
			<td class="table_p_top">Proyecto</td>
			<td class="table_p_top">Inicio</td>
			<td class="table_p_top">Duraci&oacute;n</td>
			<td class="table_p_top">Horas</td>
			<td class="table_p_top">Responsable</td>
		</tr>
        {assign var='i' value=0}{foreach from=$tasks item=task}
			<tr>
				<td class="table_input"><input type="checkbox" name="task_id[]" value="{$task->getId()}"></td>
				<td class="links"><span><a {if $identity->trial_expired}{else}href="{geturl action='editartarea'}?id={$task->getId()}"{/if}>{$task->profile->task_title|ucfirst}</a></span></td>
				<td>{$task->profile->project|ucfirst}</td>
				<td>{if $task->profile->start}{$task->profile->start}{else}N/A{/if}</td>
				<td>{$timeleft[$task->getId()]}</td>
				<td>{$hours2[$task->getId()]}</td>
				<td>{$task->profile->responsible|ucfirst}</td>
			</tr>
        {assign var='i' value=$i+1}{/foreach}
       </table>
      </form>
{/if}



{include file='footer.tpl'}