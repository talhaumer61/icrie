<?php
session_start();
// ADMIN LOGIN CHECK
function checkCpanelLMSALogin() {
	// !SESSION ID, REDIRECT TO LOGIN
	if(!isset($_SESSION['userlogininfo']['LOGINIDA'])) {
		header("Location: login.php");
		exit;
	}
	// LOGOUT
	if(isset($_GET['logout'])) {
		panelLMSALogout();
	}
}

// LOGIN FUNCTION
function cpanelLMSAuserLogin() {

	require_once ("include/dbsetting/lms_vars_config.php");
	require_once ("include/dbsetting/classdbconection.php");
	require_once ("include/functions/functions.php");
	$dblms = new dblms();

	$errorMessage = '';
	$admin_user   = cleanvars($_POST['login_id']);
	$admin_pass1  = cleanvars($_POST['login_pass']);
	$admin_pass3  = ($admin_pass1);

	// CHECK USERNAME, PASSWORD NOT EMPTY
	if($admin_user == '') {
		$errorMessage = 'You must enter your User Name';
	} else if ($admin_pass3 == '') {
		$errorMessage = 'You must enter the User Password';
	} else {
		// CHECK USERNAME, PASSWORD EXISTS
		$loginconditions = array ( 
									 'select' 		=>	'adm_id, adm_status, adm_salt, adm_logintype, adm_type, adm_username, adm_userpass, adm_fullname, adm_email, adm_phone, adm_photo'
									,'where' 		=>	array( 
																 'adm_status'		=> '1'
																,'adm_username' 	=> $admin_user
															) 
									,'return_type'	=>	'single'
								); 
		$row = $dblms->getRows(ADMINS,$loginconditions);
		
		// IF EXISTS
		if ($row) {
			
			// PASSWORD HASHING
			$salt 		= $row['adm_salt'];
			$password 	= hash('sha256', $admin_pass3 . $salt);			
			for ($round = 0; $round < 65536; $round++) {
				$password = hash('sha256', $password . $salt);
			}
			if($password == $row['adm_userpass']) { 

				// MAKE LOGIN HISTORY
				$dataLog = array(
									 'login_type'		=> cleanvars($row['adm_logintype'])
									,'id_login_id'		=> cleanvars($row['adm_id'])
									,'user_pass'		=> cleanvars($admin_pass1)
									,'email'			=> cleanvars($admin_user)
									,'dated'			=> date("Y-m-d G:i:s")
								);
				$sqllmslog  = $dblms->Insert(LOGIN_HISTORY , $dataLog);

				// CHECK ADMIN IMAGE EXIST         
				$adm_photo = SITE_URL.'uploads/images/default.jpg';
				if(!empty($row['adm_photo'])){
					$file_url = SITE_URL.'uploads/images/admin/'.$row['adm_photo'];
					if (check_file_exists($file_url)) {
						$adm_photo = $file_url;
					}
				}
				
				// Login time when the admin login
				$userlogininfo = array();
					$userlogininfo['LOGINIDA'] 			=	$row['adm_id'];
					$userlogininfo['LOGINTYPE'] 		=	$row['adm_type'];
					$userlogininfo['LOGINAFOR'] 		=	$row['adm_logintype'];
					$userlogininfo['LOGINUSER'] 		=	$row['adm_username'];
					$userlogininfo['LOGINEMAIL'] 		=	$row['adm_email'];
					$userlogininfo['LOGINNAME'] 		=	$row['adm_fullname'];
					$userlogininfo['LOGINPHOTO'] 		=	$adm_photo;
				$_SESSION['userlogininfo'] 				=	$userlogininfo;
				
				sendRemark('Login to Software', '4', $_SESSION['userlogininfo']['LOGINIDA']);
				sessionMsg("Success", "Login Successfully.", "success");
				header("Location: dashboard.php");
				exit();
				
			} else {
				$errorMessage = '<p class="text-danger">Invalid User  Password.</p>';
			}
			
		} else {
			$errorMessage = '<p class="text-danger">Invalid User Name or Password.</p>';
		}		
	}
	return $errorMessage;
	//mysql_close($link);
}

// LOGOUT FUNCTION
function panelLMSALogout() {
	if (isset($_SESSION['userlogininfo']['LOGINIDA'])) {
		unset($_SESSION['userlogininfo']);
		unset($_SESSION['userroles']);
		session_destroy();
	}
	header("Location: login.php");
	exit;
}
?>