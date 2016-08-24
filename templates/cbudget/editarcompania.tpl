<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="es">
<head>
{if $authenticated}<link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" />{else}<link rel="stylesheet" href="/css/outside.css" type="text/css" media="all" />{/if}
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
<title>WebProAdmin</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="/css/jquery-ui.css" type="text/css" media="all" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/malsup.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&language=es"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
<script type="text/javascript" src="/js/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="/js/autoNumeric.js"></script>
</head>
<body id="popup">
<form method="post" id="comp_id" action="{geturl action='editarcompania'}?id={$fp->company->getId()}&document_id={$fp->document_id}">

	{if $smarty.get.command == 'cerrar'}
	    {literal}
	    <script type="text/javascript">
	        		jQuery(window).load(function()  {
				     	parent.jQuery.fancybox.close(); 
	      		});
	     </script>
	     {/literal}
    {/if}
    
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
    
    <div class="row" id="form_thecompany_container">
        <label for="form_thecompany">Raz&oacute;n Social <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="form_company" name="thecompany" value="{$fp->thecompany}" placeholder="Empresa, sociedad o persona"/>
        {include file="lib/error.tpl" error=$fp->getError('thecompany')}
    </div>

    <div class="row" id="form_identification_container">
        <label for="form_identification_">Identificaci&oacute;n Fiscal:</label>
        <input type="text" id="form_identification" name="identification" value="{$fp->identification}" placeholder="Ej: 99999999-R"/>
        {include file="lib/error.tpl" error=$fp->getError('identification')}
    </div>
    
    <div class="row" id="form_search_address_container">
        <label for="form_search_address">Buscar Direcci&oacute;n:</label>
        <input class="search_input" type="text" id="autocomplete" name="search" value="{$smarty.post.search}" placeholder="Busca un lugar, calle o ciudad"/>
    </div>
    	
    <div class="row" id="form_street_company_container">
        <label for="form_street_company">Calle o Avenida <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="route" name="street" value="{$fp->street}" placeholder="Calle o Avenida"/>
        {include file="lib/error.tpl" error=$fp->getError('street')}
    </div>
    
    <div class="row" id="form_house_company_container">
        <label for="form_house_company">N&uacute;mero, Casa o Edificio:</label>
        <input type="text" id="route" name="house" value="{$fp->house}" placeholder="N&uacute;mero, Casa o Edificio"/>
        {include file="lib/error.tpl" error=$fp->getError('house')}
    </div>
               
    <div class="row" id="form_city_company_container">
        <label for="form_city_company">Ciudad:</label>
        <input type="text" id="locality" name="city" value="{$fp->city}" placeholder="Ciudad"/>
        {include file="lib/error.tpl" error=$fp->getError('city')}
    </div>
    
    <div class="row" id="form_prov_container">
        <label for="form_prov_company">Provincia o Distrito:</label>
        <input type="text" id="administrative_area_level_2" name="province" value="{$fp->province}" placeholder="Provincia o Distrito"/>
        {include file="lib/error.tpl" error=$fp->getError('province')}
    </div>
    
    <input type="hidden" id="administrative_area_level_1" name="state_" value=""/>
    
    <div class="row" id="form_postal_code_company_container">
        <label for="form_postal_code_company">C&oacute;digo Postal:</label>
        <input type="text" id="postal_code" name="postal_code" value="{$fp->postal_code}" placeholder="C&oacute;digo Postal"/>
        {include file="lib/error.tpl" error=$fp->getError('postal_code')}
    </div>
    
    <div class="row" id="form_country_company_container">
    	<label for="form_country_company">Pa&iacute;s <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <select id="country" name="country"/>
        		<option value="" {if $fp->country == ''} selected="selected" {/if}>Seleccione...</option>
			<option value="AF" {if $fp->country == 'AF'} selected="selected" {/if}>Afganist&aacute;n</option>
			<option value="AL" {if $fp->country == 'AL'} selected="selected" {/if}>Albania</option>
			<option value="DE" {if $fp->country == 'DE'} selected="selected" {/if}>Alemania</option>
			<option value="AD" {if $fp->country == 'AD'} selected="selected" {/if}>Andorra</option>
			<option value="AO" {if $fp->country == 'AO'} selected="selected" {/if}>Angola</option>
			<option value="AI" {if $fp->country == 'AI'} selected="selected" {/if}>Anguilla</option>
			<option value="AQ" {if $fp->country == 'AQ'} selected="selected" {/if}>Ant&aacute;rtida</option>
			<option value="AG" {if $fp->country == 'AG'} selected="selected" {/if}>Antigua y Barbuda</option>
			<option value="AN" {if $fp->country == 'AN'} selected="selected" {/if}>Antillas Holandesas</option>
			<option value="SA" {if $fp->country == 'SA'} selected="selected" {/if}>Arabia Saud&iacute;</option>
			<option value="DZ" {if $fp->country == 'DZ'} selected="selected" {/if}>Argelia</option>
			<option value="AR" {if $fp->country == 'AR'} selected="selected" {/if}>Argentina</option>
			<option value="AM" {if $fp->country == 'AM'} selected="selected" {/if}>Armenia</option>
			<option value="AW" {if $fp->country == 'AW'} selected="selected" {/if}>Aruba</option>
			<option value="AU" {if $fp->country == 'AU'} selected="selected" {/if}>Australia</option>
			<option value="AT" {if $fp->country == 'AT'} selected="selected" {/if}>Austria</option>
			<option value="AZ" {if $fp->country == 'AZ'} selected="selected" {/if}>Azerbaiy&aacute;n</option>
			<option value="BS" {if $fp->country == 'BS'} selected="selected" {/if}>Bahamas</option>
			<option value="BH" {if $fp->country == 'BH'} selected="selected" {/if}>Bahrein</option>
			<option value="BD" {if $fp->country == 'BD'} selected="selected" {/if}>Bangladesh</option>
			<option value="BB" {if $fp->country == 'BB'} selected="selected" {/if}>Barbados</option>
			<option value="BE" {if $fp->country == 'BE'} selected="selected" {/if}>B&eacute;lgica</option>
			<option value="BZ" {if $fp->country == 'BZ'} selected="selected" {/if}>Belice</option>
			<option value="BJ" {if $fp->country == 'BJ'} selected="selected" {/if}>Benin</option>
			<option value="BM" {if $fp->country == 'BM'} selected="selected" {/if}>Bermudas</option>
			<option value="BY" {if $fp->country == 'BY'} selected="selected" {/if}>Bielorrusia</option>
			<option value="MM" {if $fp->country == 'MM'} selected="selected" {/if}>Birmania</option>
			<option value="BO" {if $fp->country == 'BO'} selected="selected" {/if}>Bolivia</option>
			<option value="BA" {if $fp->country == 'BA'} selected="selected" {/if}>Bosnia y Herzegovina</option>
			<option value="BW" {if $fp->country == 'BW'} selected="selected" {/if}>Botswana</option>
			<option value="BR" {if $fp->country == 'BR'} selected="selected" {/if}>Brasil</option>
			<option value="BN" {if $fp->country == 'BN'} selected="selected" {/if}>Brunei</option>
			<option value="BG" {if $fp->country == 'BG'} selected="selected" {/if}>Bulgaria</option>
			<option value="BF" {if $fp->country == 'BF'} selected="selected" {/if}>Burkina Faso</option>
			<option value="BI" {if $fp->country == 'BI'} selected="selected" {/if}>Burundi</option>
			<option value="BT" {if $fp->country == 'BT'} selected="selected" {/if}>But&aacute;n</option>
			<option value="CV" {if $fp->country == 'CV'} selected="selected" {/if}>Cabo Verde</option>
			<option value="KH" {if $fp->country == 'KH'} selected="selected" {/if}>Camboya</option>
			<option value="CM" {if $fp->country == 'CM'} selected="selected" {/if}>Camer&uacute;n</option>
			<option value="CA" {if $fp->country == 'CA'} selected="selected" {/if}>Canad&aacute;</option>
			<option value="TD" {if $fp->country == 'TD'} selected="selected" {/if}>Chad</option>
			<option value="CL" {if $fp->country == 'CL'} selected="selected" {/if}>Chile</option>
			<option value="CN" {if $fp->country == 'CN'} selected="selected" {/if}>China</option>
			<option value="CY" {if $fp->country == 'CY'} selected="selected" {/if}>Chipre</option>
			<option value="VA" {if $fp->country == 'VA'} selected="selected" {/if}>Ciudad del Vaticano (Santa Sede)</option>
			<option value="CO" {if $fp->country == 'CO'} selected="selected" {/if}>Colombia</option>
			<option value="KM" {if $fp->country == 'KM'} selected="selected" {/if}>Comores</option>
			<option value="CG" {if $fp->country == 'CG'} selected="selected" {/if}>Congo</option>
			<option value="CD" {if $fp->country == 'CD'} selected="selected" {/if}>Congo, Rep&uacute;blica Democr&aacute;tica del</option>
			<option value="KR" {if $fp->country == 'KR'} selected="selected" {/if}>Corea</option>
			<option value="KP" {if $fp->country == 'KP'} selected="selected" {/if}>Corea del Norte</option>
			<option value="CI" {if $fp->country == 'CI'} selected="selected" {/if}>Costa de Marf&iacute;l</option>
			<option value="CR" {if $fp->country == 'CR'} selected="selected" {/if}>Costa Rica</option>
			<option value="HR" {if $fp->country == 'HR'} selected="selected" {/if}>Croacia (Hrvatska)</option>
			<option value="CU" {if $fp->country == 'CU'} selected="selected" {/if}>Cuba</option>
			<option value="DK" {if $fp->country == 'DK'} selected="selected" {/if}>Dinamarca</option>
			<option value="DJ" {if $fp->country == 'DJ'} selected="selected" {/if}>Djibouti</option>
			<option value="DM" {if $fp->country == 'DM'} selected="selected" {/if}>Dominica</option>
			<option value="EC" {if $fp->country == 'EC'} selected="selected" {/if}>Ecuador</option>
			<option value="EG" {if $fp->country == 'EG'} selected="selected" {/if}>Egipto</option>
			<option value="SV" {if $fp->country == 'SV'} selected="selected" {/if}>El Salvador</option>
			<option value="AE" {if $fp->country == 'AE'} selected="selected" {/if}>Emiratos &aacute;rabes Unidos</option>
			<option value="ER" {if $fp->country == 'ER'} selected="selected" {/if}>Eritrea</option>
			<option value="SI" {if $fp->country == 'SI'} selected="selected" {/if}>Eslovenia</option>
			<option value="ES" {if $fp->country == 'ES'} selected="selected" {/if}>Espa&ntilde;a</option>
			<option value="US" {if $fp->country == 'US'} selected="selected" {/if}>Estados Unidos</option>
			<option value="EE" {if $fp->country == 'EE'} selected="selected" {/if}>Estonia</option>
			<option value="ET" {if $fp->country == 'ET'} selected="selected" {/if}>Etiop&iacute;a</option>
			<option value="FJ" {if $fp->country == 'FJ'} selected="selected" {/if}>Fiji</option>
			<option value="PH" {if $fp->country == 'PH'} selected="selected" {/if}>Filipinas</option>
			<option value="FI" {if $fp->country == 'FI'} selected="selected" {/if}>Finlandia</option>
			<option value="FR" {if $fp->country == 'FR'} selected="selected" {/if}>Francia</option>
			<option value="GA" {if $fp->country == 'GA'} selected="selected" {/if}>Gab&oacute;n</option>
			<option value="GM" {if $fp->country == 'GM'} selected="selected" {/if}>Gambia</option>
			<option value="GE" {if $fp->country == 'GE'} selected="selected" {/if}>Georgia</option>
			<option value="GH" {if $fp->country == 'GH'} selected="selected" {/if}>Ghana</option>
			<option value="GI" {if $fp->country == 'GI'} selected="selected" {/if}>Gibraltar</option>
			<option value="GD" {if $fp->country == 'GD'} selected="selected" {/if}>Granada</option>
			<option value="GR" {if $fp->country == 'GR'} selected="selected" {/if}>Grecia</option>
			<option value="GL" {if $fp->country == 'GL'} selected="selected" {/if}>Groenlandia</option>
			<option value="GP" {if $fp->country == 'GP'} selected="selected" {/if}>Guadalupe</option>
			<option value="GU" {if $fp->country == 'GU'} selected="selected" {/if}>Guam</option>
			<option value="GT" {if $fp->country == 'GT'} selected="selected" {/if}>Guatemala</option>
			<option value="GY" {if $fp->country == 'GY'} selected="selected" {/if}>Guayana</option>
			<option value="GF" {if $fp->country == 'GF'} selected="selected" {/if}>Guayana Francesa</option>
			<option value="GN" {if $fp->country == 'GN'} selected="selected" {/if}>Guinea</option>
			<option value="GQ" {if $fp->country == 'GQ'} selected="selected" {/if}>Guinea Ecuatorial</option>
			<option value="GW" {if $fp->country == 'GW'} selected="selected" {/if}>Guinea-Bissau</option>
			<option value="HT" {if $fp->country == 'HT'} selected="selected" {/if}>Hait&iacute;</option>
			<option value="HN" {if $fp->country == 'HN'} selected="selected" {/if}>Honduras</option>
			<option value="HU" {if $fp->country == 'HU'} selected="selected" {/if}>Hungr&iacute;a</option>
			<option value="IN" {if $fp->country == 'IN'} selected="selected" {/if}>India</option>
			<option value="ID" {if $fp->country == 'ID'} selected="selected" {/if}>Indonesia</option>
			<option value="IQ" {if $fp->country == 'IQ'} selected="selected" {/if}>Irak</option>
			<option value="IR" {if $fp->country == 'IR'} selected="selected" {/if}>Ir&aacute;n</option>
			<option value="IE" {if $fp->country == 'IE'} selected="selected" {/if}>Irlanda</option>
			<option value="BV" {if $fp->country == 'BV'} selected="selected" {/if}>Isla Bouvet</option>
			<option value="CX" {if $fp->country == 'CX'} selected="selected" {/if}>Isla de Christmas</option>
			<option value="IS" {if $fp->country == 'IS'} selected="selected" {/if}>Islandia</option>
			<option value="KY" {if $fp->country == 'KY'} selected="selected" {/if}>Islas Caim&aacute;n</option>
			<option value="CK" {if $fp->country == 'CK'} selected="selected" {/if}>Islas Cook</option>
			<option value="CC" {if $fp->country == 'CC'} selected="selected" {/if}>Islas de Cocos o Keeling</option>
			<option value="FO" {if $fp->country == 'FO'} selected="selected" {/if}>Islas Faroe</option>
			<option value="HM" {if $fp->country == 'HM'} selected="selected" {/if}>Islas Heard y McDonald</option>
			<option value="FK" {if $fp->country == 'FK'} selected="selected" {/if}>Islas Malvinas</option>
			<option value="MP" {if $fp->country == 'MP'} selected="selected" {/if}>Islas Marianas del Norte</option>
			<option value="MH" {if $fp->country == 'MH'} selected="selected" {/if}>Islas Marshall</option>
			<option value="UM" {if $fp->country == 'UM'} selected="selected" {/if}>Islas menores de Estados Unidos</option>
			<option value="PW" {if $fp->country == 'PW'} selected="selected" {/if}>Islas Palau</option>
			<option value="SB" {if $fp->country == 'SB'} selected="selected" {/if}>Islas Salom&oacute;n</option>
			<option value="SJ" {if $fp->country == 'SJ'} selected="selected" {/if}>Islas Svalbard y Jan Mayen</option>
			<option value="TK" {if $fp->country == 'TK'} selected="selected" {/if}>Islas Tokelau</option>
			<option value="TC" {if $fp->country == 'TC'} selected="selected" {/if}>Islas Turks y Caicos</option>
			<option value="VI" {if $fp->country == 'VI'} selected="selected" {/if}>Islas V&iacute;rgenes (EEUU)</option>
			<option value="VG" {if $fp->country == 'VG'} selected="selected" {/if}>Islas V&iacute;rgenes (Reino Unido)</option>
			<option value="WF" {if $fp->country == 'WF'} selected="selected" {/if}>Islas Wallis y Futuna</option>
			<option value="IL" {if $fp->country == 'IL'} selected="selected" {/if}>Israel</option>
			<option value="IT" {if $fp->country == 'IT'} selected="selected" {/if}>Italia</option>
			<option value="JM" {if $fp->country == 'JM'} selected="selected" {/if}>Jamaica</option>
			<option value="JP" {if $fp->country == 'JP'} selected="selected" {/if}>Jap&oacute;n</option>
			<option value="JO" {if $fp->country == 'JO'} selected="selected" {/if}>Jordania</option>
			<option value="KZ" {if $fp->country == 'KZ'} selected="selected" {/if}>Kazajist&aacute;n</option>
			<option value="KE" {if $fp->country == 'KE'} selected="selected" {/if}>Kenia</option>
			<option value="KG" {if $fp->country == 'KG'} selected="selected" {/if}>Kirguizist&aacute;n</option>
			<option value="KI" {if $fp->country == 'KI'} selected="selected" {/if}>Kiribati</option>
			<option value="KW" {if $fp->country == 'KW'} selected="selected" {/if}>Kuwait</option>
			<option value="LA" {if $fp->country == 'LA'} selected="selected" {/if}>Laos</option>
			<option value="LS" {if $fp->country == 'LS'} selected="selected" {/if}>Lesotho</option>
			<option value="LV" {if $fp->country == 'LV'} selected="selected" {/if}>Letonia</option>
			<option value="LB" {if $fp->country == 'LB'} selected="selected" {/if}>L&iacute;bano</option>
			<option value="LR" {if $fp->country == 'LR'} selected="selected" {/if}{if $fp->country == 'AF'} selected="selected" {/if}>Liberia</option>
			<option value="LY" {if $fp->country == 'LY'} selected="selected" {/if}>Libia</option>
			<option value="LI" {if $fp->country == 'LI'} selected="selected" {/if}>Liechtenstein</option>
			<option value="LT" {if $fp->country == 'LT'} selected="selected" {/if}>Lituania</option>
			<option value="LU" {if $fp->country == 'LU'} selected="selected" {/if}>Luxemburgo</option>
			<option value="MK" {if $fp->country == 'MK'} selected="selected" {/if}>Macedonia, Ex-Rep&uacute;blica Yugoslava de</option>
			<option value="MG" {if $fp->country == 'MG'} selected="selected" {/if}>Madagascar</option>
			<option value="MY" {if $fp->country == 'MY'} selected="selected" {/if}>Malasia</option>
			<option value="MW" {if $fp->country == 'MW'} selected="selected" {/if}>Malawi</option>
			<option value="MV" {if $fp->country == 'MV'} selected="selected" {/if}>Maldivas</option>
			<option value="ML" {if $fp->country == 'ML'} selected="selected" {/if}>Mal&iacute;</option>
			<option value="MT" {if $fp->country == 'MT'} selected="selected" {/if}>Malta</option>
			<option value="MA" {if $fp->country == 'MA'} selected="selected" {/if}>Marruecos</option>
			<option value="MQ" {if $fp->country == 'MQ'} selected="selected" {/if}>Martinica</option>
			<option value="MU" {if $fp->country == 'MU'} selected="selected" {/if}>Mauricio</option>
			<option value="MR" {if $fp->country == 'MR'} selected="selected" {/if}>Mauritania</option>
			<option value="YT" {if $fp->country == 'YT'} selected="selected" {/if}>Mayotte</option>
			<option value="MX" {if $fp->country == 'MX'} selected="selected" {/if}>M&eacute;xico</option>
			<option value="FM" {if $fp->country == 'FM'} selected="selected" {/if}>Micronesia</option>
			<option value="MD" {if $fp->country == 'MD'} selected="selected" {/if}>Moldavia</option>
			<option value="MC" {if $fp->country == 'MC'} selected="selected" {/if}>M&oacute;naco</option>
			<option value="MN" {if $fp->country == 'MN'} selected="selected" {/if}>Mongolia</option>
			<option value="MS" {if $fp->country == 'MS'} selected="selected" {/if}>Montserrat</option>
			<option value="MZ" {if $fp->country == 'MZ'} selected="selected" {/if}>Mozambique</option>
			<option value="NA" {if $fp->country == 'NA'} selected="selected" {/if}>Namibia</option>
			<option value="NR" {if $fp->country == 'NR'} selected="selected" {/if}>Nauru</option>
			<option value="NP" {if $fp->country == 'NP'} selected="selected" {/if}>Nepal</option>
			<option value="NI" {if $fp->country == 'NI'} selected="selected" {/if}>Nicaragua</option>
			<option value="NE" {if $fp->country == 'NE'} selected="selected" {/if}>N&iacute;ger</option>
			<option value="NG" {if $fp->country == 'NG'} selected="selected" {/if}>Nigeria</option>
			<option value="NU" {if $fp->country == 'NU'} selected="selected" {/if}>Niue</option>
			<option value="NF" {if $fp->country == 'NF'} selected="selected" {/if}>Norfolk</option>
			<option value="NO" {if $fp->country == 'NO'} selected="selected" {/if}>Noruega</option>
			<option value="NC" {if $fp->country == 'NC'} selected="selected" {/if}>Nueva Caledonia</option>
			<option value="NZ" {if $fp->country == 'NZ'} selected="selected" {/if}>Nueva Zelanda</option>
			<option value="OM" {if $fp->country == 'OM'} selected="selected" {/if}>Om&aacute;n</option>
			<option value="NL" {if $fp->country == 'NL'} selected="selected" {/if}>Pa&iacute;ses Bajos</option>
			<option value="PA" {if $fp->country == 'PA'} selected="selected" {/if}>Panam&aacute;</option>
			<option value="PG" {if $fp->country == 'PG'} selected="selected" {/if}>Pap&uacute;a Nueva Guinea</option>
			<option value="PK" {if $fp->country == 'PK'} selected="selected" {/if}>Paquist&aacute;n</option>
			<option value="PY" {if $fp->country == 'PY'} selected="selected" {/if}>Paraguay</option>
			<option value="PE" {if $fp->country == 'PE'} selected="selected" {/if}>Per&uacute;</option>
			<option value="PN" {if $fp->country == 'PN'} selected="selected" {/if}>Pitcairn</option>
			<option value="PF" {if $fp->country == 'PF'} selected="selected" {/if}>Polinesia Francesa</option>
			<option value="PL" {if $fp->country == 'PL'} selected="selected" {/if}>Polonia</option>
			<option value="PT" {if $fp->country == 'PT'} selected="selected" {/if}>Portugal</option>
			<option value="PR" {if $fp->country == 'PR'} selected="selected" {/if}>Puerto Rico</option>
			<option value="QA" {if $fp->country == 'QA'} selected="selected" {/if}>Qatar</option>
			<option value="UK" {if $fp->country == 'UK'} selected="selected" {/if}>Reino Unido</option>
			<option value="CF" {if $fp->country == 'CF'} selected="selected" {/if}>Rep&uacute;blica Centroafricana</option>
			<option value="CZ" {if $fp->country == 'CZ'} selected="selected" {/if}>Rep&uacute;blica Checa</option>
			<option value="ZA" {if $fp->country == 'ZA'} selected="selected" {/if}>Rep&uacute;blica de Sud&aacute;frica</option>
			<option value="DO" {if $fp->country == 'DO'} selected="selected" {/if}>Rep&uacute;blica Dominicana</option>
			<option value="SK" {if $fp->country == 'SK'} selected="selected" {/if}>Rep&uacute;blica Eslovaca</option>
			<option value="RE" {if $fp->country == 'RE'} selected="selected" {/if}>Reuni&oacute;n</option>
			<option value="RW" {if $fp->country == 'RW'} selected="selected" {/if}>Ruanda</option>
			<option value="RO" {if $fp->country == 'RO'} selected="selected" {/if}>Rumania</option>
			<option value="RU" {if $fp->country == 'RU'} selected="selected" {/if}>Rusia</option>
			<option value="EH" {if $fp->country == 'EH'} selected="selected" {/if}>Sahara Occidental</option>
			<option value="KN" {if $fp->country == 'KN'} selected="selected" {/if}>Saint Kitts y Nevis</option>
			<option value="WS" {if $fp->country == 'WS'} selected="selected" {/if}>Samoa</option>
			<option value="AS" {if $fp->country == 'AS'} selected="selected" {/if}>Samoa Americana</option>
			<option value="SM" {if $fp->country == 'SM'} selected="selected" {/if}>San Marino</option>
			<option value="VC" {if $fp->country == 'VC'} selected="selected" {/if}>San Vicente y Granadinas</option>
			<option value="SH" {if $fp->country == 'SH'} selected="selected" {/if}>Santa Helena</option>
			<option value="LC" {if $fp->country == 'LC'} selected="selected" {/if}>Santa Luc&iacute;a</option>
			<option value="ST" {if $fp->country == 'ST'} selected="selected" {/if}>Santo Tom&eacute; y Pr&iacute;ncipe</option>
			<option value="SN" {if $fp->country == 'SN'} selected="selected" {/if}>Senegal</option>
			<option value="SC" {if $fp->country == 'SC'} selected="selected" {/if}>Seychelles</option>
			<option value="SL" {if $fp->country == 'SL'} selected="selected" {/if}>Sierra Leona</option>
			<option value="SG" {if $fp->country == 'SG'} selected="selected" {/if}>Singapur</option>
			<option value="SY" {if $fp->country == 'SY'} selected="selected" {/if}>Siria</option>
			<option value="SO" {if $fp->country == 'SO'} selected="selected" {/if}>Somalia</option>
			<option value="LK" {if $fp->country == 'LK'} selected="selected" {/if}>Sri Lanka</option>
			<option value="PM" {if $fp->country == 'PM'} selected="selected" {/if}>St Pierre y Miquelon</option>
			<option value="SZ" {if $fp->country == 'SZ'} selected="selected" {/if}>Suazilandia</option>
			<option value="SD" {if $fp->country == 'SD'} selected="selected" {/if}>Sud&aacute;n</option>
			<option value="SE" {if $fp->country == 'SE'} selected="selected" {/if}>Suecia</option>
			<option value="CH" {if $fp->country == 'CH'} selected="selected" {/if}>Suiza</option>
			<option value="SR" {if $fp->country == 'SR'} selected="selected" {/if}>Surinam</option>
			<option value="TH" {if $fp->country == 'TH'} selected="selected" {/if}>Tailandia</option>
			<option value="TW" {if $fp->country == 'TW'} selected="selected" {/if}>Taiw&aacute;n</option>
			<option value="TZ" {if $fp->country == 'TZ'} selected="selected" {/if}>Tanzania</option>
			<option value="TJ" {if $fp->country == 'TJ'} selected="selected" {/if}>Tayikist&aacute;n</option>
			<option value="TF" {if $fp->country == 'TF'} selected="selected" {/if}>Territorios franceses del Sur</option>
			<option value="TP" {if $fp->country == 'TP'} selected="selected" {/if}>Timor Oriental</option>
			<option value="TG" {if $fp->country == 'TG'} selected="selected" {/if}>Togo</option>
			<option value="TO" {if $fp->country == 'TO'} selected="selected" {/if}>Tonga</option>
			<option value="TT" {if $fp->country == 'TT'} selected="selected" {/if}>Trinidad y Tobago</option>
			<option value="TN" {if $fp->country == 'TN'} selected="selected" {/if}>T&uacute;nez</option>
			<option value="TM" {if $fp->country == 'TM'} selected="selected" {/if}>Turkmenist&aacute;n</option>
			<option value="TR" {if $fp->country == 'TR'} selected="selected" {/if}>Turqu&iacute;a</option>
			<option value="TV" {if $fp->country == 'TV'} selected="selected" {/if}>Tuvalu</option>
			<option value="UA" {if $fp->country == 'UA'} selected="selected" {/if}>Ucrania</option>
			<option value="UG" {if $fp->country == 'UG'} selected="selected" {/if}>Uganda</option>
			<option value="UY" {if $fp->country == 'UY'} selected="selected" {/if}>Uruguay</option>
			<option value="UZ" {if $fp->country == 'UZ'} selected="selected" {/if}>Uzbekist&aacute;n</option>
			<option value="VU" {if $fp->country == 'VU'} selected="selected" {/if}>Vanuatu</option>
			<option value="VE" {if $fp->country == 'VE'} selected="selected" {/if}>Venezuela</option>
			<option value="VN" {if $fp->country == 'VN'} selected="selected" {/if}>Vietnam</option>
			<option value="YE" {if $fp->country == 'YE'} selected="selected" {/if}>Yemen</option>
			<option value="YU" {if $fp->country == 'YU'} selected="selected" {/if}>Yugoslavia</option>
			<option value="ZM" {if $fp->country == 'ZM'} selected="selected" {/if}>Zambia</option>
			<option value="ZW" {if $fp->country == 'ZW'} selected="selected" {/if}>Zimbabue</option>   
		</select>
        {include file="lib/error.tpl" error=$fp->getError('country')}
    </div>

    <input type="hidden" id="form_document_id" name="document_id" value="{$fp->document_id}" />
    <input type="hidden" id="form_company_id" name="original_company_id" value="{$fp->original_company_id}" />
    <input type="hidden" id="form_address_id" name="original_company_address" value="{$fp->original_company_address}" />
    <input type="hidden" id="form_recc" name="recc" value="{$fp->recc}" />
    <input type="hidden" id="form_irpf" name="irpf" value="{$fp->irpf}" />
  	<input type="hidden" id="form_txtLat" name="txtLat" value="{$fp->txtLat}">
    <input type="hidden" id="form_txtLng" name="txtLng" value="{$fp->txtLng}">
  
    <div class="row" id="form_email_container">
        <label for="form_email_">Email Principal:</label>
        <input type="text" id="form_email" name="email_c" value="{$fp->email_c}" placeholder="Ej: ejemplo@webproadmin.com"/>
        {include file="lib/error.tpl" error=$fp->getError('email_c')}
    </div>
    
    {*
    <div class="row" id="form_email2_container">
        <label for="form_email2_">Email Secundario:</label>
        <input type="text" id="form_email2" name="email2" value="{$fp->email2}" placeholder="Ej: ejemplo@webproadmin.com"/>
        {include file="lib/error.tpl" error=$fp->getError('email2')}
    </div>
    *}
    <input type="hidden" id="form_email2" name="email2" value="" />
    <input type="hidden" id="form_ctype" name="ctype" value="{$fp->ctype}" />
    {*
     {foreach from=$fp->companyProfile key='key' item='label'}
     <div class="row" id="form_{$key}_container">
     	{if $label == 'Website'}
     		<label for="form_{$label}">Sitio Web:</label>
     		<input class="url" type="text" id="form_help" name="help" value="http://www." disabled="disabled" />
     		<input class="url_add" type="text" id="form_web" maxlength="200" name="{$key}" value="{$fp->$key}" placeholder="Ej: pagina.com"/>   
    		    {include file="lib/error.tpl" error=$fp->getError($key)}
     	{/if}
     </div>
     {/foreach}
     *}
    <div class="row" id="form_phone_container">
        <label for="form_phone">Tel&eacute;fono Principal:</label>
        <input class="phone" type="text" id="form_country_p1" name="phone_country" value="{$fp->phone_country}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
        <input class="phone" type="text" id="form_area_p1" name="phone_area" value="{$fp->phone_area}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
        <input class="social" type="text" id="form_phone_p1" name="phone" value="{$fp->phone}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
        {include file="lib/error.tpl" error=$fp->getError('phone')}
    </div>
    
    <div id="map-canvas" style="display: none;"></div>
    
    {*
    <div class="row" id="form_phone2_container">
        <label for="form_phone2">Tel&eacute;fono Secundario:</label>
        <input class="phone" type="text" id="form_country_p2" name="phone2_country" value="{$fp->phone2_country}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
        <input class="phone" type="text" id="form_area_p2" name="phone2_area" value="{$fp->phone2_area}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
        <input class="social" type="text" id="form_phone_p2" name="phone2" value="{$fp->phone2}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
        {include file="lib/error.tpl" error=$fp->getError('phone2')}
    </div>
    
    <div class="row" id="form_fax_container">
        <label for="form_fax">Fax:</label>
        <input class="phone" type="text" id="form_country_fax" name="fax_country" value="{$fp->fax_country}" onkeypress='validate(event)' placeholder="Pa&iacute;s"/>
        <input class="phone" type="text" id="form_area_fax" name="fax_area" value="{$fp->fax_area}" onkeypress='validate(event)' placeholder="&Aacute;rea"/>
        <input class="social" type="text" id="form_phone_fax" name="fax" value="{$fp->fax}" onkeypress='validate(event)' placeholder="Tel&eacute;fono"/>
        {include file="lib/error.tpl" error=$fp->getError('fax')}
    </div>
    *}
	{literal}<script type="text/javascript">
			jQuery(window).load(function(){
  			var products = [
    			{/literal}{assign var='i' value=0}{foreach from=$companieslist item=company}{literal}{ data: '{/literal}{$company_id_[$i]}{literal}', value: '{/literal}{$company_[$i]}{literal}', ide: '{/literal}{$identification_[$i]}{literal}', street: '{/literal}{$street_[$i]}{literal}', house: '{/literal}{$house_[$i]}{literal}', city: '{/literal}{$city_[$i]}{literal}', province: '{/literal}{$province_[$i]}{literal}', postal: '{/literal}{$postal_[$i]}{literal}', country: '{/literal}{$country_[$i]}{literal}', email: '{/literal}{$email_[$i]}{literal}', web_: '{/literal}{$web_[$i]}{literal}', country_p1: '{/literal}{$country_p1_[$i]}{literal}', area_p1: '{/literal}{$area_p1_[$i]}{literal}', phone_p1: '{/literal}{$phone_p1_[$i]}{literal}', country_p2: '{/literal}{$country_p2_[$i]}{literal}', area_p2: '{/literal}{$area_p2_[$i]}{literal}', phone_p2: '{/literal}{$phone_p2_[$i]}{literal}', country_fax: '{/literal}{$country_fax_[$i]}{literal}', area_fax: '{/literal}{$area_fax_[$i]}{literal}', phone_fax: '{/literal}{$phone_fax_[$i]}{literal}', ctype: '{/literal}{$ctype[$i]}{literal}', ctype: '{/literal}{$ctype[$i]}{literal}', recc: '{/literal}{$recc[$i]}{literal}', irpf: '{/literal}{$irpf[$i]}{literal}'},{/literal}{assign var='i' value=$i+1}{/foreach}{literal}{/literal}{foreach from=$contactslist item=contact}{literal}{ data: '{/literal}{$company_id_[$i]}{literal}', value: '{/literal}{$company_[$i]}{literal}', ide: '{/literal}{$identification_[$i]}{literal}', street: '{/literal}{$street_[$i]}{literal}', house: '{/literal}{$house_[$i]}{literal}', city: '{/literal}{$city_[$i]}{literal}', province: '{/literal}{$province_[$i]}{literal}', postal: '{/literal}{$postal_[$i]}{literal}', country: '{/literal}{$country_[$i]}{literal}', email: '{/literal}{$email_[$i]}{literal}', web_: '{/literal}{$web_[$i]}{literal}', country_p1: '{/literal}{$country_p1_[$i]}{literal}', area_p1: '{/literal}{$area_p1_[$i]}{literal}', phone_p1: '{/literal}{$phone_p1_[$i]}{literal}', country_p2: '{/literal}{$country_p2_[$i]}{literal}', area_p2: '{/literal}{$area_p2_[$i]}{literal}', phone_p2: '{/literal}{$phone_p2_[$i]}{literal}', country_fax: '{/literal}{$country_fax_[$i]}{literal}', area_fax: '{/literal}{$area_fax_[$i]}{literal}', phone_fax: '{/literal}{$phone_fax_[$i]}{literal}', ctype: '{/literal}{$ctype[$i]}{literal}', ctype: '{/literal}{$ctype[$i]}{literal}', recc: '{/literal}{$recc[$i]}{literal}', irpf: '{/literal}{$irpf[$i]}{literal}'},{/literal}{assign var='i' value=$i+1}{/foreach}{literal}
  			];
  					// setup autocomplete function pulling from companies[] array
  						jQuery('#form_company').autocomplete({
    						lookup: products,
    						onSelect: function (suggestion) {
    						if (suggestion.value){
							jQuery('#form_company').val(suggestion.value);
							jQuery('#form_identification').val(suggestion.ide);
							jQuery('#route').val(suggestion.street); 
							jQuery('#street_number').val(suggestion.house);
							jQuery('#locality').val(suggestion.city);
							jQuery('#administrative_area_level_2').val(suggestion.province); 
							jQuery('#postal_code').val(suggestion.postal);
							jQuery('#country').val(suggestion.country);
							jQuery('#form_company_id').val(suggestion.data);
							jQuery('#form_email').val(suggestion.email);
							jQuery('#form_web').val(suggestion.web_);
							jQuery('#form_country_p1').val(suggestion.country_p1); 
							jQuery('#form_area_p1').val(suggestion.area_p1);  
							jQuery('#form_phone_p1').val(suggestion.phone_p1); 
							jQuery('#form_country_p2').val(suggestion.country_p2); 
							jQuery('#form_area_p2').val(suggestion.area_p2); 
							jQuery('#form_phone_p2').val(suggestion.phone_p2); 
							jQuery('#form_country_fax').val(suggestion.country_fax); 
							jQuery('#form_area_fax').val(suggestion.area_fax); 
							jQuery('#form_phone_fax').val(suggestion.phone_fax);
							jQuery('#form_ctype').val(suggestion.ctype);
							jQuery('#form_recc').val(suggestion.recc);	
							jQuery('#form_irpf').val(suggestion.irpf);						
      					} 
    					}
  				});
			});
	</script>{/literal}
    
	<div class="row">
    		<button class="submit" type="submit" name="edit" id="edit" value="edit">Actualizar</button> 
	</div>

	</form>         
    </body>
</html>