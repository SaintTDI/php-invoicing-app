<?php
    class FormProcessor_Client extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $client = null;

        public function __construct($db, $user_id, $client_id = 0)
        {
            parent::__construct();

            $this->db = $db;
			
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
            $this->client = new DatabaseObject_Client($db);
            $this->client->loadForUser($this->user->getId(), $client_id);
			
			$this->client_id = $client_id;
		
			if ($this->client->isSaved()) {
				
            $this->first_name = $this->client->profile->first_name;
            $this->last_name = $this->client->profile->last_name;
            $this->position = $this->client->profile->position;
			$this->email = $this->client->email;
			$this->email2 = $this->client->profile->email2;
			$this->mobile = $this->client->profile->mobile;
			$this->phone = $this->client->profile->phone;
			
			$this->mobile_country = $this->client->profile->mobile_country;
			$this->phone_country = $this->client->profile->phone_country;
			
			$this->mobile_area = $this->client->profile->mobile_area;
			$this->phone_area = $this->client->profile->phone_area;

			$this->notes = $this->client->profile->notes;
			
			$this->thecompany = $this->client->profile->thecompany;
			$this->company_id = $this->client->profile->company_id;
			$this->company_address = $this->client->profile->company_address;
			
			$this->invitation_date = $this->client->profile->invitation_date;
			
			$this->invited_by = $this->client->profile->invited_by;
			$this->invited = $this->client->profile->invited;
		
        }		
		else
                	$this->client->user_id = $this->user->getId();

		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
			
			$this->invited = $this->sanitize($request->getPost('invited'));
            	$this->client->profile->invited = $this->invited;
			
			$this->_newPassword = Text_Password::create(8);
			
            $this->last_name = $this->sanitize($request->getPost('last_name'));
            if (strlen($this->last_name) == 0)
                $this->addError('last_name', 'Por favor introduzca el apellido del cliente');
            else
                $this->client->profile->last_name = $this->last_name;
			
            $this->email = $this->sanitize($request->getPost('email'));
            if (strlen($this->email) == 0)
                $this->addError('email', 'Por favor introduzca el correo principal');
			elseif ($this->invited)
                $this->addError('email', 'Usuario ya registrado en WebProAdmin');
            else
                $this->client->email = $this->email;
			
			$this->email2 = $this->sanitize($request->getPost('email2'));
            $this->client->profile->email2 = $this->email2;	
			
			$this->first_name = $this->sanitize($request->getPost('first_name'));
            $this->client->profile->first_name = $this->first_name;	
			
			$this->position = $this->sanitize($request->getPost('position'));
            $this->client->profile->position = $this->position;	
			
			$this->mobile = $this->sanitize($request->getPost('mobile'));
            $this->client->profile->mobile = $this->mobile;	
			
			$this->phone = $this->sanitize($request->getPost('phone'));
            $this->client->profile->phone = $this->phone;	
			
			$this->mobile_country = $this->sanitize($request->getPost('mobile_country'));
            $this->client->profile->mobile_country = $this->mobile_country;
			
			$this->phone_country = $this->sanitize($request->getPost('phone_country'));
            $this->client->profile->phone_country = $this->phone_country;
			
			$this->mobile_area = $this->sanitize($request->getPost('mobile_area'));
            $this->client->profile->mobile_area = $this->mobile_area;
			
			$this->phone_area = $this->sanitize($request->getPost('phone_area'));
            $this->client->profile->phone_area = $this->phone_area;
			
			$this->notes = $this->sanitize($request->getPost('notes'));
            $this->client->profile->notes = $this->notes;
			
			$this->thecompany = $this->sanitize($request->getPost('company'));
            $this->client->profile->thecompany = $this->thecompany;
			
			$this->company_id = $this->sanitize($request->getPost('company_id'));
            $this->client->profile->company_id = $this->company_id;	
			
			$this->company_address = $this->sanitize($request->getPost('company_address'));
            $this->client->profile->company_address = $this->company_address;
			
			$this->invitation_date = date('d-m-Y');
            $this->client->profile->invitation_date = $this->invitation_date;
			
			$this->name_ = ucwords($this->user->profile->first_name . ' ' . $this->user->profile->last_name);
			$this->email_ = $this->user->profile->email;
			$this->username_ = ucwords($this->user->username);
			
			if ($this->name_){
				$this->invited_by = $this->name_;
            		$this->client->profile->invited_by = $this->invited_by;
			}
			else {
				$this->invited_by = $this->username_;
            		$this->client->profile->invited_by = $this->invited_by;
			}
			
			// if no errors have occurred, save the user
            if (!$this->hasError()) {

            $this->client->profile->first_name =  $this->first_name;
            $this->client->profile->last_name = $this->last_name;
            $this->client->profile->position = $this->position;
			$this->client->email = $this->email;
			$this->client->profile->email2 = $this->email2;
			$this->client->profile->mobile = $this->mobile;
			$this->client->profile->phone = $this->phone;
			
			$this->client->profile->mobile_country = $this->mobile_country;
			$this->client->profile->phone_country = $this->phone_country;
			
			$this->client->profile->mobile_area = $this->mobile_area;
			$this->client->profile->phone_area = $this->phone_area;
			
			$this->client->profile->notes = $this->notes;
			
			$this->client->profile->invitation_date = $this->invitation_date;
			
			$this->client->profile->invited_by = $this->invited_by;
			
			$this->client->profile->invited = $this->invited;
			
            $this->client->profile->new_password = md5($this->_newPassword);
            $this->client->profile->new_password_ts = time();
            $this->client->profile->new_password_key = md5(uniqid() .
                                                   $this->user->getId() .
                                                   $this->_newPassword);
			
			$this->client->save();
			if (!$this->invited){
				////////////email starts here
				$templater = new Templater();
	            	// fetch the e-mail body
	            	$body ='<p>' . 'Estimado(a) ' . $this->first_name . ',</p>' ."\r\n";
		
	            	$body .='<p>' . $this->invited_by . ' (' . $this->email_ . ')' . ' te ha invitado a Registrate sin costo en WebProAdmin.</p>' . "\r\n";
					
		    		$body .='<p>Link para Registrarte: https://app.webproadmin.com/cuenta/registro?action=confirm&email=' . $this->email . '&id=' . $this->client->getId() . '&key=' . $this->client->profile->new_password_key . "\r\n";
				
				$body .='<p>En casos de dudas por favor env&iacute;anos un correo a soporte@webproadmin.com</p>' . "\r\n";
				
				$body .='<p>&Eacute;xitos,</p>' . "\r\n";
	
	            	$body .='<p><a href="http://webproadmin.com" target="_blank">WebProAdmin</a></p>' . "\r\n";
	
				// extract the subject from the first line
	            	$subject =$this->first_name . ', ' . $this->invited_by . ' te ha invitado a WebProAdmin';
	
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
          }

		      // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>