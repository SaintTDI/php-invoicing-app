<?php
    class FormProcessor_RemoveREmail extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		public $image = null;
		protected $_uploadedFile;

        public function __construct($db, $user_id)
        {
            parent::__construct();

            $this->db = $db;
            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);

			$this->weekly_removed = $this->user->profile->weekly_removed;
			$this->email = $this->user->profile->email;
        }

        public function process(Zend_Controller_Request_Abstract $request)
        {
            // validate the e-mail address
            $this->email = $this->sanitize($request->getPost('email'));
            $validator = new Zend_Validate_EmailAddress();

            if (strlen($this->email) == 0)
                $this->addError('email', 'Por favor introduce tu correo electr&oacute;nico');
            else if (!$validator->isValid($this->email))
                $this->addError('email', 'Por favor introduce una direcci&oacute;n de correo electr&oacute;nica v&aacute;lida');
            else
                $this->user->profile->weekly_removed = 'TRUE';
            
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
                $this->user->save();
            }

            // return true if no errors have occurred
            return !$this->hasError();
        }
    }
?>