<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>{if $authenticated}<link rel="stylesheet" href="/css/inside.css" type="text/css" media="all" /><link rel="stylesheet" href="/css/jquery-ui.css" type="text/css" media="all" /><link rel="stylesheet" href="/css/switch.css" type="text/css" media="all" />{if $section == "proyectos"}<link rel="stylesheet" href="/css/calendar.css" type="text/css" media="all" /><link rel="stylesheet" href="/css/screen.css" type="text/css" media="all" /><link rel="stylesheet" href="/css/gantti.css" type="text/css" media="all" />{/if}{else}<link rel="stylesheet" href="/css/outside.css" type="text/css" media="all" />{/if}
<title>WebProAdmin</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta name="viewport" content="initial-scale=1.0, user-scalable=no">
{literal}<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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

</script>{/literal}</head>
<body>
{if $authenticated}
{if $identity->user_type == "proprietary" || $identity->user_type == "employee" }
<div id="menu-top">
	<ul>
		<li><a href="{geturl controller='finanzas'}" onclick="clearLocalStorage();"><img src="/images/webproadmin.png" alt="WebProAdmin"></a></li>
  		<li>&nbsp; </li>
  		<li>&nbsp; </li>
   		<li>&nbsp; </li>
  		<li>&nbsp; </li>
		{if $identity->user_type == "proprietary" || $identity->section1 == "yes" || $identity->section2 == "yes" || $identity->section3 == "yes" || $identity->section4 || $identity->section5 || $identity->section6 || $identity->section7 || $identity->section8 == "yes"}
		<li class="topmenuimp"><a href="{if $section == 'presupuestos'}{geturl controller='herramientas/presupuestos' action='crear'}{elseif $section == 'facturas'}{geturl controller='herramientas/facturas' action='crear'}{elseif $section == 'proformas'}{geturl controller='herramientas/proformas' action='crear'}{elseif $section == 'gastos'}{geturl controller='herramientas/gastos' action='crear'}{elseif $section == 'ocompras'}{geturl controller='herramientas/ocompras' action='crear'}{elseif $section == 'proyectos'}{geturl controller='proyectos' action='agregar'}{elseif $section == 'contacto'}{geturl controller='contacto' action='agregar'}{elseif $section == 'cuenta'}{geturl controller='cuenta' action='agregarproductos'}{else}#{/if}" onclick="clearLocalStorage();"><img src="/images/icons/plus.png" alt="Crear"> Crear</a>
        <ul class="submenu2">
            {if $identity->user_type == "proprietary" || $identity->section4 == "yes"}<li><a class="item" href="{geturl controller='herramientas/presupuestos' action='crear'}" onclick="clearLocalStorage();"><img src="/images/icons/budget.png" alt="Presupuesto"> Presupuesto</a></li>{/if} 
            {if $identity->user_type == "proprietary" || $identity->section1 == "yes"}<li><a class="item" href="{geturl controller='herramientas/facturas' action='crear'}" onclick="clearLocalStorage();"><img src="/images/icons/invoice.png" alt="Factura"> Factura</a></li>{/if} 
            {if $identity->user_type == "proprietary" || $identity->section5 == "yes"}<li><a class="item" href="{geturl controller='herramientas/proformas' action='crear'}" onclick="clearLocalStorage();"><img src="/images/icons/proforma.png" alt="Pro-Forma"> Pro-Forma</a></li>{/if} 
            {if $identity->user_type == "proprietary" || $identity->section2 == "yes"}<li><a class="item" href="{geturl controller='herramientas/gastos' action='crear'}" onclick="clearLocalStorage();"><img src="/images/icons/expense.png" alt="Nota Gasto"> Gasto</a></li>{/if} 
            {if $identity->user_type == "proprietary" || $identity->section3 == "yes"}<li><a class="item" href="{geturl controller='herramientas/ocompras' action='crear'}" onclick="clearLocalStorage();"><img src="/images/icons/purchase.png" alt="Orden Compra"> O&#x2F; Compra</a></li>{/if} 
            {if $identity->user_type == "proprietary" || $identity->section6 == "yes"}<li><a class="item" href="{geturl controller='proyectos' action='agregar'}" onclick="clearLocalStorage();"><img src="/images/icons/project.png" alt="Proyecto"> Proyecto</a></li>{/if} 
            {if $identity->user_type == "proprietary" || $identity->section6 == "yes"}<li><a class="item" href="{geturl controller='proyectos' action='agregartarea'}" onclick="clearLocalStorage();"><img src="/images/icons/task.png" alt="Tarea"> Tarea</a></li>{/if} 
            {if $identity->user_type == "proprietary" || $identity->section7 == "yes"}<li><a class="item" href="{geturl controller='contacto' action='agregar'}" onclick="clearLocalStorage();"><img src="/images/icons/contact.png" alt="Contacto"> Contacto</a></li>{/if} 
            {if $identity->user_type == "proprietary" || $identity->section7 == "yes"}<li><a class="item" href="{geturl controller='contacto' action='agregarcompania'}" onclick="clearLocalStorage();"><img src="/images/icons/company.png" alt="Compania"> Compa&ntilde;ia</a></li>{/if} 
            {if $identity->user_type == "proprietary" || $identity->section8 == "yes"}<li><a class="item" href="{geturl controller='cuenta' action='agregarproductos'}" onclick="clearLocalStorage();"><img src="/images/icons/product.png" alt="Producto"> Producto</a></li>{/if} 
            {if $identity->user_type == "proprietary"}<li><a class="item" href="{geturl controller='usuarios' action='agregar'}"><img src="/images/icons/user.png" alt="Usuario"> Usuario</a></li>{/if} 
        </ul>
		</li>
   		<li class="topmenu"><span><a href="{geturl controller='soporte' action='index'}" onclick="clearLocalStorage();"><img src="/images/icons/support.png" alt="Soporte"> Soporte</a></span></li>
   		<li class="topmenu"><span><a href="{geturl controller='cuenta' action='logout'}" onclick="clearLocalStorage();"><img src="/images/icons/logout.png" alt="Salir"> Salir</a></span></li>{else}<li>&nbsp; </li>
		{/if}                
	</ul>
