<?php
    class CustomControllerAclManager extends Zend_Controller_Plugin_Abstract
    {
        // default user role if not logged or (or invalid role found)
        private $_defaultRole = 'guest';

        // the action to dispatch if a user doesn't have sufficient privileges
        private $_authController = array('controller' => 'cuenta',
                                         'action' => 'login');

        public function __construct(Zend_Auth $auth)
        {
            $this->auth = $auth;
            $this->acl = new Zend_Acl();

            // add the different user roles
            $this->acl->addRole(new Zend_Acl_Role($this->_defaultRole));
            $this->acl->addRole(new Zend_Acl_Role('proprietary'));
			$this->acl->addRole(new Zend_Acl_Role('employee'));
			$this->acl->addRole(new Zend_Acl_Role('accountant'));
			$this->acl->addRole(new Zend_Acl_Role('advisor'));
			$this->acl->addRole(new Zend_Acl_Role('association'));
			

            // add the resources we want to have control over
            $this->acl->add(new Zend_Acl_Resource('finanzas'));
			$this->acl->add(new Zend_Acl_Resource('finanzas_tributos'));
			$this->acl->add(new Zend_Acl_Resource('finanzas_tesoreria'));
			$this->acl->add(new Zend_Acl_Resource('herramientas'));
			$this->acl->add(new Zend_Acl_Resource('herramientas_presupuestos'));
			$this->acl->add(new Zend_Acl_Resource('herramientas_facturas'));
			$this->acl->add(new Zend_Acl_Resource('herramientas_proformas'));
			$this->acl->add(new Zend_Acl_Resource('herramientas_gastos'));
			$this->acl->add(new Zend_Acl_Resource('herramientas_ocompras'));
            $this->acl->add(new Zend_Acl_Resource('comunicaciones'));
			$this->acl->add(new Zend_Acl_Resource('proyectos'));
			$this->acl->add(new Zend_Acl_Resource('contacto'));
			$this->acl->add(new Zend_Acl_Resource('cuenta'));
			
		    $this->acl->add(new Zend_Acl_Resource('contabilidad'));
			$this->acl->add(new Zend_Acl_Resource('resumen'));
	
		    $this->acl->add(new Zend_Acl_Resource('recomendador'));
			$this->acl->add(new Zend_Acl_Resource('comisiones'));
		    $this->acl->add(new Zend_Acl_Resource('clientes'));
			$this->acl->add(new Zend_Acl_Resource('advisors'));		


            // allow access to everything for all users by default
            // except for the account management and administration areas
            $this->acl->allow();
			$this->acl->deny(null, 'finanzas');
			$this->acl->deny(null, 'finanzas_tributos');
			$this->acl->deny(null, 'herramientas');
			$this->acl->deny(null, 'herramientas_presupuestos');
			$this->acl->deny(null, 'herramientas_facturas');
			$this->acl->deny(null, 'herramientas_proformas');
			$this->acl->deny(null, 'herramientas_gastos');
			$this->acl->deny(null, 'herramientas_ocompras');
            $this->acl->deny(null, 'comunicaciones');
			$this->acl->deny(null, 'proyectos');
            $this->acl->deny(null, 'contacto');
            $this->acl->deny(null, 'cuenta');
			
		    $this->acl->deny(null, 'contabilidad');
			$this->acl->deny(null, 'resumen');
			
		    $this->acl->deny(null, 'recomendador');
			$this->acl->deny(null, 'comisiones');
			$this->acl->deny(null, 'clientes');
			$this->acl->deny(null, 'advisors');
			

            // add an exception so guests can log in or register
            // in order to gain privilege
            $this->acl->allow('guest', 'cuenta', array('login',
                                                        'recuperarpassword',
                                                        'registro',
                                                        'registro2',
                                                        'registro3',
                                                        'registro4',
                                                        'registro5',
                                                        'registrocompleto',
													   'approval',
													   'confirmapproval'));
													   
													   
            $this->acl->allow('guest', 'recomendador', array('index',
            											   'login',
                                                        'recuperarpassword',
                                                        'confirmarrecomendador',
                                                        'registro',
                                                        'registrocompleto'));
			
            // allow employees access to these areas
            $this->acl->allow('employee', 'finanzas');
			$this->acl->allow('employee', 'finanzas_tributos');
			$this->acl->allow('employee', 'finanzas_tesoreria');
			$this->acl->allow('employee', 'herramientas');
			$this->acl->allow('employee', 'herramientas_presupuestos');
			$this->acl->allow('employee', 'herramientas_facturas');
			$this->acl->allow('employee', 'herramientas_proformas');
			$this->acl->allow('employee', 'herramientas_gastos');
			$this->acl->allow('employee', 'herramientas_ocompras');
			$this->acl->allow('employee', 'proyectos');
			$this->acl->allow('employee', 'contacto');
            $this->acl->allow('employee', 'cuenta');
			
            // allow proprietarys access to these areas
            $this->acl->allow('proprietary', 'finanzas');
			$this->acl->allow('proprietary', 'finanzas_tributos');
			$this->acl->allow('proprietary', 'finanzas_tesoreria');
			$this->acl->allow('proprietary', 'herramientas');
			$this->acl->allow('proprietary', 'herramientas_presupuestos');
			$this->acl->allow('proprietary', 'herramientas_facturas');
			$this->acl->allow('proprietary', 'herramientas_proformas');
			$this->acl->allow('proprietary', 'herramientas_gastos');
			$this->acl->allow('proprietary', 'herramientas_ocompras');
            $this->acl->allow('proprietary', 'comunicaciones');
			$this->acl->allow('proprietary', 'proyectos');
			$this->acl->allow('proprietary', 'contacto');
            $this->acl->allow('proprietary', 'cuenta');
			
			// allows accountants access to these areas
			$this->acl->allow('accountant', 'cuenta');
            $this->acl->allow('accountant', 'contabilidad');
			$this->acl->allow('accountant', 'resumen');
			
			// allows asociations access to these areas
			$this->acl->allow('association', 'cuenta');
            $this->acl->allow('association', 'advisors');
            $this->acl->allow('association', 'comisiones');
			$this->acl->allow('association', 'recomendador');
			 
			
			// allows advisors access to these areas
			$this->acl->allow('advisor', 'cuenta');
            $this->acl->allow('advisor', 'clientes');
            $this->acl->allow('advisor', 'comisiones');
			$this->acl->allow('advisor', 'contabilidad');
			$this->acl->allow('advisor', 'recomendador');
        }

        /**
         * preDispatch
         *
         * Before an action is dispatched, check if the current user
         * has sufficient privileges. If not, dispatch the default
         * action instead
         *
         * @param Zend_Controller_Request_Abstract $request
         */
        public function preDispatch(Zend_Controller_Request_Abstract $request)
        {
            // check if a user is logged in and has a valid role,
            // otherwise, assign them the default role (guest)
            if ($this->auth->hasIdentity())
                $role = $this->auth->getIdentity()->user_type;
            else
                $role = $this->_defaultRole;

            if (!$this->acl->hasRole($role))
                $role = $this->_defaultRole;

            // the ACL resource is the requested controller name
            $resource = $request->controller;

            // the ACL privilege is the requested action name
            $privilege = $request->action;

            // if we haven't explicitly added the resource, check
            // the default global permissions
            if (!$this->acl->has($resource))
                $resource = null;

            // access denied - reroute the request to the default action handler
            if (!$this->acl->isAllowed($role, $resource, $privilege)) {
                $request->setControllerName($this->_authController['controller']);
                $request->setActionName($this->_authController['action']);
            }
        }
    }
?>