<?php
// EDIT SLIDER
if(isset($_POST['submit_edit'])) {
	 
	
		$values     = array (
								 'about_status'	    	=>	cleanvars($_POST['about_status'])
								, 'about_title'	    	=>	cleanvars($_POST['about_title'])
								, 'about_des'			=>	cleanvars($_POST['about_des'])					
								, 'id_modify'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_modify'		    =>	date('Y-m-d H:i:s')
							);
		$sqllms = $dblms->Update(ABOUT , $values , "WHERE about_id  = '".cleanvars($_POST['about_id'])."'");
		if($sqllms) { 

			$latestID = cleanvars($_POST['about_id']);

			// Image 1
			if(!empty($_FILES['about_img']['name'])) {
				$path_parts 	= pathinfo($_FILES["about_img"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/about/';
					$img_fileName	= to_seo_url(cleanvars($_POST['about_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'about_img'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(ABOUT, $dataImage, "WHERE about_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['about_img']['tmp_name'],$originalImage);
					chmod ($originalImage, octdec($mode));
				}
			}
			// Image 2
			if(!empty($_FILES['about_img2']['name'])) {
				$path_parts 	= pathinfo($_FILES["about_img2"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/about/';
					$img_fileName	= to_seo_url(cleanvars($_POST['about_title'])).'-'.$latestID."_2.".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'about_img2'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(ABOUT, $dataImage, "WHERE about_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['about_img2']['tmp_name'],$originalImage);
					chmod ($originalImage, octdec($mode));
				}
			}
			sendRemark(moduleName(false).' Added', '1', $latestID);
			sessionMsg('Success', 'Record Successfully Added.', 'success');
			header("Location:".moduleName().".php", true, 301);
			exit();
		}
}

if(isset($_GET['deleteid'])) {
	$latestID = $_GET['deleteid'];
	$values = array(
						 'id_deleted'	=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
						,'is_deleted'	=>	'1'
						,'ip_deleted'	=>	cleanvars(LMS_IP)
						,'date_deleted'	=>	date('Y-m-d G:i:s')
					);   
	$sqlDel = $dblms->Update(FUNCTIONS , $values , "WHERE functions_id  = '".cleanvars($latestID)."'");

	if($sqlDel) { 
		sendRemark(moduleName(false).' Deleted', '3', $latestID);
		sessionMsg('Success', 'Record Successfully Deleted.', 'success');		
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
}

?>