<?php
if(!LMS_VIEW && !isset($_GET['id'])) {  
   $sqllms  = $dblms->querylms("SELECT *
                                 FROM ".INFO." 
                                 WHERE info_id != ''
                                 ORDER BY info_id DESC
                              ");
   echo'
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title mb-4 float-left"> <i class="fa fa-image"></i> Contact Us Page Info</h4>
               <div class="card-title mb-4 float-right"> 
                  <a href="gallery.php" class="btn btn-primary"><i class="fa fa-list"></i> All </a>
               </div>
               <div class="clearfix"></div>
               <div class="table-responsive">
                  <table class="table mb-0">
                     <thead>
                        <tr>
                           <th class="text-center" width="50">Sr#</th>
                           <th>Phone</th>
                           <th>First Mail</th>
                           <th>Second Mail</th>
                           <th>Web Url</th>
                           <th>Location</th>
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
                              <th scope="row">'.$data['info_phone'].'</th>
                              <td>'.$data['info_mail_1'].'</td>
                              <td>'.$data['info_mail_2'].'</td>
                              <td>'.$data['info_web'].'</td>
                              <td>'.$data['info_location'].'</td>
                              <td class="text-center">
                                 <a href="?id='.$data['info_id'].'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
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