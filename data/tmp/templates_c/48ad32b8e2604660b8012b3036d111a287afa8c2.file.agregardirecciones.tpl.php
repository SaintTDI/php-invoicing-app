<?php /* Smarty version Smarty-3.0.8, created on 2015-04-10 22:56:04
         compiled from "/var/www/app/templates/./direccion/agregardirecciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:799992568552838e4b439f7-04937536%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48ad32b8e2604660b8012b3036d111a287afa8c2' => 
    array (
      0 => '/var/www/app/templates/./direccion/agregardirecciones.tpl',
      1 => 1423691244,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '799992568552838e4b439f7-04937536',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="es">
<head>
<link rel="stylesheet" href="/css/jquery-ui.css" type="text/css" media="all" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/malsup.js"></script>
<?php if ($_smarty_tpl->getVariable('authenticated')->value){?><link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" /><?php }else{ ?><link rel="stylesheet" href="/css/outside.css" type="text/css" media="all" /><?php }?>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
<title>WebProAdmin</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&language=es"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
<script type="text/javascript" src="/js/jquery.autocomplete.min.js"></script>
</head>
<body id="popup">
<form method="post" id="comp_id" action="<?php echo smarty_function_geturl(array('action'=>'agregardirecciones'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->getVariable('fp')->value->address->getId();?>
" enctype="multipart/form-data">

    <?php if ($_smarty_tpl->getVariable('fp')->value->hasError()){?>
        <div class="error">
            Por favor revisa los campos resaltados.
        </div>
    <?php }?>

    <?php if ($_GET['doc_type']!="contact"){?>
    <div class="row" id="form_address_type_container">
    	<label for="form_address_type_unit">Tipo de direcci&oacute;n:</label>
        <select id="form_address_type" name="type"/>
			<option value="fiscal" <?php if ($_POST['type']=='fiscal'||$_POST['type']==''){?> selected="selected" <?php }?>>Fiscal</option>
			<option value="fisica" <?php if ($_POST['type']=='fisica'){?> selected="selected" <?php }?>>F&iacute;sica</option>
        		<option value="postal" <?php if ($_POST['type']=='postal'){?> selected="selected" <?php }?>>Postal</option>
		</select>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('type')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    <?php }else{ ?>
    <input type="hidden" id="form_address_type" name="type" value="fisica" />
    <?php }?>
    <div class="row" id="form_search_address_container">
        <label for="form_search_address">Buscar Direcci&oacute;n:</label>
        <input class="search_input" type="text" id="autocomplete" name="search" value="<?php echo $_POST['search'];?>
" placeholder="Busca un lugar, calle o ciudad"/>
    </div>
    
    <div class="row" id="form_street_address_container">
        <label for="form_street_address_">Calle o Avenida<strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <input type="text" id="route" name="street" value="<?php echo $_POST['street'];?>
" placeholder="Calle o Avenida"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('street')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_house_address_container">
        <label for="form_house_address_">N&uacute;mero, Casa o Edificio:</label>
        <input type="text" id="street_number" name="house" value="<?php echo $_POST['house'];?>
" placeholder="N&uacute;mero, Casa o Edificio"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('house')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    <input type="hidden" id="form_address_reference" name="reference" value="N/A" />
    
    <div class="row" id="form_city_address_container">
        <label for="form_city_address_">Ciudad:</label>
        <input type="text" id="locality" name="city" value="<?php echo $_POST['city'];?>
" placeholder="Ciudad"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('city')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_province_address_container">
        <label for="form_province__address_">Provincia o Distrito:</label>
        <input type="text" id="administrative_area_level_2" name="province" value="<?php echo $_POST['province'];?>
" placeholder="Provincia o Distrito"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('province')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_state_address_container">
        <label for="form_state_address_">Comunidad Aut&oacute;noma o Estado:</label>
        <input type="text" id="administrative_area_level_1" name="state" value="<?php echo $_POST['state'];?>
" placeholder="Comunidad Aut&oacute;noma o Estado"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('state')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_postal_code_address_container">
        <label for="form_postal_code_address_">C&oacute;digo Postal:</label>
        <input type="text" id="postal_code" name="postal_code" value="<?php echo $_POST['postal_code'];?>
" placeholder="C&oacute;digo Postal"/>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('postal_code')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    
    <div class="row" id="form_country_address_container">
    	<label for="form_country_address">Pa&iacute;s <strong>&#x28;&#x2A;&#x29;</strong>:</label>
        <select id="country" name="country"/>
        		<option value="" <?php if ($_smarty_tpl->getVariable('default_country')->value==''){?> selected="selected" <?php }?>>Seleccione...</option>
			<option value="AF" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AF'){?> selected="selected" <?php }?>>Afganist&aacute;n</option>
			<option value="AL" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AL'){?> selected="selected" <?php }?>>Albania</option>
			<option value="DE" <?php if ($_smarty_tpl->getVariable('default_country')->value=='DE'){?> selected="selected" <?php }?>>Alemania</option>
			<option value="AD" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AD'){?> selected="selected" <?php }?>>Andorra</option>
			<option value="AO" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AO'){?> selected="selected" <?php }?>>Angola</option>
			<option value="AI" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AI'){?> selected="selected" <?php }?>>Anguilla</option>
			<option value="AQ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AQ'){?> selected="selected" <?php }?>>Ant&aacute;rtida</option>
			<option value="AG" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AG'){?> selected="selected" <?php }?>>Antigua y Barbuda</option>
			<option value="AN" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AN'){?> selected="selected" <?php }?>>Antillas Holandesas</option>
			<option value="SA" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SA'){?> selected="selected" <?php }?>>Arabia Saud&iacute;</option>
			<option value="DZ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='DZ'){?> selected="selected" <?php }?>>Argelia</option>
			<option value="AR" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AR'){?> selected="selected" <?php }?>>Argentina</option>
			<option value="AM" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AM'){?> selected="selected" <?php }?>>Armenia</option>
			<option value="AW" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AW'){?> selected="selected" <?php }?>>Aruba</option>
			<option value="AU" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AU'){?> selected="selected" <?php }?>>Australia</option>
			<option value="AT" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AT'){?> selected="selected" <?php }?>>Austria</option>
			<option value="AZ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AZ'){?> selected="selected" <?php }?>>Azerbaiy&aacute;n</option>
			<option value="BS" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BS'){?> selected="selected" <?php }?>>Bahamas</option>
			<option value="BH" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BH'){?> selected="selected" <?php }?>>Bahrein</option>
			<option value="BD" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BD'){?> selected="selected" <?php }?>>Bangladesh</option>
			<option value="BB" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BB'){?> selected="selected" <?php }?>>Barbados</option>
			<option value="BE" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BE'){?> selected="selected" <?php }?>>B&eacute;lgica</option>
			<option value="BZ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BZ'){?> selected="selected" <?php }?>>Belice</option>
			<option value="BJ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BJ'){?> selected="selected" <?php }?>>Benin</option>
			<option value="BM" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BM'){?> selected="selected" <?php }?>>Bermudas</option>
			<option value="BY" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BY'){?> selected="selected" <?php }?>>Bielorrusia</option>
			<option value="MM" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MM'){?> selected="selected" <?php }?>>Birmania</option>
			<option value="BO" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BO'){?> selected="selected" <?php }?>>Bolivia</option>
			<option value="BA" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BA'){?> selected="selected" <?php }?>>Bosnia y Herzegovina</option>
			<option value="BW" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BW'){?> selected="selected" <?php }?>>Botswana</option>
			<option value="BR" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BR'){?> selected="selected" <?php }?>>Brasil</option>
			<option value="BN" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BN'){?> selected="selected" <?php }?>>Brunei</option>
			<option value="BG" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BG'){?> selected="selected" <?php }?>>Bulgaria</option>
			<option value="BF" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BF'){?> selected="selected" <?php }?>>Burkina Faso</option>
			<option value="BI" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BI'){?> selected="selected" <?php }?>>Burundi</option>
			<option value="BT" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BT'){?> selected="selected" <?php }?>>But&aacute;n</option>
			<option value="CV" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CV'){?> selected="selected" <?php }?>>Cabo Verde</option>
			<option value="KH" <?php if ($_smarty_tpl->getVariable('default_country')->value=='KH'){?> selected="selected" <?php }?>>Camboya</option>
			<option value="CM" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CM'){?> selected="selected" <?php }?>>Camer&uacute;n</option>
			<option value="CA" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CA'){?> selected="selected" <?php }?>>Canad&aacute;</option>
			<option value="TD" <?php if ($_smarty_tpl->getVariable('default_country')->value=='TD'){?> selected="selected" <?php }?>>Chad</option>
			<option value="CL" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CL'){?> selected="selected" <?php }?>>Chile</option>
			<option value="CN" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CN'){?> selected="selected" <?php }?>>China</option>
			<option value="CY" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CY'){?> selected="selected" <?php }?>>Chipre</option>
			<option value="VA" <?php if ($_smarty_tpl->getVariable('default_country')->value=='VA'){?> selected="selected" <?php }?>>Ciudad del Vaticano (Santa Sede)</option>
			<option value="CO" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CO'){?> selected="selected" <?php }?>>Colombia</option>
			<option value="KM" <?php if ($_smarty_tpl->getVariable('default_country')->value=='KM'){?> selected="selected" <?php }?>>Comores</option>
			<option value="CG" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CG'){?> selected="selected" <?php }?>>Congo</option>
			<option value="CD" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CD'){?> selected="selected" <?php }?>>Congo, Rep&uacute;blica Democr&aacute;tica del</option>
			<option value="KR" <?php if ($_smarty_tpl->getVariable('default_country')->value=='KR'){?> selected="selected" <?php }?>>Corea</option>
			<option value="KP" <?php if ($_smarty_tpl->getVariable('default_country')->value=='KP'){?> selected="selected" <?php }?>>Corea del Norte</option>
			<option value="CI" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CI'){?> selected="selected" <?php }?>>Costa de Marf&iacute;l</option>
			<option value="CR" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CR'){?> selected="selected" <?php }?>>Costa Rica</option>
			<option value="HR" <?php if ($_smarty_tpl->getVariable('default_country')->value=='HR'){?> selected="selected" <?php }?>>Croacia (Hrvatska)</option>
			<option value="CU" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CU'){?> selected="selected" <?php }?>>Cuba</option>
			<option value="DK" <?php if ($_smarty_tpl->getVariable('default_country')->value=='DK'){?> selected="selected" <?php }?>>Dinamarca</option>
			<option value="DJ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='DJ'){?> selected="selected" <?php }?>>Djibouti</option>
			<option value="DM" <?php if ($_smarty_tpl->getVariable('default_country')->value=='DM'){?> selected="selected" <?php }?>>Dominica</option>
			<option value="EC" <?php if ($_smarty_tpl->getVariable('default_country')->value=='EC'){?> selected="selected" <?php }?>>Ecuador</option>
			<option value="EG" <?php if ($_smarty_tpl->getVariable('default_country')->value=='EG'){?> selected="selected" <?php }?>>Egipto</option>
			<option value="SV" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SV'){?> selected="selected" <?php }?>>El Salvador</option>
			<option value="AE" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AE'){?> selected="selected" <?php }?>>Emiratos &aacute;rabes Unidos</option>
			<option value="ER" <?php if ($_smarty_tpl->getVariable('default_country')->value=='ER'){?> selected="selected" <?php }?>>Eritrea</option>
			<option value="SI" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SI'){?> selected="selected" <?php }?>>Eslovenia</option>
			<option value="ES" <?php if ($_smarty_tpl->getVariable('default_country')->value=='ES'){?> selected="selected" <?php }?>>Espa&ntilde;a</option>
			<option value="US" <?php if ($_smarty_tpl->getVariable('default_country')->value=='US'){?> selected="selected" <?php }?>>Estados Unidos</option>
			<option value="EE" <?php if ($_smarty_tpl->getVariable('default_country')->value=='EE'){?> selected="selected" <?php }?>>Estonia</option>
			<option value="ET" <?php if ($_smarty_tpl->getVariable('default_country')->value=='ET'){?> selected="selected" <?php }?>>Etiop&iacute;a</option>
			<option value="FJ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='FJ'){?> selected="selected" <?php }?>>Fiji</option>
			<option value="PH" <?php if ($_smarty_tpl->getVariable('default_country')->value=='PH'){?> selected="selected" <?php }?>>Filipinas</option>
			<option value="FI" <?php if ($_smarty_tpl->getVariable('default_country')->value=='FI'){?> selected="selected" <?php }?>>Finlandia</option>
			<option value="FR" <?php if ($_smarty_tpl->getVariable('default_country')->value=='FR'){?> selected="selected" <?php }?>>Francia</option>
			<option value="GA" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GA'){?> selected="selected" <?php }?>>Gab&oacute;n</option>
			<option value="GM" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GM'){?> selected="selected" <?php }?>>Gambia</option>
			<option value="GE" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GE'){?> selected="selected" <?php }?>>Georgia</option>
			<option value="GH" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GH'){?> selected="selected" <?php }?>>Ghana</option>
			<option value="GI" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GI'){?> selected="selected" <?php }?>>Gibraltar</option>
			<option value="GD" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GD'){?> selected="selected" <?php }?>>Granada</option>
			<option value="GR" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GR'){?> selected="selected" <?php }?>>Grecia</option>
			<option value="GL" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GL'){?> selected="selected" <?php }?>>Groenlandia</option>
			<option value="GP" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GP'){?> selected="selected" <?php }?>>Guadalupe</option>
			<option value="GU" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GU'){?> selected="selected" <?php }?>>Guam</option>
			<option value="GT" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GT'){?> selected="selected" <?php }?>>Guatemala</option>
			<option value="GY" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GY'){?> selected="selected" <?php }?>>Guayana</option>
			<option value="GF" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GF'){?> selected="selected" <?php }?>>Guayana Francesa</option>
			<option value="GN" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GN'){?> selected="selected" <?php }?>>Guinea</option>
			<option value="GQ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GQ'){?> selected="selected" <?php }?>>Guinea Ecuatorial</option>
			<option value="GW" <?php if ($_smarty_tpl->getVariable('default_country')->value=='GW'){?> selected="selected" <?php }?>>Guinea-Bissau</option>
			<option value="HT" <?php if ($_smarty_tpl->getVariable('default_country')->value=='HT'){?> selected="selected" <?php }?>>Hait&iacute;</option>
			<option value="HN" <?php if ($_smarty_tpl->getVariable('default_country')->value=='HN'){?> selected="selected" <?php }?>>Honduras</option>
			<option value="HU" <?php if ($_smarty_tpl->getVariable('default_country')->value=='HU'){?> selected="selected" <?php }?>>Hungr&iacute;a</option>
			<option value="IN" <?php if ($_smarty_tpl->getVariable('default_country')->value=='IN'){?> selected="selected" <?php }?>>India</option>
			<option value="ID" <?php if ($_smarty_tpl->getVariable('default_country')->value=='ID'){?> selected="selected" <?php }?>>Indonesia</option>
			<option value="IQ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='IQ'){?> selected="selected" <?php }?>>Irak</option>
			<option value="IR" <?php if ($_smarty_tpl->getVariable('default_country')->value=='IR'){?> selected="selected" <?php }?>>Ir&aacute;n</option>
			<option value="IE" <?php if ($_smarty_tpl->getVariable('default_country')->value=='IE'){?> selected="selected" <?php }?>>Irlanda</option>
			<option value="BV" <?php if ($_smarty_tpl->getVariable('default_country')->value=='BV'){?> selected="selected" <?php }?>>Isla Bouvet</option>
			<option value="CX" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CX'){?> selected="selected" <?php }?>>Isla de Christmas</option>
			<option value="IS" <?php if ($_smarty_tpl->getVariable('default_country')->value=='IS'){?> selected="selected" <?php }?>>Islandia</option>
			<option value="KY" <?php if ($_smarty_tpl->getVariable('default_country')->value=='KY'){?> selected="selected" <?php }?>>Islas Caim&aacute;n</option>
			<option value="CK" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CK'){?> selected="selected" <?php }?>>Islas Cook</option>
			<option value="CC" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CC'){?> selected="selected" <?php }?>>Islas de Cocos o Keeling</option>
			<option value="FO" <?php if ($_smarty_tpl->getVariable('default_country')->value=='FO'){?> selected="selected" <?php }?>>Islas Faroe</option>
			<option value="HM" <?php if ($_smarty_tpl->getVariable('default_country')->value=='HM'){?> selected="selected" <?php }?>>Islas Heard y McDonald</option>
			<option value="FK" <?php if ($_smarty_tpl->getVariable('default_country')->value=='FK'){?> selected="selected" <?php }?>>Islas Malvinas</option>
			<option value="MP" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MP'){?> selected="selected" <?php }?>>Islas Marianas del Norte</option>
			<option value="MH" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MH'){?> selected="selected" <?php }?>>Islas Marshall</option>
			<option value="UM" <?php if ($_smarty_tpl->getVariable('default_country')->value=='UM'){?> selected="selected" <?php }?>>Islas menores de Estados Unidos</option>
			<option value="PW" <?php if ($_smarty_tpl->getVariable('default_country')->value=='PW'){?> selected="selected" <?php }?>>Islas Palau</option>
			<option value="SB" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SB'){?> selected="selected" <?php }?>>Islas Salom&oacute;n</option>
			<option value="SJ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SJ'){?> selected="selected" <?php }?>>Islas Svalbard y Jan Mayen</option>
			<option value="TK" <?php if ($_smarty_tpl->getVariable('default_country')->value=='TK'){?> selected="selected" <?php }?>>Islas Tokelau</option>
			<option value="TC" <?php if ($_smarty_tpl->getVariable('default_country')->value=='TC'){?> selected="selected" <?php }?>>Islas Turks y Caicos</option>
			<option value="VI" <?php if ($_smarty_tpl->getVariable('default_country')->value=='VI'){?> selected="selected" <?php }?>>Islas V&iacute;rgenes (EEUU)</option>
			<option value="VG" <?php if ($_smarty_tpl->getVariable('default_country')->value=='VG'){?> selected="selected" <?php }?>>Islas V&iacute;rgenes (Reino Unido)</option>
			<option value="WF" <?php if ($_smarty_tpl->getVariable('default_country')->value=='WF'){?> selected="selected" <?php }?>>Islas Wallis y Futuna</option>
			<option value="IL" <?php if ($_smarty_tpl->getVariable('default_country')->value=='IL'){?> selected="selected" <?php }?>>Israel</option>
			<option value="IT" <?php if ($_smarty_tpl->getVariable('default_country')->value=='IT'){?> selected="selected" <?php }?>>Italia</option>
			<option value="JM" <?php if ($_smarty_tpl->getVariable('default_country')->value=='JM'){?> selected="selected" <?php }?>>Jamaica</option>
			<option value="JP" <?php if ($_smarty_tpl->getVariable('default_country')->value=='JP'){?> selected="selected" <?php }?>>Jap&oacute;n</option>
			<option value="JO" <?php if ($_smarty_tpl->getVariable('default_country')->value=='JO'){?> selected="selected" <?php }?>>Jordania</option>
			<option value="KZ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='KZ'){?> selected="selected" <?php }?>>Kazajist&aacute;n</option>
			<option value="KE" <?php if ($_smarty_tpl->getVariable('default_country')->value=='KE'){?> selected="selected" <?php }?>>Kenia</option>
			<option value="KG" <?php if ($_smarty_tpl->getVariable('default_country')->value=='KG'){?> selected="selected" <?php }?>>Kirguizist&aacute;n</option>
			<option value="KI" <?php if ($_smarty_tpl->getVariable('default_country')->value=='KI'){?> selected="selected" <?php }?>>Kiribati</option>
			<option value="KW" <?php if ($_smarty_tpl->getVariable('default_country')->value=='KW'){?> selected="selected" <?php }?>>Kuwait</option>
			<option value="LA" <?php if ($_smarty_tpl->getVariable('default_country')->value=='LA'){?> selected="selected" <?php }?>>Laos</option>
			<option value="LS" <?php if ($_smarty_tpl->getVariable('default_country')->value=='LS'){?> selected="selected" <?php }?>>Lesotho</option>
			<option value="LV" <?php if ($_smarty_tpl->getVariable('default_country')->value=='LV'){?> selected="selected" <?php }?>>Letonia</option>
			<option value="LB" <?php if ($_smarty_tpl->getVariable('default_country')->value=='LB'){?> selected="selected" <?php }?>>L&iacute;bano</option>
			<option value="LR" <?php if ($_smarty_tpl->getVariable('default_country')->value=='LR'){?> selected="selected" <?php }?><?php if ($_smarty_tpl->getVariable('default_country')->value=='AF'){?> selected="selected" <?php }?>>Liberia</option>
			<option value="LY" <?php if ($_smarty_tpl->getVariable('default_country')->value=='LY'){?> selected="selected" <?php }?>>Libia</option>
			<option value="LI" <?php if ($_smarty_tpl->getVariable('default_country')->value=='LI'){?> selected="selected" <?php }?>>Liechtenstein</option>
			<option value="LT" <?php if ($_smarty_tpl->getVariable('default_country')->value=='LT'){?> selected="selected" <?php }?>>Lituania</option>
			<option value="LU" <?php if ($_smarty_tpl->getVariable('default_country')->value=='LU'){?> selected="selected" <?php }?>>Luxemburgo</option>
			<option value="MK" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MK'){?> selected="selected" <?php }?>>Macedonia, Ex-Rep&uacute;blica Yugoslava de</option>
			<option value="MG" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MG'){?> selected="selected" <?php }?>>Madagascar</option>
			<option value="MY" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MY'){?> selected="selected" <?php }?>>Malasia</option>
			<option value="MW" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MW'){?> selected="selected" <?php }?>>Malawi</option>
			<option value="MV" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MV'){?> selected="selected" <?php }?>>Maldivas</option>
			<option value="ML" <?php if ($_smarty_tpl->getVariable('default_country')->value=='ML'){?> selected="selected" <?php }?>>Mal&iacute;</option>
			<option value="MT" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MT'){?> selected="selected" <?php }?>>Malta</option>
			<option value="MA" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MA'){?> selected="selected" <?php }?>>Marruecos</option>
			<option value="MQ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MQ'){?> selected="selected" <?php }?>>Martinica</option>
			<option value="MU" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MU'){?> selected="selected" <?php }?>>Mauricio</option>
			<option value="MR" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MR'){?> selected="selected" <?php }?>>Mauritania</option>
			<option value="YT" <?php if ($_smarty_tpl->getVariable('default_country')->value=='YT'){?> selected="selected" <?php }?>>Mayotte</option>
			<option value="MX" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MX'){?> selected="selected" <?php }?>>M&eacute;xico</option>
			<option value="FM" <?php if ($_smarty_tpl->getVariable('default_country')->value=='FM'){?> selected="selected" <?php }?>>Micronesia</option>
			<option value="MD" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MD'){?> selected="selected" <?php }?>>Moldavia</option>
			<option value="MC" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MC'){?> selected="selected" <?php }?>>M&oacute;naco</option>
			<option value="MN" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MN'){?> selected="selected" <?php }?>>Mongolia</option>
			<option value="MS" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MS'){?> selected="selected" <?php }?>>Montserrat</option>
			<option value="MZ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='MZ'){?> selected="selected" <?php }?>>Mozambique</option>
			<option value="NA" <?php if ($_smarty_tpl->getVariable('default_country')->value=='NA'){?> selected="selected" <?php }?>>Namibia</option>
			<option value="NR" <?php if ($_smarty_tpl->getVariable('default_country')->value=='NR'){?> selected="selected" <?php }?>>Nauru</option>
			<option value="NP" <?php if ($_smarty_tpl->getVariable('default_country')->value=='NP'){?> selected="selected" <?php }?>>Nepal</option>
			<option value="NI" <?php if ($_smarty_tpl->getVariable('default_country')->value=='NI'){?> selected="selected" <?php }?>>Nicaragua</option>
			<option value="NE" <?php if ($_smarty_tpl->getVariable('default_country')->value=='NE'){?> selected="selected" <?php }?>>N&iacute;ger</option>
			<option value="NG" <?php if ($_smarty_tpl->getVariable('default_country')->value=='NG'){?> selected="selected" <?php }?>>Nigeria</option>
			<option value="NU" <?php if ($_smarty_tpl->getVariable('default_country')->value=='NU'){?> selected="selected" <?php }?>>Niue</option>
			<option value="NF" <?php if ($_smarty_tpl->getVariable('default_country')->value=='NF'){?> selected="selected" <?php }?>>Norfolk</option>
			<option value="NO" <?php if ($_smarty_tpl->getVariable('default_country')->value=='NO'){?> selected="selected" <?php }?>>Noruega</option>
			<option value="NC" <?php if ($_smarty_tpl->getVariable('default_country')->value=='NC'){?> selected="selected" <?php }?>>Nueva Caledonia</option>
			<option value="NZ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='NZ'){?> selected="selected" <?php }?>>Nueva Zelanda</option>
			<option value="OM" <?php if ($_smarty_tpl->getVariable('default_country')->value=='OM'){?> selected="selected" <?php }?>>Om&aacute;n</option>
			<option value="NL" <?php if ($_smarty_tpl->getVariable('default_country')->value=='NL'){?> selected="selected" <?php }?>>Pa&iacute;ses Bajos</option>
			<option value="PA" <?php if ($_smarty_tpl->getVariable('default_country')->value=='PA'){?> selected="selected" <?php }?>>Panam&aacute;</option>
			<option value="PG" <?php if ($_smarty_tpl->getVariable('default_country')->value=='PG'){?> selected="selected" <?php }?>>Pap&uacute;a Nueva Guinea</option>
			<option value="PK" <?php if ($_smarty_tpl->getVariable('default_country')->value=='PK'){?> selected="selected" <?php }?>>Paquist&aacute;n</option>
			<option value="PY" <?php if ($_smarty_tpl->getVariable('default_country')->value=='PY'){?> selected="selected" <?php }?>>Paraguay</option>
			<option value="PE" <?php if ($_smarty_tpl->getVariable('default_country')->value=='PE'){?> selected="selected" <?php }?>>Per&uacute;</option>
			<option value="PN" <?php if ($_smarty_tpl->getVariable('default_country')->value=='PN'){?> selected="selected" <?php }?>>Pitcairn</option>
			<option value="PF" <?php if ($_smarty_tpl->getVariable('default_country')->value=='PF'){?> selected="selected" <?php }?>>Polinesia Francesa</option>
			<option value="PL" <?php if ($_smarty_tpl->getVariable('default_country')->value=='PL'){?> selected="selected" <?php }?>>Polonia</option>
			<option value="PT" <?php if ($_smarty_tpl->getVariable('default_country')->value=='PT'){?> selected="selected" <?php }?>>Portugal</option>
			<option value="PR" <?php if ($_smarty_tpl->getVariable('default_country')->value=='PR'){?> selected="selected" <?php }?>>Puerto Rico</option>
			<option value="QA" <?php if ($_smarty_tpl->getVariable('default_country')->value=='QA'){?> selected="selected" <?php }?>>Qatar</option>
			<option value="UK" <?php if ($_smarty_tpl->getVariable('default_country')->value=='UK'){?> selected="selected" <?php }?>>Reino Unido</option>
			<option value="CF" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CF'){?> selected="selected" <?php }?>>Rep&uacute;blica Centroafricana</option>
			<option value="CZ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CZ'){?> selected="selected" <?php }?>>Rep&uacute;blica Checa</option>
			<option value="ZA" <?php if ($_smarty_tpl->getVariable('default_country')->value=='ZA'){?> selected="selected" <?php }?>>Rep&uacute;blica de Sud&aacute;frica</option>
			<option value="DO" <?php if ($_smarty_tpl->getVariable('default_country')->value=='DO'){?> selected="selected" <?php }?>>Rep&uacute;blica Dominicana</option>
			<option value="SK" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SK'){?> selected="selected" <?php }?>>Rep&uacute;blica Eslovaca</option>
			<option value="RE" <?php if ($_smarty_tpl->getVariable('default_country')->value=='RE'){?> selected="selected" <?php }?>>Reuni&oacute;n</option>
			<option value="RW" <?php if ($_smarty_tpl->getVariable('default_country')->value=='RW'){?> selected="selected" <?php }?>>Ruanda</option>
			<option value="RO" <?php if ($_smarty_tpl->getVariable('default_country')->value=='RO'){?> selected="selected" <?php }?>>Rumania</option>
			<option value="RU" <?php if ($_smarty_tpl->getVariable('default_country')->value=='RU'){?> selected="selected" <?php }?>>Rusia</option>
			<option value="EH" <?php if ($_smarty_tpl->getVariable('default_country')->value=='EH'){?> selected="selected" <?php }?>>Sahara Occidental</option>
			<option value="KN" <?php if ($_smarty_tpl->getVariable('default_country')->value=='KN'){?> selected="selected" <?php }?>>Saint Kitts y Nevis</option>
			<option value="WS" <?php if ($_smarty_tpl->getVariable('default_country')->value=='WS'){?> selected="selected" <?php }?>>Samoa</option>
			<option value="AS" <?php if ($_smarty_tpl->getVariable('default_country')->value=='AS'){?> selected="selected" <?php }?>>Samoa Americana</option>
			<option value="SM" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SM'){?> selected="selected" <?php }?>>San Marino</option>
			<option value="VC" <?php if ($_smarty_tpl->getVariable('default_country')->value=='VC'){?> selected="selected" <?php }?>>San Vicente y Granadinas</option>
			<option value="SH" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SH'){?> selected="selected" <?php }?>>Santa Helena</option>
			<option value="LC" <?php if ($_smarty_tpl->getVariable('default_country')->value=='LC'){?> selected="selected" <?php }?>>Santa Luc&iacute;a</option>
			<option value="ST" <?php if ($_smarty_tpl->getVariable('default_country')->value=='ST'){?> selected="selected" <?php }?>>Santo Tom&eacute; y Pr&iacute;ncipe</option>
			<option value="SN" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SN'){?> selected="selected" <?php }?>>Senegal</option>
			<option value="SC" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SC'){?> selected="selected" <?php }?>>Seychelles</option>
			<option value="SL" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SL'){?> selected="selected" <?php }?>>Sierra Leona</option>
			<option value="SG" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SG'){?> selected="selected" <?php }?>>Singapur</option>
			<option value="SY" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SY'){?> selected="selected" <?php }?>>Siria</option>
			<option value="SO" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SO'){?> selected="selected" <?php }?>>Somalia</option>
			<option value="LK" <?php if ($_smarty_tpl->getVariable('default_country')->value=='LK'){?> selected="selected" <?php }?>>Sri Lanka</option>
			<option value="PM" <?php if ($_smarty_tpl->getVariable('default_country')->value=='PM'){?> selected="selected" <?php }?>>St Pierre y Miquelon</option>
			<option value="SZ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SZ'){?> selected="selected" <?php }?>>Suazilandia</option>
			<option value="SD" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SD'){?> selected="selected" <?php }?>>Sud&aacute;n</option>
			<option value="SE" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SE'){?> selected="selected" <?php }?>>Suecia</option>
			<option value="CH" <?php if ($_smarty_tpl->getVariable('default_country')->value=='CH'){?> selected="selected" <?php }?>>Suiza</option>
			<option value="SR" <?php if ($_smarty_tpl->getVariable('default_country')->value=='SR'){?> selected="selected" <?php }?>>Surinam</option>
			<option value="TH" <?php if ($_smarty_tpl->getVariable('default_country')->value=='TH'){?> selected="selected" <?php }?>>Tailandia</option>
			<option value="TW" <?php if ($_smarty_tpl->getVariable('default_country')->value=='TW'){?> selected="selected" <?php }?>>Taiw&aacute;n</option>
			<option value="TZ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='TZ'){?> selected="selected" <?php }?>>Tanzania</option>
			<option value="TJ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='TJ'){?> selected="selected" <?php }?>>Tayikist&aacute;n</option>
			<option value="TF" <?php if ($_smarty_tpl->getVariable('default_country')->value=='TF'){?> selected="selected" <?php }?>>Territorios franceses del Sur</option>
			<option value="TP" <?php if ($_smarty_tpl->getVariable('default_country')->value=='TP'){?> selected="selected" <?php }?>>Timor Oriental</option>
			<option value="TG" <?php if ($_smarty_tpl->getVariable('default_country')->value=='TG'){?> selected="selected" <?php }?>>Togo</option>
			<option value="TO" <?php if ($_smarty_tpl->getVariable('default_country')->value=='TO'){?> selected="selected" <?php }?>>Tonga</option>
			<option value="TT" <?php if ($_smarty_tpl->getVariable('default_country')->value=='TT'){?> selected="selected" <?php }?>>Trinidad y Tobago</option>
			<option value="TN" <?php if ($_smarty_tpl->getVariable('default_country')->value=='TN'){?> selected="selected" <?php }?>>T&uacute;nez</option>
			<option value="TM" <?php if ($_smarty_tpl->getVariable('default_country')->value=='TM'){?> selected="selected" <?php }?>>Turkmenist&aacute;n</option>
			<option value="TR" <?php if ($_smarty_tpl->getVariable('default_country')->value=='TR'){?> selected="selected" <?php }?>>Turqu&iacute;a</option>
			<option value="TV" <?php if ($_smarty_tpl->getVariable('default_country')->value=='TV'){?> selected="selected" <?php }?>>Tuvalu</option>
			<option value="UA" <?php if ($_smarty_tpl->getVariable('default_country')->value=='UA'){?> selected="selected" <?php }?>>Ucrania</option>
			<option value="UG" <?php if ($_smarty_tpl->getVariable('default_country')->value=='UG'){?> selected="selected" <?php }?>>Uganda</option>
			<option value="UY" <?php if ($_smarty_tpl->getVariable('default_country')->value=='UY'){?> selected="selected" <?php }?>>Uruguay</option>
			<option value="UZ" <?php if ($_smarty_tpl->getVariable('default_country')->value=='UZ'){?> selected="selected" <?php }?>>Uzbekist&aacute;n</option>
			<option value="VU" <?php if ($_smarty_tpl->getVariable('default_country')->value=='VU'){?> selected="selected" <?php }?>>Vanuatu</option>
			<option value="VE" <?php if ($_smarty_tpl->getVariable('default_country')->value=='VE'){?> selected="selected" <?php }?>>Venezuela</option>
			<option value="VN" <?php if ($_smarty_tpl->getVariable('default_country')->value=='VN'){?> selected="selected" <?php }?>>Vietnam</option>
			<option value="YE" <?php if ($_smarty_tpl->getVariable('default_country')->value=='YE'){?> selected="selected" <?php }?>>Yemen</option>
			<option value="YU" <?php if ($_smarty_tpl->getVariable('default_country')->value=='YU'){?> selected="selected" <?php }?>>Yugoslavia</option>
			<option value="ZM" <?php if ($_smarty_tpl->getVariable('default_country')->value=='ZM'){?> selected="selected" <?php }?>>Zambia</option>
			<option value="ZW" <?php if ($_smarty_tpl->getVariable('default_country')->value=='ZW'){?> selected="selected" <?php }?>>Zimbabue</option> 
		</select>
        <?php $_template = new Smarty_Internal_Template("lib/error.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('error',$_smarty_tpl->getVariable('fp')->value->getError('country')); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </div>
    	
    	<div class="row" id="form_address_google">
    		<label for="form_address_google">Ubicaci&oacute;n:</label>
    		<div id="map-canvas"></div><?php $_smarty_tpl->tpl_vars["txtLat_first"] = new Smarty_variable($_GET['txtLat'], null, null);?><?php $_smarty_tpl->tpl_vars["txtLng_first"] = new Smarty_variable($_GET['txtLng'], null, null);?>
    	</div><?php $_smarty_tpl->tpl_vars["doc_type_first"] = new Smarty_variable($_GET['doc_type'], null, null);?><?php $_smarty_tpl->tpl_vars["doc_id_first"] = new Smarty_variable($_GET['doc_id'], null, null);?>
    	<input type="hidden" id="form_txtLat" name="txtLat" value="<?php if ($_smarty_tpl->getVariable('txtLat_first')->value){?><?php echo $_smarty_tpl->getVariable('txtLat_first')->value;?>
<?php }else{ ?><?php echo $_POST['txtLat'];?>
<?php }?>">
    <input type="hidden" id="form_txtLng" name="txtLng" value="<?php if ($_smarty_tpl->getVariable('txtLng_first')->value){?><?php echo $_smarty_tpl->getVariable('txtLng_first')->value;?>
<?php }else{ ?><?php echo $_POST['txtLng'];?>
<?php }?>">
    <input type="hidden" id="form_doc_type" name="doc_type" value="<?php if ($_smarty_tpl->getVariable('doc_type_first')->value){?><?php echo $_smarty_tpl->getVariable('doc_type_first')->value;?>
<?php }else{ ?><?php echo $_POST['doc_type'];?>
<?php }?>">
    <input type="hidden" id="form_doc_id" name="doc_id" value="<?php if ($_smarty_tpl->getVariable('doc_id_first')->value){?><?php echo $_smarty_tpl->getVariable('doc_id_first')->value;?>
<?php }else{ ?><?php echo $_POST['doc_id'];?>
<?php }?>">

	<div class="row">
    		<button class="submit" type="submit" name="add" id="add" value="add">Guardar</button> 
	</div>

	</form>         
    </body>
</html>