<?php
echo'
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="'.SITE_URL.'assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="'.SITE_URL.'assets/images/favicon.png" type="image/x-icon">
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="../../css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="../../css2-1?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="../../css2-2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/fontawesome.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/datatables.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/style.css">
    <link id="color" rel="stylesheet" href="'.SITE_URL.'assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/responsive.css">    
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/owlcarousel.css">
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/prism.css">    
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/date-picker.css">
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/vector-map.css">
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/select2.css">

    <!-- CKEDITOR -->
    <script src="'.SITE_URL.'assets/ckeditor/ckeditor.js"></script> 
    
    <!-- SWEETALERT JS/CSS -->
    <link rel="stylesheet" href="'.SITE_URL.'assets/sweetalert/sweetalert_custom.css">
    <script src="'.SITE_URL.'assets/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="'.SITE_URL.'assets/css/dropzone.css">
    
    <title>'.(LMS_VIEW ? moduleName(LMS_VIEW).' - ' : '').' '.moduleName(false).' - '.TITLE_HEADER.'</title>
</head>

<style>
    .cke_notification {
        display: none !important;
    }
</style>

<body>';
    echo'
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>';
?>