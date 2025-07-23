<?php
//------------------------------------------------
if(LMS_VIEW == 'add' && !isset($_GET['id'])) { 

//------------------------------------------------
$Fields = array(
    "event_title"        =>  array(  "title" => "Title"     ,    "type" => "text"  ,     "class" => "col-md-6"  ) ,
    "event_date"       	 =>  array(  "title"  => "Date"      ,    "type" => "date"  ,     "class" => "col-md-6"  )                
);
$Fields2 = array(
    "event_time"        =>  array(  "title" => "Time"     ,    "type" => "text"  ,     "class" => "col-md-6"  ) ,
    "event_place"       =>  array(  "title"  => "Place"      ,    "type" => "text"  ,     "class" => "col-md-6"  )                
);
//------------------------------------------------

echo'
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add New Event</h4>
                <div class="clearfix"></div>
                <form action="events.php" method="post"enctype="multipart/form-data" autocomplete="off">
                    <div class="row">';
                    foreach ($Fields as $key => $value) {
                    echo'
                    <div class="'.$value['class'].'">
                        <div class="form-group">
                            <label for="'.$key.'">'.$value['title'].' <span class="text text-danger"> * </span></label>
                            <input type="'.$value['type'].'" class="form-control" name="'.$key.'" id="'.$key.'" required>
                        </div>
                    </div>';
                    }
                    echo'                          
                    </div>
                    <div class="row">';
                    foreach ($Fields2 as $key => $value) {
                    echo'
                    <div class="'.$value['class'].'">
                        <div class="form-group">
                            <label for="'.$key.'">'.$value['title'].' <span class="text text-danger"> * </span></label>
                            <input type="'.$value['type'].'" class="form-control" name="'.$key.'" id="'.$key.'" required>
                        </div>
                    </div>';
                    }
                    echo'                          
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="event_photo"> Training Photo <span class="text text-danger">(Dimensions: 1200 * 900) </span></label>
                                <input type="file" id="event_photo" name="event_photo" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="event_type"> Type <span class="text text-danger"> * </span></label>
                                <select name="event_type" id="event_type" class="form-control select2" required>
                                    <option value=""></option>';
                                    foreach($eventtype 	as $type) {
                                        echo'<option value="'.$type['id'].'">'.$type['name'].'</option>';
                                    }
                                    echo '
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="event_status"> Status <span class="text text-danger"> * </span></label>
                                <select name="event_status" id="event_status" class="form-control select2" required>
                                    <option value=""></option>';
                                    foreach($admstatus 	as $adm_status) {
                                        echo'<option value="'.$adm_status['status_id'].'">'.$adm_status['status_name'].'</option>';
                                    }
                                    echo '
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="event_brief_detail"> Brief Detail </label>
                                <textarea id="event_brief_detail" name="event_brief_detail" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-12">  
                            <div class="form-group">
                                <label for="event_detail"> Detail </label>
                                <textarea id="event_detail" name="event_detail" class="form-control summernote"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 float-right" >
                    <a href="events.php" class="btn btn-dark w-md">Cancel</a>
                    <button type="submit" name="submit_event" class="btn btn-primary w-md">Submit</button>
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