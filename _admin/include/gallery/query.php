<?php
if(isset($_POST['submit_gallery'])) { 
//------------------------------------------------
    $sqllms  = $dblms->querylms("INSERT INTO ".GALLERY."(
                                                    gallery_status                   ,
                                                    gallery_title                    ,
                                                    gallery_href                     ,
                                                    id_added                         ,
                                                    date_added                      
                                                    )
                                                VALUES(
                                                    '".cleanvars($_POST['gallery_status'])."'	                  ,
                                                    '".cleanvars($_POST['gallery_title'])."'		              ,
                                                    '".cleanvars(to_seo_url($_POST['gallery_title']))."'      ,
                                                    '".cleanvars($_SESSION['LOGINID_DT'])."'                      ,
                                                    NOW()   
                                                    )"
                        );
    if($sqllms) { 
        //--------------------------------------
            $latest_id = $dblms->lastestid();
        //--------------------------------------
        if(!empty($_FILES['gallery_photo']['name'])) {
            //--------------------------------------
                $path_parts 	= pathinfo($_FILES["gallery_photo"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	= '../images/gallery/';
            //--------------------------------------
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['gallery_title'])).'_'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['gallery_title'])).'_'.$latest_id.".".($extension);
            //--------------------------------------
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
            //--------------------------------------
                    $sqllmsupload  = $dblms->querylms("UPDATE ".GALLERY."
                                                                    SET gallery_photo = '".$img_fileName."'
                                                                WHERE  gallery_id   = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
            //--------------------------------------
                    move_uploaded_file($_FILES['gallery_photo']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
            //--------------------------------------
                }
            //--------------------------------------
        }
        //-----------------------end---------------

        $_SESSION['msg']['status'] = 'toastr.success("Inserted Succesfully");';
        header("Location: gallery.php", true, 301);
		exit();
        
    }

}

if(isset($_POST['edit_gallery'])) { 
    //------------------------------------------------
    $sqllms  = $dblms->querylms("UPDATE ".GALLERY."
                                                SET
                                                      gallery_status     = '".cleanvars($_POST['gallery_status'])."'
                                                    , gallery_title      = '".cleanvars($_POST['gallery_title'])."'
                                                    , gallery_href       = '".cleanvars(to_seo_url($_POST['gallery_title']))."'
                                                    , id_modified        = '".cleanvars($_SESSION['LOGINID_DT'])."'
                                                    , date_modified      = NOW()
                                                WHERE  gallery_id        = '".cleanvars($_POST['gallery_id'])."'
                        ");
    if($sqllms) { 
    //--------------------------------------
        $latest_id = cleanvars($_POST['gallery_id']);
    //--------------------------------------
    if(!empty($_FILES['gallery_photo']['name'])) {
        //--------------------------------------
            $path_parts 	= pathinfo($_FILES["gallery_photo"]["name"]);
            $extension 		= strtolower($path_parts['extension']);
            $img_dir 	= '../images/gallery/';
        //--------------------------------------
            $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['gallery_title'])).'_'.$latest_id.".".($extension);
            $img_fileName	= to_seo_url(cleanvars($_POST['gallery_title'])).'_'.$latest_id.".".($extension);
        //--------------------------------------
            if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
        //--------------------------------------
                $sqllmsupload  = $dblms->querylms("UPDATE ".GALLERY."
                                                                SET gallery_photo = '".$img_fileName."'
                                                            WHERE  gallery_id   = '".cleanvars($latest_id)."'");
                unset($sqllmsupload);
                $mode = '0644'; 
        //--------------------------------------
                move_uploaded_file($_FILES['gallery_photo']['tmp_name'],$originalImage);
                chmod ($originalImage, octdec($mode));
        //--------------------------------------
            }
        //--------------------------------------
    }
    //-----------------------end---------------

        $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
        header("Location: gallery.php", true, 301);
		exit();

    }

}

if (isset($_POST['gallery_delete'])) {

    $query = $dblms->querylms("UPDATE ".GALLERY." SET
                                    is_deleted = '1'                            , 
                                    deleted_id = '".$_SESSION['LOGINID_DT']."'  , 
                                    date_deleted = NOW()
                                    WHERE gallery_id='".$_POST['gallery_id']."'
                                ");
    
    if ($query) {
        
        $_SESSION['msg']['status'] = 'toastr.info("Delete Succesfully");';

        header("Location: gallery.php", true, 301);

    }

}