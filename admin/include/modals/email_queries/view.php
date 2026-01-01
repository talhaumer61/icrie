<?php
require_once("../../../../admin/include/dbsetting/classdbconection.php");
require_once("../../../../admin/include/dbsetting/lms_vars_config.php");
require_once("../../../../admin/include/functions/functions.php");
$dblms = new dblms();

$condition = array(
                     'select'       =>  'first_name, last_name, email, phone_number, msg_subject, message'
                    ,'where'        =>  array(
                                                 'is_deleted'       => 0
                                                ,'contact_status'   => 1
                                                ,'contact_id'       => cleanvars(LMS_EDIT_ID)
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(QUERIES , $condition);
echo'
<script src="'.SITE_URL_WEB.'assets/admin/js/select2/select2-custom.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-secondary">
            <h6 class="modal-title" id="exampleModalLabel">'.moduleName(LMS_VIEW).'</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form autocomplete="off" class="form-validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="modal-body">
                <div class="email-body">
                    <div class="email-content">
                        <div class="email-top">
                        <div class="row">
                            <div class="col-xl-12">
                            <div class="media"><img class="me-3 rounded-circle" src="../assets/images/user/user.png" alt="">
                                <div class="media-body">
                                <span class="fw-bold">Name: </span><span>'.$row['first_name'].' '.$row['last_name'].'</span><br>
                                <span class="fw-bold">Email: </span><span>'.$row['email'].'</span>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="email-wrapper py-4">
                            <div class="emailread-group">
                                <div class="read-group">
                                    <p><span class="fw-bold">Subject: </span>'.$row['msg_subject'].'</p>
                                    <p class="fw-bold">Message:</p>
                                    <p>'.$row['message'].'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>';
?>