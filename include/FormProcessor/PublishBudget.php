<?php
    class FormProcessor_PublishBudget extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $budget = null;
		
        public function __construct($db, $user_id, $budget_id = 0, $mypdf1 = 0)
        {
            parent::__construct();

            $this->db = $db;
			$this->mypdf1 = $mypdf1;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());

            $this->budget = new DatabaseObject_Budget($db);
            $this->budget->loadForUser($this->user->getId(), $budget_id);	
			
			$this->budget_id = $budget_id;	
		
			if ($this->budget->isSaved()) {
			
			$this->published = $this->budget->profile->published;
			$this->ts_published = $this->budget->profile->ts_published;
			$this->budget_file = $this->budget->profile->budget_file;

        		}		
			else
                	$this->budget->user_id = $this->user->getId();
				$this->budget->company_id = $this->company->getId();
			}

        public function process(Zend_Controller_Request_Abstract $request)
        {
        		$this->published = 'yes';
            $this->budget->profile->published = $this->published;
			
        		$this->ts_published = date("Y-m-d");
            $this->budget->profile->ts_published = $this->ts_published;
			
        		$this->budget_file = $this->mypdf1;
            $this->budget->profile->budget_file = $this->budget_file;	
			
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
			  if ($this->budget_id) {
					$this->budget->profile->published = $this->published;
				    $this->budget->profile->ts_published = $this->ts_published;
					$this->budget->profile->budget_file = $this->budget_file;
			
					$this->budget->save();
			  }
          	}
		    
		    // return true if no errors have occurred
            return !$this->hasError();
        }
		
  		protected function cleanHtml($html)
        {
            $chain = new Zend_Filter();
            $chain->addFilter(new Zend_Filter_StripTags(self::$tags));
            $chain->addFilter(new Zend_Filter_StringTrim());

            $html = $chain->filter($html);

            $tmp = $html;
            while (1) {
                // Try and replace an occurrence of javascript:
                $html = preg_replace('/(<[^>]*)javascript:([^>]*>)/i',
                                     '$1$2',
                                     $html);

                // If nothing changed this iteration then break the loop
                if ($html == $tmp)
                    break;

                $tmp = $html;
            }

            return $html;
        }
    }
?>