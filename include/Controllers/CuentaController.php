<?php
    class CuentaController extends CustomControllerAction
    {
    	protected $user = null;
		
        public function init()
        {
            parent::init();
            $this->breadcrumbs->addStep('Cuenta', $this->getUrl(null, 'cuenta'));
			$this->identity = Zend_Auth::getInstance()->getIdentity();
            if ($this->identity) {
                if (!$this->identity->temporary){
                    $this->identity->temporary = DatabaseObject_Address::temporaryUser();
                }
                if (!$this->identity->company_id2){
                    $this->identity->company_id2 = DatabaseObject_Address::temporaryUser();
                }
                if (!$this->identity->company_id3){
                    $this->identity->company_id3 = DatabaseObject_Address::temporaryUser();
                }
            }
        }
		
		public function avisoAction()
        {

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

        public function indexAction()
        {
        		$auth = Zend_Auth::getInstance();
	
			$fp = new FormProcessor_UserDetails($this->db,
												$this->identity->real_id);
			$this->view->fp = $fp;
			
			//user company's details
			$comp__ = new DatabaseObject_Company($this->db);
            $comp__->loadForUser($this->identity->user_id);
			
			$default_company = $comp__->thecompany;
			$default_id = $comp__->identification;

			$this->view->default_company = $default_company;
			$this->view->default_id = $default_id;
			
        }
	
        /*public function registroAction()
        {
        	  if (Zend_Auth::getInstance()->hasIdentity())
            $this->_redirect($this->getUrl());
		    $auth = Zend_Auth::getInstance();
						
            $request = $this->getRequest();
		    $plan = $request->getPost('plan');
			$username = $request->getPost('username');
			$password = $request->getPost('password');

            $fp = new FormProcessor_UserRegistration($this->db);
            $validate = $request->isXmlHttpRequest();

            if ($request->isPost()) {
            	
                if ($validate) {
                    $fp->validateOnly(true);
				    $fp->process($request);
                }
				
                else if ($fp->process($request)) {
                    $session = new Zend_Session_Namespace('registration');
                    $session->user_id = $fp->user->getId();
					/*2checkout stuff
				    if ($plan == 'approval') {

						 $args = array (
						    'sid' => "2018973",
						 	'product_id' => 1
						 );
						 
						 Twocheckout_Charge::redirect($args);
					//checkout ends
					}
					
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
												
						// create identity data and write it to session
					    $identity = $user->createAuthIdentity();
                        $auth->getStorage()->write($identity);
						 // record login attempt
						$user->loginSuccess();
						$identity->first_time = 'TRUE';
						$this->_redirect($this->getUrl('index','finanzas'));
					  }
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
		  }*/

    public function registroAction()
        {
        	  if (Zend_Auth::getInstance()->hasIdentity())
            $this->_redirect($this->getUrl());
		    $auth = Zend_Auth::getInstance();
						
            $request = $this->getRequest();
		    $plan = $request->getPost('plan');
			$username = $request->getPost('username');
			$password = $request->getPost('password');

            $fp = new FormProcessor_UserRegistrationLight($this->db);
            $validate = $request->isXmlHttpRequest();

            if ($request->isPost()) {
            	
                if ($validate) {
                    $fp->validateOnly(true);
				    $fp->process($request);
                }
				
                else if ($fp->process($request)) {
                    $session = new Zend_Session_Namespace('registration');
                    $session->user_id = $fp->user->getId();
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
												
						// create identity data and write it to session
					    $identity = $user->createAuthIdentity();
                        $auth->getStorage()->write($identity);
						 // record login attempt
						$user->loginSuccess();
						$identity->first_time = 'TRUE';
						$this->_redirect($this->getUrl('index','finanzas'));
					  }
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

    		public function registro3Action()
        {
        	  if (Zend_Auth::getInstance()->hasIdentity())
            $this->_redirect($this->getUrl());
		    $auth = Zend_Auth::getInstance();
						
            $request = $this->getRequest();
		    $plan = $request->getPost('plan');
			$username = $request->getPost('username');
			$password = $request->getPost('password');

            $fp = new FormProcessor_UserRegistrationLight($this->db);
            $validate = $request->isXmlHttpRequest();

            if ($request->isPost()) {
            	
                if ($validate) {
                    $fp->validateOnly(true);
				    $fp->process($request);
                }
				
                else if ($fp->process($request)) {
                    $session = new Zend_Session_Namespace('registration');
                    $session->user_id = $fp->user->getId();
					
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
												
						// create identity data and write it to session
					    $identity = $user->createAuthIdentity();
                        $auth->getStorage()->write($identity);
						 // record login attempt
						$user->loginSuccess();
						$identity->first_time = 'TRUE';
						$this->_redirect($this->getUrl('index','finanzas'));
					  }
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

    public function registro4Action()
        {
        	  if (Zend_Auth::getInstance()->hasIdentity())
            $this->_redirect($this->getUrl());
		    $auth = Zend_Auth::getInstance();
						
            $request = $this->getRequest();
		    $plan = $request->getPost('plan');
			$username = $request->getPost('username');
			$password = $request->getPost('password');

            $fp = new FormProcessor_UserRegistrationLight($this->db);
            $validate = $request->isXmlHttpRequest();

            if ($request->isPost()) {
            	
                if ($validate) {
                    $fp->validateOnly(true);
				    $fp->process($request);
                }
				
                else if ($fp->process($request)) {
                    $session = new Zend_Session_Namespace('registration');
                    $session->user_id = $fp->user->getId();
					
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
												
						// create identity data and write it to session
					    $identity = $user->createAuthIdentity();
                        $auth->getStorage()->write($identity);
						 // record login attempt
						$user->loginSuccess();
						$identity->first_time = 'TRUE';
						$this->_redirect($this->getUrl('index','finanzas'));
					  }
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

    		public function registro5Action()
        {
        	  if (Zend_Auth::getInstance()->hasIdentity())
            $this->_redirect($this->getUrl());
		    $auth = Zend_Auth::getInstance();
						
            $request = $this->getRequest();
		    $plan = $request->getPost('plan');
			$username = $request->getPost('username');
			$password = $request->getPost('password');

            $fp = new FormProcessor_UserRegistrationLight($this->db);
            $validate = $request->isXmlHttpRequest();

            if ($request->isPost()) {
            	
                if ($validate) {
                    $fp->validateOnly(true);
				    $fp->process($request);
                }
				
                else if ($fp->process($request)) {
                    $session = new Zend_Session_Namespace('registration');
                    $session->user_id = $fp->user->getId();
					
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
												
						// create identity data and write it to session
					    $identity = $user->createAuthIdentity();
                        $auth->getStorage()->write($identity);
						 // record login attempt
						$user->loginSuccess();
						$identity->first_time = 'TRUE';
						$this->_redirect($this->getUrl('index','finanzas'));
					  }
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

		 /*	
       public function approvalAction() {
       	$this->_redirect($this->getUrl('confirmapproval'));
        //Assign the returned parameters to an array.
       
        require 'twocheckout/twocheckout.php';
		
         $params = array();
         foreach ($_REQUEST as $k => $v) {
            $params[$k] = $v;
         }

        //Check the MD5 Hash to determine the validity of the sale.
         $passback = Twocheckout_Return::check($params, "kharolys", 'array');

         if ($passback['code'] == 'Success') {
            $id = $params['merchant_order_id'];
            $order_number = $params['order_number'];
            $invoice_id = $params['invoice_id'];
            $data = array(
                'active' => 1,
                'order_number' => $order_number,
                'last_invoice' => $invoice_id
                );
            $this->ion_auth->update($id, $data);

            $this->_redirect($this->getUrl('confirmapproval'));
			
        	} 
        	else {
        		
            $this->_redirect($this->getUrl('paymentfailed'));
				
        		}
		 * 
		
    		} 
	   
	    public function paymentfailedAction()
        {
            // retrieve the same session namespace used in register
            $session = new Zend_Session_Namespace('registration');

            // load the user record based on the stored user ID
            $user = new DatabaseObject_User($this->db);
            if (!$user->load($session->user_id)) {
                $this->_forward('register');
                return;
            }
			
            $this->view->user = $user;
        }*/

        public function registrocompletoAction()
        {
            // retrieve the same session namespace used in register
            $this->identity = Zend_Auth::getInstance()->getIdentity();

            // load the user record based on the stored user ID
                     
            $user = new DatabaseObject_User($this->db);
			$user->load($this->identity->user_id);

			$this->identity->first_time = 'FALSE';

			$user->sendEmailAlert('user-register-alert.tpl');

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
						
						$plan_ = $user->profile->plan;

						$date1 = $user->ts_created;
						$date2 = time();
		
		   				$dStart = $date1;
		   				$dEnd  = $date2;
						
	     				$datediff_ = $dEnd - $dStart;
	     				$datediff = floor($datediff_/(60*60*24));
												
						// create identity data and write it to session
					    $identity = $user->createAuthIdentity();
                        $auth->getStorage()->write($identity);
						 // record login attempt
						$user->loginSuccess();
						
						if(($plan_ == 'trial_plan1' && $daysdiff > 30) or ($plan_ == 'trial_plan3' && $daysdiff > 30) or ($plan_ == 'trial_plan5' && $daysdiff > 30)){
							$this->_redirect($this->getUrl('index','cuenta'));
							$identity->trial_expired = 'TRUE';
						}
						else{
	                        // send user to page they originally request
	                         if ($identity->user_type == "proprietary" || $identity->user_type == "employee" ){
	                             $this->_redirect($this->getUrl('../finanzas/'));
	                         }
							 elseif ($identity->user_type == "accountant"){
	                             $this->_redirect($this->getUrl('../resumen/'));
	                         }
							 elseif ($identity->user_type == "advisor"){
	                             $this->_redirect($this->getUrl('../clientes/'));
	                         }
							 elseif ($identity->user_type == "association"){
	                             $this->_redirect($this->getUrl('../advisors/'));
	                         }
					  }
                    }

                    // record failed login attempt
                    DatabaseObject_User::LoginFailure($username,
                                                      $result->getCode());
                    $errors['username'] = 'Sus datos no fueron validados';
                }
            }
		

            $this->breadcrumbs->addStep('Login');
            $this->view->errors = $errors;
            $this->view->redirect = $redirect;
        }

        public function logoutAction()
        {
					
            Zend_Auth::getInstance()->clearIdentity();
			
			if ($this->identity->user_type == 'association' or $this->identity->user_type == 'advisor') {		
                $this->_redirect($this->getUrl('login','recomendador'));
			}
			else{
				$this->_redirect($this->getUrl('login','cuenta'));
			}
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

        public function detallesAction()
        {
        		$this->breadcrumbs->addStep('Editar Perfil Personal', $this->getUrl('detalles', 'cuenta'));
			
            $auth = Zend_Auth::getInstance();

            $fp = new FormProcessor_UserDetails($this->db,
                                                $this->identity->real_id);

            if ($this->getRequest()->isPost()) {
                if ($fp->process($this->getRequest())) {
                    $auth->getStorage()->write($fp->user->createAuthIdentity());
                    $this->_redirect($this->getUrl('index'));
                }
            }
			
            $this->view->fp = $fp;
        }

        public function removerAction()
        {
        		$this->breadcrumbs->addStep('Remover Correo', $this->getUrl('remover', 'cuenta'));
			
            $auth = Zend_Auth::getInstance();

            $fp = new FormProcessor_RemoveEmail($this->db,
                                                $this->identity->real_id);

            if ($this->getRequest()->isPost()) {
                if ($fp->process($this->getRequest())) {
                    $auth->getStorage()->write($fp->user->createAuthIdentity());
				    $this->_redirect($this->getUrl('remover') . '?submitted=true');
                }
            }
			
            $this->view->fp = $fp;
        }
		
        public function removerresumenAction()
        {
        		$this->breadcrumbs->addStep('Remover Correo', $this->getUrl('remover', 'cuenta'));
			
            $auth = Zend_Auth::getInstance();

            $fp = new FormProcessor_RemoveREmail($this->db,
                                                $this->identity->real_id);

            if ($this->getRequest()->isPost()) {
                if ($fp->process($this->getRequest())) {
                    $auth->getStorage()->write($fp->user->createAuthIdentity());
				    $this->_redirect($this->getUrl('remover') . '?submitted=true');
                }
            }
			
            $this->view->fp = $fp;
        }
		
        public function empresaAction()
        {
        		$this->breadcrumbs->addStep('Empresa', $this->getUrl('empresa', 'cuenta'));
				
			if ($this->identity->user_type != 'proprietary') {		
                $this->_redirect($this->getUrl('index','cuenta'));
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
					$this->_redirect($this->getUrl('index','finanzas'));
                    //$this->_redirect($this->getUrl('empresa') . '?submitted=true');
                }
            }
			
		     if ($request->getPost('delete2')) {
			 	if ($address_id) {
			 		$prod->deleteAddressProfile($this->db, $address_id);
					$prod->deleteAddress($this->db, $address_id);
					$this->_redirect($this->getUrl('empresa'));
			   }
             }

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
		
		

        public function editarproductoAction()
        {
        		$this->breadcrumbs->addStep('Editar Producto', $this->getUrl('editarproducto', 'cuenta'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section8 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
			$request = $this->getRequest();
			$product_id = (int) $this->getRequest()->getQuery('id');
			$comp_id = $request->getPost('company_id');

			$company_id2 = $product_id;
			$this->view->company_id2 = $company_id2;
			
			//user company's details
			$comp__ = new DatabaseObject_Company($this->db);
            $comp__->loadForUser($this->identity->user_id);
			
			$default_iva = $comp__->profile->iva;
			$default_iva2 = $comp__->profile->iva2;
			$default_iva2_name = $comp__->profile->iva2_name;
			$default_retention = $comp__->profile->retention;
			$default_invoice_number = $comp__->profile->invoice_number;
			$default_number_start = $comp__->profile->number_start;
			$default_number_start_letter = $comp__->profile->number_start_letter;
			$default_currency = $comp__->profile->currency;
			$default_recc = $comp__->profile->recc;
			
			$this->view->default_iva = $default_iva;
			$this->view->default_iva2 = $default_iva2;
			$this->view->default_iva2_name = $default_iva2_name;
			$this->view->default_retention = $default_retention;
			$this->view->default_invoice_number = $default_invoice_number;
			$this->view->default_number_start = $default_number_start;
			$this->view->default_number_start_letter = $default_number_start_letter;
			$this->view->default_currency = $default_currency;
			$this->view->default_recc = $default_recc;
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Ccompany::GetAllCompanies($this->db, $options);
			
			$this->view->companieslist = $companieslist;
			
			$i = 0;
			$company_ = array();
			$data_ = array();
			$address_ = array();
			$industry_ = array();
			$relationship_ = array();
            foreach ($companieslist as $company) {
            		$comp_=$company->profile->thecompany;
				$comp2_ = str_replace("'", "\'", $comp_);
				$company_[]=$comp2_;
				$data_[] = $company->getId();
				$address_[] = unserialize(base64_decode($company->profile->company_address));
				$industry_[] = $company->profile->company_industry;
				$relationship_[]= $company->profile->relationship;
				$i++;
			}
			
			$this->view->company_ = $company_;
			$this->view->data_ = $data_;
			$this->view->address_ = $address_;
			$this->view->industry_ = $industry_;
			$this->view->relationship_ = $relationship_;
			
            $addressid = array();
			$i = 0;
            foreach ($companieslist as $company) {
            		$options = array(
                		'user_id' => $this->identity->user_id,
                		'doc_type'   => 'ccompany',
                		'doc_id'   => $company->getId()
            		);
				
            		$addressid [$i] = DatabaseObject_Address::GetAddressesId($this->db, $options);
				$i++;
			}
			
			$this->view->addressid = $addressid;
			
			
            $product = new DatabaseObject_Product($this->db);		
            if (!$product->loadForUser($this->identity->user_id, $product_id))
                $this->_redirect($this->getUrl());
            
			$this->view->product = $product;

            $fp = new FormProcessor_Product($this->db,
                                             $this->identity->user_id,
                                             $product_id,
											$comp_id);	
							 
			$this->view->fp = $fp;
			
			$fp->company_address = unserialize(base64_decode($fp->company_address));
			$fp->company_id = unserialize(base64_decode($fp->company_id));
			
			//shows european currency
			$price = str_replace('.', ',', $fp->unit_price);
			$fp->unit_price = $price;
			
			$tax = str_replace('.', ',', $fp->iva);
			$fp->iva = $tax;
			
			$tax2 = str_replace('.', ',', $fp->iva2);
			$fp->iva2 = $tax2;
            
            if ($request->getPost('edit')) {
            	   if ($fp->process($request)) { 
                 	$product->save();
				    $this->messenger->addMessage('Producto agregado');
				    $this->_redirect($this->getUrl('fichaproducto') . '?id=' . $fp->product->getId());     
				}
            }		
            ////
            if ($request->getPost('delete3')) {    	
			 $company_id = $request->getPost('company_id');
			 	if ($company_id) {

            		$_ids = array();
            			foreach ($company_id as $ids) {
                			$_ids[] = $ids;
            			}
							
				if (count($_ids) == 0)
                		return;
			
				if(!empty($_ids)){
					$old_ = array ();
					$old_ = unserialize(base64_decode($product->profile->company_id));
				
					$new_ = array ();
					$new_ = array_values(array_diff( $old_, $_ids));
	
					if (!empty($new_)) {
						$product->profile->company_id = base64_encode(serialize($new_));
						//echo var_dump($product->profile->company_id);
						$product->save();
			     	}
					else {
						$product->profile->company_id = "";
						//echo var_dump($product->profile->company_id);
						$product->save();
					}
			     }
				
                		$this->_redirect($this->getUrl('fichaproducto') . '?id=' . $fp->product->getId()); 
			   }
            }
        }

       public function fichaproductoAction()
        {
        		$this->breadcrumbs->addStep('Ficha Producto', $this->getUrl('fichaproducto', 'cuenta'));
			
			$request = $this->getRequest();
			$product_id = (int) $this->getRequest()->getQuery('id');
			$comp_id = $request->getPost('company_id');
			
			$now__ = date('d-m-Y');
			$now_ = strtotime($now__);
			$year__ = date('Y', $now_);

			$company_id2 = $product_id;
			$this->view->company_id2 = $company_id2;
			
			//user company's details
			$comp__ = new DatabaseObject_Company($this->db);
            $comp__->loadForUser($this->identity->user_id);
			
			$default_iva = $comp__->profile->iva;
			$default_iva2 = $comp__->profile->iva2;
			$default_iva2_name = $comp__->profile->iva2_name;
			$default_retention = $comp__->profile->retention;
			$default_invoice_number = $comp__->profile->invoice_number;
			$default_number_start = $comp__->profile->number_start;
			$default_number_start_letter = $comp__->profile->number_start_letter;
			$default_currency = $comp__->profile->currency;
			$default_recc = $comp__->profile->recc;
			$default_year_start = $comp__->profile->year_start;
			
			$this->view->default_iva = $default_iva;
			$this->view->default_iva2 = $default_iva2;
			$this->view->default_iva2_name = $default_iva2_name;
			$this->view->default_retention = $default_retention;
			$this->view->default_invoice_number = $default_invoice_number;
			$this->view->default_number_start = $default_number_start;
			$this->view->default_number_start_letter = $default_number_start_letter;
			$this->view->default_currency = $default_currency;
			$this->view->default_recc = $default_recc;
			$this->view->default_year_start = $default_year_start;
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Ccompany::GetAllCompanies($this->db, $options);
			
			$this->view->companieslist = $companieslist;
			
			$i = 0;
			$company_ = array();
			$data_ = array();
			$address_ = array();
			$industry_ = array();
			$relationship_ = array();
            foreach ($companieslist as $company) {
            		$comp_=$company->profile->thecompany;
				$comp2_ = str_replace("'", "\'", $comp_);
				$company_[]=$comp2_;
				$data_[] = $company->getId();
				$address_[] = unserialize(base64_decode($company->profile->company_address));
				$industry_[] = $company->profile->company_industry;
				$relationship_[]= $company->profile->relationship;
				$i++;
			}
			
			$this->view->company_ = $company_;
			$this->view->data_ = $data_;
			$this->view->address_ = $address_;
			$this->view->industry_ = $industry_;
			$this->view->relationship_ = $relationship_;
			
            $addressid = array();
			$i = 0;
            foreach ($companieslist as $company) {
            		$options = array(
                		'user_id' => $this->identity->user_id,
                		'doc_type'   => 'ccompany',
                		'doc_id'   => $company->getId()
            		);
				
            		$addressid [$i] = DatabaseObject_Address::GetAddressesId($this->db, $options);
				$i++;
			}
			
			$this->view->addressid = $addressid;
			
			///I need this info for analytics
            $product = new DatabaseObject_Product($this->db);		
            if (!$product->loadForUser($this->identity->user_id, $product_id))
                $this->_redirect($this->getUrl());
            
			$this->view->product = $product;
			
            $fp = new FormProcessor_Product($this->db,
                                             $this->identity->user_id,
                                             $product_id,
											$comp_id);	
							 
			$this->view->fp = $fp;
			
			$fp->company_address = unserialize(base64_decode($fp->company_address));
			$fp->company_id = unserialize(base64_decode($fp->company_id));
			
			//shows european currency
			$price = str_replace('.', ',', $fp->unit_price);
			$fp->unit_price = $price;
			
			$tax = str_replace('.', ',', $fp->iva);
			$fp->iva = $tax;
			
			$tax2 = str_replace('.', ',', $fp->iva2);
			$fp->iva2 = $tax2;
			
			
			///invoice data and information
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $invoiceslist = DatabaseObject_Invoice::GetAllInvoices($this->db, $options);
			
			$this->view->invoiceslist = $invoiceslist;
			
		    $options = array(
                'user_id' => $this->identity->user_id,
                'document_type' => 'invoice'
            );
			
            $itemslist = DatabaseObject_Item::GetAllInvoiceItems($this->db, $options);
			
			$this->view->itemslist = $itemslist;
			
			$fichawhat_ = array();
			$client_id_ = array();
			$clients = array();
			$amount = array();
			$last = array();
			$tot_product = 0;
			$net_product = 0;
			$iva_product = 0;
			$tot_month_1 = 0;
			$tot_month_2 = 0;
			$tot_month_3 = 0;
			$tot_month_4 = 0;
			$tot_month_5 = 0;
			$tot_month_6 = 0;
			$tot_month_7 = 0;
			$tot_month_8 = 0;
			$tot_month_9 = 0;
			$tot_month_10 = 0;
			$tot_month_11 = 0;
			$tot_month_12 = 0;

			foreach ($invoiceslist as $invoice) {
            	
            		$invoice_id_ = $invoice->getId();
				$disc_ = $invoice->profile->discount;
				$discount = (100 - $disc_)/100;
				$published_ = $invoice->profile->published;
				$ts_created_ = $invoice->profile->invoice_date;
				$ts_created = strtotime($ts_created_);
				$default_year_start_ = strtotime($default_year_start);

				 if ($published_){
					if ($ts_created >= $default_year_start_){
						foreach ($itemslist as $item) {
							if ($invoice_id_ == $item->document_id){
								if ($product->profile->product_code == $item->profile->code){
									$quan_pro = $item->profile->quantity;
									$price_pro = $item->profile->unit_price;
									$iva_pro_ = $item->profile->iva_total;
									$tot_pro_ = $item->profile->montototal;
						
									if (!$discount){
										$discount = 1;
									}
									
									$tot_pro_r = $quan_pro * $price_pro * $discount;
										
									$tot_pro = $tot_pro_ * $discount;
									$tot_pro = $tot_pro_ * $discount;
									$iva_pro = $iva_pro_ * $discount;
									$net_pro = $quan_pro * $price_pro * $discount;
					
									$tot_product = $tot_product + $tot_pro;
									$net_product = $net_product + $net_pro;
									$iva_product = $iva_product + $iva_pro;
									
									//$default_year_start_ = strtotime($default_year_start);

									$month__ = date('n', $ts_created);
									$year___ = date('Y', $ts_created);
									$month_start = date('n', $default_year_start_);
									$date_ = date('d-m-Y', $ts_created);
									
									if ($year___ == $year__){
									
									if($month__ == 1){
										$month_1 = 'Enero';
										$year_1 = $year___;	

										$tot_month_1 = $tot_month_1 + $tot_pro_r;
									}
									
									elseif($month__ == 2){
										$month_2 = 'Febrero';
										$year_2 = $year___;	

										$tot_month_2 = $tot_month_2 + $tot_pro_r;
									}
									
									elseif($month__ == 3){
										$month_3 = 'Marzo';
										$year_3 = $year___;	

										$tot_month_3 = $tot_month_3 + $tot_pro_r;
									}
									
									elseif($month__ == 4){
										$month_4 = 'Abril';
										$year_4 = $year___;	

										$tot_month_4 = $tot_month_4 + $tot_pro_r;
									}
									
									elseif($month__ == 5){
										$month_5 = 'Mayo';
										$year_5 = $year___;	

										$tot_month_5 = $tot_month_5 + $tot_pro_r;
									}
									
									elseif($month__ == 6){
										$month_6 = 'Junio';
										$year_6 = $year___;	

										$tot_month_6 = $tot_month_6 + $tot_pro_r;
									}
									
									elseif($month__ == 7){
										$month_7 = 'Julio';
										$year_7 = $year___;	

										$tot_month_7 = $tot_month_7 + $tot_pro_r;
									}
									
									elseif($month__ == 8){
										$month_8 = 'Agosto';
										$year_8 = $year___;	

										$tot_month_8 = $tot_month_8 + $tot_pro_r;
									}
									
									elseif($month__ == 9){
										$month_9 = 'Septiembre';
										$year_9 = $year___;	

										$tot_month_9 = $tot_month_9 + $tot_pro_r;
									}
									
									elseif($month__ == 10){
										$month_10 = 'Octubre';
										$year_10 = $year___;	

										$tot_month_10 = $tot_month_10 + $tot_pro_r;
									}
									
									elseif($month__ == 11){
										$month_11 = 'Noviembre';
										$year_11 = $year___;	

										$tot_month_11 = $tot_month_11 + $tot_pro_r;
									}
									
									else {
										$month_12 = 'Diciembre';
										$year_12 = $year___;	

										$tot_month_12 = $tot_month_12 + $tot_pro_r;
									}
									
									}
									
									 if (in_array($invoice->profile->thecompany, $clients)){
									 	$key = array_search($invoice->profile->thecompany, $clients);
										$value = $amount[$key] + $tot_pro_r;
									 	$amount[$key] = $value;
										if ($last[$key] < $date_){
											$last[$key] = $date_;
										}
									 }
									 
									 else {
									 	
										//load all contacts
		    								$options = array(
                								'user_id' => $this->identity->user_id,
                								'order'   => 'ts_created desc'
            								);

            								$contacts1 = DatabaseObject_Contact::GetContacts($this->db, $options);
										
										//load all companies
		    								$options = array(
                								'user_id' => $this->identity->user_id
            								);

            								$companieslist1 = DatabaseObject_Ccompany::GetAllCompanies($this->db, $options);
										
										$companies = array();
										$contacts = array();
										$comp_ids_ = array();
										$conts_ids_ = array();
										$comp_identification = array();
										$conts_identification = array();
										
            								foreach ($companieslist1 as $company) {
											$companies[] = $company->profile->thecompany;
											$comp_ids_[] = $company->getId();
											$comp_identification[] = $company->profile->identification;
										}
											
            								foreach ($contacts1 as $contact) {
            									$contacts[] = ucfirst($contact->profile->first_name) . ' ' . ucfirst($contact->profile->middle_name) . ' ' . ucfirst($contact->profile->last_name) . ' ' . ucfirst($contact->profile->second_last_name);
            									$conts_ids_[] = $contact->getId();
											$conts_identification[] = $contact->profile->identification;
										}
											
										if (in_array($invoice->profile->thecompany, $companies)){
											$key3 = array_search($invoice->profile->thecompany, $companies);
													if ($comp_identification[$key3]){	
														$client_id_[] = $comp_ids_[$key3] ;
														$fichawhat_[] = 'fichacompania';
													}
										}
										elseif (in_array($invoice->profile->thecompany, $contacts)){
											 $key4 = array_search($invoice->profile->thecompany, $contacts);
									 				if ($conts_identification[$key4]){
														$client_id_[] = $conts_ids_[$key4];
														$fichawhat_[] = 'fichacontacto';
													}
										}
										
										$clients[] = $invoice->profile->thecompany;
										$amount[] = $tot_pro_r;
										$last[] = $date_;
									}
									
						     	}
					    		}
				  		 }
					 }
				  }
			}

			$this->view->year__ = $year__;
			
			$this->view->fichawhat_ = $fichawhat_;
			$this->view->client_id_ = $client_id_;
			$this->view->clients = $clients;
			$this->view->amount = $amount;
			$this->view->last = $last;
			
			$this->view->month_start = $month_start;
			$this->view->month__ = $month__;
			
			$this->view->tot_product = $tot_product;
			$this->view->net_product = $net_product;
			$this->view->iva_product = $iva_product;
			
			$this->view->month_1 = $month_1;
			$this->view->year_1 = $year_1;
			$this->view->tot_month_1 = $tot_month_1;
									
			$this->view->month_2 = $month_2;
			$this->view->year_2 = $year_2;
			$this->view->tot_month_2 = $tot_month_2;
									
			$this->view->month_3 = $month_3;
			$this->view->year_3 = $year_3;
			$this->view->tot_month_3 = $tot_month_3;
									
			$this->view->month_4 = $month_4;
			$this->view->year_4 = $year_4;
			$this->view->tot_month_4 = $tot_month_4;
									
			$this->view->month_5 = $month_5;
			$this->view->year_5 = $year_5;
			$this->view->tot_month_5 = $tot_month_5;
									
			$this->view->month_6 = $month_6;
			$this->view->year_6 = $year_6;
			$this->view->tot_month_6 = $tot_month_6;
									
			$this->view->month_7 = $month_7;
			$this->view->year_7 = $year_7;
			$this->view->tot_month_7 = $tot_month_7;
									
			$this->view->month_8 = $month_8;
			$this->view->year_8 = $year_8;
			$this->view->tot_month_8 = $tot_month_8;
									
			$this->view->month_9 = $month_9;
			$this->view->year_9 = $year_9;
			$this->view->tot_month_9 = $tot_month_9;
									
			$this->view->month_10 = $month_10;
			$this->view->year_10 = $year_10;
			$this->view->tot_month_10 = $tot_month_10;
									
			$this->view->month_11 = $month_11;
			$this->view->year_11 = $year_11;
			$this->view->tot_month_11 = $tot_month_11;
									
			$this->view->month_12 = $month_12;
			$this->view->year_12 = $year_12;
			$this->view->tot_month_12 = $tot_month_12;
			//ends analytics		

        }
	
		public function agregarproductosAction()
        {
        		$this->breadcrumbs->addStep('Agregar Productos', $this->getUrl('agregarproductos', 'cuenta'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section8 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
				
			$request = $this->getRequest();
            $product_id = (int) $this->getRequest()->getQuery('id');
			$comp_id = $request->getPost('company_id');
			
			//user company's details
			$comp__ = new DatabaseObject_Company($this->db);
            $comp__->loadForUser($this->identity->user_id);
			
			$default_iva = $comp__->profile->iva;
			$default_iva2 = $comp__->profile->iva2;
			$default_iva2_name = $comp__->profile->iva2_name;
			$default_retention = $comp__->profile->retention;
			$default_invoice_number = $comp__->profile->invoice_number;
			$default_number_start = $comp__->profile->number_start;
			$default_number_start_letter = $comp__->profile->number_start_letter;
			$default_currency = $comp__->profile->currency;
			$default_recc = $comp__->profile->recc;
			
			$this->view->default_iva = $default_iva;
			$this->view->default_iva2 = $default_iva2;
			$this->view->default_iva2_name = $default_iva2_name;
			$this->view->default_retention = $default_retention;
			$this->view->default_invoice_number = $default_invoice_number;
			$this->view->default_number_start = $default_number_start;
			$this->view->default_number_start_letter = $default_number_start_letter;
			$this->view->default_currency = $default_currency;
			$this->view->default_recc = $default_recc;

			$invoicenumber = DatabaseObject_Product::GetProductsCount(
                $this->db,
                array('user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId())
            );
            $this->view->invoicenumber = $invoicenumber;
			
			$inv_num = $invoicenumber + 1;
			$inv_num_ = "$inv_num";
			$zero_a = strlen($inv_num_);
			
			if ($zero_a == 0){
			$default_number_zero = '00000';
			}
			elseif ($zero_a == 1){
			$default_number_zero = '00000';
			}
			elseif ($zero_a == 2){
			$default_number_zero = '0000';
			}
			elseif ($zero_a == 3){
			$default_number_zero = '000';
			}
			elseif ($zero_a == 4){
			$default_number_zero = '00';
			}
			elseif ($zero_a == 5){
			$default_number_zero = '0';
			}
			else {
			$default_number_zero = '';
			}
			
			$this->view->default_number_zero = $default_number_zero;
			
			$this->view->comp22 = $comp__->getId();
			
			if (!$company_id2) {
				if ($product_id  == 0) {
					$company_id2 = $this->identity->company_id2;
				}
				else {
					$company_id2 = $product_id;
				}
			}
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Ccompany::GetAllCompanies($this->db, $options);
			
			$this->view->companieslist = $companieslist;
			
			
			$i = 0;
			$company_ = array();
			$data_ = array();
			$address_ = array();
			$industry_ = array();
			$relationship_ = array();
            foreach ($companieslist as $company) {
            		$comp_=$company->profile->thecompany;
				$comp2_ = str_replace("'", "\'", $comp_);
				$company_[]=$comp2_;
				$data_[] = $company->getId();
				$address_[] = unserialize(base64_decode($company->profile->company_address));
				$industry_[]= $company->profile->company_industry;
				$relationship_[]= $company->profile->relationship;
				$i++;
			}
			
			$this->view->company_ = $company_;
			$this->view->data_ = $data_;
			$this->view->address_ = $address_;
			$this->view->industry_ = $industry_;
			$this->view->relationship_  = $relationship_ ;
			
            $addressid = array();
			$i = 0;
            foreach ($companieslist as $company) {
            		$options = array(
                		'user_id' => $this->identity->user_id,
                		'doc_type'   => 'ccompany',
                		'doc_id'   => $company->getId()
            		);

            		$addressid [$i] = DatabaseObject_Address::GetAddressesId($this->db, $options);
				
				$i++;
			}
			
			$this->view->addressid = $addressid;

			$this->view->company_id2 = $company_id2;
			
			$fp = new FormProcessor_Product($this->db,
                                             $this->identity->user_id,
                                             $product_id,
											$comp_id);
			
			if ($fp->product->getId()) {		
            $product = new DatabaseObject_Product($this->db);
            if (!$product->loadForUser($this->identity->user_id, $product_id))
                $this->_redirect($this->getUrl());
			
			$this->view->product = $product;
			
			$product->profile->company_address = unserialize(base64_decode($product->profile->company_address));
			$product->profile->company_id = unserialize(base64_decode($product->profile->company_id));
			

			//shows european currency
			$price = str_replace('.', ',', $product->profile->unit_price);
			$product->profile->unit_price = $price;
			
			$tax = str_replace('.', ',', $product->profile->iva);
			$product->profile->iva = $tax;
			
			$tax2 = str_replace('.', ',', $product->profile->iva2);
			$product->profile->iva2 = $tax2;
			
			}
											 						 
            if ($request->getPost('add')) {
            	//$this->messenger->addMessage('Producto aregado con exito');
                if ($fp->process($request)) {
                    $this->_redirect($this->getUrl('fichaproducto') . '?id=' . $fp->product->getId());
                }
            }

            if ($request->getPost('delete3')) {    	
			 $company_id = $request->getPost('company_id');
			 $prod3= new DatabaseObject_Ccompany($this->db);
			 	if ($company_id) {
			 		$prod3->deleteCompanyProfile($this->db, $company_id);
					$prod3->deleteCompany($this->db, $company_id);
                		$this->_redirect($this->getUrl('agregarproductos')); 
			   }
            }
			
			$this->view->fp = $fp;
        }

       public function productosAction()
        {
        		$this->breadcrumbs->addStep('Productos', $this->getUrl('productos', 'cuenta'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section8 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
        		$request = $this->getRequest();
			$product_id = $request->getPost('product_id');
			$prod_ids = $request->getPost('prod_id');
			$prod =new DatabaseObject_Product($this->db);

		    $options = array(
                'user_id' => $this->identity->user_id,
                'order'   => 'ts_created desc'
            );

            $products = DatabaseObject_Product::GetProducts($this->db,
                                                       $options);
			
			$this->view->products = $products;
				
			$i = 0;
			$product_ = array();
			$p_id_ = array();
            foreach ($products as $product) {
            		$product_[] = unserialize(base64_decode($product->profile->company_id));
				$p_id_[] = $product->getId();
				$i++;
			}
			
			$this->view->product_ = $product_;
			$this->view->p_id_ = $p_id_;
			
            	$options = array(
                		'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Ccompany::GetAllCompanies($this->db, $options);
			
			$this->view->companieslist = $companieslist;
			
			$i = 0;
			$company_ = array();
			$data_ = array();
			$address_ = array();
			$industry_ = array();
			$relationship_ = array();
            foreach ($companieslist as $company) {
            		$comp_=$company->profile->thecompany;
				$comp2_ = str_replace("'", "\'", $comp_);
				$company_[]=$comp2_;
				$data_[] = $company->getId();
				$address_[] = unserialize(base64_decode($company->profile->company_address));
				$industry_[]= $company->profile->company_industry;
				$relationship_[]= $company->profile->relationship;
				$i++;
			}
			
			$this->view->company_ = $company_;
			$this->view->data_ = $data_;
			$this->view->address_ = $address_;
			$this->view->industry_ = $industry_;
			$this->view->relationship_ = $relationship_;
													   
			if ($request->getPost('delete')) {
			 	if ($product_id) {
			 		$prod->deleteProductProfile($this->db, $product_id);
					$prod->deleteProduct($this->db, $product_id);
					$this->_redirect($this->getUrl('productos'));
			    }
             }
		}
		
		
		public function confirmapprovalAction()
        {
        	    $session = new Zend_Session_Namespace('registration');

            // load the user record based on the stored user ID
            $user = new DatabaseObject_User($this->db);
            if (!$user->load($session->user_id)) {
                $this->_forward('registro');
                return;
            }

            $this->view->user = $user;
			
			////////////
			
            $auth = Zend_Auth::getInstance();

            $fp = new FormProcessor_PlanDetails($this->db, $session->user_id);

            if ($this->getRequest()->isPost()) {
			
                if ($fp->process($this->getRequest())) {
                	
                    $auth->getStorage()->write($fp->user->createAuthIdentity());
					
					$this->_redirect($this->getUrl('registrocompleto'));
				
                }
            }
        }		
		   
		public function planAction()
        {
			
            //$auth = Zend_Auth::getInstance();
			//require 'twocheckout/twocheckout.php';

		    $options = array(
                'user_type' => $this->identity->user_type,
                'company'   => $this->identity->company
            );

            $employees = DatabaseObject_UserEmployee::Getusers2($this->db, $options);

            foreach ($employees as $employee){
				$fp[] = new FormProcessor_PlanDetails($this->db, $employee->getId());
			}
			
			$total_ = count($fp);
			$i = 0;
            if ($this->getRequest()->isPost()) {
				
				foreach ($fp as $fp_){
                		if ($fp_->process($this->getRequest())) {
					}
					if(++$i === $total_) {
	                    //$auth->getStorage()->write($fp->user->createAuthIdentity());
						
						/*
						if ($plan == 'approval') {
	   						$args = array (
							'sid' => "2018973",
							'product_id' => 1
						);
							 
						Twocheckout_Charge::redirect($args);
						//checkout ends
						}*/
						
						$identity = Zend_Auth::getInstance()->getIdentity();
            				$request = $this->getRequest();
            				$identity->plan = $request->getPost('plan');

						$this->_redirect($this->getUrl('index') . '?submitted=true');
					}
                }
            }
        }

        public function perfilcompletoAction()
        {
        	    // load the user record based on the stored user ID
            $user = new DatabaseObject_User($this->db);
            $user->load(Zend_Auth::getInstance()->getIdentity()->user_id);

            $this->breadcrumbs->addStep('Detalles de Cuenta',
                                        $this->getUrl('detalles'));
            $this->breadcrumbs->addStep('Detalles actualizados');
            $this->view->user = $user;
			
        }
		
        public function empresacompletaAction()
        {
        		// load the user record based on the stored user ID
            $user = new DatabaseObject_User($this->db);
            $user->load(Zend_Auth::getInstance()->getIdentity()->user_id);

            $this->breadcrumbs->addStep('Detalles de Compa&ntilde;ia',
                                        $this->getUrl('empresa'));
            $this->breadcrumbs->addStep('Empresa actualizada');
            $this->view->user = $user;
			
        }
		
        public function productocompletoAction()
        {
        		// load the user record based on the stored user ID
            $user = new DatabaseObject_User($this->db);
            $user->load(Zend_Auth::getInstance()->getIdentity()->user_id);

            $this->breadcrumbs->addStep('Detalles de Producto',
                                        $this->getUrl('productos'));
            $this->breadcrumbs->addStep('Producto actualizado');
            $this->view->user = $user;
			
        }
    }
?>