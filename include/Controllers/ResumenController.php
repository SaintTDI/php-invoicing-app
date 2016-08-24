<?php
    class ResumenController extends CustomControllerAction
    {

        public function init()
        {
            parent::init();
            $this->breadcrumbs->addStep('Resumen', $this->getUrl(null, 'resumen'));
			$this->identity = Zend_Auth::getInstance()->getIdentity();
        }
		
        public function indexAction()
        {
        	    $request = $this->getRequest();
			$addr_id = 0;
			$contact_id_ = 0;
			
			$now1 = date('d-m-Y');
			$year__ = date('Y', strtotime($now1));
			
			$now__ = '01-01-' . $year__;
			$now_ = date('d-m-Y', strtotime($now__));
			
			$this->view->now_ = $now_;
			
			//user's details
			$default_country= $this->identity->country;
			$this->view->default_country = $default_country;
			////

            $fp = new FormProcessor_CompanyDetails($this->db, 
            								        $this->identity->user_id,
												$addr_id,
												$contact_id_);
												
			$company_id = $fp->company->getId();

            // define the options for retrieving the addresses
            $options = array(
                'user_id'  => $this->identity->user_id,
                'doc_type'   => 'company',
                'doc_id'   => $company_id
            );

            // retrieve the blog posts
            $addresses = DatabaseObject_Address::GetAddresses($this->db, $options);
			
			$this->view->addresses = $addresses;
			$this->view->company_id = $company_id;
				
            //$this->breadcrumbs->addStep('Detalles de su Empresa');
            $this->view->fp = $fp;
			
        }
		

    }
?>