<?php
if(!LMS_VIEW && isset($_GET['id'])) { 
   $sqllms = $dblms->querylms("SELECT * 
                                 FROM ".FUNCTIONS." 
                                 WHERE functions_id =  ".cleanvars($_GET['id'])." 
                             ");
   $row    = mysqli_fetch_array($sqllms);
   
   $Fields = [
      "functions_photo"   => array(  "type" => "file" ,   "title" => "Thumbnail <span class=\"text-info\">(png, jpg)</span>"                              ,       "class" => "col-md-6"   , "require" => ""  ),
      "functions_file[]"  => array(  "type" => "file" ,   "title" => "Attachments <span class=\"text-info\">(exel, word, pdf, pow er point)</span>"       ,       "class" => "col-md-6"   , "require" => ""  ),
      "functions_title"   => array(  "type" => "text" ,   "title" => "Title"                                                                              ,       "class" => "col-md-6"   , "require" => "required"  ),
   ];
   echo'
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title mb-4">Edit Functions</h4>
               <div class="clearfix"></div>
                  <form action="functions.php" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="functions_id" value="'.$_GET['id'].'">
                     <div class="row">';
                        foreach ($Fields as $key => $value): echo'
                        <div class="'.$value['class'].'">
                           <label for="'.$key.'">'.$value['title'].' '.((!empty($value['require']))? '<span class="text text-danger"> * </span>': '').'</label>
                           <input type="'.$value['type'].'" value="'.$row[$key].'" class="form-control" name="'.$key.'" id="'.$key.'" '.((!empty($value['require']))? 'required': '').' multiple="multiple">
                        </div>';
                        endforeach;
                        echo'                          
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="id_functions"> Type <span class="text text-danger"> * </span></label>
                              <select name="id_functions" id="id_functions" class="form-control select3" required>
                                 <option value=""></option>';
                                 foreach(get_functiontypes() as $key => $val) {
                                    if($row['id_functions'] == $key){
                                       echo'<option value="'.$key.'" selected>'.$val.'</option>';
                                    } else {
                                       echo'<option value="'.$key.'">'.$val.'</option>';
                                    }
                                 }                           
                                 echo '
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                                <label for="functions_status"> Members <span class="text text-danger"><span class="text text-danger"> * </span></label>
                                <select name="id_team" id="id_team" class="form-control select3" required>
                                    <option value=""></option>';
                                        $sqllms = array ( 
                                                            'select' 		      =>	'
                                                                                          team_id 
                                                                                        , team_name 
                                                                                    '
                                                        , 'where' 		      =>	array( 
                                                                                              'is_deleted'	=> '0' 
                                                                                            , 'team_status'	=> '1' 
                                                                                         )
                                                        , 'return_type' 	   => 'all' 
                                                    ); 
                                        $rows    = $dblms->getRows(TEAMS, $sqllms);
                                        foreach($rows as $key => $val):
                                            echo'<option value="'.$val['team_id'].'" '.(($val['team_id'] == $row['id_team'])? 'selected': '').'>'.$val['team_name'].'</option>';
                                        endforeach;
                                    echo '
                                </select>
                            </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="functions_status"> Status <span class="text text-danger"> * </span></label>
                              <select name="functions_status" id="functions_status" class="form-control select2" required>
                                 <option value=""></option>';
                                 foreach($admstatus 	as $adm_status) {
                                    if($row['functions_status'] == $adm_status['status_id']){
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
                              <label for="functions_desc"> Description <span class="text text-danger"> * </span></label>
                              <textarea id="functions_desc" name="functions_desc" class="form-control" summernote required>'.$row['functions_desc'].'</textarea>
                           </div>
                        </div>
                     </div>
                     <div class="mt-4 float-right" >
                        <a href="functions.php" class="btn btn-dark w-md">Cancel</a>
                        <button type="submit" name="edit_function" class="btn btn-primary w-md">Save Changes</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script>
      $(".select2").select2({ placeholder: "Select Any Option" })
      $(".select3").select2({ placeholder: "Select Any Option" })
   </script>';
}
?>