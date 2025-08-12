<?php
// ADD SLIDER
if(isset($_POST['submit_add'])) { 
	$condition	=	array ( 
								'select' 	=> "functions_id",
								'where' 	=> array( 
														 'functions_title'		=>	cleanvars($_POST['functions_title'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(FUNCTIONS, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{
		$values     = array (
								'functions_status'	    =>	cleanvars($_POST['functions_status'])
								, 'functions_title'	    =>	cleanvars($_POST['functions_title'])
								, 'functions_href'		=>	to_seo_url($_POST['functions_title'])
								, 'functions_desc'		=>	cleanvars($_POST['functions_desc'])					
								, 'id_type'				=>	cleanvars($_POST['id_type'])					
								, 'id_team'				=>	cleanvars($_POST['id_team'])					
								, 'id_added'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_added'		    =>	date('Y-m-d H:i:s')
							);   
		$sqllms 	= 	$dblms->insert(FUNCTIONS , $values);
		if($sqllms) { 
			
			$latestID = $dblms->lastestid();

			// Thumbnail
			if(!empty($_FILES['functions_photo']['name'])) {
				$path_parts 	= pathinfo($_FILES["functions_photo"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/functions/';
					$img_fileName	= to_seo_url(cleanvars($_POST['functions_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'functions_photo'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(FUNCTIONS, $dataImage, "WHERE functions_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['functions_photo']['tmp_name'],$originalImage);
					chmod ($originalImage, octdec($mode));
				}
			}
			// Attachment File
			if(!empty($_FILES['functions_file']['name'])) {
				$path_parts 	= pathinfo($_FILES["functions_file"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('doc','pdf', 'docx','pptx'))) {
					$img_dir 		= 'uploads/files/functions/';
					$img_fileName	= to_seo_url(cleanvars($_POST['functions_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'functions_file'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(FUNCTIONS, $dataImage, "WHERE functions_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['functions_file']['tmp_name'],$originalImage);
					chmod ($originalImage, octdec($mode));
				}
			}
			sendRemark(moduleName(false).' Added', '1', $latestID);
			sessionMsg('Success', 'Record Successfully Added.', 'success');
			header("Location:".moduleName().".php", true, 301);
			exit();
		}
	}
}
// EDIT SLIDER
if(isset($_POST['submit_edit'])) {
	 
	$condition	=	array ( 
								'select' 	=> "functions_id",
								'where' 	=> array( 
														 'functions_title'		=>	cleanvars($_POST['functions_title'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														 'functions_id'		=>	cleanvars($_POST['functions_id'])
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(FUNCTIONS, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{ 
		$values     = array (
								'functions_status'	    =>	cleanvars($_POST['functions_status'])
								, 'functions_title'	    =>	cleanvars($_POST['functions_title'])
								, 'functions_href'		=>	to_seo_url($_POST['functions_title'])
								, 'functions_desc'		=>	cleanvars($_POST['functions_desc'])					
								, 'id_type'				=>	cleanvars($_POST['id_type'])					
								, 'id_team'				=>	cleanvars($_POST['id_team'])					
								, 'id_modify'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_modify'		    =>	date('Y-m-d H:i:s')
							);
		$sqllms = $dblms->Update(FUNCTIONS , $values , "WHERE functions_id  = '".cleanvars($_POST['functions_id'])."'");
		if($sqllms) { 

			$latestID = cleanvars($_POST['functions_id']);

			// Thumbnail
			if(!empty($_FILES['functions_photo']['name'])) {
				$path_parts 	= pathinfo($_FILES["functions_photo"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/functions/';
					$img_fileName	= to_seo_url(cleanvars($_POST['functions_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'functions_photo'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(FUNCTIONS, $dataImage, "WHERE functions_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['functions_photo']['tmp_name'],$originalImage);
					chmod ($originalImage, octdec($mode));
				}
			}
			// Attachment File
			if(!empty($_FILES['functions_file']['name'])) {
				$path_parts 	= pathinfo($_FILES["functions_file"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('doc','pdf', 'docx','pptx'))) {
					$img_dir 		= 'uploads/files/functions/';
					$img_fileName	= to_seo_url(cleanvars($_POST['functions_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'functions_file'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(FUNCTIONS, $dataImage, "WHERE functions_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['functions_file']['tmp_name'],$originalImage);
					chmod ($originalImage, octdec($mode));
				}
			}
			sendRemark(moduleName(false).' Added', '1', $latestID);
			sessionMsg('Success', 'Record Successfully Added.', 'success');
			header("Location:".moduleName().".php", true, 301);
			exit();
		}
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