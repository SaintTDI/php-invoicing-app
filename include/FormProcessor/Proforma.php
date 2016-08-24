<?php
    class FormProcessor_Proforma extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $proforma = null;
		public $address = null;
		public $company = null;
		public $proforma_company = null;
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
		
        public function __construct($db, $user_id, $proforma_id = 0, $company_id = 0, $contact_id = 0, $project_id = 0, $item_id = 0, $company_id2 = 0, $address_id = 0)
        {
            parent::__construct();

            $this->db = $db;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->proforma_company = new DatabaseObject_ProformaCompany($db);
            $this->proforma_company->loadForUser($this->user->getId(), $company_id2);
			
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
            			$this->item_ = new DatabaseObject_Proitem($db);
            			$this->item_->loadForUser($this->user->getId(), $id);
					$this->items[] = $this->item_;
        			}
			}
			
            $this->proforma = new DatabaseObject_Proforma($db);
            $this->proforma->loadForUser($this->user->getId(), $proforma_id);	
			$this->proforma_id_ = $proforma_id;	
		
			if ($this->proforma->isSaved()) {
			
			$this->proforma_consecutive = $this->proforma->profile->proforma_consecutive;
			$this->proforma_number = $this->proforma->proforma_number;
			$this->proforma_date = $this->proforma->profile->proforma_date;
			$this->proforma_valid = $this->proforma->profile->proforma_valid;
			$this->subtotal = $this->proforma->profile->subtotal;
			$this->discount = $this->proforma->profile->discount;
			$this->base = $this->proforma->profile->base;
			$this->retention = $this->proforma->profile->retention;
			$this->total = $this->proforma->profile->total;
			$this->recc = $this->proforma->profile->recc;
			$this->terms = $this->proforma->profile->terms;
			$this->notes = $this->proforma->profile->notes;
			$this->consecutive  = $this->proforma->profile->consecutive;
			
			$this->thecompany = $this->proforma->profile->thecompany;
			$this->company_id = $this->proforma->profile->company_id;
			$this->original_company_id = $this->proforma->profile->original_company_id;
			$this->original_company_address = $this->proforma->profile->original_company_address;
			
			$this->proforma_contact = $this->proforma->profile->proforma_contact;
			$this->contact_id = $this->proforma->profile->contact_id;
			$this->contact_address = $this->proforma->profile->contact_address;
			
			$this->proforma_project = $this->proforma->profile->proforma_project;
			$this->project_id = $this->proforma->profile->project_id;
			$this->published = $this->proforma->profile->published;
			$this->ts_published = $this->proforma->profile->ts_published;
			$this->proforma_file = $this->proforma->profile->proforma_file;
			$this->currency = $this->proforma->profile->currency;
			
			foreach ($this->totalIva as $key => $label){
				$this->$key = $this-> proforma->profile->$key;
			}

        }		
		else
                	$this->proforma->user_id = $this->user->getId();
				$this->proforma->company_id = $this->company->getId();

		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
        		$this->proforma_consecutive = $this->sanitize($request->getPost('proforma_consecutive'));
            $this->proforma->profile->proforma_consecutive = $this->proforma_consecutive;
			
           $this->add_check = $this->sanitize($request->getPost('add_check'));
            if ($this->add_check == 'false'){
                $this->addError('add_check', 'Por favor especifica la empresa o persona a quien va dirigida la Pro-Forma');
			}

            $this->add_check2 = $this->sanitize($request->getPost('add_check2'));
            if ($this->add_check2 == 'false'){
                $this->addError('add_check2', 'Por favor incluye al menos un item en la factura-Pro-Forma');
			}
	
			
            $this->proforma_number = $this->sanitize($request->getPost('proforma_number'));
            if (strlen($this->proforma_number) == 0)
                $this->addError('proforma_number', 'Por favor introduce tu n&uacute;mero de factura Pro-Forma');
			else if (!$this->proforma_id_)
            		if ($this->proforma->proformaExists($this->user->getId(), $this->proforma_number)){
                		$this->addError('proforma_number', 'Disculpa, el n&uacute;mero de factura Pro-Forma ya existe');
				}
            else
                $this->proforma->proforma_number = $this->proforma_number;
			
            $this->proforma_date = $this->sanitize($request->getPost('proforma_date'));
            if (strlen($this->proforma_date) == 0)
                $this->addError('proforma_date', 'Por favor introduce la fecha de emisi&oacute;n');
            else
                $this->company->profile->proforma_date = $this->proforma_date;	
	
        		$this->proforma_valid = $request->getPost('proforma_valid');
            if ($this->proforma_valid)
				$this->proforma->profile->proforma_valid = $this->proforma_valid;
            else
           	    $this->proforma->profile->proforma_valid = 0;
			
            $subtotal_ = $this->sanitize($request->getPost('subtotal'));
            if (strlen($subtotal_) == 0) {
                $this->addError('subtotal', 'Por favor define el subtotal de la factura Pro-Forma');
			}
            else {
		    		$subtotal__ = str_replace('.', '', $subtotal_);
				$this->subtotal = str_replace(',', '.', $subtotal__);
                $this->proforma->profile->subtotal = $this->subtotal;
			}
			
			$discount_ = $this->sanitize($request->getPost('discount'));
			$discount__ = str_replace('.', '', $discount_);
			$this->discount = str_replace(',', '.', $discount__);
            $this->proforma->profile->discount = $this->discount;
			
            $base_ = $this->sanitize($request->getPost('base'));
            if (strlen($base_) == 0) {
                $this->addError('base', 'Por favor define la base imponible de la factura Pro-Forma');
            }
            else {
			    $base__ = str_replace('.', '', $base_);
			    $this->base = str_replace(',', '.', $base__);
                $this->proforma->profile->base = $this->base;
			}
			
			$retention_ = $this->sanitize($request->getPost('retention'));
			$retention__ = str_replace('.', '', $retention_);
			$this->retention = str_replace(',', '.', $retention__);
            $this->proforma->profile->retention = $this->retention;
			
            $total_ = $this->sanitize($request->getPost('total'));
            if (strlen($total_) == 0) {
                $this->addError('total', 'Por favor define el monto total de la factura Pro-Forma');
			}
            else {
			    $total__ = str_replace('.', '', $total_);
			    $this->total = str_replace(',', '.', $total__);
                $this->proforma->profile->total = $this->total;
			}
			
			$this->recc = $this->sanitize($request->getPost('recc'));
            $this->proforma->profile->recc = $this->recc;
			
			$this->terms = $this->sanitize($request->getPost('terms'));
            $this->proforma->profile->terms = $this->terms;
			
			$this->notes = $this->sanitize($request->getPost('notes'));
            $this->proforma->profile->notes = $this->notes;
			
            $this->thecompany = $this->sanitize($request->getPost('thecompany'));
            $this->proforma->profile->thecompany = $this->thecompany;
			
			$this->company_id = $this->sanitize($request->getPost('company_id'));
            $this->proforma->profile->company_id = $this->company_id;
			
			$this->original_company_id = $this->sanitize($request->getPost('original_company_id'));
            $this->proforma->profile->original_company_id = $this->original_company_id;
			
			$this->original_company_address = $this->sanitize($request->getPost('original_company_address'));
            $this->proforma->profile->original_company_address = $this->original_company_address;
			
			$this->proforma_contact = $this->sanitize($request->getPost('proforma_contact'));
            $this->proforma->profile->proforma_contact = $this->proforma_contact;
			
			$this->contact_id = $this->sanitize($request->getPost('contact_id'));
            $this->proforma->profile->contact_id = $this->contact_id;
			
			$this->contact_address = $this->sanitize($request->getPost('contact_address'));
            $this->proforma->profile->contact_address = $this->contact_address;
			
			$this->proforma_project = $this->sanitize($request->getPost('proforma_project'));
            $this->proforma->profile->proforma_project = $this->proforma_project;
			
			$this->project_id = $this->sanitize($request->getPost('project_id'));
            $this->proforma->profile->project_id = $this->project_id;
			
			$this->consecutive = $this->sanitize($request->getPost('consecutive'));
            $this->proforma->profile->consecutive = $this->consecutive;
			
			$this->currency = $this->sanitize($request->getPost('currency'));
            $this->proforma->profile->currency = $this->currency;
			
			foreach ($this->totalIva as $key => $label) {
			  if ($request->getPost($key)){
			 		$iva_var_ = $this->sanitize($request->getPost($key));
					$iva_var__ = str_replace('.', '', $iva_var_);
					$this->$key = str_replace(',', '.', $iva_var__);
            			$this->proforma->profile->$key = $this->$key;
			  }
			}
         
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
			
			$this->proforma->profile->proforma_consecutive = $this->proforma_consecutive;
			$this->proforma->proforma_number = $this->proforma_number;
			$this->proforma->profile->proforma_date = date("d-m-Y", strtotime($this->proforma_date));
			$this->proforma->profile->proforma_valid = $this->proforma_valid;
			$this->proforma->profile->subtotal = $this->subtotal;
			$this->proforma->profile->discount = $this->discount;
			$this->proforma->profile->base = $this->base;
			$this->proforma->profile->retention = $this->retention;
			$this->proforma->profile->total = $this->total;
			$this->proforma->profile->recc = $this->recc;
			$this->proforma->profile->terms = $this->terms;
			$this->proforma->profile->notes = $this->notes;
			$this->proforma->profile->proforma_contact = $this->proforma_contact;
			$this->proforma->profile->consecutive = $this->consecutive;
			$this->proforma->profile->original_company_id = $this->original_company_id;
			$this->proforma->profile->original_company_address = $this->original_company_address;
			$this->proforma->profile->company_id = $this->company_id;
			$this->proforma->profile->currency = $this->currency;
			
			$this->proforma->save();

			if (!$this->original_company_id){
				if ($this->company_id_){
					$this->ccompany->user_id = $this->user->getId();
					$this->ccompany->comp_doc_type =	'proforma';			
					$this->ccompany->contact_id = $this->proforma->getId();
					$this->ccompany->save();
				}
			}
			
			if ($this->company_id){
				$this->proforma_company->user_id = $this->user->getId();		
				$this->proforma_company->document_id = $this->proforma->getId();
				$this->proforma_company->save();
			}
			
			if ($this->proforma_project){	
				if (!$this->project_id_){
						$this->project->user_id = $this->user->getId();
						$this->project->project_title =	$this->proforma_project;			
						$this->project->save();

						$this->proforma->profile->proforma_project = $this->proforma_project;
						$this->proforma->profile->project_id = $this->project->getId();
						$this->proforma->save();
				}
			}
			
			if ($this->items){
				$i=0;
					$item_ids = array();
					foreach ($this->items as $item) {
						$this->items[$i]->user_id = $this->user->getId();
						$this->items[$i]->company_id = $this->company->getId();
						$this->items[$i]->document_type = 'proforma';
						$this->items[$i]->document_id = $this->proforma->getId();
					 	$this->items[$i]->save();
						if ($item->getId()) {
							$item_ids [$i] = $this->items[$i]->getId();
						}
						$i++;
					}

				$this->proforma->profile->items = base64_encode(serialize($item_ids));
				
				$this->proforma->save();
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