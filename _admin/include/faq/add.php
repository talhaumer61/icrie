<?php
if(LMS_VIEW == 'add' && !isset($_GET['id'])) { 
    echo'
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add New FAQ</h4>
                    <div class="clearfix"></div>
                    <form action="faq.php" method="post"enctype="multipart/form-data" autocomplete="off">
                        <div class="row form-group">
                            <div class="col-md-8">
                                <label for="faq_qna"> QNA  <span class="text-danger"> * </span> </label>
                                <input type="faq_qns" class="form-control" name="faq_qns" value="'.$value_faq['faq_qns'].'"  required>
                            </div>
                            <div class="col-md-4">
                                <label for="faq_status"> Status <span class="text text-danger"> * </span></label>
                                <select name="faq_status" id="faq_status" class="form-control select2" required>
                                    <option value=""></option>';
                                    foreach($admstatus 	as $adm_status) {
                                        echo'<option value="'.$adm_status['status_id'].'">'.$adm_status['status_name'].'</option>';
                                    }
                                    echo '
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="faq_ans"> ANS  <span class="text-danger"> * </span> </label>
                                <textarea id="faq_ans" name="faq_ans" class="form-control summernote"></textarea>
                            </div>
                        </div>
                        <div class="mt-4 float-right">
                            <a href="faq.php" class="btn btn-dark w-md">Cancel</a>
                            <button type="submit" name="submit_faq" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script> $(".select2").select2({ placeholder: "Select Any Option" })</script>';
}