<?php
    class RecomendadorController extends CustomControllerAction
    {
    		protected $user = null;
		
        public function init()
        {
            parent::init();
            $this->breadcrumbs->addStep('Recomendador', $this->getUrl(null, 'recomendador'));
			$this->identity = Zend_Auth::getInstance()->getIdentity();
        }
		
		public function randomPassword() {
               $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
               $pass = array(); //remember to declare $pass as an array
               $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
               for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
               }
               return implode($pass); //turn the array into a string
        }
		
		public function indexAction() {
			
			if ($this->identity) {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			else{
				$this->_redirect($this->getUrl('login','recomendador'));
			}
        }

   
        public function registroAction()
        {
        	
		    $request = $this->getRequest();
		    $plan = $request->getPost('plan');

            $fp = new FormProcessor_AdvisorRegistration($this->db);
            $validate = $request->isXmlHttpRequest();

            if ($request->isPost()) {
            	
                if ($validate) {
                    $fp->validateOnly(true);
				    $fp->process($request);
                }
				
                else if ($fp->process($request)) {
                    $session = new Zend_Session_Namespace('registration');
                    $session->user_id = $fp->user->getId();

				    $this->_redirect($this->getUrl('registrocompleto'));
					
                }
            }

          if ($validate) {
					if ($fp->getErrors()) {
					$json = array(
					'errors' => $fp->getErrors()
					);
					} else {
					//user's submission validates, allow the user to register
					$json = array();
					} 
					$this->sendJson($json);
					}
            else {
                $this->breadcrumbs->addStep('Crea una Cuenta');
                $this->view->fp = $fp;
            }
		
        }

        public function registrocompletoAction()
        {
            // retrieve the same session namespace used in register
            $session = new Zend_Session_Namespace('registration');

            // load the user record based on the stored user ID
            $user = new DatabaseObject_User($this->db);
            if (!$user->load($session->user_id)) {
                $this->_forward('registro');
                return;
            }

            $this->view->user = $user;
        }

        public function loginAction()
        {
        	    // if a user's already logged in, send them to their account home page
            $auth = Zend_Auth::getInstance();
			if ($auth->hasIdentity())
                $this->_redirect($this->getUrl());

            $request = $this->getRequest();
			
            // determine the page the user was originally trying to request
            $redirect = $request->getPost('redirect');
            if (strlen($redirect) == 0)
                $redirect = $request->getServer('REQUEST_URI');
            if (strlen($redirect) == 0)
                $redirect = $this->getUrl();
			
            // initialize errors
            $errors = array();

            // process login if request method is post
            if ($request->getPost('login_')) {

                // fetch login details from form and validate them
                $username = $request->getPost('username');
                $password = $request->getPost('password');

                if (strlen($username) == 0)
                    $errors['username'] = 'El campo usuario no debe quedar vacio';
                if (strlen($password) == 0)
                    $errors['password'] = 'El campo contrase&ntilde;a no debe quedar vacio';

                if (count($errors) == 0) {

                    // setup the authentication adapter
                    $adapter = new Zend_Auth_Adapter_DbTable($this->db,
                                                             'tbl_user',
                                                             'username',
                                                             'password',
														    'md5(?)');

                    $adapter->setIdentity($username);
                    $adapter->setCredential($password);

                    // try and authenticate the user
                    $result = $auth->authenticate($adapter);

                    if ($result->isValid()) {
                        $user = new DatabaseObject_User($this->db);
                        $user->load($adapter->getResultRowObject()->user_id);

                        // record login attempt
                        $user->loginSuccess();

                        // create identity data and write it to session
                        $identity = $user->createAuthIdentity();
                        $auth->getStorage()->write($identity);

                        // send user to page they originally request
                         if ($identity->user_type == "association"){
                             $this->_redirect($this->getUrl('../advisors/'));
                         }
					    else {
                             $this->_redirect($this->getUrl('../clientes/'));
                        }
                    }

                    // record failed login attempt
                    DatabaseObject_User::LoginFailure($username,
                                                      $result->getCode());
                    $errors['username'] = 'Sus datos no fueron validados';
                }
            }

			$this->view->errors = $errors;
			$this->view->redirect = $redirect;
        }

        public function recuperarpasswordAction()
        {
            // if a user's already logged in, send them to their account home page
            if (Zend_Auth::getInstance()->hasIdentity())
                $this->_redirect($this->getUrl());

            $errors = array();

            $action = $this->getRequest()->getQuery('action');

            if ($this->getRequest()->isPost())
                $action = 'submit';

            switch ($action) {
                case 'submit':
                    $email = trim($this->getRequest()->getPost('email'));
                    if (strlen($email) == 0) {
                        $errors['email'] = 'El campo correo no debe quedar vacio';
                    }
                    else {
                         $user = new DatabaseObject_User($this->db);
						if ($user->emailExists($email)){
                            if ($user->loadByEmail($email)){
		                         $user->fetchPassword();
		                         $url = $this->getUrl('recuperarpassword') . '?action=complete';
		                         $this->_redirect($url);
                       		}
						}
                       	else{
                            $errors['email'] = 'Por favor verifique sus datos e intente de nuevo.';
						}
					}
                    break;

                case 'complete':
                    // nothing to do
                    break;

                case 'confirm':
                    $id = $this->getRequest()->getQuery('id');
                    $key = $this->getRequest()->getQuery('key');

                    $user = new DatabaseObject_User($this->db);
                    if (!$user->load($id))
                        $errors['confirm'] = 'Error confirmando la nueva contraseña';
                    else if (!$user->confirmNewPassword($key))
                        $errors['confirm'] = 'Error confirmando la nueva contraseña';

                    break;
            }

            $this->breadcrumbs->addStep('Login', $this->getUrl('login'));
            $this->breadcrumbs->addStep('Recuperar Contraseña');
            $this->view->errors = $errors;
            $this->view->action = $action;
        }

        public function confirmarrecomendadorAction()
        {

            $errors = array();

            $action = $this->getRequest()->getQuery('action');
			
            switch ($action) {
                case 'confirm':
                    $id = $this->getRequest()->getQuery('id');
                    $key = $this->getRequest()->getQuery('key');

                    $user = new DatabaseObject_User($this->db);
                    if (!$user->load($id))
                        $errors['confirm'] = 'Error confirmando al recomendador - Usuario';
                    else if (!$user->confirmNewPassword($key))
                        $errors['confirm'] = 'Error confirmando al recomendador - Password';

                    break;
            }

            $this->view->errors = $errors;
            $this->view->action = $action;
        }
		
        public function empresaAction()
        {
			if ($this->identity->user_type != 'association' or $this->identity->user_type != 'advisor') {		
                $this->_redirect($this->getUrl('login','recomendador'));
			}
		
        	    $request = $this->getRequest();
	        $address_id = $request->getPost('address_id');
			$addr_id = $request->getPost('addr_id');
			$contact_id_ = $request->getPost('contact_id_');
			
			$now1 = date('d-m-Y');
			$year__ = date('Y', strtotime($now1));
			
			$now__ = '01-01-' . $year__;
			$now_ = date('d-m-Y', strtotime($now__));
			
			$this->view->now_ = $now_;
			
			//user's details
			$default_country= $this->identity->country;
			$this->view->default_country = $default_country;
			////

            $fp = new FormProcessor_CompanyDetails($this->db, 
            								        $this->identity->user_id,
												$addr_id,
												$contact_id_);
												
			$company_id = $fp->company->getId();
			
			$prod = new DatabaseObject_Address($this->db);
			
			if (!isset($company_id2)) {
				if ($company_id  == 0) {
					$company_id2 = $this->identity->company_id2;			
				}
				else {
					$company_id2 = $company_id;
				}
			}	
            // define the options for retrieving the addresses
            $options = array(
                'user_id'  => $this->identity->user_id,
                'doc_type'   => 'company',
                'doc_id'   => $company_id2
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			$this->view->company_id2 = $company_id2;
				
			$auth = Zend_Auth::getInstance();


            if ($request->getPost('add')) {
                if ($fp->process($this->getRequest())) {
                    $auth->getStorage()->write($fp->user->createAuthIdentity());
                    $this->_redirect($this->getUrl('empresa'));
                }
            }
			
		     if ($request->getPost('delete2')) {
			 	if ($address_id) {
			 		$prod->deleteAddressProfile($this->db, $address_id);
					$prod->deleteAddress($this->db, $address_id);
					$this->_redirect($this->getUrl('empresa'));
			   }
             }

            //$this->breadcrumbs->addStep('Detalles de su Empresa');
            $this->view->fp = $fp;
			
			//shows european currency
			$rettion = str_replace('.', ',', $fp->retention);
			$fp->retention = $rettion;
			
			$tax = str_replace('.', ',', $fp->iva);
			$fp->iva = $tax;
			
			$tax2 = str_replace('.', ',', $fp->iva2);
			$fp->iva2 = $tax2;
			
			$title = $fp->company_industry;

        		### create aacute; from á, etc
        		$text = str_ireplace("\xE1", "a", $title);
        		$text = str_ireplace("\xE9", "e", $text); 
        		$text = str_ireplace("\xED", "i", $text);
        		$text = str_ireplace("\xF3", "o", $text);
        		$text = str_ireplace("\xFA", "u", $text);
        		$text = str_ireplace("\xF1", "n", $text);
        		// same but for UPPERCASE
        		$text = str_ireplace("\xC1", "A", $text);
        		$text = str_ireplace("\xC9", "E", $text); 
        		$text = str_ireplace("\xCD", "I", $text);
        		$text = str_ireplace("\xD3", "O", $text);
        		$text = str_ireplace("\xDA", "U", $text);
        		$text = str_ireplace("\xD1", "N", $text);
			$company_industry =	htmlspecialchars($text);
        		### end of escape strings
			
			$this->view->company_industry = $company_industry;
        }
    }
?>