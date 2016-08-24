<?php
    function smarty_function_get_total_tags($params, $smarty)
    {
        $db = Zend_Registry::get('db');

        $summary = DatabaseObject_VisualPost::getTotalTags($db);

        if (isset($params['assign']) && strlen($params['assign']) > 0)
            $smarty->assign($params['assign'], $summary);
    }
?>