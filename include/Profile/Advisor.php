<?php
    class Profile_Advisor extends Profile
    {
        public function __construct($db, $advisor_id = null)
        {
            parent::__construct($db, 'tbl_advisor_profile');

            if ($advisor_id > 0)	
                $this->setAdvisorId($advisor_id);

        }

        public function setAdvisorId($advisor_id)
        {
            $filters = array('advisor_id' => (int) $advisor_id);
            $this->_filters = $filters;
        }
    }
?>