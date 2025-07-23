<?php
$search_word    = '';
$search_query   = '';
$filters        = 'search&'.$redirection.'';

if (!empty($_GET['search_word'])) {
    $search_word     = $_GET['search_word'];
    $search_query   .= 'AND (cat_name LIKE "%'.$search_word.'%")';
    $filters        .= '&search_word='.$search_word.'';
}

// QUERIES
$condition = array ( 
    'select'       =>  "contact_id, msg_subject, message, first_name, last_name, email, phone_number"
   ,'where' 	    =>  array( 
                                'contact_status'    => 1
                               ,'is_deleted'        => 0
                           )
   ,'return_type'  =>  'all' 
  ); 
$QUERIES = $dblms->getRows(QUERIES, $condition);
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
                                    <th>Subject</th>
                                    <th>First Name</th>
                                    <th class="text-center">Last Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $srno=0;
                            if ($QUERIES) {
                                foreach ($QUERIES as $row) { 
                                    $srno++;
                                    echo'                        
                                    <tr>
                                        <td class="text-center">'.$srno.'</td>
                                        <td>'.$row['msg_subject'].'</td>
                                        <td>'.$row['first_name'].'</td>
                                        <td class="text-center">'.$row['last_name'].'</td>
                                        <td class="text-center">'.$row['email'].'</td>
                                        <td class="text-center">'.$row['phone_number'].'</td>
                                        <td class="text-center">
                                            <a class="btn btn-secondary btn-xs" onclick="showAjaxModalZoom(\''.SITE_URL.'include/modals/email_queries/view.php?view=query_detail&edit_id='.$row['contact_id'].'\');"><i class="fa-solid fa-eye"></i></a>
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