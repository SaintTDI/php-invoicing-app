<?php
    class FormProcessor_ProInvoiceCompanyDetails extends FormProcessor
    {
        protected $db = null;
        public $user_id = null;

		public $companyProfile = array(
			'company_website' => 'Website'
		);
		
        public function __construct($db, $user_id, $company_id = 0, $company_id2, $doc_id)
        {
            parent::__construct();

            $this->db = $db;
			$this->doc_id = $doc_id;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);

            $this->company = new DatabaseObject_InvoiceCompany($db);
			$this->company->loadForUser($this->user->getId(), $company_id);

            $this->company2 = new DatabaseObject_ProformaCompany($db);
			$this->company2->loadForUser($this->user->getId(), $company_id2);

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
			
            $this->thecompany = $this->company2->profile->thecompany;
            $this->company->profile->thecompany = $this->thecompany;

            $this->document_id = $this->doc_id;
            $this->company->document_id = $this->document_id;
			
            $this->original_company_id = $this->company2->profile->original_company_id;
            $this->company->profile->original_company_id = $this->original_company_id;
			
            $this->original_company_address = $this->company2->profile->original_company_address;
            $this->company->profile->original_company_address = $this->original_company_address;

            $this->identification = $this->company2->profile->identification;
            $this->company->profile->identification = $this->identification;
			
            $this->email_c = $this->company2->profile->email_c;
            $this->company->profile->email_c = $this->email_c;
			
			$this->email2 = $this->company2->profile->email2;
            $this->company->profile->email2 = $this->email2;
			
			$this->phone = $this->company2->profile->phone;
            $this->company->profile->phone = $this->phone;
			
			$this->phone2 = $this->company2->profile->phone2;
            $this->company->profile->phone2 = $this->phone2;
			
			$this->fax = $this->company2->profile->fax;
            $this->company->profile->fax = $this->fax;
			
			$this->phone_country = $this->company2->profile->phone_country;
            $this->company->profile->phone_country = $this->phone_country;
			
			$this->phone2_country = $this->company2->profile->phone2_country;
            $this->company->profile->phone2_country = $this->phone2_country;
			
			$this->fax_country = $this->company2->profile->fax_country;
            $this->company->profile->fax_country = $this->fax_country;
			
			$this->phone_area = $this->company2->profile->phone_area;
            $this->company->profile->phone_area = $this->phone_area;
			
			$this->phone2_area = $this->company2->profile->phone2_area;
            $this->company->profile->phone2_area = $this->phone2_area;
			
			$this->fax_area = $this->company2->profile->fax_area;
            $this->company->profile->fax_area = $this->fax_area;
			
			//Address Info
			$this->postal_code = $this->company2->profile->postal_code;
            $this->company->profile->postal_code = $this->postal_code;

            $this->street = $this->company2->profile->street;
            $this->company->profile->street = $this->street;
			
			$this->house = $this->company2->profile->house;
            $this->company->profile->house = $this->house;
			
			$this->city = $this->company2->profile->city;
            $this->company->profile->city = $this->city;
			
			$this->province = $this->company2->profile->province;
            $this->company->profile->province = $this->province;

			$this->country = $this->company2->profile->country;
            $this->company->profile->country = $this->country;
			
			$this->ctype = $this->company2->profile->ctype;
            $this->company->profile->ctype = $this->ctype;
			
			$this->recc = $this->company2->profile->recc;
            $this->company->profile->recc = $this->recc;
			
			$this->irpf = $this->company2->profile->irpf;
            $this->company->profile->irpf = $this->irpf;

            // process the public profile
            foreach ($this->companyProfile as $key => $label) {
            	  if ($this->company2->profile->$key){
                	$this->$key = $this->company2->profile->$key;
				$this->company->profile->$key = $this->$key;
			   }
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
					
            }

            // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>