<?php
    class FormProcessor_CashDeleteIncome extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $invoice = null;
		public $company = null;

        public function __construct($db, $user_id, $cash_id = 0)
        {
            parent::__construct();

            $this->db = $db;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);

			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());

			$this->cash_id = $cash_id;

            $this->account = new DatabaseObject_Cashaccount($db);
            $this->account->loadForUser($this->user->getId(), $cash_id);

			}

        public function process(Zend_Controller_Request_Abstract $request)
        	{				
				// if no errors have occurred, save the user
	            if (!$this->hasError()) {
	            	
					if ($this->cash_id) {
				 		$this->account->deleteAccountProfile($this->db, $this->cash_id);
						$this->account->deleteAccount($this->db, $this->cash_id);
				    }

          		}

		      // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>