<?php
//------------------------------------------------
if(!LMS_VIEW && isset($_GET['id'])) { 

$sqllms = $dblms->querylms("SELECT * FROM ".SETTING." WHERE setting_id =  ".cleanvars($_GET['id'])." ");
$value_gallery = mysqli_fetch_assoc($sqllms);
//------------------------------------------------
$Fields = array(

   "setting_web_name"       => array(     "title" => "Web Name"               ,     "type" => "text"   ,       "class" => "col-md-6"    ),
   "setting_email"          => array(     "title" => "Header Image"           ,     "type" => "text"   ,       "class" => "col-md-6"    ),
   "setting_photo"          => array(     "title" => "Logo"                   ,     "type" => "file"   ,       "class" => "col-md-6"    ),
   "setting_favicon"        => array(     "title" => "Favicon"                ,     "type" => "file"   ,       "class" => "col-md-6"    ),
   "setting_links"          => array(     "title" => "Social Media Links"     ,     "type" => "text"   ,       "class" => "col-md-12"    ) 

);
//------------------------------------------------
echo'
<div class="row">
<div class="col-lg-12">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title mb-4">Edit Info</h4>
         <div class="clearfix"></div>
         <form action="setting.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="setting_id" value="'.$_GET['id'].'">
            <div class="row">';
               foreach ($Fields as $key => $value) {
                  echo'
                  <div class="'.$value['class'].'">
                     <div class="form-group">
                        <label for="'.$key.'">'.$value['title'].' <span class="text text-danger"> * </span></label>
                        <input type="'.$value['type'].'" class="form-control" name="'.$key.'" value="'.$value_gallery[$key].'" id="'.$key.'">
                     </div>
                  </div>';
               }
               echo'                          
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="setting_desc"> Details </label>
                     <textarea id="setting_desc" name="setting_desc" class="form-control summernote">'.$value_gallery['setting_desc'].'</textarea>
                  </div>
               </div>                
            </div>
            <div class="mt-4 float-right" >
               <a href="setting.php" class="btn btn-dark w-md">Cancel</a>
               <button type="submit" name="edit_setting" class="btn btn-primary w-md">Save Changes</button>
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