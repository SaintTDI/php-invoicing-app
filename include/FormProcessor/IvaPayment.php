<?php
    class FormProcessor_IvaPayment extends FormProcessor
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
		
			if ($this->iva->isSaved()) {
			
			//for ivas
			$this->datepay = $this->iva->profile->datepay;
			$this->amountpay = $this->iva->profile->amountpay;
			
			$this->referencepay = $this->iva->profile->referencepay;
			$this->detailpay = $this->iva->profile->detailpay;

        		}		
			else
                	$this->iva->user_id = $this->user->getId();
				$this->iva->company_id = $this->company->getId();
				$this->iva->invoice_ids = $this->invoice_ids;
				$this->iva->expense_ids = $this->expense_ids;
			}

        public function process(Zend_Controller_Request_Abstract $request)
        {
	        		$this->datepay = $this->sanitize($request->getPost('datepay'));
	            if (strlen($this->datepay) == 0)
	                $this->addError('datepay', 'Por favor introduce la fecha del pago');
	            else
	            $this->iva->profile->datepay = $this->datepay;
	
				if (!$this->iva->profile->amountpay) {
	            		$amountpay_ = $this->sanitize($request->getPost('amountpay'));
	            		if (strlen($amountpay_) == 0) {
	                		$this->addError('amountpay', 'Por favor especifica el monto');
					}
	           	 	else {
	           	 		$this->amountpay =  $amountpay_;
	                		$this->iva->profile->amountpay = $this->amountpay;
					}
				}	
				else {
	            		$amountpay_ = $this->sanitize($request->getPost('amountpay'));
	            		if (strlen($amountpay_) == 0) {
	                		$this->addError('amountpay', 'Por favor especifica el monto');
					}
	           	 	else {
						$this->amountpay =  $this->iva->profile->amountpay + $amountpay_;
	                		$this->iva->profile->amountpay = $this->amountpay;
					}
				}	
				
	        		$this->referencepay = $this->sanitize($request->getPost('referencepay'));
	            $this->iva->profile->referencepay = $this->referencepay;
				
	        		$this->detailpay = $this->sanitize($request->getPost('detailpay'));
	            $this->iva->profile->detailpay = $this->detailpay;
				
				// if no errors have occurred, save the user
	            if (!$this->hasError()) {
	            	
				$this->iva->profile->datepay = $this->datepay;
				$this->iva->profile->amountpay = $this->amountpay;
				
				$this->iva->profile->referencepay = $this->referencepay;
				$this->iva->profile->detailpay = $this->detailpay;
				
				$this->iva->save();
				
				
				$invoice_ids =  unserialize(base64_decode($this->invoice_ids));
				
				if (is_array($invoice_ids)){
					foreach ($invoice_ids as $invoice_id){
		            		$this->invoice_ = new DatabaseObject_Invoice($this->db);
		            		$this->invoice_->loadForUser($this->user->getId(), $invoice_id);
						$this->invoice_->user_id = $this->user->getId();
						$this->invoice_->company_id = $this->company->getId();
						$this->invoice_->profile->iva_paid = 'yes';
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
						$this->expense_->profile->iva_paid = 'yes';
						$this->expense_->save();
		      		}
				}

          		}

		      // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>