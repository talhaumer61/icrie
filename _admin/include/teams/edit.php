<?php
//------------------------------------------------
if(!LMS_VIEW && isset($_GET['id'])) { 

$sqllms = $dblms->querylms("SELECT * FROM ".TEAMS." WHERE team_id =  ".cleanvars($_GET['id'])." ");
$value_team = mysqli_fetch_assoc($sqllms);
//------------------------------------------------
$Fields = array(
    
   "team_name"             => array(     "title" => "Full Name"    ,       "class" => "col-md-4"  , "require" => "required"  ) ,
   "team_degree"           => array(     "title" => "Degree"       ,       "class" => "col-md-4"  , "require" => "required"  ) ,
   "team_designation"      => array(     "title" => "Designation"  ,       "class" => "col-md-4"  , "require" => "required"  )

);
//------------------------------------------------
$sqllms  = $dblms->querylms("SELECT team_id, team_status, team_name, id_priority
                                FROM ".TEAMS."
                                WHERE is_deleted = '0'
                                ORDER BY id_priority ASC");

echo'
<div class="row">
<div class="col-lg-12">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title mb-4">Edit Team Member</h4>
         <div class="clearfix"></div>
         <form action="teams.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="team_id" value="'.$_GET['id'].'">
            <div class="row">';
               foreach ($Fields as $key => $value) {
               echo'
               <div class="'.$value['class'].'">
                  <div class="form-group">
                     <label for="'.$key.'">'.$value['title'].' <span class="text text-danger"> * </span></label>
                     <input type="text" class="form-control" name="'.$key.'" value="'.$value_team[$key].'" id="'.$key.'" required>
                  </div>
               </div>';
               }
               echo'                          
            </div>
            <div class="row">
               <div class="col-md-3">
                  <div class="form-group">
                     <label for="team_img"> Photo <span class="text text-danger"> (Dimensions: 426 * 426)</span></label>
                     <input type="file" id="team_img" name="team_img" class="form-control" >
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group">
                     <label for="team_type"> Priority <span class="text text-danger"><span class="text text-danger"> * </span></label>
                     <select name="id_priority" id="id_priority" class="form-control select2" required>
                        <option value=""></option>';
                        while($value_teams = mysqli_fetch_array($sqllms)) {
                              echo'<option value="'.$value_teams['id_priority'].'" '.($value_teams['id_priority'] == $value_team['id_priority']?'selected':'').'>Add After ('.$value_teams['team_name'].' - '.$value_teams['id_priority'].')</option>';
                        }
                        echo '
                     </select>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group">
                     <label for="team_type"> Type <span class="text text-danger"> * </span></label>
                     <select name="id_type" id="id_type" class="form-control select2" required>
                        <option value=""></option>';
                        foreach($teamtype as $type) {
                           if($value_team['id_type'] == $type['id']){
                              echo'<option value="'.$type['id'].'" selected>'.$type['name'].'</option>';
                           } else {
                              echo'<option value="'.$type['id'].'">'.$type['name'].'</option>';
                           }
                        }
                        echo '
                     </select>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group">
                     <label for="team_status"> Status <span class="text text-danger"> * </span></label>
                     <select name="team_status" id="team_status" class="form-control select2" required>
                        <option value=""></option>';
                        foreach($admstatus 	as $adm_status) {
                           if($value_team['team_status'] == $adm_status['status_id']){
                              echo'<option value="'.$adm_status['status_id'].'" selected>'.$adm_status['status_name'].'</option>';
                           } else {
                              echo'<option value="'.$adm_status['status_id'].'">'.$adm_status['status_name'].'</option>';
                           }
                        }
                        echo '
                     </select>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="team_desc"> Description</label>
                        <textarea id="team_desc" name="team_desc" class="form-control summernote">'.$value_team['team_desc'].'</textarea>
                     </div>
               </div>
            </div>
            <div class="mt-4 float-right" >
               <a href="teams.php" class="btn btn-dark w-md">Cancel</a>
               <button type="submit" name="edit_team" class="btn btn-primary w-md">Save Changes</button>
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