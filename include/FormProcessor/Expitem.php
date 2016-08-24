<?php
    class FormProcessor_Expitem extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $item = null;
		public $image = null;
		protected $_uploadedFile;

        public function __construct($db, $user_id, $item_id = 0)
        {
            parent::__construct();

            $this->db = $db;
			
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());

            $this->item = new DatabaseObject_Expitem($db);
            $this->item->loadForUser($this->user->getId(),
									 			$item_id);
			$this->item_id = $item_id;

												
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
			
            $this->code = $this->sanitize($request->getPost('code'));
           	$this->item->profile->code = $this->code;
			
            $this->detail = $this->sanitize($request->getPost('detail'));
            if (strlen($this->detail) == 0)
                $this->addError('detail', 'Por favor describe el producto o servicio');
            else
                $this->item->profile->detail = $this->detail;
			
            $pquantity_ = $this->sanitize($request->getPost('quantity'));
		    $pquantity2_ = str_replace('.', '', $pquantity_);
			$this->quantity = str_replace(',', '.', $pquantity2_);
			//$this->quantity = $pquantity2_;
            if (strlen($this->quantity) == 0)
                $this->addError('quantity', 'Por favor especifica la cantidad');
            else
            		$this->item->profile->quantity = $this->quantity;
		
            $punit_ = $this->sanitize($request->getPost('unit_cost'));
		    $punit2_ = str_replace('.', '', $punit_);
			$this->unit_cost = str_replace(',', '.', $punit2_);
			//$this->unit_cost = $punit2_;
            if (strlen($this->unit_cost) == 0)
                $this->addError('unit_cost', 'Por favor especifica el costo');
            else
            		$this->item->profile->unit_cost = $this->unit_cost;
			
			$piva_ = $this->sanitize($request->getPost('iva'));
		    $piva_2_ = str_replace('.', '', $piva_);
			$this->iva_p = str_replace(',', '.', $piva_2_);
			//$this->iva_p = $piva_2_;
            if (strlen($this->iva_p) == 0)
                $this->addError('iva', 'Por favor especifica el IVA de compra');
            else
				$this->item->profile->iva_p = $this->iva_p;

			$piva2_ = $this->sanitize($request->getPost('iva2'));
		    $piva2_2_ = str_replace('.', '', $piva2_);
			$this->iva_p2 = str_replace(',', '.', $piva2_2_);
			//$this->iva_p2 = $piva2_2_;
            $this->item->profile->iva_p2 = $this->iva_p2;
			
			$this->iva_p2_name = $this->sanitize($request->getPost('iva2_name'));
            $this->item->profile->iva_p2_name = $this->iva_p2_name;	

			$this->document_id = $this->sanitize($request->getPost('document_id'));
            $this->item->document_id = $this->document_id;	
			
			$this->document_type = $this->sanitize($request->getPost('document_type'));
            $this->item->document_type = $this->document_type;
			
			$this->product_id = $this->sanitize($request->getPost('product_id'));
            $this->item->profile->product_id = $this->product_id;
			
			$iva_ = $this->iva_p * 0.01  * $this->quantity * $this->unit_cost;
			$this->iva_p_total = number_format((float)$iva_,2,'.','');
            $this->item->profile->iva_p_total = $this->iva_p_total;
			
			$iva2_ = $this->iva_p2 * 0.01  * $this->quantity * $this->unit_cost;
			$this->iva_p2_total = number_format((float)$iva2_,2,'.','');
            $this->item->profile->iva_p2_total = $this->iva_p2_total;
			
			$this->currency = $this->sanitize($request->getPost('currency'));
			
			if ($this->currency){
            		$this->item->profile->currency = $this->currency;
			}
			else {
				$this->item->profile->currency = $this->company->profile->currency;
			}
			
			$this->product_unit = $this->sanitize($request->getPost('product_unit'));
            $this->item->profile->product_unit = $this->product_unit;
			
			$mont__ = $this->quantity * $this->unit_cost;
			$montotot = $iva_ + $iva2_ + $mont__;
            $this->montototal = number_format((float)$montotot,2,'.','');
            $this->item->profile->montototal = $this->montototal;
			
			$sub__ = $this->quantity * $this->unit_cost;
            $this->subtotal = number_format((float)$sub__,2,'.','');
            $this->item->profile->subtotal = $this->subtotal;
       
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