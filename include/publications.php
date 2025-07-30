<?php
    if(CONTROLER){

        if (ZONE && !isset($_GET['href'])) {
            include "publications/list.php";
        }
        elseif (ZONE && isset($_GET['href'])) {
            include "publications/publication_detail.php";
        }
        else {
            header("Location: ".SITE_URL."home");
        }
    }
    else{
        header("Location: ".SITE_URL."home");
    }

?>