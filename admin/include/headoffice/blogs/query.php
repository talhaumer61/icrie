<?php
// ADD BLOG
if(isset($_POST['submit_add'])) { 
	$condition	=	array ( 
								'select' 	=> "blog_id",
								'where' 	=> array( 
														 'blog_title'		=>	cleanvars($_POST['blog_title'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(BLOGS, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{
		$date = date("Y-m-d", strtotime($_POST['blog_date']));
		$values     = array (
								 'blog_status'	    	=>	cleanvars($_POST['blog_status'])
								, 'blog_title'	    	=>	cleanvars($_POST['blog_title'])
								, 'blog_href'	    	=>	to_seo_url($_POST['blog_title'])
								, 'blog_brief_detail'	=>	cleanvars($_POST['blog_brief_detail'])					
								, 'blog_detail'			=>	cleanvars($_POST['blog_detail'])					
								, 'blog_date'			=>	$date					
								, 'id_added'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_added'		    =>	date('Y-m-d H:i:s')
							);   
		$sqllms 	= 	$dblms->insert(BLOGS , $values);
		if($sqllms) { 
			
			$latestID = $dblms->lastestid();

			// Photo
			if(!empty($_FILES['blog_photo']['name'])) {
				$path_parts 	= pathinfo($_FILES["blog_photo"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/blogs/';
					$img_fileName	= to_seo_url(cleanvars($_POST['blog_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'blog_photo'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(BLOGS, $dataImage, "WHERE blog_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['blog_photo']['tmp_name'],$originalImage);
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
								'select' 	=> "blog_id",
								'where' 	=> array( 
														 'blog_title'		=>	cleanvars($_POST['blog_title'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														 'blog_id'		=>	cleanvars($_POST['blog_id'])
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(BLOGS, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{ 
		$date = date("Y-m-d", strtotime($_POST['blog_date']));
		$values     = array (
								'blog_status'	    	=>	cleanvars($_POST['blog_status'])
								, 'blog_title'	    	=>	cleanvars($_POST['blog_title'])
								, 'blog_href'	    	=>	to_seo_url($_POST['blog_title'])
								, 'blog_brief_detail'	=>	cleanvars($_POST['blog_brief_detail'])					
								, 'blog_detail'			=>	cleanvars($_POST['blog_detail'])					
								, 'blog_date'			=>	$date						
								, 'id_modify'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_modify'		    =>	date('Y-m-d H:i:s')
							);
		$sqllms = $dblms->Update(BLOGS , $values , "WHERE blog_id  = '".cleanvars($_POST['blog_id'])."'");
		if($sqllms) { 

			$latestID = cleanvars($_POST['blog_id']);

			// Photo
			if(!empty($_FILES['blog_photo']['name'])) {
				$path_parts 	= pathinfo($_FILES["blog_photo"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/blogs/';
					$img_fileName	= to_seo_url(cleanvars($_POST['blog_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'blog_photo'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(BLOGS, $dataImage, "WHERE blog_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['blog_photo']['tmp_name'],$originalImage);
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
	$sqlDel = $dblms->Update(BLOGS , $values , "WHERE blog_id  = '".cleanvars($latestID)."'");

	if($sqlDel) { 
		sendRemark(moduleName(false).' Deleted', '3', $latestID);
		sessionMsg('Success', 'Record Successfully Deleted.', 'success');		
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
}

?>