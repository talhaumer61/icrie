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
    'select'       =>  "fatwa_id, fatwa_fullname, fatwa_phone, fatwa_email, fatwa_detail"
   ,'where' 	    =>  array( 
                                'fatwa_status'    => 1
                               ,'is_deleted'        => 0
                           )
   ,'return_type'  =>  'all' 
  ); 
$QUERIES = $dblms->getRows(FATWA_REQUESTS, $condition);
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
                                    <th>Full Name</th>
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
                                        <td>'.$row['fatwa_fullname'].'</td>
                                        <td class="text-center">'.$row['fatwa_phone'].'</td>
                                        <td class="text-center">'.$row['fatwa_email'].'</td>
                                        <td class="text-center">
                                            <a class="btn btn-secondary btn-xs" onclick="showAjaxModalZoom(\''.SITE_URL.'include/modals/questions/view.php?view=question_detail&edit_id='.$row['fatwa_id'].'\');"><i class="fa-solid fa-eye"></i></a>
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