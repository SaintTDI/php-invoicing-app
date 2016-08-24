<?php
    class FormProcessor_UserRegistrationLight extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		protected $_validateOnly = false;

        public function __construct($db)
        {
            parent::__construct();
            $this->db = $db;
            $this->user = new DatabaseObject_User($db);
        }
		
		public function validateOnly($flag)
		{
			$this->_validateOnly = (bool) $flag;
		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
			
            // validate the username
            $this->username_ = trim($request->getPost('username'));
			$this->username = strtolower($this->username_);

            if (strlen($this->username) == 0)
                $this->addError('username', 'Por favor introduzca un nombre de usuario');
            else if (!DatabaseObject_User::IsValidUsername($this->username))
                $this->addError('username', 'Por favor introduzca un nombre de usuario v&aacute;lido');
            else if ($this->user->usernameExists($this->username))
                $this->addError('username', 'Disculpe, el nombre de usuario ya existe');
            else
                $this->user->username = $this->username;
			    $this->user_email =  ucfirst($this->username);
			
            // validate the user's password
			 $this->password = $this->sanitize($request->getPost('password'));
			 $this->password_confirm = $this->sanitize($request->getPost('password2'));
			 
            if (strlen($this->password) < 6)
                		$this->addError('password', 'Disculpe, su contrase&ntilde;a debe tener al menos 6 caracteres');
            elseif ($this->password == $this->username)
                    $this->addError('password', 'La contrase&ntilde;a no puede ser igual a su usuario');
            else
                $this->user->password = $this->password; 
			
            // define the type of user by default
			$this->user->user_type = 'proprietary';

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
				
		     // validate the plan
            $this->plan = $this->sanitize($request->getPost('plan'));
            if (strlen($this->plan) == 0)
                $this->addError('plan', 'Por favor seleccione el plan de su preferencia');
            else
                $this->user->profile->plan = $this->plan;
			
			 $this->invited = $this->sanitize($request->getPost('invited'));
            	 $this->user->profile->invited = $this->invited; 
				 
			 $this->invitation_code = $this->sanitize($request->getPost('invitation_code'));
            	 $this->user->profile->invitation_code = $this->invitation_code; 

			// agreement
			 $this->agreement = $this->sanitize($request->getPost('agreement'));
            if ($this->agreement != 'yes')
                $this->addError('agreement', 'Disculpe, para registrarse debe aceptar nuestras condiciones.');
            else
                $this->user->profile->agreement = $this->agreement;

            // if no errors have occurred, save the user
            if (!$this->_validateOnly && !$this->hasError()) {
                $this->user->save();
				
			// define user's company default
			$this->user->company =  $this->user->getId();
			
			$this->user->save();
			
			////////////email starts here
		     $templater = new Templater();
	        // fetch the e-mail body
	        $body= file_get_contents('http://97.74.6.234/newsletters/0ad.html');
	
	        $body .='Usuario: <strong>' . $this->username . '</strong><br>' . "\r\n";
					
			$body .='Contrase&ntilde;a: <strong>' . $this->password . '</strong>' . "\r\n";
				
		    $body .= file_get_contents('http://97.74.6.234/newsletters/0bd.html');
	
		    // extract the subject from the first line
	        $subject =$this->user_email . ': ¡Bienvenid@ a WebProAdmin!';
	
	        $mail = new Zend_Mail('UTF-8');
	
	        $mail->addTo($this->email, trim($this->user_email));
	        //$mail->setFrom('noresponder@webproadmin.com', trim('Usuarios' . ' ' . 'WebProAdmin'));
	        $mail->setFrom('soporte@webproadmin.com', trim('Soporte' . ' ' . 'WebProAdmin'));
			$mail->setReplyTo('soporte@webproadmin.com', 'WebProAdmin');
	        $mail->setSubject(trim($subject));
	        $mail->setBodyHtml($body);
	        $mail->send();
			///////////email ends here
				
                unset($session->phrase);
            }

            // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>