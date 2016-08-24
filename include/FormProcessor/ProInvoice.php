<?php
    class FormProcessor_ProInvoice extends FormProcessor
    {
        protected $db = null;
        public $user_id = null;
		
		public $totalIva = array(
			'iva_1' => 'I.V.A.',
			'iva_p_1' => 'I.V.A. %',
			'iva_2' => 'I.V.A.',
			'iva_p_2' => 'I.V.A. %',
			'iva_3' => 'I.V.A.',
			'iva_p_3' => 'I.V.A. %',	
			'iva_4' => 'I.V.A.',
			'iva_p_4' => 'I.V.A. %',	
			'iva_5' => 'I.V.A.',
			'iva_p_5' => 'I.V.A. %',	
			'iva_6' => 'I.V.A.',
			'iva_p_6' => 'I.V.A. %',
			'iva_7' => 'I.V.A.',
			'iva_p_7' => 'I.V.A. %',
			'iva_8' => 'I.V.A.',
			'iva_p_8' => 'I.V.A. %',
			'iva_9' => 'I.V.A.',
			'iva_p_9' => 'I.V.A. %',	
			'iva_10' => 'I.V.A.',
			'iva_p_10' => 'I.V.A. %',
			'iva2_1' => 'Otros Imp.',
			'iva2_p_1' => 'Otros Imp. %',
			'iva2_2' => 'Otros Imp.',
			'iva2_p_2' => 'Otros Imp. %',
			'iva2_3' => 'Otros Imp.',
			'iva2_p_3' => 'Otros Imp. %',	
			'iva2_4' => 'Otros Imp.',
			'iva2_p_4' => 'Otros Imp. %',	
			'iva2_5' => 'Otros Imp.',
			'iva2_p_5' => 'Otros Imp. %',	
			'iva2_6' => 'Otros Imp.',
			'iva2_p_6' => 'Otros Imp. %',
			'iva2_7' => 'Otros Imp.',
			'iva2_p_7' => 'Otros Imp. %',
			'iva2_8' => 'Otros Imp.',
			'iva2_p_8' => 'Otros Imp. %',
			'iva2_9' => 'Otros Imp.',
			'iva2_p_9' => 'Otros Imp. %',	
			'iva2_10' => 'Otros Imp.',
			'iva2_p_10' => 'Otros Imp. %'
		);
		
        public function __construct($db, $user_id, $invoice_id = 0, $proforma_id)
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

            $this->proforma = new DatabaseObject_Proforma($db);
            $this->proforma->loadForUser($this->user->getId(), $proforma_id);	
		
			if ($this->invoice->isSaved()) {
			
			$this->invoice_consecutive = $this->invoice->profile->invoice_consecutive;
			$this->invoice_number = $this->invoice->invoice_number;
			$this->invoice_date = $this->invoice->profile->invoice_date;
			$this->subtotal = $this->invoice->profile->subtotal;
			$this->discount = $this->invoice->profile->discount;
			$this->base = $this->invoice->profile->base;
			$this->retention = $this->invoice->profile->retention;
			$this->total = $this->invoice->profile->total;
			$this->recc = $this->invoice->profile->recc;
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
			$this->invoice_project = $this->invoice->profile->invoice_project;
			$this->project_id = $this->invoice->profile->project_id;
			$this->invoice_valid = $this->invoice->profile->invoice_valid;
			
			$this->currency  = $this->invoice->profile->currency;
			
			$this->transformed = $this->proforma->profile->transformed;
			
			foreach ($this->totalIva as $key => $label){
				$this->$key = $this-> invoice->profile->$key;
			}

        }		
		else
                	$this->invoice->user_id = $this->user->getId();
				$this->invoice->company_id = $this->company->getId();

		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
        		$this->invoice_consecutive = $this->proforma->profile->proforma_consecutive;
            $this->invoice->profile->invoice_consecutive = $this->invoice_consecutive;	

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
			
            $this->invoice_valid = $this->proforma->profile->proforma_valid;
            $this->invoice->profile->invoice_valid = $this->invoice_valid;

            $this->subtotal = $this->proforma->profile->subtotal;
            $this->invoice->profile->subtotal = $this->subtotal;
			
			$this->discount = $this->proforma->profile->discount;
			$this->invoice->profile->discount = $this->discount;
			
            $this->base = $this->proforma->profile->base;
            $this->invoice->profile->base = $this->base;
			
			$this->retention = $this->proforma->profile->retention;
			$this->invoice->profile->retention = $this->retention;
			
            $this->total = $this->proforma->profile->total;
            $this->invoice->profile->total = $this->total;

			$this->recc = $this->proforma->profile->recc;
            $this->invoice->profile->recc = $this->recc;
			
			$this->terms = $this->proforma->profile->terms;
            $this->invoice->profile->terms = $this->terms;
			
			$this->notes =  $this->proforma->profile->notes;
            $this->invoice->profile->notes = $this->notes;
			
            $this->thecompany = $this->proforma->profile->thecompany;
            $this->invoice->profile->thecompany = $this->thecompany;
			
			$this->company_id = $this->proforma->profile->company_id;
            $this->invoice->profile->company_id = $this->company_id;
			
			$this->original_company_id = $this->proforma->profile->original_company_id;
            $this->invoice->profile->original_company_id = $this->original_company_id;
			
			$this->original_company_address = $this->proforma->profile->original_company_address;
            $this->invoice->profile->original_company_address = $this->original_company_address;
			
			$this->invoice_contact = $this->proforma->profile->proforma_contact;
            $this->invoice->profile->invoice_contact = $this->invoice_contact;
			
			$this->contact_id = $this->proforma->profile->contact_id;
            $this->invoice->profile->contact_id = $this->contact_id;
			
			$this->contact_address = $this->proforma->profile->contact_address;
            $this->invoice->profile->contact_address = $this->contact_address;
			
			$this->invoice_project = $this->proforma->profile->proforma_project;
            $this->invoice->profile->invoice_project = $this->invoice_project;
			
			$this->project_id = $this->proforma->profile->project_id;
            $this->invoice->profile->project_id = $this->project_id;
			
			$this->currency = $this->proforma->profile->currency;
            $this->invoice->profile->currency = $this->currency;
			
			$this->start_letter = $this->company->profile->number_start_letter;
            $this->invoice->profile->start_letter = $this->start_letter;
			
			$this->number_zero = $this->default_number_zero;
            $this->invoice->profile->number_zero = $this->number_zero;
			
			$this->consecutive = $this->company->profile->consecutive;
            $this->invoice->profile->consecutive = $this->consecutive;
			
			foreach ($this->totalIva as $key => $label) {
			  if ($this->proforma->profile->$key){	
					$this->$key = $this->proforma->profile->$key;
					$this->invoice->profile->$key = $this->$key;
			  }
			}
         
			// if no errors have occurred, save the user
            if (!$this->hasError()) {

			$this->invoice->profile->invoice_consecutive = $this->invoice_consecutive;
			$this->invoice->invoice_number = $this->invoice_number;
			$this->invoice->profile->invoice_date = date("d-m-Y", strtotime($this->invoice_date));
			$this->invoice->profile->subtotal = $this->subtotal;
			$this->invoice->profile->discount = $this->discount;
			$this->invoice->profile->base = $this->base;
			$this->invoice->profile->retention = $this->retention;
			$this->invoice->profile->total = $this->total;
			$this->invoice->profile->recc = $this->recc;
			$this->invoice->profile->terms = $this->terms;
			$this->invoice->profile->notes = $this->notes;
			$this->invoice->profile->start_letter = $this->start_letter;
			$this->invoice->profile->number_zero = $this->number_zero;
			$this->invoice->profile->consecutive = $this->consecutive;
			$this->invoice->profile->thecompany = $this->thecompany;
			$this->invoice->profile->company_id = $this->company_id;
			$this->invoice->profile->original_company_id = $this->original_company_id;
			$this->invoice->profile->original_company_address = $this->original_company_address;
			$this->invoice->profile->invoice_contact = $this->invoice_contact;
			$this->invoice->profile->contact_id = $this->contact_id;
			$this->invoice->profile->contact_address = $this->contact_address;
			$this->invoice->profile->invoice_project = $this->invoice_project;
			$this->invoice->profile->project_id = $this->project_id;
			$this->invoice->profile->invoice_valid = $this->invoice_valid;
			
			$this->invoice->profile->currency = $this->currency;

			$this->invoice->save();
			
            $this->proforma->profile->published = 'yes';
            $this->proforma->profile->ts_published = date("Y-m-d");	
			$this->proforma->profile->transformed = 'yes';
			$this->proforma->save();

          }

		      // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>