<?php
// ADD EVENT
if(isset($_POST['submit_add'])) { 
	$condition	=	array ( 
								'select' 	=> "event_id",
								'where' 	=> array( 
														 'event_title'		=>	cleanvars($_POST['event_title'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(EVENTS, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{
		$values     = array (
								'event_status'	    		=>	cleanvars($_POST['event_status'])
								, 'event_title'	    		=>	cleanvars($_POST['event_title'])
								, 'event_type'	    		=>	cleanvars($_POST['event_type'])
								, 'event_href'				=>	to_seo_url($_POST['event_title'])
								, 'event_time'				=>	cleanvars($_POST['event_time'])
								, 'event_date'				=>	cleanvars($_POST['event_date'])
								, 'event_place'				=>	cleanvars($_POST['event_place'])
								, 'event_reg_link'			=>	cleanvars($_POST['event_reg_link'])
								, 'event_brief_detail'		=>	cleanvars($_POST['event_brief_detail'])					
								, 'event_detail'			=>	cleanvars($_POST['event_detail'])				
								, 'id_added'		    	=> 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_added'		    	=>	date('Y-m-d H:i:s')
							);   
		$sqllms 	= 	$dblms->insert(EVENTS , $values);
		if($sqllms) { 
			
			$latestID = $dblms->lastestid();

			// Photo
			if(!empty($_FILES['event_photo']['name'])) {
				$path_parts 	= pathinfo($_FILES["event_photo"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/events/';
					$img_fileName	= to_seo_url(cleanvars($_POST['event_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'event_photo'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(EVENTS, $dataImage, "WHERE event_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['event_photo']['tmp_name'],$originalImage);
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
								'select' 	=> "event_id",
								'where' 	=> array( 
														 'event_title'		=>	cleanvars($_POST['event_title'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														 'event_id'		=>	cleanvars($_POST['event_id'])
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(EVENTS, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{ 
		$values     = array (
								'event_status'	    		=>	cleanvars($_POST['event_status'])
								, 'event_title'	    		=>	cleanvars($_POST['event_title'])
								, 'event_type'	    		=>	cleanvars($_POST['event_type'])
								, 'event_href'				=>	to_seo_url($_POST['event_title'])
								, 'event_time'				=>	cleanvars($_POST['event_time'])
								, 'event_date'				=>	cleanvars($_POST['event_date'])
								, 'event_place'				=>	cleanvars($_POST['event_place'])
								, 'event_reg_link'			=>	cleanvars($_POST['event_reg_link'])
								, 'event_brief_detail'		=>	cleanvars($_POST['event_brief_detail'])					
								, 'event_detail'			=>	cleanvars($_POST['event_detail'])					
								, 'id_modify'		    	=> 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_modify'		    	=>	date('Y-m-d H:i:s')
							);
		$sqllms = $dblms->Update(EVENTS , $values , "WHERE event_id  = '".cleanvars($_POST['event_id'])."'");
		if($sqllms) { 

			$latestID = cleanvars($_POST['event_id']);

			// Photo
			if(!empty($_FILES['event_photo']['name'])) {
				$path_parts 	= pathinfo($_FILES["event_photo"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/events/';
					$img_fileName	= to_seo_url(cleanvars($_POST['event_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'event_photo'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(EVENTS, $dataImage, "WHERE event_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['event_photo']['tmp_name'],$originalImage);
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
	$sqlDel = $dblms->Update(EVENTS , $values , "WHERE event_id  = '".cleanvars($latestID)."'");

	if($sqlDel) { 
		sendRemark(moduleName(false).' Deleted', '3', $latestID);
		sessionMsg('Success', 'Record Successfully Deleted.', 'success');		
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
}

?>