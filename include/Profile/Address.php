<?php
    class Profile_Address extends Profile
    {
        public function __construct($db, $address_id = null)
        {
            parent::__construct($db, 'tbl_address_profile');

            if ($address_id > 0)	
                $this->setAddressId($address_id);

        }

        public function setAddressId($address_id)
        {
            $filters = array('address_id' => (int) $address_id);
            $this->_filters = $filters;
        }
    }
?>