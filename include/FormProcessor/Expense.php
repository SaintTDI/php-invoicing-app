<?php
    class FormProcessor_Expense extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $expense = null;
		public $address = null;
		public $company = null;
		public $expense_company = null;
		public $ccompany = null;
		public $contact = null;
		public $project = null;
		public $item = null;
		public $items = array();
		public $image = null;
		protected $_uploadedFile;
		
		public $expenseDocument = array(
			'expense_document_1' => 'Documento'
		);
		
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
		
        public function __construct($db, $user_id, $expense_id = 0, $company_id = 0, $contact_id = 0, $project_id = 0, $item_id = 0, $company_id2 = 0, $address_id = 0)
        {
            parent::__construct();

            $this->db = $db;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->expense_company = new DatabaseObject_ExpenseCompany($db);
            $this->expense_company->loadForUser($this->user->getId(), $company_id2);
			
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
            			$this->item_ = new DatabaseObject_Expitem($db);
            			$this->item_->loadForUser($this->user->getId(), $id);
					$this->items[] = $this->item_;
        			}
			}
			
            $this->expense = new DatabaseObject_Expense($db);
            $this->expense->loadForUser($this->user->getId(), $expense_id);	
			$this->expense_id_ = $expense_id;	
		
			if ($this->expense->isSaved()) {
			
			$this->expense_consecutive = $this->expense->profile->expense_consecutive;
			$this->expense_number = $this->expense->expense_number;
			$this->expense_date = $this->expense->profile->expense_date;
			$this->expense_valid = $this->expense->profile->expense_valid;
			$this->expense_type = $this->expense->profile->expense_type;
			$this->subtotal = $this->expense->profile->subtotal;
			$this->discount = $this->expense->profile->discount;
			$this->base = $this->expense->profile->base;
			$this->retention = $this->expense->profile->retention;
			$this->total = $this->expense->profile->total;
			$this->recc = $this->expense->profile->recc;
			$this->expense_paid = $this->expense->profile->expense_paid;
			$this->notes = $this->expense->profile->notes;
			
			$this->thecompany = $this->expense->profile->thecompany;
			$this->company_id = $this->expense->profile->company_id;
			$this->original_company_id = $this->expense->profile->original_company_id;
			$this->original_company_address = $this->expense->profile->original_company_address;
			
			$this->expense_contact = $this->expense->profile->expense_contact;
			$this->contact_id = $this->expense->profile->contact_id;
			$this->contact_address = $this->expense->profile->contact_address;
			
			$this->expense_project = $this->expense->profile->expense_project;
			$this->project_id = $this->expense->profile->project_id;
			$this->published = $this->expense->profile->published;
			$this->ts_published = $this->expense->profile->ts_published;
			$this->expense_file = $this->expense->profile->expense_file;
			
			$this->invoice_number  = $this->expense->profile->invoice_number;
			$this->currency = $this->expense->profile->currency;
			
			foreach ($this->totalIva as $key => $label){
				$this->$key = $this-> expense->profile->$key;
			}
			
			foreach ($this->expenseDocument as $key => $label){
				$this->$key = $this-> expense->profile->$key;
			}

        }		
		else
                	$this->expense->user_id = $this->user->getId();
				$this->expense->company_id = $this->company->getId();

		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
        		$this->expense_consecutive = $this->sanitize($request->getPost('expense_consecutive'));
            $this->expense->profile->expense_consecutive = $this->expense_consecutive;
			
           $this->add_check = $this->sanitize($request->getPost('add_check'));
            if ($this->add_check == 'false'){
                $this->addError('add_check', 'Por favor especifica el proveedor');
			}

            $this->add_check2 = $this->sanitize($request->getPost('add_check2'));
            if ($this->add_check2 == 'false'){
                $this->addError('add_check2', 'Por favor incluye al menos un item en la Nota de Gasto');
			}
	
			
            $this->expense_number = $this->sanitize($request->getPost('expense_number'));
            if (strlen($this->expense_number) == 0)
                $this->addError('expense_number', 'Por favor introduce tu n&uacute;mero de gasto');
			else if (!$this->expense_id_)
           		if ($this->expense->expenseExists($this->user->getId(), $this->expense_number)){
                		$this->addError('expense_number', 'Disculpa, el n&uacute;mero de gasto ya existe');
				}
            else
                $this->expense->expense_number = $this->expense_number;
			
            $this->expense_date = $this->sanitize($request->getPost('expense_date'));
            if (strlen($this->expense_date) == 0)
                $this->addError('expense_date', 'Por favor introduce la fecha de emisi&oacute;n');
            else
                $this->company->profile->expense_date = $this->expense_date;	
	
        		$this->expense_valid = $request->getPost('expense_valid');
            if ($this->expense_valid)
				$this->expense->profile->expense_valid = $this->expense_valid;
            else
           	    $this->expense->profile->expense_valid = 0;
			
        		$this->expense_type = $request->getPost('expense_type');
            if ($this->expense_type)
				$this->expense->profile->expense_type = $this->expense_type;
            else
           	    $this->expense->profile->expense_type = 0;
			
            $subtotal_ = $this->sanitize($request->getPost('subtotal'));
            if (strlen($subtotal_) == 0) {
                $this->addError('subtotal', 'Por favor define el subtotal del gasto');
			}
            else {
		    		$subtotal__ = str_replace('.', '', $subtotal_);
				$this->subtotal = str_replace(',', '.', $subtotal__);
                $this->expense->profile->subtotal = $this->subtotal;
			}
			
			$discount_ = $this->sanitize($request->getPost('discount'));
			$discount__ = str_replace('.', '', $discount_);
			$this->discount = str_replace(',', '.', $discount__);
            $this->expense->profile->discount = $this->discount;
			
            $base_ = $this->sanitize($request->getPost('base'));
            if (strlen($base_) == 0) {
                $this->addError('base', 'Por favor define la base imponible del gasto');
            }
            else {
			    $base__ = str_replace('.', '', $base_);
			    $this->base = str_replace(',', '.', $base__);
                $this->expense->profile->base = $this->base;
			}
			
			$retention_ = $this->sanitize($request->getPost('retention'));
			$retention__ = str_replace('.', '', $retention_);
			$this->retention = str_replace(',', '.', $retention__);
            $this->expense->profile->retention = $this->retention;
			
            $total_ = $this->sanitize($request->getPost('total'));
            if (strlen($total_) == 0) {
                $this->addError('total', 'Por favor define el monto total del gasto');
			}
            else {
			    $total__ = str_replace('.', '', $total_);
			    $this->total = str_replace(',', '.', $total__);
                $this->expense->profile->total = $this->total;
			}
			
			$this->recc = $this->sanitize($request->getPost('recc'));
            $this->expense->profile->recc = $this->recc;
			
			$this->expense_paid = $this->sanitize($request->getPost('expense_paid'));
            $this->expense->profile->expense_paid = $this->expense_paid;
			
			$this->notes = $this->sanitize($request->getPost('notes'));
            $this->expense->profile->notes = $this->notes;
			
			$this->invoice_number = $this->sanitize($request->getPost('invoice_number'));
            $this->expense->profile->invoice_number = $this->invoice_number;
			
            $this->thecompany = $this->sanitize($request->getPost('thecompany'));
            $this->expense->profile->thecompany = $this->thecompany;
			
			$this->company_id = $this->sanitize($request->getPost('company_id'));
            $this->expense->profile->company_id = $this->company_id;
			
			$this->original_company_id = $this->sanitize($request->getPost('original_company_id'));
            $this->expense->profile->original_company_id = $this->original_company_id;
			
			$this->original_company_address = $this->sanitize($request->getPost('original_company_address'));
            $this->expense->profile->original_company_address = $this->original_company_address;
			
			$this->expense_contact = $this->sanitize($request->getPost('expense_contact'));
            $this->expense->profile->expense_contact = $this->expense_contact;
			
			$this->contact_id = $this->sanitize($request->getPost('contact_id'));
            $this->expense->profile->contact_id = $this->contact_id;
			
			$this->contact_address = $this->sanitize($request->getPost('contact_address'));
            $this->expense->profile->contact_address = $this->contact_address;
			
			$this->expense_project = $this->sanitize($request->getPost('expense_project'));
            $this->expense->profile->expense_project = $this->expense_project;
			
			$this->project_id = $this->sanitize($request->getPost('project_id'));
            $this->expense->profile->project_id = $this->project_id;
			
			$this->currency = $this->sanitize($request->getPost('currency'));
            $this->expense->profile->currency = $this->currency;
			
			foreach ($this->totalIva as $key => $label) {
			  if ($request->getPost($key)){
			 		$iva_var_ = $this->sanitize($request->getPost($key));
					$iva_var__ = str_replace('.', '', $iva_var_);
					$this->$key = str_replace(',', '.', $iva_var__);
            			$this->expense->profile->$key = $this->$key;
			  }
			}
			
			////////////////////
            foreach ($this->expenseDocument as $key => $label) {

				if ($label == 'Documento') {
						if ($_FILES[$key]['error'] != true) {
						
						$config = Zend_Registry::get('config');
						$aroute = sprintf('%s/httpdocs/documents/expenses/documents/', $config->paths->base);
						$afile = $this->expense->profile->expense_document_1;

						$aimage = $aroute . $afile;
						
						$image = $key;
							
							if (!isset($_FILES[$key])) {
								$this->addError($key, 'Invalid upload data');
								return false;
							}
				
							$file = $_FILES[$key];
				
							switch ($file['error']) {
								case UPLOAD_ERR_OK:
									// success
									break;
				
								case UPLOAD_ERR_PARTIAL:
									$this->addError($key, 'El archivo fue parcialmente cargado');
									break;
				
								case UPLOAD_ERR_NO_FILE:
									$this->addError($key, 'El archivo no pudo ser cargado');
									break;
				
								case UPLOAD_ERR_NO_TMP_DIR:
									$this->addError($key, 'La carperta de archivos temporales no fue encontrada');
									break;
				
								case UPLOAD_ERR_CANT_WRITE:
									$this->addError($key, 'El sistema no pudo escribir el nombre del archivo');
									break;
				
								case UPLOAD_ERR_EXTENSION:
									$this->addError($key, 'La extensi&oacute;n del archivo era inv&aacute;lida');
									break;
				
								default:
									$this->addError($key, 'Error de c&oacute;digo desconocido');
							}
							
							if (!$this->hasError()) {
								
								if (!file_exists($file['tmp_name']) || !is_file($file['tmp_name']))
								 throw new Exception('No se puedo encontrar el archivo cargado');
								if (!is_readable($file['tmp_name']))
								 throw new Exception('El sistema no pudo leer el archivo');
								 $this->_uploadedFile = $file['tmp_name'];
								 
								// Get the original file name from $_FILES
								$file_name = $file['name'];
								$file_name = preg_replace('/[^a-zA-Z0-9\\.]/', '', $file_name);
								//////
								 
								$this->image->filename = basename($file_name);
								 
								$config = Zend_Registry::get('config');
								$address = sprintf('%s/httpdocs/documents/expenses/documents/', $config->paths->base);
								
								$namef = basename($file_name);
								
								$originalImage = mt_rand() . $namef;
								
								$this->expense->profile->$key = $originalImage;
								
								move_uploaded_file($file['tmp_name'], $address . $originalImage);
								
							}
						}
				}


				else {
                	$this->$key = $this->sanitize($request->getPost($key));
                	$this->expense->profile->$key = $this->$key;
					}
				
            }
			//////////////////
         
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
			
			$this->expense->profile->expense_consecutive = $this->expense_consecutive;
			$this->expense->expense_number = $this->expense_number;
			$this->expense->profile->expense_date = date("d-m-Y", strtotime($this->expense_date));
			$this->expense->profile->expense_valid = $this->expense_valid;
			$this->expense->profile->expense_type = $this->expense_type;
			$this->expense->profile->subtotal = $this->subtotal;
			$this->expense->profile->discount = $this->discount;
			$this->expense->profile->base = $this->base;
			$this->expense->profile->retention = $this->retention;
			$this->expense->profile->total = $this->total;
			$this->expense->profile->recc = $this->recc;
			$this->expense->profile->expense_paid = $this->expense_paid;
			$this->expense->profile->notes = $this->notes;
			$this->expense->profile->expense_contact = $this->expense_contact;
			$this->expense->profile->original_company_id = $this->original_company_id;
			$this->expense->profile->original_company_address = $this->original_company_address;
			$this->expense->profile->company_id = $this->company_id;
			
			$this->expense->profile->invoice_number = $this->invoice_number;
			$this->expense->profile->currency = $this->currency;
			
			$this->expense->save();

			if (!$this->original_company_id){
				if ($this->company_id_){
					$this->ccompany->user_id = $this->user->getId();
					$this->ccompany->comp_doc_type =	'expense';			
					$this->ccompany->contact_id = $this->expense->getId();
					$this->ccompany->save();
				}
			}
			
			if ($this->company_id){
				$this->expense_company->user_id = $this->user->getId();		
				$this->expense_company->document_id = $this->expense->getId();
				$this->expense_company->save();
			}
			
			if (!$this->project_id_){
				if ($this->expense_project){
						$this->project->user_id = $this->user->getId();
						$this->project->project_title =	$this->expense_project;			
						$this->project->save();

						$this->expense->profile->expense_project = $this->project->project_title;
						$this->expense->profile->project_id = $this->project->getId();
						$this->expense->save();
				}
			}
			
			if ($this->items){
				$i=0;
					$item_ids = array();
					foreach ($this->items as $item) {
						$this->items[$i]->user_id = $this->user->getId();
						$this->items[$i]->company_id = $this->company->getId();
						$this->items[$i]->document_type = 'expense';
						$this->items[$i]->document_id = $this->expense->getId();
					 	$this->items[$i]->save();
						if ($item->getId()) {
							$item_ids [$i] = $this->items[$i]->getId();
						}
						$i++;
					}

				$this->expense->profile->items = base64_encode(serialize($item_ids));
				
				$this->expense->save();
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