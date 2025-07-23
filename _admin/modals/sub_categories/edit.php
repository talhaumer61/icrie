<?php 
require_once("../../../../../config/dbsetting/classdbconection.php");
require_once("../../../../../config/dbsetting/lms_vars_config.php");
require_once("../../../../../config/functions/functions.php");
$dblms = new dblms();

$condition = array(
                     'select'       =>  'subcat_id, subcat_status, subcat_name, subcat_code, subcat_icon, subcat_photo, subcat_description, id_cat'
                    ,'where'        =>  array(
                                                 'is_deleted'   => 0
                                                ,'subcat_id'    => cleanvars(LMS_EDIT_ID)
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(SUB_CATEGORIES, $condition);

// CATEGORIES
$condition = array ( 
                     'select'       =>  "cat_id, cat_name, cat_code"
                    ,'where' 	    =>  array( 
                                                'is_deleted'    => 0
                                            )
                    ,'return_type'  =>  'all' 
                   ); 
$CATEGORIES = $dblms->getRows(CATEGORIES, $condition);
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
                        <input type="text" name="subcat_name" class="form-control" value="'.$row['subcat_name'].'" required />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Code <span class="text-danger">*</span></label>
                        <input type="text" name="subcat_code" class="form-control" value="'.$row['subcat_code'].'" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <select class="form-control js-example-basic-single" name="id_cat" id="id_cat" required>
                            <option value=""> Choose one</option>';
                            foreach($CATEGORIES as $key => $valCat):
                                echo'<option value="'.$valCat['cat_id'].'" '.($valCat['cat_id'] == $row['id_cat'] ? 'selected' : '').'>'.$valCat['cat_name'].' - '.$valCat['cat_code'].'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control js-example-basic-single" name="subcat_status" id="subcat_status" required>
                            <option value=""> Choose one</option>';
                            foreach(get_status() as $key => $status):
                                echo'<option value="'.$key.'" '.($key == $row['subcat_status'] ? 'selected' : '').'>'.$status.'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Description </label>
                        <textarea class="form-control" name="subcat_description">'.$row['subcat_description'].'</textarea>
                    </div>
                </div>             
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Icon</label>
                        <div class="dropzone" id="singleFileUpload">
                            <div class="dz-message needsclick"><i class="fa fa-cloud-upload"></i>
                                <h6>Drop files here or click to upload.</h6>
                                <input type="file" class="form-control" name="subcat_icon" id="subcat_icon" accept=".jpg, .jpeg, .png">
                            </div>
                        </div>
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Photo</label>
                        <div class="dropzone" id="singleFileUpload">
                            <div class="dz-message needsclick"><i class="fa fa-cloud-upload"></i>
                                <h6>Drop files here or click to upload.</h6>
                                <input type="file" class="form-control" name="subcat_photo" id="subcat_photo" accept=".jpg, .jpeg, .png">
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