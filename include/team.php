<?php
if(ZONE){
    include "team/team_detail.php";
}
else{
    include "include/breadcrumb.php";
    include "team/list.php";
}
?>