<?php
    class FormProcessor_UserEmployee extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		protected $_validateOnly = false;
		public $image = null;
		protected $_uploadedFile;

        public function __construct($db, $user_id = 0, $contact_id = 0, $company_ = 0)
        {
            parent::__construct();

            $this->db = $db;
			$this->contact_id = $contact_id;
			$this->user_id = $user_id;
			$this->company_ = $company_;
			
            $this->user = new DatabaseObject_UserEmployee($db);
            $this->user->load($user_id);
			
            $this->contact = new DatabaseObject_Contact($db);
            $this->contact->loadForUser($company_, $contact_id);
			
			$this->username = $this->user->username;
			$this->company = $this->user->company;
			$this->user_type = $this->user->user_type;
			$this->email = $this->user->profile->email;
	        $this->first_name = $this->user->profile->first_name;
			$this->last_name = $this->user->profile->last_name;
			$this->plan = $this->user->profile->plan;
			$this->section1 = $this->user->profile->section1;
			$this->section2 = $this->user->profile->section2;
			$this->section3 = $this->user->profile->section3;
			$this->section4 = $this->user->profile->section4;
			$this->section5 = $this->user->profile->section5;
			$this->section6 = $this->user->profile->section6;
			$this->section7 = $this->user->profile->section7;
			$this->section8 = $this->user->profile->section8;
			$this->section9 = $this->user->profile->section9;
			$this->contact_id = $this->user->profile->contact_id;
			$this->thecompany = $this->contact->profile->thecompany;
			$this->company_id = $this->contact->profile->company_id;
			$this->relationship = $this->contact->profile->relationship;
		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
        	
            // validate the username
            if (!$this->user_id ){
            $this->username_ = trim($request->getPost('username'));
			$this->username = strtolower($this->username_);
			
			
	            if (strlen($this->username) == 0)
	                $this->addError('username', 'Por favor define un usuario');
	            else if (!DatabaseObject_UserEmployee::IsValidUsername($this->username))
	                $this->addError('username', 'Por favor define un nombre de usuario v&aacute;lido');
	            else if ($this->user->usernameExists($this->username))
	                $this->addError('username', 'Disculpa, el nombre de usuario ya existe');
	            else
	                $this->user->username = $this->username;
			}
 
			$this->company = $this->sanitize($request->getPost('company'));
            $this->user->company = $this->company;	
			
			$this->thecompany = $this->sanitize($request->getPost('thecompany'));
            $this->contact->profile->thecompany = $this->thecompany;	
			
			$this->company_id = $this->sanitize($request->getPost('company_id'));
            $this->contact->profile->company_id = $this->company_id;	
			
            // validate the e-mail address
            if (!$this->user_id ){
	            $this->email_ = $this->sanitize($request->getPost('email'));
				$this->email = strtolower($this->email_);
	            $validator = new Zend_Validate_EmailAddress();
	
	            if (strlen($this->email) == 0)
	                $this->addError('email', 'Por favor introduce una direcci&oacute;n electr&oacute;nica');
	            else if (!$validator->isValid($this->email))
	                $this->addError('email', 'Por favor introduce una direcci&oacute;n electr&oacute;nica v&aacute;lida.');
	          	//else if ($this->user->emailExists($this->email))
	                //$this->addError('email', 'Disculpe, la direcci&oacute;n electr&oacute;nica ya existe.');
	            else
	                $this->user->profile->email = $this->email;
			}

		     // validate the plan
            $this->plan = $this->sanitize($request->getPost('plan'));
            $this->user->profile->plan = $this->plan;
			
            // validate the user's password
			 $this->password = $this->sanitize($request->getPost('password'));
			 $this->password_confirm = $this->sanitize($request->getPost('password2'));
			
             if (strlen($this->password) == 0)
                    $this->addError('password', 'Por favor introduce una contrase&ntilde;a');
             elseif (strlen($this->password_confirm) == 0)
                    $this->addError('password2', 'Por favor confirma la contrase&ntilde;a');
             elseif ($this->password != $this->password_confirm)
                    $this->addError('password2', 'Por favor confirma la contrase&ntilde;a');
             elseif (strlen($this->password) < 6)
               	   $this->addError('password', 'La contrase&ntilde;a debe tener al menos 6 caracteres');
             else
                    $this->user->password = $this->password;
			
            // define the type of user by default
            $this->user_type = $this->sanitize($request->getPost('user_type'));
            $this->user->user_type = $this->user_type;
			
			if ($this->user_type == 'employee'){
				$this->relationship = 'empleado';
		        $this->user->relationship = $this->relationship;
			}
			else{
				$this->relationship = 'proveedor';
		        $this->user->relationship = $this->relationship;
			}
			
			if ($this->user_type != 'accountant'){
			    // define the permisology
	            $this->section1 = $this->sanitize($request->getPost('section1'));
	            $this->user->profile->section1 = $this->section1;
				
	            // define the permisology
	            $this->section2 = $this->sanitize($request->getPost('section2'));
	            $this->user->profile->section2 = $this->section2;
				
	            // define the permisology
	            $this->section3 = $this->sanitize($request->getPost('section3'));
	            $this->user->profile->section3 = $this->section3;
				
	            // define the permisology
	            $this->section4 = $this->sanitize($request->getPost('section4'));
	            $this->user->profile->section4 = $this->section4;
				
	            // define the permisology
	            $this->section5 = $this->sanitize($request->getPost('section5'));
	            $this->user->profile->section5 = $this->section5;
				
	            // define the permisology
	            $this->section6 = $this->sanitize($request->getPost('section6'));
	            $this->user->profile->section6 = $this->section6;
				
	            // define the permisology
	            $this->section7 = $this->sanitize($request->getPost('section7'));
	            $this->user->profile->section7 = $this->section7;
				
	            // define the permisology
	            $this->section8 = $this->sanitize($request->getPost('section8'));
	            $this->user->profile->section8 = $this->section8;
				
	            // define the permisology
	            $this->section9 = $this->sanitize($request->getPost('section9'));
	            $this->user->profile->section9 = $this->section9;
            }

            $this->first_name = $this->sanitize($request->getPost('first_name'));
	        		if (strlen($this->first_name) == 0){
	                $this->addError('first_name', 'Por favor introduce el nombre del usuario');
				}
				else {
					$this->user->profile->first_name = $this->first_name;	
				}
			
            $this->last_name = $this->sanitize($request->getPost('last_name'));
	            if (strlen($this->last_name) == 0){
	                $this->addError('last_name', 'Por favor introduce el apellido del usuario');
	            }
            		else {
                		$this->user->profile->last_name = $this->last_name;
				}
     
			// if no errors have occurred, save the user
            if (!$this->hasError()) {

			$this->user->save();
			
			if (!$this->user_id ){
				////////////email starts here
				$templater = new Templater();
	            	// fetch the e-mail body
	            	$body ='<p>' . 'Estimado(a) ' . $this->first_name . ',</p>' ."\r\n";
		
	            	$body .='<p>El detalle de tu informaci&oacute;n es la siguiente:</p>' . "\r\n";
	
	            	$body .='<p>Ingresar: https://app.webproadmin.com/cuenta/login<br>' . "\r\n";
	
	            	$body .='Usuario: ' . $this->username . '<br>' . "\r\n";
					
				$body .='Contrase&ntilde;a: ' . $this->password . '</p>' . "\r\n";
				
				$body .='<p>En casos de dudas por favor env&iacute;anos un correo a soporte@webproadmin.com</p>' . "\r\n";
				
				$body .='<p>&Eacute;xitos,</p>' . "\r\n";
	
	            	$body .='<p><a href="http://webproadmin.com" target="_blank">WebProAdmin</a></p>' . "\r\n";
	
				// extract the subject from the first line
	            	$subject =$this->first_name . ', Bienvenido a WebProAdmin';
	
	            	$mail = new Zend_Mail('UTF-8');
	
	            	$mail->addTo($this->email, trim($this->first_name . ' ' . $this->last_name));
	            	//$mail->setFrom('noresponder@webproadmin.com', trim('Usuarios' . ' ' . 'WebProAdmin'));
				$mail->setFrom('soporte@webproadmin.com', trim('Soporte' . ' ' . 'WebProAdmin'));
				$mail->setReplyTo('soporte@webproadmin.com', 'WebProAdmin');
	            	$mail->setSubject(trim($subject));
	            	$mail->setBodyHtml($body);
	            	$mail->send();
				///////////email ends here
			}

			if (!$this->user_id){
					$this->contact->user_id =  $this->company_;
		            $this->contact->profile->first_name =  $this->first_name;
					$this->contact->profile->last_name = $this->last_name;
					$this->contact->email = $this->email;
					
					$this->contact->profile->thecompany = $this->thecompany;
					$this->contact->profile->company_id = $this->company_id;
					$this->contact->profile->relationship = $this->relationship;
					
					$this->contact->save();
					
					$this->user->profile->contact_id = $this->contact->getId();
					$this->user->save();
			 }
			
			
          }

		      // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>