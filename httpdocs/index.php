<?php
    date_default_timezone_set("Europe/Madrid"); //zona horaria por defecto es la de España
    error_reporting(E_ALL & ~E_NOTICE);
	ini_set('display_errors', 'on'); //para ver errores activar ON
	set_include_path(implode(PATH_SEPARATOR, array(          
    realpath('../include'), // Make sure this is the correct path to your library folder
    get_include_path(),
	)));
    require_once 'Zend/Loader/Autoloader.php'; //carga el framework Zend
    $loader = Zend_Loader_Autoloader::getInstance();
	$loader->registerNamespace('My_');
	$loader->setFallbackAutoloader(true);
	$loader->pushAutoloader(NULL, 'Smarty_' );
    $logger = new Zend_Log(new Zend_Log_Writer_Null()); // setup the application logger
    try {
	
	//lee el archivo de configuracion .ini y lo carga dentro de la clase ZEND_CONFIG_INI
	$config = new Zend_Config_Ini('../settings/settings.ini','production');
	Zend_Registry::set('config',$config);
	
	$writer = new EmailLogger($config->logging->email);
    $writer->addFilter(new Zend_Log_Filter_Priority(Zend_Log::CRIT));
    $logger->addWriter($writer);
	
	// Aqui se controlan todos los logs de la aplicacion
    $logger = new Zend_Log(new Zend_Log_Writer_Stream($config->logging->file));
    $writer->setEmail($config->logging->email);

    Zend_Registry::set('logger', $logger);
	
	
	//conecta a la base de datos
	$params = array ('host'    => $config->database->hostname,
					'username' => $config->database->username,
					'password' => $config->database->password,
					'dbname'   => $config->database->database);
					
	$db= Zend_Db::factory($config->database->type, $params);
    //$db->getConnection(); //ERRORES
	Zend_Registry::set('db',$db);
	
	//se realiza el setup de la Autenticacion
	$auth = Zend_Auth::getInstance();
	$auth->setStorage(new Zend_Auth_Storage_Session());
    //Zend_Session::rememberMe(); // esto es para alargar las sesiones
	
	//maneja la solicitud del usuario
	$controller = Zend_Controller_Front::getInstance();
	//$controller->throwExceptions(true); // 1/3 ACTIVARLA PARA BUSCAR ERRORES - Junio 6, 2014

	$controller->setControllerDirectory('../include/Controllers');
	$controller->registerPlugin(new CustomControllerAclManager($auth));
	 							
	//Genera los templates con Zend y Smarty
	$vr = new Zend_Controller_Action_Helper_ViewRenderer();
	$vr ->setView(new Templater());
	$vr ->setViewSuffix('tpl');
	Zend_Controller_Action_HelperBroker::addHelper($vr);

   // setup the route for invoices
	$route = new Zend_Controller_Router_Route(
		'herramientas/facturas/:action/*',
		array('controller' => 'herramientas_facturas',
			  'action'     => 'index')
	);
	
	$controller->getRouter()->addRoute('herramientas/facturas/', $route);
	
	// setup the route for gastos
	$route = new Zend_Controller_Router_Route(
		'herramientas/gastos/:action/*',
		array('controller' => 'herramientas_gastos',
			  'action'     => 'index')
	);
	
	$controller->getRouter()->addRoute('herramientas/gastos/', $route);
	
	// setup the route for budgets
	$route = new Zend_Controller_Router_Route(
		'herramientas/presupuestos/:action/*',
		array('controller' => 'herramientas_presupuestos',
			  'action'     => 'index')
	);
	
	$controller->getRouter()->addRoute('herramientas/presupuestos', $route);
	
	// setup the route for purchases
	$route = new Zend_Controller_Router_Route(
		'herramientas/ocompras/:action/*',
		array('controller' => 'herramientas_ocompras',
			  'action'     => 'index')
	);
	
	$controller->getRouter()->addRoute('herramientas/ocompras/', $route);
	
	// setup the route for proforma
	$route = new Zend_Controller_Router_Route(
		'herramientas/proformas/:action/*',
		array('controller' => 'herramientas_proformas',
			  'action'     => 'index')
	);
	
	$controller->getRouter()->addRoute('herramientas/proformas/', $route);
	
		// setup the route for taxes
	$route = new Zend_Controller_Router_Route(
		'finanzas/tributos/:action/*',
		array('controller' => 'finanzas_tributos',
			  'action'     => 'index')
	);
	
	$controller->getRouter()->addRoute('finanzas/tributos/', $route);
	
		// setup the route for cash
	$route = new Zend_Controller_Router_Route(
		'finanzas/tesoreria/:action/*',
		array('controller' => 'finanzas_tesoreria',
			  'action'     => 'index')
	);
	
	$controller->getRouter()->addRoute('finanzas/tesoreria/', $route);

	$controller->dispatch();
	
    }
	catch (Zend_Db_Statement_Exception $ex) {
        $logger->emerg($ex->getMessage());

        //header('Location: /error.html');
        //$test = $ex->getTrace(); // 2/3 desactivar para normalidad junio 6
        $test = $ex->getMessage(); // 3/3 activar para normalidad junio 6
        echo var_dump($test); 
        exit;
    }
?>