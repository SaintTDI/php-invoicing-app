<?php
    class Profile_Budget extends Profile
    {
        public function __construct($db, $budget_id = null)
        {
            parent::__construct($db, 'tbl_budget_profile');

            if ($budget_id > 0)	
                $this->setBudgetId($budget_id);

        }

        public function setBudgetId($budget_id)
        {
            $filters = array('budget_id' => (int) $budget_id);
            $this->_filters = $filters;
        }
    }
?>