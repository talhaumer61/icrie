<?php
    $condition = array ( 
                         'select'       =>  "course_id, course_title, course_code"
                        ,'where' 	    =>  array( 
                                                        'course_status'    => 1
                                                    ,'is_deleted'       => 0
                                                )
                        ,'return_type'  =>  'all' 
      ); 
    $courses = $dblms->getRows(COURSE, $condition);

    echo'
    <div class="inner-page-hero" style="background-image: url('.SITE_URL_WEB.'assets/images/background/blog-hero-bg.jpg);">
        <div class="container">
            <div class="hero-heading-title">
                <h2>'.moduleName(ZONE).'</h2>
            </div>
            <ul class="bradcrumb">
                <li><a href="#">'.moduleName(CONTROLER).'</a></li>
                <li><a href="#">'.moduleName(ZONE).'</a></li>
            </ul>
        </div>
    </div>
    <div class="contact-section">
        <div class="container">
            <div class="heading-box text-center">
                <span class="heading-subtitle wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;">🤝 COURSES</span>
                <h2>Apply for your desired course</h2>
            </div>
        </div>
    </div>
    <div class="contact-form">
         <div class="container">
            <div class="row gutter-y-30 justify-content-center">
                <div class="col-lg-10">
                    <div class="contact-form-inner">
                        <form autocomplete="off" class="form-validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <div class="inquiry-form-group-one">
                                <label><i class="fa-regular fa-user"></i></label>
                                <input type="text" name="request_fullname" class="form-control" placeholder="Your Name" required="">
                            </div>
                            <div class="inquiry-form-group-one">
                                <label><i class="fa-solid fa-phone"></i></label>
                                <input type="number" name="request_phone" class="form-control" placeholder="Your Mobile Number" required="">
                            </div>
                            <div class="inquiry-form-group-one">
                                <label><i class="fa-regular fa-envelope"></i></label>
                                <input type="email" name="request_email" class="form-control" placeholder="Your Email" required="">
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-layer-group"></i></label>
                                <select name="id_course" class="loan-type">
                                    <option >Select Course</option>';
                                    foreach ($courses as $key => $value) {
                                        echo '<option value="'.$value['course_id'].'">'.(!empty($value['course_code'])? $value['course_code']. ' - ':"").' '.$value['course_title'].'</option>';
                                    }
                                    echo'
                                </select>
                            </div>
                            <div class="inquiry-form-group-one">
                                <label><i class="fa-solid fa-message"></i></label>
                                <textarea name="request_detail" rows="4" class="form-control" placeholder="Your Massage Here"></textarea>
                            </div>
                            <div class="form-group">
                               <button type="submit" class="btn btn-outline-secondary" name="submit_request">Submit Request <i class="flaticon-next"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>
    </div>
        ';
?>