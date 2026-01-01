    <?php
$condition = array(
                     'select'       =>  'setting_id , setting_status, setting_email, setting_web_name, setting_photo, setting_links, setting_favicon, setting_desc'
                    ,'where'        =>  array(
                                                 'is_deleted'       => 0
                                                ,'setting_status'   => 1
                                                ,'setting_id'       => cleanvars(LMS_EDIT_ID)
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(SETTING , $condition);
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
                <input type="hidden" name="setting_id" value="'.$row['setting_id'].'" />
                <div class="col mb-2">
                    <label class="form-label">Website Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="setting_web_name" value="'.$row['setting_web_name'].'" required />
                </div><div class="col mb-2">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="setting_email" value="'.$row['setting_email'].'" required />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="setting_status" id="news_status" required>
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'" '.($key == $row['setting_status'] ? 'selected' : '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Social Media Links</label>
                    <textarea class="form-control" id="ckeditor1" name="setting_links">'.$row['setting_links'].'</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Detail</label>
                    <textarea class="form-control" id="ckeditor1" name="setting_desc">'.$row['setting_desc'].'</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Logo <span class="text-danger">(jpg, jpeg, png) </span></label>
                    <div class="dropzone" id="singleFileUpload">
                        <div class="dz-message needsclick">
                            <i class="fa fa-cloud-upload"></i>
                            <h6>Drop files here or click to upload.</h6>
                            <input type="file" class="form-control" name="setting_photo" accept=".jpg, .jpeg, .png" required>
                        </div>
                    </div>
                </div><div class="col mb-2">
                    <label class="form-label">Favicon <span class="text-danger">(jpg, jpeg, png) </span></label>
                    <div class="dropzone" id="singleFileUpload">
                        <div class="dz-message needsclick">
                            <i class="fa fa-cloud-upload"></i>
                            <h6>Drop files here or click to upload.</h6>
                            <input type="file" class="form-control" name="setting_favicon" accept=".jpg, .jpeg, .png" required>
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