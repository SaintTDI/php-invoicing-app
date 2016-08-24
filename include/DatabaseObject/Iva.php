<?php
    class DatabaseObject_Iva extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_iva', 'iva_id');
			
			$this->add('iva_id');
            $this->add('user_id');
			$this->add('company_id');
			$this->add('invoice_ids');
			$this->add('expense_ids');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Iva($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setIvaId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setIvaId($this->getId());
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
		
          public function loadForUser($user_id, $iva_id)
        {
            $iva_id = (int) $iva_id;
            $user_id = (int) $user_id;

            if ($iva_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and iva_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $iva_id
            );

            return $this->_load($query);
        }
		
          public function loadForUser2($user_id, $iva_id)
        {
            $user_id = (int) $user_id;

            if ($user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and doc_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $iva_id
            );

            return $this->_load($query);
        }
		
          public function GetIvasDocId($db, $options = array())
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'max(invoice_ids)');

            return $db->fetchOne($select);
	   } 
		
       public static function GetIvasCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllIvas($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_iva', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch iva data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Iva objects
            $ivas = self::BuildMultiple($db, __CLASS__, $data);
            $iva_ids = array_keys($ivas);

            if (count($iva_ids) == 0)
                return array();

            // load the profile data for loaded ivas
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Iva',
                array('iva_id' => $iva_ids)
            );

            foreach ($ivas as $iva_id => $iva) {
                if (array_key_exists($iva_id, $profiles)
                        && $profiles[$iva_id] instanceof Profile_Iva) {

                    $ivas[$iva_id]->profile = $profiles[$iva_id];
                }
                else {
                    $ivas[$iva_id]->profile->setIvaId($iva_id);
                }
            }

            return $ivas;
        }
		
       public static function GetIvasId($db, $options = array())
        {
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0,
                'invoice_ids' => 0,
                'expense_ids' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_iva', 'iva_id');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);
			$select->where('invoice_ids = ?', $options['invoice_ids']);
			$select->where('expense_ids = ?', $options['expense_ids']);

            // fetch iva data from database
            return $db->fetchOne($select);
        }

		public static function GetIvas($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0,
                'invoice_ids' => 0,
                'expense_ids' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_iva', '*');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);
			$select->where('invoice_ids = ?', $options['invoice_ids']);
			$select->where('expense_ids = ?', $options['expense_ids']);

            // fetch iva data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Iva objects
            $ivas = self::BuildMultiple($db, __CLASS__, $data);
            $iva_ids = array_keys($ivas);

            if (count($iva_ids) == 0)
                return array();

            // load the profile data for loaded cashes
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Iva',
                array('iva_id' => $iva_ids)
            );

            foreach ($ivas as $iva_id => $iva) {
                if (array_key_exists($iva_id, $profiles)
                        && $profiles[$iva_id] instanceof Profile_Iva) {

                    $ivas[$iva_id]->profile = $profiles[$iva_id];
                }
                else {
                    $ivas[$iva_id]->profile->setIvaId($iva_id);
                }
            }

            return $ivas;
        }

	     public function deleteIva($db, $id)
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
           		$where = $db->quoteInto('iva_id in (?)', $_ids);
            		$db->delete('tbl_iva', $where);	
			}
        }
		
	     public function deleteIvaProfile($db, $id)
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
           		$where = $db->quoteInto('iva_id in (?)', $_ids);
            		$db->delete('tbl_iva_profile', $where);
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
                'invoice_ids' => 0,
                'expense_ids' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            // create a query that selects from the iva table
            $select = $db->select();
            $select->from(array('p' => 'tbl_iva'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
	   	public function ivaExists($user_id, $invoice_ids, $expense_ids)
        {
        		$user_id = (int) $user_id;
			$invoice_ids = $invoice_ids;
			$expense_ids = $invoice_ids;
							 
            $query = sprintf(
                'select count(*) from %s where user_id = %d and invoice_ids = %d and expense_ids = %d' ,
                $this->_table,
                $user_id,
                $invoice_ids,
                $expense_ids
            );

            $result = $this->_db->fetchOne($query);
			
			if ($result > 0){
            		$query2 = sprintf(
                		'select iva_id from %s where user_id = %d and invoice_ids = %d',
                		$this->_table,
                		$user_id,
                		$invoice_ids,
               	 	$expense_ids
            		);
			
            		$id_ = (int) $this->_db->fetchOne($query2);

            		$query3 = sprintf(
                		'select count(*) from tbl_iva_profile where iva_id = %d and profile_value = ?',
                		$id_
           		 );
				 
				 $result3 = $this->_db->fetchOne($query3);
			}
			else{
				$result3 = 0;
			}

            return $result3 > 0;
        }
		
    }
?>