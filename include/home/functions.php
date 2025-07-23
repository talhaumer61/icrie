<?php
$condition = array ( 
    'select'       =>  "type_id, type_status, type_name, type_icon, type_desc, type_href"
   ,'where' 	    =>  array( 
                               'is_deleted'       => 0
                           )
   ,'return_type'  =>  'all' 
  ); 
$type = $dblms->getRows(FUNCTION_TYPES, $condition);
echo '
    <section class="services-section-one">
        <div class="service-one-shape-1">
            <img src="'.SITE_URL_WEB.'assets/images/shape/service-shape-1.png" alt="shape">
        </div>
        <div class="service-one-shape-2">
            <img src="'.SITE_URL_WEB.'assets/images/shape/service-shape-2.png" alt="shape">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="heading-box text-center">
                        <span class="heading-subtitle wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;">🤝 Available Insurance</span>
                        <h2 class="heading-title wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;">We Provide Or Not?</h2>
                    </div>
                </div>
            </div>
            <div class="service-one-inner row">';
            foreach($type as $key => $value){
                echo '
                <div class="service-one-box col-md-6">
                    <div class="service-one-box-image">
                        <img src="'.SITE_URL_WEB.'assets/images/services/services-1.png" alt="service images">
                    </div>
                    <div class="service-one-icon-box">
                        <i class="flaticon-personal"></i>
                    </div>
                    <div class="service-one-info">
                        <h4>'.$value['type_name'].'</h4>
                        <p>'.$value['type_desc'].'</p>
                    </div>
                    <a href="'.SITE_URL_WEB.'function/'.$value['type_href'].'" class="read-more-btn">
                        <i class="flaticon-next"></i>
                    </a>
                </div>';
            }
                echo'
            </div>
            <div class="text-center mb-3">
                <a href="service.html" class="btn btn-secondary">View More<i class="flaticon-next"></i></a>
            </div>
        </div>
    </section>
';
?>