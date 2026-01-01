<?php
// ADD COURSE
if(isset($_POST['submit_add'])) { 
	$condition	=	array ( 
								'select' 	=> "course_id",
								'where' 	=> array( 
														 'course_title'		=>	cleanvars($_POST['course_title'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(COURSE, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{
		$values     = array (
								'course_status'	    		=>	cleanvars($_POST['course_status'])
								, 'course_title'	    	=>	cleanvars($_POST['course_title'])
								, 'course_code'	    		=>	cleanvars($_POST['course_code'])
								, 'course_href'				=>	to_seo_url($_POST['course_title'])
								, 'course_short_desc'		=>	cleanvars($_POST['course_short_desc'])					
								, 'course_description'		=>	cleanvars($_POST['course_description'])					
								, 'course_type'				=>	cleanvars($_POST['course_type'])					
								, 'id_added'		    	=> 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_added'		    	=>	date('Y-m-d H:i:s')
							);   
		$sqllms 	= 	$dblms->insert(COURSE , $values);
		if($sqllms) { 
			
			$latestID = $dblms->lastestid();

			// Photo
			if(!empty($_FILES['course_photo']['name'])) {
				$path_parts 	= pathinfo($_FILES["course_photo"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/courses/';
					$img_fileName	= to_seo_url(cleanvars($_POST['course_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'course_photo'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(COURSE, $dataImage, "WHERE course_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['course_photo']['tmp_name'],$originalImage);
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
								'select' 	=> "course_id",
								'where' 	=> array( 
														 'course_title'		=>	cleanvars($_POST['course_title'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														 'course_id'		=>	cleanvars($_POST['course_id'])
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(COURSE, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{ 
		$values     = array (
								'course_status'	    		=>	cleanvars($_POST['course_status'])
								, 'course_title'	    	=>	cleanvars($_POST['course_title'])
								, 'course_code'	    		=>	cleanvars($_POST['course_code'])
								, 'course_href'				=>	to_seo_url($_POST['course_title'])
								, 'course_short_desc'		=>	cleanvars($_POST['course_short_desc'])					
								, 'course_description'		=>	cleanvars($_POST['course_description'])					
								, 'course_type'				=>	cleanvars($_POST['course_type'])					
								, 'id_modify'		    	=> 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_modify'		    	=>	date('Y-m-d H:i:s')
							);
		$sqllms = $dblms->Update(COURSE , $values , "WHERE course_id  = '".cleanvars($_POST['course_id'])."'");
		if($sqllms) { 

			$latestID = cleanvars($_POST['course_id']);

			// Photo
			if(!empty($_FILES['course_photo']['name'])) {
				$path_parts 	= pathinfo($_FILES["course_photo"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/courses/';
					$img_fileName	= to_seo_url(cleanvars($_POST['course_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'course_photo'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(COURSE, $dataImage, "WHERE course_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['course_photo']['tmp_name'],$originalImage);
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
	$sqlDel = $dblms->Update(COURSE , $values , "WHERE course_id  = '".cleanvars($latestID)."'");

	if($sqlDel) { 
		sendRemark(moduleName(false).' Deleted', '3', $latestID);
		sessionMsg('Success', 'Record Successfully Deleted.', 'success');		
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
}

?>