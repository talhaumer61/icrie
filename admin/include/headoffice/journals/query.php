<?php
// ADD SLIDER
if(isset($_POST['submit_add'])) { 
	$condition	=	array ( 
								'select' 	=> "journal_id",
								'where' 	=> array( 
														 'journal_title'		=>	cleanvars($_POST['journal_title'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(JOURNALS, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{
		$values     = array (
								'journal_status'	    =>	cleanvars($_POST['journal_status'])
								, 'journal_title'	    =>	cleanvars($_POST['journal_title'])
								, 'journal_href'		=>	to_seo_url($_POST['journal_title'])
								, 'journal_desc'		=>	cleanvars($_POST['journal_desc'])					
								, 'id_team'				=>	cleanvars($_POST['id_team'])					
								, 'id_added'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_added'		    =>	date('Y-m-d H:i:s')
							);   
		$sqllms 	= 	$dblms->insert(JOURNALS , $values);
		if($sqllms) { 
			
			$latestID = $dblms->lastestid();

			// Thumbnail
			if(!empty($_FILES['journal_photo']['name'])) {
				$path_parts 	= pathinfo($_FILES["journal_photo"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/journals/';
					$img_fileName	= to_seo_url(cleanvars($_POST['journal_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'journal_photo'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(JOURNALS, $dataImage, "WHERE journal_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['journal_photo']['tmp_name'],$originalImage);
					chmod ($originalImage, octdec($mode));
				}
			}
			// Attachment File
			if(!empty($_FILES['journal_file']['name'])) {
				$path_parts 	= pathinfo($_FILES["journal_file"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('doc','pdf', 'docx','pptx'))) {
					$img_dir 		= 'uploads/files/journals/';
					$img_fileName	= to_seo_url(cleanvars($_POST['journal_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'journal_file'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(JOURNALS, $dataImage, "WHERE journal_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['journal_file']['tmp_name'],$originalImage);
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
								'select' 	=> "journal_id",
								'where' 	=> array( 
														 'journal_title'		=>	cleanvars($_POST['journal_title'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														 'journal_id'		=>	cleanvars($_POST['journal_id'])
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(JOURNALS, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{ 
		$values     = array (
								'journal_status'	    =>	cleanvars($_POST['journal_status'])
								, 'journal_title'	    =>	cleanvars($_POST['journal_title'])
								, 'journal_href'		=>	to_seo_url($_POST['journal_title'])
								, 'journal_desc'		=>	cleanvars($_POST['journal_desc'])					
								, 'id_team'				=>	cleanvars($_POST['id_team'])					
								, 'id_modify'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_modify'		    =>	date('Y-m-d H:i:s')
							);
		$sqllms = $dblms->Update(JOURNALS , $values , "WHERE journal_id  = '".cleanvars($_POST['journal_id'])."'");
		if($sqllms) { 

			$latestID = cleanvars($_POST['journal_id']);

			// Thumbnail
			if(!empty($_FILES['journal_photo']['name'])) {
				$path_parts 	= pathinfo($_FILES["journal_photo"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/journals/';
					$img_fileName	= to_seo_url(cleanvars($_POST['journal_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'journal_photo'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(JOURNALS, $dataImage, "WHERE journal_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['journal_photo']['tmp_name'],$originalImage);
					chmod ($originalImage, octdec($mode));
				}
			}
			// Attachment File
			if(!empty($_FILES['journal_file']['name'])) {
				$path_parts 	= pathinfo($_FILES["journal_file"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('doc','pdf', 'docx','pptx'))) {
					$img_dir 		= 'uploads/files/journals/';
					$img_fileName	= to_seo_url(cleanvars($_POST['journal_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'journal_file'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(JOURNALS, $dataImage, "WHERE journal_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['journal_file']['tmp_name'],$originalImage);
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
	$sqlDel = $dblms->Update(JOURNALS , $values , "WHERE journal_id  = '".cleanvars($latestID)."'");

	if($sqlDel) { 
		sendRemark(moduleName(false).' Deleted', '3', $latestID);
		sessionMsg('Success', 'Record Successfully Deleted.', 'success');		
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
}

?>