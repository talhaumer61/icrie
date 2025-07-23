<?php
   if(!LMS_VIEW && !isset($_GET['id'])) {  
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
                           <th>Type</th>
                           <th>Title</th>
                           <th>Description</th>
                           <th class="text-center" width="50">Status</th>
                           <th class="text-center" width="100">Action</th>
                        </tr>
                     </thead>
                     <tbody>';
                        $sqllms = array ( 
                                             'select' 		      =>	'
                                                                          functions_id 
                                                                        , functions_status 
                                                                        , functions_file
                                                                        , functions_title 
                                                                        , functions_desc 
                                                                        , id_functions 
                                                                     '
                                          , 'where' 		      =>	array( 'is_deleted'	=> '0' )
                                          , 'return_type' 	   => 'all' 
                                       ); 
                        $rows    = $dblms->getRows(FUNCTIONS, $sqllms);
                        $srno    = 0;
                        foreach($rows as $key => $val):
                           $srno++;
                           echo'
                           <tr>
                              <th class="text-center">'.$srno.'</th>
                              <td>'.get_functiontypes($val['id_functions']).'</td>
                              <td>'.$val['functions_title'].'</td>
                              <td>'.$val['functions_desc'].'</td>
                              <td class="text-center">'.get_admstatus($val['functions_status']).'</td>
                              <td class="text-center">
                                 <a href="?id='.$val['functions_id'].'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                 <button data-toggle="modal" data-target="#exampleModal'.$srno.'" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>                                
                              </td>
                              <div class="modal fade" id="exampleModal'.$srno.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <form method="POST" action="functions.php">
                                          <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Delete Tutor</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                          </button>
                                          </div>
                                          <div class="modal-body">
                                             <input type="hidden" name="functions_id" value="'.$val['functions_id'].'">
                                             <p>Are you sure you want to delete Tutor:</p>
                                             <h5>'.$val['functions_title'].'</h5>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button type="submit" name="functions_delete" class="btn btn-danger">Danger</button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </tr>';
                        endforeach;
                        echo'    
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>'; 
}
?>