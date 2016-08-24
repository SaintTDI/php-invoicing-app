<?php
    class FormProcessor_CashIncome extends FormProcessor
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

            $this->account = new DatabaseObject_Cashaccount($db);
            $this->account->loadForUser($this->user->getId(), $cash_id);
		
			if ($this->account->isSaved()) {
			
			//for accounts
			$this->datepay = $this->account->profile->datepay;
			$this->amountpay = $this->account->profile->amountpay;
			
			$this->referencepay = $this->account->profile->referencepay;
			$this->detailpay = $this->account->profile->detailpay;

			$this->waypay = $this->account->profile->waypay;
			
        		}		
			else
                	$this->account->user_id = $this->user->getId();
				$this->account->company_id = $this->company->getId();
			}

        public function process(Zend_Controller_Request_Abstract $request)
        {
	        		$this->datepay = $this->sanitize($request->getPost('datepay'));
	            if (strlen($this->datepay) == 0)
	                $this->addError('datepay', 'Por favor introduce la fecha del aporte');
	            else
	            $this->account->profile->datepay = $this->datepay;

				if (!$this->account->profile->amountpay) {
	            		$amountpay_ = $this->sanitize($request->getPost('amountpay'));
	            		if (strlen($amountpay_) == 0) {
	                		$this->addError('amountpay', 'Por favor especifica el monto');
					}
	           	 	else {
			    			$amountpay__ = str_replace('.', '', $amountpay_);
						$this->amountpay = str_replace(',', '.', $amountpay__);
	                		$this->account->profile->amountpay = $this->amountpay;
					}
				}	
				else {
	            		$amountpay_ = $this->sanitize($request->getPost('amountpay'));
	            		if (strlen($amountpay_) == 0) {
	                		$this->addError('amountpay', 'Por favor especifica el monto');
					}
	           	 	else {
			    			$amountpay__ = str_replace('.', '', $amountpay_);
						$amtpay_ = str_replace(',', '.', $amountpay__);
						$this->amountpay =  $amtpay_;
	                		$this->account->profile->amountpay = $this->amountpay;
					}
				}	
				
	        		$this->referencepay = $this->sanitize($request->getPost('referencepay'));
	            $this->account->profile->referencepay = $this->referencepay;
				
	        		$this->detailpay = $this->sanitize($request->getPost('detailpay'));
	            $this->account->profile->detailpay = $this->detailpay;
				
	        		$this->waypay = $this->sanitize($request->getPost('waypay'));
	            $this->account->profile->waypay = $this->waypay;
				
				// if no errors have occurred, save the user
	            if (!$this->hasError()) {
	            	
				$this->account->profile->datepay = $this->datepay;
				$this->account->profile->amountpay = $this->amountpay;
				
				$this->account->profile->referencepay = $this->referencepay;
				$this->account->profile->detailpay = $this->detailpay;
				
				$this->account->profile->waypay = $this->waypay;
				
				$this->account->save();

          		}

		      // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>