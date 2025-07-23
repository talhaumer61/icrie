<?php
// ADD SLIDER
if(isset($_POST['submit_slider'])) { 

    $values     = array (
                            'slider_status'	    =>	cleanvars($_POST['slider_status'])
                            , 'slider_title'	    =>	cleanvars($_POST['slider_title'])
                            , 'slider_btn_href'		=>	cleanvars($_POST['slider_btn_href'])
                            , 'slider_btn_text'		=>	cleanvars($_POST['slider_btn_text'])					
                            , 'id_added'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
                            , 'date_added'		    =>	date('Y-m-d H:i:s')
                        );   
    $sqllms 	= 	$dblms->insert(SLIDER , $values);
    $latest_id	=	$dblms->lastestid();
    if($sqllms) { 
        
        $latest_id = $dblms->lastestid();

        if(!empty($_FILES['slider_img']['name'])) {
            $path_parts 	= pathinfo($_FILES["slider_img"]["name"]);
            $extension 		= strtolower($path_parts['extension']);
            $img_dir 	    = '../images/slider/';
            $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['slider_title'])).'_'.$latest_id.".".($extension);
            $img_fileName	= to_seo_url(cleanvars($_POST['slider_title'])).'_'.$latest_id.".".($extension);
            if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF' , 'WEBP' , 'webp'))) {
                $valueUpdate = array (
                                        'slider_img'    =>  cleanvars($img_fileName)
                                    ); 
                $sqllmsupload = $dblms->Update(SLIDER , $valueUpdate , "WHERE slider_id  = '".cleanvars($latest_id)."'");
                unset($sqllmsupload);
                $mode = '0644'; 
                move_uploaded_file($_FILES['slider_img']['tmp_name'],$originalImage);
                chmod ($originalImage, octdec($mode));
            }
        }
        $_SESSION['msg']['status'] = 'toastr.success("Inserted Succesfully");';
        header("Location: slider.php", true, 301);
		exit();
    }
}
// EDIT SLIDER
if(isset($_POST['edit_slider'])) { 
    $values     = array (
                              'slider_status'	    =>	cleanvars($_POST['slider_status'])
                            , 'slider_title'	    =>	cleanvars($_POST['slider_title'])
                            , 'slider_btn_href'		=>	cleanvars($_POST['slider_btn_href'])
                            , 'slider_btn_text'		=>	cleanvars($_POST['slider_btn_text'])					
                            , 'id_modified'		    => 	cleanvars($_SESSION['LOGINID_DT']) 
                            , 'date_modified'		    =>	date('Y-m-d H:i:s')
                        );
    $sqllms = $dblms->Update(SLIDER , $values , "WHERE slider_id  = '".cleanvars($_POST['slider_id'])."'");
    if($sqllms) { 

        $latest_id = cleanvars($_POST['slider_id']);

        if(!empty($_FILES['slider_img']['name'])) {
            $path_parts 	= pathinfo($_FILES["slider_img"]["name"]);
            $extension 		= strtolower($path_parts['extension']);
            $img_dir 	    = '../images/slider/';
            $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['slider_title'])).'_'.$latest_id.".".($extension);
            $img_fileName	= to_seo_url(cleanvars($_POST['slider_title'])).'_'.$latest_id.".".($extension);
            if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF' , 'WEBP' , 'webp'))) {
                $valueUpdate = array (
                                        'slider_img'    =>  cleanvars($img_fileName)
                                    ); 
                $sqllmsupload = $dblms->Update(SLIDER , $valueUpdate , "WHERE slider_id  = '".cleanvars($latest_id)."'");
                unset($sqllmsupload);
                $mode = '0644'; 
                move_uploaded_file($_FILES['slider_img']['tmp_name'],$originalImage);
                chmod ($originalImage, octdec($mode));
            }
        }
        $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
        header("Location: slider.php", true, 301);
		exit();
    }

}

if (isset($_POST['Slider_delete'])) {

    $query = $dblms->querylms("UPDATE ".SLIDER." SET
                                    is_deleted = '1'                            , 
                                    deleted_id = '".$_SESSION['LOGINID_DT']."'  , 
                                    date_deleted = NOW()
                                    WHERE slider_id='".$_POST['slider_id']."'
                                ");
    
    if ($query) {
        
        $_SESSION['msg']['status'] = 'toastr.info("Delete Succesfully");';

        header("Location: slider.php", true, 301);

    }

}