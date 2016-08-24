{include file='header.tpl' section='usuarios' subsection='index'}
<div class="boxes3">
<div class="title2" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Directorio de Usuarios: </h3></label>
</div>
<div class="boton_top">
{if $plan == "plan1" || $plan == "trial_plan1"}
	{if $a == 0 || $b == 0}
	        <label for="bt_"><a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='agregar'}"{/if} onclick="clearLocalStorage();">Nuevo Usuario</a></label>
	{/if}
{/if}
{if $plan == "plan3" || $plan == "trial_plan3"}
	{if $a == 0 || $b == 0 || $c < 2}
		{if $b > 0 && $c > 1}
	        <label for="bt_"><a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='agregar'}?acc=1&emp=1"{/if} onclick="clearLocalStorage();">Nuevo Usuario</a></label>
		{elseif $b > 0}
	        <label for="bt_"><a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='agregar'}?acc=1"{/if} onclick="clearLocalStorage();">Nuevo Usuario</a></label>
		{elseif $c > 1}
	        <label for="bt_"><a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='agregar'}?emp=1"{/if} onclick="clearLocalStorage();">Nuevo Usuario</a></label>
	    {else}
	    		<label for="bt_"><a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='agregar'}"{/if} onclick="clearLocalStorage();">Nuevo Usuario</a></label>
	    {/if}
	{/if}
{/if}
{if $plan == "plan5" || $plan == "trial_plan5"}
	{if $a == 0 || $b == 0 || $c < 4}
		{if $b > 0 && $c > 3}
	        <label for="bt_"><a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='agregar'}?acc=1&emp=1"{/if} onclick="clearLocalStorage();">Nuevo Usuario</a></label>
		{elseif $b > 0}
	        <label for="bt_"><a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='agregar'}?acc=1"{/if} onclick="clearLocalStorage();">Nuevo Usuario</a></label>
		{elseif $c > 3}
	        <label for="bt_"><a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='agregar'}?emp=1"{/if} onclick="clearLocalStorage();">Nuevo Usuario</a></label>
	    {else}
	    		<label for="bt_"><a class="submit6" {if $identity->trial_expired}{else}href="{geturl action='agregar'}"{/if} onclick="clearLocalStorage();">Nuevo Usuario</a></label>
	    {/if}
	{/if}
{/if}
{if $plan2}
	{if $d == 0}
	        <label for="bt_"><a class="submit6" href="{geturl action='agregar'}" onclick="clearLocalStorage();">Nuevo Usuario</a></label>
	{/if}
{/if}
</div>
</div>

