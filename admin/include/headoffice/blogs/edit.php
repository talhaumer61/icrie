<?php
$condition = array(
    'select'       =>  'blog_id, blog_status, blog_title, blog_date, blog_brief_detail, blog_detail'
   ,'where'        =>  array(
                                'is_deleted'   => 0
                               ,'blog_status'   => 1
                               ,'blog_id'       => cleanvars(LMS_EDIT_ID)
                           )
   ,'return_type'  =>  'single'
);
$row = $dblms->getRows(BLOGS , $condition);
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
                <input type="hidden" name="blog_id" value="'.$row['blog_id'].'">
                <div class="col mb-2">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="blog_title" value="'.$row['blog_title'].'" required />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="blog_date" value="'.$row['blog_date'].'" required />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="blog_status" required>
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'" '.($key == $row['blog_status'] ? 'selected' : '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Brief Detail</label>
                    <textarea class="form-control" id="ckeditor1" name="blog_brief_detail">'.$row['blog_brief_detail'].'</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" id="ckeditor1" name="blog_detail">'.$row['blog_detail'].'</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Photo <span class="text-danger">(Dimensions: 426 * 426) </span></label>
                    <div class="dropzone" id="singleFileUpload">
                        <div class="dz-message needsclick">
                            <i class="fa fa-cloud-upload"></i>
                            <h6>Drop files here or click to upload.</h6>
                            <input type="file" class="form-control" name="blog_photo" accept=".jpg, .jpeg, .png" required>
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