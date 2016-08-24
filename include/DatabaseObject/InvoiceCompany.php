<?php
    class DatabaseObject_InvoiceCompany extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_invoice_company', 'company_id');
			
			$this->add('company_id');
            $this->add('user_id');
			$this->add('document_id');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_InvoiceCompany($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setCompanyId($this->getId());
            $this->profile->load();
        }
		//Ok
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
		
          public function loadForUser($user_id, $company_id)
        {
            $company_id = (int) $company_id;
            $user_id = (int) $user_id;

            if ($company_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and company_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $company_id
            );

            return $this->_load($query);
        }
		
       public static function GetCompaniesCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllCompanies($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_invoice_company', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch company data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Company objects
            $companies = self::BuildMultiple($db, __CLASS__, $data);
            $company_ids = array_keys($companies);

            if (count($company_ids) == 0)
                return array();

            // load the profile data for loaded companies
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_InvoiceCompany',
                array('company_id' => $company_ids)
            );

            foreach ($companies as $company_id => $company) {
                if (array_key_exists($company_id, $profiles)
                        && $profiles[$company_id] instanceof Profile_InvoiceCompany) {

                    $companies[$company_id]->profile = $profiles[$company_id];
                }
                else {
                    $companies[$company_id]->profile->setCompanyId($company_id);
                }
            }

            return $companies;
        }

        public static function GetCompanies($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0,
                'document_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_invoice_company', '*');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('document_id = ?', $options['document_id']);

            // fetch company data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_Company objects
            $companies = self::BuildMultiple($db, __CLASS__, $data);
            $company_ids = array_keys($companies);

            if (count($company_ids) == 0)
                return array();

            // load the profile data for loaded companies
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_InvoiceCompany',
                array('company_id' => $company_ids)
            );

            foreach ($companies as $company_id => $company) {
                if (array_key_exists($company_id, $profiles)
                        && $profiles[$company_id] instanceof Profile_InvoiceCompany) {

                    $companies[$company_id]->profile = $profiles[$company_id];
                }
                else {
                    $companies[$company_id]->profile->setCompanyId($company_id);
                }
            }

            return $companies;
        }

	     public function deleteCompany($db, $id)
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
           		$where = $db->quoteInto('company_id in (?)', $_ids);
            		$db->delete('tbl_invoice_company', $where);	
			}
        }
		
	     public function deleteCompanyProfile($db, $id)
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
           		$where = $db->quoteInto('company_id in (?)', $_ids);
            		$db->delete('tbl_invoice_company_profile', $where);
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

            // create a query that selects from the company table
            $select = $db->select();
            $select->from(array('p' => 'tbl_invoice_company'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
    }
?>