<?php
//------------------------------------------------
if(!LMS_VIEW && isset($_GET['id'])) { 

$sqllms = $dblms->querylms("SELECT * FROM ".FEATURE." WHERE f_id =  ".cleanvars($_GET['id'])." ");
$value_gallery = mysqli_fetch_assoc($sqllms);
//------------------------------------------------
$Fields = array(

   "f_title"          => array(     "title" => "Title"        ,    "type" => "text"   ,       "class" => "col-md-12"    )
   // "about_img"            => array(     "title" => "Image"   ,    "type" => "file"   ,       "class" => "col-md-6"    ) 

);
//------------------------------------------------
echo'
<div class="row">
<div class="col-lg-12">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title mb-4">Edit Info</h4>
         <div class="clearfix"></div>
         <form action="feature.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="f_id" value="'.$_GET['id'].'">
            <div class="row">
               ';
               foreach ($Fields as $key => $value) {
               echo'
               <div class="'.$value['class'].'">
                  <div class="form-group">
                     <label for="'.$key.'">'.$value['title'].' <span class="text text-danger"> * </span></label>
                     <input type="'.$value['type'].'" class="form-control" name="'.$key.'" value="'.$value_gallery[$key].'" id="'.$key.'">
                  </div>
               </div>
               ';
               }
               echo'                          
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="blog_detail"> Details </label>
                     <textarea id="blog_detail" name="f_detail" class="form-control summernote">'.$value_gallery['f_des'].'</textarea>
                  </div>
               </div>                
            </div>
            <div class="mt-4 float-right" >
               <a href="feature.php" class="btn btn-dark w-md">Cancel</a>
               <button type="submit" name="edit_f" class="btn btn-primary w-md">Save Changes</button>
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