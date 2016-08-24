<?php
    class FormProcessor_TimeInvoiceItem extends FormProcessor
    {
        protected $db = null;
        public $user_id = null;
		public $item_id = null;
		public $time_id = null;
		public $doc_id = null;

        public function __construct($db, $user_id, $item_id = 0, $time_id, $doc_id)
        {
            parent::__construct();

            $this->db = $db;
			$this->doc_id = $doc_id;
			
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());

            $this->item = new DatabaseObject_Item($db);
            $this->item->loadForUser($this->user->getId(), $item_id);
			
            $this->time = new DatabaseObject_Time($db);
            $this->time->loadForUser($this->user->getId(), $time_id);
																						
			if ($this->item->isSaved()) {
			
			$this->code = $this->item->profile->code;
			$this->detail = $this->item->profile->detail;
			$this->quantity = $this->item->profile->quantity;
			$this->unit_price = $this->item->profile->unit_price;
			$this->iva = $this->item->profile->iva;
			$this->iva2 = $this->item->profile->iva2;
			$this->document_id = $this->item->document_type;;
			$this->document_type = $this->item->document_type;;
			$this->product_id = $this->item->profile->product_id;
			$this->currency = $this->item->profile->currency;
			$this->montototal = $this->item->profile->montototal;
			$this->iva_total = $this->item->profile->iva_total;
			$this->iva2_total = $this->item->profile->iva2_total;
			$this->subtotal = $this->item->profile->subtotal;
			
			$this->product_unit = $this->item->profile->product_unit;
        }
			
		else 
                $this->item->user_id = $this->user->getId();
				$this->item->company_id = $this->company->getId();
        }

        public function process(Zend_Controller_Request_Abstract $request)
        {
        	
			if ($this->time->profile->notes){
				$this->a = $this->time->profile->notes . ', ' ;
			}
			
			if ($this->time->profile->task){
				$this->b = $this->time->profile->task . ', ' ;
			}
			
			if ($this->time->profile->project){
				$this->c = $this->time->profile->project . ', ' ;
			}
			
			$min_ = mt_rand(10,1000);
			$max_ = mt_rand(10000,1000000);
			$ram_ = mt_rand($min_,$max_);
			
            $this->code =  'HH-' . $ram_;
            $this->item->profile->code = $this->code;
			
            $this->detail = $this->a . $this->b . $this->c;
            $this->item->profile->detail = $this->detail;
			
            $this->quantity = $this->time->profile->time_2 / 3600000;
            $this->item->profile->quantity = $this->quantity;
		
			$rate_ = $this->time->profile->rate;
		    $rate_2_ = str_replace('.', '', $rate_);
			$this->unit_price = str_replace(',', '.', $rate_2_);
            $this->item->profile->unit_price = $this->unit_price;

			$this->document_id = $this->doc_id;
            $this->item->document_id = $this->document_id;	
			
			$this->document_type = 'invoice';
            $this->item->document_type = $this->document_type;
			
			$this->product_id = $this->time->profile->product_id;
            $this->item->profile->product_id = $this->product_id;

			if ($this->company->profile->iva){
				$iva_ = $this->company->profile->iva * 0.01  * $this->quantity * $this->unit_price;
				$this->iva_total = number_format((float)$iva_,2,'.','');
	            $this->item->profile->iva_total = $this->iva_total;
				
				$this->iva = $this->company->profile->iva;
				$this->item->profile->iva = $this->iva;
			}
			else{
				$iva_ = 0.00;
				$this->iva_total = number_format((float)$iva_,2,'.','');
	            $this->item->profile->iva_total = $this->iva_total;
			}
			
			if ($this->company->profile->iva2){
				$iva2_ = $this->company->profile->iva2 * 0.01  * $this->quantity * $this->unit_price;
				$this->iva2_total = number_format((float)$iva2_,2,'.','');
	            $this->item->profile->iva2_total = $this->iva2_total;
				
				$this->iva2 = $this->company->profile->iva2;
				$this->item->profile->iva2 = $this->iva2;
			}
			else{
				$iva2_ = 0.00;
				$this->iva2_total = number_format((float)$iva2_,2,'.','');
	            $this->item->profile->iva2_total = $this->iva2_total;
			}

			$this->currency = $this->company->profile->currency;
			$this->item->profile->currency = $this->currency;

			$mont__ = $this->quantity * $this->unit_price;
			$montotot = $iva_ + $iva2_ + $mont__;
			$this->montototal = number_format((float)$montotot,2,'.','');
            $this->item->profile->montototal = $this->montototal;
			
			$sub__ = $this->quantity * $this->unit_price;
			$this->subtotal = number_format((float)$sub__,2,'.','');
            $this->item->profile->subtotal = $this->subtotal;
			
			$this->product_unit = 'unidad';
            $this->item->profile->product_unit = $this->product_unit;
       
			// if no errors have occurred, save the user
            if (!$this->hasError()) {

			$this->item->profile->code = $this->code;
			$this->item->profile->detail = $this->detail;
			$this->item->profile->quantity = $this->quantity;
			$this->item->profile->unit_price = $this->unit_price;
			$this->item->profile->iva = $this->iva;
			if ($this->iva2){
			$this->item->profile->iva2 = $this->iva2;
			}
			$this->item->document_id = $this->document_id;
			$this->item->document_type = $this->document_type;
			$this->item->profile->product_id = $this->product_id;
			$this->item->profile->currency = $this->currency;
			$this->item->profile->montototal = $this->montototal;
			$this->item->profile->iva_total = $this->iva_total;
			if ($this->iva2_total){
				$this->item->profile->iva2_total = $this->iva2_total;
			}
			$this->item->profile->subtotal = $this->subtotal;
			
			$this->item->profile->product_unit = $this->product_unit;
			
            $this->item->save();

            }
			
			$this->time->profile->transformed = 'yes';
			$this->time->save();
			
			if ($this->doc_id){
            		$this->invoice = new DatabaseObject_Invoice($this->db);
            		$this->invoice->loadForUser($this->user->getId(), $this->doc_id);
				
				if (!$this->invoice->profile->invoice_project){
					if ($this->time->profile->project){
						$this->invoice->profile->invoice_project = $this->time->profile->project;
						$this->invoice->profile->project_id = $this->time->profile->project_id;
						
						$this->invoice->save();
					}
				}
			}

            // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>