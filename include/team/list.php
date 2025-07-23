<?php
$sqlArrayFunction = array(
                            'select'    => 'team_id, team_name, team_href, team_img, team_designation, team_fb, team_twitter, team_linkedin, team_insta'
                            ,'where'    => array(
                                            'team_status'      => 1,
                                            'is_deleted'       => 0
                                        )
                            ,'order_by' => 'id_priority'
                            ,'return_type' => 'all'
);                  
$TEAMS  = $dblms->getRows(TEAMS, $sqlArrayFunction);
echo '
    <section class="team-one inner-page" style="background-color: transparent;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 m-auto">
                    <div class="heading-box text-center">
                        <span class="heading-subtitle wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;">🤝 OUR TEAM</span>
                        <h2 class="heading-title wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;"><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">M</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">t</span></span><span> </span><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">O</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">u</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">r</span></span><span> </span><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">E</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">x</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">p</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">r</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">t</span></span><span> </span><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">T</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">a</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">m</span></span></h2>
                        <p class="heading-details">Meet the team dedicated to turning your homeownership dreams into
                            reality. Our experts bring
                            a wealth of experience and personalized care to guide you every step of the way.</p>
                    </div>
                </div>
            </div>
            <div class="row gutter-y-40">';
            foreach ($TEAMS as $key => $value){
                echo'
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="team-one-box">
                        <a href="'.SITE_URL_WEB.'team/'.$value['team_href'].'" class="team-one-image">
                            <img class="team-img" src="'.SITE_URL.'uploads/images/team/'.$value['team_img'].'" alt="team-image">
                        </a>
                        <div class="team-one-details">
                            <div class="team-one-details-inner">
                                <h5><a class="text-white name-clamp" href="'.SITE_URL_WEB.'team/'.($value['team_href']).'">'.$value['team_name'].'</a></h5>
                                <p class="text-white name-clamp">'.$value['team_designation'].'</p>
                                <div class="team-one-social-media">
                                    <ul>
                                        <li><a href="'.$value['team_fb'].'" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="'.$value['team_insta'].'" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                        <li><a href="'.$value['team_linkedin'].'" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                        <li><a href="'.$value['team_twitter'].'" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
                echo'
            </div>
        </div>
    </section>
';
?>