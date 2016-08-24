<?php
    class DatabaseObject_Contact extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_contact', 'contact_id');
			
			$this->add('contact_id');
			$this->add('user_id');
            $this->add('email');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Contact($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setContactId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setContactId($this->getId());
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
		
          public function loadForUser($user_id, $contact_id)
        {
            $contact_id = (int) $contact_id;
            $user_id = (int) $user_id;

            if ($contact_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and contact_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $contact_id
            );

            return $this->_load($query);
        }
		
       public static function GetContactsCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllContacts($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_contact', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch contact data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Contacts objects
            $contacts = self::BuildMultiple($db, __CLASS__, $data);
            $contact_ids = array_keys($contacts);

            if (count($contact_ids) == 0)
                return array();

            // load the profile data for loaded contacts
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Contact',
                array('contact_id' => $contact_ids)
            );

            foreach ($contacts as $contact_id => $contact) {
                if (array_key_exists($contact_id, $profiles)
                        && $profiles[$contact_id] instanceof Profile_Contact) {

                    $contacts[$contact_id]->profile = $profiles[$contact_id];
                }
                else {
                    $contacts[$contact_id]->profile->setContactId($contact_id);
                }
            }

            return $contacts;
        }

        public static function GetContacts($db, $options = array())
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

            // fetch contact data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Contacts objects
            $contacts = self::BuildMultiple($db, __CLASS__, $data);
            $contact_ids = array_keys($contacts);

            if (count($contact_ids) == 0)
                return array();

            // load the profile data for loaded contacts
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Contact',
                array('contact_id' => $contact_ids)
            );

            foreach ($contacts as $contact_id => $contact) {
                if (array_key_exists($contact_id, $profiles)
                        && $profiles[$contact_id] instanceof Profile_Contact) {

                    $contacts[$contact_id]->profile = $profiles[$contact_id];
                }
                else {
                    $contacts[$contact_id]->profile->setContactId($contact_id);
                }
            }

            return $contacts;
        }

	     public function deleteContact($db, $id)
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
           		$where = $db->quoteInto('contact_id in (?)', $_ids);
            		$db->delete('tbl_contact', $where);	
			}
        }
		
	     public function deleteContactProfile($db, $id)
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
           		$where = $db->quoteInto('contact_id in (?)', $_ids);
            		$db->delete('tbl_contact_profile', $where);
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

            // create a query that selects from the contact table
            $select = $db->select();
            $select->from(array('p' => 'tbl_contact'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
    }
?>