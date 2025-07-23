<?php
if(isset($_POST['submit_course'])) { 
    //-------------------------------------------------
    $sqllms  = $dblms->querylms("INSERT INTO ".COURSE."(
                                                    course_status                   ,
                                                    course_title                    ,
                                                    course_catagory                 ,
                                                    course_description              ,
                                                    course_add_id                   ,
                                                    course_add_date                             
                                                    )
                                                VALUES(
                                                    '".cleanvars($_POST['course_status'])."'	            ,
                                                    '".cleanvars($_POST['course_title'])."'		            ,
                                                    '".cleanvars($_POST['course_catagory'])."'		            ,
                                                    '".cleanvars($_POST['course_description'])."'	        ,
                                                    '".cleanvars($_SESSION['LOGINID_DT'])."'	            ,
                                                    NOW()   
                                                    )"
                        );
    //------------------------------------------------
    if($sqllms) { 
        //--------------------------------------
            $latest_id = $dblms->lastestid();
        //--------------------------------------
        if(!empty($_FILES['course_photo']['name'])) {
            //--------------------------------------
                $path_parts 	= pathinfo($_FILES["course_photo"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	= '../images/course/';
            //--------------------------------------
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['course_title'])).'_'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['course_title'])).'_'.$latest_id.".".($extension);
            //--------------------------------------
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF' , 'WEBP' , 'webp'))) {
            //--------------------------------------
                    $sqllmsupload  = $dblms->querylms("UPDATE ".COURSE."
                                                                    SET course_photo = '".$img_fileName."'
                                                                WHERE  course_id	  = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
            //--------------------------------------
                    move_uploaded_file($_FILES['course_photo']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
            //--------------------------------------
                }
            //--------------------------------------
        }
        //-----------------------end---------------

        $_SESSION['msg']['status'] = 'toastr.success("Inserted Succesfully");';
        header("Location: courses.php", true, 301);
		exit();
        
    }

}

if(isset($_POST['edit_course'])) { 
    echo "running";
    echo $_POST['course_status'];
    $sqllms  = $dblms->querylms("UPDATE ".COURSE."
                                                SET
                                                      course_status                       = '".cleanvars($_POST['course_status'])."'
                                                    , course_title                        = '".cleanvars($_POST['course_title'])."'
                                                    , course_catagory                     = '".cleanvars($_POST['course_catagory'])."'
                                                    , course_description                  = '".cleanvars($_POST['course_detail'])."'
                                                    , course_update_id                    = '".cleanvars($_SESSION['LOGINID_DT'])."'
                                                    , course_update_date                  = NOW()
                                                WHERE  course_id	                        = '".cleanvars($_POST['course_id'])."'"
                        );
    if($sqllms) { 
    //--------------------------------------
        $latest_id = cleanvars($_POST['course_id']);
    //--------------------------------------
    if(!empty($_FILES['course_photo']['name'])) {
        //--------------------------------------
            $path_parts 	= pathinfo($_FILES["course_photo"]["name"]);
            $extension 		= strtolower($path_parts['extension']);
            $img_dir 	= '../images/course/';
        //--------------------------------------
            $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['course_title'])).'_'.$latest_id.".".($extension);
            $img_fileName	= to_seo_url(cleanvars($_POST['course_title'])).'_'.$latest_id.".".($extension);
        //--------------------------------------
            if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF' , 'webp' , 'WEBP'))) {
        //--------------------------------------
                $sqllmsupload  = $dblms->querylms("UPDATE ".COURSE."
                                                                SET course_photo = '".$img_fileName."'
                                                            WHERE  course_id	  = '".cleanvars($latest_id)."'");
                unset($sqllmsupload);
                $mode = '0644'; 
        //--------------------------------------
                move_uploaded_file($_FILES['course_photo']['tmp_name'],$originalImage);
                chmod ($originalImage, octdec($mode));
        //--------------------------------------
            }
        //--------------------------------------
    }
        //-----------------------end---------------

        $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
        header("Location: courses.php", true, 301);
		exit();

    }

}

if (isset($_POST['course_delete'])) {

    $query = $dblms->querylms("UPDATE ".COURSE." SET
                                    is_deleted = '1'                            , 
                                    deleted_id = '".$_SESSION['LOGINID_DT']."'  , 
                                    date_deleted = NOW()
                                    WHERE course_id='".$_POST['course_id']."'
                                ");
    
    if ($query) {
        
        $_SESSION['msg']['status'] = 'toastr.info("Delete Succesfully");';

        header("Location: courses.php", true, 301);

    }

}