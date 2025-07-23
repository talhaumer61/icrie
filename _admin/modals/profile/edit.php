<?php 
require_once("../../../../../config/dbsetting/classdbconection.php");
require_once("../../../../../config/dbsetting/lms_vars_config.php");
require_once("../../../../../config/functions/functions.php");
require_once("../../../../../config/functions/login_func.php");
$dblms = new dblms();
checkCpanelLMSALogin();

$condition = array ( 
                         'select'       =>  'adm_username, adm_fullname, adm_email, adm_phone'
                        ,'where'        =>  array(
                                                    'adm_id'  =>  $_SESSION['userlogininfo']['LOGINIDA']
                                                )
                        ,'return_type'  =>  'single'
                    ); 
$row = $dblms->getRows(ADMINS, $condition);

echo'
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form method="post" autocomplete="off" enctype="multipart/form-data">            
            <div class="modal-header bg-primary">
                <h6 class="modal-title"><i class="fas fa-edit"></i> Profile Information</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="adm_fullname" class="form-control" required placeholder="Enter your firstname" value="'.$row['adm_fullname'].'">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="text" name="adm_phone" class="form-control" required placeholder="xxxx-xxxxxxx"  value="'.$row['adm_phone'].'">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" required value="'.$row['adm_email'].'" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" required value="'.$row['adm_username'].'" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" type="submit" name="submit_profile">Save</button>
                <button class="btn btn-danger btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>';
?>