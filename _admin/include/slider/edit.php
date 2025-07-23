<?php
if(!LMS_VIEW && isset($_GET['id'])) { 

$sqllms = $dblms->querylms("SELECT * 
                              FROM ".SLIDER." 
                              WHERE slider_id =  ".cleanvars($_GET['id'])." 
                           ");
$value_blog = mysqli_fetch_assoc($sqllms);

$Fields = array(

   "slider_title"           => array(     "title" => "Slider Title"        ,    "type" => "text"   ,       "class" => "col-md-4"    )  ,
   "slider_btn_text"        => array(     "title" => "Slider Button Text"  ,    "type" => "text"   ,       "class" => "col-md-4"    )  ,
   "slider_btn_href"        => array(     "title" => "Button Href"         ,   "type" => "text"    ,       "class" => "col-md-4"    ) 

);

echo'
<div class="row">
<div class="col-lg-12">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title mb-4">Edit Slider</h4>
         <div class="clearfix"></div>
         <form action="slider.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="slider_id" value="'.$_GET['id'].'">
            <div class="row">
               ';
               foreach ($Fields as $key => $value) {
               echo'
               <div class="'.$value['class'].'">
                  <div class="form-group">
                     <label for="'.$key.'">'.$value['title'].' <span class="text text-danger"> * </span></label>
                     <input type="'.$value['type'].'" class="form-control" name="'.$key.'" value="'.$value_blog[$key].'" id="'.$key.'" required>
                  </div>
               </div>
               ';
               }
               echo'                          
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="slider_img"> Slider Photo <span class="text text-danger"> (Dimensions: 1280 * 476) </span> </label>
                     <input type="file" id="slider_img" name="slider_img" class="form-control" >
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="slider_status"> Status <span class="text text-danger"> * </span></label>
                     <select name="slider_status" id="slider_status" class="form-control select2" required>
                        <option value=""></option>
                        ';
                        foreach($admstatus 	as $adm_status) {
                        if($value_blog['slider_status'] == $adm_status['status_id']){
                        echo '
                        <option value="'.$adm_status['status_id'].'" selected>'.$adm_status['status_name'].'</option>
                        ';
                        } else {
                        echo '
                        <option value="'.$adm_status['status_id'].'">'.$adm_status['status_name'].'</option>
                        ';
                        }
                        }
                        echo '
                     </select>
                  </div>
               </div>
            </div>
            <div class="mt-4 float-right" >
               <a href="slider.php" class="btn btn-dark w-md">Cancel</a>
               <button type="submit" name="edit_slider" class="btn btn-primary w-md">Save Changes</button>
            </div>
         </form>
      </div>
   </div>
</div>
<script>
   $(".select2").select2({
   
       placeholder: "Select Any Option"
   
   })
   
</script>';
}