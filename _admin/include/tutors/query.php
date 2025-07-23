<?php
    // ADD TUTOR
    if(isset($_POST['submit_tutor'])) { 

        $values     = array (
                                'tutor_status'	    =>	cleanvars($_POST['tutor_status'])
                                , 'tutor_name'	        =>	cleanvars($_POST['tutor_name'])
                                , 'tutor_degree'		=>	cleanvars($_POST['tutor_degree'])
                                , 'tutor_designation'	=>	cleanvars($_POST['tutor_designation'])					
                                , 'tutor_fb'		    =>	cleanvars($_POST['tutor_fb'])					
                                , 'tutor_twitter'		=>	cleanvars($_POST['tutor_twitter'])					
                                , 'tutor_linkedin'		=>	cleanvars($_POST['tutor_linkedin'])					
                                , 'tutor_insta'		    =>	cleanvars($_POST['tutor_insta'])					
                                , 'tutor_email'		    =>	cleanvars($_POST['tutor_email'])					
                                , 'tutor_phone'		    =>	cleanvars($_POST['tutor_phone'])					
                                , 'tutor_skype'		    =>	cleanvars($_POST['tutor_skype'])					
                                , 'tutor_description'	=>	cleanvars($_POST['tutor_description'])					
                                , 'id_added'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
                                , 'date_added'		    =>	date('Y-m-d H:i:s')
                            );   
        $sqllms 	= 	$dblms->insert(TUTORS , $values);
        
        if($sqllms) { 
            $latest_id	=	$dblms->lastestid();
        
            if(!empty($_FILES['tutor_img']['name'])) {
                    $path_parts 	= pathinfo($_FILES["tutor_img"]["name"]);
                    $extension 		= strtolower($path_parts['extension']);
                    $img_dir 	    = '../images/tutors/';
                    $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['tutor_name'])).'-'.$latest_id.".".($extension);
                    $img_fileName	= to_seo_url(cleanvars($_POST['tutor_name'])).'-'.$latest_id.".".($extension);
                    if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
                        $valueUpdate  = array (
                                                'tutor_img'    =>  cleanvars($img_fileName)
                                            ); 
                        $sqllmsupload = $dblms->Update(TUTORS , $valueUpdate , "WHERE tutor_id  = '".cleanvars($latest_id)."'");
                        unset($sqllmsupload);
                        $mode = '0644'; 
                        move_uploaded_file($_FILES['tutor_img']['tmp_name'],$originalImage);
                        chmod ($originalImage, octdec($mode));
                    }
            }

            $_SESSION['msg']['status'] = 'toastr.success("Inserted Succesfully");';
            header("Location: tutors.php", true, 301);
            exit();
            
        }

    }
    // EDIT TUTOR
    if(isset($_POST['edit_tutor'])) { 

        $values     = array (
                                'tutor_status'	    =>	cleanvars($_POST['tutor_status'])
                                , 'tutor_name'	        =>	cleanvars($_POST['tutor_name'])
                                , 'tutor_degree'		=>	cleanvars($_POST['tutor_degree'])
                                , 'tutor_designation'	=>	cleanvars($_POST['tutor_designation'])					
                                , 'tutor_fb'		    =>	cleanvars($_POST['tutor_fb'])					
                                , 'tutor_twitter'		=>	cleanvars($_POST['tutor_twitter'])					
                                , 'tutor_linkedin'		=>	cleanvars($_POST['tutor_linkedin'])					
                                , 'tutor_insta'		    =>	cleanvars($_POST['tutor_insta'])				
                                , 'tutor_email'		    =>	cleanvars($_POST['tutor_email'])					
                                , 'tutor_phone'		    =>	cleanvars($_POST['tutor_phone'])					
                                , 'tutor_skype'		    =>	cleanvars($_POST['tutor_skype'])					
                                , 'tutor_description'	=>	cleanvars($_POST['tutor_description'])						
                                , 'id_modified'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
                                , 'date_modified'		    =>	date('Y-m-d H:i:s')
                            );   
        $sqllms = $dblms->Update(TUTORS , $values , "WHERE tutor_id  = '".cleanvars($_POST['tutor_id'])."'");
        
        if($sqllms) { 
            $latest_id = cleanvars($_POST['tutor_id']);

            if(!empty($_FILES['tutor_img']['name'])) {
                $path_parts 	= pathinfo($_FILES["tutor_img"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	    = '../images/tutors/';
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['tutor_name'])).'-'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['tutor_name'])).'-'.$latest_id.".".($extension);
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
                    $valueUpdate  = array (
                                            'tutor_img'    =>  cleanvars($img_fileName)
                                        ); 
                    $sqllmsupload = $dblms->Update(TUTORS , $valueUpdate , "WHERE tutor_id  = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
                    move_uploaded_file($_FILES['tutor_img']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
                }
            }
            
            $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
            header("Location: tutors.php", true, 301);
            exit();
        }

    }

    if (isset($_POST['tutor_delete'])) {

        $query = $dblms->querylms("UPDATE ".TUTORS." SET
                                        is_deleted = '1'                            , 
                                        deleted_id = '".$_SESSION['LOGINID_DT']."'  , 
                                        date_deleted = NOW()
                                        WHERE tutor_id='".$_POST['tutor_id']."'
                                    ");
                                        
        if ($query) {
            
            $_SESSION['msg']['status'] = 'toastr.info("Delete Succesfully");';
            
            header("Location: tutors.php", true, 301);
    
        }
    
    }