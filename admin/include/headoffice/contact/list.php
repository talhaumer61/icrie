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
                     'select'       =>  "info_id, info_status, info_phone, info_mail_1, info_mail_2, info_web, info_location"
                    ,'where' 	    =>  array( 
                                                 'info_status'    => 1
                                            )
                    ,'return_type'  =>  'single' 
                   ); 
$row = $dblms->getRows(CONTACT_INFO, $condition);
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
            <a class="btn btn-secondary btn-sm" onclick="showAjaxModalZoom(\'include/modals/'.moduleName().'/edit.php?view='.moduleName().'&edit_id='.$row['info_id'].'\');"><i class="fas fa-edit me-1"></i> Edit '.moduleName(false).'</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">';
                if($row){
                    echo'
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th width="120">Website Name</th>
                                    <td>'.$row['info_web'].'</td>
                                    <th width="120">Status</th>
                                    <td>'.get_status($row['info_status']).'</td>
                                </tr>
                                <tr>
                                    <th width="120">Phone</th>
                                    <td colspan="3">'.$row['info_phone'].'</td>
                                </tr>
                                <tr>
                                    <th width="120">Email 1</th>
                                    <td>'.$row['info_mail_1'].'</td>
                                    <th width="120">Email 2</th>
                                    <td>'.$row['info_mail_2'].'</td>
                                </tr>
                                <tr>
                                    <th width="120">Address</th>
                                    <td colspan="3">'.$row['info_location'].'</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>';
                } else {
                    echo'<h5 class="text-center text-danger py-5">No Record Found</h5>';
                }
                echo'
            </div>
        </div>
    </div>
</div>';
?>