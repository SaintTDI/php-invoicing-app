<?php
    class FormProcessor_InvoicePayment extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $invoice = null;
		public $company = null;
		
        public function __construct($db, $user_id, $invoice_id = 0, $invoice2_id = 0)
        {
            parent::__construct();

            $this->db = $db;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);

			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());

            $this->invoice = new DatabaseObject_Invoice($db);
            $this->invoice->loadForUser($this->user->getId(), $invoice_id);
			$this->invoice_id_ = $invoice_id;		

            $this->invoice2 = new DatabaseObject_Cashflow($db);
            $this->invoice2->loadForUser($this->user->getId(), $invoice2_id);
		
			if ($this->invoice->isSaved()) {
			
			//for invoices
			$this->datepay = $this->invoice->profile->datepay;
			$this->waypay = $this->invoice->profile->waypay;
			$this->referencepay = $this->invoice->profile->referencepay;
			$this->amountpay = $this->invoice->profile->amountpay;
			$this->detailpay = $this->invoice->profile->detailpay;
			$this->paid = $this->invoice->profile->paid;
			
			//for cashflow
			$this->datepay_ = $this->invoice2->profile->datepay;
			$this->waypay_ = $this->invoice2->profile->waypay;
			$this->referencepay_ = $this->invoice2->profile->referencepay;
			$this->amountpay_ = $this->invoice2->profile->amountpay;
			$this->detailpay_ = $this->invoice2->profile->detailpay;
			$this->paid_ = $this->invoice2->profile->paid;

        }		
		else
                	$this->invoice->user_id = $this->user->getId();
				$this->invoice->company_id = $this->company->getId();
		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
        		$this->datepay = $this->sanitize($request->getPost('datepay'));
            $this->invoice->profile->datepay = $this->datepay;
			
        		$this->waypay = $this->sanitize($request->getPost('waypay'));
            $this->invoice->profile->waypay = $this->waypay;
			
        		$this->referencepay = $this->sanitize($request->getPost('referencepay'));
            $this->invoice->profile->referencepay = $this->referencepay;
			
			
			if (!$this->invoice->profile->amountpay) {
            		$amountpay_ = $this->sanitize($request->getPost('amountpay'));
            		if (strlen($amountpay_) == 0) {
                		$this->addError('amountpay', 'Por favor defina el monto del cobro');
				}
           	 	else {
		    			$amountpay__ = str_replace('.', '', $amountpay_);
					$this->amountpay = str_replace(',', '.', $amountpay__);
                		$this->invoice->profile->amountpay = $this->amountpay;
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
					$this->amountpay =  $this->invoice->profile->amountpay + $amtpay_;
                		$this->invoice->profile->amountpay = $this->amountpay;
					$this->amountpay_ = $amtpay_;
				}
			}	
			
           	 if ($this->amountpay >=  $this->invoice->profile->total) {
				$this->paid = 'yes';
            		$this->invoice->profile->paid = $this->paid;
			}	
			
        		$this->detailpay = $this->sanitize($request->getPost('detailpay'));
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
					
            			if ($this->paid) {
						$this->invoice->profile->paid = $this->paid;
					}
			
					$this->invoice->save();
					
					//for cashflow
             	   	$this->invoice2->user_id = $this->user->getId();
					$this->invoice2->company_id = $this->company->getId();
					$this->invoice2->invoice_number = $this->invoice_id_;
					$this->invoice2->profile->datepay = date("d-m-Y", strtotime($this->datepay));
					$this->invoice2->profile->waypay = $this->waypay;
					$this->invoice2->profile->referencepay = $this->referencepay;
					$this->invoice2->profile->amountpay = $this->amountpay_;
					$this->invoice2->profile->detailpay = $this->detailpay;
					
            			if ($this->paid) {
						$this->invoice2->profile->paid = $this->paid;
					}
			
					$this->invoice2->save();
				}
				
          }

		      // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>