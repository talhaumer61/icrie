<?php
$sqlArrayFunction = array(
    'select'    => 'info_phone, info_location, info_mail_1, info_mail_2'
    ,'where'    => array(
                    'info_status'      => 1,
                )
    ,'return_type' => 'single'
);                  
$info  = $dblms->getRows(CONTACT_INFO, $sqlArrayFunction);

$sqlArrayFunction = array(
    'select'    => 'setting_email, setting_links'
    ,'where'    => array(
                    'setting_status'      => 1,
                    'is_deleted'       => 0
                )
    ,'return_type' => 'single'
);                  
$WEB  = $dblms->getRows(SETTING, $sqlArrayFunction);
$social=explode(',',$WEB['setting_links']);

echo '
<div class="contact-form">
         <div class="container">
            <div class="row gutter-y-30">
                <div class="col-lg-8">
                    <div class="contact-form-inner">
                        <form action="#">
                            <div class="inquiry-form-group-one">
                                <label><i class="fa-regular fa-user"></i></label>
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                            </div>
                            <div class="inquiry-form-group-one">
                                <label><i class="fa-solid fa-phone"></i></label>
                                <input type="number" name="mobail-nomber" class="form-control" placeholder="Your Mobile Number" required="">
                            </div>
                            <div class="inquiry-form-group-one">
                                <label><i class="fa-regular fa-envelope"></i></label>
                                <input type="email" name="email" class="form-control" placeholder="Your Email" required="">
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-layer-group"></i></label>
                                <select name="type" class="loan-type select2-hidden-accessible" data-select2-id="select2-data-1-1m2d" tabindex="-1" aria-hidden="true">
                                    <option data-select2-id="select2-data-3-saf1">Loan type</option>
                                    <option value="Personal">Personal Loans</option>
                                    <option value="Emergency">Emergency Loans</option>
                                    <option value="Business">Business Loans</option>
                                    <option value="Student">Student Loans</option>
                                    <option value="Mortgage">Mortgage Loans</option>
                                    <option value="Small-Business">Small Business Loans</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-2-b1k5" style="width: 655.99px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-type-cj-container" aria-controls="select2-type-cj-container"><span class="select2-selection__rendered" id="select2-type-cj-container" role="textbox" aria-readonly="true" title="Loan type">Loan type</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            <div class="inquiry-form-group-one">
                                <label><i class="fa-solid fa-message"></i></label>
                                <textarea name="massage" rows="4" class="form-control" placeholder="Your Massage Here"></textarea>
                            </div>
                            <div class="form-group">
                               <button type="submit" class="btn btn-outline-secondary">Get a Quote <i class="flaticon-next"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-form-right">
                        <h3>Office Location</h3>
                        <div class="contact-details">
                            <p>'.$info['info_location'].'</p>
                        </div>
                        <h3>Email Address</h3>
                        <div class="contact-details">
                            <p>'.$info['info_mail_1'].'</p>
                            <p>'.$info['info_mail_2'].'</p>
                        </div>
                        <h3>Quick Helpline</h3>
                        <div class="contact-details">
                            <p>'.$info['info_phone'].'</p>
                        </div>
                        <h3>Opening Hours</h3>
                        <div class="contact-details">
                           <p class="text-center">
                                Mon-Thu 8:00AM-5:00PM<br>
                                Fri 8:00AM-5:00PM<br>
                                Sat 8:30AM-2:30PM<br>
                                Sun 8:30AM-5:00PM</p>
                        </div>
                        <h4>Social media</h4>
                        <ul class="contact-social-media">
                            <li><a href="'.$social[0].'"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="'.$social[1].'"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="'.$social[2].'"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="'.$social[3].'"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
         </div>
    </div>
';
?>