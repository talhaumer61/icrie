<?php
if(isset($_POST['submit_blog'])) { 
//------------------------------------------------
    $date = date("Y-m-d", strtotime($_POST['blog_date']));
//------------------------------------------------
    $sqllms  = $dblms->querylms("INSERT INTO ".BLOGS."(
                                                    blog_status                   ,
                                                    blog_title                    ,
                                                    blog_href                     ,
                                                    blog_date                     ,
                                                    blog_brief_detail             ,
                                                    blog_detail                   ,
                                                    id_added                      ,
                                                    date_added                      
                                                    )
                                                VALUES(
                                                    '".cleanvars($_POST['blog_status'])."'	                ,
                                                    '".cleanvars($_POST['blog_title'])."'		            ,
                                                    '".cleanvars($_POST['blog_title'])."'	,
                                                    '".cleanvars($date)."'		                            ,
                                                    '".cleanvars($_POST['blog_brief_detail'])."'		    ,
                                                    '".cleanvars($_POST['blog_detail'])."'		            ,
                                                    '".cleanvars($_SESSION['LOGINID_DT'])."'	            ,
                                                    NOW()   
                                                    )"
                        );
    if($sqllms) { 
        //--------------------------------------
            $latest_id = $dblms->lastestid();
        //--------------------------------------
        if(!empty($_FILES['blog_photo']['name'])) {
            //--------------------------------------
                $path_parts 	= pathinfo($_FILES["blog_photo"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	= '../images/news_events/';
            //--------------------------------------
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['blog_title'])).'_'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['blog_title'])).'_'.$latest_id.".".($extension);
            //--------------------------------------
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
            //--------------------------------------
                    $sqllmsupload  = $dblms->querylms("UPDATE ".BLOGS."
                                                                    SET blog_photo = '".$img_fileName."'
                                                                WHERE  blog_id	  = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
            //--------------------------------------
                    move_uploaded_file($_FILES['blog_photo']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
            //--------------------------------------
                }
            //--------------------------------------
        }
        //-----------------------end---------------

        $_SESSION['msg']['status'] = 'toastr.success("Inserted Succesfully");';
        header("Location: blogs.php", true, 301);
		exit();
        
    }

}

if(isset($_POST['edit_blog'])) { 
    echo "running";
    echo $_POST['blog_status'];
    //------------------------------------------------
    $date = date("Y-m-d", strtotime($_POST['blog_date']));
    //------------------------------------------------
    $sqllms  = $dblms->querylms("UPDATE ".BLOGS."
                                                SET
                                                      blog_status                       = '".cleanvars($_POST['blog_status'])."'
                                                    , blog_title                        = '".cleanvars($_POST['blog_title'])."'
                                                    , blog_date                         = '".cleanvars($date)."'
                                                    , blog_href                         = '".cleanvars($_POST['blog_title'])."'
                                                    , blog_brief_detail                 = '".cleanvars($_POST['blog_brief_detail'])."'
                                                    , blog_detail                       = '".cleanvars($_POST['blog_detail'])."'
                                                    , id_modified                       = '".cleanvars($_SESSION['LOGINID_DT'])."'
                                                    , date_modified                     = NOW()
                                                WHERE  blog_id	                        = '".cleanvars($_POST['blog_id'])."'"
                        );
    if($sqllms) { 
    //--------------------------------------
        $latest_id = cleanvars($_POST['blog_id']);
    //--------------------------------------
    if(!empty($_FILES['blog_photo']['name'])) {
        //--------------------------------------
            $path_parts 	= pathinfo($_FILES["blog_photo"]["name"]);
            $extension 		= strtolower($path_parts['extension']);
            $img_dir 	= '../images/news_events/';
        //--------------------------------------
            $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['blog_title'])).'_'.$latest_id.".".($extension);
            $img_fileName	= to_seo_url(cleanvars($_POST['blog_title'])).'_'.$latest_id.".".($extension);
        //--------------------------------------
            if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
        //--------------------------------------
                $sqllmsupload  = $dblms->querylms("UPDATE ".BLOGS."
                                                                SET blog_photo = '".$img_fileName."'
                                                            WHERE  blog_id	  = '".cleanvars($latest_id)."'");
                unset($sqllmsupload);
                $mode = '0644'; 
        //--------------------------------------
                move_uploaded_file($_FILES['blog_photo']['tmp_name'],$originalImage);
                chmod ($originalImage, octdec($mode));
        //--------------------------------------
            }
        //--------------------------------------
    }
        //-----------------------end---------------

        $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
        header("Location: blogs.php", true, 301);
		exit();

    }

}

if (isset($_POST['blog_delete'])) {

    $query = $dblms->querylms("UPDATE ".BLOGS." SET
                                    is_deleted = '1'                            , 
                                    deleted_id = '".$_SESSION['LOGINID_DT']."'  , 
                                    date_deleted = NOW()
                                    WHERE blog_id='".$_POST['blog_id']."'
                                ");
    
    if ($query) {
        
        $_SESSION['msg']['status'] = 'toastr.info("Delete Succesfully");';
        
        header("Location: blogs.php", true, 301);

    }

}