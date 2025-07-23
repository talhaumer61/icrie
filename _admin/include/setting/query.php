<?php

if(isset($_POST['edit_setting'])) { 
    $sqllms  = $dblms->querylms("UPDATE ".SETTING."
                                                SET
                                                      setting_email         = '".cleanvars($_POST['setting_email'])."'
                                                    , setting_update_id     = '".cleanvars($_SESSION['LOGINID_DT'])."'
                                                    , setting_web_name      = '".cleanvars($_POST['setting_web_name'])."'
                                                    , setting_links         = '".cleanvars($_POST['setting_links'])."'
                                                    , setting_desc          = '".cleanvars($_POST['setting_desc'])."'
                                                    , setting_update_date = NOW()
                                                WHERE  setting_id          = '".cleanvars($_POST['setting_id'])."'
                        ");
    if($sqllms) { 
        $latest_id = $_POST['setting_id'];
        if(!empty($_FILES['setting_photo']['name'])) {
                $path_parts 	= pathinfo($_FILES["setting_photo"]["name"]);

                $extension 		= strtolower($path_parts['extension']);

                $img_dir 	    = '../images/logo/';

                $originalImage	= $img_dir."logo.".($extension);

                $img_fileName	= "logo.".($extension);

                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF','WEBP','webp'))) {
                    $sqllmsupload  = $dblms->querylms("UPDATE ".SETTING."
                                                                    SET setting_photo = '".$img_fileName."'
                                                                WHERE  setting_id   = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
                    move_uploaded_file($_FILES['setting_photo']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
                }
        }
        if(!empty($_FILES['setting_favicon']['name'])) {
                $path_parts 	= pathinfo($_FILES["setting_favicon"]["name"]);

                $extension 		= strtolower($path_parts['extension']);

                $img_dir 	    = '../images/logo/';

                $originalImage	= $img_dir."favicon.".($extension);

                $img_fileName	= "favicon.".($extension);

                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF','WEBP','webp', 'ico'))) {
                    $sqllmsupload  = $dblms->querylms("UPDATE ".SETTING."
                                                                    SET setting_favicon = '".$img_fileName."'
                                                                WHERE  setting_id   = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
                    move_uploaded_file($_FILES['setting_favicon']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
                }
        }

        $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
        header("Location: setting.php", true, 301);
		exit();

    }

}