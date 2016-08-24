<?php
    class DatabaseObject_User extends DatabaseObject
    {
		protected $_uploadedFile;

        public $profile = null;
        public $_newPassword = null;
		   
        public function __construct($db)
        {
            parent::__construct($db, 'tbl_user', 'user_id');

            $this->add('username');
            $this->add('password');
            $this->add('company');
			$this->add('user_type');
            $this->add('ts_created', time(), self::TYPE_TIMESTAMP);
            $this->add('ts_last_login', null, self::TYPE_TIMESTAMP);

            $this->profile = new Profile_User($db);
        }

        
        protected function postLoad()
        {
            $this->profile->setUserId($this->getId());
            $this->profile->load();
        }
		   
        protected function postInsert()
        {
            $this->profile->setUserId($this->getId());
            $this->profile->save(false);
            //$this->sendEmail('user-register.tpl');
            return true;
        }
		   
        protected function postUpdate()
        {
            $this->profile->save(false);
            return true;
        }
		   
        protected function preDelete()
        {
            $this->profile->delete();
            return true;
        }
	
        public function loadByUsername($username)
        {
            $username = trim($username);
            if (strlen($username) == 0)
                return false;

            $query = sprintf('select %s from %s where username = ?',
                             join(', ', $this->getSelectFields()),
                             $this->_table);

            $query = $this->_db->quoteInto($query, $username);

            return $this->_load($query);
        }
		
       	public function loadByEmail($email)
        {
			$query_p = sprintf(
				'select user_id from tbl_user_profile where profile_value = \'%s\'',
				$email
            );

            $user_id = $this->_db->fetchOne($query_p);
			
			$query = sprintf(
				'select * from tbl_user where user_id = %d',
				$user_id
            );
			
			return $this->_load($query);
        }

        public function sendEmail($tpl)
        {
            $templater = new Templater();
            $templater->user = $this;

            // fetch the e-mail body
            $body = $templater->render('email/' . $tpl);

            // extract the subject from the first line
            list($subject, $body) = preg_split('/\r|\n/', $body, 2);

            // now set up and send the e-mail
            $mail = new Zend_Mail('UTF-8');

            // set the to address and the user's full name in the 'to' line
            $mail->addTo($this->profile->email,
                         trim($this->profile->first_name . ' ' .
                              $this->profile->last_name));

            // get the admin 'from' details from the config
            $mail->setFrom(Zend_Registry::get('config')->email->from->email,
            Zend_Registry::get('config')->email->from->name);

            // set the subject and body and send the mail
            $mail->setSubject(trim($subject));
            $mail->setBodyHtml(trim($body));
            $mail->send();
        }

        public function sendEmailCTO($tpl)
        {
            $templater = new Templater();
            $templater->user = $this;

            // fetch the e-mail body
            $body = $templater->render('email/' . $tpl);

            // extract the subject from the first line
            list($subject, $body) = preg_split('/\r|\n/', $body, 2);

            // now set up and send the e-mail
            $mail = new Zend_Mail('UTF-8');

            // set the to address and the user's full name in the 'to' line
            $mail->addTo(Zend_Registry::get('config')->email->to->email,
            Zend_Registry::get('config')->email->to->name);

            // get the admin 'from' details from the config
            $mail->setFrom(Zend_Registry::get('config')->email->from->email,
            Zend_Registry::get('config')->email->from->name);

            // set the subject and body and send the mail
            $mail->setSubject(trim($subject));
            $mail->setBodyHtml(trim($body));
            $mail->send();
        }
		
        public function sendEmailAlert($tpl)
        {
            $templater = new Templater();
            $templater->user = $this;

            // fetch the e-mail body
            $body = $templater->render('email/' . $tpl);

            // extract the subject from the first line
            list($subject, $body) = preg_split('/\r|\n/', $body, 2);

            // now set up and send the e-mail
            $mail = new Zend_Mail('UTF-8');

            // set the to address and the user's full name in the 'to' line
            $mail->addTo(Zend_Registry::get('config')->email->to->ceoemail,
            Zend_Registry::get('config')->email->to->ceoname);
			
            $mail->addTo(Zend_Registry::get('config')->email->to->ctoemail,
            Zend_Registry::get('config')->email->to->ctoname);

            // get the admin 'from' details from the config
            $mail->setFrom(Zend_Registry::get('config')->email->from->email,
            Zend_Registry::get('config')->email->from->name);

            // set the subject and body and send the mail
            $mail->setSubject(trim($subject));
            $mail->setBodyHtml(trim($body));
            $mail->send();
        }

        public function createAuthIdentity()
        {
			
            $identity = new stdClass;
			if ($this->company){
            		$identity->user_id = $this->company;
			}
			else{
				$identity->user_id = $this->getId();
			}
			$identity->real_id = $this->getId();
            $identity->username = $this->username;
            $identity->user_type = $this->user_type;
			$identity->company = $this->company;
			$identity->plan = $this->profile->plan;
			$identity->country = $this->profile->country;
			
			$identity->section1 = $this->profile->section1;
			$identity->section2 = $this->profile->section2;
			$identity->section3 = $this->profile->section3;
			$identity->section4 = $this->profile->section4;
			$identity->section5 = $this->profile->section5;
			$identity->section6 = $this->profile->section6;
			$identity->section7 = $this->profile->section7;
			$identity->section8 = $this->profile->section8;
			$identity->section9 = $this->profile->section9;
			
            return $identity;
        }

        public function loginSuccess()
        {
            $this->ts_last_login = time();
            unset($this->profile->new_password);
            unset($this->profile->new_password_ts);
            unset($this->profile->new_password_key);
            $this->save();

            $message = sprintf('Successful login attempt from %s user %s',
                               $_SERVER['REMOTE_ADDR'],
                               $this->username);

            $logger = Zend_Registry::get('logger');
            $logger->notice($message);
        }
        static public function LoginFailure($username, $code = '')
        {
            switch ($code) {
                case Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND:
                    $reason = 'Unknown username';
                    break;
                case Zend_Auth_Result::FAILURE_IDENTITY_AMBIGUOUS:
                    $reason = 'Multiple users found with this username';
                    break;
                case Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID:
                    $reason = 'Invalid password';
                    break;
                default:
                    $reason = '';
            }

            $message = sprintf('Failed login attempt from %s user %s',
                               $_SERVER['REMOTE_ADDR'],
                               $username);

            if (strlen($reason) > 0)
                $message .= sprintf(' (%s)', $reason);

            $logger = Zend_Registry::get('logger');
            $logger->warn($message);
        }

        public function fetchPassword()
        {
            if (!$this->isSaved())
                return false;

            // generate new password properties
            $this->_newPassword = Text_Password::create(8);
            $this->profile->new_password = md5($this->_newPassword);
            $this->profile->new_password_ts = time();
            $this->profile->new_password_key = md5(uniqid() .
                                                   $this->getId() .
                                                   $this->_newPassword);

            // save new password to profile and send e-mail
            $this->profile->save();
            $this->sendEmail('user-fetch-password.tpl');

            return true;
        }

        public function confirmNewPassword($key)
        {
            // check that valid password reset data is set
            if (!isset($this->profile->new_password)
                || !isset($this->profile->new_password_ts)
                || !isset($this->profile->new_password_key)) {

                return false;
            }

            // check if the password is being confirm within a day
            if (time() - $this->profile->new_password_ts > 86400)
                return false;

            // check that the key is correct
            if ($this->profile->new_password_key != $key)
                return false;

            // everything is valid, now update the account to use the new password

            // bypass the local setter as new_password is already an md5
            parent::__set('password', $this->profile->new_password);

            unset($this->profile->new_password);
            unset($this->profile->new_password_ts);
            unset($this->profile->new_password_key);

            // finally, save the updated user record and the updated profile
            return $this->save();
        }

	   	public function usernameExists($username)
        {
            $query = sprintf('select count(*) from %s where username = ?',
                             $this->_table);

            $result = $this->_db->fetchOne($query, $username);

            return $result > 0;
        }
		
	    public function emailExists($email)
        {
			$query2 = sprintf('select count(*) from tbl_user_profile where profile_value = ?',
                             $this->_table);

            $result2 = $this->_db->fetchOne($query2, $email);

            return $result2 > 0;
        }
		
        static public function IsValidUsername($username)
        {
            $validator = new Zend_Validate_Alnum();
            return $validator->isValid($username);
        }
		
        public function __set($name, $value)
        {
            switch ($name) {
                case 'password':
                    $value = md5($value);
                    break;
            }

            return parent::__set($name, $value);
        }
   
	
	 public static function GetUsers($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'offset' => 0,
                'limit'  => 0,
                'order'  => 'u.username'
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            $select = self::_GetBaseQuery($db, $options);

            // set the fields to select
            $select->from(null, 'u.*');

            // set the offset, limit, and ordering of results
            if ($options['limit'] > 0)
                $select->limit($options['limit'], $options['offset']);

            $select->order($options['order']);

            // fetch user data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_User objects
            $users = parent::BuildMultiple($db, __CLASS__, $data);

            if (count($users) == 0)
                return $users;

            $user_ids = array_keys($users);

            // load the profile data for loaded posts
            $profiles = Profile::BuildMultiple($db,
                                               'Profile_User',
                                               array('user_id' => $user_ids));

            foreach ($users as $user_id => $user) {
                if (array_key_exists($user_id, $profiles)
                        && $profiles[$user_id] instanceof Profile_User) {

                    $users[$user_id]->profile = $profiles[$user_id];
                }
                else {
                    $users[$user_id]->profile->setUserId($user_id);
                }
            }

            return $users;
        }

	 	public static function GetUsers2($db, $options = array())
        {
            // initialize the options
            $defaults = array(
                'user_type' => 0,
                'company'  => 0
            );

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }
			

	        $select = $db->select();
			$select->from('tbl_user', '*');
			$select->where('user_type = ?', $options['user_type']);
			$select->where('company = ?', $options['company']);


            // fetch user data from database
            $data = $db->fetchAll($select);

            // turn data into array of DatabaseObject_User objects
            $users = parent::BuildMultiple($db, __CLASS__, $data);
			$user_ids = array_keys($users);
			
            if (count($users) == 0)
                return $users;

            // load the profile data for loaded posts
            $profiles = Profile::BuildMultiple($db,
                                               'Profile_User',
                                               array('user_id' => $user_ids));

            foreach ($users as $user_id => $user) {
                if (array_key_exists($user_id, $profiles)
                        && $profiles[$user_id] instanceof Profile_User) {

                    $users[$user_id]->profile = $profiles[$user_id];
                }
                else {
                    $users[$user_id]->profile->setUserId($user_id);
                }
            }

            return $users;
        }


        public static function GetUsersCount($db, $options)
        {
            $select = self::_GetBaseQuery($db, $options);
            $select->from(null, 'count(*)');

            return $db->fetchOne($select);
        }
		

        private static function _GetBaseQuery($db, $options)
        {
            // initialize the options
            $defaults = array('user_id' => array());

            foreach ($defaults as $k => $v) {
                $options[$k] = array_key_exists($k, $options) ? $options[$k] : $v;
            }

            // create a query that selects from the users table
            $select = $db->select();
            $select->from(array('u' => 'tbl_user'), array());


            // filter results on specified user ids (if any)
            if (count($options['user_id']) > 0)
                $select->where('u.user_id in (?)', $options['user_id']);

            return $select;
        }
		
       /* public function preInsert()
        {
            // first check that we can write the upload directory
            $path = self::GetUploadPath();
            if (!file_exists($path) || !is_dir($path))
                throw new Exception('Upload path ' . $path . ' not found');

            if (!is_writable($path))
                throw new Exception('Unable to write to upload path ' . $path);

            return true;
        }
		
		public function postInsert()
        {
            if (strlen($this->_uploadedFile) > 0)
                return move_uploaded_file($this->_uploadedFile,
                                          $this->getFullPath());

            return false;
        }

		public function uploadFile($path)
        {
            if (!file_exists($path) || !is_file($path))
                throw new Exception('Unable to find uploaded file');

            if (!is_readable($path))
                throw new Exception('Unable to read uploaded file');

            $this->_uploadedFile = $path;
        }
		
		public function getFullPath()
        {
            return sprintf('%s/%d', self::GetUploadPath(), $this->getId());
        }
		
		public static function GetUploadPath()
        {
            $config = Zend_Registry::get('config');

            return sprintf('%s/uploaded-files', $config->paths->data);
        }
		*/
    }
?>