</div>
<div id="breadcrumbs"><p>{breadcrumbs trail=$breadcrumbs->getTrail() separator=' &raquo; '}</p></div>
<div id="menu">
	<ul>
		<ul>
			<li class="welcome"><span><img src="/images/iconsb/welcome.png" alt="Bienvenido"> {$identity->username|ucfirst}</span></li>
		</ul>
		{if $identity->user_type == "proprietary" || $identity->section9 == "yes"}<li class="drop{if $section == 'finanzas' || $section == 'tributos' || $section == 'tesoreria'} active{/if}"><a href="#" onclick="clearLocalStorage();"><span>{if $section == 'finanzas' || $section == 'tributos' || $section == 'tesoreria'}<img src="/images/icons/finance.png" alt="Finanzas">{else}<img src="/images/iconsb/finance.png" alt="Finanzas">{/if} Finanzas</span></a>
		<ul>
	  		<li {if $section == 'finanzas' && $subsection == 'index'}class="active"{/if}><a href="{geturl controller='finanzas' action='index'}" onclick="clearLocalStorage();"><span><img src="/images/icons/panel.png" alt="Panel Negocio"> Panel</span></a></li>
	  		<li {if $section == 'tributos' && $subsection == 'index'}class="active"{/if}><a href="{geturl controller='finanzas/tributos' action='index'}" onclick="clearLocalStorage();"><span><img src="/images/icons/tax.png" alt="Tributos"> Tributos</span></a></li>                
			<li {if $section == 'tesoreria' && $subsection == 'index'}class="active"{/if}><a href="{geturl controller='finanzas/tesoreria' action='index'}" onclick="clearLocalStorage();"><span><img src="/images/icons/capital.png" alt="Tesorer&iacute;a"> Tesorer&iacute;a</span></a></li> 
		</ul>
		</li>{/if}
  		{if $identity->user_type == "proprietary"}<li class="drop{if $section == 'herramientas' || $section == 'presupuestos' || $section == 'facturas' || $section == 'proformas' || $section == 'gastos' || $section == 'ocompras'} active{/if}"><a href="#" onclick="clearLocalStorage();"><span>{if $section == 'herramientas' || $section == 'presupuestos' || $section == 'facturas' || $section == 'proformas' || $section == 'gastos' || $section == 'ocompras'}<img src="/images/icons/tool.png" alt="Herramientas">{else}<img src="/images/iconsb/tool.png" alt="Herramientas">{/if} Herramientas</span></a>
		<ul>
	  		<li {if $section == 'presupuestos'}class="active"{/if}><a href="{geturl controller='herramientas/presupuestos' action='index'}" onclick="clearLocalStorage();">
	  		<span><img src="/images/icons/budget.png" alt="Presupuestos"> Presupuestos</span></a></li>
	  		<li {if $section == 'facturas'}class="active"{/if}><a href="{geturl controller='herramientas/facturas' action='index'}" onclick="clearLocalStorage();">
	  		<span><img src="/images/icons/invoice.png" alt="Facturas"> Facturas</span></a></li>
	  		<li {if $section == 'proformas'}class="active"{/if}><a href="{geturl controller='herramientas/proformas' action='index'}" onclick="clearLocalStorage();">
	  		<span><img src="/images/icons/proforma.png" alt="Pro-Formas"> Pro-Formas</span></a></li>
	  		<li {if $section == 'gastos'}class="active"{/if}>
	  		<a href="{geturl controller='herramientas/gastos' action='index'}" onclick="clearLocalStorage();">
	  		<span><img src="/images/icons/expense.png" alt="Gastos"> Gastos</span></a></li>
	  		<li {if $section == 'ocompras'}class="active"{/if}><a href="{geturl controller='herramientas/ocompras' action='index'}" onclick="clearLocalStorage();">
	  		<span><img src="/images/icons/purchase.png" alt="O/ Compras"> O&#x2F; Compras</span></a></li>   
		</ul>
  		</li>{else}
  		<li class="drop{if $section == 'herramientas' || $section == 'presupuestos' || $section == 'facturas' || $section == 'proformas' || $section == 'gastos' || $section == 'ocompras'} active{/if}"><a href="#" onclick="clearLocalStorage();"><span>{if $section == 'herramientas' || $section == 'presupuestos' || $section == 'facturas' || $section == 'proformas' || $section == 'gastos' || $section == 'ocompras'}<img src="/images/icons/tool.png" alt="Herramientas">{else}<img src="/images/iconsb/tool.png" alt="Herramientas">{/if} Herramientas</span></a>
			{if $identity->section1 == "yes" || $identity->section2 == "yes" || $identity->section3 == "yes" || $identity->section4 == "yes" || $identity->section5 == "yes"}
			<ul>
		  		{if $identity->section4 == "yes"}<li {if $section == 'presupuestos'}class="active"{/if}>
		  		<a href="{geturl controller='herramientas/presupuestos' action='index'}" onclick="clearLocalStorage();"><span><img src="/images/icons/budget.png" alt="Presupuestos"> Presupuestos</span></a></li>{/if}
		  		{if $identity->section1 == "yes"}<li {if $section == 'facturas'}class="active"{/if}>
		  		<a href="{geturl controller='herramientas/facturas' action='index'}" onclick="clearLocalStorage();"><span><img src="/images/icons/invoice.png" alt="Facturas"> Facturas</span></a></li>{/if}
		  		{if $identity->section5 == "yes"}<li {if $section == 'proformas'}class="active"{/if}>
		  		<a href="{geturl controller='herramientas/proformas' action='index'}" onclick="clearLocalStorage();"><span><img src="/images/icons/proforma.png" alt="Pro-Forma"> Pro-Formas</span></a></li>{/if}
		  		{if $identity->section2 == "yes"}<li {if $section == 'gastos'}class="active"{/if}>
		  		<a href="{geturl controller='herramientas/gastos' action='index'}" onclick="clearLocalStorage();"><span><img src="/images/icons/expense.png" alt="Gastos"> Gastos</span></a></li>{/if}
		  		{if $identity->section3 == "yes"}<li {if $section == 'ocompras'}class="active"{/if}>
		  		<a href="{geturl controller='herramientas/ocompras' action='index'}" onclick="clearLocalStorage();"><span><img src="/images/icons/purchase.png" alt="O/ Compras"> O&#x2F; Compras</span></a></li>{/if}           
			</ul>{/if}
  		{if $identity->section1 == "yes" || $identity->section2 == "yes" || $identity->section3 == "yes" || $identity->section4 == "yes" || $identity->section5 == "yes"}
  		</li>{/if}{/if}
  		{if $identity->user_type == "proprietary" || $identity->section6 == "yes"}<li class="drop{if $section == 'proyectos'} active{/if}"><a href="#" onclick="clearLocalStorage();"><span>{if $section == 'proyectos'}<img src="/images/icons/project.png" alt="Proyectos">{else}<img src="/images/iconsb/project.png" alt="Proyectos">{/if} Proyectos</span></a>
		<ul>
	  		<li {if $section == 'proyectos'}{if $subsection == 'index' || $subsection == 'agregar' || $subsection == 'editar' || $subsection == 'fichaproyecto'}class="active"{/if}{/if}><a href="{geturl controller='proyectos' action='index'}" onclick="clearLocalStorage();"><span><img src="/images/icons/brief.png" alt="Resumen"> Resumen</span></a></li>
	  		<li {if $section == 'proyectos'}{if $subsection == 'tareas' || $subsection == 'editartarea' || $subsection == 'agregartarea'}class="active"{/if}{/if}><a href="{geturl controller='proyectos' action='tareas'}" onclick="clearLocalStorage();"><span><img src="/images/icons/task.png" alt="Tareas"> Tareas</span></a></li> 
	  		<li {if $section == 'proyectos'}{if $subsection == 'horas' || $subsection == 'editarhora' || $subsection == 'agregarhora'}class="active"{/if}{/if}><a href="{geturl controller='proyectos' action='horas'}" onclick="clearLocalStorage();"><span><img src="/images/icons/time.png" alt="Horas"> Horas</span></a></li>                   
		</ul>
  		</li>{/if}
  		{if $identity->user_type == "proprietary" || $identity->section7 == "yes"}<li class="drop{if $section == 'contacto'} active{/if}"><a href="#" onclick="clearLocalStorage();"><span>{if $section == 'contacto'}<img src="/images/icons/group.png" alt="Contactos">{else}<img src="/images/iconsb/group.png" alt="Contactos">{/if} Contactos</span></a>
		<ul>
	  		<li {if $section == 'contacto'}{if $subsection == 'index' || $subsection == 'agregar' || $subsection == 'editar' || $subsection == 'contactocompleto' || $subsection == 'fichacontacto'}class="active"{/if}{/if}><a href="{geturl controller='contacto' action='index'}" onclick="clearLocalStorage();"><span><img src="/images/icons/contact.png" alt="Contactos"> Contactos</span></a></li> 
	  		<li {if $section == 'contacto'}{if $subsection == 'companias' || $subsection == 'agregarcompania' || $subsection == 'editarcompania' || $subsection == 'fichacompania'}class="active"{/if}{/if}><a href="{geturl controller='contacto' action='companias'}" onclick="clearLocalStorage();"><span><img src="/images/icons/company.png" alt="Compa&ntilde;&iacute;as"> Compa&ntilde;&iacute;as</span></a></li> 
		</ul>
  		</li>{/if}
  		<li class="drop{if $section == 'cuenta' || $section == 'usuarios'} active{/if}"><a href="#" onclick="clearLocalStorage();"><span>{if $section == 'cuenta' || $section == 'usuarios'}<img src="/images/icons/account.png" alt="Cuenta">{else}<img src="/images/iconsb/account.png" alt="Cuenta">{/if} Cuenta</span></a>
		<ul>
	  		<li {if $section == 'cuenta'}{if $subsection == 'index' || $subsection == 'detalles' || $subsection == 'perfilcompleto'}class="active"{/if}{/if}><a href="{geturl controller='cuenta'  action='index'}" onclick="clearLocalStorage();"><span><img src="/images/icons/profile.png" alt="Perfil"> Perfil</span></a></li>
	  		{if $identity->user_type == "proprietary"}<li {if $section == 'usuarios'}{if $subsection == 'index' || $subsection == 'agregar' || $subsection == 'editar'}class="active"{/if}{/if}><a href="{geturl controller='usuarios'  action='index'}" onclick="clearLocalStorage();"><span><img src="/images/icons/user.png" alt="Usuarios"> Usuarios</span></a></li>{/if}
	  		{if $identity->user_type == "proprietary"}<li {if $section == 'cuenta'}{if $subsection == 'empresa' || $subsection == 'empresacompleta'}class="active"{/if}{/if}><a href="{geturl controller='cuenta'  action='empresa'}" onclick="clearLocalStorage();"><span><img src="/images/icons/mycompany.png" alt="Empresa"> Empresa</span></a></li>{/if}
	  		{if $identity->user_type == "proprietary" || $identity->section8 == "yes"}<li {if $section == 'cuenta'}{if $subsection == 'fichaproducto' || $subsection == 'editarproducto' || $subsection == 'agregarproductos' || $subsection == 'productos' || $subsection == 'productocompleto'}class="active"{/if}{/if}><a href="{geturl controller='cuenta'  action='productos'}" onclick="clearLocalStorage();"><span><img src="/images/icons/product.png" alt="Productos"> Productos</span></a></li>{/if}           
		</ul>
  		</li>                    
	</ul>
