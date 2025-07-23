<?php
    if(CONTROLER){
        include "fatwa/fatwa_form.php";
        
    }
    else{
        header("Location: ".SITE_URL."home");
    }

    include "fatwa/query.php";
?>