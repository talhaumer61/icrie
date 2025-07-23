<?php
//------------------------------------------------
if(LMS_VIEW == 'add' && !isset($_GET['id'])) { 

//------------------------------------------------
$Fields = array(
    "mou_title"  	        =>  array(  "title" => "Title"          ,    "type" => "text"  ,     "class" => "col-md-4"    ) ,
    "mou_org"       	    =>  array(  "title" => "Organization"   ,    "type" => "Text"  ,     "class" => "col-md-4"    ) ,
    "mou_date"       	    =>  array(  "title" => "Date"           ,    "type" => "date"  ,     "class" => "col-md-4"    )                
);
//------------------------------------------------

echo'
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add New MOU</h4>
                <div class="clearfix"></div>
                <form action="mous.php" method="post"enctype="multipart/form-data" autocomplete="off">
                    <div class="row">';
                    foreach ($Fields as $key => $value) {
                    echo'
                    <div class="'.$value['class'].'">
                        <div class="form-group">
                            <label for="'.$key.'">'.$value['title'].' <span class="text text-danger"> * </span></label>
                            <input type="'.$value['type'].'" class="form-control" name="'.$key.'" id="'.$key.'" required>
                        </div>
                    </div>';
                    }
                    echo'                          
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mou_photo"> Photo <span class="text text-danger">(Dimensions: 1200 * 900) * </span></label>
                            <input type="file" id="mou_photo" name="mou_photo" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mou_status"> Status <span class="text text-danger"> * </span></label>
                            <select name="mou_status" id="mou_status" class="form-control select2" required>
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
                            <label for="mou_detail"> Details </label>
                            <textarea id="mou_detail" name="mou_detail" class="form-control summernote"></textarea>
                        </div>
                    </div>
                    </div>
                    <div class="mt-4 float-right" >
                    <a href="mous.php" class="btn btn-dark w-md">Cancel</a>
                    <button type="submit" name="submit_mou" class="btn btn-primary w-md">Submit</button>
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