{if $users|@count == 0}
{else}   
    	   <form method="post" action="{geturl action='index'}">
    	    <table class="table_p">
    	  	 <tr>
    	  		<td class="table_button"><button class="submit7" type="submit" name="delete" id="delete" value="delete" onclick="return confirmDone5()">Borrar</button></td>
			<td class="table_p_top">Nombres</td>
			<td class="table_p_top">Apellidos</td>
			<td class="table_p_top">Email</td>
			<td class="table_p_top">Perfil</td>
			<td class="table_p_top">Usuario</td>
		</tr>
        {assign var='i' value=0}{assign var='a' value=0}{assign var='b' value=0}{assign var='c' value=0}{assign var='d' value=0}{foreach from=$users item=user}{if $user->user_type == "proprietary"}{assign var='user_type' value="Administrador"}{elseif $user->user_type == "employee"}{assign var='user_type' value="Colaborador"}{else}{assign var='user_type' value="Contador"}{/if}
			{if $user->profile->plan == "plan1" || $user->profile->plan == "trial_plan1"}
				{if $user->user_type == "proprietary" && $a == 0}
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="{$user->getId()}" {if $user->user_type == "proprietary"}disabled="disabled"{/if}></td>
						<td>{$user->profile->first_name|ucfirst}</td>
						<td class="links"><span>{if $user_type == "Administrador"}{$user->profile->last_name|ucfirst}{else}<a {if $identity->trial_expired}{else}href="{geturl action='editar'}?id={$user->getId()}"{/if}>{$user->profile->last_name|ucfirst}</a>{/if}</span></td>
						<td class="links"><a href="mailto:{$user->profile->email}">{$user->profile->email}</a></td>
						<td>{$user_type|ucfirst}</td>
						<td>{$user->username}</td>{assign var='a' value=$a+1}
					</tr>
				{elseif $user->user_type == "accountant" && $b == 0}
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="{$user->getId()}" {if $user->user_type == "proprietary"}disabled="disabled"{/if}></td>
						<td>{$user->profile->first_name|ucfirst}</td>
						<td class="links"><span>{if $user_type == "Administrador"}{$user->profile->last_name|ucfirst}{else}<a {if $identity->trial_expired}{else}href="{geturl action='editar'}?id={$user->getId()}"{/if}>{$user->profile->last_name|ucfirst}</a>{/if}</span></td>
						<td class="links"><a href="mailto:{$user->profile->email}">{$user->profile->email}</a></td>
						<td>{$user_type|ucfirst}</td>
						<td>{$user->username}</td>{assign var='b' value=$b+1}
					</tr>
				{/if}
			{/if}
			{if $user->profile->plan == "plan3" || $user->profile->plan == "trial_plan3"}
				{if $user->user_type == "proprietary" && $a == 0}
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="{$user->getId()}" {if $user->user_type == "proprietary"}disabled="disabled"{/if}></td>
						<td>{$user->profile->first_name|ucfirst}</td>
						<td class="links"><span>{if $user_type == "Administrador"}{$user->profile->last_name|ucfirst}{else}<a {if $identity->trial_expired}{else}href="{geturl action='editar'}?id={$user->getId()}{if $b > 0}&acc=1{/if}"{/if}>{$user->profile->last_name|ucfirst}</a>{/if}</span></td>
						<td class="links"><a href="mailto:{$user->profile->email}">{$user->profile->email}</a></td>
						<td>{$user_type|ucfirst}</td>
						<td>{$user->username}</td>{assign var='a' value=$a+1}
					</tr>
				{elseif $user->user_type == "accountant" && $b == 0}
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="{$user->getId()}" {if $user->user_type == "proprietary"}disabled="disabled"{/if}></td>
						<td>{$user->profile->first_name|ucfirst}</td>
						<td class="links"><span>{if $user_type == "Administrador"}{$user->profile->last_name|ucfirst}{else}<a {if $identity->trial_expired}{else}href="{geturl action='editar'}?id={$user->getId()}"{/if}>{$user->profile->last_name|ucfirst}</a>{/if}</span></td>
						<td class="links"><a href="mailto:{$user->profile->email}">{$user->profile->email}</a></td>
						<td>{$user_type|ucfirst}</td>
						<td>{$user->username}</td>{assign var='b' value=$b+1}
					</tr>
				{elseif $user->user_type == "employee" && $c < 2}
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="{$user->getId()}" {if $user->user_type == "proprietary"}disabled="disabled"{/if}></td>
						<td>{$user->profile->first_name|ucfirst}</td>
						<td class="links"><span>{if $user_type == "Administrador"}{$user->profile->last_name|ucfirst}{else}<a {if $identity->trial_expired}{else}href="{geturl action='editar'}?id={$user->getId()}{if $b > 0}&acc=1{/if}"{/if}>{$user->profile->last_name|ucfirst}</a>{/if}</span></td>
						<td class="links"><a href="mailto:{$user->profile->email}">{$user->profile->email}</a></td>
						<td>{$user_type|ucfirst}</td>
						<td>{$user->username}</td>{assign var='c' value=$c+1}
					</tr>
				{/if}
			{/if}
			{if $user->profile->plan == "plan5" || $user->profile->plan == "trial_plan5"}
				{if $user->user_type == "proprietary" && $a == 0}
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="{$user->getId()}" {if $user->user_type == "proprietary"}disabled="disabled"{/if}></td>
						<td>{$user->profile->first_name|ucfirst}</td>
						<td class="links"><span>{if $user_type == "Administrador"}{$user->profile->last_name|ucfirst}{else}<a {if $identity->trial_expired}{else}href="{geturl action='editar'}?id={$user->getId()}{if $b > 0}&acc=1{/if}"{/if}>{$user->profile->last_name|ucfirst}</a>{/if}</span></td>
						<td class="links"><a href="mailto:{$user->profile->email}">{$user->profile->email}</a></td>
						<td>{$user_type|ucfirst}</td>
						<td>{$user->username}</td>{assign var='a' value=$a+1}
					</tr>
				{elseif $user->user_type == "accountant" && $b == 0}
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="{$user->getId()}" {if $user->user_type == "proprietary"}disabled="disabled"{/if}></td>
						<td>{$user->profile->first_name|ucfirst}</td>
						<td class="links"><span>{if $user_type == "Administrador"}{$user->profile->last_name|ucfirst}{else}<a {if $identity->trial_expired}{else}href="{geturl action='editar'}?id={$user->getId()}"{/if}>{$user->profile->last_name|ucfirst}</a>{/if}</span></td>
						<td class="links"><a href="mailto:{$user->profile->email}">{$user->profile->email}</a></td>
						<td>{$user_type|ucfirst}</td>
						<td>{$user->username}</td>{assign var='b' value=$b+1}
					</tr>
				{elseif $user->user_type == "employee" && $c < 4}
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="{$user->getId()}" {if $user->user_type == "proprietary"}disabled="disabled"{/if}></td>
						<td>{$user->profile->first_name|ucfirst}</td>
						<td class="links"><span>{if $user_type == "Administrador"}{$user->profile->last_name|ucfirst}{else}<a {if $identity->trial_expired}{else}href="{geturl action='editar'}?id={$user->getId()}{if $b > 0}&acc=1{/if}"{/if}>{$user->profile->last_name|ucfirst}</a>{/if}</span></td>
						<td class="links"><a href="mailto:{$user->profile->email}">{$user->profile->email}</a></td>
						<td>{$user_type|ucfirst}</td>
						<td>{$user->username}</td>{assign var='c' value=$c+1}
					</tr>
				{/if}
			{/if}
			{if $user->profile->plan2}
				{if $user->user_type == "employee" && $d == 0}
					<tr>
						<td class="table_input"><input type="checkbox" name="user_id[]" value="{$user->getId()}" {if $user->user_type == "proprietary"}disabled="disabled"{/if}></td>
						<td>{$user->profile->first_name|ucfirst}</td>
						<td class="links"><span>{if $user_type == "Administrador"}{$user->profile->last_name|ucfirst}{else}<a {if $identity->trial_expired}{else}href="{geturl action='editar'}?id={$user->getId()}"{/if}>{$user->profile->last_name|ucfirst}</a>{/if}</span></td>
						<td class="links"><a href="mailto:{$user->profile->email}">{$user->profile->email}</a></td>
						<td>{$user_type|ucfirst}</td>
						<td>{$user->username}</td>{assign var='d' value=$d+1}
					</tr>
				{/if}
			{/if}
        {assign var='i' value=$i+1}{/foreach}
       </table>
      </form>
{/if}

{include file='footer.tpl'}