<?php
    class FormProcessor_PublishInvoice extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $invoice = null;
		
        public function __construct($db, $user_id, $invoice_id = 0, $mypdf1 = 0)
        {
            parent::__construct();

            $this->db = $db;
			$this->mypdf1 = $mypdf1;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());

            $this->invoice = new DatabaseObject_Invoice($db);
            $this->invoice->loadForUser($this->user->getId(), $invoice_id);	
			
			$this->invoice_id = $invoice_id;	
		
			if ($this->invoice->isSaved()) {
			
			$this->published = $this->invoice->profile->published;
			$this->ts_published = $this->invoice->profile->ts_published;
			$this->invoice_file = $this->invoice->profile->invoice_file;

        		}		
			else
                	$this->invoice->user_id = $this->user->getId();
				$this->invoice->company_id = $this->company->getId();
			}

        public function process(Zend_Controller_Request_Abstract $request)
        {
        		$this->published = 'yes';
            $this->invoice->profile->published = $this->published;
			
        		$this->ts_published = date("Y-m-d");
            $this->invoice->profile->ts_published = $this->ts_published;
			
        		$this->invoice_file = $this->mypdf1;
            $this->invoice->profile->invoice_file = $this->invoice_file;	
			
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
			  if ($this->invoice_id) {
					$this->invoice->profile->published = $this->published;
				    $this->invoice->profile->ts_published = $this->ts_published;
					$this->invoice->profile->invoice_file = $this->invoice_file;
			
					$this->invoice->save();
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