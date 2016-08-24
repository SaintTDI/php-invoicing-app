<?php
    class ComunicacionesController extends CustomControllerAction
    {
        public function init()
        {
            parent::init();	
			$this->identity = Zend_Auth::getInstance()->getIdentity();

			if (!$this->identity)
                $this->_redirect($this->getUrl('../index/'));
        }
		
        public function indexAction()
        {

        }
    }
?>