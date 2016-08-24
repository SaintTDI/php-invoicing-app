<?php
    class FormProcessor_CcompanyDetails extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $company = null;
		public $image = null;
		public $addresses = array();
		public $address_id = array();
		public $_ids = array();
		
		protected $_uploadedFile;
		
		public $companyProfile = array(
			'company_website' => 'Website',
			'company_twitter' => 'Twitter',
			'company_industry' => 'Industry',
			'company_specialty' => 'Specialty',
		);
		
        public function __construct($db, $user_id, $company_id = 0, $address_id)
        {
            parent::__construct();

            $this->db = $db;
			
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
            $this->company = new DatabaseObject_Ccompany($db);
			$this->company->loadForUser($this->user->getId(), $company_id);
			
			if ($address_id){
				if (!is_array($address_id))
                		$address_id = array($address_id);
			
				foreach ($address_id as $id){
            			$address = new DatabaseObject_Address($db);
            			$address->loadForUser($this->user->getId(), $id);
					$this->addresses[] = $address;
        			}
			}
		
			if ($this->company->isSaved()) {
				
				$this->contact_id = $this->company->contact_id;
				$this->comp_doc_type = $this->company->comp_doc_type;
				
				$this->thecompany = $this->company->profile->thecompany;
				$this->identification = $this->company->profile->identification;
				$this->email_c = $this->company->profile->email_c;
				$this->email2 = $this->company->profile->email2;
				$this->mobile = $this->company->profile->mobile;
				$this->phone = $this->company->profile->phone;
				$this->phone2 = $this->company->profile->phone2;
				$this->fax = $this->company->profile->fax;
				$this->recc = $this->company->profile->recc;
				$this->irpf = $this->company->profile->irpf;
			
				$this->mobile_country = $this->company->profile->mobile_country;
				$this->phone_country = $this->company->profile->phone_country;
				$this->phone2_country = $this->company->profile->phone2_country;
				$this->fax_country = $this->company->profile->fax_country;
			
				$this->mobile_area = $this->company->profile->mobile_area;
				$this->phone_area = $this->company->profile->phone_area;
				$this->phone2_area = $this->company->profile->phone2_area;
				$this->fax_area = $this->company->profile->fax_area;
			
				$this->relationship = $this->company->profile->relationship;
				$this->notes = $this->company->profile->notes;
			
				foreach ($this->companyProfile as $key => $label)
					$this->$key = $this-> company->profile->$key;
				
		   		}
			
			else {
				$this->company->user_id = $this->user->getId();
			}
        }

        public function process(Zend_Controller_Request_Abstract $request)
        {
			
            $this->thecompany = $this->sanitize($request->getPost('thecompany'));
            if (strlen($this->thecompany) == 0)
                $this->addError('thecompany', 'Por favor introduce el nombre de la compa&ntilde;&iacute;a');
            else
                $this->company->profile->thecompany = $this->thecompany;

            $this->contact_id = $this->sanitize($request->getPost('contact_id'));
            $this->company->contact_id = $this->contact_id;
			
			$this->comp_doc_type = $this->sanitize($request->getPost('comp_doc_type'));
            $this->company->comp_doc_type = $this->comp_doc_type;

            $this->identification = $this->sanitize($request->getPost('identification'));
            $this->company->profile->identification = $this->identification;
			
            $this->relationship = $this->sanitize($request->getPost('relationship'));
            $this->company->profile->relationship = $this->relationship;
			
			$this->notes = $this->sanitize($request->getPost('notes'));
            $this->company->profile->notes = $this->notes;
			
            $this->email_c = $this->sanitize($request->getPost('email_c'));
            $validator = new Zend_Validate_EmailAddress();

            if (strlen($this->email_c) == 0)
                $this->addError('email_c', 'Por favor introduce el correo electr&oacute;nico de la compa&ntilde;&iacute;a');
            else if (!$validator->isValid($this->email_c))
                $this->addError('email_c', 'Por favor introduce una direcci&oacute;n de correo electr&oacute;nica v&aacute;lida');
            else
                $this->company->profile->email_c = $this->email_c;
			
			$this->email2 = $this->sanitize($request->getPost('email2'));
            $this->company->profile->email2 = $this->email2;
			
			$this->mobile = $this->sanitize($request->getPost('mobile'));
            $this->company->profile->mobile = $this->mobile;
			
			$this->phone = $this->sanitize($request->getPost('phone'));
            $this->company->profile->phone = $this->phone;
			
			$this->phone2 = $this->sanitize($request->getPost('phone2'));
            $this->company->profile->phone2 = $this->phone2;
			
			$this->fax = $this->sanitize($request->getPost('fax'));
            $this->company->profile->fax = $this->fax;
			
			$this->recc = $this->sanitize($request->getPost('recc'));
            $this->company->profile->recc = $this->recc;
			
			$iva_var_ = $this->sanitize($request->getPost('irpf'));
			$iva_var__ = str_replace('.', '', $iva_var_);
			$this->irpf = str_replace(',', '.', $iva_var__);
            $this->company->profile->irpf = $this->irpf;
		
			$this->mobile_country = $this->sanitize($request->getPost('mobile_country'));
            $this->company->profile->mobile_country = $this->mobile_country;
			
			$this->phone_country = $this->sanitize($request->getPost('phone_country'));
            $this->company->profile->phone_country = $this->phone_country;
			
			$this->phone2_country = $this->sanitize($request->getPost('phone2_country'));
            $this->company->profile->phone2_country = $this->phone2_country;
			
			$this->fax_country = $this->sanitize($request->getPost('fax_country'));
            $this->company->profile->fax_country = $this->fax_country;
			
			$this->mobile_area = $this->sanitize($request->getPost('mobile_area'));
            $this->company->profile->mobile_area = $this->mobile_area;
			
			$this->phone_area = $this->sanitize($request->getPost('phone_area'));
            $this->company->profile->phone_area = $this->phone_area;
			
			$this->phone2_area = $this->sanitize($request->getPost('phone2_area'));
            $this->company->profile->phone2_area = $this->phone2_area;
			
			$this->fax_area = $this->sanitize($request->getPost('fax_area'));
            $this->company->profile->fax_area = $this->fax_area;

            // process the public profile
            foreach ($this->companyProfile as $key => $label) {
                	$this->$key = $request->getPost($key);
				$this->company->profile->$key = $this->$key;
            }

			// if no errors have occurred, save the user
            if (!$this->hasError()) {
            	
			$this->company->contact_id = $this->contact_id;
			$this->company->comp_doc_type = $this->comp_doc_type;
			
            $this->company->profile->thecompany = $this->thecompany;
            $this->company->profile->identification = $this->identification;
			
			$this->company->profile->email_c = $this->email_c;
			$this->company->profile->email2 = $this->email2;
			$this->company->profile->mobile = $this->mobile;
			$this->company->profile->phone = $this->phone;
			$this->company->profile->phone2 = $this->phone2;
			$this->company->profile->fax = $this->fax;
			$this->company->profile->recc = $this->recc;
			$this->company->profile->irpf = $this->irpf;
			
			$this->company->profile->mobile_country = $this->mobile_country;
			$this->company->profile->phone_country = $this->phone_country;
			$this->company->profile->phone2_country = $this->phone2_country;
			$this->company->profile->fax_country = $this->fax_country;
			
			$this->company->profile->mobile_area = $this->mobile_area;
			$this->company->profile->phone_area = $this->phone_area;
			$this->company->profile->phone2_area = $this->phone2_area;
			$this->company->profile->fax_area = $this->fax_area;
			
			$this->company->profile->relationship = $this->relationship;
			$this->company->profile->notes = $this->notes;
				
            $this->company->save();
					
			if ($this->addresses){
				
				$i=0;
					$address_ids = array();
					foreach ($this->addresses as $address) {
						$this->addresses[$i]->doc_type = 'ccompany';
						$this->addresses[$i]->doc_id = $this->company->getId();
					 	$this->addresses[$i]->save();
						if ($address->getId()) {
							$address_ids [$i] = $address->getId();
						}
						$i++;
					}

				$this->company->profile->company_address = base64_encode(serialize($address_ids));
				
				$this->company->save();
			}
					
            }

            // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>