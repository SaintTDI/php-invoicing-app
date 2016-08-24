<?php
    class Profile_Project extends Profile
    {
        public function __construct($db, $project_id = null)
        {
            parent::__construct($db, 'tbl_project_profile');

            if ($project_id > 0)	
                $this->setProjectId($project_id);

        }

        public function setProjectId($project_id)
        {
            $filters = array('project_id' => (int) $project_id);
            $this->_filters = $filters;
        }
    }
?>