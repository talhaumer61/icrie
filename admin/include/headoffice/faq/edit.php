<?php
$condition = array(
    'select'       =>  'faq_id, faq_status, faq_qns, faq_ans'
   ,'where'        =>  array(
                                'is_deleted'   => 0
                               ,'faq_status'   => 1
                               ,'faq_id'       => cleanvars(LMS_EDIT_ID)
                           )
   ,'return_type'  =>  'single'
);
$row = $dblms->getRows(FAQ , $condition);
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
                <input type="hidden" name="faq_id" value="'.$row['faq_id'].'">
                <div class="col mb-2">
                    <label class="form-label">Question <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="faq_qns" value="'.$row['faq_qns'].'" required />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="faq_status" required>
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'" '.($key == $row['faq_status'] ? 'selected' : '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Answer</label>
                    <textarea class="form-control" id="ckeditor1" name="faq_ans">'.$row['faq_ans'].'</textarea>
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