<?php
//------------------------------------------------
if(LMS_VIEW == 'add' && !isset($_GET['id'])) { 

//------------------------------------------------
$Fields = array(
    "seminar_title"  	        =>  array(  "title" => "Title"          ,    "type" => "text"  ,     "class" => "col-md-4"    ) ,
    "seminar_speakers"    	    =>  array(  "title" => "Speaker"        ,    "type" => "Text"  ,     "class" => "col-md-4"    ) ,
    "seminar_date"       	    =>  array(  "title" => "Date"           ,    "type" => "date"  ,     "class" => "col-md-4"    )                
);
//------------------------------------------------

echo'
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add New Seminar</h4>
                <div class="clearfix"></div>
                <form action="seminars.php" method="post"enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                    ';
                    foreach ($Fields as $key => $value) {
                    echo'
                    <div class="'.$value['class'].'">
                        <div class="form-group">
                            <label for="'.$key.'">'.$value['title'].' <span class="text text-danger"> * </span></label>
                            <input type="'.$value['type'].'" class="form-control" name="'.$key.'" id="'.$key.'" required>
                        </div>
                    </div>
                    ';
                    }
                    echo'                          
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="seminar_photo"> Photo <span class="text text-danger"> * </span></label>
                                <input type="file" id="seminar_photo" name="seminar_photo" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="seminar_status"> Status <span class="text text-danger"> * </span></label>
                                <select name="seminar_status" id="seminar_status" class="form-control select2" required>
                                    <option value=""></option>
                                    ';
                                    foreach($admstatus 	as $adm_status) {
                                    echo '
                                    <option value="'.$adm_status['status_id'].'">'.$adm_status['status_name'].'</option>
                                    ';
                                    }
                                    echo '
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="seminar_brief_detail"> Brief Detail </label>
                                <textarea id="seminar_brief_detail" name="seminar_brief_detail" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="seminar_detail"> Details </label>
                                <textarea id="seminar_detail" name="seminar_detail" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 float-right" >
                    <a href="seminars.php" class="btn btn-dark w-md">Cancel</a>
                    <button type="submit" name="submit_seminar" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
   $(".select2").select2({
   
       placeholder: "Select Any Option"
   
   })
   
</script>';
}