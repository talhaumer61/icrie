<?php

    $moduleName = array(
        'home'                  =>  'home'
        ,'team'                 =>  'team'
        ,'blog'                 =>  'blog'
        ,'function'             =>  'function'
        ,'publications'         =>  'publications'
        ,'events'               =>  'events'
        // ,'journals'             =>  'journals'
        ,'ask_your_question'    =>  'ask_your_question'
        ,'about-us'             =>  'about_us'
        ,'zakat-calculator'     =>  'zakat_calculator'
        ,'contact'              =>  'contact'
        ,'faq'                  =>  'faq'
    );
    include "header.php";
    include "navbar.php";
    if (array_key_exists(CONTROLER, $moduleName)) {
        include ($moduleName[CONTROLER].".php");
    } 
    else { 
        header("Location: ".SITE_URL_WEB."home");
    }
    include "footer.php";
?>
    