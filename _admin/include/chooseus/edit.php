<?php
if(!LMS_VIEW && isset($_GET['id'])) { 

   $sqllms = $dblms->querylms("SELECT * 
                              FROM ".CHOOSEUS." 
                              WHERE id =  ".cleanvars($_GET['id'])." 
                           ");
   $value_gallery = mysqli_fetch_assoc($sqllms);
   $Fields = array(
                     "photo_1"            => array(     "title" => "Photo 1"     ,    "type" => "file"   ,       "class" => "col-md-4"    ),
                     "photo_2"            => array(     "title" => "Photo 2"   ,    "type" => "file"   ,       "class" => "col-md-4"    ) ,
                     "photo_3"            => array(     "title" => "Photo 3"   ,    "type" => "file"   ,       "class" => "col-md-4"    ) 
                  );
   echo'
   <div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title mb-4">Edit Info</h4>
            <div class="clearfix"></div>
            <form action="chooseus.php" method="post" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="title">Title <span class="text text-danger"> * </span></label>
                        <input type="text" class="form-control" name="title" value="'.$value_gallery['title'].'" id="title" required>
                        <input type="hidden" name="id" value="'.$_GET['id'].'">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                        <div class="form-group">
                           <label for="description"> Description <span class="text text-danger"> * </span></label>
                           <textarea id="description" name="description" class="form-control summernote" required>'.$value_gallery['description'].'</textarea>
                        </div>
                  </div>
               </div>
               <div class="row">
                  ';
                  foreach ($Fields as $key => $value) {
                  echo'
                  <div class="'.$value['class'].'">
                     <div class="form-group">
                        <label for="'.$key.'">'.$value['title'].' </label>
                        <input type="'.$value['type'].'" class="form-control" name="'.$key.'" value="'.$value_gallery[$key].'" id="'.$key.'">
                     </div>
                  </div>
                  ';
                  }
                  echo'                          
               </div>
               <div class="mt-4 float-right" >
                  <a href="chooseus.php" class="btn btn-dark w-md">Cancel</a>
                  <button type="submit" name="edit_chooseus" class="btn btn-primary w-md">Save Changes</button>
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