</div>

{elseif $identity->user_type == "accountant"}
<div id="menu-top">
	<ul>
			<li><a href="{geturl controller='resumen' action='index'}" onclick="clearLocalStorage();"><img src="/images/webproadmin.png" alt="WebProAdmin"></a></li>
	  		<li>&nbsp; </li>
	  		<li>&nbsp; </li> 
	  		<li>&nbsp; </li>
	  		<li>&nbsp; </li>
	  		<li>&nbsp; </li>
	  		<li>&nbsp; </li>
	  		<li class="topmenu"><a href="{geturl controller='cuenta' action='logout'}" onclick="clearLocalStorage();"><img src="/images/icons/logout.png" alt="Salir"> Salir</a></li>                
	</ul>
</div>
<div id="breadcrumbs"><p>{breadcrumbs trail=$breadcrumbs->getTrail() separator=' &raquo; '}</p></div>
<div id="menu">
	<ul>
		<ul>
			<li class="welcome"><span><img src="/images/iconsb/welcome.png" alt="Bienvenido"> {$identity->username|ucfirst}</span></li>
		</ul>
		<li class="drop active">
		<ul>
		<li {if $section == 'resumen'}class="active"{/if}><a href="{geturl controller='resumen' action='index'}" onclick="clearLocalStorage();"><img src="/images/icons/company.png" alt="Empresa"> Empresa</a></li>
		<li {if $section == 'contabilidad'}class="active"{/if}><a href="{geturl controller='contabilidad' action='index'}" onclick="clearLocalStorage();"><img src="/images/icons/finance.png" alt="Contabilidad"> Contabilidad</a></li>
  		<li {if $section == 'cuenta'}class="active"{/if}><a href="{geturl controller='cuenta' action='index'}" onclick="clearLocalStorage();"><img src="/images/icons/welcome.png" alt="Perfil"> Perfil</a></li>
  		</ul>
  		</li>                 
	</ul>
