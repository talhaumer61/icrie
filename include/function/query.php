<?php
// ADD REQUEST
if(isset($_POST['submit_request'])) {
	$condition	=	array ( 
								'select' 	=> "request_id ",
								'where' 	=> array( 
														 'request_fullname'		=>	cleanvars($_POST['request_fullname'])
														,'id_course'		=>	cleanvars($_POST['id_course'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(COURSE_REQUESTS, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{
		$values     = array (
								'request_status'	    =>	1
								, 'request_fullname'	=>	cleanvars($_POST['request_fullname'])
								, 'request_phone'		=>	cleanvars($_POST['request_phone'])					
								, 'request_phone'		=>	cleanvars($_POST['request_phone'])					
								, 'request_email'		=>	cleanvars($_POST['request_email'])					
								, 'request_detail'		=>	cleanvars($_POST['request_detail'])					
								, 'id_course'			=>	cleanvars($_POST['id_course'])					
								, 'id_added'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_added'		    =>	date('Y-m-d H:i:s')
							);   
		$sqllms 	= 	$dblms->insert(COURSE_REQUESTS , $values);
		if($sqllms) { 
			
			$latestID = $dblms->lastestid();
			sendRemark(moduleName(false).' Added', '1', $latestID);
			sessionMsg('Success', 'Record Successfully Added.', 'success');
			header("Location:".moduleName().".php", true, 301);
			exit();
		}
	}
}

// ADD AAOIFI REGISTRATION
if(isset($_POST['add_reg'])) {
	$condition	=	array ( 
								'select' 	=> "reg_id ",
								'where' 	=> array( 
														 'reg_fullname'		=>	cleanvars($_POST['request_fullname'])
														,'reg_certificate'		=>	cleanvars($_POST['reg_certificate'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(AAOIFI_REGISTRATIONS, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{
		$values     = array (
								  'reg_status'	    =>	1
								, 'reg_fullname'	=>	cleanvars($_POST['reg_fullname'])
								, 'reg_phone'		=>	cleanvars($_POST['reg_phone'])					
								, 'reg_email'		=>	cleanvars($_POST['reg_email'])					
								, 'reg_certificate'		=>	cleanvars($_POST['reg_certificate'])					
								, 'id_added'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_added'		    =>	date('Y-m-d H:i:s')
							);   
		$sqllms 	= 	$dblms->insert(AAOIFI_REGISTRATIONS , $values);
		if($sqllms) { 
			
			$latestID = $dblms->lastestid();
			sendRemark(moduleName(false).' Added', '1', $latestID);
			sessionMsg('Success', 'Record Successfully Added.', 'success');
			header("Location:".moduleName().".php", true, 301);
			exit();
		}
	}
}

?>