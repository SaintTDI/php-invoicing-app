<?php
    class Profile_Product extends Profile
    {
        public function __construct($db, $product_id = null)
        {
            parent::__construct($db, 'tbl_product_profile');

            if ($product_id > 0)	
                $this->setProductId($product_id);

        }

        public function setProductId($product_id)
        {
            $filters = array('product_id' => (int) $product_id);
            $this->_filters = $filters;
        }
    }
?>