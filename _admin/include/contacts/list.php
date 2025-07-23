<?php
   $sql2 		    = '';
   $sqlstring	    = "";
   $search_term 	= (isset($_REQUEST['search_term'])  && $_REQUEST['search_term'] != '')  ? $_REQUEST['search_term']  : '';
   $searchFeild 	= (isset($_REQUEST['searchFeild'])  && $_REQUEST['searchFeild'] != '')  ? $_REQUEST['searchFeild']  : '';
   $searchOP 	    = (isset($_REQUEST['searchOP'])     && $_REQUEST['searchOP'] != '')     ? $_POST['searchOP']        : '';

   if(!LMS_VIEW && !isset($_GET['id'])) {  
      
      if(!($Limit)) 	{ $Limit = 50; } 
      if($page)		{ $start = ($page - 1) * $Limit; } else {	$start = 0;	}

      $sqllms  = $dblms->querylms("SELECT contact_id, first_name, last_name, email, phone_number, msg_subject, message
                                    FROM ".CONTACT." 
                                    WHERE contact_id != ''
                                    $sql2
                                    ORDER BY contact_id DESC
                                 ");
                                          
      $count = mysqli_num_rows($sqllms);
      if($page == 0) { $page = 1; }						
      $prev 		= $page - 1;							
      $next 		= $page + 1;							
      $lastpage	= ceil($count/$Limit);				
      $lpm1 		= $lastpage - 1;

      $sqllms  = $dblms->querylms("SELECT contact_id, first_name, last_name, email, phone_number, msg_subject, message
                                    FROM ".CONTACT." 
                                    WHERE contact_id != ''
                                    $sql2
                                    ORDER BY contact_id DESC LIMIT ".($page-1)*$Limit .",$Limit
                                 ");
                                    
      echo'
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title mb-4 float-left"> <i class="fa fa-envelope"></i> Contacts List</h4>
                  <div class="card-title mb-4 float-right"> 
                     <a href="blogs.php" class="btn btn-primary"><i class="fa fa-list"></i> All </a>
                  </div>
                  <div class="clearfix"></div>
                  <div class="table-responsive">
                     <table class="table mb-0">
                        <thead>
                           <tr>
                              <th class="text-center" width="50">Sr#</th>
                              <th>Subject</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                           </tr>
                        </thead>
                        <tbody>
                           ';
                           $srno = 0 ;
                           while($value_message = mysqli_fetch_array($sqllms)) {
                           $srno++;
                           echo'
                           <tr>
                              <th class="text-center">'.$srno.'</th>
                              <td>'.$value_message['msg_subject'].'</td>
                              <td>'.$value_message['first_name'].'</td>
                              <td>'.$value_message['last_name'].'</td>
                              <td>'.$value_message['email'].'</td>
                              <td>'.$value_message['phone_number'].'</td>
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