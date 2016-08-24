<?php
    class DatabaseObject_Cashaccount extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_cashaccount', 'cash_id');
			
			$this->add('cash_id');
            $this->add('user_id');
			$this->add('company_id');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Cashaccount($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setAccountId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setAccountId($this->getId());
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
		
          public function loadForUser($user_id, $cash_id)
        {
            $user_id = (int) $user_id;
			$cash_id = (int) $cash_id;

            if ($cash_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and cash_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $cash_id
            );

            return $this->_load($query);
        }
		
          public function loadForUser2($user_id, $cash_id)
        {
            $user_id = (int) $user_id;

            if ($user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and cash_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $cash_id
            );

            return $this->_load($query);
        }
		
       public static function GetAccountsCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllAccounts($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_cashaccount', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch Account data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_cashaccount objects
            $accounts = self::BuildMultiple($db, __CLASS__, $data);
            $cash_ids = array_keys($accounts);

            if (count($cash_ids) == 0)
                return array();

            // load the profile data for loaded accounts
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Cashaccount',
                array('cash_id' => $cash_ids)
            );

            foreach ($accounts as $cash_id => $account) {
                if (array_key_exists($cash_id, $profiles)
                        && $profiles[$cash_id] instanceof Profile_Cashaccount) {

                    $accounts[$cash_id]->profile = $profiles[$cash_id];
                }
                else {
                    $accounts[$cash_id]->profile->setAccountId($cash_id);
                }
            }

            return $accounts;
        }
		
       public static function GetAccountsId($db, $options = array())
        {
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_cashaccount', 'cash_id');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);

            // fetch account data from database
            return $db->fetchOne($select);
        }

		public static function GetAccounts($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_cashaccount', '*');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);

            // fetch account data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_account objects
            $cashes = self::BuildMultiple($db, __CLASS__, $data);
            $cash_ids = array_keys($cashes);

            if (count($cash_ids) == 0)
                return array();

            // load the profile data for loaded cashes
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Cashaccount',
                array('cash_id' => $cash_ids)
            );

            foreach ($cashes as $cash_id => $account) {
                if (array_key_exists($cash_id, $profiles)
                        && $profiles[$cash_id] instanceof Profile_Cashaccount) {

                    $cashes[$cash_id]->profile = $profiles[$cash_id];
                }
                else {
                    $cashes[$cash_id]->profile->setAccountId($cash_id);
                }
            }

            return $cashes;
        }

	     public function deleteAccount($db, $id)
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
           		$where = $db->quoteInto('cash_id in (?)', $_ids);
            		$db->delete('tbl_cashaccount', $where);	
			}
        }
		
	     public function deleteAccountProfile($db, $id)
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
           		$where = $db->quoteInto('cash_id in (?)', $_ids);
            		$db->delete('tbl_cashaccount_profile', $where);
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
                'company_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            // create a query that selects from the cashaccount table
            $select = $db->select();
            $select->from(array('p' => 'tbl_cashaccount'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
    }
?>