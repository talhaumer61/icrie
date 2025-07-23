<?php
$condition = array(
    'select'       =>  'event_id, event_status, event_title, event_type, event_date, event_time, event_place, event_reg_link, event_brief_detail, event_detail'
   ,'where'        =>  array(
                                'is_deleted'   => 0
                               ,'event_status'   => 1
                               ,'event_id'       => cleanvars(LMS_EDIT_ID)
                           )
   ,'return_type'  =>  'single'
);
$row = $dblms->getRows(EVENTS , $condition);
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
                <input type="hidden" name="event_id" value="'.$row['event_id'].'" />
                <div class="col mb-2">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="event_title" value="'.$row['event_title'].'" required />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Type <span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="event_type" required>
                        <option value=""> Choose one</option>';
                            foreach(get_eventtype() as $key => $type):
                                echo'<option value="'.$key.'" '.($key == $row['event_type'] ? 'selected' : '').'>'.$type.'</option>';
                            endforeach;
                        echo '
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Date <span class="text-danger">*</span></label>
                    <input class="form-control digits" type="date" name="event_date" value="'.$row['event_date'].'">
                </div>
                <div class="col mb-2">
                    <label class="form-label">Time <span class="text-danger">*</span></label>
                    <input class="form-control digits" type="time" name="event_time" value="'.$row['event_time'].'">
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="event_status" required>
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'" '.($key == $row['event_status'] ? 'selected' : '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Venue <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="event_place" value="'.$row['event_place'].'" required />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Registration Link <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="event_reg_link" value="'.$row['event_reg_link'].'" required />
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Short Description</label>
                    <textarea class="form-control" name="event_brief_detail" >'.$row['event_brief_detail'].'</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Detail</label>
                    <textarea class="form-control" id="ckeditor1" name="event_detail">'.html_entity_decode($row['event_detail']).'</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Photo <span class="text-danger">(jpg, jpeg, png) </span></label>
                    <div class="dropzone" id="singleFileUpload">
                        <div class="dz-message needsclick">
                            <i class="fa fa-cloud-upload"></i>
                            <h6>Drop files here or click to upload.</h6>
                            <input type="file" class="form-control" name="event_photo" accept=".jpg, .jpeg, .png" required>
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