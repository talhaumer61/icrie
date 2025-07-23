<?php 
include "include/dbsetting/lms_vars_config.php"; 	
include "include/functions/login_func.php";
include "include/functions/functions.php";
if(isset($_SESSION['userlogininfo']['LOGINIDA'])) {
	sessionMsg("Success", "Login Successfully.", "success");
	header("Location: dashboard.php", true, 301);
} else { 
    $footer_hide = '1';
    $login_id = (isset($_POST['login_id']) && $_POST['login_id'] != '') ? $_POST['login_id'] : '';	
    $errorMessage = '';
    if (isset($_POST['login_id'])) {
        $result = cpanelLMSAuserLogin();
        if ($result != '') {
            $errorMessage = $result;
        }
    }
    include "include/head.php";
    echo'
    <section>         
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-12">
            <div class="login-card">
            <form method="post" class="theme-form login-form" accept-charset="utf-8" name="frmLogin" id="frmLogin">
                <h4>Login</h4>
                <h6>Welcome back! Log in to your account.</h6>
                <label class="text-danger">'.(($errorMessage)?$errorMessage:'').'</label>
                <div class="form-group">
                  <label>Email Address</label>
                  <div class="input-group"><span class="input-group-text"><i data-feather="mail"></i></span>
                    <input type="text" name="login_id" class="form-control" autofocus required id="login_id" autocomplete="off" value="'.$login_id.'" placeholder="Enter your username">
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group"><span class="input-group-text"><i data-feather="lock"></i></span>
                    <input type="password" name="login_pass" class="form-control" required value="" autocomplete="off" id="login_pass" placeholder="Enter your password">
                    <div class="show-hide">
                        <span class="show">Show</span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="checkbox">
                    <input id="checkbox1" type="checkbox">
                    <label for="checkbox1">Remember password</label>
                  </div><a class="link" href="forget-password.html">Forgot password?</a>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                </div>
                <div class="login-social-title">                
                  <h5>Follow us on</h5>
                </div>
                <div class="form-group">
                  <ul class="login-social">
                    <li><a href="https://www.linkedin.com/" target="_blank"><i data-feather="linkedin"></i></a></li>
                    <li><a href="https://www.linkedin.com/" target="_blank"><i data-feather="twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/" target="_blank"><i data-feather="facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/" target="_blank"><i data-feather="instagram"></i></a></li>
                  </ul>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>';?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var passwordField = document.getElementById("login_pass");
            var showHideSpan = document.querySelector(".show-hide span");

            showHideSpan.addEventListener("click", function() {
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    showHideSpan.textContent = "Hide";
                    showHideSpan.classList.remove("show");
                    showHideSpan.classList.add("hide");
                } else {
                    passwordField.type = "password";
                    showHideSpan.textContent = "Show";
                    showHideSpan.classList.remove("hide");
                    showHideSpan.classList.add("show");
                }
            });
        });
    </script>
    <?php

    // echo'
    // <div class="page-wrapper default-version">
    //     <div class="form-area bg_img" data-background="login/images/1.jpg">
    //         <div class="form-wrapper">
    //             <h4 class="logo-text mb-15">Welcome to <strong>Al-Mawakhat</strong></h4>
    //             <p>Admin Login to <strong>Al-Mawakhat</strong></p>
    //             <form method="post" class="cmn-form mt-20" accept-charset="utf-8" name="frmLogin" id="frmLogin">
    //                 <label class="text-danger">'.(($errorMessage)?$errorMessage:'').'</label>
    //                 <div class="form-group">
    //                     <label for="email">Username</label>
    //                     <input type="text" name="login_id" class="form-control b-radius--capsule" autofocus required id="login_id" autocomplete="off" value="'.$login_id.'" placeholder="Enter your username">
    //                     <i class="las la-user input-icon"></i>
    //                 </div>
    //                 <div class="form-group">
    //                     <label for="pass">Password</label>
    //                     <input type="password" name="login_pass" class="form-control b-radius--capsule" required value="" autocomplete="off" id="login_pass" placeholder="Enter your password">
    //                     <i class="las la-lock input-icon"></i>
    //                 </div>

    //                 <div class="form-group d-flex justify-content-between align-items-center">
    //                     <a href="#" class="text-muted text--small"><i class="las la-lock"></i>Forgot password?</a>
    //                 </div>

    //                 <div class="form-group">
    //                     <button type="submit" id="btn_submit" class="submit-btn mt-25 b-radius--capsule">Login <i class="las la-sign-in-alt"></i></button>
    //                 </div>
    //             </form>
    //             <div style="clear:both;"></div>
    //             <footer id="footer" style="margin-top:20px;">
    //                 <div class="text-center padder">
    //                     <p> <small>'.COPY_RIGHTS_ORG.'
    //                     <br>Powered by: <a href="'.COPY_RIGHTS_URL.'">'.COPY_RIGHTS.'</a>  v1.0</small></p>
    //                 </div>
    //             </footer>
    //         </div>
    //     </div>
    // </div>';
    include "include/footer.php";
}
?>