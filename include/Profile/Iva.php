<?php
    class Profile_Iva extends Profile
    {
        public function __construct($db, $iva_id = null)
        {
            parent::__construct($db, 'tbl_iva_profile');

            if ($iva_id > 0)	
                $this->setIvaId($iva_id);

        }

        public function setIvaId($iva_id)
        {
            $filters = array('iva_id' => (int) $iva_id);
            $this->_filters = $filters;
        }
    }
?>