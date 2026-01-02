<?php
// ADD SLIDER
if(isset($_POST['submit_add'])) { 
	$condition	=	array ( 
								'select' 	=> "publication_id",
								'where' 	=> array( 
														 'publication_title'		=>	cleanvars($_POST['publication_title'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(PUBLICATIONS, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{
		$values     = array (
								'publication_status'	    =>	cleanvars($_POST['publication_status'])
								, 'publication_title'	    =>	cleanvars($_POST['publication_title'])
								, 'publication_href'		=>	to_seo_url($_POST['publication_title'])
								, 'publication_desc'		=>	cleanvars($_POST['publication_desc'])					
								, 'id_type'				=>	cleanvars($_POST['id_type'])					
								, 'id_team'				=>	cleanvars($_POST['id_team'])					
								, 'id_added'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_added'		    =>	date('Y-m-d H:i:s')
							);   
		$sqllms 	= 	$dblms->insert(PUBLICATIONS , $values);
		if($sqllms) { 
			
			$latestID = $dblms->lastestid();

			// Thumbnail
			if(!empty($_FILES['publication_photo']['name'])) {
				$path_parts 	= pathinfo($_FILES["publication_photo"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/publications/';
					$img_fileName	= to_seo_url(cleanvars($_POST['publication_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'publication_photo'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(PUBLICATIONS, $dataImage, "WHERE publication_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['publication_photo']['tmp_name'],$originalImage);
					chmod ($originalImage, octdec($mode));
				}
			}
			// Attachment File
			if(!empty($_FILES['publication_file']['name'])) {
				$path_parts 	= pathinfo($_FILES["publication_file"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('doc','pdf', 'docx','pptx'))) {
					$img_dir 		= 'uploads/files/publications/';
					$img_fileName	= to_seo_url(cleanvars($_POST['publication_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'publication_file'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(PUBLICATIONS, $dataImage, "WHERE publication_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['publication_file']['tmp_name'],$originalImage);
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
								'select' 	=> "publication_id",
								'where' 	=> array( 
														 'publication_title'		=>	cleanvars($_POST['publication_title'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														 'publication_id'		=>	cleanvars($_POST['publication_id'])
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(PUBLICATIONS, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{ 
		$values     = array (
								'publication_status'	    =>	cleanvars($_POST['publication_status'])
								, 'publication_title'	    =>	cleanvars($_POST['publication_title'])
								, 'publication_href'		=>	to_seo_url($_POST['publication_title'])
								, 'publication_desc'		=>	cleanvars($_POST['publication_desc'])					
								, 'id_type'				=>	cleanvars($_POST['id_type'])					
								, 'id_team'				=>	cleanvars($_POST['id_team'])					
								, 'id_modify'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_modify'		    =>	date('Y-m-d H:i:s')
							);
		$sqllms = $dblms->Update(PUBLICATIONS , $values , "WHERE publication_id  = '".cleanvars($_POST['publication_id'])."'");
		if($sqllms) { 

			$latestID = cleanvars($_POST['publication_id']);

			// Thumbnail
			if(!empty($_FILES['publication_photo']['name'])) {
				$path_parts 	= pathinfo($_FILES["publication_photo"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('jpeg','jpg', 'png'))) {
					$img_dir 		= 'uploads/images/publications/';
					$img_fileName	= to_seo_url(cleanvars($_POST['publication_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'publication_photo'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(PUBLICATIONS, $dataImage, "WHERE publication_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['publication_photo']['tmp_name'],$originalImage);
					chmod ($originalImage, octdec($mode));
				}
			}
			// Attachment File
			if(!empty($_FILES['publication_file']['name'])) {
				$path_parts 	= pathinfo($_FILES["publication_file"]["name"]);
				$extension 		= strtolower($path_parts['extension']);
				if(in_array($extension , array('doc','pdf', 'docx','pptx'))) {
					$img_dir 		= 'uploads/files/publications/';
					$img_fileName	= to_seo_url(cleanvars($_POST['publication_title'])).'-'.$latestID.".".($extension);
					$originalImage	= $img_dir.$img_fileName;
					$dataImage 		= array(
												'publication_file'	=>	$img_fileName,
											);
					$sqlUpdatePhoto = $dblms->Update(PUBLICATIONS, $dataImage, "WHERE publication_id  = '".$latestID."'");
					unset($sqlUpdatePhoto);
					$mode = '0644';
					move_uploaded_file($_FILES['publication_file']['tmp_name'],$originalImage);
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
	$sqlDel = $dblms->Update(PUBLICATIONS , $values , "WHERE publication_id  = '".cleanvars($latestID)."'");

	if($sqlDel) { 
		sendRemark(moduleName(false).' Deleted', '3', $latestID);
		sessionMsg('Success', 'Record Successfully Deleted.', 'success');		
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
}

// REMOVE ATTACHMENT FILE
if (isset($_POST['remove_file'])) {

    $publicationID = cleanvars($_POST['publication_id']);

    $row = $dblms->getRows(PUBLICATIONS, array(
        'select' => 'publication_file',
        'where'  => array('publication_id' => $publicationID),
        'return_type' => 'single'
    ));

    if (!empty($row['publication_file'])) {
        $filePath = 'uploads/files/publications/'.$row['publication_file'];

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // clear DB column
        $dblms->Update(
            PUBLICATIONS,
            array('publication_file' => ''),
            "WHERE publication_id = '".$publicationID."'"
        );
    }

    sessionMsg('Success', 'Attachment removed successfully.', 'success');
    header("Location:".moduleName().".php?editid=".$publicationID, true, 301);
    exit();
}

?>