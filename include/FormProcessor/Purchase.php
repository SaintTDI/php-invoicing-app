<?php
    class FormProcessor_Purchase extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $purchase = null;
		public $address = null;
		public $company = null;
		public $purchase_company = null;
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
		
        public function __construct($db, $user_id, $purchase_id = 0, $company_id = 0, $contact_id = 0, $project_id = 0, $item_id = 0, $company_id2 = 0, $address_id = 0)
        {
            parent::__construct();

            $this->db = $db;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->purchase_company = new DatabaseObject_PurchaseCompany($db);
            $this->purchase_company->loadForUser($this->user->getId(), $company_id2);
			
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
            			$this->item_ = new DatabaseObject_Puritem($db);
            			$this->item_->loadForUser($this->user->getId(), $id);
					$this->items[] = $this->item_;
        			}
			}
			
            $this->purchase = new DatabaseObject_Purchase($db);
            $this->purchase->loadForUser($this->user->getId(), $purchase_id);	
			$this->purchase_id_ = $purchase_id;	
		
			if ($this->purchase->isSaved()) {
			
			$this->purchase_consecutive = $this->purchase->profile->purchase_consecutive;
			$this->purchase_number = $this->purchase->purchase_number;
			$this->purchase_date = $this->purchase->profile->purchase_date;
			$this->purchase_valid = $this->purchase->profile->purchase_valid;
			$this->purchase_frequency = $this->purchase->profile->purchase_frequency;
			$this->subtotal = $this->purchase->profile->subtotal;
			$this->discount = $this->purchase->profile->discount;
			$this->base = $this->purchase->profile->base;
			$this->retention = $this->purchase->profile->retention;
			$this->total = $this->purchase->profile->total;
			$this->budget_number = $this->purchase->profile->budget_number;
			$this->purchase_copy = $this->purchase->profile->purchase_copy;
			$this->terms = $this->purchase->profile->terms;
			$this->notes = $this->purchase->profile->notes;
			
			$this->thecompany = $this->purchase->profile->thecompany;
			$this->company_id = $this->purchase->profile->company_id;
			$this->original_company_id = $this->purchase->profile->original_company_id;
			$this->original_company_address = $this->purchase->profile->original_company_address;
			
			$this->purchase_contact = $this->purchase->profile->purchase_contact;
			$this->contact_id = $this->purchase->profile->contact_id;
			$this->contact_address = $this->purchase->profile->contact_address;
			
			$this->purchase_project = $this->purchase->profile->purchase_project;
			$this->project_id = $this->purchase->profile->project_id;
			$this->published = $this->purchase->profile->published;
			$this->ts_published = $this->purchase->profile->ts_published;
			$this->purchase_file = $this->purchase->profile->purchase_file;
			$this->currency = $this->purchase->profile->currency;
			$this->recc = $this->purchase->profile->recc;
			
			foreach ($this->totalIva as $key => $label){
				$this->$key = $this-> purchase->profile->$key;
			}

        }		
		else
                	$this->purchase->user_id = $this->user->getId();
				$this->purchase->company_id = $this->company->getId();

		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
        		$this->purchase_consecutive = $this->sanitize($request->getPost('purchase_consecutive'));
            $this->purchase->profile->purchase_consecutive = $this->purchase_consecutive;	
			
            $this->add_check = $this->sanitize($request->getPost('add_check'));
            if ($this->add_check == 'false'){
                $this->addError('add_check', 'Por favor especifica el proveedor');
			}

            $this->add_check2 = $this->sanitize($request->getPost('add_check2'));
            if ($this->add_check2 == 'false'){
                $this->addError('add_check2', 'Por favor incluye al menos un item en la Orden de Compra');
			}
			
            $this->purchase_number = $this->sanitize($request->getPost('purchase_number'));
            if (strlen($this->purchase_number) == 0)
                $this->addError('purchase_number', 'Por favor introduce tu n&uacute;mero de orden de compra');
			else if (!$this->purchase_id_)
          		if ($this->purchase->purchaseExists($this->user->getId(), $this->purchase_number)){
                	$this->addError('purchase_number', 'Disculpa, el n&uacute;mero de Orden de Compra ya existe');
				}
            else
                $this->purchase->purchase_number = $this->purchase_number;
			
            $this->purchase_date = $this->sanitize($request->getPost('purchase_date'));
            if (strlen($this->purchase_date) == 0)
                $this->addError('purchase_date', 'Por favor introduce la fecha de emisi&oacute;n');
            else
                $this->company->profile->purchase_date = $this->purchase_date;	
	
        		$this->purchase_valid = $request->getPost('purchase_valid');
            if ($this->purchase_valid)
				$this->purchase->profile->purchase_valid = $this->purchase_valid;
            else
           	    $this->purchase->profile->purchase_valid = 0;

            $this->purchase_frequency = $this->sanitize($request->getPost('purchase_frequency'));
            if (strlen($this->purchase_frequency) == 0)
                $this->addError('purchase_frequency', 'Por favor escoge la frecuencia de la orden de compra');
            else
                $this->purchase->profile->purchase_frequency = $this->purchase_frequency;
			
            $subtotal_ = $this->sanitize($request->getPost('subtotal'));
            if (strlen($subtotal_) == 0) {
                $this->addError('subtotal', 'Por favor define el subtotal del orden de compra');
			}
            else {
		    		$subtotal__ = str_replace('.', '', $subtotal_);
				$this->subtotal = str_replace(',', '.', $subtotal__);
                $this->purchase->profile->subtotal = $this->subtotal;
			}
			
			$discount_ = $this->sanitize($request->getPost('discount'));
			$discount__ = str_replace('.', '', $discount_);
			$this->discount = str_replace(',', '.', $discount__);
            $this->purchase->profile->discount = $this->discount;
			
            $base_ = $this->sanitize($request->getPost('base'));
            if (strlen($base_) == 0) {
                $this->addError('base', 'Por favor define la base imponible de la orden de compra');
            }
            else {
			    $base__ = str_replace('.', '', $base_);
			    $this->base = str_replace(',', '.', $base__);
                $this->purchase->profile->base = $this->base;
			}
			
			$retention_ = $this->sanitize($request->getPost('retention'));
			$retention__ = str_replace('.', '', $retention_);
			$this->retention = str_replace(',', '.', $retention__);
            $this->purchase->profile->retention = $this->retention;
			
            $total_ = $this->sanitize($request->getPost('total'));
            if (strlen($total_) == 0) {
                $this->addError('total', 'Por favor define el monto total de la orden de compra');
			}
            else {
			    $total__ = str_replace('.', '', $total_);
			    $this->total = str_replace(',', '.', $total__);
                $this->purchase->profile->total = $this->total;
			}
			
			$this->budget_number = $this->sanitize($request->getPost('budget_number'));
            $this->purchase->profile->budget_number = $this->budget_number;
			
			$this->purchase_copy = $this->sanitize($request->getPost('purchase_copy'));
            $this->purchase->profile->purchase_copy = $this->purchase_copy;
			
			$this->terms = $this->sanitize($request->getPost('terms'));
            $this->purchase->profile->terms = $this->terms;
			
			$this->notes = $this->sanitize($request->getPost('notes'));
            $this->purchase->profile->notes = $this->notes;
			
            $this->thecompany = $this->sanitize($request->getPost('thecompany'));
            $this->purchase->profile->thecompany = $this->thecompany;
			
			$this->company_id = $this->sanitize($request->getPost('company_id'));
            $this->purchase->profile->company_id = $this->company_id;
			
			$this->original_company_id = $this->sanitize($request->getPost('original_company_id'));
            $this->purchase->profile->original_company_id = $this->original_company_id;
			
			$this->original_company_address = $this->sanitize($request->getPost('original_company_address'));
            $this->purchase->profile->original_company_address = $this->original_company_address;
			
			$this->purchase_contact = $this->sanitize($request->getPost('purchase_contact'));
            $this->purchase->profile->purchase_contact = $this->purchase_contact;
			
			$this->contact_id = $this->sanitize($request->getPost('contact_id'));
            $this->purchase->profile->contact_id = $this->contact_id;
			
			$this->contact_address = $this->sanitize($request->getPost('contact_address'));
            $this->purchase->profile->contact_address = $this->contact_address;
			
			$this->purchase_project = $this->sanitize($request->getPost('purchase_project'));
            $this->purchase->profile->purchase_project = $this->purchase_project;
			
			$this->project_id = $this->sanitize($request->getPost('project_id'));
            $this->purchase->profile->project_id = $this->project_id;
			
			$this->currency = $this->sanitize($request->getPost('currency'));
            $this->purchase->profile->currency = $this->currency;
			
			$this->recc = $this->sanitize($request->getPost('recc'));
            $this->purchase->profile->recc = $this->recc;
			
			foreach ($this->totalIva as $key => $label) {
			  if ($request->getPost($key)){
			 		$iva_var_ = $this->sanitize($request->getPost($key));
					$iva_var__ = str_replace('.', '', $iva_var_);
					$this->$key = str_replace(',', '.', $iva_var__);
            			$this->purchase->profile->$key = $this->$key;
			  }
			}
         
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
			
			$this->purchase->profile->purchase_consecutive = $this->purchase_consecutive;
			$this->purchase->purchase_number = $this->purchase_number;
			$this->purchase->profile->purchase_date = date("d-m-Y", strtotime($this->purchase_date));
			$this->purchase->profile->purchase_valid = $this->purchase_valid;
			$this->purchase->profile->purchase_frequency = $this->purchase_frequency;
			$this->purchase->profile->subtotal = $this->subtotal;
			$this->purchase->profile->discount = $this->discount;
			$this->purchase->profile->base = $this->base;
			$this->purchase->profile->retention = $this->retention;
			$this->purchase->profile->total = $this->total;
			$this->purchase->profile->budget_number = $this->budget_number;
			$this->purchase->profile->purchase_copy = $this->purchase_copy;
			$this->purchase->profile->terms = $this->terms;
			$this->purchase->profile->notes = $this->notes;
			$this->purchase->profile->purchase_contact = $this->purchase_contact;
			$this->purchase->profile->original_company_id = $this->original_company_id;
			$this->purchase->profile->original_company_address = $this->original_company_address;
			$this->purchase->profile->company_id = $this->company_id;
			$this->purchase->profile->currency = $this->currency;
			$this->purchase->profile->recc = $this->recc;
			
			$this->purchase->save();

			if (!$this->original_company_id){
				if ($this->company_id_){
					$this->ccompany->user_id = $this->user->getId();
					$this->ccompany->comp_doc_type =	'purchase';			
					$this->ccompany->contact_id = $this->purchase->getId();
					$this->ccompany->save();
				}
			}
			
			if ($this->company_id){
				$this->purchase_company->user_id = $this->user->getId();		
				$this->purchase_company->document_id = $this->purchase->getId();
				$this->purchase_company->save();
			}
			
			if ($this->purchase_project){	
				if (!$this->project_id_){
						$this->project->user_id = $this->user->getId();
						$this->project->project_title =	$this->purchase_project;			
						$this->project->save();

						$this->purchase->profile->purchase_project = $this->purchase_project;
						$this->purchase->profile->project_id = $this->project->getId();
						$this->purchase->save();
				}
			}
			
			if ($this->items){
				$i=0;
					$item_ids = array();
					foreach ($this->items as $item) {
						$this->items[$i]->user_id = $this->user->getId();
						$this->items[$i]->company_id = $this->company->getId();
						$this->items[$i]->document_type = 'purchase';
						$this->items[$i]->document_id = $this->purchase->getId();
					 	$this->items[$i]->save();
						if ($item->getId()) {
							$item_ids [$i] = $this->items[$i]->getId();
						}
						$i++;
					}

				$this->purchase->profile->items = base64_encode(serialize($item_ids));
				
				$this->purchase->save();
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