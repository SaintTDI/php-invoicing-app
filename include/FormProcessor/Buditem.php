<?php
    class FormProcessor_Buditem extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $item = null;
		public $image = null;
		protected $_uploadedFile;

        public function __construct($db, $user_id, $item_id = 0, $product_id = 0)
        {
            parent::__construct();

            $this->db = $db;
			
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());

            $this->item = new DatabaseObject_Buditem($db);
            $this->item->loadForUser($this->user->getId(),
									 			$item_id);
			$this->item_id = $item_id;
												
            $this->product = new DatabaseObject_Product($db);
            $this->product->loadForUser($this->user->getId(),
									 			$product_id);
												
			if ($this->item->isSaved()) {
			
			$this->code = $this->item->profile->code;
			$this->detail = $this->item->profile->detail;
			$this->quantity = $this->item->profile->quantity;
			$this->unit_price = $this->item->profile->unit_price;
			$this->iva = $this->item->profile->iva;
			$this->iva2 = $this->item->profile->iva2;
			$this->iva2_name = $this->item->profile->iva2_name;
			$this->document_id = $this->item->document_id;
			$this->document_type = $this->item->document_type;
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
			
            $this->code = $this->sanitize($request->getPost('code'));
            if (strlen($this->code) == 0)
                $this->addError('code', 'Por favor as&iacute;gnale un c&oacute;digo al producto o servicio');
            else
                $this->item->profile->code = $this->code;
			
            $this->detail = $this->sanitize($request->getPost('detail'));
            if (strlen($this->detail) == 0)
                $this->addError('detail', 'Por favor especifica el producto o servicio');
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
		
            $punit_ = $this->sanitize($request->getPost('unit_price'));
		    $punit2_ = str_replace('.', '', $punit_);
			$this->unit_price = str_replace(',', '.', $punit2_);
			//$this->unit_price = $punit2_;
            if (strlen($this->unit_price) == 0)
                $this->addError('unit_price', 'Por favor especifica el precio');
            else
            		$this->item->profile->unit_price = $this->unit_price;
			
			$piva_ = $this->sanitize($request->getPost('iva'));
		    $piva_2_ = str_replace('.', '', $piva_);
			$this->iva = str_replace(',', '.', $piva_2_);
			//$this->iva = $piva_2_;
            if (strlen($this->iva) == 0)
                $this->addError('iva', 'Por favor especifica el IVA de venta');
            else
				$this->item->profile->iva = $this->iva;

			$piva2_ = $this->sanitize($request->getPost('iva2'));
		    $piva2_2_ = str_replace('.', '', $piva2_);
			$this->iva2 = str_replace(',', '.', $piva2_2_);
			//$this->iva2 = $piva2_2_;
            $this->item->profile->iva2 = $this->iva2;
			
			$this->iva2_name = $this->sanitize($request->getPost('iva2_name'));
            $this->item->profile->iva2_name = $this->iva2_name;	

			$this->document_id = $this->sanitize($request->getPost('document_id'));
            $this->item->document_id = $this->document_id;	
			
			$this->document_type = $this->sanitize($request->getPost('document_type'));
            $this->item->document_type = $this->document_type;
			
			$this->product_id = $this->sanitize($request->getPost('product_id'));
            $this->item->profile->product_id = $this->product_id;
			
			$iva_ = $this->iva * 0.01  * $this->quantity * $this->unit_price;
            $this->iva_total	 = number_format((float)$iva_,2,'.','');
            $this->item->profile->iva_total = $this->iva_total;
			
			$iva2_ = $this->iva2 * 0.01  * $this->quantity * $this->unit_price;
            $this->iva2_total = number_format((float)$iva2_,2,'.','');
            $this->item->profile->iva2_total = $this->iva2_total;
			
			$this->currency = $this->sanitize($request->getPost('currency'));
			
			if ($this->currency){
            		$this->item->profile->currency = $this->currency;
			}
			else {
				$this->item->profile->currency = $this->company->profile->currency;
			}
			
			$this->product_unit = $this->sanitize($request->getPost('product_unit'));
            $this->item->profile->product_unit = $this->product_unit;
			
			$mont__ = $this->quantity * $this->unit_price;
			$montotot = $iva_ + $iva2_ + $mont__;
            $this->montototal = number_format((float)$montotot,2,'.','');
            $this->item->profile->montototal = $this->montototal;
			
			$sub__ = $this->quantity * $this->unit_price;
            $this->subtotal = number_format((float)$sub__,2,'.','');
            $this->item->profile->subtotal = $this->subtotal;
       
			// if no errors have occurred, save the user
            if (!$this->hasError()) {

			$this->item->profile->code = $this->code;
			$this->item->profile->detail = $this->detail;
			$this->item->profile->quantity = $this->quantity;
			$this->item->profile->unit_price = $this->unit_price;
			$this->item->profile->iva = $this->iva;
			$this->item->profile->iva2 = $this->iva2;
			$this->item->profile->iva2_name = $this->iva2_name;
			$this->item->document_id = $this->document_id;
			$this->item->document_type = $this->document_type;
			$this->item->profile->product_id = $this->product_id;
			$this->item->profile->currency = $this->currency;
			$this->item->profile->montototal = $this->montototal;
			$this->item->profile->iva_total = $this->iva_total;
			$this->item->profile->iva2_total = $this->iva2_total;
			$this->item->profile->subtotal = $this->subtotal;
			
			$this->item->profile->product_unit = $this->product_unit;
			
                $this->item->save();
				
			if (!$this->item_id) {
				if ($this->detail) {
					
				$this->product->user_id = $this->user->getId();
				$this->product->company = $this->company->getId();
				$this->product->profile->product_code = $this->code;
				$this->product->profile->product_name = $this->detail;
				$this->product->profile->product_currency = $this->currency;
            		$this->product->profile->unit_price = $this->unit_price;
				$this->product->profile->iva = $this->iva;
            		$this->product->profile->iva2 = $this->iva2;
				$this->product->profile->iva2_name = $this->iva2_name;
			
            		$this->product->save();
					
			  }
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