</div>
{elseif $identity->user_type == "association"}
<div id="menu-top">
	<ul>
		<li><a href="{geturl controller='advisors' action='index'}" onclick="clearLocalStorage();"><img src="/images/webproadmin.png" alt="WebProAdmin"></a></li>
  		<li>&nbsp; </li>
  		<li>&nbsp; </li> 
  		<li>&nbsp; </li>
  		<li>&nbsp; </li>
  		<li>&nbsp; </li>
 		<li class="topmenu"><span><a href="{geturl controller='soporte' action='index'}" onclick="clearLocalStorage();"><img src="/images/icons/support.png" alt="Soporte"> Soporte</a></span></li>
  		<li class="topmenu"><a href="{geturl controller='cuenta' action='logout'}" onclick="clearLocalStorage();"><img src="/images/icons/logout.png" alt="Salir"> Salir</a></li>                 
	</ul>
</div>
<div id="breadcrumbs"><p>{breadcrumbs trail=$breadcrumbs->getTrail() separator=' &raquo; '}</p></div>
<div id="menu">
	<ul>
	  <ul>
		 <li class="welcome"><span><img src="/images/iconsb/welcome.png" alt="Bienvenido"> {$identity->username|ucfirst}</span></li>
	  </ul>
	  <li class="drop active">
	  <ul>
		<li {if $section == 'advisors'}class="active"{/if}><a href="{geturl controller='advisors'  action='index'}" onclick="clearLocalStorage();"><img src="/images/icons/group.png" alt="Advisors"> Advisors</a></li>
		<li {if $section == 'comsiones'}class="active"{/if}><a href="{geturl controller='comisiones'  action='index'}" onclick="clearLocalStorage();"><img src="/images/icons/expense.png" alt="Comisiones"> Comisiones</a></li>
  		<li {if $section == 'cuenta'}class="active"{/if}><a href="{geturl controller='cuenta'  action='index'}" onclick="clearLocalStorage();"><img src="/images/icons/welcome.png" alt="Perfil"> Perfil</a></li>                
	   </ul>
	   </li>
	</ul>
