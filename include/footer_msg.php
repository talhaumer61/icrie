<?php


    echo '
    <div class="footer__four" data-background="'.SITE_URL.'assets/img/shape/footer-bg-1.png">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 xl-mb-30">
                    <div class="footer__four-widget about">
                        <img src="'.IMG_URL.'logo/'.$rows4['setting_photo'].'" class="mb-2" style="width: 60%; height: 30%;">
                        <h4>About Us</h4>
                        <div class="footer__four-widget-about">
                            <p>'.html_entity_decode($rows4['setting_desc']).'</p>			
                        </div>
                    </div>
                </div>
                <!--
                <div class="col-xl-2 col-lg-3 col-md-6 col-sm-5 sm-mb-30">
                    <div class="footer__four-widget">
                        <h4>Other Pages</h4>
                        <div class="footer__area-widget-menu">
                            <ul>
                                <li><a href="'.SITE_URL.'about">About Us</a></li>
                                <li><a href="'.SITE_URL.'contact">Contact Us</a></li>
                                <li><a href="'.SITE_URL.'blog">Blog</a></li>
                                <li><a href="'.SITE_URL.'faq">Faqs</a></li>
                            </ul>
                        </div>
                    </div>					
                </div>
                -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-7 md-mb-30">
                    <div class="footer__four-widget">
                        <h4>Gallery</h4>
                        <div class="footer__one-widget-gallery-area four">';
                            foreach($rows3 as $key => $val):
                                echo '
                                <div class="footer__one-widget-gallery-area-item">
                                    <a class="img-popup" href="'.IMG_URL.'gallery/'.$val['gallery_photo'].'">
                                        <img src="'.IMG_URL.'gallery/'.$val['gallery_photo'].'" style="height: 60px;">
                                    </a>
                                </div>';
                            endforeach;
                            echo '
                        </div>
                    </div>					
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="footer__four-widget four">
                        <h4>Official Info</h4>
                        <div class="footer__four-widget-info">
                            <p>'.$rows2['info_location'].'</p>
                            <ul>
                                <li><a href="mailto:'.$rows2['info_mail_1'].'"><i class="far fa-envelope"></i>'.$rows2['info_mail_1'].'</a></li>
                                <li><a href="tel:'.$rows2['info_phone'].'"><i class="far fa-phone-alt"></i>'.$rows2['info_phone'].'</a></li>
                            </ul>
                        </div>
                    </div>			
                </div>
            </div>
        </div>
        <div class="copyright__four">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <p>Copyright© '.date("Y").'  <a href="'.SITE_URL.'index">'.$rows4['setting_web_name'].'</a> - &nbsp; All Rights Reserved By <a href="'.COPY_RIGHTS_URL.'" target="_blank">Green Professional Technologies</a></p>
                    </div>
                </div>
            </div>
        </div>	
    </div>';
?>