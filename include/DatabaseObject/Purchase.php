<?php
    class DatabaseObject_Purchase extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_purchase', 'purchase_id');
			
			$this->add('purchase_id');
            $this->add('user_id');
			$this->add('company_id');
			$this->add('purchase_number');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Purchase($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setPurchaseId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setPurchaseId($this->getId());
            $this->profile->save(false);
            return true;
        }
		
        protected function postUpdate()
        {
            $this->profile->save(false);
            return true;
        }
		
        protected function preDelete()
        {
            $this->profile->delete();
            return true;
        }
		
          public function loadForUser($user_id, $purchase_id)
        {
            $purchase_id = (int) $purchase_id;
            $user_id = (int) $user_id;

            if ($purchase_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and purchase_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $purchase_id
            );

            return $this->_load($query);
        }
		
          public function loadForUser2($user_id, $purchase_id)
        {
            $user_id = (int) $user_id;

            if ($user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and doc_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $purchase_id
            );

            return $this->_load($query);
        }
		
          public function GetPurchasesDocId($db, $options = array())
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'max(purchase_number)');

            return $db->fetchOne($select);
	   } 
		
       public static function GetPurchasesCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllPurchases($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_purchase', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch purchase data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_purchase objects
            $purchases = self::BuildMultiple($db, __CLASS__, $data);
            $purchase_ids = array_keys($purchases);

            if (count($purchase_ids) == 0)
                return array();

            // load the profile data for loaded purchases
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Purchase',
                array('purchase_id' => $purchase_ids)
            );

            foreach ($purchases as $purchase_id => $purchase) {
                if (array_key_exists($purchase_id, $profiles)
                        && $profiles[$purchase_id] instanceof Profile_Purchase) {

                    $purchases[$purchase_id]->profile = $profiles[$purchase_id];
                }
                else {
                    $purchases[$purchase_id]->profile->setPurchaseId($purchase_id);
                }
            }

            return $purchases;
        }
		
       public static function GetPurchasesId($db, $options = array())
        {
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0,
                'purchase_number' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_purchase', 'purchase_id');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);
			$select->where('purchase_number= ?', $options['purchase_number']);

            // fetch purchase data from database
            return $db->fetchOne($select);
        }

		public static function GetPurchases($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0,
                'purchase_number' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_purchase', '*');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);
			$select->where('purchase_number = ?', $options['purchase_number']);

            // fetch purchase data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_purchase objects
            $purchases = self::BuildMultiple($db, __CLASS__, $data);
            $purchase_ids = array_keys($purchases);

            if (count($purchase_ids) == 0)
                return array();

            // load the profile data for loaded purchases
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Purchase',
                array('purchase_id' => $purchase_ids)
            );

            foreach ($purchases as $purchase_id => $purchase) {
                if (array_key_exists($purchase_id, $profiles)
                        && $profiles[$purchase_id] instanceof Profile_Purchase) {

                    $purchases[$purchase_id]->profile = $profiles[$purchase_id];
                }
                else {
                    $purchases[$purchase_id]->profile->setPurchaseId($purchase_id);
                }
            }

            return $purchases;
        }

	     public function deletePurchase($db, $id)
        {
            	if (!is_array($id))
               $id = array($id);
			
            $_ids = array();
            foreach ($id as $ids) {
                $_ids[] = $ids;
            }
							
			if (count($_ids) == 0)
                return;
			
			if(!empty($_ids)){
           		$where = $db->quoteInto('purchase_id in (?)', $_ids);
            		$db->delete('tbl_purchase', $where);	
			}
        }
		
	     public function deletePurchaseProfile($db, $id)
        {
        	    if (!is_array($id))
                $id = array($id);
			
            $_ids = array();
            foreach ($id as $ids) {
                $_ids[] = $ids;
            }
							
			if (count($_ids) == 0)
                return;
			
			if(!empty($_ids)){
           		$where = $db->quoteInto('purchase_id in (?)', $_ids);
            		$db->delete('tbl_purchase_profile', $where);
			}
        }
		
 		public function temporaryUser() {
               $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
               $pass = array(); //remember to declare $pass as an array
               $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
               for ($i = 0; $i < 9; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
               }
               return implode($pass); //turn the array into a string
        }

        private static function _GetBaseQuery($db, $options)
        {
            // initialize the options
           $defaults = array(
				'user_id' => 0,
                'company_id' => 0,
                'purchase_number' => ''
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            // create a query that selects from the purchase table
            $select = $db->select();
            $select->from(array('p' => 'tbl_purchase'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
	   	public function purchaseExists($user_id, $purchase_number)
        {
        		$user_id = (int) $user_id;
			$purchase_number = (int) $purchase_number;
			
            $query = sprintf(
                'select count(*) from %s where user_id = %d and purchase_number = %d',
                $this->_table,
                $user_id,
                $purchase_number
            );

            $result = $this->_db->fetchOne($query, $purchase_number);

            return $result > 0;
        }
		
    }
?>