<?php
    class FormProcessor_InvoiceCompanyDetails extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $company = null;
		public $image = null;
		public $_ids = array();
		
		protected $_uploadedFile;
		
		public $companyProfile = array(
			'company_website' => 'Website'
		);
		
        public function __construct($db, $user_id, $company_id = 0, $company_id2 = 0, $address_id = 0)
        {
            parent::__construct();

            $this->db = $db;
			
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
            $this->company = new DatabaseObject_InvoiceCompany($db);
			$this->company->loadForUser($this->user->getId(), $company_id);
			
			$this->company_id = $company_id;
			
            	$this->company2 = new DatabaseObject_Ccompany($db);
			$this->company2->loadForUser($this->user->getId(), $company_id2);

            	$this->address = new DatabaseObject_Address($db);
            	$this->address->loadForUser($this->user->getId(), $address_id);
				
			//all addresses companies
		    	$options = array('user_id' => $this->user->getId());
            $this->addresslist = DatabaseObject_Address::GetAllAddresses($db, $options);

			if ($this->company->isSaved()) {
				
				$this->document_id = $this->company->document_id;
				$this->original_company_id = $this->company->profile->original_company_id;
				$this->original_company_address = $this->company->profile->original_company_address;

				$this->thecompany = $this->company->profile->thecompany;
				$this->identification = $this->company->profile->identification;
				$this->email_c = $this->company->profile->email_c;
				$this->email2 = $this->company->profile->email2;
				$this->phone = $this->company->profile->phone;
				$this->phone2 = $this->company->profile->phone2;
				$this->fax = $this->company->profile->fax;
			
				$this->phone_country = $this->company->profile->phone_country;
				$this->phone2_country = $this->company->profile->phone2_country;
				$this->fax_country = $this->company->profile->fax_country;
			
				$this->phone_area = $this->company->profile->phone_area;
				$this->phone2_area = $this->company->profile->phone2_area;
				$this->fax_area = $this->company->profile->fax_area;
				
				$this->street = $this->company->profile->street;
            		$this->house = $this->company->profile->house;
            		$this->city = $this->company->profile->city;
				$this->province = $this->company->profile->province;
				$this->postal_code = $this->company->profile->postal_code;
            		$this->country = $this->company->profile->country;
					
				$this->ctype = $this->company->profile->ctype;
				$this->recc = $this->company->profile->recc;
				$this->irpf = $this->company->profile->irpf;

			
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
                $this->addError('thecompany', 'Por favor especifica el nombre de la persona o compa&ntilde;&iacute;a');
            else
                $this->company->profile->thecompany = $this->thecompany;

            $this->document_id = $this->sanitize($request->getPost('document_id'));
            $this->company->document_id = $this->document_id;
			
            $this->original_company_id = $this->sanitize($request->getPost('original_company_id'));
            $this->company->original_company_id = $this->original_company_id;
			
            $this->original_company_address = $this->sanitize($request->getPost('original_company_address'));
            $this->company->original_company_address = $this->original_company_address;

            $this->identification = $this->sanitize($request->getPost('identification'));
            $this->company->profile->identification = $this->identification;
			
            $this->email_c = $this->sanitize($request->getPost('email_c'));
            $this->company->profile->email_c = $this->email_c;
			
			$this->email2 = $this->sanitize($request->getPost('email2'));
            $this->company->profile->email2 = $this->email2;
			
			$this->phone = $this->sanitize($request->getPost('phone'));
            $this->company->profile->phone = $this->phone;
			
			$this->phone2 = $this->sanitize($request->getPost('phone2'));
            $this->company->profile->phone2 = $this->phone2;
			
			$this->fax = $this->sanitize($request->getPost('fax'));
            $this->company->profile->fax = $this->fax;
			
			$this->phone_country = $this->sanitize($request->getPost('phone_country'));
            $this->company->profile->phone_country = $this->phone_country;
			
			$this->phone2_country = $this->sanitize($request->getPost('phone2_country'));
            $this->company->profile->phone2_country = $this->phone2_country;
			
			$this->fax_country = $this->sanitize($request->getPost('fax_country'));
            $this->company->profile->fax_country = $this->fax_country;
			
			$this->phone_area = $this->sanitize($request->getPost('phone_area'));
            $this->company->profile->phone_area = $this->phone_area;
			
			$this->phone2_area = $this->sanitize($request->getPost('phone2_area'));
            $this->company->profile->phone2_area = $this->phone2_area;
			
			$this->fax_area = $this->sanitize($request->getPost('fax_area'));
            $this->company->profile->fax_area = $this->fax_area;
			
			//Address Info
			$this->postal_code = $this->sanitize($request->getPost('postal_code'));
            $this->company->profile->postal_code = $this->postal_code;

			
            $this->street = $this->sanitize($request->getPost('street'));
            if (strlen($this->street) == 0)
                $this->addError('street', 'Por favor especifica la calle o referencia m&aacute;s cercana');
            else
                $this->company->profile->street = $this->street;
			
			$this->house = $this->sanitize($request->getPost('house'));
            $this->company->profile->house = $this->house;
			
			$this->city = $this->sanitize($request->getPost('city'));
            $this->company->profile->city = $this->city;
			
			$this->province = $this->sanitize($request->getPost('province'));
            $this->company->profile->province = $this->province;

			$this->country = $this->sanitize($request->getPost('country'));
            if (strlen($this->country) == 0)
                $this->addError('country', 'Por favor especifica el pa&iacute;s');
            else
            		$this->company->profile->country = $this->country;
			
			$this->ctype = $this->sanitize($request->getPost('ctype'));
            $this->company->profile->ctype = $this->ctype;
			
			$this->recc = $this->sanitize($request->getPost('recc'));
            $this->company->profile->recc = $this->recc;
			
			$this->irpf = $this->sanitize($request->getPost('irpf'));
            $this->company->profile->irpf = $this->irpf;

            // process the public profile
            foreach ($this->companyProfile as $key => $label) {
                	$this->$key = $this->sanitize($request->getPost($key));
				$this->company->profile->$key = $this->$key;
            }

			// if no errors have occurred, save the user
            if (!$this->hasError()) {
            	
				$this->company->document_id = $this->document_id;
				$this->company->profile->original_company_id = $this->original_company_id;
				$this->company->profile->original_company_address = $this->original_company_address;

				$this->company->profile->thecompany = $this->thecompany;
				$this->company->profile->identification = $this->identification;
				$this->company->profile->email_c = $this->email_c;
				$this->company->profile->email2 = $this->email2;
				$this->company->profile->phone = $this->phone;
				$this->company->profile->phone2 = $this->phone2;
				$this->company->profile->fax = $this->fax;
				$this->company->profile->recc = $this->recc;
				$this->company->profile->irpf = $this->irpf;
				$this->company->profile->ctype = $this->ctype;
			
				$this->company->profile->phone_country = $this->phone_country;
				$this->company->profile->phone2_country = $this->phone2_country;
				$this->company->profile->fax_country = $this->fax_country;
			
				$this->company->profile->phone_area = $this->phone_area;
				$this->company->profile->phone2_area = $this->phone2_area;
				$this->company->profile->fax_area = $this->fax_area;
				
				$this->company->profile->street = $this->street;
            		$this->company->profile->house = $this->house;
            		$this->company->profile->city = $this->city;
				$this->company->profile->province = $this->province;
				$this->company->profile->postal_code = $this->postal_code;
            		$this->company->profile->country = $this->country;
				
            $this->company->save();
			
			if (!$this->company_id) {
				if (!$this->ctype) {
					$this->company2->user_id = $this->user->getId();
					$this->company2->comp_doc_type = 'invoice';
					$this->company2->contact_id = $this->document_id;
					
            			$this->company2->profile->thecompany = $this->thecompany;
            			$this->company2->profile->identification = $this->identification;
			
					$this->company2->profile->email_c = $this->email_c;
					$this->company2->profile->email2 = $this->email2;
					$this->company2->profile->phone = $this->phone;
					$this->company2->profile->phone2 = $this->phone2;
					$this->company2->profile->fax = $this->fax;
			
					$this->company2->profile->phone_country = $this->phone_country;
					$this->company2->profile->phone2_country = $this->phone2_country;
					$this->company2->profile->fax_country = $this->fax_country;
			
					$this->company2->profile->phone_area = $this->phone_area;
					$this->company2->profile->phone2_area = $this->phone2_area;
					$this->company2->profile->fax_area = $this->fax_area;
					
          			foreach ($this->companyProfile as $key => $label) {
						$this->company2->profile->$key = $this->$key;
            			}
					
				    $this->company2->save();	
				 }
			}
			
			if (!$this->company_id) {
				if (!$this->ctype) {
					foreach ($this->addresslist as $address) {
						$id_a_= $address->getId();
						$user_a_= $address->user_id;
						$doc_type_a_ = $address->doc_type;
						$doc_id_a_ = $address->doc_id;
						
						if ($user_a_ == $this->user->getId() && 
						$doc_type_a_ == 'ccompany' && 
						$doc_id_a_ == $this->company2->getId()){
						$positive_ = true;
						}
			  		}

					if (!$positive_){
					$this->address->user_id = $this->user->getId();
					$this->address->doc_type = 'ccompany';
					$this->address->doc_id = $this->company2->getId();
					
					$this->address->profile->postal_code = $this->postal_code;	
					$this->address->profile->street = $this->street;
					$this->address->profile->house = $this->house;
					$this->address->profile->city = $this->city;
					$this->address->profile->province = $this->province;
					$this->address->profile->country = $this->country;
					
					$this->address->save();
					}
				}
				elseif ($this->original_company_id) {
					
					foreach ($this->addresslist as $address) {
						$id_a_= $address->getId();
						$user_a_= $address->user_id;
						$doc_type_a_ = $address->doc_type;
						$doc_id_a_ = $address->doc_id;
						
						if ($user_a_ == $this->user->getId() && 
						$doc_type_a_ == 'contact' && 
						$doc_id_a_ == $this->original_company_id){
						$positive2_ = true;
						}
						
						elseif ($user_a_ == $this->user->getId() && 
						$doc_type_a_ == 'ccompany' && 
						$doc_id_a_ == $this->original_company_id){
						$positive3_ = true;
						}
			  		}
					
					if ($this->ctype == 'contacto') {
					 if (!$positive2_){
					   if ($this->street){

							$this->address->user_id = $this->user->getId();
							$this->address->doc_type = 'contact';
							$this->address->doc_id = $this->original_company_id;
					
							$this->address->profile->postal_code = $this->postal_code;	
							$this->address->profile->street = $this->street;
							$this->address->profile->house = $this->house;
							$this->address->profile->city = $this->city;
							$this->address->profile->province = $this->province;
							$this->address->profile->country = $this->country;
					
							$this->address->save();
						}
				   	  }
					}
				   
				   else {
				   if (!$positive3_){
					   if ($this->street){
							$this->address->user_id = $this->user->getId();
							$this->address->doc_type = 'ccompany';
							$this->address->doc_id = $this->original_company_id;
					
							$this->address->profile->postal_code = $this->postal_code;	
							$this->address->profile->street = $this->street;
							$this->address->profile->house = $this->house;
							$this->address->profile->city = $this->city;
							$this->address->profile->province = $this->province;
							$this->address->profile->country = $this->country;
					
							$this->address->save();
				   	  }
				   }
				}
			}
		}
				
   }

			  // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>