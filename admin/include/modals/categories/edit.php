<?php 
require_once("../../dbsetting/lms_vars_config.php");
require_once("../../dbsetting/classdbconection.php");
require_once("../../functions/functions.php");
$dblms = new dblms();

$condition = array(
                     'select'       =>  'cat_id, cat_status, cat_name, cat_code, cat_icon, cat_photo, cat_description'
                    ,'where'        =>  array(
                                                 'is_deleted'   => 0
                                                ,'cat_id'       => cleanvars(LMS_EDIT_ID)
                                            )
                    ,'return_type'  =>  'single'
);
// $row = $dblms->getRows(CATEGORIES , $condition);
echo'
<script src="assets/js/select2/select2-custom.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-secondary">
            <h6 class="modal-title" id="exampleModalLabel">Edit Category</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>        
        <form autocomplete="off" class="form-validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">        
            <input type="hidden" name="edit_id" value="'.LMS_EDIT_ID.'"/>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="cat_name" class="form-control" value="'.$row['cat_name'].'" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Code <span class="text-danger">*</span></label>
                        <input type="text" name="cat_code" class="form-control" value="'.$row['cat_code'].'" required />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control js-example-basic-single" name="cat_status" id="cat_status" required>
                            <option value=""> Choose one</option>';
                            foreach(get_status() as $key => $status):
                                echo'<option value="'.$key.'" '.($key == $row['cat_status'] ? 'selected' : '').'>'.$status.'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Description </label>
                        <textarea class="form-control" name="cat_description">'.$row['cat_description'].'</textarea>
                    </div>
                </div>             
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Icon</label>
                        <div class="dropzone" id="singleFileUpload">
                            <div class="dz-message needsclick"><i class="fa fa-cloud-upload"></i>
                                <h6>Drop files here or click to upload.</h6>
                                <input type="file" class="form-control" name="cat_icon" id="cat_icon" accept=".jpg, .jpeg, .png">
                            </div>
                        </div>
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Photo</label>
                        <div class="dropzone" id="singleFileUpload">
                            <div class="dz-message needsclick"><i class="fa fa-cloud-upload"></i>
                                <h6>Drop files here or click to upload.</h6>
                                <input type="file" class="form-control" name="cat_image" id="cat_image" accept=".jpg, .jpeg, .png">
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