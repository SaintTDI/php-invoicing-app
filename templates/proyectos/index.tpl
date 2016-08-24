{include file='header.tpl' section='proyectos' subsection='index'}
<div class="boxes3">
	<div class="title2" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Proyectos:</h3></label>
	</div>
	<div class="boton_top">
	        <label for="bt_">
	       	 	<a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='agregar'}"{/if} onclick="clearLocalStorage();">Nuevo proyecto</a>
			</label>
	</div>
</div>
{$out}

<div class="title" id="form_total_project">
	<label for="form_total_invoices"><h3>Directorio de Proyectos:</h3></label>
</div>

{if $projects|@count == 0}
		<div class="title" id="form_total_invoices">
			<label for="form_total_invoices">No tiene proyectos actualmente.</label>
		</div>
		<div id="parrafo2">
		        <p>&#x2771; Controla las finanzas de cada uno de tus Proyectos. Establece tareas y as&iacute;gnales un l&iacute;der. Cronometra tu tiempo si has de facturar tu trabajo por horas.</p>
		</div>
		<div id="parrafo6">
		        <p>&#x2771; En cada proyecto tambi&eacute;n tendr&aacute;s un relaci&oacute;n de todos los documentos vinculados, para que agilices tu gesti&oacute;n.</p>
		</div>
{else}
    	   <form method="post" id="projec_id" action="{geturl action='index'}">
    	    <table class="table_p">
    	  	 <tr>
    	  		<td class="table_button"><button class="submit7" type="submit" name="delete" id="delete" value="delete" onclick="return confirmDone5()">Borrar</button></td>
			<td class="table_p_top">Proyecto</td>
			<td class="table_p_top">Cliente</td>
			<td class="table_p_top">Inicio</td>
			<td class="table_p_top">Duraci&oacute;n</td>
			<td class="table_p_top">Prespuesto {if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if}</td>
			<td class="table_p_top">Responsable</td>
			{* <td class="table_p_top">Gasto {if $default_currency == 'Peso Argentino'}(&#36;){elseif $default_currency == 'Peso Boliviano'}(b&#36){elseif $default_currency == 'Peso Chileno'}(&#36;){elseif $default_currency == 'Peso Colombiano'}(&#36;){elseif $default_currency == 'Colon'}(&#162;){elseif $default_currency == 'Peso Dominicano'}(&#36;){elseif $default_currency == 'Dolar'}(&#36;){elseif $default_currency == 'Euro'}(&#128;){elseif $default_currency == 'Quetzal'}(Q){elseif $default_currency == 'Lempira'}(L){elseif $default_currency == 'Peso Mexicano'}(&#36;){elseif $default_currency == 'Cordoba'}(C&#36;){elseif $default_currency == 'Balboa'}(B/.){elseif $default_currency == 'Guarani'}(&#8370;){elseif $default_currency == 'Nuevo Sol'}(S/.){elseif $default_currency == 'Libra'}(&#163;){elseif $default_currency == 'Peso Uruguayo'}(&#36;){elseif $default_currency == 'Bolivar'}(Bs.){else}(&#128;){/if}</td> *}
		</tr>
        {assign var='i' value=0}{foreach from=$projects item=project}
			<tr>
				<td class="table_input"><input type="checkbox" name="project_id[]" value="{$project->getId()}"></td>
				<td class="links"><span><a {if $identity->trial_expired}{else}href="{geturl action='fichaproyecto'}?id={$project->getId()}"{/if}>{$project->project_title|ucfirst}</a></span></td>
				<td>{$project->profile->client|ucfirst}</td>
				<td>{if $project->profile->start}{$project->profile->start}{else}N/A{/if}</td>
				<td>{$timeleft[$project->getId()]}</td>
				<td>{$project->profile->budget|number_format:2:',':'.'}</td>
				<td>{$project->profile->responsible|ucfirst|substr:0:30}</td>
				{* <td>{$expenses[$project->getId()]|number_format:2:',':'.'}</td> *}
			</tr>
        {assign var='i' value=$i+1}{/foreach}
       </table>
      </form>
{/if}

{include file='footer.tpl'}