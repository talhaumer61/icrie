<?php

if(isset($_POST['edit_info'])) { 
    //------------------------------------------------
    $qns = $_POST['qns'];
    $sqllms  = $dblms->querylms("SELECT qns FROM erxample WHERE qns = $qns ");


    $sqllms  = $dblms->querylms("SELECT qns FROM erxample WHERE qns = $qns AND id != $id ");




    $sqllms  = $dblms->querylms("UPDATE ".INFO."
                                                SET
                                                      info_phone     = '".cleanvars($_POST['info_phone'])."'
                                                    , info_mail_1      = '".cleanvars($_POST['info_mail_1'])."'
                                                    , info_mail_2       = '".cleanvars($_POST['info_mail_2'])."'
                                                    , info_web       = '".cleanvars($_POST['info_web'])."'
                                                    , info_location       = '".cleanvars($_POST['info_location'])."'
                                                WHERE  info_id        = '".cleanvars($_POST['info_id'])."'
                        ");
    if($sqllms) { 


        $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
        header("Location: info.php", true, 301);
		exit();

    }

}