<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="es">
<head>
<link rel="stylesheet" href="/css/jquery-ui.css" type="text/css" media="all" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/malsup.js"></script>
{if $authenticated}<link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" />{else}<link rel="stylesheet" href="/css/outside.css" type="text/css" media="all" />{/if}
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
<title>WebProAdmin</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no">
{if $address->profile->txtLat && $address->profile->txtLng}	
{literal}<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&language=es"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
<script type="text/javascript">
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

	function initialize2() {
    var Latlng = new google.maps.LatLng({/literal}{if $address->profile->txtLat && $address->profile->txtLng}{$address->profile->txtLat}, {$address->profile->txtLng}{/if}{literal});
    var mapOptions = {
    zoom: 13,
    center: Latlng
    };
    
	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    
	var marker = new google.maps.Marker({
	      position: Latlng,
	      map: map,
	      title: 'Domicilio',
	      draggable: true,
	      noClear: false
	});
	
	google.maps.event.addListener(marker, 'dragend', function(event) {
    		jQuery('#form_txtLat').val(event.latLng.lat());
    		jQuery('#form_txtLng').val(event.latLng.lng());
	});
  
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
  }
  google.maps.event.addDomListener(window, 'load', initialize2);
</script>
{/literal}
{else}
{literal}<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&language=es"></script>
<script type="text/javascript" src="/js/scripts.js"></script>{/literal}
{/if}
</head>
<body id="popup">
<form method="post" id="comp_id" action="{geturl action='editardireccion'}?id={$fp->address->getId()}" enctype="multipart/form-data">

    {if $fp->hasError()}
        		<div class="error">
            		Por favor revisa los campos resaltados.
        		</div>
    {else}
    		{if $smarty.get.submitted}
			 {literal}
			 <script type="text/javascript">
			  jQuery(window).load(function()  {
				parent.jQuery.fancybox.close(); 
			 });
			 </script>
			 {/literal}
        	{/if}
    {/if}

	{if $smarty.get.command == 'cerrar'}
	    {literal}
	    <script type="text/javascript">
	        		jQuery(window).load(function()  {
				     	parent.jQuery.fancybox.close(); 
	      		});
	     </script>
	     {/literal}
    {/if}

	{if $address->doc_type != "contact"}
     <div class="row" id="form_address_type_container">
    	<label for="form_address_type_unit">Tipo de direcci&oacute;n:</label>
        <select id="form_address_type" name="type"/>
			<option value="fiscal" {if $address->profile->type == 'fiscal' or $address->profile->type == ''} selected="selected" {/if}>Fiscal</option>
			<option value="fisica" {if $address->profile->type == 'fisica'} selected="selected" {/if}>F&iacute;sica</option>
        		<option value="postal" {if $address->profile->type == 'postal'} selected="selected" {/if}>Postal</option>
		</select>
        {include file="lib/error.tpl" error=$fp->getError('type')}
    </div>
    {else}
    <input type="hidden" id="form_address_type" name="type" value="fisica" />
    {/if}
    <div class="row" id="form_search_address_container">
        <label for="form_search_address">Buscar Direcci&oacute;n:</label>
        <input class="search_input" type="text" id="autocomplete" name="search" value="{$smarty.post.search}" placeholder="Busca un lugar, calle o ciudad"/>
    </div>
    
    <div class="row" id="form_street_address_container">
        <label for="form_street_address">Calle o Avenida<strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="route" name="street" value="{$address->profile->street}" placeholder="Calle o Avenida"/>
        {include file="lib/error.tpl" error=$fp->getError('street')}
    </div>
    
    <div class="row" id="form_house_address_container">
        <label for="form_house_address">N&uacute;mero, Casa o Edificio:</label>
        <input type="text" id="street_number" name="house" value="{$address->profile->house}" placeholder="N&uacute;mero, Casa o Edificio"/>
        {include file="lib/error.tpl" error=$fp->getError('house')}
    </div>
   {*
	<div class="row" id="form_address_reference_container">
    		<label for="form_address_reference">Referencias:</label>
    		<textarea id="form_address_reference" name="reference" rows="10" cols="50">{$address->profile->reference}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('reference')}
    	</div>
    *}
    <input type="hidden" id="form_address_reference" name="reference" value="N/A" />
    
    <div class="row" id="form_city_address_container">
        <label for="form_city_address">Ciudad:</label>
        <input type="text" id="locality" name="city" value="{$address->profile->city}" placeholder="Ciudad"/>
        {include file="lib/error.tpl" error=$fp->getError('city')}
    </div>

    <div class="row" id="form_province_address_container">
        <label for="form_provinceaddress_">Provincia o Distrito:</label>
        <input type="text" id="administrative_area_level_2" name="province" value="{$address->profile->province}" placeholder="Provincia o Distrito"/>
        {include file="lib/error.tpl" error=$fp->getError('province')}
    </div>
    
    <div class="row" id="form_state_address_container">
        <label for="form_state_address_">Comunidad Aut&oacute;noma o Estado:</label>
        <input type="text" id="administrative_area_level_1" name="state" value="{$address->profile->state}" placeholder="Comunidad Aut&oacute;noma o Estado"/>
        {include file="lib/error.tpl" error=$fp->getError('state')}
    </div>
    
    <div class="row" id="form_postal_code_address_container">
        <label for="form_postal_code_address">C&oacute;digo Postal:</label>
        <input type="text" id="postal_code" name="postal_code" value="{$address->profile->postal_code}" placeholder="C&oacute;digo Postal"/>
        {include file="lib/error.tpl" error=$fp->getError('postal_code')}
    </div>
    
    <div class="row" id="form_country_address_container">
    	<label for="form_country_address">Pa&iacute;s <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <select id="country" name="country"/>
        		<option value="" {if $address->profile->country == ''} selected="selected" {/if}>Seleccione...</option>
			<option value="AF" {if $address->profile->country == 'AF'} selected="selected" {/if}>Afganist&aacute;n</option>
			<option value="AL" {if $address->profile->country == 'AL'} selected="selected" {/if}>Albania</option>
			<option value="DE" {if $address->profile->country == 'DE'} selected="selected" {/if}>Alemania</option>
			<option value="AD" {if $address->profile->country == 'AD'} selected="selected" {/if}>Andorra</option>
			<option value="AO" {if $address->profile->country == 'AO'} selected="selected" {/if}>Angola</option>
			<option value="AI" {if $address->profile->country == 'AI'} selected="selected" {/if}>Anguilla</option>
			<option value="AQ" {if $address->profile->country == 'AQ'} selected="selected" {/if}>Ant&aacute;rtida</option>
			<option value="AG" {if $address->profile->country == 'AG'} selected="selected" {/if}>Antigua y Barbuda</option>
			<option value="AN" {if $address->profile->country == 'AN'} selected="selected" {/if}>Antillas Holandesas</option>
			<option value="SA" {if $address->profile->country == 'SA'} selected="selected" {/if}>Arabia Saud&iacute;</option>
			<option value="DZ" {if $address->profile->country == 'DZ'} selected="selected" {/if}>Argelia</option>
			<option value="AR" {if $address->profile->country == 'AR'} selected="selected" {/if}>Argentina</option>
			<option value="AM" {if $address->profile->country == 'AM'} selected="selected" {/if}>Armenia</option>
			<option value="AW" {if $address->profile->country == 'AW'} selected="selected" {/if}>Aruba</option>
			<option value="AU" {if $address->profile->country == 'AU'} selected="selected" {/if}>Australia</option>
			<option value="AT" {if $address->profile->country == 'AT'} selected="selected" {/if}>Austria</option>
			<option value="AZ" {if $address->profile->country == 'AZ'} selected="selected" {/if}>Azerbaiy&aacute;n</option>
			<option value="BS" {if $address->profile->country == 'BS'} selected="selected" {/if}>Bahamas</option>
			<option value="BH" {if $address->profile->country == 'BH'} selected="selected" {/if}>Bahrein</option>
			<option value="BD" {if $address->profile->country == 'BD'} selected="selected" {/if}>Bangladesh</option>
			<option value="BB" {if $address->profile->country == 'BB'} selected="selected" {/if}>Barbados</option>
			<option value="BE" {if $address->profile->country == 'BE'} selected="selected" {/if}>B&eacute;lgica</option>
			<option value="BZ" {if $address->profile->country == 'BZ'} selected="selected" {/if}>Belice</option>
			<option value="BJ" {if $address->profile->country == 'BJ'} selected="selected" {/if}>Benin</option>
			<option value="BM" {if $address->profile->country == 'BM'} selected="selected" {/if}>Bermudas</option>
			<option value="BY" {if $address->profile->country == 'BY'} selected="selected" {/if}>Bielorrusia</option>
			<option value="MM" {if $address->profile->country == 'MM'} selected="selected" {/if}>Birmania</option>
			<option value="BO" {if $address->profile->country == 'BO'} selected="selected" {/if}>Bolivia</option>
			<option value="BA" {if $address->profile->country == 'BA'} selected="selected" {/if}>Bosnia y Herzegovina</option>
			<option value="BW" {if $address->profile->country == 'BW'} selected="selected" {/if}>Botswana</option>
			<option value="BR" {if $address->profile->country == 'BR'} selected="selected" {/if}>Brasil</option>
			<option value="BN" {if $address->profile->country == 'BN'} selected="selected" {/if}>Brunei</option>
			<option value="BG" {if $address->profile->country == 'BG'} selected="selected" {/if}>Bulgaria</option>
			<option value="BF" {if $address->profile->country == 'BF'} selected="selected" {/if}>Burkina Faso</option>
			<option value="BI" {if $address->profile->country == 'BI'} selected="selected" {/if}>Burundi</option>
			<option value="BT" {if $address->profile->country == 'BT'} selected="selected" {/if}>But&aacute;n</option>
			<option value="CV" {if $address->profile->country == 'CV'} selected="selected" {/if}>Cabo Verde</option>
			<option value="KH" {if $address->profile->country == 'KH'} selected="selected" {/if}>Camboya</option>
			<option value="CM" {if $address->profile->country == 'CM'} selected="selected" {/if}>Camer&uacute;n</option>
			<option value="CA" {if $address->profile->country == 'CA'} selected="selected" {/if}>Canad&aacute;</option>
			<option value="TD" {if $address->profile->country == 'TD'} selected="selected" {/if}>Chad</option>
			<option value="CL" {if $address->profile->country == 'CL'} selected="selected" {/if}>Chile</option>
			<option value="CN" {if $address->profile->country == 'CN'} selected="selected" {/if}>China</option>
			<option value="CY" {if $address->profile->country == 'CY'} selected="selected" {/if}>Chipre</option>
			<option value="VA" {if $address->profile->country == 'VA'} selected="selected" {/if}>Ciudad del Vaticano (Santa Sede)</option>
			<option value="CO" {if $address->profile->country == 'CO'} selected="selected" {/if}>Colombia</option>
			<option value="KM" {if $address->profile->country == 'KM'} selected="selected" {/if}>Comores</option>
			<option value="CG" {if $address->profile->country == 'CG'} selected="selected" {/if}>Congo</option>
			<option value="CD" {if $address->profile->country == 'CD'} selected="selected" {/if}>Congo, Rep&uacute;blica Democr&aacute;tica del</option>
			<option value="KR" {if $address->profile->country == 'KR'} selected="selected" {/if}>Corea</option>
			<option value="KP" {if $address->profile->country == 'KP'} selected="selected" {/if}>Corea del Norte</option>
			<option value="CI" {if $address->profile->country == 'CI'} selected="selected" {/if}>Costa de Marf&iacute;l</option>
			<option value="CR" {if $address->profile->country == 'CR'} selected="selected" {/if}>Costa Rica</option>
			<option value="HR" {if $address->profile->country == 'HR'} selected="selected" {/if}>Croacia (Hrvatska)</option>
			<option value="CU" {if $address->profile->country == 'CU'} selected="selected" {/if}>Cuba</option>
			<option value="DK" {if $address->profile->country == 'DK'} selected="selected" {/if}>Dinamarca</option>
			<option value="DJ" {if $address->profile->country == 'DJ'} selected="selected" {/if}>Djibouti</option>
			<option value="DM" {if $address->profile->country == 'DM'} selected="selected" {/if}>Dominica</option>
			<option value="EC" {if $address->profile->country == 'EC'} selected="selected" {/if}>Ecuador</option>
			<option value="EG" {if $address->profile->country == 'EG'} selected="selected" {/if}>Egipto</option>
			<option value="SV" {if $address->profile->country == 'SV'} selected="selected" {/if}>El Salvador</option>
			<option value="AE" {if $address->profile->country == 'AE'} selected="selected" {/if}>Emiratos &aacute;rabes Unidos</option>
			<option value="ER" {if $address->profile->country == 'ER'} selected="selected" {/if}>Eritrea</option>
			<option value="SI" {if $address->profile->country == 'SI'} selected="selected" {/if}>Eslovenia</option>
			<option value="ES" {if $address->profile->country == 'ES'} selected="selected" {/if}>Espa&ntilde;a</option>
			<option value="US" {if $address->profile->country == 'US'} selected="selected" {/if}>Estados Unidos</option>
			<option value="EE" {if $address->profile->country == 'EE'} selected="selected" {/if}>Estonia</option>
			<option value="ET" {if $address->profile->country == 'ET'} selected="selected" {/if}>Etiop&iacute;a</option>
			<option value="FJ" {if $address->profile->country == 'FJ'} selected="selected" {/if}>Fiji</option>
			<option value="PH" {if $address->profile->country == 'PH'} selected="selected" {/if}>Filipinas</option>
			<option value="FI" {if $address->profile->country == 'FI'} selected="selected" {/if}>Finlandia</option>
			<option value="FR" {if $address->profile->country == 'FR'} selected="selected" {/if}>Francia</option>
			<option value="GA" {if $address->profile->country == 'GA'} selected="selected" {/if}>Gab&oacute;n</option>
			<option value="GM" {if $address->profile->country == 'GM'} selected="selected" {/if}>Gambia</option>
			<option value="GE" {if $address->profile->country == 'GE'} selected="selected" {/if}>Georgia</option>
			<option value="GH" {if $address->profile->country == 'GH'} selected="selected" {/if}>Ghana</option>
			<option value="GI" {if $address->profile->country == 'GI'} selected="selected" {/if}>Gibraltar</option>
			<option value="GD" {if $address->profile->country == 'GD'} selected="selected" {/if}>Granada</option>
			<option value="GR" {if $address->profile->country == 'GR'} selected="selected" {/if}>Grecia</option>
			<option value="GL" {if $address->profile->country == 'GL'} selected="selected" {/if}>Groenlandia</option>
			<option value="GP" {if $address->profile->country == 'GP'} selected="selected" {/if}>Guadalupe</option>
			<option value="GU" {if $address->profile->country == 'GU'} selected="selected" {/if}>Guam</option>
			<option value="GT" {if $address->profile->country == 'GT'} selected="selected" {/if}>Guatemala</option>
			<option value="GY" {if $address->profile->country == 'GY'} selected="selected" {/if}>Guayana</option>
			<option value="GF" {if $address->profile->country == 'GF'} selected="selected" {/if}>Guayana Francesa</option>
			<option value="GN" {if $address->profile->country == 'GN'} selected="selected" {/if}>Guinea</option>
			<option value="GQ" {if $address->profile->country == 'GQ'} selected="selected" {/if}>Guinea Ecuatorial</option>
			<option value="GW" {if $address->profile->country == 'GW'} selected="selected" {/if}>Guinea-Bissau</option>
			<option value="HT" {if $address->profile->country == 'HT'} selected="selected" {/if}>Hait&iacute;</option>
			<option value="HN" {if $address->profile->country == 'HN'} selected="selected" {/if}>Honduras</option>
			<option value="HU" {if $address->profile->country == 'HU'} selected="selected" {/if}>Hungr&iacute;a</option>
			<option value="IN" {if $address->profile->country == 'IN'} selected="selected" {/if}>India</option>
			<option value="ID" {if $address->profile->country == 'ID'} selected="selected" {/if}>Indonesia</option>
			<option value="IQ" {if $address->profile->country == 'IQ'} selected="selected" {/if}>Irak</option>
			<option value="IR" {if $address->profile->country == 'IR'} selected="selected" {/if}>Ir&aacute;n</option>
			<option value="IE" {if $address->profile->country == 'IE'} selected="selected" {/if}>Irlanda</option>
			<option value="BV" {if $address->profile->country == 'BV'} selected="selected" {/if}>Isla Bouvet</option>
			<option value="CX" {if $address->profile->country == 'CX'} selected="selected" {/if}>Isla de Christmas</option>
			<option value="IS" {if $address->profile->country == 'IS'} selected="selected" {/if}>Islandia</option>
			<option value="KY" {if $address->profile->country == 'KY'} selected="selected" {/if}>Islas Caim&aacute;n</option>
			<option value="CK" {if $address->profile->country == 'CK'} selected="selected" {/if}>Islas Cook</option>
			<option value="CC" {if $address->profile->country == 'CC'} selected="selected" {/if}>Islas de Cocos o Keeling</option>
			<option value="FO" {if $address->profile->country == 'FO'} selected="selected" {/if}>Islas Faroe</option>
			<option value="HM" {if $address->profile->country == 'HM'} selected="selected" {/if}>Islas Heard y McDonald</option>
			<option value="FK" {if $address->profile->country == 'FK'} selected="selected" {/if}>Islas Malvinas</option>
			<option value="MP" {if $address->profile->country == 'MP'} selected="selected" {/if}>Islas Marianas del Norte</option>
			<option value="MH" {if $address->profile->country == 'MH'} selected="selected" {/if}>Islas Marshall</option>
			<option value="UM" {if $address->profile->country == 'UM'} selected="selected" {/if}>Islas menores de Estados Unidos</option>
			<option value="PW" {if $address->profile->country == 'PW'} selected="selected" {/if}>Islas Palau</option>
			<option value="SB" {if $address->profile->country == 'SB'} selected="selected" {/if}>Islas Salom&oacute;n</option>
			<option value="SJ" {if $address->profile->country == 'SJ'} selected="selected" {/if}>Islas Svalbard y Jan Mayen</option>
			<option value="TK" {if $address->profile->country == 'TK'} selected="selected" {/if}>Islas Tokelau</option>
			<option value="TC" {if $address->profile->country == 'TC'} selected="selected" {/if}>Islas Turks y Caicos</option>
			<option value="VI" {if $address->profile->country == 'VI'} selected="selected" {/if}>Islas V&iacute;rgenes (EEUU)</option>
			<option value="VG" {if $address->profile->country == 'VG'} selected="selected" {/if}>Islas V&iacute;rgenes (Reino Unido)</option>
			<option value="WF" {if $address->profile->country == 'WF'} selected="selected" {/if}>Islas Wallis y Futuna</option>
			<option value="IL" {if $address->profile->country == 'IL'} selected="selected" {/if}>Israel</option>
			<option value="IT" {if $address->profile->country == 'IT'} selected="selected" {/if}>Italia</option>
			<option value="JM" {if $address->profile->country == 'JM'} selected="selected" {/if}>Jamaica</option>
			<option value="JP" {if $address->profile->country == 'JP'} selected="selected" {/if}>Jap&oacute;n</option>
			<option value="JO" {if $address->profile->country == 'JO'} selected="selected" {/if}>Jordania</option>
			<option value="KZ" {if $address->profile->country == 'KZ'} selected="selected" {/if}>Kazajist&aacute;n</option>
			<option value="KE" {if $address->profile->country == 'KE'} selected="selected" {/if}>Kenia</option>
			<option value="KG" {if $address->profile->country == 'KG'} selected="selected" {/if}>Kirguizist&aacute;n</option>
			<option value="KI" {if $address->profile->country == 'KI'} selected="selected" {/if}>Kiribati</option>
			<option value="KW" {if $address->profile->country == 'KW'} selected="selected" {/if}>Kuwait</option>
			<option value="LA" {if $address->profile->country == 'LA'} selected="selected" {/if}>Laos</option>
			<option value="LS" {if $address->profile->country == 'LS'} selected="selected" {/if}>Lesotho</option>
			<option value="LV" {if $address->profile->country == 'LV'} selected="selected" {/if}>Letonia</option>
			<option value="LB" {if $address->profile->country == 'LB'} selected="selected" {/if}>L&iacute;bano</option>
			<option value="LR" {if $address->profile->country == 'LR'} selected="selected" {/if}{if $address->profile->country == 'AF'} selected="selected" {/if}>Liberia</option>
			<option value="LY" {if $address->profile->country == 'LY'} selected="selected" {/if}>Libia</option>
			<option value="LI" {if $address->profile->country == 'LI'} selected="selected" {/if}>Liechtenstein</option>
			<option value="LT" {if $address->profile->country == 'LT'} selected="selected" {/if}>Lituania</option>
			<option value="LU" {if $address->profile->country == 'LU'} selected="selected" {/if}>Luxemburgo</option>
			<option value="MK" {if $address->profile->country == 'MK'} selected="selected" {/if}>Macedonia, Ex-Rep&uacute;blica Yugoslava de</option>
			<option value="MG" {if $address->profile->country == 'MG'} selected="selected" {/if}>Madagascar</option>
			<option value="MY" {if $address->profile->country == 'MY'} selected="selected" {/if}>Malasia</option>
			<option value="MW" {if $address->profile->country == 'MW'} selected="selected" {/if}>Malawi</option>
			<option value="MV" {if $address->profile->country == 'MV'} selected="selected" {/if}>Maldivas</option>
			<option value="ML" {if $address->profile->country == 'ML'} selected="selected" {/if}>Mal&iacute;</option>
			<option value="MT" {if $address->profile->country == 'MT'} selected="selected" {/if}>Malta</option>
			<option value="MA" {if $address->profile->country == 'MA'} selected="selected" {/if}>Marruecos</option>
			<option value="MQ" {if $address->profile->country == 'MQ'} selected="selected" {/if}>Martinica</option>
			<option value="MU" {if $address->profile->country == 'MU'} selected="selected" {/if}>Mauricio</option>
			<option value="MR" {if $address->profile->country == 'MR'} selected="selected" {/if}>Mauritania</option>
			<option value="YT" {if $address->profile->country == 'YT'} selected="selected" {/if}>Mayotte</option>
			<option value="MX" {if $address->profile->country == 'MX'} selected="selected" {/if}>M&eacute;xico</option>
			<option value="FM" {if $address->profile->country == 'FM'} selected="selected" {/if}>Micronesia</option>
			<option value="MD" {if $address->profile->country == 'MD'} selected="selected" {/if}>Moldavia</option>
			<option value="MC" {if $address->profile->country == 'MC'} selected="selected" {/if}>M&oacute;naco</option>
			<option value="MN" {if $address->profile->country == 'MN'} selected="selected" {/if}>Mongolia</option>
			<option value="MS" {if $address->profile->country == 'MS'} selected="selected" {/if}>Montserrat</option>
			<option value="MZ" {if $address->profile->country == 'MZ'} selected="selected" {/if}>Mozambique</option>
			<option value="NA" {if $address->profile->country == 'NA'} selected="selected" {/if}>Namibia</option>
			<option value="NR" {if $address->profile->country == 'NR'} selected="selected" {/if}>Nauru</option>
			<option value="NP" {if $address->profile->country == 'NP'} selected="selected" {/if}>Nepal</option>
			<option value="NI" {if $address->profile->country == 'NI'} selected="selected" {/if}>Nicaragua</option>
			<option value="NE" {if $address->profile->country == 'NE'} selected="selected" {/if}>N&iacute;ger</option>
			<option value="NG" {if $address->profile->country == 'NG'} selected="selected" {/if}>Nigeria</option>
			<option value="NU" {if $address->profile->country == 'NU'} selected="selected" {/if}>Niue</option>
			<option value="NF" {if $address->profile->country == 'NF'} selected="selected" {/if}>Norfolk</option>
			<option value="NO" {if $address->profile->country == 'NO'} selected="selected" {/if}>Noruega</option>
			<option value="NC" {if $address->profile->country == 'NC'} selected="selected" {/if}>Nueva Caledonia</option>
			<option value="NZ" {if $address->profile->country == 'NZ'} selected="selected" {/if}>Nueva Zelanda</option>
			<option value="OM" {if $address->profile->country == 'OM'} selected="selected" {/if}>Om&aacute;n</option>
			<option value="NL" {if $address->profile->country == 'NL'} selected="selected" {/if}>Pa&iacute;ses Bajos</option>
			<option value="PA" {if $address->profile->country == 'PA'} selected="selected" {/if}>Panam&aacute;</option>
			<option value="PG" {if $address->profile->country == 'PG'} selected="selected" {/if}>Pap&uacute;a Nueva Guinea</option>
			<option value="PK" {if $address->profile->country == 'PK'} selected="selected" {/if}>Paquist&aacute;n</option>
			<option value="PY" {if $address->profile->country == 'PY'} selected="selected" {/if}>Paraguay</option>
			<option value="PE" {if $address->profile->country == 'PE'} selected="selected" {/if}>Per&uacute;</option>
			<option value="PN" {if $address->profile->country == 'PN'} selected="selected" {/if}>Pitcairn</option>
			<option value="PF" {if $address->profile->country == 'PF'} selected="selected" {/if}>Polinesia Francesa</option>
			<option value="PL" {if $address->profile->country == 'PL'} selected="selected" {/if}>Polonia</option>
			<option value="PT" {if $address->profile->country == 'PT'} selected="selected" {/if}>Portugal</option>
			<option value="PR" {if $address->profile->country == 'PR'} selected="selected" {/if}>Puerto Rico</option>
			<option value="QA" {if $address->profile->country == 'QA'} selected="selected" {/if}>Qatar</option>
			<option value="UK" {if $address->profile->country == 'UK'} selected="selected" {/if}>Reino Unido</option>
			<option value="CF" {if $address->profile->country == 'CF'} selected="selected" {/if}>Rep&uacute;blica Centroafricana</option>
			<option value="CZ" {if $address->profile->country == 'CZ'} selected="selected" {/if}>Rep&uacute;blica Checa</option>
			<option value="ZA" {if $address->profile->country == 'ZA'} selected="selected" {/if}>Rep&uacute;blica de Sud&aacute;frica</option>
			<option value="DO" {if $address->profile->country == 'DO'} selected="selected" {/if}>Rep&uacute;blica Dominicana</option>
			<option value="SK" {if $address->profile->country == 'SK'} selected="selected" {/if}>Rep&uacute;blica Eslovaca</option>
			<option value="RE" {if $address->profile->country == 'RE'} selected="selected" {/if}>Reuni&oacute;n</option>
			<option value="RW" {if $address->profile->country == 'RW'} selected="selected" {/if}>Ruanda</option>
			<option value="RO" {if $address->profile->country == 'RO'} selected="selected" {/if}>Rumania</option>
			<option value="RU" {if $address->profile->country == 'RU'} selected="selected" {/if}>Rusia</option>
			<option value="EH" {if $address->profile->country == 'EH'} selected="selected" {/if}>Sahara Occidental</option>
			<option value="KN" {if $address->profile->country == 'KN'} selected="selected" {/if}>Saint Kitts y Nevis</option>
			<option value="WS" {if $address->profile->country == 'WS'} selected="selected" {/if}>Samoa</option>
			<option value="AS" {if $address->profile->country == 'AS'} selected="selected" {/if}>Samoa Americana</option>
			<option value="SM" {if $address->profile->country == 'SM'} selected="selected" {/if}>San Marino</option>
			<option value="VC" {if $address->profile->country == 'VC'} selected="selected" {/if}>San Vicente y Granadinas</option>
			<option value="SH" {if $address->profile->country == 'SH'} selected="selected" {/if}>Santa Helena</option>
			<option value="LC" {if $address->profile->country == 'LC'} selected="selected" {/if}>Santa Luc&iacute;a</option>
			<option value="ST" {if $address->profile->country == 'ST'} selected="selected" {/if}>Santo Tom&eacute; y Pr&iacute;ncipe</option>
			<option value="SN" {if $address->profile->country == 'SN'} selected="selected" {/if}>Senegal</option>
			<option value="SC" {if $address->profile->country == 'SC'} selected="selected" {/if}>Seychelles</option>
			<option value="SL" {if $address->profile->country == 'SL'} selected="selected" {/if}>Sierra Leona</option>
			<option value="SG" {if $address->profile->country == 'SG'} selected="selected" {/if}>Singapur</option>
			<option value="SY" {if $address->profile->country == 'SY'} selected="selected" {/if}>Siria</option>
			<option value="SO" {if $address->profile->country == 'SO'} selected="selected" {/if}>Somalia</option>
			<option value="LK" {if $address->profile->country == 'LK'} selected="selected" {/if}>Sri Lanka</option>
			<option value="PM" {if $address->profile->country == 'PM'} selected="selected" {/if}>St Pierre y Miquelon</option>
			<option value="SZ" {if $address->profile->country == 'SZ'} selected="selected" {/if}>Suazilandia</option>
			<option value="SD" {if $address->profile->country == 'SD'} selected="selected" {/if}>Sud&aacute;n</option>
			<option value="SE" {if $address->profile->country == 'SE'} selected="selected" {/if}>Suecia</option>
			<option value="CH" {if $address->profile->country == 'CH'} selected="selected" {/if}>Suiza</option>
			<option value="SR" {if $address->profile->country == 'SR'} selected="selected" {/if}>Surinam</option>
			<option value="TH" {if $address->profile->country == 'TH'} selected="selected" {/if}>Tailandia</option>
			<option value="TW" {if $address->profile->country == 'TW'} selected="selected" {/if}>Taiw&aacute;n</option>
			<option value="TZ" {if $address->profile->country == 'TZ'} selected="selected" {/if}>Tanzania</option>
			<option value="TJ" {if $address->profile->country == 'TJ'} selected="selected" {/if}>Tayikist&aacute;n</option>
			<option value="TF" {if $address->profile->country == 'TF'} selected="selected" {/if}>Territorios franceses del Sur</option>
			<option value="TP" {if $address->profile->country == 'TP'} selected="selected" {/if}>Timor Oriental</option>
			<option value="TG" {if $address->profile->country == 'TG'} selected="selected" {/if}>Togo</option>
			<option value="TO" {if $address->profile->country == 'TO'} selected="selected" {/if}>Tonga</option>
			<option value="TT" {if $address->profile->country == 'TT'} selected="selected" {/if}>Trinidad y Tobago</option>
			<option value="TN" {if $address->profile->country == 'TN'} selected="selected" {/if}>T&uacute;nez</option>
			<option value="TM" {if $address->profile->country == 'TM'} selected="selected" {/if}>Turkmenist&aacute;n</option>
			<option value="TR" {if $address->profile->country == 'TR'} selected="selected" {/if}>Turqu&iacute;a</option>
			<option value="TV" {if $address->profile->country == 'TV'} selected="selected" {/if}>Tuvalu</option>
			<option value="UA" {if $address->profile->country == 'UA'} selected="selected" {/if}>Ucrania</option>
			<option value="UG" {if $address->profile->country == 'UG'} selected="selected" {/if}>Uganda</option>
			<option value="UY" {if $address->profile->country == 'UY'} selected="selected" {/if}>Uruguay</option>
			<option value="UZ" {if $address->profile->country == 'UZ'} selected="selected" {/if}>Uzbekist&aacute;n</option>
			<option value="VU" {if $address->profile->country == 'VU'} selected="selected" {/if}>Vanuatu</option>
			<option value="VE" {if $address->profile->country == 'VE'} selected="selected" {/if}>Venezuela</option>
			<option value="VN" {if $address->profile->country == 'VN'} selected="selected" {/if}>Vietnam</option>
			<option value="YE" {if $address->profile->country == 'YE'} selected="selected" {/if}>Yemen</option>
			<option value="YU" {if $address->profile->country == 'YU'} selected="selected" {/if}>Yugoslavia</option>
			<option value="ZM" {if $address->profile->country == 'ZM'} selected="selected" {/if}>Zambia</option>
			<option value="ZW" {if $address->profile->country == 'ZW'} selected="selected" {/if}>Zimbabue</option>          
		</select>
        {include file="lib/error.tpl" error=$fp->getError('country')}
    </div>
    
    	<div class="row" id="form_address_google">
    		<label for="form_address_google">Ubicaci&oacute;n:</label>
    		<div id="map-canvas"></div>
    	</div>
    	
    	<input type="hidden" id="form_txtLat" name="txtLat" value="{if $address->profile->txtLat}{$address->profile->txtLat}{/if}">
    <input type="hidden" id="form_txtLng" name="txtLng" value="{if $address->profile->txtLng}{$address->profile->txtLng}{/if}">
    <input type="hidden" id="form_doc_type" name="doc_type" value="{if $address->doc_type}{$address->doc_type}{/if}">
    <input type="hidden" id="form_doc_id" name="doc_id" value="{if $address->doc_id}{$address->doc_id}{/if}">
    	
	<div class="row">
    		<button class="submit" type="submit" name="edit" value="edit" id="edit">Actualizar</button> 
	</div>

			</form>        
    </body>
</html>