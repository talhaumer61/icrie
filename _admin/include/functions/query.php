<?php
    // ADD FUNCTION
if(isset($_POST['submit_function'])) {    
    $functions_title = cleanvars($_POST['functions_title']);
    $sqls = "
                SELECT functions_id 
                FROM ".FUNCTIONS." 
                WHERE functions_title = '$functions_title'";
    $result = $dblms->querylms($sqls);

    if ($result && $result->num_rows > 0 || false) {
        $_SESSION['msg']['status'] = 'toastr.success("Date already exist!");';
        header("Location: functions.php", true, 301);
        exit();
    }else{

        $values     = array (
                                  'functions_status'	=> cleanvars($_POST['functions_status'])
                                , 'functions_title'	    => cleanvars($_POST['functions_title'])
                                , 'functions_desc'	    => cleanvars($_POST['functions_desc'])					
                                , 'id_functions'		=> cleanvars($_POST['id_functions'])					
                                , 'id_team'		        => cleanvars($_POST['id_team'])					
                                , 'id_added' 			=> cleanvars($_SESSION['LOGINID_DT'])
		                        , 'date_added' 		    => date('Y-m-d H:i:s')
                            );   
        $sqllms 	= 	$dblms->insert(FUNCTIONS , $values);
        
        if($sqllms) { 
            $latest_id	                = $dblms->lastestid();
            $files_name_array           = array();
            $files_name_comma_sep       = '';
            $img_dir 	                = '../images/functions/';

            
            if(!empty($_FILES['functions_photo']['name'])) {
                $path_parts 	= pathinfo($_FILES['functions_photo']['name']);
                $extension 		= strtolower($path_parts['extension']);
                $newImgName     = to_seo_url(cleanvars($_POST['functions_title'])).'-'.$latest_id.'-'.uniqid().".".($extension);
                $valueUpdate    = array ( 'functions_photo' => $newImgName ); 
                $sqllmsupload   = $dblms->Update(FUNCTIONS,$valueUpdate,"WHERE functions_id = '".$latest_id."'");
                move_uploaded_file($_FILES['functions_photo']['tmp_name'],$img_dir.$newImgName);
            }

            foreach($_FILES['functions_file']['name'] as $key => $val):
                if(!empty($_FILES['functions_file']['name'][$key])) {
                    $path_parts 	= pathinfo($val);
                    $extension 		= strtolower($path_parts['extension']);
                    $newImgName     = to_seo_url(cleanvars($_POST['functions_title'])).'-'.($latest_id+$key).'-'.uniqid().".".($extension);
                    move_uploaded_file($_FILES['functions_file']['tmp_name'][$key],$img_dir.$newImgName);
                    array_push($files_name_array,$newImgName);
                    $files_name_comma_sep = implode(',',$files_name_array);
                }
            endforeach;
            $valueUpdate  = array ( 'functions_file' => $files_name_comma_sep ); 
            $sqllmsupload = $dblms->Update(FUNCTIONS,$valueUpdate,"WHERE functions_id = '".$latest_id."'");
            if (!empty($files_name_comma_sep)) {
                $valueUpdate  = array ( 'functions_file' => $files_name_comma_sep ); 
                $sqllmsupload = $dblms->Update(FUNCTIONS,$valueUpdate,"WHERE functions_id = '".$latest_id."'");
            }

            $_SESSION['msg']['status'] = 'toastr.success("Inserted Succesfully");';
            header("Location: functions.php", true, 301);
            exit();
        } else {
            $_SESSION['msg']['status'] = 'toastr.error("Not Inserted Succesfully");';
            header("Location: functions.php?view=add", true, 301);
            exit();
        }
    }
}
    // EDIT TUTOR
