<?php
    class DatabaseObject_UserEmployee extends DatabaseObject
    {
		protected $_uploadedFile;
		 public $_newPassword = null;

        public $profile = null;

        public function __construct($db)
        {
            parent::__construct($db, 'tbl_user', 'user_id');

            $this->add('username');
            $this->add('password');
            $this->add('company');
			$this->add('user_type');
            $this->add('ts_created', time(), self::TYPE_TIMESTAMP);
            $this->add('ts_last_login', null, self::TYPE_TIMESTAMP);

            $this->profile = new Profile_User($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setUserId($this->getId());
            $this->profile->load();
        }
		
        protected function postInsert()
        {
            $this->profile->setUserId($this->getId());
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
	
        public function loadByUsername($username)
        {
            $username = trim($username);
            if (strlen($username) == 0)
                return false;

            $query = sprintf('select %s from %s where username = ?',
                             join(', ', $this->getSelectFields()),
                             $this->_table);

            $query = $this->_db->quoteInto($query, $username);

            return $this->_load($query);
        }
   
	
	 public static function GetUsers($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'offset' => 0,
                'limit'  => 0,
                'order'  => 'u.username'
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = self::_GetBaseQuery($db, $options);

            // set the fields to select
            $select->from(null, 'u.*');

            // set the offset, limit, and ordering of results
            if ($options['limit'] > 0)
                $select->limit($options['limit'], $options['offset']);

            $select->order($options['order']);

            // fetch user data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_User objects
            $users = parent::BuildMultiple($db, __CLASS__, $data);

            if (count($users) == 0)
                return $users;

            $user_ids = array_keys($users);

            // load the profile data for loaded posts
            $profiles = Profile::BuildMultiple($db,
                                               'Profile_User',
                                               array('user_id' => $user_ids));

            foreach ($users as $user_id => $user) {
                if (array_key_exists($user_id, $profiles)
                        && $profiles[$user_id] instanceof Profile_User) {

                    $users[$user_id]->profile = $profiles[$user_id];
                }
                else {
                    $users[$user_id]->profile->setUserId($user_id);
                }
            }

            return $users;
        }

	 	public static function GetUsers2($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_type' => 0,
                'company'  => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }
			
			if ($options['user_type'] == 'proprietary' or $options['user_type'] == 'association' or $options['user_type'] == 'advisor'){
	        		$select = $db->select();
				$select->from('tbl_user', '*');
				$select->where('company = ?', $options['company']);
			}

            // fetch user data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_User objects
            $users = parent::BuildMultiple($db, __CLASS__, $data);
			$user_ids = array_keys($users);
			
            if (count($users) == 0)
                return $users;

            // load the profile data for loaded posts
            $profiles = Profile::BuildMultiple($db,
                                               'Profile_User',
                                               array('user_id' => $user_ids));

            foreach ($users as $user_id => $user) {
                if (array_key_exists($user_id, $profiles)
                        && $profiles[$user_id] instanceof Profile_User) {

                    $users[$user_id]->profile = $profiles[$user_id];
                }
                else {
                    $users[$user_id]->profile->setUserId($user_id);
                }
            }

            return $users;
        }

	 	public static function GetUsers3($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_type' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }
			

	        $select = $db->select();
			$select->from('tbl_user', '*');
			$select->where('user_type = ?', $options['user_type']);


            // fetch user data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_User objects
            $users = parent::BuildMultiple($db, __CLASS__, $data);
			$user_ids = array_keys($users);
			
            if (count($users) == 0)
                return $users;

            // load the profile data for loaded posts
            $profiles = Profile::BuildMultiple($db,
                                               'Profile_User',
                                               array('user_id' => $user_ids));

            foreach ($users as $user_id => $user) {
                if (array_key_exists($user_id, $profiles)
                        && $profiles[$user_id] instanceof Profile_User) {

                    $users[$user_id]->profile = $profiles[$user_id];
                }
                else {
                    $users[$user_id]->profile->setUserId($user_id);
                }
            }

            return $users;
        }


 	public function usernameExists($username)
        {
            $query = sprintf('select count(*) from %s where username = ?',
                             $this->_table);

            $result = $this->_db->fetchOne($query, $username);

            return $result > 0;
        }
		
	    public function emailExists($email)
        {
			/*$validator2 = new UniqueEmail(
   			 array(  'table' => 'tbl_user_profile',
        				'field' => 'email'
    				)
				);
				
            return $validator2->isValid($username);*/
			$query2 = sprintf('select count(*) from tbl_user_profile where profile_value = ?',
                             $this->_table);

            $result2 = $this->_db->fetchOne($query2, $email);

            return $result2 > 0;
        }
		
        static public function IsValidUsername($username)
        {
            $validator = new Zend_Validate_Alnum();
            return $validator->isValid($username);
        }
		
        public function __set($name, $value)
        {
            switch ($name) {
                case 'password':
                    $value = md5($value);
                    break;
            }

            return parent::__set($name, $value);
        }

        public static function GetUsersCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
	     public function deleteUser($db, $id)
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
           		$where = $db->quoteInto('user_id in (?)', $_ids);
            		$db->delete('tbl_user', $where);	
			}
        }
		
	     public function deleteUserProfile($db, $id)
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
           		$where = $db->quoteInto('user_id in (?)', $_ids);
            		$db->delete('tbl_user_profile', $where);
			}
        }
	
        private static function _GetBaseQuery($db, $options)
        {
            // initialize the options
            $defaults = array('user_id' => array());

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            // create a query that selects from the users table
            $select = $db->select();
            $select->from(array('u' => 'tbl_user'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('u.user_id in (?)', $options['user_id']);

            return $select;
        }
    }
?>