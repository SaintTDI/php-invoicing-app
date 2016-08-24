<?php
    class DatabaseObject_Advisor extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_advisor', 'advisor_id');
			
			$this->add('advisor_id');
			$this->add('user_id');
            $this->add('email');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Advisor($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setAdvisorId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setAdvisorId($this->getId());
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
		
          public function loadForUser($user_id, $advisor_id)
        {
            $advisor_id = (int) $advisor_id;
            $user_id = (int) $user_id;

            if ($advisor_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and advisor_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $advisor_id
            );

            return $this->_load($query);
        }
		
       public static function GetAdvisorsCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllAdvisors($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_advisor', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch advisor data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Advisors objects
            $advisors = self::BuildMultiple($db, __CLASS__, $data);
            $advisor_ids = array_keys($advisors);

            if (count($advisor_ids) == 0)
                return array();

            // load the profile data for loaded advisors
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Advisor',
                array('advisor_id' => $advisor_ids)
            );

            foreach ($advisors as $advisor_id => $advisor) {
                if (array_key_exists($advisor_id, $profiles)
                        && $profiles[$advisor_id] instanceof Profile_Advisor) {

                    $advisors[$advisor_id]->profile = $profiles[$advisor_id];
                }
                else {
                    $advisors[$advisor_id]->profile->setAdvisorId($advisor_id);
                }
            }

            return $advisors;
        }

        public static function GetAdvisors($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'offset' => 0,
                'limit' => 0,
                'order' => 'p.ts_created'
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = self::_GetBaseQuery($db, $options);

            // set the fields to select
            $select->from(null, 'p.*');

            // set the offset, limit, and ordering of results
            if ($options['limit'] > 0)
                $select->limit($options['limit'], $options['offset']);

            $select->order($options['order']);

            // fetch advisor data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Advisors objects
            $advisors = self::BuildMultiple($db, __CLASS__, $data);
            $advisor_ids = array_keys($advisors);

            if (count($advisor_ids) == 0)
                return array();

            // load the profile data for loaded advisors
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Advisor',
                array('advisor_id' => $advisor_ids)
            );

            foreach ($advisors as $advisor_id => $advisor) {
                if (array_key_exists($advisor_id, $profiles)
                        && $profiles[$advisor_id] instanceof Profile_Advisor) {

                    $advisors[$advisor_id]->profile = $profiles[$advisor_id];
                }
                else {
                    $advisors[$advisor_id]->profile->setAdvisorId($advisor_id);
                }
            }

            return $advisors;
        }

	     public function deleteAdvisor($db, $id)
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
           		$where = $db->quoteInto('advisor_id in (?)', $_ids);
            		$db->delete('tbl_advisor', $where);	
			}
        }
		
	     public function deleteAdvisorProfile($db, $id)
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
           		$where = $db->quoteInto('advisor_id in (?)', $_ids);
            		$db->delete('tbl_advisor_profile', $where);
			}
        }

        private static function _GetBaseQuery($db, $options)
        {
            // initialize the options
           $defaults = array(
                'user_id' => array()
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            // create a query that selects from the advisor table
            $select = $db->select();
            $select->from(array('p' => 'tbl_advisor'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
    }
?>