<?php
    class HerramientasController extends CustomControllerAction
    {
    		protected $user = null;
			
        public function init()
        {
            parent::init();
            $this->breadcrumbs->addStep('Herramientas', $this->getUrl(null, 'herramientas'));
			
			$this->identity = Zend_Auth::getInstance()->getIdentity();
			if (!$this->identity->company_id2){
		    		$this->identity->company_id2 = DatabaseObject_Address::temporaryUser();
			}
			if (!$this->identity->company_id3){
			$this->identity->company_id3 = DatabaseObject_Address::temporaryUser();
			}
			
			if (!$this->identity)
                $this->_redirect($this->getUrl('../index/'));
        }
		
        public function indexAction()
        {

        }

    }
?>