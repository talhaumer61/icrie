<?php
$sqlArray   = array (
    'select' 		=>	'about_title, about_des, about_img'
    ,'return_type' 	=> 'single' 
); 
$rows  = $dblms->getRows(ABOUT, $sqlArray);
echo'
    <div class="about-two">
        <div class="container">
            <div class="row gutter-y-60">
                <div class="col-lg-6 col-md-12 about-two-right">
                    <div class="heading-box">
                        <span class="heading-subtitle wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;">🤝 ABOUT US</span>
                        <h2 class="heading-title wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;">'.$rows['about_title'].'</h2>
                        <p class="heading-details">'.html_entity_decode($rows['about_des']).'</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 about-two-left">
                    <div class="about-two-image active">
                        <img src="'.SITE_URL.'uploads/images/about/'.$rows['about_img'].'" alt="about-image">
                        <div class="image-shape active">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="about-two-cta-box">
                        <div class="client-list">
                            <img src="'.SITE_URL_WEB.'assets/images/Team.png" alt="team">
                        </div>
                        <div class="about-two-info-right">
                            <h5>Our Expert Team</h5>
                            <p class="mb-0">A global customer refers to an individual
                                or business entity that operates.</p>
                        </div>
                        <div class="about-two-cta-box-icon">
                            <img width="50" src="'.SITE_URL_WEB.'assets/images/Team-icon.svg" alt="icon">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
';

    include("include/home/specialist.php");
?>