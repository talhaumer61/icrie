<?php
    echo '
        <div class="top__bar" style="background-color: #161719;">
            <div class="custom__container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="top__bar-left lg-t-center">
                            <center>
                                <ul>
                                    <li><a href="tel:'.$rows2['info_phone'].'"><i class="fas fa-phone-alt"></i>Phone : '.$rows2['info_phone'].'</a></li>
                                    <li><a href="mailto:'.$rows2['info_mail_1'].'"><i class="fas fa-envelope"></i>Email : '.$rows2['info_mail_1'].'</a></li>
                                </ul>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
?>