<?php
    class Herramientas_GastosController extends CustomControllerAction
    {
    		protected $user = null;
		protected $item = null;
        public function init()
        {
            parent::init();
            $this->breadcrumbs->addStep('Herramientas');
            $this->breadcrumbs->addStep('Gastos', $this->getUrl('index','herramientas/gastos'));
			
			$this->identity = Zend_Auth::getInstance()->getIdentity();
			if (!$this->identity->company_id2){
		    		$this->identity->company_id2 = DatabaseObject_Address::temporaryUser();
			}
			if (!$this->identity->company_id3){
			$this->identity->company_id3 = DatabaseObject_Address::temporaryUser();
			}
			
			if (!$this->identity)
                $this->_redirect($this->getUrl('index','herramientas/gastos'));
        }
		
		public function avisoAction()
        {

        }
    	
        public function editarAction()
        {
        		$this->breadcrumbs->addStep('Editar', $this->getUrl('editar','herramientas/gastos'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section2 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
			$request = $this->getRequest();	
			$expense_id = (int) $this->getRequest()->getQuery('id');
			$company_id = $request->getPost('original_company_id');
			$contact_id = $request->getPost('contact_id');
			$project_id = $request->getPost('project_id');
			$item_id2 = $request->getPost('item_id2');
			$address_id = 0;
			
			if (!$inv_id) {
				if ($expense_id  == 0) {
					$inv_id = $this->identity->company_id2;
				}
				else {
					$inv_id = $expense_id;
				}
			}
			
			$this->view->inv_id = $inv_id;
			
            $options = array(
                'user_id' => $this->identity->user_id,
                'document_id'   => $expense_id
            );

            $company = DatabaseObject_ExpenseCompany::GetCompanies($this->db, $options);
			
			$this->view->company = $company;
			
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
			
			$expensecount = DatabaseObject_Expense::GetExpensesDocId(
                $this->db,
                array('user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId())
            );
            $this->view->expensecount = $expensecount;
			
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

			//autocomplete contact
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $contactslist = DatabaseObject_Contact::GetAllContacts($this->db,
                                                       $options);
			
			$this->view->contactslist = $contactslist;
			
			$i = 0;
			$contact_ = array();
			$data_c = array();
			$address_c = array();
            foreach ($contactslist as $contact) {
            		$comp_=$contact->profile->first_name . ' ' . $contact->profile->middle_name . ' ' . $contact->profile->last_name . ' ' . $contact->profile->second_last_name;
				$comp2_ = str_replace("'", "\'", $comp_);
				$contact_[]=$comp2_;
				$data_c[] = $contact->getId();
				$address_c[] = $contact->profile->contact_address;
				$i++;
			}
			
			$this->view->contact_ = $contact_;
			$this->view->data_c = $data_c;
			$this->view->address_c = $address_c;
			
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
			
			
            $options = array(
                'user_id' => $this->identity->user_id,
                'document_type'   => 'expense',
                'document_id'   => $inv_id
            );

			
            $expense = new DatabaseObject_Expense($this->db);	
            if (!$expense->loadForUser($this->identity->user_id, $expense_id))
                $this->_redirect($this->getUrl('index','herramientas/gastos'));
            
			$this->view->expense = $expense;
		
		
			$fp = new FormProcessor_Expense($this->db,
                                             $this->identity->user_id,
                                             $expense_id,
											$company_id,
											$contact_id,
											$project_id,
											$item_id2,
											$company_id2,
											$address_id);
											 
			$this->view->fp = $fp;
			
            $options = array(
                'user_id'  => $this->identity->user_id,
                'document_type'   => 'expense',
                'document_id'   => $fp->expense->getId()
            );

            $items = DatabaseObject_Expitem::GetItems($this->db, $options);
			$items2 = DatabaseObject_Expitem::GetItems($this->db, $options);
			$items3 = DatabaseObject_Expitem::GetItems($this->db, $options);

			$iva_o = array();
			$iva2_o = array();
			
            foreach ($items as $item) {
				$iva_o[] = $item->profile->iva_p;
			}
			
            foreach ($items as $item) {
				$iva2_o[] = $item->profile->iva_p2;
			}
			
			array_multisort($iva_o, SORT_DESC, $items2);
			array_multisort($iva2_o, SORT_DESC, $items3);
			
			$this->view->items = $items;
			$this->view->items2 = $items2;
			$this->view->items3 = $items3;
			
			$a = 0;
			$iva__ = 0;
			$ivas_ = array();
            foreach ($items2 as $item) {
            		if ($item->profile->iva_p != $iva__){
            			$a++;
            			$ivas_[$a] = $item->profile->iva_p_total;
					$iva__ = $item->profile->iva_p;
				}
				else {
					$ivas_[$a] = $ivas_[$a] + $item->profile->iva_p_total;	
				}
			}
			
			$this->view->ivas_ = $ivas_;
			
			$b = 0;
			$iva2__ = 0;
			$ivas2_ = array();
            foreach ($items3 as $item) {
            		if ($item->profile->iva2 != $iva2__){
            			$b++;
            			$ivas2_[$b] = $item->profile->iva_p2_total;
					$iva2__ = $item->profile->iva_p2;
				}
				else {
					$ivas2_[$b] = $ivas2_[$b] + $item->profile->iva_p2_total;	
				}
			}
			
			$this->view->ivas2_ = $ivas2_;
				
			if ($request->getPost('edit')) {
            	   if ($fp->process($request)) {
                 	$expense->save();
				    $this->_redirect($this->getUrl('fichagasto','herramientas/gastos') . '?id=' . $fp->expense->getId());
					$this->identity->company_id2 = null;		    
                }
            }

          if ($request->getPost('delete2')) {    	
			 $item_id = $request->getPost('item_id');
			 $prod= new DatabaseObject_Expitem($this->db);		
			 	if ($item_id) {
			 		$prod->deleteItemProfile($this->db, $item_id);
					$prod->deleteItem($this->db, $item_id);
                		$this->_redirect($this->getUrl('editar','herramientas/gastos') . '?id=' . $fp->expense->getId()); 
			   }
            }
	
            if ($request->getPost('delete3')) {    	
			 $comp_id = $request->getPost('comp_id');
			 $prod3= new DatabaseObject_ExpenseCompany($this->db);
			 	if ($comp_id) {
			 		$prod3->deleteCompanyProfile($this->db, $comp_id);
					$prod3->deleteCompany($this->db, $comp_id);
                		$this->_redirect($this->getUrl('editar','herramientas/gastos') . '?id=' . $fp->expense->getId()); 
			   }
            }		  
		
        }

      public function fichagastoAction()
        {
        		$this->breadcrumbs->addStep('Ficha Gasto', $this->getUrl('fichagasto','herramientas/gastos'));
			
       		$request = $this->getRequest();
			$expense_id = (int) $this->getRequest()->getQuery('id');
			
            $expensei = new DatabaseObject_Expense($this->db);	
            if (!$expensei->loadForUser($this->identity->user_id, $expense_id))
                $this->_redirect($this->getUrl('index','herramientas/gastos'));
				
			//user company's details
			$company = new DatabaseObject_Company($this->db);
            $company->loadForUser($this->identity->user_id);
			
			$this->view->company = $company;
			
			$options_ = array(
					  'user_id' => $this->identity->user_id,
					  'company_id' =>  $company->getId(),
					  'expense_number' => $expense_id
					  );

			$cashes = DatabaseObject_Cashexpense::GetExpenses($this->db, $options_);
			
			$this->view->cashes = $cashes;
			
            $options = array(
                'user_id'  => $this->identity->user_id,
                'doc_type'   => 'company',
                'doc_id'   => $company->getId()
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			
            $expense = new DatabaseObject_Expense($this->db);
            $expense->loadForUser($this->identity->user_id, $expense_id);
			
			$this->view->expense = $expense;
			
			if ($expense->profile->expense_valid){
				if ($expense->profile->expense_valid == 0.00){
					$valid_until = $expense->profile->expense_date;
				}
				else {
					$valid_until = date('d-m-Y', strtotime($expense->profile->expense_date. ' + ' . $expense->profile->expense_valid . 'days'));
				}
			}
			else {
				$valid_until = $expense->profile->expense_date;
			}
			
			$this->view->valid_until = $valid_until;
			
            $options = array(
                'user_id' => $this->identity->user_id,
                'document_id'   => $expense_id
            );

            $client = DatabaseObject_ExpenseCompany::GetCompanies($this->db, $options);
			
			$this->view->client = $client;
			
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
			
            $options = array(
                'user_id'  => $this->identity->user_id,
                'document_type'   => 'expense',
                'document_id'   => $expense_id
            );

            $items = DatabaseObject_Expitem::GetItems($this->db, $options);
			$items2 = DatabaseObject_Expitem::GetItems($this->db, $options);
			$items3 = DatabaseObject_Expitem::GetItems($this->db, $options);

			$iva_o = array();
			$iva2_o = array();
			
            foreach ($items as $item) {
				$iva_o[] = $item->profile->iva_p;
			}
			
            foreach ($items as $item) {
				$iva2_o[] = $item->profile->iva_p2;
			}
			
			array_multisort($iva_o, SORT_DESC, $items2);
			array_multisort($iva2_o, SORT_DESC, $items3);
			
			$this->view->items = $items;
			$this->view->items2 = $items2;
			$this->view->items3 = $items3;
		
			
			$a = 0;
			$iva__ = 0;
			$ivas_ = array();
            foreach ($items2 as $item) {
            		if ($item->profile->iva_p != $iva__){
            			$a++;
            			$ivas_[$a] = $item->profile->iva_p_total;
					$iva__ = $item->profile->iva_p;
				}
				else {
					$ivas_[$a] = $ivas_[$a] + $item->profile->iva_p_total;	
				}
			}
			
			$this->view->ivas_ = $ivas_;
			
			$b = 0;
			$iva2__ = 0;
			$ivas2_ = array();
            foreach ($items3 as $item) {
            		if ($item->profile->iva_p2 != $iva2__){
            			$b++;
            			$ivas2_[$b] = $item->profile->iva_p2_total;
					$iva2__ = $item->profile->iva_p2;
				}
				else {
					$ivas2_[$b] = $ivas2_[$b] + $item->profile->iva_p2_total;	
				}
			}
			
			$this->view->ivas2_ = $ivas2_;
			
			
			if ($expense->profile->items){
				if (!is_array($expense->profile->items))
                		$expense->profile->items = array($expense->profile->items);
			
				foreach ($expense->profile->items as $id){
            			$item_ = new DatabaseObject_Expitem($this->db);
            			$item_->loadForUser($this->identity->user_id, $id);
					$items[] = $item_;
					
					$this->view->items = $items;
        			}
			}
			
			if (!$expense->profile->expense_file){
				$mypdf1 = mt_rand();
			}
			else {
				$mypdf1 = $expense->profile->expense_file;
			}
			
            $fp = new FormProcessor_SendExpense($this->db, $mypdf1);
			
			$this->view->fp = $fp;
			
            $fp2 = new FormProcessor_PublishExpense($this->db,
                                             $this->identity->user_id,
                                             $expense_id, $mypdf1);	

            if ($request->isPost('send')) {
            	  if ($fp->process($request)) {
                  	if ($fp2->process($request)) { }
			   }
            }
			
			$prod =new DatabaseObject_Expense($this->db);
			
			if ($request->getPost('delete')) {
			 	if ($expense_id) {
			 		$prod->deleteExpenseProfile($this->db, $expense_id);
					$prod->deleteExpense($this->db, $expense_id);
					$this->_redirect($this->getUrl('index','herramientas/gastos'));
			    }
             }
			
           if ($request->getPost('download')) {
                  			if ($fp2->process($request)) { }
							$mypdf = $mypdf1.'.pdf';
							$myjpg = $mypdf1.'.png';
							$array= array();
							
							$config = Zend_Registry::get('config');
							$aroute = $config->paths->base2;
							$broute = $config->paths->data;
							$croute = $config->paths->ip;
							$droute = $config->paths->include;
							
							$url1 = $croute . '/documentos/expense?id='.$expense_id;
							$url2 = 'id2='.$this->identity->user_id;
							$url = $url1 . '\&' . $url2;
							$pdf = $aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf;
							
							exec ('/usr/bin/wkhtmltopdf ' . $url . ' ' . $pdf. ' 2>&1', $array);
							////convert pdf to jpg using Phmagick
							include_once $droute . '/phmagick/phmagick.php';
							$jpg = new phmagick($aroute . 'httpdocs/documents/expenses/pdf/'. $mypdf, $aroute . 'httpdocs/documents/expenses/view/'. $myjpg);
							$jpg->setImageQuality(100);
							$jpg->convert();
							//create preview for home
							$preview = new phmagick($aroute . 'httpdocs/documents/expenses/pdf/'. $mypdf, $aroute . 'httpdocs/documents/expenses/preview/'. $myjpg);
							$preview->setImageQuality(100);
							$preview->resize(160,0);
						if (file_exists($aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf)) {
    								header('Pragma: public'); // required
    								header('Expires: 0'); // no cache
    								header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    								header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime($aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf)).' GMT');
    								header('Cache-Control: private',false);
   						 		header('Content-Type: '.'application/pdf');
    								header('Content-Disposition: attachment; filename="'.basename($aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf).'"');
    								header('Content-Transfer-Encoding: binary');
   								header('Content-Length: '.filesize($aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf)); // provide file size
    								header('Connection: close');
								ob_clean();
			            			flush();
    								readfile($aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf);
    								exit();
						}			
				}
				 
        }

		////start payments
        public function pagogastoAction()
        {
        		$this->breadcrumbs->addStep('Pago de Gasto', $this->getUrl('pagogasto','herramientas/gastos'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section2 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}

	       	$request = $this->getRequest();
			$expense_id = (int) $this->getRequest()->getQuery('id');
			
            $expensei = new DatabaseObject_Expense($this->db);	
            if (!$expensei->loadForUser($this->identity->user_id, $expense_id))
                $this->_redirect($this->getUrl('index','herramientas/gastos'));
				
			//user company's details
			$company = new DatabaseObject_Company($this->db);
            $company->loadForUser($this->identity->user_id);
			
			$this->view->company = $company;
			
            $expense = new DatabaseObject_Expense($this->db);
            $expense->loadForUser($this->identity->user_id, $expense_id);
			
			$this->view->expense = $expense;
			
			if ($expense->profile->expense_valid){
				if ($expense->profile->expense_valid == 0.00){
					$valid_until = $expense->profile->expense_date;
				}
				else {
					$valid_until = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));
				}
			}
			else {
				$valid_until = $expense->profile->expense_date;
			}
			$this->view->valid_until = $valid_until;
			
			$ts_date = date("d-m-Y");
            $this->view->ts_date = $ts_date;

            $options = array(
                'user_id' => $this->identity->user_id,
                'document_id'   => $expense_id
            );

            $client = DatabaseObject_ExpenseCompany::GetCompanies($this->db, $options);
			
			$this->view->client = $client;	
			
			$expense_id2 = 0;
		
			$fp = new FormProcessor_ExpensePayment($this->db,
                                             $this->identity->user_id,
                                             $expense_id,
											$expense_id2);
											 
			$this->view->fp = $fp;

			if ($request->getPost('add')) {
            	   if ($fp->process($request)) {
                 	$expense->save();
				    $this->_redirect($this->getUrl('editarpago','herramientas/gastos') . '?id=' . $fp->expense->getId() . '&command=cerrar');
                }
            }
			
			$prod =new DatabaseObject_Cashexpense($this->db);	
			$cash_id = $request->getPost('cash_id');

			if ($request->getPost('delete')) {
			 	if ($cash_id) {
			 		$prod->deleteExpenseProfile($this->db, $cash_id);
					$prod->deleteExpense($this->db, $cash_id);
					$fp3 = new FormProcessor_DeleteExpensePayment($this->db,
                                             $this->identity->user_id,
                                             $expense_id);
					$this->view->fp3 = $fp3;
            	   		if ($fp3->process($request)){
                		}
					$this->_redirect($this->getUrl('editarpago','herramientas/gastos') . '?id=' . $fp->expense->getId());
			    }
             }
			
        }

    	   public function editarpagoAction()
        {
        		$this->breadcrumbs->addStep('Editar Pago', $this->getUrl('editarpago','herramientas/gastos'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section2 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
	       	$request = $this->getRequest();
			$expense_id = (int) $this->getRequest()->getQuery('id');
			
            $expensei = new DatabaseObject_Expense($this->db);	
            if (!$expensei->loadForUser($this->identity->user_id, $expense_id))
                $this->_redirect($this->getUrl('index','herramientas/gastos'));
				
			//user company's details
			$company = new DatabaseObject_Company($this->db);
            $company->loadForUser($this->identity->user_id);
			
			$this->view->company = $company;
			
            $expense = new DatabaseObject_Expense($this->db);
            $expense->loadForUser($this->identity->user_id, $expense_id);
			
			$this->view->expense = $expense;
			
			if ($expense->profile->expense_valid){
				if ($expense->profile->expense_valid == 0.00){
					$valid_until = $expense->profile->expense_date;
				}
				else {
					$valid_until = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));
				}
			}
			else {
				$valid_until = $expense->profile->expense_date;
			}
			$this->view->valid_until = $valid_until;
			
			$ts_date = date("d-m-Y");
            $this->view->ts_date = $ts_date;

            $options = array(
                'user_id' => $this->identity->user_id,
                'document_id'   => $expense_id
            );

            $client = DatabaseObject_ExpenseCompany::GetCompanies($this->db, $options);
			
			$this->view->client = $client;	
			
			$expense_id2 = 0;
		
			$fp = new FormProcessor_ExpensePayment($this->db,
                                             $this->identity->user_id,
                                             $expense_id,
											$expense_id2);
											 
			$this->view->fp = $fp;
			
			$options_ = array(
					  'user_id' => $this->identity->user_id,
					  'company_id' =>  $company->getId(),
					  'expense_number' => $expense_id
					  );

			$cashes = DatabaseObject_Cashexpense::GetExpenses($this->db, $options_);
			
            $this->view->cashes = $cashes;
			
			if ($request->getPost('editar')) {
            	   if ($fp->process($request)) {
                 	$expense->save();
				    $this->_redirect($this->getUrl('editarpago','herramientas/gastos') . '?id=' . $fp->expense->getId() . '&submitted=true');
                }
            }

			$prod =new DatabaseObject_Cashexpense($this->db);	
			$cash_id = $request->getPost('cash_id');

			if ($request->getPost('delete')) {
			 	if ($cash_id) {
			 		$prod->deleteExpenseProfile($this->db, $cash_id);
					$prod->deleteExpense($this->db, $cash_id);
					$fp3 = new FormProcessor_DeleteExpensePayment($this->db,
                                             $this->identity->user_id,
                                             $expense_id);
					$this->view->fp3 = $fp3;
            	   		if ($fp3->process($request)){
                		}
					$this->_redirect($this->getUrl('editarpago','herramientas/gastos') . '?id=' . $fp->expense->getId());
			    }
             }
			
        }
		///ends payment
    	
 		public function crearAction()
        {
        		$this->breadcrumbs->addStep('Crear', $this->getUrl('crear','herramientas/gastos'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section2 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
				
			$request = $this->getRequest();
			$expense_id = (int) $this->getRequest()->getQuery('id');
			$company_id = $request->getPost('original_company_id');
			$company_id2 = $request->getPost('company_id');
			$contact_id = $request->getPost('contact_id');
			$project_id = $request->getPost('project_id');
			$item_id2 = $request->getPost('item_id2');
			$address_id = 0;
			
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
			
			$ts_date = date("d-m-Y");
            $this->view->ts_date = $ts_date;
			
			$expensecount = DatabaseObject_Expense::GetExpensesDocId(
                $this->db,
                array('user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId())
            );
            $this->view->expensecount = $expensecount;
			$this->view->comp22 = $comp__->getId();
			
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
			
			$fp = new FormProcessor_Expense($this->db,
                                             $this->identity->user_id,
                                             $expense_id,
											$company_id,
											$contact_id,
											$project_id,
											$item_id2,
											$company_id2,
											$address_id);

			
			if ($fp->expense->getId()) {		
            $expense = new DatabaseObject_Expense($this->db);
            if (!$expense->loadForUser($this->identity->user_id, $expense_id))
                $this->_redirect($this->getUrl('index','herramientas/gastos'));
			
			$this->view->expense = $expense;
			}
			
			if (!$inv_id) {
				if ($expense_id  == 0) {
					$inv_id = $this->identity->company_id2;
				}
				else {
					$inv_id = $expense_id;
				}
			}
			
			//autocomplete contact
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $contactslist = DatabaseObject_Contact::GetAllContacts($this->db,
                                                       $options);
			
			$this->view->contactslist = $contactslist;
			
			$i = 0;
			$contact_ = array();
			$data_c = array();
			$address_c = array();
            foreach ($contactslist as $contact) {
            		$comp_=$contact->profile->first_name . ' ' . $contact->profile->middle_name . ' ' . $contact->profile->last_name . ' ' . $contact->profile->second_last_name;
				$comp2_ = str_replace("'", "\'", $comp_);
				$contact_[]=$comp2_;
				$data_c[] = $contact->getId();
				$address_c[] = $contact->profile->contact_address;
				$i++;
			}
			
			$this->view->contact_ = $contact_;
			$this->view->data_c = $data_c;
			$this->view->address_c = $address_c;
			
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
			
		
			$this->view->inv_id = $inv_id;
			
            $options = array(
                'user_id' => $this->identity->user_id,
                'document_type'   => 'expense',
                'document_id'   => $inv_id
            );

            $items = DatabaseObject_Expitem::GetItems($this->db, $options);
			$items2 = DatabaseObject_Expitem::GetItems($this->db, $options);
			$items3 = DatabaseObject_Expitem::GetItems($this->db, $options);

			$iva_o = array();
			$iva2_o = array();
			
            foreach ($items as $item) {
				$iva_o[] = $item->profile->iva_p;
			}
			
            foreach ($items as $item) {
				$iva2_o[] = $item->profile->iva_p2;
			}
			
			array_multisort($iva_o, SORT_DESC, $items2);
			array_multisort($iva2_o, SORT_DESC, $items3);
			
			$this->view->items = $items;
			$this->view->items2 = $items2;
			$this->view->items3 = $items3;

			$a = 0;
			$iva__ = 0;
			$ivas_ = array();
            foreach ($items2 as $item) {
            		if ($item->profile->iva_p != $iva__){
            			$a++;
            			$ivas_[$a] = $item->profile->iva_p_total;
					$iva__ = $item->profile->iva_p;
				}
				else {
					$ivas_[$a] = $ivas_[$a] + $item->profile->iva_p_total;	
				}
			}
			
			$this->view->ivas_ = $ivas_;
			
			$b = 0;
			$iva2__ = 0;
			$ivas2_ = array();
            foreach ($items3 as $item) {
            		if ($item->profile->iva_p2 != $iva2__){
            			$b++;
            			$ivas2_[$b] = $item->profile->iva_p2_total;
					$iva2__ = $item->profile->iva_p2;
				}
				else {
					$ivas2_[$b] = $ivas2_[$b] + $item->profile->iva_p2_total;	
				}
			}
			
			$this->view->ivas2_ = $ivas2_;
			
            $options = array(
                'user_id' => $this->identity->user_id,
                'document_id'   => $inv_id
            );

            $company = DatabaseObject_ExpenseCompany::GetCompanies($this->db, $options);
			
			$this->view->company = $company;
			
							 						 
            if ($request->getPost('add')) {
            	//$this->messenger->addMessage('expenseo aregado con exito');
                if ($fp->process($request)) {
                		$this->identity->company_id3 = null;
					$this->identity->company_id2 = null;
				    $this->_redirect($this->getUrl('fichagasto','herramientas/gastos') . '?id=' . $fp->expense->getId());
                }
            }
			
          if ($request->getPost('delete2')) {    	
			 $item_id = $request->getPost('item_id');
			 $prod= new DatabaseObject_Expitem($this->db);		
			 	if ($item_id) {
			 		$prod->deleteItemProfile($this->db, $item_id);
					$prod->deleteItem($this->db, $item_id);
                		$this->_redirect($this->getUrl('crear','herramientas/gastos') . '?id=' . $fp->expense->getId());  
			   }
            }
		  
            if ($request->getPost('delete3')) {    	
			 $comp_id = $request->getPost('comp_id');
			 $prod3= new DatabaseObject_ExpenseCompany($this->db);
			 	if ($comp_id) {
			 		$prod3->deleteCompanyProfile($this->db, $comp_id);
					$prod3->deleteCompany($this->db, $comp_id);
                		$this->_redirect($this->getUrl('crear','herramientas/gastos') . '?id=' . $fp->expense->getId()); 
			   }
            }	
			
			$this->view->fp = $fp;
        }
		
       public function indexAction()
        {
			if ($this->identity->user_type == 'employee' && $this->identity->section2 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
        		$request = $this->getRequest();
			$expense_id = $request->getPost('expense_id');
			$prod =new DatabaseObject_Expense($this->db);
			
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

		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $expenses = DatabaseObject_Expense::GetAllExpenses($this->db,
                                                       $options);
			
			$this->view->expenses = $expenses;
			
			
		$totalIva = array(
			'iva_1' =>  'iva_p_1',
			'iva_2' =>  'iva_p_2',
			'iva_3' =>  'iva_p_3',
			'iva_4' =>  'iva_p_4',
			'iva_5' =>  'iva_p_5',
			'iva_6' =>  'iva_p_6',
			'iva_7' =>  'iva_p_7',
			'iva_8' =>  'iva_p_8',
			'iva_9' =>  'iva_p_9',
			'iva_10' =>  'iva_p_10',
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
		
			
			$this->view->totalIva = $totalIva;
			$this->view->company_ = $company_;
			$this->view->data_ = $data_;
			$this->view->address_ = $address_;
			
			///data and information for expenses
		    $options = array(
                'user_id' => $this->identity->user_id,
                'document_type' => 'expense'
            );
			
            $itemslist = DatabaseObject_Expitem::GetAllExpenseItems($this->db, $options);
			
			$this->view->itemslist = $itemslist;
			

			$value_c = array();
			$color_c = array();
			$label_c = array();
			$fontcolor_c = array();
			$fontsize_c = array();
			$providers = array();
			$status_ii = array();
			$status_i = array();
			$class_ii = array();
			$class_i = array();
			$valid_until = array();
			$valid_until_up = array();
			
			$value_i = array();
			$color_i = array();
			$label_i = array();
			$fontcolor_i = array();
			$fontsize_i = array();
			$items = array();
			$expenses_up = array();
			$expenses_paid = array();
			
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
			$ut = 1;

			foreach ($expenses as $expense) {

  				$default_year_start_ = strtotime($default_year_start);
				$disc_i = $expense->profile->discount;
				$discount = (100 - $disc_i)/100;
				$ts_created_ = $expense->profile->expense_date;
				$ts_created = strtotime($ts_created_);
				$paid_ = $expense->profile->paid;
				$recc = $expense->profile->recc;
				$expense_id_ = $expense->getId();
				$amountpay_ = $expense->profile->amountpay;
				
				$colours = array('#DE5D01','#A84738','#FDB125','#A76A18','#DA2124','#FE6D53','#B44214','#EA852F','#ED3C00','#E16935','#AB5507','#C44B35','#C27F0F','#FF6839','#CC2406','#EF231D','#C44202','#C66232','#DC980C','#F87725','#C37522','#DF740E','#ED452E','#E38E26','#D64737','#DE5D3B','#EE1107','#965700','#C6512B','#AA6F03','#FCA62A','#CD682A','#BF4D08','#F68827','#F06B55','#E45946','#F2630F','#B73C31','#F78434','#915A0F','#C0720E','#D55B0F','#DC2D18','#F0A318','#F16634','#F56C19','#E6623B','#DD623D','#F7873A','#EB9D14');				
				
				if ($recc && !$paid_) {
					$special_case_ = true;
				}

					//for main list status
					if ($expense->profile->expense_valid){
						if ($expense->profile->expense_valid == 0.00){
							$valid_until__ = $expense->profile->expense_date;
							$valid_until[] = $expense->profile->expense_date;
						}
						else {
							$valid_until__ = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));
							$valid_until[] = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));
						}
					}
					else {
						$valid_until__ = $expense->profile->expense_date;
						$valid_until[] = $expense->profile->expense_date;
					}
					
					$now_ = date('d-m-Y');
					
					if($paid_){
						$status_i[] = "Pagado";
						$class_i[] = "cobrada";
					}
					elseif($amountpay_){
						$status_i[] = "Parcialmente Pagado";
						$class_i[] = "parcial";
					}
					elseif(strtotime($valid_until__) > strtotime($now_)){
						$status_i[] = "Pendiente";
						$class_i[] = "pendiente";
					}
					else {
						$status_i[] = "Vencido";
						$class_i[] = "vencida";
					}
					///// ends main list status
								
						if ($ts_created >= $default_year_start_){
							
						$expenses_paid[] = $expense->profile->$paid;
						
					    $title_ = $expense->profile->expense_type;

        					$text_ = str_ireplace("á", "a", $title_);
        					$text_ = str_ireplace("é", "e", $text_); 
        					$text_ = str_ireplace("í", "i", $text_);
        					$text_ = str_ireplace("ó", "o", $text_);
        					$text_ = str_ireplace("ú", "u", $text_);
        					$text_ = str_ireplace("ñ", "n", $text_);

        					$text_ = str_ireplace("Á", "A", $text_);
        					$text_ = str_ireplace("É", "E", $text_); 
        					$text_ = str_ireplace("Í", "I", $text_);
        					$text_ = str_ireplace("Ó", "O", $text_);
        					$text_ = str_ireplace("Ú", "U", $text_);
        					$text_ = str_ireplace("Ñ", "N", $text_);
						
						//for item's graph
						if ($text_){
						  if (!in_array($text_, $items)){
							 $items[] = $text_;
							 $value_i[] = $expense->profile->base;
							 $yy = rand(0, 49);
							 $color_i[] = $colours[$yy];
							 $label_i[] = $text_;
							 $fontcolor_i[] = '#000000';
							 $fontsize_i[] = 16;
					      }
						  elseif (in_array($text_, $items)){
						     $key2 = array_search($text_, $items);
						     $value_i[$key2] = $value_i[$key2] + $expense->profile->base;
							 $label_i[$key2] = $text_;
					      }
					   }
					  //ends item's graph
					
					//for provider's graph
					if ($expense->profile->thecompany){	
						if (!in_array($expense->profile->thecompany, $providers)){
							$providers[] = $expense->profile->thecompany;
							$value_c[] = $expense->profile->total;
							$ww = rand(0, 49);
							$color_c[] = $colours[$ww];
							$label_c[] = $expense->profile->thecompany;
							$fontcolor_c[] = '#000000';
							$fontsize_c[] = 16;
						}
						else{
							$key = array_search($expense->profile->thecompany, $providers);
							$value_c[$key] = $value_c[$key] + $expense->profile->total;
						}
					}
					//ends provider's graph
					
					}
					
					if ($ts_created >= $default_year_start_){
						$tot_expense = $expense->profile->total;
																			
						$total_i = $total_i + $tot_expense;
						$total_net_i = $total_net_i + $expense->profile->base * (100 - $expense->profile->retention) / 100;
					}				
					//for unpaid list status
					if(!$paid_){
						$expenses_up[] = $expense->getId();
						$total_up_i =  $total_up_i + $expense->profile->total - $amountpay_;
						$total_net_up_i = $total_net_up_i + $expense->profile->base * (100 - $expense->profile->retention) / 100;
						
						if ($amountpay_){
									$sub_tt = $expense->profile->base * (100 - $expense->profile->retention) / 100;
									$amtpy = $amountpay_ * $sub_tt /$expense->profile->total;
									$total_net_up_i = $total_net_up_i - $amtpy;
						}
						
						if ($expense->profile->expense_valid){
							if ($expense->profile->expense_valid == 0.00){
								$valid_until_ = $expense->profile->expense_date;
								$valid_until_up[] = $expense->profile->expense_date;
							}
							else {
								$valid_until_ = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));
								$valid_until_up[] = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));
							}
						}
						else {
							$valid_until_ = $expense->profile->expense_date;
							$valid_until_up[] = $expense->profile->expense_date;
						}

						if($amountpay_){
							$status_ii[] = "Parcialmente Pagado";
							$class_ii[] = "parcial";
						}
						elseif(strtotime($valid_until_) > strtotime($now_)){
							$status_ii[] = "Pendiente";
							$class_ii[] = "pendiente";
						}
						else {
							$status_ii[] = "Vencido";
							$class_ii[] = "vencida";
						}
					}
					//ends unpaid list status
					
						foreach ($itemslist as $item) {
							if ($expense_id_ == $item->document_id){
								
									if (!$discount){
										$discount = 1;
									}
							
									$quan_pro = $item->profile->quantity;
									$price_pro = $item->profile->unit_price;
									$subtotal = $item->profile->subtotal;
									$iva_ = $item->profile->iva_p;
									$iva2_ = $item->profile->iva2_p;
									
									$tot_pro_r = $subtotal * $discount;
									$tot_iva1 = $tot_pro_r * $iva_ * 0.01;
									$tot_iva2 = $tot_pro_r * $iva2_ * 0.01;
									
									if ($ts_created >= $default_year_start_){
										$total_iva_i = $total_iva_i + $tot_iva1;
									}
									
									if (!$paid_){
										$total_iva_up_i = $total_iva_up_i + $tot_iva1;
										
										if ($amountpay_){
												$iva_avrg = $amountpay_ * $tot_iva1 / $expense->profile->total;
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

			$this->view->year__ = $year__;
			
			$this->view->status_i = $status_i;
			$this->view->status_ii = $status_ii;
			$this->view->class_i = $class_i;
			$this->view->class_ii = $class_ii;
			$this->view->valid_until_up = $valid_until_up;
			$this->view->valid_until = $valid_until;
			$this->view->now_ = $now_;
			$this->view->total_i = $total_i;
			$this->view->total_net_i = $total_net_i;
			$this->view->total_iva_i = $total_iva_i;
			$this->view->total_up_i = $total_up_i;
			$this->view->total_net_up_i = $total_net_up_i;
			$this->view->total_iva_up_i = $total_iva_up_i;
			
			$this->view->expenses_up = $expenses_up;
			$this->view->expenses_paid = $expenses_paid;

			$this->view->value_c = $value_c;
			$this->view->color_c = $color_c;
			$this->view->label_c = $label_c;
			$this->view->fontcolor_c = $fontcolor_c;
			$this->view->fontsize_c = $fontsize_c;
			$this->view->providers = $providers;
			
			$this->view->value_i = $value_i;
			$this->view->color_i = $color_i;
			$this->view->label_i = $label_i;
			$this->view->fontcolor_i = $fontcolor_i;
			$this->view->fontsize_i = $fontsize_i;
			$this->view->items = $items;
			
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
			//ends analytics	 for expenses	
													   
			if ($request->getPost('delete')) {
			 	if ($expense_id) {
			 		$prod->deleteExpenseProfile($this->db, $expense_id);
					$prod->deleteExpense($this->db, $expense_id);
					$this->_redirect($this->getUrl('index','herramientas/gastos'));
			    }
             }
			
			if ($request->getPost('download')) {
				
				$config = Zend_Registry::get('config');
				$droute = $config->paths->include;
				$aroute = $config->paths->base2;
				
				include_once $droute . '/PHPExcel.php';
				include_once $droute . '/PHPExcel/Writer/Excel2007.php';

				$objPHPExcel = new PHPExcel();
				
				$objPHPExcel->setActiveSheetIndex(0);
				$iva_t_1 = 0;
				$iva_t_2 = 0;
				$iva_t_3 = 0;
				$iva_t_4 = 0;
				$iva_t_5 = 0;
				$iva_t_6 = 0;
				$iva_t_7 = 0;
				$iva_t_8 = 0;
				$iva_t_9 = 0;
				$iva_t_10 = 0;
				$iva2_t_ = 0;
				$iva_p_1 = '';
				$iva_p_2 = '';
				$iva_p_3 = '';
				$iva_p_4 = '';
				$iva_p_5 = '';
				$iva_p_6 = '';
				$iva_p_7 = '';
				$iva_p_8 = '';
				$iva_p_9 = '';
				$iva_p_10 = '';	
				$count_ = 2;
				$numb_ = 0;
				$col_ = array ();

 				foreach ($expenses as $expense) {
 					
					$options = array(
                			'user_id' => $this->identity->user_id,
                			'document_id'   => $expense->getId()
            			);

            			$client_ = DatabaseObject_ExpenseCompany::GetCompanies($this->db, $options);

 					
					$options_ = array(
					  'user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId(),
					  'expense_number' => $expense->getId()
					  );

					$cashes = DatabaseObject_Cashexpense::GetExpenses($this->db, $options_);
					
					if ($expense->profile->expense_valid){
						if ($expense->profile->expense_valid == 0.00){
							$valid_untl = $expense->profile->expense_date;
						}
						else {
							$valid_untl = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));						}
					}
					else {
						$valid_untl = $expense->profile->expense_date;
					}
					
					$now_ = date('d-m-Y');
					
    					$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Gasto No');
    					$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Fecha');
    					$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Proveedor');
					$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'ID Fiscal');
    					$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Base Imponible');
						
					$objPHPExcel->getActiveSheet()->SetCellValue('A' . $count_, $expense->expense_number);
    					$objPHPExcel->getActiveSheet()->SetCellValue('B' . $count_, $expense->profile->expense_date);
						
					$title = $expense->profile->thecompany;

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

					$company_name =	htmlspecialchars($text);
						
					$objPHPExcel->getActiveSheet()->setCellValue('C' . $count_, $company_name);
					
					foreach ($client_ as $client) {
						if ($client->profile->thecompany){
							$objPHPExcel->getActiveSheet()->setCellValue('D' . $count_, $client->profile->identification);
						}
					}
					
					$st__ = number_format($expense->profile->base, 2, ',', '.');
    					$objPHPExcel->getActiveSheet()->SetCellValue('E' . $count_, $st__ );

					foreach ($totalIva as $key => $label) {
						if ($label == 'iva_p_1') {
							$iva_t_1 = $iva_t_1 + $expense->profile->$key;
							$iva_p_1 = $expense->profile->iva_p_1;
						}
						elseif ($label == 'iva_p_2') {
							$iva_t_2 = $iva_t_2 + $expense->profile->$key;
							$iva_p_2 = $expense->profile->iva_p_2;
						}
						elseif ($label == 'iva_p_3') {
							$iva_t_3 = $iva_t_3 + $expense->profile->$key;
							$iva_p_3 = $expense->profile->iva_p_3;
						}
						elseif ($label == 'iva_p_4') {
							$iva_t_4 = $iva_t_4 + $expense->profile->$key;
							$iva_p_4 = $expense->profile->iva_p_4;
						}
						elseif ($label == 'iva_p_5') {
							$iva_t_5 = $iva_t_5 + $expense->profile->$key;
							$iva_p_5 = $expense->profile->iva_p_5;
						}
						elseif ($label == 'iva_p_6') {
							$iva_t_6 = $iva_t_6 + $expense->profile->$key;
							$iva_p_6 = $expense->profile->iva_p_6;
						}
						elseif ($label == 'iva_p_7') {
							$iva_t_7 = $iva_t_7 + $expense->profile->$key;
							$iva_p_7 = $expense->profile->iva_p_7;
						}
						elseif ($label == 'iva_p_8') {
							$iva_t_8 = $iva_t_8 + $expense->profile->$key;
							$iva_p_8 = $expense->profile->iva_p_8;
						}
						elseif ($label == 'iva_p_9') {
							$iva_t_9 = $iva_t_9 + $expense->profile->$key;
							$iva_p_9 = $expense->profile->iva_p_9;
						}
						elseif ($label == 'iva_p_10') {
							$iva_t_10 = $iva_t_10 + $expense->profile->$key;
							$iva_p_10 = $expense->profile->iva_p_10;
						}
					}
					
					$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'I.V.A ' . $iva_p_1 . '%');
					$st_iva__1 = number_format($iva_t_1, 2, ',', '.');
					$objPHPExcel->getActiveSheet()->SetCellValue('F' . $count_, $st_iva__1);
					$col_ = array ('G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
					$numb_++;
					
					if ($iva_p_2){
						$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'I.V.A ' . $iva_p_2 . '%');
						$st_iva__2 = number_format($iva_t_2, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('G' . $count_, $st_iva__2);
						//$numb_++;
					}
					/*
					if ($iva_p_3){
						$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'I.V.A' . $iva_p_3 . '%');
						$st_iva__3 = number_format($iva_t_3, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('H' . $count_, $st_iva__3);
						//$numb_++;
					}
					
					if (iva_p_4){
						$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'I.V.A ' . $iva_p_4 . '%');
						$st_iva__4 = number_format($iva_t_4, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('I' . $count_, $st_iva__4);
						//$numb_++;
					}
					
					if ($iva_p_5){
						$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'I.V.A ' . $iva_p_5 . '%');
						$st_iva__5 = number_format($iva_t_5, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('J' . $count_, $st_iva__5);
						//$numb_++;
					}
				
					if ($iva_p_6){
						$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'I.V.A ' . $iva_p_6 . '%');
						$st_iva__6 = number_format($iva_t_6, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('K' . $count_, $st_iva__6);
						//$numb_++;
					}
					
					if ($iva_p_7){
						$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'I.V.A ' . $iva_p_7 . '%');
						$st_iva__7 = number_format($iva_t_7, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('L' . $count_, $st_iva__7);
						//$numb_++;
					}
					
					if ($iva_p_8){
						$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'I.V.A ' . $iva_p_8 . '%');
						$st_iva__8 = number_format($iva_t_8, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('M' . $count_, $st_iva__8);
						//$numb_++;
					}
					
					if ($iva_p_9){
						$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'I.V.A ' . $iva_p_9 . '%');
						$st_iva__9 = number_format($iva_t_9, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('N' . $count_, $st_iva__9);
						//$numb_++;
					}
					
					if ($iva_p_10){
						$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'I.V.A ' . $iva_p_10 . '%');
						$st_iva__10 = number_format($iva_t_10, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('O' . $count_, $st_iva__10);
						//$numb_++;
					}*/
					
					foreach ($totalIva as $key => $label) {
						if ($label == 'Otros Imp.') {
							$iva2_t_ = $iva2_t_ + $expense->profile->$key;
						}
					}
				
    					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Otros Imp.');
					$st_iva2__ = number_format($iva2_t_, 2, ',', '.');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, $st_iva2__);
					$numb_++;
					
    					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Retencion IRPF %');
					$tot_irpf = $expense->profile->retention;
					$st_irpf = number_format($tot_irpf, 2, ',', '.');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, $st_irpf);
					$numb_++;
						
    					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Total');
					$st_tot__ = number_format($expense->profile->total, 2, ',', '.');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, $st_tot__);
					$numb_++;
						
					if ($expense->profile->paid) {
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Estatus');
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, 'Pagado');
						$numb_++;
					}
					elseif ($expense->profile->amountpay) {
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Estatus');
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, 'Parcialmente Pagado');
						$numb_++;
					}
					elseif(strtotime($valid_untl) > strtotime($now_)){
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Estatus');
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, 'Pendiente');
						$numb_++;
					}
					else {
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Estatus');
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, 'Vencido');
						$numb_++;
					}
					
					$combo = '' ;
					
					foreach ($cashes as $cash) {
						$date_ = $cash->profile->datepay;
						$total__ = number_format($cash->profile->amountpay, 2, ',', '.');
						$total_ = $total__;
						$waypy_ = $cash->profile->waypay;
						$reference_ = $cash->profile->referencepay;
						$datail_ = $cash->profile->detailpay;
						
						$combo = $combo . $date_ . ', Monto:' . $total_ . ', Referencia:' . $reference_ . ', Forma Pago:' . $waypy_ .  ', Detalle:' . $datail_ . '---' ;
					
					}
	
					if (!$combo) {
						$combo= 'Sin Pagos';
					}	

					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Pagos');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, $combo);
					$numb_++;

					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'WebProAdmin');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '2', 'www.webproadmin.com');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '3', 'soporte@webproadmin.com');
					
					$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
					$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
					$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(45);
					$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(25);
						
					$count_++;
					$iva_t_1 = 0;
					$iva_t_2 = 0;
					$iva_t_3 = 0;
					$iva_t_4 = 0;
					$iva_t_5 = 0;
					$iva_t_6 = 0;
					$iva_t_7 = 0;
					$iva_t_8 = 0;
					$iva_t_9 = 0;
					$iva_t_10 = 0;
					$iva2_t_ = 0;
					$iva_p_1 = '';
					$iva_p_2 = '';
					$iva_p_3 = '';
					$iva_p_4 = '';
					$iva_p_5 = '';
					$iva_p_6 = '';
					$iva_p_7 = '';
					$iva_p_8 = '';
					$iva_p_9 = '';
					$iva_p_10 = '';
					$numb_ = 0;
					$col_ = array ();	
					}	

				$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
				$file_name = mt_rand();
				$route__ = $aroute . 'httpdocs/documents/expenses/xls/'.$file_name;
				$objWriter->save($route__ . '.xlsx');
				
				if (file_exists($route__ . '.xlsx')) {
    					header('Pragma: public'); // required
    					header('Expires: 0'); // no cache
    					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    					header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime($route__ . '.xlsx')).' GMT');
    					header('Cache-Control: private',false);
   					header('Content-Type: '.'application/vnd.ms-excel');
    					header('Content-Disposition: attachment; filename="'.basename($route__ . '.xlsx').'"');
    					header('Content-Transfer-Encoding: binary');
   					header('Content-Length: '.filesize($route__ . '.xlsx')); // provide file size
    					header('Connection: close');
					ob_clean();
			        flush();
    					readfile($route__ . '.xlsx');
    					exit();
				 }	
             }
		}

		///////item de la gasto
        public function editaritemAction()
        {
        		$this->breadcrumbs->addStep('Editar Item', $this->getUrl('editaritem','herramientas/gastos'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section2 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
			$request = $this->getRequest();
			$item_id = (int) $this->getRequest()->getQuery('id');
			$product_id = $request->getPost('product_id');
			
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
			
            $item = new DatabaseObject_Expitem($this->db);		
            if (!$item->loadForUser($this->identity->user_id, $item_id))
                $this->_redirect($this->getUrl('index','herramientas/gastos'));
            //$this->breadcrumbs->addStep('Editar Item');
            
			$this->view->item = $item;
		
            $fp = new FormProcessor_Expitem($this->db,
                                             $this->identity->user_id,
                                             $item_id);	

            /*if ($fp->item->isSaved()) {
                $this->breadcrumbs->addStep('Edita Item', $this->getUrl('index','herramientas/gastos'));
            }*/
											 
			$this->view->fp = $fp;
		
			//shows european currency
			$rquantity = str_replace('.', ',', $fp->quantity);
			$fp->quantity = $rquantity;
			
			$runit_cost = str_replace('.', ',', $fp->unit_cost);
			$fp->unit_cost = $runit_cost;
			
			$tax = str_replace('.', ',', $fp->iva_p);
			$fp->iva_p = $tax;
			
			$tax2 = str_replace('.', ',', $fp->iva_p2);
			$fp->iva_p2 = $tax2;
			
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $productslist = DatabaseObject_Expitem::GetAllItems($this->db, $options);
			
			$this->view->productslist = $productslist;
			
            $productslist2 = DatabaseObject_Puritem::GetAllItems($this->db, $options);
			
			$this->view->productslist2 = $productslist2;
			
            $productslist3 = DatabaseObject_Product::GetAllProducts($this->db, $options);
			
			$this->view->productslist3 = $productslist3;

			$i = 0;
			$product_ = array();
			$name_ = array();
			$price_ = array();
			$unit_ = array();
			$iva_ = array();
			$iva2_ = array();
			$iva2_name_ = array();
			$currency_ = array();
			$data_ = array();
			
            foreach ($productslist3 as $product3) {
				if (!in_array($product3->profile->product_name, $name_)){
					$product_[$i]=$product3->profile->product_code;
					$name_[$i]=$product3->profile->product_name;
					$unit_[$i]=$product3->profile->product_unit;
					//european currency change
					$pprice = str_replace('.', ',', $product3->profile->unit_cost);
					$price_[$i]=$pprice;
					$piva= str_replace('.', ',', $product3->profile->iva_p);
					$iva_[$i]=$piva;
					$piva2 = str_replace('.', ',', $product3->profile->iva_p2);
					$iva2_[$i]=$piva2;
					$iva2_name_[$i]=$product3->profile->iva_p2_name;
					$currency_[$i]=$product3->profile->product_currency;
					$data_[$i] = $product3->getId();
					global $i;
					$i++;
				}
			}
			
            foreach ($productslist as $product) {
				if (!in_array($product->profile->detail, $name_)){
					$product_[$i]=$product->profile->code;
					$name_[$i]=$product->profile->detail;
					$unit_[$i]=$product->profile->product_unit;
					//european currency change
					$pprice = str_replace('.', ',', $product->profile->unit_cost);
					$price_[$i]=$pprice;
					$piva= str_replace('.', ',', $product->profile->iva_p);
					$iva_[$i]=$piva;
					$piva2 = str_replace('.', ',', $product->profile->iva_p2);
					$iva2_[$i]=$piva2;
					$iva2_name_[$i]=$product->profile->iva_p2_name;
					$currency_[$i]=$product->profile->currency;
					$data_[$i] = $product->getId();
					global $i;
					$i++;
				}
			}
			
            foreach ($productslist2 as $product2) {
				if (!in_array($product2->profile->detail, $name_)){
					$product_[$i]=$product2->profile->code;
					$name_[$i]=$product2->profile->detail;
					$unit_[$i]=$product2->profile->product_unit;
					//european currency change
					$pprice = str_replace('.', ',', $product2->profile->unit_cost);
					$price_[$i]=$pprice;
					$piva= str_replace('.', ',', $product2->profile->iva_p);
					$iva_[$i]=$piva;
					$piva2 = str_replace('.', ',', $product2->profile->iva_p2);
					$iva2_[$i]=$piva2;
					$iva2_name_[$i]=$product2->profile->iva_p2_name;
					$currency_[$i]=$product2->profile->currency;
					$data_[$i] = $product2->getId();
					global $i;
					$i++;
				}
			}
			
			$this->view->product_ = $product_;
			$this->view->name_ = $name_;
			$this->view->price_ = $price_;
			$this->view->unit_ = $unit_;
			$this->view->iva_ = $iva_;
			$this->view->iva2_ = $iva2_;
			$this->view->iva2_name_ = $iva2_name_;
			$this->view->currency_ = $currency_;
			$this->view->data_ = $data_;
            
            if ($request->getPost('edit')) {
            	   if ($fp->process($request)) { 
                 	$item->save();
                    $url = $this->getUrl('editaritem','herramientas/gastos') . '?id=' . $fp->item->getId() . '&submitted=true';
                    $this->_redirect($url);     
                }
            }		
            ////
		    else if ($request->getPost('delete')) {
				$item->profile->delete();
				$item->delete();
				//$this->messenger->addMessage('Item borrado');
                $this->_redirect($this->getUrl('item','herramientas/gastos'));
            }
        }
		
 		public function agregaritemAction()
        {
        		$this->breadcrumbs->addStep('Agregar Item', $this->getUrl('agregaritem','herramientas/gastos'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section2 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
				
			$request = $this->getRequest();
            $item_id = (int) $this->getRequest()->getQuery('id');
			$product_id = $request->getPost('product_id');
			
			//user company's details
			$comp__ = new DatabaseObject_Company($this->db);
            $comp__->loadForUser($this->identity->user_id);
			
			$default_iva = $comp__->profile->iva;
			$default_iva2 = $comp__->profile->iva2;
			$default_iva2_name = $comp__->profile->iva2_name;
			$default_retention = $comp__->profile->retention;
			$default_expense_number = $comp__->profile->expense_number;
			$default_number_start = $comp__->profile->number_start;
			$default_consecutive = $comp__->profile->consecutive;
			$default_number_zero = $comp__->profile->number_zero;
			$default_number_start_letter = $comp__->profile->number_start_letter;
			$default_currency = $comp__->profile->currency;
			$default_recc = $comp__->profile->recc;
			
			$this->view->default_iva = $default_iva;
			$this->view->default_iva2 = $default_iva2;
			$this->view->default_iva2_name = $default_iva2_name;
			$this->view->default_retention = $default_retention;
			$this->view->default_expense_number = $default_expense_number;
			$this->view->default_number_start = $default_number_start;
			$this->view->default_number_zero = $default_number_zero;
			$this->view->default_consecutive = $default_consecutive;
			$this->view->default_number_start_letter = $default_number_start_letter;
			$this->view->default_currency = $default_currency;
			$this->view->default_recc = $default_recc;
		
			
			$fp = new FormProcessor_Expitem($this->db,
                                             $this->identity->user_id,
                                             $item_id);
			
			if ($fp->item->getId()) {		
            $item = new DatabaseObject_Expitem($this->db);
            if (!$item->loadForUser($this->identity->user_id, $item_id))
                $this->_redirect($this->getUrl('index','herramientas/gastos'));
			
			$this->view->item = $item;
			
			//shows european currency
			$rquantity_ = str_replace('.', ',', $item->profile->quantity);
			$item->profile->quantity = $rquantity_;
			
			$runit_cost_ = str_replace('.', ',', $item->profile->unit_cost);
			$item->profile->unit_cost = $runit_cost_;
			
			$tax_ = str_replace('.', ',', $item->profile->iva_p);
			$item->profile->iva_p = $tax_;
			
			$tax2_ = str_replace('.', ',', $item->profile->iva_p2);
			$item->profile->iva_p2 = $tax2_;
			
			}
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $productslist = DatabaseObject_Expitem::GetAllItems($this->db, $options);
			
			$this->view->productslist = $productslist;
			
            $productslist2 = DatabaseObject_Puritem::GetAllItems($this->db, $options);
			
			$this->view->productslist2 = $productslist2;
			
            $productslist3 = DatabaseObject_Product::GetAllProducts($this->db, $options);
			
			$this->view->productslist3 = $productslist3;
			
			$i = 0;
			$product_ = array();
			$name_ = array();
			$price_ = array();
			$unit_ = array();
			$iva_ = array();
			$iva2_ = array();
			$iva2_name_ = array();
			$currency_ = array();
			$data_ = array();
			
            foreach ($productslist3 as $product3) {
				if (!in_array($product3->profile->product_name, $name_)){
					$product_[$i]=$product3->profile->product_code;
					$name_[$i]=$product3->profile->product_name;
					$unit_[$i]=$product3->profile->product_unit;
					//european currency change
					$pprice = str_replace('.', ',', $product3->profile->unit_cost);
					$price_[$i]=$pprice;
					$piva= str_replace('.', ',', $product3->profile->iva_p);
					$iva_[$i]=$piva;
					$piva2 = str_replace('.', ',', $product3->profile->iva_p2);
					$iva2_[$i]=$piva2;
					$iva2_name_[$i]=$product3->profile->iva_p2_name;
					$currency_[$i]=$product3->profile->product_currency;
					$data_[$i] = $product3->getId();
					global $i;
					$i++;
				}
			}
			
            foreach ($productslist as $product) {
				if (!in_array($product->profile->detail, $name_)){
					$product_[$i]=$product->profile->code;
					$name_[$i]=$product->profile->detail;
					$unit_[$i]=$product->profile->product_unit;
					//european currency change
					$pprice = str_replace('.', ',', $product->profile->unit_cost);
					$price_[$i]=$pprice;
					$piva= str_replace('.', ',', $product->profile->iva_p);
					$iva_[$i]=$piva;
					$piva2 = str_replace('.', ',', $product->profile->iva_p2);
					$iva2_[$i]=$piva2;
					$iva2_name_[$i]=$product->profile->iva_p2_name;
					$currency_[$i]=$product->profile->currency;
					$data_[$i] = $product->getId();
					global $i;
					$i++;
				}
			}
			
            foreach ($productslist2 as $product2) {
				if (!in_array($product2->profile->detail, $name_)){
					$product_[$i]=$product2->profile->code;
					$name_[$i]=$product2->profile->detail;
					$unit_[$i]=$product2->profile->product_unit;
					//european currency change
					$pprice = str_replace('.', ',', $product2->profile->unit_cost);
					$price_[$i]=$pprice;
					$piva= str_replace('.', ',', $product2->profile->iva_p);
					$iva_[$i]=$piva;
					$piva2 = str_replace('.', ',', $product2->profile->iva_p2);
					$iva2_[$i]=$piva2;
					$iva2_name_[$i]=$product2->profile->iva_p2_name;
					$currency_[$i]=$product2->profile->currency;
					$data_[$i] = $product2->getId();
					global $i;
					$i++;
				}
			}
			
			$this->view->product_ = $product_;
			$this->view->name_ = $name_;
			$this->view->price_ = $price_;
			$this->view->unit_ = $unit_;
			$this->view->iva_ = $iva_;
			$this->view->iva2_ = $iva2_;
			$this->view->iva2_name_ = $iva2_name_;
			$this->view->currency_ = $currency_;
			$this->view->data_ = $data_;
											 						 
            if ($request->getPost('add')) {
            	//$this->messenger->addMessage('item aregado con exito');
                if ($fp->process($request)) {
                    $url = $this->getUrl('editaritem','herramientas/gastos') . '?id=' . $fp->item->getId()  . '&command=cerrar';
                    $this->_redirect($url);
                }
            }
			
			$this->view->fp = $fp;
        }

       public function itemAction()
        {
        		$request = $this->getRequest();	
			$item_id = $request->getPost('item_id');	
		}
		
       public function taxesAction()
        {
        		$request = $this->getRequest();	
			$item_id = $request->getPost('item_id');	
		}
		
       public function previewAction()
        {
        		$this->breadcrumbs->addStep('Preview', $this->getUrl('preview','herramientas/gastos'));
			
        		$request = $this->getRequest();
			$expense_id = (int) $this->getRequest()->getQuery('id');
			
            $expensei = new DatabaseObject_Expense($this->db);	
            if (!$expensei->loadForUser($this->identity->user_id, $expense_id))
                $this->_redirect($this->getUrl('index','herramientas/gastos'));
				
			//user company's details
			$company = new DatabaseObject_Company($this->db);
            $company->loadForUser($this->identity->user_id);
			
			$this->view->company = $company;
			
            $options = array(
                'user_id'  => $this->identity->user_id,
                'doc_type'   => 'company',
                'doc_id'   => $company->getId()
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			
            $expense = new DatabaseObject_Expense($this->db);
            $expense->loadForUser($this->identity->user_id, $expense_id);
			
			$this->view->expense = $expense;
			
			if ($expense->profile->expense_valid){
				if ($expense->profile->expense_valid == 0.00){
					$valid_until = $expense->profile->expense_date;
				}
				else {
					$valid_until = date('d-m-Y', strtotime($expense->profile->expense_date. ' + ' . $expense->profile->expense_valid . 'days'));
				}
			}
			else {
				$valid_until = $expense->profile->expense_date;
			}
			
			$this->view->valid_until = $valid_until;
			
            $options = array(
                'user_id' => $this->identity->user_id,
                'document_id'   => $expense_id
            );

            $client = DatabaseObject_ExpenseCompany::GetCompanies($this->db, $options);
			
			$this->view->client = $client;
			
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
			
            $options = array(
                'user_id'  => $this->identity->user_id,
                'document_type'   => 'expense',
                'document_id'   => $expense_id
            );

            $items = DatabaseObject_Expitem::GetItems($this->db, $options);
			$items2 = DatabaseObject_Expitem::GetItems($this->db, $options);
			$items3 = DatabaseObject_Expitem::GetItems($this->db, $options);

			$iva_o = array();
			$iva2_o = array();
			
            foreach ($items as $item) {
				$iva_o[] = $item->profile->iva_p;
			}
			
            foreach ($items as $item) {
				$iva2_o[] = $item->profile->iva_p2;
			}
			
			array_multisort($iva_o, SORT_DESC, $items2);
			array_multisort($iva2_o, SORT_DESC, $items3);
			
			$this->view->items = $items;
			$this->view->items2 = $items2;
			$this->view->items3 = $items3;
		
			
			$a = 0;
			$iva__ = 0;
			$ivas_ = array();
            foreach ($items2 as $item) {
            		if ($item->profile->iva_p != $iva__){
            			$a++;
            			$ivas_[$a] = $item->profile->iva_p_total;
					$iva__ = $item->profile->iva_p;
				}
				else {
					$ivas_[$a] = $ivas_[$a] + $item->profile->iva_p_total;	
				}
			}
			
			$this->view->ivas_ = $ivas_;
			
			$b = 0;
			$iva2__ = 0;
			$ivas2_ = array();
            foreach ($items3 as $item) {
            		if ($item->profile->iva_p2 != $iva2__){
            			$b++;
            			$ivas2_[$b] = $item->profile->iva_p2_total;
					$iva2__ = $item->profile->iva_p2;
				}
				else {
					$ivas2_[$b] = $ivas2_[$b] + $item->profile->iva_p2_total;	
				}
			}
			
			$this->view->ivas2_ = $ivas2_;
			
			
			if ($expense->profile->items){
				if (!is_array($expense->profile->items))
                		$expense->profile->items = array($expense->profile->items);
			
				foreach ($expense->profile->items as $id){
            			$item_ = new DatabaseObject_Expitem($this->db);
            			$item_->loadForUser($this->identity->user_id, $id);
					$items[] = $item_;
					
					$this->view->items = $items;
        			}
			}
			
			if (!$expense->profile->expense_file){
				$mypdf1 = mt_rand();
			}
			else {
				$mypdf1 = $expense->profile->expense_file;
			}
			
            $fp = new FormProcessor_SendExpense($this->db, $mypdf1);
			
            $fp2 = new FormProcessor_PublishExpense($this->db,
                                             $this->identity->user_id,
                                             $expense_id, $mypdf1);	

            if ($request->isPost('send')) {
            	  if ($fp->process($request)) {
                  	if ($fp2->process($request)) { }
			   }
            }
			
           if ($request->getPost('download')) {
                  			if ($fp2->process($request)) { }
							$mypdf = $mypdf1.'.pdf';
							$myjpg = $mypdf1.'.png';
							$array= array();
							
							$config = Zend_Registry::get('config');
							$aroute = $config->paths->base2;
							$broute = $config->paths->data;
							$croute = $config->paths->ip;
							$droute = $config->paths->include;
							
							$url1 = $croute . '/documentos/expense?id='.$expense_id;
							$url2 = 'id2='.$this->identity->user_id;
							$url = $url1 . '\&' . $url2;
							$pdf = $aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf;
					
							exec ('/usr/bin/wkhtmltopdf ' . $url . ' ' . $pdf. ' 2>&1', $array);
							////convert pdf to jpg using Phmagick
							include_once $droute . '/phmagick/phmagick.php';
							$jpg = new phmagick($aroute . 'httpdocs/documents/expenses/pdf/'. $mypdf, $aroute . 'httpdocs/documents/expenses/view/'. $myjpg);
							$jpg->setImageQuality(100);
							$jpg->convert();
							//create preview for home
							$preview = new phmagick($aroute . 'httpdocs/documents/expenses/pdf/'. $mypdf, $aroute . 'httpdocs/documents/expenses/preview/'. $myjpg);
							$preview->setImageQuality(100);
							$preview->resize(160,0);
						if (file_exists($aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf)) {
    								header('Pragma: public'); // required
    								header('Expires: 0'); // no cache
    								header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    								header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime($aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf)).' GMT');
    								header('Cache-Control: private',false);
   						 		header('Content-Type: '.'application/pdf');
    								header('Content-Disposition: attachment; filename="'.basename($aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf).'"');
    								header('Content-Transfer-Encoding: binary');
   								header('Content-Length: '.filesize($aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf)); // provide file size
    								header('Connection: close');
								ob_clean();
			            			flush();
    								readfile($aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf);
    								exit();
						}			
				}
		}
   }
?>