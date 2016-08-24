{include file='header.tpl' active='cuenta'}

<form method="post" action="{geturl action='confirmapproval'}" id="myform"><input type="hidden" id="form_plan" name="plan" value="plan1"/>
<button class="submit3" type="submit"></button></form>


{literal}
		<script type="text/javascript">
  			jQuery(document).ready(function() {
    				window.document.forms["myform"].submit();
  			});
		</script>
{/literal}

{include file='footer.tpl'}