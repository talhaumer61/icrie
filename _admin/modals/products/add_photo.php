<?php 
require_once("../../../../../config/dbsetting/lms_vars_config.php");
require_once("../../../../../config/dbsetting/classdbconection.php");
require_once("../../../../../config/functions/functions.php");
require_once("../../../../../config/functions/login_func.php");
$dblms = new dblms();
checkCpanelLMSALogin();

echo'
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form method="post" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="id_pro" value="'.$_GET['id_pro'].'"/>
            <input type="hidden" name="pro_name" value="'.$_GET['pro_name'].'"/>
            
            <div class="modal-header bg-primary">
                <h6 class="modal-title">Edit '.moduleName(LMS_VIEW).'</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="dropzone" id="singleFileUpload">
                            <div class="dz-message needsclick"><i class="fa fa-cloud-upload"></i>
                                <h6>Drop files here or click to upload.</h6>
                                <input type="file" class="form-control" name="pp_photo" id="pp_photo" accept=".jpg, .jpeg, .png" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" type="submit" name="submit_add_photo">Save</button>
                <button class="btn btn-danger btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>';
?>