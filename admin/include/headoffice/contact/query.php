<?php

// EDIT Contact
if(isset($_POST['submit_edit'])) { 
		$values     = array (
								  'info_phone'	    =>	cleanvars($_POST['info_phone'])
								, 'info_web'	    =>	cleanvars($_POST['info_web'])	
								, 'info_mail_1'	    =>	cleanvars($_POST['info_mail_1'])	
								, 'info_mail_2'	    =>	cleanvars($_POST['info_mail_2'])	
								, 'info_location'	    =>	cleanvars($_POST['info_location'])	
							);
		$sqllms = $dblms->Update(CONTACT_INFO , $values , "WHERE info_id  = '".cleanvars($_POST['info_id'])."'");
		if($sqllms) { 

			$latestID = cleanvars($_POST['info_id']);
			sendRemark(moduleName(false).' Added', '1', $latestID);
			sessionMsg('Success', 'Record Successfully Added.', 'success');
			header("Location:".moduleName().".php", true, 301);
			exit();
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