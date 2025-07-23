<?php
$sqlArrayFunction = array(
    'select'    => 'team_id, team_name, team_img, team_desc, team_designation, team_fb, team_twitter, team_linkedin, team_insta'
    ,'where'    => array(
                    'team_href'          => ZONE,
                    'team_status'      => 1,
                    'is_deleted'       => 0
                )
    ,'return_type' => 'single'
);                  
$row  = $dblms->getRows(TEAMS, $sqlArrayFunction);
echo '
    <div class="inner-page-hero" style="background-image: url(assets/images/background/team-bg.jpg);">
        <div class="container">
            <div class="hero-heading-title">
                <h2>'.(ZONE ? moduleName(ZONE) : moduleName(CONTROLER)).'</h2>
            </div>
            <ul class="bradcrumb">
                <li><a href="'.SITE_URL.'">Home</a></li>
                <li><a href="#">'.moduleName(CONTROLER).'</a></li>
                '.(ZONE ? '<li><a href="#">'.moduleName(ZONE).'</a></li>' : '').'
            </ul>
        </div>
    </div>
    <div class="team-details-section">
        <div class="container">
            <div class="row gutter-y-30 gutter-x-15">
                <div class="col-lg-4">
                    <div class="left-side-sticy">
                        <div class="team-details-block">
                            <div class="team-images">
                                <img src="'.SITE_URL.'uploads/images/team/'.$row['team_img'].'" alt="team-image">
                            </div>
                        </div>
                        <div class="team-social-media">
                            <h3>'.$row['team_designation'].'</h3>
                            <ul>
                                <li>
                                    <h4>Social Media</h4>
                                    <ul>
                                        <li><a href="'.$value['team_fb'].'" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="'.$value['team_insta'].'" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                        <li><a href="'.$value['team_linkedin'].'" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                        <li><a href="'.$value['team_twitter'].'" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="team-details-block">
                        <h3>'.$row['team_name'].'</h3>
                        <p>'.$row['team_desc'].'</p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
';
?>