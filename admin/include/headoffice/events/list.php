<?php
$search_word    = '';
$search_query   = '';
$filters        = 'search&'.$redirection.'';

if (!empty($_GET['search_word'])) {
    $search_word     = $_GET['search_word'];
    $search_query   .= 'AND (cat_name LIKE "%'.$search_word.'%")';
    $filters        .= '&search_word='.$search_word.'';
}

$condition = array ( 
                     'select'       =>  "event_id, event_status, event_title, event_type, event_date, event_place, event_photo"
                    ,'where' 	    =>  array( 
                                                 'event_status'    => 1
                                                ,'is_deleted'       => 0
                                            )
                    ,'return_type'  =>  'all' 
                   ); 
$events = $dblms->getRows(EVENTS, $condition);
echo'
<div class="row">
    <div class="col-sm-6">
        <h3 class="fw-bold">'.moduleName(false).'</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">'.moduleName(false).'</li>
        </ol>
    </div>
    <div class="col-sm-6">
        <div class="bookmark">
            <a class="btn btn-primary btn-sm" href="events.php?view=add"><i class="fas fa-plus-circle me-1"></i>'.moduleName(false).'</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="display" id="basic-1">
                        <thead>
                            <tr>
                                <th width="20" class="text-center">Sr.</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Type</th>
                                <th width="50" class="text-center">Status</th>
                                <th width="50" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $srno=0;
                            if ($events) {
                                foreach ($events as $row) { 
                                    $event_img = SITE_URL.'uploads/images/default.png';
                                    $file_url = SITE_URL.'uploads/images/events/'.$row['event_photo'];
                                    if (check_file_exists($file_url)) {
                                        $event_img = $file_url;
                                    }
                                    
                                    $srno++;
                                    echo'                        
                                    <tr>
                                        <td class="text-center">'.$srno.'</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <div class="avatar-sm bg-light rounded p-1">
                                                        <img class="img-40" src="'.$event_img.'" alt="">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="fw-bold">'.$row['event_title'].'</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>'.$row['event_date'].'</td>
                                        <td>'.get_eventtype($row['event_type']).'</td>
                                        <td class="text-center">'.get_status($row['event_status']).'</td>
                                        <td class="text-center">
                                            <a class="btn btn-secondary btn-xs" href="events.php?view=edit&edit_id='.$row['event_id'].'"><i class="fa fa-pencil"></i> </a>
                                            <a class="btn btn-danger btn-xs" onclick="confirm_modal(\''.moduleName().'.php?deleteid='.$row['event_id'].'\');"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>';
                                }
                            }
                            echo'
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>';
?>