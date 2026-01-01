<?php
$condition = array(
    'select'       =>  'course_id, course_status, course_title, course_code, course_type, course_short_desc, course_description'
   ,'where'        =>  array(
                                'is_deleted'   => 0
                               ,'course_status'   => 1
                               ,'course_id'       => cleanvars(LMS_EDIT_ID)
                           )
   ,'return_type'  =>  'single'
);
$row = $dblms->getRows(COURSE , $condition);
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
                <input type="hidden" name="course_id" value="'.$row['course_id'].'" />
                <div class="col mb-2">
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="course_title" value="'.$row['course_title'].'" required />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Code <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="course_code" value="'.$row['course_code'].'" required />
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Type <span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="course_type" required>
                        <option value=""> Choose one</option>';
                            foreach(get_course_type() as $key => $type):
                                echo'<option value="'.$key.'" '.($key == $row['course_type'] ? 'selected' : '').'>'.$type.'</option>';
                            endforeach;
                        echo '
                    </select>
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="course_status" required>
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'" '.($key == $row['course_status'] ? 'selected' : '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Short Description</label>
                    <textarea class="form-control" name="course_short_desc" >'.$row['course_short_desc'].'</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Detail</label>
                    <textarea class="form-control" id="ckeditor1" name="course_description">'.html_entity_decode($row['course_description']).'</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Photo <span class="text-danger">(jpg, jpeg, png) </span></label>
                    <div class="dropzone" id="singleFileUpload">
                        <div class="dz-message needsclick">
                            <i class="fa fa-cloud-upload"></i>
                            <h6>Drop files here or click to upload.</h6>
                            <input type="file" class="form-control" name="course_photo" id="news_photo" accept=".jpg, .jpeg, .png" required>
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