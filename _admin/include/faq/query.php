<?php
if(isset($_POST['submit_faq'])) { 

    $sqls = "SELECT faq_id 
             FROM ".FAQ." 
             WHERE faq_qns = '".$_POST['faq_qns']."' 
             AND id_deleted= 0 ";
    $result = $dblms->querylms($sqls);

    if (mysqli_num_rows($result)) {
        $_SESSION['msg']['status'] = 'toastr.error("Date already exist!");';
        header("Location: faq.php", true, 301);
        exit();
    }else{
        $sqllms  = $dblms->querylms("INSERT INTO ".FAQ."(
            faq_status                   ,
            faq_qns                      ,
            faq_ans                      ,
            id_added                     ,
            date_added                      
            )
        VALUES(
            '".cleanvars($_POST['faq_status'])."'	                ,
            '".cleanvars($_POST['faq_qns'])."'		               ,
            '".cleanvars($_POST['faq_ans'])."'	                   ,
            '".cleanvars($_SESSION['LOGINID_DT'])."'	            ,
            NOW()   
            )"
        );
        if($sqllms) { 
        $_SESSION['msg']['status'] = 'toastr.success("Inserted Succesfully");';
        header("Location: faq.php", true, 301);
        exit();
        }
    }

}

if(isset($_POST['edit_faq'])) { 
    
    $sqls = "SELECT faq_id 
             FROM ".FAQ." 
             WHERE faq_qns ='".$_POST['faq_qns']."' 
             AND faq_id != '".$_POST['faq_id']."' ";
    $result = $dblms->querylms($sqls);
    if (mysqli_num_rows($result)) {
        $_SESSION['msg']['status'] = 'toastr.error("Date already exist!");';
        header("Location: faq.php", true, 301);
        exit();
    }else{
        $sqllms  = $dblms->querylms("UPDATE ".FAQ."
                                                    SET
                                                        faq_status                          = '".cleanvars($_POST['faq_status'])."'
                                                        , faq_qns                           = '".cleanvars($_POST['faq_qns'])."'
                                                        , faq_ans                           = '".cleanvars($_POST['faq_ans'])."'
                                                        , id_modified                       = '".cleanvars($_SESSION['LOGINID_DT'])."'
                                                        , date_modified                     = NOW()
                                                    WHERE  faq_id	                        = '".cleanvars($_POST['faq_id'])."'"
                            );
        if($sqllms) { 
            $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
            header("Location: faq.php", true, 301);
            exit();
        }
    }

}

if (isset($_POST['faq_delete'])) {

    $query = $dblms->querylms("UPDATE ".FAQ." SET
                                    is_deleted = '1'                            , 
                                    id_deleted = '".$_SESSION['LOGINID_DT']."'  , 
                                    date_deleted = NOW()
                                    WHERE faq_id='".$_POST['faq_id']."'
                                ");
    if ($query) {
        $_SESSION['msg']['status'] = 'toastr.info("Delete Succesfully");';
        header("Location: faq.php", true, 301);
        exit();

    }

}
?>