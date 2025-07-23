<?php

if(!LMS_VIEW && isset($_GET['id'])) { 

$sqllms = $dblms->querylms("SELECT * FROM ".FAQ." WHERE faq_id =  ".cleanvars($_GET['id'])." ");
$value_faq = mysqli_fetch_assoc($sqllms);

echo'
<div class="row">
<div class="col-lg-12">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title mb-4">Edit FAQ</h4>
         <div class="clearfix"></div>
         <form action="faq.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="faq_id" value="'.$_GET['id'].'">
            
            <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="faq_qns"> QNA  <span class="text-danger"> * </span> </label>

                  <input type="faq_qns" class="form-control" name="faq_qns" value="'.$value_faq['faq_qns'].'"  required>
               </div>
             </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="faq_status"> Status <span class="text text-danger"> * </span></label>
                     <select name="faq_status" id="faq_status" class="form-control select2" required>
                        <option value=""></option>
                        ';
                        foreach($admstatus 	as $adm_status) {
                           if($value_faq['faq_status'] == $adm_status['status_id']){
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
                     <label for="faq_ans"> ANS <span class="text-danger"> * </span> </label>
                     <textarea id="faq_ans" name="faq_ans" class="form-control summernote" required>'.$value_faq['faq_ans'].'</textarea>
                  </div>
               </div>
            </div>
            <div class="mt-4 float-right" >
               <a href="faq.php" class="btn btn-dark w-md">Cancel</a>
               <button type="submit" name="edit_faq" class="btn btn-primary w-md">Save Changes</button>
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