<?php
require_once("../../../../../config/dbsetting/classdbconection.php");
require_once("../../../../../config/dbsetting/lms_vars_config.php");
require_once("../../../../../config/functions/functions.php");
$dblms = new dblms();

$condition = array(
                     'select'       =>  '*'
                    ,'where'        =>  array(
                                                 'is_deleted'   => 0
                                                ,'rev_id'       => cleanvars(LMS_EDIT_ID)
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(REVIEWS , $condition);
echo'
<script src="'.SITE_URL.'assets/admin/js/select2/select2-custom.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-secondary">
            <h6 class="modal-title" id="exampleModalLabel">Edit '.moduleName(LMS_VIEW).'</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form autocomplete="off" class="form-validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="edit_id" value="'.LMS_EDIT_ID.'"/>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="rev_name" class="form-control" value="'.$row['rev_name'].'" required />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">City <span class="text-danger">*</span></label>
                        <input type="text" name="rev_city" class="form-control" value="'.$row['rev_city'].'" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Rating <span class="text-danger">*</span></label>
                        <select class="form-control js-example-basic-single" name="rev_rating" id="rev_rating" required>
                            <option value=""> Choose one</option>';
                            for ($i=1; $i <= 5 ; $i++) { 
                                echo'<option value="'.$i.'"'.($i == $row['rev_rating'] ? 'selected' : '').'>'.$i.' Star</option>';
                            }
                            echo'
                        </select>
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control js-example-basic-single" name="rev_status" id="rev_status" required>
                            <option value=""> Choose one</option>';
                            foreach(get_status() as $key => $status):
                                echo'<option value="'.$key.'" '.($key == $row['rev_status'] ? 'selected' : '').'>'.$status.'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Subject <span class="text-danger">*</span></label>
                        <input type="text" name="rev_subject" class="form-control" value="'.$row['rev_subject'].'" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="rev_description" required>'.$row['rev_description'].'</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Photo</label>
                        <div class="dropzone" id="singleFileUpload">
                            <div class="dz-message needsclick"><i class="fa fa-cloud-upload"></i>
                                <h6>Drop files here or click to upload.</h6>
                                <input type="file" class="form-control" name="rev_photo" id="rev_photo" accept=".jpg, .jpeg, .png">
                            </div>
                        </div>
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