<?php
$sqlArrayFunction   = array ( 
    'select' 		=>	'functions_id'
    ,'where' 		=>	array('is_deleted' => '0')
    ,'return_type' 	=> 'count' 
); 
$sqlArrayTeam       = array ( 
    'select' 		=>	'team_id'
    ,'where' 		=>	array('is_deleted' => '0')
    ,'return_type' 	=> 'count' 
); 
$sqlArrayBlog       = array ( 
    'select' 		=>	'blog_id'
    ,'where' 		=>	array('is_deleted' => '0')
    ,'return_type' 	=> 'count' 
); 

$sqlArrayFunction['where']['id_type'] = '1';
$count1  = $dblms->getRows(FUNCTIONS, $sqlArrayFunction);
$sqlArrayFunction['where']['id_type'] = '2';
$count2  = $dblms->getRows(FUNCTIONS, $sqlArrayFunction);
$sqlArrayFunction['where']['id_type'] = '3';
$count3  = $dblms->getRows(FUNCTIONS, $sqlArrayFunction);

$count4  = $dblms->getRows(TEAMS, $sqlArrayTeam);
$count5  = $dblms->getRows(BLOGS, $sqlArrayBlog);
/*
echo '
<div class="process-two">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8">
                    <div class="heading-box">
                        <span class="heading-subtitle wow fadeInUp animated animated">🤝 OUR PROCESS</span>
                        <h2 class="heading-title wow fadeInUp animated animated">Our process: streamlined steps to secure your loanlift loan</h2>
                    </div>
                </div>
            </div>
            <div class="process-two-slider">
                <div class="process-two-slider-item">
                    <div class="step-no">'.$count1.'+</div>
                    <div class="process-two-box-outer">
                        <div class="process-two-box">
                            <div class="process-two-box-icon">
                                <i class="flaticon-contract"></i>
                            </div>
                            <div class="process-two-box-title">
                                <h3>Research</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="process-two-slider-item">
                    <div class="step-no">'.$count2.'+</div>
                    <div class="process-two-box-outer">
                        <div class="process-two-box">
                            <div class="process-two-box-icon">
                                <i class="flaticon-contract"></i>
                            </div>
                            <div class="process-two-box-title">
                                <h3>Publications</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="process-two-slider-item">
                    <div class="step-no">'.($count1*$count2).'+</div>
                    <div class="process-two-box-outer">
                        <div class="process-two-box">
                            <div class="process-two-box-icon">
                                <i class="flaticon-approval"></i>
                            </div>
                            <div class="process-two-box-title">
                                <h3>Journal</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="process-two-slider-item">
                    <div class="step-no">'.$count5.'+</div>
                    <div class="process-two-box-outer">
                        <div class="process-two-box">
                            <div class="process-two-box-icon">
                                <i class="flaticon-money-1"></i>
                            </div>
                            <div class="process-two-box-title">
                                <h3>Events</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="process-two-slider-item">
                    <div class="step-no">'.$count3.'+</div>
                    <div class="process-two-box-outer">
                        <div class="process-two-box">
                            <div class="process-two-box-icon">
                                <i class="flaticon-money-1"></i>
                            </div>
                            <div class="process-two-box-title">
                                <h3>Training And Capacity Building</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="process-two-slider-item">
                    <div class="step-no">'.$count4.'+</div>
                    <div class="process-two-box-outer">
                        <div class="process-two-box">
                            <div class="process-two-box-icon">
                                <i class="flaticon-money-1"></i>
                            </div>
                            <div class="process-two-box-title">
                                <h3>Team</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
'; */

echo '
<section class="why-choose-section-one">
        <div class="why-choose-shape-one-1">
            <img src="assets/images/shape/why-choose-shape-1.png" alt="shape">
        </div>
        <div class="why-choose-shape-one-2">
            <img src="assets/images/shape/why-choose-shape-2.png" alt="shape">
        </div>
        <div class="container">
            <div class="row gutter-y-30">
                <div class="col-xl-9 why-choose-left-one">
                    <div class="heading-box heading-white">
                        <span class="heading-subtitle wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;">🤝 WHY CHOOSE</span>
                        <h2 style="font-size:25px;">Your reliable hub for training and research in Islamic economics & finance</h2>
                    </div>
                    <div class="why-choose-one-image">
                        <img src="assets/images/why-choose-image-1.jpg" alt="why-choose-image" style="transition: transform 0.8s ease-out; transform: translateY(135px) scale(1.2);">
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                            <div class="why-choose-one-box">
                                <div class="why-choose-box-one-title">
                                    <i class="flaticon-solution"></i>
                                    <h4>Training and Capacity Building</h4>
                                </div>
                                <p>Empowering individuals and teams with practical skills to excel in their roles.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                            <div class="why-choose-one-box">
                                <div class="why-choose-box-one-title">
                                    <i class="flaticon-badge"></i>
                                    <h4>Courses</h4>
                                </div>
                                <p>Industry-relevant courses designed to boost your knowledge and career prospects.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                            <div class="why-choose-one-box">
                                <div class="why-choose-box-one-title">
                                    <i class="flaticon-trusted"></i>
                                    <h4>Consultancy & Advisory Services</h4>
                                </div>
                                <p>Expert guidance to help you make informed decisions and drive strategic growth.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-12">
                    <ul class="counter-box-one">
                        <li>
                            <h6 data-target="'.(!empty($count1)?$count1:"3").'" data-symbol="+">'.(!empty($count1)?$count1:"3").'+</h6>
                            <span>01</span>
                            <p>Research</p>
                        </li>
                        <li>
                            <h6 data-target="'.(!empty($count2)?$count2:"6").'" data-symbol="+">'.(!empty($count2)?$count2:"6").'+</h6>
                            <span>02</span>
                            <p>Publications</p>
                        </li>
                        <li>
                            <h6 data-target="'.(!empty($count3)?$count3:"8").'" data-symbol="+">'.(!empty($count3)?$count3:"8").'+</h6>
                            <span>03</span>
                            <p>Training And Capacity Building</p>
                        </li>
                        <li>
                            <h6 data-target="'.(!empty($count4)?$count4:"12").'" data-symbol="+">'.(!empty($count4)?$count4:"12").'+</h6>
                            <span>04</span>
                            <p>Team</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
';
?>