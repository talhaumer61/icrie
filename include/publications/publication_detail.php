<?php
    $sqlArrayFunction   = array ( 
                            'select' 		=>	'publication_id, publication_title, publication_file, publication_photo, publication_desc, id_type, date_added'
                            ,'where' 		=>	array( 
                                                          'publication_status'	=> '1'
                                                        , 'is_deleted'	        => '0'
                                                        , 'publication_href'	    => cleanvars($_GET['href'])
                                                    )
                            ,'return_type' 	=> 'single' 
                        ); 
    $rowsFunction  = $dblms->getRows(PUBLICATIONS, $sqlArrayFunction);
    
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
                    <img src="'.SITE_URL.'uploads/images/publications/'.$rowsFunction['publication_photo'].'">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="portfolio-block">
                        <div class="protfolio-details-two">
                            <h3>'.$rowsFunction['publication_title'].'</h3>
                            <p>'.html_entity_decode(html_entity_decode($rowsFunction['publication_desc'])).'</p>
                        </div>
                    </div>
                </div>
            </div>';
            if(!empty($rowsFunction['publication_file'])){}
                echo '
                <div class="row mb-3">
                        <a href="'.SITE_URL.'uploads/files/publications/'.$rowsFunction['publication_file'].'" class="" target="_blank">Download Attachment</a>
                </div>';
            echo'
        </div>
    </div>
    ';
    /*
    echo '
        '.titleMaker('Functions Details').' 
        <div class="blog__details section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="blog__details-left">
                            <div class="dark__image">
                                <img src="'.IMG_URL.'functions/'.$rowsFunction['publication_photo'].'" alt="blog-standard" style="height: 600px; width: 100%;">
                            </div>
                            <div class="blog__details-left-meta">
                                <ul>
                                    <li><a style="color: var(--primary-color-1);" href="'.SITE_URL.'functions/'.ZONE.'"><i class="fal fa-user"></i>'.get_functiontypes($rowsFunction['id_functions']).'</a></li>
                                    <li><a style="color: var(--primary-color-1);" href="#"><i class="fal fa-calendar-alt"></i>'.date("d M, Y",strtotime($rowsFunction['date_added'])).'</a></li>
                                </ul>
                            </div>';
                            $files_array    = explode(',',$rowsFunction['publication_file']);
                            for ($i=0 ; $i < count($files_array) ; $i++):
                                $path_parts     = pathinfo($files_array[$i]);
                                $extension 	    = strtolower($path_parts['extension']);
                                if (in_array($extension, get_FileType(1))) {
                                    echo '
                                    <li class="mb-3 mt-3"><a href="'.SITE_URL.'functions/'.$files_array[$i].'" style="color: var(--primary-color-1);">View Attachments '.$i.'</a></li>';
                                }
                            endfor;
                            echo '
                            <h3 class="mb-20">'.$rowsFunction['publication_title'].'</h3>
                            <p>'.$rowsFunction['publication_desc'].'</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>';*/
?>