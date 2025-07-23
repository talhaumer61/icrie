<?php
$sqlArrayFunction = array(
    'select'    => 'slider_id, slider_title, slider_btn_text, slider_btn_href, slider_img'
    ,'where'    => array(
                    'slider_status'      => 1,
                    'is_deleted'       => 0
                )
    ,'return_type' => 'all'
);                  
$SLIDER  = $dblms->getRows(SLIDER, $sqlArrayFunction);
echo '
    <section class="banner-one">
        <div class="container-fluid p-0">
            <div class="banner-one-slider">';
            foreach($SLIDER as $key => $value){
                echo'
                <div class="banner-one-slider-item">
                    <div class="banner-one-slider-item-image zoom-in">
                        <img src="'.SITE_URL.'uploads/images/slider/'.$value['slider_img'].'" alt="banner-images">
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8 col-md-10">
                                <div class="banner-one-info">
                                    <div class="banner-title fade-left">
                                        <h1>'.$value['slider_title'].'</h1>
                                    </div>
                                    <div class="fade-in-up">
                                        <a href="'.$value['slider_btn_href'].'" class="btn btn-primary">'.$value['slider_btn_text'].'<i
                                                class="flaticon-next"></i></a>
                                    </div>
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