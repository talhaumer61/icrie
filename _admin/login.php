<?php
include "functions/login_func.php";
include "dbsetting/lms_vars_config.php";
if(isset($_SESSION['LOGINID_DT']) || isset($_COOKIE['LOGINID_DT'])) {
	header("Location: dashboard.php");	
} else { 
    $login_id = (isset($_POST['login_id']) && $_POST['login_id'] != '') ? $_POST['login_id'] : '';	
    $errorMessage = '';
    if (isset($_POST['login_id'])) {
        $result = cpanelLMSAuserLogin();
        if ($result != '') {
            $errorMessage = $result;
        }
	}   
    echo'
    <!doctype html>
    <html lang="en">
    <head>
            <meta charset="utf-8" />
            <title>Welcome to '.TITLE_HEADER.' login panel</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
            <meta content="Themesbrand" name="author" />
            <!-- App favicon -->
            <link rel="shortcut icon" href="assets/images/round-logo.png">
            <!-- Bootstrap Css -->
            <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
            <!-- Icons Css -->
            <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
            <!-- App Css-->
            <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        </head>
        <body>
            <div class="account-pages my-5 pt-sm-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card overflow-hidden">
                                <div class="bg-soft-primary">
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="text-primary p-4">
                                                <h5 class="text-primary">Welcome Back !</h5>
                                                <p>Sign in to '.SITE_NAME.'</p>
                                            </div>
                                        </div>
                                        <div class="col-5 align-self-end">
                                            <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0"> 
                                    <div>
                                        <a href="#">
                                            <div class="avatar-md profile-user-wid mb-4">
                                                <span class="avatar-title rounded-circle bg-light">
                                                    <img src="assets/images/round-logo.png" alt="" class="rounded-circle" height="50">
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        <form class="form-horizontal"  method="post" name="frmLogin" id="frmLogin" action="#">';
                                        //---------------------------------------
                                        if($errorMessage) {
                                            echo "<b>".$errorMessage."</b>";
                                        }
                                        //---------------------------------------
                                        echo '
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" id="login_id" name="login_id" value="'.$login_id.'" placeholder="Enter username" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="userpassword">Password</label>
                                                <input type="password" class="form-control" id="login_pass" name="login_pass" placeholder="Enter password">
                                            </div>
                                            <div class="mt-3 mb-4">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" name="login">Log In</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 text-center">
                                <div>
                                    <p>
                                        <a href="'.SITE_URL.'" class="text text-primary" target="_blank">'.SITE_NAME.'</a>
                                        '.COPY_RIGHTS_ORG.' 
                                        <br> Powered by <a href="'.COPY_RIGHTS_URL.'" class="text text-success" target="_blank">'.COPY_RIGHTS.'</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- JAVASCRIPT -->
            <script src="assets/libs/jquery/jquery.min.js"></script>
            <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/libs/metismenu/metisMenu.min.js"></script>
            <script src="assets/libs/simplebar/simplebar.min.js"></script>
            <script src="assets/libs/node-waves/waves.min.js"></script>
            <!-- App js -->
            <script src="assets/js/app.js"></script>
        </body>
    </html>';
 }

?>