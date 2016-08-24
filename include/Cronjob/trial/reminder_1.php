/*<?php

		    require_once '/var/www/httpdocs/cron.php';
	
			$templater = new Templater();
			
			$options = array(
                'user_type' => 'proprietary'
            );
			
			//sweet trick. We have to call the db. Directly, not using $this->db, because there is no user.
			$db1 = Zend_Registry::get('db');

            $users = DatabaseObject_UserEmployee::GetUsers3($db1, $options);

			foreach ($users as $user){
				if (!$user->profile->removed){
					$date1 = $user->ts_created;
					$date2 = time();
	
	   				$dStart = $date1;
	   				$dEnd  = $date2;
					
     				$datediff = $dEnd - $dStart;
     				$days = floor($datediff/(60*60*24));
					
					$complete_name = $user->profile->first_name . ' ' . $user->profile->last_name;
					$just_name = $user->profile->first_name;
					$username_ = $user->username;
					$email_ = $user->profile->email;
					if ($complete_name){ $thename = $complete_name; } else{ $thename = $username_;}
					if ($just_name){ $jname = $just_name; } else{ $jname = $username_;}
					
		      		if($days == 9) {
		      		 	
						$subject = ucfirst($jname) . ': ¡Te quedan 21 días de prueba!';
						 
						$body= file_get_contents('http://97.74.6.234/newsletters/9d.html');
				
				        $mail = new Zend_Mail('UTF-8');
						//$mail->addTo('dlsarmiento@gmail.com', trim('Diego' . ' ' . 'Sarmiento'));
						$mail->addTo($email_, $thename);
				        $mail->setFrom('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
						$mail->setReplyTo('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
				        $mail->setSubject(trim($subject));
				        $mail->setBodyHtml($body);
				        $mail->send();
				     }
					
					 elseif($days == 16) {
		      		 	
						$subject = ucfirst($jname) . ': ¡Te quedan 14 días de prueba!';
						 
						$body= file_get_contents('http://97.74.6.234/newsletters/16d.html');
				
				        $mail = new Zend_Mail('UTF-8');
						//$mail->addTo('dlsarmiento@gmail.com', trim('Diego' . ' ' . 'Sarmiento'));
						$mail->addTo($email_, $thename);
				        $mail->setFrom('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
						$mail->setReplyTo('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
				        $mail->setSubject(trim($subject));
				        $mail->setBodyHtml($body);
				        $mail->send();
				     }
					 
		      		 elseif($days == 23) {
		      		 	
						$subject = ucfirst($jname) . ': ¡Te quedan 7 días de prueba!';
						 
						$body= file_get_contents('http://97.74.6.234/newsletters/23d.html');
				
				        $mail = new Zend_Mail('UTF-8');
						//$mail->addTo('dlsarmiento@gmail.com', trim('Diego' . ' ' . 'Sarmiento'));
						$mail->addTo($email_, $thename);
				        $mail->setFrom('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
						$mail->setReplyTo('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
				        $mail->setSubject(trim($subject));
				        $mail->setBodyHtml($body);
				        $mail->send();
				     }
					
		      		 elseif($days == 27) {
		      		 	
						$subject = ucfirst($jname) . ': ¡Te quedan 3 días de prueba!';
						 
						$body= file_get_contents('http://97.74.6.234/newsletters/27d.html');
				
				        $mail = new Zend_Mail('UTF-8');
						//$mail->addTo('dlsarmiento@gmail.com', trim('Diego' . ' ' . 'Sarmiento'));
						$mail->addTo($email_, $thename);
				        $mail->setFrom('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
						$mail->setReplyTo('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
				        $mail->setSubject(trim($subject));
				        $mail->setBodyHtml($body);
				        $mail->send();
				     }
					 
		      		 elseif($days == 29) {
		      		 	
						$subject = ucfirst($jname) . ': ¡Te quedan 1 día de prueba!';
						 
						$body= file_get_contents('http://97.74.6.234/newsletters/29d.html');
				
				        $mail = new Zend_Mail('UTF-8');
						//$mail->addTo('dlsarmiento@gmail.com', trim('Diego' . ' ' . 'Sarmiento'));
						$mail->addTo($email_, $thename);
				        $mail->setFrom('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
						$mail->setReplyTo('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
				        $mail->setSubject(trim($subject));
				        $mail->setBodyHtml($body);
				        $mail->send();
				     }
					
		      		 elseif($days == 30) {
		      		 	
						$subject = ucfirst($jname) . ': Tu período de prueba ha finalizado';
						 
						$body= file_get_contents('http://97.74.6.234/newsletters/30d.html');
				
				        $mail = new Zend_Mail('UTF-8');
						//$mail->addTo('dlsarmiento@gmail.com', trim('Diego' . ' ' . 'Sarmiento'));
						$mail->addTo($email_, $thename);
				        $mail->setFrom('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
						$mail->setReplyTo('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
				        $mail->setSubject(trim($subject));
				        $mail->setBodyHtml($body);
				        $mail->send();
				     }
					 
		      		 elseif($days == 37) {
		      		 	
						$subject = ucfirst($jname) . ': Acceso permanente a tus documentos';
						 
						$body= file_get_contents('http://97.74.6.234/newsletters/37d.html');
				
				        $mail = new Zend_Mail('UTF-8');
						//$mail->addTo('dlsarmiento@gmail.com', trim('Diego' . ' ' . 'Sarmiento'));
						$mail->addTo($email_, $thename);
				        $mail->setFrom('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
						$mail->setReplyTo('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
				        $mail->setSubject(trim($subject));
				        $mail->setBodyHtml($body);
				        $mail->send();
				     }
					 
		      		 elseif($days == 44) {
		      		 	
						$subject = ucfirst($jname) . ': No hemos tenido noticias tuyas últimamente';
						 
						$body= file_get_contents('http://97.74.6.234/newsletters/44d.html');
				
				        $mail = new Zend_Mail('UTF-8');
						//$mail->addTo('dlsarmiento@gmail.com', trim('Diego' . ' ' . 'Sarmiento'));
						$mail->addTo($email_, $thename);
				        $mail->setFrom('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
						$mail->setReplyTo('info@webproadmin.com', trim('Info' . ' ' . 'WebProAdmin'));
				        $mail->setSubject(trim($subject));
				        $mail->setBodyHtml($body);
				        $mail->send();
				     }
				 }
			}
?>*/