<?php
    $sqlArray   = array ( 
                            'select' 		=>	'
                                                      slider_img
                                                    , slider_title
                                                    , slider_caption
                                                    , slider_btn_text
                                                    , slider_btn_href
                                                '
                            ,'where' 		=>	array( 
                                                          'slider_status'	=> '1'
                                                        , 'is_deleted'	    => '0'
                                                    )
                            ,'return_type' 	=> 'all' 
                        ); 
    $rows  = $dblms->getRows(SLIDER, $sqlArray);
    echo '
    <link rel="stylesheet" href="'.SITE_URL.'assets/slider/css/owl.carousel.min.css">
    <link rel="stylesheet" href="'.SITE_URL.'assets/slider/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="'.SITE_URL.'assets/slider/css/style.css">

    <div class="home-slider owl-carousel js-fullheight">';
        foreach($rows as $key => $val): 
            echo '
            <div class="slider-item js-fullheight" style="background-image:url('.IMG_URL.'slider/'.$val['slider_img'].');">
                <div class="overlay"></div>
                <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 text-center">
                            <h3 style="color: #fff; font-size: 30px;">'.$val['slider_caption'].'</h3>
                            <h1 class="mb-3" style="color: #fff; text-shadow: 2px 2px #000;">'.$val['slider_title'].'</h1>
                        </div>
                    </div>
                    </div>
                </div>
            </div>';
        endforeach;
        echo '
    </div>
    
    <script src="'.SITE_URL.'assets/slider/js/jquery.min.js"></script>
    <script src="'.SITE_URL.'assets/slider/js/popper.js"></script>
    <script src="'.SITE_URL.'assets/slider/js/bootstrap.min.js"></script>
    <script src="'.SITE_URL.'assets/slider/js/owl.carousel.min.js"></script>
    <script src="'.SITE_URL.'assets/slider/js/main.js"></script>';
        include("slider_marquee_text.php");
?>