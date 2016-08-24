<?php
    class FormProcessor_SendBudget extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $mypdf1 = null;
		protected $_validateOnly = false;

        public function __construct($db, $mypdf1 = 0)
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
			$company = $this->sanitize($request->getPost('company'));
			
			//new stuff
			$amount = $this->sanitize($request->getPost('amount'));
			$doc_number = $this->sanitize($request->getPost('doc_number'));
			$phone = $this->sanitize($request->getPost('phone'));
			$email2 = $this->sanitize($request->getPost('email2'));
			// ends new stuff
			
			$budget_id = $this->sanitize($request->getPost('id'));
			$mypdf1 = $this->mypdf1;
			$mypdf = $mypdf1.'.pdf';
			$myjpg = $mypdf1.'.png';
			
			$config = Zend_Registry::get('config');
			$aroute = $config->paths->base2;
			$broute = $config->paths->data;
			$croute = $config->paths->ip;
			$droute = $config->paths->include;
			
			$array= array();
			$url1 = $croute . '/documentos/budget?id='.$budget_id;
			$url2 = 'id2='.$this->identity->user_id;
			$url = $url1 . '\&' . $url2;
			$pdf = $aroute . 'httpdocs/documents/budgets/pdf/'.$mypdf;
			exec ('/usr/bin/wkhtmltopdf ' . $url . ' ' . $pdf. ' 2>&1', $array);
			include_once $droute . '/phmagick/phmagick.php';
			$jpg = new phmagick($aroute . 'httpdocs/documents/budgets/pdf/'.$mypdf, $aroute . 'httpdocs/documents/budgets/view/'.$myjpg);
			$jpg->setImageQuality(100);
			$jpg->convert();
			$preview = new phmagick($aroute . 'httpdocs/documents/budgets/pdf/'.$mypdf, $aroute . 'httpdocs/documents/budgets/preview/'.$myjpg);
			$preview->setImageQuality(100);
			$preview->resize(160,0);

            // validate the user's name
            $this->first_name = $this->sanitize($request->getPost('name'));
            if (strlen($this->first_name) == 0 && strlen($this->last_name) == 0)
                $this->first_name = 'Destinatario';

            $this->last_name = $this->sanitize($request->getPost('last_name'));	

            // validate the e-mail address
            $this->email = $this->sanitize($request->getPost('email'));
            $validator = new Zend_Validate_EmailAddress();

            if (strlen($this->email) == 0)
                $this->addError('email', 'Por favor escriba una direcci&oacute;n de correo');
            else if (!$validator->isValid($this->email))
                $this->addError('email', 'Por favor escriba una direcci&oacute;n de correo v 	&aacute;lida');

            // if no errors have occurred, send email
            if (!$this->_validateOnly && !$this->hasError()) {            		
			    	$templater = new Templater();
  
  				//new stuff
		        $body= file_get_contents('http://97.74.6.234/newsletters/1ad.html');
				
				$body .='<tr><td colspan="3" style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; padding: 8px; margin:5px; vertical-align: top; text-align: justify;">Estimado(a) ' . $this->first_name . ' ' . $this->last_name .  ',</td></tr>' ."\r\n";
				
				$body .='<tr><td colspan="3" style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; padding: 8px; margin:5px; vertical-align: top; text-align: justify;">Le enviamos adjunto el presupuesto No ' . $doc_number . ' por importe de <strong>' . $amount . '</strong></td></tr>' ."\r\n";
				
				$body .='<tr><td colspan="3" style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; padding: 8px; margin:5px; vertical-align: top; text-align: justify;">Tambi&eacute;n puede descargarlo en formato <strong>PDF</strong> haciendo click en el siguiente link:</td></tr>' .  "\r\n";
					
				$body .='<tr><td colspan="3" bgcolor="#0bacd6" style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; padding: 8px; margin:5px; vertical-align: top; text-align: justify;"><a href="' . $croute . '/documents/budgets/pdf/'. $mypdf . '" target="_blank" style="color: #fff; font-weight:600; text-decoration: none; text-align:center;"><div style="height:100%;width:100%"> Presupuesto No ' . $doc_number . '</div></a></td></tr>' . "\r\n";
					
				$body .='<tr><td colspan="3" style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; padding: 8px; margin:5px; vertical-align: top; text-align: justify;">Un saludo,</td></tr>' .  "\r\n";
				
				$body .='<tr><td colspan="3" style="font-family:Helvetica Neue, Helvetica, Arial, Geneva, sans-serif; padding: 8px; margin:5px; vertical-align: top; text-align: justify;"><strong>' . $company . '</strong><br>' . "\r\n";
				
				if ($phone) { $body .='Tel: ' . $phone . '<br>' .  "\r\n";}
				
				if ($email2) { $body .='Email: ' . $email2 . "\r\n"; }
				
				$body .='</td></tr>' .  "\r\n";
					
			    $body .= file_get_contents('http://97.74.6.234/newsletters/1bd.html');
				// ends new stuff
  
				// extract the subject from the first line
            		$subject =$company . ' te ha enviado un Presupuesto';

            		$mail = new Zend_Mail('UTF-8'); 
					
				// attach pdf and set MIME type, encoding and disposition data to handle PDF files
				$pdf1_ = $croute . '/documents/budgets/pdf/'. $mypdf;
				$content = file_get_contents($pdf1_);
    				$attachment = new Zend_Mime_Part($content);
    				$attachment->type = 'application/pdf';
    				$attachment->disposition = Zend_Mime::DISPOSITION_ATTACHMENT;
				$attachment->encoding = Zend_Mime::ENCODING_BASE64;
    				$attachment->filename = $mypdf;
				$attachment = $mail->addAttachment($attachment);

            		$mail->addTo($this->email, trim($this->first_name . ' ' . $this->last_name));
            		$mail->setFrom('noresponder@webproadmin.com', trim('Documentos' . ' ' . 'WebProAdmin'));
				$mail->setReplyTo('noresponder@webproadmin.com', 'WebProAdmin');
            		$mail->setSubject(trim($subject));
            		$mail->setBodyHtml($body);
            		$mail->send();
            }

            // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>