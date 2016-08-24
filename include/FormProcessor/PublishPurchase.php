<?php
    class FormProcessor_PublishPurchase extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $purchase = null;
		
        public function __construct($db, $user_id, $purchase_id = 0, $mypdf1 = 0)
        {
            parent::__construct();

            $this->db = $db;
			$this->mypdf1 = $mypdf1;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());

            $this->purchase = new DatabaseObject_Purchase($db);
            $this->purchase->loadForUser($this->user->getId(), $purchase_id);	
			
			$this->purchase_id = $purchase_id;	
		
			if ($this->purchase->isSaved()) {
			
			$this->published = $this->purchase->profile->published;
			$this->ts_published = $this->purchase->profile->ts_published;
			$this->purchase_file = $this->purchase->profile->purchase_file;

        		}		
			else
                	$this->purchase->user_id = $this->user->getId();
				$this->purchase->company_id = $this->company->getId();
			}

        public function process(Zend_Controller_Request_Abstract $request)
        {
        		$this->published = 'yes';
            $this->purchase->profile->published = $this->published;

        		$this->ts_published = date("Y-m-d");
            $this->purchase->profile->ts_published = $this->ts_published;
			
        		$this->purchase_file = $this->mypdf1;
            $this->purchase->profile->purchase_file = $this->purchase_file;	
			
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
			  if ($this->purchase_id) {
					$this->purchase->profile->published = $this->published;
				    $this->purchase->profile->ts_published = $this->ts_published;
					$this->purchase->profile->purchase_file = $this->purchase_file;
			
					$this->purchase->save();
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