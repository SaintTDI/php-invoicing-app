<?php
    class FormProcessor_DeleteExpensePayment extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $expense = null;
		public $company = null;
		public $amountpay = 0;
		
        public function __construct($db, $user_id, $expense_id)
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

            $options = array(
                'user_id' => $this->user->getId(),
                'company_id' => $this->company->getId(),
                'expense_number' => $this->expense_id_
            );		

            $this->expenses = DatabaseObject_Cashexpense::GetExpenses($db, $options);
	
			if ($this->expense->isSaved()) {
			
			//for expenses
			$this->datepay = $this->expense->profile->datepay;
			$this->waypay = $this->expense->profile->waypay;
			$this->referencepay = $this->expense->profile->referencepay;
			$this->amountpay = $this->expense->profile->amountpay;
			$this->detailpay = $this->expense->profile->detailpay;
			$this->paid = $this->expense->profile->paid;

        }		
		else
                	$this->expense->user_id = $this->user->getId();
				$this->expense->company_id = $this->company->getId();
		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
      		if ($this->expenses){
			 	foreach ($this->expenses as $expense2){
			 		$this->amtpa = $this->amtpa + $expense2->profile->amountpay;
					$this->dtpay = $expense2->profile->datepay;
					$this->wypay = $expense2->profile->waypay;
					$this->referencpay = $expense2->profile->referencepay;
					$this->detalpay = $expense2->profile->detailpay;
				}
			  }
			 else {
			 		$this->amtpa = '';
					$this->dtpay = '';
					$this->wypay = '';
					$this->referencpay = '';
					$this->detalpay = '';
			 }
			
        		$this->datepay = $this->dtpay;
            $this->expense->profile->datepay = $this->datepay;
			
        		$this->waypay = $this->wypay;
            $this->expense->profile->waypay = $this->waypay;
			
        		$this->referencepay = $this->referencpay;
            $this->expense->profile->referencepay = $this->referencepay;

        		$this->amountpay = $this->amtpa;
            $this->expense->profile->amountpay = $this->amountpay;			

            if ($amountpay >=  $this->expense->profile->total) {
				$this->paid = 'yes';
            		$this->expense->profile->paid = $this->paid;
			}
			else {
				$this->paid = '';
				$this->expense->profile->paid = '';
			}	
			
        		$this->detailpay = $this->detalpay;
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
					$this->expense->profile->paid = $this->paid;
			
					$this->expense->save();
				}
				
          }

		      // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>