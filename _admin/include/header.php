<?php
include_once ('head.php');
echo'
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="page-main-header">
        <div class="main-header-right row m-0">
            <div class="main-header-left">
                <div class="logo-wrapper"><a href="'.SITE_URL_PORTAL.'dashboard"><img class="img-fluid" src="'.SITE_URL.'admin/assets/images/logo/logo.png" alt=""></a></div>
                <div class="dark-logo-wrapper"><a href="'.SITE_URL_PORTAL.'dashboard"><img class="img-fluid" src="'.SITE_URL.'admin/assets/images/logo/dark-logo.png" alt=""></a></div>
                <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
            </div>
            <div class="nav-right col pull-right right-menu p-0">
                <ul class="nav-menus">
                    <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                    <li><div class="mode"><i class="fa fa-moon-o"></i></div></li>
                    <li class="onhover-dropdown p-0"><button class="btn btn-primary-light" type="button"><a href="?logout"><i data-feather="log-out"></i>Log out</a></button></li>
                </ul>
            </div>
            <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
    <div class="page-body-wrapper sidebar-icon">';
        include_once "".get_logintypes($_SESSION['userlogininfo']['LOGINAFOR'])."/sidebar.php";
        $sqlstring = "";
        $adjacents = 3;
        if(!($Limit)) { $Limit = 20; }
        if($page) { $start = ($page - 1) * $Limit; } else { $start = 0; }
?>