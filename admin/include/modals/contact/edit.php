<?php 
require_once("../../dbsetting/lms_vars_config.php");
require_once("../../dbsetting/classdbconection.php");
require_once("../../functions/functions.php");
$dblms = new dblms();

$condition = array(
                     'select'       =>  'info_id , info_phone, info_mail_1, info_mail_2, info_web,info_location'
                    ,'where'        =>  array(
                                                'info_status'   => 1
                                                ,'info_id'       => cleanvars(LMS_EDIT_ID)
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(CONTACT_INFO , $condition);
echo'
<script src="assets/js/select2/select2-custom.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-secondary">
            <h6 class="modal-title" id="exampleModalLabel">Edit '.moduleName(LMS_VIEW).'</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>        
        <form autocomplete="off" class="form-validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">        
            <input type="hidden" name="info_id" value="'.$row['info_id'].'"/>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="text" name="info_phone" value="'.$row['info_phone'].'" class="form-control" required />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Website URL <span class="text-danger">*</span></label>
                        <input type="text" name="info_web" value="'.$row['info_web'].'" class="form-control" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Email 1 <span class="text-danger">*</span></label>
                        <input type="text" name="info_mail_1" value="'.$row['info_mail_1'].'" class="form-control" required />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Email 2 <span class="text-danger">*</span></label>
                        <input type="text" name="info_mail_2" value="'.$row['info_mail_2'].'" class="form-control" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Address <span class="text-danger">*</span></label>
                        <input type="text" name="info_location" value="'.$row['info_location'].'" class="form-control" required />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"> Close</button>
                    <button type="submit" class="btn btn-secondary btn-sm" name="submit_edit"> Edit '.moduleName(LMS_VIEW).'</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>