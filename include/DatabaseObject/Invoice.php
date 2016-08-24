<?php
    class DatabaseObject_Invoice extends DatabaseObject
    {
    		public $images = array();
		protected $_uploadedFile;
        public $profile = null;
		
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_invoice', 'invoice_id');
			
			$this->add('invoice_id');
            $this->add('user_id');
			$this->add('company_id');
			$this->add('invoice_number');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);

            $this->profile = new Profile_Invoice($db);
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
		
          public function loadForUser($user_id, $invoice_id)
        {
            $invoice_id = (int) $invoice_id;
            $user_id = (int) $user_id;

            if ($invoice_id <= 0 || $user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and invoice_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $invoice_id
            );

            return $this->_load($query);
        }
		
          public function loadForUser2($user_id, $invoice_id)
        {
            $user_id = (int) $user_id;

            if ($user_id <= 0)
                return false;

            $query = sprintf(
                'select %s from %s where user_id = %d and doc_id = %d',
                join(', ', $this->getSelectFields()),
                $this->_table,
                $user_id,
                $invoice_id
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
			$select->from('tbl_invoice', '*');
			$select->where('user_id = ?', $options['user_id']);

            // fetch invoice data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_invoice objects
            $invoices = self::BuildMultiple($db, __CLASS__, $data);
            $invoice_ids = array_keys($invoices);

            if (count($invoice_ids) == 0)
                return array();

            // load the profile data for loaded invoices
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Invoice',
                array('invoice_id' => $invoice_ids)
            );

            foreach ($invoices as $invoice_id => $invoice) {
                if (array_key_exists($invoice_id, $profiles)
                        && $profiles[$invoice_id] instanceof Profile_Invoice) {

                    $invoices[$invoice_id]->profile = $profiles[$invoice_id];
                }
                else {
                    $invoices[$invoice_id]->profile->setInvoiceId($invoice_id);
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
			$select->from('tbl_invoice', 'invoice_id');
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
			$select->from('tbl_invoice', '*');
			$select->where('user_id = ?', $options['user_id']);
			$select->where('company_id = ?', $options['company_id']);
			$select->where('invoice_number = ?', $options['invoice_number']);

            // fetch invoice data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_invoice objects
            $invoices = self::BuildMultiple($db, __CLASS__, $data);
            $invoice_ids = array_keys($invoices);

            if (count($invoice_ids) == 0)
                return array();

            // load the profile data for loaded invoices
            $profiles = Profile::BuildMultiple(
                $db,
                'Profile_Invoice',
                array('invoice_id' => $invoice_ids)
            );

            foreach ($invoices as $invoice_id => $invoice) {
                if (array_key_exists($invoice_id, $profiles)
                        && $profiles[$invoice_id] instanceof Profile_Invoice) {

                    $invoices[$invoice_id]->profile = $profiles[$invoice_id];
                }
                else {
                    $invoices[$invoice_id]->profile->setInvoiceId($invoice_id);
                }
            }

            return $invoices;
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
           		$where = $db->quoteInto('invoice_id in (?)', $_ids);
            		$db->delete('tbl_invoice', $where);	
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
           		$where = $db->quoteInto('invoice_id in (?)', $_ids);
            		$db->delete('tbl_invoice_profile', $where);
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

            // create a query that selects from the invoice table
            $select = $db->select();
            $select->from(array('p' => 'tbl_invoice'), array());


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
                		'select invoice_id from %s where user_id = %d and invoice_number = %d',
                		$this->_table,
                		$user_id,
                		$invoice_number
            		);
			
            		$id_ = (int) $this->_db->fetchOne($query2);

            		$query3 = sprintf(
                		'select count(*) from tbl_invoice_profile where invoice_id = %d and profile_value = ?',
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