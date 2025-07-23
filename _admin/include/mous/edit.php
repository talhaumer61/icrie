<?php
//------------------------------------------------
if(!LMS_VIEW && isset($_GET['id'])) { 

//------------------------------------------------
$sqllms = $dblms->querylms("SELECT * FROM ".MOUS." WHERE mou_id =  ".cleanvars($_GET['id'])." ");
$value_mou = mysqli_fetch_assoc($sqllms);

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
         <h4 class="card-title mb-4">Edit MOU</h4>
         <div class="clearfix"></div>
         <form action="mous.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="mou_id" value="'.$_GET['id'].'">
            <div class="row">';
               foreach ($Fields as $key => $value) {
               echo'
               <div class="'.$value['class'].'">
                  <div class="form-group">
                     <label for="'.$key.'">'.$value['title'].' <span class="text text-danger"> * </span></label>
                     <input type="'.$value['type'].'" class="form-control" name="'.$key.'" value="'.$value_mou[$key].'" id="'.$key.'" required>
                  </div>
               </div>';
               }
               echo'                          
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="mou_photo"> Blog Photo <span class="text text-danger">(Dimensions: 1200 * 900) </span></label>
                     <input type="file" id="mou_photo" name="mou_photo" class="form-control" >
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="mou_status"> Status <span class="text text-danger"> * </span></label>
                     <select name="mou_status" id="mou_status" class="form-control select2" required>
                        <option value=""></option>';
                        foreach($admstatus 	as $adm_status) {
                           if($value_mou['mou_status'] == $adm_status['status_id']){
                              echo'<option value="'.$adm_status['status_id'].'" selected>'.$adm_status['status_name'].'</option>';
                           } else {
                              echo'<option value="'.$adm_status['status_id'].'">'.$adm_status['status_name'].'</option>';
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
                     <label for="mou_detail"> Details </label>
                     <textarea id="mou_detail" name="mou_detail" class="form-control summernote">'.$value_mou['mou_detail'].'</textarea>
                  </div>
               </div>
            </div>
            <div class="mt-4 float-right" >
               <a href="mous.php" class="btn btn-dark w-md">Cancel</a>
               <button type="submit" name="edit_mou" class="btn btn-primary w-md">Save Changes</button>
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