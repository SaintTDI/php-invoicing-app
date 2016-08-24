<?php
    class FormProcessor_DeleteInvoicePayment extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $invoice = null;
		public $company = null;
		
		
        public function __construct($db, $user_id, $invoice_id)
        {
            parent::__construct();
			$this->amtpa = 0;
            $this->db = $db;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);

			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());

            $this->invoice = new DatabaseObject_Invoice($db);
            $this->invoice->loadForUser($this->user->getId(), $invoice_id);
			$this->invoice_id_ = $invoice_id;
			
            $options = array(
                'user_id' => $this->user->getId(),
                'company_id' => $this->company->getId(),
                'invoice_number' => $this->invoice_id_
            );		

            $this->invoices = DatabaseObject_Cashflow::GetInvoices($db, $options);
		
			if ($this->invoice->isSaved()) {
			
			//for invoices
			$this->datepay = $this->invoice->profile->datepay;
			$this->waypay = $this->invoice->profile->waypay;
			$this->referencepay = $this->invoice->profile->referencepay;
			$this->amountpay = $this->invoice->profile->amountpay;
			$this->detailpay = $this->invoice->profile->detailpay;
			$this->paid = $this->invoice->profile->paid;

        }		
		else
                	$this->invoice->user_id = $this->user->getId();
				$this->invoice->company_id = $this->company->getId();
		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
        		if ($this->invoices){
			 	foreach ($this->invoices as $invoice2){
			 		$this->amtpa = $this->amtpa + $invoice2->profile->amountpay;
					$this->dtpay = $invoice2->profile->datepay;
					$this->wypay = $invoice2->profile->waypay;
					$this->referencpay = $invoice2->profile->referencepay;
					$this->detalpay = $invoice2->profile->detailpay;
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
            $this->invoice->profile->datepay = $this->datepay;
			
        		$this->waypay = $this->wypay;
            $this->invoice->profile->waypay = $this->waypay;
			
        		$this->referencepay = $this->referencpay;
            $this->invoice->profile->referencepay = $this->referencepay;

        		$this->amountpay = $this->amtpa;
            $this->invoice->profile->amountpay = $this->amountpay;			

            if ($amountpay >=  $this->invoice->profile->total) {
				$this->paid = 'yes';
            		$this->invoice->profile->paid = $this->paid;
			}
			else {
				$this->paid = '';
				$this->invoice->profile->paid = '';
			}	
			
        		$this->detailpay = $this->detalpay;
            $this->invoice->profile->detailpay = $this->detailpay;
			
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
            			
            		//for invoices
				if ($this->invoice_id_) {
					$this->invoice->profile->datepay = date("d-m-Y", strtotime($this->datepay));
					$this->invoice->profile->waypay = $this->waypay;
					$this->invoice->profile->referencepay = $this->referencepay;
					$this->invoice->profile->amountpay = $this->amountpay;
					$this->invoice->profile->detailpay = $this->detailpay;
					$this->invoice->profile->paid = $this->paid;
			
					$this->invoice->save();
				}
				
          }

		      // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>