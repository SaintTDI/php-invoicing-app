<?php
    class FormProcessor_CompanyDetails extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $company = null;
		public $image = null;
		public $addresses = array();
		public $address_id = array();
		protected $_uploadedFile;
		
		public $companyProfile = array(
			'company_picture' => 'Profile Picture',
			'company_pict_preview' => 'Picture Preview',
		);

        public function __construct($db, $user_id, $address_id, $company_id_c = 0)
        {
            parent::__construct();

            $this->db = $db;
		    $this->company_id_c = $company_id_c;
			
           	$this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->user_id_ = $this->user->getId();
			
            $this->company = new DatabaseObject_Company($db);
			$this->company->loadForUser($this->user->getId());
			
            $this->companyc = new DatabaseObject_Ccompany($db);
			$this->companyc->loadForUser($this->user->getId(), $company_id_c);
			
			if ($address_id){
				if (!is_array($address_id))
                		$address_id = array($address_id);
			
				foreach ($address_id as $id){
            			$address = new DatabaseObject_Address($db);
            			$address->loadForUser($this->user->getId(), $id);
					$this->addresses[] = $address;
        			}
			}
			
			$this->user_id = $this->user->getId();
            $this->thecompany = $this->company->thecompany;
			$this->commercial = $this->company->commercial;
            $this->identification = $this->company->identification;
			
			$this->speech = $this->company->profile->speech;
			$this->email_c = $this->company->profile->email_c;
			$this->email2 = $this->company->profile->email2;
			$this->mobile = $this->company->profile->mobile;
			$this->phone = $this->company->profile->phone;
			$this->phone2 = $this->company->profile->phone2;
			$this->fax = $this->company->profile->fax;
			$this->year_start = $this->company->profile->year_start;
			$this->iva = $this->company->profile->iva;
			$this->iva2 = $this->company->profile->iva2;
			$this->iva2_name = $this->company->profile->iva2_name;
			$this->retention = $this->company->profile->retention;
			$this->invoice_number = $this->company->profile->invoice_number;
			$this->number_start = $this->company->profile->number_start;
			$this->number_zero = $this->company->profile->number_zero;
			$this->consecutive = $this->company->profile->consecutive;
			$this->terms = $this->company->profile->terms;
			
			$this->mobile_country = $this->company->profile->mobile_country;
			$this->phone_country = $this->company->profile->phone_country;
			$this->phone2_country = $this->company->profile->phone2_country;
			$this->fax_country = $this->company->profile->fax_country;
			
			$this->mobile_area = $this->company->profile->mobile_area;
			$this->phone_area = $this->company->profile->phone_area;
			$this->phone2_area = $this->company->profile->phone2_area;
			$this->fax_area = $this->company->profile->fax_area;
			
			$this->retention_q = $this->company->profile->retention_q;
			$this->number_start_letter = $this->company->profile->number_start_letter;
			$this->contact_id_ = $this->company->profile->contact_id_;
			
			$this->currency = $this->company->profile->currency;
			
			$this->recc = $this->company->profile->recc;
			
			foreach ($this->companyProfile as $key => $label)
				$this->$key = $this-> company->profile->$key;
        }

        public function process(Zend_Controller_Request_Abstract $request)
        {
			
            $this->thecompany = $this->sanitize($request->getPost('thecompany'));
            if (strlen($this->thecompany) == 0)
                $this->addError('thecompany', 'Por favor introduce la raz&oacute;n social de tu empresa');
            else
                $this->company->thecompany = $this->thecompany;
			
            $this->commercial = $this->sanitize($request->getPost('commercial'));
            $this->company->commercial = $this->commercial;
			$this->company->user_id = $this->user_id;

            $this->identification = $this->sanitize($request->getPost('identification'));
            if (strlen($this->identification) == 0)
                $this->addError('identification', 'Por favor introduce tu n&uacute;mero de identificaci&oacute;n fiscal');
            else
                $this->company->identification = $this->identification;
			
            $this->speech = $this->sanitize($request->getPost('speech'));
            $this->company->profile->speech = $this->speech;
			
            $this->add_check = $this->sanitize($request->getPost('add_check'));
            if ($this->add_check == 'false'){
                $this->addError('add_check', 'Por favor introduce la direcci&oacute;n fiscal de tu empresa');
			}
			
            $this->email_c = $this->sanitize($request->getPost('email_c'));
            $validator = new Zend_Validate_EmailAddress();
			
            if (strlen($this->email_c) == 0)
                $this->addError('email_c', 'Por favor introduce una direcci&oacute;n de correo electr&oacute;nico');
            else if (!$validator->isValid($this->email_c))
                $this->addError('email_c', 'Por favor introduce una direcci&oacute;n de correo v&aacute;lida');
            else
                $this->company->profile->email_c = $this->email_c;
			
			$this->email2 = $this->sanitize($request->getPost('email2'));
            $validator = new Zend_Validate_EmailAddress();
			
			if (strlen($this->email2) == 0)
                $this->company->profile->email2 = $this->email2;
			else if (!$validator->isValid($this->email2))
                $this->addError('email2', 'Por favor introduce una direcci&oacute;n de correo v&aacute;lida');
            else
                $this->company->profile->email2 = $this->email2;
			
			$this->mobile = $this->sanitize($request->getPost('mobile'));
            $validator = new Zend_Validate_Digits();
			
			if (strlen($this->mobile) == 0)
                $this->company->profile->mobile = $this->mobile;
			else if (!$validator->isValid($this->mobile))
                $this->addError('mobile', 'Por favor introduce un n&uacute;mero v&aacute;lido');
			else
                $this->company->profile->mobile = $this->mobile;
			
			$this->phone = $this->sanitize($request->getPost('phone'));
            $validator = new Zend_Validate_Digits();
			
			if (strlen($this->phone) == 0)
                $this->company->profile->phone = $this->phone;
			else if (!$validator->isValid($this->phone))
                $this->addError('phone', 'Por favor introduce un n&uacute;mero v&aacute;lido');
            else
                $this->company->profile->phone = $this->phone;
			
			$this->phone2 = $this->sanitize($request->getPost('phone2'));
            $validator = new Zend_Validate_Digits();
			
			if (strlen($this->phone2) == 0)
                $this->company->profile->phone2 = $this->phone2;
			else if (!$validator->isValid($this->phone2))
                $this->addError('phone2', 'Por favor introduce un n&uacute;mero v&aacute;lido');
            else
                $this->company->profile->phone2 = $this->phone2;
			
			$this->fax = $this->sanitize($request->getPost('fax'));
            $validator = new Zend_Validate_Digits();
			
			if (strlen($this->fax) == 0)
                $this->company->profile->fax = $this->fax;
			else if (!$validator->isValid($this->fax))
                $this->addError('fax', 'Por favor introduce un n&uacute;mero v&aacute;lido');
            else
                $this->company->profile->fax = $this->fax;
				
            $this->year_start = $this->sanitize($request->getPost('year_start'));

            if (strlen($this->year_start) == 0)
                $this->addError('year_start', 'Por favor especifica la fecha de inicio de tu per&iacute;odo fiscal');
            else
                $this->company->profile->year_start = date("d-m-Y", strtotime($this->year_start));
			
			$piva = $this->sanitize($request->getPost('iva'));
			
			if (strlen($piva) == 0) {
                $this->addError('iva', 'Por favor define tu r&eacute;gimen habitual de IVA');
			}
            else {
				$piva_ = str_replace('.', '', $piva);
				$piva2_ = str_replace(',', '.', $piva_);
		    		$this->iva = $piva2_;
            		$this->company->profile->iva = $this->iva;			
			}
			
			$this->iva2_name = $this->sanitize($request->getPost('iva2_name'));
            $this->company->profile->iva2_name = $this->iva2_name;
			
			$piva2 = $this->sanitize($request->getPost('iva2'));
			
			if (strlen($piva2) == 0){
				$this->iva2 = $piva2;
            		$this->company->profile->iva2 = $this->iva2;
			}
            else{
				$piva_2 = str_replace('.', '', $piva2);
				$piva2_2 = str_replace(',', '.', $piva_2);
		    		$this->iva2 = $piva2_2;
            		$this->company->profile->iva2 = $this->iva2;	
			}
				
			$rettion = $this->sanitize($request->getPost('retention'));
			
			if (strlen($rettion) == 0){
				$this->retention = $rettion;
            		$this->company->profile->retention = $this->retention;
			}
            else{
				$rettion_ = str_replace('.', '', $rettion);
				$rettion2_ = str_replace(',', '.', $rettion_);
		    		$this->retention = $rettion2_;
            		$this->company->profile->retention = $this->retention;	
			}
	
            $this->invoice_number = $this->sanitize($request->getPost('invoice_number'));
            $this->company->profile->invoice_number = $this->invoice_number;		
			
            $this->number_start = $this->sanitize($request->getPost('number_start'));
            if (strlen($this->number_start) == 0)
                $this->addError('number_start', 'Por favor introduce a partir de que n&uacute;mero deseas facturar');
            else
                $this->company->profile->number_start = $this->number_start;	

			$this->number_zero = $this->sanitize($request->getPost('number_zero'));
            $this->company->profile->number_zero = $this->number_zero;
			
			$this->consecutive = $this->sanitize($request->getPost('consecutive'));
            $this->company->profile->consecutive = $this->consecutive;
	
			$this->mobile_country = $this->sanitize($request->getPost('mobile_country'));
            $this->company->profile->mobile_country = $this->mobile_country;
			
			$this->phone_country = $this->sanitize($request->getPost('phone_country'));
            $this->company->profile->phone_country = $this->phone_country;
			
			$this->phone2_country = $this->sanitize($request->getPost('phone2_country'));
            $this->company->profile->phone2_country = $this->phone2_country;
			
			$this->fax_country = $this->sanitize($request->getPost('fax_country'));
            $this->company->profile->fax_country = $this->fax_country;
			
			$this->mobile_area = $this->sanitize($request->getPost('mobile_area'));
            $this->company->profile->mobile_area = $this->mobile_area;
			
			$this->phone_area = $this->sanitize($request->getPost('phone_area'));
            $this->company->profile->phone_area = $this->phone_area;
			
			$this->phone2_area = $this->sanitize($request->getPost('phone2_area'));
            $this->company->profile->phone2_area = $this->phone2_area;
			
			$this->fax_area = $this->sanitize($request->getPost('fax_area'));
            $this->company->profile->fax_area = $this->fax_area;
			
			$this->retention_q = $this->sanitize($request->getPost('retention_q'));
            $this->company->profile->retention_q = $this->retention_q;
			
			$this->number_start_letter = $this->sanitize($request->getPost('number_start_letter'));
            $this->company->profile->number_start_letter = $this->number_start_letter;
			
            $this->currency = $this->sanitize($request->getPost('currency'));
            if (strlen($this->currency) == 0)
                $this->addError('currency', 'Por favor selecciona la moneda a utilizar');
            else
                $this->company->profile->currency = $this->currency;	
			
			$this->recc = $this->sanitize($request->getPost('recc'));
            $this->company->profile->recc = $this->recc;

            // process the public profile
            foreach ($this->companyProfile as $key => $label) {

			if ($label == 'Profile Picture') {
					/////////////////////////////////////
						if ($_FILES[$key]['error'] != true) {
						
						$config = Zend_Registry::get('config');
						$aroute = sprintf('%s/httpdocs/profiles/', $config->paths->base);
						$broute = sprintf('%s/httpdocs/profiles/tmp/company/thumbnails/', $config->paths->base);
						$croute = sprintf('%s/httpdocs/profiles/tmp/company/pictures/', $config->paths->base);
						$afile = $this->company->profile->company_picture;
						$bfile = $this->company->profile->company_pict_preview;

						$aimage = $aroute . $afile;
						$bimage = $broute . $bfile;
						$cimage = $croute . $bfile;
						
						$image = $key;
							
							if (!isset($_FILES[$key]) || !is_array($_FILES[$key])) {
								$this->addError($key, 'Invalid upload data');
								return false;
							}
				
							$file = $_FILES[$key];
				
							switch ($file['error']) {
								case UPLOAD_ERR_OK:
									// success
									break;
				
								case UPLOAD_ERR_FORM_SIZE:
									// only used if MAX_FILE_SIZE specified in form
								case UPLOAD_ERR_INI_SIZE:
									$this->addError($key, 'El archivo era demasiado pesado');
									break;
				
								case UPLOAD_ERR_PARTIAL:
									$this->addError($key, 'El archivo fue parcialmente cargado');
									break;
				
								case UPLOAD_ERR_NO_FILE:
									$this->addError($key, 'El archivo no pudo ser cargado');
									break;
				
								case UPLOAD_ERR_NO_TMP_DIR:
									$this->addError($key, 'La carperta de archivos temporales no fue encontrada');
									break;
				
								case UPLOAD_ERR_CANT_WRITE:
									$this->addError($key, 'El sistema no pudo escribir el nombre del archivo');
									break;
				
								case UPLOAD_ERR_EXTENSION:
									$this->addError($key, 'La extensi&oacute;n del archivo era inv&aacute;lida');
									break;
				
								default:
									$this->addError($key, 'Error de c&oacute;digo desconocido');
							}
				
							if ($this->hasError())
								return false;
				
							$info = getImageSize($file['tmp_name']);
							if (!$info) {
								$this->addError('type', 'El archivo cargado no era una imagen');
								return false;
							}
				
							switch ($info[2]) {
								case IMAGETYPE_PNG:
								case IMAGETYPE_GIF:
								case IMAGETYPE_JPEG:
									break;
				
								default:
									$this->addError('type', 'El tipo de imagen era inv&aacute;lida');
									return false;
							}
							
							if (!$this->hasError()) {
								
								if (!file_exists($file['tmp_name']) || !is_file($file['tmp_name']))
								 throw new Exception('No se puedo encontrar el archivo cargado');
								if (!is_readable($file['tmp_name']))
								 throw new Exception('El sistema no pudo leer el archivo');
								 $this->_uploadedFile = $file['tmp_name'];
								 
								$this->image->filename = basename($file['name']);
								 
								$config = Zend_Registry::get('config');
								$address = sprintf('%s/httpdocs/profiles/', $config->paths->base);
								
								$namef = basename($file['name']);
								
								$originalImage = mt_rand() . $namef;
								
								$this->company->profile->$key = $originalImage;
								
								move_uploaded_file($file['tmp_name'], $address . $originalImage);
								
							}
						////////////////////////////		
						}
				}
				
				
				elseif ($label == 'Picture Preview'){
						
						if ($_FILES['company_picture']['error'] != true) { 
				
								// directory for storing thumbnails
								$config = Zend_Registry::get('config');
								$path = sprintf('%s/httpdocs/profiles/tmp/company/thumbnails/', $config->paths->base);
								$path2 = sprintf('%s/httpdocs/profiles/tmp/company/pictures/', $config->paths->base);
								
								// create a unique filename based on the specified options
								$filename = mt_rand() . $_FILES['company_picture']['name'];
								
								$fullpath = $address . $originalImage;
								$ts = (int) filemtime($fullpath);
								
								$info = getImageSize($fullpath);
					
								$w = $info[0];          // original width
								$h = $info[1];          // original height
					
								$ratio = $w / $h;       // width:height ratio
								
								$maxW = min($w, 60); // new width can't be more than $maxW
								if ($w < 60)         // check if only max height has been specified
									$maxW = 60;
									
								$maxW2 = min($w, 200); // new width can't be more than $maxW
								if ($w < 200)         // check if only max height has been specified
									$maxW2 = 200;
					
								$maxH = min($h, 60); // new height can't be more than $maxH
								if ($h < 60)         // check if only max width has been specified
									$maxH = 60;
									
								$maxH2 = min($h, 200); // new height can't be more than $maxH
								if ($h < 200)         // check if only max width has been specified
									$maxH2 = 200;
					
								$newW = $maxW;          // first use the max width to determine new
								$newH = $newW / $ratio; // height by using original image w:h ratio
								
								$newW2 = $maxW2;          // first use the max width to determine new
								$newH2 = $newW2 / $ratio; // height by using original image w:h ratio
					
								switch ($info[2]) {
									case IMAGETYPE_GIF:
										$infunc = 'ImageCreateFromGif';
										$outfunc = 'ImageJpeg';
										break;
					
									case IMAGETYPE_JPEG:
										$infunc = 'ImageCreateFromJpeg';
										$outfunc = 'ImageJpeg';
										break;
					
									case IMAGETYPE_PNG:
										$infunc = 'ImageCreateFromPng';
										$outfunc = 'ImageJpeg';
										break;
					
									default;
										throw new Exception('Invalid image type');
								}
								
								// determine the full path for the new thumbnail
								$thumbPath = $path . $filename;
								$thumbPath2 = '/profiles/tmp/company/thumbnails/' . $filename;
								$thumbPath3 = $path2 . $filename;
								$thumbPath4 = '/profiles/tmp/company/pictures/' . $filename;
					
								if (!file_exists($thumbPath)) {
					
									//read the image in to GD
									$im = @$infunc($fullpath);
									if (!$im)
										throw new Exception('Unable to read image file');

									// create the output image
									$thumb = ImageCreateTrueColor($newW, $newH);
									$thumb2 = ImageCreateTrueColor($newW2, $newH2);
									
									//now resample the original image to the new image
									ImageCopyResampled($thumb, $im, 0, 0, 0, 0, $newW, $newH, $w, $h);
									ImageCopyResampled($thumb2, $im, 0, 0, 0, 0, $newW2, $newH2, $w, $h);
									
									//******************************
									//let´s crop
									//$Sw1=($newW-60)/2;
			    						//$Sw2=($newW2-200)/2;
									
									//$Sh1=($newH-60)/2;
									//$Sh2=($newH2-200)/2;
									
									$thumb3 = ImageCreateTrueColor($newW, $newH);
									$thumb4 = ImageCreateTrueColor($newW2, $newH2);

									//$white1 = imagecolorexact($thumb3, 0, 0, 0);
									//$white2 = imagecolorexact($thumb4, 0, 0, 0);

									// Make the background transparent
									//imagecolortransparent($thumb3, $white1);
									//imagecolortransparent($thumb4, $white2);
									
									//imagecopymerge($thumb3, $thumb, 0, 0, $Sw1, $Sh1, 60, 60, 100);
									//imagecopymerge($thumb4, $thumb2, 0, 0, $Sw2, $Sh2, 200, 200, 100);
									
									ImageCopyResampled($thumb3, $thumb, 0, 0, 0, 0, $newW, $newH, $newW, $newH);
									ImageCopyResampled($thumb4, $thumb2, 0, 0, 0, 0, $newW2, $newH2, $newW2, $newH2);
									
									//******************************
									
									$outfunc($thumb3, $thumbPath);
									$outfunc($thumb4, $thumbPath3);

									$this->company->profile->$key = $filename;
									
									if (file_exists($aimage)) {
										unlink($aimage);
									}
									
									if (file_exists($bimage)) {
										unlink($bimage);
									}
									
									if (file_exists($cimage)) {
										unlink($cimage);
									}

								}
					
								if (!file_exists($thumbPath))
									throw new Exception('Problem reading thumbnail');
								if (!is_readable($thumbPath))
									throw new Exception('Unable to read thumbnail');
							
							
							}
				}
				
            }
            
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
                $this->company->save();
				
			if ($this->addresses){
				$i=0;
				foreach ($this->addresses as $address) {
					$this->addresses[$i]->doc_id = $this->company->getId();
					$this->addresses[$i]->save();
					$i++;
				}
			}
			
			if (!$this->company_id_c){
					$this->companyc->user_id =  $this->user_id_;
					//$this->companyc->contact_id = $this->contact_id;
					$this->companyc->comp_doc_type = 'contact';
					
		            $this->companyc->profile->thecompany = $this->thecompany;
		            $this->companyc->profile->identification = $this->identification;
					
					$this->companyc->profile->email_c = $this->email_c;
					$this->companyc->profile->email2 = $this->email2;
					$this->companyc->profile->mobile = $this->mobile;
					$this->companyc->profile->phone = $this->phone;
					$this->companyc->profile->phone2 = $this->phone2;
					$this->companyc->profile->fax = $this->fax;
					$this->companyc->profile->recc = $this->recc;
					//$this->companyc->profile->irpf = $this->irpf;
					
					$this->companyc->profile->mobile_country = $this->mobile_country;
					$this->companyc->profile->phone_country = $this->phone_country;
					$this->companyc->profile->phone2_country = $this->phone2_country;
					$this->companyc->profile->fax_country = $this->fax_country;
					
					$this->companyc->profile->mobile_area = $this->mobile_area;
					$this->companyc->profile->phone_area = $this->phone_area;
					$this->companyc->profile->phone2_area = $this->phone2_area;
					$this->companyc->profile->fax_area = $this->fax_area;
					
					//$this->companyc->profile->relationship = $this->relationship;
					
					$this->companyc->save();
					
					$this->company->profile->contact_id_ = $this->companyc->getId();
					$this->company->save();
			 }
			
            }

            // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>