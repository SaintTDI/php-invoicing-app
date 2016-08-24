<?php
    class DocumentosController extends CustomControllerAction
    {
    	
        public function init()
        {
            parent::init();
        }
  
  ////////invoice
             public function invoiceAction()
        {
           	$request = $this->getRequest();
			$invoice_id = (int) $this->getRequest()->getQuery('id');
			$user_id = (int) $this->getRequest()->getQuery('id2');
				
			//user company's details
			$company = new DatabaseObject_Company($this->db);
            $company->loadForUser($user_id);
			
			$this->view->company = $company;
			
            $options = array(
                'user_id'  => $user_id,
                'doc_type'   => 'company',
                'doc_id'   => $company->getId()
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			
            $invoice = new DatabaseObject_Invoice($this->db);
            $invoice->loadForUser($user_id, $invoice_id);
			
			$this->view->invoice = $invoice;
			
			if ($invoice->profile->invoice_valid){
				if ($invoice->profile->invoice_valid == 0.00){
					$valid_until = $invoice->profile->invoice_date;
				}
				else {
					$valid_until = date('d-m-Y', strtotime($invoice->profile->invoice_date. ' + ' . $invoice->profile->invoice_valid . 'days'));
				}
			}
			else {
				$valid_until = $invoice->profile->invoice_date;
			}
			
			$this->view->valid_until = $valid_until;
			
            $options = array(
                'user_id' => $user_id ,
                'document_id'   => $invoice_id
            );

            $client = DatabaseObject_InvoiceCompany::GetCompanies($this->db, $options);
			
			$this->view->client = $client;
			
			$totalIva = array(
			'iva_1' => 'I.V.A.',
			'iva_p_1' => 'I.V.A. %',
			'iva_2' => 'I.V.A.',
			'iva_p_2' => 'I.V.A. %',
			'iva_3' => 'I.V.A.',
			'iva_p_3' => 'I.V.A. %',	
			'iva_4' => 'I.V.A.',
			'iva_p_4' => 'I.V.A. %',	
			'iva_5' => 'I.V.A.',
			'iva_p_5' => 'I.V.A. %',	
			'iva_6' => 'I.V.A.',
			'iva_p_6' => 'I.V.A. %',
			'iva_7' => 'I.V.A.',
			'iva_p_7' => 'I.V.A. %',
			'iva_8' => 'I.V.A.',
			'iva_p_8' => 'I.V.A. %',
			'iva_9' => 'I.V.A.',
			'iva_p_9' => 'I.V.A. %',	
			'iva_10' => 'I.V.A.',
			'iva_p_10' => 'I.V.A. %',
			'iva2_1' => 'Otros Imp.',
			'iva2_p_1' => 'Otros Imp. %',
			'iva2_2' => 'Otros Imp.',
			'iva2_p_2' => 'Otros Imp. %',
			'iva2_3' => 'Otros Imp.',
			'iva2_p_3' => 'Otros Imp. %',	
			'iva2_4' => 'Otros Imp.',
			'iva2_p_4' => 'Otros Imp. %',	
			'iva2_5' => 'Otros Imp.',
			'iva2_p_5' => 'Otros Imp. %',	
			'iva2_6' => 'Otros Imp.',
			'iva2_p_6' => 'Otros Imp. %',
			'iva2_7' => 'Otros Imp.',
			'iva2_p_7' => 'Otros Imp. %',
			'iva2_8' => 'Otros Imp.',
			'iva2_p_8' => 'Otros Imp. %',
			'iva2_9' => 'Otros Imp.',
			'iva2_p_9' => 'Otros Imp. %',	
			'iva2_10' => 'Otros Imp.',
			'iva2_p_10' => 'Otros Imp. %'
		);
			
            $options = array(
                'user_id'  => $user_id,
                'document_type'   => 'invoice',
                'document_id'   => $invoice_id
            );

            $items = DatabaseObject_Item::GetItems($this->db, $options);
			$items2 = DatabaseObject_Item::GetItems($this->db, $options);
			$items3 = DatabaseObject_Item::GetItems($this->db, $options);

			$iva_o = array();
			$iva2_o = array();
			
            foreach ($items as $item) {
				$iva_o[] = $item->profile->iva;
			}
			
            foreach ($items as $item) {
				$iva2_o[] = $item->profile->iva2;
			}
			
			array_multisort($iva_o, SORT_DESC, $items2);
			array_multisort($iva2_o, SORT_DESC, $items3);
			
			$this->view->items = $items;
			$this->view->items2 = $items2;
			$this->view->items3 = $items3;
		
			
			$a = 0;
			$iva__ = 0;
			$ivas_ = array();
            foreach ($items2 as $item) {
            		if ($item->profile->iva != $iva__){
            			$a++;
            			$ivas_[$a] = $item->profile->iva_total;
					$iva__ = $item->profile->iva;
				}
				else {
					$ivas_[$a] = $ivas_[$a] + $item->profile->iva_total;	
				}
			}
			
			$this->view->ivas_ = $ivas_;
			
			$b = 0;
			$iva2__ = 0;
			$ivas2_ = array();
            foreach ($items3 as $item) {
            		if ($item->profile->iva2 != $iva2__){
            			$b++;
            			$ivas2_[$b] = $item->profile->iva2_total;
					$iva2__ = $item->profile->iva2;
				}
				else {
					$ivas2_[$b] = $ivas2_[$b] + $item->profile->iva2_total;	
				}
			}
			
			$this->view->ivas2_ = $ivas2_;
			
			
			if ($invoice->profile->items){
				if (!is_array($invoice->profile->items))
                		$invoice->profile->items = array($invoice->profile->items);
			
				foreach ($invoice->profile->items as $id){
            			$item_ = new DatabaseObject_Item($this->db);
            			$item_->loadForUser($user_id, $id);
					$items[] = $item_;
					
					$this->view->items = $items;
        			}
			}
		}		
  ///////
  
  ////////budget
             public function budgetAction()
        {
           	$request = $this->getRequest();
			$budget_id = (int) $this->getRequest()->getQuery('id');
			$user_id = (int) $this->getRequest()->getQuery('id2');
				
			//user company's details
			$company = new DatabaseObject_Company($this->db);
            $company->loadForUser($user_id);
			
			$this->view->company = $company;
			
            $options = array(
                'user_id'  => $user_id,
                'doc_type'   => 'company',
                'doc_id'   => $company->getId()
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			
            $budget = new DatabaseObject_Budget($this->db);
            $budget->loadForUser($user_id, $budget_id);
			
			$this->view->budget = $budget;
			
			if ($budget->profile->budget_valid){
				if ($budget->profile->budget_valid == 0.00){
					$valid_until = $budget->profile->budget_date;
				}
				else {
					$valid_until = date('d-m-Y', strtotime($budget->profile->budget_date. ' + ' . $budget->profile->budget_valid . 'days'));
				}
			}
			else {
				$valid_until = $budget->profile->budget_date;
			}
			
			$this->view->valid_until = $valid_until;
			
            $options = array(
                'user_id' => $user_id ,
                'document_id'   => $budget_id
            );

            $client = DatabaseObject_BudgetCompany::GetCompanies($this->db, $options);
			
			$this->view->client = $client;
			
			$totalIva = array(
			'iva_1' => 'I.V.A.',
			'iva_p_1' => 'I.V.A. %',
			'iva_2' => 'I.V.A.',
			'iva_p_2' => 'I.V.A. %',
			'iva_3' => 'I.V.A.',
			'iva_p_3' => 'I.V.A. %',	
			'iva_4' => 'I.V.A.',
			'iva_p_4' => 'I.V.A. %',	
			'iva_5' => 'I.V.A.',
			'iva_p_5' => 'I.V.A. %',	
			'iva_6' => 'I.V.A.',
			'iva_p_6' => 'I.V.A. %',
			'iva_7' => 'I.V.A.',
			'iva_p_7' => 'I.V.A. %',
			'iva_8' => 'I.V.A.',
			'iva_p_8' => 'I.V.A. %',
			'iva_9' => 'I.V.A.',
			'iva_p_9' => 'I.V.A. %',	
			'iva_10' => 'I.V.A.',
			'iva_p_10' => 'I.V.A. %',
			'iva2_1' => 'Otros Imp.',
			'iva2_p_1' => 'Otros Imp. %',
			'iva2_2' => 'Otros Imp.',
			'iva2_p_2' => 'Otros Imp. %',
			'iva2_3' => 'Otros Imp.',
			'iva2_p_3' => 'Otros Imp. %',	
			'iva2_4' => 'Otros Imp.',
			'iva2_p_4' => 'Otros Imp. %',	
			'iva2_5' => 'Otros Imp.',
			'iva2_p_5' => 'Otros Imp. %',	
			'iva2_6' => 'Otros Imp.',
			'iva2_p_6' => 'Otros Imp. %',
			'iva2_7' => 'Otros Imp.',
			'iva2_p_7' => 'Otros Imp. %',
			'iva2_8' => 'Otros Imp.',
			'iva2_p_8' => 'Otros Imp. %',
			'iva2_9' => 'Otros Imp.',
			'iva2_p_9' => 'Otros Imp. %',	
			'iva2_10' => 'Otros Imp.',
			'iva2_p_10' => 'Otros Imp. %'
		);
			
            $options = array(
                'user_id'  => $user_id,
                'document_type'   => 'budget',
                'document_id'   => $budget_id
            );

            $items = DatabaseObject_Buditem::GetItems($this->db, $options);
			$items2 = DatabaseObject_Buditem::GetItems($this->db, $options);
			$items3 = DatabaseObject_Buditem::GetItems($this->db, $options);

			$iva_o = array();
			$iva2_o = array();
			
            foreach ($items as $item) {
				$iva_o[] = $item->profile->iva;
			}
			
            foreach ($items as $item) {
				$iva2_o[] = $item->profile->iva2;
			}
			
			array_multisort($iva_o, SORT_DESC, $items2);
			array_multisort($iva2_o, SORT_DESC, $items3);
			
			$this->view->items = $items;
			$this->view->items2 = $items2;
			$this->view->items3 = $items3;
		
			
			$a = 0;
			$iva__ = 0;
			$ivas_ = array();
            foreach ($items2 as $item) {
            		if ($item->profile->iva != $iva__){
            			$a++;
            			$ivas_[$a] = $item->profile->iva_total;
					$iva__ = $item->profile->iva;
				}
				else {
					$ivas_[$a] = $ivas_[$a] + $item->profile->iva_total;	
				}
			}
			
			$this->view->ivas_ = $ivas_;
			
			$b = 0;
			$iva2__ = 0;
			$ivas2_ = array();
            foreach ($items3 as $item) {
            		if ($item->profile->iva2 != $iva2__){
            			$b++;
            			$ivas2_[$b] = $item->profile->iva2_total;
					$iva2__ = $item->profile->iva2;
				}
				else {
					$ivas2_[$b] = $ivas2_[$b] + $item->profile->iva2_total;	
				}
			}
			
			$this->view->ivas2_ = $ivas2_;
			
			
			if ($budget->profile->items){
				if (!is_array($budget->profile->items))
                		$budget->profile->items = array($budget->profile->items);
			
				foreach ($budget->profile->items as $id){
            			$item_ = new DatabaseObject_Item($this->db);
            			$item_->loadForUser($user_id, $id);
					$items[] = $item_;
					
					$this->view->items = $items;
        			}
			}
		}		
  ///////
  
  ////////proforma
             public function proformaAction()
        {
           	$request = $this->getRequest();
			$proforma_id = (int) $this->getRequest()->getQuery('id');
			$user_id = (int) $this->getRequest()->getQuery('id2');
				
			//user company's details
			$company = new DatabaseObject_Company($this->db);
            $company->loadForUser($user_id);
			
			$this->view->company = $company;
			
            $options = array(
                'user_id'  => $user_id,
                'doc_type'   => 'company',
                'doc_id'   => $company->getId()
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			
            $proforma = new DatabaseObject_Proforma($this->db);
            $proforma->loadForUser($user_id, $proforma_id);
			
			$this->view->proforma = $proforma;
			
			if ($proforma->profile->proforma_valid){
				if ($proforma->profile->proforma_valid == 0.00){
					$valid_until = $proforma->profile->proforma_date;
				}
				else {
					$valid_until = date('d-m-Y', strtotime($proforma->profile->proforma_date. ' + ' . $proforma->profile->proforma_valid . 'days'));
				}
			}
			else {
				$valid_until = $proforma->profile->proforma_date;
			}
			
			$this->view->valid_until = $valid_until;
			
            $options = array(
                'user_id' => $user_id ,
                'document_id'   => $proforma_id
            );

            $client = DatabaseObject_ProformaCompany::GetCompanies($this->db, $options);
			
			$this->view->client = $client;
			
			$totalIva = array(
			'iva_1' => 'I.V.A.',
			'iva_p_1' => 'I.V.A. %',
			'iva_2' => 'I.V.A.',
			'iva_p_2' => 'I.V.A. %',
			'iva_3' => 'I.V.A.',
			'iva_p_3' => 'I.V.A. %',	
			'iva_4' => 'I.V.A.',
			'iva_p_4' => 'I.V.A. %',	
			'iva_5' => 'I.V.A.',
			'iva_p_5' => 'I.V.A. %',	
			'iva_6' => 'I.V.A.',
			'iva_p_6' => 'I.V.A. %',
			'iva_7' => 'I.V.A.',
			'iva_p_7' => 'I.V.A. %',
			'iva_8' => 'I.V.A.',
			'iva_p_8' => 'I.V.A. %',
			'iva_9' => 'I.V.A.',
			'iva_p_9' => 'I.V.A. %',	
			'iva_10' => 'I.V.A.',
			'iva_p_10' => 'I.V.A. %',
			'iva2_1' => 'Otros Imp.',
			'iva2_p_1' => 'Otros Imp. %',
			'iva2_2' => 'Otros Imp.',
			'iva2_p_2' => 'Otros Imp. %',
			'iva2_3' => 'Otros Imp.',
			'iva2_p_3' => 'Otros Imp. %',	
			'iva2_4' => 'Otros Imp.',
			'iva2_p_4' => 'Otros Imp. %',	
			'iva2_5' => 'Otros Imp.',
			'iva2_p_5' => 'Otros Imp. %',	
			'iva2_6' => 'Otros Imp.',
			'iva2_p_6' => 'Otros Imp. %',
			'iva2_7' => 'Otros Imp.',
			'iva2_p_7' => 'Otros Imp. %',
			'iva2_8' => 'Otros Imp.',
			'iva2_p_8' => 'Otros Imp. %',
			'iva2_9' => 'Otros Imp.',
			'iva2_p_9' => 'Otros Imp. %',	
			'iva2_10' => 'Otros Imp.',
			'iva2_p_10' => 'Otros Imp. %'
		);
			
            $options = array(
                'user_id'  => $user_id,
                'document_type'   => 'proforma',
                'document_id'   => $proforma_id
            );

            $items = DatabaseObject_Proitem::GetItems($this->db, $options);
			$items2 = DatabaseObject_Proitem::GetItems($this->db, $options);
			$items3 = DatabaseObject_Proitem::GetItems($this->db, $options);

			$iva_o = array();
			$iva2_o = array();
			
            foreach ($items as $item) {
				$iva_o[] = $item->profile->iva;
			}
			
            foreach ($items as $item) {
				$iva2_o[] = $item->profile->iva2;
			}
			
			array_multisort($iva_o, SORT_DESC, $items2);
			array_multisort($iva2_o, SORT_DESC, $items3);
			
			$this->view->items = $items;
			$this->view->items2 = $items2;
			$this->view->items3 = $items3;
		
			
			$a = 0;
			$iva__ = 0;
			$ivas_ = array();
            foreach ($items2 as $item) {
            		if ($item->profile->iva != $iva__){
            			$a++;
            			$ivas_[$a] = $item->profile->iva_total;
					$iva__ = $item->profile->iva;
				}
				else {
					$ivas_[$a] = $ivas_[$a] + $item->profile->iva_total;	
				}
			}
			
			$this->view->ivas_ = $ivas_;
			
			$b = 0;
			$iva2__ = 0;
			$ivas2_ = array();
            foreach ($items3 as $item) {
            		if ($item->profile->iva2 != $iva2__){
            			$b++;
            			$ivas2_[$b] = $item->profile->iva2_total;
					$iva2__ = $item->profile->iva2;
				}
				else {
					$ivas2_[$b] = $ivas2_[$b] + $item->profile->iva2_total;	
				}
			}
			
			$this->view->ivas2_ = $ivas2_;
			
			
			if ($proforma->profile->items){
				if (!is_array($proforma->profile->items))
                		$proforma->profile->items = array($proforma->profile->items);
			
				foreach ($proforma->profile->items as $id){
            			$item_ = new DatabaseObject_Item($this->db);
            			$item_->loadForUser($user_id, $id);
					$items[] = $item_;
					
					$this->view->items = $items;
        			}
			}
		}		
  ///////
  
  ////////expense
             public function expenseAction()
        {
           	$request = $this->getRequest();
			$expense_id = (int) $this->getRequest()->getQuery('id');
			$user_id = (int) $this->getRequest()->getQuery('id2');
				
			//user company's details
			$company = new DatabaseObject_Company($this->db);
            $company->loadForUser($user_id);
			
			$this->view->company = $company;
			
            $options = array(
                'user_id'  => $user_id,
                'doc_type'   => 'company',
                'doc_id'   => $company->getId()
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			
            $expense = new DatabaseObject_Expense($this->db);
            $expense->loadForUser($user_id, $expense_id);
			
			$this->view->expense = $expense;
			
			if ($expense->profile->expense_valid){
				if ($expense->profile->expense_valid == 0.00){
					$valid_until = $expense->profile->expense_date;
				}
				else {
					$valid_until = date('d-m-Y', strtotime($expense->profile->expense_date. ' + ' . $expense->profile->expense_valid . 'days'));
				}
			}
			else {
				$valid_until = $expense->profile->expense_date;
			}
			
			$this->view->valid_until = $valid_until;
			
            $options = array(
                'user_id' => $user_id ,
                'document_id'   => $expense_id
            );

            $client = DatabaseObject_ExpenseCompany::GetCompanies($this->db, $options);
			
			$this->view->client = $client;
			
			$totalIva = array(
			'iva_1' => 'I.V.A.',
			'iva_p_1' => 'I.V.A. %',
			'iva_2' => 'I.V.A.',
			'iva_p_2' => 'I.V.A. %',
			'iva_3' => 'I.V.A.',
			'iva_p_3' => 'I.V.A. %',	
			'iva_4' => 'I.V.A.',
			'iva_p_4' => 'I.V.A. %',	
			'iva_5' => 'I.V.A.',
			'iva_p_5' => 'I.V.A. %',	
			'iva_6' => 'I.V.A.',
			'iva_p_6' => 'I.V.A. %',
			'iva_7' => 'I.V.A.',
			'iva_p_7' => 'I.V.A. %',
			'iva_8' => 'I.V.A.',
			'iva_p_8' => 'I.V.A. %',
			'iva_9' => 'I.V.A.',
			'iva_p_9' => 'I.V.A. %',	
			'iva_10' => 'I.V.A.',
			'iva_p_10' => 'I.V.A. %',
			'iva2_1' => 'Otros Imp.',
			'iva2_p_1' => 'Otros Imp. %',
			'iva2_2' => 'Otros Imp.',
			'iva2_p_2' => 'Otros Imp. %',
			'iva2_3' => 'Otros Imp.',
			'iva2_p_3' => 'Otros Imp. %',	
			'iva2_4' => 'Otros Imp.',
			'iva2_p_4' => 'Otros Imp. %',	
			'iva2_5' => 'Otros Imp.',
			'iva2_p_5' => 'Otros Imp. %',	
			'iva2_6' => 'Otros Imp.',
			'iva2_p_6' => 'Otros Imp. %',
			'iva2_7' => 'Otros Imp.',
			'iva2_p_7' => 'Otros Imp. %',
			'iva2_8' => 'Otros Imp.',
			'iva2_p_8' => 'Otros Imp. %',
			'iva2_9' => 'Otros Imp.',
			'iva2_p_9' => 'Otros Imp. %',	
			'iva2_10' => 'Otros Imp.',
			'iva2_p_10' => 'Otros Imp. %'
		);
			
            $options = array(
                'user_id'  => $user_id,
                'document_type'   => 'expense',
                'document_id'   => $expense_id
            );

            $items = DatabaseObject_Expitem::GetItems($this->db, $options);
			$items2 = DatabaseObject_Expitem::GetItems($this->db, $options);
			$items3 = DatabaseObject_Expitem::GetItems($this->db, $options);

			$iva_o = array();
			$iva2_o = array();
			
            foreach ($items as $item) {
				$iva_o[] = $item->profile->iva;
			}
			
            foreach ($items as $item) {
				$iva2_o[] = $item->profile->iva2;
			}
			
			array_multisort($iva_o, SORT_DESC, $items2);
			array_multisort($iva2_o, SORT_DESC, $items3);
			
			$this->view->items = $items;
			$this->view->items2 = $items2;
			$this->view->items3 = $items3;
		
			
			$a = 0;
			$iva__ = 0;
			$ivas_ = array();
            foreach ($items2 as $item) {
            		if ($item->profile->iva != $iva__){
            			$a++;
            			$ivas_[$a] = $item->profile->iva_total;
					$iva__ = $item->profile->iva;
				}
				else {
					$ivas_[$a] = $ivas_[$a] + $item->profile->iva_total;	
				}
			}
			
			$this->view->ivas_ = $ivas_;
			
			$b = 0;
			$iva2__ = 0;
			$ivas2_ = array();
            foreach ($items3 as $item) {
            		if ($item->profile->iva2 != $iva2__){
            			$b++;
            			$ivas2_[$b] = $item->profile->iva2_total;
					$iva2__ = $item->profile->iva2;
				}
				else {
					$ivas2_[$b] = $ivas2_[$b] + $item->profile->iva2_total;	
				}
			}
			
			$this->view->ivas2_ = $ivas2_;
			
			
			if ($expense->profile->items){
				if (!is_array($expense->profile->items))
                		$expense->profile->items = array($expense->profile->items);
			
				foreach ($expense->profile->items as $id){
            			$item_ = new DatabaseObject_Item($this->db);
            			$item_->loadForUser($user_id, $id);
					$items[] = $item_;
					
					$this->view->items = $items;
        			}
			}
		}		
  ///////
  
  ////////purchase
             public function purchaseAction()
        {
           	$request = $this->getRequest();
			$purchase_id = (int) $this->getRequest()->getQuery('id');
			$user_id = (int) $this->getRequest()->getQuery('id2');
				
			//user company's details
			$company = new DatabaseObject_Company($this->db);
            $company->loadForUser($user_id);
			
			$this->view->company = $company;
			
            $options = array(
                'user_id'  => $user_id,
                'doc_type'   => 'company',
                'doc_id'   => $company->getId()
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			
            $purchase = new DatabaseObject_Purchase($this->db);
            $purchase->loadForUser($user_id, $purchase_id);
			
			$this->view->purchase = $purchase;
			
			if ($purchase->profile->purchase_valid){
				if ($purchase->profile->purchase_valid == 0.00){
					$valid_until = $purchase->profile->purchase_date;
				}
				else {
					$valid_until = date('d-m-Y', strtotime($purchase->profile->purchase_date. ' + ' . $purchase->profile->purchase_valid . 'days'));
				}
			}
			else {
				$valid_until = $purchase->profile->purchase_date;
			}
			
			$this->view->valid_until = $valid_until;
			
            $options = array(
                'user_id' => $user_id ,
                'document_id'   => $purchase_id
            );

            $client = DatabaseObject_PurchaseCompany::GetCompanies($this->db, $options);
			
			$this->view->client = $client;
			
			$totalIva = array(
			'iva_1' => 'I.V.A.',
			'iva_p_1' => 'I.V.A. %',
			'iva_2' => 'I.V.A.',
			'iva_p_2' => 'I.V.A. %',
			'iva_3' => 'I.V.A.',
			'iva_p_3' => 'I.V.A. %',	
			'iva_4' => 'I.V.A.',
			'iva_p_4' => 'I.V.A. %',	
			'iva_5' => 'I.V.A.',
			'iva_p_5' => 'I.V.A. %',	
			'iva_6' => 'I.V.A.',
			'iva_p_6' => 'I.V.A. %',
			'iva_7' => 'I.V.A.',
			'iva_p_7' => 'I.V.A. %',
			'iva_8' => 'I.V.A.',
			'iva_p_8' => 'I.V.A. %',
			'iva_9' => 'I.V.A.',
			'iva_p_9' => 'I.V.A. %',	
			'iva_10' => 'I.V.A.',
			'iva_p_10' => 'I.V.A. %',
			'iva2_1' => 'Otros Imp.',
			'iva2_p_1' => 'Otros Imp. %',
			'iva2_2' => 'Otros Imp.',
			'iva2_p_2' => 'Otros Imp. %',
			'iva2_3' => 'Otros Imp.',
			'iva2_p_3' => 'Otros Imp. %',	
			'iva2_4' => 'Otros Imp.',
			'iva2_p_4' => 'Otros Imp. %',	
			'iva2_5' => 'Otros Imp.',
			'iva2_p_5' => 'Otros Imp. %',	
			'iva2_6' => 'Otros Imp.',
			'iva2_p_6' => 'Otros Imp. %',
			'iva2_7' => 'Otros Imp.',
			'iva2_p_7' => 'Otros Imp. %',
			'iva2_8' => 'Otros Imp.',
			'iva2_p_8' => 'Otros Imp. %',
			'iva2_9' => 'Otros Imp.',
			'iva2_p_9' => 'Otros Imp. %',	
			'iva2_10' => 'Otros Imp.',
			'iva2_p_10' => 'Otros Imp. %'
		);
			
            $options = array(
                'user_id'  => $user_id,
                'document_type'   => 'purchase',
                'document_id'   => $purchase_id
            );

            $items = DatabaseObject_Puritem::GetItems($this->db, $options);
			$items2 = DatabaseObject_Puritem::GetItems($this->db, $options);
			$items3 = DatabaseObject_Puritem::GetItems($this->db, $options);

			$iva_o = array();
			$iva2_o = array();
			
            foreach ($items as $item) {
				$iva_o[] = $item->profile->iva;
			}
			
            foreach ($items as $item) {
				$iva2_o[] = $item->profile->iva2;
			}
			
			array_multisort($iva_o, SORT_DESC, $items2);
			array_multisort($iva2_o, SORT_DESC, $items3);
			
			$this->view->items = $items;
			$this->view->items2 = $items2;
			$this->view->items3 = $items3;
		
			
			$a = 0;
			$iva__ = 0;
			$ivas_ = array();
            foreach ($items2 as $item) {
            		if ($item->profile->iva != $iva__){
            			$a++;
            			$ivas_[$a] = $item->profile->iva_total;
					$iva__ = $item->profile->iva;
				}
				else {
					$ivas_[$a] = $ivas_[$a] + $item->profile->iva_total;	
				}
			}
			
			$this->view->ivas_ = $ivas_;
			
			$b = 0;
			$iva2__ = 0;
			$ivas2_ = array();
            foreach ($items3 as $item) {
            		if ($item->profile->iva2 != $iva2__){
            			$b++;
            			$ivas2_[$b] = $item->profile->iva2_total;
					$iva2__ = $item->profile->iva2;
				}
				else {
					$ivas2_[$b] = $ivas2_[$b] + $item->profile->iva2_total;	
				}
			}
			
			$this->view->ivas2_ = $ivas2_;
			
			
			if ($purchase->profile->items){
				if (!is_array($purchase->profile->items))
                		$purchase->profile->items = array($purchase->profile->items);
			
				foreach ($purchase->profile->items as $id){
            			$item_ = new DatabaseObject_Item($this->db);
            			$item_->loadForUser($user_id, $id);
					$items[] = $item_;
					
					$this->view->items = $items;
        			}
			}
		}		
  ///////

      }
?>