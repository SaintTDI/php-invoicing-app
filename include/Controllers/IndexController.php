<?php
    class IndexController extends CustomControllerAction
    {
        public function indexAction()
        {
			$this->_redirect($this->getUrl('login','cuenta'));
        }
    }
?>