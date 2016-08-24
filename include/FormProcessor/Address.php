<?php
    class FormProcessor_Address extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $address = null;
		public $image = null;
		protected $_uploadedFile;

        public function __construct($db, $user_id, $address_id = 0)
        {
            parent::__construct();

            $this->db = $db;
			
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);

            $this->address = new DatabaseObject_Address($db);
            $this->address->loadForUser($this->user->getId(),
									 			$address_id);
			if ($this->address->isSaved()) {
			
			$this->doc_id = $this->address->doc_id;
			$this->doc_type = $this->address->doc_type;
            $this->type = $this->address->profile->type;
			$this->street = $this->address->profile->street;
            $this->house = $this->address->profile->house;
			$this->reference = $this->address->profile->reference;
			$this->province = $this->address->profile->province;
            $this->city = $this->address->profile->city;
			$this->state = $this->address->profile->state;
			$this->postal_code = $this->address->profile->postal_code;
            $this->country = $this->address->profile->country;
			$this->txtLat = $this->address->profile->txtLat;
			$this->txtLng = $this->address->profile->txtLng;

        }
			
		else
                $this->address->user_id = $this->user->getId();
        }

        public function process(Zend_Controller_Request_Abstract $request)
        {
        		$this->doc_id = $this->sanitize($request->getPost('doc_id'));
            $this->address->doc_id = $this->doc_id;
			
        		$this->doc_type = $this->sanitize($request->getPost('doc_type'));
            $this->address->doc_type = $this->doc_type;
      				
			$this->txtLat = $this->sanitize($request->getPost('txtLat'));
            $this->address->profile->txtLat = $this->txtLat;
			
			$this->txtLng = $this->sanitize($request->getPost('txtLng'));
            $this->address->profile->txtLng = $this->txtLng;
			
			$this->type = $this->sanitize($request->getPost('type'));
            $this->address->profile->type = $this->type;
			
			$this->reference = $this->sanitize($request->getPost('reference'));
            $this->address->profile->reference = $this->reference;
			
			$this->postal_code = $this->sanitize($request->getPost('postal_code'));
            $this->address->profile->postal_code = $this->postal_code;

			$this->province = $this->sanitize($request->getPost('province'));
            $this->address->profile->province = $this->province;
			
            $this->street = $this->sanitize($request->getPost('street'));
            if (strlen($this->street) == 0)
                $this->addError('street', 'Por favor especifica la calle o referencia m&aacute;s cercana');
            else
                $this->address->profile->street = $this->street;
			
			$this->house = $this->sanitize($request->getPost('house'));
            $this->address->profile->house = $this->house;
			
			$this->city = $this->sanitize($request->getPost('city'));
            $this->address->profile->city = $this->city;
			
			$this->state = $this->sanitize($request->getPost('state'));
            $this->address->profile->state = $this->state;

			$this->country = $this->sanitize($request->getPost('country'));
            $this->address->profile->country = $this->country;
       
			// if no errors have occurred, save the user
            if (!$this->hasError()) {


            $this->address->profile->type = $this->type;
			$this->address->profile->reference = $this->reference;
			$this->address->profile->postal_code = $this->postal_code;	
			$this->address->profile->street = $this->street;
			$this->address->profile->house = $this->house;
			$this->address->profile->province = $this->province;
			$this->address->profile->city = $this->city;
			$this->address->profile->state = $this->state;
			$this->address->profile->country = $this->country;
			$this->address->profile->txtLat = $this->txtLat;
			$this->address->profile->txtLng = $this->txtLng;
			$this->address->doc_id = $this->doc_id;
			$this->address->doc_type = $this->doc_type;
			
                $this->address->save();
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