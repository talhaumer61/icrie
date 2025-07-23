<?php
if(isset($_POST['submit_mou'])) { 
//------------------------------------------------
    $date = date("Y-m-d", strtotime($_POST['mou_date']));
//------------------------------------------------
    $sqllms  = $dblms->querylms("INSERT INTO ".MOUS."(
                                                    mou_status                   ,
                                                    mou_title                    ,
                                                    mou_href                     ,
                                                    mou_org                      ,
                                                    mou_date                     ,
                                                    mou_detail                   ,
                                                    id_added                     ,
                                                    date_added                      
                                                    )
                                                VALUES(
                                                    '".cleanvars($_POST['mou_status'])."'	                ,
                                                    '".cleanvars($_POST['mou_title'])."'		            ,
                                                    '".cleanvars(generateSeoURL($_POST['mou_title']))."'	,
                                                    '".cleanvars($_POST['mou_org'])."'  		            ,
                                                    '".cleanvars($date)."'		                            ,
                                                    '".cleanvars($_POST['mou_detail'])."'		            ,
                                                    '".cleanvars($_SESSION['LOGINID_DT'])."'	            ,
                                                    NOW()   
                                                    )"
                        );
    if($sqllms) { 
        //--------------------------------------
            $latest_id = $dblms->lastestid();
        //--------------------------------------
        if(!empty($_FILES['mou_photo']['name'])) {
            //--------------------------------------
                $path_parts 	= pathinfo($_FILES["mou_photo"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	= '../images/mous/';
            //--------------------------------------
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['mou_title'])).'_'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['mou_title'])).'_'.$latest_id.".".($extension);
            //--------------------------------------
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
            //--------------------------------------
                    $sqllmsupload  = $dblms->querylms("UPDATE ".MOUS."
                                                                    SET mou_photo = '".$img_fileName."'
                                                                 WHERE  mou_id	  = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
            //--------------------------------------
                    move_uploaded_file($_FILES['mou_photo']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
            //--------------------------------------
                }
            //--------------------------------------
        }
        //-----------------------end---------------

        $_SESSION['msg']['status'] = 'toastr.success("Inserted Succesfully");';
        header("Location: mous.php", true, 301);
		exit();
        
    }

}

if(isset($_POST['edit_mou'])) { 
    //------------------------------------------------
    $date = date("Y-m-d", strtotime($_POST['mou_date']));
    //------------------------------------------------
    $sqllms  = $dblms->querylms("UPDATE ".MOUS."
                                                SET
                                                      mou_status           = '".cleanvars($_POST['mou_status'])."'
                                                    , mou_title            = '".cleanvars($_POST['mou_title'])."'
                                                    , mou_org              = '".cleanvars($_POST['mou_org'])."'
                                                    , mou_date             = '".cleanvars($date)."'
                                                    , mou_href             = '".cleanvars(generateSeoURL($_POST['mou_title']))."'
                                                    , mou_detail           = '".cleanvars($_POST['mou_detail'])."'
                                                    , id_modified          = '".cleanvars($_SESSION['LOGINID_DT'])."'
                                                    , date_modified        = NOW()
                                                WHERE  mou_id              = '".cleanvars($_POST['mou_id'])."'"
                        );
    if($sqllms) { 
    //--------------------------------------
        $latest_id = cleanvars($_POST['mou_id']);
    //--------------------------------------
        if(!empty($_FILES['mou_photo']['name'])) {
            //--------------------------------------
                $path_parts 	= pathinfo($_FILES["mou_photo"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	= '../images/mous/';
            //--------------------------------------
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['mou_title'])).'_'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['mou_title'])).'_'.$latest_id.".".($extension);
            //--------------------------------------
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
            //--------------------------------------
                    $sqllmsupload  = $dblms->querylms("UPDATE ".MOUS."
                                                                    SET mou_photo = '".$img_fileName."'
                                                                 WHERE  mou_id	  = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
            //--------------------------------------
                    move_uploaded_file($_FILES['mou_photo']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
            //--------------------------------------
                }
            //--------------------------------------
        }
    //-----------------------end---------------

        $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
        header("Location: mous.php", true, 301);
		exit();

    }

}