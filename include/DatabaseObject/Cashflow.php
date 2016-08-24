<?php
    class DatabaseObject_Cashflow extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_cashflow', 'cash_id');
			
			$this->add('cash_id');
            $this->add('user_id');
			$this->add('company_id');
			$this->add('invoice_number');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Cashflow($db);
        }
		
        protected function postLoad()
        {
            $this->profile->setInvoiceId($this->getId());
            $this->profile->load();
        }
		//Ok
        protected function postInsert()
        {
            $this->profile->setInvoiceId($this->getId());
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
		
          public function loadForUser($user_id, $cash_id)
        {
            $cash_id = (int) $cash_id;
            $user_id = (int) $user_id;

            if ($cash_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and cash_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $cash_id
            );

            return $this->_load($query);
        }
		
          public function loadForUser2($user_id, $cash_id)
        {
            $user_id = (int) $user_id;

            if ($user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and doc_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $cash_id
            );

            return $this->_load($query);
        }
		
          public function GetInvoicesDocId($db, $options = array())
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'max(invoice_number)');

            return $db->fetchOne($select);
	   } 
		
       public static function GetInvoicesCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		
        public static function GetAllInvoices($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_cashflow', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch invoice data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_cashflow objects
            $invoices = self::BuildMultiple($db, __CLASS__, $data);
            $cash_ids = array_keys($invoices);

            if (count($cash_ids) == 0)
                return array();

            // load the profile data for loaded invoices
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Cashflow',
                array('cash_id' => $cash_ids)
            );

            foreach ($invoices as $cash_id => $invoice) {
                if (array_key_exists($cash_id, $profiles)
                        && $profiles[$cash_id] instanceof Profile_Cashflow) {

                    $invoices[$cash_id]->profile = $profiles[$cash_id];
                }
                else {
                    $invoices[$cash_id]->profile->setInvoiceId($cash_id);
                }
            }

            return $invoices;
        }
		
       public static function GetInvoicesId($db, $options = array())
        {
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0,
                'invoice_number' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_cashflow', 'cash_id');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);
			$select->where('invoice_number= ?', $options['invoice_number']);

            // fetch invoice data from database
            return $db->fetchOne($select);
        }

		public static function GetInvoices($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_id' => 0,
                'company_id' => 0,
                'invoice_number' => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = $db->select();
			$select->from('tbl_cashflow', '*');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);
			$select->where('invoice_number = ?', $options['invoice_number']);

            // fetch invoice data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_invoice objects
            $cashes = self::BuildMultiple($db, __CLASS__, $data);
            $cash_ids = array_keys($cashes);

            if (count($cash_ids) == 0)
                return array();

            // load the profile data for loaded cashes
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Cashflow',
                array('cash_id' => $cash_ids)
            );

            foreach ($cashes as $cash_id => $invoice) {
                if (array_key_exists($cash_id, $profiles)
                        && $profiles[$cash_id] instanceof Profile_Cashflow) {

                    $cashes[$cash_id]->profile = $profiles[$cash_id];
                }
                else {
                    $cashes[$cash_id]->profile->setInvoiceId($cash_id);
                }
            }

            return $cashes;
        }

	     public function deleteInvoice($db, $id)
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
           		$where = $db->quoteInto('cash_id in (?)', $_ids);
            		$db->delete('tbl_cashflow', $where);	
			}
        }
		
	     public function deleteInvoiceProfile($db, $id)
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
           		$where = $db->quoteInto('cash_id in (?)', $_ids);
            		$db->delete('tbl_cashflow_profile', $where);
			}
        }
		
 		public function temporaryUser() {
               $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
               $pass = array(); //remember to declare $pass as an array
               $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
               for ($i = 0; $i < 9; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
               }
               return implode($pass); //turn the array into a string
        }

        private static function _GetBaseQuery($db, $options)
        {
            // initialize the options
           $defaults = array(
				'user_id' => 0,
                'company_id' => 0,
                'invoice_number' => ''
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            // create a query that selects from the cashflow table
            $select = $db->select();
            $select->from(array('p' => 'tbl_cashflow'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('p.user_id in (?)', $options['user_id']);

            return $select;
        }
		
	   	public function invoiceExists($user_id, $invoice_number, $start_letter)
        {
        		$user_id = (int) $user_id;
			$invoice_number = (int) $invoice_number;
			$start_letter = $start_letter;
							 
            $query = sprintf(
                'select count(*) from %s where user_id = %d and invoice_number = %d',
                $this->_table,
                $user_id,
                $invoice_number
            );

            $result = $this->_db->fetchOne($query);
			
			if ($result > 0){
            		$query2 = sprintf(
                		'select cash_id from %s where user_id = %d and invoice_number = %d',
                		$this->_table,
                		$user_id,
                		$invoice_number
            		);
			
            		$id_ = (int) $this->_db->fetchOne($query2);

            		$query3 = sprintf(
                		'select count(*) from tbl_cashflow_profile where cash_id = %d and profile_value = ?',
                		$id_
           		 );
				 
				 $result3 = $this->_db->fetchOne($query3, $start_letter);
			}
			else{
				$result3 = 0;
			}

            return $result3 > 0;
        }
		
    }
?>