if(isset($_POST['edit_function'])) { 
    $functions_title = cleanvars($_POST['functions_title']);
    $functions_id = cleanvars($_POST['functions_id']);
    $sqls = "
                SELECT functions_id 
                FROM ".FUNCTIONS." 
                WHERE functions_title = '$functions_title' AND functions_id != '$functions_id' ";
    $result = $dblms->querylms($sqls);
    if ($result && $result->num_rows > 0) {
        $_SESSION['msg']['status'] = 'toastr.success("Date already exist!");';
        header("Location: functions.php", true, 301);
        exit();
    }else{
        $values     = array (
                                  'functions_status'	=> cleanvars($_POST['functions_status'])
                                , 'functions_title'	    => cleanvars($_POST['functions_title'])
                                , 'functions_desc'	    => cleanvars($_POST['functions_desc'])					
                                , 'id_functions'		=> cleanvars($_POST['id_functions'])					
                                , 'id_team'		        => cleanvars($_POST['id_team'])					
                                , 'id_modify'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
                                , 'date_modify'		    =>	date('Y-m-d H:i:s')
                            );   
        $sqllms = $dblms->Update(FUNCTIONS , $values , "WHERE functions_id  = '".cleanvars($_POST['functions_id'])."'");
        
        if($sqllms) { 
            $latest_id	                = cleanvars($_POST['functions_id']);
            $files_name_array           = array();
            $files_name_comma_sep       = '';
            $img_dir 	                = '../images/functions/';

            
            if(!empty($_FILES['functions_photo']['name'])) {
                $path_parts 	= pathinfo($_FILES['functions_photo']['name']);
                $extension 		= strtolower($path_parts['extension']);
                $newImgName     = to_seo_url(cleanvars($_POST['functions_title'])).'-'.$latest_id.'-'.uniqid().".".($extension);
                $valueUpdate    = array ( 'functions_photo' => $newImgName ); 
                $sqllmsupload   = $dblms->Update(FUNCTIONS,$valueUpdate,"WHERE functions_id = '".$latest_id."'");
                move_uploaded_file($_FILES['functions_photo']['tmp_name'],$img_dir.$newImgName);
            }
            foreach($_FILES['functions_file']['name'] as $key => $val):
                if(!empty($_FILES['functions_file']['name'][$key])) {
                    $path_parts 	= pathinfo($val);
                    $extension 		= strtolower($path_parts['extension']);
                    $newImgName     = to_seo_url(cleanvars($_POST['functions_title'])).'-'.($latest_id+$key).'-'.uniqid().".".($extension);
                    move_uploaded_file($_FILES['functions_file']['tmp_name'][$key],$img_dir.$newImgName);
                    array_push($files_name_array,$newImgName);
                    $files_name_comma_sep = implode(',',$files_name_array);
                }
            endforeach;
            if (!empty($files_name_comma_sep)) {
                $valueUpdate  = array ( 'functions_file' => $files_name_comma_sep ); 
                $sqllmsupload = $dblms->Update(FUNCTIONS,$valueUpdate,"WHERE functions_id = '".$latest_id."'");
            }
                
            

            $_SESSION['msg']['status'] = 'toastr.success("Updated Succesfully");';
            header("Location: functions.php", true, 301);
            exit();
        } else {
            $_SESSION['msg']['status'] = 'toastr.error("Not updated Succesfully");';
            header("Location: functions.php", true, 301);
            exit();
        }
    }
}

if (isset($_POST['functions_delete'])) {

    $query = $dblms->querylms("UPDATE ".FUNCTIONS." SET
                                    is_deleted = '1'                            , 
                                    ip_deleted = '".$_SESSION['LOGINID_DT']."'  , 
                                    date_deleted = NOW()
                                    WHERE functions_id='".$_POST['functions_id']."'
                                ");
                                    
    if ($query) {

        $valueUpdate  = array (
                                      'functions_file' => $files_name_comma_sep 
                                    , 'functions_file' => $files_name_comma_sep 
                                ); 
        $sqllmsupload = $dblms->Update(FUNCTIONS,$valueUpdate,"WHERE functions_id = '".$latest_id."'");
        
        $_SESSION['msg']['status'] = 'toastr.info("Deleted Succesfully");';       
        header("Location: functions.php", true, 301);
        exit;

    }

}
?>