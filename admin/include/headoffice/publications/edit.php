<?php
$condition = array(
    'select'       => 'publication_id, publication_status, publication_title, id_type, id_team, publication_desc, publication_photo, publication_file',
    'where'        => array(
        'is_deleted'         => 0,
        'publication_status'=> 1,
        'publication_id'    => cleanvars(LMS_EDIT_ID)
    ),
    'return_type'  => 'single'
);
$row = $dblms->getRows(PUBLICATIONS , $condition);

echo '
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
<form autocomplete="off" class="form-validate" enctype="multipart/form-data" method="post">
<div class="card-body">

<input type="hidden" name="publication_id" value="'.$row['publication_id'].'">
<input type="hidden" name="old_publication_photo" value="'.$row['publication_photo'].'">
<input type="hidden" name="old_publication_file" value="'.$row['publication_file'].'">

<div class="row">
    <div class="col mb-2">
        <label class="form-label">Title <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="publication_title" value="'.$row['publication_title'].'" required>
    </div>

    <div class="col mb-2">
        <label class="form-label">Type <span class="text-danger">*</span></label>
        <select class="form-control js-example-basic-single" name="id_type" required>
            <option value="">Choose one</option>';
            foreach(get_publication_type() as $key => $type){
                echo '<option value="'.$key.'" '.($key==$row['id_type']?'selected':'').'>'.$type.'</option>';
            }
echo '
        </select>
    </div>
</div>

<div class="row">
    <div class="col mb-2">
        <label class="form-label">Status <span class="text-danger">*</span></label>
        <select class="form-control js-example-basic-single" name="publication_status" required>
            <option value="">Choose one</option>';
            foreach(get_status() as $key => $status){
                echo '<option value="'.$key.'" '.($key==$row['publication_status']?'selected':'').'>'.$status.'</option>';
            }
echo '
        </select>
    </div>

    <div class="col mb-2">
        <label class="form-label">Members <span class="text-danger">*</span></label>
        <select class="form-control js-example-basic-single" name="id_team[]" multiple required>
            <option value="">Choose one</option>';
            $sqllms = array(
                'select' => 'team_id, team_name',
                'where'  => array('is_deleted'=>0,'team_status'=>1),
                'return_type'=>'all'
            );
            $teams = $dblms->getRows(TEAMS, $sqllms);
            $selectedTeams = !empty($row['id_team']) ? explode(',', $row['id_team']) : [];
            foreach ($teams as $t) {
                $selected = in_array($t['team_id'], $selectedTeams) ? 'selected' : '';
                echo '<option value="'.$t['team_id'].'" '.$selected.'>'.$t['team_name'].'</option>';
            }

            // foreach($teams as $t){
            //     echo '<option value="'.$t['team_id'].'" '.($t['team_id']==$row['id_team']?'selected':'').'>'.$t['team_name'].'</option>';
            // }
echo '
        </select>
    </div>
</div>

<div class="row">
    <div class="col mb-2">
        <label class="form-label">Detail</label>
        <textarea class="form-control" id="ckeditor1" name="publication_desc">'.$row['publication_desc'].'</textarea>
    </div>
</div>

<div class="row">
    <div class="col mb-2">
        <label class="form-label">Thumbnail <span class="text-danger">(jpg, jpeg, png)</span></label>
        <input type="file" class="form-control" name="publication_photo" accept=".jpg,.jpeg,.png">';
        
        if(!empty($row['publication_photo'])){
            echo '
            <div class="mt-2">
                <label class="form-label">Current Thumbnail</label>
                <div style="max-width:200px">
                    <a href="'.SITE_URL.'uploads/images/publications/'.$row['publication_photo'].'" target="_blank">
                        <img src="'.SITE_URL.'uploads/images/publications/'.$row['publication_photo'].'" class="img-fluid rounded border">
                    </a>
                </div>
            </div>
            ';
        }

echo '
    </div>

    <div class="col mb-2">
        <label class="form-label">Attachments <span class="text-danger">(docx, pdf, pptx, doc)</span></label>
        <input type="file" class="form-control" name="publication_file" accept=".docx,.pdf,.pptx,.doc">';

        if(!empty($row['publication_file'])){
            echo '
            <div class="mt-2">
                <label class="form-label">Current Attachment</label><br>
                <a href="'.SITE_URL.'uploads/files/publications/'.$row['publication_file'].'" target="_blank">
                    <i class="fa fa-paperclip"></i> View Attachment
                </a>
            </div>
            <button type="submit" name="remove_file" value="1" class="btn btn-sm btn-outline-danger mt-2">
                Remove File
            </button>
            ';
        }

echo '
    </div>
</div>

</div>

<div class="card-footer">
    <a href="'.SITE_URL.moduleName().'.php" class="btn btn-danger btn-sm">Cancel</a>
    <button type="submit" class="btn btn-primary btn-sm" name="submit_edit">Save</button>
</div>

</form>
</div>';
?>


