<?php
    class FinanzasController extends CustomControllerAction
    {
    		protected $user = null;
			
        public function init()
        {
            parent::init();
			
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
		
		public function avisoAction()
        {

        }
		
        public function indexAction()
        {
			if ($this->identity->user_type == 'employee' && $this->identity->section9 != 'yes') {		
                $this->_redirect($this->getUrl('index','cuenta'));
			}
			
			$this->breadcrumbs->addStep('Panel de Control');
			
			//user company's details
			$comp__ = new DatabaseObject_Company($this->db);
            $comp__->loadForUser($this->identity->user_id);
			$this->view->comp22 = $comp__->getId();
			
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
			
			////iva information
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
			/////////
			
			//expenses
			$status_ii_e = array();
			$class_ii_e = array();
			$valid_until_up_e = array();
			$expenses_up = array();
			
			$tri_0_exp = 0;
			$tri_1_exp = 0;
			$tri_2_exp = 0;
			$tri_3_exp = 0;
			$tri_4_exp = 0;
			
			$tot_month_1e = 0;
			$tot_month_2e = 0;
			$tot_month_3e = 0;
			$tot_month_4e = 0;
			$tot_month_5e = 0;
			$tot_month_6e = 0;
			$tot_month_7e = 0;
			$tot_month_8e = 0;
			$tot_month_9e = 0;
			$tot_month_10e = 0;
			$tot_month_11e = 0;
			$tot_month_12e = 0;

			$total_e = 0;
			$total_net_e = 0;
			$total_iva_e = 0;
			
			$total_up_e = 0;
			$total_iva_up_e = 0;
			$total_net_up_e = 0;

			//invoices
			$status_ii = array();
			$class_ii = array();
			$valid_until_up = array();
			$invoices_up = array();
			
			$tri_0_inv = 0;
			$tri_1_inv = 0;
			$tri_2_inv = 0;
			$tri_3_inv = 0;
			$tri_4_inv = 0;
			
			$tot_month_1 = 0;
			$tot_month_2 = 0;
			$tot_month_3 = 0;
			$tot_month_4 = 0;
			$tot_month_5 = 0;
			$tot_month_6 = 0;
			$tot_month_7 = 0;
			$tot_month_8 = 0;
			$tot_month_9 = 0;
			$tot_month_10 = 0;
			$tot_month_11 = 0;
			$tot_month_12 = 0;
			
			$total_i = 0;
			$total_net_i = 0;
			$total_iva_i = 0;
			
			$total_up_i = 0;
			$total_iva_up_i = 0;
			$total_net_up_i = 0;
		
			//iva (expenses and invoices)
			$total_iva_year_exp = 0;
			$total_iva_tri_exp = 0;
			$total_iva_now_exp = 0;
			$total_recc_exp = 0;
			$payday_ = array ();
			$amountpay_ = array ();
			$expense_ids = array ();
			$pay_e = 0;
			$iva_paid_e = 0;
			
			$total_iva_year_inv = 0;
			$total_iva_now_inv = 0;
			$total_iva_tri_inv = 0;
			$total_recc_inv = 0;
			$payday = array ();
			$amountpay = array ();
			$invoice_ids = array ();
			$pay_i = 0;
			$iva_paid_i = 0;

		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $expenses = DatabaseObject_Expense::GetAllExpenses($this->db,
                                                       $options);
			
			$this->view->expenses = $expenses;
			
			//number of invoice
		    $options = array(
                'user_id' => $this->identity->user_id
            );

            $invoices = DatabaseObject_Invoice::GetAllInvoices($this->db,
                                                       $options);

			$this->view->invoices = $invoices;
				

			$letter = 'A';
			
			
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

			///data and information for expenses
		    $options = array(
                'user_id' => $this->identity->user_id,
                'document_type' => 'expense'
            );
			
            $itemsliste = DatabaseObject_Expitem::GetAllExpenseItems($this->db, $options);
			
			$this->view->itemsliste = $itemsliste;
			
			
			///data and information for INCOMMING/Invoices
		    $options = array(
                'user_id' => $this->identity->user_id,
                'document_type' => 'invoice'
            );
			
            $itemslist = DatabaseObject_Item::GetAllInvoiceItems($this->db, $options);
			
			$this->view->itemslist = $itemslist;
			
			foreach ($expenses as $expense) {

  				$default_year_start_ = strtotime($default_year_start);
				$disc_i = $expense->profile->discount;
				$discount = (100 - $disc_i)/100;
				$ts_created_ = $expense->profile->expense_date;
				$ts_created = strtotime($ts_created_);
				$paid_ = $expense->profile->paid;
				$expense_id_ = $expense->getId();
				$amountpy_ = $expense->profile->amountpay;
				$now_ = date('d-m-Y');
				$recc = $expense->profile->recc;
				$tot__ = $expense->profile->total;
				$amountpay___ = $expense->profile->amountpay;
				$debt_ = $tot__ - $amountpay___;
				$iva_paid = $expense->profile->iva_paid;
				
				//iva (expenses)
				$options_ = array(
					  'user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId(),
					  'expense_number' => $expense->getId()
					  );

				$cashes_e = DatabaseObject_Cashexpense::GetExpenses($this->db, $options_);
				// ends iva (expenses)
				
				//data for panel de control
			    foreach ($cashes_e as $cash) {
					if ($cash->profile->waypay != 'Nota de Crédito'){
						 $pay_e = $pay_e + $cash->profile->amountpay;
					}
				}
				// ends data for panel de control
				
				if ($recc && !$paid_) {
					$special_case_ = true;
				}
				
				$year_03 = date('Y', $ts_created);

				if ($ts_created >= $default_year_start_  && $year_03 == $year__){
					
					$total_e = $total_e + $tot__;
					$total_net_e = $total_net_e + $expense->profile->base * (100 - $expense->profile->retention) / 100;
				}
										
					//for unpaid list status
					if(!$paid_){
						$expenses_up[] = $expense->getId();
						$total_up_e =  $total_up_e + $tot__ - $amountpy_;
						$total_net_up_e = $total_net_up_e + $expense->profile->base * (100 - $expense->profile->retention) / 100;
						
						if ($amountpy_){
									$sub_tt = $expense->profile->base * (100 - $expense->profile->retention) / 100;
									$amtpy = $amountpy_ * $sub_tt /$expense->profile->total;
									$total_net_up_e = $total_net_up_e - $amtpy;
						}
						
						if ($expense->profile->expense_valid){
							if ($expense->profile->expense_valid == 0.00){
								$valid_until_ = $expense->profile->expense_date;
								$valid_until_up_e[] = $expense->profile->expense_date;
							}
							else {
								$valid_until_ = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));
								$valid_until_up_e[] = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));
							}
						}
						else {
							$valid_until_ = $expense->profile->expense_date;
							$valid_until_up_e[] = $expense->profile->expense_date;
						}

						if($amountpy_){
							$status_ii_e[] = "Parcialmente Pagado";
							$class_ii_e[] = "parcial";
						}
						elseif(strtotime($valid_until_) > strtotime($now_)){
							$status_ii_e[] = "Pendiente";
							$class_ii_e[] = "pendiente";
						}
						else {
							$status_ii_e[] = "Vencido";
							$class_ii_e[] = "vencida";
						}
					}

					//ends unpaid list status
					
						foreach ($itemsliste as $item) {
							if ($expense_id_ == $item->document_id){
								
									if (!$discount){
										$discount = 1;
									}
							
									$quan_pro = $item->profile->quantity;
									$price_pro = $item->profile->unit_price;
									$subtotal = $item->profile->subtotal;
									$iva__ = $item->profile->iva_p;
									$iva2__ = $item->profile->iva2_p;
									
									$tot_pro_r_e = $subtotal * $discount;
									$tot_iva1 = $tot_pro_r_e * $iva__ * 0.01;
									$tot_iva2 = $tot_pro_r_e * $iva2__ * 0.01;
									
									if ($iva_paid){
										$iva_paid_e = $iva_paid_e + $tot_iva1;
									}
									
									$year_04 = date('Y', $ts_created);
									
									if ($ts_created >= $default_year_start_ && $year_04 == $year__){
										$total_iva_e = $total_iva_e + $tot_iva1;
									}
									
									if (!$paid_){
										$total_iva_up_e = $total_iva_up_e + $tot_iva1;
										
										if ($amountpy_){
												$iva_avrg = $amountpy_ * $tot_iva1 / $expense->profile->total;
												$total_iva_up_e = $total_iva_up_e - $iva_avrg;
										}
									}
									
									
									//start iva (expenses)
									if (!$recc){
										if (strtotime($ts_created_) >= strtotime($date_0) && strtotime($ts_created_) < strtotime($date_1)){
												
													$tri_0_exp = $tri_0_exp + $tot_iva1;
											
													if ($now_iva == 0 && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $tot_iva1;
													}
													elseif ($now_iva == 1 && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $tot_iva1;
														
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}

										}
										
										elseif (strtotime($ts_created_) >= strtotime($date_1) && strtotime($ts_created_) < strtotime($date_2)){
												
													$tri_1_exp = $tri_1_exp + $tot_iva1;
												
													if ($now_iva == 1 && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $tot_iva1;
													}
													
													elseif ($now_iva == 2 && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $tot_iva1;
														
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}
										}


										elseif (strtotime($ts_created_) >= strtotime($date_2) && strtotime($ts_created_) < strtotime($date_3)){

													$tri_2_exp = $tri_2_exp + $tot_iva1;
												
													if ($now_iva == 2 && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $tot_iva1;
													}
													elseif ($now_iva == 3 && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $tot_iva1;
														
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}

										}


										elseif (strtotime($ts_created_) >= strtotime($date_3) && strtotime($ts_created_) < strtotime($date_4)){
											
													$tri_3_exp = $tri_3_exp + $tot_iva1;
												
													if ($now_iva == 3 && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $tot_iva1;
													}
													elseif ($now_iva == 4 && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $tot_iva1;
														
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}

										}


										elseif (strtotime($ts_created_) >= strtotime($date_4) && strtotime($ts_created_) < strtotime($date_5)){

													$tri_4_exp = $tri_4_exp + $tot_iva1;
												
													if ($now_iva == 4 && !$iva_paid){
														$total_iva_now_exp = $total_iva_now_exp + $tot_iva1;
													}
													elseif ($now_iva == 5 && !$iva_paid) {
														$total_iva_tri_exp = $total_iva_tri_exp + $tot_iva1;
														
														if (!in_array($expense->getId(), $expense_ids)){
															$expense_ids[] = $expense->getId();
														}
										   			}

										}
					  				 }

									///new code for RECC
									foreach ($cashes_e as $cash) {
										$datep_ = $cash->profile->datepay;
										$datepay_ = date('d-m-Y', strtotime($datep_));				
									
										if (strtotime($datepay_) >= strtotime($date__1) && strtotime($datepay_) < strtotime($date_0)){
											$payday_ = -98;
											$payday_2 = -99;
											
											if ($recc){
											$payment = $tot_iva1 * $cash->profile->amountpay / $tot__;
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
											
											if ($recc){
											$payment = $tot_iva1 * $cash->profile->amountpay / $tot__;
											$datep_ = $cash->profile->datepay;
											$dapay__ = date('d-m-Y', strtotime($datep_));
					
												if (strtotime($dapay__) >= strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
													
													$tri_0_exp = $tri_0_exp + $payment;
													
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
											
											if ($recc){
											$payment = $tot_iva1 * $cash->profile->amountpay / $tot__;
											$datep_ = $cash->profile->datepay;
											$dapay__ = date('d-m-Y', strtotime($datep_));
					
												if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
													
													$tri_1_exp = $tri_1_exp + $payment;
													
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
											
											if ($recc){
											$payment = $tot_iva1 * $cash->profile->amountpay / $tot__;
											$datep_ = $cash->profile->datepay;
											$dapay__ = date('d-m-Y', strtotime($datep_));
					
												if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
													
													$tri_2_exp = $tri_2_exp + $payment;
													
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
											
											if ($recc){
											$payment = $tot_iva1 * $cash->profile->amountpay / $tot__;
											$datep_ = $cash->profile->datepay;
											$dapay__ = date('d-m-Y', strtotime($datep_));
					
												if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
													
													$tri_3_exp = $tri_3_exp + $payment;
													
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
											
											if ($recc){
											$payment = $tot_iva1 * $cash->profile->amountpay / $tot__;
											$datep_ = $cash->profile->datepay;
											$dapay__ = date('d-m-Y', strtotime($datep_));
					
												if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
													
													$tri_4_exp = $tri_4_exp + $payment;
													
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
											
											if ($recc){
											$payment = $tot_iva1 * $cash->profile->amountpay / $tot__;
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

									//ends iva (expenses)

									$month__ = date('n', $ts_created);
									$year___ = date('Y', $ts_created);
									$month_start = date('n', $default_year_start_);
									$date_ = date('d-m-Y', $ts_created);
									
									
								if ($ts_created >= $default_year_start_ && $year___ == $year__){
									if($month__ == 1){
										$month_1e = 'Enero';
										$year_1e = $year___;	

										$tot_month_1e = $tot_month_1e + $tot_pro_r_e;
									}
									
									elseif($month__ == 2){
										$month_2e = 'Febrero';
										$year_2e = $year___;	

										$tot_month_2e = $tot_month_2e + $tot_pro_r_e;
									}
									
									elseif($month__ == 3){
										$month_3e = 'Marzo';
										$year_3e = $year___;	

										$tot_month_3e = $tot_month_3e + $tot_pro_r_e;
									}
									
									elseif($month__ == 4){
										$month_4e = 'Abril';
										$year_4e = $year___;	

										$tot_month_4e = $tot_month_4e + $tot_pro_r_e;
									}
									
									elseif($month__ == 5){
										$month_5e = 'Mayo';
										$year_5e = $year___;	

										$tot_month_5e = $tot_month_5e + $tot_pro_r_e;
									}
									
									elseif($month__ == 6){
										$month_6e = 'Junio';
										$year_6e = $year___;	

										$tot_month_6e = $tot_month_6e + $tot_pro_r_e;
									}
									
									elseif($month__ == 7){
										$month_7e = 'Julio';
										$year_7e = $year___;	

										$tot_month_7e = $tot_month_7e + $tot_pro_r_e;
									}
									
									elseif($month__ == 8){
										$month_8e = 'Agosto';
										$year_8e = $year___;	

										$tot_month_8e = $tot_month_8e + $tot_pro_r_e;
									}
									
									elseif($month__ == 9){
										$month_9e = 'Septiembre';
										$year_9e = $year___;	

										$tot_month_9e = $tot_month_9e + $tot_pro_r_e;
									}
									
									elseif($month__ == 10){
										$month_10e = 'Octubre';
										$year_10e = $year___;	

										$tot_month_10e = $tot_month_10e + $tot_pro_r_e;
									}
									
									elseif($month__ == 11){
										$month_11e = 'Noviembre';
										$year_11e = $year___;	

										$tot_month_11e = $tot_month_11e + $tot_pro_r_e;
									}
									
									else {
										$month_12e = 'Diciembre';
										$year_12e = $year___;	

										$tot_month_12e = $tot_month_12e + $tot_pro_r_e;
									}
								   }
								 }
							   }			
				  		    }
			
			$this->view->year__ = $year__;
			$this->view->status_ii_e = $status_ii_e;
			$this->view->class_ii_e = $class_ii_e;
			$this->view->valid_until_up_e = $valid_until_up_e;
			$this->view->total_net_up_e = $total_net_up_e;
			$this->view->total_iva_up_e = $total_iva_up_e;
			$this->view->total_iva_e = $total_iva_e;
			
			$this->view->total_e = $total_e;
			$this->view->total_net_e = $total_net_e;
			$this->view->expenses_up = $expenses_up;
			
			$this->view->total_up_e = $total_up_e;
			
			$this->view->month_1e = $month_1e;
			$this->view->year_1e = $year_1e;
			$this->view->tot_month_1e = $tot_month_1e;
									
			$this->view->month_2e = $month_2e;
			$this->view->year_2e = $year_2e;
			$this->view->tot_month_2e = $tot_month_2e;
									
			$this->view->month_3e = $month_3e;
			$this->view->year_3e = $year_3e;
			$this->view->tot_month_3e = $tot_month_3e;
									
			$this->view->month_4e = $month_4e;
			$this->view->year_4e = $year_4e;
			$this->view->tot_month_4e = $tot_month_4e;
									
			$this->view->month_5e = $month_5e;
			$this->view->year_5e = $year_5e;
			$this->view->tot_month_5e = $tot_month_5e;
									
			$this->view->month_6e = $month_6e;
			$this->view->year_6e = $year_6e;
			$this->view->tot_month_6e = $tot_month_6e;
									
			$this->view->month_7e = $month_7e;
			$this->view->year_7e = $year_7e;
			$this->view->tot_month_7e = $tot_month_7e;
									
			$this->view->month_8e = $month_8e;
			$this->view->year_8e = $year_8e;
			$this->view->tot_month_8e = $tot_month_8e;
									
			$this->view->month_9e = $month_9e;
			$this->view->year_9e = $year_9e;
			$this->view->tot_month_9e = $tot_month_9e;
									
			$this->view->month_10e = $month_10e;
			$this->view->year_10e = $year_10e;
			$this->view->tot_month_10e = $tot_month_10e;
									
			$this->view->month_11e = $month_11e;
			$this->view->year_11e = $year_11e;
			$this->view->tot_month_11e = $tot_month_11e;
									
			$this->view->month_12e = $month_12e;
			$this->view->year_12e = $year_12e;
			$this->view->tot_month_12e = $tot_month_12e;
			//ends analytics	 for expenses	
			
			//invoice stuff comming
			foreach ($invoices as $invoice) {

  				$default_year_start_ = strtotime($default_year_start);
				$publised_ = $invoice->profile->published;
				$disc_i = $invoice->profile->discount;
				$discount_ = (100 - $disc_i)/100;
				$ts_created_i = $invoice->profile->invoice_date;
				$ts_created__ = strtotime($ts_created_i);
				$paid = $invoice->profile->paid;
				$invoice_id_ = $invoice->getId();
				$amontpy_ = $invoice->profile->amountpay;
				$now_ = date('d-m-Y');
				$rec_ = $invoice->profile->recc;
				$total__ = $invoice->profile->total;
				$debt = $total__ - $amontpy_;
				$iva_paid_ = $invoice->profile->iva_paid;
				
				//iva (invoices)
				$options_ = array(
					  'user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId(),
					  'invoice_number' => $invoice->getId()
					  );

				$cashes = DatabaseObject_Cashflow::GetInvoices($this->db, $options_);
				// ends iva (invoices)
				
				//data for panel de control
			    foreach ($cashes as $cash) {
			        $pay_i = $pay_i + $cash->profile->amountpay;
				}
				// ends data for panel de control
				
				if ($rec_ && !$paid) {
					$special_case = true;
				}
						
						
					$year_01 = date('Y', $ts_created__);
						
					if ($publised_){
						if ($ts_created__ >= $default_year_start_  && $year_01 == $year__){	
							$invoices_paid[] = $invoice->profile->paid;
							$total_i = $total_i + $total__;
							$total_net_i = $total_net_i + $invoice->profile->base * (100 - $invoice->profile->retention) / 100;
						}
						
					//for unpaid list status			
					if (!$paid){
							$invoices_up[] = $invoice->getId();
							$total_up_i =  $total_up_i + $total__ - $amontpy_;
							$total_net_up_i = $total_net_up_i + $invoice->profile->base * (100 - $invoice->profile->retention) / 100;

							if ($amontpy_){
									$sub_tt = $invoice->profile->base * (100 - $invoice->profile->retention) / 100;
									$amtpy = $amontpy_ * $sub_tt /$invoice->profile->total;
									$total_net_up_i = $total_net_up_i - $amtpy;
							}
		
						if ($invoice->profile->invoice_valid){
							if ($invoice->profile->invoice_valid == 0.00){
								$valid_until__ = $invoice->profile->invoice_date;
								$valid_until_up[] = $invoice->profile->invoice_date;
							}
							else {
								$valid_until__ = date('d-m-Y', strtotime($invoice->profile->invoice_date . ' + ' . $invoice->profile->invoice_valid . ' days'));
								$valid_until_up[] = date('d-m-Y', strtotime($invoice->profile->invoice_date . ' + ' . $invoice->profile->invoice_valid . ' days'));
							}
						}
						else {
							$valid_until__ = $invoice->profile->invoice_date;
							$valid_until_up[] = $invoice->profile->invoice_date;
						}

						if($paid){
							$status_ii[] = "Cobrada";
							$class_ii[] = "cobrada";
						}
						elseif($amontpy_){
							$status_ii[] = "Parcialmente Cobrada";
							$class_ii[] = "parcial";
						}
						elseif(isset($publised_) && strtotime($valid_until__) >= strtotime($now_)){
							$status_ii[] = "Pendiente";
							$class_ii[] = "pendiente";
						}
						elseif(isset($publised_) && strtotime($valid_until__) < strtotime($now_)){
							$status_ii[] = "Vencida";
							$class_ii[] = "vencida";
						}
						else {
							$status_ii[] = "Borrador";
							$class_ii[] = "borrador";
						}
					}
				}
					//ends unpaid list status
					
						foreach ($itemslist as $item) {
							if ($invoice_id_ == $item->document_id){
								
									if (!$discount_){
										$discount_ = 1;
									}
							
									$quan_pro = $item->profile->quantity;
									$price_pro = $item->profile->unit_price;
									$subtotal_ = $item->profile->subtotal;
									$iva_ = $item->profile->iva;
									$iva2_ = $item->profile->iva2;
									
									$tot_pro_r = $subtotal_ * $discount_;
									$tot_iva1_ = $tot_pro_r * $iva_ * 0.01;
									$tot_iva2_ = $tot_pro_r * $iva2_ * 0.01;
									
									if ($iva_paid_){
										$iva_paid_i = $iva_paid_i + $tot_iva1_;
									}
									
									if ($publised_){
											
									$year_02 = date('Y', $ts_created__);
																		
									if ($ts_created__ >= $default_year_start_  && $year_02 == $year__){	
										$total_iva_i = $total_iva_i + $tot_iva1_;
									}
									
									if (!$paid){
										$total_iva_up_i = $total_iva_up_i + $tot_iva1_;
										
										if ($amontpy_){
												$iva_avrg = $amontpy_ * $tot_iva1_ / $invoice->profile->total;
												$total_iva_up_i = $total_iva_up_i - $iva_avrg;
										}	
									}
									
									//starts iva (invoices)
									if (!$rec_){
										if (strtotime($ts_created_i) >= strtotime($date_0) && strtotime($ts_created_i) < strtotime($date_1)){
												
													$tri_0_inv = $tri_0_inv + $tot_iva1_;
											
													if ($now_iva == 0 && !$iva_paid_){
														$total_iva_now_inv = $total_iva_now_inv + $tot_iva1_;
													}
													elseif ($now_iva == 1 && !$iva_paid_) {
														$total_iva_tri_inv = $total_iva_tri_inv + $tot_iva1_;
														
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
										   			}

										}
										
										elseif (strtotime($ts_created_i) >= strtotime($date_1) && strtotime($ts_created_i) < strtotime($date_2)){
												
													$tri_1_inv = $tri_1_inv + $tot_iva1_;
												
													if ($now_iva == 1 && !$iva_paid_){
														$total_iva_now_inv = $total_iva_now_inv + $tot_iva1_;
													}
													elseif ($now_iva == 2 && !$iva_paid_) {
														$total_iva_tri_inv = $total_iva_tri_inv + $tot_iva1_;
														
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
										   			}
										}


										elseif (strtotime($ts_created_i) >= strtotime($date_2) && strtotime($ts_created_i) < strtotime($date_3)){

													$tri_2_inv = $tri_2_inv + $tot_iva1_;
												
													if ($now_iva == 2 && !$iva_paid_){
														$total_iva_now_inv = $total_iva_now_inv + $tot_iva1_;
													}
													elseif ($now_iva == 3 && !$iva_paid_) {
														$total_iva_tri_inv = $total_iva_tri_inv + $tot_iva1_;
														
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
										   			}

										}


										elseif (strtotime($ts_created_i) >= strtotime($date_3) && strtotime($ts_created_i) < strtotime($date_4)){
											
													$tri_3_inv = $tri_3_inv + $tot_iva1_;
												
													if ($now_iva == 3 && !$iva_paid_){
														$total_iva_now_inv = $total_iva_now_inv + $tot_iva1_;
													}
													elseif ($now_iva == 4 && !$iva_paid_) {
														$total_iva_tri_inv = $total_iva_tri_inv + $tot_iva1_;
														
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
										   			}

										}


										elseif (strtotime($ts_created_i) >= strtotime($date_4) && strtotime($ts_created_i) < strtotime($date_5)){

													$tri_4_inv = $tri_4_inv + $tot_iva1_;
												
													if ($now_iva == 4 && !$iva_paid_){
														$total_iva_now_inv = $total_iva_now_inv + $tot_iva1_;
													}
													elseif ($now_iva == 5 && !$iva_paid_) {
														$total_iva_tri_inv = $total_iva_tri_inv + $tot_iva1_;
														
														if (!in_array($invoice->getId(), $invoice_ids)){
															$invoice_ids[] = $invoice->getId();
														}
										   			}

										}
					  				 }
									
									/// new stuff for RECC
									foreach ($cashes as $cash) {
									$datep_ = $cash->profile->datepay;
									$datepay_ = date('d-m-Y', strtotime($datep_));				
								
									if (strtotime($datepay_) >= strtotime($date__1) && strtotime($datepay_) < strtotime($date_0)){
										$payday_ = -98;
										$payday_2 = -99;
										
										if ($rec_){
										$payment = $tot_iva1_ * $cash->profile->amountpay / $invoice->profile->total;
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
										$payment = $tot_iva1_ * $cash->profile->amountpay / $invoice->profile->total;
										$datep_ = $cash->profile->datepay;
										$dapay__ = date('d-m-Y', strtotime($datep_));
				
											if (strtotime($dapay__) >= strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
												
												$tri_0_inv = $tri_0_inv + $payment;
												
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
										$payment = $tot_iva1_ * $cash->profile->amountpay / $invoice->profile->total;
										$datep_ = $cash->profile->datepay;
										$dapay__ = date('d-m-Y', strtotime($datep_));
				
											if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
												
												$tri_1_inv = $tri_1_inv + $payment;
												
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
										$payment = $tot_iva1_ * $cash->profile->amountpay / $invoice->profile->total;
										$datep_ = $cash->profile->datepay;
										$dapay__ = date('d-m-Y', strtotime($datep_));
				
											if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
												
												$tri_2_inv = $tri_2_inv + $payment;
												
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
										$payment = $tot_iva1_ * $cash->profile->amountpay / $invoice->profile->total;
										$datep_ = $cash->profile->datepay;
										$dapay__ = date('d-m-Y', strtotime($datep_));
				
											if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
													
												$tri_3_inv = $tri_3_inv + $payment;
												
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
										$payment = $tot_iva1_ * $cash->profile->amountpay / $invoice->profile->total;
										$datep_ = $cash->profile->datepay;
										$dapay__ = date('d-m-Y', strtotime($datep_));
				
											if (strtotime($dapay__) > strtotime($date_0) && strtotime($dapay__) < strtotime($date_5)){
												
												$tri_4_inv = $tri_4_inv + $payment;
												
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
										$payment = $tot_iva1_ * $cash->profile->amountpay / $invoice->profile->total;
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
									
									//ends iva (invoices)

									$month__ = date('n', $ts_created__);
									$year____ = date('Y', $ts_created__);
									$month_start = date('n', $default_year_start_);
									$date_ = date('d-m-Y', $ts_created__);
									
								 if ($ts_created__ >= $default_year_start_ && $year____ == $year__){	
									if($month__ == 1){
										$month_1 = 'Enero';
										$year_1 = $year____;	

										$tot_month_1 = $tot_month_1 + $tot_pro_r;
									}
									
									elseif($month__ == 2){
										$month_2 = 'Febrero';
										$year_2 = $year____;	

										$tot_month_2 = $tot_month_2 + $tot_pro_r;
									}
									
									elseif($month__ == 3){
										$month_3 = 'Marzo';
										$year_3 = $year____;	

										$tot_month_3 = $tot_month_3 + $tot_pro_r;
									}
									
									elseif($month__ == 4){
										$month_4 = 'Abril';
										$year_4 = $year____;	

										$tot_month_4 = $tot_month_4 + $tot_pro_r;
									}
									
									elseif($month__ == 5){
										$month_5 = 'Mayo';
										$year_5 = $year____;	

										$tot_month_5 = $tot_month_5 + $tot_pro_r;
									}
									
									elseif($month__ == 6){
										$month_6 = 'Junio';
										$year_6 = $year____;	

										$tot_month_6 = $tot_month_6 + $tot_pro_r;
									}
									
									elseif($month__ == 7){
										$month_7 = 'Julio';
										$year_7 = $year____;	

										$tot_month_7 = $tot_month_7 + $tot_pro_r;
									}
									
									elseif($month__ == 8){
										$month_8 = 'Agosto';
										$year_8 = $year____;	

										$tot_month_8 = $tot_month_8 + $tot_pro_r;
									}
									
									elseif($month__ == 9){
										$month_9 = 'Septiembre';
										$year_9 = $year____;	

										$tot_month_9 = $tot_month_9 + $tot_pro_r;
									}
									
									elseif($month__ == 10){
										$month_10 = 'Octubre';
										$year_10 = $year____;	

										$tot_month_10 = $tot_month_10 + $tot_pro_r;
									}
									
									elseif($month__ == 11){
										$month_11 = 'Noviembre';
										$year_11 = $year____;	

										$tot_month_11 = $tot_month_11 + $tot_pro_r;
									}
									
									else {
										$month_12 = 'Diciembre';
										$year_12 = $year____;	

										$tot_month_12 = $tot_month_12 + $tot_pro_r;
									}
								   }
								 }
							   }			
				  		    }
					    }


			$options = array(
                'user_id' => $this->identity->user_id
            );
			
			$allaccounts = DatabaseObject_Cashaccount::GetAllAccounts($this->db, $options);
			
			$this->view->allaccounts = $allaccounts;
			
			$additional_cash = 0;
			
			foreach ($allaccounts as $cash) {
				if ($cash->profile->waypay == 'Efectivo'){
					$additional_cash = $additional_cash + $cash_amount_z + $cash->profile->amountpay;
				}
				elseif ($cash->profile->waypay == 'Cheque'){
					$additional_cash = $additional_cash + $check_amount_z + $cash->profile->amountpay;
				}
				elseif ($cash->profile->waypay == 'Transferencia'){
					$additional_cash = $additional_cash + $transfer_amount_z + $cash->profile->amountpay;
				}
			}
			
            $options = array(
                'user_id' => $this->identity->user_id
            );
			
			$allivas = DatabaseObject_Iva::GetAllIvas($this->db, $options);
			
			$this->view->allivas = $allivas;

			//operations
			$negative_iva  = 0;
			
			foreach ($allivas as $iva) {
				if ($iva->profile->amountpay < 0){
					$addit = abs($iva->profile->amountpay);
					$total_iva_now_exp = $total_iva_now_exp + $addit;
					$negative_iva = $negative_iva + $addit;
				}
			}
			
			$total_iva_year = $total_iva_year_inv - $total_iva_year_exp;
			$total_iva_tri = $total_iva_tri_inv - $total_iva_tri_exp;
			$total_iva_now = $total_iva_now_inv - $total_iva_now_exp;
			$tot_month_13iva = $tri_4_inv - $tri_4_exp;
			$tot_month_10iva = $tri_3_inv - $tri_3_exp;
			$tot_month_7iva = $tri_2_inv - $tri_2_exp;
			$tot_month_4iva = $tri_1_inv - $tri_1_exp;
			$tot_month_1iva = $tri_0_inv - $tri_0_exp;
			$tot_month_2iva = 0;
			$tot_month_3iva = 0;
			$tot_month_5iva = 0;
			$tot_month_6iva = 0;
			$tot_month_8iva = 0;
			$tot_month_9iva = 0;
			$tot_month_11iva = 0;
			$tot_month_12iva = 0;
			
			$cashflow = $additional_cash + ($pay_i - $pay_e) - ($iva_paid_i - $iva_paid_e) - $negative_iva;
			$profit = $total_net_i - $total_net_e;
			//ends operations
     
     		///from iva 
			$this->view->total_iva_year_inv = $total_iva_year_inv;		
			$this->view->total_iva_year_exp = $total_iva_year_exp;		
			$this->view->total_iva_year = $total_iva_year;
			
			$this->view->total_iva_tri = $total_iva_tri;
			$this->view->total_iva_tri_inv = $total_iva_tri_inv;
			$this->view->total_iva_tri_exp = $total_iva_tri_exp;
			
			$this->view->total_iva_now = $total_iva_now;
			$this->view->total_iva_now_inv = $total_iva_now_inv;
			$this->view->total_iva_now_exp = $total_iva_now_exp;
			
			$this->view->total_i = $total_i;
			$this->view->total_net_i = $total_net_i;
			$this->view->total_iva_i = $total_iva_i;
			
			$this->view->tot_month_1iva = $tot_month_1iva;
			$this->view->tot_month_2iva = $tot_month_2iva;
			$this->view->tot_month_3iva = $tot_month_3iva;
			$this->view->tot_month_4iva = $tot_month_4iva;
			$this->view->tot_month_5iva = $tot_month_5iva;
			$this->view->tot_month_6iva = $tot_month_6iva;
			$this->view->tot_month_7iva = $tot_month_7iva;
			$this->view->tot_month_8iva = $tot_month_8iva;
			$this->view->tot_month_9iva = $tot_month_9iva;
			$this->view->tot_month_10iva = $tot_month_10iva;
			$this->view->tot_month_11iva = $tot_month_11iva;
			$this->view->tot_month_12iva = $tot_month_12iva;
			$this->view->tot_month_13iva = $tot_month_13iva;
			///ends iva
			
			$this->view->cashflow = $cashflow;
			$this->view->profit = $profit;
			
			$this->view->status_ii = $status_ii;
			$this->view->class_ii = $class_ii;
			$this->view->valid_until_up = $valid_until_up;
			$this->view->total_up_i = $total_up_i;
			$this->view->total_net_up_i = $total_net_up_i;
			$this->view->total_iva_up_i = $total_iva_up_i;
			$this->view->total_iva_i = $total_iva_i;
			
			$this->view->invoices_up = $invoices_up;
			
			$this->view->month_start = $month_start;
			$this->view->month__ = $month__;
			
			$this->view->month_1 = $month_1;
			$this->view->year_1 = $year_1;
			$this->view->tot_month_1 = $tot_month_1;
									
			$this->view->month_2 = $month_2;
			$this->view->year_2 = $year_2;
			$this->view->tot_month_2 = $tot_month_2;
									
			$this->view->month_3 = $month_3;
			$this->view->year_3 = $year_3;
			$this->view->tot_month_3 = $tot_month_3;
									
			$this->view->month_4 = $month_4;
			$this->view->year_4 = $year_4;
			$this->view->tot_month_4 = $tot_month_4;
									
			$this->view->month_5 = $month_5;
			$this->view->year_5 = $year_5;
			$this->view->tot_month_5 = $tot_month_5;
									
			$this->view->month_6 = $month_6;
			$this->view->year_6 = $year_6;
			$this->view->tot_month_6 = $tot_month_6;
									
			$this->view->month_7 = $month_7;
			$this->view->year_7 = $year_7;
			$this->view->tot_month_7 = $tot_month_7;
									
			$this->view->month_8 = $month_8;
			$this->view->year_8 = $year_8;
			$this->view->tot_month_8 = $tot_month_8;
									
			$this->view->month_9 = $month_9;
			$this->view->year_9 = $year_9;
			$this->view->tot_month_9 = $tot_month_9;
									
			$this->view->month_10 = $month_10;
			$this->view->year_10 = $year_10;
			$this->view->tot_month_10 = $tot_month_10;
									
			$this->view->month_11 = $month_11;
			$this->view->year_11 = $year_11;
			$this->view->tot_month_11 = $tot_month_11;
									
			$this->view->month_12 = $month_12;
			$this->view->year_12 = $year_12;
			$this->view->tot_month_12 = $tot_month_12;
			//ends analytics	 for incomming/invoices	

        }

    }
?>