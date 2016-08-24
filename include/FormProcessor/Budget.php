<?php
    class FormProcessor_Budget extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $budget = null;
		public $address = null;
		public $company = null;
		public $budget_company = null;
		public $ccompany = null;
		public $contact = null;
		public $project = null;
		public $item = null;
		public $items = array();
		public $image = null;
		protected $_uploadedFile;
		
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
		
        public function __construct($db, $user_id, $budget_id = 0, $company_id = 0, $contact_id = 0, $project_id = 0, $item_id = 0, $company_id2 = 0, $address_id = 0)
        {
            parent::__construct();

            $this->db = $db;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->budget_company = new DatabaseObject_BudgetCompany($db);
            $this->budget_company->loadForUser($this->user->getId(), $company_id2);
			
			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());
			
            $this->ccompany = new DatabaseObject_Ccompany($db);
			$this->ccompany->loadForUser($this->user->getId(), $company_id);
			$this->company_id_ = $company_id;
			
            $this->contact = new DatabaseObject_Contact($db);
            $this->contact->loadForUser($this->user->getId(), $contact_id);
			
            $this->project = new DatabaseObject_Project($db);
            $this->project->loadForUser($this->user->getId(), $project_id);
			$this->project_id_ = $project_id;
			
            $this->address = new DatabaseObject_Address($db);
            $this->address->loadForUser($this->user->getId(), $address_id);

			if ($item_id){
				if (!is_array($item_id))
                		$item_id = array($item_id);
			
				foreach ($item_id as $id){
            			$this->item_ = new DatabaseObject_Buditem($db);
            			$this->item_->loadForUser($this->user->getId(), $id);
					$this->items[] = $this->item_;
        			}
			}
			
            $this->budget = new DatabaseObject_Budget($db);
            $this->budget->loadForUser($this->user->getId(), $budget_id);	
			$this->budget_id_ = $budget_id;	
		
			if ($this->budget->isSaved()) {
			
			$this->budget_consecutive = $this->budget->profile->budget_consecutive;
			$this->budget_number = $this->budget->budget_number;
			$this->budget_date = $this->budget->profile->budget_date;
			$this->budget_valid = $this->budget->profile->budget_valid;
			$this->subtotal = $this->budget->profile->subtotal;
			$this->discount = $this->budget->profile->discount;
			$this->base = $this->budget->profile->base;
			$this->retention = $this->budget->profile->retention;
			$this->total = $this->budget->profile->total;
			$this->recc = $this->budget->profile->recc;
			$this->terms = $this->budget->profile->terms;
			$this->notes = $this->budget->profile->notes;
			$this->consecutive  = $this->budget->profile->consecutive;
			
			$this->thecompany = $this->budget->profile->thecompany;
			$this->company_id = $this->budget->profile->company_id;
			$this->original_company_id = $this->budget->profile->original_company_id;
			$this->original_company_address = $this->budget->profile->original_company_address;
			
			$this->budget_contact = $this->budget->profile->budget_contact;
			$this->contact_id = $this->budget->profile->contact_id;
			$this->contact_address = $this->budget->profile->contact_address;
			
			$this->budget_project = $this->budget->profile->budget_project;
			$this->project_id = $this->budget->profile->project_id;
			$this->published = $this->budget->profile->published;
			$this->ts_published = $this->budget->profile->ts_published;
			$this->budget_file = $this->budget->profile->budget_file;
			$this->currency = $this->budget->profile->currency;
			
			foreach ($this->totalIva as $key => $label){
				$this->$key = $this-> budget->profile->$key;
			}

        }		
		else
                	$this->budget->user_id = $this->user->getId();
				$this->budget->company_id = $this->company->getId();

		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
        		$this->budget_consecutive = $this->sanitize($request->getPost('budget_consecutive'));
            $this->budget->profile->budget_consecutive = $this->budget_consecutive;	
			
            $this->add_check = $this->sanitize($request->getPost('add_check'));
            if ($this->add_check == 'false'){
                $this->addError('add_check', 'Por favor especifica la empresa o persona a quien va dirigido el presupuesto');
			}

            $this->add_check2 = $this->sanitize($request->getPost('add_check2'));
            if ($this->add_check2 == 'false'){
                $this->addError('add_check2', 'Por favor incluye al menos un item en el presupuesto');
			}
			
            $this->budget_number = $this->sanitize($request->getPost('budget_number'));
            if (strlen($this->budget_number) == 0)
                $this->addError('budget_number', 'Por favor completa tu n&uacute;mero de presupuesto');
            else if (!$this->budget_id_)
				if ($this->budget->budgetExists($this->user->getId(), $this->budget_number)){
                		$this->addError('budget_number', 'Disculpa, el n&uacute;mero de presupuesto ya existe');
				}
			else
	           $this->budget->budget_number = $this->budget_number;
			
            $this->budget_date = $this->sanitize($request->getPost('budget_date'));
            if (strlen($this->budget_date) == 0)
                $this->addError('budget_date', 'Por favor introduce la fecha de emisi&oacute;n');
            else
                $this->company->profile->budget_date = $this->budget_date;	
	
        		$this->budget_valid = $request->getPost('budget_valid');
            if ($this->budget_valid)
				$this->budget->profile->budget_valid = $this->budget_valid;
            else
           	    $this->budget->profile->budget_valid = 0;
			
            $subtotal_ = $this->sanitize($request->getPost('subtotal'));
            if (strlen($subtotal_) == 0) {
                $this->addError('subtotal', 'Por favor define el subtotal del presupuesto');
			}
            else {
		    		$subtotal__ = str_replace('.', '', $subtotal_);
				$this->subtotal = str_replace(',', '.', $subtotal__);
                $this->budget->profile->subtotal = $this->subtotal;
			}
			
			$discount_ = $this->sanitize($request->getPost('discount'));
			$discount__ = str_replace('.', '', $discount_);
			$this->discount = str_replace(',', '.', $discount__);
            $this->budget->profile->discount = $this->discount;
			
            $base_ = $this->sanitize($request->getPost('base'));
            if (strlen($base_) == 0) {
                $this->addError('base', 'Por favor define la base imponible del presupuesto');
            }
            else {
			    $base__ = str_replace('.', '', $base_);
			    $this->base = str_replace(',', '.', $base__);
                $this->budget->profile->base = $this->base;
			}
			
			$retention_ = $this->sanitize($request->getPost('retention'));
			$retention__ = str_replace('.', '', $retention_);
			$this->retention = str_replace(',', '.', $retention__);
            $this->budget->profile->retention = $this->retention;
			
            $total_ = $this->sanitize($request->getPost('total'));
            if (strlen($total_) == 0) {
                $this->addError('total', 'Por favor define el monto total del presupuesto');
			}
            else {
			    $total__ = str_replace('.', '', $total_);
			    $this->total = str_replace(',', '.', $total__);
                $this->budget->profile->total = $this->total;
			}
			
			$this->recc = $this->sanitize($request->getPost('recc'));
            $this->budget->profile->recc = $this->recc;
			
			$this->terms = $this->sanitize($request->getPost('terms'));
            $this->budget->profile->terms = $this->terms;
			
			$this->notes = $this->sanitize($request->getPost('notes'));
            $this->budget->profile->notes = $this->notes;
			
            $this->thecompany = $this->sanitize($request->getPost('thecompany'));
            $this->budget->profile->thecompany = $this->thecompany;
			
			$this->company_id = $this->sanitize($request->getPost('company_id'));
            $this->budget->profile->company_id = $this->company_id;
			
			$this->original_company_id = $this->sanitize($request->getPost('original_company_id'));
            $this->budget->profile->original_company_id = $this->original_company_id;
			
			$this->original_company_address = $this->sanitize($request->getPost('original_company_address'));
            $this->budget->profile->original_company_address = $this->original_company_address;
			
			$this->budget_contact = $this->sanitize($request->getPost('budget_contact'));
            $this->budget->profile->budget_contact = $this->budget_contact;
			
			$this->contact_id = $this->sanitize($request->getPost('contact_id'));
            $this->budget->profile->contact_id = $this->contact_id;
			
			$this->contact_address = $this->sanitize($request->getPost('contact_address'));
            $this->budget->profile->contact_address = $this->contact_address;
			
			$this->budget_project = $this->sanitize($request->getPost('budget_project'));
            $this->budget->profile->budget_project = $this->budget_project;
			
			$this->project_id = $this->sanitize($request->getPost('project_id'));
            $this->budget->profile->project_id = $this->project_id;
			
			$this->consecutive = $this->sanitize($request->getPost('consecutive'));
            $this->budget->profile->consecutive = $this->consecutive;
			
			$this->currency = $this->sanitize($request->getPost('currency'));
            $this->budget->profile->currency = $this->currency;
			
			foreach ($this->totalIva as $key => $label) {
			  if ($request->getPost($key)){
			 		$iva_var_ = $this->sanitize($request->getPost($key));
					$iva_var__ = str_replace('.', '', $iva_var_);
					$this->$key = str_replace(',', '.', $iva_var__);
            			$this->budget->profile->$key = $this->$key;
			  }
			}
         
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
			
			$this->budget->profile->budget_consecutive = $this->budget_consecutive;
			$this->budget->budget_number = $this->budget_number;
			$this->budget->profile->budget_date = date("d-m-Y", strtotime($this->budget_date));
			$this->budget->profile->budget_valid = $this->budget_valid;
			$this->budget->profile->subtotal = $this->subtotal;
			$this->budget->profile->discount = $this->discount;
			$this->budget->profile->base = $this->base;
			$this->budget->profile->retention = $this->retention;
			$this->budget->profile->total = $this->total;
			$this->budget->profile->recc = $this->recc;
			$this->budget->profile->terms = $this->terms;
			$this->budget->profile->notes = $this->notes;
			$this->budget->profile->budget_contact = $this->budget_contact;
			$this->budget->profile->consecutive = $this->consecutive;
			$this->budget->profile->original_company_id = $this->original_company_id;
			$this->budget->profile->original_company_address = $this->original_company_address;
			$this->budget->profile->company_id = $this->company_id;
			$this->budget->profile->currency = $this->currency;
			
			$this->budget->save();

			if (!$this->original_company_id){
				if ($this->company_id_){
					$this->ccompany->user_id = $this->user->getId();
					$this->ccompany->comp_doc_type =	'budget';			
					$this->ccompany->contact_id = $this->budget->getId();
					$this->ccompany->save();
				}
			}
			
			if ($this->company_id){
				$this->budget_company->user_id = $this->user->getId();		
				$this->budget_company->document_id = $this->budget->getId();
				$this->budget_company->save();
			}
			
			if ($this->budget_project){	
				if (!$this->project_id_){
						$this->project->user_id = $this->user->getId();
						$this->project->project_title =	$this->budget_project;			
						$this->project->save();

						$this->budget->profile->budget_project = $this->budget_project;
						$this->budget->profile->project_id = $this->project->getId();
						$this->budget->save();
				}
			}
			
			if ($this->items){
				$i=0;
					$item_ids = array();
					foreach ($this->items as $item) {
						$this->items[$i]->user_id = $this->user->getId();
						$this->items[$i]->company_id = $this->company->getId();
						$this->items[$i]->document_type = 'budget';
						$this->items[$i]->document_id = $this->budget->getId();
					 	$this->items[$i]->save();
						if ($item->getId()) {
							$item_ids [$i] = $this->items[$i]->getId();
						}
						$i++;
					}

				$this->budget->profile->items = base64_encode(serialize($item_ids));
				
				$this->budget->save();
			}

          }

		      // return true if no errors have occurred
            return !$this->hasError();
        }
  		protected function cleanHtml($html)
        {
            $chain = new Zend_Filter();
            $chain->addFilter(new Zend_Filter_StripTags(self::$tags));
            $chain->addFilter(new Zend_Filter_StringTrim());

            $html = $chain->filter($html);

            $tmp = $html;
            while (1) {
                // Try and replace an occurrence of javascript:
                $html = preg_replace('/(<[^>]*)javascript:([^>]*>)/i',
                                     '$1$2',
                                     $html);

                // If nothing changed this iteration then break the loop
                if ($html == $tmp)
                    break;

                $tmp = $html;
            }

            return $html;
        }
    }
?>