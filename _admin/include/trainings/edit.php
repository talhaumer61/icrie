<?php
//------------------------------------------------
if(!LMS_VIEW && isset($_GET['id'])) { 

$sqllms = $dblms->querylms("SELECT * FROM ".TRAININGS." WHERE training_id =  ".cleanvars($_GET['id'])." ");
$value_training = mysqli_fetch_assoc($sqllms);
//------------------------------------------------
$Fields = array(
   "training_title"        =>  array(  "title" => "Title"     ,    "type" => "text"  ,     "class" => "col-md-6"  ) ,
   "training_date"       	=>  array(  "title" => "Date"      ,    "type" => "date"  ,     "class" => "col-md-6"  )        
);
//------------------------------------------------

echo'
<div class="row">
<div class="col-lg-12">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title mb-4">Edit Training</h4>
         <div class="clearfix"></div>
         <form action="trainings.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="training_id" value="'.$_GET['id'].'">
            <div class="row">
               ';
               foreach ($Fields as $key => $value) {
               echo'
               <div class="'.$value['class'].'">
                  <div class="form-group">
                     <label for="'.$key.'">'.$value['title'].' <span class="text text-danger"> * </span></label>
                     <input type="'.$value['type'].'" class="form-control" name="'.$key.'" value="'.$value_training[$key].'" id="'.$key.'" required>
                  </div>
               </div>
               ';
               }
               echo'                          
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="training_photo"> Blog Photo </label>
                     <input type="file" id="training_photo" name="training_photo" class="form-control" >
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="training_status"> Status <span class="text text-danger"> * </span></label>
                     <select name="training_status" id="training_status" class="form-control select2" required>
                        <option value=""></option>
                        ';
                        foreach($admstatus 	as $adm_status) {
                        if($value_training['training_status'] == $adm_status['status_id']){
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
            <div class="row">
               <div class="col-md-12">
                     <div class="form-group">
                        <label for="training_brief_detail"> Brief Detail </label>
                        <textarea id="training_brief_detail" name="training_brief_detail" class="form-control">'.$value_training['training_brief_detail'].'</textarea>
                     </div>
               </div>
               <div class="col-12">  
                   <div class="form-group">
                       <label for="training_detail"> Detail </label>
                       <textarea id="training_detail" name="training_detail" class="form-control summernote">'.$value_training['training_detail'].'</textarea>
                   </div>
               </div>
            </div>
            <div class="mt-4 float-right" >
               <a href="trainings.php" class="btn btn-dark w-md">Cancel</a>
               <button type="submit" name="edit_training" class="btn btn-primary w-md">Save Changes</button>
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