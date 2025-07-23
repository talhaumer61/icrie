<?php
require_once("../../../../../config/dbsetting/classdbconection.php");
require_once("../../../../../config/dbsetting/lms_vars_config.php");
require_once("../../../../../config/functions/functions.php");
$dblms = new dblms();

echo'
<script src="'.SITE_URL.'assets/admin/js/select2/select2-custom.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <h6 class="modal-title" id="exampleModalLabel">Add '.moduleName(LMS_VIEW).'</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form autocomplete="off" class="form-validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="rev_name" class="form-control" required />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">City<span class="text-danger">*</span></label>
                        <input type="text" name="rev_city" class="form-control" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Rating <span class="text-danger">*</span></label>
                        <select class="form-control js-example-basic-single" name="rev_rating" id="rev_rating" required>
                            <option value=""> Choose one</option>';
                            for ($i=1; $i <= 5 ; $i++) { 
                                echo'<option value="'.$i.'">'.$i.' Star</option>';
                            }
                            echo'
                        </select>
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control js-example-basic-single" name="rev_status" id="rev_status" required>
                            <option value=""> Choose one</option>';
                            foreach(get_status() as $key => $status):
                                echo'<option value="'.$key.'">'.$status.'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Subject <span class="text-danger">*</span></label>
                        <input type="text" name="rev_subject" class="form-control" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="rev_description" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Photo <span class="text-danger">*</span></label>
                        <div class="dropzone" id="singleFileUpload">
                            <div class="dz-message needsclick"><i class="fa fa-cloud-upload"></i>
                                <h6>Drop files here or click to upload.</h6>
                                <input type="file" class="form-control" name="rev_photo" id="rev_photo" accept=".jpg, .jpeg, .png" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"> Close</button>
                    <button type="submit" class="btn btn-primary btn-sm" name="submit_add"> Add '.moduleName(LMS_VIEW).'</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>