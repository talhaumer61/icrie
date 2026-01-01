<?php
// ADD SLIDER
if(isset($_POST['submit_slider'])) { 
	$condition	=	array ( 
								'select' 	=> "slider_id",
								'where' 	=> array( 
														 'slider_title'		=>	cleanvars($_POST['slider_title'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(SLIDER, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{    
		$values     = array (
								'slider_status'	    =>	cleanvars($_POST['slider_status'])
								, 'slider_title'	    =>	cleanvars($_POST['slider_title'])
								, 'slider_btn_href'		=>	cleanvars($_POST['slider_btn_href'])
								, 'slider_btn_text'		=>	cleanvars($_POST['slider_btn_text'])					
								, 'id_added'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_added'		    =>	date('Y-m-d H:i:s')
							);   
		$sqllms 	= 	$dblms->insert(SLIDER , $values);
		if($sqllms) { 
			
			$latestID = $dblms->lastestid();

			if(!empty($_FILES['slider_img']['name'])) {
				$path_parts 	= pathinfo($_FILES["slider_img"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/slider/';
					$img_fileName	= to_seo_url(cleanvars($_POST['slider_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'slider_img'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(SLIDER, $dataImage, "WHERE slider_id = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['slider_img']['tmp_name'],$originalImage);
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
if(isset($_POST['edit_slider'])) { 
	$condition	=	array ( 
								'select' 	=> "slider_id",
								'where' 	=> array( 
														 'slider_title'		=>	cleanvars($_POST['slider_title'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														 'slider_id'		=>	cleanvars($_POST['slider_id'])
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(SLIDER, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{
		$values     = array (
								'slider_status'	    =>	cleanvars($_POST['slider_status'])
								, 'slider_title'	    =>	cleanvars($_POST['slider_title'])
								, 'slider_btn_href'		=>	cleanvars($_POST['slider_btn_href'])
								, 'slider_btn_text'		=>	cleanvars($_POST['slider_btn_text'])					
								, 'id_modify'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_modify'		    =>	date('Y-m-d H:i:s')
							);
		$sqllms = $dblms->Update(SLIDER , $values , "WHERE slider_id  = '".cleanvars($_POST['slider_id'])."'");
		if($sqllms) { 

			$latestID = cleanvars($_POST['slider_id']);

			if(!empty($_FILES['slider_img']['name'])) {
				$path_parts 	= pathinfo($_FILES["slider_img"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/slider/';
					$img_fileName	= to_seo_url(cleanvars($_POST['slider_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'slider_img'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(SLIDER, $dataImage, "WHERE slider_id = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['slider_img']['tmp_name'],$originalImage);
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
	$sqlDel = $dblms->Update(SLIDER , $values , "WHERE slider_id  = '".cleanvars($latestID)."'");

	if($sqlDel) { 
		sendRemark(moduleName(false).' Deleted', '3', $latestID);
		sessionMsg('Success', 'Record Successfully Deleted.', 'success');		
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
}

// ADD RECORD
// if(isset($_POST['submit_add'])) {
// 	$condition	=	array ( 
// 								'select' 	=> "cat_id",
// 								'where' 	=> array( 
// 														 'cat_name'		=>	cleanvars($_POST['cat_name'])
// 														,'is_deleted'	=>	'0'	
// 													),
// 								'return_type' 	=> 'count' 
// 							); 
// 	if($dblms->getRows(CATEGORIES, $condition)) {
// 		sessionMsg('Error','Record Already Exists.','danger');
// 		header("Location:".moduleName().".php", true, 301);
// 		exit();
// 	}else{
// 		$values = array(
// 							 'cat_name'				=>	cleanvars($_POST['cat_name'])
// 							,'cat_code'				=>	cleanvars($_POST['cat_code'])
// 							,'cat_status'			=>	cleanvars($_POST['cat_status'])
// 							,'cat_description'		=>	htmlentities($_POST['cat_description'])
// 							,'id_added'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
// 							,'date_added'			=>	date('Y-m-d G:i:s')
// 						); 
// 		$sqllms = $dblms->insert(CATEGORIES, $values);

// 		if($sqllms) { 
// 			$latestID =	$dblms->lastestid();

// 			// ADD CATEGORY ICON
// 			if(!empty($_FILES['cat_icon']['name'])) {
// 				$path_parts 	= pathinfo($_FILES["cat_icon"]["name"]);
// 				$extension 		= strtolower($path_parts['extension']);
// 				if(in_array($extension , array('jpeg','jpg', 'png'))) {
// 					$img_dir 		= 'uploads/images/categories/icons/';
// 					$img_fileName	= to_seo_url(cleanvars($_POST['cat_name'])).'-'.$latestID.".".($extension);
// 					$originalImage	= $img_dir.$img_fileName;
// 					$dataImage 		= array(
// 												'cat_icon'	=>	$img_fileName,
// 											);
// 					$sqlUpdatePhoto = $dblms->Update(CATEGORIES, $dataImage, "WHERE cat_id = '".$latestID."'");
// 					unset($sqlUpdatePhoto);
// 					$mode = '0644';
// 					move_uploaded_file($_FILES['cat_icon']['tmp_name'],$originalImage);
// 					chmod ($originalImage, octdec($mode));
// 				}
// 			}

// 			// ADD CATEGORY PHOTO
// 			if(!empty($_FILES['cat_photo']['name'])) {
// 				$path_parts 	= pathinfo($_FILES["cat_photo"]["name"]);
// 				$extension 		= strtolower($path_parts['extension']);
// 				if(in_array($extension , array('jpeg','jpg', 'png'))) {
// 					$img_dir 		= 'uploads/images/categories/';
// 					$img_fileName	= to_seo_url(cleanvars($_POST['cat_name'])).'-'.$latestID.".".($extension);
// 					$originalImage	= $img_dir.$img_fileName;
// 					$dataImage 		= array(
// 												'cat_photo'	=>	$img_fileName, 
// 											);
// 					$sqlUpdatePhoto = $dblms->Update(CATEGORIES, $dataImage, "WHERE cat_id = '".$latestID."'");
// 					unset($sqlUpdatePhoto);
// 					$mode = '0644';					
// 					move_uploaded_file($_FILES['cat_photo']['tmp_name'],$originalImage);
// 					chmod ($originalImage, octdec($mode));
// 				}
// 			}

// 			// REMARKS
// 			sendRemark(moduleName(false).' Added', '1', $latestID);
// 			sessionMsg('Success', 'Record Successfully Added.', 'success');
// 			header("Location:".moduleName().".php", true, 301);
// 			exit();
// 		}
// 	}
// }

// // EDIT RECORD
// if(isset($_POST['submit_edit'])) {
// 	$condition	=	array ( 
// 								 'select' 		=>	'cat_id'
// 								,'where' 		=>	array( 
// 															 'cat_name'		=>	cleanvars($_POST['cat_name'])
// 															,'is_deleted'	=>	'0'	
// 														)
// 								,'not_equal'		=>	array(
// 															'cat_id'		=> cleanvars(LMS_EDIT_ID)
// 														)
// 								,'return_type' 	=>	'count' 
// 							); 
// 	if($dblms->getRows(CATEGORIES, $condition)) {
// 		sessionMsg('Error','Record Already Exists.','danger');		
// 		header("Location:".moduleName().".php", true, 301);
// 		exit();
// 	}else{
// 		$values = array(
// 							'cat_name'				=>	cleanvars($_POST['cat_name'])
// 						   ,'cat_code'				=>	cleanvars($_POST['cat_code'])
// 						   ,'cat_status'			=>	cleanvars($_POST['cat_status'])
// 						   ,'cat_description'		=>	htmlentities($_POST['cat_description'])
// 						   ,'id_modify'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
// 						   ,'date_modify'			=>	date('Y-m-d G:i:s')
// 						);
// 		$sqllms = $dblms->Update(CATEGORIES, $values, "WHERE cat_id = '".LMS_EDIT_ID."'");

// 		if($sqllms) { 
// 			$latestID = LMS_EDIT_ID;

// 			// CATEGORY ICON
// 			if(!empty($_FILES['cat_icon']['name'])) {
// 				$path_parts 	= pathinfo($_FILES["cat_icon"]["name"]);
// 				$extension 		= strtolower($path_parts['extension']);
// 				if(in_array($extension , array('jpeg','jpg', 'png'))) {
// 					$img_dir 		= 'uploads/images/categories/icons/';
// 					$img_fileName	= to_seo_url(cleanvars($_POST['cat_name'])).'-'.$latestID.".".($extension);
// 					$originalImage	= $img_dir.$img_fileName;
// 					$dataImage 		= array(
// 												'cat_icon'	=>	$img_fileName,
// 											);
// 					$sqlUpdatePhoto = $dblms->Update(CATEGORIES, $dataImage, "WHERE cat_id = '".$latestID."'");
// 					unset($sqlUpdatePhoto);
// 					$mode = '0644';
// 					move_uploaded_file($_FILES['cat_icon']['tmp_name'],$originalImage);
// 					chmod ($originalImage, octdec($mode));
// 				}
// 			}

// 			// CATEGORY PHOTO
// 			if(!empty($_FILES['cat_photo']['name'])) {
// 				$path_parts 	= pathinfo($_FILES["cat_photo"]["name"]);
// 				$extension 		= strtolower($path_parts['extension']);
// 				if(in_array($extension , array('jpeg','jpg', 'png'))) {
// 					$img_dir 		= 'uploads/images/categories/';
// 					$img_fileName	= to_seo_url(cleanvars($_POST['cat_name'])).'-'.$latestID.".".($extension);
// 					$originalImage	= $img_dir.$img_fileName;
// 					$dataImage 		= array(
// 												'cat_photo'	=>	$img_fileName, 
// 											);
// 					$sqlUpdatePhoto = $dblms->Update(CATEGORIES, $dataImage, "WHERE cat_id = '".$latestID."'");
// 					unset($sqlUpdatePhoto);
// 					$mode = '0644';					
// 					move_uploaded_file($_FILES['cat_photo']['tmp_name'],$originalImage);
// 					chmod ($originalImage, octdec($mode));
// 				}
// 			}

// 			sendRemark(moduleName(false).' Updated', '2', $latestID);
// 			sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
// 			header("Location:".moduleName().".php", true, 301);
// 			exit();
// 		}
// 	}
// }

// // DELETE RECORD
// if(isset($_GET['deleteid'])) {
// 	$latestID = $_GET['deleteid'];
// 	$values = array(
// 						 'id_deleted'	=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
// 						,'is_deleted'	=>	'1'
// 						,'ip_deleted'	=>	cleanvars(LMS_IP)
// 						,'date_deleted'	=>	date('Y-m-d G:i:s')
// 					);   
// 	$sqlDel = $dblms->Update(CATEGORIES , $values , "WHERE cat_id  = '".cleanvars($latestID)."'");

// 	if($sqlDel) { 
// 		sendRemark(moduleName(false).' Deleted', '3', $latestID);
// 		sessionMsg('Success', 'Record Successfully Deleted.', 'success');		
// 		header("Location:".moduleName().".php", true, 301);
// 		exit();
// 	}
// }
?>