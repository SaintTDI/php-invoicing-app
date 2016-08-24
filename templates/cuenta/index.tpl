{include file='header.tpl' section='cuenta' subsection='index'}

{if !$fp->hasError()}
    		{if $smarty.get.submitted}
        		<div class="success">
            		Tu plan fue actualizado con &eacute;xito.
        		</div>
        	{/if}
{/if}

<div class="title" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Tu Perfil:</h3></label>
</div>
<div class="left_form">
	  {if $fp->first_name}
	  <div class="ficha_row" id="form_name_container">
		  <label for="form_email">Nombre:</label>
		  <div class="ficha_text">{$fp->first_name|ucfirst} {$fp->middle_name|ucfirst}</div>
	  </div>
	 {/if}
	 {if $fp->last_name}
	  <div class="ficha_row" id="form_name_container">
		  <label for="form_email">Apellido:</label>
		  <div class="ficha_text">{$fp->last_name|ucfirst} {$fp->second_last_name|ucfirst}</div>
	  </div>
	 {/if}
	 {if $fp->email}
     <div class="ficha_row" id="form_email_container">
        <label for="form_email">Correo Electr&oacute;nico:</label>
   		<div class="ficha_text">{$fp->email}</div>
     </div>
     {/if}
	 {if $fp->country}
     <div class="ficha_row" id="form_country_container">
        <label for="form_country">Pa&iacute;s:</label>
   		<div class="ficha_text">{$fp->country}</div>
     </div>
     {/if}
     
	<div class="profile">
	        <label for="bt_">
	        		<a class="submit6" href="{geturl controller='cuenta' action='detalles'}">Editar Perfil</a>
			</label>
	</div>
