<?php
    class FormProcessor_Project extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $project = null;
		public $company = null;
		public $image = null;
		protected $_uploadedFile;
		
		public $projectProfile = array(
			'project_document_1' => 'Documento'
		);

        public function __construct($db, $user_id, $project_id = 0, $company_id = 0)
        {
            parent::__construct();

            $this->db = $db;
			
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);
			
            $this->project = new DatabaseObject_Project($db);
            $this->project->loadForUser($this->user->getId(), $project_id);
			
            $this->company = new DatabaseObject_Ccompany($db);
			$this->company->loadForUser($this->user->getId(), $company_id);	
			
			$this->company_id_ = $company_id;	
			
		    $options = array(
                'user_id' => $this->user->getId()
            );

            $companieslist = DatabaseObject_Ccompany::GetAllCompanies($db, $options);
			
			$this->companieslist = $companieslist;
		
			if ($this->project->isSaved()) {
				
            $this->project_title = $this->project->project_title;
			$this->client = $this->project->profile->client;
			$this->start = $this->project->profile->start;
            $this->ends = $this->project->profile->ends;
			$this->responsible = $this->project->profile->responsible;
			$this->contact_id2 = $this->project->profile->contact_id2;
			//$this->team = $this->project->profile->team;
			$this->budget = $this->project->profile->budget;
			$this->notes = $this->project->profile->notes;

			$this->company_id = $this->project->profile->company_id;
			$this->company_address = $this->project->profile->company_address;
			$this->data_type = $this->project->profile->data_type;
			
			foreach ($this->projectProfile as $key => $label)
				$this->$key = $this-> project->profile->$key;
        }		
		else
                	$this->project->user_id = $this->user->getId();

		}

        public function process(Zend_Controller_Request_Abstract $request)
        {
			
            $this->project_title = $this->sanitize($request->getPost('project_title'));
            if (strlen($this->project_title) == 0){
                $this->addError('project_title', 'Por favor introduce el nombre del proyecto');
		    }
            else{
                $this->project->project_title = $this->project_title;
		    }
			
			$this->client = $this->sanitize($request->getPost('company'));
            $this->project->profile->client = $this->client;	
			
            $this->start = $this->sanitize($request->getPost('start'));
            if (strlen($this->start) == 0){
                $this->addError('invoice_date', 'Por favor introduzca la fecha de comienzo');
			}
            else{
                $this->project->profile->start = $this->start;	
			}

			if ($this->sanitize($request->getPost('ends'))){
	            $this->ends = $this->sanitize($request->getPost('ends'));
	            if (strtotime($this->ends) < strtotime($this->start))
	                $this->addError('start', 'La fecha de culminaci&oacute;n no puede ser anterior a la de inicio');
	            else
	                $this->project->profile->ends = $this->ends;	
			}
			else{
				$this->ends = $this->sanitize($request->getPost('ends'));
            		$this->project->profile->ends = $this->ends;	
			}
			
			$this->responsible = $this->sanitize($request->getPost('responsible'));
            $this->project->profile->responsible = $this->responsible;	
			
			$this->contact_id2 = $this->sanitize($request->getPost('contact_id2'));
            $this->project->profile->contact_id2 = $this->contact_id2;	
			/*
			$this->team = $this->sanitize($request->getPost('team'));
            $this->project->profile->team = $this->team;	*/

            $punit_ = $this->sanitize($request->getPost('budget'));
		    $punit2_ = str_replace('.', '', $punit_);
			$this->budget = str_replace(',', '.', $punit2_);
			//$this->budget = $punit2_;
            $this->project->profile->budget = $this->budget;
			
			$this->notes = $this->sanitize($request->getPost('notes'));
            $this->project->profile->notes = $this->notes;	
			
			$this->company_id = $this->sanitize($request->getPost('company_id'));
            $this->project->profile->company_id = $this->company_id;	
			
			$this->company_address = $this->sanitize($request->getPost('company_address'));
            $this->project->profile->company_address = $this->company_address;	
			
			$this->data_type = $this->sanitize($request->getPost('data_type'));
            $this->project->profile->data_type = $this->data_type;	

            // process the files
               // process the public profile
            foreach ($this->projectProfile as $key => $label) {

				if ($label == 'Documento') {
						if ($_FILES[$key]['error'] != true) {
						
						$config = Zend_Registry::get('config');
						$aroute = sprintf('%s/httpdocs/documents/projects/', $config->paths->base);
						$afile = $this->project->profile->project_document_1;

						$aimage = $aroute . $afile;
						
						$image = $key;
							
							if (!isset($_FILES[$key])) {
								$this->addError($key, 'Invalid upload data');
								return false;
							}
				
							$file = $_FILES[$key];
				
							switch ($file['error']) {
								case UPLOAD_ERR_OK:
									// success
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
							
							if (!$this->hasError()) {
								
								if (!file_exists($file['tmp_name']) || !is_file($file['tmp_name']))
								 throw new Exception('No se puedo encontrar el archivo cargado');
								if (!is_readable($file['tmp_name']))
								 throw new Exception('El sistema no pudo leer el archivo');
								 $this->_uploadedFile = $file['tmp_name'];
								 
								// Get the original file name from $_FILES
								$file_name = $file['name'];
								$file_name = preg_replace('/[^a-zA-Z0-9\\.]/', '', $file_name);
								//////
								 
								$this->image->filename = basename($file_name);
								 
								$config = Zend_Registry::get('config');
								$address = sprintf('%s/httpdocs/documents/projects/', $config->paths->base);
								
								$namef = basename($file_name);
								
								$originalImage = mt_rand() . $namef;
								
								$this->project->profile->$key = $originalImage;
								
								move_uploaded_file($file['tmp_name'], $address . $originalImage);
								
							}
						}
				}


				else {
                	$this->$key = $this->sanitize($request->getPost($key));
                	$this->project->profile->$key = $this->$key;
					}
				
            }
            
			// if no errors have occurred, save the user
            if (!$this->hasError()) {

            $this->project->project_title = $this->project_title;
			$this->project->profile->start = date("d-m-Y", strtotime($this->start));
            $this->project->profile->ends = date("d-m-Y", strtotime($this->ends));
			$this->project->profile->responsible = $this->responsible;
			$this->project->profile->contact_id2 = $this->contact_id2;
			//$this->project->profile->team = $this->team;
			$this->project->profile->budget = $this->budget;
			$this->project->profile->notes = $this->notes;
			$this->project->profile->company_id = $this->company_id;
			$this->project->profile->client= $this->client;
			$this->project->profile->company_address= $this->company_address;
			$this->project->profile->data_type = $this->data_type;
			
			$this->project->save();


			if (!$this->company_id_){
				if ($this->data_type == 'company'){

            			foreach ($this->companieslist as $company) {
            				if ( $this->client == $company->profile->thecompany){
            					$empty_ = TRUE;
						}		
					}
			
					if (!$empty_){
						$this->company->user_id = $this->user->getId();
						$this->company->comp_doc_type =	'project';			
						$this->company->contact_id = $this->project->getId();
						$this->company->profile->thecompany = $this->client;
						$this->company->save();
						
						$this->project->profile->company_id = $this->company->getId();		
						$this->project->save();
					}
				}	
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