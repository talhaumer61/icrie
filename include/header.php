<?php
echo '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'.(ZONE ? moduleName(ZONE): moduleName(CONTROLER)).' - '.TITLE_HEADER.'</title>
    <link rel="shortcut icon" href="'.SITE_URL_WEB.'assets/images/favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;family=Wix+Madefor+Display:wght@400..800&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="'.SITE_URL_WEB.'assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="'.SITE_URL_WEB.'assets/vendors/slick/slick.css">
    <link rel="stylesheet" href="'.SITE_URL_WEB.'assets/vendors/animation/animate.min.css">
    <link rel="stylesheet" href="'.SITE_URL_WEB.'assets/vendors/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="'.SITE_URL_WEB.'assets/vendors/icon/font/flaticon_loan.css">
    <link rel="stylesheet" href="'.SITE_URL_WEB.'assets/vendors/nouislider/css/nouislider.min.css">
    <link rel="stylesheet" href="'.SITE_URL_WEB.'assets/vendors/nouislider/css/nouislider.pips.css">
    <link rel="stylesheet" href="'.SITE_URL_WEB.'assets/vendors/youtube-popup/youtube-popup.css">
    <link rel="stylesheet" href="'.SITE_URL_WEB.'assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="'.SITE_URL_WEB.'assets/css/style.css">
    <link rel="stylesheet" href="'.SITE_URL_WEB.'assets/css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
</head>
<body class="custom-cursor">
    <div class="custom-cursor-one">
        <div class="custom-cursor-inner"></div>
    </div>';
    /*
    echo'
    <div class="preloader">
        <div class="loading-container">
            <div class="loading-text">
                <span>I</span>
                <span>C</span>
                <span>R</span>
                <span>I</span>
                <span>E</span>
            </div>
        </div>
    </div>';*/
    echo'
';
include "navbar.php";
?>