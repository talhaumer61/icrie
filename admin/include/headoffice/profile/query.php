<?php
// ADD ADMIN PROFILE
if(isset($_POST['submit_profile'])) {

	$adm_id =	$_SESSION['userlogininfo']['LOGINIDA'];

	$values = array(
						 'adm_fullname'				=>	cleanvars($_POST['adm_fullname'])
						,'adm_email'				=>	cleanvars($_POST['adm_email'])
						,'adm_phone'				=>	cleanvars($_POST['adm_phone'])
						,'adm_username'				=>	cleanvars($_POST['adm_username'])
						,'id_modify'				=>	$adm_id
						,'date_modify'				=>	date('Y-m-d G:i:s')
					); 

	$sqllms = $dblms->Update(ADMINS , $values , "WHERE adm_id  = '".$adm_id."'");

	if($sqllms) {

		$_SESSION['userlogininfo']['LOGINMAIL'] 	=	$_POST['adm_email'];
		$_SESSION['userlogininfo']['LOGINPHONE'] 	=	$_POST['adm_phone'];
		$_SESSION['userlogininfo']['LOGINNAME'] 	=	$_POST['adm_fullname'];
		
		sendRemark(moduleName(false).' Updated', '2', $adm_id);
		sessionMsg('Success', 'Record Successfully Updated.', 'info');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
}

// EDIT PHOTO
if(isset($_POST['edit_photo'])) {
	$latestID =	$_SESSION['userlogininfo']['LOGINIDA'];	

	// UPDATE PROFILE IMAGE
	if(!empty($_FILES['adm_photo']['name'])) { 
		$path_parts 	= pathinfo($_FILES["adm_photo"]["name"]);
		$extension 		= strtolower($path_parts['extension']);
		$img_dir 		= 'uploads/images/admin/';
		$originalImage	= $img_dir.to_seo_url(cleanvars($_POST['adm_fullname'].'-'.$_POST['adm_type'])).'-'.$latestID.".".($extension);
		$img_fileName	= to_seo_url(cleanvars($_POST['adm_fullname'].'-'.$_POST['adm_type'])).'-'.$latestID.".".($extension);
		if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) {
			$uploadVal = array (
								"adm_photo"		=> cleanvars($img_fileName)
							);	
			$sqllmsupload = $dblms->Update(ADMINS , $uploadVal , "WHERE adm_id = '".cleanvars($latestID)."'");
			unset($sqllmsupload);
			$mode = '0644'; 	
			move_uploaded_file($_FILES['adm_photo']['tmp_name'],$originalImage);
			chmod ($originalImage, octdec($mode));
			$_SESSION['userlogininfo']['LOGINPHOTO'] = SITE_URL.'uploads/images/admin/'.$img_fileName;
		}
		
		sendRemark(moduleName(false).' Photo Updated', '2', $latestID);
		sessionMsg('Success', 'Record Successfully Updated.', 'info');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}else{
		sessionMsg('Error', 'Record not Updated.', 'danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
}

//CHANGE PASSWORD
if(isset($_POST['chnage_pass'])) { 
	//HASHING
	$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
	$pass = $_POST['new_password'];
	$password = hash('sha256', $pass . $salt);
	for ($round = 0; $round < 65536; $round++) {
		$password = hash('sha256', $password . $salt);
	}
	$values = array(
						 'adm_salt'		=>	cleanvars($salt)
						,'adm_userpass'	=>	cleanvars($password)
						,'id_modify'	=> 	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
						,'date_modify'	=>	date('Y-m-d G:i:s')
				);   
	$sqllms = $dblms->Update(ADMINS , $values , "WHERE adm_id  = '".cleanvars($_SESSION['userlogininfo']['LOGINIDA'])."'");	

	if($sqllms) { 
		sendRemark('Change Password =: "'.cleanvars($_POST['new_password']), '2', cleanvars($_SESSION['userlogininfo']['LOGINIDA']));
		sessionMsg('Success', 'Password Successfully Updated.', 'info');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
}
?>