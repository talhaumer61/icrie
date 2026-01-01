<?php
// ADD SLIDER
if(isset($_POST['submit_add'])) { 
	$condition	=	array ( 
								'select' 	=> "type_id",
								'where' 	=> array( 
														 'type_name'		=>	cleanvars($_POST['type_name'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(FUNCTION_TYPES, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{
		$values     = array (
								'type_status'	    =>	cleanvars($_POST['type_status'])
								, 'type_name'	    =>	cleanvars($_POST['type_name'])
								, 'type_href'		=>	to_seo_url($_POST['type_name'])
								, 'type_desc'		=>	cleanvars($_POST['type_desc'])				
								, 'id_added'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_added'		    =>	date('Y-m-d H:i:s')
							);   
		$sqllms 	= 	$dblms->insert(FUNCTION_TYPES , $values);
		if($sqllms) { 
			
			$latestID = $dblms->lastestid();

			// Thumbnail
			if(!empty($_FILES['type_icon']['name'])) {
				$path_parts 	= pathinfo($_FILES["type_icon"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/function_types/';
					$img_fileName	= to_seo_url(cleanvars($_POST['type_name'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'type_icon'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(FUNCTION_TYPES, $dataImage, "WHERE type_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['type_icon']['tmp_name'],$originalImage);
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
								'select' 	=> "type_id",
								'where' 	=> array( 
														 'type_name'		=>	cleanvars($_POST['type_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														 'type_id'		=>	cleanvars($_POST['type_id'])
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(FUNCTION_TYPES, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{ 
		$values     = array (
								 'type_status'	    =>	cleanvars($_POST['type_status'])
								, 'type_name'	    =>	cleanvars($_POST['type_name'])
								, 'type_href'		=>	to_seo_url($_POST['type_name'])
								, 'type_desc'		=>	cleanvars($_POST['type_desc'])					
								, 'id_modify'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_modify'		    =>	date('Y-m-d H:i:s')
							);
		$sqllms = $dblms->Update(FUNCTION_TYPES , $values , "WHERE type_id  = '".cleanvars($_POST['type_id'])."'");
		if($sqllms) { 

			$latestID = cleanvars($_POST['type_id']);

			// ICON
			if(!empty($_FILES['type_icon']['name'])) {
				$path_parts 	= pathinfo($_FILES["type_icon"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/functions/';
					$img_fileName	= to_seo_url(cleanvars($_POST['type_name'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'type_icon'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(FUNCTION_TYPES, $dataImage, "WHERE type_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['type_icon']['tmp_name'],$originalImage);
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
	$sqlDel = $dblms->Update(FUNCTION_TYPES , $values , "WHERE type_id  = '".cleanvars($latestID)."'");

	if($sqlDel) { 
		sendRemark(moduleName(false).' Deleted', '3', $latestID);
		sessionMsg('Success', 'Record Successfully Deleted.', 'success');		
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
}

?>