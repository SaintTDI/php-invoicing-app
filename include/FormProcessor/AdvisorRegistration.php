<?php
    class FormProcessor_AdvisorRegistration extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		protected $_validateOnly = false;

        public function __construct($db)
        {
            parent::__construct();
            $this->db = $db;
            $this->user = new DatabaseObject_User($db);
			$this->advisor = new DatabaseObject_Advisor($db);
        }
		
		public function validateOnly($flag)
		{
			$this->_validateOnly = (bool) $flag;
		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
			// creo password temporal
			 $this->_newPassword = Text_Password::create(8);
			 $this->phone = $this->sanitize($request->getPost('phone'));
		
			
            // validate users first name
			 $this->first_name = $this->sanitize($request->getPost('first_name'));
            if (strlen($this->first_name) == 0)
                $this->addError('first_name', 'Disculpe, defina su nombre o el de su organizaci&oacute;n');
            else
                $this->user->profile->first_name = $this->first_name; 
        	
            $this->country = $this->sanitize($request->getPost('country'));
            $this->user->profile->country = $this->country;
			
            $this->password = '0000000001';
            $this->user->password = $this->password;
						
            $this->user_type = $this->sanitize($request->getPost('user_type'));
            $this->user->user_type = $this->user_type;
			
			if ($this->user_type == 'advisor'){
				$this->prefix = 'adv';
			}
			else{
				$this->prefix = 'asc';
			}
        	
			$this->number_ = mt_rand();
			$this->country_ =  strtolower($this->country);
			$this->name_ = $this->prefix . $this->number_ . $this->country_;
			
            $this->username = $this->name_;
            $this->user->username = $this->username;


            // validate the e-mail address
            $this->email_ = $this->sanitize($request->getPost('email'));
			$this->email = strtolower($this->email_);
            $validator = new Zend_Validate_EmailAddress();

            if (strlen($this->email) == 0)
                $this->addError('email', 'Por favor introduzca una direcci&oacute;n electr&oacute;nica');
            else if (!$validator->isValid($this->email))
                $this->addError('email', 'Por favor introduzca una direcci&oacute;n electr&oacute;nica v&aacute;lida.');
          	else if ($this->user->emailExists($this->email))
                $this->addError('email', 'Disculpe, la direcci&oacute;n electr&oacute;nica ya existe.');
            else
                $this->user->profile->email = $this->email;
				

            $this->plan = 'plan_advisor';
            $this->user->profile->plan = $this->plan;
			
			// agreement
			 $this->agreement = $this->sanitize($request->getPost('agreement'));
            if ($this->agreement != 'yes')
                $this->addError('agreement', 'Disculpe, para ser miembro debe aceptar nuestras condiciones.');
            else
                $this->user->profile->agreement = $this->agreement; 

            // validate CAPTCHA phrase

            $session = new Zend_Session_Namespace('captcha');
            $this->captcha = $this->sanitize($request->getPost('captcha'));

            if ($this->captcha != $session->phrase)
                $this->addError('captcha', 'Por favor introduzca la frase correcta');

            // if no errors have occurred, save the user
            if (!$this->_validateOnly && !$this->hasError()) {
                $this->user->save();
				
			// define user's company default
			$this->user->company =  $this->user->getId();
												   
			$this->invited = $this->sanitize($request->getPost('invited'));
            	$this->user->profile->invited = $this->invited; 
				 
			$this->invitation_code = $this->sanitize($request->getPost('invitation_code'));
            	$this->user->profile->invitation_code = $this->invitation_code;
				
	        $this->user->profile->new_password = md5($this->_newPassword);
	        $this->user->profile->new_password_ts = time();
	        $this->user->profile->new_password_key = md5(uniqid() .
	                                                   $this->user->getId() .
	                                                   $this->_newPassword);

			
			if ($this->user_type == 'advisor'){
				if ($this->invited && $this->invitation_code){
					
            				$this->advisor->loadForUser($this->invitation_code, $this->invited);
					
						if ($this->advisor->isSaved()){
							//presenting
							//$this->invitation_code_ = $this->advisor->user_id;
							//$this->email_ = $this->advisor->email;
						    $this->user_ = $this->advisor->profile->user_id_;
							//variables
							//$this->invitation_code_ = $this->invitation_code;
							//$this->email_ = $this->email;
						    $this->user_ = $this->user->getId();										
							//last
							//$this->advisor->user_id = $this->invitation_code_;
							//$this->advisor->email = $this->email_;
						    	$this->advisor->profile->user_id_ = $this->user_;
							$this->advisor->save();
						}
				}
			}
			
			$this->user->save();
			
			////////////email starts here
			if (!$this->invited){
			    $templater = new Templater();
		        // fetch the e-mail body
		        $body ='<p>' . 'Estimados C&eacute;sar y Diego' . ',</p>' ."\r\n";
			
		        $body .='<p>El sistema a recibido una nueva solicitud de registro.</p>' . "\r\n";
				
		        $body .='<p>El detalle de la informaci&oacute;n es el siguiente:</p>' . "\r\n";
		
		        $body .='<p>Organizaci&oacute;n: ' . $this->first_name . '<br>' . "\r\n";
						
				$body .='Pa&iacute;s: ' . $this->country . '<br>' . "\r\n";
				
				$body .='Tel&eacute;fono: ' . $this->phone . '<br>' . "\r\n";
				
				$body .='Correo Electr&oacute;nico: ' . $this->email . '<br>' . "\r\n";
				
				$body .='Tipo de solicitud: ' . $this->user_type . '<br>' . "\r\n";
				
		        $body .='Usuario: ' . $this->username . '<br>' . "\r\n";
						
				$body .='Contrase&ntilde;a: ' . $this->_newPassword . '</p>' . "\r\n";
					
			    $body .='<p>URL de Aprobacion: https://app.webproadmin.com/recomendador/confirmarrecomendador?action=confirm&id=' . $this->user->getId() . '&key=' . $this->user->profile->new_password_key . "\r\n";
					
			    $body .='<p>&Eacute;xitos,</p>' . "\r\n";
		
		        $body .='<p><a href="http://webproadmin.com" target="_blank">WebProAdmin</a></p>' . "\r\n";
		
			    // extract the subject from the first line
		        $subject =$this->first_name . ', Solicitud de Registro como Advisor';
		
		        $mail = new Zend_Mail('UTF-8');
		
		        $mail->addTo('dlsarmiento@gmail.com', 'Diego Sarmiento');
				$mail->addTo('cesarpahl@gmail.com', 'Cesar Pahl');
		        //$mail->setFrom('noresponder@webproadmin.com', trim('Usuarios' . ' ' . 'WebProAdmin'));
		        $mail->setFrom('soporte@webproadmin.com', trim('Soporte' . ' ' . 'WebProAdmin'));
				$mail->setReplyTo('soporte@webproadmin.com', trim('Soporte' . ' ' . 'WebProAdmin'));
		        $mail->setSubject(trim($subject));
		        $mail->setBodyHtml($body);
		        $mail->send();
	        }
			else {
			    $templater = new Templater();
		        // fetch the e-mail body
		        $body ='<p>' . 'Estimado(a) ' . $this->first_name . ',</p>' ."\r\n";
			
		        $body .='<p>Gracias por registrate como Recomedador en WebProAdmin. Tu solicitud ha sido aceptada.</p>' . "\r\n";
				
		        $body .='<p>El detalle de tu informaci&oacute;n es el siguiente:</p>' . "\r\n";
		
			    $body .='<p>URL de Activaci&oacute;n: https://app.webproadmin.com/recomendador/confirmarrecomendador?action=confirm&id=' . $this->user->getId() . '&key=' . $this->user->profile->new_password_key  . '</p>'. "\r\n";
		
		        $body .='<p>Usuario: ' . $this->username . '<br>' . "\r\n";
						
				$body .='Contrase&ntilde;a: ' . $this->_newPassword . '</p>' . "\r\n";
									
			    $body .='<p>En casos de dudas por favor env&iacute;anos un correo a soporte@webproadmin.com</p>' . "\r\n";
					
			    $body .='<p>&Eacute;xitos,</p>' . "\r\n";
		
		        $body .='<p><a href="http://webproadmin.com" target="_blank">WebProAdmin</a></p>' . "\r\n";
		
			    // extract the subject from the first line
		        $subject =$this->first_name . ', Bienvenido a WebProAdmin';
		
		        $mail = new Zend_Mail('UTF-8');
		
		        $mail->addTo($this->email, trim($this->user_email));
		        //$mail->setFrom('noresponder@webproadmin.com', trim('Usuarios' . ' ' . 'WebProAdmin'));
		        $mail->setFrom('soporte@webproadmin.com', trim('Soporte' . ' ' . 'WebProAdmin'));
				$mail->setReplyTo('soporte@webproadmin.com', 'WebProAdmin');
		        $mail->setSubject(trim($subject));
		        $mail->setBodyHtml($body);
		        $mail->send();			
			}
			///////////email ends here
				
                unset($session->phrase);
            }

            // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>