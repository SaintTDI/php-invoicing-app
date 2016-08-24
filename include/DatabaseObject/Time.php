<?php
    class DatabaseObject_Time extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_time', 'time_id');
			
			$this->add('time_id');
            $this->add('user_id');
			$this->add('company_id');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Time($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setTimeId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setTimeId($this->getId());
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
		
          public function loadForUser($user_id, $time_id)
        {
            $time_id = (int) $time_id;
            $user_id = (int) $user_id;

            if ($time_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and time_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $time_id
            );

            return $this->_load($query);
        }
		
          public function loadForUser2($user_id, $time_id)
        {
            $user_id = (int) $user_id;

            if ($user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and doc_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $time_id
            );

            return $this->_load($query);
        }
		
       public static function GetTimesCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllTimes($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_time', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch time data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Time objects
            $times = self::BuildMultiple($db, __CLASS__, $data);
            $time_ids = array_keys($times);

            if (count($time_ids) == 0)
                return array();

            // load the profile data for loaded times
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Time',
                array('time_id' => $time_ids)
            );

            foreach ($times as $time_id => $time) {
                if (array_key_exists($time_id, $profiles)
                        && $profiles[$time_id] instanceof Profile_Time) {

                    $times[$time_id]->profile = $profiles[$time_id];
                }
                else {
                    $times[$time_id]->profile->setTimeId($time_id);
                }
            }

            return $times;
        }
		
       public static function GetTimesId($db, $options = array())
        {
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_time', 'time_id');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);

            // fetch time data from database
            return $db->fetchOne($select);
        }

		public static function GetTimes($db, $options = array())
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
			$select->from('tbl_time', '*');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);

            // fetch time data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Time objects
            $times = self::BuildMultiple($db, __CLASS__, $data);
            $time_ids = array_keys($times);

            if (count($time_ids) == 0)
                return array();

            // load the profile data for loaded times
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Time',
                array('time_id' => $time_ids)
            );

            foreach ($times as $time_id => $time) {
                if (array_key_exists($time_id, $profiles)
                        && $profiles[$time_id] instanceof Profile_Time) {

                    $times[$time_id]->profile = $profiles[$time_id];
                }
                else {
                    $times[$time_id]->profile->setTimeId($time_id);
                }
            }

            return $times;
        }

	     public function deleteTime($db, $id)
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
           		$where = $db->quoteInto('time_id in (?)', $_ids);
            		$db->delete('tbl_time', $where);	
			}
        }
		
	     public function deleteTimeProfile($db, $id)
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
           		$where = $db->quoteInto('time_id in (?)', $_ids);
            		$db->delete('tbl_time_profile', $where);
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
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            // create a query that selects from the time table
            $select = $db->select();
            $select->from(array('p' => 'tbl_time'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
    }
?>