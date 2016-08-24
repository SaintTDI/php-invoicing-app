<?php
    class FormProcessor_ExpensePayment extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $expense = null;
		public $company = null;
		
        public function __construct($db, $user_id, $expense_id = 0, $expense2_id = 0)
        {
            parent::__construct();

            $this->db = $db;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);

			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());

            $this->expense = new DatabaseObject_Expense($db);
            $this->expense->loadForUser($this->user->getId(), $expense_id);
			$this->expense_id_ = $expense_id;		

            $this->expense2 = new DatabaseObject_Cashexpense($db);
            $this->expense2->loadForUser($this->user->getId(), $expense2_id);
		
			if ($this->expense->isSaved()) {
			
			//for expenses
			$this->datepay = $this->expense->profile->datepay;
			$this->waypay = $this->expense->profile->waypay;
			$this->referencepay = $this->expense->profile->referencepay;
			$this->amountpay = $this->expense->profile->amountpay;
			$this->detailpay = $this->expense->profile->detailpay;
			$this->paid = $this->expense->profile->paid;
			
			//for cashexpenses
			$this->datepay_ = $this->expense2->profile->datepay;
			$this->waypay_ = $this->expense2->profile->waypay;
			$this->referencepay_ = $this->expense2->profile->referencepay;
			$this->amountpay_ = $this->expense2->profile->amountpay;
			$this->detailpay_ = $this->expense2->profile->detailpay;
			$this->paid_ = $this->expense2->profile->paid;

        }		
		else
                	$this->expense->user_id = $this->user->getId();
				$this->expense->company_id = $this->company->getId();
		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
        		$this->datepay = $this->sanitize($request->getPost('datepay'));
            $this->expense->profile->datepay = $this->datepay;
			
        		$this->waypay = $this->sanitize($request->getPost('waypay'));
            $this->expense->profile->waypay = $this->waypay;
			
        		$this->referencepay = $this->sanitize($request->getPost('referencepay'));
            $this->expense->profile->referencepay = $this->referencepay;
			
			
			if (!$this->expense->profile->amountpay) {
            		$amountpay_ = $this->sanitize($request->getPost('amountpay'));
            		if (strlen($amountpay_) == 0) {
                		$this->addError('amountpay', 'Por favor defina el monto del cobro');
				}
           	 	else {
		    			$amountpay__ = str_replace('.', '', $amountpay_);
					$this->amountpay = str_replace(',', '.', $amountpay__);
                		$this->expense->profile->amountpay = $this->amountpay;
					$this->amountpay_ = $this->amountpay;
				}
			}	
			else {
            		$amountpay_ = $this->sanitize($request->getPost('amountpay'));
            		if (strlen($amountpay_) == 0) {
                		$this->addError('amountpay', 'Por favor defina el monto del cobro');
				}
           	 	else {
		    			$amountpay__ = str_replace('.', '', $amountpay_);
					$amtpay_ = str_replace(',', '.', $amountpay__);
					$this->amountpay = $this->expense->profile->amountpay + $amtpay_;
                		$this->expense->profile->amountpay = $this->amountpay;
					$this->amountpay_ = $amtpay_;
				}
			}	
			
           	 if ($this->amountpay >=  $this->expense->profile->total) {
				$this->paid = 'yes';
            		$this->expense->profile->paid = $this->paid;
			}	
			
        		$this->detailpay = $this->sanitize($request->getPost('detailpay'));
            $this->expense->profile->detailpay = $this->detailpay;
			
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
            			
            		//for expenses
				if ($this->expense_id_) {
					$this->expense->profile->datepay = date("d-m-Y", strtotime($this->datepay));
					$this->expense->profile->waypay = $this->waypay;
					$this->expense->profile->referencepay = $this->referencepay;
					$this->expense->profile->amountpay = $this->amountpay;
					$this->expense->profile->detailpay = $this->detailpay;
					
            			if ($this->paid) {
						$this->expense->profile->paid = $this->paid;
					}
			
					$this->expense->save();
					
					//for cashexpenses
             	   	$this->expense2->user_id = $this->user->getId();
					$this->expense2->company_id = $this->company->getId();
					$this->expense2->expense_number = $this->expense_id_;
					$this->expense2->profile->datepay = date("d-m-Y", strtotime($this->datepay));
					$this->expense2->profile->waypay = $this->waypay;
					$this->expense2->profile->referencepay = $this->referencepay;
					$this->expense2->profile->amountpay = $this->amountpay_;
					$this->expense2->profile->detailpay = $this->detailpay;
					
            			if ($this->paid) {
						$this->expense2->profile->paid = $this->paid;
					}
			
					$this->expense2->save();
				}
				
          }

		      // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>