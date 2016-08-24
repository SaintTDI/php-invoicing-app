<?php
    class Herramientas_ProformasController extends CustomControllerAction
    {
    		protected $user = null;
		protected $item = null;
		protected $_validateOnly = false;
		
        public function init()
        {
            parent::init();
			$this->breadcrumbs->addStep('Herramientas');
            $this->breadcrumbs->addStep('Proformas', $this->getUrl('index','herramientas/proformas'));
			
			$this->identity = Zend_Auth::getInstance()->getIdentity();
			if (!$this->identity->company_id2){
		    		$this->identity->company_id2 = DatabaseObject_Address::temporaryUser();
			}
			if (!$this->identity->company_id3){
			$this->identity->company_id3 = DatabaseObject_Address::temporaryUser();
			}
			
			if (!$this->identity)
                $this->_redirect($this->getUrl('index','herramientas/proformas'));
        }
		
		public function avisoAction()
        {

        }
		
		public function validateOnly($flag)
		{
			$this->_validateOnly = (bool) $flag;
		}
    	
        public function editarAction()
        {
        		$this->breadcrumbs->addStep('Editar', $this->getUrl('editar','herramientas/proformas'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section5 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
			$request = $this->getRequest();	
			$proforma_id = (int) $this->getRequest()->getQuery('id');
			$company_id = $request->getPost('original_company_id');
			$contact_id = $request->getPost('contact_id');
			$project_id = $request->getPost('project_id');
			$item_id2 = $request->getPost('item_id2');
			$address_id = 0;
			
			if (!$inv_id) {
				if ($proforma_id  == 0) {
					$inv_id = $this->identity->company_id2;
				}
				else {
					$inv_id = $proforma_id;
				}
			}
			
			$this->view->inv_id = $inv_id;
			
            $options = array(
                'user_id' => $this->identity->user_id,
                'document_id'   => $proforma_id
            );

            $company = DatabaseObject_ProformaCompany::GetCompanies($this->db, $options);
			
			$this->view->company = $company;
			
			//user company's details
			$comp__ = new DatabaseObject_Company($this->db);
            $comp__->loadForUser($this->identity->user_id);
			
			$default_iva = $comp__->profile->iva;
			$default_iva2 = $comp__->profile->iva2;
			$default_retention = $comp__->profile->retention;
			$default_proforma_number = $comp__->profile->proforma_number;
			$default_number_start = $comp__->profile->number_start;
			$default_consecutive = $comp__->profile->consecutive;
			$default_number_zero = $comp__->profile->number_zero;
			$default_number_start_letter = $comp__->profile->number_start_letter;
			$default_currency = $comp__->profile->currency;
			$default_recc = $comp__->profile->recc;
			
			$proformacount = DatabaseObject_Proforma::GetProformasDocId(
                $this->db,
                array('user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId())
            );
            $this->view->proformacount = $proformacount;
			
			$this->view->default_iva = $default_iva;
			$this->view->default_iva2 = $default_iva2;
			$this->view->default_retention = $default_retention;
			$this->view->default_proforma_number = $default_proforma_number;
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
                'document_type'   => 'proforma',
                'document_id'   => $inv_id
            );

			
            $proforma = new DatabaseObject_Proforma($this->db);	
            if (!$proforma->loadForUser($this->identity->user_id, $proforma_id))
                $this->_redirect($this->getUrl('index','herramientas/proformas'));
            
			$this->view->proforma = $proforma;
		
		
			$fp = new FormProcessor_Proforma($this->db,
                                             $this->identity->user_id,
                                             $proforma_id,
											$company_id,
											$contact_id,
											$project_id,
											$item_id2,
											$company_id2,
											$address_id);
											 
			$this->view->fp = $fp;
			
            $options = array(
                'user_id'  => $this->identity->user_id,
                'document_type'   => 'proforma',
                'document_id'   => $fp->proforma->getId()
            );

            $items = DatabaseObject_Proitem::GetItems($this->db, $options);
			$items2 = DatabaseObject_Proitem::GetItems($this->db, $options);
			$items3 = DatabaseObject_Proitem::GetItems($this->db, $options);

			$iva_o = array();
			$iva2_o = array();
			
            foreach ($items as $item) {
				$iva_o[] = $item->profile->iva;
			}
			
            foreach ($items as $item) {
				$iva2_o[] = $item->profile->iva2;
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
            		if ($item->profile->iva != $iva__){
            			$a++;
            			$ivas_[$a] = $item->profile->iva_total;
					$iva__ = $item->profile->iva;
				}
				else {
					$ivas_[$a] = $ivas_[$a] + $item->profile->iva_total;	
				}
			}
			
			$this->view->ivas_ = $ivas_;
			
			$b = 0;
			$iva2__ = 0;
			$ivas2_ = array();
            foreach ($items3 as $item) {
            		if ($item->profile->iva2 != $iva2__){
            			$b++;
            			$ivas2_[$b] = $item->profile->iva2_total;
					$iva2__ = $item->profile->iva2;
				}
				else {
					$ivas2_[$b] = $ivas2_[$b] + $item->profile->iva2_total;	
				}
			}
			
			$this->view->ivas2_ = $ivas2_;

            if ($request->getPost('convert')) {
				$invoice_id_ = 0;
				$fp5 = new FormProcessor_ProInvoice($this->db, $this->identity->user_id, $invoice_id_, $proforma_id);
				$this->view->fp5 = $fp5;
				if ($fp5->process($request)) {
                }
				
                foreach ($items as $item) {
                	 if ($item->getId()) {
                		$item_id_ = 0;
    					$fp3 = new FormProcessor_ProInvoiceItem($this->db, $this->identity->user_id, $item_id_, $item->getId(), $fp5->invoice->getId());
					$this->view->fp3 = $fp3;
              		if ($fp3->process($request)) {
                		}
				   }
				}
				
                foreach ($company as $comp) {
                		if ($comp->profile->thecompany) {
                			$company_id_ = 0;
    						$fp4 = new FormProcessor_ProInvoiceCompanyDetails($this->db, $this->identity->user_id, $company_id_, $comp->company_id, $fp5->invoice->getId());
						$this->view->fp4 = $fp4;
              			if ($fp4->process($request)) {
                			}
					}
				}
				
				if ($fp5->process($request)) {
				    $this->_redirect($this->getUrl('fichafactura','herramientas/facturas') . '?id=' . $fp5->invoice->getId());
                }
			}
				
			if ($request->getPost('edit')) {
            	   if ($fp->process($request)) {
                 	$proforma->save();
				    $this->_redirect($this->getUrl('fichaproforma','herramientas/proformas') . '?id=' . $fp->proforma->getId());
					$this->identity->company_id2 = null;		    
                }
            }

          if ($request->getPost('delete2')) {    	
			 $item_id = $request->getPost('item_id');
			 $prod= new DatabaseObject_Proitem($this->db);		
			 	if ($item_id) {
			 		$prod->deleteItemProfile($this->db, $item_id);
					$prod->deleteItem($this->db, $item_id);
                		$this->_redirect($this->getUrl('editar','herramientas/proformas') . '?id=' . $fp->proforma->getId()); 
			   }
            }
	
            if ($request->getPost('delete3')) {    	
			 $comp_id = $request->getPost('comp_id');
			 $prod3= new DatabaseObject_ProformaCompany($this->db);
			 	if ($comp_id) {
			 		$prod3->deleteCompanyProfile($this->db, $comp_id);
					$prod3->deleteCompany($this->db, $comp_id);
                		$this->_redirect($this->getUrl('editar','herramientas/proformas') . '?id=' . $fp->proforma->getId()); 
			   }
            }		  
		
        }

        public function fichaproformaAction()
        {
        		$this->breadcrumbs->addStep('Ficha Proforma', $this->getUrl('fichaproforma','herramientas/proformas'));
			
       		$request = $this->getRequest();
			$proforma_id = (int) $this->getRequest()->getQuery('id');
			
            $proformai = new DatabaseObject_Proforma($this->db);	
            if (!$proformai->loadForUser($this->identity->user_id, $proforma_id))
                $this->_redirect($this->getUrl('index','herramientas/proformas'));
				
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
			
            $proforma = new DatabaseObject_Proforma($this->db);
            $proforma->loadForUser($this->identity->user_id, $proforma_id);
			
			$this->view->proforma = $proforma;
			
			if ($proforma->profile->proforma_valid){
				if ($proforma->profile->proforma_valid == 0.00){
					$valid_until = $proforma->profile->proforma_date;
				}
				else {
					$valid_until = date('d-m-Y', strtotime($proforma->profile->proforma_date. ' + ' . $proforma->profile->proforma_valid . 'days'));
				}
			}
			else {
				$valid_until = $proforma->profile->proforma_date;
			}
			
			$this->view->valid_until = $valid_until;
			
            $options = array(
                'user_id' => $this->identity->user_id,
                'document_id'   => $proforma_id
            );

            $client = DatabaseObject_ProformaCompany::GetCompanies($this->db, $options);
			
			$this->view->client = $client;
			
			$q = 0;
			foreach ($client as $client_) {
				if ($q == 0){
				$client_id = $client_->getId();
				$q++;
				}
			}
			
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
                'document_type'   => 'proforma',
                'document_id'   => $proforma_id
            );

            $items = DatabaseObject_Proitem::GetItems($this->db, $options);
			$items2 = DatabaseObject_Proitem::GetItems($this->db, $options);
			$items3 = DatabaseObject_Proitem::GetItems($this->db, $options);

			$iva_o = array();
			$iva2_o = array();
			
            foreach ($items as $item) {
				$iva_o[] = $item->profile->iva;
			}
			
            foreach ($items as $item) {
				$iva2_o[] = $item->profile->iva2;
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
            		if ($item->profile->iva != $iva__){
            			$a++;
            			$ivas_[$a] = $item->profile->iva_total;
					$iva__ = $item->profile->iva;
				}
				else {
					$ivas_[$a] = $ivas_[$a] + $item->profile->iva_total;	
				}
			}
			
			$this->view->ivas_ = $ivas_;
			
			$b = 0;
			$iva2__ = 0;
			$ivas2_ = array();
            foreach ($items3 as $item) {
            		if ($item->profile->iva2 != $iva2__){
            			$b++;
            			$ivas2_[$b] = $item->profile->iva2_total;
					$iva2__ = $item->profile->iva2;
				}
				else {
					$ivas2_[$b] = $ivas2_[$b] + $item->profile->iva2_total;	
				}
			}
			
			$this->view->ivas2_ = $ivas2_;
			
			
			if ($proforma->profile->items){
				if (!is_array($proforma->profile->items))
                		$proforma->profile->items = array($proforma->profile->items);
			
				foreach ($proforma->profile->items as $id){
            			$item_ = new DatabaseObject_Proitem($this->db);
            			$item_->loadForUser($this->identity->user_id, $id);
					$items[] = $item_;
					
					$this->view->items = $items;
        			}
			}
			
			if (!$proforma->profile->proforma_file){
				$mypdf1 = mt_rand();
			}
			else {
				$mypdf1 = $proforma->profile->proforma_file;
			}
			
            $fp = new FormProcessor_SendProforma($this->db, $mypdf1);
			
			$this->view->fp = $fp;
			
            $fp2 = new FormProcessor_PublishProforma($this->db,
                                             $this->identity->user_id,
                                             $proforma_id, $mypdf1);	

            if ($request->getPost('convert')) {
				$invoice_id_ = 0;
				$fp5 = new FormProcessor_ProInvoice($this->db, $this->identity->user_id, $invoice_id_, $proforma_id);
				$this->view->fp5 = $fp5;
				if ($fp5->process($request)) {
                }
				
                foreach ($items as $item) {
                	 if ($item->getId()) {
					$item_id_ = 0;
    					$fp3 = new FormProcessor_ProInvoiceItem($this->db, $this->identity->user_id, $item_id_, $item->getId(), $fp5->invoice->getId());
					$this->view->fp3 = $fp3;
              		if ($fp3->process($request)) {
                		}
				  }
				}
				
                	$company_id_ = 0;
    				$fp4 = new FormProcessor_ProInvoiceCompanyDetails($this->db, $this->identity->user_id, $company_id_, $client_id, $fp5->invoice->getId());
				$this->view->fp4 = $fp4;
              	if ($fp4->process($request)) {
                	}

				if ($fp5->process($request)) {
				    $this->_redirect($this->getUrl('fichafactura','herramientas/facturas') . '?id=' . $fp5->invoice->getId());
                }
				
			}

            if ($request->isPost('send')) {
            	  if ($fp->process($request)) {
                  	if ($fp2->process($request)) { }
			   }
            }
			
			$prod =new DatabaseObject_Proforma($this->db);
			
			if ($request->getPost('delete')) {
			 	if ($proforma_id) {
			 		$prod->deleteProformaProfile($this->db, $proforma_id);
					$prod->deleteProforma($this->db, $proforma_id);
					$this->_redirect($this->getUrl('index','herramientas/proformas'));
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
							
							$url1 = $croute . '/documentos/proforma?id='.$proforma_id;
							$url2 = 'id2='.$this->identity->user_id;
							$url = $url1 . '\&' . $url2;
							$pdf = $aroute . 'httpdocs/documents/proformas/pdf/'.$mypdf;
							
							exec ('/usr/bin/wkhtmltopdf ' . $url . ' ' . $pdf. ' 2>&1', $array);
							////convert pdf to jpg using Phmagick
							include_once $droute . '/phmagick/phmagick.php';
							$jpg = new phmagick($aroute . 'httpdocs/documents/proformas/pdf/'. $mypdf, $aroute . 'httpdocs/documents/proformas/view/'. $myjpg);
							$jpg->setImageQuality(100);
							$jpg->convert();
							//create preview for home
							$preview = new phmagick($aroute . 'httpdocs/documents/proformas/pdf/'. $mypdf, $aroute . 'httpdocs/documents/proformas/preview/'. $myjpg);
							$preview->setImageQuality(100);
							$preview->resize(160,0);
						if (file_exists($aroute . 'httpdocs/documents/proformas/pdf/'.$mypdf)) {    								header('Pragma: public'); // required
    								header('Expires: 0'); // no cache
    								header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    								header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime($aroute . 'httpdocs/documents/proformas/pdf/'.$mypdf)).' GMT');
    								header('Cache-Control: private',false);
   						 		header('Content-Type: '.'application/pdf');
    								header('Content-Disposition: attachment; filename="'.basename($aroute . 'httpdocs/documents/proformas/pdf/'.$mypdf).'"');
    								header('Content-Transfer-Encoding: binary');
   								header('Content-Length: '.filesize($aroute . 'httpdocs/documents/proformas/pdf/'.$mypdf)); // provide file size
    								header('Connection: close');
								ob_clean();
			            			flush();
    								readfile($aroute . 'httpdocs/documents/proformas/pdf/'.$mypdf);
    								exit();
						}			
				}
        }
    	
 		public function crearAction()
        {
        		$this->breadcrumbs->addStep('Crear', $this->getUrl('crear','herramientas/proformas'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section5 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
				
			$request = $this->getRequest();
			$proforma_id = (int) $this->getRequest()->getQuery('id');
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
			$default_proforma_number = $comp__->profile->proforma_number;
			$default_number_start = $comp__->profile->number_start;
			$default_consecutive = $comp__->profile->consecutive;
			$default_number_zero = $comp__->profile->number_zero;
			$default_number_start_letter = $comp__->profile->number_start_letter;
			$default_currency = $comp__->profile->currency;
			$default_recc = $comp__->profile->recc;
			
			$ts_date = date("d-m-Y");
            $this->view->ts_date = $ts_date;
			
			$proformacount = DatabaseObject_Proforma::GetProformasDocId(
                $this->db,
                array('user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId())
            );
            $this->view->proformacount = $proformacount;
			$this->view->comp22 = $comp__->getId();
			
			$this->view->default_iva = $default_iva;
			$this->view->default_iva2 = $default_iva2;
			$this->view->default_retention = $default_retention;
			$this->view->default_proforma_number = $default_proforma_number;
			$this->view->default_number_start = $default_number_start;
			$this->view->default_number_zero = $default_number_zero;
			$this->view->default_consecutive = $default_consecutive;
			$this->view->default_number_start_letter = $default_number_start_letter;
			$this->view->default_currency = $default_currency;
			$this->view->default_recc = $default_recc;
			
			$fp = new FormProcessor_Proforma($this->db,
                                             $this->identity->user_id,
                                             $proforma_id,
											$company_id,
											$contact_id,
											$project_id,
											$item_id2,
											$company_id2,
											$address_id);

			
			if ($fp->proforma->getId()) {		
            $proforma = new DatabaseObject_Proforma($this->db);
            if (!$proforma->loadForUser($this->identity->user_id, $proforma_id))
                $this->_redirect($this->getUrl('index','herramientas/proformas'));
			
			$this->view->proforma = $proforma;
			}
			
			if (!$inv_id) {
				if ($proforma_id  == 0) {
					$inv_id = $this->identity->company_id2;
				}
				else {
					$inv_id = $proforma_id;
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
                'document_type'   => 'proforma',
                'document_id'   => $inv_id
            );

            $items = DatabaseObject_Proitem::GetItems($this->db, $options);
			$items2 = DatabaseObject_Proitem::GetItems($this->db, $options);
			$items3 = DatabaseObject_Proitem::GetItems($this->db, $options);

			$iva_o = array();
			$iva2_o = array();
			
            foreach ($items as $item) {
				$iva_o[] = $item->profile->iva;
			}
			
            foreach ($items as $item) {
				$iva2_o[] = $item->profile->iva2;
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
            		if ($item->profile->iva != $iva__){
            			$a++;
            			$ivas_[$a] = $item->profile->iva_total;
					$iva__ = $item->profile->iva;
				}
				else {
					$ivas_[$a] = $ivas_[$a] + $item->profile->iva_total;	
				}
			}
			
			$this->view->ivas_ = $ivas_;
			
			$b = 0;
			$iva2__ = 0;
			$ivas2_ = array();
            foreach ($items3 as $item) {
            		if ($item->profile->iva2 != $iva2__){
            			$b++;
            			$ivas2_[$b] = $item->profile->iva2_total;
					$iva2__ = $item->profile->iva2;
				}
				else {
					$ivas2_[$b] = $ivas2_[$b] + $item->profile->iva2_total;	
				}
			}
			
			$this->view->ivas2_ = $ivas2_;
			
            $options = array(
                'user_id' => $this->identity->user_id,
                'document_id'   => $inv_id
            );

            $company = DatabaseObject_ProformaCompany::GetCompanies($this->db, $options);
			
			$this->view->company = $company;
			
							 						 
            if ($request->getPost('add')) {
            	//$this->messenger->addMessage('proformao aregado con exito');
                if ($fp->process($request)) {
                		$this->identity->company_id3 = null;
					$this->identity->company_id2 = null;
				    $this->_redirect($this->getUrl('fichaproforma','herramientas/proformas') . '?id=' . $fp->proforma->getId());
                }
            }
			
          if ($request->getPost('delete2')) {    	
			 $item_id = $request->getPost('item_id');
			 $prod= new DatabaseObject_Proitem($this->db);		
			 	if ($item_id) {
			 		$prod->deleteItemProfile($this->db, $item_id);
					$prod->deleteItem($this->db, $item_id);
                		$this->_redirect($this->getUrl('crear','herramientas/proformas') . '?id=' . $fp->proforma->getId());  
			   }
            }
		  
            if ($request->getPost('delete3')) {    	
			 $comp_id = $request->getPost('comp_id');
			 $prod3= new DatabaseObject_ProformaCompany($this->db);
			 	if ($comp_id) {
			 		$prod3->deleteCompanyProfile($this->db, $comp_id);
					$prod3->deleteCompany($this->db, $comp_id);
                		$this->_redirect($this->getUrl('crear','herramientas/proformas') . '?id=' . $fp->proforma->getId()); 
			   }
            }	
			
			$this->view->fp = $fp;
        }
		
       public function indexAction()
        {
			if ($this->identity->user_type == 'employee' && $this->identity->section5 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
        		$request = $this->getRequest();
			$proforma_id = $request->getPost('proforma_id');
			$prod =new DatabaseObject_Proforma($this->db);
			
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

		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $proformas = DatabaseObject_Proforma::GetAllProformas($this->db,
                                                       $options);
			
			$this->view->proformas = $proformas;
			
			$proformacount = DatabaseObject_Proforma::GetProformasDocId(
                $this->db,
                array('user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId())
            );
            $this->view->proformacount = $proformacount;
			
			
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
			
			///data and information for proformas
		    $options = array(
                'user_id' => $this->identity->user_id,
                'document_type' => 'proforma'
            );
			
            $itemslist = DatabaseObject_Proitem::GetAllProformaItems($this->db, $options);
			
			$this->view->itemslist = $itemslist;
			

			$value_c = array();
			$color_c = array();
			$label_c = array();
			$fontcolor_c = array();
			$fontsize_c = array();
			$clients = array();
			$status_ii = array();
			$status_i = array();
			$class_i = array();
			$valid_until = array();
			
			$value_i = array();
			$color_i = array();
			$label_i = array();
			$fontcolor_i = array();
			$fontsize_i = array();
			$items = array();
			
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
			$total_i = 0;
			$total_net_i = 0;
			
			$zz = 0;
			$yy = 0;
			$b_ = 0;
			$c_ = 0;
			
			foreach ($proformas as $proforma) {
				$publsh_ = $proforma->profile->published;
				$transfd_ = $proforma->profile->transformed;
				if (!isset($publsh_) && !isset($transfd_)){
					$total_docs_ = $proformacount - 1;
				}
			}
			
			if (!$total_docs_){
				$total_docs_ = $proformacount;
			}	
			
			foreach ($proformas as $proforma) {

  				$default_year_start_ = strtotime($default_year_start);
				$published_ = $proforma->profile->published;
				$transformed_ = $proforma->profile->transformed;
				$disc_i = $proforma->profile->discount;
				$discount = (100 - $disc_i)/100;
				$ts_created_ = $proforma->profile->proforma_date;
				$ts_created = strtotime($ts_created_);
				$proforma_id_ = $proforma->getId();
				
				$colours = array('#FCBC92','#FB0445','#AC501F','#EA6978','#F8520E','#9E6254','#DF0562','#F5634D','#D31118','#E97231','#E4978D','#EE9B68','#B55660','#BF7C58','#D42336','#C23E51','#FC5078','#C54B0C','#FD9B81','#CB3B22','#A1563D','#F28756','#FC412E','#B9563A','#F56A1D','#B48169','#D24849','#FB5E39','#FE385A','#FB8584','#FD5352','#F33D3B','#DE2349','#EEAD9E','#B56D67','#DB250A','#9E7666','#EC7888','#D92B62','#DB182E','#995843','#F56257','#FB6B2C','#B94F5D','#C14C16','#EFB186','#F15603','#FE4872','#D71A3A','#EE7534');
					
					//for main list status
					if ($proforma->profile->proforma_valid){
						if ($proforma->profile->proforma_valid == 0.00){
							$valid_until__ = $proforma->profile->proforma_date;
							$valid_until[] = $proforma->profile->proforma_date;
						}
						else {
							$valid_until__ = date('d-m-Y', strtotime($proforma->profile->proforma_date . ' + ' . $proforma->profile->proforma_valid . ' days'));
							$valid_until[] = $proforma->profile->proforma_date;
						}
					}
					else {
						$valid_until__ = $proforma->profile->proforma_date;
						$valid_until[] = $proforma->profile->proforma_date;
					}
					
					$now_ = date('d-m-Y');
					
					if($transformed_){
						$status_i[] = "Facturada";
						$class_i[] = "cobrada";
					}
					elseif($published_){
						$status_i[] = "Enviada";
						$class_i[] = "parcial";
					}
					else {
						$status_i[] = "Borrador";
						$class_i[] = "borrador";
					}
					///// ends main list status
					
					//for item's graph
						
					if ($transformed_){
						if (!$b_ && !$c_){
							$a_ = 0;
						}
						elseif ($c_ && !$b_){
							$a_ = 1;
						}
						$zz++;
						$items[$a_] = $zz;
						$value_i[$a_] = $zz;
						$pp = rand(0, 49);
						$color_i[$a_] = '#00acd7';
						$label_i[$a_] = 'Facturada';
						$fontcolor_i[$a_] = '#000000';
						$fontsize_i[$a_] = 16;
						$b_++;
					}
					elseif($published_){
						if (!$b_ && !$c_){
							$d_ = 0;
						}
						elseif ($b_ && !$c_){
							$d_ = 1;
						}
						$yy++;
						$items[$d_] = $yy;
						$value_i[$d_] = $yy;
						$ll = rand(0, 49);
						$color_i[$d_] = '#c9c8c7';
						$label_i[$d_] = 'Sin Facturar';
						$fontcolor_i[$d_] = '#000000';
						$fontsize_i[$d_] = 16;
						$c_++;
					}
					//ends item's graph
	
					if ($published_){
						if ($ts_created >= $default_year_start_){
					
					//for client's graph	
					if ($proforma->profile->thecompany){
						if (!in_array($proforma->profile->thecompany, $clients)){
							$clients[] = $proforma->profile->thecompany;
							$value_c[] = $proforma->profile->total;
							$pp = rand(0, 49);
							$color_c[] = $colours[$pp];
							$label_c[] = $proforma->profile->thecompany;
							$fontcolor_c[] = '#000000';
							$fontsize_c[] = 16;
						}
						else{
							$key = array_search($proforma->profile->thecompany, $clients);
							$value_c[$key] = $value_c[$key] + $proforma->profile->total;
						}
					}
					//ends client's graph
					
					$tot_proforma = $proforma->profile->total;
																			
					$total_i = $total_i + $tot_proforma;
					$total_net_i = $total_net_i + $proforma->profile->base * (100 - $proforma->profile->retention) / 100;
					
						foreach ($itemslist as $item) {
							if ($proforma_id_ == $item->document_id){
												
								
									if (!$discount){
										$discount = 1;
									}
							
									$quan_pro = $item->profile->quantity;
									$price_pro = $item->profile->unit_price;
									$subtotal = $item->profile->subtotal;
									$iva_ = $item->profile->iva;
									$iva2_ = $item->profile->iva2;
									
									$tot_pro_r = $subtotal * $discount;
									$tot_iva1 = $tot_pro_r * $iva_ * 0.01;
									$tot_iva2 = $tot_pro_r * $iva2_ * 0.01;

									$total_iva_i = $total_iva_i + $tot_iva1;
									
									//$x = 'Quantity:' . $quan_pro . 'Unit P:' . $price_pro . 'Discount:' . $discount . '<br>';
									//echo $x;

									$month__ = date('n', $ts_created);
									$year___ = date('Y', $ts_created);
									$month_start = date('n', $default_year_start_);
									$date_ = date('d-m-Y', $ts_created);
									
									if ($year___ == $year__){
									
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
			
			$this->view->status_i = $status_i;
			$this->view->class_i = $class_i;
			$this->view->valid_until = $valid_until;
			$this->view->now_ = $now_;
			$this->view->total_i = $total_i;
			$this->view->total_net_i = $total_net_i;
			$this->view->total_iva_i = $total_iva_i;

			$this->view->value_c = $value_c;
			$this->view->color_c = $color_c;
			$this->view->label_c = $label_c;
			$this->view->fontcolor_c = $fontcolor_c;
			$this->view->fontsize_c = $fontsize_c;
			$this->view->clients = $clients;
			
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
			//ends analytics	 for proformas	
													   
			if ($request->getPost('delete')) {
			 	if ($proforma_id) {
			 		$prod->deleteProformaProfile($this->db, $proforma_id);
					$prod->deleteProforma($this->db, $proforma_id);
					$this->_redirect($this->getUrl('index','herramientas/proformas'));
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

 				foreach ($proformas as $proforma) {
 					
					$options = array(
                			'user_id' => $this->identity->user_id,
                			'document_id'   => $proforma->getId()
            			);

            			$client_ = DatabaseObject_ProformaCompany::GetCompanies($this->db, $options);
		
					
    					$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Pro-Forma No');
    					$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Fecha');
    					$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Cliente');
					$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'ID Fiscal');
    					$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Base Imponible');
						
					$objPHPExcel->getActiveSheet()->SetCellValue('A' . $count_, $proforma->proforma_number);
    					$objPHPExcel->getActiveSheet()->SetCellValue('B' . $count_, $proforma->profile->proforma_date);

					$title = $proforma->profile->thecompany;

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

					$st__ = number_format($proforma->profile->base, 2, ',', '.');
    					$objPHPExcel->getActiveSheet()->SetCellValue('E' . $count_, $st__ );

				foreach ($totalIva as $key => $label) {
						if ($label == 'iva_p_1') {
							$iva_t_1 = $iva_t_1 + $proforma->profile->$key;
							$iva_p_1 = $proforma->profile->iva_p_1;
						}
						elseif ($label == 'iva_p_2') {
							$iva_t_2 = $iva_t_2 + $proforma->profile->$key;
							$iva_p_2 = $proforma->profile->iva_p_2;
						}
						elseif ($label == 'iva_p_3') {
							$iva_t_3 = $iva_t_3 + $proforma->profile->$key;
							$iva_p_3 = $proforma->profile->iva_p_3;
						}
						elseif ($label == 'iva_p_4') {
							$iva_t_4 = $iva_t_4 + $proforma->profile->$key;
							$iva_p_4 = $proforma->profile->iva_p_4;
						}
						elseif ($label == 'iva_p_5') {
							$iva_t_5 = $iva_t_5 + $proforma->profile->$key;
							$iva_p_5 = $proforma->profile->iva_p_5;
						}
						elseif ($label == 'iva_p_6') {
							$iva_t_6 = $iva_t_6 + $proforma->profile->$key;
							$iva_p_6 = $proforma->profile->iva_p_6;
						}
						elseif ($label == 'iva_p_7') {
							$iva_t_7 = $iva_t_7 + $proforma->profile->$key;
							$iva_p_7 = $proforma->profile->iva_p_7;
						}
						elseif ($label == 'iva_p_8') {
							$iva_t_8 = $iva_t_8 + $proforma->profile->$key;
							$iva_p_8 = $proforma->profile->iva_p_8;
						}
						elseif ($label == 'iva_p_9') {
							$iva_t_9 = $iva_t_9 + $proforma->profile->$key;
							$iva_p_9 = $proforma->profile->iva_p_9;
						}
						elseif ($label == 'iva_p_10') {
							$iva_t_10 = $iva_t_10 + $proforma->profile->$key;
							$iva_p_10 = $proforma->profile->iva_p_10;
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
							$iva2_t_ = $iva2_t_ + $proforma->profile->$key;
						}
					}
				
     				$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Otros Imp.');
					$st_iva2__ = number_format($iva2_t_, 2, ',', '.');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, $st_iva2__);
					$numb_++;
					
    					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Retencion IRPF %');
					$tot_irpf = $proforma->profile->retention;
					$st_irpf = number_format($tot_irpf, 2, ',', '.');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, $st_irpf);
					$numb_++;
						
    					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Total');
					$st_tot__ = number_format($proforma->profile->total, 2, ',', '.');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, $st_tot__);
					$numb_++;	
										
					if ($proforma->profile->published) {
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Estatus');
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, 'Enviada');
						$numb_++;
					}
					else {
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Estatus');
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, 'Guardada');
						$numb_++;
					}
					
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
				$route__ = $aroute . 'httpdocs/documents/proformas/xls/'.$file_name;
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

		///////item de la proforma
        public function editaritemAction()
        {
        		$this->breadcrumbs->addStep('Editar Item', $this->getUrl('editaritem','herramientas/proformas'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section5 != 'yes') {		
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
			$default_proforma_number = $comp__->profile->proforma_number;
			$default_number_start = $comp__->profile->number_start;
			$default_consecutive = $comp__->profile->consecutive;
			$default_number_zero = $comp__->profile->number_zero;
			$default_number_start_letter = $comp__->profile->number_start_letter;
			$default_currency = $comp__->profile->currency;
			$default_recc = $comp__->profile->recc;
			
			$this->view->default_iva = $default_iva;
			$this->view->default_iva2 = $default_iva2;
			$this->view->default_retention = $default_retention;
			$this->view->default_proforma_number = $default_proforma_number;
			$this->view->default_number_start = $default_number_start;
			$this->view->default_number_zero = $default_number_zero;
			$this->view->default_consecutive = $default_consecutive;
			$this->view->default_number_start_letter = $default_number_start_letter;
			$this->view->default_currency = $default_currency;
			$this->view->default_recc = $default_recc;
			
            $item = new DatabaseObject_Proitem($this->db);		
            if (!$item->loadForUser($this->identity->user_id, $item_id))
                $this->_redirect($this->getUrl('index','herramientas/proformas'));
            //$this->breadcrumbs->addStep('Editar Item');
            
			$this->view->item = $item;
		
            $fp = new FormProcessor_Proitem($this->db,
                                             $this->identity->user_id,
                                             $item_id,
											$product_id);	

            /*if ($fp->item->isSaved()) {
                $this->breadcrumbs->addStep('Edita Item', $this->getUrl('index','herramientas/proformas'));
            }*/
											 
			$this->view->fp = $fp;
		
			//shows european currency
			$rquantity = str_replace('.', ',', $fp->quantity);
			$fp->quantity = $rquantity;
			
			$runit_price = str_replace('.', ',', $fp->unit_price);
			$fp->unit_price = $runit_price;
			
			$tax = str_replace('.', ',', $fp->iva);
			$fp->iva = $tax;
			
			$tax2 = str_replace('.', ',', $fp->iva2);
			$fp->iva2 = $tax2;
			
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $productslist = DatabaseObject_Product::GetAllProducts($this->db, $options);
			
			$this->view->productslist = $productslist;

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
            foreach ($productslist as $product) {
              if (!in_array($product->profile->product_name, $name_)){
				$product_[]=$product->profile->product_code;
				$name_[]=$product->profile->product_name;
				$unit_[]=$product->profile->product_unit;
				//european currency change
				$pprice = str_replace('.', ',', $product->profile->unit_price);
				$price_[]=$pprice;
				$piva= str_replace('.', ',', $product->profile->iva);
				$iva_[]=$piva;
				$piva2 = str_replace('.', ',', $product->profile->iva2);
				$iva2_[]=$piva2;
				$iva2_name_[]=$product->profile->iva2_name;
				$currency_[]=$product->profile->product_currency;
				$data_[] = $product->getId();
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
                    $url = $this->getUrl('editaritem','herramientas/proformas') . '?id=' . $fp->item->getId() . '&submitted=true';
                    $this->_redirect($url);     
                }
            }		
            ////
		    else if ($request->getPost('delete')) {
				$item->profile->delete();
				$item->delete();
				//$this->messenger->addMessage('Item borrado');
                $this->_redirect($this->getUrl('item','herramientas/proformas'));
            }
        }
		
 		public function agregaritemAction()
        {
        		$this->breadcrumbs->addStep('Agregar Item', $this->getUrl('agregaritem','herramientas/proformas'));
			
			if ($this->identity->user_type == 'employee' && $this->identity->section5 != 'yes') {		
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
			$default_proforma_number = $comp__->profile->proforma_number;
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
			$this->view->default_proforma_number = $default_proforma_number;
			$this->view->default_number_start = $default_number_start;
			$this->view->default_number_zero = $default_number_zero;
			$this->view->default_consecutive = $default_consecutive;
			$this->view->default_number_start_letter = $default_number_start_letter;
			$this->view->default_currency = $default_currency;
			$this->view->default_recc = $default_recc;
		
			
			$fp = new FormProcessor_Proitem($this->db,
                                             $this->identity->user_id,
                                             $item_id,
											$product_id);
			
			if ($fp->item->getId()) {		
            $item = new DatabaseObject_Proitem($this->db);
            if (!$item->loadForUser($this->identity->user_id, $item_id))
                $this->_redirect($this->getUrl('index','herramientas/proformas'));
			
			$this->view->item = $item;
			
			//shows european currency
			$rquantity_ = str_replace('.', ',', $item->profile->quantity);
			$item->profile->quantity = $rquantity_;
			
			$runit_price_ = str_replace('.', ',', $item->profile->unit_price);
			$item->profile->unit_price = $runit_price_;
			
			$tax_ = str_replace('.', ',', $item->profile->iva);
			$item->profile->iva = $tax_;
			
			$tax2_ = str_replace('.', ',', $item->profile->iva2);
			$item->profile->iva2 = $tax2_;
			
			}
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $productslist = DatabaseObject_Product::GetAllProducts($this->db, $options);
			
			$this->view->productslist = $productslist;
			
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
            foreach ($productslist as $product) {
			  if (!in_array($product->profile->product_name, $name_)){
				$product_[]=$product->profile->product_code;
				$name_[]=$product->profile->product_name;
				$unit_[]=$product->profile->product_unit;
				$pprice = str_replace('.', ',', $product->profile->unit_price);
				$price_[]=$pprice;
				$piva = str_replace('.', ',', $product->profile->iva);
				$iva_[]=$piva;
				$piva2 = str_replace('.', ',', $product->profile->iva2);
				$iva2_[]=$piva2;
				$iva2_name_[]=$product->profile->iva2_name;
				$currency_[]=$product->profile->product_currency;
				$data_[] = $product->getId();
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
                    $url = $this->getUrl('editaritem','herramientas/proformas') . '?id=' . $fp->item->getId()  . '&command=cerrar';
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
        		$this->breadcrumbs->addStep('Preview', $this->getUrl('preview','herramientas/proformas'));
			
        		$request = $this->getRequest();
			$proforma_id = (int) $this->getRequest()->getQuery('id');
			
            $proformai = new DatabaseObject_Proforma($this->db);	
            if (!$proformai->loadForUser($this->identity->user_id, $proforma_id))
                $this->_redirect($this->getUrl('index','herramientas/proformas'));
				
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
			
            $proforma = new DatabaseObject_Proforma($this->db);
            $proforma->loadForUser($this->identity->user_id, $proforma_id);
			
			$this->view->proforma = $proforma;
			
			if ($proforma->profile->proforma_valid){
				if ($proforma->profile->proforma_valid == 0.00){
					$valid_until = $proforma->profile->proforma_date;
				}
				else {
					$valid_until = date('d-m-Y', strtotime($proforma->profile->proforma_date. ' + ' . $proforma->profile->proforma_valid . 'days'));
				}
			}
			else {
				$valid_until = $proforma->profile->proforma_date;
			}
			
			$this->view->valid_until = $valid_until;
			
            $options = array(
                'user_id' => $this->identity->user_id,
                'document_id'   => $proforma_id
            );

            $client = DatabaseObject_ProformaCompany::GetCompanies($this->db, $options);
			
			$this->view->client = $client;
			
			$q = 0;
			foreach ($client as $client_) {
				if ($q == 0){
				$client_id = $client_->getId();
				$q++;
				}
			}
			
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
                'document_type'   => 'proforma',
                'document_id'   => $proforma_id
            );

            $items = DatabaseObject_Proitem::GetItems($this->db, $options);
			$items2 = DatabaseObject_Proitem::GetItems($this->db, $options);
			$items3 = DatabaseObject_Proitem::GetItems($this->db, $options);

			$iva_o = array();
			$iva2_o = array();
			
            foreach ($items as $item) {
				$iva_o[] = $item->profile->iva;
			}
			
            foreach ($items as $item) {
				$iva2_o[] = $item->profile->iva2;
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
            		if ($item->profile->iva != $iva__){
            			$a++;
            			$ivas_[$a] = $item->profile->iva_total;
					$iva__ = $item->profile->iva;
				}
				else {
					$ivas_[$a] = $ivas_[$a] + $item->profile->iva_total;	
				}
			}
			
			$this->view->ivas_ = $ivas_;
			
			$b = 0;
			$iva2__ = 0;
			$ivas2_ = array();
            foreach ($items3 as $item) {
            		if ($item->profile->iva2 != $iva2__){
            			$b++;
            			$ivas2_[$b] = $item->profile->iva2_total;
					$iva2__ = $item->profile->iva2;
				}
				else {
					$ivas2_[$b] = $ivas2_[$b] + $item->profile->iva2_total;	
				}
			}
			
			$this->view->ivas2_ = $ivas2_;
			
			
			if ($proforma->profile->items){
				if (!is_array($proforma->profile->items))
                		$proforma->profile->items = array($proforma->profile->items);
			
				foreach ($proforma->profile->items as $id){
            			$item_ = new DatabaseObject_Proitem($this->db);
            			$item_->loadForUser($this->identity->user_id, $id);
					$items[] = $item_;
					
					$this->view->items = $items;
        			}
			}
			
			if (!$proforma->profile->proforma_file){
				$mypdf1 = mt_rand();
			}
			else {
				$mypdf1 = $proforma->profile->proforma_file;
			}
			
            $fp = new FormProcessor_SendProforma($this->db, $mypdf1);
			
            $fp2 = new FormProcessor_PublishProforma($this->db,
                                             $this->identity->user_id,
                                             $proforma_id, $mypdf1);	
											 
            if ($request->getPost('convert')) {
				$invoice_id_ = 0;
				$fp5 = new FormProcessor_ProInvoice($this->db, $this->identity->user_id, $invoice_id_, $proforma_id);
				$this->view->fp5 = $fp5;
				if ($fp5->process($request)) {
                }
				
                foreach ($items as $item) {
                	 if ($item->getId()) {
                	    	$item_id_ = 0;
    					$fp3 = new FormProcessor_ProInvoiceItem($this->db, $this->identity->user_id, $item_id_, $item->getId(), $fp5->invoice->getId());
					$this->view->fp3 = $fp3;
              		if ($fp3->process($request)) {
                		}
			      }
				}

                	$company_id_ = 0;
    				$fp4 = new FormProcessor_ProInvoiceCompanyDetails($this->db, $this->identity->user_id, $company_id_, $client_id, $fp5->invoice->getId());
				$this->view->fp4 = $fp4;
              	if ($fp4->process($request)) {
                	}
						
				if ($fp5->process($request)) {
				    $this->_redirect($this->getUrl('preview','herramientas/facturas') . '?id=' . $fp5->invoice->getId());
                }
			}

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
							
							$url1 = $croute . '/documentos/proforma?id='.$proforma_id;
							$url2 = 'id2='.$this->identity->user_id;
							$url = $url1 . '\&' . $url2;
							$pdf = $aroute . 'httpdocs/documents/proformas/pdf/'.$mypdf;

							exec ('/usr/bin/wkhtmltopdf ' . $url . ' ' . $pdf. ' 2>&1', $array);
							////convert pdf to jpg using Phmagick
							include_once $droute . '/phmagick/phmagick.php';
							$jpg = new phmagick($aroute . 'httpdocs/documents/proformas/pdf/'. $mypdf, $aroute . 'httpdocs/documents/proformas/view/'. $myjpg);
							$jpg->setImageQuality(100);
							$jpg->convert();
							//create preview for home
							$preview = new phmagick($aroute . 'httpdocs/documents/proformas/pdf/'. $mypdf, $aroute . 'httpdocs/documents/proformas/preview/'. $myjpg);
							$preview->setImageQuality(100);
							$preview->resize(160,0);
						if (file_exists($aroute . 'httpdocs/documents/proformas/pdf/'.$mypdf)) {
    								header('Pragma: public'); // required
    								header('Expires: 0'); // no cache
    								header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    								header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime($aroute . 'httpdocs/documents/proformas/pdf/'.$mypdf)).' GMT');
    								header('Cache-Control: private',false);
   						 		header('Content-Type: '.'application/pdf');
    								header('Content-Disposition: attachment; filename="'.basename($aroute . 'httpdocs/documents/proformas/pdf/'.$mypdf).'"');
    								header('Content-Transfer-Encoding: binary');
   								header('Content-Length: '.filesize($aroute . 'httpdocs/documents/proformas/pdf/'.$mypdf)); // provide file size
    								header('Connection: close');
								ob_clean();
			            			flush();
    								readfile($aroute . 'httpdocs/documents/proformas/pdf/'.$mypdf);
    								exit();
						}			
				}
		}
   }
?>