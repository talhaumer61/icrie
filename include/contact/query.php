<?php
// ADD fatwa
if(isset($_POST['submit_add'])) {
	
		$values     = array (
								  'contact_status'	    =>	1
								, 'first_name'			=>	cleanvars($_POST['first_name'])
								, 'last_name'			=>	cleanvars($_POST['last_name'])					
								, 'email'				=>	cleanvars($_POST['email'])					
								, 'phone_number'		=>	cleanvars($_POST['phone_number'])					
								, 'msg_subject'			=>	cleanvars($_POST['msg_subject'])					
								, 'message'				=>	cleanvars($_POST['message'])					
								, 'date_added'		    =>	date('Y-m-d H:i:s')
							);   
		$sqllms 	= 	$dblms->insert(QUERIES , $values);
		if($sqllms) { 
			
			$latestID = $dblms->lastestid();
			sendRemark(moduleName(false).' Added', '1', $latestID);
			sessionMsg('Success', 'Record Successfully Added.', 'success');
			header("Location:".moduleName().".php", true, 301);
			exit();
		}
	
}

?>