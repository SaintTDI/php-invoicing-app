<?php
    class Profile_ExpItem extends Profile
    {
        public function __construct($db, $item_id = null)
        {
            parent::__construct($db, 'tbl_expitem_profile');

            if ($item_id > 0)	
                $this->setItemId($item_id);

        }

        public function setItemId($item_id)
        {
            $filters = array('item_id' => (int) $item_id);
            $this->_filters = $filters;
        }
    }
?>