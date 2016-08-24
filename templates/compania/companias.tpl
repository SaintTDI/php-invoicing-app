{if $companieslist}
{if $companieslist|@count == 0}
        		 <input type="hidden" id="form_addr_id2" name="addr_id2" value="0" />
			 <input type="hidden" id="form_comp" name="comp_id" value="0" /> 
{else}
		<input type="hidden" id="form_contact_id" name="contact_id" value="{$contact_id}">
{/if}
{/if}

{if $companieslist}
		{literal}
		<script type="text/javascript">		 
			jQuery(function(){
  			var companies = [
    			{/literal}{assign var='i' value=0}{foreach from=$companieslist item=company}{literal}{ value: '{/literal}{$company_[$i]}{literal}', data: '{/literal}{$data_[$i]}{literal}', address: '{/literal}{$addressid[$i]}{literal}' },{/literal}{assign var='i' value=$i+1}{/foreach}{literal}
  			];
  
  					// setup autocomplete function pulling from companies[] array
  						jQuery('#form_company').autocomplete({
    						lookup: companies,
    						onSelect: function (suggestion) {
    						if (suggestion.value && suggestion.data){
    							jQuery('#form_company').val(suggestion.value);
      						jQuery('#form_company_id').val(suggestion.data);
      						jQuery('#form_addr_id2').val(suggestion.address);
      						var thehtml2 = '<span><a class="fancybox fancybox.iframe" href="{/literal}{geturl controller='compania' action='editarcompania'}{literal}?id=' + suggestion.data + '&id2=' + suggestion.address + '&doc_type=ccompany&doc_id=' + suggestion.data + '&contact_id={/literal}{$contact_id}&popup=true{literal}">' + suggestion.value + '</a></span>';
      						jQuery('#outputcontent').html(thehtml2);
      					} 
    					}
  				});
  			
  					 jQuery('#form_company').bind('input', function() { 
    							jQuery(this).val();
      						jQuery('#form_company_id').val("");
      						jQuery('#form_addr_id2').val("");
					});
			});
		</script>	
		{/literal}
{/if}