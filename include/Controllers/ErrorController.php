<?php
    class ErrorController extends CustomControllerAction
    {
        public function errorAction()
        {
            $request = $this->getRequest();
            $error = $request->getParam('error_handler');

            switch ($error->type) {
                case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
                case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
                    $this->_forward('error404');
                    return;

                case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_OTHER:
                default:
                    // fall through
            }

            $this->getResponse()->clearBody();

            Zend_Registry::get('logger')->crit($error->exception->getMessage());
			
			$user = new DatabaseObject_User($this->db);
			//$user->sendEmailCTO('error-response.tpl');
        }

        public function error404Action()
        {
            $request = $this->getRequest();
            $error   = $request->getParam('error_handler');
            $uri     = $request->getRequestUri();

            Zend_Registry::get('logger')->info('404 ha ocurrido: ' . $uri);

            $this->getResponse()->setHttpResponseCode(404);

            $this->breadcrumbs->addStep('404 archivo no encontrado');
            $this->view->requestedAddress = $uri;
        }
		
        public function error403Action()
        {
            $request = $this->getRequest();
            $error   = $request->getParam('error_handler');
            $uri     = $request->getRequestUri();

            Zend_Registry::get('logger')->info('403 ha ocurrido: ' . $uri);

            $this->getResponse()->setHttpResponseCode(403);

            $this->breadcrumbs->addStep('403 directorio restringido');
            $this->view->requestedAddress = $uri;
        }
    }
?>