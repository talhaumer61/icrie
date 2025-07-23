<?php
include "admin/include/dbsetting/classdbconection.php";
include "admin/include/dbsetting/lms_vars_config.php";
include "admin/include/functions/functions.php";
include "admin/include/functions/login_func.php";
$dblms = new dblms();

// REDIRECTIONS
if (CONTROLER == "admin"){
  include ('admin/index.php');
} else {
  include ('include/index.php');
}
?>