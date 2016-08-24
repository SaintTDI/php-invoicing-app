<?php
    class Finanzas_TesoreriaController extends CustomControllerAction
    {
    		protected $user = null;
			
        public function init()
        {
            parent::init();
            $this->breadcrumbs->addStep('Tesoreria', $this->getUrl(null, 'tesoreria'));
			
			$this->identity = Zend_Auth::getInstance()->getIdentity();
			
			if (!$this->identity)
                $this->_redirect($this->getUrl('../index/'));
        }
    	

       public function indexAction()
        {
			if ($this->identity->user_type == 'employee' && $this->identity->section9 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
        	
			//user company's details
			$comp__ = new DatabaseObject_Company($this->db);
            $comp__->loadForUser($this->identity->user_id);
			
			$default_iva = $comp__->profile->iva;
			$default_iva2 = $comp__->profile->iva2;
			$default_retention = $comp__->profile->retention;
			$default_expense_number = $comp__->profile->expense_number;
			$default_number_start = $comp__->profile->number_start;
			$default_consecutive = $comp__->profile->consecutive;
			$default_number_zero = $comp__->profile->number_zero;
			$default_number_start_letter = $comp__->profile->number_start_letter;
			$default_currency = $comp__->profile->currency;
			$default_recc = $comp__->profile->recc;
			$default_year_start = $comp__->profile->year_start;

			$this->view->default_iva = $default_iva;
			$this->view->default_iva2 = $default_iva2;
			$this->view->default_retention = $default_retention;
			$this->view->default_expense_number = $default_expense_number;
			$this->view->default_number_start = $default_number_start;
			$this->view->default_number_zero = $default_number_zero;
			$this->view->default_consecutive = $default_consecutive;
			$this->view->default_number_start_letter = $default_number_start_letter;
			$this->view->default_currency = $default_currency;
			$this->view->default_recc = $default_recc;
			$this->view->default_year_start = $default_year_start;
        	
            $options = array(
                'user_id' => $this->identity->user_id
            );
			
			$allaccounts = DatabaseObject_Cashaccount::GetAllAccounts($this->db, $options);
			
			$this->view->allaccounts = $allaccounts;
			
            $expenses = DatabaseObject_Expense::GetAllExpenses($this->db, $options);
			
			$this->view->expenses = $expenses;

            $invoices = DatabaseObject_Invoice::GetAllInvoices($this->db, $options);

			$this->view->invoices = $invoices;
			
			///data and information for expenses
		    $options = array(
                'user_id' => $this->identity->user_id,
                'document_type' => 'expense'
            );
			
            $itemslist_e = DatabaseObject_Expitem::GetAllExpenseItems($this->db, $options);
			
			$this->view->itemslist_e = $itemslist_e;
			
			
			///data and information for INCOMMING/Invoices
		    $options = array(
                'user_id' => $this->identity->user_id,
                'document_type' => 'invoice'
            );
			
            $itemslist_i = DatabaseObject_Item::GetAllInvoiceItems($this->db, $options);
			
			$this->view->itemslist_i = $itemslist_i;

			
			$cash_amount_i = 0;
			$cash_amount_e = 0;
			$cash_amount_z = 0;
			$check_amount_i = 0;
			$check_amount_e = 0;
			$check_amount_z = 0;
			$transfer_amount_i = 0;
			$transfer_amount_e = 0;
			$transfer_amount_z = 0;
			$credit_amount_i = 0;
			$credit_amount_e = 0;
			$credit_amount_z = 0;
			$iva_paid_i = 0;
			$iva_paid_e = 0;
			
			foreach ($expenses as $expense) {
				$expense_id_ = $expense->getId();
				$disc_i = $expense->profile->discount;
				$discount = (100 - $disc_i)/100;	
				$iva_paid = $expense->profile->iva_paid;
				
				$options_ = array(
					  'user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId(),
					  'expense_number' => $expense->getId()
					  );

				$cashes_e = DatabaseObject_Cashexpense::GetExpenses($this->db, $options_);
			
				foreach ($cashes_e as $cash) {
					if ($cash->profile->waypay == 'Efectivo'){
						$cash_amount_e = $cash_amount_e + $cash->profile->amountpay;
					}
					elseif ($cash->profile->waypay == 'Cheque'){
						$check_amount_e = $check_amount_e + $cash->profile->amountpay;
					}
					elseif ($cash->profile->waypay == 'Transferencia'){
						$transfer_amount_e = $transfer_amount_e + $cash->profile->amountpay;
					}
					else {
						$credit_amount_e = $credit_amount_e + $cash->profile->amountpay;
					}
				}
				
				foreach ($itemslist_e as $item) {
					if ($expense_id_ == $item->document_id){
								
						if (!$discount){
							$discount = 1;
						}
							
						$quan_pro = $item->profile->quantity;
						$price_pro = $item->profile->unit_price;
						$subtotal = $item->profile->subtotal;
						$iva__ = $item->profile->iva_p;
									
						$tot_pro_r_e = $subtotal * $discount;
						$tot_iva1 = $tot_pro_r_e * $iva__ * 0.01;
									
						if ($iva_paid){
							$iva_paid_e = $iva_paid_e + $tot_iva1;
						}
					}
				}
			}
			
			foreach ($invoices as $invoice) {
			
				$invoice_id_ = $invoice->getId();
				$disc_i = $invoice->profile->discount;
				$discount_ = (100 - $disc_i)/100;
				$iva_paid_ = $invoice->profile->iva_paid;
				
				$options_ = array(
					  'user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId(),
					  'invoice_number' => $invoice->getId()
					  );

				$cashes_i = DatabaseObject_Cashflow::GetInvoices($this->db, $options_);

				foreach ($cashes_i as $cash) {
					if ($cash->profile->waypay == 'Efectivo'){
						$cash_amount_i = $cash_amount_i + $cash->profile->amountpay;
					}
					elseif ($cash->profile->waypay == 'Cheque'){
						$check_amount_i = $check_amount_i + $cash->profile->amountpay;
					}
					elseif ($cash->profile->waypay == 'Transferencia'){
						$transfer_amount_i = $transfer_amount_i + $cash->profile->amountpay;
					}
					else {
						$credit_amount_i = $credit_amount_i + $cash->profile->amountpay;
					}
				}
				
				foreach ($itemslist_i as $item) {
					if ($invoice_id_ == $item->document_id){
								
						if (!$discount_){
							$discount_ = 1;
						}
							
						$quan_pro = $item->profile->quantity;
						$price_pro = $item->profile->unit_price;
						$subtotal_ = $item->profile->subtotal;
						$iva_ = $item->profile->iva;
									
						$tot_pro_r = $subtotal_ * $discount_;
						$tot_iva1_ = $tot_pro_r * $iva_ * 0.01;
									
						if ($iva_paid_){
							$iva_paid_i = $iva_paid_i + $tot_iva1_;
						}
					}
				}
			}
						
			
			foreach ($allaccounts as $cash) {
				if ($cash->profile->waypay == 'Efectivo'){
					$cash_amount_z = $cash_amount_z + $cash->profile->amountpay;
				}
				elseif ($cash->profile->waypay == 'Cheque'){
					$check_amount_z = $check_amount_z + $cash->profile->amountpay;
				}
				elseif ($cash->profile->waypay == 'Transferencia'){
					$transfer_amount_z = $transfer_amount_z + $cash->profile->amountpay;
				}
				elseif ($cash->profile->waypay == 'Nota de Crédito'){
					$credit_amount_z = $credit_amount_z + $cash->profile->amountpay;
				}
			}
			
            $options = array(
                'user_id' => $this->identity->user_id
            );
			
			$allivas = DatabaseObject_Iva::GetAllIvas($this->db, $options);
			
			$this->view->allivas = $allivas;
			
			$negative_iva  = 0;
			foreach ($allivas as $iva) {
				if ($iva->profile->amountpay < 0){
					$addit = abs($iva->profile->amountpay);
					$negative_iva = $negative_iva + $addit;
				}
			}
	
			
			$cash_amount = $cash_amount_i + $cash_amount_z - $cash_amount_e;
			$check_amount = $check_amount_i + $check_amount_z - $check_amount_e;
			$transfer_amount = $transfer_amount_i + $transfer_amount_z - $transfer_amount_e - ($iva_paid_i - $iva_paid_e)  - $negative_iva;;
			$credit_amount = $credit_amount_i + $credit_amount_z - $credit_amount_e;
			
			$account_amount = $check_amount + $transfer_amount;		
			
			$this->view->cash_amount = $cash_amount;
			$this->view->check_amount = $check_amount;
			$this->view->transfer_amount = $transfer_amount;
			$this->view->credit_amount = $credit_amount;
			$this->view->account_amount = $account_amount;

		}
		
   		public function agregarAction()
        {
			if ($this->identity->user_type == 'employee' && $this->identity->section9 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
	       	$request = $this->getRequest();
			$cash_id = (int) $this->getRequest()->getQuery('id');
			
			///fecha/date
			$now__ = date('d-m-Y');
			$this->view->now__ = $now__;
			///

			//user company's details
			$company = new DatabaseObject_Company($this->db);
            $company->loadForUser($this->identity->user_id);
			
			$this->view->company = $company;
			
			$default_currency = $company->profile->currency;
			
			$this->view->default_currency = $default_currency;
			
           	$account = new DatabaseObject_Cashaccount($this->db);
            $account->loadForUser($this->identity->user_id, $cash_id);
			
			$this->view->account = $account;
		
			$fp = new FormProcessor_CashIncome($this->db,
											$this->identity->user_id,
											$cash_id);
											 
			$this->view->fp = $fp;

			if ($request->getPost('add')) {
            	   if ($fp->process($request)) {
                 	//$account->save();
				    $this->_redirect($this->getUrl('editar','finanzas/tesoreria') . '?id=' . $fp->account->getId() . '&command=cerrar');
                }
            }
			
        }

    		public function editarAction()
        {
			if ($this->identity->user_type == 'employee' && $this->identity->section9 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
	       	$request = $this->getRequest();
			$cash_id = (int) $this->getRequest()->getQuery('id');
			
			$cashi = new DatabaseObject_Cashaccount($this->db);	
            if (!$cashi->loadForUser($this->identity->user_id, $cash_id))
                $this->_redirect($this->getUrl('agregar','finanzas/tesoreria'));
			
			//user company's details
			$company = new DatabaseObject_Company($this->db);
            $company->loadForUser($this->identity->user_id);
			
			$this->view->company = $company;
			
			$default_currency = $company->profile->currency;
			
			$this->view->default_currency = $default_currency;
			
            $account = new DatabaseObject_Cashaccount($this->db);
            $account->loadForUser($this->identity->user_id, $cash_id);
			
			$this->view->account = $account;

		
			$fp = new FormProcessor_CashIncome($this->db,
											$this->identity->user_id,
											$cash_id);
											 
			$this->view->fp = $fp;
			
			
			if ($request->getPost('editar')) {
            	   if ($fp->process($request)) {
                 	$account->save();
				    $this->_redirect($this->getUrl('editar','finanzas/tesoreria') . '?id=' . $fp->account->getId() . '&submitted=true');
                }
            }

			$prod =new DatabaseObject_Cashaccount($this->db);

			if ($request->getPost('delete')) {
			 	if ($cash_id) {
			 		$prod->deleteAccountProfile($this->db, $cash_id);
					$prod->deleteAccount($this->db, $cash_id);
					$fp3 = new FormProcessor_CashDeleteIncome($this->db,
											$this->identity->user_id,
											$cash_id);
					$this->view->fp3 = $fp3;
					if ($fp3->process($request)){
					}
				    	$this->_redirect($this->getUrl('editar','finanzas/tesoreria') . '?id=' . $fp->account->getId()  . '&submitted=true');
                	}			   
             }
			
        }
    }
?>