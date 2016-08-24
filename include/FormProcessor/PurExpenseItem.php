<?php
    class FormProcessor_PurExpenseItem extends FormProcessor
    {
        protected $db = null;
        public $user_id = null;
		public $item_id = null;
		public $item_id2 = null;
		public $doc_id = null;

        public function __construct($db, $user_id, $item_id = 0, $item_id2, $doc_id)
        {
            parent::__construct();

            $this->db = $db;
			$this->doc_id = $doc_id;
			
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());

            $this->item = new DatabaseObject_Expitem($db);
            $this->item->loadForUser($this->user->getId(), $item_id);
			
            $this->item2 = new DatabaseObject_Puritem($db);
            $this->item2->loadForUser($this->user->getId(), $item_id2);
																						
			if ($this->item->isSaved()) {
			
			$this->code = $this->item->profile->code;
			$this->detail = $this->item->profile->detail;
			$this->quantity = $this->item->profile->quantity;
			$this->unit_cost = $this->item->profile->unit_cost;
			$this->iva_p = $this->item->profile->iva_p;
			$this->iva_p2 = $this->item->profile->iva_p2;
			$this->iva_p2_name = $this->item->profile->iva_p2_name;
			$this->document_id = $this->item->document_id;
			$this->document_type = $this->item->document_type;
			$this->product_id = $this->item->profile->product_id;
			$this->currency = $this->item->profile->currency;
			$this->montototal = $this->item->profile->montototal;
			$this->iva_p_total = $this->item->profile->iva_p_total;
			$this->iva_p2_total = $this->item->profile->iva_p2_total;
			$this->subtotal = $this->item->profile->subtotal;
			
			$this->product_unit = $this->item->profile->product_unit;
        }
			
		else 
                $this->item->user_id = $this->user->getId();
				$this->item->company_id = $this->company->getId();
        }

        public function process(Zend_Controller_Request_Abstract $request)
        {
			
            $this->code =  $this->item2->profile->code;
            $this->item->profile->code = $this->code;
			
            $this->detail = $this->item2->profile->detail;
            $this->item->profile->detail = $this->detail;
			
            $this->quantity = $this->item2->profile->quantity;
            $this->item->profile->quantity = $this->quantity;
		
            $this->unit_cost = $this->item2->profile->unit_cost;
            $this->item->profile->unit_cost = $this->unit_cost;
			
			$this->iva_p = $this->item2->profile->iva_p;
			$this->item->profile->iva_p = $this->iva_p;

			$this->iva_p2 = $this->item2->profile->iva_p2;
            $this->item->profile->iva_p2 = $this->iva_p2;
			
			$this->iva_p2_name = $this->item2->profile->iva_p2_name;
            $this->item->profile->iva_p2_name = $this->iva_p2_name;	

			$this->document_id = $this->doc_id;
            $this->item->document_id = $this->document_id;	
			
			$this->document_type = 'expense';
            $this->item->document_type = $this->document_type;
			
			$this->product_id = $this->item2->profile->product_id;
            $this->item->profile->product_id = $this->product_id;
			
			$this->iva_p_total = $this->item2->profile->iva_p_total;
            $this->item->profile->iva_p_total = $this->iva_p_total;
			
			$this->iva_p2_total = $this->item2->profile->iva_p2_total;
            $this->item->profile->iva_p2_total = $this->iva_p2_total;

			$this->currency = $this->item2->profile->currency;
			$this->item->profile->currency = $this->currency;
			
			$this->montototal = $this->item2->profile->montototal;
			$this->item->profile->montototal = $this->montototal;
			
			$this->subtotal = $this->item2->profile->subtotal;
			$this->item->profile->subtotal = $this->subtotal;
			
			$this->product_unit = $this->item2->profile->product_unit;
            $this->item->profile->product_unit = $this->product_unit;
       
			// if no errors have occurred, save the user
            if (!$this->hasError()) {

			$this->item->profile->code = $this->code;
			$this->item->profile->detail = $this->detail;
			$this->item->profile->quantity = $this->quantity;
			$this->item->profile->unit_cost = $this->unit_cost;
			$this->item->profile->iva_p = $this->iva_p;
			$this->item->profile->iva_p2 = $this->iva_p2;
			$this->item->profile->iva_p2_name = $this->iva_p2_name;
			$this->item->document_id = $this->document_id;
			$this->item->document_type = $this->document_type;
			$this->item->profile->product_id = $this->product_id;
			$this->item->profile->currency = $this->currency;
			$this->item->profile->montototal = $this->montototal;
			$this->item->profile->iva_p_total = $this->iva_p_total;
			$this->item->profile->iva_p2_total = $this->iva_p2_total;
			$this->item->profile->subtotal = $this->subtotal;
			
			$this->item->profile->product_unit = $this->product_unit;
			
                $this->item->save();

            }

            // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>