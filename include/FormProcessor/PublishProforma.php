<?php
    class FormProcessor_PublishProforma extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $proforma = null;
		
        public function __construct($db, $user_id, $proforma_id = 0, $mypdf1 = 0)
        {
            parent::__construct();

            $this->db = $db;
			$this->mypdf1 = $mypdf1;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());

            $this->proforma = new DatabaseObject_Proforma($db);
            $this->proforma->loadForUser($this->user->getId(), $proforma_id);	
			
			$this->proforma_id = $proforma_id;	
		
			if ($this->proforma->isSaved()) {
			
			$this->published = $this->proforma->profile->published;
			$this->ts_published = $this->proforma->profile->ts_published;
			$this->proforma_file = $this->proforma->profile->proforma_file;

        		}		
			else
                	$this->proforma->user_id = $this->user->getId();
				$this->proforma->company_id = $this->company->getId();
			}

        public function process(Zend_Controller_Request_Abstract $request)
        {
        		$this->published = 'yes';
            $this->proforma->profile->published = $this->published;
			
        		$this->ts_published = date("Y-m-d");
            $this->proforma->profile->ts_published = $this->ts_published;
			
        		$this->proforma_file = $this->mypdf1;
            $this->proforma->profile->proforma_file = $this->proforma_file;	
			
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
			  if ($this->proforma_id) {
					$this->proforma->profile->published = $this->published;
				    $this->proforma->profile->ts_published = $this->ts_published;
					$this->proforma->profile->proforma_file = $this->proforma_file;
			
					$this->proforma->save();
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