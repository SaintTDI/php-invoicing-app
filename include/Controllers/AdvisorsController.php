<?php
    class AdvisorsController extends CustomControllerAction
    {
    		protected $user = null;
			
        public function init()
        {
            parent::init();
			$this->identity = Zend_Auth::getInstance()->getIdentity();
			
            $this->breadcrumbs->addStep('Advisor', $this->getUrl(null, 'advisor'));

			if (!$this->identity)
                $this->_redirect($this->getUrl('index','cuenta'));
        }

    	
        public function editarAction()
        {
			if ($this->identity->user_type != 'association') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
			$request = $this->getRequest();	
			$advisor_id = (int) $this->getRequest()->getQuery('id');
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Advisor::GetAllAdvisors($this->db,
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
			
            $advisor = new DatabaseObject_Advisor($this->db);	
            if (!$advisor->loadForUser($this->identity->user_id, $advisor_id))
                $this->_redirect($this->getUrl());
            
			$this->view->advisor = $advisor;
		
			$fp = new FormProcessor_Advisor($this->db,
                                             $this->identity->user_id,
                                             $advisor_id);
											 
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
                 	$advisor->save();
					$this->_redirect($this->getUrl('index')); 	    
                }
            }		
        }
    	
 		public function agregarAction()
        {
			if ($this->identity->user_type != 'association') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
				
			$request = $this->getRequest();
			$advisor_id = (int) $this->getRequest()->getQuery('id');

			$fp = new FormProcessor_Advisor($this->db,
                                             $this->identity->user_id,
                                             $advisor_id);
											
			$invited = 0;
			
			$this->view->invited = $invited;
			
			if ($fp->advisor->getId()) {		
            $advisor = new DatabaseObject_Advisor($this->db);
            if (!$advisor->loadForUser($this->identity->user_id, $advisor_id))
                $this->_redirect($this->getUrl());
			
			$this->view->advisor = $advisor;
			}
			
	
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $companieslist = DatabaseObject_Advisor::GetAllAdvisors($this->db,
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
            	//$this->messenger->addMessage('Advisor aregado con exito');
                if ($fp->process($request)) {
				    $this->_redirect($this->getUrl('index')); 
                }
            }
			
			$this->view->fp = $fp;
        }
		
       public function indexAction()
        {
			if ($this->identity->user_type != 'association') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
	
        		$request = $this->getRequest();
			$advisor_id = $request->getPost('advisor_id');
			$prod =new DatabaseObject_Advisor($this->db);
			
			$options = array(
                'user_type' => 'proprietary'
            );
			
            $users = DatabaseObject_UserEmployee::GetUsers3($this->db, $options);
			
			$this->view->users = $users;
			
			$options = array(
                'user_type' => 'advisor'
            );
			
            $users2 = DatabaseObject_UserEmployee::GetUsers3($this->db, $options);
			
			$this->view->users2 = $users2;
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $advisors = DatabaseObject_Advisor::GetAllAdvisors($this->db,
                                                       $options);
			
			$this->view->advisors = $advisors;
			
            $user_info = new DatabaseObject_User($this->db);
            $user_info->load($this->identity->user_id);
			$default_currency = $user_info->profile->currency;
			
			$status = array();
			$activation_date = array();
			$comission = array();
			$acc_number = array();
			
			$total = 0;
			
			foreach ($advisors as $advisor){
				
				$id__ = $advisor->profile->user_id_;
				$id_ = $advisor->getId();
				
				if (!$id__){
					$id__= 0;
				}
					
				$options = array(
	                'user_id' => $id__
	            );
	
	            $clients = DatabaseObject_Client::GetAllClients($this->db, $options);
				
				foreach ($clients as $client) {
					foreach ($users as $user){
						
					$plan_ = $user->profile->plan;
						
					  if ($user->profile->email == $client->email && $user->profile->invited == $client->getId()){
						if ($plan_ == 'plan1' or $plan_ == 'plan3' or $plan_ == 'plan5'){
							
							if (!$comission[$id_]){
								$comission[$id_] = 0;
							}
						
							$acc_number[$id_] += 1;

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
	
							$comission[$id_] += 1 * $diff;
							$total += 1 * $diff;
							
					  		}
						}
					}
					
					foreach ($users2 as $user2) {
						if ($user2->profile->email == $advisor->email && $user2->profile->invited == $advisor->getId()){
							$id_ = $advisor->getId();
							$activation_date[$id_] = date('d-m-Y', $user2->ts_created);
					 	}
			        }
			    }
			 }
			
			$this->view->status = $status;
			$this->view->acc_number = $acc_number;			
			$this->view->total = $total;
			$this->view->activation_date = $activation_date;
			$this->view->comission = $comission;
			$this->view->default_currency = $default_currency;
													   
			if ($request->getPost('delete')) {
			 	if ($advisor_id) {
			 		$prod->deleteAdvisorProfile($this->db, $advisor_id);
					$prod->deleteAdvisor($this->db, $advisor_id);
					$this->_redirect($this->getUrl('index'));
			    }
             }
		}
		
    }
?>