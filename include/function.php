<?php
    if(CONTROLER){

        if (ZONE && ZONE=="course" && !isset($_GET['href'])) {
            include "function/course_form.php";
        }
        elseif (ZONE && ZONE!="course" && !isset($_GET['href'])) {
            include "function/list.php";
        }
        elseif (ZONE && ZONE!="course" && isset($_GET['href'])) {
            include "function/function_detail.php";
        }
        else {
            header("Location: ".SITE_URL."home");
        }
    }
    else{
        header("Location: ".SITE_URL."home");
    }

    include "function/query.php";
?>