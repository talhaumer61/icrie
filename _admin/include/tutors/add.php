<?php
if(LMS_VIEW == 'add' && !isset($_GET['id'])) { 

    $Fields = array(
                    "tutor_name"             => array(     "title" => "Full Name"    ,       "class" => "col-md-4"  , "require" => "required"  ) ,
                    "tutor_degree"           => array(     "title" => "Degree"       ,       "class" => "col-md-4"  , "require" => "required"  ) ,
                    "tutor_designation"      => array(     "title" => "Designation"  ,       "class" => "col-md-4"  , "require" => "required"  )
                   );
    echo'
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add New Tutor</h4>
                    <div class="clearfix"></div>
                    <form action="tutors.php" method="post"enctype="multipart/form-data" autocomplete="off">
                        <div class="row">';
                        foreach ($Fields as $key => $value) {
                            echo'
                            <div class="'.$value['class'].'">
                                <div class="form-group">
                                    <label for="'.$key.'">'.$value['title'].' <span class="text text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="'.$key.'" id="'.$key.'" required>
                                </div>
                            </div>';
                        }
                        echo'                          
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tutor_email"> Email <span class="text text-danger"> * </span></label>
                                    <input type="email" id="tutor_email" name="tutor_email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tutor_phone">Phone <span class="text text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="tutor_phone" id="tutor_phone" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tutor_skype">Skype <span class="text text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="tutor_skype" id="tutor_skype" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tutor_description"> Description <span class="text text-danger"> * </span></label>
                                    <textarea id="" name="tutor_description" rows="5" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tutor_img"> Photo <span class="text text-danger"> (Dimensions: 426 * 426) * </span></label>
                                    <input type="file" id="tutor_img" name="tutor_img" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tutor_fb">Facebook <span class="text text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="tutor_fb" id="tutor_fb" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tutor_twitter">Twiter <span class="text text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="tutor_twitter" id="tutor_twitter" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tutor_linkedin">LinkedIn <span class="text text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="tutor_linkedin" id="tutor_linkedin" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tutor_insta">Instagram <span class="text text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="tutor_insta" id="tutor_insta" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tutor_status"> Status <span class="text text-danger"><span class="text text-danger"> * </span></label>
                                    <select name="tutor_status" id="tutor_status" class="form-control select2" required>
                                        <option value=""></option>';
                                        foreach($admstatus 	as $adm_status) {
                                            echo'<option value="'.$adm_status['status_id'].'">'.$adm_status['status_name'].'</option>';
                                        }
                                        echo '
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 float-right" >
                            <a href="tutors.php" class="btn btn-dark w-md">Cancel</a>
                            <button type="submit" name="submit_tutor" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".select2").select2({
        
            placeholder: "Select Any Option"
        
        })
    </script>';
}