<?php
    class Profile_Cashflow extends Profile
    {
        public function __construct($db, $cash_id = null)
        {
            parent::__construct($db, 'tbl_cashflow_profile');

            if ($cash_id > 0)	
                $this->setInvoiceId($cash_id);

        }

        public function setInvoiceId($cash_id)
        {
            $filters = array('cash_id' => (int) $cash_id);
            $this->_filters = $filters;
        }
    }
?>