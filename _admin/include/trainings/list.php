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
$sqllms  = $dblms->querylms("SELECT training_id, training_status, training_title, training_date, training_photo
                                    FROM ".TRAININGS." 
                                    WHERE training_id != ''
                                    $sql2
                                    ORDER BY training_id DESC");
//--------------------------------------------------
$count = mysqli_num_rows($sqllms);
if($page == 0) { $page = 1; }						//if no page var is given, default to 1.
$prev 		= $page - 1;							//previous page is page - 1
$next 		= $page + 1;							//next page is page + 1
$lastpage	= ceil($count/$Limit);					//lastpage is = total pages / items per page, rounded up.
$lpm1 		= $lastpage - 1;
//------------------------------------------------    
$sqllms  = $dblms->querylms("SELECT training_id, training_status, training_title, training_date, training_photo
                                    FROM ".TRAININGS." 
                                    WHERE training_id != ''
                                    $sql2
                                    ORDER BY training_id DESC LIMIT ".($page-1)*$Limit .",$Limit");
//------------------------------------------------    
echo'
<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title mb-4 float-left"> <i class="fa fa-briefcase"></i> Trainings List</h4>
            <div class="card-title mb-4 float-right"> 
               <a href="trainings.php" class="btn btn-primary"><i class="fa fa-list"></i> All </a>
               <a href="?view=add" class="btn btn-success"><i class="fa fa-plus"></i> Add New </a>
            </div>
            <div class="clearfix"></div>
            <div class="table-responsive">
               <table class="table mb-0">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     ';
                     $srno = 0 ;
                     //------------------------------------------------
                     while($value_training = mysqli_fetch_array($sqllms)) {
                     //------------------------------------------------
                     $srno++;
                     echo'
                     <tr>
                        <th scope="row">'.$srno.'</th>
                        <td class="align-middle">
                           <img src="../images/training/'.$value_training['training_photo'].'" alt="'.$value_training['training_title'].'" class="rounded-circle avatar-sm">
                        </td>
                        <td>'.$value_training['training_date'].'</td>
                        <td>'.$value_training['training_title'].'</td>
                        <td>'.get_admstatus($value_training['training_status']).'</td>
                        <td>
                           <a href="?id='.$value_training['training_id'].'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        </td>
                     </tr>
                     ';
                     }
                     echo'    
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
'; 
}