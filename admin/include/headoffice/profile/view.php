<?php
echo'
<div class="user-profile">
    <div class="card profile-header">
        <img class="img-fluid bg-img-cover" src="assets/images/user-profile/bg-profile.jpg" alt="">
        <div class="profile-img-wrrap">
            <img class="img-fluid bg-img-cover" src="assets/images/user-profile/bg-profile.jpg" alt="">
        </div>
        <div class="userpro-box">
            <div class="img-wrraper">
                <div class="avatar"><img class="img-fluid" alt="" src="'.$_SESSION['userlogininfo']['LOGINPHOTO'].'"></div>
                <a class="icon-wrapper" onclick="showAjaxModalZoom(\'include/modals/profile/edit_photo.php\');"><i class="fa fa-pencil"></i></a>
            </div>
            <div class="user-designation">
                <div class="title">
                    <h5>'.$_SESSION['userlogininfo']['LOGINNAME'].'</h5>
                    <h6></h6>
                    <div class="follow">
                        <ul class="follow-list">
                            <li class="pb-3">
                                <a class="btn btn-primary btn-xs" onclick="showAjaxModalZoom(\'include/modals/profile/edit_password.php\');"><i class="fas fa-lock"></i> Change Password </a>
                            </li>
                            <li class="pb-3">
                                <a class="btn btn-primary btn-xs" onclick="showAjaxModalZoom(\'include/modals/profile/edit.php\');"><i class="fas fa-edit"></i> Profile Information </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="follow">
                    <ul class="follow-list">
                        <li>
                            Member of '.SITE_NAME.' 
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>';
?>