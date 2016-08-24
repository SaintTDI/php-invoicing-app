<?php
    class DatabaseObject_Message extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_message', 'message_id');
			
			$this->add('message_id');
            $this->add('user_id');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Message($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setMessageId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setMessageId($this->getId());
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
		
          public function loadForUser($user_id, $message_id)
        {
            $message_id = (int) $message_id;
            $user_id = (int) $user_id;

            if ($message_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and message_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $message_id
            );

            return $this->_load($query);
        }
		
          public function loadForUser2($user_id, $message_id)
        {
            $user_id = (int) $user_id;

            if ($user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and doc_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $message_id
            );

            return $this->_load($query);
        }
		
       public static function GetMessagesCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllMessages($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_message', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch message data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_message objects
            $messages = self::BuildMultiple($db, __CLASS__, $data);
            $message_ids = array_keys($messages);

            if (count($message_ids) == 0)
                return array();

            // load the profile data for loaded messages
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Message',
                array('message_id' => $message_ids)
            );

            foreach ($messages as $message_id => $message) {
                if (array_key_exists($message_id, $profiles)
                        && $profiles[$message_id] instanceof Profile_Message) {

                    $messages[$message_id]->profile = $profiles[$message_id];
                }
                else {
                    $messages[$message_id]->profile->setMessageId($message_id);
                }
            }

            return $messages;
        }
		
       public static function GetMessagesId($db, $options = array())
        {
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_message', 'message_id');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);

            // fetch message data from database
            return $db->fetchOne($select);
        }

		public static function GetMessages($db, $options = array())
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
			$select->from('tbl_message', '*');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);

            // fetch message data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_message objects
            $messages = self::BuildMultiple($db, __CLASS__, $data);
            $message_ids = array_keys($messages);

            if (count($message_ids) == 0)
                return array();

            // load the profile data for loaded messages
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Message',
                array('message_id' => $message_ids)
            );

            foreach ($messages as $message_id => $message) {
                if (array_key_exists($message_id, $profiles)
                        && $profiles[$message_id] instanceof Profile_Message) {

                    $messages[$message_id]->profile = $profiles[$message_id];
                }
                else {
                    $messages[$message_id]->profile->setMessageId($message_id);
                }
            }

            return $messages;
        }

	     public function deleteMessage($db, $id)
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
           		$where = $db->quoteInto('message_id in (?)', $_ids);
            		$db->delete('tbl_message', $where);	
			}
        }
		
	     public function deleteMessageProfile($db, $id)
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
           		$where = $db->quoteInto('message_id in (?)', $_ids);
            		$db->delete('tbl_message_profile', $where);
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

            // create a query that selects from the message table
            $select = $db->select();
            $select->from(array('p' => 'tbl_message'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
    }
?>