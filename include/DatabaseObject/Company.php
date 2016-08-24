<?php
    class DatabaseObject_Company extends DatabaseObject
    {
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_company', 'company_id');
			
			$this->add('company_id');
			$this->add('user_id');
            $this->add('thecompany');
            $this->add('commercial');
			$this->add('identification');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Company($db);
        }

		
        protected function postLoad()
        {
            $this->profile->setCompanyId($this->getId());
            $this->profile->load();
        }
		
        protected function postInsert()
        {
            $this->profile->setCompanyId($this->getId());
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
		
        public function loadForUser($user_id)
        {
            $user_id = (int) $user_id;

            if ($user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d ',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id
            );

            return $this->_load($query);
        }

		
        public function createAuthIdentity()
        {
			
            $identity = new stdClass;
            $identity->company_id = $this->getId();

			$identity->thecompany = $this->thecompany;
			$identity->commercial = $this->commercial;
            $identity->identification = $this->identification;
			
			$identity->speech = $this->profile->speech;
			$identity->email_c = $this->profile->email_c;
			$identity->email2 = $this->profile->email2;
			$identity->mobile = $this->profile->mobile;
			$identity->phone = $this->profile->phone;
			$identity->phone2 = $this->profile->phone2;
			$identity->fax = $this->profile->fax;
			$identity->year_start = $this->profile->year_start;
			$identity->iva = $this->profile->iva;
			$identity->iva2 = $this->profile->iva2;
			$identity->retention = $this->profile->retention;
			$identity->invoice_number = $this->profile->invoice_number;
			$identity->number_start = $this->profile->number_start;
			$identity->terms = $this->profile->terms;
			
			$identity->mobile_country = $this->profile->mobile_country;
			$identity->phone_country = $this->profile->phone_country;
			$identity->phone2_country = $this->profile->phone2_country;
			$identity->fax_country = $this->profile->fax_country;
			
			$identity->mobile_area = $this->profile->mobile_area;
			$identity->phone_area = $this->profile->phone_area;
			$identity->phone2_area = $this->profile->phone2_area;
			$identity->fax_area = $this->profile->fax_area;
			
			$identity->retention_q = $this->profile->retention_q;
			$identity->number_start_letter = $this->profile->number_start_letter;

			
            return $identity;
        }

        private static function _GetBaseQuery($db, $options)
        {
            // initialize the options
            $defaults = array('company_id' => array());

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            // create a query that selects from the company table
            $select = $db->select();
            $select->from(array('u' => 'tbl_company'), array());


            // filter results on specified user ids (if any)
            if (count($options['company_id']) > 0)
                $select->where('u.company_id in (?)', $options['company_id']);

            return $select;
        }
		
    }
?>