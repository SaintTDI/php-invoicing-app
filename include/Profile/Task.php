<?php
    class Profile_Task extends Profile
    {
        public function __construct($db, $task_id = null)
        {
            parent::__construct($db, 'tbl_task_profile');

            if ($task_id > 0)	
                $this->setTaskId($pask_id);

        }

        public function setTaskId($task_id)
        {
            $filters = array('task_id' => (int) $task_id);
            $this->_filters = $filters;
        }
    }
?>