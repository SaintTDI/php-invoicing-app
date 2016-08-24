<?php
    class FormProcessor_Contact extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $contact = null;
		//public $address = null;
		public $company = null;
		public $image = null;
		protected $_uploadedFile;
		
		public $addresses = array();
		public $address_id = array();
		public $_ids = array();
		
		public $contactProfile = array(
			'contact_picture' => 'Profile Picture',
			'contact_pict_preview' => 'Picture Preview'
		);

        public function __construct($db, $user_id, $contact_id = 0, $address_id, $company_id = 0, $address_id2 = 0)
        {
            parent::__construct();

            $this->db = $db;
			
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
            $this->contact = new DatabaseObject_Contact($db);
            $this->contact->loadForUser($this->user->getId(), $contact_id);
			
			if ($address_id){
				if (!is_array($address_id))
                		$address_id = array($address_id);
			
				foreach ($address_id as $id){
            			$address = new DatabaseObject_Address($db);
            			$address->loadForUser($this->user->getId(), $id);
					$this->addresses[] = $address;
        			}
			}
			
			/*
			if (!empty($address_id)) {
            		$this->address = new DatabaseObject_Address($db);
            		$this->address->loadForUser($this->user->getId(), $address_id);
				$this->address_id = $address_id;
			}*/	
												
            $this->company = new DatabaseObject_Ccompany($db);
			$this->company->loadForUser($this->user->getId(), $company_id);
			/*									
            $this->address2 = new DatabaseObject_Address($db);
            $this->address2->loadForUser($this->user->getId(),
									 			$address_id2);*/							
		
			if ($this->contact->isSaved()) {
				
            $this->first_name = $this->contact->profile->first_name;
			$this->middle_name = $this->contact->profile->middle_name;
            $this->last_name = $this->contact->profile->last_name;
			$this->second_last_name = $this->contact->profile->second_last_name;
			$this->identification = $this->contact->profile->identification;
            $this->position = $this->contact->profile->position;
			$this->email = $this->contact->email;
			$this->email2 = $this->contact->profile->email2;
			$this->mobile = $this->contact->profile->mobile;
			$this->phone = $this->contact->profile->phone;
			$this->phone2 = $this->contact->profile->phone2;
			$this->fax = $this->contact->profile->fax;
			$this->recc = $this->contact->profile->recc;
			$this->irpf = $this->contact->profile->irpf;
			
			$this->mobile_country = $this->contact->profile->mobile_country;
			$this->phone_country = $this->contact->profile->phone_country;
			$this->phone2_country = $this->contact->profile->phone2_country;
			$this->fax_country = $this->contact->profile->fax_country;
			
			$this->mobile_area = $this->contact->profile->mobile_area;
			$this->phone_area = $this->contact->profile->phone_area;
			$this->phone2_area = $this->contact->profile->phone2_area;
			$this->fax_area = $this->contact->profile->fax_area;
			
			$this->relationship = $this->contact->profile->relationship;
			$this->notes = $this->contact->profile->notes;
			
			$this->thecompany = $this->contact->profile->thecompany;
			$this->company_id = $this->contact->profile->company_id;
			$this->company_address = $this->contact->profile->company_address;
		
			
			foreach ($this->contactProfile as $key => $label)
				$this->$key = $this-> contact->profile->$key;
        }		
		else
                	$this->contact->user_id = $this->user->getId();

		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
			
            $this->last_name = $this->sanitize($request->getPost('last_name'));
            if (strlen($this->last_name) == 0)
                $this->addError('last_name', 'Por favor introduce el apellido de tu contacto');
            else
                $this->contact->profile->last_name = $this->last_name;
			
            $this->email = $this->sanitize($request->getPost('email'));
            $validator = new Zend_Validate_EmailAddress();

            if (strlen($this->email) == 0)
                $this->addError('email', 'Por favor introduce el correo electr&oacute;nico de tu contacto');
            else if (!$validator->isValid($this->email))
                $this->addError('email', 'Por favor introduce una direcci&oacute;n de correo electr&oacute;nica v&aacute;lida');
            else
                $this->contact->email = $this->email;
			
			$this->email2 = $this->sanitize($request->getPost('email2'));
            $this->contact->profile->email2 = $this->email2;	
			
			$this->first_name = $this->sanitize($request->getPost('first_name'));
            $this->contact->profile->first_name = $this->first_name;	
			
			$this->middle_name = $this->sanitize($request->getPost('middle_name'));
            $this->contact->profile->middle_name = $this->middle_name;	
			
			$this->second_last_name = $this->sanitize($request->getPost('second_last_name'));
            $this->contact->profile->second_last_name = $this->second_last_name;	
			
			$this->identification = $this->sanitize($request->getPost('identification'));
            $this->contact->profile->identification = $this->identification;	
			
			$this->position = $this->sanitize($request->getPost('position'));
            $this->contact->profile->position = $this->position;	
			
			$this->mobile = $this->sanitize($request->getPost('mobile'));
            $this->contact->profile->mobile = $this->mobile;	
			
			$this->phone = $this->sanitize($request->getPost('phone'));
            $this->contact->profile->phone = $this->phone;	
			
			$this->phone2 = $this->sanitize($request->getPost('phone2'));
            $this->contact->profile->phone2 = $this->phone2;	
			
			$this->fax = $this->sanitize($request->getPost('fax'));
            $this->contact->profile->fax = $this->fax;

			$this->recc = $this->sanitize($request->getPost('recc'));
            $this->contact->profile->recc = $this->recc;
			
			$iva_var_ = $this->sanitize($request->getPost('irpf'));
			$iva_var__ = str_replace('.', '', $iva_var_);
			$this->irpf = str_replace(',', '.', $iva_var__);
            $this->contact->profile->irpf = $this->irpf;
			
			$this->mobile_country = $this->sanitize($request->getPost('mobile_country'));
            $this->contact->profile->mobile_country = $this->mobile_country;
			
			$this->phone_country = $this->sanitize($request->getPost('phone_country'));
            $this->contact->profile->phone_country = $this->phone_country;
			
			$this->phone2_country = $this->sanitize($request->getPost('phone2_country'));
            $this->contact->profile->phone2_country = $this->phone2_country;
			
			$this->fax_country = $this->sanitize($request->getPost('fax_country'));
            $this->contact->profile->fax_country = $this->fax_country;
			
			$this->mobile_area = $this->sanitize($request->getPost('mobile_area'));
            $this->contact->profile->mobile_area = $this->mobile_area;
			
			$this->phone_area = $this->sanitize($request->getPost('phone_area'));
            $this->contact->profile->phone_area = $this->phone_area;
			
			$this->phone2_area = $this->sanitize($request->getPost('phone2_area'));
            $this->contact->profile->phone2_area = $this->phone2_area;
			
			$this->fax_area = $this->sanitize($request->getPost('fax_area'));
            $this->contact->profile->fax_area = $this->fax_area;
			
			$this->relationship = $this->sanitize($request->getPost('relationship'));
            $this->contact->profile->relationship = $this->relationship;	
			
			$this->notes = $this->sanitize($request->getPost('notes'));
            $this->contact->profile->notes = $this->notes;
			
			$this->thecompany = $this->sanitize($request->getPost('company'));
            $this->contact->profile->thecompany = $this->thecompany;
			
			$this->company_id = $this->sanitize($request->getPost('company_id'));
            $this->contact->profile->company_id = $this->company_id;	
			
			$this->company_address = $this->sanitize($request->getPost('company_address'));
            $this->contact->profile->company_address = $this->company_address;	

            // process the public profile
            foreach ($this->contactProfile as $key => $label) {

			if ($label == 'Profile Picture') {
					/////////////////////////////////////
						if ($_FILES[$key]['error'] != true) {
						
						$config = Zend_Registry::get('config');
						$aroute = sprintf('%s/httpdocs/profiles/', $config->paths->base);
						$broute = sprintf('%s/httpdocs/profiles/tmp/contact/thumbnails/', $config->paths->base);
						$croute = sprintf('%s/httpdocs/profiles/tmp/contact/pictures/', $config->paths->base);
						$afile = $this->contact->profile->contact_picture;
						$bfile = $this->contact->profile->contact_pict_preview;

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
								$contact = sprintf('%s/httpdocs/profiles/', $config->paths->base);
								
								$namef = basename($file['name']);
								
								$originalImage = mt_rand() . $namef;
								
								$this->contact->profile->$key = $originalImage;
								
								move_uploaded_file($file['tmp_name'], $contact . $originalImage);
								
							}
						////////////////////////////		
						}
				}
				
				
				elseif ($label == 'Picture Preview'){
						
						if ($_FILES['contact_picture']['error'] != true) { 
				
								// directory for storing thumbnails
								$config = Zend_Registry::get('config');
								$path = sprintf('%s/httpdocs/profiles/tmp/contact/thumbnails/', $config->paths->base);
								$path2 = sprintf('%s/httpdocs/profiles/tmp/contact/pictures/', $config->paths->base);
								
								// create a unique filename based on the specified options
								$filename = mt_rand() . $_FILES['contact_picture']['name'];
								
								$fullpath = $contact . $originalImage;
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
										$outfunc = 'ImageGif';
										break;
					
									case IMAGETYPE_JPEG:
										$infunc = 'ImageCreateFromJpeg';
										$outfunc = 'ImageJpeg';
										break;
					
									case IMAGETYPE_PNG:
										$infunc = 'ImageCreateFromPng';
										$outfunc = 'ImagePng';
										break;
					
									default;
										throw new Exception('Invalid image type');
								}
								
								// determine the full path for the new thumbnail
								$thumbPath = $path . $filename;
								$thumbPath2 = '/profiles/tmp/contact/thumbnails/' . $filename;
								$thumbPath3 = $path2 . $filename;
								$thumbPath4 = '/profiles/tmp/contact/pictures/' . $filename;
					
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
									$thumb3 = ImageCreateTrueColor($newW, $newH);
									$thumb4 = ImageCreateTrueColor($newW2, $newH2);
									
									ImageCopyResampled($thumb3, $thumb, 0, 0, 0, 0, $newW, $newH, $newW, $newH);
									ImageCopyResampled($thumb4, $thumb2, 0, 0, 0, 0, $newW2, $newH2, $newW2, $newH2);
									//******************************
									
									$outfunc($thumb3, $thumbPath);
									$outfunc($thumb4, $thumbPath3);

									$this->contact->profile->$key = $filename;
									
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
					
				else {
                	$this->$key = $this->sanitize($request->getPost($key));
                	$this->contact->profile->$key = $this->$key;
					}
				
            }
            
			// if no errors have occurred, save the user
            if (!$this->hasError()) {

            $this->contact->profile->first_name =  $this->first_name;
			$this->contact->profile->middle_name = $this->middle_name;
            $this->contact->profile->last_name = $this->last_name;
			$this->contact->profile->second_last_name = $this->second_last_name;
			$this->contact->profile->identification = $this->identification;
            $this->contact->profile->position = $this->position;
			$this->contact->email = $this->email;
			$this->contact->profile->email2 = $this->email2;
			$this->contact->profile->mobile = $this->mobile;
			$this->contact->profile->phone = $this->phone;
			$this->contact->profile->phone2 = $this->phone2;
			$this->contact->profile->fax = $this->fax;
			$this->contact->profile->recc = $this->recc;
			$this->contact->profile->irpf = $this->irpf;
			
			$this->contact->profile->mobile_country = $this->mobile_country;
			$this->contact->profile->phone_country = $this->phone_country;
			$this->contact->profile->phone2_country = $this->phone2_country;
			$this->contact->profile->fax_country = $this->fax_country;
			
			$this->contact->profile->mobile_area = $this->mobile_area;
			$this->contact->profile->phone_area = $this->phone_area;
			$this->contact->profile->phone2_area = $this->phone2_area;
			$this->contact->profile->fax_area = $this->fax_area;
			
			$this->contact->profile->relationship = $this->relationship;
			$this->contact->profile->notes = $this->notes;
			
			$this->contact->save();
			
			$this->contact->contact_id = $this->contact->getId();
			
			if ($this->addresses){
				$i=0;
					$address_ids = array();
					foreach ($this->addresses as $address) {
						$this->addresses[$i]->doc_type = 'contact';
						$this->addresses[$i]->doc_id = $this->contact->getId();
					 	$this->addresses[$i]->save();
						if ($address->getId()) {
							$address_ids [$i] = $address->getId();
						}
						$i++;
					}

				$this->contact->profile->contact_address = base64_encode(serialize($address_ids));
				
				$this->contact->save();
			}

			if ($this->thecompany){
				$this->company->user_id = $this->user->getId();
				$this->company->comp_doc_type =	'contact';			
				$this->company->contact_id = $this->contact->getId();
				$this->company->profile->thecompany = $this->thecompany;
				$this->company->save();

				if ($this->company->profile->company_address){
					$this->contact->profile->company_address = $this->company->profile->company_address;
				}		
				
				$this->contact->profile->company_id = $this->company->getId();
				$this->contact->profile->thecompany= $this->thecompany;
				$this->contact->save();
			}
			
          }

		      // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>