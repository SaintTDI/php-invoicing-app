<?php
    class FormProcessor_Ccompany extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $company = null;
		public $address = null;
		public $image = null;
		protected $_uploadedFile;
		
		public $companyProfile = array(
			'company_website' => 'Website',
			'company_twitter' => 'Twitter',
			'company_industry' => 'Industry',
			'company_specialty' => 'Specialty',
			'company_address' => 'Address'
		);

        public function __construct($db, $user_id, $company_id = 0, $address_id = 0, $company_type = '', $cont_id = 0)
        {
            parent::__construct();

            $this->db = $db;
			
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
            $this->company = new DatabaseObject_Ccompany($db);
			$this->company->loadForUser($this->user->getId(), $company_id);

            $this->address = new DatabaseObject_Address($db);
            $this->address->loadForUser($this->user->getId(), $address_id);
			
			if ($company_type == 'product') {
		    		$this->product = new DatabaseObject_Product($db);
            		$this->product->loadForUser($this->user->getId(), $cont_id);
			}
			if ($company_type == 'contact') {
            		$this->contact = new DatabaseObject_Contact($db);
            		$this->contact->loadForUser($this->user->getId(), $cont_id);
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
				
				$this->doc_type = $this->address->doc_type;
				$this->street = $this->address->profile->street;
            		$this->house = $this->address->profile->house;
				$this->neighbourhood = $this->address->profile->neighbourhood;
            		$this->city = $this->address->profile->city;
				$this->province = $this->address->profile->province;
				$this->postal_code = $this->address->profile->postal_code;
            		$this->country = $this->address->profile->country;
			
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
                $this->addError('thecompany', 'Por favor introduzca la raz&oacute;n social');
            else
                $this->company->profile->thecompany = $this->thecompany;
			
			$this->country = $this->sanitize($request->getPost('country'));
            if (strlen($this->country) == 0)
                $this->addError('country', 'Por favor escoja el pa&iacute;s');
            else
                $this->address->profile->country = $this->country;

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
			
        		$this->doc_type = $this->sanitize($request->getPost('doc_type'));
            $this->address->doc_type = $this->doc_type;

			$this->postal_code = $this->sanitize($request->getPost('postal_code'));
            $this->address->profile->postal_code = $this->postal_code;

			$this->neighbourhood = $this->sanitize($request->getPost('neighbourhood'));
            $this->address->profile->neighbourhood = $this->neighbourhood;
			
			$this->street = $this->sanitize($request->getPost('street'));
            $this->address->profile->street = $this->street;
			
			$this->house = $this->sanitize($request->getPost('house'));
            $this->address->profile->house = $this->house;
			
			$this->city = $this->sanitize($request->getPost('city'));
            $this->address->profile->city = $this->city;
			
			$this->province = $this->sanitize($request->getPost('province'));
            $this->address->profile->province = $this->province;

            // process the public profile
            foreach ($this->companyProfile as $key => $label) {
                		$this->$key = $this->sanitize($request->getPost($key));
					$this->company->profile->$key = $this->$key;
            }
            
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
            	
            	if (!empty($this->contact_id)) {
				$this->company->contact_id = $this->contact_id;
				$this->company->comp_doc_type = $this->comp_doc_type;
			}
			
            $this->company->profile->thecompany = $this->thecompany;
            $this->company->profile->identification = $this->identification;
			
			$this->company->profile->email_c = $this->email_c;
			$this->company->profile->email2 = $this->email2;
			$this->company->profile->mobile = $this->mobile;
			$this->company->profile->phone = $this->phone;
			$this->company->profile->phone2 = $this->phone2;
			$this->company->profile->fax = $this->fax;
			
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
			
			if ($this->address){
					
				$this->address->doc_type = $this->doc_type;				
				$this->address->profile->postal_code = $this->postal_code;	
				$this->address->profile->street = $this->street;
				$this->address->profile->house = $this->house;
				$this->address->profile->neighbourhood = $this->neighbourhood;
				$this->address->profile->city = $this->city;
				$this->address->profile->province = $this->province;
				$this->address->profile->country = $this->country;
				$this->address->user_id = $this->user->getId();
				$this->address->doc_id = $this->company->getId();
				$this->address->save();
				
				$this->company->profile->company_address = base64_encode(serialize($this->address->getId())); 
				$this->company->save();
				
				/////////actualiza producto
				if ($this->product->profile->company_id) {
					$old_ = array ();			
					$old_ = unserialize(base64_decode($this->product->profile->company_id));	
				    foreach ($old_ as $old) {
						if ($old == $this->company->getId()) { 
							$aprobado = false;
							break;
						}
						else {
							 $aprobado = true;
						}
					}
					if (empty($old_) or $aprobado == true) {
						array_push($old_, $this->company->getId());
						$new_ = base64_encode(serialize($old_));
						$this->product->profile->company_id = $new_;
						$this->product->save();
					}
				}
				////////fin producto
				
				/////////actualiza contacto
				if ($this->contact->profile->company_id) {
					$old_ = array ();			
					$old_ = unserialize(base64_decode($this->contact->profile->company_id));	
				    foreach ($old_ as $old) {
						if ($old == $this->company->getId()) { 
							$aprobado = false;
							break;
						}
						else {
							 $aprobado = true;
						}
					}
					if (empty($old_) or $aprobado == true) {
						array_push($old_, $this->company->getId());
						$new_ = base64_encode(serialize($old_));
						$this->contact->profile->company_id = $new_;
						$this->contact->save();
					}
				}
				////////fin contacto	
			}
		  }

		     // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>