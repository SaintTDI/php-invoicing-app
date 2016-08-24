<?php
    class FormProcessor_Time extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $time = null;
		public $company = null;
		public $image = null;
		protected $_uploadedFile;


        public function __construct($db, $user_id, $time_id = 0, $project_id = 0, $task_id = 0)
        {
            parent::__construct();

            $this->db = $db;
			
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());
			
            $this->project_ = new DatabaseObject_Project($db);
            $this->project_->loadForUser($this->user->getId(), $project_id);
			$this->project_id_ = $project_id;
			
            $this->task_ = new DatabaseObject_Task($db);
            $this->task_->loadForUser($this->user->getId(), $task_id);	
		    $this->task_id_ = $task_id;
			
            $this->time = new DatabaseObject_Time($db);
            $this->time->loadForUser($this->user->getId(), $time_id);	
			$this->time_id = $time_id;
			
			if ($this->time_id){
				$this->time_2_ = $this->time->profile->time_2;
			}
		
			if ($this->time->isSaved()) {
				
            $this->date_time = $this->time->profile->date_time;
			$this->time_ = $this->time->profile->time_;
			$this->time_2 = $this->time->profile->time_2;
			$this->hours = $this->time->profile->hours;
			$this->notes = $this->time->profile->notes;
			$this->project = $this->time->profile->project;
			$this->project_id = $this->time->profile->project_id;
			$this->task = $this->time->profile->task;
			$this->task_id = $this->time->profile->task_id;
			$this->rate = $this->time->profile->rate;
			
        }		
		else
                	$this->time->user_id = $this->user->getId();
				$this->time->company_id = $this->company->getId();

		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
			
            $this->date_time = $this->sanitize($request->getPost('date_time'));
            $this->time->profile->date_time = $this->date_time;
			
			if (!$this->time_id){
	            $hours_ = $this->sanitize($request->getPost('hours'));
				$hours__ = str_replace('.', '', $hours_);
				$this->hours = str_replace(',', '.', $hours__);
	            $this->time->profile->hours = $this->hours;
		
				if (!$this->time_2 && $this->hours){
					
					$seconds = floor($this->hours * 3600);
					$hours = floor($seconds / 3600);
					$mins = floor(($seconds - ($hours*3600)) / 60);
					$secs = floor($seconds % 60);
					
					$digits1 = strlen($hours);
					$digits2 = strlen($mins);
					$digits3 = strlen($secs);
					
					if ($digits1 == 1){
						$hours2 = '0' . $hours;
					}
					else{
						$hours2 = $hours;
					}
					
					if ($digits2 == 1){
						$mins2 = '0' . $mins;
					}
					else{
						$mins2 = $mins;
					}
					
					if ($digits3 == 1){
						$secs2 = '0' . $secs;
					}
					else{
						$secs2 = $secs;
					}
	
					$this->time_ = $hours2 . ' Horas ' . $mins2 . ' Minutos ' . $secs2 . ' Segundos';
		            $this->time->profile->time_ = $this->time_;					
				}
				else{
		            $this->time_ = $this->sanitize($request->getPost('time_'));
		            $this->time->profile->time_ = $this->time_;
				}
				
				if (!$this->time_2 && $this->hours){
					$this->time_2 = $this->hours * 3600000;
		            $this->time->profile->time_2 = $this->time_2;					
				}
				else{
					$this->time_2 = $this->sanitize($request->getPost('time_2'));
		            $this->time->profile->time_2 = $this->time_2;	
				}
			}
			else{
				
	            $hours_ = $this->sanitize($request->getPost('hours'));
				$hours__ = str_replace('.', '', $hours_);
				
		        $this->time_ = $this->sanitize($request->getPost('time_'));
		       
			    $this->time_2 = $this->sanitize($request->getPost('time_2'));
		        	
				if ($this->time_2_ != $this->time_2){
					$this->time->profile->time_ = $this->time_;	
					$this->time->profile->time_2 = $this->time_2;
					
		            $this->hours = $this->time_2 / 3600000;
					$this->time->profile->hours = $this->hours;
				}
				elseif ($hours__){
					$this->hours = str_replace(',', '.', $hours__);
					
					$seconds = floor($this->hours * 3600);
					$hours = floor($seconds / 3600);
					$mins = floor(($seconds - ($hours*3600)) / 60);
					$secs = floor($seconds % 60);
					
					$digits1 = strlen($hours);
					$digits2 = strlen($mins);
					$digits3 = strlen($secs);
					
					if ($digits1 == 1){
						$hours2 = '0' . $hours;
					}
					else{
						$hours2 = $hours;
					}
					
					if ($digits2 == 1){
						$mins2 = '0' . $mins;
					}
					else{
						$mins2 = $mins;
					}
					
					if ($digits3 == 1){
						$secs2 = '0' . $secs;
					}
					else{
						$secs2 = $secs;
					}
	
					$this->time_ = $hours2 . ' Horas ' . $mins2 . ' Minutos ' . $secs2 . ' Segundos';
		            $this->time->profile->time_ = $this->time_;
					
					$this->time_2 = $this->hours * 3600000;
		            $this->time->profile->time_2 = $this->time_2;	
	
	            		$this->time->profile->hours = $this->hours;
				}
				else {
					$this->time->profile->time_ = $this->time_;	
					$this->time->profile->time_2 = $this->time_2;
					
					$this->hours = str_replace(',', '.', $hours__);
	            		$this->time->profile->hours = $this->hours;
				}
			}

			$this->notes = $this->sanitize($request->getPost('notes'));
            $this->time->profile->notes = $this->notes;	
			
			$this->project = $this->sanitize($request->getPost('project'));
            $this->time->profile->project = $this->project;	
			
			$this->project_id = $this->sanitize($request->getPost('project_id'));
            $this->time->profile->project_id = $this->project_id;	
			
			$this->task = $this->sanitize($request->getPost('task'));
            $this->time->profile->task = $this->task;	
			
			$this->task_id = $this->sanitize($request->getPost('task_id'));
            $this->time->profile->task_id = $this->task_id;	

			$this->rate = $this->sanitize($request->getPost('rate'));
            $this->time->profile->rate = $this->rate;	
			          
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
            	
            		$this->time->profile->date_time = date("d-m-Y", strtotime($this->date_time));
				$this->time->profile->time_ = $this->time_;
				$this->time->profile->time_2 = $this->time_2;
				$this->time->profile->hours = $this->hours;
				$this->time->profile->notes = $this->notes;
				$this->time->profile->project = $this->project;
				$this->time->profile->task = $this->task;
				$this->time->profile->project_id = $this->project_id;			
				$this->time->profile->task_id = $this->task_id;
				$this->time->profile->rate = $this->rate;
				
				$this->time->save();	

			if (!$this->project_id_){
				if ($this->project){
					$this->project_->user_id = $this->user->getId();
					$this->project_->project_title =	$this->project;			
					$this->project_->save();
					$this->project_id_ = $this->project_->getId();
					
					$this->time->profile->project_id = $this->project_->getId();
					$this->time->save();	
				}
			}
			
			if (!$this->task_id_){
				if ($this->task){
					$this->task_->user_id = $this->user->getId();
					$this->task_->company_id = $this->company->getId();
					$this->task_->profile->task_title = $this->task;	
					$this->task_->profile->project =	$this->project;
					if ($this->project_id_){
						$this->task_->profile->project_id =	$this->project_id_;
					}
					if ($this->date_time){
						$this->task_->profile->start = $this->date_time;
						$this->next__ = date('d-m-Y', strtotime($this->date_time. ' + 1 days'));
						$this->task_->profile->ends = $this->next__;
					}
					else{
						$this->task_->profile->start = date('d-m-Y');
						$this->next__ = date('d-m-Y', strtotime($this->date_time. ' + 1 days'));
						$this->task_->profile->ends = $this->next__;
					}
					$this->task_->save();
					
					$this->time->profile->task_id = $this->task_->getId();
					$this->time->save();	
				}
			 }	
          }

		      // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>