<?php
    class DatabaseObject_Product extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_product', 'product_id');
			
			$this->add('product_id');
			$this->add('company');
            $this->add('user_id');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Product($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setProductId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setProductId($this->getId());
            $this->profile->save(false);
            return true;
        }
		
        protected function postUpdate()
        {
            $this->profile->save(false);
            return true;
        }
		
        protected function preDelete()
        {
            $this->profile->delete();
            return true;
        }
		
          public function loadForUser($user_id, $product_id)
        {
            $product_id = (int) $product_id;
            $user_id = (int) $user_id;

            if ($product_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and product_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $product_id
            );

            return $this->_load($query);
        }
		
       public static function GetProductsCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllProducts($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_product', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch product data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Product objects
            $products = self::BuildMultiple($db, __CLASS__, $data);
            $product_ids = array_keys($products);

            if (count($product_ids) == 0)
                return array();

            // load the profile data for loaded products
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Product',
                array('product_id' => $product_ids)
            );

            foreach ($products as $product_id => $product) {
                if (array_key_exists($product_id, $profiles)
                        && $profiles[$product_id] instanceof Profile_Product) {

                    $products[$product_id]->profile = $profiles[$product_id];
                }
                else {
                    $products[$product_id]->profile->setProductId($product_id);
                }
            }

            return $products;
        }

        public static function GetProducts($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'offset' => 0,
                'limit' => 0,
                'order' => 'p.ts_created'
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = self::_GetBaseQuery($db, $options);

            // set the fields to select
            $select->from(null, 'p.*');

            // set the offset, limit, and ordering of results
            if ($options['limit'] > 0)
                $select->limit($options['limit'], $options['offset']);

            $select->order($options['order']);

            // fetch product data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Product objects
            $products = self::BuildMultiple($db, __CLASS__, $data);
            $product_ids = array_keys($products);

            if (count($product_ids) == 0)
                return array();

            // load the profile data for loaded products
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Product',
                array('product_id' => $product_ids)
            );

            foreach ($products as $product_id => $product) {
                if (array_key_exists($product_id, $profiles)
                        && $profiles[$product_id] instanceof Profile_Product) {

                    $products[$product_id]->profile = $profiles[$product_id];
                }
                else {
                    $products[$product_id]->profile->setProductId($product_id);
                }
            }

            return $products;
        }

	     public function deleteProduct($db, $id)
        {
            	if (!is_array($id))
               $id = array($id);
			
            $_ids = array();
            foreach ($id as $ids) {
                $_ids[] = $ids;
            }
							
			if (count($_ids) == 0)
                return;
			
			if(!empty($_ids)){
           		$where = $db->quoteInto('product_id in (?)', $_ids);
            		$db->delete('tbl_product', $where);	
			}
        }
		
	     public function deleteProductProfile($db, $id)
        {
        	    if (!is_array($id))
                $id = array($id);
			
            $_ids = array();
            foreach ($id as $ids) {
                $_ids[] = $ids;
            }
							
			if (count($_ids) == 0)
                return;
			
			if(!empty($_ids)){
           		$where = $db->quoteInto('product_id in (?)', $_ids);
            		$db->delete('tbl_product_profile', $where);
			}
        }

        private static function _GetBaseQuery($db, $options)
        {
            // initialize the options
           $defaults = array(
                'user_id' => array()
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            // create a query that selects from the product table
            $select = $db->select();
            $select->from(array('p' => 'tbl_product'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
    }
?>