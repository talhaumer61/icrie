<?php
if(LMS_VIEW == 'add' && !isset($_GET['id'])) { 

    $Fields = array(
                          "functions_file[]"      => array(  "type" => "file" ,   "title" => "Attachments"      ,       "class" => "col-md-6"   , "require" => ""  )
                        , "functions_title"     => array(  "type" => "text" ,   "title" => "Title"            ,       "class" => "col-md-6"   , "require" => "required"  )
                   );
    echo'
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add Function</h4>
                    <form action="functions.php?view=add" method="post"enctype="multipart/form-data" autocomplete="off">
                        <div class="row form-group">';
                            foreach ($Fields as $key => $value): echo'
                                <div class="'.$value['class'].'">
                                    <label for="'.$key.'">'.$value['title'].' '.((!empty($value['require']))? '<span class="text text-danger"> * </span>': '').'</label>
                                    <input type="'.$value['type'].'" class="form-control" name="'.$key.'" id="'.$key.'" '.((!empty($value['require']))? 'required': '').' multiple="multiple">
                                </div>';
                            endforeach; echo'                        
                            <div class="col-md-6">
                                <label for="functions_status"> Status <span class="text text-danger"><span class="text text-danger"> * </span></label>
                                <select name="id_functions" id="id_functions" class="form-control select3" required>
                                    <option value=""></option>';
                                        foreach(get_functiontypes() as $key => $val):
                                            echo'<option value="'.$key.'">'.$val.'</option>';
                                        endforeach;
                                    echo '
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="function_status"> Status <span class="text text-danger"><span class="text text-danger"> * </span></label>
                                <select name="functions_status" class="form-control select2" required>
                                    <option value=""></option>';
                                        foreach($admstatus 	as $adm_status):
                                            echo'<option value="'.$adm_status['status_id'].'">'.$adm_status['status_name'].'</option>';
                                        endforeach;
                                    echo '
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="functions_desc"> Description <span class="text text-danger"> * </span></label>
                                <textarea name="functions_desc" rows="5" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="mt-4 float-right">
                            <a href="functions.php" class="btn btn-dark w-md">Cancel</a>
                            <button type="submit" name="submit_function" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".select2").select2({ placeholder: "Select Any Option" })
        $(".select3").select2({ placeholder: "Select Any Option" })
    </script>';
}