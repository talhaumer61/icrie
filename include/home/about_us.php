<?php
$sqlArray   = array (
                    'select' 		=>	'about_title, about_des, about_img, about_img2'
                    ,'return_type' 	=> 'single' 
); 
$rows  = $dblms->getRows(ABOUT, $sqlArray, $query);
$sqlArrayFunction = array(
    'select'    => 'info_phone, info_location'
    ,'where'    => array(
                    'info_status'      => 1,
                )
    ,'return_type' => 'single'
);                  
$info  = $dblms->getRows(CONTACT_INFO, $sqlArrayFunction);

echo '
<div class="about-four">
    <div class="about-four-shape-one-1">
        <img src="assets/images/shape/about-shape-1.png" alt="shape">
    </div>
    <div class="about-four-shape-one-2">
        <img src="assets/images/shape/service-shape-2.png" alt="shape">
    </div>
    <div class="container">
        <div class="row gutter-y-60">
            <div class="col-xl-7 col-lg-10">
                <div class="about-four-info">
                    <div class="heading-box">
                        <span class="heading-subtitle wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;">🤝 ABOUT US</span>
                        <h2 class="heading-title wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;">
                            '.$rows['about_title'].'
                        </h2>
                    </div>
                    <div class="section-details">
                        <p>
                            '.html_entity_decode($rows['about_des']).'    
                        </p>
                    </div>
                    <ul class="about-details-four">
                        <li>
                            <i class="flaticon-call"></i>
                            <div class="about-contact-four">
                                <h6>Call To Any Queary</h6>
                                <p>'.$info['info_phone'].'</p>
                            </div>
                        </li>';
                        /*
                        echo '
                        <li>
                            <img src="assets/images/about/about-four-ceo.png" alt="ceo-image">
                            <div class="about-contact-four">
                                <h6>Founder &amp; CEO</h6>
                                <p>Jon Denial</p>
                            </div>
                            <img src="assets/images/Sign.png" alt="sign">
                        </li>';*/
                        echo'
                    </ul>
                    <a href="'.SITE_URL_WEB.'contact" class="btn btn-outline-secondary">Contact us <i class="flaticon-next"></i></a>
                </div>
            </div>
            <div class="col-xl-5 col-lg-8 ms-auto">
                <div class="row gutter-y-30">
                    <div class="col-sm-7 col-6">
                        <div class="about-four-image">
                            <img src="'.SITE_URL.'uploads/images/about/'.$rows['about_img'].'" alt="about-image">
                        </div>
                    </div>
                    <div class="col-sm-5 col-6 ">
                        <div class="about-four-right">
                            <div class="about-four-images">
                                <img src="'.SITE_URL.'uploads/images/about/'.$rows['about_img2'].'" alt="about-image">
                            </div>
                            <div class="about-experiences-box">
                                <div class="about-four-shape"></div>
                                <h2>25+</h2>
                                <p>Years Of Experiences</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="about-four-box">
                    <div class="about-four-icon">
                        <i class="flaticon-mission"></i>
                    </div>
                    <div class="about-four-details">
                        <h4>Company Mission</h4>
                        <p>Our mission is to provide innovative and reliable financial solutions tailored to your
                            unique
                            needs.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="about-four-box">
                    <div class="about-four-icon">
                        <i class="flaticon-targeting"></i>
                    </div>
                    <div class="about-four-details">
                        <h4>Target &amp; Vision</h4>
                        <p>Our vision is to provide reliable and innovative financial solutions tailored to your
                            needs.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="about-four-box">
                    <div class="about-four-icon">
                        <i class="flaticon-active"></i>
                    </div>
                    <div class="about-four-details">
                        <h4>Goal</h4>
                        <p>Our dedicated teams are committed to providing personalized solutions for all your
                            financial
                            needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
';
?>