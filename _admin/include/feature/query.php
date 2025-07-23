<?php

if(isset($_POST['edit_f'])) { 
    //------------------------------------------------
    $sqllms  = $dblms->querylms("UPDATE ".FEATURE."
                                                SET
                                                      f_title       = '".cleanvars($_POST['f_title'])."'
                                                    , f_des         = '".cleanvars($_POST['f_detail'])."'
                                                    , f_update_id   = '".cleanvars($_SESSION['LOGINID_DT'])."'
                                                    , f_update_date = NOW()
                                                WHERE  f_id          = '".cleanvars($_POST['f_id'])."'
                        ");
    if($sqllms) { 

        $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
        header("Location: feature.php", true, 301);
		exit();

    }

}