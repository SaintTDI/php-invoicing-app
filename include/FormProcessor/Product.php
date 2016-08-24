<?php
    class FormProcessor_Product extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $product = null;
		public $image = null;
		protected $_uploadedFile;
		
		public $productProfile = array(
			'product_picture' => 'Profile Picture',
			'product_pict_preview' => 'Picture Preview'
		);

        public function __construct($db, $user_id, $product_id = 0, $company_id = 0)
        {
            parent::__construct();

            $this->db = $db;
			
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
			$this->company = new DatabaseObject_Company($db);
            $this->company->loadForUser($this->user->getId());
			
            $this->product = new DatabaseObject_Product($db);
            $this->product->loadForUser($this->user->getId(),
									 			$product_id);
												
            $this->company2 = new DatabaseObject_Ccompany($db);
			$this->company2->loadForUser($this->user->getId(), 
												$company_id);
												
			if ($this->product->isSaved()) {
				
            $this->product_code = $this->product->profile->product_code;
			$this->product_name = $this->product->profile->product_name;
            $this->product_description = $this->product->profile->product_description;
			$this->product_unit = $this->product->profile->product_unit;
			$this->product_currency = $this->product->profile->product_currency;
            $this->unit_price = $this->product->profile->unit_price;
			$this->iva = $this->product->profile->iva;
            $this->iva2 = $this->product->profile->iva2;
			$this->iva2_name = $this->product->profile->iva2_name;
			
            $this->unit_cost = $this->product->profile->unit_cost;
			$this->iva_p = $this->product->profile->iva_p;
            $this->iva_p2 = $this->product->profile->iva_p2;
			$this->iva_p2_name = $this->product->profile->iva_p2_name;
			
			$this->thecompany = $this->product->profile->thecompany;
			$this->company_id = $this->product->profile->company_id;
			$this->company_address = $this->product->profile->company_address;
			
			foreach ($this->productProfile as $key => $label)
				$this->$key = $this-> product->profile->$key;
        }
			
		else
                $this->product->user_id = $this->user->getId();
			    $this->product->company = $this->company->getId();
        }

        public function process(Zend_Controller_Request_Abstract $request)
        {
			
            $this->product_code = $this->sanitize($request->getPost('product_code'));
            if (strlen($this->product_code) == 0)
                $this->addError('product_code', 'Por favor define un c&oacute;digo para el producto o servicio');
            else
                $this->product->profile->product_code = $this->product_code;
			
            $this->product_name = $this->sanitize($request->getPost('product_name'));
            if (strlen($this->product_name) == 0)
                $this->addError('product_name', 'Por favor especifica un nombre para el producto o servicio');
            else
                $this->product->profile->product_name = $this->product_name;

            $this->product_description = $this->sanitize($request->getPost('product_description'));
            $this->product->profile->product_description = $this->product_description;		
	
            $this->product_unit = $this->sanitize($request->getPost('product_unit'));
            if (strlen($this->product_unit) == 0)
                $this->addError('product_unit', 'Por favor especifica la unidad de facturaci&oacute;n');
            else
            $this->product->profile->product_unit = $this->product_unit;		
			
            $this->product_currency = $this->sanitize($request->getPost('product_currency'));
            $this->product->profile->product_currency = $this->product_currency;	
			
            $punit_ = $this->sanitize($request->getPost('unit_price'));
		    $punit2_ = str_replace('.', '', $punit_);
			$this->unit_price = str_replace(',', '.', $punit2_);
			//$this->unit_price =  $punit2_;
            $this->product->unit_price = $this->unit_price;
			
			$piva_ = $this->sanitize($request->getPost('iva'));
		    $piva_2_ = str_replace('.', '', $piva_);
			$this->iva = str_replace(',', '.', $piva_2_);
			//$this->iva = $piva_2_;
            if (strlen($this->iva) == 0)
                $this->addError('iva', 'Por favor especifica el IVA de Venta');
            else
			$this->product->profile->iva = $this->iva;

			$piva2_ = $this->sanitize($request->getPost('iva2'));
		    $piva2_2_ = str_replace('.', '', $piva2_);
			$this->iva2 = str_replace(',', '.', $piva2_2_);
			//$this->iva2 = $piva2_2_;
			$this->product->profile->iva2 = $this->iva2;	
			
			$this->iva2_name = $this->sanitize($request->getPost('iva2_name'));
            $this->product->iva2_name = $this->iva2_name;	
			
			//costs
            $punit_c_ = $this->sanitize($request->getPost('unit_cost'));
		    $punit2_c_ = str_replace('.', '', $punit_c_);
			$this->unit_cost = str_replace(',', '.', $punit2_c_);
			//$this->unit_price =  $punit2_;
            $this->product->unit_cost = $this->unit_cost;
			
			$piva_p_ = $this->sanitize($request->getPost('iva_p'));
		    $piva_p_2_ = str_replace('.', '', $piva_p_);
			$this->iva_p = str_replace(',', '.', $piva_p_2_);
			//$this->iva_p = $piva_p_2_;
			$this->product->profile->iva_p = $this->iva_p;

			$piva_p2_ = $this->sanitize($request->getPost('iva_p2'));
		    $piva_p2_2_ = str_replace('.', '', $piva_p2_);
			$this->iva_p2 = str_replace(',', '.', $piva_p2_2_);
			//$this->iva_p2 = $piva_p2_2_;
			$this->product->profile->iva_p2 = $this->iva_p2;	
			
			$this->iva_p2_name = $this->sanitize($request->getPost('iva_p2_name'));
            $this->product->iva_p2_name = $this->iva_p2_name;	
			
			//end costs
			
			$this->thecompany = $this->sanitize($request->getPost('company'));
            $this->product->profile->thecompany = $this->thecompany;
			
			//$this->company_id = $this->sanitize($request->getPost('company_id'));
            //$this->product->profile->company_id = $this->company_id;	
			
			$this->company_address = $this->sanitize($request->getPost('company_address'));
            $this->product->profile->company_address = $this->company_address;

            // process the public profile
            foreach ($this->productProfile as $key => $label) {

			if ($label == 'Profile Picture') {
					/////////////////////////////////////
						if ($_FILES[$key]['error'] != true) {
						
						$config = Zend_Registry::get('config');
						$aroute = sprintf('%s/httpdocs/profiles/', $config->paths->base);
						$broute = sprintf('%s/httpdocs/profiles/tmp/product/thumbnails/', $config->paths->base);
						$croute = sprintf('%s/httpdocs/profiles/tmp/product/pictures/', $config->paths->base);
						$afile = $this->product->profile->product_picture;
						$bfile = $this->product->profile->product_pict_preview;

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
								$address = sprintf('%s/httpdocs/profiles/products', $config->paths->base);
								
								$namef = basename($file_name);
								
								$originalImage = mt_rand() . $namef;
								
								$this->product->profile->$key = $originalImage;
								
								move_uploaded_file($file['tmp_name'], $address . $originalImage);
								
							}
						////////////////////////////		
						}
				}
				
				
				elseif ($label == 'Picture Preview'){
						
						if ($_FILES['product_picture']['error'] != true) { 
				
								// directory for storing thumbnails
								$config = Zend_Registry::get('config');
								$path = sprintf('%s/httpdocs/profiles/tmp/product/thumbnails/', $config->paths->base);
								$path2 = sprintf('%s/httpdocs/profiles/tmp/product/pictures/', $config->paths->base);
								
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
					
					
								
								/*
								if ($ratio > 1) {        
									$newH = 60;        
									$newW = 60 * $ratio;
								    $newH2 = 200;        
									$newW2 = 200 * $ratio;
								}
								else { 
									$newW = 60;        
									$newH = 60 * $ratio;
									$newW2 = 200;        
									$newH2 = 200 * $ratio;
								}
								*/
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
								$thumbPath2 = '/profiles/tmp/product/thumbnails/' . $filename;
								$thumbPath3 = $path2 . $filename;
								$thumbPath4 = '/profiles/tmp/product/pictures/' . $filename;
					
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

									$this->product->profile->$key = $filename;
									
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
                	$this->product->profile->$key = $this->$key;
					}
				
            }
            
			// if no errors have occurred, save the user
            if (!$this->hasError()) {

			$this->product->profile->product_code = $this->product_code;
			$this->product->profile->product_name = $this->product_name;
            $this->product->profile->product_description = $this->product_description;
			$this->product->profile->product_unit = $this->product_unit;
			$this->product->profile->product_currency = $this->product_currency;
            $this->product->profile->unit_price = $this->unit_price;
			$this->product->profile->iva = $this->iva;
            $this->product->profile->iva2 = $this->iva2;
			$this->product->profile->iva2_name = $this->iva2_name;
			
            $this->product->profile->unit_cost = $this->unit_cost;
			$this->product->profile->iva_p = $this->iva_p;
            $this->product->profile->iva_p2 = $this->iva_p2;
			$this->product->profile->iva_p2_name = $this->iva_p2_name;
			
            $this->product->save();
			
			if ($this->thecompany){
				$this->company2->user_id = $this->user->getId();
				$this->company2->comp_doc_type =	'product';			
				$this->company2->contact_id = $this->product->getId();
				$this->company2->profile->thecompany = $this->thecompany;
				$this->company2->save();
				
				if ($this->company2->profile->company_address){
					$this->product->profile->company_address = $this->company2->profile->company_address;
				}
				
				if ($this->product->profile->company_id) {
					$old_ = array ();			
					$old_ = unserialize(base64_decode($this->product->profile->company_id));	
				    foreach ($old_ as $old) {
						if ($old == $this->company2->getId()) { 
							$aprobado = false;
							break;
						}
						else {
							 $aprobado = true;
						}
					}
					if (empty($old_) or $aprobado == true) {
						array_push($old_, $this->company2->getId());
						$new_ = base64_encode(serialize($old_));
						$this->product->profile->company_id = $new_;
					}
				}
				else {
					$old_ = array ();
					array_push($old_, $this->company2->getId());
					$new_ = base64_encode(serialize($old_));
					$this->product->profile->company_id = $new_;
				}
				
				$this->product->profile->thecompany= $this->company2->getId();
				$this->product->save();
			}
			
            }

            // return true if no errors have occurred
            return !$this->hasError();
        }
		protected function cleanHtml($html)
        {
            $chain = new Zend_Filter();
            $chain->addFilter(new Zend_Filter_StripTags(self::$tags));
            $chain->addFilter(new Zend_Filter_StringTrim());

            $html = $chain->filter($html);

            $tmp = $html;
            while (1) {
                // Try and replace an occurrence of javascript:
                $html = preg_replace('/(<[^>]*)javascript:([^>]*>)/i',
                                     '$1$2',
                                     $html);

                // If nothing changed this iteration then break the loop
                if ($html == $tmp)
                    break;

                $tmp = $html;
            }

            return $html;
        }
    }
?>