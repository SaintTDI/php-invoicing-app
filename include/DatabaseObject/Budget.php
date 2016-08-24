<?php
    class DatabaseObject_Budget extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_budget', 'budget_id');
			
			$this->add('budget_id');
            $this->add('user_id');
			$this->add('company_id');
			$this->add('budget_number');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Budget($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setBudgetId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setBudgetId($this->getId());
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
		
          public function loadForUser($user_id, $budget_id)
        {
            $budget_id = (int) $budget_id;
            $user_id = (int) $user_id;

            if ($budget_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and budget_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $budget_id
            );

            return $this->_load($query);
        }
		
          public function loadForUser2($user_id, $budget_id)
        {
            $user_id = (int) $user_id;

            if ($user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and doc_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $budget_id
            );

            return $this->_load($query);
        }
		
          public function GetBudgetsDocId($db, $options = array())
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'max(budget_number)');

            return $db->fetchOne($select);
	   } 
		
       public static function GetBudgetsCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllBudgets($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_budget', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch budget data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_budget objects
            $budgets = self::BuildMultiple($db, __CLASS__, $data);
            $budget_ids = array_keys($budgets);

            if (count($budget_ids) == 0)
                return array();

            // load the profile data for loaded budgets
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Budget',
                array('budget_id' => $budget_ids)
            );

            foreach ($budgets as $budget_id => $budget) {
                if (array_key_exists($budget_id, $profiles)
                        && $profiles[$budget_id] instanceof Profile_Budget) {

                    $budgets[$budget_id]->profile = $profiles[$budget_id];
                }
                else {
                    $budgets[$budget_id]->profile->setBudgetId($budget_id);
                }
            }

            return $budgets;
        }
		
       public static function GetBudgetsId($db, $options = array())
        {
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0,
                'budget_number' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_budget', 'budget_id');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);
			$select->where('budget_number= ?', $options['budget_number']);

            // fetch budget data from database
            return $db->fetchOne($select);
        }

		public static function GetBudgets($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0,
                'budget_number' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_budget', '*');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);
			$select->where('budget_number = ?', $options['budget_number']);

            // fetch budget data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_budget objects
            $budgets = self::BuildMultiple($db, __CLASS__, $data);
            $budget_ids = array_keys($budgets);

            if (count($budget_ids) == 0)
                return array();

            // load the profile data for loaded budgets
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Budget',
                array('budget_id' => $budget_ids)
            );

            foreach ($budgets as $budget_id => $budget) {
                if (array_key_exists($budget_id, $profiles)
                        && $profiles[$budget_id] instanceof Profile_Budget) {

                    $budgets[$budget_id]->profile = $profiles[$budget_id];
                }
                else {
                    $budgets[$budget_id]->profile->setBudgetId($budget_id);
                }
            }

            return $budgets;
        }

	     public function deleteBudget($db, $id)
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
           		$where = $db->quoteInto('budget_id in (?)', $_ids);
            		$db->delete('tbl_budget', $where);	
			}
        }
		
	     public function deleteBudgetProfile($db, $id)
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
           		$where = $db->quoteInto('budget_id in (?)', $_ids);
            		$db->delete('tbl_budget_profile', $where);
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
                'budget_number' => ''
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            // create a query that selects from the budget table
            $select = $db->select();
            $select->from(array('p' => 'tbl_budget'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
	   	public function budgetExists($user_id, $budget_number)
        {
        		$user_id = (int) $user_id;
			$budget_number = (int) $budget_number;
			
            $query = sprintf(
                'select count(*) from %s where user_id = %d and budget_number = %d',
                $this->_table,
                $user_id,
                $budget_number
            );

            $result = $this->_db->fetchOne($query, $budget_number);

            return $result > 0;
        }
		
    }
?>