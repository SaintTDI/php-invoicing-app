<?php
    class FormProcessor_PurExpense extends FormProcessor
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
		
        public function __construct($db, $user_id, $expense_id = 0, $purchase_id)
        {
            parent::__construct();

            $this->db = $db;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);

			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());

			$expensecount = DatabaseObject_Expense::GetExpensesDocId(
                $db,
                array('user_id' => $this->user->getId(),
					  'company_id' =>  $this->company->getId())
            );
			
            $this->expensecount = $expensecount;
			
			if (!$this->expensecount){
				$this->expensecount = 0;
			}
			
            $this->expense = new DatabaseObject_Expense($db);
            $this->expense->loadForUser($this->user->getId(), $expense_id);

            $this->purchase = new DatabaseObject_Purchase($db);
            $this->purchase->loadForUser($this->user->getId(), $purchase_id);	
		
			if ($this->expense->isSaved()) {
			
			$this->expense_consecutive = $this->expense->profile->expense_consecutive;
			$this->expense_number = $this->expense->expense_number;
			$this->expense_date = $this->expense->profile->expense_date;
			$this->expense_valid = $this->expense->profile->expense_valid;
			$this->subtotal = $this->expense->profile->subtotal;
			$this->discount = $this->expense->profile->discount;
			$this->base = $this->expense->profile->base;
			$this->retention = $this->expense->profile->retention;
			$this->total = $this->expense->profile->total;
			$this->recc = $this->expense->profile->recc;
			$this->notes = $this->expense->profile->notes;
			$this->terms = $this->expense->profile->terms;
			
			$this->thecompany = $this->expense->profile->thecompany;
			$this->company_id = $this->expense->profile->company_id;
			$this->original_company_id = $this->expense->profile->original_company_id;
			$this->original_company_address = $this->expense->profile->original_company_address;
			
			$this->expense_contact = $this->expense->profile->expense_contact;
			$this->contact_id = $this->expense->profile->contact_id;
			$this->contact_address = $this->expense->profile->contact_address;
			
			$this->expense_project = $this->expense->profile->expense_project;
			$this->project_id = $this->expense->profile->project_id;
			
			$this->invoice_number  = $this->expense->profile->invoice_number;
			
			$this->currency  = $this->expense->profile->currency;
			
			$this->expense_type  = $this->expense->profile->expense_type;
			
			$this->transformed = $this->purchase->profile->transformed;
			
			foreach ($this->totalIva as $key => $label){
				$this->$key = $this-> expense->profile->$key;
			}
			

        }		
		else
                	$this->expense->user_id = $this->user->getId();
				$this->expense->company_id = $this->company->getId();

		}

        public function process(Zend_Controller_Request_Abstract $request)
        {

        		$this->expense_consecutive = $this->purchase->profile->purchase_consecutive;
            $this->expense->profile->expense_consecutive = $this->expense_consecutive;	

			$tot_ = $this->expensecount + 1;
            $this->expense_number = $tot_;

			if (!$this->expense_number){
				$this->expense_number = 1;
			}
			
            $this->expense->expense_number = $this->expense_number;
			
			$now_ = date("d-m-Y");
			
            $this->expense_date = $now_;
            $this->expense->profile->expense_date =  $this->expense_date;

            $this->expense_valid = $this->purchase->profile->purchase_valid;
            $this->expense->profile->expense_valid = $this->expense_valid;
			
            $this->subtotal = $this->purchase->profile->subtotal;
            $this->expense->profile->subtotal = $this->subtotal;
			
			$this->discount = $this->purchase->profile->discount;
			$this->expense->profile->discount = $this->discount;
			
            $this->base = $this->purchase->profile->base;
            $this->expense->profile->base = $this->base;
			
			$this->retention = $this->purchase->profile->retention;
			$this->expense->profile->retention = $this->retention;
			
            $this->total = $this->purchase->profile->total;
            $this->expense->profile->total = $this->total;

			$this->recc = $this->purchase->profile->recc;
            $this->expense->profile->recc = $this->recc;
			
			$this->notes =  $this->purchase->profile->notes;
            $this->expense->profile->notes = $this->notes;
			
			$this->terms = $this->purchase->profile->terms;
            $this->expense->profile->terms = $this->terms;

			$this->invoice_number = $this->purchase->profile->budget_number;
            $this->expense->profile->invoice_number = $this->invoice_number;
			
            $this->thecompany = $this->purchase->profile->thecompany;
            $this->expense->profile->thecompany = $this->thecompany;
			
			$this->company_id = $this->purchase->profile->company_id;
            $this->expense->profile->company_id = $this->company_id;
			
			$this->original_company_id = $this->purchase->profile->original_company_id;
            $this->expense->profile->original_company_id = $this->original_company_id;
			
			$this->original_company_address = $this->purchase->profile->original_company_address;
            $this->expense->profile->original_company_address = $this->original_company_address;
			
			$this->expense_contact = $this->purchase->profile->purchase_contact;
            $this->expense->profile->expense_contact = $this->expense_contact;
			
			$this->contact_id = $this->purchase->profile->contact_id;
            $this->expense->profile->contact_id = $this->contact_id;
			
			$this->contact_address = $this->purchase->profile->contact_address;
            $this->expense->profile->contact_address = $this->contact_address;
			
			$this->currency = $this->purchase->profile->currency;
            $this->expense->profile->currency = $this->currency;
			
			$this->expense_project = $this->purchase->profile->purchase_project;
            $this->expense->profile->expense_project = $this->expense_project;
			
			$this->project_id = $this->purchase->profile->project_id;
            $this->expense->profile->project_id = $this->project_id;
			
			$this->expense_type = 'Gastos Varios';
            $this->expense->profile->expense_type = $this->expense_type;
			
			foreach ($this->totalIva as $key => $label) {
			  if ($this->purchase->profile->$key){	
					$this->$key = $this->purchase->profile->$key;
					$this->expense->profile->$key = $this->$key;
			  }
			}
         
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
			
			$this->expense->profile->expense_consecutive = $this->expense_consecutive;
			$this->expense->expense_number = $this->expense_number;
			$this->expense->profile->expense_date = date("d-m-Y", strtotime($this->expense_date));
			$this->expense->profile->expense_valid = $this->expense_valid;
			$this->expense->profile->subtotal = $this->subtotal;
			$this->expense->profile->discount = $this->discount;
			$this->expense->profile->base = $this->base;
			$this->expense->profile->retention = $this->retention;
			$this->expense->profile->total = $this->total;
			$this->expense->profile->recc = $this->recc;
			$this->expense->profile->notes = $this->notes;
			$this->expense->profile->terms = $this->terms;
			
			$this->expense->profile->thecompany = $this->thecompany;
			$this->expense->profile->company_id = $this->company_id;
			$this->expense->profile->original_company_id = $this->original_company_id;
			$this->expense->profile->original_company_address = $this->original_company_address;
			
			$this->expense->profile->expense_contact = $this->expense_contact;
			$this->expense->profile->contact_id = $this->contact_id;
			$this->expense->profile->contact_address = $this->contact_address;
			
			$this->expense->profile->expense_project = $this->expense_project;
			$this->expense->profile->project_id = $this->project_id;
			
			$this->expense->profile->invoice_number = $this->invoice_number;
			
			$this->expense->profile->currency = $this->currency;
			
			$this->expense->profile->expense_type = $this->expense_type;
			
			$this->expense->save();
			
            $this->purchase->profile->published = 'yes';
            $this->purchase->profile->ts_published = date("Y-m-d");
			$this->purchase->profile->transformed = 'yes';
			$this->purchase->save();

          }

		      // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>