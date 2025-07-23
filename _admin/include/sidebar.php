<?php
echo'
<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="'.SITE_URL_PORTAL.'profile"><i data-feather="settings"></i></a>
        <img class="img-100 rounded-circle" src="'.$_SESSION['userlogininfo']['LOGINPHOTO'].'" alt="">
        <!--<div class="badge-bottom"><span class="badge badge-primary">New</span></div>-->
        <a href="'.SITE_URL_PORTAL.'profile">
            <h6 class="mt-3 f-14 f-w-600">'.$_SESSION['userlogininfo']['LOGINNAME'].'</h6>
        </a>
        <p class="mb-0 font-roboto">'.get_admtypes($_SESSION['userlogininfo']['LOGINTYPE']).'</p>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General </h6>
                        </div>
                    </li>
                    <li><a class="nav-link menu-title link-nav" href="'.SITE_URL_PORTAL.'dashboard"><i data-feather="home"></i><span>Dashboard</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="'.SITE_URL_PORTAL.'news"><i data-feather="layout"></i><span>News & Blogs</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="'.SITE_URL_PORTAL.'leaders"><i data-feather="layout"></i><span>Leaders</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="'.SITE_URL_PORTAL.'partners"><i data-feather="layout"></i><span>Partners</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="settings"></i><span>Our Focus</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="'.SITE_URL_PORTAL.'focus">Focus</a></li>
                            <li><a href="'.SITE_URL_PORTAL.'summary-area">Summary Areas</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="settings"></i><span>What We Do</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="'.SITE_URL_PORTAL.'what-we-do">What We Do</a></li>
                            <li><a href="'.SITE_URL_PORTAL.'what-we-do-features">Features</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="settings"></i><span>Website Setting</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="'.SITE_URL_PORTAL.'policies">Policies</a></li>
                            <li><a href="'.SITE_URL_PORTAL.'reviews">Reviews</a></li>
                            <li><a href="'.SITE_URL_PORTAL.'banner">Banner</a></li>
                            <li><a href="'.SITE_URL_PORTAL.'contact">Contact Info</a></li>
                            <li><a href="'.SITE_URL_PORTAL.'about">About Us</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="settings"></i><span>Profile</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="'.SITE_URL_PORTAL.'profile">Setting</a></li>
                            <li><a href="?logout">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>';
?>