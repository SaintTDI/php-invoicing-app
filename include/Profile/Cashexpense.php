<?php
    class Profile_Cashexpense extends Profile
    {
        public function __construct($db, $cash_id = null)
        {
            parent::__construct($db, 'tbl_cashexpense_profile');

            if ($cash_id > 0)	
                $this->setExpenseId($cash_id);

        }

        public function setExpenseId($cash_id)
        {
            $filters = array('cash_id' => (int) $cash_id);
            $this->_filters = $filters;
        }
    }
?>