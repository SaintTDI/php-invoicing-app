<?php
    class ComisionesController extends CustomControllerAction
    {
    		protected $user = null;
			
        public function init()
        {
            parent::init();
			$this->identity = Zend_Auth::getInstance()->getIdentity();
			
            $this->breadcrumbs->addStep('Comisiones', $this->getUrl(null, 'comisiones'));

			if (!$this->identity)
                $this->_redirect($this->getUrl('index','cuenta'));
        }
		
       public function indexAction()
        {
			if ($this->identity->user_type != 'association' && $this->identity->user_type != 'advisor') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
			/////association		
			if ($this->identity->user_type == 'association') {				
				
				$options = array('user_type' => 'proprietary');
				
	            $users2 = DatabaseObject_UserEmployee::GetUsers3($this->db, $options);
				
				$this->view->users2 = $users2;
				
	
			    $options = array('user_id' => $this->identity->user_id);
	
	            $advisors = DatabaseObject_Advisor::GetAllAdvisors($this->db, $options);
				
				$this->view->advisors = $advisors;
				
				
	            $user_info = new DatabaseObject_User($this->db);
	            $user_info->load($this->identity->user_id);
				$default_currency = $user_info->profile->currency;
				
				$status = array();
				
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
				
				$account_1 = 0;
				$account_2 = 0;
				$account_3 = 0;
				$account_4 = 0;
				$account_5 = 0;
				$account_6 = 0;
				$account_7 = 0;
				$account_8 = 0;
				$account_9 = 0;
				$account_10 = 0;
				$account_11 = 0;
				$account_12 = 0;
				
				$total = 0;
	
				foreach ($advisors as $advisor) {
					
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
					foreach ($users2 as $user2) {
						
					$plan_ = $user2->profile->plan;

						if ($user2->profile->email == $client->email && $user2->profile->invited == $client->getId()){
							if ($plan_ == 'plan1' or $plan_ == 'plan3' or $plan_ == 'plan5'){

							$date1 = date('d-m-Y', $user2->ts_created);
							$date2 = date('d-m-Y');
							
							$ts1 = strtotime($date1);
							$ts2 = strtotime($date2);
							
							$year1 = date('Y', $ts1);
							$year2 = date('Y', $ts2);
							$year_ = $year2;
							
							$month1 = date('m', $ts1);
							$month2 = date('m', $ts2);
							$month__ = date('n', $ts2);
							$month1__ = date('n', $ts1);
							
							if ($year1 == $year2){
								$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
							}
							else{
								$diff = $month2;
							}
				
								if ($year1 == $year_){
									if($month1__ == 1){
										$account_1 += 1;
									}
									elseif($month1__ == 2){
										$account_2 += 1;
									}
									elseif($month1__ == 3){
										$account_3 += 1;
									}
									elseif($month1__ == 4){
										$account_4 += 1;
									}
									elseif($month1__ == 5){
										$account_5 += 1;
									}
									elseif($month1__ == 6){
										$account_6 += 1;
									}
									elseif($month1__ == 7){
										$account_7 += 1;
									}
									elseif($month1__ == 8){
										$account_8 += 1;
									}
									elseif($month1__ == 9){
										$account_9 += 1;
									}
									elseif($month1__ == 10){
										$account_10 += 1;
									}
									elseif($month1__ == 11){
										$account_11 += 1;
									}
									else {
										$account_12 += 1;
									}
								}
								
	
								if($month__ == 1){
									 $tot_month_1 += 1;
									 $total += 1;
								}
										
								elseif($month__ == 2){
									 $tot_month_2 +=1;
									 $total += 1;
									 
									if ($diff >= 2){
											 $tot_month_1 += 1;
											 $total += 1;
									}
								}
										
							    elseif($month__ == 3){
									 $tot_month_3 +=1;
									 $total += 1;
									 
									if ($diff >= 3){
											 $tot_month_1 += 1;
											 $tot_month_2 += 1;
											 $total += 2;
									}
									elseif ($diff == 2){
											 $tot_month_2 += 1;
											 $total += 1;
									}
								}
										
							    elseif($month__ == 4){
									 $tot_month_4 +=1;
									 $total += 1;
									 
									if ($diff >= 4){
											 $tot_month_1 += 1;
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $total += 3;
									}
									elseif ($diff == 3){
											 $tot_month_3 += 1;
											 $tot_month_2 += 1;
											 $total += 2;
									}
									elseif ($diff == 2){
											 $tot_month_3 += 1;
											 $total += 1;
									}
								}
										
								elseif($month__ == 5){	
									$tot_month_5 +=1;
									$total += 1;
									
									if ($diff >= 5){
											 $tot_month_1 += 1;
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $total += 4;
									}
									elseif ($diff == 4){
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $total += 3;
									}
									elseif ($diff == 3){
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $total += 2;
									}
									elseif ($diff == 2){
											 $tot_month_4 += 1;
											 $total += 1;
									}
								}
										
							    elseif($month__ == 6){	
									$tot_month_6 +=1;
									$total += 1;
									
									if ($diff >= 6){
											 $tot_month_1 += 1;
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $total += 5;
									}
									elseif ($diff == 5){
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $total += 4;
									}
									elseif ($diff == 4){
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $total += 3;
									}
									elseif ($diff == 3){
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $total += 2;
									}
									elseif ($diff == 2){
											 $tot_month_5 += 1;
											 $total += 1;
									}
								}
										
								elseif($month__ == 7){	
									$tot_month_7 +=1;
									$total += 1;
									
									if ($diff >= 7){
											 $tot_month_1 += 1;
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $total += 6;
									}
									elseif ($diff == 6){
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $total += 5;
									}
									elseif ($diff == 5){
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $total += 4;
									}
									elseif ($diff == 4){
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $total += 3;
									}
									elseif ($diff == 3){
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $total += 2;
									}
									elseif ($diff == 2){
											 $tot_month_6 += 1;
											 $total += 1;
									}
								}
										
								elseif($month__ == 8){	
									$tot_month_8 +=1;
									$total += 1;
									
									if ($diff >= 8){
											 $tot_month_1 += 1;
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $total += 7;
									}
									elseif ($diff == 7){
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $total += 6;
									}
									elseif ($diff == 6){
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $total += 5;
									}
									elseif ($diff == 5){
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $total += 4;
									}
									elseif ($diff == 4){
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $total += 3;
									}
									elseif ($diff == 3){
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $total += 2;
									}
									elseif ($diff == 2){
											 $tot_month_7 += 1;
											 $total += 1;
									}
								}
										
								elseif($month__ == 9){		
									$tot_month_9 +=1;
									$total += 1;
									
									if ($diff >= 9){
											 $tot_month_1 += 1;
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $total += 8;
									}
									elseif ($diff == 8){
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $total += 7;
									}
									elseif ($diff == 7){
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $total += 6;
									}
									elseif ($diff == 6){
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $total += 5;
									}
									elseif ($diff == 5){
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $total += 4;
									}
									elseif ($diff == 4){
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $total += 3;
									}
									elseif ($diff == 3){
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $total += 2;
									}
									elseif ($diff == 2){
											 $tot_month_8 += 1;
											 $total += 1;
									}
								}
										
								elseif($month__ == 10){	
									$tot_month_10 +=1;
									$total += 1;
									
									if ($diff >= 10){
											 $tot_month_1 += 1;
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $total += 9;
									}
									elseif ($diff == 9){
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $total += 8;
									}
									elseif ($diff == 8){
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $total += 7;
									}
									elseif ($diff == 7){
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $total += 6;
									}
									elseif ($diff == 6){
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $total += 5;
									}
									elseif ($diff == 5){
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $total += 4;
									}
									elseif ($diff == 4){
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $total += 3;
									}
									elseif ($diff == 3){
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $total += 2;
									}
									elseif ($diff == 2){
											 $tot_month_9 += 1;
											 $total += 1;
									}
								}
										
								elseif($month__ == 11){	
									$tot_month_11 +=1;
									$total += 1;
									
									if ($diff >= 11){
											 $tot_month_1 += 1;
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $total += 10;
									}
									elseif ($diff == 10){
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $total += 9;
									}
									elseif ($diff == 9){
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $total += 8;
									}
									elseif ($diff == 8){
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $total += 7;
									}
									elseif ($diff == 7){
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $total += 6;
									}
									elseif ($diff == 6){
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $total += 5;
									}
									elseif ($diff == 5){
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $total += 4;
									}
									elseif ($diff == 4){
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $total += 3;
									}
									elseif ($diff == 3){
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $total += 2;
									}
									elseif ($diff == 2){
											 $tot_month_10 += 1;
											 $total += 1;
									}
								}
										
								else {
									$tot_month_12 +=1;
									$total += 1;
									
									if ($diff >= 12){
											 $tot_month_1 += 1;
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $tot_month_11 += 1;
											 $total += 11;
									}
									elseif ($diff == 11){
											 $tot_month_2 += 1;
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $tot_month_11 += 1;
											 $total += 10;
									}
									elseif ($diff == 10){
											 $tot_month_3 += 1;
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $tot_month_11 += 1;
											 $total += 9;
									}
									elseif ($diff == 9){
											 $tot_month_4 += 1;
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $tot_month_11 += 1;
											 $total += 8;
									}
									elseif ($diff == 8){
											 $tot_month_5 += 1;
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $tot_month_11 += 1;
											 $total += 7;
									}
									elseif ($diff == 7){
											 $tot_month_6 += 1;
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $tot_month_11 += 1;
											 $total += 6;
									}
									elseif ($diff == 6){
											 $tot_month_7 += 1;
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $tot_month_11 += 1;
											 $total += 5;
									}
									elseif ($diff == 5){
											 $tot_month_8 += 1;
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $tot_month_11 += 1;
											 $total += 4;
									}
									elseif ($diff == 4){
											 $tot_month_9 += 1;
											 $tot_month_10 += 1;
											 $tot_month_11 += 1;
											 $total += 3;
									}
									elseif ($diff == 3){
											 $tot_month_10 += 1;
											 $tot_month_11 += 1;
											 $total += 2;
									}
									elseif ($diff == 2){
											 $tot_month_11 += 1;
											 $total += 1;
									}
								}
							}
						  } 
					   }
					}
				 }
			
				$this->view->total = $total;
				$this->view->year_ = $year_;
				$this->view->default_currency = $default_currency;
				
				$this->view->tot_month_1 = $tot_month_1;
				$this->view->tot_month_2 = $tot_month_2;
				$this->view->tot_month_3 = $tot_month_3;
				$this->view->tot_month_4 = $tot_month_4;
				$this->view->tot_month_5 = $tot_month_5;
				$this->view->tot_month_6 = $tot_month_6;
				$this->view->tot_month_7 = $tot_month_7;
				$this->view->tot_month_8 = $tot_month_8;
				$this->view->tot_month_9 = $tot_month_9;
				$this->view->tot_month_10 = $tot_month_10;
				$this->view->tot_month_11 = $tot_month_11;
				$this->view->tot_month_12 = $tot_month_12;

				$this->view->account_1 = $account_1;
				$this->view->account_2 = $account_2;
				$this->view->account_3 = $account_3;
				$this->view->account_4 = $account_4;
				$this->view->account_5 = $account_5;
				$this->view->account_6 = $account_6;
				$this->view->account_7 = $account_7;
				$this->view->account_8 = $account_8;
				$this->view->account_9 = $account_9;
				$this->view->account_10 = $account_10;
				$this->view->account_11 = $account_11;
				$this->view->account_12 = $account_12;

			}
			/////end association
			
			/////advisor		
			if ($this->identity->user_type == 'advisor') {				
				
				$options = array('user_type' => 'proprietary');
				
	            $users2 = DatabaseObject_UserEmployee::GetUsers3($this->db, $options);
				
				$this->view->users2 = $users2;
				
	
			    $options = array('user_id' => $this->identity->user_id);
	
	            $advisors = DatabaseObject_Client::GetAllClients($this->db, $options);
				
				$this->view->advisors = $advisors;
				
				
	            $user_info = new DatabaseObject_User($this->db);
	            $user_info->load($this->identity->user_id);
				$default_currency = $user_info->profile->currency;
				
				$status = array();
				
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
				
				$account_1 = 0;
				$account_2 = 0;
				$account_3 = 0;
				$account_4 = 0;
				$account_5 = 0;
				$account_6 = 0;
				$account_7 = 0;
				$account_8 = 0;
				$account_9 = 0;
				$account_10 = 0;
				$account_11 = 0;
				$account_12 = 0;
				
				$total = 0;
	
				foreach ($advisors as $advisor) {
					foreach ($users2 as $user2) {
						if ($user2->profile->invited == $advisor->getId()){
							$id_ = $advisor->getId();
							$plan_ = $user2->profile->plan;
							///
							$date1 = date('d-m-Y', $user2->ts_created);
							$date2 = date('d-m-Y');
							
							$ts1 = strtotime($date1);
							$ts2 = strtotime($date2);
							
							$year1 = date('Y', $ts1);
							$year2 = date('Y', $ts2);
							$year_ = $year2;
							
							$month1 = date('m', $ts1);
							$month2 = date('m', $ts2);
							$month__ = date('n', $ts2);
							$month1__ = date('n', $ts1);
							
							if ($year1 == $year2){
								$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
							}
							else{
								$diff = $month2;
							}
							///
							
							if ($plan_ == 'plan1' or $plan_ == 'plan3' or $plan_ == 'plan5'){

								if ($year1 == $year_){
									if($month1__ == 1){
										$account_1 += 1;
									}
									elseif($month1__ == 2){
										$account_2 += 1;
									}
									elseif($month1__ == 3){
										$account_3 += 1;
									}
									elseif($month1__ == 4){
										$account_4 += 1;
									}
									elseif($month1__ == 5){
										$account_5 += 1;
									}
									elseif($month1__ == 6){
										$account_6 += 1;
									}
									elseif($month1__ == 7){
										$account_7 += 1;
									}
									elseif($month1__ == 8){
										$account_8 += 1;
									}
									elseif($month1__ == 9){
										$account_9 += 1;
									}
									elseif($month1__ == 10){
										$account_10 += 1;
									}
									elseif($month1__ == 11){
										$account_11 += 1;
									}
									else {
										$account_12 += 1;
									}
								}
								
	
								if($month__ == 1){
									 $tot_month_1 += 2;
									 $total += 2;
								}
										
								elseif($month__ == 2){
									 $tot_month_2 += 2;
									 $total += 2;
									 
									if ($diff >= 2){
											 $tot_month_1 += 2;
											 $total += 2;
									}
								}
										
							    elseif($month__ == 3){
									 $tot_month_3 += 2;
									 $total += 2;
									 
									if ($diff >= 3){
											 $tot_month_1 += 2;
											 $tot_month_2 += 2;
											 $total += 4;
									}
									elseif ($diff == 2){
											 $tot_month_2 += 2;
											 $total += 2;
									}
								}
										
							    elseif($month__ == 4){
									 $tot_month_4 += 2;
									 $total += 2;
									 
									if ($diff >= 4){
											 $tot_month_1 += 2;
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $total += 6;
									}
									elseif ($diff == 3){
											 $tot_month_3 += 2;
											 $tot_month_2 += 2;
											 $total += 4;
									}
									elseif ($diff == 2){
											 $tot_month_3 += 2;
											 $total += 2;
									}
								}
										
								elseif($month__ == 5){	
									$tot_month_5 += 2;
									$total += 2;
									
									if ($diff >= 5){
											 $tot_month_1 += 2;
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $total += 8;
									}
									elseif ($diff == 4){
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $total += 6;
									}
									elseif ($diff == 3){
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $total += 4;
									}
									elseif ($diff == 2){
											 $tot_month_4 += 2;
											 $total += 2;
									}
								}
										
							    elseif($month__ == 6){	
									$tot_month_6 += 2;
									$total += 2;
									
									if ($diff >= 6){
											 $tot_month_1 += 2;
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $total += 10;
									}
									elseif ($diff == 5){
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $total += 8;
									}
									elseif ($diff == 4){
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $total += 6;
									}
									elseif ($diff == 3){
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $total += 4;
									}
									elseif ($diff == 2){
											 $tot_month_5 += 2;
											 $total += 2;
									}
								}
										
								elseif($month__ == 7){	
									$tot_month_7 += 2;
									$total += 2;
									
									if ($diff >= 7){
											 $tot_month_1 += 2;
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $total += 12;
									}
									elseif ($diff == 6){
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $total += 10;
									}
									elseif ($diff == 5){
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $total += 8;
									}
									elseif ($diff == 4){
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $total += 6;
									}
									elseif ($diff == 3){
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $total += 4;
									}
									elseif ($diff == 2){
											 $tot_month_6 += 2;
											 $total += 2;
									}
								}
										
								elseif($month__ == 8){	
									$tot_month_8 += 2;
									$total += 2;
									
									if ($diff >= 8){
											 $tot_month_1 += 2;
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $total += 14;
									}
									elseif ($diff == 7){
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $total += 12;
									}
									elseif ($diff == 6){
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $total += 10;
									}
									elseif ($diff == 5){
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $total += 8;
									}
									elseif ($diff == 4){
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $total += 6;
									}
									elseif ($diff == 3){
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $total += 4;
									}
									elseif ($diff == 2){
											 $tot_month_7 += 2;
											 $total += 2;
									}
								}
										
								elseif($month__ == 9){		
									$tot_month_9 += 2;
									$total += 2;
									
									if ($diff >= 9){
											 $tot_month_1 += 2;
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $total += 16;
									}
									elseif ($diff == 8){
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $total += 14;
									}
									elseif ($diff == 7){
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $total += 12;
									}
									elseif ($diff == 6){
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $total += 10;
									}
									elseif ($diff == 5){
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $total += 8;
									}
									elseif ($diff == 4){
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $total += 6;
									}
									elseif ($diff == 3){
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $total += 4;
									}
									elseif ($diff == 2){
											 $tot_month_8 += 2;
											 $total += 2;
									}
								}
										
								elseif($month__ == 10){	
									$tot_month_10 += 2;
									$total += 2;
									
									if ($diff >= 10){
											 $tot_month_1 += 2;
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $total += 18;
									}
									elseif ($diff == 9){
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $total += 16;
									}
									elseif ($diff == 8){
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $total += 14;
									}
									elseif ($diff == 7){
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $total += 12;
									}
									elseif ($diff == 6){
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $total += 10;
									}
									elseif ($diff == 5){
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $total += 8;
									}
									elseif ($diff == 4){
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $total += 6;
									}
									elseif ($diff == 3){
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $total += 4;
									}
									elseif ($diff == 2){
											 $tot_month_9 += 2;
											 $total += 2;
									}
								}
										
								elseif($month__ == 11){	
									$tot_month_11 += 2;
									$total += 2;
									
									if ($diff >= 11){
											 $tot_month_1 += 2;
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $total += 20;
									}
									elseif ($diff == 10){
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $total += 18;
									}
									elseif ($diff == 9){
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $total += 16;
									}
									elseif ($diff == 8){
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $total += 14;
									}
									elseif ($diff == 7){
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $total += 12;
									}
									elseif ($diff == 6){
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $total += 10;
									}
									elseif ($diff == 5){
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $total += 8;
									}
									elseif ($diff == 4){
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $total += 6;
									}
									elseif ($diff == 3){
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $total += 4;
									}
									elseif ($diff == 2){
											 $tot_month_10 += 2;
											 $total += 2;
									}
								}
										
								else {
									$tot_month_12 += 2;
									$total += 2;
									
									if ($diff >= 12){
											 $tot_month_1 += 2;
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $tot_month_11 += 2;
											 $total += 22;
									}
									elseif ($diff == 11){
											 $tot_month_2 += 2;
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $tot_month_11 += 2;
											 $total += 20;
									}
									elseif ($diff == 10){
											 $tot_month_3 += 2;
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $tot_month_11 += 2;
											 $total += 18;
									}
									elseif ($diff == 9){
											 $tot_month_4 += 2;
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $tot_month_11 += 2;
											 $total += 16;
									}
									elseif ($diff == 8){
											 $tot_month_5 += 2;
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $tot_month_11 += 2;
											 $total += 14;
									}
									elseif ($diff == 7){
											 $tot_month_6 += 2;
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $tot_month_11 += 2;
											 $total += 12;
									}
									elseif ($diff == 6){
											 $tot_month_7 += 2;
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $tot_month_11 += 2;
											 $total += 10;
									}
									elseif ($diff == 5){
											 $tot_month_8 += 2;
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $tot_month_11 += 2;
											 $total += 8;
									}
									elseif ($diff == 4){
											 $tot_month_9 += 2;
											 $tot_month_10 += 2;
											 $tot_month_11 += 2;
											 $total += 6;
									}
									elseif ($diff == 3){
											 $tot_month_10 += 2;
											 $tot_month_11 += 2;
											 $total += 4;
									}
									elseif ($diff == 2){
											 $tot_month_11 += 2;
											 $total += 2;
									}
								}
							}
						}
					}
				 }
			
				$this->view->total = $total;
				$this->view->year_ = $year_;
				$this->view->default_currency = $default_currency;
				
				$this->view->tot_month_1 = $tot_month_1;
				$this->view->tot_month_2 = $tot_month_2;
				$this->view->tot_month_3 = $tot_month_3;
				$this->view->tot_month_4 = $tot_month_4;
				$this->view->tot_month_5 = $tot_month_5;
				$this->view->tot_month_6 = $tot_month_6;
				$this->view->tot_month_7 = $tot_month_7;
				$this->view->tot_month_8 = $tot_month_8;
				$this->view->tot_month_9 = $tot_month_9;
				$this->view->tot_month_10 = $tot_month_10;
				$this->view->tot_month_11 = $tot_month_11;
				$this->view->tot_month_12 = $tot_month_12;

				$this->view->account_1 = $account_1;
				$this->view->account_2 = $account_2;
				$this->view->account_3 = $account_3;
				$this->view->account_4 = $account_4;
				$this->view->account_5 = $account_5;
				$this->view->account_6 = $account_6;
				$this->view->account_7 = $account_7;
				$this->view->account_8 = $account_8;
				$this->view->account_9 = $account_9;
				$this->view->account_10 = $account_10;
				$this->view->account_11 = $account_11;
				$this->view->account_12 = $account_12;

			}
			/////end advisor
		}
    }
?>