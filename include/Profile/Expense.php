<?php
    class Profile_Expense extends Profile
    {
        public function __construct($db, $expense_id = null)
        {
            parent::__construct($db, 'tbl_expense_profile');

            if ($expense_id > 0)	
                $this->setExpenseId($expense_id);

        }

        public function setExpenseId($expense_id)
        {
            $filters = array('expense_id' => (int) $expense_id);
            $this->_filters = $filters;
        }
    }
?>