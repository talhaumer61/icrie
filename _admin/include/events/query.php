<?php
if(isset($_POST['submit_event'])) { 
//------------------------------------------------
    $date = date("Y-m-d", strtotime($_POST['event_date']));
//------------------------------------------------
    $sqllms  = $dblms->querylms("INSERT INTO ".EVENTS."(
                                                    event_status                   ,
                                                    event_title                    ,
                                                    event_time                    ,
                                                    event_place                    ,
                                                    event_href                     ,
                                                    event_type                     ,
                                                    event_date                     ,
                                                    event_brief_detail             ,
                                                    event_detail	               ,
                                                    id_added                       ,
                                                    date_added                      
                                                    )
                                                VALUES(
                                                    '".cleanvars($_POST['event_status'])."'	                ,
                                                    '".cleanvars($_POST['event_title'])."'		            ,
                                                    '".cleanvars($_POST['event_time'])."'		            ,
                                                    '".cleanvars($_POST['event_place'])."'		            ,
                                                    '".cleanvars(to_seo_url($_POST['event_title']))."'	    ,
                                                    '".cleanvars($_POST['event_type'])."'		            ,
                                                    '".cleanvars($date)."'		                            ,
                                                    '".cleanvars($_POST['event_brief_detail'])."'		    ,
                                                    '".cleanvars($_POST['event_detail'])."'  		        ,
                                                    '".cleanvars($_SESSION['LOGINID_DT'])."'	            ,
                                                    NOW()   
                                                    )"
                        );
    if($sqllms) { 
        //--------------------------------------
            $latest_id = $dblms->lastestid();
        //--------------------------------------
        if(!empty($_FILES['event_photo']['name'])) {
            //--------------------------------------
                $path_parts 	= pathinfo($_FILES["event_photo"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	= '../images/training/';
            //--------------------------------------
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['event_title'])).'_'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['event_title'])).'_'.$latest_id.".".($extension);
            //--------------------------------------
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
            //--------------------------------------
                    $sqllmsupload  = $dblms->querylms("UPDATE ".EVENTS."
                                                                    SET event_photo = '".$img_fileName."'
                                                                WHERE  event_id 	   = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
            //--------------------------------------
                    move_uploaded_file($_FILES['event_photo']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
            //--------------------------------------
                }
            //--------------------------------------
        }
        //-----------------------end---------------

        $_SESSION['msg']['status'] = 'toastr.success("Inserted Succesfully");';
        header("Location: events.php", true, 301);
		exit();
        
    }

}

if(isset($_POST['edit_event'])) { 
    //------------------------------------------------
    $date = date("Y-m-d", strtotime($_POST['event_date']));
    //------------------------------------------------
    $sqllms  = $dblms->querylms("UPDATE ".EVENTS."
                                                SET
                                                      event_status           = '".cleanvars($_POST['event_status'])."'
                                                    , event_title            = '".cleanvars($_POST['event_title'])."'
                                                    , event_time            = '".cleanvars($_POST['event_time'])."'
                                                    , event_place            = '".cleanvars($_POST['event_place'])."'
                                                    , event_href             = '".cleanvars(to_seo_url($_POST['event_title']))."'
                                                    , event_type             = '".cleanvars($_POST['event_type'])."'
                                                    , event_date             = '".cleanvars($date)."'
                                                    , event_brief_detail     = '".cleanvars($_POST['event_brief_detail'])."'
                                                    , event_detail	         = '".cleanvars($_POST['event_detail'])."'
                                                    , id_modified            = '".cleanvars($_SESSION['LOGINID_DT'])."'
                                                    , date_modified          = NOW()
                                                WHERE  event_id 	         = '".cleanvars($_POST['event_id'])."'"
                        );
    if($sqllms) { 
    //--------------------------------------
        $latest_id = cleanvars($_POST['event_id']);
    //--------------------------------------
        if(!empty($_FILES['event_photo']['name'])) {
            //--------------------------------------
                $path_parts 	= pathinfo($_FILES["event_photo"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	= '../images/training/';
            //--------------------------------------
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['event_title'])).'_'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['event_title'])).'_'.$latest_id.".".($extension);
            //--------------------------------------
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
            //--------------------------------------
                    $sqllmsupload  = $dblms->querylms("UPDATE ".EVENTS."
                                                                    SET event_photo = '".$img_fileName."'
                                                                WHERE  event_id 	   = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
            //--------------------------------------
                    move_uploaded_file($_FILES['event_photo']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
            //--------------------------------------
                }
            //--------------------------------------
        }
    //-----------------------end---------------

        $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
        header("Location: events.php", true, 301);
		exit();

    }

}

if (isset($_POST['event_delete'])) {

    $query = $dblms->querylms("UPDATE ".EVENTS." SET
                                    is_deleted = '1'                            , 
                                    deleted_id = '".$_SESSION['LOGINID_DT']."'  , 
                                    date_deleted = NOW()
                                    WHERE event_id='".$_POST['event_id']."'
                                ");
    
    if ($query) {
        
        $_SESSION['msg']['status'] = 'toastr.info("Delete Succesfully");';
        
        header("Location: events.php", true, 301);

    }

}