<?php
//------------------------------------------------
if(LMS_VIEW == 'add' && !isset($_GET['id'])) { 

//------------------------------------------------
$Fields = array(

    "slider_title"           => array(     "title" => "Slider Title"        ,    "type" => "text"   ,       "class" => "col-md-4"    ) ,
    "slider_btn_text"        => array(     "title" => "Slider Button Text"  ,    "type" => "text"   ,       "class" => "col-md-4"    )  ,
    "slider_btn_href"        => array(     "title" => "Button Href"         ,   "type" => "text"    ,       "class" => "col-md-4"    ) 
);
//------------------------------------------------

echo'
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add New Slider</h4>
                <div class="clearfix"></div>
                <form action="slider.php" method="post"enctype="multipart/form-data" autocomplete="off">
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
                                <label for="slider_img"> Blog Photo <span class="text text-danger"> (Dimensions: 1280 * 476) * </span></label>
                                <input type="file" id="slider_img" name="slider_img" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slider_status"> Status <span class="text text-danger"> * </span></label>
                                <select name="slider_status" id="slider_status" class="form-control select2" required>
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
                    <div class="mt-4 float-right" >
                        <a href="slider.php" class="btn btn-dark w-md">Cancel</a>
                        <button type="submit" name="submit_slider" class="btn btn-primary w-md">Submit</button>
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