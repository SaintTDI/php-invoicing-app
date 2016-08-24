<?php
    class ContactoController extends CustomControllerAction
    {
    		protected $user = null;
			
        public function init()
        {
            parent::init();
            $this->breadcrumbs->addStep('Contactos', $this->getUrl(null, 'contacto'));
			
			$this->identity = Zend_Auth::getInstance()->getIdentity();
			if (!$this->identity->company_id2){
		    		$this->identity->company_id2 = DatabaseObject_Address::temporaryUser();
			}
			if (!$this->identity->company_id3){
			$this->identity->company_id3 = DatabaseObject_Address::temporaryUser();
			}
			
			if (!$this->identity)
                $this->_redirect($this->getUrl('../index/'));
        }
		
		public function avisoAction()
        {

        }
		
		public function aviso2Action()
        {

        }

       public function companiasAction()
        {
        		$this->breadcrumbs->addStep('Compañías', $this->getUrl('companias', 'contacto'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section7 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
        		$request = $this->getRequest();
			$company_id = $request->getPost('company_id');
			$contact_id = (int) $this->getRequest()->getQuery('id');
			
			$prod= new DatabaseObject_Ccompany($this->db);		
		    
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Ccompany::GetAllCompanies($this->db,
                                                       $options);
			
			$this->view->companieslist = $companieslist;
													   
		     if ($request->getPost('delete')) {
			 	if ($company_id) {
			 		$prod->deleteCompanyProfile($this->db, $company_id);
					$prod->deleteCompany($this->db, $company_id);
                		$this->_redirect($this->getUrl('companias')); 
			   }
             }

		}
    	
     	public function editarcompaniaAction()
        {
        		$this->breadcrumbs->addStep('Editar Compañía', $this->getUrl('editarcompania', 'contacto'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section7 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
			$request = $this->getRequest();
			$company_id = (int) $this->getRequest()->getQuery('id');
			$addr_id = $request->getPost('addr_id');

			$contact_id = 0;
			$this->view->contact_id = $contact_id;
			
            $options = array(
                'user_id'  => $this->identity->user_id,
                'doc_type'   => 'ccompany',
                'doc_id'   => $company_id
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			
			$fp = new FormProcessor_CcompanyDetails($this->db,
                                             $this->identity->user_id,
                                             $company_id,
											$addr_id);

			if ($fp->company->getId()) {		
            $company = new DatabaseObject_Ccompany($this->db);
            if (!$company->loadForUser($this->identity->user_id, $company_id))
                $this->_redirect($this->getUrl());
			
			$this->view->company = $company;
			}

			$this->view->fp = $fp;
			
			$title = $fp->company_industry;

        		### create aacute; from á, etc
        		$text = str_ireplace("\xE1", "a", $title);
        		$text = str_ireplace("\xE9", "e", $text); 
        		$text = str_ireplace("\xED", "i", $text);
        		$text = str_ireplace("\xF3", "o", $text);
        		$text = str_ireplace("\xFA", "u", $text);
        		$text = str_ireplace("\xF1", "n", $text);
        		// same but for UPPERCASE
        		$text = str_ireplace("\xC1", "A", $text);
        		$text = str_ireplace("\xC9", "E", $text); 
        		$text = str_ireplace("\xCD", "I", $text);
        		$text = str_ireplace("\xD3", "O", $text);
        		$text = str_ireplace("\xDA", "U", $text);
        		$text = str_ireplace("\xD1", "N", $text);
			$company_industry =	htmlspecialchars($text);
        		### end of escape strings
			
			$this->view->company_industry = $company_industry;
				 						 
            if ($request->getPost('edit')) {
            	//$this->messenger->addMessage('Compa&ntilde;&iacute;a aregada con exito');
                if ($fp->process($request)) {
					$company->save();
                    $url = $this->getUrl('fichacompania') . '?id=' . $fp->company->getId();
                    $this->_redirect($url);
				}
            }
			
            if ($request->getPost('delete2')) {    	
			 $address_id = $request->getPost('address_id');
			 $prod= new DatabaseObject_Address($this->db);		
			 	if ($address_id) {
			 		$prod->deleteAddressProfile($this->db, $address_id);
					$prod->deleteAddress($this->db, $address_id);
                		$this->_redirect($this->getUrl('editarcompania') . '?id=' . $fp->company->getId()); 
			   }
            }
        }
		
 		public function agregarcompaniaAction()
        {
        		$this->breadcrumbs->addStep('Agregar Compañía', $this->getUrl('agregarcompania', 'contacto'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section7 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
				
			$request = $this->getRequest();
			$company_id = (int) $this->getRequest()->getQuery('id');
			$addr_id = $request->getPost('addr_id');
			
			$contact_id = 0;
			$this->view->contact_id = $contact_id;	
			
			$fp = new FormProcessor_CcompanyDetails($this->db,
                                             $this->identity->user_id,
                                             $company_id,
											$addr_id);
											 
			if ($fp->company->getId()) {		
            		$company = new DatabaseObject_Ccompany($this->db);
            		if (!$company->loadForUser($this->identity->user_id, $company_id))
                		$this->_redirect($this->getUrl());
			
				$this->view->company = $company;		
			}
			
			 if (!$company_id2) {
				if ($company_id  == 0) {
					$company_id2 = $this->identity->company_id2;
				}
				else {
					$company_id2 = $company_id;
				}
			}
			
           	$options = array(
                'user_id'  => $this->identity->user_id,
                'doc_type'   => 'ccompany',
                'doc_id'   => $company_id2
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			$this->view->company_id2 = $company_id2;
			 						 
            if ($request->getPost('add')) {
            	//$this->messenger->addMessage('Compa&ntilde;&iacute;a aregada con exito');
                if ($fp->process($request)) {
                		$this->identity->company_id2 = null;
                    $url = $this->getUrl('fichacompania') . '?id=' . $fp->company->getId();
                    $this->_redirect($url);
				}
            }
			
            if ($request->getPost('delete2')) {    	
			 $address_id = $request->getPost('address_id');
			 $prod= new DatabaseObject_Address($this->db);		
			 	if ($address_id) {
			 		$prod->deleteAddressProfile($this->db, $address_id);
					$prod->deleteAddress($this->db, $address_id);
                		$this->_redirect($this->getUrl('agregarcompania')); 
			   }
            }
			
			$this->view->fp = $fp;
			
			$title = $fp->company_industry;

        		### create aacute; from á, etc
        		$text = str_ireplace("\xE1", "a", $title);
        		$text = str_ireplace("\xE9", "e", $text); 
        		$text = str_ireplace("\xED", "i", $text);
        		$text = str_ireplace("\xF3", "o", $text);
        		$text = str_ireplace("\xFA", "u", $text);
        		$text = str_ireplace("\xF1", "n", $text);
        		// same but for UPPERCASE
        		$text = str_ireplace("\xC1", "A", $text);
        		$text = str_ireplace("\xC9", "E", $text); 
        		$text = str_ireplace("\xCD", "I", $text);
        		$text = str_ireplace("\xD3", "O", $text);
        		$text = str_ireplace("\xDA", "U", $text);
        		$text = str_ireplace("\xD1", "N", $text);
			$company_industry =	htmlspecialchars($text);
        		### end of escape strings
			
			$this->view->company_industry = $company_industry;
			
        }

    		public function fichacompaniaAction()
        {
        		$this->breadcrumbs->addStep('Ficha Compañía', $this->getUrl('fichacompania', 'contacto'));
			
			$request = $this->getRequest();
			$company_id = (int) $this->getRequest()->getQuery('id');
			$addr_id = $request->getPost('addr_id');
			
			$now__ = date('d-m-Y');
			$now_ = strtotime($now__);
			$year__ = date('Y', $now_);
			
			//user company's details
			$comp__ = new DatabaseObject_Company($this->db);
            $comp__->loadForUser($this->identity->user_id);
			
			$default_iva = $comp__->profile->iva;
			$default_iva2 = $comp__->profile->iva2;
			$default_retention = $comp__->profile->retention;
			$default_expense_number = $comp__->profile->expense_number;
			$default_number_start = $comp__->profile->number_start;
			$default_consecutive = $comp__->profile->consecutive;
			$default_number_zero = $comp__->profile->number_zero;
			$default_number_start_letter = $comp__->profile->number_start_letter;
			$default_currency = $comp__->profile->currency;
			$default_recc = $comp__->profile->recc;
			$default_year_start = $comp__->profile->year_start;

			$contact_id = 0;
			$this->view->contact_id = $contact_id;
			
            $options = array(
                'user_id'  => $this->identity->user_id,
                'doc_type'   => 'ccompany',
                'doc_id'   => $company_id
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			
			$fp = new FormProcessor_CcompanyDetails($this->db,
                                             $this->identity->user_id,
                                             $company_id,
											$addr_id);

			if ($fp->company->getId()) {		
            $company = new DatabaseObject_Ccompany($this->db);
            if (!$company->loadForUser($this->identity->user_id, $company_id))
                $this->_redirect($this->getUrl());
			
			$this->view->company = $company;
			}

			$this->view->fp = $fp;
			
			$title = $fp->company_industry;

        		### create aacute; from á, etc
        		$text = str_ireplace("\xE1", "a", $title);
        		$text = str_ireplace("\xE9", "e", $text); 
        		$text = str_ireplace("\xED", "i", $text);
        		$text = str_ireplace("\xF3", "o", $text);
        		$text = str_ireplace("\xFA", "u", $text);
        		$text = str_ireplace("\xF1", "n", $text);
        		// same but for UPPERCASE
        		$text = str_ireplace("\xC1", "A", $text);
        		$text = str_ireplace("\xC9", "E", $text); 
        		$text = str_ireplace("\xCD", "I", $text);
        		$text = str_ireplace("\xD3", "O", $text);
        		$text = str_ireplace("\xDA", "U", $text);
        		$text = str_ireplace("\xD1", "N", $text);
			$company_industry =	htmlspecialchars($text);
        		### end of escape strings
			
			$this->view->company_industry = $company_industry;
			
			///data and information for BUDGET
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $budgetslist = DatabaseObject_Budget::GetAllBudgets($this->db, $options);
			
			$this->view->budgetslist = $budgetslist;
			
			$budget_id_ = array();
			$number_ = array();
			$value_ = array();
			$project_ = array();
			$expire_ = array();
			$status_ = array();
			$class_ = array();
			$prospects = array();

			foreach ($budgetslist as $budget) {
            		
            	$company_ = $budget->profile->company_id;
			$company_name = $budget->profile->thecompany;
			$default_year_start_ = strtotime($default_year_start);
	
            $options = array(
                'user_id' => $this->identity->user_id,
                'document_id'   => $budget->getId()
            );

            $companyBudget = DatabaseObject_BudgetCompany::GetCompanies($this->db, $options);

			$b=0;
			foreach ($companyBudget as $client) {
				if ($b==0){
				  $id2_ = $client->profile->identification;
				  $b++;
				}
			}

            	if ($fp->thecompany == $company_name){
			   if ($fp->identification == $id2_){
            			$budget_id_[] = $budget->getId();
					$disc_ = $budget->profile->discount;
					$discount = (100 - $disc_)/100;
					$ts_created_ = $budget->profile->budget_date;
					$ts_created = strtotime($ts_created_);
					$number_[] = $budget->budget_number;
					$value_[] = $budget->profile->base;
					$project_[] = $budget->profile->budget_project;
					$begin_ = $budget->profile->budget_date;
					$valid_ = $budget->profile->budget_valid;
					
					$prospects[] = $company_name;

					if ($budget->profile->budget_valid){
						if ($budget->profile->budget_valid == 0.00){
							$expire_[] = $budget->profile->budget_date;
						}
						else {
							$expire_[] = date('d-m-Y', strtotime($budget->profile->budget_date. ' + ' . $budget->profile->budget_valid . 'days'));
						}
					}
					else {
						$expire_[] = $budget->profile->budget_date;
					}
					
					if ($budget->profile->transformed){
						$status_[] = "Facturado";
						$class_[] = "cobrada";
					}
					elseif ($budget->profile->published){
						$status_[] = "Enviado";
						$class_[] = "parcial";
					}
					else{
						$status_[] = "Guardado";
						$class_[] = "borrador";
					}
				  
				  }
			    }
			  }

			$this->view->budget_id_ = $budget_id_;
			$this->view->number_ = $number_;
			$this->view->value_ = $value_;
			$this->view->project_ = $project_;
			$this->view->expire_ = $expire_;
			$this->view->status_ = $status_;
			$this->view->class_ = $class_;
			$this->view->prospects = $prospects;
			//ends analytics	 for BUDGETS	
			
			///data and information for PROJECTS
			$i = 0;
			$projectlist = array();
			$project_id_ = array();
			$namep_ = array();
			$clientp_ = array();
			$budgetp_ = array();
			$responsiblep_ = array();
			$statusp_ = array();
			$classp_ = array();
			$projects = array();
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $projects = DatabaseObject_Project::GetAllProjects($this->db, $options);
			
			$this->view->projects = $projects;
			
			foreach ($projects as $project) {
            		
            	$company_ = $project->profile->client;
			$compa_id_ = $project->profile->company_id;
			$default_year_start_ = strtotime($default_year_start);

            		if ($fp->thecompany == $company_){
            		  if ($company_id == $compa_id_){
					if ($project->project_title){
						if (!in_array($project->project_title, $projectlist)){
							$project_id_[$i] = $project->getId();
							$namep_[$i] = $project->project_title;
							$clientp_[$i] = $project->profile->client;
							$budgetp_[$i] = $project->profile->budget;
							$responsiblep_[$i] = $project->profile->responsible;
						
							$now_ = date("d-m-Y");
							$end_ = $project->profile->ends;

							if($project->profile->ends){
								if (strtotime($now_) > strtotime($project->profile->ends)){
									$statusp_[$i] =  'Finalizado';
									$classp_[$i] =  'cobrada';
								}
								elseif (strtotime($now_) >= strtotime($project->profile->start) && strtotime($now_) <= strtotime($project->profile->ends) ){
									$statusp_[$i] =  'En curso';
									$classp_[$i] =  'parcial';
								}
								else{
									$statusp_[$i] =  'Por iniciar';
									$classp_[$i] =  'pendiente';
								}
							}
							else{
								$statusp_[$i] =  'N/A';
								$classp_[$i] =  'borrador';
							}

							$projectlist[$i] = $project->project_title;
							$i++;
					   }
					 }
				   }
			     }
			}
			//ends analytics	 for PROJECTS
			
			///data and information for INCOMMING/Invoices
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $invoiceslist = DatabaseObject_Invoice::GetAllInvoices($this->db, $options);
			
			$this->view->invoiceslist = $invoiceslist;
			
		    $options = array(
                'user_id' => $this->identity->user_id,
                'document_type' => 'invoice'
            );
			
            $itemslist = DatabaseObject_Item::GetAllInvoiceItems($this->db, $options);
			
			$this->view->itemslist = $itemslist;
			
			$product_id_ = array();
			$invoice_id__ = array();
					
			$number_i = array();
			$value_i = array();
			$project_i = array();
			$expire_i = array();
			$status_i = array();
			$class_i = array();
			$clients = array();
			
			$tot_month_1 = 0;
			$tot_month_2 = 0;
			$tot_month_3 = 0;
			$tot_month_4 = 0;
			$tot_month_5 = 0;
			$tot_month_6 = 0;
			$tot_month_7 = 0;
			$tot_month_8 = 0;
			$tot_month_9 = 0;
			$tot_month_10 = 0;
			$tot_month_11 = 0;
			$tot_month_12 = 0;
			
			$total_iva_i = 0;
			$total_iva_up_i = 0;
			$total_i = 0;
			$total_net_i = 0;
			$total_up_i = 0;
			$total_net_up_i = 0;
			
			$code_p = array();
			$name_p = array();
			$currency_p = array();
			$punit_p = array();
			$iva_p = array();
			$iva2_p = array();
			$quantity_p = array();
			$total_p = array();
			$products = array();
			$invoices_paid = array();

			foreach ($invoiceslist as $invoice) {
            	
			$disc_ = $invoice->profile->discount;
			$discount = (100 - $disc_)/100;
            	$company_ = $invoice->profile->company_id;
			$company_name = $invoice->profile->thecompany;
			$default_year_start_ = strtotime($default_year_start);
			$published_ = $invoice->profile->published;
			$invoice_id_ = $invoice->getId();
			$ts_created_ = $invoice->profile->invoice_date;
			$ts_created = strtotime($ts_created_);
			$amountpay_ = $invoice->profile->amountpay;
				
          	$options = array(
                'user_id' => $this->identity->user_id,
                'document_id'   => $invoice->getId()
            );

            $companyInvoice = DatabaseObject_InvoiceCompany::GetCompanies($this->db, $options);
			
			$a=0;
			foreach ($companyInvoice as $client) {
				if ($a==0){
				  $id_ = $client->profile->identification;
				  $a++;
				}
			}

			//product's info
			if ($fp->thecompany == $company_name){
			  if ($fp->identification == $id_){
				if ($published_){
					if ($ts_created >= $default_year_start_){
						foreach ($itemslist as $item) {
							if ($invoice_id_ == $item->document_id){
								if (!in_array($item->profile->code, $products)){
									$quan_pro = $item->profile->quantity;
									$price_pro = $item->profile->unit_price;
						
									if (!$discount){
										$discount = 1;
									}
									
									$tot_pro_r = $quan_pro * $price_pro * $discount;
									
									$product_id_[] = $item->profile->product_id;
									$code_p[] = $item->profile->code;
									$name_p[] = $item->profile->detail;
									$currency_p[] = $item->profile->currency;
									$punit_p[] = $item->profile->unit_price;
									$iva_p[] = $item->profile->iva;
									$iva2_p[] = $item->profile->iva2;
									$quantity_p[] = $item->profile->quantity;
									$total_p[] = $tot_pro_r;
									$products[] = $item->profile->code;
						     	}
								else {
									$key = array_search($item->profile->code, $products);
									$quan_pro = $item->profile->quantity;
									$price_pro = $item->profile->unit_price;
						
									if (!$discount){
										$discount = 1;
									}
									
									$tot_pro_r = $quan_pro * $price_pro * $discount;
										
									$value1 = $quantity_p[$key] + $item->profile->quantity;
									$value2 = $total_p[$key] + $tot_pro_r;
									$quantity_p[$key] = $value1;
									$total_p[$key] = $value2;
								}
					    		}
				  		 }
					   }
					}
				  }
				}

				//invoice's info
            		if ($fp->thecompany == $company_name){
				  if ($fp->identification == $id_){
					if ($published_){
						if ($ts_created >= $default_year_start_){

					$disc_ = $invoice->profile->discount;
					$discount = (100 - $disc_)/100;
					$invoice_id__[] = $invoice->getId();
					$number_i[] = $invoice->profile->start_letter .' - '. $invoice->profile->number_zero . $invoice->invoice_number;
					$value_i[] = $invoice->profile->total;
					$project_i[] = $invoice->profile->invoice_project;
					$begin_ = $invoice->profile->invoice_date;
					$valid_ = $invoice->profile->invoice_valid;
					$paid_ = $invoice->profile->paid;
					$amountpay_ = $invoice->profile->amountpay;
					
					$invoices_paid[] = $invoice->profile->paid;
					
					//info for projects table
					if ($invoice->profile->invoice_project){
						if (!in_array($invoice->profile->invoice_project, $projectlist)){
							$project_id_[$i] = $invoice->profile->project_id;
							$namep_[$i] = $invoice->profile->invoice_project;
							$clientp_[$i] = $invoice->profile->thecompany;
							$budgetp_[$i] = 0;
							$responsiblep_[$i] = "N/A";
							$statusp_[$i] = "N/A";
							$classp_[$i] = "borrador";

							$projectlist[$i] = $invoice->profile->invoice_project;
							$i++;
						}
					}

					if ($invoice->profile->invoice_valid){
						if ($invoice->profile->invoice_valid == 0.00){
							$expire_i[] = $invoice->profile->invoice_date;
							$valid_until__ = $invoice->profile->invoice_date;
						}
						else {
							$expire_i[] = date('d-m-Y', strtotime($invoice->profile->invoice_date. ' + ' . $invoice->profile->invoice_valid . 'days'));
							$valid_until__ = date('d-m-Y', strtotime($invoice->profile->invoice_date . ' + ' . $invoice->profile->invoice_valid . ' days'));
						}
					}
					else {
						$expire_i[] = $invoice->profile->invoice_date;
						$valid_until__ = $invoice->profile->invoice_date;
					}
					
					//for main list status
					$now_ = date('d-m-Y');
					
					if($paid_){
						$status_i[] = "Cobrada";
						$class_i[] = "cobrada";
					}
					elseif($amountpay_){
						$status_i[] = "Parcialmente Cobrada";
						$class_i[] = "parcial";
					}
					elseif(isset($published_) && strtotime($valid_until__) >= strtotime($now_)){
						$status_i[] = "Pendiente";
						$class_i[] = "pendiente";
					}
					elseif(isset($published_) && strtotime($valid_until__) < strtotime($now_)){
						$status_i[] = "Vencida";
						$class_i[] = "vencida";
					}
					else {
						$status_i[] = "Borrador";
						$class_i[] = "borrador";
					}
					///// ends main list status

					$clients[] = $company_;
					
					$tot_invoice = $invoice->profile->total;
																			
					$total_i = $total_i + $tot_invoice;
					$total_net_i = $total_net_i + $invoice->profile->base * (100 - $invoice->profile->retention) / 100;
									
					if (!$paid_){
						$total_up_i =  $total_up_i + $tot_invoice - $amountpay_;
						$total_net_up_i = $total_net_up_i + $invoice->profile->base * (100 - $invoice->profile->retention) / 100;

						if ($amountpay_){
							$sub_tt = $invoice->profile->base * (100 - $invoice->profile->retention) / 100;
							$amtpy = $amountpay_ * $sub_tt /$invoice->profile->total;
							$total_net_up_i = $total_net_up_i - $amtpy;
						}
					}
					
						foreach ($itemslist as $item) {
							if ($invoice_id_ == $item->document_id){
							
									$quan_pro = $item->profile->quantity;
									$price_pro = $item->profile->unit_price;
									$subtotal = $item->profile->subtotal;
									$iva_ = $item->profile->iva;
									$iva2_ = $item->profile->iva2;
						
									if (!$discount){
										$discount = 1;
									}
									
									$tot_pro_r = $subtotal * $discount;
									$tot_iva1 = $tot_pro_r * $iva_ * 0.01;
									$tot_iva2 = $tot_pro_r * $iva2_ * 0.01;

									$total_iva_i = $total_iva_i + $tot_iva1;
									
									if (!$paid_){
										$total_iva_up_i = $total_iva_up_i + $tot_iva1;
										
										if ($amountpay_){
												$iva_avrg = $amountpay_ * $tot_iva1 / $invoice->profile->total;
												$total_iva_up_i = $total_iva_up_i - $iva_avrg;
										}
									}
									
									//$x = 'Quantity:' . $quan_pro . 'Unit P:' . $price_pro . 'Discount:' . $discount . '<br>';
									//echo $x;

									$month__ = date('n', $ts_created);
									$year___ = date('Y', $ts_created);
									$month_start = date('n', $default_year_start_);
									$date_ = date('d-m-Y', $ts_created);
									
									if ($ts_created >= $default_year_start_ && $year___ == $year__){				
										if($month__ == 1){
											$month_1 = 'Enero';
											$year_1 = $year___;	
	
											$tot_month_1 = $tot_month_1 + $tot_pro_r;
										}
										
										elseif($month__ == 2){
											$month_2 = 'Febrero';
											$year_2 = $year___;	
	
											$tot_month_2 = $tot_month_2 + $tot_pro_r;
										}
										
										elseif($month__ == 3){
											$month_3 = 'Marzo';
											$year_3 = $year___;	
	
											$tot_month_3 = $tot_month_3 + $tot_pro_r;
										}
										
										elseif($month__ == 4){
											$month_4 = 'Abril';
											$year_4 = $year___;	
	
											$tot_month_4 = $tot_month_4 + $tot_pro_r;
										}
										
										elseif($month__ == 5){
											$month_5 = 'Mayo';
											$year_5 = $year___;	
	
											$tot_month_5 = $tot_month_5 + $tot_pro_r;
										}
										
										elseif($month__ == 6){
											$month_6 = 'Junio';
											$year_6 = $year___;	
	
											$tot_month_6 = $tot_month_6 + $tot_pro_r;
										}
										
										elseif($month__ == 7){
											$month_7 = 'Julio';
											$year_7 = $year___;	
	
											$tot_month_7 = $tot_month_7 + $tot_pro_r;
										}
										
										elseif($month__ == 8){
											$month_8 = 'Agosto';
											$year_8 = $year___;	
	
											$tot_month_8 = $tot_month_8 + $tot_pro_r;
										}
										
										elseif($month__ == 9){
											$month_9 = 'Septiembre';
											$year_9 = $year___;	
	
											$tot_month_9 = $tot_month_9 + $tot_pro_r;
										}
										
										elseif($month__ == 10){
											$month_10 = 'Octubre';
											$year_10 = $year___;	
	
											$tot_month_10 = $tot_month_10 + $tot_pro_r;
										}
										
										elseif($month__ == 11){
											$month_11 = 'Noviembre';
											$year_11 = $year___;	
	
											$tot_month_11 = $tot_month_11 + $tot_pro_r;
										}
										
										else {
											$month_12 = 'Diciembre';
											$year_12 = $year___;	
	
											$tot_month_12 = $tot_month_12 + $tot_pro_r;
										}
									}
								 }
							   }			
				  		    }
					    }
					}
				}
			}

			$now_ = date('d-m-Y');
			$this->view->now_ = $now_;
			
			$this->view->year__ = $year__;
			
			$this->view->invoices_paid = $invoices_paid;

			$this->view->total_ = $total_;
			$this->view->invoice_id__ = $invoice_id__;
			$this->view->number_i = $number_i;
			$this->view->value_i = $value_i;
			$this->view->project_i = $project_i;
			$this->view->expire_i = $expire_i;
			$this->view->status_i = $status_i;
			$this->view->class_i = $class_i;
			$this->view->clients = $clients;
			
			$this->view->month_start = $month_start;
			$this->view->month__ = $month__;
			
			$this->view->month_1 = $month_1;
			$this->view->year_1 = $year_1;
			$this->view->tot_month_1 = $tot_month_1;
									
			$this->view->month_2 = $month_2;
			$this->view->year_2 = $year_2;
			$this->view->tot_month_2 = $tot_month_2;
									
			$this->view->month_3 = $month_3;
			$this->view->year_3 = $year_3;
			$this->view->tot_month_3 = $tot_month_3;
									
			$this->view->month_4 = $month_4;
			$this->view->year_4 = $year_4;
			$this->view->tot_month_4 = $tot_month_4;
									
			$this->view->month_5 = $month_5;
			$this->view->year_5 = $year_5;
			$this->view->tot_month_5 = $tot_month_5;
									
			$this->view->month_6 = $month_6;
			$this->view->year_6 = $year_6;
			$this->view->tot_month_6 = $tot_month_6;
									
			$this->view->month_7 = $month_7;
			$this->view->year_7 = $year_7;
			$this->view->tot_month_7 = $tot_month_7;
									
			$this->view->month_8 = $month_8;
			$this->view->year_8 = $year_8;
			$this->view->tot_month_8 = $tot_month_8;
									
			$this->view->month_9 = $month_9;
			$this->view->year_9 = $year_9;
			$this->view->tot_month_9 = $tot_month_9;
									
			$this->view->month_10 = $month_10;
			$this->view->year_10 = $year_10;
			$this->view->tot_month_10 = $tot_month_10;
									
			$this->view->month_11 = $month_11;
			$this->view->year_11 = $year_11;
			$this->view->tot_month_11 = $tot_month_11;
									
			$this->view->month_12 = $month_12;
			$this->view->year_12 = $year_12;
			$this->view->tot_month_12 = $tot_month_12;
			
			$this->view->product_id_ = $product_id_;
			$this->view->code_p = $code_p;
			$this->view->name_p = $name_p;
			$this->view->currency_p = $currency_p;
			$this->view->punit_p = $punit_p;
			$this->view->iva_p = $iva_p;
			$this->view->iva2_p = $iva2_p;
			$this->view->quantity_p = $quantity_p;
			$this->view->total_p = $total_p;
			$this->view->products = $products;
			//ends analytics	 for incomming/invoices	
			
			//projects view
			$this->view->project_id_ = $project_id_;
			$this->view->projectlist = $projectlist;
			$this->view->namep_ = $namep_;
			$this->view->clientp_ = $clientp_;
			$this->view->budgetp_ = $budgetp_;
			$this->view->responsiblep_ = $responsiblep_;
			$this->view->statusp_ = $statusp_;
			$this->view->classp_ = $classp_;
			//
			
			///expenses data and information
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $expenseslist = DatabaseObject_Expense::GetAllExpenses($this->db, $options);
			
			$this->view->expenseslist = $expenseslist;
			
		    $options = array(
                'user_id' => $this->identity->user_id,
                'document_type' => 'expense'
            );
			
            $itemsliste = DatabaseObject_Expitem::GetAllExpenseItems($this->db, $options);
			
			$this->view->itemsliste = $itemsliste;
			
			$expense_id__ = array();
			$number_e = array();
			$value_e = array();
			$project_e = array();
			$begin_e = array();
			$valid_e = array();
			$expire_e = array();
			$status_e = array();
			$class_e = array();
			$providers = array();
			$tot_producte = 0;
			$net_producte = 0;
			$iva_producte = 0;
			$tot_month_1e = 0;
			$tot_month_2e = 0;
			$tot_month_3e = 0;
			$tot_month_4e = 0;
			$tot_month_5e = 0;
			$tot_month_6e = 0;
			$tot_month_7e = 0;
			$tot_month_8e = 0;
			$tot_month_9e = 0;
			$tot_month_10e = 0;
			$tot_month_11e = 0;
			$tot_month_12e = 0;
			
			$total_iva_e = 0;
			$total_iva_up_e = 0;
			$total_e = 0;
			$total_net_e = 0;
			$total_up_e = 0;
			$total_net_up_e = 0;
			
			$full_namee = $fp->thecompany;
			
			foreach ($expenseslist as $expense) {
						
            	$company_e = $expense->profile->thecompany;
			$cont_ids_e = $fp->identification;
			$default_year_start_e = strtotime($default_year_start);
			$ts_created_e = $expense->profile->expense_date;
			$ts_createde = strtotime($ts_created_e);
			$paid_ = $expense->profile->paid;
			$amountpay_ = $expense->profile->amountpay;
				
          	$options = array(
                'user_id' => $this->identity->user_id,
                'document_id'   => $expense->getId()
            );

            $companyExpense = DatabaseObject_ExpenseCompany::GetCompanies($this->db, $options);
			
			$c=0;
			foreach ($companyExpense as $client) {
				if ($c==0){
				  $id3_ = $client->profile->identification;
				  $c++;
				}
			}
			
            		if ($full_namee == $company_e){
            			if ($cont_ids_e == $id3_){
            				
            			$expense_id_ = $expense->getId();
					$expense_id__[] = $expense->getId();
					$disc_e = $expense->profile->discount;
					$discounte = (100 - $disc_e)/100;
					$number_e[] = $expense->expense_number;
					$value_e[] = $expense->profile->total;
					$project_e[] = $expense->profile->expense_project;
					$begin_e = $expense->profile->expense_date;
					$paid_e = $expense->profile->paid;

					if ($expense->profile->expense_valid){
						if ($expense->profile->expense_valid == 0.00){
							$valid_until__ = $expense->profile->expense_date;
							$expire_e[] = $expense->profile->expense_date;
						}
						else {
							$valid_until__ = date('d-m-Y', strtotime($expense->profile->expense_date. ' + ' . $expense->profile->expense_valid . 'days'));
							$expire_e[] = date('d-m-Y', strtotime($expense->profile->expense_date. ' + ' . $expense->profile->expense_valid . 'days'));
						}
					}
					else {
						$valid_until__ = $expense->profile->expense_date;
						$expire_e[] = $expense->profile->expense_date;
					}
					
					$now_ = date('d-m-Y');
					
					if($paid_e){
						$status_e[] = "Pagado";
						$class_e[] = "cobrada";
					}
					elseif($amountpay_){
						$status_e[] = "Parcialmente Pagado";
						$class_e[] = "parcial";
					}
					elseif(strtotime($valid_until__) > strtotime($now_)){
						$status_e[] = "Pendiente";
						$class_e[] = "pendiente";
					}
					else {
						$status_e[] = "Vencido";
						$class_e[] = "vencida";
					}
					
					$providers[] = $company_e;
					
					$tot_expense = $expense->profile->total;
																			
					$total_e =  $total_e + $tot_expense;
					$total_net_e = $total_net_e + $expense->profile->base * (100 - $expense->profile->retention) / 100;
									
					if (!$paid_e){
							$total_up_e = $total_up_e + $tot_expense - $amountpay_;
							$total_net_up_e = $total_net_up_e + $expense->profile->base * (100 - $expense->profile->retention) / 100;

							if ($amountpay_){
								$sub_tt = $expense->profile->base * (100 - $expense->profile->retention) / 100;
								$amtpy = $amountpay_ * $sub_tt /$expense->profile->total;
								$total_net_up_e = $total_net_up_e - $amtpy;
							}
					
					}
					
						foreach ($itemsliste as $item) {
							if ($expense_id_ == $item->document_id){
							
									$quan_proe = $item->profile->quantity;
									$price_proe = $item->profile->unit_cost;
									$subtotale = $item->profile->subtotal;
									$iva_e = $item->profile->iva_p;
									$iva2_e = $item->profile->iva_p2;
						
									if (!$discounte){
										$discounte = 1;
									}
									
									$tot_pro_re = $subtotale * $discounte;
									$tot_iva1e = $tot_pro_re * $iva_e * 0.01;
									$tot_iva2e = $tot_pro_re * $iva2_e * 0.01;
									
									$total_iva_e = $total_iva_e + $tot_iva1e;
									
									if (!$paid_e){
										$total_iva_up_e = $total_iva_up_e + $tot_iva1e;
										
										if ($amountpay_){
												$iva_avrg = $amountpay_ * $tot_iva1e / $expense->profile->total;
												$total_iva_up_e = $total_iva_up_e - $iva_avrg;
										}
									}
					
									//$x = 'Quantity:' . $quan_pro . 'Unit P:' . $price_pro . 'Discount:' . $discount . '<br>';
									//echo $x;

									$month__e = date('n', $ts_createde);
									$year___e = date('Y', $ts_createde);
									$month_starte = date('n', $default_year_start_e);
									$date_e = date('d-m-Y', $ts_createde);
									
									if ($ts_createde >= $default_year_start_e && $year___e == $year__){
										if($month__e == 1){
											$month_1e = 'Enero';
											$year_1e = $year___e;	
	
											$tot_month_1e = $tot_month_1e + $tot_pro_re;
										}
										
										elseif($month__e == 2){
											$month_2e = 'Febrero';
											$year_2e = $year___e;	
	
											$tot_month_2e = $tot_month_2e + $tot_pro_re;
										}
										
										elseif($month__e == 3){
											$month_3e = 'Marzo';
											$year_3e = $year___e;	
	
											$tot_month_3e = $tot_month_3e + $tot_pro_re;
										}
										
										elseif($month__e == 4){
											$month_4e = 'Abril';
											$year_4e = $year___e;	
	
											$tot_month_4e = $tot_month_4e + $tot_pro_re;
										}
										
										elseif($month__e == 5){
											$month_5e = 'Mayo';
											$year_5e = $year___e;	
	
											$tot_month_5e = $tot_month_5e + $tot_pro_re;
										}
										
										elseif($month__e == 6){
											$month_6e = 'Junio';
											$year_6e = $year___e;	
	
											$tot_month_6e = $tot_month_6e + $tot_pro_re;
										}
										
										elseif($month__e == 7){
											$month_7e = 'Julio';
											$year_7e = $year___e;	
	
											$tot_month_7e = $tot_month_7e + $tot_pro_re;
										}
										
										elseif($month__e == 8){
											$month_8e = 'Agosto';
											$year_8e = $year___e;	
	
											$tot_month_8e = $tot_month_8e + $tot_pro_re;
										}
										
										elseif($month__e == 9){
											$month_9e = 'Septiembre';
											$year_9e = $year___e;	
	
											$tot_month_9e = $tot_month_9e + $tot_pro_re;
										}
										
										elseif($month__e == 10){
											$month_10e = 'Octubre';
											$year_10e = $year___e;	
	
											$tot_month_10e = $tot_month_10e + $tot_pro_re;
										}
										
										elseif($month__e == 11){
											$month_11e = 'Noviembre';
											$year_11e = $year___e;	
	
											$tot_month_11e = $tot_month_11e + $tot_pro_re;
										}
										
										else {
											$month_12e = 'Diciembre';
											$year_12e = $year___e;	
	
											$tot_month_12e = $tot_month_12e + $tot_pro_re;
										}	
									}
				  		      }
					      }
				      }
				  }
			}

			$this->view->year__ = $year__;

			$this->view->total_i = $total_i;
			$this->view->total_net_i = $total_net_i;
			$this->view->total_iva_i = $total_iva_i;
			$this->view->total_up_i = $total_up_i;
			$this->view->total_net_up_i = $total_net_up_i;
			$this->view->total_iva_up_i = $total_iva_up_i;
			
			$this->view->total_e = $total_e;
			$this->view->total_net_e = $total_net_e;
			$this->view->total_iva_e = $total_iva_e;
			$this->view->total_up_e = $total_up_e;
			$this->view->total_net_up_e = $total_net_up_e;
			$this->view->total_iva_up_e = $total_iva_up_e;
			
			$this->view->expense_id__ = $expense_id__;
			$this->view->number_e = $number_e;
			$this->view->value_e = $value_e;
			$this->view->project_e = $project_e;
			$this->view->expire_e = $expire_e;
			$this->view->status_e = $status_e;
			$this->view->class_e = $class_e;
			$this->view->providers = $providers;
			
			$this->view->month_starte = $month_starte;
			$this->view->month__e = $month__e;
			
			$this->view->tot_producte = $tot_producte;
			$this->view->net_producte = $net_producte;
			$this->view->iva_producte = $iva_producte;
			
			$this->view->month_1e = $month_1e;
			$this->view->year_1e = $year_1e;
			$this->view->tot_month_1e = $tot_month_1e;
									
			$this->view->month_2e = $month_2e;
			$this->view->year_2e = $year_2e;
			$this->view->tot_month_2e = $tot_month_2e;
									
			$this->view->month_3e = $month_3e;
			$this->view->year_3e = $year_3e;
			$this->view->tot_month_3e = $tot_month_3e;
									
			$this->view->month_4e = $month_4e;
			$this->view->year_4e = $year_4e;
			$this->view->tot_month_4e = $tot_month_4e;
									
			$this->view->month_5e = $month_5e;
			$this->view->year_5e = $year_5e;
			$this->view->tot_month_5e = $tot_month_5e;
									
			$this->view->month_6e = $month_6e;
			$this->view->year_6e = $year_6e;
			$this->view->tot_month_6e = $tot_month_6e;
									
			$this->view->month_7e = $month_7e;
			$this->view->year_7e = $year_7e;
			$this->view->tot_month_7e = $tot_month_7e;
									
			$this->view->month_8e = $month_8e;
			$this->view->year_8e = $year_8e;
			$this->view->tot_month_8e = $tot_month_8e;
									
			$this->view->month_9e = $month_9e;
			$this->view->year_9e = $year_9e;
			$this->view->tot_month_9e = $tot_month_9e;
									
			$this->view->month_10e = $month_10e;
			$this->view->year_10e = $year_10e;
			$this->view->tot_month_10e = $tot_month_10e;
									
			$this->view->month_11e = $month_11e;
			$this->view->year_11e = $year_11e;
			$this->view->tot_month_11e = $tot_month_11e;
									
			$this->view->month_12e = $month_12e;
			$this->view->year_12e = $year_12e;
			$this->view->tot_month_12e = $tot_month_12e;
			//ends analytics	
								 
        }

    	
        public function editarAction()
        {
        		$this->breadcrumbs->addStep('Editar', $this->getUrl('editar', 'contacto'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section7 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
			$request = $this->getRequest();	
			$contact_id = (int) $this->getRequest()->getQuery('id');
			$addr_id = $request->getPost('addr_id');
			$comp_id = $request->getPost('company_id');
			$addr_id2 = $request->getPost('addr_id2');
			
			if (!$company_id2) {
				if ($contact_id  == 0) {
					$company_id2 = $this->identity->company_id2;
				}
				else {
					$company_id2 = $contact_id;
				}
			}
			
			$this->view->company_id2 = $company_id2;
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Ccompany::GetAllCompanies($this->db,
                                                       $options);
			
			$this->view->companieslist = $companieslist;
						
			$i = 0;
			$company_ = array();
			$data_ = array();
			$address_ = array();
            foreach ($companieslist as $company) {
            		$comp_=$company->profile->thecompany;
				$comp2_ = str_replace("'", "\'", $comp_);
				$company_[]=$comp2_;
				$data_[] = $company->getId();
				$address_[] = unserialize(base64_decode($company->profile->company_address));
				$i++;
			}
			
			$this->view->company_ = $company_;
			$this->view->data_ = $data_;
			$this->view->address_ = $address_;
			
            $addressid = array();
			$i = 0;
            foreach ($companieslist as $company) {
            		$options = array(
                		'user_id' => $this->identity->user_id,
                		'doc_type'   => 'ccompany',
                		'doc_id'   => $company->getId()
            		);
				
            		$addressid [$i] = DatabaseObject_Address::GetAddressesId($this->db, $options);
				$i++;
			}
			
			$this->view->addressid = $addressid;
			
            $options = array(
                'user_id' => $this->identity->user_id,
                'doc_type'   => 'contact',
                'doc_id'   => $contact_id
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			
            $contact = new DatabaseObject_Contact($this->db);	
            if (!$contact->loadForUser($this->identity->user_id, $contact_id))
                $this->_redirect($this->getUrl());
            
			$this->view->contact = $contact;
		
			$fp = new FormProcessor_Contact($this->db,
                                             $this->identity->user_id,
                                             $contact_id,
											$addr_id,
											$comp_id,
											$addr_id2);
											 
			$this->view->fp = $fp;
			
			$fp->company_address = unserialize(base64_decode($fp->company_address));

			if ($request->getPost('edit')) {
            	   if ($fp->process($request)) {
                 	$contact->save();
					$this->_redirect($this->getUrl('fichacontacto') . '?id=' . $fp->contact->getId()); 
					$this->identity->company_id2 = null;		    
                }
            }
			
            if ($request->getPost('delete2')) {    	
			 $address_id = $request->getPost('address_id');
			 $prod= new DatabaseObject_Address($this->db);		
			 	if ($address_id) {
			 		$prod->deleteAddressProfile($this->db, $address_id);
					$prod->deleteAddress($this->db, $address_id);
                		$this->_redirect($this->getUrl('editar') . '?id=' . $fp->contact->getId()); 
			   }
            }	
			
            if ($request->getPost('delete3')) {    	
			 $company_id = $request->getPost('company_id');
			 $prod3= new DatabaseObject_Ccompany($this->db);
			 $prod2= new DatabaseObject_Address($this->db);	
			 	if ($company_id) {
			 		$prod3->deleteCompanyProfile($this->db, $company_id);
					$prod3->deleteCompany($this->db, $company_id);
			 		$prod2->deleteAddressProfile($this->db, $company_id);
					$prod2->deleteAddress($this->db, $company_id);
                		$this->_redirect($this->getUrl('editar') . '?id=' . $fp->contact->getId()); 
			   }
            }		
        }

        public function fichacontactoAction()
        {
        		$this->breadcrumbs->addStep('Ficha Contacto', $this->getUrl('fichacontacto', 'contacto'));
			
			$request = $this->getRequest();	
			$contact_id = (int) $this->getRequest()->getQuery('id');
			$addr_id = $request->getPost('addr_id');
			$comp_id = $request->getPost('company_id');
			$addr_id2 = $request->getPost('addr_id2');
			
			$now__ = date('d-m-Y');
			$now_ = strtotime($now__);
			$year__ = date('Y', $now_);
			
			if (!$company_id2) {
				if ($contact_id  == 0) {
					$company_id2 = $this->identity->company_id2;
				}
				else {
					$company_id2 = $contact_id;
				}
			}
			
			$this->view->company_id2 = $company_id2;
			
			$fp = new FormProcessor_Contact($this->db,
                                             $this->identity->user_id,
                                             $contact_id,
											$addr_id,
											$comp_id,
											$addr_id2);
											 
			$this->view->fp = $fp;
			
			///data for totals
			$total_iva_i = 0;
			$total_iva_up_i = 0;
			$total_ii = 0;
			$total_net_i = 0;
			$total_up_i = 0;
			$total_net_up_i = 0;
			///data and information for PROJECTS
			$ii = 0;
			$projectlist = array();
			$project_id_ = array();
			$namep_ = array();
			$clientp_ = array();
			$budgetp_ = array();
			$responsiblep_ = array();
			$statusp_ = array();
			$classp_ = array();
			$projects = array();
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $projects = DatabaseObject_Project::GetAllProjects($this->db, $options);
			
			$this->view->projects = $projects;
			
			$the_company = ucfirst($fp->first_name) . ' ' . ucfirst($fp->middle_name) . ' ' . ucfirst($fp->last_name) . ' ' . ucfirst($fp->second_last_name);
			
			foreach ($projects as $project) {
            		
            	$company_ = $project->profile->client;
			$compa_id_ = $project->profile->company_id;
			$default_year_start_ = strtotime($default_year_start);
			
            		if ($the_company == $company_){
            		  if ($contact_id == $compa_id_){
					if ($project->project_title){
						if (!in_array($project->project_title, $projectlist)){
							$project_id_[$ii] = $project->getId();
							$namep_[$ii] = $project->project_title;
							$clientp_[$ii] = $project->profile->client;
							$budgetp_[$ii] = $project->profile->budget;
							$responsiblep_[$ii] = $project->profile->responsible;
						
							$now_ = date("d-m-Y");
							$end_ = $project->profile->ends;
							
							if($project->profile->ends){
								if (strtotime($now_) > strtotime($project->profile->ends)){
									$statusp_[$ii] =  'Finalizado';
									$classp_[$ii] =  'cobrada';
								}
								elseif (strtotime($now_) >= strtotime($project->profile->start) && strtotime($now_) <= strtotime($project->profile->ends) ){
									$statusp_[$ii] =  'En curso';
									$classp_[$ii] =  'parcial';
								}
								else{
									$statusp_[$ii] =  'Por iniciar';
									$classp_[$ii] =  'pendiente';
								}
							}
							else{
								$statusp_[$ii] =  'N/A';
								$classp_[$ii] =  'borrador';
							}
		
					
							$projectlist[$ii] = $project->project_title;
							$ii++;
					   }
					 }
				   }
			     }
			}
			//ends analytics	 for PROJECTS
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Ccompany::GetAllCompanies($this->db,
                                                       $options);
			
			$this->view->companieslist = $companieslist;
						
			$i = 0;
			$company_ = array();
			$data_ = array();
			$address_ = array();
            foreach ($companieslist as $company) {
            		$comp_=$company->profile->thecompany;
				$comp2_ = str_replace("'", "\'", $comp_);
				$company_[]=$comp2_;
				$data_[] = $company->getId();
				$address_[] = unserialize(base64_decode($company->profile->company_address));
				$i++;
			}
			
			$this->view->company_ = $company_;
			$this->view->data_ = $data_;
			$this->view->address_ = $address_;
			
            $addressid = array();
			$i = 0;
            foreach ($companieslist as $company) {
            		$options = array(
                		'user_id' => $this->identity->user_id,
                		'doc_type'   => 'ccompany',
                		'doc_id'   => $company->getId()
            		);
				
            		$addressid [$i] = DatabaseObject_Address::GetAddressesId($this->db, $options);
				$i++;
			}
			
			$this->view->addressid = $addressid;
			
            $options = array(
                'user_id' => $this->identity->user_id,
                'doc_type'   => 'contact',
                'doc_id'   => $contact_id
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			
            $contact = new DatabaseObject_Contact($this->db);	
            if (!$contact->loadForUser($this->identity->user_id, $contact_id))
                $this->_redirect($this->getUrl());
            
			$this->view->contact = $contact;
			
			$fp->company_address = unserialize(base64_decode($fp->company_address));		
			
			///expenses data and information
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $expenseslist = DatabaseObject_Expense::GetAllExpenses($this->db, $options);
			
			$this->view->expenseslist = $expenseslist;
			
		    $options = array(
                'user_id' => $this->identity->user_id,
                'document_type' => 'expense'
            );
			
            $itemslist = DatabaseObject_Expitem::GetAllExpenseItems($this->db, $options);
			
			$this->view->itemslist = $itemslist;
			
			$expense_id__ = array();
			$number_ = array();
			$value_ = array();
			$project_ = array();
			$begin_ = array();
			$valid_ = array();
			$expire_ = array();
			$status_ = array();
			$class_ = array();
			$providers = array();
			
			$total_ = 0;
			$tot_product = 0;
			$net_product = 0;
			$iva_product = 0;
			$tot_month_1 = 0;
			$tot_month_2 = 0;
			$tot_month_3 = 0;
			$tot_month_4 = 0;
			$tot_month_5 = 0;
			$tot_month_6 = 0;
			$tot_month_7 = 0;
			$tot_month_8 = 0;
			$tot_month_9 = 0;
			$tot_month_10 = 0;
			$tot_month_11 = 0;
			$tot_month_12 = 0;
			
			$total_iva_e = 0;
			$total_iva_up_e = 0;
			$total_e = 0;
			$total_net_e = 0;
			$total_up_e = 0;
			$total_net_up_e = 0;
			
			$full_name = ucfirst($fp->first_name) . ' ' . ucfirst($fp->middle_name) . ' ' . ucfirst($fp->last_name) . ' ' . ucfirst($fp->second_last_name);
			
			foreach ($expenseslist as $expense) {
						
            	$company_ = $expense->profile->thecompany;
			$cont_ids_ = $fp->identification;
			$default_year_start_ = strtotime($default_year_start);
	
          	$options = array(
                'user_id' => $this->identity->user_id,
                'document_id'   => $expense->getId()
            );

            $companyExpense = DatabaseObject_ExpenseCompany::GetCompanies($this->db, $options);
			
			$c=0;
			foreach ($companyExpense as $client) {
				if ($c==0){
				  $id3_ = $client->profile->identification;
				  $c++;
				}
			}
			
            		if ($full_name == $company_){
            			if ($cont_ids_ == $id3_){
            				
            			$expense_id_ = $expense->getId();
					$expense_id__[] = $expense->getId();
					$disc_ = $expense->profile->discount;
					$discount = (100 - $disc_)/100;
					$ts_created_ = $expense->profile->expense_date;
					$ts_created = strtotime($ts_created_);
					$number_[] = $expense->expense_number;
					$value_[] = $expense->profile->total;
					$project_[] = $expense->profile->expense_project;
					$begin_ = $expense->profile->expense_date;
					$valid_ = $expense->profile->expense_valid;
					$amountpay_ = $expense->profile->amountpay;
					$paid_e = $expense->profile->paid;

					if ($expense->profile->expense_valid){
						if ($expense->profile->expense_valid == 0.00){
							$expire_[] = $expense->profile->expense_date;
							$valid_until__ = $expense->profile->expense_date;
						}
						else {
							$expire_[] = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));
						    $valid_until__ = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));
						}
					}
					else {
						$expire_[] = $expense->profile->expense_date;
						$valid_until__ = $expense->profile->expense_date;
					}
					
					$now_ = date('d-m-Y');
					
					if($paid_e){
						$status_[] = "Pagado";
						$class_[] = "cobrada";
					}
					elseif($amountpay_){
						$status_[] = "Parcialmente Pagado";
						$class_[] = "parcial";
					}
					elseif(strtotime($valid_until__) > strtotime($now_)){
						$status_[] = "Pendiente";
						$class_[] = "pendiente";
					}
					else {
						$status_[] = "Vencido";
						$class_[] = "vencida";
					}
					
					$providers[] = $company_;
					
					$tot_expense = $expense->profile->total;
																			
					$total_e = $total_e + $tot_expense;
					$total_net_e = $total_net_e + $expense->profile->base * (100 - $expense->profile->retention) / 100;
									
					if (!$paid_e){
							$total_up_e = $total_up_e + $tot_expense - $amountpay_;
							$total_net_up_e = $total_net_up_e + $expense->profile->base * (100 - $expense->profile->retention) / 100;
							
							if ($amountpay_){
								$sub_tt = $expense->profile->base * (100 - $expense->profile->retention) / 100;
								$amtpy = $amountpay_ * $sub_tt /$expense->profile->total;
								$total_net_up_e = $total_net_up_e - $amtpy;
							}
						}
					
						foreach ($itemslist as $item) {
							if ($expense_id_ == $item->document_id){
							
									$quan_pro = $item->profile->quantity;
									$price_pro = $item->profile->unit_cost;
									$tot_pro_ = $item->profile->montototal;
									$subtotale = $item->profile->subtotal;
									$iva_e = $item->profile->iva_p;
									$iva2_e = $item->profile->iva_p2;
						
									if (!$discount){
										$discount = 1;
									}
									
									$tot_pro_r = $quan_pro * $price_pro * $discount;
										
									$total_ = $total_ + $tot_pro_r;
									
									//totals resume
									$tot_pro_re = $subtotale * $discount;
									$tot_iva1e = $tot_pro_re * $iva_e * 0.01;
									$tot_iva2e = $tot_pro_re * $iva2_e * 0.01;

									$total_iva_e = $total_iva_e + $tot_iva1e;
									
									if (!$paid_e){
										$total_iva_up_e = $total_iva_up_e + $tot_iva1e;

										if ($amountpay_){
												$iva_avrg = $amountpay_ * $tot_iva1e / $expense->profile->total;
												$total_iva_up_e = $total_iva_up_e - $iva_avrg;
										}
									}
									//$x = 'Quantity:' . $quan_pro . 'Unit P:' . $price_pro . 'Discount:' . $discount . '<br>';
									//echo $x;

									$month__ = date('n', $ts_created);
									$year___ = date('Y', $ts_created);
									$month_start = date('n', $default_year_start_);
									$date_ = date('d-m-Y', $ts_created);
									
									if ($ts_created >= $default_year_start_ && $year___ == $year__){
									if($month__ == 1){
										$month_1 = 'Enero';
										$year_1 = $year___;	

										$tot_month_1 = $tot_month_1 + $tot_pro_r;
									}
									
									elseif($month__ == 2){
										$month_2 = 'Febrero';
										$year_2 = $year___;	

										$tot_month_2 = $tot_month_2 + $tot_pro_r;
									}
									
									elseif($month__ == 3){
										$month_3 = 'Marzo';
										$year_3 = $year___;	

										$tot_month_3 = $tot_month_3 + $tot_pro_r;
									}
									
									elseif($month__ == 4){
										$month_4 = 'Abril';
										$year_4 = $year___;	

										$tot_month_4 = $tot_month_4 + $tot_pro_r;
									}
									
									elseif($month__ == 5){
										$month_5 = 'Mayo';
										$year_5 = $year___;	

										$tot_month_5 = $tot_month_5 + $tot_pro_r;
									}
									
									elseif($month__ == 6){
										$month_6 = 'Junio';
										$year_6 = $year___;	

										$tot_month_6 = $tot_month_6 + $tot_pro_r;
									}
									
									elseif($month__ == 7){
										$month_7 = 'Julio';
										$year_7 = $year___;	

										$tot_month_7 = $tot_month_7 + $tot_pro_r;
									}
									
									elseif($month__ == 8){
										$month_8 = 'Agosto';
										$year_8 = $year___;	

										$tot_month_8 = $tot_month_8 + $tot_pro_r;
									}
									
									elseif($month__ == 9){
										$month_9 = 'Septiembre';
										$year_9 = $year___;	

										$tot_month_9 = $tot_month_9 + $tot_pro_r;
									}
									
									elseif($month__ == 10){
										$month_10 = 'Octubre';
										$year_10 = $year___;	

										$tot_month_10 = $tot_month_10 + $tot_pro_r;
									}
									
									elseif($month__ == 11){
										$month_11 = 'Noviembre';
										$year_11 = $year___;	

										$tot_month_11 = $tot_month_11 + $tot_pro_r;
									}
									
									else {
										$month_12 = 'Diciembre';
										$year_12 = $year___;	

										$tot_month_12 = $tot_month_12 + $tot_pro_r;
									}
								  }
									
				  		      }
					      }
				      }
				  }
			}

			$this->view->year__ = $year__;
			
			$this->view->expense_id__ = $expense_id__;
			$this->view->total_ = $total_;
			$this->view->number_ = $number_;
			$this->view->value_ = $value_;
			$this->view->project_ = $project_;
			$this->view->expire_ = $expire_;
			$this->view->status_ = $status_;
			$this->view->class_ = $class_;
			$this->view->providers = $providers;
			
			$this->view->month_start = $month_start;
			$this->view->month__ = $month__;
			
			$this->view->tot_product = $tot_product;
			$this->view->net_product = $net_product;
			$this->view->iva_product = $iva_product;
			
			$this->view->month_1 = $month_1;
			$this->view->year_1 = $year_1;
			$this->view->tot_month_1 = $tot_month_1;
									
			$this->view->month_2 = $month_2;
			$this->view->year_2 = $year_2;
			$this->view->tot_month_2 = $tot_month_2;
									
			$this->view->month_3 = $month_3;
			$this->view->year_3 = $year_3;
			$this->view->tot_month_3 = $tot_month_3;
									
			$this->view->month_4 = $month_4;
			$this->view->year_4 = $year_4;
			$this->view->tot_month_4 = $tot_month_4;
									
			$this->view->month_5 = $month_5;
			$this->view->year_5 = $year_5;
			$this->view->tot_month_5 = $tot_month_5;
									
			$this->view->month_6 = $month_6;
			$this->view->year_6 = $year_6;
			$this->view->tot_month_6 = $tot_month_6;
									
			$this->view->month_7 = $month_7;
			$this->view->year_7 = $year_7;
			$this->view->tot_month_7 = $tot_month_7;
									
			$this->view->month_8 = $month_8;
			$this->view->year_8 = $year_8;
			$this->view->tot_month_8 = $tot_month_8;
									
			$this->view->month_9 = $month_9;
			$this->view->year_9 = $year_9;
			$this->view->tot_month_9 = $tot_month_9;
									
			$this->view->month_10 = $month_10;
			$this->view->year_10 = $year_10;
			$this->view->tot_month_10 = $tot_month_10;
									
			$this->view->month_11 = $month_11;
			$this->view->year_11 = $year_11;
			$this->view->tot_month_11 = $tot_month_11;
									
			$this->view->month_12 = $month_12;
			$this->view->year_12 = $year_12;
			$this->view->tot_month_12 = $tot_month_12;
			//ends analytics	

			///data and information for INCOMMING/Invoices
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $invoiceslist = DatabaseObject_Invoice::GetAllInvoices($this->db, $options);
			
			$this->view->invoiceslist = $invoiceslist;
			
		    $options = array(
                'user_id' => $this->identity->user_id,
                'document_type' => 'invoice'
            );
			
            $itemslisti = DatabaseObject_Item::GetAllInvoiceItems($this->db, $options);
			
			$this->view->itemslisti = $itemslisti;
				
			$number_i = array();
			$value_i = array();
			$project_i = array();
			$expire_i = array();
			$status_i = array();
			$class_i = array();
			$clients = array();
			$total_i = 0;
			$tot_month_1i = 0;
			$tot_month_2i = 0;
			$tot_month_3i = 0;
			$tot_month_4i = 0;
			$tot_month_5i = 0;
			$tot_month_6i = 0;
			$tot_month_7i = 0;
			$tot_month_8i = 0;
			$tot_month_9i = 0;
			$tot_month_10i = 0;
			$tot_month_11i = 0;
			$tot_month_12i = 0;
			$full_namei = ucfirst($fp->first_name) . ' ' . ucfirst($fp->middle_name) . ' ' . ucfirst($fp->last_name) . ' ' . ucfirst($fp->second_last_name);
			
			$code_p = array();
			$name_p = array();
			$currency_p = array();
			$punit_p = array();
			$iva_p = array();
			$iva2_p = array();
			$quantity_p = array();
			$total_p = array();
			$products = array();
			$invoices_paid = array();

			foreach ($invoiceslist as $invoice) {
            	
	       	$company_i = $invoice->profile->company_id;
			$company_namei = $invoice->profile->thecompany;
			$default_year_start_i = strtotime($default_year_start);
			$published_ = $invoice->profile->published;
			$invoice_id_ = $invoice->getId();
			$ts_created_i = $invoice->profile->invoice_date;
			$ts_createdi = strtotime($ts_created_i);
			$disc_i = $invoice->profile->discount;
			$discounti = (100 - $disc_i)/100;
			
          	$options = array(
                'user_id' => $this->identity->user_id,
                'document_id'   => $invoice->getId()
            );

            $companyInvoice = DatabaseObject_InvoiceCompany::GetCompanies($this->db, $options);
			
			$a=0;
			foreach ($companyInvoice as $client) {
				if ($a==0){
				  $id_ = $client->profile->identification;
				  $a++;
				}
			}
			
			//product's info
			if ($full_namei == $company_namei){
			  if ($fp->identification == $id_){
				if ($published_){
					if ($ts_createdi >= $default_year_start_i){
						foreach ($itemslisti as $item) {
							if ($invoice_id_ == $item->document_id){
								if (!in_array($item->profile->code, $products)){
									$quan_pro = $item->profile->quantity;
									$price_pro = $item->profile->unit_price;
						
									if (!$discounti){
										$discounti = 1;
									}
									
									$tot_pro_r = $quan_pro * $price_pro * $discounti;
									
									$product_id_[] = $item->profile->product_id;
									$code_p[] = $item->profile->code;
									$name_p[] = $item->profile->detail;
									$currency_p[] = $item->profile->currency;
									$punit_p[] = $item->profile->unit_price;
									$iva_p[] = $item->profile->iva;
									$iva2_p[] = $item->profile->iva2;
									$quantity_p[] = $item->profile->quantity;
									$total_p[] = $tot_pro_r;
									$products[] = $item->profile->code;
						     	}
								else {
									$key = array_search($item->profile->code, $products);
									$quan_pro = $item->profile->quantity;
									$price_pro = $item->profile->unit_price;
						
									if (!$discounti){
										$discounti = 1;
									}
									
									$tot_pro_r = $quan_pro * $price_pro * $discounti;
										
									$value1 = $quantity_p[$key] + $item->profile->quantity;
									$value2 = $total_p[$key] + $tot_pro_r;
									$quantity_p[$key] = $value1;
									$total_p[$key] = $value2;
								}
					    		}
				  		 }
					   }
					}
				  }
				}
			
				//invoice's info
            		if ($full_namei == $company_namei){
				  if ($fp->identification == $id_){
					if ($published_){
						if ($ts_createdi >= $default_year_start_i){
							
					$invoice_id__[] = $invoice->getId();
					$number_i[] = $invoice->profile->start_letter .' - '. $invoice->profile->number_zero . $invoice->invoice_number;
					$value_i[] = $invoice->profile->total;
					$project_i[] = $invoice->profile->invoice_project;
					$begin_i = $invoice->profile->invoice_date;
					$valid_i = $invoice->profile->invoice_valid;
					$paid_ = $invoice->profile->paid;
					$amountpay_ = $invoice->profile->amountpay;
					
					$invoices_paid[] = $invoice->profile->paid;
					
					//info for projects table
					if ($invoice->profile->invoice_project){
						if (!in_array($invoice->profile->invoice_project, $projectlist)){
							$project_id_[$ii] = $invoice->profile->project_id;
							$namep_[$ii] = $invoice->profile->invoice_project;
							$clientp_[$ii] = $invoice->profile->thecompany;
							$budgetp_[$ii] = 0;
							$responsiblep_[$ii] = "N/A";
							$statusp_[$ii] = "N/A";
							$classp_[$ii] = "borrador";
							$projectlist[$ii] = $invoice->profile->invoice_project;
							$ii++;
						}
					}
					
					if ($invoice->profile->invoice_valid){
						if ($invoice->profile->invoice_valid == 0.00){
							$expire_i[] = $invoice->profile->invoice_date;
							$valid_until_ = $invoice->profile->invoice_date;
						}
						else {
							$expire_i[] = date('d-m-Y', strtotime($invoice->profile->invoice_date. ' + ' . $invoice->profile->invoice_valid . 'days'));
							$valid_until_ = date('d-m-Y', strtotime($invoice->profile->invoice_date . ' + ' . $invoice->profile->invoice_valid . ' days'));
						}
					}
					else {
						$expire_i[] = $invoice->profile->invoice_date;
						$valid_until_ = $invoice->profile->invoice_date;
					}
					
					//for main list status
					$now__ = date('d-m-Y');
					
					if($paid_){
						$status_i[] = "Cobrada";
						$class_i[] = "cobrada";
					}
					elseif($amountpay_){
						$status_i[] = "Parcialmente Cobrada";
						$class_i[] = "parcial";
					}
					elseif(isset($published_) && strtotime($valid_until_) >= strtotime($now__)){
						$status_i[] = "Pendiente";
						$class_i[] = "pendiente";
					}
					elseif(isset($published_) && strtotime($valid_until_) < strtotime($now__)){
						$status_i[] = "Vencida";
						$class_i[] = "vencida";
					}
					else {
						$status_i[] = "Borrador";
						$class_i[] = "borrador";
					}
					///// ends main list status
					
					$clients[] = $company_;
					
					$tot_invoice = $invoice->profile->total;
																			
					$total_ii = $total_ii + $tot_invoice;
					$total_net_i = $total_net_i + $invoice->profile->base * (100 - $invoice->profile->retention) / 100;
									
					if (!$paid_){
						$total_up_i = $total_up_i + $tot_invoice- $amountpay_;
						$total_net_up_i = $total_net_up_i + $invoice->profile->base * (100 - $invoice->profile->retention) / 100;
					
						if ($amountpay_){
							$sub_tt = $invoice->profile->base * (100 - $invoice->profile->retention) / 100;
							$amtpy = $amountpay_ * $sub_tt /$invoice->profile->total;
							$total_net_up_i = $total_net_up_i - $amtpy;
						}
					}
					
						foreach ($itemslisti as $item) {
							if ($invoice_id_ == $item->document_id){
							
									$quan_proi = $item->profile->quantity;
									$price_proi = $item->profile->unit_price;
									$subtotali = $item->profile->subtotal;
									$iva_ = $item->profile->iva;
									$iva2_ = $item->profile->iva2;
						
									if (!$discounti){
										$discounti = 1;
									}
									
									//totals
									$tot_pro_rii = $subtotali * $discounti;
									$tot_iva1 = $tot_pro_rii * $iva_ * 0.01;
									$tot_iva2 = $tot_pro_rii * $iva2_ * 0.01;

									$total_iva_i = $total_iva_i + $tot_iva1;
									
									if (!$paid_){
										$total_iva_up_i = $total_iva_up_i + $tot_iva1;
										
										if ($amountpay_){
												$iva_avrg = $amountpay_ * $tot_iva1 / $invoice->profile->total;
												$total_iva_up_i = $total_iva_up_i - $iva_avrg;
										}	
									}
									//
									
									$tot_pro_ri = $quan_proi * $price_proi * $discounti;
										
									$total_i = $total_i + $tot_pro_ri;
									//$x = 'Quantity:' . $quan_pro . 'Unit P:' . $price_pro . 'Discount:' . $discount . '<br>';
									//echo $x;

									$month__i = date('n', $ts_createdi);
									$year___i = date('Y', $ts_createdi);
									$month_starti = date('n', $default_year_start_i);
									$date_i = date('d-m-Y', $ts_createdi);
									
									if ($ts_createdi >= $default_year_start_i  && $year___i == $year__){
									if($month__i == 1){
										$month_1i = 'Enero';
										$year_1i = $year___i;	

										$tot_month_1i = $tot_month_1i + $tot_pro_ri;
									}
									
									elseif($month__i == 2){
										$month_2i = 'Febrero';
										$year_2i = $year___i;	

										$tot_month_2i = $tot_month_2i + $tot_pro_ri;
									}
									
									elseif($month__i == 3){
										$month_3i = 'Marzo';
										$year_3i = $year___i;	

										$tot_month_3i = $tot_month_3i + $tot_pro_ri;
									}
									
									elseif($month__i == 4){
										$month_4i = 'Abril';
										$year_4i = $year___i;	

										$tot_month_4i = $tot_month_4i + $tot_pro_ri;
									}
									
									elseif($month__i == 5){
										$month_5i = 'Mayo';
										$year_5i = $year___i;	

										$tot_month_5i = $tot_month_5i + $tot_pro_ri;
									}
									
									elseif($month__i == 6){
										$month_6i = 'Junio';
										$year_6i = $year___i;	

										$tot_month_6i = $tot_month_6i + $tot_pro_ri;
									}
									
									elseif($month__i == 7){
										$month_7i = 'Julio';
										$year_7i = $year___i;	

										$tot_month_7i = $tot_month_7i + $tot_pro_ri;
									}
									
									elseif($month__i == 8){
										$month_8i = 'Agosto';
										$year_8i = $year___i;	

										$tot_month_8i = $tot_month_8i + $tot_pro_ri;
									}
									
									elseif($month__i == 9){
										$month_9i = 'Septiembre';
										$year_9i = $year___i;	

										$tot_month_9i = $tot_month_9i + $tot_pro_ri;
									}
									
									elseif($month__i == 10){
										$month_10i = 'Octubre';
										$year_10i = $year___i;	

										$tot_month_10i = $tot_month_10i + $tot_pro_ri;
									}
									
									elseif($month__i == 11){
										$month_11i = 'Noviembre';
										$year_11i = $year___i;	

										$tot_month_11i = $tot_month_11i + $tot_pro_ri;
									}
									
									else {
										$month_12i = 'Diciembre';
										$year_12i = $year___i;	

										$tot_month_12i = $tot_month_12i + $tot_pro_ri;
									}
								   }
								 }
				  		     }
					      }
					  }
				   }
			    }
			}

			$now_ = date("d-m-Y");
			$this->view->now_ = $now_;
			
			$this->view->year__ = $year__;
			
			//products view
			$this->view->product_id_ = $product_id_;
			$this->view->code_p = $code_p;
			$this->view->name_p = $name_p;
			$this->view->currency_p = $currency_p;
			$this->view->punit_p = $punit_p;
			$this->view->iva_p = $iva_p;
			$this->view->iva2_p = $iva2_p;
			$this->view->quantity_p = $quantity_p;
			$this->view->total_p = $total_p;
			$this->view->products = $products;
			//
			$this->view->invoices_paid = $invoices_paid;
			
			$this->view->total_ii = $total_ii;
			$this->view->total_net_i = $total_net_i;
			$this->view->total_iva_i = $total_iva_i;
			$this->view->total_up_i = $total_up_i;
			$this->view->total_net_up_i = $total_net_up_i;
			$this->view->total_iva_up_i = $total_iva_up_i;
			
			$this->view->total_e = $total_e;
			$this->view->total_net_e = $total_net_e;
			$this->view->total_iva_e = $total_iva_e;
			$this->view->total_up_e = $total_up_e;
			$this->view->total_net_up_e = $total_net_up_e;
			$this->view->total_iva_up_e = $total_iva_up_e;

			$this->view->total_i = $total_i;
			$this->view->invoice_id__ = $invoice_id__;
			$this->view->number_i = $number_i;
			$this->view->value_i = $value_i;
			$this->view->project_i = $project_i;
			$this->view->expire_i = $expire_i;
			$this->view->status_i = $status_i;
			$this->view->class_i = $class_i;
			$this->view->clients = $clients;
			
			$this->view->month_starti = $month_starti;
			$this->view->month__i = $month__i;
			
			$this->view->month_1i = $month_1i;
			$this->view->year_1i = $year_1i;
			$this->view->tot_month_1i = $tot_month_1i;
									
			$this->view->month_2i = $month_2i;
			$this->view->year_2i = $year_2i;
			$this->view->tot_month_2i = $tot_month_2i;
									
			$this->view->month_3i = $month_3i;
			$this->view->year_3i = $year_3i;
			$this->view->tot_month_3i = $tot_month_3i;
									
			$this->view->month_4i = $month_4i;
			$this->view->year_4i = $year_4i;
			$this->view->tot_month_4i = $tot_month_4i;
									
			$this->view->month_5i = $month_5i;
			$this->view->year_5i = $year_5i;
			$this->view->tot_month_5i = $tot_month_5i;
									
			$this->view->month_6i = $month_6i;
			$this->view->year_6i = $year_6i;
			$this->view->tot_month_6i = $tot_month_6i;
									
			$this->view->month_7i = $month_7i;
			$this->view->year_7i = $year_7i;
			$this->view->tot_month_7i = $tot_month_7i;
									
			$this->view->month_8i = $month_8i;
			$this->view->year_8i = $year_8i;
			$this->view->tot_month_8i = $tot_month_8i;
									
			$this->view->month_9i = $month_9i;
			$this->view->year_9i = $year_9i;
			$this->view->tot_month_9i = $tot_month_9i;
									
			$this->view->month_10i = $month_10i;
			$this->view->year_10i = $year_10i;
			$this->view->tot_month_10i = $tot_month_10i;
									
			$this->view->month_11i = $month_11i;
			$this->view->year_11i = $year_11i;
			$this->view->tot_month_11i = $tot_month_11i;
									
			$this->view->month_12i = $month_12i;
			$this->view->year_12i = $year_12i;
			$this->view->tot_month_12i = $tot_month_12i;
			
			//ends analytics	 for incomming/invoices	 
			
			//projects view
			$this->view->project_id_ = $project_id_;
			$this->view->projectlist = $projectlist;
			$this->view->namep_ = $namep_;
			$this->view->clientp_ = $clientp_;
			$this->view->budgetp_ = $budgetp_;
			$this->view->responsiblep_ = $responsiblep_;
			$this->view->statusp_ = $statusp_;
			$this->view->classp_ = $classp_;
			//
        }
    	
 		public function agregarAction()
        {
        		$this->breadcrumbs->addStep('Agregar', $this->getUrl('agregar', 'contacto'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section7 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
				
			$request = $this->getRequest();
			$contact_id = (int) $this->getRequest()->getQuery('id');
			$addr_id3 = (int) $this->getRequest()->getQuery('id2');
			$addr_id = $request->getPost('addr_id');
			$comp_id = $request->getPost('company_id');
			$addr_id2 = $request->getPost('addr_id2');
			
			//if (!$addr_id2) {
			//		$addr_id2 = $addr_id3;
			//}
			
			$fp = new FormProcessor_Contact($this->db,
                                             $this->identity->user_id,
                                             $contact_id,
											$addr_id,
											$comp_id,
											$addr_id2);
			
			if ($fp->contact->getId()) {		
            $contact = new DatabaseObject_Contact($this->db);
            if (!$contact->loadForUser($this->identity->user_id, $contact_id))
                $this->_redirect($this->getUrl());
			
			$this->view->contact = $contact;
			}
			
			if (!$company_id2) {
				if ($contact_id  == 0) {
					$company_id2 = $this->identity->company_id2;
				}
				else {
					$company_id2 = $contact_id;
				}
			}
			
			if (!$company_id3) {
				if ($contact_id  == 0) {
					$company_id3 = $this->identity->company_id3;
				}
				else {
					$company_id3 = $contact_id;
				}
			}
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Ccompany::GetAllCompanies($this->db,
                                                       $options);
			
			$this->view->companieslist = $companieslist;
			
			$i = 0;
			$company_ = array();
			$data_ = array();
			$address_ = array();
            foreach ($companieslist as $company) {
            		$comp_=$company->profile->thecompany;
				$comp2_ = str_replace("'", "\'", $comp_);
				$company_[]=$comp2_;
				$data_[] = $company->getId();
				$address_[] = unserialize(base64_decode($company->profile->company_address));
				$i++;
			}
			
			$this->view->company_ = $company_;
			$this->view->data_ = $data_;
			$this->view->address_ = $address_;
			
            $addressid = array();
			$i = 0;
            foreach ($companieslist as $company) {
            		$options = array(
                		'user_id' => $this->identity->user_id,
                		'doc_type'   => 'ccompany',
                		'doc_id'   => $company->getId()
            		);

            		$addressid [$i] = DatabaseObject_Address::GetAddressesId($this->db, $options);
				
				$i++;
			}
			
			$this->view->addressid = $addressid;
			
            $options = array(
                'user_id' => $this->identity->user_id,
                'doc_type'   => 'contact',
                'doc_id'   => $company_id3
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
		
			$this->view->company_id2 = $company_id2;
			$this->view->company_id3 = $company_id3;
			
											 						 
            if ($request->getPost('add')) {
            	//$this->messenger->addMessage('Contacto aregado con exito');
                if ($fp->process($request)) {
                		$this->identity->company_id3 = null;
					$this->identity->company_id2 = null;
				    $this->_redirect($this->getUrl('fichacontacto') . '?id=' . $fp->contact->getId());
                }
            }
			
          if ($request->getPost('delete2')) {    	
			 $address_id = $request->getPost('address_id');
			 $prod= new DatabaseObject_Address($this->db);		
			 	if ($address_id) {
			 		$prod->deleteAddressProfile($this->db, $address_id);
					$prod->deleteAddress($this->db, $address_id);
                		$this->_redirect($this->getUrl('agregar')); 
			   }
            }	
			
            if ($request->getPost('delete3')) {    	
			 $company_id = $request->getPost('company_id');
			 $prod3= new DatabaseObject_Ccompany($this->db);
			 $prod2= new DatabaseObject_Address($this->db);	
			 	if ($company_id) {
			 		$prod3->deleteCompanyProfile($this->db, $company_id);
					$prod3->deleteCompany($this->db, $company_id);
			 		$prod2->deleteAddressProfile($this->db, $company_id);
					$prod2->deleteAddress($this->db, $company_id);
                		$this->_redirect($this->getUrl('agregar')); 
			   }
            }
			
			$this->view->fp = $fp;
        }
		
       public function indexAction()
        {
			if ($this->identity->user_type == 'employee' && $this->identity->section7 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
        		$request = $this->getRequest();
			$contact_id = $request->getPost('contact_id');
			$prod =new DatabaseObject_Contact($this->db);

		    $options = array(
                'user_id' => $this->identity->user_id,
                'order'   => 'ts_created desc'
            );

            $contacts = DatabaseObject_Contact::GetContacts($this->db,
                                                       $options);
			
			$this->view->contacts = $contacts;
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Ccompany::GetAllCompanies($this->db, $options);
			
			$this->view->companieslist = $companieslist;
			
			$i = 0;
			$company_ = array();
			$data_ = array();
			$address_ = array();
            foreach ($companieslist as $company) {
            		$comp_=$company->profile->thecompany;
				$comp2_ = str_replace("'", "\'", $comp_);
				$company_[]=$comp2_;
				$data_[] = $company->getId();
				$address_[] = unserialize(base64_decode($company->profile->company_address));
				$i++;
			}
			
			$this->view->company_ = $company_;
			$this->view->data_ = $data_;
			$this->view->address_ = $address_;
													   
			if ($request->getPost('delete')) {
			 	if ($contact_id) {
			 		$prod->deleteContactProfile($this->db, $contact_id);
					$prod->deleteContact($this->db, $contact_id);
					$this->_redirect($this->getUrl('index'));
			    }
             }
		}
		
		public function contactocompletoAction()
        {
        		// load the user record based on the stored user ID
            $user = new DatabaseObject_User($this->db);
            $user->load(Zend_Auth::getInstance()->getIdentity()->user_id);

            $this->breadcrumbs->addStep('Detalles de Contacto',
                                        $this->getUrl('index'));
            $this->breadcrumbs->addStep('Contacto actualizado');
            $this->view->user = $user;
			
        }
    }
?>