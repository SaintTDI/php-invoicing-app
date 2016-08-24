<?php
    class Profile_Ccompany extends Profile
    {
        public function __construct($db, $company_id = null)
        {
            parent::__construct($db, 'tbl_ccompany_profile');

            if ($company_id > 0)	
                $this->setCompanyId($company_id);
        }

        public function setCompanyId($company_id)
        {
            $filters = array('company_id' => (int) $company_id);
            $this->_filters = $filters;
        }
    }
?>