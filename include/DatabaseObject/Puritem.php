<?php
    class DatabaseObject_Puritem extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_puritem', 'item_id');
			
			$this->add('item_id');
            $this->add('user_id');
			$this->add('company_id');
			$this->add('document_type');
			$this->add('document_id');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Puritem($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setItemId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setItemId($this->getId());
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
		
          public function loadForUser($user_id, $item_id)
        {
            $item_id = (int) $item_id;
            $user_id = (int) $user_id;

            if ($item_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and item_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $item_id
            );

            return $this->_load($query);
        }
		
          public function loadForUser2($user_id, $item_id)
        {
            $user_id = (int) $user_id;

            if ($user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and doc_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $item_id
            );

            return $this->_load($query);
        }
		
       public static function GetItemsCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllItems($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_puritem', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch item data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_item objects
            $items = self::BuildMultiple($db, __CLASS__, $data);
            $item_ids = array_keys($items);

            if (count($item_ids) == 0)
                return array();

            // load the profile data for loaded items
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Puritem',
                array('item_id' => $item_ids)
            );

            foreach ($items as $item_id => $item) {
                if (array_key_exists($item_id, $profiles)
                        && $profiles[$item_id] instanceof Profile_Puritem) {

                    $items[$item_id]->profile = $profiles[$item_id];
                }
                else {
                    $items[$item_id]->profile->setItemId($item_id);
                }
            }

            return $items;
        }

     public static function GetAllPurchaseItems($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0,
                'document_type' => 'purchase'
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_puritem', '*');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('document_type = ?', $options['document_type']);

            // fetch item data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_item objects
            $items = self::BuildMultiple($db, __CLASS__, $data);
            $item_ids = array_keys($items);

            if (count($item_ids) == 0)
                return array();

            // load the profile data for loaded items
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Puritem',
                array('item_id' => $item_ids)
            );

            foreach ($items as $item_id => $item) {
                if (array_key_exists($item_id, $profiles)
                        && $profiles[$item_id] instanceof Profile_Puritem) {

                    $items[$item_id]->profile = $profiles[$item_id];
                }
                else {
                    $items[$item_id]->profile->setItemId($item_id);
                }
            }

            return $items;
        }
		
       public static function GetItemsId($db, $options = array())
        {
            $defaults = array(
                'user_id' => 0,
                'document_type' => '',
                'document_id' => ''
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_puritem', 'item_id');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('document_type = ?', $options['document_type']);
			$select->where('document_id = ?', $options['document_id']);

            // fetch item data from database
            return $db->fetchOne($select);
        }

		public static function GetItems($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0,
                'document_type' => '',
                'document_id' => ''
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_puritem', '*');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('document_type = ?', $options['document_type']);
			$select->where('document_id = ?', $options['document_id']);

            // fetch item data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_item objects
            $items = self::BuildMultiple($db, __CLASS__, $data);
            $item_ids = array_keys($items);

            if (count($item_ids) == 0)
                return array();

            // load the profile data for loaded items
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Puritem',
                array('item_id' => $item_ids)
            );

            foreach ($items as $item_id => $item) {
                if (array_key_exists($item_id, $profiles)
                        && $profiles[$item_id] instanceof Profile_Puritem) {

                    $items[$item_id]->profile = $profiles[$item_id];
                }
                else {
                    $items[$item_id]->profile->setItemId($item_id);
                }
            }

            return $items;
        }

	     public function deleteItem($db, $id)
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
           		$where = $db->quoteInto('item_id in (?)', $_ids);
            		$db->delete('tbl_puritem', $where);	
			}
        }
		
	     public function deleteItemProfile($db, $id)
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
           		$where = $db->quoteInto('item_id in (?)', $_ids);
            		$db->delete('tbl_puritem_profile', $where);
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
                'item_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            // create a query that selects from the item table
            $select = $db->select();
            $select->from(array('p' => 'tbl_puritem'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
    }
?>