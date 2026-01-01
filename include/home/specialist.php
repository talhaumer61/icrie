<?php
$sqlArray   = array ( 
    'select' 		=>	'team_id, team_img, team_name, team_designation, team_fb, team_twitter, team_linkedin, team_insta'
    ,'where' 		=>	array( 
                                  'team_status'	    => '1'
                                , 'is_deleted'	    => '0'
                            )
    ,'order_by' 	=> 'id_priority ASC LIMIT 4' 
    ,'return_type' 	=> 'all' 
); 
$rows  = $dblms->getRows(TEAMS, $sqlArray);
echo '
    <section class="team-one pb-1">
        <div class="team-shape-one-1">
            <img src="'.SITE_URL_WEB.'assets/images/shape/team-shape-1.png" alt="shape">
        </div>
        <div class="team-shape-one-2">
            <img src="'.SITE_URL_WEB.'assets/images/shape/team-shape-2.png" alt="shape">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 m-auto">
                    <div class="heading-box text-center">
                        <span class="heading-subtitle wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;">🤝 OUR TEAM</span>
                        <h2 class="heading-title wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;"><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">T</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">h</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span></span><span> </span><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">t</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">a</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">m</span></span><span> </span><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">d</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">r</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">i</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">v</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">i</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">n</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">g</span></span><span> </span><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">i</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">n</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">n</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">o</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">v</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">a</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">t</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">i</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">o</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">n</span></span><span> </span><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">a</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">n</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">d</span></span><span> </span><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">x</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">c</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">l</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">l</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">n</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">c</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span></span><span> </span><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">i</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">n</span></span><span> </span><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">f</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">i</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">n</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">a</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">n</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">c</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">i</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">a</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">l</span></span><span> </span><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">s</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">r</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">v</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">i</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">c</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">s</span></span></h2>
                    </div>
                </div>
            </div>
            <div class="row gutter-y-30">';
            foreach($rows as $key => $val){
            echo'
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="team-one-box">
                        <a href="'.SITE_URL_WEB.'team-detail/'.$val['team_id'].'" class="team-one-image">
                            <img class="team-img" src="'.SITE_URL.'uploads/images/team/'.$val['team_img'].'" alt="'.$val['team_name'].'"  width="100%">
                        </a>
                        <div class="team-one-details">
                            <div class="team-one-details-inner">
                                <h5>'.$val['team_name'].'</h5>
                                <p>'.$val['team_designation'].'</p>';
                                /*
                                echo'
                                <div class="team-one-social-media">
                                    <ul>
                                        <li><a href="'.$value['team_fb'].'" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="'.$value['team_insta'].'" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                        <li><a href="'.$value['team_linkedin'].'" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                        <li><a href="'.$value['team_twitter'].'" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                        </li>
                                    </ul>
                                </div>';
                                */
                                echo'
                            </div>
                        </div>
                    </div>
                </div>';
            }
            echo'
            </div>
            <div class="my-5 text-center">
                <a href="'.SITE_URL_WEB.'team" class="btn btn-secondary">View More<i class="flaticon-next"></i></a>
            </div>
        </div>
    </section>
';
?>