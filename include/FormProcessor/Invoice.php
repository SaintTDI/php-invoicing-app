<?php
    class FormProcessor_Invoice extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $invoice = null;
		public $address = null;
		public $company = null;
		public $invoice_company = null;
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
		
        public function __construct($db, $user_id, $invoice_id = 0, $company_id = 0, $contact_id = 0, $project_id = 0, $item_id = 0, $company_id2 = 0, $address_id = 0)
        {
            parent::__construct();

            $this->db = $db;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->invoice_company = new DatabaseObject_InvoiceCompany($db);
            $this->invoice_company->loadForUser($this->user->getId(), $company_id2);
			
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
            			$this->item_ = new DatabaseObject_Item($db);
            			$this->item_->loadForUser($this->user->getId(), $id);
					$this->items[] = $this->item_;
        			}
			}
			
            $this->invoice = new DatabaseObject_Invoice($db);
            $this->invoice->loadForUser($this->user->getId(), $invoice_id);
			$this->invoice_id_ = $invoice_id;		
		
			if ($this->invoice->isSaved()) {
			
			$this->invoice_consecutive = $this->invoice->profile->invoice_consecutive;
			$this->invoice_number = $this->invoice->invoice_number;
			$this->invoice_date = $this->invoice->profile->invoice_date;
			$this->invoice_valid = $this->invoice->profile->invoice_valid;
			$this->invoice_frequency = $this->invoice->profile->invoice_frequency;
			$this->subtotal = $this->invoice->profile->subtotal;
			$this->discount = $this->invoice->profile->discount;
			$this->base = $this->invoice->profile->base;
			$this->retention = $this->invoice->profile->retention;
			$this->total = $this->invoice->profile->total;
			$this->recc = $this->invoice->profile->recc;
			$this->invoice_copy = $this->invoice->profile->invoice_copy;
			$this->terms = $this->invoice->profile->terms;
			$this->notes = $this->invoice->profile->notes;
			$this->start_letter  = $this->invoice->profile->start_letter;
			$this->number_zero  = $this->invoice->profile->number_zero;
			$this->consecutive  = $this->invoice->profile->consecutive;
			
			$this->add_check = $this->invoice->profile->add_check;
			$this->add_check2 = $this->invoice->profile->add_check2;
			
			$this->thecompany = $this->invoice->profile->thecompany;
			$this->company_id = $this->invoice->profile->company_id;
			$this->original_company_id = $this->invoice->profile->original_company_id;
			$this->original_company_address = $this->invoice->profile->original_company_address;
			
			$this->invoice_contact = $this->invoice->profile->invoice_contact;
			$this->contact_id = $this->invoice->profile->contact_id;
			$this->contact_address = $this->invoice->profile->contact_address;
			
			$this->invoice_project = $this->invoice->profile->invoice_project;
			$this->project_id = $this->invoice->profile->project_id;
			$this->published = $this->invoice->profile->published;
			$this->ts_published = $this->invoice->profile->ts_published;
			$this->invoice_file = $this->invoice->profile->invoice_file;
			$this->currency = $this->invoice->profile->currency;
			
			foreach ($this->totalIva as $key => $label){
				$this->$key = $this-> invoice->profile->$key;
			}

        }		
		else {
                	$this->invoice->user_id = $this->user->getId();
				$this->invoice->company_id = $this->company->getId();
			}

		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
        		$this->invoice_consecutive = $this->sanitize($request->getPost('invoice_consecutive'));
            $this->invoice->profile->invoice_consecutive = $this->invoice_consecutive;	
			
			$this->start_letter = $this->sanitize($request->getPost('start_letter'));
            $this->invoice->profile->start_letter = $this->start_letter;
			
            $this->add_check = $this->sanitize($request->getPost('add_check'));
            if ($this->add_check == 'false'){
                $this->addError('add_check', 'Por favor especifica la empresa o persona a quien va dirigida la factura');
			}

            $this->add_check2 = $this->sanitize($request->getPost('add_check2'));
            if ($this->add_check2 == 'false'){
                $this->addError('add_check2', 'Por favor incluye al menos un item en la factura');
			}
			
            $this->invoice_number = $this->sanitize($request->getPost('invoice_number'));
            if (strlen($this->invoice_number) == 0){
                $this->addError('invoice_number', 'Por favor introduce tu n&uacute;mero de factura');
			}
			else if (!$this->invoice_id_){
          			if ($this->invoice->invoiceExists($this->user->getId(), $this->invoice_number, $this->start_letter)){
                			$this->addError('invoice_number', 'Disculpa, el n&uacute;mero de factura ya existe');
					}
			}
            else {
                $this->invoice->invoice_number = $this->invoice_number;
			}
			
            $this->invoice_date = $this->sanitize($request->getPost('invoice_date'));
            if (strlen($this->invoice_date) == 0) {
                $this->addError('invoice_date', 'Por favor introduce la fecha de emisi&oacute;n');
			}
            else {
                $this->company->profile->invoice_date = $this->invoice_date;
			}
	
        		$this->invoice_valid = $request->getPost('invoice_valid');
            if ($this->invoice_valid){
				$this->invoice->profile->invoice_valid = $this->invoice_valid;
			}
            else{
           	    $this->invoice->profile->invoice_valid = 0;
			}

            $this->invoice_frequency = $this->sanitize($request->getPost('invoice_frequency'));
            if (strlen($this->invoice_frequency) == 0){
                $this->addError('invoice_frequency', 'Por favor escoge la frecuencia de facturaci&oacute;n');
            }
            else{
                $this->invoice->profile->invoice_frequency = $this->invoice_frequency;
			}
			
            $subtotal_ = $this->sanitize($request->getPost('subtotal'));
            if (strlen($subtotal_) == 0) {
                $this->addError('subtotal', 'Por favor define el subtotal de la factura');
			}
            else {
		    		$subtotal__ = str_replace('.', '', $subtotal_);
				$this->subtotal = str_replace(',', '.', $subtotal__);
                $this->invoice->profile->subtotal = $this->subtotal;
			}
			
			$discount_ = $this->sanitize($request->getPost('discount'));
			$discount__ = str_replace('.', '', $discount_);
			$this->discount = str_replace(',', '.', $discount__);
            $this->invoice->profile->discount = $this->discount;
			
            $base_ = $this->sanitize($request->getPost('base'));
            if (strlen($base_) == 0) {
                $this->addError('base', 'Por favor define la base imponible de la factura');
            }
            else {
			    $base__ = str_replace('.', '', $base_);
			    $this->base = str_replace(',', '.', $base__);
                $this->invoice->profile->base = $this->base;
			}
			
			$retention_ = $this->sanitize($request->getPost('retention'));
			$retention__ = str_replace('.', '', $retention_);
			$this->retention = str_replace(',', '.', $retention__);
            $this->invoice->profile->retention = $this->retention;
			
            $total_ = $this->sanitize($request->getPost('total'));
            if (strlen($total_) == 0) {
                $this->addError('total', 'Por favor define el monto total de la factura');
			}
            else {
			    $total__ = str_replace('.', '', $total_);
			    $this->total = str_replace(',', '.', $total__);
                $this->invoice->profile->total = $this->total;
			}
			
			$this->recc = $this->sanitize($request->getPost('recc'));
            $this->invoice->profile->recc = $this->recc;
			
			$this->invoice_copy = $this->sanitize($request->getPost('invoice_copy'));
            $this->invoice->profile->invoice_copy = $this->invoice_copy;
			
			$this->terms = $this->sanitize($request->getPost('terms'));
            $this->invoice->profile->terms = $this->terms;
			
			$this->notes = $this->sanitize($request->getPost('notes'));
            $this->invoice->profile->notes = $this->notes;
			
            $this->thecompany = $this->sanitize($request->getPost('thecompany'));
            $this->invoice->profile->thecompany = $this->thecompany;
			
			$this->company_id = $this->sanitize($request->getPost('company_id'));
            $this->invoice->profile->company_id = $this->company_id;
			
			$this->original_company_id = $this->sanitize($request->getPost('original_company_id'));
            $this->invoice->profile->original_company_id = $this->original_company_id;
			
			$this->original_company_address = $this->sanitize($request->getPost('original_company_address'));
            $this->invoice->profile->original_company_address = $this->original_company_address;
			
			$this->invoice_contact = $this->sanitize($request->getPost('invoice_contact'));
            $this->invoice->profile->invoice_contact = $this->invoice_contact;
			
			$this->contact_id = $this->sanitize($request->getPost('contact_id'));
            $this->invoice->profile->contact_id = $this->contact_id;
			
			$this->contact_address = $this->sanitize($request->getPost('contact_address'));
            $this->invoice->profile->contact_address = $this->contact_address;
			
			$this->currency = $this->sanitize($request->getPost('currency'));
            $this->invoice->profile->currency = $this->currency;
			
			$this->invoice_project = $this->sanitize($request->getPost('invoice_project'));
            $this->invoice->profile->invoice_project = $this->invoice_project;
			
			$this->project_id = $this->sanitize($request->getPost('project_id'));
            $this->invoice->profile->project_id = $this->project_id;
			
			$this->number_zero = $this->sanitize($request->getPost('number_zero'));
            $this->invoice->profile->number_zero = $this->number_zero;
			
			$this->consecutive = $this->sanitize($request->getPost('consecutive'));
            $this->invoice->profile->consecutive = $this->consecutive;
			
			foreach ($this->totalIva as $key => $label) {
			  if ($request->getPost($key)){
			 		$iva_var_ = $this->sanitize($request->getPost($key));
					$iva_var__ = str_replace('.', '', $iva_var_);
					$this->$key = str_replace(',', '.', $iva_var__);
            			$this->invoice->profile->$key = $this->$key;
			  }
			}
         
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
			
			$this->invoice->profile->invoice_consecutive = $this->invoice_consecutive;
			$this->invoice->invoice_number = $this->invoice_number;
			$this->invoice->profile->invoice_date = date("d-m-Y", strtotime($this->invoice_date));
			$this->invoice->profile->invoice_valid = $this->invoice_valid;
			$this->invoice->profile->invoice_frequency = $this->invoice_frequency;
			$this->invoice->profile->subtotal = $this->subtotal;
			$this->invoice->profile->discount = $this->discount;
			$this->invoice->profile->base = $this->base;
			$this->invoice->profile->retention = $this->retention;
			$this->invoice->profile->total = $this->total;
			$this->invoice->profile->recc = $this->recc;
			$this->invoice->profile->invoice_copy = $this->invoice_copy;
			$this->invoice->profile->terms = $this->terms;
			$this->invoice->profile->notes = $this->notes;
			$this->invoice->profile->invoice_contact = $this->invoice_contact;
			$this->invoice->profile->start_letter = $this->start_letter;
			$this->invoice->profile->number_zero = $this->number_zero;
			$this->invoice->profile->consecutive = $this->consecutive;
			$this->invoice->profile->original_company_id = $this->original_company_id;
			$this->invoice->profile->original_company_address = $this->original_company_address;
			$this->invoice->profile->company_id = $this->company_id;
			$this->invoice->profile->currency = $this->currency;

			
			$this->invoice->save();

			if (!$this->original_company_id){
				if ($this->company_id_){
					$this->ccompany->user_id = $this->user->getId();
					$this->ccompany->comp_doc_type =	'invoice';			
					$this->ccompany->contact_id = $this->invoice->getId();
					$this->ccompany->save();
				}
			}
			
			if ($this->company_id){
				$this->invoice_company->user_id = $this->user->getId();		
				$this->invoice_company->document_id = $this->invoice->getId();
				$this->invoice_company->save();
			}
			
			if ($this->invoice_project){	
				if (!$this->project_id_){
						$this->project->user_id = $this->user->getId();
						$this->project->project_title =	$this->invoice_project;			
						$this->project->save();

						$this->invoice->profile->invoice_project = $this->invoice_project;
						$this->invoice->profile->project_id = $this->project->getId();
						$this->invoice->save();
				}
			}
			
			if ($this->items){
				$i=0;
					$item_ids = array();
					foreach ($this->items as $item) {
						$this->items[$i]->user_id = $this->user->getId();
						$this->items[$i]->company_id = $this->company->getId();
						$this->items[$i]->document_type = 'invoice';
						$this->items[$i]->document_id = $this->invoice->getId();
					 	$this->items[$i]->save();
						if ($item->getId()) {
							$item_ids [$i] = $this->items[$i]->getId();
						}
						$i++;
					}

				$this->invoice->profile->items = base64_encode(serialize($item_ids));
				
				$this->invoice->save();
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