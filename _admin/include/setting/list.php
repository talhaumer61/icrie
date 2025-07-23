<?php
   if(!LMS_VIEW && !isset($_GET['id'])) {  
      $sqllms  = $dblms->querylms("SELECT *
                                    FROM ".SETTING." 
                                    WHERE setting_id != ''
                                    ORDER BY setting_id DESC
                                 ");
      echo'
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title mb-4 float-left"> <i class="fa fa-image"></i>Setting</h4>
                  <div class="clearfix"></div>
                  <div class="table-responsive">
                     <table class="table mb-0">
                        <thead>
                           <tr>
                              <th class="text-center" width="50">Sr#</th>
                              <th>Web Name</th>
                              <th>Links</th>
                              <th class="text-center" width="50">Logo</th>
                              <th class="text-center" width="50">Favicon</th>
                              <th class="text-center" width="50">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           ';
                           $sr = 0;
                           while($data = mysqli_fetch_array($sqllms)) {
                              $sr++;
                              echo'
                              <tr>
                                 <th class="text-center">'.$sr.'</th>
                                 <th>'.$data['setting_web_name'].'</th>
                                 <th>'.$data['setting_links'].'</th>
                                 <td class="text-center">
                                    <img src="../images/logo/'.$data['setting_photo'].'" class="rounded-circle avatar-sm">
                                 </td>
                                 <td class="text-center">
                                    <img src="../images/logo/'.$data['setting_favicon'].'" class="rounded-circle avatar-sm">
                                 </td>
                                 <td class="text-center">
                                    <a href="?id='.$data['setting_id'].'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
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