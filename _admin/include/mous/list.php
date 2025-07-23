<?php
//------------------------------------------------
$sql2 		    = '';
$sqlstring	    = "";
$search_term 	= (isset($_REQUEST['search_term'])  && $_REQUEST['search_term'] != '')  ? $_REQUEST['search_term']  : '';
$searchFeild 	= (isset($_REQUEST['searchFeild'])  && $_REQUEST['searchFeild'] != '')  ? $_REQUEST['searchFeild']  : '';
$searchOP 	    = (isset($_REQUEST['searchOP'])     && $_REQUEST['searchOP'] != '')     ? $_POST['searchOP']        : '';
// $type 		= (isset($_GET['type']) && $_GET['type'] != '') ? $_GET['type'] : '';
// $category 	= (isset($_GET['category']) && $_GET['category'] != '') ? $_GET['category'] : '';
//------------------------------------------------
if(!LMS_VIEW && !isset($_GET['id'])) {  
//------------------------------------------------
if(!($Limit)) 	{ $Limit = 50; } 
if($page)		{ $start = ($page - 1) * $Limit; } else {	$start = 0;	}
//------------------------------------------------
$sqllms  = $dblms->querylms("SELECT mou_id, mou_status, mou_title, mou_org, mou_date, mou_photo, mou_detail
                                    FROM ".MOUS." 
                                    WHERE mou_id != ''
                                    $sql2
                                    ORDER BY mou_id DESC");
//--------------------------------------------------
$count = mysqli_num_rows($sqllms);
if($page == 0) { $page = 1; }						//if no page var is given, default to 1.
$prev 		= $page - 1;							//previous page is page - 1
$next 		= $page + 1;							//next page is page + 1
$lastpage	= ceil($count/$Limit);					//lastpage is = total pages / items per page, rounded up.
$lpm1 		= $lastpage - 1;
//------------------------------------------------    
$sqllms  = $dblms->querylms("SELECT mou_id, mou_status, mou_title, mou_org, mou_date, mou_photo, mou_detail
                                    FROM ".MOUS." 
                                    WHERE mou_id != ''
                                    $sql2
                                    ORDER BY mou_id DESC LIMIT ".($page-1)*$Limit .",$Limit");
//------------------------------------------------    
echo'
<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title mb-4 float-left"> <i class="fa fa-signature"></i> MOUs List</h4>
            <div class="card-title mb-4 float-right"> 
               <a href="mous.php" class="btn btn-primary"><i class="fa fa-list"></i> All </a>
               <a href="?view=add" class="btn btn-success"><i class="fa fa-plus"></i> Add New </a>
            </div>
            <div class="clearfix"></div>
            <div class="table-responsive">
               <table class="table mb-0">
                  <thead>
                     <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Photo</th>
                        <th>Organization</th>
                        <th>Date</th>
                        <th>Title</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Options</th>
                     </tr>
                  </thead>
                  <tbody>
                     ';
                     $srno = 0 ;
                     //------------------------------------------------
                     while($value_mou = mysqli_fetch_array($sqllms)) {
                     //------------------------------------------------
                     $srno++;
                     echo'
                     <tr>
                        <th class="text-center">'.$srno.'</th>
                        <td class="text-center">
                           <img src="../images/mous/'.$value_mou['mou_photo'].'" alt="'.$value_mou['mou_date'].'" class="rounded-circle avatar-sm">
                        </td>
                        <td>'.$value_mou['mou_org'].'</td>
                        <td>'.$value_mou['mou_date'].'</td>
                        <td>'.$value_mou['mou_title'].'</td>
                        <td class="text-center">'.get_admstatus($value_mou['mou_status']).'</td>
                        <td class="text-center">
                           <a href="?id='.$value_mou['mou_id'].'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        </td>
                     </tr>';
                     }
                     echo'    
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>'; 
}