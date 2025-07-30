<?php
    if(CONTROLER){

        if (ZONE && !isset($_GET['href'])) {
            include "events/list.php";
        }
        elseif (ZONE && isset($_GET['href'])) {
            include "events/event_detail.php";
        }
        else {
            header("Location: ".SITE_URL."home");
        }
    }
    else{
        header("Location: ".SITE_URL."home");
    }

    // include "function/query.php";
?>