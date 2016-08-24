<?php
    date_default_timezone_set("Europe/Madrid"); //zona horaria por defecto es la de España
    //setlocale(LC_ALL,"es_ES");
    error_reporting(E_ALL & ~E_NOTICE);
    
	ini_set('display_errors', 'on'); //para ver errores activar ON
	
	set_include_path(implode(PATH_SEPARATOR, array(          
    realpath('/var/www/app/include'), // Make sure this is the correct path to your library folder
    get_include_path(),
	)));

	//carga el framework Zend
	require_once '/var/www/app/include/Zend/Loader/Autoloader.php';
    $loader = Zend_Loader_Autoloader::getInstance();
	$loader->registerNamespace('My_');
	$loader->setFallbackAutoloader(true);
	$loader->pushAutoloader(NULL, 'Smarty_' );

    // setup the application logger
    $logger = new Zend_Log(new Zend_Log_Writer_Null());
    try {
	
	//lee el archivo de configuracion .ini y lo carga dentro de la clase ZEND_CONFIG_INI
	$config = new Zend_Config_Ini('/var/www/app/settings/settings.ini','production');
	Zend_Registry::set('config',$config);
	
	$writer = new EmailLogger($config->logging->email);
    $writer->addFilter(new Zend_Log_Filter_Priority(Zend_Log::CRIT));
    $logger->addWriter($writer);
	
	// Aqui se controlan todos los logs de la aplicacion
    $logger = new Zend_Log(new Zend_Log_Writer_Stream($config->logging->emailfile));
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
	
    }
	catch (Zend_Db_Statement_Exception $ex) {
        $logger->emerg($ex->getMessage());
        $test = $ex->getMessage();
        //echo var_dump($test); 
        exit;
    }
?>