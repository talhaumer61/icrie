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
                     'select'       =>  "f.functions_id, f.functions_status, f.functions_photo, f.functions_title, f.functions_desc, f.id_type, t.team_name"
                    ,'join'         =>  "INNER JOIN ".TEAMS." t ON f.id_team=t.team_id"
                    ,'where' 	    =>  array( 
                                                 'f.functions_status'    => 1
                                                ,'f.is_deleted'       => 0
                                            )
                    ,'return_type'  =>  'all' 
                   ); 
$function = $dblms->getRows(FUNCTIONS.' f', $condition);
echo'
<div class="row">
    <div class="col-sm-6">
        <h3 class="fw-bold">'.moduleName(false).'</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">'.moduleName(false).'</li>
            <li class="breadcrumb-item">List</li>
        </ol>
    </div>
    <div class="col-sm-6">
        <div class="bookmark">
            <a class="btn btn-primary btn-sm" href="functions.php?view=add"><i class="fas fa-plus-circle me-1"></i>'.moduleName(false).'</a>
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
                                <th>Type</th>
                                <th>Author</th>
                                <th width="50" class="text-center">Status</th>
                                <th width="70" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $srno=0;
                            if ($function) {
                                foreach ($function as $row) { 
                                    // $slider_img = ((!empty($row['slider_img']) && check_file_exists('uploads/images/slider/'.$row['slider_img'])) ? .'uploads/images/slider/'.$row['slider_img'] : 'uploads/images/default.png');
                                    $func_img = SITE_URL.'uploads/images/default.png';
                                    $file_url = SITE_URL.'uploads/images/functions/'.$row['functions_photo'];
                                    if (check_file_exists($file_url)) {
                                        $func_img = $file_url;
                                    }
                                    
                                    $srno++;
                                    echo'                        
                                    <tr>
                                        <td class="text-center">'.$srno.'</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <div class="avatar-sm bg-light rounded p-1">
                                                        <img class="img-40" src="'.$func_img.'" alt="">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="fw-bold">'.$row['functions_title'].'</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>'.get_functiontypes($row['id_type']).'</td>
                                        <td class="text-center">'.($row['team_name']).'</td>
                                        <td class="text-center">'.get_status($row['functions_status']).'</td>
                                        <td class="text-center">
                                            <a class="btn btn-secondary btn-xs" href="functions.php?view=edit&edit_id='.$row['functions_id'].'"><i class="fa fa-pencil"></i> </a>
                                            <a class="btn btn-danger btn-xs" onclick="confirm_modal(\''.moduleName().'.php?deleteid='.$row['functions_id'].'\');"><i class="fa fa-trash"></i></a>
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