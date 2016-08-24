<?php
    class DatabaseObject_Proforma extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_proforma', 'proforma_id');
			
			$this->add('proforma_id');
            $this->add('user_id');
			$this->add('company_id');
			$this->add('proforma_number');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Proforma($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setProformaId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setProformaId($this->getId());
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
		
          public function loadForUser($user_id, $proforma_id)
        {
            $proforma_id = (int) $proforma_id;
            $user_id = (int) $user_id;

            if ($proforma_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and proforma_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $proforma_id
            );

            return $this->_load($query);
        }
		
          public function loadForUser2($user_id, $proforma_id)
        {
            $user_id = (int) $user_id;

            if ($user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and doc_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $proforma_id
            );

            return $this->_load($query);
        }
		
          public function GetProformasDocId($db, $options = array())
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'max(proforma_number)');

            return $db->fetchOne($select);
	   } 
		
       public static function GetProformasCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllProformas($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_proforma', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch proforma data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_proforma objects
            $proformas = self::BuildMultiple($db, __CLASS__, $data);
            $proforma_ids = array_keys($proformas);

            if (count($proforma_ids) == 0)
                return array();

            // load the profile data for loaded proformas
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Proforma',
                array('proforma_id' => $proforma_ids)
            );

            foreach ($proformas as $proforma_id => $proforma) {
                if (array_key_exists($proforma_id, $profiles)
                        && $profiles[$proforma_id] instanceof Profile_Proforma) {

                    $proformas[$proforma_id]->profile = $profiles[$proforma_id];
                }
                else {
                    $proformas[$proforma_id]->profile->setProformaId($proforma_id);
                }
            }

            return $proformas;
        }
		
       public static function GetProformasId($db, $options = array())
        {
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0,
                'proforma_number' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_proforma', 'proforma_id');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);
			$select->where('proforma_number= ?', $options['proforma_number']);

            // fetch proforma data from database
            return $db->fetchOne($select);
        }

		public static function GetProformas($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0,
                'proforma_number' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_proforma', '*');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);
			$select->where('proforma_number = ?', $options['proforma_number']);

            // fetch proforma data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_proforma objects
            $proformas = self::BuildMultiple($db, __CLASS__, $data);
            $proforma_ids = array_keys($proformas);

            if (count($proforma_ids) == 0)
                return array();

            // load the profile data for loaded proformas
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Proforma',
                array('proforma_id' => $proforma_ids)
            );

            foreach ($proformas as $proforma_id => $proforma) {
                if (array_key_exists($proforma_id, $profiles)
                        && $profiles[$proforma_id] instanceof Profile_Proforma) {

                    $proformas[$proforma_id]->profile = $profiles[$proforma_id];
                }
                else {
                    $proformas[$proforma_id]->profile->setProformaId($proforma_id);
                }
            }

            return $proformas;
        }

	     public function deleteProforma($db, $id)
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
           		$where = $db->quoteInto('proforma_id in (?)', $_ids);
            		$db->delete('tbl_proforma', $where);	
			}
        }
		
	     public function deleteProformaProfile($db, $id)
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
           		$where = $db->quoteInto('proforma_id in (?)', $_ids);
            		$db->delete('tbl_proforma_profile', $where);
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
                'proforma_number' => ''
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            // create a query that selects from the proforma table
            $select = $db->select();
            $select->from(array('p' => 'tbl_proforma'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
	   	public function proformaExists($user_id, $proforma_number)
        {
        		$user_id = (int) $user_id;
			$proforma_number = (int) $proforma_number;
				
            $query = sprintf(
                'select count(*) from %s where user_id = %d and proforma_number = %d',
                $this->_table,
                $user_id,
                $proforma_number
            );

            $result = $this->_db->fetchOne($query, $proforma_number);

            return $result > 0;
        }
		
    }
?>