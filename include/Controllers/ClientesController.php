<?php
    class ClientesController extends CustomControllerAction
    {
    		protected $user = null;
			
        public function init()
        {
            parent::init();
			$this->identity = Zend_Auth::getInstance()->getIdentity();
			
            $this->breadcrumbs->addStep('Cliente', $this->getUrl(null, 'cliente'));

			if (!$this->identity)
                $this->_redirect($this->getUrl('index','cuenta'));
        }

    	
        public function editarAction()
        {
			if ($this->identity->user_type != 'association' && $this->identity->user_type != 'advisor') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
			$request = $this->getRequest();	
			$client_id = (int) $this->getRequest()->getQuery('id');
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Client::GetAllClients($this->db,
                                                       $options);
			
			$this->view->companieslist = $companieslist;
						
			$i = 0;
			$company_ = array();
			$company_id_ = array();
			$address_id_ = array();
            foreach ($companieslist as $company) {
            	   if (!in_array($company->profile->thecompany, $company_)){
	            		$comp_=$company->profile->thecompany;
					$comp2_ = str_replace("'", "\'", $comp_);
					$company_[]=$comp2_;
					$company_id_[] = $company->getId();
					$address_id_[] = unserialize(base64_decode($company->profile->company_address));
					$i++;
			    }
			}
			
			$this->view->company_ = $company_;
			$this->view->company_id_ = $company_id_;
			$this->view->address_id_ = $address_id_;
			
            $client = new DatabaseObject_Client($this->db);	
            if (!$client->loadForUser($this->identity->user_id, $client_id))
                $this->_redirect($this->getUrl());
            
			$this->view->client = $client;
		
			$fp = new FormProcessor_Client($this->db,
                                             $this->identity->user_id,
                                             $client_id);
											 
			$this->view->fp = $fp;
			
			$options = array(
                'user_type' => 'proprietary'
            );
			
			$users = DatabaseObject_UserEmployee::GetUsers3($this->db, $options);
			
			$this->view->users = $users;
											
			foreach ($users as $user) {
				if ($fp->email == $user->profile->email){
					$invited = $user->profile->invited;
				}
			}
			
			$this->view->invited = $invited;
			
			if ($request->getPost('edit')) {
            	   if ($fp->process($request)) {
                 	$client->save();
					$this->_redirect($this->getUrl('index'));	    
                }
            }		
        }
    	
 		public function agregarAction()
        {
			if ($this->identity->user_type != 'association' && $this->identity->user_type != 'advisor') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
				
			$request = $this->getRequest();
			$client_id = (int) $this->getRequest()->getQuery('id');

			$fp = new FormProcessor_Client($this->db,
                                             $this->identity->user_id,
                                             $client_id);
											
			$invited = 0;
			
			$this->view->invited = $invited;
			
			if ($fp->client->getId()) {		
            $client = new DatabaseObject_Client($this->db);
            if (!$client->loadForUser($this->identity->user_id, $client_id))
                $this->_redirect($this->getUrl());
			
			$this->view->client = $client;
			}
			
	
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Client::GetAllClients($this->db,
                                                       $options);
			
			$this->view->companieslist = $companieslist;
			
			$i = 0;
			$company_ = array();
			$company_id_ = array();
			$address_id_ = array();
            foreach ($companieslist as $company) {
            	    if (!in_array($company->profile->thecompany, $company_)){
	            		$comp_=$company->profile->thecompany;
					$comp2_ = str_replace("'", "\'", $comp_);
					$company_[]=$comp2_;
					$company_id_[] = $company->getId();
					$address_id_[] = unserialize(base64_decode($company->profile->company_address));
					$i++;
				}
			}
			
			$this->view->company_ = $company_;
			$this->view->company_id_ = $company_id_;
			$this->view->address_id_ = $address_id_;
										 						 
            if ($request->getPost('add')) {
            	//$this->messenger->addMessage('Cliente aregado con exito');
                if ($fp->process($request)) {
				    $this->_redirect($this->getUrl('index'));
                }
            }
			
			$this->view->fp = $fp;
        }
		
       public function indexAction()
        {
			if ($this->identity->user_type != 'association' && $this->identity->user_type != 'advisor') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
	
        		$request = $this->getRequest();
			$client_id = $request->getPost('client_id');
			$prod =new DatabaseObject_Client($this->db);
			
			$options = array(
                'user_type' => 'proprietary'
            );
			
            $users = DatabaseObject_UserEmployee::GetUsers3($this->db, $options);
			
			$this->view->users = $users;

		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $clients = DatabaseObject_Client::GetAllClients($this->db,
                                                       $options);
			
			$this->view->clients = $clients;
			
            $user_info = new DatabaseObject_User($this->db);
            $user_info->load($this->identity->user_id);
			$default_currency = $user_info->profile->currency;
			
			$status = array();
			$activation_date = array();
			$comission = array();
			$total = 0;
			
			foreach ($clients as $client) {
				foreach ($users as $user) {
					if ($user->profile->email == $client->email && $user->profile->invited == $client->getId()){

						$id_ = $client->getId();
						$plan_ = $user->profile->plan;
						$status_ = $user->profile->status;
						$activation_date[$id_] = date('d-m-Y', $user->ts_created);
						
						$date1 = date('d-m-Y', $user->ts_created);
						$date2 = date('d-m-Y');
						
						$ts1 = strtotime($date1);
						$ts2 = strtotime($date2);
						
						$year1 = date('Y', $ts1);
						$year2 = date('Y', $ts2);
						
						$month1 = date('m', $ts1);
						$month2 = date('m', $ts2);
						
						$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
						
						if (!$diff){
							$diff = 1;
						}
						
						if ($plan_ == 'trial_plan1' or $plan_ == 'trial_plan3' or $plan_ == 'trial_plan5'){
							$status[$id_] = 'Per&iacute;odo de Prueba'; 
							$comission[$id_] = 0; 
						}
						
						elseif ($plan_ == 'plan1' or $plan_ == 'plan3' or $plan_ == 'plan5'){
							$status[$id_] = 'Cuenta Activa';
							$comission[$id_] = 2 * $diff;
							$total += 2 * $diff;
						}
						
						else {
							$status[$id_] = 'Cuenta Inactiva'; 
							$comission[$id_] = 0; 
						}
				 	}
			     }
			 }
			
			$this->view->total = $total;
			$this->view->status = $status;
			$this->view->activation_date = $activation_date;
			$this->view->comission = $comission;
			$this->view->default_currency = $default_currency;
													   
			if ($request->getPost('delete')) {
			 	if ($client_id) {
			 		$prod->deleteClientProfile($this->db, $client_id);
					$prod->deleteClient($this->db, $client_id);
					$this->_redirect($this->getUrl('index'));
			    }
             }
		}
		
    }
?>