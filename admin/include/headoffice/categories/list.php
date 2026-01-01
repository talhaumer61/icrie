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
                     'select'       =>  "cat_id, cat_status, cat_name, cat_code, cat_icon, cat_photo, cat_description"
                    ,'where' 	    =>  array( 
                                                'is_deleted'    => 0
                                            )
                    ,'search_by'    =>  ''.$search_query.''
                    ,'order_by'     =>  'cat_id DESC'
                    ,'return_type'  =>  'all' 
                   ); 
// $categories = $dblms->getRows(CATEGORIES, $condition);
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
            <a class="btn btn-primary btn-sm" onclick="showAjaxModalZoom(\'include/modals/'.moduleName().'/add.php?view='.moduleName().'\');"><i class="fas fa-plus-circle me-1"></i>'.moduleName(false).'</a>
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
                                <th>Name</th>
                                <th>Description</th>
                                <th width="50" class="text-center">Status</th>
                                <th width="70" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $srno=0;
                            if ($categories) {
                                foreach ($categories as $row) { 
                                    $cat_icon = ((!empty($row['cat_icon']) && file_exists('uploads/images/categories/icons/'.$row['cat_icon'])) ? 'uploads/images/categories/icons/'.$row['cat_icon'] : 'uploads/images/default.png');
                                    $srno++;
                                    echo'                        
                                    <tr>
                                        <td class="text-center">'.$srno.'</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <div class="avatar-sm bg-light rounded p-1">
                                                        <img class="img-40" src="'.$cat_icon.'" alt="">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="fw-bold">'.$row['cat_name'].'</div>
                                                    <div class="text-muted">'.$row['cat_code'].'</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>'.html_entity_decode($row['cat_description']).'</td>
                                        <td class="text-center">'.get_status($row['cat_status']).'</td>
                                        <td class="text-center">
                                            <a class="btn btn-secondary btn-xs" onclick="showAjaxModalZoom(\'include/modals/'.moduleName().'/edit.php?view='.moduleName().'&edit_id='.$row['cat_id'].'\');"><i class="fa fa-pencil"></i> </a>
                                            <a class="btn btn-danger btn-xs" onclick="confirm_modal(\''.moduleName().'.php?deleteid='.$row['cat_id'].'\');"><i class="fa fa-trash"></i></a>
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