<?php
if(isset($_POST['submit_training'])) { 
//------------------------------------------------
    $date = date("Y-m-d", strtotime($_POST['training_date']));
//------------------------------------------------
    $sqllms  = $dblms->querylms("INSERT INTO ".TRAININGS."(
                                                    training_status                   ,
                                                    training_title                    ,
                                                    training_href                     ,
                                                    training_date                     ,
                                                    training_brief_detail             ,
                                                    training_detail	                  ,
                                                    id_added                          ,
                                                    date_added                      
                                                    )
                                                VALUES(
                                                    '".cleanvars($_POST['training_status'])."'	                ,
                                                    '".cleanvars($_POST['training_title'])."'		            ,
                                                    '".cleanvars(generateSeoURL($_POST['training_title']))."'	,
                                                    '".cleanvars($date)."'		                                ,
                                                    '".cleanvars($_POST['training_brief_detail'])."'		    ,
                                                    '".cleanvars($_POST['training_detail'])."'  		        ,
                                                    '".cleanvars($_SESSION['LOGINID_DT'])."'	                ,
                                                    NOW()   
                                                    )"
                        );
    if($sqllms) { 
        //--------------------------------------
            $latest_id = $dblms->lastestid();
        //--------------------------------------
        if(!empty($_FILES['training_photo']['name'])) {
            //--------------------------------------
                $path_parts 	= pathinfo($_FILES["training_photo"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	= '../images/training/';
            //--------------------------------------
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['training_title'])).'_'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['training_title'])).'_'.$latest_id.".".($extension);
            //--------------------------------------
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
            //--------------------------------------
                    $sqllmsupload  = $dblms->querylms("UPDATE ".TRAININGS."
                                                                    SET training_photo = '".$img_fileName."'
                                                                WHERE  training_id 	   = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
            //--------------------------------------
                    move_uploaded_file($_FILES['training_photo']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
            //--------------------------------------
                }
            //--------------------------------------
        }
        //-----------------------end---------------

        $_SESSION['msg']['status'] = 'toastr.success("Inserted Succesfully");';
        header("Location: trainings.php", true, 301);
		exit();
        
    }

}

if(isset($_POST['edit_training'])) { 
    //------------------------------------------------
    $date = date("Y-m-d", strtotime($_POST['training_date']));
    //------------------------------------------------
    $sqllms  = $dblms->querylms("UPDATE ".TRAININGS."
                                                SET
                                                      training_status                       = '".cleanvars($_POST['training_status'])."'
                                                    , training_title                        = '".cleanvars($_POST['training_title'])."'
                                                    , training_date                         = '".cleanvars($date)."'
                                                    , training_href                         = '".cleanvars(generateSeoURL($_POST['training_title']))."'
                                                    , training_brief_detail                 = '".cleanvars($_POST['training_brief_detail'])."'
                                                    , training_detail	                    = '".cleanvars($_POST['training_detail'])."'
                                                    , id_modified                           = '".cleanvars($_SESSION['LOGINID_DT'])."'
                                                    , date_modified                         = NOW()
                                                WHERE  training_id 	                        = '".cleanvars($_POST['training_id'])."'"
                        );
    if($sqllms) { 
    //--------------------------------------
        $latest_id = cleanvars($_POST['training_id']);
    //--------------------------------------
        if(!empty($_FILES['training_photo']['name'])) {
            //--------------------------------------
                $path_parts 	= pathinfo($_FILES["training_photo"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	= '../images/training/';
            //--------------------------------------
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['training_title'])).'_'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['training_title'])).'_'.$latest_id.".".($extension);
            //--------------------------------------
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
            //--------------------------------------
                    $sqllmsupload  = $dblms->querylms("UPDATE ".TRAININGS."
                                                                    SET training_photo = '".$img_fileName."'
                                                                WHERE  training_id 	   = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
            //--------------------------------------
                    move_uploaded_file($_FILES['training_photo']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
            //--------------------------------------
                }
            //--------------------------------------
        }
    //-----------------------end---------------

        $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
        header("Location: trainings.php", true, 301);
		exit();

    }

}