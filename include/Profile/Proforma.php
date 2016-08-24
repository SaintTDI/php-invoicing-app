<?php
    class Profile_Proforma extends Profile
    {
        public function __construct($db, $proforma_id = null)
        {
            parent::__construct($db, 'tbl_proforma_profile');

            if ($proforma_id > 0)	
                $this->setProformaId($proforma_id);

        }

        public function setProformaId($proforma_id)
        {
            $filters = array('proforma_id' => (int) $proforma_id);
            $this->_filters = $filters;
        }
    }
?>