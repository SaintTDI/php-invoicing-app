<?php
    class FormProcessor_PublishExpense extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $expense = null;
		
        public function __construct($db, $user_id, $expense_id = 0, $mypdf1 = 0)
        {
            parent::__construct();

            $this->db = $db;
			$this->mypdf1 = $mypdf1;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());

            $this->expense = new DatabaseObject_Expense($db);
            $this->expense->loadForUser($this->user->getId(), $expense_id);	
			
			$this->expense_id = $expense_id;	
		
			if ($this->expense->isSaved()) {
			
			$this->published = $this->expense->profile->published;
			$this->ts_published = $this->expense->profile->ts_published;
			$this->expense_file = $this->expense->profile->expense_file;

        		}		
			else
                	$this->expense->user_id = $this->user->getId();
				$this->expense->company_id = $this->company->getId();
			}

        public function process(Zend_Controller_Request_Abstract $request)
        {
        		$this->published = 'yes';
            $this->expense->profile->published = $this->published;
			
        		$this->ts_published = date("Y-m-d");
            $this->expense->profile->ts_published = $this->ts_published;
			
        		$this->expense_file = $this->mypdf1;
            $this->expense->profile->expense_file = $this->expense_file;	
			
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
			  if ($this->expense_id) {
					$this->expense->profile->published = $this->published;
				    $this->expense->profile->ts_published = $this->ts_published;
					$this->expense->profile->expense_file = $this->expense_file;
			
					$this->expense->save();
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