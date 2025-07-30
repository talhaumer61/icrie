<?php

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
                <span class="heading-subtitle wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;">🤝 AAOIFI Certificate Registration</span>
                <h2>Apply for your Certificate</h2>
            </div>
        </div>
    </div>
    <div class="contact-form pt-1 pb-5">
         <div class="container">
            <div class="row gutter-y-30 justify-content-center">
                <div class="col-lg-10">
                    <div class="contact-form-inner">
                        <form autocomplete="off" class="form-validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <div class="inquiry-form-group-one">
                                <label><i class="fa-regular fa-user"></i></label>
                                <input type="text" name="reg_fullname" class="form-control" placeholder="Your Name" required="">
                            </div>
                            <div class="inquiry-form-group-one">
                                <label><i class="fa-solid fa-phone"></i></label>
                                <input type="number" name="reg_phone" class="form-control" placeholder="Your Mobile Number" required="">
                            </div>
                            <div class="inquiry-form-group-one">
                                <label><i class="fa-regular fa-envelope"></i></label>
                                <input type="email" name="reg_email" class="form-control" placeholder="Your Email" required="">
                            </div>
                            <div class="inquiry-form-group-one">
                                <label><i class="fa-solid fa-file-lines"></i></label>
                                <input type="text" name="reg_certificate" class="form-control" placeholder="AAOIFI Certificate Name" required="">
                            </div>
                            <div class="form-group">
                               <button type="submit" class="btn btn-outline-secondary" name="add_reg">Submit <i class="flaticon-next"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>
    </div>
        ';
?>