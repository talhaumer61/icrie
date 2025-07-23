<?php
    echo '
        <div class="header__area header__sticky">
            <div class="custom__container">
                <div class="header__area-menubar p-relative">
                    <div class="header__area-menubar-left">
                        <div class="header__area-menubar-left-logo">
                            <a href="'.SITE_URL.'index"><img class="dark-n" src="'.IMG_URL.'logo/'.$rows4['setting_photo'].'" alt="Logo-image"><img class="light-n" src="'.IMG_URL.'logo/'.$rows4['setting_photo'].'" alt="Logo-image"></a>
                        </div>
                    </div>
                    <div class="header__area-menubar-center">
                        <div class="header__area-menubar-center-menu menu-responsive">						
                            <ul id="mobilemenu">';
                                foreach(navBarMaker() as $key => $val):
                                    echo '
                                        <li class="'.((!empty($val['links']))? 'menu-item-has-children': '').'" >
                                            <a href="'.SITE_URL.$key.'">'.ucwords(strtolower($val['name'])).'</a>';
                                            if (!empty($val['links'])) {
                                                echo '
                                                <ul class="sub-menu">';
                                                    foreach($val['links'] as $SubKey => $SubVal):
                                                        echo '
                                                        <li>
                                                            <a href="'.SITE_URL.$SubKey.'">'.(($SubVal['name'] != 'FAQ')? ucwords(strtolower($SubVal['name'])): $SubVal['name']).'</a>
                                                        </li>';
                                                    endforeach;
                                                echo '
                                                </ul>';
                                            }
                                            echo '
                                        </li>';
                                endforeach;
                                echo '
                            </ul>
                        </div>
                    </div>
                    <div class="header__area-menubar-right">
                        <div class="header__area-menubar-right-sidebar">
                            <div class="header__area-menubar-right-sidebar-popup-icon">
                                <i class="fa-solid fa-ellipsis"></i>
                            </div>
                        </div>
                        <div class="header__area-menubar-right-responsive-menu menu__bar">
                            <i class="flaticon-dots-menu"></i>
                        </div>
                        <div class="header__area-menubar-right-sidebar-popup">
                            <div class="sidebar-close-btn"><i class="fal fa-times"></i></div>
                            <div class="header__area-menubar-right-sidebar-popup-logo">
                                <a href="'.SITE_URL.'index"> <img src="'.IMG_URL.'logo/'.$rows4['setting_photo'].'" alt="Logo-image"> </a>
                            </div>
                            <p>'.$rows4['setting_desc'].'</p>
                            <div class="header__area-menubar-right-sidebar-popup-contact">
                                <h4 class="mb-30">Get In Touch</h4>
                                <div class="header__area-menubar-right-sidebar-popup-contact-item">
                                    <div class="header__area-menubar-right-sidebar-popup-contact-item-icon">
                                        <i class="fal fa-phone-alt icon-animation"></i>
                                    </div>
                                    <div class="header__area-menubar-right-sidebar-popup-contact-item-content">
                                        <span>Call Now</span>
                                        <h6><a href="tel:'.$rows2['info_phone'].'">'.$rows2['info_phone'].'</a></h6>
                                    </div>
                                </div>
                                <div class="header__area-menubar-right-sidebar-popup-contact-item">
                                    <div class="header__area-menubar-right-sidebar-popup-contact-item-icon">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="header__area-menubar-right-sidebar-popup-contact-item-content">
                                        <span>Email Us</span>
                                        <h6><a href="mailto:'.$rows2['info_mail_1'].'">'.$rows2['info_mail_1'].'</a></h6>
                                    </div>
                                </div>
                                <div class="header__area-menubar-right-sidebar-popup-contact-item">
                                    <div class="header__area-menubar-right-sidebar-popup-contact-item-icon">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="header__area-menubar-right-sidebar-popup-contact-item-content">
                                        <span>Office Address</span>
                                        <h6 style="color: #fff;">'.$rows2['info_location'].'</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-overlay"></div>
                        <!-- sidebar Menu Start -->										
                    </div>
                </div>
                <div class="menu__bar-popup">
                    <div class="menu__bar-popup-close"><i class="fal fa-times"></i></div>
                    <div class="menu__bar-popup-left">
                        <div class="menu__bar-popup-left-logo">
                            <a href="'.SITE_URL.'index"><img src="'.IMG_URL.'logo/'.$rows4['setting_photo'].'" alt="logo-image"></a>
                            <div class="responsive-menu"></div>
                        </div>
                        <div class="menu__bar-popup-left-social">
                            <h6>Follow Us</h6>
                            <ul>
                                <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://dribbble.com/" target="_blank"><i class="fab fa-dribbble"></i></a></li>							
                                <li><a href="https://www.behance.net/" target="_blank"><i class="fab fa-behance"></i></a></li>
                                <li><a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            </ul>						
                        </div>
                    </div>
                    <div class="menu__bar-popup-right">
                        <div class="menu__bar-popup-right-search">
                            <form>
                                <input type="search" placeholder="Search Here....." required>
                                <button type="submit"><i class="fal fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="menu__bar-popup-right-contact">
                            <h4>Get In Touch</h4>
                            <div class="menu__bar-popup-right-contact-item">
                                <div class="menu__bar-popup-right-contact-item-info">
                                    <span>Call Now</span>
                                    <h6><a href="tel:+125(895)658568">+125 (895) 658 568</a></h6>
                                </div>
                            </div>
                            <div class="menu__bar-popup-right-contact-item">
                                <div class="menu__bar-popup-right-contact-item-info">
                                    <span>Quick Email</span>
                                    <h6><a href="mailto:'.$rows2['info_mail_1'].'">'.$rows2['info_mail_1'].'</a></h6>
                                </div>
                            </div>
                            <div class="menu__bar-popup-right-contact-item">
                                <div class="menu__bar-popup-right-contact-item-info">
                                    <span>Office Address</span>
                                    <h6><a href="https://www.google.com/maps" target="_blank">PV3M+X68 Welshpool United Kingdom</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>			
                </div>
            </div>
        </div>';
        
?>