<?php
    class Profile_Invoice extends Profile
    {
        public function __construct($db, $invoice_id = null)
        {
            parent::__construct($db, 'tbl_invoice_profile');

            if ($invoice_id > 0)	
                $this->setInvoiceId($invoice_id);

        }

        public function setInvoiceId($invoice_id)
        {
            $filters = array('invoice_id' => (int) $invoice_id);
            $this->_filters = $filters;
        }
    }
?>