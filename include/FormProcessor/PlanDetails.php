<?php
    class FormProcessor_PlanDetails extends FormProcessor
    {
        protected $db = null;
        public $user = null;

        public function __construct($db, $user_id)
        {
            parent::__construct();

            $this->db = $db;
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			$this->plan = $this->user->profile->plan;
			
        }

        public function process(Zend_Controller_Request_Abstract $request)
        {
			// validate the plan
            $this->plan = $this->sanitize($request->getPost('plan'));
            if (strlen($this->plan) == 0)
                $this->addError('plan', 'Por favor selecciona el plan de mejor se ajuste a sus necesidades.');
            else
                $this->user->profile->plan = $this->plan;
            
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
                $this->user->save();
            }

            // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>