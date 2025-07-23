<?php
if(isset($_POST['submit_team'])) { 
    $team_priority          = intval($_POST['id_priority']);
    $team_updated_priority = ($team_priority + 1);
    $updated_priority      = ($team_priority + 1);
    $sqllms                 = $dblms->querylms('SELECT team_id FROM '.TEAMS.' WHERE id_priority > '.$team_priority.' ORDER BY id_priority DESC');
    while ($value_priority_team    = mysqli_fetch_array($sqllms)) {
        $updated_priority++;
        $dblms->querylms('UPDATE '.TEAMS.' SET id_priority = '.$updated_priority.' WHERE team_id = '.$value_priority_team['team_id'].'');
        echo 'UPDATE '.TEAMS.' SET id_priority = '.$updated_priority.' WHERE team_id = '.$value_priority_team['team_id'].'<br>';
    }
    $sqllms  = $dblms->querylms("INSERT INTO ".TEAMS."(
                                                    team_status                   ,
                                                    id_type                       ,
                                                    id_priority                   ,
                                                    team_name                     ,
                                                    team_degree                   ,
                                                    team_designation              ,
                                                    team_desc                     ,
                                                    id_added                      ,
                                                    date_added                      
                                                    )
                                                VALUES(
                                                    '".cleanvars($_POST['team_status'])."'	                ,
                                                    '".cleanvars($_POST['id_type'])."'	                    ,
                                                    '".cleanvars($team_updated_priority)."'	                ,
                                                    '".cleanvars($_POST['team_name'])."'		            ,
                                                    '".cleanvars($_POST['team_degree'])."'	                ,
                                                    '".cleanvars($_POST['team_designation'])."'	            ,
                                                    '".cleanvars($_POST['team_desc'])."'	                ,
                                                    '".cleanvars($_SESSION['LOGINID_DT'])."'	            ,
                                                    NOW()   
                                                    )"
                        );
    if($sqllms) { 
        //--------------------------------------
            $latest_id = $dblms->lastestid();
        //--------------------------------------
        if(!empty($_FILES['team_img']['name'])) {
            //--------------------------------------
                $path_parts 	= pathinfo($_FILES["team_img"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	= '../images/team/';
            //--------------------------------------
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['team_name'])).'_'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['team_name'])).'_'.$latest_id.".".($extension);
            //--------------------------------------
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
            //--------------------------------------
                    $sqllmsupload  = $dblms->querylms("UPDATE ".TEAMS."
                                                                    SET team_img = '".$img_fileName."'
                                                                WHERE  team_id	  = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
            //--------------------------------------
                    move_uploaded_file($_FILES['team_img']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
            //--------------------------------------
                }
            //--------------------------------------
        }
        //-----------------------end---------------

        $_SESSION['msg']['status'] = 'toastr.success("Inserted Succesfully");';
        header("Location: teams.php", true, 301);
		exit();
        
    }

}

if(isset($_POST['edit_team'])) { 
    $team_priority          = intval($_POST['id_priority']);
    $team_updated_priority = ($team_priority + 1);
    $updated_priority      = ($team_priority + 1);
    $sqllms                 = $dblms->querylms('SELECT team_id FROM '.TEAMS.' WHERE id_priority > '.$team_priority.' ORDER BY id_priority DESC');
    while ($value_priority_team    = mysqli_fetch_array($sqllms)) {
        $updated_priority++;
        $dblms->querylms('UPDATE '.TEAMS.' SET id_priority = '.$updated_priority.' WHERE team_id = '.$value_priority_team['team_id'].'');
        echo 'UPDATE '.TEAMS.' SET id_priority = '.$updated_priority.' WHERE team_id = '.$value_priority_team['team_id'].'<br>';
    }
    //------------------------------------------------
    $sqllms  = $dblms->querylms("UPDATE ".TEAMS."
                                                SET
                                                      team_status                       = '".cleanvars($_POST['team_status'])."'
                                                    , id_type                           = '".cleanvars($_POST['id_type'])."'
                                                    , id_priority                       = '".cleanvars($team_updated_priority)."'
                                                    , team_name                         = '".cleanvars($_POST['team_name'])."'
                                                    , team_degree                       = '".cleanvars($_POST['team_degree'])."'
                                                    , team_designation                  = '".cleanvars($_POST['team_designation'])."'
                                                    , team_desc                         = '".cleanvars($_POST['team_desc'])."'
                                                    , id_modified                       = '".cleanvars($_SESSION['LOGINID_DT'])."'
                                                    , date_modified                     = NOW()
                                                WHERE  team_id 	                        = '".cleanvars($_POST['team_id'])."'"
                        );
    if($sqllms) { 
    //--------------------------------------
        $latest_id = cleanvars($_POST['team_id']);
    //--------------------------------------
        if(!empty($_FILES['team_img']['name'])) {
            //--------------------------------------
                $path_parts 	= pathinfo($_FILES["team_img"]["name"]);
                $extension 		= strtolower($path_parts['extension']);
                $img_dir 	= '../images/team/';
            //--------------------------------------
                $originalImage	= $img_dir.to_seo_url(cleanvars($_POST['team_name'])).'_'.$latest_id.".".($extension);
                $img_fileName	= to_seo_url(cleanvars($_POST['team_name'])).'_'.$latest_id.".".($extension);
            //--------------------------------------
                if(in_array($extension , array('jpeg','jpg', 'png', 'gif' ,  'JPEG' , 'JPG' , 'PNG' , 'GIF'))) {
            //--------------------------------------
                    $sqllmsupload  = $dblms->querylms("UPDATE ".TEAMS."
                                                                    SET team_img = '".$img_fileName."'
                                                                WHERE  team_id	  = '".cleanvars($latest_id)."'");
                    unset($sqllmsupload);
                    $mode = '0644'; 
            //--------------------------------------
                    move_uploaded_file($_FILES['team_img']['tmp_name'],$originalImage);
                    chmod ($originalImage, octdec($mode));
            //--------------------------------------
                }
            //--------------------------------------
        }
    //-----------------------end---------------

        $_SESSION['msg']['status'] = 'toastr.info("Updated Succesfully");';
        header("Location: teams.php", true, 301);
		exit();

    }

}