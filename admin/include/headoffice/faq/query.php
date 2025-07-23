<?php
// ADD SLIDER
if(isset($_POST['submit_add'])) { 
	$condition	=	array ( 
								'select' 		=> "faq_id",
								'where' 		=> array( 
														 'faq_qns'		=>	cleanvars($_POST['faq_qns'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(FAQ, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{
		$values     = array (
								 'faq_status'	    	=>	cleanvars($_POST['faq_status'])
								, 'faq_qns'	    		=>	cleanvars($_POST['faq_qns'])
								, 'faq_ans'				=>	cleanvars($_POST['faq_ans'])					
								, 'id_added'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_added'		    =>	date('Y-m-d H:i:s')
							);   
		$sqllms 	= 	$dblms->insert(FAQ , $values);
		if($sqllms) { 
			
			$latestID = $dblms->lastestid();
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
								'select' 	=> "faq_id",
								'where' 	=> array( 
														 'faq_qns'		=>	cleanvars($_POST['faq_qns'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														 'faq_id'		=>	cleanvars($_POST['faq_id'])
													),
								'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(FAQ, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
	else{ 
		$values     = array (
								 'faq_status'	    	=>	cleanvars($_POST['faq_status'])
								, 'faq_qns'	    		=>	cleanvars($_POST['faq_qns'])
								, 'faq_ans'				=>	cleanvars($_POST['faq_ans'])						
								, 'id_modify'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_modify'		    =>	date('Y-m-d H:i:s')
							);
		$sqllms = $dblms->Update(FAQ , $values , "WHERE faq_id  = '".cleanvars($_POST['faq_id'])."'");
		if($sqllms) { 

			$latestID = cleanvars($_POST['faq_id']);
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
	$sqlDel = $dblms->Update(FAQ , $values , "WHERE faq_id  = '".cleanvars($latestID)."'");

	if($sqlDel) { 
		sendRemark(moduleName(false).' Deleted', '3', $latestID);
		sessionMsg('Success', 'Record Successfully Deleted.', 'success');		
		header("Location:".moduleName().".php", true, 301);
		exit();
	}
}

?>