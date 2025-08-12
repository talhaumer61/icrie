<?php
if(ZONE){
    include "include/breadcrumb.php";
    include "blog/blog_detail.php";
}
else{
    include "include/breadcrumb.php";
    include "blog/list.php";
}
?>