<?php
$condition = array(
    'select'       =>  'team_id, team_status, team_name, team_desc, id_type, id_priority, team_designation, team_degree, team_fb, team_twitter, team_linkedin, team_insta'
   ,'where'        =>  array(
                                'is_deleted'   => 0
                               ,'team_status'   => 1
                               ,'team_id'       => cleanvars(LMS_EDIT_ID)
                           )
   ,'return_type'  =>  'single'
);
$row = $dblms->getRows(TEAMS , $condition);
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
                <input type="hidden" name="team_id" value="'.$row['team_id'].'">
                <div class="col mb-2">
                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="team_name" value="'.$row['team_name'].'" required />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Type <span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="id_type" id="news_type" required>
                        <option value=""> Choose one</option>';
                                    foreach($teamtype as $type) {
                                        echo'<option value="'.$type['id'].'" '.($type['id'] == $row['id_type'] ? 'selected' : '').'>'.$type['name'].'</option>';
                                    }
                                    echo '
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Designation <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="team_designation" value="'.$row['team_designation'].'" required />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Degree <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="team_degree" value="'.$row['team_degree'].'" required />
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="team_status" required>
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'" '.($key == $row['team_status'] ? 'selected' : '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col mb-2">
                    <label class="form-label">Priority <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="id_priority" value="'.$row['id_priority'].'" required />
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Facebook <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="'.$row['team_fb'].'" name="team_fb" required />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Twitter <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="'.$row['team_twitter'].'" name="team_twitter" required />
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Linkedin <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="'.$row['team_linkedin'].'" name="team_linkedin" required />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Instagram <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="'.$row['team_insta'].'" name="team_insta" required />
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Detail</label>
                    <textarea class="form-control" id="ckeditor1" name="team_desc">'.$row['team_desc'].'</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Photo <span class="text-danger">(Dimensions: 	305 * 435) </span></label>
                    <div class="dropzone" id="singleFileUpload">
                        <div class="dz-message needsclick">
                            <i class="fa fa-cloud-upload"></i>
                            <h6>Drop files here or click to upload.</h6>
                            <input type="file" class="form-control" name="team_img" accept=".jpg, .jpeg, .png" required>
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