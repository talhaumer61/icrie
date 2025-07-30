<?php
    if(CONTROLER){
        include "ask_your_question/form.php";
        
    }
    else{
        header("Location: ".SITE_URL."home");
    }

    include "ask_your_question/query.php";
?>