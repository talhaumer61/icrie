<?php
   if(!LMS_VIEW && !isset($_GET['id'])) {  
      $sqllms  = $dblms->querylms("SELECT *
                                    FROM ".ABOUT." 
                                    WHERE about_id != ''
                                    ORDER BY about_id DESC
                                 ");
      echo'
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title mb-4 float-left"> <i class="fa fa-image"></i> About Us Page Info</h4>
                  <div class="clearfix"></div>
                  <div class="table-responsive">
                     <table class="table mb-0">
                        <thead>
                           <tr>
                              <th class="text-center" width="50">Sr#</th>
                              <th class="text-center" width="50">Photo</th>
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
                                 <th class="text-center">'.$srno.'</th>
                                 <td class="text-center">
                                    <img src="../images/about/'.$data['about_img'].'" alt="'.$data['about_title'].'" class="rounded-circle avatar-sm">
                                 </td>
                                 <th>'.$data['about_title'].'</th>
                                 <td class="text-center">
                                    <a href="?id='.$data['about_id'].'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
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