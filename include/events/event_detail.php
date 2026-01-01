

<?php
    $sqlArrayFunction   = array ( 
                            'select' 		=>	'event_title, event_photo, event_type, event_date, event_href, event_brief_detail, event_detail, event_reg_link'
                            ,'where' 		=>	array( 
                                                          'event_status'	=> '1'
                                                        , 'is_deleted'	        => '0'
                                                        , 'event_href'	    => cleanvars($_GET['href'])
                                                    )
                            ,'return_type' 	=> 'single' 
                        ); 
    $rowsFunction  = $dblms->getRows(EVENTS, $sqlArrayFunction);
    
    echo'
    <div class="inner-page-hero" style="background-image: url('.SITE_URL_WEB.'assets/images/background/blog-hero-bg.jpg);">
        <div class="container">
            <div class="hero-heading-title">
                <h2>'.ucwords($_GET['href']).'</h2>
            </div>
            <ul class="bradcrumb">
                <li><a href="#">'.ucwords(ZONE).'</a></li>
                <li><a href="#">'.ucwords($_GET['href']).'</a></li>
            </ul>
        </div>
    </div>
    <div class="portfolio-detail-section ">
        <div class="container">
            <div class="portfolio-block">
                <div class="portfolio-details-video">
                    <img class="w-100" src="'.SITE_URL.'uploads/images/events/'.$rowsFunction['event_photo'].'">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="portfolio-block">
                        <div class="protfolio-details-two">
                            <h3>'.$rowsFunction['event_title'].'</h3>
                            <p>'.html_entity_decode($rowsFunction['event_detail']).'</p>
                            <p>'.html_entity_decode($rowsFunction['event_brief_detail']).'</p>';
                            if (!empty($rowsFunction['event_reg_link'])) {
                                echo '
                                <a href="'.$rowsFunction['event_reg_link'].'" class="btn btn-outline-secondary" target="_blank">Register Now <i class="flaticon-next"></i></a>';
                            }
                            echo'
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
?>