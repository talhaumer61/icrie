<?php
// ADD fatwa
if(isset($_POST['submit_add'])) {
	
		$values     = array (
								  'fatwa_status'	    =>	1
								, 'fatwa_fullname'		=>	cleanvars($_POST['fatwa_fullname'])
								, 'fatwa_phone'			=>	cleanvars($_POST['fatwa_phone'])					
								, 'fatwa_email'			=>	cleanvars($_POST['fatwa_email'])					
								, 'fatwa_detail'		=>	cleanvars($_POST['fatwa_detail'])					
								, 'id_added'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
								, 'date_added'		    =>	date('Y-m-d H:i:s')
							);   
		$sqllms 	= 	$dblms->insert(FATWA_REQUESTS , $values);
		if($sqllms) { 
			
			$latestID = $dblms->lastestid();
			sendRemark(moduleName(false).' Added', '1', $latestID);
			sessionMsg('Success', 'Record Successfully Added.', 'success');
			header("Location:".moduleName().".php", true, 301);
			exit();
		}
	
}

?>