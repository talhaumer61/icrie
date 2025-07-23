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

   //------------- Pagination ---------------------
   $sqlstring	    = "";
   $adjacents = 3;
   if(!($Limit)) 	{ $Limit = 30; } 
   if($page)		{ $start = ($page - 1) * $Limit; } else {	$start = 0;	}
   //------------------------------------------------
   $sqllms  = $dblms->querylms("SELECT grant_id
                                       FROM ".GRANTS." 
                                       WHERE grant_id != '' AND grant_type = '1'
                                       $sql2 ORDER BY grant_id DESC");
   //--------------------------------------------------
   $count = mysqli_num_rows($sqllms);
   if($page == 0) { $page = 1; }						//if no page var is given, default to 1.
   $prev 		    = $page - 1;							//previous page is page - 1
   $next 		    = $page + 1;							//next page is page + 1
   $lastpage  		= ceil($count/$Limit);					//lastpage is = total pages / items per page, rounded up.
   $lpm1 		    = $lastpage - 1;
   //------------------------------------------------    
   $sqllms  = $dblms->querylms("SELECT grant_id, grant_status, grant_title, is_international, grant_photo
                                       FROM ".GRANTS." 
                                       WHERE grant_id != '' AND grant_type = '1'
                                       $sql2
                                       ORDER BY grant_id DESC LIMIT ".($page-1)*$Limit .",$Limit");
   //------------------------------------------------    
echo'
<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title mb-4 float-left"> <i class="mdi mdi-cash-usd"></i> Recurring Grants & Fundings List</h4>
            <div class="card-title mb-4 float-right"> 
               <a href="recurring_grants_fundings.php" class="btn btn-primary"><i class="fa fa-list"></i> All </a>
               <a href="?view=add" class="btn btn-success"><i class="fa fa-plus"></i> Add New </a>
            </div>
            <div class="clearfix"></div>
            <div class="table-responsive">
               <table class="table mb-0">
                  <thead>
                     <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Photo</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Options</th>
                     </tr>
                  </thead>
                  <tbody>
                     ';
                     $srno = 0 ;
                     //------------------------------------------------
                     while($value_grant = mysqli_fetch_array($sqllms)) {
                     //------------------------------------------------
                        $srno++;
                        echo'
                        <tr>
                           <th class="text-center">'.$srno.'</th>
                           <td class="text-center">
                              <img src="../images/grants/recurring_grants/'.$value_grant['grant_photo'].'" alt="'.$value_grant['grant_title'].'" class="rounded-circle avatar-sm">
                           </td>
                           <td>'.$value_grant['grant_title' ].'</td>
                           <td>'.get_isinternational($value_grant['is_international']).'</td>
                           <td class="text-center">'.get_admstatus($value_grant['grant_status']).'</td>
                           <td class="text-center">
                              <a href="?id='.$value_grant['grant_id'].'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                           </td>
                        </tr>';
                     }
                     echo'    
                  </tbody>
               </table>';
               //-------------- Pagination ------------------
               if($count>$Limit) {
                  echo '
                  <div class="widget-foot">
                     <!--WI_PAGINATION-->
                     <ul class="pagination pagination-rounded justify-content-center mt-4">';
                        //-s-------------------------------------------------
                        $current_page = strstr(basename($_SERVER['REQUEST_URI']), '.php', true);
                        $filters = '';
                        //--------------------------------------------------
                        $pagination = "";
                        if($lastpage > 1) { 
                        //previous button
                        if ($page > 1) {
                           $pagination.= '<li class="page-item"><a class="page-link" href="'.$current_page.'.php?'.$filters .'&page='.$prev.$sqlstring.'"><span class="fa fa-chevron-left"></span></a></a></li>';
                        }
                        //pages 
                        if ($lastpage < 7 + ($adjacents * 3)) { //not enough pages to bother breaking it up
                           for ($counter = 1; $counter <= $lastpage; $counter++) {
                              if ($counter == $page) {
                                 $pagination.= '<li class="page-item active"><a class="page-link" href="">'.$counter.'</a></li>';
                              } else {
                                 $pagination.= '<li class="page-item"><a class="page-link" href="'.$current_page.'.php?'.$filters .'&page='.$counter.$sqlstring.'">'.$counter.'</a></li>';
                              }
                           }
                        } else if($lastpage > 5 + ($adjacents * 3)) { //enough pages to hide some
                        //close to beginning; only hide later pages
                           if($page < 1 + ($adjacents * 3)) {
                              for ($counter = 1; $counter < 4 + ($adjacents * 3); $counter++) {
                                 if ($counter == $page) {
                                    $pagination.= '<li class="page-item active"><a class="page-link" href="">'.$counter.'</a></li>';
                                 } else {
                                    $pagination.= '<li class="page-item"><a class="page-link" href="'.$current_page.'.php?'.$filters .'&page='.$counter.$sqlstring.'">'.$counter.'</a></li>';
                                 }
                              }
                              $pagination.= '<li class="page-item"><a class="page-link" href="#"> ... </a></li>';
                              $pagination.= '<li class="page-item"><a class="page-link" href="'.$current_page.'.php?'.$filters .'&page='.$lpm1.$sqlstring.'">'.$lpm1.'</a></li>';
                              $pagination.= '<li class="page-item"><a class="page-link" href="'.$current_page.'.php?'.$filters .'&page='.$lastpage.$sqlstring.'">'.$lastpage.'</a></li>';   
                        } else if($lastpage - ($adjacents * 3) > $page && $page > ($adjacents * 3)) { //in middle; hide some front and some back
                              $pagination.= '<li class="page-item"><a class="page-link" href="'.$current_page.'.php?'.$filters .'&page=1'.$sqlstring.'">1</a></li>';
                              $pagination.= '<li class="page-item"><a class="page-link" href="'.$current_page.'.php?'.$filters .'&page=2'.$sqlstring.'">2</a></li>';
                              $pagination.= '<li class="page-item"><a class="page-link" href="'.$current_page.'.php?'.$filters .'&page=3'.$sqlstring.'">3</a></li>';
                              $pagination.= '<li class="page-item"><a class="page-link" href="#"> ... </a></li>';
                           for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                              if ($counter == $page) {
                                 $pagination.= '<li class="page-item active"><a class="page-link" href="">'.$counter.'</a></li>';
                              } else {
                                 $pagination.= '<li class="page-item"><a class="page-link" href="'.$current_page.'.php?'.$filters .'&page='.$counter.$sqlstring.'">'.$counter.'</a></li>';                 
                              }
                           }
                           $pagination.= '<li class="page-item"><a class="page-link" href="#"> ... </a></li>';
                           $pagination.= '<li class="page-item"><a class="page-link" href="'.$current_page.'.php?'.$filters .'&page='.$lpm1.$sqlstring.'">'.$lpm1.'</a></li>';
                           $pagination.= '<li class="page-item"><a class="page-link" href="'.$current_page.'.php?'.$filters .'&page='.$lastpage.$sqlstring.'">'.$lastpage.'</a></li>';   
                        } else { //close to end; only hide early pages
                           $pagination.= '<li class="page-item"><a class="page-link" href="'.$current_page.'.php?'.$filters .'&page=1'.$sqlstring.'">1</a></li>';
                           $pagination.= '<li class="page-item"><a class="page-link" href="'.$current_page.'.php?'.$filters .'&page=2'.$sqlstring.'">2</a></li>';
                           $pagination.= '<li><a class="page-link" href="'.$current_page.'.php?'.$filters .'&page=3'.$sqlstring.'">3</a></li>';
                           $pagination.= '<li><a href="#"> ... </a></li>';
                           for ($counter = $lastpage - (3 + ($adjacents * 3)); $counter <= $lastpage; $counter++) {
                              if ($counter == $page) {
                                 $pagination.= '<li class="page-item active"><a class="page-link" href="">'.$counter.'</a></li>';
                              } else {
                                 $pagination.= '<li class="page-item><a class="page-link" href="'.$current_page.'.php?'.$filters .'&page='.$counter.$sqlstring.'">'.$counter.'</a></li>';                 
                              }
                           }
                        }
                        }
                        //next button
                        if ($page < $counter - 1) {
                           $pagination.= '<li class="page-item"><a class="page-link" href="'.$current_page.'.php?'.$filters .'&page='.$next.$sqlstring.'"><span class="fa fa-chevron-right"></span></a></li>';
                        } else {
                           $pagination.= "";
                        }
                           echo $pagination;
                        }
                        echo '
                     </ul>
                     <!--WI_PAGINATION-->
                     <div class="clearfix"></div>
                  </div>';
               }
               //--------------------------------------------
               echo'
            </div>
         </div>
      </div>
   </div>
</div>
'; 
}