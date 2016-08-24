<?php
    class DatabaseObject_Expense extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_expense', 'expense_id');
			
			$this->add('expense_id');
            $this->add('user_id');
			$this->add('company_id');
			$this->add('expense_number');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Expense($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setExpenseId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setExpenseId($this->getId());
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
		
          public function loadForUser($user_id, $expense_id)
        {
            $expense_id = (int) $expense_id;
            $user_id = (int) $user_id;

            if ($expense_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and expense_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $expense_id
            );

            return $this->_load($query);
        }
		
          public function loadForUser2($user_id, $expense_id)
        {
            $user_id = (int) $user_id;

            if ($user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and doc_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $expense_id
            );

            return $this->_load($query);
        }
		
          public function GetExpensesDocId($db, $options = array())
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'max(expense_number)');

            return $db->fetchOne($select);
	   } 
		
       public static function GetExpensesCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllExpenses($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_expense', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch expense data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_expense objects
            $expenses = self::BuildMultiple($db, __CLASS__, $data);
            $expense_ids = array_keys($expenses);

            if (count($expense_ids) == 0)
                return array();

            // load the profile data for loaded expenses
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Expense',
                array('expense_id' => $expense_ids)
            );

            foreach ($expenses as $expense_id => $expense) {
                if (array_key_exists($expense_id, $profiles)
                        && $profiles[$expense_id] instanceof Profile_Expense) {

                    $expenses[$expense_id]->profile = $profiles[$expense_id];
                }
                else {
                    $expenses[$expense_id]->profile->setExpenseId($expense_id);
                }
            }

            return $expenses;
        }
		
       public static function GetExpensesId($db, $options = array())
        {
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0,
                'expense_number' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_expense', 'expense_id');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);
			$select->where('expense_number= ?', $options['expense_number']);

            // fetch expense data from database
            return $db->fetchOne($select);
        }

		public static function GetExpenses($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0,
                'expense_number' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_expense', '*');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);
			$select->where('expense_number = ?', $options['expense_number']);

            // fetch expense data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_expense objects
            $expenses = self::BuildMultiple($db, __CLASS__, $data);
            $expense_ids = array_keys($expenses);

            if (count($expense_ids) == 0)
                return array();

            // load the profile data for loaded expenses
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Expense',
                array('expense_id' => $expense_ids)
            );

            foreach ($expenses as $expense_id => $expense) {
                if (array_key_exists($expense_id, $profiles)
                        && $profiles[$expense_id] instanceof Profile_Expense) {

                    $expenses[$expense_id]->profile = $profiles[$expense_id];
                }
                else {
                    $expenses[$expense_id]->profile->setExpenseId($expense_id);
                }
            }

            return $expenses;
        }

	     public function deleteExpense($db, $id)
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
           		$where = $db->quoteInto('expense_id in (?)', $_ids);
            		$db->delete('tbl_expense', $where);	
			}
        }
		
	     public function deleteExpenseProfile($db, $id)
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
           		$where = $db->quoteInto('expense_id in (?)', $_ids);
            		$db->delete('tbl_expense_profile', $where);
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
                'expense_number' => ''
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            // create a query that selects from the expense table
            $select = $db->select();
            $select->from(array('p' => 'tbl_expense'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
	   	public function expenseExists($user_id, $expense_number)
        {
        		$user_id = (int) $user_id;
			$expense_number = (int) $expense_number;
				
            $query = sprintf(
                'select count(*) from %s where user_id = %d and expense_number = %d',
                $this->_table,
                $user_id,
                $expense_number
            );

            $result = $this->_db->fetchOne($query, $expense_number);

            return $result > 0;
        }
		
    }
?>