</div>
{elseif $identity->user_type == "advisor"}
<div id="menu-top">
	<ul>
		<li><a href="{geturl controller='clientes' action='index'}" onclick="clearLocalStorage();"><img src="/images/webproadmin.png" alt="WebProAdmin"></a></li>
  		<li>&nbsp; </li>
  		<li>&nbsp; </li> 
  		<li>&nbsp; </li>
  		<li>&nbsp; </li>
  		<li>&nbsp; </li>   
 		<li class="topmenu"><span><a href="{geturl controller='soporte' action='index'}" onclick="clearLocalStorage();"><img src="/images/icons/support.png" alt="Soporte"> Soporte</a></span></li>
  		<li class="topmenu"><a href="{geturl controller='cuenta' action='logout'}" onclick="clearLocalStorage();"><img src="/images/icons/logout.png" alt="Salir"> Salir</a></li>               
	</ul>
</div>
<div id="breadcrumbs"><p>{breadcrumbs trail=$breadcrumbs->getTrail() separator=' &raquo; '}</p></div>
<div id="menu">
	<ul>
	   <ul>
		 <li class="welcome"><span><img src="/images/iconsb/welcome.png" alt="Bienvenido"> {$identity->username|ucfirst}</span></li>
	  </ul>
	  <li class="drop active">
	  <ul>
		<li {if $section == 'clientes'}class="active"{/if}><a href="{geturl controller='clientes'  action='index'}" onclick="clearLocalStorage();"><img src="/images/icons/contact.png" alt="Clientes"> Clientes</a></li>
		<li {if $section == 'comisiones'}class="active"{/if}><a href="{geturl controller='comisiones'  action='index'}" onclick="clearLocalStorage();"><img src="/images/icons/expense.png" alt="Comisiones"> Comisiones</a></li>
  		<li {if $section == 'cuenta'}class="active"{/if}><a href="{geturl controller='cuenta'  action='index'}" onclick="clearLocalStorage();"><img src="/images/icons/welcome.png" alt="Perfil"> Perfil</a></li>
  	   </ul> 
  	   </li>                  
	</ul>
</div>
{/if}
{else}
<div id="menu-out">
	<ul>
		<li>{if $section == 'cuenta'}<a href="http://webproadmin.com/" onclick="clearLocalStorage();">{else}<a href="{geturl controller='recomendador' action='login'}" onclick="clearLocalStorage();">{/if}<img src="/images/webproadmin.png" alt="WebProAdmin"></a></li>
 		<li>&nbsp;</li>
 		<li>&nbsp;</li>
 		<li>&nbsp;</li>
 		<li>&nbsp;</li>
 		<li>&nbsp;</li>
 		<li>&nbsp;</li>
	</ul>
</div>
{/if}
<div id="content">