</div>
{if $identity->user_type == "proprietary"}
	{if $default_company && default_id}
	<div class="right_form">
		  {if $default_company}
		  <div class="ficha_row" id="form_comp_container">
			  {if $identity->user_type == "proprietary" || $identity->user_type == "employee" }<label for="form_email">Tu Empresa:</label>{else}<label for="form_email">Empresa:</label>{/if}
			  <div class="ficha_text">{$default_company|ucfirst}</div>
		  </div>
		 {/if}
		 {if $default_id}
		  <div class="ficha_row" id="form_id_container">
			  <label for="form_email">ID Fiscal:</label>
			  <div class="ficha_text">{$default_id|ucfirst}</div>
		  </div>
		 {/if}
		<div class="profile">
		        <label for="bt_">
		        		<a class="submit6" href="{geturl controller='cuenta' action='empresa'}">Editar Empresa</a>
				</label>
		</div>	
	</div>
	{/if}
{/if}
     {* foreach from=$fp->publicProfile key='key' item='label'}
                {if $label == 'Picture Preview'}
                		{if $fp->$key != ''}
                				{assign var="url" value=$fp->$key}
                            	<img src="/profiles/tmp/pictures/{$url}" />
                     {else}
                            	<img src="/profiles/tmp/pictures/profile.jpg" />
                    {/if} 
                {/if}
     {/foreach}
    
    {if $fp->sex}
     <div class="ficha_row" id="form_sex_container">
    		<label for="form_sex">Sexo:</label>
    		<div class="ficha_text">{$fp->sex|ucfirst}</div>
    </div>
    {/if}
    {if $fp->country}
     <div class="ficha_row" id="form_country_container">
    		<label for="form_country">Pa&iacute;s:</label>
    		<div class="ficha_text">{$fp->country|ucfirst}</div>
    </div>
    {/if}
    {if $fp->region}
     <div class="ficha_row" id="form_region_container">
    		<label for="form_region">Estado o Regi&oacute;n:</label>
    		<div class="ficha_text">{$fp->region|ucfirst}</div>
    </div>
    {/if}
    {if $fp->profession}
     <div class="ficha_row" id="form_profession_container">
    		<label for="form_profession">Profesi&oacute;n u oficio:</label>
    		<div class="ficha_text">{$fp->profession|ucfirst}</div>
    </div>
    {/if}
    {foreach from=$fp->publicProfile key='key' item='label'}
      <div class="ficha_row" id="form_{$key}_container">
             {if $label == 'Bio'}
                {if $fp->$key}
        <label for="form_bio">Descripci&oacute;n:</label>
        <div class="ficha_text">{$fp->$key}</div>
            		{/if}
             {else}
                {if $key == 'public_website'}
                {if $fp->$key}
        <label for="form_{$label}">{$label}:</label>
        <div class="ficha_text"><a target="_blank" href="http://www.{$fp->$key}">{$fp->$key|ucfirst}</a></div>
                {/if}
                {/if}
                {if $key == 'public_twitter'}
                {if $fp->$key}
        <label for="form_{$label}">{$label}:</label>
        <div class="ficha_text"><a target="_blank" href="https://twitter.com/{$fp->$key}">{$fp->$key|ucfirst}</a></div>
                {/if}
                {/if}
                {if $key == 'public_facebook'}
                {if $fp->$key}
        <label for="form_{$label}">{$label}:</label>
        <div class="ficha_text"><a target="_blank" href="https://www.facebook.com/{$fp->$key}">{$fp->$key|ucfirst}</a></div>
                {/if}
                {/if}
                {if $key == 'public_linkedin'}
                {if $fp->$key}
        <label for="form_{$label}">{$label}:</label>
        <div class="ficha_text"><a target="_blank" href="https://www.linkedin.com/{$fp->$key}">{$fp->$key|ucfirst}</a></div>
                {/if}
                {/if}
                {if $key == 'public_youtube'}
                {if $fp->$key}
       <label for="form_{$label}">{$label}:</label>
       <div class="ficha_text"><a target="_blank" href="http://www.youtube.com/channel/{$fp->$key}">{$fp->$key|ucfirst}</a></div>
                {/if}
                {/if}
                {if $key == 'public_googlep'}
                {if $fp->$key}
      <label for="form_{$label}">{$label}:</label>
      <div class="ficha_text"><a target="_blank" href="https://plus.google.com/{$fp->$key}">{$fp->$key|ucfirst}</a></div>
                {/if}
                {/if}
                {if $key == 'public_quora'}
                {if $fp->$key}
     <label for="form_{$label}">{$label}:</label>
     <div class="ficha_text"><a target="_blank" href="http://www.quora.com/{$fp->$key}">{$fp->$key|ucfirst}</a></div>
                {/if}
                {/if}
             {/if}
    {/foreach *}
    
   <div class="plans">
    {if $identity->user_type == "proprietary"}
     <form method="post" id="form_id" action="{geturl action='plan'}" id="registration-form">
        			<div id="plan-title">
						Tu Plan Actual: {if $fp->plan == "plan1"}Plan UNO{elseif $fp->plan == "plan3"}Plan TRES{elseif $fp->plan == "plan5"}Plan CINCO{elseif $fp->plan == "trial_plan1"}Plan UNO (Trial de 30 d&iacute;as gratis){elseif $fp->plan == "trial_plan3"}Plan TRES (Trial de 30 d&iacute;as gratis){elseif $fp->plan == "trial_plan5"}Plan CINCO (Trial de 30 d&iacute;as gratis){/if}
                </div>
                   
				<table class="plan_change">
					<!-- Table header -->
					
						<thead>
							<tr>
								<th scope="col"><img src="/images/icons/number_1_150.png" alt="Plan UNO"></th>
								<th scope="col"><img src="/images/icons/number_3_150.png" alt="Plan TRES"></th>
								<th scope="col"><img src="/images/icons/number_5_150.png" alt="Plan CINCO"></th>
								<th scope="col"><img src="/images/icons/plus_u_150.png" alt="Usuario Adicional"></th>
							</tr>
						</thead>
					
					<!-- Table footer -->
					
						<tfoot>
					        <tr>
					              <td><button class="submit8" value="trial_plan1" name="plan" type="submit">Actualizar Plan</button></td>
					              <td><button class="submit8" value="trial_plan3"  name="plan" type="submit">Actualizar Plan</button></td>
					              <td><button class="submit8" value="trial_plan5" name="plan" type="submit">Actualizar Plan</button></td>
					              <td><button class="submit8" value="trial_user" name="plan" type="submit" disabled>Agregar Usuario</button></td>
					        </tr>
						</tfoot>
					
					<!-- Table body -->
					
						<tbody>
							<tr>
								<td {if $fp->plan == "plan1" || $fp->plan == "trial_plan1"}class="active"{/if}><span>Plan UNO</span></td>
								<td {if $fp->plan == "plan3" || $fp->plan == "trial_plan3"}class="active"{/if}><span>Plan TRES</span></td>
								<td {if $fp->plan == "plan5" || $fp->plan == "trial_plan5"}class="active"{/if}><span>Plan CINCO</span></td>
								<td {if $fp->plan2 == "add" || $fp->plan == "trial_add"}class="active"{/if}><span>Usuario Adicional</span></td>
							</tr>
							
							<tr>
								<td {if $fp->plan == "plan1" || $fp->plan == "trial_plan1"}class="active"{/if}>El plan preferido por aut&oacute;nomos y empresas en per&iacute;odo de arranque. 1 Usuario, con acceso a todas las herramientas de <strong>WebProAdmin</strong>.</td>
								<td {if $fp->plan == "plan3" || $fp->plan == "trial_plan3"}class="active"{/if}>El mejor plan para peque&ntilde;as empresas y despachos. Todas las ventajas del Plan UNO, para 3 usuarios de una misma cuenta.</td>
								<td {if $fp->plan == "plan5" || $fp->plan == "trial_plan5"}class="active"{/if}>El plan para empresas consolidadas, con m&uacute;ltiples equipos de trabajo. Para 5 usuarios. Tu configuras qui&eacute;n tiene acceso a cada herramienta.</td>
								<td {if $fp->plan2 == "add" || $fp->plan == "trial_add"}class="active"{/if}>&iquest;Quieres que otro colaborador tenga acceso a tu cuenta? Agrega un usuario adicional.</td>
							</tr>
						</tbody>
				</table>
    		</form>
    	{/if}
   </div>


{include file='footer.tpl'}