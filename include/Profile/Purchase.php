<?php
    class Profile_Purchase extends Profile
    {
        public function __construct($db, $purchase_id = null)
        {
            parent::__construct($db, 'tbl_purchase_profile');

            if ($purchase_id > 0)	
                $this->setPurchaseId($purchase_id);

        }

        public function setPurchaseId($purchase_id)
        {
            $filters = array('purchase_id' => (int) $purchase_id);
            $this->_filters = $filters;
        }
    }
?>