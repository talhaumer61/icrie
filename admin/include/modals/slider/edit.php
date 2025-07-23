<?php 
require_once("../../dbsetting/lms_vars_config.php");
require_once("../../dbsetting/classdbconection.php");
require_once("../../functions/functions.php");
$dblms = new dblms();

$condition = array(
                     'select'       =>  'slider_id, slider_status, slider_img, slider_title, slider_btn_href, slider_btn_text'
                    ,'where'        =>  array(
                                                 'is_deleted'   => 0
                                                ,'slider_status'   => 1
                                                ,'slider_id'       => cleanvars(LMS_EDIT_ID)
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(SLIDER , $condition);
echo'
<script src="assets/js/select2/select2-custom.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-secondary">
            <h6 class="modal-title" id="exampleModalLabel">Edit '.moduleName(LMS_VIEW).'</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>        
        <form autocomplete="off" class="form-validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">        
            <input type="hidden" name="slider_id" value="'.LMS_EDIT_ID.'"/>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Slider Title <span class="text-danger">*</span></label>
                        <input type="text" name="slider_title" value="'.$row['slider_title'].'" class="form-control" required />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control js-example-basic-single" name="slider_status" id="cat_status" required>
                            <option value=""> Choose one</option>';
                            foreach(get_status() as $key => $status):
                                echo'<option value="'.$key.'" '.($key == $row['slider_status'] ? 'selected' : '').'>'.$status.'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Slider Button Text <span class="text-danger">*</span></label>
                        <input type="text" name="slider_btn_text" value="'.$row['slider_btn_text'].'" class="form-control" required />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Button Href <span class="text-danger">*</span></label>
                        <input type="text" name="slider_btn_href" value="'.$row['slider_btn_href'].'" class="form-control" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Image <span class="text text-danger"> (Dimensions: 1280 * 476) * </span></label>
                        <div class="dropzone" id="singleFileUpload">
                            <div class="dz-message needsclick"><i class="fa fa-cloud-upload"></i>
                                <h6>Drop files here or click to upload.</h6>
                                <input type="file" class="form-control" name="slider_img" id="cat_icon" accept=".jpg, .jpeg, .png" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"> Close</button>
                    <button type="submit" class="btn btn-secondary btn-sm" name="edit_slider"> Edit '.moduleName(LMS_VIEW).'</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>