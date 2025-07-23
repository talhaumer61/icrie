<?php
   $sql2 		    = '';
   $sqlstring	    = "";
   $search_term 	= (isset($_REQUEST['search_term'])  && $_REQUEST['search_term'] != '')  ? $_REQUEST['search_term']  : '';
   $searchFeild 	= (isset($_REQUEST['searchFeild'])  && $_REQUEST['searchFeild'] != '')  ? $_REQUEST['searchFeild']  : '';
   $searchOP 	    = (isset($_REQUEST['searchOP'])     && $_REQUEST['searchOP'] != '')     ? $_POST['searchOP']        : '';

   if(!LMS_VIEW && !isset($_GET['id'])) {  
      
      if(!($Limit)) 	{ $Limit = 50; } 
      if($page)		{ $start = ($page - 1) * $Limit; } else {	$start = 0;	}

      $sqllms  = $dblms->querylms("SELECT `notice_id`, `notice_title`, `notice_description`
                                    FROM ". NOTICE ." 
                                    WHERE notice_id != '' AND is_deleted = '0'
                                    $sql2
                                    ORDER BY notice_id DESC
                                 ");

      $count = mysqli_num_rows($sqllms);
      if($page == 0) { $page = 1; }					
      $prev 		= $page - 1;						
      $next 		= $page + 1;							
      $lastpage	= ceil($count/$Limit);					
      $lpm1 		= $lastpage - 1;   
      $sqllms  = $dblms->querylms("SELECT `notice_id`, `notice_status` ,`notice_title`, `notice_description`
                                    FROM ".NOTICE." 
                                    WHERE notice_id != '' AND is_deleted = '0'
                                    $sql2
                                    ORDER BY notice_id DESC LIMIT ".($page-1)*$Limit .",$Limit
                                 ");

      echo'
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title mb-4 float-left"> <i class="fa fa-newspaper"></i> Notice List</h4>
                  <div class="card-title mb-4 float-right"> 
                     <a href="notice.php" class="btn btn-primary"><i class="fa fa-list"></i> All </a>
                     <a href="?view=add" class="btn btn-success"><i class="fa fa-plus"></i> Add New </a>
                  </div>
                  <div class="clearfix"></div>
                  <div class="table-responsive">
                     <table class="table mb-0">
                        <thead>
                           <tr>
                              <th class="text-center" width="50">Sr#</th>
                              <th>Title</th>
                              <th class="text-center" width="50">Status</th>
                              <th class="text-center" width="50">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           ';
                           $srno = 0 ;
                           while($value_blog = mysqli_fetch_array($sqllms)) {
                              $srno++;
                              echo'
                              <tr>
                                 <th class="text-center">'.$srno.'</th>
                                 <td>'.$value_blog['notice_title'].'</td>
                                 <td class="text-center">'.get_admstatus($value_blog['notice_status']).'</td>
                                 <td class="text-center">
                                    <a href="?id='.$value_blog['notice_id'].'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    <button data-toggle="modal" data-target="#exampleModal'.$srno.'" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                 </td>
                              </tr>
                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal'.$srno.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <form method="POST" action="notice.php">
                                          <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Delete Notice</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                          </button>
                                          </div>
                                          <div class="modal-body">
                                             <input type="hidden" name="notice_id" value="'.$value_blog['notice_id'].'">
                                             <p>Are you sure you want to delete notice:</p>
                                             <h5>'.$value_blog['notice_title'].'</h5>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button type="submit" name="Notice_delete" class="btn btn-danger">Danger</button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
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