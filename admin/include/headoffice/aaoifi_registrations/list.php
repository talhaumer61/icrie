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
    'select'       =>  "reg_id, reg_fullname, reg_email, reg_phone, reg_certificate"
   ,'where' 	    =>  array( 
                                'reg_status'    => 1
                               ,'is_deleted'        => 0
                           )
   ,'return_type'  =>  'all' 
  ); 
$QUERIES = $dblms->getRows(AAOIFI_REGISTRATIONS, $condition);
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
                                    <th>Name</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Certificate Name</th>
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
                                        <td>'.$row['reg_fullname'].'</td>
                                        <td class="text-center">'.$row['reg_phone'].'</td>
                                        <td class="text-center">'.$row['reg_email'].'</td>
                                        <td class="text-center">'.$row['reg_certificate'].'</td>
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