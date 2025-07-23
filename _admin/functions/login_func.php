<?php

session_start();
// ADMIN AREA LOGIN CHECK
function checkCpanelLMSALogin() {

	// IF THE SESSION IS NOT SET, REDIRECT TO LOGIN PAGE
	if (!isset($_SESSION['LOGINID_DT']) && isset($_COOKIE['LOGINID_DT'])) {
		$_SESSION['LOGINID_DT']   	 = $_COOKIE['LOGINID_DT'];
		$_SESSION['LOGINUSER_DT'] 	 = $_COOKIE['LOGINUSER_DT'];
		$_SESSION['LOGINFNAME_DT']   = $_COOKIE['LOGINFNAME_DT'];
		$_SESSION['LOGINTYPE_DT']  	 = $_COOKIE['LOGINTYPE_DT'];
	}
	if(!isset($_SESSION['LOGINID_DT'])) {
		header("Location: login.php");
		exit;
	}
	
	// FOR ADMIN LOGOUT
	if(isset($_GET['logout'])) {
		panelLMSALogout();
	}
}

// FUNCTION FOR ADMIN LOGIN
function cpanelLMSAuserLogin() {

	require_once ("dbsetting/lms_vars_config.php");
	require_once ("dbsetting/classdbconection.php");
	require_once ("functions/functions.php");
	$dblms = new dblms();

	// IF WE FOUND AN ERROR SAVE THE ERROR MESSAGE IN THIS VARIABLE
	$errorMessage = '';
	$admin_user   = cleanvars($_POST['login_id']);
	$admin_pass1  = cleanvars($_POST['login_pass']);
	$admin_pass3  = md5($admin_pass1);
	// FIRST, MAKE SURE THW ADMINNAME & PSSWORD ARE NOT EMPTY

	if($admin_user == '') {
		$errorMessage = 'You must enter your User Name';
	} else if ($admin_pass3 == '') {
		$errorMessage = 'You must enter the User Password';
	} else {

		// CHECK THE ADMIN NAME AND PASSWROD EXIST
		$sqllms	= $dblms->querylms("SELECT * FROM ".ADMINS."
									WHERE adm_username = '".$admin_user."' 
									AND adm_status = '1' 
									LIMIT 1
								  ");
		// IF THE ADMIN NAME AND PASSWOD EXIST THEN 	
		if (mysqli_num_rows($sqllms) == 1) {
			$row = mysqli_fetch_array($sqllms); 

			//STORE ADMIN ID INTO SESSOIN		
			$_SESSION['LOGINID_DT']   	 = $row['adm_id'];
			$_SESSION['LOGINUSER_DT'] 	 = $row['adm_username'];
			$_SESSION['LOGINFNAME_DT']   = $row['adm_fullname'];
			$_SESSION['LOGINTYPE_DT']  	 = $row['adm_type'];

			// STORE ADMIN ID INTO COOKIE
			setcookie("LOGINID_DT"		,$_SESSION['LOGINID_DT']	,time()+60*60*24*30);
			setcookie("LOGINUSER_DT"	,$_SESSION['LOGINUSER_DT']	,time()+60*60*24*30);
			setcookie("LOGINFNAME_DT"	,$_SESSION['LOGINFNAME_DT']	,time()+60*60*24*30);
			setcookie("LOGINTYPE_DT"	,$_SESSION['LOGINTYPE_DT']	,time()+60*60*24*30);
			// LOGIN TIME WHEN THE ADMIN LOGIN
			// STORE INTO SESSION URL LAST PAGE VISIT
			header("Location: index.php");
		} else {
			// ADMIN NAME AND PASSORD DOESN'T MATCH
			$errorMessage = '<span style="color: red;"><p> Invalid User Name or Password.</p></span>';
		}		

	}
	return $errorMessage;
	//mysql_close($link);
}

// LOGOUT FUNCTION FOR ADMIN
function panelLMSALogout() {

	if (isset($_SESSION['LOGINID_DT'])) {
		unset($_SESSION['LOGINID_DT']);
		unset($_SESSION['LOGINUSER_DT']);
		unset($_SESSION['LOGINFNAME_DT']);
		unset($_SESSION['LOGINTYPE_DT']);
		setcookie("LOGINID_DT"		,""	,60);
		setcookie("LOGINUSER_DT"	,""	,60);
		setcookie("LOGINFNAME_DT"	,""	,60);
		setcookie("LOGINTYPE_DT"	,""	,60);
		session_destroy();
	}
	header("Location: ".SITE_URL_PORTAL."include/login.php");
	exit;
}

?>