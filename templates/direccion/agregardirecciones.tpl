<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="es">
<head>
<link rel="stylesheet" href="/css/jquery-ui.css" type="text/css" media="all" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/malsup.js"></script>
{if $authenticated}<link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" />{else}<link rel="stylesheet" href="/css/outside.css" type="text/css" media="all" />{/if}
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
<title>WebProAdmin</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no">
{literal}<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&language=es"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
<script type="text/javascript" src="/js/jquery.autocomplete.min.js"></script>
{/literal}</head>
<body id="popup">
<form method="post" id="comp_id" action="{geturl action='agregardirecciones'}?id={$fp->address->getId()}" enctype="multipart/form-data">

    {if $fp->hasError()}
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    {/if}

    {if $smarty.get.doc_type != "contact"}
    <div class="row" id="form_address_type_container">
    	<label for="form_address_type_unit">Tipo de direcci&oacute;n:</label>
        <select id="form_address_type" name="type"/>
			<option value="fiscal" {if $smarty.post.type  == 'fiscal' or $smarty.post.type  == ''} selected="selected" {/if}>Fiscal</option>
			<option value="fisica" {if $smarty.post.type  == 'fisica'} selected="selected" {/if}>F&iacute;sica</option>
        		<option value="postal" {if $smarty.post.type  == 'postal'} selected="selected" {/if}>Postal</option>
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
        <label for="form_street_address_">Calle o Avenida<strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="route" name="street" value="{$smarty.post.street}" placeholder="Calle o Avenida"/>
        {include file="lib/error.tpl" error=$fp->getError('street')}
    </div>
    
    <div class="row" id="form_house_address_container">
        <label for="form_house_address_">N&uacute;mero, Casa o Edificio:</label>
        <input type="text" id="street_number" name="house" value="{$smarty.post.house}" placeholder="N&uacute;mero, Casa o Edificio"/>
        {include file="lib/error.tpl" error=$fp->getError('house')}
    </div>
    {*
	<div class="row" id="form_address_reference_container">
    		<label for="form_address_reference">Referencias:</label>
    		<textarea id="form_address_reference" name="reference" rows="10" cols="50">{$smarty.post.reference}</textarea>
    		{include file="lib/error.tpl" error=$fp->getError('reference')}
    	</div>
    *}
    <input type="hidden" id="form_address_reference" name="reference" value="N/A" />
    
    <div class="row" id="form_city_address_container">
        <label for="form_city_address_">Ciudad:</label>
        <input type="text" id="locality" name="city" value="{$smarty.post.city}" placeholder="Ciudad"/>
        {include file="lib/error.tpl" error=$fp->getError('city')}
    </div>
    
    <div class="row" id="form_province_address_container">
        <label for="form_province__address_">Provincia o Distrito:</label>
        <input type="text" id="administrative_area_level_2" name="province" value="{$smarty.post.province}" placeholder="Provincia o Distrito"/>
        {include file="lib/error.tpl" error=$fp->getError('province')}
    </div>
    
    <div class="row" id="form_state_address_container">
        <label for="form_state_address_">Comunidad Aut&oacute;noma o Estado:</label>
        <input type="text" id="administrative_area_level_1" name="state" value="{$smarty.post.state}" placeholder="Comunidad Aut&oacute;noma o Estado"/>
        {include file="lib/error.tpl" error=$fp->getError('state')}
    </div>
    
    <div class="row" id="form_postal_code_address_container">
        <label for="form_postal_code_address_">C&oacute;digo Postal:</label>
        <input type="text" id="postal_code" name="postal_code" value="{$smarty.post.postal_code}" placeholder="C&oacute;digo Postal"/>
        {include file="lib/error.tpl" error=$fp->getError('postal_code')}
    </div>
    
    <div class="row" id="form_country_address_container">
    	<label for="form_country_address">Pa&iacute;s <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <select id="country" name="country"/>
        		<option value="" {if $default_country == ''} selected="selected" {/if}>Seleccione...</option>
			<option value="AF" {if $default_country == 'AF'} selected="selected" {/if}>Afganist&aacute;n</option>
			<option value="AL" {if $default_country == 'AL'} selected="selected" {/if}>Albania</option>
			<option value="DE" {if $default_country == 'DE'} selected="selected" {/if}>Alemania</option>
			<option value="AD" {if $default_country == 'AD'} selected="selected" {/if}>Andorra</option>
			<option value="AO" {if $default_country == 'AO'} selected="selected" {/if}>Angola</option>
			<option value="AI" {if $default_country == 'AI'} selected="selected" {/if}>Anguilla</option>
			<option value="AQ" {if $default_country == 'AQ'} selected="selected" {/if}>Ant&aacute;rtida</option>
			<option value="AG" {if $default_country == 'AG'} selected="selected" {/if}>Antigua y Barbuda</option>
			<option value="AN" {if $default_country == 'AN'} selected="selected" {/if}>Antillas Holandesas</option>
			<option value="SA" {if $default_country == 'SA'} selected="selected" {/if}>Arabia Saud&iacute;</option>
			<option value="DZ" {if $default_country == 'DZ'} selected="selected" {/if}>Argelia</option>
			<option value="AR" {if $default_country == 'AR'} selected="selected" {/if}>Argentina</option>
			<option value="AM" {if $default_country == 'AM'} selected="selected" {/if}>Armenia</option>
			<option value="AW" {if $default_country == 'AW'} selected="selected" {/if}>Aruba</option>
			<option value="AU" {if $default_country == 'AU'} selected="selected" {/if}>Australia</option>
			<option value="AT" {if $default_country == 'AT'} selected="selected" {/if}>Austria</option>
			<option value="AZ" {if $default_country == 'AZ'} selected="selected" {/if}>Azerbaiy&aacute;n</option>
			<option value="BS" {if $default_country == 'BS'} selected="selected" {/if}>Bahamas</option>
			<option value="BH" {if $default_country == 'BH'} selected="selected" {/if}>Bahrein</option>
			<option value="BD" {if $default_country == 'BD'} selected="selected" {/if}>Bangladesh</option>
			<option value="BB" {if $default_country == 'BB'} selected="selected" {/if}>Barbados</option>
			<option value="BE" {if $default_country == 'BE'} selected="selected" {/if}>B&eacute;lgica</option>
			<option value="BZ" {if $default_country == 'BZ'} selected="selected" {/if}>Belice</option>
			<option value="BJ" {if $default_country == 'BJ'} selected="selected" {/if}>Benin</option>
			<option value="BM" {if $default_country == 'BM'} selected="selected" {/if}>Bermudas</option>
			<option value="BY" {if $default_country == 'BY'} selected="selected" {/if}>Bielorrusia</option>
			<option value="MM" {if $default_country == 'MM'} selected="selected" {/if}>Birmania</option>
			<option value="BO" {if $default_country == 'BO'} selected="selected" {/if}>Bolivia</option>
			<option value="BA" {if $default_country == 'BA'} selected="selected" {/if}>Bosnia y Herzegovina</option>
			<option value="BW" {if $default_country == 'BW'} selected="selected" {/if}>Botswana</option>
			<option value="BR" {if $default_country == 'BR'} selected="selected" {/if}>Brasil</option>
			<option value="BN" {if $default_country == 'BN'} selected="selected" {/if}>Brunei</option>
			<option value="BG" {if $default_country == 'BG'} selected="selected" {/if}>Bulgaria</option>
			<option value="BF" {if $default_country == 'BF'} selected="selected" {/if}>Burkina Faso</option>
			<option value="BI" {if $default_country == 'BI'} selected="selected" {/if}>Burundi</option>
			<option value="BT" {if $default_country == 'BT'} selected="selected" {/if}>But&aacute;n</option>
			<option value="CV" {if $default_country == 'CV'} selected="selected" {/if}>Cabo Verde</option>
			<option value="KH" {if $default_country == 'KH'} selected="selected" {/if}>Camboya</option>
			<option value="CM" {if $default_country == 'CM'} selected="selected" {/if}>Camer&uacute;n</option>
			<option value="CA" {if $default_country == 'CA'} selected="selected" {/if}>Canad&aacute;</option>
			<option value="TD" {if $default_country == 'TD'} selected="selected" {/if}>Chad</option>
			<option value="CL" {if $default_country == 'CL'} selected="selected" {/if}>Chile</option>
			<option value="CN" {if $default_country == 'CN'} selected="selected" {/if}>China</option>
			<option value="CY" {if $default_country == 'CY'} selected="selected" {/if}>Chipre</option>
			<option value="VA" {if $default_country == 'VA'} selected="selected" {/if}>Ciudad del Vaticano (Santa Sede)</option>
			<option value="CO" {if $default_country == 'CO'} selected="selected" {/if}>Colombia</option>
			<option value="KM" {if $default_country == 'KM'} selected="selected" {/if}>Comores</option>
			<option value="CG" {if $default_country == 'CG'} selected="selected" {/if}>Congo</option>
			<option value="CD" {if $default_country == 'CD'} selected="selected" {/if}>Congo, Rep&uacute;blica Democr&aacute;tica del</option>
			<option value="KR" {if $default_country == 'KR'} selected="selected" {/if}>Corea</option>
			<option value="KP" {if $default_country == 'KP'} selected="selected" {/if}>Corea del Norte</option>
			<option value="CI" {if $default_country == 'CI'} selected="selected" {/if}>Costa de Marf&iacute;l</option>
			<option value="CR" {if $default_country == 'CR'} selected="selected" {/if}>Costa Rica</option>
			<option value="HR" {if $default_country == 'HR'} selected="selected" {/if}>Croacia (Hrvatska)</option>
			<option value="CU" {if $default_country == 'CU'} selected="selected" {/if}>Cuba</option>
			<option value="DK" {if $default_country == 'DK'} selected="selected" {/if}>Dinamarca</option>
			<option value="DJ" {if $default_country == 'DJ'} selected="selected" {/if}>Djibouti</option>
			<option value="DM" {if $default_country == 'DM'} selected="selected" {/if}>Dominica</option>
			<option value="EC" {if $default_country == 'EC'} selected="selected" {/if}>Ecuador</option>
			<option value="EG" {if $default_country == 'EG'} selected="selected" {/if}>Egipto</option>
			<option value="SV" {if $default_country == 'SV'} selected="selected" {/if}>El Salvador</option>
			<option value="AE" {if $default_country == 'AE'} selected="selected" {/if}>Emiratos &aacute;rabes Unidos</option>
			<option value="ER" {if $default_country == 'ER'} selected="selected" {/if}>Eritrea</option>
			<option value="SI" {if $default_country == 'SI'} selected="selected" {/if}>Eslovenia</option>
			<option value="ES" {if $default_country == 'ES'} selected="selected" {/if}>Espa&ntilde;a</option>
			<option value="US" {if $default_country == 'US'} selected="selected" {/if}>Estados Unidos</option>
			<option value="EE" {if $default_country == 'EE'} selected="selected" {/if}>Estonia</option>
			<option value="ET" {if $default_country == 'ET'} selected="selected" {/if}>Etiop&iacute;a</option>
			<option value="FJ" {if $default_country == 'FJ'} selected="selected" {/if}>Fiji</option>
			<option value="PH" {if $default_country == 'PH'} selected="selected" {/if}>Filipinas</option>
			<option value="FI" {if $default_country == 'FI'} selected="selected" {/if}>Finlandia</option>
			<option value="FR" {if $default_country == 'FR'} selected="selected" {/if}>Francia</option>
			<option value="GA" {if $default_country == 'GA'} selected="selected" {/if}>Gab&oacute;n</option>
			<option value="GM" {if $default_country == 'GM'} selected="selected" {/if}>Gambia</option>
			<option value="GE" {if $default_country == 'GE'} selected="selected" {/if}>Georgia</option>
			<option value="GH" {if $default_country == 'GH'} selected="selected" {/if}>Ghana</option>
			<option value="GI" {if $default_country == 'GI'} selected="selected" {/if}>Gibraltar</option>
			<option value="GD" {if $default_country == 'GD'} selected="selected" {/if}>Granada</option>
			<option value="GR" {if $default_country == 'GR'} selected="selected" {/if}>Grecia</option>
			<option value="GL" {if $default_country == 'GL'} selected="selected" {/if}>Groenlandia</option>
			<option value="GP" {if $default_country == 'GP'} selected="selected" {/if}>Guadalupe</option>
			<option value="GU" {if $default_country == 'GU'} selected="selected" {/if}>Guam</option>
			<option value="GT" {if $default_country == 'GT'} selected="selected" {/if}>Guatemala</option>
			<option value="GY" {if $default_country == 'GY'} selected="selected" {/if}>Guayana</option>
			<option value="GF" {if $default_country == 'GF'} selected="selected" {/if}>Guayana Francesa</option>
			<option value="GN" {if $default_country == 'GN'} selected="selected" {/if}>Guinea</option>
			<option value="GQ" {if $default_country == 'GQ'} selected="selected" {/if}>Guinea Ecuatorial</option>
			<option value="GW" {if $default_country == 'GW'} selected="selected" {/if}>Guinea-Bissau</option>
			<option value="HT" {if $default_country == 'HT'} selected="selected" {/if}>Hait&iacute;</option>
			<option value="HN" {if $default_country == 'HN'} selected="selected" {/if}>Honduras</option>
			<option value="HU" {if $default_country == 'HU'} selected="selected" {/if}>Hungr&iacute;a</option>
			<option value="IN" {if $default_country == 'IN'} selected="selected" {/if}>India</option>
			<option value="ID" {if $default_country == 'ID'} selected="selected" {/if}>Indonesia</option>
			<option value="IQ" {if $default_country == 'IQ'} selected="selected" {/if}>Irak</option>
			<option value="IR" {if $default_country == 'IR'} selected="selected" {/if}>Ir&aacute;n</option>
			<option value="IE" {if $default_country == 'IE'} selected="selected" {/if}>Irlanda</option>
			<option value="BV" {if $default_country == 'BV'} selected="selected" {/if}>Isla Bouvet</option>
			<option value="CX" {if $default_country == 'CX'} selected="selected" {/if}>Isla de Christmas</option>
			<option value="IS" {if $default_country == 'IS'} selected="selected" {/if}>Islandia</option>
			<option value="KY" {if $default_country == 'KY'} selected="selected" {/if}>Islas Caim&aacute;n</option>
			<option value="CK" {if $default_country == 'CK'} selected="selected" {/if}>Islas Cook</option>
			<option value="CC" {if $default_country == 'CC'} selected="selected" {/if}>Islas de Cocos o Keeling</option>
			<option value="FO" {if $default_country == 'FO'} selected="selected" {/if}>Islas Faroe</option>
			<option value="HM" {if $default_country == 'HM'} selected="selected" {/if}>Islas Heard y McDonald</option>
			<option value="FK" {if $default_country == 'FK'} selected="selected" {/if}>Islas Malvinas</option>
			<option value="MP" {if $default_country == 'MP'} selected="selected" {/if}>Islas Marianas del Norte</option>
			<option value="MH" {if $default_country == 'MH'} selected="selected" {/if}>Islas Marshall</option>
			<option value="UM" {if $default_country == 'UM'} selected="selected" {/if}>Islas menores de Estados Unidos</option>
			<option value="PW" {if $default_country == 'PW'} selected="selected" {/if}>Islas Palau</option>
			<option value="SB" {if $default_country == 'SB'} selected="selected" {/if}>Islas Salom&oacute;n</option>
			<option value="SJ" {if $default_country == 'SJ'} selected="selected" {/if}>Islas Svalbard y Jan Mayen</option>
			<option value="TK" {if $default_country == 'TK'} selected="selected" {/if}>Islas Tokelau</option>
			<option value="TC" {if $default_country == 'TC'} selected="selected" {/if}>Islas Turks y Caicos</option>
			<option value="VI" {if $default_country == 'VI'} selected="selected" {/if}>Islas V&iacute;rgenes (EEUU)</option>
			<option value="VG" {if $default_country == 'VG'} selected="selected" {/if}>Islas V&iacute;rgenes (Reino Unido)</option>
			<option value="WF" {if $default_country == 'WF'} selected="selected" {/if}>Islas Wallis y Futuna</option>
			<option value="IL" {if $default_country == 'IL'} selected="selected" {/if}>Israel</option>
			<option value="IT" {if $default_country == 'IT'} selected="selected" {/if}>Italia</option>
			<option value="JM" {if $default_country == 'JM'} selected="selected" {/if}>Jamaica</option>
			<option value="JP" {if $default_country == 'JP'} selected="selected" {/if}>Jap&oacute;n</option>
			<option value="JO" {if $default_country == 'JO'} selected="selected" {/if}>Jordania</option>
			<option value="KZ" {if $default_country == 'KZ'} selected="selected" {/if}>Kazajist&aacute;n</option>
			<option value="KE" {if $default_country == 'KE'} selected="selected" {/if}>Kenia</option>
			<option value="KG" {if $default_country == 'KG'} selected="selected" {/if}>Kirguizist&aacute;n</option>
			<option value="KI" {if $default_country == 'KI'} selected="selected" {/if}>Kiribati</option>
			<option value="KW" {if $default_country == 'KW'} selected="selected" {/if}>Kuwait</option>
			<option value="LA" {if $default_country == 'LA'} selected="selected" {/if}>Laos</option>
			<option value="LS" {if $default_country == 'LS'} selected="selected" {/if}>Lesotho</option>
			<option value="LV" {if $default_country == 'LV'} selected="selected" {/if}>Letonia</option>
			<option value="LB" {if $default_country == 'LB'} selected="selected" {/if}>L&iacute;bano</option>
			<option value="LR" {if $default_country == 'LR'} selected="selected" {/if}{if $default_country == 'AF'} selected="selected" {/if}>Liberia</option>
			<option value="LY" {if $default_country == 'LY'} selected="selected" {/if}>Libia</option>
			<option value="LI" {if $default_country == 'LI'} selected="selected" {/if}>Liechtenstein</option>
			<option value="LT" {if $default_country == 'LT'} selected="selected" {/if}>Lituania</option>
			<option value="LU" {if $default_country == 'LU'} selected="selected" {/if}>Luxemburgo</option>
			<option value="MK" {if $default_country == 'MK'} selected="selected" {/if}>Macedonia, Ex-Rep&uacute;blica Yugoslava de</option>
			<option value="MG" {if $default_country == 'MG'} selected="selected" {/if}>Madagascar</option>
			<option value="MY" {if $default_country == 'MY'} selected="selected" {/if}>Malasia</option>
			<option value="MW" {if $default_country == 'MW'} selected="selected" {/if}>Malawi</option>
			<option value="MV" {if $default_country == 'MV'} selected="selected" {/if}>Maldivas</option>
			<option value="ML" {if $default_country == 'ML'} selected="selected" {/if}>Mal&iacute;</option>
			<option value="MT" {if $default_country == 'MT'} selected="selected" {/if}>Malta</option>
			<option value="MA" {if $default_country == 'MA'} selected="selected" {/if}>Marruecos</option>
			<option value="MQ" {if $default_country == 'MQ'} selected="selected" {/if}>Martinica</option>
			<option value="MU" {if $default_country == 'MU'} selected="selected" {/if}>Mauricio</option>
			<option value="MR" {if $default_country == 'MR'} selected="selected" {/if}>Mauritania</option>
			<option value="YT" {if $default_country == 'YT'} selected="selected" {/if}>Mayotte</option>
			<option value="MX" {if $default_country == 'MX'} selected="selected" {/if}>M&eacute;xico</option>
			<option value="FM" {if $default_country == 'FM'} selected="selected" {/if}>Micronesia</option>
			<option value="MD" {if $default_country == 'MD'} selected="selected" {/if}>Moldavia</option>
			<option value="MC" {if $default_country == 'MC'} selected="selected" {/if}>M&oacute;naco</option>
			<option value="MN" {if $default_country == 'MN'} selected="selected" {/if}>Mongolia</option>
			<option value="MS" {if $default_country == 'MS'} selected="selected" {/if}>Montserrat</option>
			<option value="MZ" {if $default_country == 'MZ'} selected="selected" {/if}>Mozambique</option>
			<option value="NA" {if $default_country == 'NA'} selected="selected" {/if}>Namibia</option>
			<option value="NR" {if $default_country == 'NR'} selected="selected" {/if}>Nauru</option>
			<option value="NP" {if $default_country == 'NP'} selected="selected" {/if}>Nepal</option>
			<option value="NI" {if $default_country == 'NI'} selected="selected" {/if}>Nicaragua</option>
			<option value="NE" {if $default_country == 'NE'} selected="selected" {/if}>N&iacute;ger</option>
			<option value="NG" {if $default_country == 'NG'} selected="selected" {/if}>Nigeria</option>
			<option value="NU" {if $default_country == 'NU'} selected="selected" {/if}>Niue</option>
			<option value="NF" {if $default_country == 'NF'} selected="selected" {/if}>Norfolk</option>
			<option value="NO" {if $default_country == 'NO'} selected="selected" {/if}>Noruega</option>
			<option value="NC" {if $default_country == 'NC'} selected="selected" {/if}>Nueva Caledonia</option>
			<option value="NZ" {if $default_country == 'NZ'} selected="selected" {/if}>Nueva Zelanda</option>
			<option value="OM" {if $default_country == 'OM'} selected="selected" {/if}>Om&aacute;n</option>
			<option value="NL" {if $default_country == 'NL'} selected="selected" {/if}>Pa&iacute;ses Bajos</option>
			<option value="PA" {if $default_country == 'PA'} selected="selected" {/if}>Panam&aacute;</option>
			<option value="PG" {if $default_country == 'PG'} selected="selected" {/if}>Pap&uacute;a Nueva Guinea</option>
			<option value="PK" {if $default_country == 'PK'} selected="selected" {/if}>Paquist&aacute;n</option>
			<option value="PY" {if $default_country == 'PY'} selected="selected" {/if}>Paraguay</option>
			<option value="PE" {if $default_country == 'PE'} selected="selected" {/if}>Per&uacute;</option>
			<option value="PN" {if $default_country == 'PN'} selected="selected" {/if}>Pitcairn</option>
			<option value="PF" {if $default_country == 'PF'} selected="selected" {/if}>Polinesia Francesa</option>
			<option value="PL" {if $default_country == 'PL'} selected="selected" {/if}>Polonia</option>
			<option value="PT" {if $default_country == 'PT'} selected="selected" {/if}>Portugal</option>
			<option value="PR" {if $default_country == 'PR'} selected="selected" {/if}>Puerto Rico</option>
			<option value="QA" {if $default_country == 'QA'} selected="selected" {/if}>Qatar</option>
			<option value="UK" {if $default_country == 'UK'} selected="selected" {/if}>Reino Unido</option>
			<option value="CF" {if $default_country == 'CF'} selected="selected" {/if}>Rep&uacute;blica Centroafricana</option>
			<option value="CZ" {if $default_country == 'CZ'} selected="selected" {/if}>Rep&uacute;blica Checa</option>
			<option value="ZA" {if $default_country == 'ZA'} selected="selected" {/if}>Rep&uacute;blica de Sud&aacute;frica</option>
			<option value="DO" {if $default_country == 'DO'} selected="selected" {/if}>Rep&uacute;blica Dominicana</option>
			<option value="SK" {if $default_country == 'SK'} selected="selected" {/if}>Rep&uacute;blica Eslovaca</option>
			<option value="RE" {if $default_country == 'RE'} selected="selected" {/if}>Reuni&oacute;n</option>
			<option value="RW" {if $default_country == 'RW'} selected="selected" {/if}>Ruanda</option>
			<option value="RO" {if $default_country == 'RO'} selected="selected" {/if}>Rumania</option>
			<option value="RU" {if $default_country == 'RU'} selected="selected" {/if}>Rusia</option>
			<option value="EH" {if $default_country == 'EH'} selected="selected" {/if}>Sahara Occidental</option>
			<option value="KN" {if $default_country == 'KN'} selected="selected" {/if}>Saint Kitts y Nevis</option>
			<option value="WS" {if $default_country == 'WS'} selected="selected" {/if}>Samoa</option>
			<option value="AS" {if $default_country == 'AS'} selected="selected" {/if}>Samoa Americana</option>
			<option value="SM" {if $default_country == 'SM'} selected="selected" {/if}>San Marino</option>
			<option value="VC" {if $default_country == 'VC'} selected="selected" {/if}>San Vicente y Granadinas</option>
			<option value="SH" {if $default_country == 'SH'} selected="selected" {/if}>Santa Helena</option>
			<option value="LC" {if $default_country == 'LC'} selected="selected" {/if}>Santa Luc&iacute;a</option>
			<option value="ST" {if $default_country == 'ST'} selected="selected" {/if}>Santo Tom&eacute; y Pr&iacute;ncipe</option>
			<option value="SN" {if $default_country == 'SN'} selected="selected" {/if}>Senegal</option>
			<option value="SC" {if $default_country == 'SC'} selected="selected" {/if}>Seychelles</option>
			<option value="SL" {if $default_country == 'SL'} selected="selected" {/if}>Sierra Leona</option>
			<option value="SG" {if $default_country == 'SG'} selected="selected" {/if}>Singapur</option>
			<option value="SY" {if $default_country == 'SY'} selected="selected" {/if}>Siria</option>
			<option value="SO" {if $default_country == 'SO'} selected="selected" {/if}>Somalia</option>
			<option value="LK" {if $default_country == 'LK'} selected="selected" {/if}>Sri Lanka</option>
			<option value="PM" {if $default_country == 'PM'} selected="selected" {/if}>St Pierre y Miquelon</option>
			<option value="SZ" {if $default_country == 'SZ'} selected="selected" {/if}>Suazilandia</option>
			<option value="SD" {if $default_country == 'SD'} selected="selected" {/if}>Sud&aacute;n</option>
			<option value="SE" {if $default_country == 'SE'} selected="selected" {/if}>Suecia</option>
			<option value="CH" {if $default_country == 'CH'} selected="selected" {/if}>Suiza</option>
			<option value="SR" {if $default_country == 'SR'} selected="selected" {/if}>Surinam</option>
			<option value="TH" {if $default_country == 'TH'} selected="selected" {/if}>Tailandia</option>
			<option value="TW" {if $default_country == 'TW'} selected="selected" {/if}>Taiw&aacute;n</option>
			<option value="TZ" {if $default_country == 'TZ'} selected="selected" {/if}>Tanzania</option>
			<option value="TJ" {if $default_country == 'TJ'} selected="selected" {/if}>Tayikist&aacute;n</option>
			<option value="TF" {if $default_country == 'TF'} selected="selected" {/if}>Territorios franceses del Sur</option>
			<option value="TP" {if $default_country == 'TP'} selected="selected" {/if}>Timor Oriental</option>
			<option value="TG" {if $default_country == 'TG'} selected="selected" {/if}>Togo</option>
			<option value="TO" {if $default_country == 'TO'} selected="selected" {/if}>Tonga</option>
			<option value="TT" {if $default_country == 'TT'} selected="selected" {/if}>Trinidad y Tobago</option>
			<option value="TN" {if $default_country == 'TN'} selected="selected" {/if}>T&uacute;nez</option>
			<option value="TM" {if $default_country == 'TM'} selected="selected" {/if}>Turkmenist&aacute;n</option>
			<option value="TR" {if $default_country == 'TR'} selected="selected" {/if}>Turqu&iacute;a</option>
			<option value="TV" {if $default_country == 'TV'} selected="selected" {/if}>Tuvalu</option>
			<option value="UA" {if $default_country == 'UA'} selected="selected" {/if}>Ucrania</option>
			<option value="UG" {if $default_country == 'UG'} selected="selected" {/if}>Uganda</option>
			<option value="UY" {if $default_country == 'UY'} selected="selected" {/if}>Uruguay</option>
			<option value="UZ" {if $default_country == 'UZ'} selected="selected" {/if}>Uzbekist&aacute;n</option>
			<option value="VU" {if $default_country == 'VU'} selected="selected" {/if}>Vanuatu</option>
			<option value="VE" {if $default_country == 'VE'} selected="selected" {/if}>Venezuela</option>
			<option value="VN" {if $default_country == 'VN'} selected="selected" {/if}>Vietnam</option>
			<option value="YE" {if $default_country == 'YE'} selected="selected" {/if}>Yemen</option>
			<option value="YU" {if $default_country == 'YU'} selected="selected" {/if}>Yugoslavia</option>
			<option value="ZM" {if $default_country == 'ZM'} selected="selected" {/if}>Zambia</option>
			<option value="ZW" {if $default_country == 'ZW'} selected="selected" {/if}>Zimbabue</option> 
		</select>
        {include file="lib/error.tpl" error=$fp->getError('country')}
    </div>
    	
    	<div class="row" id="form_address_google">
    		<label for="form_address_google">Ubicaci&oacute;n:</label>
    		<div id="map-canvas"></div>{assign var="txtLat_first" value=$smarty.get.txtLat}{assign var="txtLng_first" value=$smarty.get.txtLng}
    	</div>{assign var="doc_type_first" value=$smarty.get.doc_type}{assign var="doc_id_first" value=$smarty.get.doc_id}
    	<input type="hidden" id="form_txtLat" name="txtLat" value="{if $txtLat_first}{$txtLat_first}{else}{$smarty.post.txtLat}{/if}">
    <input type="hidden" id="form_txtLng" name="txtLng" value="{if $txtLng_first}{$txtLng_first}{else}{$smarty.post.txtLng}{/if}">
    <input type="hidden" id="form_doc_type" name="doc_type" value="{if $doc_type_first}{$doc_type_first}{else}{$smarty.post.doc_type}{/if}">
    <input type="hidden" id="form_doc_id" name="doc_id" value="{if $doc_id_first}{$doc_id_first}{else}{$smarty.post.doc_id}{/if}">

	<div class="row">
    		<button class="submit" type="submit" name="add" id="add" value="add">Guardar</button> 
	</div>

	</form>         
    </body>
</html>