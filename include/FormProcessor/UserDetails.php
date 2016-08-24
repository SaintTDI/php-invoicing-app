<?php
    class FormProcessor_UserDetails extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $image = null;
		protected $_uploadedFile;
		
		public $publicProfile = array(
			'public_bio' => 'Bio',
			'public_picture' => 'Profile Picture',
			'public_pict_preview' => 'Picture Preview',
			'public_website' => 'Website',
			'public_twitter' => 'Twitter',
			'public_facebook' => 'Facebook',
			'public_linkedin' => 'LinkedIn',
			'public_youtube' => 'Youtube',
			'public_googlep' => 'Google+',
			'public_quora' => 'Quora'
		);

        public function __construct($db, $user_id)
        {
            parent::__construct();

            $this->db = $db;
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);

            $this->first_name = $this->user->profile->first_name;
			$this->middle_name = $this->user->profile->middle_name;
            $this->last_name = $this->user->profile->last_name;
			$this->second_last_name = $this->user->profile->second_last_name;
			$this->plan = $this->user->profile->plan;
			$this->email = $this->user->profile->email;
			$this->sex = $this->user->profile->sex;
			$this->country = $this->user->profile->country;
			$this->region = $this->user->profile->region;
			$this->profession = $this->user->profile->profession;
			
			//foreach ($this->publicProfile as $key => $label)
				//$this->$key = $this-> user->profile->$key;
        }

        public function process(Zend_Controller_Request_Abstract $request)
        {
			
            // validate the user's name

            $this->first_name = $this->sanitize($request->getPost('first_name'));
            if (strlen($this->first_name) == 0)
                $this->addError('first_name', 'Por favor introduce tu nombre');
            else
                $this->user->profile->first_name = $this->first_name;
			
            $this->middle_name = $this->sanitize($request->getPost('middle_name'));
            $this->user->profile->middle_name = $this->middle_name;

            $this->last_name = $this->sanitize($request->getPost('last_name'));
            if (strlen($this->last_name) == 0)
                $this->addError('last_name', 'Por favor introduce tu apellido');
            else
                $this->user->profile->last_name = $this->last_name;
			
            $this->second_last_name = $this->sanitize($request->getPost('second_last_name'));
            $this->user->profile->second_last_name = $this->second_last_name;

            // validate the e-mail address
            $this->email = $this->sanitize($request->getPost('email'));
            $validator = new Zend_Validate_EmailAddress();

            if (strlen($this->email) == 0)
                $this->addError('email', 'Por favor introduce tu correo electr&oacute;nico');
            else if (!$validator->isValid($this->email))
                $this->addError('email', 'Por favor introduce una direcci&oacute;n de correo electr&oacute;nica v&aacute;lida');
            else
                $this->user->profile->email = $this->email;
				
            $this->sex = $this->sanitize($request->getPost('sex'));
            $this->user->profile->sex = $this->sex;
				
			$this->country = $this->sanitize($request->getPost('country'));
            if (strlen($this->country) == 0)
                $this->addError('country', 'Por favor seleccione tu pa&iacute;s');
            else
                $this->user->profile->country = $this->country;

            $this->region = $this->sanitize($request->getPost('region'));
            $this->user->profile->region = $this->region;
			
            $this->profession = $this->sanitize($request->getPost('profession'));
            $this->user->profile->profession = $this->profession;

            // check if a new password has been entered and if so validate it
            $this->password = $this->sanitize($request->getPost('password'));
            $this->password_confirm = $this->sanitize($request->getPost('password_confirm'));

            if (strlen($this->password) > 0 || strlen($this->password_confirm) > 0) {
                if (strlen($this->password) == 0)
                    $this->addError('password', 'Por favor introduce una nueva contrase&ntilde;a');
                else if (strlen($this->password_confirm) == 0)
                    $this->addError('password_confirm', 'Por favor confirma tu nueva contrase&ntilde;a');
                else if ($this->password != $this->password_confirm)
                    $this->addError('password_confirm', 'Por favor escribe tu nueva contrase&ntilde;a');
                else
                    $this->user->password = $this->password;
            }

            /* process the public profile
            foreach ($this->publicProfile as $key => $label) {

			if ($label == 'Profile Picture') {
					/////////////////////////////////////
						if ($_FILES[$key]['error'] != true) {
						
						$config = Zend_Registry::get('config');
						$aroute = sprintf('%s/httpdocs/profiles/', $config->paths->base);
						$broute = sprintf('%s/httpdocs/profiles/tmp/thumbnails/', $config->paths->base);
						$croute = sprintf('%s/httpdocs/profiles/tmp/pictures/', $config->paths->base);
						$afile = $this->user->profile->public_picture;
						$bfile = $this->user->profile->public_pict_preview;

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
								 
								// Get the original file name from $_FILES
								$file_name = $file['name'];
								$file_name = preg_replace('/[^a-zA-Z0-9]/', '', $file_name);
								//////
	 
								$this->image->filename = basename($file_name);
								 
								$config = Zend_Registry::get('config');
								$address = sprintf('%s/httpdocs/profiles/', $config->paths->base);
								
								$namef = basename($file_name);
								
								$originalImage = mt_rand() . $namef;
								
								$this->user->profile->$key = $originalImage;
								
								move_uploaded_file($file['tmp_name'], $address . $originalImage);
								
							}
						////////////////////////////		
						}
				}
				
				
				elseif ($label == 'Picture Preview'){
						
						if ($_FILES['public_picture']['error'] != true) { 
				
								// directory for storing thumbnails
								$config = Zend_Registry::get('config');
								$path = sprintf('%s/httpdocs/profiles/tmp/thumbnails/', $config->paths->base);
								$path2 = sprintf('%s/httpdocs/profiles/tmp/pictures/', $config->paths->base);
								
								// Get the original file name from $_FILES
								$file_name = $_FILES['public_picture']['name'];
								$file_name = preg_replace('/[^a-zA-Z0-9]/', '', $file_name);
								//////
								
								// create a unique filename based on the specified options
								$filename = mt_rand() . $file_name;
								
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
								$thumbPath2 = '/profiles/tmp/thumbnails/' . $filename;
								$thumbPath3 = $path2 . $filename;
								$thumbPath4 = '/profiles/tmp/pictures/' . $filename;
					
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

									$this->user->profile->$key = $filename;
									
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
                	$this->user->profile->$key = $this->$key;
					}
				
            }*/
            
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
                $this->user->save();
            }

            // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>