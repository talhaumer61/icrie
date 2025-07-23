<?php
   $sql2 		    = '';
   $sqlstring	    = "";
   $search_term 	= (isset($_REQUEST['search_term'])  && $_REQUEST['search_term'] != '')  ? $_REQUEST['search_term']  : '';
   $searchFeild 	= (isset($_REQUEST['searchFeild'])  && $_REQUEST['searchFeild'] != '')  ? $_REQUEST['searchFeild']  : '';
   $searchOP 	    = (isset($_REQUEST['searchOP'])     && $_REQUEST['searchOP'] != '')     ? $_POST['searchOP']        : '';

   if(!LMS_VIEW && !isset($_GET['id'])) {  
      if(!($Limit)) 	{ $Limit = 50; } 
      if($page)		{ $start = ($page - 1) * $Limit; } else {	$start = 0;	}
      $sqllms  = $dblms->querylms("SELECT tutor_id, tutor_status, tutor_img, tutor_name, tutor_degree, tutor_designation
                                    FROM ".TUTORS." 
                                    WHERE tutor_id != '' AND is_deleted = '0'
                                    $sql2
                                    ORDER BY tutor_id DESC
                                 ");
      $count = mysqli_num_rows($sqllms);
      if($page == 0) { $page = 1; }					
      $prev 		= $page - 1;		
      $next 		= $page + 1;			
      $lastpage	= ceil($count/$Limit);
      $lpm1 		= $lastpage - 1;
      $sqllms  = $dblms->querylms("SELECT tutor_id, tutor_status, tutor_img, tutor_name, tutor_degree, tutor_designation
                                    FROM ".TUTORS." 
                                    WHERE tutor_id != '' AND is_deleted = '0'
                                    $sql2
                                    ORDER BY tutor_id DESC LIMIT ".($page-1)*$Limit .",$Limit
                                 ");
   echo'
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title mb-4 float-left"> <i class="fa fa-users"></i> Tutor List</h4>
               <div class="card-title mb-4 float-right"> 
                  <a href="tutors.php" class="btn btn-primary"><i class="fa fa-list"></i> All </a>
                  <a href="?view=add" class="btn btn-success"><i class="fa fa-plus"></i> Add New </a>
               </div>
               <div class="clearfix"></div>
               <div class="table-responsive">
                  <table class="table mb-0">
                     <thead>
                        <tr>
                           <th class="text-center" width="50">Sr#</th>
                           <th>Photo</th>
                           <th>Name</th>
                           <th>Designation</th>
                           <th>Degree</th>
                           <th class="text-center" width="50">Status</th>
                           <th class="text-center" width="50">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        ';
                        $srno = 0 ;
                        while($value_team = mysqli_fetch_array($sqllms)) {
                           $srno++;
                           echo'
                           <tr>
                              <th class="text-center">'.$srno.'</th>
                              <td class="text-center">
                                 <img src="../images/tutors/'.$value_team['tutor_img'].'" alt="'.$value_team['tutor_name'].'" class="rounded-circle avatar-sm">
                              </td>
                              <td>'.$value_team['tutor_name'].'</td>
                              <td>'.$value_team['tutor_designation'].'</td>
                              <td>'.$value_team['tutor_degree'].'</td>
                              <td class="text-center">'.get_admstatus($value_team['tutor_status']).'</td>
                              <td class="text-center">
                                 <a href="?id='.$value_team['tutor_id'].'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                 <button data-toggle="modal" data-target="#exampleModal'.$srno.'" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                 </td>
                           </tr>
                           <!-- Modal -->
                           <div class="modal fade" id="exampleModal'.$srno.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <form method="POST" action="tutors.php">
                                       <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Delete Tutor</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                       </button>
                                       </div>
                                       <div class="modal-body">
                                          <input type="hidden" name="tutor_id" value="'.$value_team['tutor_id'].'">
                                          <p>Are you sure you want to delete Tutor:</p>
                                          <h5>'.$value_team['tutor_name'].'</h5>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" name="tutor_delete" class="btn btn-danger">Danger</button>
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