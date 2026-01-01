<?php
// ADD SLIDER
if(isset($_POST['submit_add'])) { 
	$condition	=	array ( 
								'select' 	=> "team_id",
								'where' 	=> array( 
														 'team_name'		=>	cleanvars($_POST['team_name'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(TEAMS, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{
		$values     = array (
								 'team_status'	    	=>	cleanvars($_POST['team_status'])
								, 'team_name'	    	=>	cleanvars($_POST['team_name'])
								, 'team_href'	    	=>	to_seo_url($_POST['team_name'])
								, 'team_desc'			=>	cleanvars($_POST['team_desc'])					
								, 'id_type'				=>	cleanvars($_POST['id_type'])					
								, 'team_designation'	=>	cleanvars($_POST['team_designation'])					
								, 'team_degree'			=>	cleanvars($_POST['team_degree'])					
								, 'id_priority'			=>	cleanvars($_POST['id_priority'])					
								, 'team_fb'				=>	cleanvars($_POST['team_fb'])					
								, 'team_twitter'		=>	cleanvars($_POST['team_twitter'])					
								, 'team_linkedin'		=>	cleanvars($_POST['team_linkedin'])					
								, 'team_insta'				=>	cleanvars($_POST['team_insta'])					
								, 'id_added'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_added'		    =>	date('Y-m-d H:i:s')
							);   
		$sqllms 	= 	$dblms->insert(TEAMS , $values);
		if($sqllms) { 
			
			$latestID = $dblms->lastestid();

			// Photo
			if(!empty($_FILES['team_img']['name'])) {
				$path_parts 	= pathinfo($_FILES["team_img"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/team/';
					$img_fileName	= to_seo_url(cleanvars($_POST['team_name'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'team_img'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(TEAMS, $dataImage, "WHERE team_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['team_img']['tmp_name'],$originalImage);
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
								'select' 	=> "team_id",
								'where' 	=> array( 
														 'team_name'		=>	cleanvars($_POST['team_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														 'team_id'		=>	cleanvars($_POST['team_id'])
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(TEAMS, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{ 
		$values     = array (
								'team_status'	    	=>	cleanvars($_POST['team_status'])
								, 'team_name'	    	=>	cleanvars($_POST['team_name'])
								, 'team_href'	    	=>	to_seo_url($_POST['team_name'])
								, 'team_desc'			=>	cleanvars($_POST['team_desc'])					
								, 'id_type'				=>	cleanvars($_POST['id_type'])					
								, 'team_designation'	=>	cleanvars($_POST['team_designation'])					
								, 'team_degree'			=>	cleanvars($_POST['team_degree'])					
								, 'id_priority'			=>	cleanvars($_POST['id_priority'])					
								, 'team_fb'				=>	cleanvars($_POST['team_fb'])					
								, 'team_twitter'		=>	cleanvars($_POST['team_twitter'])					
								, 'team_linkedin'		=>	cleanvars($_POST['team_linkedin'])					
								, 'team_insta'				=>	cleanvars($_POST['team_insta'])						
								, 'id_modify'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_modify'		    =>	date('Y-m-d H:i:s')
							);
		$sqllms = $dblms->Update(TEAMS , $values , "WHERE team_id  = '".cleanvars($_POST['team_id'])."'");
		if($sqllms) { 

			$latestID = cleanvars($_POST['team_id']);

			// Photo
			if(!empty($_FILES['team_img']['name'])) {
				$path_parts 	= pathinfo($_FILES["team_img"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/team/';
					$img_fileName	= to_seo_url(cleanvars($_POST['team_name'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'team_img'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(TEAMS, $dataImage, "WHERE team_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['team_img']['tmp_name'],$originalImage);
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
	$sqlDel = $dblms->Update(TEAMS , $values , "WHERE team_id  = '".cleanvars($latestID)."'");

	if($sqlDel) { 
		sendRemark(moduleName(false).' Deleted', '3', $latestID);
		sessionMsg('Success', 'Record Successfully Deleted.', 'success');		
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
}

?>