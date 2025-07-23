<?php
if(isset($_POST['submit_notice'])) { 
    //-------------------------------------------------
    $sqllms  = $dblms->querylms("INSERT INTO ".NOTICE."(
                                                    notice_status                   ,
                                                    notice_title                    ,
                                                    notice_description              ,
                                                    notice_add_id                   ,
                                                    notice_add_date                             
                                                    )
                                                VALUES(
                                                    '".cleanvars($_POST['notice_status'])."'	            ,
                                                    '".cleanvars($_POST['notice_title'])."'		            ,
                                                    '".cleanvars($_POST['notice_description'])."'	        ,
                                                    '".cleanvars($_SESSION['LOGINID_DT'])."'	            ,
                                                    NOW()   
                                                    )"
                        );
    //------------------------------------------------
    if($sqllms) { 

        $_SESSION['msg']['status'] = 'toastr.success("Inserted Succesfully");';
        header("Location: notice.php", true, 301);
		exit();
        
    }

}

if(isset($_POST['edit_notice'])) { 
    echo "running";
    echo $_POST['notice_status'];
    $sqllms  = $dblms->querylms("UPDATE ".NOTICE."
                                                SET
                                                      notice_status                       = '".cleanvars($_POST['notice_status'])."'
                                                    , notice_title                        = '".cleanvars($_POST['notice_title'])."'
                                                    , notice_description                  = '".cleanvars($_POST['notice_detail'])."'
                                                    , notice_update_id                    = '".cleanvars($_SESSION['LOGINID_DT'])."'
                                                    , notice_update_date                  = NOW()
                                                WHERE  notice_id	                        = '".cleanvars($_POST['notice_id'])."'"
                        );
    if($sqllms) { 

        $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
        header("Location: notice.php", true, 301);
		exit();

    }

}

if (isset($_POST['Notice_delete'])) {

    $query = $dblms->querylms("UPDATE ".NOTICE." SET
                                    is_deleted = '1'                            , 
                                    deleted_id = '".$_SESSION['LOGINID_DT']."'  , 
                                    date_deleted = NOW()
                                    WHERE notice_id='".$_POST['notice_id']."'
                                ");
    
    if ($query) {
        
        $_SESSION['msg']['status'] = 'toastr.info("Delete Succesfully");';
        
        header("Location: notice.php", true, 301);

    }

}