<?php
checkCpanelLMSALogin();
include("header.php");
include("".get_logintypes($_SESSION['userlogininfo']['LOGINAFOR'])."/dashboard.php");
include("footer.php");
?>