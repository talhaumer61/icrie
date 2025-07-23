<?php
//------------------------------------------------
if(LMS_VIEW == 'add' && !isset($_GET['id'])) { 

//------------------------------------------------
$Fields = array(
    "grant_title"  	        =>  array(  "title" => "Title"     ,    "type" => "text"  ,     "class" => "col-md-12" , "req_text" => '<span class="text text-danger"> * </span>' ,  "is_required" => "required"  ) ,
    "open_date"       	    =>  array(  "title" => "Open Date" ,    "type" => "date"  ,     "class" => "col-md-4"  , "req_text" => ''                                          ,  "is_required" => ""  ) ,             
    "close_date"       	    =>  array(  "title" => "Dead Line" ,    "type" => "text"  ,     "class" => "col-md-4"  , "req_text" => '<span class="text text-danger"> * </span>' ,  "is_required" => "required"  ) ,             
    "grant_apply_link"  	=>  array(  "title" => "Apply Link",    "type" => "text"  ,     "class" => "col-md-4"  , "req_text" => '<span class="text text-danger"> * </span>' ,  "is_required" => "required"  ) ,             
    "grant_faculty_dept"  	=>  array(  "title" => "Faculty / Dept","type" => "text"  ,     "class" => "col-md-3"  , "req_text" => '<span class="text text-danger"> * </span>' ,  "is_required" => "required"  )                
);
//------------------------------------------------
echo'
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add New Grant / Funding </h4>
                <div class="clearfix"></div>
                <form action="grants_fundings.php" method="post"enctype="multipart/form-data" autocomplete="off">
                    <div class="row">';
                        foreach ($Fields as $key => $value) {
                            echo'
                            <div class="'.$value['class'].'">
                                <div class="form-group">
                                    <label for="'.$key.'">'.$value['title'].' '.$value['req_text'].'</label>
                                    <input type="'.$value['type'].'" class="form-control" name="'.$key.'" id="'.$key.'" '.$value['is_required'].'>
                                </div>
                            </div>';
                        }
                        echo'            
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="grant_photo">Photo  <span class="text text-danger">(Dimensions: 640 * 360) * </span></label>
                                <input type="file" id="grant_photo" name="grant_photo" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="is_international"> Type <span class="text text-danger"> * </span></label>
                                <select name="is_international" id="is_international" class="form-control select2" required>
                                    <option value=""></option>';
                                    foreach($isinternational as $type) {
                                        echo'<option value="'.$type['id'].'">'.$type['name'].'</option>';
                                    }
                                    echo '
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="grant_status"> Status <span class="text text-danger"> * </span></label>
                                <select name="grant_status" id="grant_status" class="form-control select2" required>
                                    <option value=""></option>';
                                    foreach($admstatus 	as $adm_status) {
                                        echo'<option value="'.$adm_status['status_id'].'">'.$adm_status['status_name'].'</option>';
                                    }
                                    echo '
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="grant_brief_detail"> Brief Detail </label>
                                <textarea id="grant_brief_detail" name="grant_brief_detail" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="grant_detail"> Detail </label>
                                <textarea id="grant_detail" name="grant_detail" class="form-control summernote"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 float-right" >
                    <a href="grants_fundings.php" class="btn btn-dark w-md">Cancel</a>
                    <button type="submit" name="submit_grant" class="btn btn-primary w-md">Submit</button>
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