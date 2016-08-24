<?php /* Smarty version Smarty-3.0.8, created on 2015-02-15 21:38:18
         compiled from "/var/www/app/templates/./header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141990426654e103ba855b96-34892393%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f100a9b4ff2e77a9383403509fbb693e29aa7734' => 
    array (
      0 => '/var/www/app/templates/./header.tpl',
      1 => 1423691272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141990426654e103ba855b96-34892393',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
if (!is_callable('smarty_function_breadcrumbs')) include '/var/www/app/include/Templater/plugins/function.breadcrumbs.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head><?php if ($_smarty_tpl->getVariable('authenticated')->value){?><link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" /><link rel="stylesheet" href="/css/jquery-ui.css" type="text/css" media="all" /><link rel="stylesheet" href="/css/switch.css" type="text/css" media="all" /><?php if ($_smarty_tpl->getVariable('section')->value=="proyectos"){?><link rel="stylesheet" href="/css/calendar.css" type="text/css" media="all" /><link rel="stylesheet" href="/css/screen.css" type="text/css" media="all" /><link rel="stylesheet" href="/css/gantti.css" type="text/css" media="all" /><?php }?><?php }else{ ?><link rel="stylesheet" href="/css/outside.css" type="text/css" media="all" /><?php }?>
<title>WebProAdmin</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/malsup.js"></script>
<script type="text/javascript" src="/js/menu.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
<link rel="stylesheet" type="text/css" href="/css/fonts.css">
<script type="text/javascript" src="/js/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
<link rel="stylesheet" href="/css/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="/js/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
<link rel="stylesheet" href="/js/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="/js/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="/js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<link rel="stylesheet" href="/js/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="/js/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="/js/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="/js/Chart.min.js"></script>
<script type="text/javascript" src="/js/composer.json"></script>
<script type="text/javascript" src="/js/autoNumeric.js"></script>
<script type="text/javascript" src="/js/jquery.timer.js"></script>
<script type="text/javascript" src="/js/jsRemember/jstorage.js"></script>
<script type="text/javascript" src="/js/jsRemember/jsRemember.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54646410-2', 'auto');
  ga('send', 'pageview');

</script></head>
<body>
<?php if ($_smarty_tpl->getVariable('authenticated')->value){?>
<?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->user_type=="employee"){?>
<div id="menu-top">
	<ul>
		<li><a href="<?php echo smarty_function_geturl(array('controller'=>'finanzas'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/webproadmin.png" alt="WebProAdmin"></a></li>
  		<li>&nbsp; </li>
  		<li>&nbsp; </li>
   		<li>&nbsp; </li>
  		<li>&nbsp; </li>
		<?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->section1=="yes"||$_smarty_tpl->getVariable('identity')->value->section2=="yes"||$_smarty_tpl->getVariable('identity')->value->section3=="yes"||$_smarty_tpl->getVariable('identity')->value->section4||$_smarty_tpl->getVariable('identity')->value->section5||$_smarty_tpl->getVariable('identity')->value->section6||$_smarty_tpl->getVariable('identity')->value->section7||$_smarty_tpl->getVariable('identity')->value->section8=="yes"){?>
		<li class="topmenuimp"><a href="<?php if ($_smarty_tpl->getVariable('section')->value=='presupuestos'){?><?php echo smarty_function_geturl(array('controller'=>'herramientas/presupuestos','action'=>'crear'),$_smarty_tpl);?>
<?php }elseif($_smarty_tpl->getVariable('section')->value=='facturas'){?><?php echo smarty_function_geturl(array('controller'=>'herramientas/facturas','action'=>'crear'),$_smarty_tpl);?>
<?php }elseif($_smarty_tpl->getVariable('section')->value=='proformas'){?><?php echo smarty_function_geturl(array('controller'=>'herramientas/proformas','action'=>'crear'),$_smarty_tpl);?>
<?php }elseif($_smarty_tpl->getVariable('section')->value=='gastos'){?><?php echo smarty_function_geturl(array('controller'=>'herramientas/gastos','action'=>'crear'),$_smarty_tpl);?>
<?php }elseif($_smarty_tpl->getVariable('section')->value=='ocompras'){?><?php echo smarty_function_geturl(array('controller'=>'herramientas/ocompras','action'=>'crear'),$_smarty_tpl);?>
<?php }elseif($_smarty_tpl->getVariable('section')->value=='proyectos'){?><?php echo smarty_function_geturl(array('controller'=>'proyectos','action'=>'agregar'),$_smarty_tpl);?>
<?php }elseif($_smarty_tpl->getVariable('section')->value=='contacto'){?><?php echo smarty_function_geturl(array('controller'=>'contacto','action'=>'agregar'),$_smarty_tpl);?>
<?php }elseif($_smarty_tpl->getVariable('section')->value=='cuenta'){?><?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'agregarproductos'),$_smarty_tpl);?>
<?php }else{ ?>#<?php }?>" onclick="clearLocalStorage();"><img src="/images/icons/plus.png" alt="Crear"> Crear</a>
        <ul class="submenu2">
            <?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->section4=="yes"){?><li><a class="item" href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/presupuestos','action'=>'crear'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/budget.png" alt="Presupuesto"> Presupuesto</a></li><?php }?> 
            <?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->section1=="yes"){?><li><a class="item" href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/facturas','action'=>'crear'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/invoice.png" alt="Factura"> Factura</a></li><?php }?> 
            <?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->section5=="yes"){?><li><a class="item" href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/proformas','action'=>'crear'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/proforma.png" alt="Pro-Forma"> Pro-Forma</a></li><?php }?> 
            <?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->section2=="yes"){?><li><a class="item" href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/gastos','action'=>'crear'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/expense.png" alt="Nota Gasto"> Gasto</a></li><?php }?> 
            <?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->section3=="yes"){?><li><a class="item" href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/ocompras','action'=>'crear'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/purchase.png" alt="Orden Compra"> O&#x2F; Compra</a></li><?php }?> 
            <?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->section6=="yes"){?><li><a class="item" href="<?php echo smarty_function_geturl(array('controller'=>'proyectos','action'=>'agregar'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/project.png" alt="Proyecto"> Proyecto</a></li><?php }?> 
            <?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->section6=="yes"){?><li><a class="item" href="<?php echo smarty_function_geturl(array('controller'=>'proyectos','action'=>'agregartarea'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/task.png" alt="Tarea"> Tarea</a></li><?php }?> 
            <?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->section7=="yes"){?><li><a class="item" href="<?php echo smarty_function_geturl(array('controller'=>'contacto','action'=>'agregar'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/contact.png" alt="Contacto"> Contacto</a></li><?php }?> 
            <?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->section7=="yes"){?><li><a class="item" href="<?php echo smarty_function_geturl(array('controller'=>'contacto','action'=>'agregarcompania'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/company.png" alt="Compania"> Compa&ntilde;ia</a></li><?php }?> 
            <?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->section8=="yes"){?><li><a class="item" href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'agregarproductos'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/product.png" alt="Producto"> Producto</a></li><?php }?> 
            <?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"){?><li><a class="item" href="<?php echo smarty_function_geturl(array('controller'=>'usuarios','action'=>'agregar'),$_smarty_tpl);?>
"><img src="/images/icons/user.png" alt="Usuario"> Usuario</a></li><?php }?> 
        </ul>
		</li>
   		<li class="topmenu"><span><a href="<?php echo smarty_function_geturl(array('controller'=>'soporte','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/support.png" alt="Soporte"> Soporte</a></span></li>
   		<li class="topmenu"><span><a href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'logout'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/logout.png" alt="Salir"> Salir</a></span></li><?php }else{ ?><li>&nbsp; </li>
		<?php }?>                
	</ul>
</div>
<div id="breadcrumbs"><p><?php echo smarty_function_breadcrumbs(array('trail'=>$_smarty_tpl->getVariable('breadcrumbs')->value->getTrail(),'separator'=>' &raquo; '),$_smarty_tpl);?>
</p></div>
<div id="menu">
	<ul>
		<ul>
			<li class="welcome"><span><img src="/images/iconsb/welcome.png" alt="Bienvenido"> <?php echo ucfirst($_smarty_tpl->getVariable('identity')->value->username);?>
</span></li>
		</ul>
		<?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->section9=="yes"){?><li class="drop<?php if ($_smarty_tpl->getVariable('section')->value=='finanzas'||$_smarty_tpl->getVariable('section')->value=='tributos'||$_smarty_tpl->getVariable('section')->value=='tesoreria'){?> active<?php }?>"><a href="#" onclick="clearLocalStorage();"><span><?php if ($_smarty_tpl->getVariable('section')->value=='finanzas'||$_smarty_tpl->getVariable('section')->value=='tributos'||$_smarty_tpl->getVariable('section')->value=='tesoreria'){?><img src="/images/icons/finance.png" alt="Finanzas"><?php }else{ ?><img src="/images/iconsb/finance.png" alt="Finanzas"><?php }?> Finanzas</span></a>
		<ul>
	  		<li <?php if ($_smarty_tpl->getVariable('section')->value=='finanzas'&&$_smarty_tpl->getVariable('subsection')->value=='index'){?>class="active"<?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'finanzas','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/panel.png" alt="Panel Negocio"> Panel</span></a></li>
	  		<li <?php if ($_smarty_tpl->getVariable('section')->value=='tributos'&&$_smarty_tpl->getVariable('subsection')->value=='index'){?>class="active"<?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'finanzas/tributos','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/tax.png" alt="Tributos"> Tributos</span></a></li>                
			<li <?php if ($_smarty_tpl->getVariable('section')->value=='tesoreria'&&$_smarty_tpl->getVariable('subsection')->value=='index'){?>class="active"<?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'finanzas/tesoreria','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/capital.png" alt="Tesorer&iacute;a"> Tesorer&iacute;a</span></a></li> 
		</ul>
		</li><?php }?>
  		<?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"){?><li class="drop<?php if ($_smarty_tpl->getVariable('section')->value=='herramientas'||$_smarty_tpl->getVariable('section')->value=='presupuestos'||$_smarty_tpl->getVariable('section')->value=='facturas'||$_smarty_tpl->getVariable('section')->value=='proformas'||$_smarty_tpl->getVariable('section')->value=='gastos'||$_smarty_tpl->getVariable('section')->value=='ocompras'){?> active<?php }?>"><a href="#" onclick="clearLocalStorage();"><span><?php if ($_smarty_tpl->getVariable('section')->value=='herramientas'||$_smarty_tpl->getVariable('section')->value=='presupuestos'||$_smarty_tpl->getVariable('section')->value=='facturas'||$_smarty_tpl->getVariable('section')->value=='proformas'||$_smarty_tpl->getVariable('section')->value=='gastos'||$_smarty_tpl->getVariable('section')->value=='ocompras'){?><img src="/images/icons/tool.png" alt="Herramientas"><?php }else{ ?><img src="/images/iconsb/tool.png" alt="Herramientas"><?php }?> Herramientas</span></a>
		<ul>
	  		<li <?php if ($_smarty_tpl->getVariable('section')->value=='presupuestos'){?>class="active"<?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/presupuestos','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();">
	  		<span><img src="/images/icons/budget.png" alt="Presupuestos"> Presupuestos</span></a></li>
	  		<li <?php if ($_smarty_tpl->getVariable('section')->value=='facturas'){?>class="active"<?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/facturas','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();">
	  		<span><img src="/images/icons/invoice.png" alt="Facturas"> Facturas</span></a></li>
	  		<li <?php if ($_smarty_tpl->getVariable('section')->value=='proformas'){?>class="active"<?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/proformas','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();">
	  		<span><img src="/images/icons/proforma.png" alt="Pro-Formas"> Pro-Formas</span></a></li>
	  		<li <?php if ($_smarty_tpl->getVariable('section')->value=='gastos'){?>class="active"<?php }?>>
	  		<a href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/gastos','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();">
	  		<span><img src="/images/icons/expense.png" alt="Gastos"> Gastos</span></a></li>
	  		<li <?php if ($_smarty_tpl->getVariable('section')->value=='ocompras'){?>class="active"<?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/ocompras','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();">
	  		<span><img src="/images/icons/purchase.png" alt="O/ Compras"> O&#x2F; Compras</span></a></li>   
		</ul>
  		</li><?php }else{ ?>
  		<li class="drop<?php if ($_smarty_tpl->getVariable('section')->value=='herramientas'||$_smarty_tpl->getVariable('section')->value=='presupuestos'||$_smarty_tpl->getVariable('section')->value=='facturas'||$_smarty_tpl->getVariable('section')->value=='proformas'||$_smarty_tpl->getVariable('section')->value=='gastos'||$_smarty_tpl->getVariable('section')->value=='ocompras'){?> active<?php }?>"><a href="#" onclick="clearLocalStorage();"><span><?php if ($_smarty_tpl->getVariable('section')->value=='herramientas'||$_smarty_tpl->getVariable('section')->value=='presupuestos'||$_smarty_tpl->getVariable('section')->value=='facturas'||$_smarty_tpl->getVariable('section')->value=='proformas'||$_smarty_tpl->getVariable('section')->value=='gastos'||$_smarty_tpl->getVariable('section')->value=='ocompras'){?><img src="/images/icons/tool.png" alt="Herramientas"><?php }else{ ?><img src="/images/iconsb/tool.png" alt="Herramientas"><?php }?> Herramientas</span></a>
			<?php if ($_smarty_tpl->getVariable('identity')->value->section1=="yes"||$_smarty_tpl->getVariable('identity')->value->section2=="yes"||$_smarty_tpl->getVariable('identity')->value->section3=="yes"||$_smarty_tpl->getVariable('identity')->value->section4=="yes"||$_smarty_tpl->getVariable('identity')->value->section5=="yes"){?>
			<ul>
		  		<?php if ($_smarty_tpl->getVariable('identity')->value->section4=="yes"){?><li <?php if ($_smarty_tpl->getVariable('section')->value=='presupuestos'){?>class="active"<?php }?>>
		  		<a href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/presupuestos','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/budget.png" alt="Presupuestos"> Presupuestos</span></a></li><?php }?>
		  		<?php if ($_smarty_tpl->getVariable('identity')->value->section1=="yes"){?><li <?php if ($_smarty_tpl->getVariable('section')->value=='facturas'){?>class="active"<?php }?>>
		  		<a href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/facturas','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/invoice.png" alt="Facturas"> Facturas</span></a></li><?php }?>
		  		<?php if ($_smarty_tpl->getVariable('identity')->value->section5=="yes"){?><li <?php if ($_smarty_tpl->getVariable('section')->value=='proformas'){?>class="active"<?php }?>>
		  		<a href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/proformas','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/proforma.png" alt="Pro-Forma"> Pro-Formas</span></a></li><?php }?>
		  		<?php if ($_smarty_tpl->getVariable('identity')->value->section2=="yes"){?><li <?php if ($_smarty_tpl->getVariable('section')->value=='gastos'){?>class="active"<?php }?>>
		  		<a href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/gastos','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/expense.png" alt="Gastos"> Gastos</span></a></li><?php }?>
		  		<?php if ($_smarty_tpl->getVariable('identity')->value->section3=="yes"){?><li <?php if ($_smarty_tpl->getVariable('section')->value=='ocompras'){?>class="active"<?php }?>>
		  		<a href="<?php echo smarty_function_geturl(array('controller'=>'herramientas/ocompras','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/purchase.png" alt="O/ Compras"> O&#x2F; Compras</span></a></li><?php }?>           
			</ul><?php }?>
  		<?php if ($_smarty_tpl->getVariable('identity')->value->section1=="yes"||$_smarty_tpl->getVariable('identity')->value->section2=="yes"||$_smarty_tpl->getVariable('identity')->value->section3=="yes"||$_smarty_tpl->getVariable('identity')->value->section4=="yes"||$_smarty_tpl->getVariable('identity')->value->section5=="yes"){?>
  		</li><?php }?><?php }?>
  		<?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->section6=="yes"){?><li class="drop<?php if ($_smarty_tpl->getVariable('section')->value=='proyectos'){?> active<?php }?>"><a href="#" onclick="clearLocalStorage();"><span><?php if ($_smarty_tpl->getVariable('section')->value=='proyectos'){?><img src="/images/icons/project.png" alt="Proyectos"><?php }else{ ?><img src="/images/iconsb/project.png" alt="Proyectos"><?php }?> Proyectos</span></a>
		<ul>
	  		<li <?php if ($_smarty_tpl->getVariable('section')->value=='proyectos'){?><?php if ($_smarty_tpl->getVariable('subsection')->value=='index'||$_smarty_tpl->getVariable('subsection')->value=='agregar'||$_smarty_tpl->getVariable('subsection')->value=='editar'||$_smarty_tpl->getVariable('subsection')->value=='fichaproyecto'){?>class="active"<?php }?><?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'proyectos','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/brief.png" alt="Resumen"> Resumen</span></a></li>
	  		<li <?php if ($_smarty_tpl->getVariable('section')->value=='proyectos'){?><?php if ($_smarty_tpl->getVariable('subsection')->value=='tareas'||$_smarty_tpl->getVariable('subsection')->value=='editartarea'||$_smarty_tpl->getVariable('subsection')->value=='agregartarea'){?>class="active"<?php }?><?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'proyectos','action'=>'tareas'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/task.png" alt="Tareas"> Tareas</span></a></li> 
	  		<li <?php if ($_smarty_tpl->getVariable('section')->value=='proyectos'){?><?php if ($_smarty_tpl->getVariable('subsection')->value=='horas'||$_smarty_tpl->getVariable('subsection')->value=='editarhora'||$_smarty_tpl->getVariable('subsection')->value=='agregarhora'){?>class="active"<?php }?><?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'proyectos','action'=>'horas'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/time.png" alt="Horas"> Horas</span></a></li>                   
		</ul>
  		</li><?php }?>
  		<?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->section7=="yes"){?><li class="drop<?php if ($_smarty_tpl->getVariable('section')->value=='contacto'){?> active<?php }?>"><a href="#" onclick="clearLocalStorage();"><span><?php if ($_smarty_tpl->getVariable('section')->value=='contacto'){?><img src="/images/icons/group.png" alt="Contactos"><?php }else{ ?><img src="/images/iconsb/group.png" alt="Contactos"><?php }?> Contactos</span></a>
		<ul>
	  		<li <?php if ($_smarty_tpl->getVariable('section')->value=='contacto'){?><?php if ($_smarty_tpl->getVariable('subsection')->value=='index'||$_smarty_tpl->getVariable('subsection')->value=='agregar'||$_smarty_tpl->getVariable('subsection')->value=='editar'||$_smarty_tpl->getVariable('subsection')->value=='contactocompleto'||$_smarty_tpl->getVariable('subsection')->value=='fichacontacto'){?>class="active"<?php }?><?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'contacto','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/contact.png" alt="Contactos"> Contactos</span></a></li> 
	  		<li <?php if ($_smarty_tpl->getVariable('section')->value=='contacto'){?><?php if ($_smarty_tpl->getVariable('subsection')->value=='companias'||$_smarty_tpl->getVariable('subsection')->value=='agregarcompania'||$_smarty_tpl->getVariable('subsection')->value=='editarcompania'||$_smarty_tpl->getVariable('subsection')->value=='fichacompania'){?>class="active"<?php }?><?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'contacto','action'=>'companias'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/company.png" alt="Compa&ntilde;&iacute;as"> Compa&ntilde;&iacute;as</span></a></li> 
		</ul>
  		</li><?php }?>
  		<li class="drop<?php if ($_smarty_tpl->getVariable('section')->value=='cuenta'||$_smarty_tpl->getVariable('section')->value=='usuarios'){?> active<?php }?>"><a href="#" onclick="clearLocalStorage();"><span><?php if ($_smarty_tpl->getVariable('section')->value=='cuenta'||$_smarty_tpl->getVariable('section')->value=='usuarios'){?><img src="/images/icons/account.png" alt="Cuenta"><?php }else{ ?><img src="/images/iconsb/account.png" alt="Cuenta"><?php }?> Cuenta</span></a>
		<ul>
	  		<li <?php if ($_smarty_tpl->getVariable('section')->value=='cuenta'){?><?php if ($_smarty_tpl->getVariable('subsection')->value=='index'||$_smarty_tpl->getVariable('subsection')->value=='detalles'||$_smarty_tpl->getVariable('subsection')->value=='perfilcompleto'){?>class="active"<?php }?><?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/profile.png" alt="Perfil"> Perfil</span></a></li>
	  		<?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"){?><li <?php if ($_smarty_tpl->getVariable('section')->value=='usuarios'){?><?php if ($_smarty_tpl->getVariable('subsection')->value=='index'||$_smarty_tpl->getVariable('subsection')->value=='agregar'||$_smarty_tpl->getVariable('subsection')->value=='editar'){?>class="active"<?php }?><?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'usuarios','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/user.png" alt="Usuarios"> Usuarios</span></a></li><?php }?>
	  		<?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"){?><li <?php if ($_smarty_tpl->getVariable('section')->value=='cuenta'){?><?php if ($_smarty_tpl->getVariable('subsection')->value=='empresa'||$_smarty_tpl->getVariable('subsection')->value=='empresacompleta'){?>class="active"<?php }?><?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'empresa'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/mycompany.png" alt="Empresa"> Empresa</span></a></li><?php }?>
	  		<?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->section8=="yes"){?><li <?php if ($_smarty_tpl->getVariable('section')->value=='cuenta'){?><?php if ($_smarty_tpl->getVariable('subsection')->value=='fichaproducto'||$_smarty_tpl->getVariable('subsection')->value=='editarproducto'||$_smarty_tpl->getVariable('subsection')->value=='agregarproductos'||$_smarty_tpl->getVariable('subsection')->value=='productos'||$_smarty_tpl->getVariable('subsection')->value=='productocompleto'){?>class="active"<?php }?><?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'productos'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><span><img src="/images/icons/product.png" alt="Productos"> Productos</span></a></li><?php }?>           
		</ul>
  		</li>                    
	</ul>
</div>

<?php }elseif($_smarty_tpl->getVariable('identity')->value->user_type=="accountant"){?>
<div id="menu-top">
	<ul>
			<li><a href="<?php echo smarty_function_geturl(array('controller'=>'resumen','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/webproadmin.png" alt="WebProAdmin"></a></li>
	  		<li>&nbsp; </li>
	  		<li>&nbsp; </li> 
	  		<li>&nbsp; </li>
	  		<li>&nbsp; </li>
	  		<li>&nbsp; </li>
	  		<li>&nbsp; </li>
	  		<li class="topmenu"><a href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'logout'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/logout.png" alt="Salir"> Salir</a></li>                
	</ul>
</div>
<div id="breadcrumbs"><p><?php echo smarty_function_breadcrumbs(array('trail'=>$_smarty_tpl->getVariable('breadcrumbs')->value->getTrail(),'separator'=>' &raquo; '),$_smarty_tpl);?>
</p></div>
<div id="menu">
	<ul>
		<ul>
			<li class="welcome"><span><img src="/images/iconsb/welcome.png" alt="Bienvenido"> <?php echo ucfirst($_smarty_tpl->getVariable('identity')->value->username);?>
</span></li>
		</ul>
		<li class="drop active">
		<ul>
		<li <?php if ($_smarty_tpl->getVariable('section')->value=='resumen'){?>class="active"<?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'resumen','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/company.png" alt="Empresa"> Empresa</a></li>
		<li <?php if ($_smarty_tpl->getVariable('section')->value=='contabilidad'){?>class="active"<?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'contabilidad','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/finance.png" alt="Contabilidad"> Contabilidad</a></li>
  		<li <?php if ($_smarty_tpl->getVariable('section')->value=='cuenta'){?>class="active"<?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/welcome.png" alt="Perfil"> Perfil</a></li>
  		</ul>
  		</li>                 
	</ul>
</div>
<?php }elseif($_smarty_tpl->getVariable('identity')->value->user_type=="association"){?>
<div id="menu-top">
	<ul>
		<li><a href="<?php echo smarty_function_geturl(array('controller'=>'advisors','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/webproadmin.png" alt="WebProAdmin"></a></li>
  		<li>&nbsp; </li>
  		<li>&nbsp; </li> 
  		<li>&nbsp; </li>
  		<li>&nbsp; </li>
  		<li>&nbsp; </li>
 		<li class="topmenu"><span><a href="<?php echo smarty_function_geturl(array('controller'=>'soporte','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/support.png" alt="Soporte"> Soporte</a></span></li>
  		<li class="topmenu"><a href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'logout'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/logout.png" alt="Salir"> Salir</a></li>                 
	</ul>
</div>
<div id="breadcrumbs"><p><?php echo smarty_function_breadcrumbs(array('trail'=>$_smarty_tpl->getVariable('breadcrumbs')->value->getTrail(),'separator'=>' &raquo; '),$_smarty_tpl);?>
</p></div>
<div id="menu">
	<ul>
	  <ul>
		 <li class="welcome"><span><img src="/images/iconsb/welcome.png" alt="Bienvenido"> <?php echo ucfirst($_smarty_tpl->getVariable('identity')->value->username);?>
</span></li>
	  </ul>
	  <li class="drop active">
	  <ul>
		<li <?php if ($_smarty_tpl->getVariable('section')->value=='advisors'){?>class="active"<?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'advisors','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/group.png" alt="Advisors"> Advisors</a></li>
		<li <?php if ($_smarty_tpl->getVariable('section')->value=='comsiones'){?>class="active"<?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'comisiones','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/expense.png" alt="Comisiones"> Comisiones</a></li>
  		<li <?php if ($_smarty_tpl->getVariable('section')->value=='cuenta'){?>class="active"<?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/welcome.png" alt="Perfil"> Perfil</a></li>                
	   </ul>
	   </li>
	</ul>
</div>
<?php }elseif($_smarty_tpl->getVariable('identity')->value->user_type=="advisor"){?>
<div id="menu-top">
	<ul>
		<li><a href="<?php echo smarty_function_geturl(array('controller'=>'clientes','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/webproadmin.png" alt="WebProAdmin"></a></li>
  		<li>&nbsp; </li>
  		<li>&nbsp; </li> 
  		<li>&nbsp; </li>
  		<li>&nbsp; </li>
  		<li>&nbsp; </li>   
 		<li class="topmenu"><span><a href="<?php echo smarty_function_geturl(array('controller'=>'soporte','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/support.png" alt="Soporte"> Soporte</a></span></li>
  		<li class="topmenu"><a href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'logout'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/logout.png" alt="Salir"> Salir</a></li>               
	</ul>
</div>
<div id="breadcrumbs"><p><?php echo smarty_function_breadcrumbs(array('trail'=>$_smarty_tpl->getVariable('breadcrumbs')->value->getTrail(),'separator'=>' &raquo; '),$_smarty_tpl);?>
</p></div>
<div id="menu">
	<ul>
	   <ul>
		 <li class="welcome"><span><img src="/images/iconsb/welcome.png" alt="Bienvenido"> <?php echo ucfirst($_smarty_tpl->getVariable('identity')->value->username);?>
</span></li>
	  </ul>
	  <li class="drop active">
	  <ul>
		<li <?php if ($_smarty_tpl->getVariable('section')->value=='clientes'){?>class="active"<?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'clientes','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/contact.png" alt="Clientes"> Clientes</a></li>
		<li <?php if ($_smarty_tpl->getVariable('section')->value=='comisiones'){?>class="active"<?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'comisiones','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/expense.png" alt="Comisiones"> Comisiones</a></li>
  		<li <?php if ($_smarty_tpl->getVariable('section')->value=='cuenta'){?>class="active"<?php }?>><a href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'index'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><img src="/images/icons/welcome.png" alt="Perfil"> Perfil</a></li>
  	   </ul> 
  	   </li>                  
	</ul>
</div>
<?php }?>
<?php }else{ ?>
<div id="menu-out">
	<ul>
		<li><?php if ($_smarty_tpl->getVariable('section')->value=='cuenta'){?><a href="http://webproadmin.com/" onclick="clearLocalStorage();"><?php }else{ ?><a href="<?php echo smarty_function_geturl(array('controller'=>'recomendador','action'=>'login'),$_smarty_tpl);?>
" onclick="clearLocalStorage();"><?php }?><img src="/images/webproadmin.png" alt="WebProAdmin"></a></li>
 		<li>&nbsp;</li>
 		<li>&nbsp;</li>
 		<li>&nbsp;</li>
 		<li>&nbsp;</li>
 		<li>&nbsp;</li>
 		<li>&nbsp;</li>
	</ul>
</div>
<?php }?>
<div id="content">