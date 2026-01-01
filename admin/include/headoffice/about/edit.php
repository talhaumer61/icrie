<?php
$condition = array(
                     'select'       =>  'about_id, about_status, about_title, about_des, about_img'
                    ,'where'        =>  array(
                                                 'is_deleted'   => 0
                                                ,'about_status'   => 1
                                                ,'about_id'       => cleanvars(LMS_EDIT_ID)
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(ABOUT , $condition);
echo'
<div class="row">
    <div class="col-sm-6">
        <h3 class="fw-bold">'.moduleName(ZONE).'</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">'.moduleName(false).'</li>
            <li class="breadcrumb-item">'.moduleName(LMS_VIEW).' '.moduleName(ZONE).'</li>
        </ol>
    </div>
</div>
<div class="card">
    <form autocomplete="off" class="form-validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="card-body">
            <div class="row">
                <input type="hidden" name="about_id" value="'.$row['about_id'].'" />
                <div class="col mb-2">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="about_title" value="'.$row['about_title'].'" required />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="about_status" required>
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'" '.($key == $row['about_status'] ? 'selected' : '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Detail</label>
                    <textarea class="form-control" id="ckeditor1" name="about_des">'.$row['about_des'].'</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Image 1 <span class="text-danger">(jpg, jpeg, png) </span></label>
                    <div class="dropzone" id="singleFileUpload">
                        <div class="dz-message needsclick">
                            <i class="fa fa-cloud-upload"></i>
                            <h6>Drop files here or click to upload.</h6>
                            <input type="file" class="form-control" name="about_img" accept=".jpg, .jpeg, .png">
                        </div>
                    </div>
                </div>
                <div class="col mb-2">
                    <label class="form-label">Image 2 <span class="text-danger">(jpg, jpeg, png) </span></label>
                    <div class="dropzone" id="singleFileUpload">
                        <div class="dz-message needsclick">
                            <i class="fa fa-cloud-upload"></i>
                            <h6>Drop files here or click to upload.</h6>
                            <input type="file" class="form-control" name="about_img2" accept=".jpg, .jpeg, .png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="bookmark">
            <a href="'.SITE_URL.moduleName().'.php" class="btn btn-danger btn-sm"> Cancel</a>
            <button type="submit" class="btn btn-primary btn-sm" name="submit_edit"> Save</button>
            </div>
        </div>
    </form>
</div>';
?>