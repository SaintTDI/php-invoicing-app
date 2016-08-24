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
<div id="menu-out2">
	<ul>
		<li>{if $section == 'cuenta'}<a href="http://webproadmin.com/" onclick="clearLocalStorage();">{else}<a href="{geturl controller='recomendador' action='login'}" onclick="clearLocalStorage();">{/if}<img src="/images/webproadmin.png" alt="WebProAdmin"></a></li>
 		<li>&nbsp;</li>
 		<li>&nbsp;</li>
 		<li>&nbsp;</li>
  		<li>&nbsp;</li>
 		<li>&nbsp;</li>
 		<li>&nbsp;</li>
  		<li>&nbsp;</li>
 		<li>&nbsp;</li>
 		<li>&nbsp;</li>
 		<li>&nbsp;</li>
	</ul>
</div>
<div id="content7">