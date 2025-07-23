<?php
//------------------------------------------------
if(LMS_VIEW == 'add' && !isset($_GET['id'])) { 
//------------------------------------------------
$Fields = array(
    "course_title"  	        =>  array(  "title" => "Course Title"     ,    "type" => "text"  ,       "class" => "col-md-6"  ) ,
    // "blog_date"       	    =>  array(  "title" => "Date"           ,    "type" => "date"  ,     "class" => "col-md-6"    )                
);
//------------------------------------------------
echo'
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add New Course</h4>
                <div class="clearfix"></div>
                <form action="courses.php" method="post"enctype="multipart/form-data" autocomplete="off">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="blog_statu"> Course Catagory <span class="text text-danger"> * </span></label>
                                <select name="course_catagory" id="blog_statu" class="form-control select2" required>
                                    <option value=""></option>';
                                    foreach($courses as $key => $value) {
                                        echo'<option value="'.$key.'">'.$value.'</option>';
                                    }
                                    echo '
                                </select>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="blog_photo"> Course Photo <span class="text text-danger"> (Dimensions: 270 * 170) * </span></label>
                                <input type="file" id="blog_photo" name="course_photo" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="blog_status"> Status <span class="text text-danger"> * </span></label>
                                <select name="course_status" id="blog_status" class="form-control select2" required>
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
                                <label for="blog_detail"> Details </label>
                                <textarea id="blog_detail" name="course_description" class="form-control summernote"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 float-right" >
                    <a href="courses.php" class="btn btn-dark w-md">Cancel</a>
                    <button type="submit" name="submit_course" class="btn btn-primary w-md">Submit</button>
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