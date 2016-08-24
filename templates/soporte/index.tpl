{include file='header.tpl' section='soporte' subsection='index'}
<div class="title" id="form_total_invoices">
	<label for="form_total_invoices"><h3>Formulario de Soporte:</h3></label>
</div>
<form id="suppo_form" method="post" action="{geturl action='index'}" enctype="multipart/form-data" />

    {if $fp->hasError()}
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    {else}
    		{if $smarty.get.submitted}
			 {literal}
        		<div class="success">
            		Tu mensaje fue enviado con &eacute;xito.
        		</div>
			 {/literal}
        	{/if}
    {/if}

	{* literal}
    <script type="text/javascript">
        jQuery(document).ready(function() { 
            jQuery('#cont_form').ajaxForm(function() { 
                alert("Gracias! tu informaci\u00f3n fue enviada con \u00e9xito."); 
            }); 
        });
    </script>
   {/literal *}
   
    <div class="row" id="form_support_name">
        <label for="form_support_name">Tu Nombre Completo:</label>
        <input type="text" id="form_name" name="name" value="{$default_name}"  placeholder="Nombre Apellido"/>
        {include file="lib/error.tpl" error=$fp->getError('name')}
    </div>
   
    <div class="row" id="form_support_email">
        <label for="form_support_email">Tu correo electronico:</label>
        <input type="text" id="form_email" name="email" value="{$default_email}" placeholder="Ej: ejemplo@webproadmin.com"/>
        {include file="lib/error.tpl" error=$fp->getError('email')}
    </div>
   
    <div class="row" id="form_subject_">
    	<label for="form_subject__">Selecciona el Asunto:</label>
        <select class="_subject" id="form_subject" name="subject" >
			<option value="Ventas" {if $fp->subject == 'Ventas'} selected="selected" {/if}>Informaci&oacute;n de Ventas</option>
			<option value="Soporte" {if $fp->subject == 'Soporte'} selected="selected" {/if}>Soporte T&eacute;cnico</option>
		</select>
        {* include file="lib/error.tpl" error=$fp->getError('subject') *}
    </div>
   
	<div class="row" id="form_support_message">
    		<label for="form_support_message">Tu Mensaje:</label>
    		<textarea id="form_support_message" class="stored" name="message_content" rows="6" cols="50" placeholder="Com&eacute;ntanos c&oacute;mo podemos ayudarte.">{$smarty.post.message_content}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('message_content')}
    	</div>

	<div class="row">
		<label for="form_source">&nbsp;</label>
    		<button class="submit" type="submit" name="add" id="add" value="add">Contactar a WebProAdmin</button> 
	</div>

</form>

{include file='footer.tpl'}