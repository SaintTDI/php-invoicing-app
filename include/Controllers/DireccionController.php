<?php
    class DireccionController extends CustomControllerAction
    {
    		protected $user = null;
		
        public function init()
        {
            parent::init();
            $this->breadcrumbs->addStep('Direccion', $this->getUrl(null, 'direccion'));
			$this->identity = Zend_Auth::getInstance()->getIdentity();
        }

        public function editardireccionAction()
        {
			$request = $this->getRequest();
		
			$address_id = (int) $this->getRequest()->getQuery('id');
			
			//user's details
			$default_country= $this->identity->country;
			$this->view->default_country = $default_country;
			////

            $address = new DatabaseObject_Address($this->db);		
            if (!$address->loadForUser($this->identity->user_id, $address_id))
                $this->_redirect($this->getUrl());
            $this->breadcrumbs->addStep('Editar Direcci&oacute;n');
            
			$this->view->address = $address;
		
            $fp = new FormProcessor_Address($this->db,
                                             $this->identity->user_id,
                                             $address_id);	

            if ($fp->address->isSaved()) {
                $this->breadcrumbs->addStep('Edita tu Direcci&oacute;n', $this->getUrl());
            }
											 
			$this->view->fp = $fp;

            
            if ($request->getPost('edit')) {
            	   if ($fp->process($request)) { 
                 	$address->save();
                    $url = $this->getUrl('editardireccion') . '?id=' . $fp->address->getId() . '&submitted=true';
                    $this->_redirect($url);     
                }
            }		
            ////
		    else if ($request->getPost('delete')) {
				$address->profile->delete();
				$address->delete();
                // Preview page no longer exists for this page so go back to index
				$this->messenger->addMessage('Direcci&oacute;n borrada');
                $this->_redirect($this->getUrl('direcciones'));
            }
        }
		
 		public function agregardireccionesAction()
        {	
			$request = $this->getRequest();
            $address_id = (int) $this->getRequest()->getQuery('id');
	
			//user's details
			$default_country= $this->identity->country;
			$this->view->default_country = $default_country;
			////
			
			$fp = new FormProcessor_Address($this->db,
                                             $this->identity->user_id,
                                             $address_id);
			
			if ($fp->address->getId()) {		
            $address = new DatabaseObject_Address($this->db);
            if (!$address->loadForUser($this->identity->user_id, $address_id))
                $this->_redirect($this->getUrl());
			
			$this->view->address = $address;
			
			}
											 						 
            if ($request->getPost('add')) {
            	//$this->messenger->addMessage('Direccion aregada con exito');
                if ($fp->process($request)) {
                    $url = $this->getUrl('editardireccion') . '?id=' . $fp->address->getId() . '&command=cerrar';
                    $this->_redirect($url);
                }
            }
			
			$this->view->fp = $fp;
        }

       public function direccionesAction()
        {
        		$request = $this->getRequest();	
			$address_id = $request->getPost('address_id');	
		}
		
        public function direccioncompletaAction()
        {
        		// load the user record based on the stored user ID
            $user = new DatabaseObject_User($this->db);
            $user->load(Zend_Auth::getInstance()->getIdentity()->user_id);

            $this->breadcrumbs->addStep('Detalles de su direcci&oacute;n',
                                        $this->getUrl('direcciones'));
            $this->breadcrumbs->addStep('Direcci&oacute;n actualizado');
            $this->view->user = $user;
			
        }
    }
?>