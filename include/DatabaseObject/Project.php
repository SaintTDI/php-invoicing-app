<?php
    class DatabaseObject_Project extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_project', 'project_id');
			
			$this->add('project_id');
            $this->add('user_id');
			$this->add('project_title');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Project($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setProjectId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setProjectId($this->getId());
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
		
          public function loadForUser($user_id, $project_id)
        {
            $project_id = (int) $project_id;
            $user_id = (int) $user_id;

            if ($project_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and project_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $project_id
            );

            return $this->_load($query);
        }
		
          public function loadForUser2($user_id, $project_id)
        {
            $user_id = (int) $user_id;

            if ($user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and doc_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $project_id
            );

            return $this->_load($query);
        }
		
       public static function GetProjectsCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllProjects($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_project', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch project data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_project objects
            $projects = self::BuildMultiple($db, __CLASS__, $data);
            $project_ids = array_keys($projects);

            if (count($project_ids) == 0)
                return array();

            // load the profile data for loaded projects
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Project',
                array('project_id' => $project_ids)
            );

            foreach ($projects as $project_id => $project) {
                if (array_key_exists($project_id, $profiles)
                        && $profiles[$project_id] instanceof Profile_Project) {

                    $projects[$project_id]->profile = $profiles[$project_id];
                }
                else {
                    $projects[$project_id]->profile->setProjectId($project_id);
                }
            }

            return $projects;
        }
		
       public static function GetProjectsId($db, $options = array())
        {
            $defaults = array(
                'user_id' => 0,
                'project_title' => ''
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_project', 'project_id');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('project_title = ?', $options['project_title']);

            // fetch project data from database
            return $db->fetchOne($select);
        }

		public static function GetProjects($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0,
                'project_title' => ''
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_project', '*');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('project_title = ?', $options['project_title']);

            // fetch project data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_project objects
            $projects = self::BuildMultiple($db, __CLASS__, $data);
            $project_ids = array_keys($projects);

            if (count($project_ids) == 0)
                return array();

            // load the profile data for loaded projects
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Project',
                array('project_id' => $project_ids)
            );

            foreach ($projects as $project_id => $project) {
                if (array_key_exists($project_id, $profiles)
                        && $profiles[$project_id] instanceof Profile_Project) {

                    $projects[$project_id]->profile = $profiles[$project_id];
                }
                else {
                    $projects[$project_id]->profile->setProjectId($project_id);
                }
            }

            return $projects;
        }

	     public function deleteProject($db, $id)
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
           		$where = $db->quoteInto('project_id in (?)', $_ids);
            		$db->delete('tbl_project', $where);	
			}
        }
		
	     public function deleteProjectProfile($db, $id)
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
           		$where = $db->quoteInto('project_id in (?)', $_ids);
            		$db->delete('tbl_project_profile', $where);
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
                'project_title' => ''
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            // create a query that selects from the project table
            $select = $db->select();
            $select->from(array('p' => 'tbl_project'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
    }
?>