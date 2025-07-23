<?php
   $sql2 		    = '';
   $sqlstring	    = "";
   $search_term 	= (isset($_REQUEST['search_term'])  && $_REQUEST['search_term'] != '')  ? $_REQUEST['search_term']  : '';
   $searchFeild 	= (isset($_REQUEST['searchFeild'])  && $_REQUEST['searchFeild'] != '')  ? $_REQUEST['searchFeild']  : '';
   $searchOP 	    = (isset($_REQUEST['searchOP'])     && $_REQUEST['searchOP'] != '')     ? $_POST['searchOP']        : '';
   if(!LMS_VIEW && !isset($_GET['id'])) {  
      if(!($Limit)) 	{ $Limit = 50; } 
      if($page)		{ $start = ($page - 1) * $Limit; } else {	$start = 0;	}
      $sqllms  = $dblms->querylms("SELECT *
                                    FROM ".FEATURE." 
                                    WHERE f_id != ''
                                    $sql2
                                    ORDER BY f_id DESC
                                 ");
      $count = mysqli_num_rows($sqllms);
      if($page == 0) { $page = 1; }						
      $prev 		= $page - 1;							
      $next 		= $page + 1;							
      $lastpage	= ceil($count/$Limit);			
      $lpm1 		= $lastpage - 1;   
      $sqllms  = $dblms->querylms("SELECT *
                                    FROM ".FEATURE." 
                                    WHERE f_id != ''
                                    $sql2
                                    ORDER BY f_id DESC LIMIT ".($page-1)*$Limit .",$Limit
                                 ");
      echo'
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title mb-4 float-left"> <i class="fa fa-image"></i> About Us Page Info</h4>
                  <div class="card-title mb-4 float-right"> 
                     <a href="feature.php" class="btn btn-primary"><i class="fa fa-list"></i> All </a>
                  </div>
                  <div class="clearfix"></div>
                  <div class="table-responsive">
                     <table class="table mb-0">
                        <thead>
                           <tr>
                              <th class="text-center" width="50">Sr#</th>
                              <th width="50">Icon</th>
                              <th>Title</th>
                              <th class="text-center" width="50">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           ';
                           $srno = 0 ;
                           while($data = mysqli_fetch_array($sqllms)) {
                              $srno++;
                              echo'
                              <tr>
                                 <td class="text-center">'.$srno.'</td>
                                 <th scope="row"><i class="'.$data['f_icon'].'"></i></th>
                                 <td>'.$data['f_title'].'</td>
                                 <td class="text-center">
                                    <a href="?id='.$data['f_id'].'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
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
      </div>'; 
   }