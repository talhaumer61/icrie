<?php
echo'
<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="profile.php"><i data-feather="settings"></i></a>
        <img class="img-100 rounded-circle" src="'.$_SESSION['userlogininfo']['LOGINPHOTO'].'" alt="">
        <!--<div class="badge-bottom"><span class="badge badge-primary">New</span></div>-->
        <a href="profile.php">
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
                    <li><a class="nav-link menu-title link-nav" href="dashboard.php"><i data-feather="home"></i><span>Dashboard</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="slider.php"><i data-feather="image"></i><span>Slider</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="course.php"><i data-feather="book"></i><span>Courses</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="events.php"><i data-feather="calendar"></i><span>Events</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="functions.php"><i data-feather="file-text"></i><span>Functions</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="journals.php"><i data-feather="file-text"></i><span>Journals</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="publications.php"><i data-feather="file-text"></i><span>Publications</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="team.php"><i data-feather="users"></i><span>Team</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="faq.php"><i data-feather="layers"></i><span>FAQ</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="blogs.php"><i data-feather="layers"></i><span>Blogs</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="gallery.php"><i data-feather="folder"></i><span>Gallery</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="contact.php"><i data-feather="phone-call"></i><span>Contact</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="about.php"><i data-feather="info"></i><span>About</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="settings.php"><i data-feather="settings"></i><span>Settings</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="aaoifi_registrations.php"><i data-feather="file-text"></i><span>AAOIFI Registrations</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="email_queries.php"><i data-feather="mail"></i><span>Email Queries</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="questions.php"><i data-feather="edit"></i><span>Questions</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="user"></i><span>Profile</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="profile.php">Setting</a></li>
                            <li><a href="index.php?logout">Log out</a></li>
                        </ul>
                    </li>';
                    /*
                    echo'
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="command"></i><span>Products</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="products.php">Products</a></li>
                            <li><a href="products.php?view=add">Add Product</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link menu-title link-nav" href="sub_categories.php"><i data-feather="layout"></i><span>Sub Categories</span></a></li>
                    <li><a class="nav-link menu-title link-nav" href="categories.php"><i data-feather="layout"></i><span>Categories</span></a></li>
                    ';
                    */
                    echo'
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>';
?>