<?php
// ADD SLIDER
if(isset($_POST['submit_edit'])) { 
	
		$values     = array (
								'setting_status'	    =>	cleanvars($_POST['setting_status'])
								, 'setting_web_name'	=>	cleanvars($_POST['setting_web_name'])
								, 'setting_links'		=>	cleanvars($_POST['setting_links'])
								, 'setting_email'		=>	cleanvars($_POST['setting_email'])
								, 'setting_desc'		=>	cleanvars($_POST['setting_desc'])				
								, 'id_modify'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_modify'		    =>	date('Y-m-d H:i:s')
							);   
		$sqllms 	= 	$dblms->Update(SETTING, $values, "WHERE setting_id  = '".$_POST['setting_id']."'");
		if($sqllms) { 
			
			$latestID = cleanvars($_POST['setting_id']);

			// Logo
			if(!empty($_FILES['setting_photo']['name'])) {
				$path_parts 	= pathinfo($_FILES["setting_photo"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'assets/images/logo/';
					$img_fileName	= to_seo_url(cleanvars($_POST['setting_web_name'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'setting_photo'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(SETTING, $dataImage, "WHERE setting_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['setting_photo']['tmp_name'],$originalImage);
					chmod ($originalImage, octdec($mode));
				}
			}
			// FAVICON
			if(!empty($_FILES['setting_favicon']['name'])) {
				$path_parts 	= pathinfo($_FILES["setting_favicon"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'assets/images/favicon/';
					$img_fileName	= to_seo_url(cleanvars($_POST['setting_web_name'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'setting_favicon'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(FUNCTIONS, $dataImage, "WHERE setting_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['setting_favicon']['tmp_name'],$originalImage);
					chmod ($originalImage, octdec($mode));
				}
			}
			sendRemark(moduleName(false).' Added', '1', $latestID);
			sessionMsg('Success', 'Record Successfully Added.', 'success');
			header("Location:".moduleName().".php", true, 301);
			exit();
		}
}


?>