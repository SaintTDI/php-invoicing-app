<?php
    class FormProcessor_TimeInvoice extends FormProcessor
    {
        protected $db = null;
        public $user_id = null;
		
        public function __construct($db, $user_id, $invoice_id = 0, $time_id)
        {
            parent::__construct();

            $this->db = $db;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);

			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());

			$invoicecount = DatabaseObject_Invoice::GetInvoicesDocId(
                $db,
                array('user_id' => $this->user->getId(),
					  'company_id' =>  $this->company->getId())
            );
            $this->invoicecount = $invoicecount;
			
			if (!$this->invoicecount){
				$this->invoicecount = 0;
			}

            $this->invoice = new DatabaseObject_Invoice($db);
            $this->invoice->loadForUser($this->user->getId(), $invoice_id);
		
			if ($this->invoice->isSaved()) {
			
			$this->invoice_number = $this->invoice->invoice_number;
			$this->invoice_date = $this->invoice->profile->invoice_date;
			$this->subtotal = $this->invoice->profile->subtotal;
			$this->discount = $this->invoice->profile->discount;
			$this->base = $this->invoice->profile->base;
			$this->total = $this->invoice->profile->total;
			$this->terms = $this->invoice->profile->terms;
			$this->notes = $this->invoice->profile->notes;
			$this->start_letter  = $this->invoice->profile->start_letter;
			$this->number_zero  = $this->invoice->profile->number_zero;
			$this->consecutive  = $this->invoice->profile->consecutive;
			$this->thecompany = $this->invoice->profile->thecompany;
			$this->company_id = $this->invoice->profile->company_id;
			$this->original_company_id = $this->invoice->profile->original_company_id;
			$this->original_company_address = $this->invoice->profile->original_company_address;
			$this->invoice_contact = $this->invoice->profile->invoice_contact;
			$this->contact_id = $this->invoice->profile->contact_id;
			$this->contact_address = $this->invoice->profile->contact_address;
			$this->invoice_valid = $this->invoice->profile->invoice_valid;
			
			$this->currency = $this->invoice->profile->currency;
			

        }		
		else
                	$this->invoice->user_id = $this->user->getId();
				$this->invoice->company_id = $this->company->getId();

		}

        public function process(Zend_Controller_Request_Abstract $request)
        {

			$tot_ = $this->invoicecount + 1;
            $this->invoice_number = $tot_;
            $this->invoice->invoice_number = $this->invoice_number;
			
			if (!$this->invoice_number){
				$this->invoice_number = 1;
			}

			$zero_a = strlen((string) $this->invoice_number);
			
			if ($zero_a == 0){
					$this->default_number_zero = '00000';
			}
			elseif ($zero_a == 1){
					$this->default_number_zero = '00000';
			}
			elseif ($zero_a == 2){
					$this->default_number_zero = '0000';
			}
			elseif ($zero_a == 3){
					$this->default_number_zero = '000';
			}
			elseif ($zero_a == 4){
					$this->default_number_zero = '00';
			}
			elseif ($zero_a == 5){
					$this->default_number_zero = '0';
			}
			else {
					$this->default_number_zero = '';
			}
			
			$now_ = date("d-m-Y");
			
            $this->invoice_date = $now_;
            $this->invoice->profile->invoice_date =  $this->invoice_date ;
			
            $this->invoice_valid = 1;
            $this->invoice->profile->invoice_valid = $this->invoice_valid;

            $this->subtotal = '0.00';
            $this->invoice->profile->subtotal = $this->subtotal;
			
			$this->discount = '0.00';
			$this->invoice->profile->discount = $this->discount;
			
            $this->base = '0.00';
            $this->invoice->profile->base = $this->base;
			
            $this->total = '0.00';
            $this->invoice->profile->total = $this->total;
			
			$this->currency = $this->company->profile->currency;
            $this->invoice->profile->currency = $this->currency;
			
			$this->start_letter = $this->company->profile->number_start_letter;
            $this->invoice->profile->start_letter = $this->start_letter;
			
			$this->number_zero = $this->default_number_zero;
            $this->invoice->profile->number_zero = $this->number_zero;
			
			$this->consecutive = $this->company->profile->consecutive;
            $this->invoice->profile->consecutive = $this->consecutive;
			
         
			// if no errors have occurred, save the user
            if (!$this->hasError()) {

			$this->invoice->invoice_number = $this->invoice_number;
			$this->invoice->profile->invoice_date = date("d-m-Y", strtotime($this->invoice_date));
			$this->invoice->profile->subtotal = $this->subtotal;
			$this->invoice->profile->discount = $this->discount;
			$this->invoice->profile->base = $this->base;
			$this->invoice->profile->total = $this->total;
			$this->invoice->profile->start_letter = $this->start_letter;
			$this->invoice->profile->number_zero = $this->number_zero;
			$this->invoice->profile->consecutive = $this->consecutive;
			$this->invoice->profile->invoice_valid = $this->invoice_valid;
			
			$this->invoice->profile->currency = $this->currency;

			$this->invoice->save();

          }

		      // return true if no errors have occurred
            return !$this->hasError();
        }
   }
?>