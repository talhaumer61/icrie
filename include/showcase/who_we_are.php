<?php
    $sqlArray   = array ( 
                                'select' 		=>	'
                                                          about_title
                                                        , about_des
                                                        , about_img
                                                    '
                                ,'return_type' 	=> 'single' 
                            ); 
    $rows  = $dblms->getRows(ABOUT, $sqlArray);
    echo '
        <div class="who__area section-padding">
            <img class="who__area-shape" src="assets/img/shape/who-we.png" alt="whoWe-shape">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xxl-5 col-lg-6 lg-mb-30">
                        <div class="who__area-left">
                            <div class="who__area-left-title">
                                <h2>'.$rows['about_title'].'</h2>
                                <div class="'.(CONTROLER == 'about'?'':'line-clamp-3').' content-justify">'.$rows['about_des'].'</div>
                            </div>
                            <div class="who__area-left-list">';
                                $who_links_array = explode(',',$rows4['setting_links']);
                                echo '
                                <p>';
                                    foreach($who_links_array as $key => $val):
                                        echo '<i class="'.($key == 0 ? 'fa-brands fa-facebook-f': ($key == 1 ? 'fa-brands fa-x-twitter': ($key == 2 ? 'fa-brands fa-instagram': ($key == 3 ? 'fa-brands fa-linkedin-in': ($key == 4 ? 'fa-brands fa-youtube': ''))))).'"></i><a href="'.$val.'" style="color: var(--primary-color-1);">'.($key == 0 ? 'Facebook': ($key == 1 ? 'X': ($key == 2 ? 'Instagram': ($key == 3 ? 'Linked In': ($key == 4 ? 'Youtube': ''))))).'</a>';
                                    endforeach;
                                    echo '
                                </p>
                            </div>
                            <a class="btn-one" href="'.SITE_URL.'about">Read More</a>
                        </div>
                    </div>
                    <div class="col-xxl-7 col-lg-6">
                        <div class="who__area-right">
                            <div class="who__area-right-image t-right">
                                <img class="who__area-right-image-shape" src="assets/img/shape/who.png" alt="who-image">
                                <img class="who__area-right-image-shape-one left-right-animate" src="assets/img/shape/who-1.png" alt="who-image">							
                                <div class="image-overlay dark__image">
                                    <img src="'.IMG_URL.'about/'.$rows['about_img'].'" alt="who-image" style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
?>