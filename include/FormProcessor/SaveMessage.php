<?php
    class FormProcessor_SaveMessage extends FormProcessor
    {
        protected $db = null;
        public $user = null;
		
        public function __construct($db, $user_id, $message_id = 0)
        {
            parent::__construct();

            $this->db = $db;

            $this->user = new DatabaseObject_User($db);
            $this->user->load($user_id);

            $this->message = new DatabaseObject_Message($db);
            $this->message->loadForUser($this->user->getId(), $message_id);
		
			if ($this->message->isSaved()) {
				$this->name = $this->message->profile->name;
				$this->email = $this->message->profile->email;
				$this->subject = $this->message->profile->subject;
				$this->message_content = $this->message->profile->message_content;
        		}		
			else
                	$this->message->user_id = $this->user->getId();
			}

        public function process(Zend_Controller_Request_Abstract $request)
        {
			
        		$this->name = $this->sanitize($request->getPost('name'));
            $this->message->profile->name = $this->name;
			
        		$this->email = $this->sanitize($request->getPost('email'));
            $this->message->profile->email = $this->email;
			
        		$this->subject = $this->sanitize($request->getPost('subject'));
            $this->message->profile->subject = $this->subject;
			
        		$this->message_content = $this->sanitize($request->getPost('message_content'));
            $this->message->profile->message_content = $this->message_content;
			
			// if no errors have occurred, save the user
            if (!$this->hasError()) {
					$this->message->profile->name = $this->name;
					$this->message->profile->email = $this->email;
					$this->message->profile->subject = $this->subject;
					$this->message->profile->message_content = $this->message_content;
				
					$this->message->save();
          	}
		    
		    // return true if no errors have occurred
            return !$this->hasError();
        }
		
    }
?>