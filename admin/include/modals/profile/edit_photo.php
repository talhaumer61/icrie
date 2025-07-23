<?php 
require_once("../../dbsetting/lms_vars_config.php");
require_once("../../dbsetting/classdbconection.php");
require_once("../../functions/functions.php");
$dblms = new dblms();
require_once("../../functions/login_func.php");
checkCpanelLMSALogin();

$condition = array ( 
                         'select'       =>  'adm_username, adm_fullname, adm_email, adm_phone, adm_photo, adm_type, date_added'
                        ,'where'        =>  array(
                                                    'adm_id'  =>  $_SESSION['userlogininfo']['LOGINIDA']
                                                )
                        ,'return_type'  =>  'single'
                    ); 
$row = $dblms->getRows(ADMINS, $condition);

echo'
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form action="profile.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="adm_fullname" value="'.$row['adm_fullname'].'"/>
            <input type="hidden" name="adm_type" value="'.$row['adm_type'].'"/>
            
            <div class="modal-header bg-primary">
                <h6 class="modal-title">Change Profile Image</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="dropzone" id="singleFileUpload">
                            <div class="dz-message needsclick"><i class="fa fa-cloud-upload"></i>
                                <h6>Drop files here or click to upload.</h6>
                                <input type="file" class="form-control" name="adm_photo" id="adm_photo" accept="image/*" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" type="submit" name="edit_photo">Save</button>
                <button class="btn btn-danger btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>';
?>