<?php
include_once (moduleName().'/query.php');
echo'  
<div class="page-body">
    <div class="container-fluid">';
        // include_once (moduleName().'/list.php');
        if(LMS_VIEW == 'add'){
            include_once (moduleName().'/add.php');
        } elseif (LMS_VIEW == 'edit') {
            include_once (moduleName().'/edit.php');
        } else {
            include_once (moduleName().'/list.php');
        }
        echo'
    </div>
</div>';
?>