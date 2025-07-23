<?php
$sqlArrayFunction = array(
    'select'    => 'info_phone, info_location, info_mail_1, info_mail_2'
    ,'where'    => array(
                    'info_status'      => 1,
                )
    ,'return_type' => 'single'
);                  
$info  = $dblms->getRows(CONTACT_INFO, $sqlArrayFunction);
echo '
    <div class="contact-section">
        <div class="container">
            <div class="heading-box text-center">
                <span class="heading-subtitle wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;">🤝 CONTACT US</span>
                <h2 class="heading-title wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;"><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">O</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">u</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">r</span></span><span> </span><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">H</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">a</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">d</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">q</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">u</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">a</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">r</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">t</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">r</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">s</span></span><span> </span><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">L</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">o</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">c</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">a</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">t</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">i</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">o</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">n</span></span></h2>
            </div>
            <div class="row gutter-y-30 align-items-center">
                <div class="col-lg-6">
                   <div class="row gutter-y-30">
                    <div class="col-md-6">
                        <div class="contact-location">
                            <h5>Office Locations</h5>
                        </div>
                        <p>'.$info['info_location'].'</p>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-location">
                            <h5>Email Address</h5>
                        </div>
                        <p><a class="text-dark" href="mailto:'.$info['info_mail_1'].'">'.$info['info_mail_1'].'</a></p>
                        <p><a class="text-dark" href="mailto:'.$info['info_mail_2'].'">'.$info['info_mail_2'].'</a></p>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-location">
                            <h5>Quick Helpline</h5>
                        </div>
                        <p><a class="text-dark" href="tel:'.$info['info_phone'].'">'.$info['info_phone'].'</a></p>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-location">
                            <h5>Opening Hours</h5>
                        </div>
                        <p class="text-center">
                                Mon-Thu 8:00AM-5:00PM<br>
                                Fri 8:00AM-5:00PM<br>
                                Sat 8:30AM-2:30PM<br>
                                Sun 8:30AM-5:00PM</p>
                    </div>
                   </div>
                </div>
                <div class="col-lg-6">
                     <div class="map-image">
                        <img src="assets/images/Maps.png" alt="map-image">
                     </div>
                </div>
            </div>
        </div>
    </div>';
/*
    echo '
        '.titleMaker('contact us').'
        <div class="contact__page section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="contact__page-item">
                            <img src="assets/img/icon/map.png" alt="map">
                            <h4>Office Locations</h4>
                            <p>'.$rows2['info_location'].'</p>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="contact__page-item">
                            <img src="assets/img/icon/email.png" alt="email">
                            <h4>Email Address</h4>
                            <p><a href="mailto:'.$rows2['info_mail_1'].'">'.$rows2['info_mail_1'].'</a></p>
                            <p><a href="mailto:'.$rows2['info_mail_2'].'">'.$rows2['info_mail_2'].'</a></p>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="contact__page-item">
                            <img src="assets/img/icon/phone.png" alt="phone">
                            <h4>Quick Helpline</h4>
                            <p><a href="tel:'.$rows2['info_phone'].'">'.$rows2['info_phone'].'</a></p>
                        </div>
                    </div>
                    <div class="col-xl-4"></div>
                    <div class="col-xl-4">
                        <div class="contact__page-item">
                            <img src="assets/img/icon/opening-hours.png" alt="hours">
                            <h4>Opening Hours</h4>
                            <Saturday>
                            <p>
                                Mon-Thu 8:00AM-5:00PM<br>
                                Fri 8:00AM-5:00PM<br>
                                Sat 8:30AM-2:30PM<br>
                                Sun 8:30AM-5:00PM
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4"></div>
                </div>
            </div>
        </div>
        <div class="contact__page-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13615.626771291516!2d74.3174568!3d31.4442356!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919078e366c745f%3A0x83c66fd39baffbc6!2sICRIE%20-%20International%20Center%20for%20Research%20in%20Islamic%20Economics%20and%20Finance!5e0!3m2!1sen!2s!4v1691395883808!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="contact__three page section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="contact__three-form t-center">
                            <div class="contact__three-form-title">	
                                <span class="subtitle-four">Drop a Message</span>
                                <h5>To provide a dynamic and all-inclusive collaboration platform to the economists, finance experts, policy makers, and institutes for research advancement in the area of Economics and Finance in Islamic perspective</h5>
                            </div>
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6 mb-30">
                                        <div class="contact__two-right-form-item contact-item">
                                            <span class="fal fa-user"></span>
                                            <input type="text" name="name" placeholder="Full Name" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6 md-mb-30">
                                        <div class="contact__two-right-form-item contact-item">
                                            <span class="far fa-envelope-open"></span>
                                            <input type="email" name="email" placeholder="Email Address" required="required">											
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-30">
                                        <div class="contact__two-right-form-item contact-item">
                                            <span class="fal fa-book"></span>
                                            <input type="text" name="subject" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-30">
                                        <div class="contact__two-right-form-item contact-item">
                                            <span class="far fa-comments"></span>
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="contact__two-right-form-item">
                                            <button class="btn-one" type="submit">Submit Message </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
*/
?>