<?php
    class Finanzas_TributosController extends CustomControllerAction
    {
    		protected $user = null;
			
        public function init()
        {
            parent::init();
            $this->breadcrumbs->addStep('Tributos', $this->getUrl(null, 'tributos'));
			
			$this->identity = Zend_Auth::getInstance()->getIdentity();
			if (!$this->identity->company_id2){
		    		$this->identity->company_id2 = DatabaseObject_Address::temporaryUser();
			}
			if (!$this->identity->company_id3){
			$this->identity->company_id3 = DatabaseObject_Address::temporaryUser();
			}
			
			if (!$this->identity)
                $this->_redirect($this->getUrl('../index/'));
        }

       public function indexAction()
        {
			if ($this->identity->user_type == 'employee' && $this->identity->section9 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
        	
			parent::init();
            $this->breadcrumbs->addStep('Tributos', $this->getUrl(null, 'tributos'));
			
			$request = $this->getRequest();	
			$iva_id = (int) $request->getPost('iva_id');

			
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
			
			///expenses data and information	
			
			$now__ = date('d-m-Y');
			$now_ = strtotime($now__);
			$year__ = date('Y', $now_);
			
			$year2 = date('d-m-Y', strtotime('-1 year'));
			$year2_ =  strtotime($year2);
			$year2__ = date('Y', $year2_);
			
			$year3 = date('d-m-Y', strtotime('+1 year'));
			$year3_ =  strtotime($year3);
			$year3__ = date('Y', $year3_);
			
			$date__1_ = '01-07-' . $year2__;
			$date__1 = date('d-m-Y', strtotime($date__1_));
			
			$date_0_ = '01-10-' . $year2__;
			$date_0 = date('d-m-Y', strtotime($date_0_));
			
			$date_1_ = '01-01-' . $year__;
			$date_1 = date('d-m-Y', strtotime($date_1_));
			$date_2_ = '01-04-' . $year__;
			$date_2 = date('d-m-Y', strtotime($date_2_));
			$date_3_ = '01-07-' . $year__;
			$date_3 = date('d-m-Y', strtotime($date_3_));
			$date_4_ = '01-10-' . $year__;
			$date_4 = date('d-m-Y', strtotime($date_4_));
			$date_5_ = '01-01-' . $year3__;
			$date_5 = date('d-m-Y', strtotime($date_5_));


			if (strtotime($now__) >= strtotime($date_1) && strtotime($now__) < strtotime($date_2)){
				$last_tri = -99;
				$now_iva = 1;
			}
			elseif (strtotime($now__) >= strtotime($date_2) && strtotime($now__) < strtotime($date_3)){
				$last_tri = 1;
				$now_iva = 2;
			}
			elseif (strtotime($now__) >= strtotime($date_3) && strtotime($now__) < strtotime($date_4)){
				$last_tri = 2;
				$now_iva = 3;
			}
			elseif (strtotime($now__) >= strtotime($date_4) && strtotime($now__) < strtotime($date_5)){
				$last_tri = 3;
				$now_iva = 4;
			}
			else {
				$last_tri = 4;
				$now_iva = 5;
			}
			
			$total_iva_year_exp = 0;
			$total_iva_tri_exp = 0;
			$total_iva_now_exp = 0;
			$total_recc_exp = 0;
			
			$total_irpf_exp = 0;
			$expense_ids = array ();
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $expenseslist = DatabaseObject_Expense::GetAllExpenses($this->db, $options);
			
			$this->view->expenseslist = $expenseslist;
			
		    $options = array(
                'user_id' => $this->identity->user_id,
                'document_type' => 'expense'
            );
			
            $itemslist = DatabaseObject_Expitem::GetAllExpenseItems($this->db, $options);
			
			$this->view->itemslist = $itemslist;
			
						
			foreach ($expenseslist as $expense) {
						
            	$company_ = $expense->profile->thecompany;
			$default_year_start_ = strtotime($default_year_start);
            $expense_id_ = $expense->getId();
			$disc_ = $expense->profile->discount;
			$discount = (100 - $disc_)/100;
			$ts_created_ = $expense->profile->expense_date;
			$ts_created = strtotime($ts_created_);
			$tot__ = $expense->profile->total;
			$begin_ = $expense->profile->expense_date;
			$valid_ = $expense->profile->expense_valid;
			$amountpay___ = $expense->profile->amountpay;
			$paid_e = $expense->profile->paid;
			$recc_ = $expense->profile->recc;
			$retention_ = $expense->profile->retention;
			$base_ = $expense->profile->base;
			$debt_ = $tot__ - $amountpay___;
			$iva_paid = $expense->profile->iva_paid;
			
			$options_ = array(
					  'user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId(),
					  'expense_number' => $expense->getId()
					  );

			$cashes_e = DatabaseObject_Cashexpense::GetExpenses($this->db, $options_);
	
			$payday_ = array ();
			$amountpay_ = array ();
			
			foreach ($cashes_e as $cash) {
				$datep_ = $cash->profile->datepay;
				$datepay_ = date('d-m-Y', strtotime($datep_));				
				
				if (strtotime($datepay_) >= strtotime($date__1) && strtotime($datepay_) < strtotime($date_0)){
					$payday_[] = -98;
					$amountpay_[] = $cash->profile->amountpay;
				}
				elseif (strtotime($datepay_) >= strtotime($date_0) && strtotime($datepay_) < strtotime($date_1)){
					$payday_[] = -99;
					$amountpay_[] = $cash->profile->amountpay;
				}
				elseif (strtotime($datepay_) >= strtotime($date_1) && strtotime($datepay_) < strtotime($date_2)){
					$payday_[] = 1;
					$amountpay_[] = $cash->profile->amountpay;
				}
				elseif (strtotime($datepay_) >= strtotime($date_2) && strtotime($datepay_) < strtotime($date_3)){
					$payday_[] = 2;
					$amountpay_[] = $cash->profile->amountpay;
				}
				elseif (strtotime($datepay_) >= strtotime($date_3) && strtotime($datepay_) < strtotime($date_4)){
					$payday_[] = 3;
					$amountpay_[] = $cash->profile->amountpay;
				}
				elseif (strtotime($datepay_) >= strtotime($date_4) && strtotime($datepay_) < strtotime($date_5)){
					$payday_[] = 4;
					$amountpay_[] = $cash->profile->amountpay;
				}
				else {
					$payday_[] = 5;
					$amountpay_[] = $cash->profile->amountpay;
				}
			}

			if ($recc_ && !$paid_e) {
				$special_case_ = true;
			}

			//only info for the current year
			if ($ts_created >= $default_year_start_ || $special_case_ == true){
				if ($retention_){
					$t_irpf = $base_ * $retention_ * 0.01;
					$total_irpf_exp = $total_irpf_exp + $t_irpf;
				}
			}
			//ends info for the current year

						foreach ($itemslist as $item) {
							if ($expense_id_ == $item->document_id){
								
									if (!$discount){
										$discount = 1;
									}
							
									$quan_pro = $item->profile->quantity;
									$price_pro = $item->profile->unit_cost;
									$tot_pro_ = $item->profile->montototal;
									$subtotale = $item->profile->subtotal;
									$iva_e = $item->profile->iva_p;
									$iva2_e = $item->profile->iva_p2;
									
									//totals resume
									$tot_pro_re = $subtotale * $discount;
									$tot_iva1e = $tot_pro_re * $iva_e * 0.01;
									$tot_iva2e = $tot_pro_re * $iva2_e * 0.01;
	
									if ($recc_ && !$paid_e){
											$total_recc_exp = $total_recc_exp + ($tot_iva1e * $debt_) / $tot__;
									}
									
									//ends info for the current year
									
									//no recc, expenses
									if (!$recc_){
										
										if (strtotime($ts_created_) >= strtotime($date_0) && strtotime($ts_created_) < strtotime($date_1)){

													if ($now_iva == 0 && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $tot_iva1e;
													}
													elseif ($now_iva == 1 && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $tot_iva1e;
														
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}
										}
										
										elseif (strtotime($ts_created_) >= strtotime($date_1) && strtotime($ts_created_) < strtotime($date_2)){

													if ($now_iva == 1 && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $tot_iva1e;
													}
													elseif ($now_iva == 2 && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $tot_iva1e;
														
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}
										}


										elseif (strtotime($ts_created_) >= strtotime($date_2) && strtotime($ts_created_) < strtotime($date_3)){
											
													if ($now_iva == 2 && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $tot_iva1e;
													}
													elseif ($now_iva == 3 && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $tot_iva1e;
														
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}

										}


										elseif (strtotime($ts_created_) >= strtotime($date_3) && strtotime($ts_created_) < strtotime($date_4)){
												
													if ($now_iva == 3 && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $tot_iva1e;
													}
													elseif ($now_iva == 4 && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $tot_iva1e;
														
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}

										}


										elseif (strtotime($ts_created_) >= strtotime($date_4) && strtotime($ts_created_) < strtotime($date_5)){

													if ($now_iva == 4 && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $tot_iva1e;
													}
													elseif ($now_iva == 5 && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $tot_iva1e;
														
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}

										}
					  				 }
									//no recs, expenses ends---
		
									////////starts year tax
									if ($recc_){
									$sum__ = 0;
										
									  	   if ($cashes_e){
												foreach ($cashes_e as $cash) {
													$payment_ = $tot_iva1e * $amountpay_[$sum__] / $tot__;
													$datep_ = $cash->profile->datepay;
													$dapay__ = date('d-m-Y', strtotime($datep_));

													if (strtotime($dapay__) >= strtotime($date_1) && strtotime($dapay__) < strtotime($date_5)){
														$total_iva_year_exp = $total_iva_year_exp + $payment_;
													}
													
													$sum__++;
									     		}
										   }
									  }
									elseif (!$recc_){
										if (strtotime($ts_created_) >= strtotime($date_1) && strtotime($ts_created_) < strtotime($date_5)){
											$total_iva_year_exp = $total_iva_year_exp + $tot_iva1e;
										}
					   		   		}
								   ///////ends start year tax
								
									///new code for RECC
									foreach ($cashes_e as $cash) {
										$datep_ = $cash->profile->datepay;
										$datepay_ = date('d-m-Y', strtotime($datep_));				
									
										if (strtotime($datepay_) >= strtotime($date__1) && strtotime($datepay_) < strtotime($date_0)){
											$payday_ = -98;
											$payday_2 = -99;
											
											if ($recc_){
											$payment = $tot_iva1e * $cash->profile->amountpay / $expense->profile->total;
											$datep_ = $cash->profile->datepay;
											$dapay__ = date('d-m-Y', strtotime($datep_));
					
												if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
													if ($payday_ == $now_iva && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $payment;
													}
													elseif ($payday_2 == $now_iva && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $payment;
														
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}
												}
																		
											}
					
										}
										elseif (strtotime($datepay_) >= strtotime($date_0) && strtotime($datepay_) < strtotime($date_1)){
											$payday_ = -99;
											$payday_2 = 1;
											
											if ($recc_){
											$payment = $tot_iva1e * $cash->profile->amountpay / $expense->profile->total;
											$datep_ = $cash->profile->datepay;
											$dapay__ = date('d-m-Y', strtotime($datep_));
					
												if (strtotime($dapay__) >= strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
													if ($payday_ == $now_iva && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $payment;
													}
													elseif ($payday_2 == $now_iva && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $payment;
														
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}
												}
																		
											}
					
										}
										elseif (strtotime($datepay_) >= strtotime($date_1) && strtotime($datepay_) < strtotime($date_2)){
											$payday_ = 1;
											$payday_2 = $payday_ + 1;
											
											if ($recc_){
											$payment = $tot_iva1e * $cash->profile->amountpay / $expense->profile->total;
											$datep_ = $cash->profile->datepay;
											$dapay__ = date('d-m-Y', strtotime($datep_));
					
												if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
													if ($payday_ == $now_iva && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $payment;
													}
													elseif ($payday_2 == $now_iva && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $payment;
														
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}
												}
																		
											}
					
										}
										elseif (strtotime($datepay_) >= strtotime($date_2) && strtotime($datepay_) < strtotime($date_3)){
											$payday_ = 2;
											$payday_2 = $payday_ + 1;
											
											if ($recc_){
											$payment = $tot_iva1e * $cash->profile->amountpay / $expense->profile->total;
											$datep_ = $cash->profile->datepay;
											$dapay__ = date('d-m-Y', strtotime($datep_));
					
												if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
													if ($payday_ == $now_iva && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $payment;
													}
													elseif ($payday_2 == $now_iva && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $payment;
														
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}
												}
																		
											}
											
										}
										elseif (strtotime($datepay_) >= strtotime($date_3) && strtotime($datepay_) < strtotime($date_4)){
											$payday_ = 3;
											$payday_2 = $payday_ + 1;
											
											if ($recc_){
											$payment = $tot_iva1e * $cash->profile->amountpay / $expense->profile->total;
											$datep_ = $cash->profile->datepay;
											$dapay__ = date('d-m-Y', strtotime($datep_));
					
												if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
													if ($payday_ == $now_iva && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $payment;
													}
													elseif ($payday_2 == $now_iva && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $payment;
														
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}
												}
																		
											}
					
										}
										elseif (strtotime($datepay_) >= strtotime($date_4) && strtotime($datepay_) < strtotime($date_5)){
											$payday_ = 4;
											$payday_2 = $payday_ + 1;
											
											if ($recc_){
											$payment = $tot_iva1e * $cash->profile->amountpay / $expense->profile->total;
											$datep_ = $cash->profile->datepay;
											$dapay__ = date('d-m-Y', strtotime($datep_));
					
												if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
													if ($payday_ == $now_iva && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $payment;
													}
													elseif ($payday_2 == $now_iva && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $payment;
											
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}
												}
																		
											}
					
										}
										else {
											$payday_ = 5;
											$payday_2 = $payday_ + 1;
											
											if ($recc_){
											$payment = $tot_iva1e * $cash->profile->amountpay / $expense->profile->total;
											$datep_ = $cash->profile->datepay;
											$dapay__ = date('d-m-Y', strtotime($datep_));
					
												if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
													if ($payday_ == $now_iva && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $payment;
													}
													elseif ($payday_2 == $now_iva && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $payment;
														
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}
												}
																		
											}
										}
									}
									//ends new code for RECC
				  		    }
					   }
				  }
			//ends analytics	

			///data and information for INCOMMING/Invoices
			$total_iva_year_inv = 0;
			$total_iva_now_inv = 0;
			$total_iva_tri_inv = 0;
			$total_recc_inv = 0;
			
			$total_irpf_inv = 0;
			
			$invoice_ids = array ();
			
			$taxes = array();
			$tax_name = array();
			$tax_total = array();
			
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $invoiceslist = DatabaseObject_Invoice::GetAllInvoices($this->db, $options);
			
			$this->view->invoiceslist = $invoiceslist;
			
		    $options = array(
                'user_id' => $this->identity->user_id,
                'document_type' => 'invoice'
            );
			
            $itemslisti = DatabaseObject_Item::GetAllInvoiceItems($this->db, $options);
			
			$this->view->itemslisti = $itemslisti;

			foreach ($invoiceslist as $invoice) {
            	
	       	$company_i = $invoice->profile->company_id;
			$company_namei = $invoice->profile->thecompany;
			$default_year_start_i = strtotime($default_year_start);
			$published_ = $invoice->profile->published;
			$invoice_id_ = $invoice->getId();
			$ts_created_i = $invoice->profile->invoice_date;
			$ts_createdi = strtotime($ts_created_i);
			$disc_i = $invoice->profile->discount;
			$discounti = (100 - $disc_i)/100;
			$amountpay_ = $invoice->profile->amountpay;
			$paid_ = $invoice->profile->paid;
			$rec_ = $invoice->profile->recc;
			$valid_until__ = $invoice->profile->invoice_valid;
			$retentio_ = $invoice->profile->retention;
			$bas_ = $invoice->profile->base;
			$total__ = $invoice->profile->total;
			$debt = $total__ - $amountpay_;
			$iva_paid_ = $invoice->profile->iva_paid;
			$day_paid_ = $invoice->profile->datepay;
			
			$options_ = array(
					  'user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId(),
					  'invoice_number' => $invoice->getId()
					  );

			$cashes = DatabaseObject_Cashflow::GetInvoices($this->db, $options_);

			$payday = array ();
			$amountpay = array ();
			
			foreach ($cashes as $cash) {
				$datep_ = $cash->profile->datepay;
				$datepay__ = date('d-m-Y', strtotime($datep_));				
				
				if (strtotime($datepay__) >= strtotime($date__1) && strtotime($datepay__) < strtotime($date_0)){
					$payday[] = -98;
					$amountpay[] = $cash->profile->amountpay;
				}
				elseif (strtotime($datepay__) >= strtotime($date_0) && strtotime($datepay__) < strtotime($date_1)){
					$payday[] = -99;
					$amountpay[] = $cash->profile->amountpay;
				}
				elseif (strtotime($datepay__) >= strtotime($date_1) && strtotime($datepay__) < strtotime($date_2)){
					$payday[] = 1;
					$amountpay[] = $cash->profile->amountpay;
				}
				elseif (strtotime($datepay__) >= strtotime($date_2) && strtotime($datepay__) < strtotime($date_3)){
					$payday[] = 2;
					$amountpay[] = $cash->profile->amountpay;
				}
				elseif (strtotime($datepay__) >= strtotime($date_3) && strtotime($datepay__) < strtotime($date_4)){
					$payday[] = 3;
					$amountpay[] = $cash->profile->amountpay;
				}
				elseif (strtotime($datepay__) >= strtotime($date_4) && strtotime($datepay__) < strtotime($date_5)){
					$payday[] = 4;
					$amountpay[] = $cash->profile->amountpay;
				}
				else {
					$payday[] = 5;
					$amountpay[] = $cash->profile->amountpay;
				}
			}

			
			if ($rec_ && !$paid_) {
				$special_case = true;
			}
			
			//filter for IRPF (only info from the current fiscal year)
			if ($ts_createdi >= $default_year_start_i || $special_case == true){	
				if ($published_ && $retentio_){
					$p_irpf = $bas_ * $retentio_ * 0.01;
					$total_irpf_inv = $total_irpf_inv + $p_irpf;
				}
			}
			//ends info for the current year
				
						foreach ($itemslisti as $item) {
							if ($invoice_id_ == $item->document_id){
									
									if (!$discounti){
										$discounti = 1;
									}
							
									$quan_proi = $item->profile->quantity;
									$price_proi = $item->profile->unit_price;
									$subtotali = $item->profile->subtotal;
									$iva_ = $item->profile->iva;
									$iva2_ = $item->profile->iva2;
									$name_tax_ = $item->profile->iva2_name;
									
									//totals
									$tot_pro_rii = $subtotali * $discounti;
									$tot_iva1 = $tot_pro_rii * $iva_ * 0.01;
									$tot_iva2 = $tot_pro_rii * $iva2_ * 0.01;
									
									
									if ($published_){
									   	
									//only info for the current year
									if ($ts_createdi >= $default_year_start_i){
									  if ($name_tax_  || $tot_iva2){
										if (!in_array($name_tax_, $taxes)){
											$taxes[] = $name_tax_;
											$tax_name[] = $name_tax_;
											$tax_total[] = $tot_iva2;
										}
										else{
											$key = array_search($name_tax_, $taxes);
											$tax_total[$key] = $tax_total[$key] + $tot_iva2;
										}
									   }
									}
									//ends info for the current year
					
									if ($rec_ && !$paid_){
										$total_recc_inv = $total_recc_inv + ($tot_iva1 * $debt) / $total__;
									}
									
									//no recc, invoices, starts
									if (!$rec_){
										if (strtotime($ts_created_i) >= strtotime($date_0) && strtotime($ts_created_i) < strtotime($date_1)){

													if ($now_iva == 0 && !$iva_paid_){
														$total_iva_now_inv = $total_iva_now_inv + $tot_iva1;
													}
													elseif ($now_iva == 1 && !$iva_paid_) {
														$total_iva_tri_inv = $total_iva_tri_inv + $tot_iva1;
														
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
										   			}
										}
										
										elseif (strtotime($ts_created_i) >= strtotime($date_1) && strtotime($ts_created_i) < strtotime($date_2)){

													if ($now_iva == 1 && !$iva_paid_){
														$total_iva_now_inv = $total_iva_now_inv + $tot_iva1;
													}
													elseif ($now_iva == 2 && !$iva_paid_) {
														$total_iva_tri_inv = $total_iva_tri_inv + $tot_iva1;
														
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
										   			}
										}


										elseif (strtotime($ts_created_i) >= strtotime($date_2) && strtotime($ts_created_i) < strtotime($date_3)){

													if ($now_iva == 2 && !$iva_paid_){
														$total_iva_now_inv = $total_iva_now_inv + $tot_iva1;
													}
													elseif ($now_iva == 3 && !$iva_paid_) {
														$total_iva_tri_inv = $total_iva_tri_inv + $tot_iva1;
														
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
										   			}

										}


										elseif (strtotime($ts_created_i) >= strtotime($date_3) && strtotime($ts_created_i) < strtotime($date_4)){

													if ($now_iva == 3 && !$iva_paid_){
														$total_iva_now_inv = $total_iva_now_inv + $tot_iva1;
													}
													elseif ($now_iva == 4 && !$iva_paid_) {
														$total_iva_tri_inv = $total_iva_tri_inv + $tot_iva1;
														
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
										   			}

										}


										elseif (strtotime($ts_created_i) >= strtotime($date_4) && strtotime($ts_created_i) < strtotime($date_5)){

													if ($now_iva == 4 && !$iva_paid_){
														$total_iva_now_inv = $total_iva_now_inv + $tot_iva1;
													}
													elseif ($now_iva == 5 && !$iva_paid_) {
														$total_iva_tri_inv = $total_iva_tri_inv + $tot_iva1;
														
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
										   			}

										}
					  				 }
									//no recc, invoices, ends
									
									////////starts year tax
									if ($rec_){
									$sum___ = 0;
										
									  	   if ($cashes){
												foreach ($cashes as $cash) {
													$payment_ = $tot_iva1 * $amountpay[$sum___] / $total__;
													$datep_ = $cash->profile->datepay;
													$datepay__ = date('d-m-Y', strtotime($datep_));

													if (strtotime($datepay__) >= strtotime($date_1) && strtotime($datepay__) < strtotime($date_5)){
														$total_iva_year_inv = $total_iva_year_inv + $payment_;
													}
													
													$sum___++;
									     		}
										   }
								   }
								   elseif (!$rec_){
										if (strtotime($ts_created_i) >= strtotime($date_1) && strtotime($ts_created_i) < strtotime($date_5)){
											$total_iva_year_inv = $total_iva_year_inv + $tot_iva1;
										}
						   			}
								   ///////ends start year tax

		
									/// new stuff for RECC
									foreach ($cashes as $cash) {
									$datep_ = $cash->profile->datepay;
									$datepay_ = date('d-m-Y', strtotime($datep_));				
								
									if (strtotime($datepay_) >= strtotime($date__1) && strtotime($datepay_) < strtotime($date_0)){
										$payday_ = -98;
										$payday_2 = -99;
										
										if ($rec_){
										$payment = $tot_iva1 * $cash->profile->amountpay / $invoice->profile->total;
										$datep_ = $cash->profile->datepay;
										$dapay__ = date('d-m-Y', strtotime($datep_));
				
											if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
												if ($payday_ == $now_iva && !$iva_paid_){
													$total_iva_now_inv = $total_iva_now_inv + $payment;
												}
												elseif ($payday_2 == $now_iva && !$iva_paid_) {
													$total_iva_tri_inv = $total_iva_tri_inv + $payment;
													
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
									   			}
											}
																	
										}
				
									}
									elseif (strtotime($datepay_) >= strtotime($date_0) && strtotime($datepay_) < strtotime($date_1)){
										$payday_ = -99;
										$payday_2 = 1;
										
										if ($rec_){
										$payment = $tot_iva1 * $cash->profile->amountpay / $invoice->profile->total;
										$datep_ = $cash->profile->datepay;
										$dapay__ = date('d-m-Y', strtotime($datep_));
				
											if (strtotime($dapay__) >= strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
												if ($payday_ == $now_iva && !$iva_paid_){
													$total_iva_now_inv = $total_iva_now_inv + $payment;
												}
												elseif ($payday_2 == $now_iva && !$iva_paid_) {
													$total_iva_tri_inv = $total_iva_tri_inv + $payment;
													
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
									   			}
											}
																	
										}
				
									}
									elseif (strtotime($datepay_) >= strtotime($date_1) && strtotime($datepay_) < strtotime($date_2)){
										$payday_ = 1;
										$payday_2 = $payday_ + 1;
										
										if ($rec_){
										$payment = $tot_iva1 * $cash->profile->amountpay / $invoice->profile->total;
										$datep_ = $cash->profile->datepay;
										$dapay__ = date('d-m-Y', strtotime($datep_));
				
											if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
												if ($payday_ == $now_iva && !$iva_paid_){
													$total_iva_now_inv = $total_iva_now_inv + $payment;
												}
												elseif ($payday_2 == $now_iva && !$iva_paid_) {
													$total_iva_tri_inv = $total_iva_tri_inv + $payment;
													
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
									   			}
											}
																	
										}
				
									}
									elseif (strtotime($datepay_) >= strtotime($date_2) && strtotime($datepay_) < strtotime($date_3)){
										$payday_ = 2;
										$payday_2 = $payday_ + 1;
										
										if ($rec_){
										$payment = $tot_iva1 * $cash->profile->amountpay / $invoice->profile->total;
										$datep_ = $cash->profile->datepay;
										$dapay__ = date('d-m-Y', strtotime($datep_));
				
											if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
												if ($payday_ == $now_iva && !$iva_paid_){
													$total_iva_now_inv = $total_iva_now_inv + $payment;
												}
												elseif ($payday_2 == $now_iva && !$iva_paid_) {
													$total_iva_tri_inv = $total_iva_tri_inv + $payment;
													
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
									   			}
											}
																	
										}
										
									}
									elseif (strtotime($datepay_) >= strtotime($date_3) && strtotime($datepay_) < strtotime($date_4)){
										$payday_ = 3;
										$payday_2 = $payday_ + 1;
										
										if ($rec_){
										$payment = $tot_iva1 * $cash->profile->amountpay / $invoice->profile->total;
										$datep_ = $cash->profile->datepay;
										$dapay__ = date('d-m-Y', strtotime($datep_));
				
											if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
												if ($payday_ == $now_iva && !$iva_paid_){
													$total_iva_now_inv = $total_iva_now_inv + $payment;
												}
												elseif ($payday_2 == $now_iva && !$iva_paid_) {
													$total_iva_tri_inv = $total_iva_tri_inv + $payment;
													
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
									   			}
											}
																	
										}
				
									}
									elseif (strtotime($datepay_) >= strtotime($date_4) && strtotime($datepay_) < strtotime($date_5)){
										$payday_ = 4;
										$payday_2 = $payday_ + 1;
										
										if ($rec_){
										$payment = $tot_iva1 * $cash->profile->amountpay / $invoice->profile->total;
										$datep_ = $cash->profile->datepay;
										$dapay__ = date('d-m-Y', strtotime($datep_));
				
											if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
												if ($payday_ == $now_iva && !$iva_paid_){
													$total_iva_now_inv = $total_iva_now_inv + $payment;
												}
												elseif ($payday_2 == $now_iva && !$iva_paid_) {
													$total_iva_tri_inv = $total_iva_tri_inv + $payment;
													
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
									   			}
											}
																	
										}
				
									}
									else {
										$payday_ = 5;
										$payday_2 = $payday_ + 1;
										
										if ($rec_){
										$payment = $tot_iva1 * $cash->profile->amountpay / $invoice->profile->total;
										$datep_ = $cash->profile->datepay;
										$dapay__ = date('d-m-Y', strtotime($datep_));
				
											if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
												if ($payday_ == $now_iva && !$iva_paid_){
													$total_iva_now_inv = $total_iva_now_inv + $payment;
												}
												elseif ($payday_2 == $now_iva && !$iva_paid_) {
													$total_iva_tri_inv = $total_iva_tri_inv + $payment;
													
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
									   			}
											}
																	
										}
									}
								}
								//ends new stuff for RECC
									
						 }
				  		}
					}
				}

			//ends analytics	 for incomming/invoices
			
			$inv_ids = base64_encode(serialize($invoice_ids));
			
			$exp_ids = base64_encode(serialize($expense_ids));
			
            $options = array(
                'user_id' => $this->identity->user_id,
                'company_id' => $comp__->getId(),
                'invoice_ids' => $inv_ids,
                'expense_ids' => $exp_ids
            );
			
			$ivas = DatabaseObject_Iva::GetIvas($this->db, $options);
			 
			$this->view->ivas = $ivas;
			
            $options = array(
                'user_id' => $this->identity->user_id
            );
			
			$allivas = DatabaseObject_Iva::GetAllIvas($this->db, $options);
			
			$this->view->allivas = $allivas;
			
			$this->view->invoice_ids = $inv_ids;
			$this->view->expense_ids = $exp_ids;

			//operations

			foreach ($allivas as $iva) {
				if ($iva->profile->amountpay < 0){
					$addit = abs($iva->profile->amountpay);
					$total_iva_now_exp = $total_iva_now_exp + $addit;
				}
			}
			
			$total_iva_year = $total_iva_year_inv - $total_iva_year_exp;
			$total_iva_tri = $total_iva_tri_inv - $total_iva_tri_exp;
			$total_iva_now = $total_iva_now_inv - $total_iva_now_exp;
			$total_recc = $total_recc_inv - $total_recc_exp;
			$irpf_inv = $total_irpf_inv;
			$irpf_exp = $total_irpf_exp;	
			//ends operations
			
			$this->view->fp = $fp;

			$this->view->total_iva_year_inv = $total_iva_year_inv;		
			$this->view->total_iva_year_exp = $total_iva_year_exp;		
			$this->view->total_iva_year = $total_iva_year;
			
			$this->view->total_iva_tri = $total_iva_tri;
			$this->view->total_iva_tri_inv = $total_iva_tri_inv;
			$this->view->total_iva_tri_exp = $total_iva_tri_exp;
			

			
			$this->view->total_iva_now = $total_iva_now;
			$this->view->total_iva_now_inv = $total_iva_now_inv;
			$this->view->total_iva_now_exp = $total_iva_now_exp;
			
			$this->view->total_recc = $total_recc;
			$this->view->total_recc_inv = $total_recc_inv;
			$this->view->total_recc_exp = $total_recc_exp;
			
			$this->view->irpf_inv = $irpf_inv;
			$this->view->irpf_exp = $irpf_exp;

			$this->view->taxes = $taxes;
			$this->view->tax_name = $tax_name;
			$this->view->tax_total = $tax_total;
		}

    public function pagoivaAction()
        {
			if ($this->identity->user_type == 'employee' && $this->identity->section9 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
	       	$request = $this->getRequest();
			$iva_id = (int) $this->getRequest()->getQuery('id');
			$invoice_ids = $request->getPost('invoice_ids'); 
			$expense_ids = $request->getPost('expense_ids');
			$total_iva = $request->getPost('total_iva');
			
			///fecha/date
			$now__ = date('d-m-Y');
			$now_ = strtotime($now__);
			$year__ = date('Y', $now_);
			$year2 = date('d-m-Y', strtotime('-1 year'));
			$year2_ =  strtotime($year2);
			$year2__ = date('Y', $year2_);
				
			$year3 = date('d-m-Y', strtotime('+1 year'));
			$year3_ =  strtotime($year3);
			$year3__ = date('Y', $year3_);
				
			$date__1_ = '01-07-' . $year2__;
			$date__1 = date('d-m-Y', strtotime($date__1_));
				
			$date_0_ = '01-10-' . $year2__;
			$date_0 = date('d-m-Y', strtotime($date_0_));
				
			$date_1_ = '01-01-' . $year__;
			$date_1 = date('d-m-Y', strtotime($date_1_));
			$date_2_ = '01-04-' . $year__;
			$date_2 = date('d-m-Y', strtotime($date_2_));
			$date_3_ = '01-07-' . $year__;
			$date_3 = date('d-m-Y', strtotime($date_3_));
			$date_4_ = '01-10-' . $year__;
			$date_4 = date('d-m-Y', strtotime($date_4_));
			$date_5_ = '01-01-' . $year3__;
			$date_5 = date('d-m-Y', strtotime($date_5_));
			
			if (strtotime($now__) >= strtotime($date_1) && strtotime($now__) < strtotime($date_2)){
				$now_iva = 4;
			}
			elseif (strtotime($now__) >= strtotime($date_2) && strtotime($now__) < strtotime($date_3)){
				$now_iva = 3;
			}
			elseif (strtotime($now__) >= strtotime($date_3) && strtotime($now__) < strtotime($date_4)){
				$now_iva = 2;
			}
			else {
				$now_iva = 1;
			}
			
			$this->view->now_iva = $now_iva;
			$this->view->total_iva = $total_iva;
			$this->view->now__ = $now__;
			///

			//user company's details
			$company = new DatabaseObject_Company($this->db);
            $company->loadForUser($this->identity->user_id);
			
			$this->view->company = $company;
			
			$default_currency = $company->profile->currency;
			
			$this->view->default_currency = $default_currency;
			
           	$iva = new DatabaseObject_Iva($this->db);
            $iva->loadForUser($this->identity->user_id, $iva_id);
			
			$this->view->iva = $iva;
		
			$fp = new FormProcessor_IvaPayment($this->db,
											$this->identity->user_id,
                                             $invoice_ids,
											$expense_ids,
											$iva_id);
											 
			$this->view->fp = $fp;

			if ($request->getPost('add')) {
            	   if ($fp->process($request)) {
                 	//$iva->save();
				    $this->_redirect($this->getUrl('editarpago','finanzas/tributos') . '?id=' . $fp->iva->getId() . '&command=cerrar');
                }
            }
			
        }

    public function editarpagoAction()
        {
			if ($this->identity->user_type == 'employee' && $this->identity->section9 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
	       	$request = $this->getRequest();
			$iva_id = (int) $this->getRequest()->getQuery('id');
			
			$ivai = new DatabaseObject_Iva($this->db);	
            if (!$ivai->loadForUser($this->identity->user_id, $iva_id))
                $this->_redirect($this->getUrl('pagoiva','finanzas/tributos'));
			
			//user company's details
			$company = new DatabaseObject_Company($this->db);
            $company->loadForUser($this->identity->user_id);
			
			$this->view->company = $company;
			
			$default_currency = $company->profile->currency;
			
			$this->view->default_currency = $default_currency;
			
            $iva = new DatabaseObject_Iva($this->db);
            $iva->loadForUser($this->identity->user_id, $iva_id);
			
			$this->view->iva = $iva;

		
			$fp = new FormProcessor_IvaPayment($this->db,
											$this->identity->user_id,
                                             $iva->invoice_ids,
											$iva->expense_ids,
											$iva_id);
											 
			$this->view->fp = $fp;
			
			///fecha/date
			if ($fp->ts_created){
				$now__ = date('d-m-Y', strtotime($fp->ts_created));
				$now_ = strtotime($now__);
				$year__ = date('Y', $now_);
				$year2 = date('d-m-Y', strtotime('-1 year'));
				$year2_ =  strtotime($year2);
				$year2__ = date('Y', $year2_);
				
				$year3 = date('d-m-Y', strtotime('+1 year'));
				$year3_ =  strtotime($year3);
				$year3__ = date('Y', $year3_);
				
				$date__1_ = '01-07-' . $year2__;
				$date__1 = date('d-m-Y', strtotime($date__1_));
				
				$date_0_ = '01-10-' . $year2__;
				$date_0 = date('d-m-Y', strtotime($date_0_));
				
				$date_1_ = '01-01-' . $year__;
				$date_1 = date('d-m-Y', strtotime($date_1_));
				$date_2_ = '01-04-' . $year__;
				$date_2 = date('d-m-Y', strtotime($date_2_));
				$date_3_ = '01-07-' . $year__;
				$date_3 = date('d-m-Y', strtotime($date_3_));
				$date_4_ = '01-10-' . $year__;
				$date_4 = date('d-m-Y', strtotime($date_4_));
				$date_5_ = '01-01-' . $year3__;
				$date_5 = date('d-m-Y', strtotime($date_5_));
				
				if (strtotime($now__) >= strtotime($date_1) && strtotime($now__) < strtotime($date_2)){
					$now_iva = 4;
				}
				elseif (strtotime($now__) >= strtotime($date_2) && strtotime($now__) < strtotime($date_3)){
					$now_iva = 3;
				}
				elseif (strtotime($now__) >= strtotime($date_3) && strtotime($now__) < strtotime($date_4)){
					$now_iva = 2;
				}
				else {
					$now_iva = 1;
				}
				
				$this->view->now_iva = $now_iva;
			}
			///
			
			if ($request->getPost('editar')) {
            	   if ($fp->process($request)) {
                 	$iva->save();
				    $this->_redirect($this->getUrl('editarpago','finanzas/tributos') . '?id=' . $fp->iva->getId() . '&submitted=true');
                }
            }

			$prod =new DatabaseObject_Iva($this->db);

			if ($request->getPost('delete')) {
			 	if ($iva_id) {
			 		$prod->deleteIvaProfile($this->db, $iva_id);
					$prod->deleteIva($this->db, $iva_id);
					$fp3 = new FormProcessor_DeleteIvaPayment($this->db,
											$this->identity->user_id,
                                             $iva->invoice_ids,
											$iva->expense_ids,
											$iva_id);
					$this->view->fp3 = $fp3;
					if ($fp3->process($request)){
					}
				    	$this->_redirect($this->getUrl('editarpago','finanzas/tributos') . '?id=' . $fp->iva->getId() . '&submitted=true');
                	}			   
             }
			
        }

   }
?>