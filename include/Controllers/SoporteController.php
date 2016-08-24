<?php
    class SoporteController extends CustomControllerAction
    {
    	
        public function init()
        {
            parent::init();
            $this->breadcrumbs->addStep('Soporte', $this->getUrl(null, 'soporte'));
			
			$this->identity = Zend_Auth::getInstance()->getIdentity();
        }
		
        public function indexAction()
        {
        		$auth = Zend_Auth::getInstance();
			
            $this->breadcrumbs->addStep('Soporte', $this->getUrl(null, 'index'));
		   
		    $request = $this->getRequest();
		   
		    $message_id = 0;
		   
            $fp = new FormProcessor_SendMessage($this->db, $message_id);
			
			$this->view->fp = $fp;
			
            $fp2 = new FormProcessor_SaveMessage($this->db,
                                                 $this->identity->user_id,
                                                 $message_id);
												 
			$fp3 = new FormProcessor_UserDetails($this->db,
												$this->identity->real_id);
												
			$this->view->default_email = $fp3->email;
			$this->view->first_name = $fp3->first_name;
			$this->view->last_name = $fp3->last_name;
			$this->view->default_name = $this->view->first_name . ' ' . $this->view->last_name;

            if ($request->isPost('add')) {
            	  if ($fp->process($request)) {
                  	if ($fp2->process($request)) {
						 $this->_redirect($this->getUrl('index') . '?submitted=true');
                  	}
			   }
            }
        }
    }
?>