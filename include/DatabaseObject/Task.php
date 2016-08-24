<?php
    class DatabaseObject_Task extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_task', 'task_id');
			
			$this->add('task_id');
            $this->add('user_id');
			$this->add('company_id');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Task($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setTaskId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setTaskId($this->getId());
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
		
          public function loadForUser($user_id, $task_id)
        {
            $task_id = (int) $task_id;
            $user_id = (int) $user_id;

            if ($task_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and task_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $task_id
            );

            return $this->_load($query);
        }
		
          public function loadForUser2($user_id, $task_id)
        {
            $user_id = (int) $user_id;

            if ($user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and doc_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $task_id
            );

            return $this->_load($query);
        }
		
       public static function GetTasksCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllTasks($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_task', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch task data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_task objects
            $tasks = self::BuildMultiple($db, __CLASS__, $data);
            $task_ids = array_keys($tasks);

            if (count($task_ids) == 0)
                return array();

            // load the profile data for loaded tasks
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Task',
                array('task_id' => $task_ids)
            );

            foreach ($tasks as $task_id => $task) {
                if (array_key_exists($task_id, $profiles)
                        && $profiles[$task_id] instanceof Profile_Task) {

                    $tasks[$task_id]->profile = $profiles[$task_id];
                }
                else {
                    $tasks[$task_id]->profile->setTaskId($task_id);
                }
            }

            return $tasks;
        }
		
       public static function GetTasksId($db, $options = array())
        {
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_task', 'task_id');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);

            // fetch task data from database
            return $db->fetchOne($select);
        }

		public static function GetTasks($db, $options = array())
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
			$select->from('tbl_task', '*');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);

            // fetch task data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_task objects
            $tasks = self::BuildMultiple($db, __CLASS__, $data);
            $task_ids = array_keys($tasks);

            if (count($task_ids) == 0)
                return array();

            // load the profile data for loaded tasks
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Task',
                array('task_id' => $task_ids)
            );

            foreach ($tasks as $task_id => $task) {
                if (array_key_exists($task_id, $profiles)
                        && $profiles[$task_id] instanceof Profile_Task) {

                    $tasks[$task_id]->profile = $profiles[$task_id];
                }
                else {
                    $tasks[$task_id]->profile->setTaskId($task_id);
                }
            }

            return $tasks;
        }

	     public function deleteTask($db, $id)
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
           		$where = $db->quoteInto('task_id in (?)', $_ids);
            		$db->delete('tbl_task', $where);	
			}
        }
		
	     public function deleteTaskProfile($db, $id)
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
           		$where = $db->quoteInto('task_id in (?)', $_ids);
            		$db->delete('tbl_task_profile', $where);
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

            // create a query that selects from the task table
            $select = $db->select();
            $select->from(array('p' => 'tbl_task'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
    }
?>