<?php
    class ProyectosController extends CustomControllerAction
    {
    		protected $user = null;
			
        public function init()
        {
            parent::init();
            $this->breadcrumbs->addStep('Proyectos', $this->getUrl(null, 'proyectos'));
			
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
    	
        public function editarAction()
        {
        		$this->breadcrumbs->addStep('Editar', $this->getUrl('editar', 'proyectos'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section6 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
			$request = $this->getRequest();	
			$project_id = (int) $this->getRequest()->getQuery('id');
			$comp_id = $request->getPost('company_id');
			$addr_id2 = $request->getPost('address_id');
			
            $projecti = new DatabaseObject_Project($this->db);	
            if (!$projecti->loadForUser($this->identity->user_id, $project_id))
                $this->_redirect($this->getUrl('index','proyectos'));
			
			$now__ = date('d-m-Y');
			
			$next__ = date('d-m-Y', strtotime($now__. ' + 1 days'));
			
			$this->view->now__ = $now__;
			
			$this->view->next__ = $next__;
			
			$contact_id = (int) $this->getRequest()->getQuery('id');
			$this->view->contact_id = $contact_id;
			
			if (!$company_id2) {
				if ($project_id  == 0) {
					$company_id2 = $this->identity->company_id2;
				}
				else {
					$company_id2 = $project_id;
				}
			}
			
			$this->view->company_id2 = $company_id2;
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Ccompany::GetAllCompanies($this->db,
                                                       $options);
			
			$this->view->companieslist = $companieslist;
			
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $contactslist = DatabaseObject_Contact::GetAllContacts($this->db,
                                                       $options);
			
			$this->view->contactslist = $contactslist;
						
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
				$data_type_[$i]='company';
				global $i;
				$i++;
			}
		
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
				$data_[$i]=$contact->getId();
				$address_[] = unserialize(base64_decode($contact->profile->company_address));
				$data_type_[$i]='contact';
				global $i;
				$i++;
			}
			
			$this->view->company_ = $company_;
			$this->view->data_ = $data_;
			$this->view->address_ = $address_;
			$this->view->data_type_ = $data_type_;
			
						
			$i = 0;
			$contact_ = array();
			$data_c = array();
            foreach ($contactslist as $contact) {
            		$comp_1 = $contact->profile->first_name;
				$comp2_1 = str_replace("'", "\'", $comp_1);
            		$comp_2 = $contact->profile->middle_name;
				$comp2_2 = str_replace("'", "\'", $comp_2);
            		$comp_3 = $contact->profile->last_name;
				$comp2_3 = str_replace("'", "\'", $comp_3);
            		$comp_4 = $contact->profile->second_last_name;
				$comp2_4 = str_replace("'", "\'", $comp_4);
				$contact_[]=$comp2_1 ." ". $comp2_2 ." ". $comp2_3 ." ". $comp2_4;
				$data_c[] = $contact->getId();
				$i++;
			}
			
			$this->view->contact_ = $contact_;
			$this->view->data_c = $data_c;
			//////////
			$data_2 = array();
            $addressid = array();
			$i = 0;
            foreach ($companieslist as $company) {
            		$options = array(
                		'user_id' => $this->identity->user_id,
                		'doc_type'   => 'ccompany',
                		'doc_id'   => $company->getId()
            		);
				$data_2[] = $company->getId();
            		$addressid [] = DatabaseObject_Address::GetAddressesId($this->db, $options);
				$i++;
			}
			
			$this->view->data_2 = $data_2;
			$this->view->addressid = $addressid;
			
            $options = array(
                'user_id' => $this->identity->user_id,
                'doc_type'   => 'project',
                'doc_id'   => $project_id
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			
			
			//default values for the company
			$comp__ = new DatabaseObject_Company($this->db);
            $comp__->loadForUser($this->identity->user_id);
			
			$default_iva = $comp__->profile->iva;
			$default_iva2 = $comp__->profile->iva2;
			$default_retention = $comp__->profile->retention;
			$default_invoice_number = $comp__->profile->invoice_number;
			$default_number_start = $comp__->profile->number_start;
			$default_consecutive = $comp__->profile->consecutive;
			$default_number_zero = $comp__->profile->number_zero;
			$default_number_start_letter = $comp__->profile->number_start_letter;
			$default_currency = $comp__->profile->currency;
			$default_recc = $comp__->profile->recc;
			
			$this->view->default_iva = $default_iva;
			$this->view->default_iva2 = $default_iva2;
			$this->view->default_retention = $default_retention;
			$this->view->default_invoice_number = $default_invoice_number;
			$this->view->default_number_start = $default_number_start;
			$this->view->default_number_zero = $default_number_zero;
			$this->view->default_consecutive = $default_consecutive;
			$this->view->default_number_start_letter = $default_number_start_letter;
			$this->view->default_currency = $default_currency;
			$this->view->default_recc = $default_recc;
			
            $project = new DatabaseObject_Project($this->db);	
            if (!$project->loadForUser($this->identity->user_id, $project_id))
                $this->_redirect($this->getUrl());
            
			$this->view->project = $project;
		
			$fp = new FormProcessor_Project($this->db,
                                             $this->identity->user_id,
                                             $project_id,
											$comp_id);
											 
			$this->view->fp = $fp;
			
			$fp->company_address = unserialize(base64_decode($fp->company_address));

			//shows european currency
			$mbudget = str_replace('.', ',', $fp->budget);
			$fp->budget = $mbudget;
			
			$mexpense = str_replace('.', ',', $fp->expense);
			$fp->expense = $mexpense;

			if ($request->getPost('edit')) {
            	   if ($fp->process($request)) {
                 	$project->save();
				    $this->_redirect($this->getUrl('fichaproyecto') . '?id=' . $fp->project->getId());
					$this->identity->company_id2 = null;		    
                }
            }
					
        }

        public function fichaproyectoAction()
        {
        		$this->breadcrumbs->addStep('Ficha Proyecto', $this->getUrl('fichaproyecto', 'proyectos'));
			
			$request = $this->getRequest();	
			$project_id = (int) $this->getRequest()->getQuery('id');
			$comp_id = $request->getPost('company_id');
			$addr_id2 = $request->getPost('address_id');
			
            $projecti = new DatabaseObject_Project($this->db);	
            if (!$projecti->loadForUser($this->identity->user_id, $project_id))
                $this->_redirect($this->getUrl('index','proyectos'));
			
			$contact_id = (int) $this->getRequest()->getQuery('id');
			$this->view->contact_id = $contact_id;
			
			if (!$company_id2) {
				if ($project_id  == 0) {
					$company_id2 = $this->identity->company_id2;
				}
				else {
					$company_id2 = $project_id;
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
			
			///////////
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $contactslist = DatabaseObject_Contact::GetAllContacts($this->db,
                                                       $options);
			
			$this->view->contactslist = $contactslist;
						
			$i = 0;
			$contact_ = array();
			$data_c = array();
            foreach ($contactslist as $contact) {
            		$comp_1 = $contact->profile->first_name;
				$comp2_1 = str_replace("'", "\'", $comp_1);
            		$comp_2 = $contact->profile->middle_name;
				$comp2_2 = str_replace("'", "\'", $comp_2);
            		$comp_3 = $contact->profile->last_name;
				$comp2_3 = str_replace("'", "\'", $comp_3);
            		$comp_4 = $contact->profile->second_last_name;
				$comp2_4 = str_replace("'", "\'", $comp_4);
				$contact_[]=$comp2_1 ." ". $comp2_2 ." ". $comp2_3 ." ". $comp2_4;
				$data_c[] = $contact->getId();
				$i++;
			}
			
			$this->view->contact_ = $contact_;
			$this->view->data_c = $data_c;
			//////////
			$data_2 = array();
            $addressid = array();
			$i = 0;
            foreach ($companieslist as $company) {
            		$options = array(
                		'user_id' => $this->identity->user_id,
                		'doc_type'   => 'ccompany',
                		'doc_id'   => $company->getId()
            		);
				$data_2[] = $company->getId();
            		$addressid [] = DatabaseObject_Address::GetAddressesId($this->db, $options);
				$i++;
			}
			
			$this->view->data_2 = $data_2;
			$this->view->addressid = $addressid;
			
            $options = array(
                'user_id' => $this->identity->user_id,
                'doc_type'   => 'project',
                'doc_id'   => $project_id
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			
            $project = new DatabaseObject_Project($this->db);	
            if (!$project->loadForUser($this->identity->user_id, $project_id))
                $this->_redirect($this->getUrl());
            
			$this->view->project = $project;
		
			$fp = new FormProcessor_Project($this->db,
                                             $this->identity->user_id,
                                             $project_id,
											$comp_id);
											 
			$this->view->fp = $fp;
			
			$fp->company_address = unserialize(base64_decode($fp->company_address));

			//shows european currency
			$mbudget = str_replace('.', ',', $fp->budget);
			$fp->budget = $mbudget;
			
			$mexpense = str_replace('.', ',', $fp->expense);
			$fp->expense = $mexpense;
			
			//gantt chart
			$options = array('user_id' => $this->identity->user_id);

            $tasks = DatabaseObject_Task::GetAllTasks($this->db, $options);
			
			$this->view->tasks = $tasks;
			
			
			$data = array();

			foreach($tasks as $task){
				if ($project_id == $task->profile->project_id){
					$data[] = array(
					  'label' => $task->profile->task_title,
					  'start' => $task->profile->start, 
					  'end'   => $task->profile->ends
					);
				}
			}
			
			
			if ($data){
				
				$config = Zend_Registry::get('config');
				$droute = $config->paths->include;
				
				require_once $droute . '/gantt/gantti.php'; 
				
				$gantti = new Gantti($data, array(
				  'title'      => 'Agenda',
				  'cellwidth'  => 28,
				  'cellheight' => 28,
				  'today'      => true
				));
				
				$this->view->gantti = $gantti;
			}
			////
			
			//budget info
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $budgets = DatabaseObject_Budget::GetAllBudgets($this->db, $options);
			
			$this->view->budgets = $budgets;

			$status_b = array();
			$class_b = array();
			$valid_until = array();
			$budget_number = array();
			$budget_p = array();
			$budget_date = array();
			$thecompany_b = array();
			$total_b = array();

			foreach ($budgets as $budget) {
				
				if ($budget->profile->project_id == $project_id){
				
				$budget_number[] = $budget->budget_number;
				$budget_p[] = $budget->getId();
				$budget_date[] = $budget->profile->budget_date;
				$thecompany_b[] = $budget->profile->thecompany;
				$total_b[] = $budget->profile->total;
					
					//for main list status
					if ($budget->profile->budget_valid){
						if ($budget->profile->budget_valid == 0.00){
							$valid_until[] = $budget->profile->budget_date;
						}
						else {
							$valid_until[] = $budget->profile->budget_date;
						}
					}
					else {
						$valid_until[] = $budget->profile->budget_date;
					}
					
					if($budget->profile->transformed){
						$status_b[] = "Facturado";
						$class_b[] = "cobrada";
					}
					elseif($budget->profile->published){
						$status_b[] = "Enviado";
						$class_b[] = "parcial";
					}
					else {
						$status_b[] = "Borrador";
						$class_b[] = "borrador";
					}
				}
			}
			
			$this->view->budget_number = $budget_number;
			$this->view->status_b = $status_b;
			$this->view->class_b = $class_b;
			$this->view->valid_until = $valid_until;
			$this->view->budget_p = $budget_p;
			$this->view->budget_date = $budget_date;
			$this->view->thecompany_b = $thecompany_b;
			$this->view->total_b = $total_b;
			////////////
			
			//data analisis starts here
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

			$this->view->default_iva = $default_iva;
			$this->view->default_iva2 = $default_iva2;
			$this->view->default_retention = $default_retention;
			$this->view->default_expense_number = $default_expense_number;
			$this->view->default_number_start = $default_number_start;
			$this->view->default_number_zero = $default_number_zero;
			$this->view->default_consecutive = $default_consecutive;
			$this->view->default_number_start_letter = $default_number_start_letter;
			$this->view->default_currency = $default_currency;
			$this->view->default_recc = $default_recc;
			$this->view->default_year_start = $default_year_start;
			
			////iva information
			$now__ = date('d-m-Y');
			$now_ = strtotime($now__);
			$year__ = date('Y', $now_);
			
			$year2 = date('d-m-Y', strtotime('-1 year'));
			$year2_ =  strtotime($year2);
			$year2__ = date('Y', $year2_);
			
			$year3 = date('d-m-Y', strtotime('+1 year'));
			$year3_ =  strtotime($year3);
			$year3__ = date('Y', $year3_);
			
			$date__1_ = '01-07-' . $year2__;
			$date__1 = date('d-m-Y', strtotime($date__1_));
			
			$date_0_ = '01-10-' . $year2__;
			$date_0 = date('d-m-Y', strtotime($date_0_));
			
			$date_1_ = '01-01-' . $year__;
			$date_1 = date('d-m-Y', strtotime($date_1_));
			$date_2_ = '01-04-' . $year__;
			$date_2 = date('d-m-Y', strtotime($date_2_));
			$date_3_ = '01-07-' . $year__;
			$date_3 = date('d-m-Y', strtotime($date_3_));
			$date_4_ = '01-10-' . $year__;
			$date_4 = date('d-m-Y', strtotime($date_4_));
			$date_5_ = '01-01-' . $year3__;
			$date_5 = date('d-m-Y', strtotime($date_5_));
			
			if (strtotime($now__) >= strtotime($date_1) && strtotime($now__) < strtotime($date_2)){
				$last_tri = -99;
				$now_iva = 1;
			}
			elseif (strtotime($now__) >= strtotime($date_2) && strtotime($now__) < strtotime($date_3)){
				$last_tri = 1;
				$now_iva = 2;
			}
			elseif (strtotime($now__) >= strtotime($date_3) && strtotime($now__) < strtotime($date_4)){
				$last_tri = 2;
				$now_iva = 3;
			}
			elseif (strtotime($now__) >= strtotime($date_4) && strtotime($now__) < strtotime($date_5)){
				$last_tri = 3;
				$now_iva = 4;
			}
			else {
				$last_tri = 4;
				$now_iva = 5;
			}
			/////////
			
			//expenses
			$status_ii_e = array();
			$class_ii_e = array();
			$valid_until_up_e = array();
			$expenses_up = array();
			
			$tri_0_exp = 0;
			$tri_1_exp = 0;
			$tri_2_exp = 0;
			$tri_3_exp = 0;
			$tri_4_exp = 0;
			
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

			$total_e = 0;
			$total_net_e = 0;
			$total_iva_e = 0;
			
			$total_up_e = 0;
			$total_iva_up_e = 0;
			$total_net_up_e = 0;

			//invoices
			$status_ii = array();
			$class_ii = array();
			$valid_until_up = array();
			$invoices_up = array();
			
			$tri_0_inv = 0;
			$tri_1_inv = 0;
			$tri_2_inv = 0;
			$tri_3_inv = 0;
			$tri_4_inv = 0;
			
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
			
			$total_i = 0;
			$total_net_i = 0;
			$total_iva_i = 0;
			
			$total_up_i = 0;
			$total_iva_up_i = 0;
			$total_net_up_i = 0;
		
			//iva (expenses and invoices)
			$total_iva_year_exp = 0;
			$total_iva_now_exp = 0;
			$total_recc_exp = 0;
			$payday_ = array ();
			$amountpay_ = array ();
			$expense_ids = array ();
			$pay_e = 0;
			$iva_paid_e = 0;
			
			$total_iva_year_inv = 0;
			$total_iva_now_inv = 0;
			$total_recc_inv = 0;
			$payday = array ();
			$amountpay = array ();
			$invoice_ids = array ();
			$pay_i = 0;
			$iva_paid_i = 0;

		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $expenses = DatabaseObject_Expense::GetAllExpenses($this->db,
                                                       $options);
			
			$this->view->expenses = $expenses;
			
			//number of invoice
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $invoices = DatabaseObject_Invoice::GetAllInvoices($this->db,
                                                       $options);

			$this->view->invoices = $invoices;
				

			$letter = 'A';
			
			
			$totalIva = array(
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

			///data and information for expenses
		    $options = array(
                'user_id' => $this->identity->user_id,
                'document_type' => 'expense'
            );
			
            $itemsliste = DatabaseObject_Expitem::GetAllExpenseItems($this->db, $options);
			
			$this->view->itemsliste = $itemsliste;
			
			
			///data and information for INCOMMING/Invoices
		    $options = array(
                'user_id' => $this->identity->user_id,
                'document_type' => 'invoice'
            );
			
            $itemslist = DatabaseObject_Item::GetAllInvoiceItems($this->db, $options);
			
			$this->view->itemslist = $itemslist;
			
			foreach ($expenses as $expense) {
				$project_id_ = $expense->profile->project_id;
  				$default_year_start_ = strtotime($default_year_start);
				$disc_i = $expense->profile->discount;
				$discount = (100 - $disc_i)/100;
				$ts_created_ = $expense->profile->expense_date;
				$ts_created = strtotime($ts_created_);
				$paid_ = $expense->profile->paid;
				$expense_id_ = $expense->getId();
				$amountpy_ = $expense->profile->amountpay;
				$now_ = date('d-m-Y');
				$recc = $expense->profile->recc;
				$tot__ = $expense->profile->total;
				$amountpay___ = $expense->profile->amountpay;
				$debt_ = $tot__ - $amountpay___;
				$iva_paid = $expense->profile->iva_paid;
				
				//iva (expenses)
				$options_ = array(
					  'user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId(),
					  'expense_number' => $expense->getId()
					  );

				$cashes_e = DatabaseObject_Cashexpense::GetExpenses($this->db, $options_);
				// ends iva (expenses)
				
				if ($project_id_ == $project_id) {
				
					//data for panel de control
				    foreach ($cashes_e as $cash) {
				        $pay_e = $pay_e + $cash->profile->amountpay;
					}
					// ends data for panel de control
					
					if ($recc && !$paid_) {
						$special_case_ = true;
					}
	
					if ($ts_created >= $default_year_start_){
						
						$total_e = $total_e + $tot__;
						$total_net_e = $total_net_e + $expense->profile->base * (100 - $expense->profile->retention) / 100;
					}
										
					//for all kind of expenses
					if($ts_created >= $default_year_start_){
						$expenses_up[] = $expense->getId();
						$total_up_e =  $total_up_e + $tot__ - $amountpy_;
						$total_net_up_e = $total_net_up_e + $expense->profile->base * (100 - $expense->profile->retention) / 100;
						
						if ($amountpy_){
									$sub_tt = $expense->profile->base * (100 - $expense->profile->retention) / 100;
									$amtpy = $amountpy_ * $sub_tt /$expense->profile->total;
									$total_net_up_e = $total_net_up_e - $amtpy;
						}
						
						if ($expense->profile->expense_valid){
							if ($expense->profile->expense_valid == 0.00){
								$valid_until_ = $expense->profile->expense_date;
								$valid_until_up_e[] = $expense->profile->expense_date;
							}
							else {
								$valid_until_ = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));
								$valid_until_up_e[] = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));
							}
						}
						else {
							$valid_until_ = $expense->profile->expense_date;
							$valid_until_up_e[] = $expense->profile->expense_date;
						}

						if($paid_){
							$status_ii_e[] = "Pagado";
							$class_ii_e[] = "cobrada";
						}
						elseif($amountpy_){
							$status_ii_e[] = "Parcialmente Pagado";
							$class_ii_e[] = "parcial";
						}
						elseif(strtotime($valid_until_) > strtotime($now_)){
							$status_ii_e[] = "Pendiente";
							$class_ii_e[] = "pendiente";
						}
						else {
							$status_ii_e[] = "Vencido";
							$class_ii_e[] = "vencida";
						}
					}

					//ends all expenses
					
						foreach ($itemsliste as $item) {
							if ($expense_id_ == $item->document_id){
								
									if (!$discount){
										$discount = 1;
									}
							
									$quan_pro = $item->profile->quantity;
									$price_pro = $item->profile->unit_price;
									$subtotal = $item->profile->subtotal;
									$iva__ = $item->profile->iva_p;
									$iva2__ = $item->profile->iva2_p;
									
									$tot_pro_r_e = $subtotal * $discount;
									$tot_iva1 = $tot_pro_r_e * $iva__ * 0.01;
									$tot_iva2 = $tot_pro_r_e * $iva2__ * 0.01;
									
									if ($iva_paid){
										$iva_paid_e = $iva_paid_e + $tot_iva1;
									}
									
									if ($ts_created >= $default_year_start_){
										$total_iva_e = $total_iva_e + $tot_iva1;
									}
									
									if (!$paid_){
										$total_iva_up_e = $total_iva_up_e + $tot_iva1;
										
										if ($amountpy_){
												$iva_avrg = $amountpy_ * $tot_iva1 / $expense->profile->total;
												$total_iva_up_e = $total_iva_up_e - $iva_avrg;
										}
									}
								 }
							   }			
				  		    }
				  		}
			
			$this->view->status_ii_e = $status_ii_e;
			$this->view->class_ii_e = $class_ii_e;
			$this->view->valid_until_up_e = $valid_until_up_e;
			$this->view->total_net_up_e = $total_net_up_e;
			$this->view->total_iva_up_e = $total_iva_up_e;
			$this->view->total_iva_e = $total_iva_e;
			
			$this->view->total_e = $total_e;
			$this->view->total_net_e = $total_net_e;
			$this->view->expenses_up = $expenses_up;
			
			$this->view->total_up_e = $total_up_e;

			//ends analytics	 for expenses	
			
			//invoice stuff comming
			foreach ($invoices as $invoice) {
				$project_id__ = $invoice->profile->project_id;
  				$default_year_start_ = strtotime($default_year_start);
				$publised_ = $invoice->profile->published;
				$disc_i = $invoice->profile->discount;
				$discount_ = (100 - $disc_i)/100;
				$ts_created_i = $invoice->profile->invoice_date;
				$ts_created__ = strtotime($ts_created_i);
				$paid = $invoice->profile->paid;
				$invoice_id_ = $invoice->getId();
				$amontpy_ = $invoice->profile->amountpay;
				$now_ = date('d-m-Y');
				$rec_ = $invoice->profile->recc;
				$total__ = $invoice->profile->total;
				$debt = $total__ - $amontpy_;
				$iva_paid_ = $invoice->profile->iva_paid;
				
				//iva (invoices)
				$options_ = array(
					  'user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId(),
					  'invoice_number' => $invoice->getId()
					  );

				$cashes = DatabaseObject_Cashflow::GetInvoices($this->db, $options_);
				// ends iva (invoices)
				
				if ($project_id__ == $project_id) {
				
					//data for panel de control
				    foreach ($cashes as $cash) {
				        $pay_i = $pay_i + $cash->profile->amountpay;
					}
					// ends data for panel de control
					
					if ($rec_ && !$paid) {
						$special_case = true;
					}

					if ($publised_){
						if ($ts_created__ >= $default_year_start_){	
							$invoices_paid[] = $invoice->profile->paid;
							$total_i = $total_i + $total__;
							$total_net_i = $total_net_i + $invoice->profile->base * (100 - $invoice->profile->retention) / 100;
						}
						
					//for all kind of invoices		
					if ($ts_created__ >= $default_year_start_){
							$invoices_up[] = $invoice->getId();
							$total_up_i =  $total_up_i + $total__ - $amontpy_;
							$total_net_up_i = $total_net_up_i + $invoice->profile->base * (100 - $invoice->profile->retention) / 100;

							if ($amontpy_){
									$sub_tt = $invoice->profile->base * (100 - $invoice->profile->retention) / 100;
									$amtpy = $amontpy_ * $sub_tt /$invoice->profile->total;
									$total_net_up_i = $total_net_up_i - $amtpy;
							}
		
						if ($invoice->profile->invoice_valid){
							if ($invoice->profile->invoice_valid == 0.00){
								$valid_until__ = $invoice->profile->invoice_date;
								$valid_until_up[] = $invoice->profile->invoice_date;
							}
							else {
								$valid_until__ = date('d-m-Y', strtotime($invoice->profile->invoice_date . ' + ' . $invoice->profile->invoice_valid . ' days'));
								$valid_until_up[] = date('d-m-Y', strtotime($invoice->profile->invoice_date . ' + ' . $invoice->profile->invoice_valid . ' days'));
							}
						}
						else {
							$valid_until__ = $invoice->profile->invoice_date;
							$valid_until_up[] = $invoice->profile->invoice_date;
						}

						if($paid){
							$status_ii[] = "Cobrada";
							$class_ii[] = "cobrada";
						}
						elseif($amontpy_){
							$status_ii[] = "Parcialmente Cobrada";
							$class_ii[] = "parcial";
						}
						elseif(isset($publised_) && strtotime($valid_until__) >= strtotime($now_)){
							$status_ii[] = "Pendiente";
							$class_ii[] = "pendiente";
						}
						elseif(isset($publised_) && strtotime($valid_until__) < strtotime($now_)){
							$status_ii[] = "Vencida";
							$class_ii[] = "vencida";
						}
						else {
							$status_ii[] = "Borrador";
							$class_ii[] = "borrador";
						}
					}
				}
					//ends invoices
					
						foreach ($itemslist as $item) {
							if ($invoice_id_ == $item->document_id){
								
									if (!$discount_){
										$discount_ = 1;
									}
							
									$quan_pro = $item->profile->quantity;
									$price_pro = $item->profile->unit_price;
									$subtotal_ = $item->profile->subtotal;
									$iva_ = $item->profile->iva;
									$iva2_ = $item->profile->iva2;
									
									$tot_pro_r = $subtotal_ * $discount_;
									$tot_iva1_ = $tot_pro_r * $iva_ * 0.01;
									$tot_iva2_ = $tot_pro_r * $iva2_ * 0.01;
									
									if ($iva_paid_){
										$iva_paid_i = $iva_paid_i + $tot_iva1_;
									}
									
									if ($publised_){
																			
									if ($ts_created__ >= $default_year_start_){	
										$total_iva_i = $total_iva_i + $tot_iva1_;
									}
									
									if (!$paid){
										$total_iva_up_i = $total_iva_up_i + $tot_iva1_;
										
										if ($amontpy_){
												$iva_avrg = $amontpy_ * $tot_iva1_ / $invoice->profile->total;
												$total_iva_up_i = $total_iva_up_i - $iva_avrg;
										}	
									}							
								 }
							   }			
				  		    }
					    }
					 }


			$cashflow = ($pay_i - $pay_e) - ($iva_paid_i -$iva_paid_e);
			$profit = $total_net_i - $total_net_e;
			
			$this->view->total_i = $total_i;
			$this->view->total_net_i = $total_net_i;
			$this->view->total_iva_i = $total_iva_i;
			
			///ends iva
			
			$this->view->cashflow = $cashflow;
			$this->view->profit = $profit;
			
			$this->view->status_ii = $status_ii;
			$this->view->class_ii = $class_ii;
			$this->view->valid_until_up = $valid_until_up;
			$this->view->total_up_i = $total_up_i;
			$this->view->total_net_up_i = $total_net_up_i;
			$this->view->total_iva_up_i = $total_iva_up_i;
			$this->view->total_iva_i = $total_iva_i;
			
			$this->view->invoices_up = $invoices_up;
			
			$this->view->month_start = $month_start;
			$this->view->month__ = $month__;

			//ends analytics	 for incomming/invoices	
					
        }

    	
 		public function agregarAction()
        {
        		$this->breadcrumbs->addStep('Agregar', $this->getUrl('agregar', 'proyectos'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section6 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
        		
			$request = $this->getRequest();
			$project_id = (int) $this->getRequest()->getQuery('id');
			$comp_id = $request->getPost('company_id');
			$addr_id2 = $request->getPost('address_id');
			
			$now__ = date('d-m-Y');
			
			$next__ = date('d-m-Y', strtotime($now__. ' + 1 days'));
			
			$this->view->now__ = $now__;
			
			$this->view->next__ = $next__;
			
			
			$contact_id = (int) $this->getRequest()->getQuery('id');
			$this->view->contact_id = $contact_id;
			
			$fp = new FormProcessor_Project($this->db,
                                             $this->identity->user_id,
                                             $project_id,
											$comp_id);
			
			if ($fp->project->getId()) {		
            $project = new DatabaseObject_Project($this->db);
            if (!$project->loadForUser($this->identity->user_id, $project_id))
                $this->_redirect($this->getUrl());
			
			$this->view->project = $project;
			
			//shows european currency
			$fbudget = str_replace('.', ',', $project->profile->budget);
			$project->profile->budget = $fbudget;
			
			$fexpense = str_replace('.', ',', $project->profile->expense);
			$project->profile->expense = $fexpense;
			
			}
			
			if (!$company_id2) {
				if ($project_id  == 0) {
					$company_id2 = $this->identity->company_id2;
				}
				else {
					$company_id2 = $project_id;
				}
			}
			
			if (!$company_id3) {
				if ($project_id  == 0) {
					$company_id3 = $this->identity->company_id3;
				}
				else {
					$company_id3 = $project_id;
				}
			}
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Ccompany::GetAllCompanies($this->db,
                                                       $options);
			
			$this->view->companieslist = $companieslist;
			
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $contactslist = DatabaseObject_Contact::GetAllContacts($this->db,
                                                       $options);
			
			$this->view->contactslist = $contactslist;
			
			
			
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
				$data_type_[$i]='company';
				global $i;
				$i++;
			}
			
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
				$data_[$i]=$contact->getId();
				$address_[] = unserialize(base64_decode($contact->profile->company_address));
				$data_type_[$i]='contact';
				global $i;
				$i++;
			}
			
			$this->view->company_ = $company_;
			$this->view->data_ = $data_;
			$this->view->address_ = $address_;
			$this->view->data_type_ = $data_type_;
			
						
			$i = 0;
			$contact_ = array();
			$data_c = array();
            foreach ($contactslist as $contact) {
            		$comp_1 = $contact->profile->first_name;
				$comp2_1 = str_replace("'", "\'", $comp_1);
            		$comp_2 = $contact->profile->middle_name;
				$comp2_2 = str_replace("'", "\'", $comp_2);
            		$comp_3 = $contact->profile->last_name;
				$comp2_3 = str_replace("'", "\'", $comp_3);
            		$comp_4 = $contact->profile->second_last_name;
				$comp2_4 = str_replace("'", "\'", $comp_4);
				$contact_[]=$comp2_1 ." ". $comp2_2 ." ". $comp2_3 ." ". $comp2_4;
				$data_c[] = $contact->getId();
				global $i;
				$i++;
			}
			
			$this->view->contact_ = $contact_;
			$this->view->data_c = $data_c;
			//////////
			
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
                'doc_type'   => 'project',
                'doc_id'   => $company_id3
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;

			//default values for the company
			$comp__ = new DatabaseObject_Company($this->db);
            $comp__->loadForUser($this->identity->user_id);
			
			$default_iva = $comp__->profile->iva;
			$default_iva2 = $comp__->profile->iva2;
			$default_retention = $comp__->profile->retention;
			$default_invoice_number = $comp__->profile->invoice_number;
			$default_number_start = $comp__->profile->number_start;
			$default_consecutive = $comp__->profile->consecutive;
			$default_number_zero = $comp__->profile->number_zero;
			$default_number_start_letter = $comp__->profile->number_start_letter;
			$default_currency = $comp__->profile->currency;
			$default_recc = $comp__->profile->recc;
			
			$this->view->default_iva = $default_iva;
			$this->view->default_iva2 = $default_iva2;
			$this->view->default_retention = $default_retention;
			$this->view->default_invoice_number = $default_invoice_number;
			$this->view->default_number_start = $default_number_start;
			$this->view->default_number_zero = $default_number_zero;
			$this->view->default_consecutive = $default_consecutive;
			$this->view->default_number_start_letter = $default_number_start_letter;
			$this->view->default_currency = $default_currency;
			$this->view->default_recc = $default_recc;
		
			$this->view->company_id2 = $company_id2;
			$this->view->company_id3 = $company_id3;
			
											 						 
            if ($request->getPost('add')) {
            	//$this->messenger->addMessage('projecto aregado con exito');
                if ($fp->process($request)) {
                		$this->identity->company_id3 = null;
					$this->identity->company_id2 = null;
				    $this->_redirect($this->getUrl('fichaproyecto') . '?id=' . $fp->project->getId());
                }
                else {
                     $next__ = $now__;
					$this->view->next__ = $next__;
                }
            }
			
			
			$this->view->fp = $fp;
        }
		
       public function indexAction()
        {
			if ($this->identity->user_type == 'employee' && $this->identity->section6 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
       		$request = $this->getRequest();
			$project_id = $request->getPost('project_id');
			$now__ = date('d-m-Y');
			$this->view->now__ = $now__;
			
			$now__ = date('d-m-Y');
			
			$next__ = date('d-m-Y', strtotime($now__. ' + 1 days'));
			
			$this->view->now__ = $now__;
			
			$this->view->next__ = $next__;
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $tasks = DatabaseObject_Task::GetAllTasks($this->db, $options);

			//calendar chart
			
			$config = Zend_Registry::get('config');
			$droute = $config->paths->include;
				
			require_once $droute . '/calendar/calendar.php';

			$month = isset($_GET['m']) ? $_GET['m'] : NULL;
			$year  = isset($_GET['y']) ? $_GET['y'] : NULL;
			
			$calendar = Calendar::factory($month, $year);
			
			foreach($tasks as $task){
				$start_ = $task->profile->start;
				$end_ = $task->profile->ends;
				
				if (!$end_){
					$event_ = $calendar->event()
					->condition('timestamp', strtotime($start_))
					->output($task->profile->task_title);
					$calendar->standard('today')->standard('prev-next')->attach($event_);
				}
				else {
				  if (strtotime($end_) > strtotime($start_)){
				  	 $start = strtotime($start_);
					 $end = strtotime($end_);
					 $diff = $end - $start;
				  	 $daysleft=floor($diff/(60*60*24));
					 $new_start = $start_;
					 for ($i = 0; $i <= $daysleft; $i++) {
							$event_ = $calendar->event()
							->condition('timestamp', strtotime($new_start))
							->output($task->profile->task_title);
							$calendar->standard('today')->standard('prev-next')->attach($event_);
	    						$new_start = date('d-m-Y', strtotime($new_start. ' + 1 days'));
					 }
					 
				  }
				  elseif (strtotime($end_) == strtotime($start_)){
						$event_ = $calendar->event()
						->condition('timestamp', strtotime($start_))
						->output($task->profile->task_title);
						$calendar->standard('today')->standard('prev-next')->attach($event_);
				  }
				}
				
				
			}


			if ($calendar->month() == 'January'){
		    		$month_ = 'Enero';
		    	}
		    	elseif ($calendar->month() == 'February'){
		    		$month_ = 'Febrero';
		    	}
		    	elseif ($calendar->month() == 'March'){
		    		$month_ = 'Marzo';
		    	}
		    	elseif ($calendar->month() == 'April'){
		    		$month_ = 'Abril';
		    	}
		    	elseif ($calendar->month() == 'May'){
		    		$month_ = 'Mayo';
		    	}
		    	elseif ($calendar->month() == 'June'){
		    		$month_ = 'Junio';
		    	}
		    elseif ($calendar->month() == 'July'){
		    		$month_ = 'Julio';
		    	}
		    	elseif ($calendar->month() == 'August'){
		    		$month_ = 'Agosto';
		    	}
		    	elseif ($calendar->month() == 'September'){
		    		$month_ = 'Septiembre';
		    	}
		    	elseif ($calendar->month() == 'October'){
		    		$month_ = 'Octubre';
		    	}
		    	elseif ($calendar->month() == 'November'){
		    		$month_ = 'Noviembre';
		    	}
			else {
		    		$month_ = 'Diciembre';
		    	}
			
			//preview
			if ($calendar->prev_month() == '&lsaquo; January'){
		    		$month_p = '&lsaquo; Enero';
		    	}
		    	elseif ($calendar->prev_month() == '&lsaquo; February'){
		    		$month_p = '&lsaquo; Febrero';
		    	}
		    	elseif ($calendar->prev_month() == '&lsaquo; March'){
		    		$month_p = '&lsaquo; Marzo';
		    	}
		    	elseif ($calendar->prev_month() == '&lsaquo; April'){
		    		$month_p = '&lsaquo; Abril';
		    	}
		    	elseif ($calendar->prev_month() == '&lsaquo; May'){
		    		$month_p = '&lsaquo; Mayo';
		    	}
		    	elseif ($calendar->prev_month() == '&lsaquo; June'){
		    		$month_p = '&lsaquo; Junio';
		    	}
		    elseif ($calendar->prev_month() == '&lsaquo; July'){
		    		$month_p = '&lsaquo; Julio';
		    	}
		    	elseif ($calendar->prev_month() == '&lsaquo; August'){
		    		$month_p = '&lsaquo; Agosto';
		    	}
		    	elseif ($calendar->prev_month() == '&lsaquo; September'){
		    		$month_p = '&lsaquo; Septiembre';
		    	}
		    	elseif ($calendar->prev_month() == '&lsaquo; October'){
		    		$month_p = '&lsaquo; Octubre';
		    	}
		    	elseif ($calendar->prev_month() == '&lsaquo; November'){
		    		$month_p = '&lsaquo; Noviembre';
		    	}
			else {
		    		$month_p = '&lsaquo; Diciembre';
		    	}

			//next
			if ($calendar->next_month() == 'January &rsaquo;'){
		    		$month_n = 'Enero &rsaquo;';
		    	}
		    	elseif ($calendar->next_month() == 'February &rsaquo;'){
		    		$month_n = 'Febrero &rsaquo;';
		    	}
		    	elseif ($calendar->next_month() == 'March &rsaquo;'){
		    		$month_n = 'Marzo &rsaquo;';
		    	}
		    	elseif ($calendar->next_month() == 'April &rsaquo;'){
		    		$month_n = 'Abril &rsaquo;';
		    	}
		    	elseif ($calendar->next_month() == 'May &rsaquo;'){
		    		$month_n = 'Mayo &rsaquo;';
		    	}
		    	elseif ($calendar->next_month() == 'June &rsaquo;'){
		    		$month_n = 'Junio &rsaquo;';
		    	}
		    elseif ($calendar->next_month() == 'July &rsaquo;'){
		    		$month_n = 'Julio &rsaquo;';
		    	}
		    	elseif ($calendar->next_month() == 'August &rsaquo;'){
		    		$month_n = 'Agosto &rsaquo;';
		    	}
		    	elseif ($calendar->next_month() == 'September &rsaquo;'){
		    		$month_n = 'Septiembre &rsaquo;';
		    	}
		    	elseif ($calendar->next_month() == 'October &rsaquo;'){
		    		$month_n = 'Octubre &rsaquo;';
		    	}
		    	elseif ($calendar->next_month() == 'November &rsaquo;'){
		    		$month_n = 'Noviembre &rsaquo;';
		    	}
			else {
		    		$month_n = 'Diciembre &rsaquo;';
		    	}

			$out = '<table class="calendar"><thead><tr class="navigation"><th class="prev-month"><a href="';
			$out .= htmlspecialchars($calendar->prev_month_url()) .'">';
			$out .= $month_p .'</a></th><th colspan="5" class="current-month">';
			$out .=	$month_ . ' ' . $calendar->year() .'</th><th class="next-month"><a href="';
			$out .=	htmlspecialchars($calendar->next_month_url()) .'">'; 
			$out .=	$month_n . '</a></th></tr><tr class="weekdays">';
			foreach ($calendar->days() as $day){
			
			if ($day == 'Monday'){
		    		$day = 'Lunes';
		    	}
		    	elseif ($day == 'Tuesday'){
		    		$day = 'Martes';
		    	}
		    	elseif ($day == 'Wednesday'){
		    		$day = 'Mi&eacute;rcoles';
		    	}
		    	elseif ($day == 'Thursday'){
		    		$day = 'Jueves';
		    	}
		    	elseif ($day == 'Friday'){
		    		$day = 'Viernes';
		    	}
		    	elseif ($day == 'Saturday'){
		    		$day = 'S&aacute;bado';
		    	}
		    	else {
		    		$day = 'Domingo';
		    	}
				
			$out .= '<th>' . $day . '</th>'; }
			$out .=	'</tr></thead><tbody>';
			foreach ($calendar->weeks() as $week){
						$out .=	'<tr>';
							 foreach ($week as $day){ 
								
								list($number, $current, $data) = $day;
								
								$classes = array();
								$output  = '';
								
								if (is_array($data))
								{
									$classes = $data['classes'];
									$title   = $data['title'];
									$output  = empty($data['output']) ? '' : '<ul class="output"><li>'.implode('</li><li>', $data['output']).'</li></ul>';
								}
								
								$out .= '<td class="day';
								$out .= implode(' ', $classes);
								$out .= '"><span class="date" title="">';
								//$out .= implode(' /', $title) .'">';
								$out .= $number . '</span><div class="day-content">';
								$out .=	$output;
								$out .= '</div></td>';
							 } 
						$out .= '</tr>';
					 } 
				$out .= '</tbody></table>';
				
			$this->view->calendar = $calendar;
			$this->view->out = $out;
			/////////
			
			$this->view->calendar = $calendar;
			$this->view->previous_year = $previous_year;
			$this->view->previous_month = $previous_month;
			$this->view->next_year = $next_year;
			$this->view->next_month = $next_month;
			
			////

		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $projects = DatabaseObject_Project::GetAllProjects($this->db,
                                                       $options);
			
			$this->view->projects = $projects;
			
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $tasks = DatabaseObject_Task::GetAllTasks($this->db, $options);
			
			$expenses = array();	
			foreach ($tasks as $task) {
				if ($task->profile->expense && $task->profile->project_id){
					$id_ = $task->profile->project_id;
					$expenses[$id_] = $expenses[$id_] + $task->profile->expense;
				}
			}
								
			
			$this->view->expenses = $expenses;
			
			$timeleft = array();
            foreach ($projects as $project) {
            	$myid = $project->getId();
              if ($project->profile->start && $project->profile->ends){
				$dStart = strtotime($project->profile->start);
				$dEnd = strtotime($project->profile->ends);
				$dDiff = $dEnd - $dStart;
				$days = floor($dDiff/(3600*24));
				$timeleft[$myid] = $days . ' d&iacute;a(s)';
			  }
			  else{
			  	$timeleft[$myid] = 'N/A';
			  }
			}
			
			$this->view->timeleft = $timeleft;

			
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
			
			$prod =new DatabaseObject_Project($this->db);
											   
			if ($request->getPost('delete')) {
			 	if ($project_id) {
			 		$prod->deleteProjectProfile($this->db, $project_id);
					$prod->deleteProject($this->db, $project_id);
					$this->_redirect($this->getUrl('index'));
			    }
             }
		}

    	
        public function editartareaAction()
        {
        		$this->breadcrumbs->addStep('Editar Tarea', $this->getUrl('editartarea', 'proyectos'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section6 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
			$request = $this->getRequest();	
			$task_id = (int) $this->getRequest()->getQuery('id');
			$comp_id = $request->getPost('project_id');
			
            $taski = new DatabaseObject_Task($this->db);	
            if (!$taski->loadForUser($this->identity->user_id, $task_id))
                $this->_redirect($this->getUrl('index','proyectos'));
		
			///start autocomplete
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $contactslist = DatabaseObject_Contact::GetAllContacts($this->db,
                                                       $options);
			
			$this->view->contactslist = $contactslist;
							
			$i = 0;
			$contact_ = array();
			$data_c = array();
            foreach ($contactslist as $contact) {
            		$comp_1 = $contact->profile->first_name;
				$comp2_1 = str_replace("'", "\'", $comp_1);
            		$comp_2 = $contact->profile->middle_name;
				$comp2_2 = str_replace("'", "\'", $comp_2);
            		$comp_3 = $contact->profile->last_name;
				$comp2_3 = str_replace("'", "\'", $comp_3);
            		$comp_4 = $contact->profile->second_last_name;
				$comp2_4 = str_replace("'", "\'", $comp_4);
				$contact_[]=$comp2_1 ." ". $comp2_2 ." ". $comp2_3 ." ". $comp2_4;
				$data_c[] = $contact->getId();
				$i++;
			}
			
			$this->view->contact_ = $contact_;
			$this->view->data_c = $data_c;
			///ends autocomplete
			
			//autocomplete projects
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $projectslist = DatabaseObject_Project::GetAllProjects($this->db,
                                                       $options);
			
			$this->view->projectslist = $projectslist;
			
			$i = 0;
			$project_ = array();
			$data_p = array();
            foreach ($projectslist as $project) {
            		$comp_=$project->project_title;
				$comp2_ = str_replace("'", "\'", $comp_);
				$project_[]=$comp2_;
				$data_p[] = $project->getId();
				$i++;
			}
			
			$this->view->project_ = $project_;
			$this->view->data_p = $data_p;
			//ends autocomplete
			
			//default values for the company
			$comp__ = new DatabaseObject_Company($this->db);
            $comp__->loadForUser($this->identity->user_id);
			
			$default_iva = $comp__->profile->iva;
			$default_iva2 = $comp__->profile->iva2;
			$default_retention = $comp__->profile->retention;
			$default_invoice_number = $comp__->profile->invoice_number;
			$default_number_start = $comp__->profile->number_start;
			$default_consecutive = $comp__->profile->consecutive;
			$default_number_zero = $comp__->profile->number_zero;
			$default_number_start_letter = $comp__->profile->number_start_letter;
			$default_currency = $comp__->profile->currency;
			$default_recc = $comp__->profile->recc;
			
			$this->view->default_iva = $default_iva;
			$this->view->default_iva2 = $default_iva2;
			$this->view->default_retention = $default_retention;
			$this->view->default_invoice_number = $default_invoice_number;
			$this->view->default_number_start = $default_number_start;
			$this->view->default_number_zero = $default_number_zero;
			$this->view->default_consecutive = $default_consecutive;
			$this->view->default_number_start_letter = $default_number_start_letter;
			$this->view->default_currency = $default_currency;
			$this->view->default_recc = $default_recc;
			
            $task = new DatabaseObject_Task($this->db);	
            if (!$task->loadForUser($this->identity->user_id, $task_id))
                $this->_redirect($this->getUrl());
            
			$this->view->task = $task;
		
			$fp = new FormProcessor_Task($this->db,
                                             $this->identity->user_id,
                                             $task_id,
											$comp_id);
											 
			$this->view->fp = $fp;
			
			//shows european currency
			$mbudget = str_replace('.', ',', $fp->budget);
			$fp->budget = $mbudget;
			
			$mexpense = str_replace('.', ',', $fp->expense);
			$fp->expense = $mexpense;

			if ($request->getPost('edit')) {
            	   if ($fp->process($request)) {
                 	$task->save();
				    $this->_redirect($this->getUrl('tareas'));		    
                }
            }
					
        }

	public function agregartareaAction()
        {
        		$this->breadcrumbs->addStep('Agregar Tarea', $this->getUrl('agregartarea', 'proyectos'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section6 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
				
			$request = $this->getRequest();
			$task_id = (int) $this->getRequest()->getQuery('id');
			$comp_id = $request->getPost('project_id');
			
			$now__ = date('d-m-Y');
			
			$next__ = date('d-m-Y', strtotime($now__. ' + 1 days'));
			
			$this->view->now__ = $now__;
			
			$this->view->next__ = $next__;

			$fp = new FormProcessor_Task($this->db,
                                             $this->identity->user_id,
                                             $task_id,
											$comp_id);
			
			if ($fp->task->getId()) {		
            $task = new DatabaseObject_Task($this->db);
            if (!$task->loadForUser($this->identity->user_id, $task_id))
                $this->_redirect($this->getUrl());
			
			$this->view->task = $task;
			
			//shows european currency
			$fbudget = str_replace('.', ',', $task->profile->budget);
			$task->profile->budget = $fbudget;
			
			$fexpense = str_replace('.', ',', $task->profile->expense);
			$task->profile->expense = $fexpense;
			
			}
			
			///start autocomplete
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $contactslist = DatabaseObject_Contact::GetAllContacts($this->db,
                                                       $options);
			
			$this->view->contactslist = $contactslist;
							
			$i = 0;
			$contact_ = array();
			$data_c = array();
            foreach ($contactslist as $contact) {
            		$comp_1 = $contact->profile->first_name;
				$comp2_1 = str_replace("'", "\'", $comp_1);
            		$comp_2 = $contact->profile->middle_name;
				$comp2_2 = str_replace("'", "\'", $comp_2);
            		$comp_3 = $contact->profile->last_name;
				$comp2_3 = str_replace("'", "\'", $comp_3);
            		$comp_4 = $contact->profile->second_last_name;
				$comp2_4 = str_replace("'", "\'", $comp_4);
				$contact_[]=$comp2_1 ." ". $comp2_2 ." ". $comp2_3 ." ". $comp2_4;
				$data_c[] = $contact->getId();
				$i++;
			}
			
			$this->view->contact_ = $contact_;
			$this->view->data_c = $data_c;
			///ends autocomplete
		
			//autocomplete projects
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $projectslist = DatabaseObject_Project::GetAllProjects($this->db,
                                                       $options);
			
			$this->view->projectslist = $projectslist;
			
			$i = 0;
			$project_ = array();
			$data_p = array();
            foreach ($projectslist as $project) {
            		$comp_=$project->project_title;
				$comp2_ = str_replace("'", "\'", $comp_);
				$project_[]=$comp2_;
				$data_p[] = $project->getId();
				$i++;
			}
			
			$this->view->project_ = $project_;
			$this->view->data_p = $data_p;
			//ends autocomplete

			//default values for the company
			$comp__ = new DatabaseObject_Company($this->db);
            $comp__->loadForUser($this->identity->user_id);
			
			$default_iva = $comp__->profile->iva;
			$default_iva2 = $comp__->profile->iva2;
			$default_retention = $comp__->profile->retention;
			$default_invoice_number = $comp__->profile->invoice_number;
			$default_number_start = $comp__->profile->number_start;
			$default_consecutive = $comp__->profile->consecutive;
			$default_number_zero = $comp__->profile->number_zero;
			$default_number_start_letter = $comp__->profile->number_start_letter;
			$default_currency = $comp__->profile->currency;
			$default_recc = $comp__->profile->recc;
			
			$this->view->default_iva = $default_iva;
			$this->view->default_iva2 = $default_iva2;
			$this->view->default_retention = $default_retention;
			$this->view->default_invoice_number = $default_invoice_number;
			$this->view->default_number_start = $default_number_start;
			$this->view->default_number_zero = $default_number_zero;
			$this->view->default_consecutive = $default_consecutive;
			$this->view->default_number_start_letter = $default_number_start_letter;
			$this->view->default_currency = $default_currency;
			$this->view->default_recc = $default_recc;
		
			$this->view->company_id2 = $company_id2;
			$this->view->company_id3 = $company_id3;
			
											 						 
            if ($request->getPost('add')) {
            	//$this->messenger->addMessage('tasko aregado con exito');
                if ($fp->process($request)) {
				    $this->_redirect($this->getUrl('tareas'));
                }
                else {
                     $next__ = $now__;
					$this->view->next__ = $next__;
                }
            }
			
			
			$this->view->fp = $fp;
        }
		
       public function tareasAction()
        {
        		$this->breadcrumbs->addStep('Tareas', $this->getUrl('tareas', 'proyectos'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section6 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
        		$request = $this->getRequest();
			$task_id = $request->getPost('task_id');

		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $tasks = DatabaseObject_Task::GetAllTasks($this->db,
                                                       $options);
			
			$this->view->tasks = $tasks;
			
			$timeleft = array();
            foreach ($tasks as $task) {
            	$myid = $task->getId();
              if ($task->profile->start && $task->profile->ends){
				$dStart = strtotime($task->profile->start);
				$dEnd = strtotime($task->profile->ends);
				$dDiff = $dEnd - $dStart;
				$days = floor($dDiff/(3600*24));
				$timeleft[$myid] = $days . ' d&iacute;a(s)';
			  }
			  else{
			  	$timeleft[$myid] = 'N/A';
			  }
			}
			
			$this->view->timeleft = $timeleft;
			
			//hours
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $times = DatabaseObject_Time::GetAllTimes($this->db, $options);
			
			$this->view->times = $times;
			
			$hours_ = array();	
			foreach ($times as $time) {
				if ($time->profile->time_2 && $time->profile->task_id){
					$id_ = $time->profile->task_id;
					$hours_[$id_] = $hours_[$id_] + $time->profile->time_2;
				}
			}
			
			$hours2 = array();
			foreach ($tasks as $task) {
			    $id2 = $task->getId();
					if (!$hours_[$id2]){
						$hours_[$id2] = 0;	
					}
					$milliseconds = $hours_[$id2];	
				    $seconds = floor($milliseconds / 1000);
				    $minutes = floor($seconds / 60);
				    $hours = floor($minutes / 60);
				    $milliseconds =
				    $milliseconds % 1000;
				    $seconds = $seconds % 60;
				    $minutes = $minutes % 60;
				
				    $format = '%u:%02u:%02u.%03u';
				    $time = sprintf($format, $hours, $minutes, $seconds, $milliseconds);
				    $hours2[$id2] = rtrim($time, '0');
			}

			
			$this->view->hours2 = $hours2;
			//////////

			//autocomplete projects
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $projectslist = DatabaseObject_Project::GetAllProjects($this->db,
                                                       $options);
			
			$this->view->projectslist = $projectslist;
			
			$i = 0;
			$project_ = array();
			$data_p = array();
            foreach ($projectslist as $project) {
            		$comp_=$project->project_title;
				$comp2_ = str_replace("'", "\'", $comp_);
				$project_[]=$comp2_;
				$data_p[] = $project->getId();
				$i++;
			}
			
			$this->view->project_ = $project_;
			$this->view->data_p = $data_p;
			//ends autocomplete
			
			$prod =new DatabaseObject_Task($this->db);
			
			if ($request->getPost('delete')) {
			 	if ($task_id) {
			 		$prod->deleteTaskProfile($this->db, $task_id);
					$prod->deleteTask($this->db, $task_id);
					$this->_redirect($this->getUrl('tareas'));
			    }
             }
		}

        public function editarhoraAction()
        {
        		$this->breadcrumbs->addStep('Editar Hora', $this->getUrl('editarhora', 'proyectos'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section6 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
			$request = $this->getRequest();	
			$time_id = (int) $this->getRequest()->getQuery('id');
			$proj_id = $request->getPost('project_id');
			$task_id_ = $request->getPost('task_id');
			
            $timei = new DatabaseObject_Time($this->db);	
            if (!$timei->loadForUser($this->identity->user_id, $time_id))
                $this->_redirect($this->getUrl('index','proyectos'));

			//autocomplete projects
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $projectslist = DatabaseObject_Project::GetAllProjects($this->db,
                                                       $options);
			
			$this->view->projectslist = $projectslist;
			
			$i = 0;
			$project_ = array();
			$data_p = array();
            foreach ($projectslist as $project) {
            		$comp_=$project->project_title;
				$comp2_ = str_replace("'", "\'", $comp_);
				$project_[]=$comp2_;
				$data_p[] = $project->getId();
				$i++;
			}
			
			$this->view->project_ = $project_;
			$this->view->data_p = $data_p;
			//ends autocomplete
			
			//autocomplete tasks
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $taskslist = DatabaseObject_Task::GetAllTasks($this->db,
                                                       $options);
			
			$this->view->taskslist = $taskslist;
			
			$i = 0;
			$task_ = array();
			$data_t = array();
            foreach ($taskslist as $task) {
            		$comp_=$task->profile->task_title;
				$comp2_ = str_replace("'", "\'", $comp_);
				$task_[]=$comp2_;
				$data_t[] = $task->getId();
				$i++;
			}
			
			$this->view->task_ = $task_;
			$this->view->data_t = $data_t;
			//ends autocomplete
			
			//default values for the company
			$comp__ = new DatabaseObject_Company($this->db);
            $comp__->loadForUser($this->identity->user_id);
			
			$default_iva = $comp__->profile->iva;
			$default_iva2 = $comp__->profile->iva2;
			$default_retention = $comp__->profile->retention;
			$default_invoice_number = $comp__->profile->invoice_number;
			$default_number_start = $comp__->profile->number_start;
			$default_consecutive = $comp__->profile->consecutive;
			$default_number_zero = $comp__->profile->number_zero;
			$default_number_start_letter = $comp__->profile->number_start_letter;
			$default_currency = $comp__->profile->currency;
			$default_recc = $comp__->profile->recc;
			
			$this->view->default_iva = $default_iva;
			$this->view->default_iva2 = $default_iva2;
			$this->view->default_retention = $default_retention;
			$this->view->default_invoice_number = $default_invoice_number;
			$this->view->default_number_start = $default_number_start;
			$this->view->default_number_zero = $default_number_zero;
			$this->view->default_consecutive = $default_consecutive;
			$this->view->default_number_start_letter = $default_number_start_letter;
			$this->view->default_currency = $default_currency;
			$this->view->default_recc = $default_recc;
			
            $time = new DatabaseObject_Time($this->db);	
            if (!$time->loadForUser($this->identity->user_id, $time_id))
                $this->_redirect($this->getUrl());
            
			$this->view->time = $time;
		
			$fp = new FormProcessor_Time($this->db,
                                             $this->identity->user_id,
                                             $time_id,
											$proj_id,
											$task_id_);
											 
			$this->view->fp = $fp;

			if ($request->getPost('edit')) {
            	   if ($fp->process($request)) {
                 	$time->save();
				    $this->_redirect($this->getUrl('editarhora') . '?id=' . $fp->time->getId() . '&doc_type=ventana' . '&submitted=true');		    
                }
            }
					
        }

		public function avisoAction()
        {

        }

		public function agregarhoraAction()
        {
        		$this->breadcrumbs->addStep('Agregar Hora', $this->getUrl('agregarhora', 'proyectos'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section6 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
				
			$request = $this->getRequest();
			$time_id = (int) $this->getRequest()->getQuery('id');
			$proj_id = $request->getPost('project_id');
			$task_id_ = $request->getPost('task_id');
			
			$now__ = date('d-m-Y');
			
			$this->view->now__ = $now__;
		

			$fp = new FormProcessor_Time($this->db,
                                             $this->identity->user_id,
                                             $time_id,
											$proj_id,
											$task_id_);
			
			if ($fp->time->getId()) {		
            $time = new DatabaseObject_Time($this->db);
            if (!$time->loadForUser($this->identity->user_id, $time_id))
                $this->_redirect($this->getUrl());
			
			$this->view->time = $time;
			}
			
			//autocomplete projects
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $projectslist = DatabaseObject_Project::GetAllProjects($this->db,
                                                       $options);
			
			$this->view->projectslist = $projectslist;
			
			$i = 0;
			$project_ = array();
			$data_p = array();
            foreach ($projectslist as $project) {
            		$comp_=$project->project_title;
				$comp2_ = str_replace("'", "\'", $comp_);
				$project_[]=$comp2_;
				$data_p[] = $project->getId();
				$i++;
			}
			
			$this->view->project_ = $project_;
			$this->view->data_p = $data_p;
			//ends autocomplete
			
			//autocomplete tasks
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $taskslist = DatabaseObject_Task::GetAllTasks($this->db,
                                                       $options);
			
			$this->view->taskslist = $taskslist;
			
			$i = 0;
			$task_ = array();
			$data_t = array();
            foreach ($taskslist as $task) {
            		$comp_=$task->profile->task_title;
				$comp2_ = str_replace("'", "\'", $comp_);
				$task_[]=$comp2_;
				$data_t[] = $task->getId();
				$i++;
			}
			
			$this->view->task_ = $task_;
			$this->view->data_t = $data_t;
			//ends autocomplete

			//default values for the company
			$comp__ = new DatabaseObject_Company($this->db);
            $comp__->loadForUser($this->identity->user_id);
			
			$default_iva = $comp__->profile->iva;
			$default_iva2 = $comp__->profile->iva2;
			$default_retention = $comp__->profile->retention;
			$default_invoice_number = $comp__->profile->invoice_number;
			$default_number_start = $comp__->profile->number_start;
			$default_consecutive = $comp__->profile->consecutive;
			$default_number_zero = $comp__->profile->number_zero;
			$default_number_start_letter = $comp__->profile->number_start_letter;
			$default_currency = $comp__->profile->currency;
			$default_recc = $comp__->profile->recc;
			
			$this->view->default_iva = $default_iva;
			$this->view->default_iva2 = $default_iva2;
			$this->view->default_retention = $default_retention;
			$this->view->default_invoice_number = $default_invoice_number;
			$this->view->default_number_start = $default_number_start;
			$this->view->default_number_zero = $default_number_zero;
			$this->view->default_consecutive = $default_consecutive;
			$this->view->default_number_start_letter = $default_number_start_letter;
			$this->view->default_currency = $default_currency;
			$this->view->default_recc = $default_recc;
		
			$this->view->company_id2 = $company_id2;
			$this->view->company_id3 = $company_id3;
			
											 						 
            if ($request->getPost('add')) {
            	//$this->messenger->addMessage('timeo aregado con exito');
                if ($fp->process($request)) {
				    $this->_redirect($this->getUrl('editarhora') . '?id=' . $fp->time->getId() . '&doc_type=ventana' . '&command=cerrar');
                }
            }
			
			
			$this->view->fp = $fp;
        }
		
        public function horasAction()
        {
        		$this->breadcrumbs->addStep('Horas', $this->getUrl('horas', 'proyectos'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section6 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
        		$request = $this->getRequest();
			$time_id = $request->getPost('time_id');
			$time_id2 = $request->getPost('time_id2');
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $times = DatabaseObject_Time::GetAllTimes($this->db,
                                                       $options);
			
			$this->view->times = $times;

			$timeleft = array();
            foreach ($times as $time) {
            	$myid = $time->getId();
              if ($time->profile->start && $time->profile->ends){
				$dStart = strtotime($time->profile->start);
				$dEnd = strtotime($time->profile->ends);
				$dDiff = $dEnd - $dStart;
				$days = floor($dDiff/(3600*24));
				$timeleft[$myid] = $days . ' d&iacute;a(s)';
			  }
			  else{
			  	$timeleft[$myid] = 'N/A';
			  }
			}
			
			$this->view->timeleft = $timeleft;

			//autocomplete projects
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $projectslist = DatabaseObject_Project::GetAllProjects($this->db,
                                                       $options);
			
			$this->view->projectslist = $projectslist;
			
			$i = 0;
			$project_ = array();
			$data_p = array();
            foreach ($projectslist as $project) {
            		$comp_=$project->project_title;
				$comp2_ = str_replace("'", "\'", $comp_);
				$project_[]=$comp2_;
				$data_p[] = $project->getId();
				$i++;
			}
			
			$this->view->project_ = $project_;
			$this->view->data_p = $data_p;
			//ends autocomplete
			
			//autocomplete tasks
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $taskslist = DatabaseObject_Task::GetAllTasks($this->db,
                                                       $options);
			
			$this->view->taskslist = $taskslist;
			
			$i = 0;
			$task_ = array();
			$data_t = array();
            foreach ($taskslist as $task) {
            		$comp_=$task->profile->task_title;
				$comp2_ = str_replace("'", "\'", $comp_);
				$task_[]=$comp2_;
				$data_t[] = $task->getId();
				$i++;
			}
			
			$this->view->task_ = $task_;
			$this->view->data_t = $data_t;
			//ends autocomplete
			
			$prod =new DatabaseObject_Time($this->db);
			
			if ($request->getPost('delete')) {
			 	if ($time_id) {
			 		$prod->deleteTimeProfile($this->db, $time_id);
					$prod->deleteTime($this->db, $time_id);
					$this->_redirect($this->getUrl('horas'));
			    }
             }
			
            if ($request->getPost('convert')) {
				$invoice_id_ = 0;
				$fp5 = new FormProcessor_TimeInvoice($this->db, $this->identity->user_id, $invoice_id_, $time_id2);
				$this->view->fp5 = $fp5;
				if ($fp5->process($request)) {
                }
				
                foreach ($time_id2 as $time_id__) {
                	  //if ($item->getId()) {
                		$item_id_ = 0;
    					$fp3 = new FormProcessor_TimeInvoiceItem($this->db, $this->identity->user_id, $item_id_, $time_id__, $fp5->invoice->getId());
					$this->view->fp3 = $fp3;
              		if ($fp3->process($request)) {
                		}
				  //}
				}
				
				if ($fp5->process($request)) {
				    $this->_redirect($this->getUrl('editar','herramientas/facturas') . '?id=' . $fp5->invoice->getId());
                }
			}


		}

    }
?>