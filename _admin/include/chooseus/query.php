<?php

if(isset($_POST['edit_chooseus'])) { 
    $values     = array (
                              'title'	        =>	cleanvars($_POST['title'])
                            , 'description'	    =>	cleanvars($_POST['description'])				
                            , 'id_modified'		=> 	cleanvars($_SESSION['LOGINID_DT']) 
                            , 'date_modified'	=>	date('Y-m-d H:i:s')
                        );   
    $sqllms 	= 	$dblms->Update(CHOOSEUS , $values , "WHERE id  = '".cleanvars($_POST['id'])."'");
    if($sqllms) { 
        $latest_id = $_POST['id'];
        if(!empty($_FILES['photo_1']['name'])) {
                $path_parts 	= pathinfo($_FILES["photo_1"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	    = '../images/choose_us/';
                $originalImage	= $img_dir."Chooseus_1.".($extension);
                $img_fileName	= "Chooseus_1.".($extension);
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
                    $valueUpdate = array (
                                            'photo_1'    =>  cleanvars($img_fileName)
                                         ); 
                    $sqllmsupload = $dblms->Update(CHOOSEUS , $valueUpdate , "WHERE id  = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
                    move_uploaded_file($_FILES['photo_1']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
                }
        }
        if(!empty($_FILES['photo_2']['name'])) {
                $path_parts 	= pathinfo($_FILES["photo_2"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	    = '../images/choose_us/';
                $originalImage	= $img_dir."Chooseus_2.".($extension);
                $img_fileName	= "Chooseus_2.".($extension);
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
                    $valueUpdate = array (
                                            'photo_2'    =>  cleanvars($img_fileName)
                                        ); 
                    $sqllmsupload = $dblms->Update(CHOOSEUS , $valueUpdate , "WHERE id  = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
                    move_uploaded_file($_FILES['photo_2']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
                }
        }
        if(!empty($_FILES['photo_3']['name'])) {
                $path_parts 	= pathinfo($_FILES["photo_3"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	    = '../images/choose_us/';
                $originalImage	= $img_dir."Chooseus_3.".($extension);
                $img_fileName	= "Chooseus_3.".($extension);
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
                    $valueUpdate = array (
                                            'photo_3'    =>  cleanvars($img_fileName)
                                        ); 
                    $sqllmsupload = $dblms->Update(CHOOSEUS , $valueUpdate , "WHERE id  = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
                    move_uploaded_file($_FILES['photo_3']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
                }
        }

        $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
        header("Location: chooseus.php", true, 301);
		exit();

    }

}