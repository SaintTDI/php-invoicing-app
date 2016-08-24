<?php
    class FormProcessor_UserPayment extends FormProcessor
    {
        protected $db = null;
        public $user = null;

        public function __construct($db, $user_id)
        {
            parent::__construct();

            $this->db = $db;
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);

			$this->plan = $this->user->profile->plan;
			$this->transaction = $this->user->profile->transaction;
			$this->transaction_date = $this->user->profile->transaction_date;
			$this->transaction_paid = $this->user->profile->transaction_paid;
        }

        public function process(Zend_Controller_Request_Abstract $request)
        {
			// validate the plan
            $this->plan = $this->sanitize($request->getPost('plan'));
            if (strlen($this->plan) == 0)
                $this->addError('plan', 'Por favor selecciona el plan de mejor se ajuste a sus necesidades.');
            else
                $this->user->profile->plan = $this->plan;
			
			// transaction info
            $this->transaction = $this->sanitize($request->getPost('transaction'));
            $this->user->profile->transaction = $this->transaction;
			
			// transaction info
            $this->transaction_date = $this->sanitize($request->getPost('transaction_date'));
            $this->user->profile->transaction_date = $this->transaction_date;
			
			// transaction info
            $this->transaction_paid = $this->sanitize($request->getPost('transaction_paid'));
            $this->user->profile->transaction_paid = $this->transaction_paid;
			
			if ($this->user->profile->plan == 'plan5'){
				$numb_usuarios = '5';
				$theplan = 'Plan CINCO';
			}
			elseif ($this->user->profile->plan == 'plan3'){
				$numb_usuarios = '3';
				$theplan = 'Plan TRES';
			}
			else {
				$numb_usuarios = '1';
				$theplan = 'Plan UNO';
			}

            // if no errors have occurred, save the user
            if (!$this->hasError()) {
                $this->user->save();
			
				////////////email starts here
			    $templater = new Templater();
	
	 			//new stuff
			    $body= file_get_contents('http://97.74.6.234/newsletters/2ad.html');
				
				$body .='<tr><td style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; padding: 8px; margin:5px; vertical-align: top; text-align: justify;"><img src="http://97.74.6.234/newsletters/images/carolina.png" alt="Carolina Calero" style="float:left; padding-right:8px;"> <p>Hola ' . $this->user->profile->first_name .  ',</p>' ."\r\n";
				
				$body .='<p>&iexcl;Muchas gracias por contratar el plan ' . $this->user->profile->plan . ' en <strong>WebProAdmin</strong>&#x21;</p>' . "\r\n";
				
				$body .=' <p>El plan ' . $theplan . ' te da acceso a '. $numb_usuarios .  ' usuario(s) en tu cuenta, un acceso especial para tu gestor contable, y total funcionalidad en todos los m&oacute;dulos de <strong>WebProAdmin</strong></p></td></tr>' . "\r\n";
							
				$body .= file_get_contents('http://97.74.6.234/newsletters/2bd.html');
				// ends new stuff

		        $subject =$this->user->profile->first_name .', confirmado: ¡Ya eres parte de WebProAdmin!';

            		$mail = new Zend_Mail('UTF-8');

            		$mail->addTo($this->user->profile->email, trim($this->user->profile->first_name . ' ' . $this->user->profile->last_name));
	        		$mail->setFrom('soporte@webproadmin.com', trim('Soporte' . ' ' . 'WebProAdmin'));
				$mail->setReplyTo('soporte@webproadmin.com', 'WebProAdmin');
            		$mail->setSubject(trim($subject));
            		$mail->setBodyHtml($body);
            		$mail->send();
				///////////email ends here

            }

            // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>