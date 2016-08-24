<?php
    class CinvoiceController extends CustomControllerAction
    {
    		protected $user = null;
		
        public function init()
        {
            parent::init();
            $this->breadcrumbs->addStep('Cliente', $this->getUrl(null, 'cliente'));
			$this->identity = Zend_Auth::getInstance()->getIdentity();
			if (!$this->identity->temporary2){
				$this->identity->temporary2 = DatabaseObject_Address::temporaryUser();
			}	
        }

        public function editarcompaniaAction()
        {
			$request = $this->getRequest();
			$company_id = (int) $this->getRequest()->getQuery('id');
			$document_id = (int) $this->getRequest()->getQuery('document_id');
			
			//user's details
			$default_country= $this->identity->country;
			$this->view->default_country = $default_country;
			////
			
			//autocomplete companies
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Ccompany::GetAllCompanies($this->db,
                                                       $options);
			
			$this->view->companieslist = $companieslist;
			
			//autocomplete contact
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $contactslist = DatabaseObject_Contact::GetAllContacts($this->db,
                                                       $options);
			
			$this->view->contactslist = $contactslist;
			
			$i = 0;
			$company_id_ = array();
			$company_ = array();
			$identification_ = array();
			$email_ = array();
			$web_ = array();
			$country_p1_ = array();
			$area_p1_ = array();
			$phone_p1_ = array();
			$country_p2_ = array();
			$area_p2_ = array();
			$phone_p2_ = array();
			$country_fax_ = array();
			$area_fax_ = array();
			$phone_fax = array();
			$street_ = array();
			$house_ = array();
			$city_ = array();
			$province_ = array();
			$postal_ = array();
			$country_ = array();
			
			// starts companies adding
			foreach ($companieslist as $company) {
				$company_id_[$i]=$company->getId();
            		$comp_=$company->profile->thecompany;
				$comp2_ = str_replace("'", "\'", $comp_);
				$company_[$i]=$comp2_;
				$identification_[$i] = $company->profile->identification;
				$email_[$i] = $company->profile->email_c;
				$web_[$i] = $company->profile->company_website;
				$country_p1_[$i] = $company->profile->phone_country;
			    $area_p1_[$i] = $company->profile->phone_area;
				$phone_p1_[$i] = $company->profile->phone;
				$country_p2_[$i] = $company->profile->phone2_country;
			    $area_p2_[$i] = $company->profile->phone2_area;
				$phone_p2_[$i] = $company->profile->phone2;
				$country_fax_[$i] = $company->profile->fax_country;
			    $area_fax_[$i] = $company->profile->fax_area;
				$phone_fax_[$i] = $company->profile->fax;
				$ctype[$i] = '';	
				$recc[$i] = $company->profile->recc;	
				$irpf[$i] = $company->profile->irpf;			

            		$options = array(
                		'user_id'  => $this->identity->user_id,
                		'doc_type'   => 'ccompany',
                		'doc_id'   => $company->getId()
            		);

            		$addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
				$this->view->addresses = $addresses;
				$a = 0;
				foreach ($addresses as $address) {
				  if ($a < 1) {
					$compa_=$address->profile->street;
					$compa2_ = str_replace("'", "\'", $compa_);
					$street_[$i]=$compa2_;
					$house_[$i] = $address->profile->house;
					$city_[$i] = $address->profile->city;
					$province_[$i] = $address->profile->province;
					$postal_[$i] = $address->profile->postal_code;
					$country_[$i] = $address->profile->country;
					$a++;
					break;
				  }
				}	
				global $i;
				$i++;
			}
			//ends companies ending
			
			//starts contacts adding
			foreach ($contactslist as $contact) {
            		$comp_1 = $contact->profile->first_name;
				$comp2_1 = str_replace("'", "\'", $comp_1);
            		$comp_2 = $contact->profile->middle_name;
				$comp2_2 = str_replace("'", "\'", $comp_2);
            		$comp_3 = $contact->profile->last_name;
				$comp2_3 = str_replace("'", "\'", $comp_3);
            		$comp_4 = $contact->profile->second_last_name;
				$comp2_4 = str_replace("'", "\'", $comp_4);
				$company_[$i]=$comp2_1 ." ". $comp2_2 ." ". $comp2_3 ." ". $comp2_4;
				$company_id_[$i]=$contact->getId();
				$identification_[$i] = $contact->profile->identification;
				$email_[$i] = $contact->email;
				$web_[$i] = '';
				$country_p1_[$i] = $contact->profile->phone_country;
			    $area_p1_[$i] = $contact->profile->phone_area;
				$phone_p1_[$i] = $contact->profile->phone;
				$country_p2_[$i] = $contact->profile->phone2_country;
			    $area_p2_[$i] = $contact->profile->phone2_area;
				$phone_p2_[$i] = $contact->profile->phone2;
				$country_fax_[$i] = $contact->profile->fax_country;
			    $area_fax_[$i] = $contact->profile->fax_area;
				$phone_fax_[$i] = $contact->profile->fax;
				$ctype[$i] = 'contacto';	
				$recc[$i] = $contact->profile->recc;	
				$irpf[$i] = $contact->profile->irpf;	

            		$options = array(
                		'user_id'  => $this->identity->user_id,
                		'doc_type'   => 'contact',
                		'doc_id'   => $contact->getId()
            		);

            		$addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
				$this->view->addresses = $addresses;
				$a = 0;
				foreach ($addresses as $address) {
				  if ($a < 1) {
					$compa_=$address->profile->street;
					$compa2_ = str_replace("'", "\'", $compa_);
					$street_[$i]=$compa2_;
					$house_[$i] = $address->profile->house;
					$city_[$i] = $address->profile->city;
					$province_[$i] = $address->profile->province;
					$postal_[$i] = $address->profile->postal_code;
					$country_[$i] = $address->profile->country;
					$a++;
					break;
				  }
				}
				global $i;
				$i++;
			}
			///ends contacts adding
			
			$this->view->company_id_ = $company_id_;
			$this->view->company_ = $company_;
			$this->view->identification_ = $identification_;
			$this->view->street_ = $street_;
			$this->view->house_ = $house_;
			$this->view->city_ = $city_;
			$this->view->province_ = $province_;
			$this->view->postal_ = $postal_;
			$this->view->country_ = $country_;
			$this->view->email_ = $email_;
			$this->view->web_ = $web_;
			$this->view->country_p1_ = $country_p1_;
			$this->view->area_p1_ = $area_p1_;
			$this->view->phone_p1_ = $phone_p1_;
			$this->view->country_p2_ = $country_p2_;
			$this->view->area_p2_ = $area_p2;
			$this->view->phone_p2_ = $phone_p2_;
			$this->view->country_fax_ = $country_fax_;
			$this->view->area_fax_ = $area_fax_;
			$this->view->phone_fax_ = $phone_fax_;
			$this->view->ctype = $ctype;
			$this->view->recc = $recc;
			$this->view->irpf = $irpf;

            $company = new DatabaseObject_InvoiceCompany($this->db);
            if (!$company->loadForUser($this->identity->user_id, $company_id))
                $this->_redirect($this->getUrl());
			
			$this->view->company = $company;
			
			
			$fp = new FormProcessor_InvoiceCompanyDetails($this->db,
                                             $this->identity->user_id,
                                             $company_id);

			$this->view->fp = $fp;
			
			if (!$company_id2) {
				if ($address_id  == 0) {
					$company_id2 = $this->identity->temporary2;
				}
				else {
					$company_id2 = $address_id;
				}
			}
			
			$this->view->company_id2 = $company_id2;
											 						 
            if ($request->getPost('edit')) {
            	//$this->messenger->addMessage('Compa&ntilde;&iacute;a aregada con exito');
				if ($fp->process($request)){
					//$address->save();
					$company->save();
                    $url = $this->getUrl('editarcompania') . '?id=' . $fp->company->getId() . '&submitted=true';
                    $this->_redirect($url);
				}
            }
        }
		

		public function agregarcompaniaAction()
        {
			$request = $this->getRequest();
			$company_id = (int) $this->getRequest()->getQuery('id');
			$document_id = (int) $this->getRequest()->getQuery('document_id');
			
			//user's details
			$default_country= $this->identity->country;
			$this->view->default_country = $default_country;
			////
			
			//autocomplete companies
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Ccompany::GetAllCompanies($this->db,
                                                       $options);
			
			$this->view->companieslist = $companieslist;
			
			//autocomplete contact
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $contactslist = DatabaseObject_Contact::GetAllContacts($this->db,
                                                       $options);
			
			$this->view->contactslist = $contactslist;
			
			$i = 0;
			$company_id_ = array();
			$company_ = array();
			$identification_ = array();
			$email_ = array();
			$web_ = array();
			$country_p1_ = array();
			$area_p1_ = array();
			$phone_p1_ = array();
			$country_p2_ = array();
			$area_p2_ = array();
			$phone_p2_ = array();
			$country_fax_ = array();
			$area_fax_ = array();
			$phone_fax = array();
			$street_ = array();
			$house_ = array();
			$city_ = array();
			$province_ = array();
			$postal_ = array();
			$country_ = array();
			
			// starts companies adding
			foreach ($companieslist as $company) {
				$company_id_[$i]=$company->getId();
            		$comp_=$company->profile->thecompany;
				$comp2_ = str_replace("'", "\'", $comp_);
				$company_[$i]=$comp2_;
				$identification_[$i] = $company->profile->identification;
				$email_[$i] = $company->profile->email_c;
				$web_[$i] = $company->profile->company_website;
				$country_p1_[$i] = $company->profile->phone_country;
			    $area_p1_[$i] = $company->profile->phone_area;
				$phone_p1_[$i] = $company->profile->phone;
				$country_p2_[$i] = $company->profile->phone2_country;
			    $area_p2_[$i] = $company->profile->phone2_area;
				$phone_p2_[$i] = $company->profile->phone2;
				$country_fax_[$i] = $company->profile->fax_country;
			    $area_fax_[$i] = $company->profile->fax_area;
				$phone_fax_[$i] = $company->profile->fax;
				$ctype[$i] = '';	
				$recc[$i] = $company->profile->recc;	
				$irpf[$i] = $company->profile->irpf;

            		$options = array(
                		'user_id'  => $this->identity->user_id,
                		'doc_type'   => 'ccompany',
                		'doc_id'   => $company->getId()
            		);

            		$addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
				$this->view->addresses = $addresses;
				$a = 0;
				foreach ($addresses as $address) {
				  if ($a < 1) {
					$compa_=$address->profile->street;
					$compa2_ = str_replace("'", "\'", $compa_);
					$street_[$i]=$compa2_;
					$house_[$i] = $address->profile->house;
					$city_[$i] = $address->profile->city;
					$province_[$i] = $address->profile->province;
					$postal_[$i] = $address->profile->postal_code;
					$country_[$i] = $address->profile->country;
					$a++;
					break;
				  }
				}	
				global $i;
				$i++;
			}
			//ends companies ending
			
			//starts contacts adding
			foreach ($contactslist as $contact) {
            		$comp_1 = $contact->profile->first_name;
				$comp2_1 = str_replace("'", "\'", $comp_1);
            		$comp_2 = $contact->profile->middle_name;
				$comp2_2 = str_replace("'", "\'", $comp_2);
            		$comp_3 = $contact->profile->last_name;
				$comp2_3 = str_replace("'", "\'", $comp_3);
            		$comp_4 = $contact->profile->second_last_name;
				$comp2_4 = str_replace("'", "\'", $comp_4);
				$company_[$i]=$comp2_1 ." ". $comp2_2 ." ". $comp2_3 ." ". $comp2_4;
				$company_id_[$i]=$contact->getId();
				$identification_[$i] = $contact->profile->identification;
				$email_[$i] = $contact->email;
				$web_[$i] = '';
				$country_p1_[$i] = $contact->profile->phone_country;
			    $area_p1_[$i] = $contact->profile->phone_area;
				$phone_p1_[$i] = $contact->profile->phone;
				$country_p2_[$i] = $contact->profile->phone2_country;
			    $area_p2_[$i] = $contact->profile->phone2_area;
				$phone_p2_[$i] = $contact->profile->phone2;
				$country_fax_[$i] = $contact->profile->fax_country;
			    $area_fax_[$i] = $contact->profile->fax_area;
				$phone_fax_[$i] = $contact->profile->fax;
				$ctype[$i] = 'contacto';	
				$recc[$i] = $contact->profile->recc;	
				$irpf[$i] = $contact->profile->irpf;

            		$options = array(
                		'user_id'  => $this->identity->user_id,
                		'doc_type'   => 'contact',
                		'doc_id'   => $contact->getId()
            		);

            		$addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
				$this->view->addresses = $addresses;
				$a = 0;
				foreach ($addresses as $address) {
				  if ($a < 1) {
					$compa_=$address->profile->street;
					$compa2_ = str_replace("'", "\'", $compa_);
					$street_[$i]=$compa2_;
					$house_[$i] = $address->profile->house;
					$city_[$i] = $address->profile->city;
					$province_[$i] = $address->profile->province;
					$postal_[$i] = $address->profile->postal_code;
					$country_[$i] = $address->profile->country;
					$a++;
					break;
				  }
				}
				global $i;
				$i++;
			}
			///ends contacts adding
			
			$this->view->company_id_ = $company_id_;
			$this->view->company_ = $company_;
			$this->view->identification_ = $identification_;
			$this->view->street_ = $street_;
			$this->view->house_ = $house_;
			$this->view->city_ = $city_;
			$this->view->province_ = $province_;
			$this->view->postal_ = $postal_;
			$this->view->country_ = $country_;
			$this->view->email_ = $email_;
			$this->view->web_ = $web_;
			$this->view->country_p1_ = $country_p1_;
			$this->view->area_p1_ = $area_p1_;
			$this->view->phone_p1_ = $phone_p1_;
			$this->view->country_p2_ = $country_p2_;
			$this->view->area_p2_ = $area_p2;
			$this->view->phone_p2_ = $phone_p2_;
			$this->view->country_fax_ = $country_fax_;
			$this->view->area_fax_ = $area_fax_;
			$this->view->phone_fax_ = $phone_fax_;
			$this->view->ctype = $ctype;
			$this->view->recc = $recc;
			$this->view->irpf = $irpf;
			
			$company_id3 = $request->getPost('original_company_id');
			$address_id3 = $request->getPost('original_company_address');
			
			$fp = new FormProcessor_InvoiceCompanyDetails($this->db,
                                             $this->identity->user_id,
                                             $company_id,
											$company_id3,
											$address_id3);
											 
			if (!$company_id2) {
				if ($address_id  == 0) {
					$company_id2 = $this->identity->temporary2;
				}
				else {
					$company_id2 = $address_id;
				}
			}
			
			$this->view->company_id2 = $company_id2;
			
			if ($fp->company->getId()) {		
            $company = new DatabaseObject_InvoiceCompany($this->db);
            if (!$company->loadForUser($this->identity->user_id, $company_id))
                $this->_redirect($this->getUrl());
			
			$this->view->company = $company;
			}
			
			$this->view->fp = $fp;
											 						 
            if ($request->getPost('add')) {
            	//$this->messenger->addMessage('Compa&ntilde;&iacute;a aregada con exito');
                if ($fp->process($request)) {
                    $url = $this->getUrl('editarcompania') . '?id=' . $fp->company->getId() . '&command=cerrar';
                    $this->_redirect($url);
				}
            }
			
        }

    }
?>