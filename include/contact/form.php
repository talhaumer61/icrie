<?php
// $sqlArrayFunction = array(
//     'select'    => 'info_phone, info_location, info_mail_1, info_mail_2'
//     ,'where'    => array(
//                     'info_status'      => 1,
//                 )
//     ,'return_type' => 'single'
// );                  
// $info  = $dblms->getRows(CONTACT_INFO, $sqlArrayFunction);

// $sqlArrayFunction = array(
//     'select'    => 'setting_email, setting_links'
//     ,'where'    => array(
//                     'setting_status'      => 1,
//                     'is_deleted'       => 0
//                 )
//     ,'return_type' => 'single'
// );                  
// $WEB  = $dblms->getRows(SETTING, $sqlArrayFunction);
// $social=explode(',',$WEB['setting_links']);

echo '
<div class="contact-form">

        <div class="container">

        <div class="row gutter-y-30">

            <div class="col-lg-12">

                <div class="contact-form-inner">

                    <form autocomplete="off" class="form-validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                        <div class="inquiry-form-group-one">

                            <label><i class="fa-regular fa-user"></i></label>

                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required="">

                        </div>
                        
                        <div class="inquiry-form-group-one">

                            <label><i class="fa-regular fa-user"></i></label>

                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required="">

                        </div>

                        <div class="inquiry-form-group-one">

                            <label><i class="fa-solid fa-phone"></i></label>

                            <input type="number" name="phone_number" class="form-control" placeholder="Your Mobile Number" required="">

                        </div>

                        <div class="inquiry-form-group-one">

                            <label><i class="fa-regular fa-envelope"></i></label>

                            <input type="email" name="email" class="form-control" placeholder="Your Email" required="">

                        </div>
                        
                        <div class="inquiry-form-group-one">

                            <label><i class="fa-regular fa-envelope"></i></label>

                            <input type="email" name="msg_subject" class="form-control" placeholder="Subject" required="">

                        </div>

                        <div class="inquiry-form-group-one">

                            <label><i class="fa-solid fa-message"></i></label>

                            <textarea name="message" rows="4" class="form-control" placeholder="Your Massage Here"></textarea>

                        </div>

                        <div class="form-group">

                            <button type="submit" name="submit_add" class="btn btn-outline-secondary">Submit <i class="flaticon-next"></i></button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

        </div>

</div>
';
?>