<?php
if(isset($_POST['submit_seminar'])) { 
//------------------------------------------------
    $date = date("Y-m-d", strtotime($_POST['seminar_date']));
//------------------------------------------------
    $sqllms  = $dblms->querylms("INSERT INTO ".SEMINARS."(
                                                    seminar_status                   ,
                                                    seminar_title                    ,
                                                    seminar_href                     ,
                                                    seminar_speakers                 ,
                                                    seminar_date                     ,
                                                    seminar_brief_detail             ,
                                                    seminar_detail                   ,
                                                    id_added                         ,
                                                    date_added                      
                                                    )
                                                VALUES(
                                                    '".cleanvars($_POST['seminar_status'])."'	                ,
                                                    '".cleanvars($_POST['seminar_title'])."'		            ,
                                                    '".cleanvars(generateSeoURL($_POST['seminar_title']))."'	,
                                                    '".cleanvars($_POST['seminar_speakers'])."'  		        ,
                                                    '".cleanvars($date)."'		                                ,
                                                    '".cleanvars($_POST['seminar_brief_detail'])."'		        ,
                                                    '".cleanvars($_POST['seminar_detail'])."'		            ,
                                                    '".cleanvars($_SESSION['LOGINID_DT'])."'	                ,
                                                    NOW()   
                                                    )"
                        );
    if($sqllms) { 
        //--------------------------------------
            $latest_id = $dblms->lastestid();
        //--------------------------------------
        if(!empty($_FILES['seminar_photo']['name'])) {
            //--------------------------------------
                $path_parts 	= pathinfo($_FILES["seminar_photo"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	= '../images/seminars/';
            //--------------------------------------
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['seminar_title'])).'_'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['seminar_title'])).'_'.$latest_id.".".($extension);
            //--------------------------------------
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
            //--------------------------------------
                    $sqllmsupload  = $dblms->querylms("UPDATE ".SEMINARS."
                                                                    SET seminar_photo = '".$img_fileName."'
                                                                 WHERE  seminar_id	  = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
            //--------------------------------------
                    move_uploaded_file($_FILES['seminar_photo']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
            //--------------------------------------
                }
            //--------------------------------------
        }
        //-----------------------end---------------

        $_SESSION['msg']['status'] = 'toastr.success("Inserted Succesfully");';
        header("Location: seminars.php", true, 301);
		exit();
        
    }

}

if(isset($_POST['edit_seminar'])) { 
    //------------------------------------------------
    $date = date("Y-m-d", strtotime($_POST['seminar_date']));
    //------------------------------------------------
    $sqllms  = $dblms->querylms("UPDATE ".SEMINARS."
                                                SET
                                                      seminar_status           = '".cleanvars($_POST['seminar_status'])."'
                                                    , seminar_title            = '".cleanvars($_POST['seminar_title'])."'
                                                    , seminar_speakers         = '".cleanvars($_POST['seminar_speakers'])."'
                                                    , seminar_date             = '".cleanvars($date)."'
                                                    , seminar_href             = '".cleanvars(generateSeoURL($_POST['seminar_title']))."'
                                                    , seminar_brief_detail     = '".cleanvars($_POST['seminar_brief_detail'])."'
                                                    , seminar_detail           = '".cleanvars($_POST['seminar_detail'])."'
                                                    , id_modified              = '".cleanvars($_SESSION['LOGINID_DT'])."'
                                                    , date_modified             = NOW()
                                                WHERE  seminar_id              = '".cleanvars($_POST['seminar_id'])."'"
                        );
    if($sqllms) { 
    //--------------------------------------
        $latest_id = cleanvars($_POST['seminar_id']);
    //--------------------------------------
        if(!empty($_FILES['seminar_photo']['name'])) {
            //--------------------------------------
                $path_parts 	= pathinfo($_FILES["seminar_photo"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	= '../images/seminars/';
            //--------------------------------------
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['seminar_title'])).'_'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['seminar_title'])).'_'.$latest_id.".".($extension);
            //--------------------------------------
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
            //--------------------------------------
                    $sqllmsupload  = $dblms->querylms("UPDATE ".SEMINARS."
                                                                    SET seminar_photo = '".$img_fileName."'
                                                                 WHERE  seminar_id	  = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
            //--------------------------------------
                    move_uploaded_file($_FILES['seminar_photo']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
            //--------------------------------------
                }
            //--------------------------------------
        }
    //-----------------------end---------------

        $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
        header("Location: seminars.php", true, 301);
		exit();

    }

}