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
                     'select'       =>  "setting_id , setting_status, setting_email, setting_web_name, setting_desc"
                    ,'where' 	    =>  array( 
                                                 'setting_status'    => 1
                                                ,'is_deleted'       => 0
                                            )
                    ,'return_type'  =>  'single' 
                   ); 
$row = $dblms->getRows(SETTING, $condition);
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
            <a class="btn btn-secondary btn-sm" href="settings.php?view=edit&edit_id='.$row['setting_id'].'"><i class="fas fa-edit me-1"></i> Edit '.moduleName(false).'</a>
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
                                    <td>'.$row['setting_web_name'].'</td>
                                    <th width="120">Status</th>
                                    <td>'.get_status($row['setting_status']).'</td>
                                </tr>
                                <tr>
                                    <th width="120">Email</th>
                                    <td colspan="3">'.$row['setting_email'].'</td>
                                </tr>
                                <tr>
                                    <th width="120">Description</th>
                                    <td colspan="3">'.$row['setting_desc'].'</td>
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
</div>
';
?>