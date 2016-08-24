{include file='header.tpl' section='proyectos' subsection='horas'}

{literal}
<script type="text/javascript">
		function openpopup(popurl,winName){
		    winpops=window.open(popurl,winName,'toolbar=no,location=no,status=no,menubar=yes,scrollbars=no,resizable=yes,width=650px,height=750px,left=200px,top=200px,scrollbars=no',true)
		    winpops.focus();
		} 
</script>
{/literal}
<div class="boxes3">
	<div class="title2" id="form_total_project">
		<label for="form_total_invoices"><h3>Contador Horas:</h3></label>
	</div>
	<div class="boton_top">
	        <label for="bt_"><a class="submit6" {if $identity->trial_expired}{else}href="{geturl controller='proyectos' action='agregarhora'}?doc_type=ventana" {literal}onclick="openpopup(this.href,'window1'); return false;"{/literal}{/if}>Agregar Horas</a></label>
	</div>
</div>

{if $times|@count == 0}
		<div class="title" id="form_total_invoices">
			<label for="form_total_invoices">No hay Horas registradas.</label>
		</div>
{else}
    	   <form method="post" id="projec_id" action="{geturl action='horas'}">
    	    <table class="table_p">
    	  	 <tr>
    	  		<td class="table_button"><button class="submit7" type="submit" name="delete" id="delete" value="delete" onclick="return confirmDone5()">Borrar</button></td>
			<td class="table_p_top">Fecha</td>
			<td class="table_p_top">Proyecto</td>
			<td class="table_p_top">Tarea</td>
			<td class="table_p_top">Duraci&oacute;n</td>
			<td class="table_button"><button class="submit7" type="submit" name="convert" id="convert" value="convert" onclick="return confirmDone4()">Facturar</button></td>
		</tr>
        {assign var='i' value=0}{foreach from=$times item=time}
			<tr>
				<td class="table_input"><input type="checkbox" id="form_time_id" name="time_id[]" value="{$time->getId()}"></td>
				<td class="links"><span>{if $time->profile->transformed}{$time->profile->date_time|ucfirst}{else}<a {if $identity->trial_expired}{else}href="{geturl controller='proyectos' action='editarhora'}?id={$time->getId()}&doc_type=ventana" {literal}onclick="openpopup(this.href,'window2'); return false;"{/literal}{/if}>{$time->profile->date_time|ucfirst}</a>{/if}</span></td>
				<td>{if $time->profile->project}{$time->profile->project|ucfirst}{else}N/A{/if}</td>
				<td>{if $time->profile->task}{$time->profile->task|ucfirst}{else}N/A{/if}</td>
				<td>{$time->profile->time_}</td>
				<td class="table_input"><input type="checkbox" id="form_time_id2" name="time_id2[]" value="{$time->getId()}" {if $time->profile->transformed}disabled{/if}></td>
			</tr>
        {assign var='i' value=$i+1}{/foreach}
       </table>
      </form>
{/if}


{include file='footer.tpl'}