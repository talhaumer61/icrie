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
                     'select'       =>  "gallery_id, gallery_status, gallery_photo, gallery_title"
                    ,'where' 	    =>  array( 
                                                 'gallery_status'    => 1
                                                ,'is_deleted'       => 0
                                            )
                    ,'return_type'  =>  'all' 
                   ); 
$gallery = $dblms->getRows(GALLERY, $condition);
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
                                <th>Title</th>
                                <th width="50" class="text-center">Status</th>
                                <th width="70" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $srno=0;
                            if ($gallery) {
                                foreach ($gallery as $row) { 
                                    $gallery_img = SITE_URL.'uploads/images/default.png';
                                    $file_url = SITE_URL.'uploads/images/gallery/'.$row['gallery_photo'];
                                    if (check_file_exists($file_url)) {
                                        $gallery_img = $file_url;
                                    }
                                    
                                    $srno++;
                                    echo'                        
                                    <tr>
                                        <td class="text-center">'.$srno.'</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <div class="avatar-sm bg-light rounded p-1">
                                                        <img class="img-40" src="'.$gallery_img.'" alt="">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="fw-bold">'.$row['gallery_title'].'</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">'.get_status($row['gallery_status']).'</td>
                                        <td class="text-center">
                                            <a class="btn btn-secondary btn-xs" onclick="showAjaxModalZoom(\'include/modals/'.moduleName().'/edit.php?view='.moduleName().'&edit_id='.$row['gallery_id'].'\');"><i class="fa fa-pencil"></i> </a>
                                            <a class="btn btn-danger btn-xs" onclick="confirm_modal(\''.moduleName().'.php?deleteid='.$row['gallery_id'].'\');"><i class="fa fa-trash"></i></a>
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