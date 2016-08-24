<?php
    class Profile_Time extends Profile
    {
        public function __construct($db, $time_id = null)
        {
            parent::__construct($db, 'tbl_time_profile');

            if ($time_id > 0)	
                $this->setTimeId($pask_id);

        }

        public function setTimeId($time_id)
        {
            $filters = array('time_id' => (int) $time_id);
            $this->_filters = $filters;
        }
    }
?>