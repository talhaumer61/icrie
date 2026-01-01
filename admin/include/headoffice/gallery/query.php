<?php
// ADD SLIDER
if(isset($_POST['submit_add'])) { 
	$condition	=	array ( 
								'select' 	=> "gallery_id",
								'where' 	=> array( 
														 'gallery_title'		=>	cleanvars($_POST['gallery_title'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(GALLERY, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{    
		$values     = array (
								'gallery_status'	    =>	cleanvars($_POST['gallery_status'])
								, 'gallery_title'	    =>	cleanvars($_POST['gallery_title'])
								, 'gallery_href'		=>	to_seo_url($_POST['gallery_title'])					
								, 'id_added'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_added'		    =>	date('Y-m-d H:i:s')
							);   
		$sqllms 	= 	$dblms->insert(GALLERY , $values);
		if($sqllms) { 
			
			$latestID = $dblms->lastestid();

			if(!empty($_FILES['gallery_photo']['name'])) {
				$path_parts 	= pathinfo($_FILES["gallery_photo"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/gallery/';
					$img_fileName	= to_seo_url(cleanvars($_POST['gallery_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'gallery_photo'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(GALLERY, $dataImage, "WHERE gallery_id = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['gallery_photo']['tmp_name'],$originalImage);
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
								'select' 	=> "gallery_id",
								'where' 	=> array( 
														 'gallery_title'		=>	cleanvars($_POST['gallery_title'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														 'gallery_id'		=>	cleanvars($_POST['gallery_id'])
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(GALLERY, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{
		$values     = array (
								  'gallery_status'	    =>	cleanvars($_POST['gallery_status'])
								, 'gallery_title'	    =>	cleanvars($_POST['gallery_title'])					
								, 'gallery_href'	    =>	to_seo_url($_POST['gallery_title'])					
								, 'id_modify'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_modify'		    =>	date('Y-m-d H:i:s')
							);
		$sqllms = $dblms->Update(GALLERY , $values , "WHERE gallery_id  = '".cleanvars($_POST['gallery_id'])."'");
		if($sqllms) { 

			$latestID = cleanvars($_POST['gallery_id']);

			if(!empty($_FILES['gallery_photo']['name'])) {
				$path_parts 	= pathinfo($_FILES["gallery_photo"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/gallery/';
					$img_fileName	= to_seo_url(cleanvars($_POST['gallery_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'gallery_photo'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(GALLERY, $dataImage, "WHERE gallery_id = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['gallery_photo']['tmp_name'],$originalImage);
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
	$sqlDel = $dblms->Update(GALLERY , $values , "WHERE gallery_id  = '".cleanvars($latestID)."'");

	if($sqlDel) { 
		sendRemark(moduleName(false).' Deleted', '3', $latestID);
		sessionMsg('Success', 'Record Successfully Deleted.', 'success');		
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
}
?>