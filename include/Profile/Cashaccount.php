<?php
    class Profile_Cashaccount extends Profile
    {
        public function __construct($db, $cash_id = null)
        {
            parent::__construct($db, 'tbl_cashaccount_profile');

            if ($cash_id > 0)	
                $this->setAccountId($cash_id);

        }

        public function setAccountId($cash_id)
        {
            $filters = array('cash_id' => (int) $cash_id);
            $this->_filters = $filters;
        }
    }
?>