<?php
    class FormProcessor_Task extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $task = null;
		public $company = null;
		public $image = null;
		protected $_uploadedFile;


        public function __construct($db, $user_id, $task_id = 0, $project_id = 0)
        {
            parent::__construct();

            $this->db = $db;
			
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());
			
            $this->task = new DatabaseObject_Task($db);
            $this->task->loadForUser($this->user->getId(), $task_id);	
			
            $this->project_ = new DatabaseObject_Project($db);
            $this->project_->loadForUser($this->user->getId(), $project_id);
			$this->project_id_ = $project_id;
		
			if ($this->task->isSaved()) {
				
            $this->task_title = $this->task->profile->task_title;
			$this->start = $this->task->profile->start;
            $this->ends = $this->task->profile->ends;
			$this->responsible = $this->task->profile->responsible;
			$this->contact_id2 = $this->task->profile->contact_id2;
			//$this->expense = $this->task->profile->expense;
			$this->notes = $this->task->profile->notes;
			$this->project = $this->task->profile->project;
			$this->project_id = $this->task->profile->project_id;
			
        }		
		else
                	$this->task->user_id = $this->user->getId();
				$this->task->company_id = $this->company->getId();

		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
			
            $this->task_title = $this->sanitize($request->getPost('task_title'));
            if (strlen($this->task_title) == 0){
                $this->addError('task_title', 'Por favor introduce el nombre de la tarea');
			}
            else{
                $this->task->profile->task_title = $this->task_title;
			}
			
            $this->start = $this->sanitize($request->getPost('start'));
            if (strlen($this->start) == 0){
                $this->addError('start', 'Por favor introduce la fecha de inicio');
			}
            else{
                $this->task->profile->start = $this->start;
            }
			
			if ($this->sanitize($request->getPost('ends'))){
	            $this->ends = $this->sanitize($request->getPost('ends'));
	            if (strtotime($this->ends) < strtotime($this->start)){
	            		$this->addError('ends', 'La fecha de culminaci&oacute;n no puede ser anterior a la de inicio');
				}
	            else{
	                $this->task->profile->ends = $this->ends;	
				}
			}
			else{
				$this->ends = $this->sanitize($request->getPost('ends'));
            		$this->task->profile->ends = $this->ends;	
			}
			
			$this->responsible = $this->sanitize($request->getPost('responsible'));
            $this->task->profile->responsible = $this->responsible;	
			
			$this->contact_id2 = $this->sanitize($request->getPost('contact_id2'));
            $this->task->profile->contact_id2 = $this->contact_id2;	
			
            /*$punit_ = $this->sanitize($request->getPost('expense'));
		    $punit2_ = str_replace('.', '', $punit_);
			$this->expense = str_replace(',', '.', $punit2_);
			//$this->expense = $punit2_;
            $this->task->profile->expense = $this->expense;*/
			
			$this->notes = $this->sanitize($request->getPost('notes'));
            $this->task->profile->notes = $this->notes;	
			
			$this->project = $this->sanitize($request->getPost('project'));
            $this->task->profile->project = $this->project;	
			
			$this->project_id = $this->sanitize($request->getPost('project_id'));
            $this->task->profile->project_id = $this->project_id;	

            
			// if no errors have occurred, save the user
            if (!$this->hasError()) {

	            $this->task->profile->task_title = $this->task_title;
				$this->task->profile->start = date("d-m-Y", strtotime($this->start));
	            $this->task->profile->ends = date("d-m-Y", strtotime($this->ends));
				$this->task->profile->responsible = $this->responsible;
				$this->task->profile->contact_id2 = $this->contact_id2;
				//$this->task->profile->expense = $this->expense;
				$this->task->profile->notes = $this->notes;
				$this->task->profile->project = $this->project;
				$this->task->profile->project_id = $this->project_id;
				
				$this->task->save();

			if (!$this->project_id_){
				if ($this->project){
					$this->project_->user_id = $this->user->getId();
					$this->project_->project_title =	$this->project;			
					$this->project_->save();
					$this->project_id_ = $this->project_->getId();
	
					$this->task->profile->project_id = $this->project_->getId();
					$this->task->save();
				}
			}
          }

		      // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>