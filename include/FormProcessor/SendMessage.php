<?php
    class FormProcessor_SendMessage extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		protected $_validateOnly = false;

        public function __construct($db, $message_id = 0)
        {
            parent::__construct();

            $this->db = $db;
			$this->mypdf1 = $mypdf1;

		}
		
		public function validateOnly($flag)
		{
			$this->_validateOnly = (bool) $flag;
		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
        		$this->identity = Zend_Auth::getInstance()->getIdentity();
				
			$this->now = date("d-m-Y");
			
			$this->subject = $this->sanitize($request->getPost('subject'));
			
            $this->message_content = $this->sanitize($request->getPost('message_content'));
            if (strlen($this->message_content) == 0) {
                $this->addError('message_content', 'Por favor escribe el contenido de tu mensaje');
			}
            else {
                $this->message->profile->message_content = $this->message_content;
			}

            // validate the user's name
            $this->first_name = $this->sanitize($request->getPost('name'));
            if (strlen($this->first_name) == 0)
                $this->first_name = 'Usuario WebProAdmin';

            // validate the e-mail address
            $this->email = $this->sanitize($request->getPost('email'));
            $validator = new Zend_Validate_EmailAddress();

            if (strlen($this->email) == 0)
                $this->addError('email', 'Por favor escribe una direcci&oacute;n de correo');
            else if (!$validator->isValid($this->email))
                $this->addError('email', 'Por favor escribe una direcci&oacute;n de correo v 	&aacute;lida');

            // if no errors have occurred, send email
            if (!$this->_validateOnly && !$this->hasError()) {            		
			    	$templater = new Templater();
            		// fetch the e-mail body
            		$body ='<p>' . $this->first_name . ', este correo es para confirmarte que hemos recibido tu mensaje.</p>' ."\r\n";
	
            		$body .='<p>La informaci&oacute;n recibida es la siguiente:</p>' . "\r\n";

            		$body .='<p>' . 'Fecha' . ': '. $this->now . '</p>' . "\r\n";
					
				$body .='<p>' . 'Contacto' . ': '. $this->first_name . ' (' . $this->email . ')' . '</p>' . "\r\n";
					
				$body .='<p>' . 'Asunto' . ': '. $this->subject . '</p>' . "\r\n";
					
				$body .='<p>' . 'Mensaje' . ': '. $this->message_content . '</p>' . "\r\n";
				
				$body .='<p>En breve recibir&aacute;s nuestra respuesta.</p>' . "\r\n";

            		$body .='<p>Gracias por preferirnos,</p>' . "\r\n";

            		$body .='<p>El Equipo de <a href="http://webproadmin.com" target="_blank">WebProAdmin</a></p>' . "\r\n";

				// extract the subject from the first line
            		$subject = 'WebProAdmin - Mensaje de Soporte';

            		$mail = new Zend_Mail('UTF-8'); 

            		$mail->addTo($this->email, trim($this->first_name));
				if ($this->subject == 'Ventas') {
					$mail->addBcc('cesarpahl@icloud.com', 'César Pahl');
				}
				else{
					$mail->addBcc('dlsarmiento@gmail.com', 'Diego Sarmiento');
				}
				$mail->setFrom('soporte@webproadmin.com', trim('Soporte' . ' ' . 'WebProAdmin'));
				$mail->setReplyTo('soporte@webproadmin.com', 'WebProAdmin');
            		$mail->setSubject(trim($subject));
            		$mail->setBodyHtml($body);
            		$mail->send();
            }

            // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>