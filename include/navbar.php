<?php
$sqlArrayFunction = array(
    'select'    => 'setting_email, setting_links'
    ,'where'    => array(
                    'setting_status'      => 1,
                    'is_deleted'       => 0
                )
    ,'return_type' => 'single'
);                  
$WEB  = $dblms->getRows(SETTING, $sqlArrayFunction);
$social=explode(',',$WEB['setting_links']);

$sqlArrayFunction = array(
    'select'    => 'info_phone, info_location'
    ,'where'    => array(
                    'info_status'      => 1,
                )
    ,'return_type' => 'single'
);                  
$info  = $dblms->getRows(CONTACT_INFO, $sqlArrayFunction);
echo'
    <div class="topbar-one">
        <div class="container-fluid">
            <div class="topbar-one-inner">
                <ul class="topbar-one-info white-font">
                    <li>
                        <i class="flaticon-location"></i>
                        <p style=" line-clamp: 0; overflow: hidden;">'.$info['info_location'].'</p>
                    </li>
                    <li>
                        <i class="flaticon-mail"></i>
                        <a href="mailto:'.$WEB['setting_email'].'">'.$WEB['setting_email'].'</a>
                    </li>
                    <li>
                        <i class="flaticon-phone-call"></i>
                        <a href="tel:'.$info['info_phone'].'">'.$info['info_phone'].'</a>
                    </li>
                </ul>
                <div class="topbar-one-right">
                    <ul class="topbar-one-social-media white-font">
                        <li><a href="'.$social[0].'"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="'.$social[1].'"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="'.$social[2].'"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="'.$social[3].'"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <header class="main-header">
        <div class="container-fluid">
            <nav class="main-menu">
                <div class="main-menu-logo">
                    <a href="'.SITE_URL_WEB.'home">
                        <img src="'.SITE_URL_WEB.'assets/images/logo.png" alt="header-logo">
                    </a>
                </div>
                <div class="main-menu-inner">
                    <ul class="main-menu-list">
                        ';
                                foreach(navBarMaker() as $key => $val):
                                    echo '
                                        <li class="'.((!empty($val['links']))? 'menu-item-children': '').'" >
                                            <a href="'.SITE_URL_WEB.$key.'">'.moduleName(strtolower($val['name'])).' '.((!empty($val['links']))? '<i class="fa-solid fa-chevron-down"></i>': '').'</a>';
                                            if (!empty($val['links'])) {
                                                echo '
                                                <ul class="sub-menu">';
                                                    foreach($val['links'] as $SubKey => $SubVal):
                                                        echo '
                                                        <li>
                                                            <a href="'.SITE_URL_WEB.$SubKey.'">'.(($SubVal['name'] != 'FAQ')? ucwords(strtolower($SubVal['name'])): $SubVal['name']).'</a>
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
                    <button class="btn btn-primary header-right-end">Menu</i></button>
                    <div class="main-menu-right">
                        <a href="'.SITE_URL_WEB.'zakat-calculator" class="btn btn-primary">Zakat calculator <i class="flaticon-next"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
';