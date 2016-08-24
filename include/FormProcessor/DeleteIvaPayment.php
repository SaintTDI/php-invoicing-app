<?php
    class FormProcessor_DeleteIvaPayment extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $invoice = null;
		public $company = null;

        public function __construct($db, $user_id, $invoice_ids = 0, $expense_ids = 0, $iva_id = 0)
        {
            parent::__construct();

            $this->db = $db;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);

			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());
			
			$this->expense_ids = $expense_ids;
			$this->invoice_ids = $invoice_ids;
			$this->iva_id = $iva_id;

            $this->iva = new DatabaseObject_Iva($db);
            $this->iva->loadForUser($this->user->getId(), $iva_id);

			}

        public function process(Zend_Controller_Request_Abstract $request)
        	{				
				// if no errors have occurred, save the user
	            if (!$this->hasError()) {
	            	
				if ($this->iva_id) {
			 		$this->iva->deleteIvaProfile($this->db, $this->iva_id);
					$this->iva->deleteIva($this->db, $this->iva_id);
			    }
								
				$invoice_ids =  unserialize(base64_decode($this->invoice_ids));
				
				if (is_array($invoice_ids)){
					foreach ($invoice_ids as $invoice_id){
		            		$this->invoice_ = new DatabaseObject_Invoice($this->db);
		            		$this->invoice_->loadForUser($this->user->getId(), $invoice_id);
						$this->invoice_->user_id = $this->user->getId();
						$this->invoice_->company_id = $this->company->getId();
						$this->invoice_->profile->iva_paid = '';
						$this->invoice_->save();
		        		}
				}
	
				$expense_ids =  unserialize(base64_decode($this->expense_ids));
				
				if (is_array($expense_ids)){
					foreach ($expense_ids as $expense_id){
		            		$this->expense_ = new DatabaseObject_Expense($this->db);
		            		$this->expense_->loadForUser($this->user->getId(), $expense_id);
						$this->expense_->user_id = $this->user->getId();
						$this->expense_->company_id = $this->company->getId();
						$this->expense_->profile->iva_paid = '';
						$this->expense_->save();
		      		}
				}

          		}

		      // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>