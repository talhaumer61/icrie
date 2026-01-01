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
                     'select'       =>  "faq_id, faq_status, faq_qns"
                    ,'where' 	    =>  array( 
                                                 'faq_status'    => 1
                                                ,'is_deleted'       => 0
                                            )
                    ,'return_type'  =>  'all' 
                   ); 
$faq = $dblms->getRows(FAQ, $condition);
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
            <a class="btn btn-primary btn-sm" href="faq.php?view=add"><i class="fas fa-plus-circle me-1"></i>'.moduleName(false).'</a>
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
                                <th>Question</th>
                                <th width="50" class="text-center">Status</th>
                                <th width="70" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $srno=0;
                            if ($faq) {
                                foreach ($faq as $row) { 
                                    $srno++;
                                    echo'                        
                                    <tr>
                                        <td class="text-center">'.$srno.'</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <div class="fw-bold">'.$row['faq_qns'].'</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">'.get_status($row['faq_status']).'</td>
                                        <td class="text-center">
                                            <a class="btn btn-secondary btn-xs" href="faq.php?view=edit&edit_id='.$row['faq_id'].'"><i class="fa fa-pencil"></i> </a>
                                            <a class="btn btn-danger btn-xs" onclick="confirm_modal(\''.moduleName().'.php?deleteid='.$row['faq_id'].'\');"><i class="fa fa-trash"></i></a>
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