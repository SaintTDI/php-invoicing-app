<?php
    class UsuariosController extends CustomControllerAction
    {
    		protected $user = null;
			
        public function init()
        {
            parent::init();
			$this->breadcrumbs->addStep('Cuenta', $this->getUrl(null, 'cuenta'));
            $this->breadcrumbs->addStep('Usuarios', $this->getUrl(null, 'usuarios'));
			
			$this->identity = Zend_Auth::getInstance()->getIdentity();
        }

    	
        public function editarAction()
        {
        		 $this->breadcrumbs->addStep('Editar', $this->getUrl('editar', 'usuario'));
			
			if ($this->identity->user_type != 'proprietary') {		
                $this->_redirect($this->getUrl('index','finanzas'));
			}
			
        		//$auth = Zend_Auth::getInstance();
			$request = $this->getRequest();	
			$user_id = (int) $this->getRequest()->getQuery('id');
			$addr_id = $request->getPost('addr_id');
			$contact_id = $request->getPost('$contact_id');
			
			$user = new DatabaseObject_User($this->db);
            $user->load($this->identity->user_id);
			$plan = $user->profile->plan;
			
			$comp_ = new DatabaseObject_Company($this->db);
			$comp_->loadForUser($this->identity->user_id);
			
			$thecompany = $comp_->thecompany;
			$company_id = $comp_->profile->contact_id_;
			
			$username = $this->identity->user_id;
			$company_ = $this->identity->company;
	
			$fp = new FormProcessor_UserEmployee($this->db,
                                             $user_id,
											$contact_id,
											$company_);
											 
			$this->view->fp = $fp;
	
			if ($request->getPost('edit')) {
            	   if ($fp->process($request)) {
					//$auth->getStorage()->write($fp->user->createAuthIdentity());
					$this->_redirect($this->getUrl('index'));    
                }
            }
			
			$this->view->fp = $fp;
			$this->view->plan = $plan;
			$this->view->username = $username;
			$this->view->user = $user;
			$this->view->company_ = $company_;
			$this->view->thecompany = $thecompany;
			$this->view->company_id = $company_id;
				
        }
    	
 		public function agregarAction()
        {
        		$this->breadcrumbs->addStep('Agregar', $this->getUrl('agregar', 'usuario'));
			
			if ($this->identity->user_type != 'proprietary') {		
                $this->_redirect($this->getUrl('index','finanzas'));
			}
				
			$request = $this->getRequest();
			$user_id = (int) $this->getRequest()->getQuery('id');
			$addr_id = $request->getPost('addr_id');
			$contact_id = $request->getPost('contact_id');
			
			$user = new DatabaseObject_User($this->db);
            $user->load($this->identity->user_id);
			$plan = $user->profile->plan;
			
			$comp_ = new DatabaseObject_Company($this->db);
			$comp_->loadForUser($this->identity->user_id);
			
			$thecompany = $comp_->thecompany;
			$company_id = $comp_->profile->contact_id_;
			
			$username = $this->identity->user_id;
			$company_ = $this->identity->company;
	
			$fp = new FormProcessor_UserEmployee($this->db,
                                             $user_id,
											$contact_id,
											$company_);
											 						 
            if ($request->getPost('add')) {
            	//$this->messenger->addMessage('usuario aregado con exito');
                if ($fp->process($request)) {
				    $this->_redirect($this->getUrl('index'));
                }
            }	
					
			$this->view->fp = $fp;
			$this->view->plan = $plan;
			$this->view->username = $username;
			$this->view->company_ = $company_;
			$this->view->thecompany = $thecompany;
			$this->view->company_id = $company_id;
        }
		
       public function indexAction()
        {
			if ($this->identity->user_type != 'proprietary') {		
                $this->_redirect($this->getUrl('index','finanzas'));
			}
			
        		$request = $this->getRequest();
			$user_id = $request->getPost('user_id');
			$prod =new DatabaseObject_UserEmployee($this->db);
			
			$user = new DatabaseObject_User($this->db);
            $user->load($this->identity->user_id);
			$plan = $user->profile->plan;
			
			$username = $this->identity->user_id;

		    $options = array(
                'user_type' => $this->identity->user_type,
                'company'   => $this->identity->company
            );
			
			
            $users = DatabaseObject_UserEmployee::Getusers2($this->db, $options);
			
			$this->view->users = $users;
			
			$this->view->plan = $plan;
			$this->view->username = $username;

													   
			if ($request->getPost('delete')) {
			 	if ($user_id) {
			 		$prod->deleteUserProfile($this->db, $user_id);
					$prod->deleteUser($this->db, $user_id);
					$this->_redirect($this->getUrl('index'));
			    }
             }
		}
    }
?>