<?php
    class DatabaseObject_Client extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_client', 'client_id');
			
			$this->add('client_id');
			$this->add('user_id');
            $this->add('email');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Client($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setClientId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setClientId($this->getId());
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
		
          public function loadForUser($user_id, $client_id)
        {
            $client_id = (int) $client_id;
            $user_id = (int) $user_id;

            if ($client_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and client_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $client_id
            );

            return $this->_load($query);
        }
		
       public static function GetClientsCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllClients($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_client', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch client data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Clients objects
            $clients = self::BuildMultiple($db, __CLASS__, $data);
            $client_ids = array_keys($clients);

            if (count($client_ids) == 0)
                return array();

            // load the profile data for loaded clients
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Client',
                array('client_id' => $client_ids)
            );

            foreach ($clients as $client_id => $client) {
                if (array_key_exists($client_id, $profiles)
                        && $profiles[$client_id] instanceof Profile_Client) {

                    $clients[$client_id]->profile = $profiles[$client_id];
                }
                else {
                    $clients[$client_id]->profile->setClientId($client_id);
                }
            }

            return $clients;
        }

        public static function GetClients($db, $options = array())
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

            // fetch client data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Clients objects
            $clients = self::BuildMultiple($db, __CLASS__, $data);
            $client_ids = array_keys($clients);

            if (count($client_ids) == 0)
                return array();

            // load the profile data for loaded clients
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Client',
                array('client_id' => $client_ids)
            );

            foreach ($clients as $client_id => $client) {
                if (array_key_exists($client_id, $profiles)
                        && $profiles[$client_id] instanceof Profile_Client) {

                    $clients[$client_id]->profile = $profiles[$client_id];
                }
                else {
                    $clients[$client_id]->profile->setClientId($client_id);
                }
            }

            return $clients;
        }

	     public function deleteClient($db, $id)
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
           		$where = $db->quoteInto('client_id in (?)', $_ids);
            		$db->delete('tbl_client', $where);	
			}
        }
		
	     public function deleteClientProfile($db, $id)
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
           		$where = $db->quoteInto('client_id in (?)', $_ids);
            		$db->delete('tbl_client_profile', $where);
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

            // create a query that selects from the client table
            $select = $db->select();
            $select->from(array('p' => 'tbl_client'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
    }
?>