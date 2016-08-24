jQuery(document).ready(function() {
			    // jQuery code in here can safely use $

			    jQuery(".drop")
			        .on('click', function () {
			        	
					var content3 = '<span class=\"cnt2\">[-]</span>';
					var content2 = '<span class=\"cnt\">[+]</span>';
					var aSelected = jQuery(this).find('span.cnt2');
					
			        jQuery(this).toggleClass('open');
			        jQuery(this).find('ul').toggle();
			       	
			       	if (aSelected.hasClass('cnt2')){
			       		jQuery(this).find('span.cnt2').remove();
			       		jQuery(this).closest('li').children('a').append(content2);
			       	}
			       	else {
			       		jQuery(this).find('span.cnt').remove();
			       		jQuery(this).closest('li').children('a').append(content3);
			       	}
			        jQuery.cookie('open_items', 'the_value');
			        openItems = new Array();
			        jQuery("li.drop").each(function (index, item) {
			            if (jQuery(item).hasClass('open')) {
			                openItems.push(index);
			            }
			        });
			        jQuery.cookie('open_items', openItems.join(','));
			    });
			    
			     jQuery("#menu li ul a")
			        .on('click', function (event) {
			            event.stopPropagation();
			        });
			        
					jQuery('#menu > ul > li ul').each(function(index, element){
					  var content = '<span class=\"cnt\">[+]</span>';
					  var content4 = '<span class=\"cnt2\">[-]</span>';
					  var aSelected2 = jQuery(element).find('li');
					  
					  if (aSelected2.hasClass('active')){
					  	jQuery(element).closest('li').children('a').append(content4);
					  }
					  else{
					  	jQuery(element).closest('li').children('a').append(content);
					  }
					});
			
			    /*if (jQuery.cookie('open_items') && jQuery.cookie('open_items').length > 0) {
			        previouslyOpenItems = jQuery.cookie('open_items');
			        openItemIndexes = previouslyOpenItems.split(',');
			        jQuery(openItemIndexes).each(function (index, item) {
			            jQuery("li.drop").eq(item).addClass('open').find('ul').toggle();
			        });
			    }*/
});