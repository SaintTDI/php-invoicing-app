<?php
    class Profile_Contact extends Profile
    {
        public function __construct($db, $contact_id = null)
        {
            parent::__construct($db, 'tbl_contact_profile');

            if ($contact_id > 0)	
                $this->setContactId($contact_id);

        }

        public function setContactId($contact_id)
        {
            $filters = array('contact_id' => (int) $contact_id);
            $this->_filters = $filters;
        }
    }
?>