<?php
    include "breadcrumb.php";
    $sqlFaq   = array ( 
                            'select' 		=>	'
                                                      faq_id
                                                    , faq_qns
                                                    , faq_ans
                                                '
                            ,'where' 		=>	array( 
                                                          'faq_status'	    => '1'
                                                        , 'is_deleted'	    => '0'
                                                    )
                            ,'order_by' 	=> 'faq_id DESC' 
                            ,'return_type' 	=> 'all' 
                        ); 
    $rowsFAQ  = $dblms->getRows(FAQ, $sqlFaq);
    echo '
    <div class="faq-section">
        <div class="container">
            <div class="row gutter-y-30 gutter-x-15">
                <div class="col-lg-8">
                    <div class="accordion" id="accordionfaq">
                        <div class="fqa-block">
                            <h4>Home Loan</h4>';
                            foreach($rowsFAQ as $key => $val){
                            echo '
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$key.'" aria-expanded="true" aria-controls="collapseOne">
                                        '.$val['faq_qns'].'
                                    </button>
                                </h2>
                                <div id="collapse'.$key.'" class="accordion-collapse collapse '.($key==0?"show":"").'" data-bs-parent="#accordionfaq">
                                    <div class="accordion-body">
                                        <p>'.$val['faq_ans'].'</p>
                                    </div>
                                </div>
                            </div>';
                            $sr++;
                            }
                            echo'
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="fqa-block stcky">
                        <div class="faq-right">
                            <div class="faq-right-inner">
                                <h4>Still have questions? Feel free to ask us!</h4>
                                <p>Contact us directly, drop us an email!</p>
                                <img src="assets/images/faq-image.jpg" alt="fqa-image">
                                <div class="faq-details">
                                    <p>We’d love to hear from you! Whether you have questions, need assistance, or want
                                        to learn more about our services, feel free to reach out to us anytime.</p>
                                </div>
                                <a href="contact-us.html" class="btn btn-primary">Contact Us <i class="flaticon-next"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
?>