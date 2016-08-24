<?php
    class ContabilidadController extends CustomControllerAction
    {
        public function init()
        {
            parent::init();
            $this->breadcrumbs->addStep('Contabilidad', $this->getUrl(null, 'contabilidad'));
			
			$this->identity = Zend_Auth::getInstance()->getIdentity();

			if (!$this->identity)
                $this->_redirect($this->getUrl('index','cuenta'));
        }
	
        public function indexAction()
        {

			//user company's details
			$comp__ = new DatabaseObject_Company($this->db);
            $comp__->loadForUser($this->identity->user_id);
			
			$request = $this->getRequest();
			
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
			$valid_until_e = array();
			
			$tri_0_exp = 0;
			$tri_1_exp = 0;
			$tri_2_exp = 0;
			$tri_3_exp = 0;
			$tri_4_exp = 0;
			
			$total_e = 0;
			$total_net_e = 0;
			$total_iva_e = 0;
			
			$total_up_e = 0;
			$total_iva_up_e = 0;

			//invoices
			$status_ii = array();
			$valid_until = array();
			
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
			
			$total_iva_up_i = 0;
		
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
			'iva_1' =>  'iva_p_1',
			'iva_2' =>  'iva_p_2',
			'iva_3' =>  'iva_p_3',
			'iva_4' =>  'iva_p_4',
			'iva_5' =>  'iva_p_5',
			'iva_6' =>  'iva_p_6',
			'iva_7' =>  'iva_p_7',
			'iva_8' =>  'iva_p_8',
			'iva_9' =>  'iva_p_9',
			'iva_10' =>  'iva_p_10',
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
				
					//for main list status
					if ($expense->profile->expense_valid){
						if ($expense->profile->expense_valid == 0.00){
							$valid_until__ = $expense->profile->expense_date;
							$valid_until_e[] = $expense->profile->expense_date;
						}
						else {
							$valid_until__ = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));
							$valid_until_e[] = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));
						}
					}
					else {
						$valid_until__ = $expense->profile->expense_date;
						$valid_until_e[] = $expense->profile->expense_date;
					}
					
					$now_ = date('d-m-Y');
					
					if($paid_){
						$status_ii_e[] = "Pagado";
					}
					elseif($amountpy_){
						$status_ii_e[] = "Parcialmente Pagado";
					}
					elseif(strtotime($expense->profile->expense_date) > strtotime($now_)){
						$status_ii_e[] = "Pendiente";
					}
					else {
						$status_ii_e[] = "Vencido";
					}
					

					///// ends main list status

				if ($ts_created >= $default_year_start_){
					
					$total_e = $total_e + $tot__;
					$total_net_e = $total_net_e + $expense->profile->base * (100 - $expense->profile->retention) / 100;
				}
										
					
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
									
									if ($ts_created >= $default_year_start_){
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
									$year__ = date('Y', $ts_created);
									$month_start = date('n', $default_year_start_);
									$date_ = date('d-m-Y', $ts_created);

								 }
							   }			
				  		    }

			if ($request->getPost('download_e')) {
					
				$config = Zend_Registry::get('config');
				$droute = $config->paths->include;
				$aroute = $config->paths->base2;
				
				include_once $droute . '/PHPExcel.php';
				include_once $droute . '/PHPExcel/Writer/Excel2007.php';

				$objPHPExcel = new PHPExcel();
				
				$objPHPExcel->setActiveSheetIndex(0);
				$iva_t_1 = 0;
				$iva_t_2 = 0;
				$iva_t_3 = 0;
				$iva_t_4 = 0;
				$iva_t_5 = 0;
				$iva_t_6 = 0;
				$iva_t_7 = 0;
				$iva_t_8 = 0;
				$iva_t_9 = 0;
				$iva_t_10 = 0;
				$iva2_t_ = 0;
				$iva_p_1 = '';
				$iva_p_2 = '';
				$iva_p_3 = '';
				$iva_p_4 = '';
				$iva_p_5 = '';
				$iva_p_6 = '';
				$iva_p_7 = '';
				$iva_p_8 = '';
				$iva_p_9 = '';
				$iva_p_10 = '';	
				$count_ = 2;
				$numb_ = 0;
				$col_ = array ();

 				foreach ($expenses as $expense) {
 					
					$options = array(
                			'user_id' => $this->identity->user_id,
                			'document_id'   => $expense->getId()
            			);

            			$client_ = DatabaseObject_ExpenseCompany::GetCompanies($this->db, $options);

 					
					$options_ = array(
					  'user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId(),
					  'expense_number' => $expense->getId()
					  );

					$cashes = DatabaseObject_Cashexpense::GetExpenses($this->db, $options_);
					
					if ($expense->profile->expense_valid){
						if ($expense->profile->expense_valid == 0.00){
							$valid_untl = $expense->profile->expense_date;
						}
						else {
							$valid_untl = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));						}
					}
					else {
						$valid_untl = $expense->profile->expense_date;
					}
					
					$now_ = date('d-m-Y');
					
    					$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Gasto No');
    					$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Fecha');
    					$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Proveedor');
					$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'ID Fiscal');
    					$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Base Imponible');
						
					$objPHPExcel->getActiveSheet()->SetCellValue('A' . $count_, $expense->expense_number);
    					$objPHPExcel->getActiveSheet()->SetCellValue('B' . $count_, $expense->profile->expense_date);
						
					$title = $expense->profile->thecompany;

        				### create aacute; from á, etc
        				$text = str_ireplace("\xE1", "a", $title);
        				$text = str_ireplace("\xE9", "e", $text); 
        				$text = str_ireplace("\xED", "i", $text);
        				$text = str_ireplace("\xF3", "o", $text);
        				$text = str_ireplace("\xFA", "u", $text);
        				$text = str_ireplace("\xF1", "n", $text);
        				// same but for UPPERCASE
        				$text = str_ireplace("\xC1", "A", $text);
        				$text = str_ireplace("\xC9", "E", $text); 
        				$text = str_ireplace("\xCD", "I", $text);
        				$text = str_ireplace("\xD3", "O", $text);
        				$text = str_ireplace("\xDA", "U", $text);
        				$text = str_ireplace("\xD1", "N", $text);

					$company_name =	htmlspecialchars($text);
						
					$objPHPExcel->getActiveSheet()->setCellValue('C' . $count_, $company_name);
					
					foreach ($client_ as $client) {
						if ($client->profile->thecompany){
							$objPHPExcel->getActiveSheet()->setCellValue('D' . $count_, $client->profile->identification);
						}
					}
					
					$st__ = number_format($expense->profile->base, 2, ',', '.');
    					$objPHPExcel->getActiveSheet()->SetCellValue('E' . $count_, $st__ );

					foreach ($totalIva as $key => $label) {
						if ($label == 'iva_p_1') {
							$iva_t_1 = $iva_t_1 + $expense->profile->$key;
							$iva_p_1 = $expense->profile->iva_p_1;
						}
						elseif ($label == 'iva_p_2') {
							$iva_t_2 = $iva_t_2 + $expense->profile->$key;
							$iva_p_2 = $expense->profile->iva_p_2;
						}
						elseif ($label == 'iva_p_3') {
							$iva_t_3 = $iva_t_3 + $expense->profile->$key;
							$iva_p_3 = $expense->profile->iva_p_3;
						}
						elseif ($label == 'iva_p_4') {
							$iva_t_4 = $iva_t_4 + $expense->profile->$key;
							$iva_p_4 = $expense->profile->iva_p_4;
						}
						elseif ($label == 'iva_p_5') {
							$iva_t_5 = $iva_t_5 + $expense->profile->$key;
							$iva_p_5 = $expense->profile->iva_p_5;
						}
						elseif ($label == 'iva_p_6') {
							$iva_t_6 = $iva_t_6 + $expense->profile->$key;
							$iva_p_6 = $expense->profile->iva_p_6;
						}
						elseif ($label == 'iva_p_7') {
							$iva_t_7 = $iva_t_7 + $expense->profile->$key;
							$iva_p_7 = $expense->profile->iva_p_7;
						}
						elseif ($label == 'iva_p_8') {
							$iva_t_8 = $iva_t_8 + $expense->profile->$key;
							$iva_p_8 = $expense->profile->iva_p_8;
						}
						elseif ($label == 'iva_p_9') {
							$iva_t_9 = $iva_t_9 + $expense->profile->$key;
							$iva_p_9 = $expense->profile->iva_p_9;
						}
						elseif ($label == 'iva_p_10') {
							$iva_t_10 = $iva_t_10 + $expense->profile->$key;
							$iva_p_10 = $expense->profile->iva_p_10;
						}
					}
					
					$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'I.V.A ' . $iva_p_1 . '%');
					$st_iva__1 = number_format($iva_t_1, 2, ',', '.');
					$objPHPExcel->getActiveSheet()->SetCellValue('F' . $count_, $st_iva__1);
					$col_ = array ('G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
					$numb_++;
					
					if ($iva_p_2){
						$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'I.V.A ' . $iva_p_2 . '%');
						$st_iva__2 = number_format($iva_t_2, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('G' . $count_, $st_iva__2);
						//$numb_++;
					}
					/*
					if ($iva_p_3){
						$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'I.V.A' . $iva_p_3 . '%');
						$st_iva__3 = number_format($iva_t_3, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('H' . $count_, $st_iva__3);
						//$numb_++;
					}
					
					if (iva_p_4){
						$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'I.V.A ' . $iva_p_4 . '%');
						$st_iva__4 = number_format($iva_t_4, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('I' . $count_, $st_iva__4);
						//$numb_++;
					}
					
					if ($iva_p_5){
						$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'I.V.A ' . $iva_p_5 . '%');
						$st_iva__5 = number_format($iva_t_5, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('J' . $count_, $st_iva__5);
						//$numb_++;
					}
				
					if ($iva_p_6){
						$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'I.V.A ' . $iva_p_6 . '%');
						$st_iva__6 = number_format($iva_t_6, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('K' . $count_, $st_iva__6);
						//$numb_++;
					}
					
					if ($iva_p_7){
						$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'I.V.A ' . $iva_p_7 . '%');
						$st_iva__7 = number_format($iva_t_7, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('L' . $count_, $st_iva__7);
						//$numb_++;
					}
					
					if ($iva_p_8){
						$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'I.V.A ' . $iva_p_8 . '%');
						$st_iva__8 = number_format($iva_t_8, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('M' . $count_, $st_iva__8);
						//$numb_++;
					}
					
					if ($iva_p_9){
						$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'I.V.A ' . $iva_p_9 . '%');
						$st_iva__9 = number_format($iva_t_9, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('N' . $count_, $st_iva__9);
						//$numb_++;
					}
					
					if ($iva_p_10){
						$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'I.V.A ' . $iva_p_10 . '%');
						$st_iva__10 = number_format($iva_t_10, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('O' . $count_, $st_iva__10);
						//$numb_++;
					}*/
					
					foreach ($totalIva as $key => $label) {
						if ($label == 'Otros Imp.') {
							$iva2_t_ = $iva2_t_ + $expense->profile->$key;
						}
					}
				
    					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Otros Imp.');
					$st_iva2__ = number_format($iva2_t_, 2, ',', '.');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, $st_iva2__);
					$numb_++;
					
    					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Retencion IRPF %');
					$tot_irpf = $expense->profile->retention;
					$st_irpf = number_format($tot_irpf, 2, ',', '.');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, $st_irpf);
					$numb_++;
						
    					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Total');
					$st_tot__ = number_format($expense->profile->total, 2, ',', '.');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, $st_tot__);
					$numb_++;
						
					if ($expense->profile->paid) {
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Estatus');
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, 'Pagado');
						$numb_++;
					}
					elseif ($expense->profile->amountpay) {
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Estatus');
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, 'Parcialmente Pagado');
						$numb_++;
					}
					elseif(strtotime($valid_untl) > strtotime($now_)){
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Estatus');
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, 'Pendiente');
						$numb_++;
					}
					else {
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Estatus');
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, 'Vencido');
						$numb_++;
					}
					
					$combo = '' ;
					
					foreach ($cashes as $cash) {
						$date_ = $cash->profile->datepay;
						$total__ = number_format($cash->profile->amountpay, 2, ',', '.');
						$total_ = $total__;
						$waypy_ = $cash->profile->waypay;
						$reference_ = $cash->profile->referencepay;
						$datail_ = $cash->profile->detailpay;
						
						$combo = $combo . $date_ . ', Monto:' . $total_ . ', Referencia:' . $reference_ . ', Forma Pago:' . $waypy_ .  ', Detalle:' . $datail_ . '---' ;
					
					}
	
					if (!$combo) {
						$combo= 'Sin Pagos';
					}	

					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Pagos');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, $combo);
					$numb_++;

					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'WebProAdmin');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '2', 'www.webproadmin.com');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '3', 'soporte@webproadmin.com');
					
					$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
					$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
					$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(45);
					$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(25);
						
					$count_++;
					$iva_t_1 = 0;
					$iva_t_2 = 0;
					$iva_t_3 = 0;
					$iva_t_4 = 0;
					$iva_t_5 = 0;
					$iva_t_6 = 0;
					$iva_t_7 = 0;
					$iva_t_8 = 0;
					$iva_t_9 = 0;
					$iva_t_10 = 0;
					$iva2_t_ = 0;
					$iva_p_1 = '';
					$iva_p_2 = '';
					$iva_p_3 = '';
					$iva_p_4 = '';
					$iva_p_5 = '';
					$iva_p_6 = '';
					$iva_p_7 = '';
					$iva_p_8 = '';
					$iva_p_9 = '';
					$iva_p_10 = '';
					$numb_ = 0;
					$col_ = array ();	
					}	

				$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
				$file_name = mt_rand();
				$route__ = $aroute . 'httpdocs/documents/expenses/xls/'.$file_name;
				$objWriter->save($route__ . '.xlsx');
				
				if (file_exists($route__ . '.xlsx')) {
    					header('Pragma: public'); // required
    					header('Expires: 0'); // no cache
    					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    					header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime($route__ . '.xlsx')).' GMT');
    					header('Cache-Control: private',false);
   					header('Content-Type: '.'application/vnd.ms-excel');
    					header('Content-Disposition: attachment; filename="'.basename($route__ . '.xlsx').'"');
    					header('Content-Transfer-Encoding: binary');
   					header('Content-Length: '.filesize($route__ . '.xlsx')); // provide file size
    					header('Connection: close');
					ob_clean();
			        flush();
    					readfile($route__ . '.xlsx');
    					exit();
				 }	
             }

			$this->view->status_ii_e = $status_ii_e;
			$this->view->valid_until_e = $valid_until_e;
			$this->view->total_iva_up_e = $total_iva_up_e;
			$this->view->total_iva_e = $total_iva_e;
			
			$this->view->total_e = $total_e;
			$this->view->total_net_e = $total_net_e;
			
			$this->view->total_up_e = $total_up_e;

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
				
					//for main list status
					if ($invoice->profile->invoice_valid){
						if ($invoice->profile->invoice_valid == 0.00){
							$valid_until__ = $invoice->profile->invoice_date;
							$valid_until[] = $invoice->profile->invoice_date;
						}
						else {
							$valid_until__ = date('d-m-Y', strtotime($invoice->profile->invoice_date . ' + ' . $invoice->profile->invoice_valid . ' days'));
							$valid_until[] = $invoice->profile->invoice_date;
						}
					}
					else {
						$valid_until__ = $invoice->profile->invoice_date;
						$valid_until[] = $invoice->profile->invoice_date;
					}
					
					$now_ = date('d-m-Y');
			
					if($paid){
						$status_i[] = "Cobrada";
					}
					elseif($amontpy_){
						$status_i[] = "Parcialmente Cobrada";
					}
					elseif(isset($publised_) && strtotime($valid_until__) >= strtotime($now_)){
						$status_i[] = "Pendiente";
					}
					elseif(isset($publised_) && strtotime($valid_until__) < strtotime($now_)){
						$status_i[] = "Vencida";
					}
					else {
						$status_i[] = "Borrador";
					}
					///// ends main list status

					if ($publised_){
						if ($ts_created__ >= $default_year_start_){	
							$invoices_paid[] = $invoice->profile->paid;
							$total_i = $total_i + $total__;
							$total_net_i = $total_net_i + $invoice->profile->base * (100 - $invoice->profile->retention) / 100;
						}
						
					}
					
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
																			
									if ($ts_created__ >= $default_year_start_){	
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
									$year__ = date('Y', $ts_created__);
									$month_start = date('n', $default_year_start_);
									$date_ = date('d-m-Y', $ts_created__);

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
			
			if ($request->getPost('download')) {
				$config = Zend_Registry::get('config');
				$droute = $config->paths->include;
				$aroute = $config->paths->base2;
				
				include_once $droute . '/PHPExcel.php';
				include_once $droute . '/PHPExcel/Writer/Excel2007.php';

				$objPHPExcel = new PHPExcel();
				
				$objPHPExcel->setActiveSheetIndex(0);
				$iva_t_1 = 0;
				$iva_t_2 = 0;
				$iva_t_3 = 0;
				$iva_t_4 = 0;
				$iva_t_5 = 0;
				$iva_t_6 = 0;
				$iva_t_7 = 0;
				$iva_t_8 = 0;
				$iva_t_9 = 0;
				$iva_t_10 = 0;
				$iva2_t_ = 0;
				$iva_p_1 = '';
				$iva_p_2 = '';
				$iva_p_3 = '';
				$iva_p_4 = '';
				$iva_p_5 = '';
				$iva_p_6 = '';
				$iva_p_7 = '';
				$iva_p_8 = '';
				$iva_p_9 = '';
				$iva_p_10 = '';	
				$count_ = 2;
				$numb_ = 0;
				$col_ = array ();

 				foreach ($invoices as $invoice) {
 					$publish = $invoice->profile->published;
					
					$options = array(
                			'user_id' => $this->identity->user_id,
                			'document_id'   => $invoice->getId()
            			);

            			$client_ = DatabaseObject_InvoiceCompany::GetCompanies($this->db, $options);
					
					$options_ = array(
					  'user_id' => $this->identity->user_id,
					  'company_id' =>  $comp__->getId(),
					  'invoice_number' => $invoice->getId()
					  );

					$cashes = DatabaseObject_Cashflow::GetInvoices($this->db, $options_);
					
					if ($invoice->profile->invoice_valid){
						if ($invoice->profile->invoice_valid == 0.00){
							$valid_untl = $invoice->profile->invoice_date;
						}
						else {
							$valid_untl = date('d-m-Y', strtotime($invoice->profile->invoice_date . ' + ' . $invoice->profile->invoice_valid . ' days'));						}
					}
					else {
						$valid_untl = $invoice->profile->invoice_date;
					}
					
					$now_ = date('d-m-Y');
					
					if ($invoice->profile->paid or $invoice->profile->amountpay or (isset($publish) && strtotime($valid_untl) >= strtotime($now_)) or (isset($publish) && strtotime($valid_untl) < strtotime($now_))) {

    					$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Factura No');
    					$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Fecha');
    					$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Cliente');
					$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'ID Fiscal');
    					$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Base Imponible');
						
					$objPHPExcel->getActiveSheet()->SetCellValue('A' . $count_, $invoice->profile->start_letter . ' ' . $invoice->profile->number_zero . $invoice->invoice_number);
    					$objPHPExcel->getActiveSheet()->SetCellValue('B' . $count_, $invoice->profile->invoice_date);

					$title = $invoice->profile->thecompany;

        				### create aacute; from á, etc
        				$text = str_ireplace("\xE1", "a", $title);
        				$text = str_ireplace("\xE9", "e", $text); 
        				$text = str_ireplace("\xED", "i", $text);
        				$text = str_ireplace("\xF3", "o", $text);
        				$text = str_ireplace("\xFA", "u", $text);
        				$text = str_ireplace("\xF1", "n", $text);
        				// same but for UPPERCASE
        				$text = str_ireplace("\xC1", "A", $text);
        				$text = str_ireplace("\xC9", "E", $text); 
        				$text = str_ireplace("\xCD", "I", $text);
        				$text = str_ireplace("\xD3", "O", $text);
        				$text = str_ireplace("\xDA", "U", $text);
        				$text = str_ireplace("\xD1", "N", $text);

					$company_name =	htmlspecialchars($text);
						
					$objPHPExcel->getActiveSheet()->setCellValue('C' . $count_, $company_name);
					
					foreach ($client_ as $client) {
						if ($client->profile->thecompany){
							$objPHPExcel->getActiveSheet()->setCellValue('D' . $count_, $client->profile->identification);
						}
					}
					
					$st__ = number_format($invoice->profile->base, 2, ',', '.');
    					$objPHPExcel->getActiveSheet()->SetCellValue('E' . $count_, $st__ );

					foreach ($totalIva as $key => $label) {
						if ($label == 'iva_p_1') {
							$iva_t_1 = $iva_t_1 + $invoice->profile->$key;
							$iva_p_1 = $invoice->profile->iva_p_1;
						}
						elseif ($label == 'iva_p_2') {
							$iva_t_2 = $iva_t_2 + $invoice->profile->$key;
							$iva_p_2 = $invoice->profile->iva_p_2;
						}
						elseif ($label == 'iva_p_3') {
							$iva_t_3 = $iva_t_3 + $invoice->profile->$key;
							$iva_p_3 = $invoice->profile->iva_p_3;
						}
						elseif ($label == 'iva_p_4') {
							$iva_t_4 = $iva_t_4 + $invoice->profile->$key;
							$iva_p_4 = $invoice->profile->iva_p_4;
						}
						elseif ($label == 'iva_p_5') {
							$iva_t_5 = $iva_t_5 + $invoice->profile->$key;
							$iva_p_5 = $invoice->profile->iva_p_5;
						}
						elseif ($label == 'iva_p_6') {
							$iva_t_6 = $iva_t_6 + $invoice->profile->$key;
							$iva_p_6 = $invoice->profile->iva_p_6;
						}
						elseif ($label == 'iva_p_7') {
							$iva_t_7 = $iva_t_7 + $invoice->profile->$key;
							$iva_p_7 = $invoice->profile->iva_p_7;
						}
						elseif ($label == 'iva_p_8') {
							$iva_t_8 = $iva_t_8 + $invoice->profile->$key;
							$iva_p_8 = $invoice->profile->iva_p_8;
						}
						elseif ($label == 'iva_p_9') {
							$iva_t_9 = $iva_t_9 + $invoice->profile->$key;
							$iva_p_9 = $invoice->profile->iva_p_9;
						}
						elseif ($label == 'iva_p_10') {
							$iva_t_10 = $iva_t_10 + $invoice->profile->$key;
							$iva_p_10 = $invoice->profile->iva_p_10;
						}
					}
					
					$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'I.V.A ' . $iva_p_1 . '%');
					$st_iva__1 = number_format($iva_t_1, 2, ',', '.');
					$objPHPExcel->getActiveSheet()->SetCellValue('F' . $count_, $st_iva__1);
					$col_ = array ('G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
					$numb_++;
					
					if ($iva_p_2){
						$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'I.V.A ' . $iva_p_2 . '%');
						$st_iva__2 = number_format($iva_t_2, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('G' . $count_, $st_iva__2);
						//$numb_++;
					}
					/*
					if ($iva_p_3){
						$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'I.V.A' . $iva_p_3 . '%');
						$st_iva__3 = number_format($iva_t_3, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('H' . $count_, $st_iva__3);
						//$numb_++;
					}
					
					if (iva_p_4){
						$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'I.V.A ' . $iva_p_4 . '%');
						$st_iva__4 = number_format($iva_t_4, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('I' . $count_, $st_iva__4);
						//$numb_++;
					}
					
					if ($iva_p_5){
						$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'I.V.A ' . $iva_p_5 . '%');
						$st_iva__5 = number_format($iva_t_5, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('J' . $count_, $st_iva__5);
						//$numb_++;
					}
				
					if ($iva_p_6){
						$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'I.V.A ' . $iva_p_6 . '%');
						$st_iva__6 = number_format($iva_t_6, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('K' . $count_, $st_iva__6);
						//$numb_++;
					}
					
					if ($iva_p_7){
						$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'I.V.A ' . $iva_p_7 . '%');
						$st_iva__7 = number_format($iva_t_7, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('L' . $count_, $st_iva__7);
						//$numb_++;
					}
					
					if ($iva_p_8){
						$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'I.V.A ' . $iva_p_8 . '%');
						$st_iva__8 = number_format($iva_t_8, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('M' . $count_, $st_iva__8);
						//$numb_++;
					}
					
					if ($iva_p_9){
						$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'I.V.A ' . $iva_p_9 . '%');
						$st_iva__9 = number_format($iva_t_9, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('N' . $count_, $st_iva__9);
						//$numb_++;
					}
					
					if ($iva_p_10){
						$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'I.V.A ' . $iva_p_10 . '%');
						$st_iva__10 = number_format($iva_t_10, 2, ',', '.');
						$objPHPExcel->getActiveSheet()->SetCellValue('O' . $count_, $st_iva__10);
						//$numb_++;
					}*/

					
					foreach ($totalIva as $key => $label) {
						if ($label == 'Otros Imp.') {
							$iva2_t_ = $iva2_t_ + $invoice->profile->$key;
						}
					}
				
    					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Otros Imp.');
					$st_iva2__ = number_format($iva2_t_, 2, ',', '.');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, $st_iva2__);
					$numb_++;
					
    					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Retencion IRPF %');
					$tot_irpf = $invoice->profile->retention;
					$st_irpf = number_format($tot_irpf, 2, ',', '.');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, $st_irpf);
					$numb_++;
						
    					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Total');
					$st_tot__ = number_format($invoice->profile->total, 2, ',', '.');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, $st_tot__);
					$numb_++;
						
					if ($invoice->profile->paid) {
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Estatus');
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, 'Cobrada');
						$numb_++;
					}
					elseif($invoice->profile->amountpay){
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Estatus');
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, 'Parcialmente Cobrada');
						$numb_++;
					}
					elseif(isset($publish) && strtotime($valid_untl) >= strtotime($now_)){
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Estatus');
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, 'Pendiente');
						$numb_++;
					}
					elseif(isset($publish) && strtotime($valid_untl) < strtotime($now_)){
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Estatus');
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, 'Vencida');
						$numb_++;
					}
					else {
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Estatus');
						$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, 'Borrador');
						$numb_++;
					}
					
					$combo = '' ;
					
					foreach ($cashes as $cash) {
						$date_ = $cash->profile->datepay;
						$total__ = number_format($cash->profile->amountpay, 2, ',', '.');
						$total_ = $total__;
						$waypy_ = $cash->profile->waypay;
						$reference_ = $cash->profile->referencepay;
						$datail_ = $cash->profile->detailpay;
						
						$combo = $combo . $date_ . ', Monto:' . $total_ . ', Referencia:' . $reference_ . ', Forma Pago:' . $waypy_ . ', Detalle:' . $datail_ . '  ' ;

					}
											
					if (!$combo) {
						$combo = 'Sin Cobros';
					}	
					
			
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'Cobros');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . $count_, $combo);
					$numb_++;
					

					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '1', 'WebProAdmin');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '2', 'www.webproadmin.com');
					$objPHPExcel->getActiveSheet()->SetCellValue($col_[$numb_] . '3', 'soporte@webproadmin.com');
					
					$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
					$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
					$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(45);
					$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(25);
						
					$count_++;
					$iva_t_1 = 0;
					$iva_t_2 = 0;
					$iva_t_3 = 0;
					$iva_t_4 = 0;
					$iva_t_5 = 0;
					$iva_t_6 = 0;
					$iva_t_7 = 0;
					$iva_t_8 = 0;
					$iva_t_9 = 0;
					$iva_t_10 = 0;
					$iva2_t_ = 0;
					$iva_p_1 = '';
					$iva_p_2 = '';
					$iva_p_3 = '';
					$iva_p_4 = '';
					$iva_p_5 = '';
					$iva_p_6 = '';
					$iva_p_7 = '';
					$iva_p_8 = '';
					$iva_p_9 = '';
					$iva_p_10 = '';
					$numb_ = 0;
					$col_ = array ();	
					}	
				}

				$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
				$file_name = mt_rand();
				$route__ = $aroute . 'httpdocs/documents/invoices/xls/'.$file_name;
				$objWriter->save($route__ . '.xlsx');
				
				if (file_exists($route__ . '.xlsx')) {
    					header('Pragma: public'); // required
    					header('Expires: 0'); // no cache
    					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    					header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime($route__ . '.xlsx')).' GMT');
    					header('Cache-Control: private',false);
   					header('Content-Type: '.'application/vnd.ms-excel');
    					header('Content-Disposition: attachment; filename="'.basename($route__ . '.xlsx').'"');
    					header('Content-Transfer-Encoding: binary');
   					header('Content-Length: '.filesize($route__ . '.xlsx')); // provide file size
    					header('Connection: close');
					ob_clean();
            			flush();
    					readfile($route__ . '.xlsx');
    					exit();
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

			$this->view->valid_until = $valid_until;
			$this->view->total_iva_up_i = $total_iva_up_i;
			$this->view->total_iva_i = $total_iva_i;
			
			$this->view->month__ = $month__;
			
			$this->view->status_i = $status_i;
			
			//ends analytics	 for incomming/invoices	

        }

        public function fichafacturaAction()
        {
        		$this->breadcrumbs->addStep('Ficha Factura', $this->getUrl('fichafactura','contabilidad'));
			
	       	$request = $this->getRequest();
			$invoice_id = (int) $this->getRequest()->getQuery('id');
			
            $invoicei = new DatabaseObject_Invoice($this->db);	
            if (!$invoicei->loadForUser($this->identity->user_id, $invoice_id))
                $this->_redirect($this->getUrl('index','cuenta/index'));
				
			//user company's details
			$company = new DatabaseObject_Company($this->db);
            $company->loadForUser($this->identity->user_id);
			
			$this->view->company = $company;
			
			$options_ = array(
					  'user_id' => $this->identity->user_id,
					  'company_id' =>  $company->getId(),
					  'invoice_number' => $invoice_id
					  );

			$cashes = DatabaseObject_Cashflow::GetInvoices($this->db, $options_);
			
            $this->view->cashes = $cashes;
			
            $options = array(
                'user_id'  => $this->identity->user_id,
                'doc_type'   => 'company',
                'doc_id'   => $company->getId()
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			
            $invoice = new DatabaseObject_Invoice($this->db);
            $invoice->loadForUser($this->identity->user_id, $invoice_id);
			
			$this->view->invoice = $invoice;
			
			if ($invoice->profile->invoice_valid){
				if ($invoice->profile->invoice_valid == 0.00){
					$valid_until = $invoice->profile->invoice_date;
				}
				else {
					$valid_until = date('d-m-Y', strtotime($invoice->profile->invoice_date . ' + ' . $invoice->profile->invoice_valid . ' days'));
				}
			}
			else {
				$valid_until = $invoice->profile->invoice_date;
			}
			$this->view->valid_until = $valid_until;

            $options = array(
                'user_id' => $this->identity->user_id,
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
                'user_id'  => $this->identity->user_id,
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
            			$item_->loadForUser($this->identity->user_id, $id);
					$items[] = $item_;
					
					$this->view->items = $items;
        			}
			}
			
			if (!$invoice->profile->invoice_file){
				$mypdf1 = mt_rand();
			}
			else {
				$mypdf1 = $invoice->profile->invoice_file;
			}  
			
            $fp = new FormProcessor_SendInvoice($this->db, $mypdf1);
			
			$this->view->fp = $fp;
			
            $fp2 = new FormProcessor_PublishInvoice($this->db,
                                             $this->identity->user_id,
                                             $invoice_id, $mypdf1);	
			
           if ($request->getPost('download')) {
                  			if ($fp2->process($request)) { }
							$mypdf = $mypdf1.'.pdf';
							$myjpg = $mypdf1.'.png';
							$array= array();
							
							$config = Zend_Registry::get('config');
							$aroute = $config->paths->base2;
							$broute = $config->paths->data;
							$croute = $config->paths->ip;
							$droute = $config->paths->include;
							
							$url1 = $croute . '/documentos/invoice?id='.$invoice_id;
							$url2 = 'id2='.$this->identity->user_id;
							$url = $url1 . '\&' . $url2;
							$pdf = $aroute . 'httpdocs/documents/invoices/pdf/'.$mypdf;
							
							exec ('/usr/bin/wkhtmltopdf ' . $url . ' ' . $pdf. ' 2>&1', $array);
	
							
							////convert pdf to jpg using Phmagick
							include_once $droute . '/phmagick/phmagick.php';
							$jpg = new phmagick($aroute . 'httpdocs/documents/invoices/pdf/'. $mypdf, $aroute . 'httpdocs/documents/invoices/view/'. $myjpg);
							$jpg->setImageQuality(100);
							$jpg->convert();

							//create preview for home
							$preview = new phmagick($aroute . 'httpdocs/documents/invoices/pdf/'. $mypdf, $aroute . 'httpdocs/documents/invoices/preview/'. $myjpg);
							$preview->setImageQuality(100);
							$preview->resize(160,0);
						
						if (file_exists($aroute . 'httpdocs/documents/invoices/pdf/'.$mypdf)) {
    								header('Pragma: public'); // required
    								header('Expires: 0'); // no cache
    								header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    								header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime($aroute . 'httpdocs/documents/invoices/pdf/'.$mypdf)).' GMT');
    								header('Cache-Control: private',false);
   						 		header('Content-Type: '.'application/pdf');
    								header('Content-Disposition: attachment; filename="'.basename($aroute . 'httpdocs/documents/invoices/pdf/'.$mypdf).'"');
    								header('Content-Transfer-Encoding: binary');
   								header('Content-Length: '.filesize($aroute . 'httpdocs/documents/invoices/pdf/'.$mypdf)); // provide file size
    								header('Connection: close');
								ob_clean();
            						flush();
    								readfile($aroute . 'httpdocs/documents/invoices/pdf/'.$mypdf);
    								exit();
						}	
				}
        }

        public function fichagastoAction()
        {
        		$this->breadcrumbs->addStep('Ficha Gasto', $this->getUrl('fichagasto','contabilidad'));
			
       		$request = $this->getRequest();
			$expense_id = (int) $this->getRequest()->getQuery('id');
			
            $expensei = new DatabaseObject_Expense($this->db);	
            if (!$expensei->loadForUser($this->identity->user_id, $expense_id))
                $this->_redirect($this->getUrl('index','cuenta/index'));
				
			//user company's details
			$company = new DatabaseObject_Company($this->db);
            $company->loadForUser($this->identity->user_id);
			
			$this->view->company = $company;
			
			$options_ = array(
					  'user_id' => $this->identity->user_id,
					  'company_id' =>  $company->getId(),
					  'expense_number' => $expense_id
					  );

			$cashes = DatabaseObject_Cashexpense::GetExpenses($this->db, $options_);
			
			$this->view->cashes = $cashes;
			
            $options = array(
                'user_id'  => $this->identity->user_id,
                'doc_type'   => 'company',
                'doc_id'   => $company->getId()
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			
            $expense = new DatabaseObject_Expense($this->db);
            $expense->loadForUser($this->identity->user_id, $expense_id);
			
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
                'user_id' => $this->identity->user_id,
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
                'user_id'  => $this->identity->user_id,
                'document_type'   => 'expense',
                'document_id'   => $expense_id
            );

            $items = DatabaseObject_Expitem::GetItems($this->db, $options);
			$items2 = DatabaseObject_Expitem::GetItems($this->db, $options);
			$items3 = DatabaseObject_Expitem::GetItems($this->db, $options);

			$iva_o = array();
			$iva2_o = array();
			
            foreach ($items as $item) {
				$iva_o[] = $item->profile->iva_p;
			}
			
            foreach ($items as $item) {
				$iva2_o[] = $item->profile->iva_p2;
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
            		if ($item->profile->iva_p != $iva__){
            			$a++;
            			$ivas_[$a] = $item->profile->iva_p_total;
					$iva__ = $item->profile->iva_p;
				}
				else {
					$ivas_[$a] = $ivas_[$a] + $item->profile->iva_p_total;	
				}
			}
			
			$this->view->ivas_ = $ivas_;
			
			$b = 0;
			$iva2__ = 0;
			$ivas2_ = array();
            foreach ($items3 as $item) {
            		if ($item->profile->iva_p2 != $iva2__){
            			$b++;
            			$ivas2_[$b] = $item->profile->iva_p2_total;
					$iva2__ = $item->profile->iva_p2;
				}
				else {
					$ivas2_[$b] = $ivas2_[$b] + $item->profile->iva_p2_total;	
				}
			}
			
			$this->view->ivas2_ = $ivas2_;
			
			
			if ($expense->profile->items){
				if (!is_array($expense->profile->items))
                		$expense->profile->items = array($expense->profile->items);
			
				foreach ($expense->profile->items as $id){
            			$item_ = new DatabaseObject_Expitem($this->db);
            			$item_->loadForUser($this->identity->user_id, $id);
					$items[] = $item_;
					
					$this->view->items = $items;
        			}
			}
			
			if (!$expense->profile->expense_file){
				$mypdf1 = mt_rand();
			}
			else {
				$mypdf1 = $expense->profile->expense_file;
			}
			
            $fp = new FormProcessor_SendExpense($this->db, $mypdf1);
			
			$this->view->fp = $fp;
			
            $fp2 = new FormProcessor_PublishExpense($this->db,
                                             $this->identity->user_id,
                                             $expense_id, $mypdf1);	

           if ($request->getPost('download')) {
                  			if ($fp2->process($request)) { }
							$mypdf = $mypdf1.'.pdf';
							$myjpg = $mypdf1.'.png';
							$array= array();
							
							$config = Zend_Registry::get('config');
							$aroute = $config->paths->base2;
							$broute = $config->paths->data;
							$croute = $config->paths->ip;
							$droute = $config->paths->include;
							
							$url1 = $croute . '/documentos/expense?id='.$expense_id;
							$url2 = 'id2='.$this->identity->user_id;
							$url = $url1 . '\&' . $url2;
							$pdf = $aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf;
							
							exec ('/usr/bin/wkhtmltopdf ' . $url . ' ' . $pdf. ' 2>&1', $array);
							////convert pdf to jpg using Phmagick
							include_once $droute . '/phmagick/phmagick.php';
							$jpg = new phmagick($aroute . 'httpdocs/documents/expenses/pdf/'. $mypdf, $aroute . 'httpdocs/documents/expenses/view/'. $myjpg);
							$jpg->setImageQuality(100);
							$jpg->convert();
							//create preview for home
							$preview = new phmagick($aroute . 'httpdocs/documents/expenses/pdf/'. $mypdf, $aroute . 'httpdocs/documents/expenses/preview/'. $myjpg);
							$preview->setImageQuality(100);
							$preview->resize(160,0);
						if (file_exists($aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf)) {
    								header('Pragma: public'); // required
    								header('Expires: 0'); // no cache
    								header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    								header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime($aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf)).' GMT');
    								header('Cache-Control: private',false);
   						 		header('Content-Type: '.'application/pdf');
    								header('Content-Disposition: attachment; filename="'.basename($aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf).'"');
    								header('Content-Transfer-Encoding: binary');
   								header('Content-Length: '.filesize($aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf)); // provide file size
    								header('Connection: close');
								ob_clean();
			            			flush();
    								readfile($aroute . 'httpdocs/documents/expenses/pdf/'.$mypdf);
    								exit();
						}			
				}
        }

    }
?>