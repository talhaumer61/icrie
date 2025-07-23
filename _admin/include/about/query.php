<?php

if(isset($_POST['edit_about'])) { 
    $sqllms  = $dblms->querylms("UPDATE ".ABOUT."
                                                SET
                                                      about_title       = '".cleanvars($_POST['about_title'])."'
                                                    , about_des         = '".cleanvars($_POST['about_detail'])."'
                                                    , about_update_id   = '".cleanvars($_SESSION['LOGINID_DT'])."'
                                                    , about_update_date = NOW()
                                                WHERE  about_id          = '".cleanvars($_POST['about_id'])."'
                        ");
    if($sqllms) { 
            $latest_id = $_POST['about_id'];
        if(!empty($_FILES['about_img']['name'])) {
                $path_parts 	= pathinfo($_FILES["about_img"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	    = '../images/about/';
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['about_title'])).'_'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['about_title'])).'_'.$latest_id.".".($extension);
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
                    $sqllmsupload  = $dblms->querylms("UPDATE ".ABOUT."
                                                                    SET about_img = '".$img_fileName."'
                                                                WHERE  about_id   = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
                    move_uploaded_file($_FILES['about_img']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
                }
        }

        $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
        header("Location: about.php", true, 301);
		exit();

    }

}