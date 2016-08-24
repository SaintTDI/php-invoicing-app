<?php
    class Templater extends Zend_View_Abstract
    {
        protected $_path;
        protected $_engine;

        public function __construct()
        {
            $config = Zend_Registry::get('config');

            require_once('Smarty/Smarty.class.php');

            $this->_engine = new Smarty();
		
            $this->_engine->template_dir = $config->paths->templates . '.' ;
            
            $this->_engine->compile_dir = sprintf('%s/tmp/templates_c', $config->paths->data);
            
            //$this->_engine->compile_dir = $config->paths->data . '/tmp/templates_c/';
            
            $this->_engine->plugins_dir = array($config->paths->base . '/include/Templater/plugins', 'plugins');
            
            //$this->_engine->plugins_dir = $config->paths->include . '/Templater/plugins/';
												
			$this->_engine->cache_dir = sprintf('%s/tmp/cache', $config->paths->data);
            
            //$this->_engine->cache_dir = $config->paths->data . '/tmp/cache/';
												
		    $this->_engine->config_dir = sprintf('%s/tmp/configs', $config->paths->data);
            
            //$this->_engine->config_dir = $config->paths->data . '/tmp/configs/';
	
        }

        public function getEngine()
        {
            return $this->_engine;
        }

        public function __set($key, $val)
        {
            $this->_engine->assign($key, $val);
        }

        public function __get($key)
        {
            return $this->_engine->getTemplateVars($key);
        }

        public function __isset($key)
        {
            return $this->_engine->getTemplateVars($key) !== null;
        }

        public function __unset($key)
        {
            $this->_engine->clear_assign($key);
        }

        public function assign($spec, $value = null)
        {
            if (is_array($spec)) {
                $this->_engine->assign($spec);
                return;
            }

            $this->_engine->assign($spec, $value);
        }

        public function clearVars()
        {
            $this->_engine->clear_all_assign();
        }

        public function render($name)
        {
            return $this->_engine->fetch(strtolower($name));
        }

        public function _run()
        {
        		 include func_get_arg(0);
        }
    }
?>