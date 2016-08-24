<?php
    class Profile_Client extends Profile
    {
        public function __construct($db, $client_id = null)
        {
            parent::__construct($db, 'tbl_client_profile');

            if ($client_id > 0)	
                $this->setClientId($client_id);

        }

        public function setClientId($client_id)
        {
            $filters = array('client_id' => (int) $client_id);
            $this->_filters = $filters;
        }
    }
?>