<?php


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
                <div class="col mb-2">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="publication_title" id="news_title" required />
                </div>
                <div class="col mb-2" id="type_container">
                    <label class="form-label">Type <span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="id_type" id="news_status" required>
                        <option value=""> Choose one</option>';
                        foreach(get_publication_type() as $key => $value):
                            echo'<option value="'.$key.'">'.$value.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="publication_status" id="news_status" required>
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'">'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col mb-2">
                    <label class="form-label">Members <span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="id_team" id="news_status" required>
                        <option value=""> Choose one</option>';
                            $sqllms = array ( 
                                                'select' 		      =>	'
                                                                                team_id 
                                                                            , team_name 
                                                                        '
                                            , 'where' 		      =>	array( 
                                                                                    'is_deleted'	=> '0' 
                                                                                , 'team_status'	=> '1' 
                                                                                )
                                            , 'return_type' 	   => 'all' 
                                        ); 
                            $rows    = $dblms->getRows(TEAMS, $sqllms);
                            foreach($rows as $key => $val):
                                echo'<option value="'.$val['team_id'].'">'.$val['team_name'].'</option>';
                            endforeach;
                        echo '
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Detail</label>
                    <textarea class="form-control" id="ckeditor1" name="publication_desc"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Thumbnail <span class="text-danger">(jpg, jpeg, png) </span></label>
                    <div class="dropzone" id="singleFileUpload">
                        <div class="dz-message needsclick">
                            <i class="fa fa-cloud-upload"></i>
                            <h6>Drop files here or click to upload.</h6>
                            <input type="file" class="form-control" name="publication_photo" id="news_photo" accept=".jpg, .jpeg, .png">
                        </div>
                    </div>
                </div>
                <div class="col mb-2">
                    <label class="form-label">Attachments <span class="text-danger">(docx, pdf, pptx, doc)</span></label>
                    <div class="dropzone" id="singleFileUpload">
                        <div class="dz-message needsclick">
                            <i class="fa fa-cloud-upload"></i>
                            <h6>Drop files here or click to upload.</h6>
                            <input type="file" class="form-control" name="publication_file" id="news_photo" accept=".docx, .pdf, .pptx, .doc">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="bookmark">
                <button type="submit" class="btn btn-primary btn-sm" name="submit_add"> Save</button>
                <a href="'.SITE_URL.moduleName().'.php" class="btn btn-danger btn-sm"> Cancel</a>
            </div>
        </div>
    </form>
</div>
';
?>