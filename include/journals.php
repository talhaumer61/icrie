<?php
    include "include/breadcrumb.php";
if(ZONE){
    include "journals/journal_detail.php";
}
else{
    include "journals/list.php";
}
?>