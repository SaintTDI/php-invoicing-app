<?php
    class DatabaseObject_Address extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_address', 'address_id');
			
			$this->add('address_id');
            $this->add('user_id');
			$this->add('doc_type');
			$this->add('doc_id');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Address($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setAddressId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setAddressId($this->getId());
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
		
          public function loadForUser($user_id, $address_id)
        {
            $address_id = (int) $address_id;
            $user_id = (int) $user_id;

            if ($address_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and address_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $address_id
            );

            return $this->_load($query);
        }
		
          public function loadForUser2($user_id, $address_id)
        {
            $user_id = (int) $user_id;

            if ($user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and doc_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $address_id
            );

            return $this->_load($query);
        }
		
       public static function GetAddressesCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
       public static function GetAddressesId($db, $options = array())
        {
            $defaults = array(
                'user_id' => 0,
                'doc_type' => '',
                'doc_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_address', 'address_id');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('doc_type = ?', $options['doc_type']);
			$select->where('doc_id = ?', $options['doc_id']);

            // fetch address data from database
            return $db->fetchOne($select);
        }
		
       public static function GetAddressesId2($db, $options = array())
        {
            $defaults = array(
                'user_id' => 0,
                'doc_type' => '',
                'doc_id' => array()
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }
			
		    $select = $db->select();
			$select->from(array('p' => 'tbl_address'), 'p.address_id');
			$select->where('p.user_id = ?', $options['user_id']);
			$select->where('p.doc_type = ?', $options['doc_type']);
			
			if (count($options['doc_id']) > 0) {
				$select->where('p.doc_id in (?)', $options['doc_id']);
			}
			
            // fetch address data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Address objects
            $addresses = self::BuildMultiple($db, __CLASS__, $data);
            $id = array_keys($addresses);

            if (count($id) == 0)
                return array();
			
			$_ids = array();
            foreach ($id as $ids) {
                $_ids[] = $ids;
            }
			return $_ids;
        }

		public static function GetAddresses($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0,
                'doc_type' => '',
                'doc_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_address', '*');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('doc_type = ?', $options['doc_type']);
			$select->where('doc_id = ?', $options['doc_id']);

            // fetch address data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Address objects
            $addresses = self::BuildMultiple($db, __CLASS__, $data);
            $address_ids = array_keys($addresses);

            if (count($address_ids) == 0)
                return array();

            // load the profile data for loaded addresses
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Address',
                array('address_id' => $address_ids)
            );

            foreach ($addresses as $address_id => $address) {
                if (array_key_exists($address_id, $profiles)
                        && $profiles[$address_id] instanceof Profile_Address) {

                    $addresses[$address_id]->profile = $profiles[$address_id];
                }
                else {
                    $addresses[$address_id]->profile->setAddressId($address_id);
                }
            }

            return $addresses;
        }

		public static function GetAllAddresses($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_address', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch address data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Address objects
            $addresses = self::BuildMultiple($db, __CLASS__, $data);
            $address_ids = array_keys($addresses);

            if (count($address_ids) == 0)
                return array();

            // load the profile data for loaded addresses
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Address',
                array('address_id' => $address_ids)
            );

            foreach ($addresses as $address_id => $address) {
                if (array_key_exists($address_id, $profiles)
                        && $profiles[$address_id] instanceof Profile_Address) {

                    $addresses[$address_id]->profile = $profiles[$address_id];
                }
                else {
                    $addresses[$address_id]->profile->setAddressId($address_id);
                }
            }

            return $addresses;
        }

	     public function deleteAddress($db, $id)
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
           		$where = $db->quoteInto('address_id in (?)', $_ids);
            		$db->delete('tbl_address', $where);	
			}
        }
		
	     public function deleteAddressProfile($db, $id)
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
           		$where = $db->quoteInto('address_id in (?)', $_ids);
            		$db->delete('tbl_address_profile', $where);
			}
        }
		
 		public static function temporaryUser() {
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
                'doc_type' => '',
                'doc_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            // create a query that selects from the address table
            $select = $db->select();
            $select->from(array('p' => 'tbl_address'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
    }
?>