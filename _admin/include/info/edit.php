<?php
//------------------------------------------------
if(!LMS_VIEW && isset($_GET['id'])) { 

$sqllms = $dblms->querylms("SELECT * FROM ".INFO." WHERE info_id =  ".cleanvars($_GET['id'])." ");
$value_gallery = mysqli_fetch_assoc($sqllms);
//------------------------------------------------
$Fields = array(

   "info_phone"           => array(     "title" => "Phone"        ,    "type" => "text"   ,       "class" => "col-md-6"    ),
   "info_mail_1"          => array(     "title" => "First Mail"   ,    "type" => "text"   ,       "class" => "col-md-6"    ) 

);
//------------------------------------------------
$Fields2 = array(

   "info_mail_2"          => array(     "title" => "Second Mail"  ,    "type" => "text"   ,       "class" => "col-md-4"    ) ,
   "info_web"             => array(     "title" => "Website"      ,    "type" => "text"   ,       "class" => "col-md-4"    ),
   "info_location"        => array(     "title" => "Location"     ,    "type" => "text"   ,       "class" => "col-md-4"    )

);
//------------------------------------------------

echo'
<div class="row">
<div class="col-lg-12">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title mb-4">Edit Info</h4>
         <div class="clearfix"></div>
         <form action="info.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="info_id" value="'.$_GET['id'].'">
            <div class="row">
               ';
               foreach ($Fields as $key => $value) {
               echo'
               <div class="'.$value['class'].'">
                  <div class="form-group">
                     <label for="'.$key.'">'.$value['title'].' <span class="text text-danger"> * </span></label>
                     <input type="'.$value['type'].'" class="form-control" name="'.$key.'" value="'.$value_gallery[$key].'" id="'.$key.'" required>
                  </div>
               </div>
               ';
               }
               echo'                          
            </div>
            <div class="row">
               ';
               foreach ($Fields2 as $key => $value) {
               echo'
               <div class="'.$value['class'].'">
                  <div class="form-group">
                     <label for="'.$key.'">'.$value['title'].' <span class="text text-danger"> * </span></label>
                     <input type="'.$value['type'].'" class="form-control" name="'.$key.'" value="'.$value_gallery[$key].'" id="'.$key.'" required>
                  </div>
               </div>
               ';
               }
               echo'                          
            </div>
            <div class="mt-4 float-right" >
               <a href="info.php" class="btn btn-dark w-md">Cancel</a>
               <button type="submit" name="edit_info" class="btn btn-primary w-md">Save Changes</button>
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