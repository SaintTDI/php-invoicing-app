jQuery(document).ready(function() {
	
				jQuery(".fancybox").fancybox({
				type: "iframe",
				width: 640, // or whatever
				height: 700,
				afterClose : function() {
					location.reload();
					return;
				}
			});

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			jQuery(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			jQuery(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			jQuery(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			jQuery(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			jQuery('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			jQuery('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			jQuery('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});
				
			///check if input exists
			if(jQuery('#form_budget_date').val()){
				jQuery("#form_budget_date").attr( 'readOnly' , 'true' );
				jQuery("#form_budget_date").datepicker({
	  				onSelect: function() {
	    					jQuery('#form_budget_date').change();
	  				}
				});
			}
	
			if(jQuery('#form_proforma_date').val()){
				jQuery("#form_proforma_date").attr( 'readOnly' , 'true' );
				jQuery("#form_proforma_date").datepicker({
	  				onSelect: function() {
	    					jQuery('#form_proforma_date').change();
	  				}
				});
			}
			
			if(jQuery('#form_expense_date').val()){
				jQuery("#form_expense_date").attr( 'readOnly' , 'true' );
				jQuery("#form_expense_date").datepicker({
	  				onSelect: function() {
	    					jQuery('#form_expense_date').change();
	  				}
				});
			}
		
			if(jQuery('#form_purchase_date').val()){
				jQuery("#form_purchase_date").attr( 'readOnly' , 'true' );
				jQuery("#form_purchase_date").datepicker({
	  				onSelect: function() {
	    					jQuery('#form_purchase_date').change();
	  				}
				});
			}
			
			if(jQuery('#form_invoice_date').val()){
				jQuery("#form_invoice_date").attr( 'readOnly' , 'true' );
				jQuery("#form_invoice_date").datepicker({
	  				onSelect: function() {
	    					jQuery('#form_invoice_date').change();
	  				}
				});
			}
			
			if(jQuery('#form_project_start').val()){
				jQuery("#form_project_start").attr( 'readOnly' , 'true' );
				jQuery("#form_project_start").datepicker({
	  				onSelect: function() {
	    					jQuery('#form_project_start').change();
	  				}
				});
			}

     		if(jQuery('#form_year_start').val()){
				jQuery("#form_year_start").attr( 'readOnly' , 'true' );
				jQuery("#form_year_start").datepicker({
	  				onSelect: function() {
	    					jQuery('#form_year_start').change();
	  				}
				});
			}
			
			if(jQuery('#form_project_ends').val()){
				jQuery("#form_project_ends").attr( 'readOnly' , 'true' );
				jQuery("#form_project_ends").datepicker({
	  				onSelect: function() {
	    					jQuery('#form_project_ends').change();
	  				}
				});
			}
	
			if(jQuery('#form_task_start').val()){
				jQuery("#form_task_start").attr( 'readOnly' , 'true' );
				jQuery("#form_task_start").datepicker({
	  				onSelect: function() {
	    					jQuery('#form_task_start').change();
	  				}
				});
			}
					
			if(jQuery('#form_task_ends').val()){
				jQuery("#form_task_ends").attr( 'readOnly' , 'true' );
				jQuery("#form_task_ends").datepicker({
	  				onSelect: function() {
	    					jQuery('#form_task_ends').change();
	  				}
				});
			}
});

jQuery(window).load(function() {
			
			if(jQuery('#form_datepay').val()){
				jQuery("#form_datepay").attr( 'readOnly' , 'true' );
				jQuery("#form_datepay").datepicker({
	  				onSelect: function() {
	    					jQuery('#form_datepay').change();
	  				}
				});
			}

			if(jQuery('#form_date_time').val()){
				jQuery("#form_date_time").attr( 'readOnly' , 'true' );
				jQuery("#form_date_time").datepicker({
	  				onSelect: function() {
	    					jQuery('#form_date_time').change();
	  				}
				});
			}
});

	// In the following example, markers appear when the user clicks on the map.
	// The markers are stored in an array.
	// The user can then click an option to hide, show or delete the markers.
	var map;
	var markers = [];

	/*function initialize() {
  	var haightAshbury = new google.maps.LatLng(41.38, 2.18);
  	var mapOptions = {
    		zoom: 2,
    		center: haightAshbury,
    		mapTypeId: google.maps.MapTypeId.ROADMAP
  	};
  	
  	map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

  	google.maps.event.addListener(map, 'click', function(event) {
    		addMarker(event.latLng);
    		document.getElementById('form_txtLat').value = event.latLng.lat();
    		document.getElementById('form_txtLng').value = event.latLng.lng();
  		});
	}*/
	
	var placeSearch, autocomplete;
	var componentForm = {
	  street_number: 'long_name',
	  route: 'long_name',
	  locality: 'long_name',
	  administrative_area_level_1: 'long_name',
	  administrative_area_level_2: 'long_name',
	  country: 'short_name',
	  postal_code: 'long_name'
	};
	
	function initialize() {
	var mapOptions = {
	    center: new google.maps.LatLng(37.441883,-122.143019),
	    zoom: 13
	};
	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	
	autocomplete = new google.maps.places.Autocomplete((document.getElementById('autocomplete')), {types: ['geocode']});
	google.maps.event.addListener(autocomplete, 'place_changed', function() {   
	    // Get the place details from the autocomplete object.
	    var place = autocomplete.getPlace();
	    
		for (var component in componentForm) {
		    document.getElementById(component).value = '';
		}
 
	    var newPos = new google.maps.LatLng(place.geometry.location.lat(), place.geometry.location.lng());  
	    map.setOptions({
	        center: newPos,
	        zoom: 15
	    });
	    //add a marker
	    var marker = new google.maps.Marker({
	        position: newPos,
	        map: map,
	        title: "Nuevo Marcador",
	        draggable: true
	    });
	   
    		jQuery('#form_txtLat').val(place.geometry.location.lat());
    		jQuery('#form_txtLng').val(place.geometry.location.lng());
	
	    // Get each component of the address from the place details
	    // and fill the corresponding field on the form.
	    for (var i = 0; i < place.address_components.length; i++) {
	        var addressType = place.address_components[i].types[0];
	        if (componentForm[addressType]) {
	            var val = place.address_components[i][componentForm[addressType]];
	            document.getElementById(addressType).value = val;
	        }
	    }
	});
	
	    	google.maps.event.addListener(marker, 'dragend', function(event) {
    			jQuery('#form_txtLat').val(event.latLng.lat());
    			jQuery('#form_txtLng').val(event.latLng.lng());
		});
	
	}

	/* Add a marker to the map and push to the array.
	function addMarker(location) {
  		var marker = new google.maps.Marker({
    		position: location,
    		map: map
  		});
  		markers.push(marker);
	}

	// Sets the map on all markers in the array.
	function setAllMap(map) {
  		for (var i = 0; i < markers.length; i++) {
    			markers[i].setMap(map);
  		}
	}

	// Removes the markers from the map, but keeps them in the array.
	function clearMarkers() {
  		setAllMap(null);
	}

	// Shows any markers currently in the array.
	function showMarkers() {
  		setAllMap(map);
	}

	// Deletes all markers in the array by removing references to them.
	function deleteMarkers() {
  		clearMarkers();
  		markers = [];
	}*/

   
	function confirmDone() {
   		var r = confirm("El documento ser\u00e1 publicado. Click OK para continuar.");
        if (r) {
            return true;
        }
        else {
        		return false;
            jQuery(".fancybox").close;
        }
	}
	
	function confirmDone5() {
   		var r = confirm("El documento ser\u00e1 eliminado. Click OK para continuar.");
        if (r) {
            return true;
        }
        else {
        		return false;
            jQuery(".fancybox").close;
        }
	}
	
	function confirmDone2() {
   		var r = confirm("El documento ser\u00e1 publicado y transformado a Factura. Click OK para continuar.");
        if (r) {
            return true;
        }
        else {
        		return false;
            jQuery(".fancybox").close;
        }
	}
	
	function confirmDone3() {
   		var r = confirm("El documento ser\u00e1 publicado y transformado a Nota de Gasto. Click OK para continuar.");
        if (r) {
            return true;
        }
        else {
        		return false;
            jQuery(".fancybox").close;
        }
	}

	function confirmDone4() {
   		var r = confirm("Las horas ser\u00e1 facturadas. Click OK para continuar.");
        if (r) {
            return true;
        }
        else {
        		return false;
            jQuery(".fancybox").close;
        }
	}
	
	function confirmDone5() {
   		var r = confirm("La informaci\u00f3n seleccionada ser\u00e1 eliminada. Click OK para continuar.");
        if (r) {
            return true;
        }
        else {
        		return false;
            jQuery(".fancybox").close;
        }
	}
	
	function emailsent() {
   		var r = confirm("La informaci\u00f3n ser\u00e1 enviada al correo del usuario. Click OK para continuar.");
        if (r) {
            return true;
        }
        else {
        		return false;
            jQuery(".fancybox").close;
        }
	}
	
	function hideOptions(selection) {
	  if (selection.value == "employee") {
			document.getElementById('form_accountant').style.display = 'block';
		}
	
	  if (selection.value == "accountant") {
			document.getElementById('form_accountant').style.display = 'none';
		}
    }
    
    function clearLocalStorage(){
    		localStorage.clear();
	}

	google.maps.event.addDomListener(window, 'load', initialize);

    // forceNumeric() plug-in implementation
	function validate(evt) {
		if(evt.keyCode!=8) {
  		var theEvent = evt || window.event;
  		var key = theEvent.keyCode || theEvent.which;
  		key = String.fromCharCode( key );
  		var regex = /[0-9]|\./;
  		if( !regex.test(key) ) {
    			theEvent.returnValue = false;
    		if(theEvent.preventDefault) theEvent.preventDefault();
  		}
  	  }
	}