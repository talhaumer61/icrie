<?php
if(isset($_POST['submit_grant'])) { 
    //------------------------------------------------
    if(!empty($_POST['open_date'])) {
        $open_date = date("Y-m-d", strtotime($_POST['open_date']));
    } else {
        $open_date = '0000-00-00';
    }
    //------------------------------------------------
    $sqllms  = $dblms->querylms("INSERT INTO ".GRANTS."(
                                                    grant_status                   ,
                                                    grant_title                    ,
                                                    grant_type                     ,
                                                    is_international               ,
                                                    grant_href                     ,
                                                    open_date                      ,
                                                    close_date                     ,
                                                    grant_faculty_dept             ,
                                                    grant_apply_link               ,
                                                    grant_brief_detail             ,
                                                    grant_detail                   ,
                                                    id_added                       ,
                                                    date_added                      
                                                    )
                                                VALUES(
                                                    '".cleanvars($_POST['grant_status'])."'	                ,
                                                    '".cleanvars($_POST['grant_title'])."'		            ,
                                                    '2'                                                     ,
                                                    '".cleanvars($_POST['is_international'])."'		        ,
                                                    '".cleanvars(to_seo_url($_POST['grant_title']))."'  	,
                                                    '".cleanvars($open_date)."'		                        ,
                                                    '".cleanvars($_POST['close_date'])."'	        	    ,
                                                    '".cleanvars($_POST['grant_faculty_dept'])."'    	    ,
                                                    '".cleanvars($_POST['grant_apply_link'])."'	    	    ,
                                                    '".cleanvars($_POST['grant_brief_detail'])."'		    ,
                                                    '".cleanvars($_POST['grant_detail'])."'		            ,
                                                    '".cleanvars($_SESSION['LOGINID_DT'])."'	            ,
                                                    NOW()   
                                                    )" );
    if($sqllms) { 
        //--------------------------------------
            $latest_id = $dblms->lastestid();
        //--------------------------------------
        if(!empty($_FILES['grant_photo']['name'])) {
            //--------------------------------------
                $path_parts 	= pathinfo($_FILES["grant_photo"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	= '../images/grants/nonrecurring_grants/';
            //--------------------------------------
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['grant_title'])).'_'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['grant_title'])).'_'.$latest_id.".".($extension);
            //--------------------------------------
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
            //--------------------------------------
                    $sqllmsupload  = $dblms->querylms("UPDATE ".GRANTS."
                                                                    SET grant_photo = '".$img_fileName."'
                                                                WHERE  grant_id 	  = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
            //--------------------------------------
                    move_uploaded_file($_FILES['grant_photo']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
            //--------------------------------------
                }
            //--------------------------------------
        }
        //-----------------------end---------------
        $_SESSION['msg']['status'] = 'toastr.success("Inserted Succesfully");';
        header("Location: grants_fundings.php", true, 301);
		exit();
    }

}

if(isset($_POST['edit_grant'])) { 
    
    //------------------------------------------------
    if(!empty($_POST['open_date'])) {
        $open_date = date("Y-m-d", strtotime($_POST['open_date']));
    } else {
        $open_date = '0000-00-00';
    }
    //------------------------------------------------
        // echo"<div style='margin-top: 100px';>  </div>";
    $sqllms  = $dblms->querylms("UPDATE ".GRANTS."
                                                SET
                                              grant_status                      = '".cleanvars($_POST['grant_status'])."'
                                            , grant_title                       = '".cleanvars($_POST['grant_title'])."'
                                            , is_international                  = '".cleanvars($_POST['is_international'])."'
                                            , open_date                         = '".cleanvars($open_date)."'
                                            , close_date                        = '".cleanvars($_POST['close_date'])."'
                                            , grant_faculty_dept                = '".cleanvars($_POST['grant_faculty_dept'])."'
                                            , grant_apply_link                  = '".cleanvars($_POST['grant_apply_link'])."'
                                            , grant_href                        = '".cleanvars(to_seo_url($_POST['grant_title']))."'
                                            , grant_brief_detail                = '".cleanvars($_POST['grant_brief_detail'])."'
                                            , grant_detail                      = '".cleanvars($_POST['grant_detail'])."'
                                            , id_modified                       = '".cleanvars($_SESSION['LOGINID_DT'])."'
                                            , date_modified                     = NOW()
                                       WHERE  grant_id 	                        = '".cleanvars($_POST['grant_id'])."'" );
    if($sqllms) { 
        //--------------------------------------
        $latest_id = cleanvars($_POST['grant_id']);
        //--------------------------------------
        if(!empty($_FILES['grant_photo']['name'])) {
            //--------------------------------------
                $path_parts 	= pathinfo($_FILES["grant_photo"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	= '../images/grants/nonrecurring_grants/';
            //--------------------------------------
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['grant_title'])).'_'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['grant_title'])).'_'.$latest_id.".".($extension);
            //--------------------------------------
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
            //--------------------------------------
                    $sqllmsupload  = $dblms->querylms("UPDATE ".GRANTS."
                                                                    SET grant_photo = '".$img_fileName."'
                                                                WHERE  grant_id 	  = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
            //--------------------------------------
                    move_uploaded_file($_FILES['grant_photo']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
            //--------------------------------------
                }
            //--------------------------------------
        }
            //-----------------------end---------------

            $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
            header("Location: grants_fundings.php", true, 301);
            exit();

    }

}