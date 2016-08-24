/*<?php

		    require_once '/var/www/app/httpdocs/cron.php';
	
			$templater = new Templater();
			
			$day_ = date("N");
			
			if ($day_ == 1){
				
				$options = array(
	                'user_type' => 'proprietary'
	            );
				
				//sweet trick. We have to call the db. Directly, not using $this->db, because there is no user.
				$db1 = Zend_Registry::get('db');
	
	            $users = DatabaseObject_UserEmployee::GetUsers3($db1, $options);		
				
				foreach ($users as $user){
					$user_company = $user->company;
				    if ($user_company){
					   if (!$user->profile->weekly_removed){		
							//dates
							$now = date('d-m-Y');
							$day_ = date('d');
							$month_ = date('M');
							$year_ = date('Y');
							$a = 0;
							$b = 0;
							$c = 0;
							$d = 0;
							//$now = strtotime($now_);
							
							$next_week = date('d-m-Y', strtotime('+7 day'));
							//$next_week =  strtotime($next_week_);
							
							$last_week = date('d-m-Y', strtotime('-7 day'));
							//$last_week =  strtotime($last_week_);
							
							//user info
							$complete_name = $user->profile->first_name . ' ' . $user->profile->last_name;
							$just_name = $user->profile->first_name;
							$username_ = $user->username;
							$email_ = $user->profile->email;
							
							//user company
							$company = new DatabaseObject_Company($db1);
	           				$company->loadForUser($user_company);
							
							$thecompany_ = $company->thecompany;
							
							$currency =  $company->profile->currency;
						
							if ($currency == 'Peso Argentino') {$curr_1 ='ARS &#';} 
							elseif ($currency == 'Peso Boliviano') {$curr_1 ='b&#36';} 
							elseif ($currency == 'Peso Chileno') {$curr_1 ='CLP &#36;';}
							elseif ($currency == 'Peso Colombiano') {$curr_1 ='COP &#36;';} 
							elseif ($currency == 'Colon') {$curr_1 ='&#162;';} 
							elseif ($currency == 'Peso Dominicano') {$curr_1 ='DOP &#36;';}
							elseif ($currency == 'Dolar') {$curr_1 ='USD &#36;';} 
							elseif ($currency == 'Euro') {$curr_1 ='&#128;';} 
							elseif ($currency == 'Quetzal') {$curr_1 ='QTD Q';} 
							elseif ($currency == 'Lempira') {$curr_1 ='HNL L';} 
							elseif ($currency == 'Peso Mexicano') {$curr_1 ='MXN &#36;';} 
							elseif ($currency == 'Cordoba') {$curr_1 ='C&#36;';} 
							elseif ($currency == 'Balboa') {$curr_1 ='PAB B/.';} 
							elseif ($currency == 'Guarani') {$curr_1 ='&#8370;';} 
							elseif ($currency == 'Nuevo Sol') {$curr_1 ='PEN S/.';} 
							elseif ($currency == 'Libra') {$curr_1 ='&#163;';} 
							elseif ($currency == 'Peso Uruguayo') {$curr_1 ='UYU &#36;';} 
							elseif ($currency == 'Bolivar') {$curr_1 ='VEF Bs.';} 
							else {$curr_1 ='&#128;';}
						
							//user tasks
			   				$options = array(
	                				'user_id' => $user_company
	           	 			);
	
	            				$tasks = DatabaseObject_Task::GetAllTasks($db1, $options);		
								
							$task_titles = array();
							$projects = array();
							$ends = array();
							$events = 0;
							
							foreach($tasks as $task){
							
						    $task_title = $task->profile->task_title;
							$project = $task->profile->project;
							$end = $task->profile->ends;
								  
							if (strtotime($end) >= strtotime($now) && strtotime($end) <= strtotime($next_week)){
								$task_titles[] = $task_title;
								$projects[] = $project;
								$ends[] = $end;
								$events++;
							  }
							 }
							
							//user invoices
			   				$options = array(
	                				'user_id' => $user_company
	           	 			);	
							
	            				$invoices = DatabaseObject_Invoice::GetAllInvoices($db1, $options);
	
							$totals = 0;
							$companys = array();
							$amount = array();
							$total_invoice = 0;
							
							$totals2 = 0;
							$companys2 = array();
							$amount2 = array();
							$total_invoice2 = 0;
							
							
							//lo que ha facturado
							foreach($invoices as $invoice){
							
						    $total2 = $invoice->profile->total;
							$company2 = $invoice->profile->thecompany;
							$end2 = $invoice->profile->invoice_date;
								  
							if (strtotime($end2) <= strtotime($now) && strtotime($last_week) <= strtotime($end2)){
								$totals2 += $total2;
								$companys2[] = $company2;
								$total_invoice2++;

								$total1 = number_format($total2, 2,',', '.');
								
								$amount2[] = $total1 . ' ' . $curr_1;
							  }
							 }
							
							if (!$totals2){
								$totals2 = 0;
							}
							
							$total1 = number_format($totals2, 2, ',', '.');
							
							$invoiced = $total1 . ' ' . $curr_1;
							
							//lo que se vencerá
							foreach($invoices as $invoice){
							
						    $total = $invoice->profile->total;
							$company = $invoice->profile->thecompany;
							$end_ = $invoice->profile->invoice_date;
							$paid = $invoice->profile->paid;

							if ($invoice->profile->invoice_valid){
								if ($invoice->profile->invoice_valid == 0.00){
									$end = $invoice->profile->invoice_date;
								}
								else {
									$end = date('d-m-Y', strtotime($invoice->profile->invoice_date . ' + ' . $invoice->profile->invoice_valid . ' days'));
								}
							}
							else {
								$end = $invoice->profile->invoice_date;
							}
								  
							if (strtotime($end) >= strtotime($now) && strtotime($end) <= strtotime($next_week) && !$paid){
								$totals += $total;
								$companys[] = $company;
								$total_invoice++;
								
								$total1 = number_format($total, 2, ',', '.');
								
								$amount[] = $total1 . ' ' . $curr_1;
							  }
							 }
							
							if (!$totals){
								$totals = 0;
							}
							
							$total1 = number_format($totals, 2, ',', '.');
							
							$expired = $total1 . ' ' . $curr_1;
							
							//user expenses
			   				$options = array(
	                				'user_id' => $user_company
	           	 			);
							
	            				$expenses = DatabaseObject_Expense::GetAllExpenses($db1, $options);
							
							$totals3 = 0;
							$companys3 = array();
							$total_expenses = 0;
							$amount3 = array();
							
							//lo que hay que pagar
							foreach($expenses as $expense){
							
						    $total3 = $expense->profile->total;
							$company3 = $expense->profile->thecompany;
							$paid_ = $expense->profile->paid;
							
								if ($expense->profile->expense_valid){
									if ($expense->profile->expense_valid == 0.00){
										$end3 = $expense->profile->expense_date;
									}
									else {
										$end3 = date('d-m-Y', strtotime($expense->profile->expense_date . ' + ' . $expense->profile->expense_valid . ' days'));
									}
								}
								else {
									$end3 = $expense->profile->expense_date;
								}
								  
								if (strtotime($end3) >= strtotime($now) && strtotime($end3) <= strtotime($next_week) && !$paid_){
									$totals3 += $total3;
									$companys3[] = $company3;
									$total_expenses++;
	
									$total1 = number_format($total3, 2, ',', '.');
									
									$amount3[] = $total1 . ' ' . $curr_1;
								   }
							 }
							
							if (!$totals3){
								$totals3 = 0;
							}
							
							$total1 = number_format($totals3, 2, ',', '.');
							
							$topay = $total1 . ' ' . $curr_1;
						
							if ($complete_name){ $thename = $complete_name; } else{ $thename = $username_;}
							if ($just_name){ $jname = ucfirst($just_name);  } else{ $jname = ucfirst($username_);}
							if ($thecompany_){$comp_ = ucfirst($thecompany_);  } else{ $comp_ = 'Tu Compa&ntilde;ia';}
							 
			 				//new stuff
					        $body= file_get_contents('http://97.74.6.234/newsletters/3ad.html');
							
							$body .='<tr><td style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; padding: 4px; margin:5px; vertical-align: top; text-align: left;">Hola ' . $jname . ',</td></tr>' ."\r\n";
							
							$body .='<tr><td style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; padding: 4px; margin:5px; vertical-align: top; text-align: left;">Este es el reporte semanal de <strong>' . $comp_ . '</strong>, hasta el <strong>' .  $day_ . '</strong> de <strong>' . $month_ . '</strong> de <strong>' . $year_ . '</strong>.</td></tr>' ."\r\n";
							
							//Tasks
							$body .='<tr><td style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; padding: 4px; margin:5px; vertical-align: top; text-align: left;">Esta semana tienes programado en agenda <strong>' . $events . ' Eventos</strong>.<br> Comprueba el estatus de tu <a href="https://app.webproadmin.com/proyectos/index" target="_blank" style="color: #000; font-weight:600; text-decoration: none;">Agenda</a>.</td></tr>' .  "\r\n";
	
							if (!empty($task_titles)){$body .='<tr><td style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; vertical-align: top; text-align: left;"><table bgcolor="#dad8d6" cellpadding="0" cellspacing="0" border="0" width="500" class="the_table" style="font-size:13px; color:#000; border-spacing: 10px; border-collapse: separate; max-width: 600px; width:600px;">'.  "\r\n";
							foreach ($task_titles as $taa_) {
								$body .='<tr><td width="33%" style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; color: #000; padding: 4px; margin:5px; vertical-align: top; text-align: left;">' . $projects[$a] . '</td>'.  "\r\n";
								$body .='<td width="33%" style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; color: #000; padding: 4px; margin:5px; vertical-align: top; text-align: left;"><strong>' . $task_titles[$a] . '</strong></td>'.  "\r\n";
								$body .='<td width="33%" style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; color: #000; padding: 4px; margin:5px; vertical-align: top; text-align: left;">' . $ends[$a] . '</td></tr>'.  "\r\n";
								$a++;
							}
							$body .='</table></td></tr>' .  "\r\n";}
																				
							//facturado
							$body .='<tr><td style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; padding: 4px; margin:5px; vertical-align: top; text-align: left;">En la semana has facturado <span style="background-color: #89d2e6;"><strong>' . $invoiced . '</strong></span>.</td></tr>' .  "\r\n";
	
							if (!empty($companys2)){$body .='<tr><td style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; vertical-align: top; text-align: left;"><table bgcolor="#89d2e6" cellpadding="0" cellspacing="0" border="0" width="500" class="the_table" style="font-size:13px; color:#000; border-spacing: 10px; border-collapse: separate; max-width: 600px; width:600px;">'.  "\r\n";
							foreach ($companys2 as $coo2_) {
								$body .='<tr><td width="50%" style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; color: #000; padding: 4px; margin:5px; vertical-align: top; text-align: left;">' . $companys2[$b] . '</td>'.  "\r\n";
								$body .='<td width="50%" style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; color: #000; padding: 4px; margin:5px; vertical-align: top; text-align: left;"><strong>' . $amount2[$b] . '</strong></td></tr>'.  "\r\n";
								$b++;
							}
						   $body .= '</table></td></tr>' .  "\r\n";}

							//facturado lo que se vencerá
							$body .='<tr><td style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; padding: 4px; margin:5px; vertical-align: top; text-align: left;">Esta semana vencer&aacute;n facturas por cobrar a clientes por importe de <span style="background-color: #f5e85b;"><strong>' . $expired . '</strong></span>.<br> &iquest;Has enviado ya todas tus facturas? Crea una <a href="https://app.webproadmin.com/herramientas/facturas/index" target="_blank" style="color: #000; font-weight:600; text-decoration: none;">nueva factura</a>.</td></tr>' .  "\r\n";

							if (!empty($companys)){$body .='<tr><td style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; vertical-align: top; text-align: left;"><table bgcolor="#f5e85b" cellpadding="0" cellspacing="0" border="0" width="500" class="the_table" style="font-size:13px; color:#000; border-spacing: 10px; border-collapse: separate; max-width: 600px; width:600px;">'.  "\r\n";
							foreach ($companys as $coo_) {
								$body .='<tr><td width="50%" style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; color: #000; padding: 4px; margin:5px; vertical-align: top; text-align: left;">' . $companys[$c] . '</td>'.  "\r\n";
								$body .='<td width="50%" style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; color: #000; padding: 4px; margin:5px; vertical-align: top; text-align: left;"><strong>' . $amount[$c] . '</strong></td></tr>'.  "\r\n";
								$c++;
							}
							$body .='</table></td></tr>' .  "\r\n";}
							
							//gastado
							$body .='<tr><td style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; padding: 4px; margin:5px; vertical-align: top; text-align: left;">Esta semana vencer&aacute;n facturas por pagar a proveedores por importe de <span style="background-color: #fecf84;"><strong>' . $topay . '</strong></span>.<br> Comprueba el detalle de tus <a href="https://app.webproadmin.com/herramientas/gastos/index" target="_blank" style="color: #000; font-weight:600; text-decoration: none;">gastos</a>.</td></tr>' .  "\r\n";

							if (!empty($companys3)){$body .='<tr><td style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; vertical-align: top; text-align: left;"><table bgcolor="#fecf84" cellpadding="0" cellspacing="0" border="0" width="500" class="the_table" style="font-size:13px; color:#000; border-spacing: 10px; border-collapse: separate; max-width: 600px; width:600px;">'.  "\r\n";
							foreach ($companys3 as $coo3_) {
									$body .='<tr><td width="50%" style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; color: #000; padding: 4px; margin:5px; vertical-align: top; text-align: left;">' . $companys3[$d] . '</td>'.  "\r\n";
									$body .='<td width="50%" style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; color: #000; padding: 4px; margin:5px; vertical-align: top; text-align: left;"><strong>' . $amount3[$d] . '</strong></td></tr>'.  "\r\n";
									$d++;
							}
							$body .='</table></td></tr>' .  "\r\n";}
							
						    $body .= file_get_contents('http://97.74.6.234/newsletters/3bd.html');
							// ends new stuff
							
							$subject = $jname . ': Tu Reporte Semanal';
									
					        $mail = new Zend_Mail('UTF-8');
							//$mail->addTo('dlsarmiento@gmail.com', trim('Diego' . ' ' . 'Sarmiento'));
							$mail->addTo($email_, $thename);
					        $mail->setFrom('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
							$mail->setReplyTo('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
					        $mail->setSubject(trim($subject));
					        $mail->setBodyHtml($body);
					        $mail->send();
					        
					        //delay between users
					        $user_company = 0;
							$task_titles = array();
							$projects = array();
							$ends = array();
							$events = 0;
							$totals = 0;
							$companys = array();
							$amount = array();
							$total_invoice = 0;
							$totals2 = 0;
							$total1 = 0;
							$companys2 = array();
							$amount2 = array();
							$total_invoice2 = 0;
							$totals3 = 0;
							$companys3 = array();
							$amount3 = array();
							$total_expenses = 0;
							$a = 0;
							$b = 0;
							$c = 0;
							$d = 0;
					        sleep(1);
					   }
				    }
				}
			}
?>*/