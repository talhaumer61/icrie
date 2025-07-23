<?php
//------------------------------------------------  
$sqllmsContact  = $dblms->querylms("SELECT contact_id, first_name, last_name, email, phone_number, msg_subject, message
                                    FROM ".CONTACT." 
                                    WHERE contact_id != '' ORDER BY contact_id DESC LIMIT 5");
//------------------------------------------------ 
echo'
<div class="col-lg-8">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Recent Contacts</h4>
            <div class="table-responsive">';
            if(mysqli_num_rows($sqllmsContact) > 0){
                echo'
                <table class="table table-centered table-nowrap mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th>Subject</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th class="text-center">Detail</th>
                        </tr>
                    </thead>
                    <tbody>';
                        $srno = 0 ;
                        //------------------------------------------------
                        while($valueContact = mysqli_fetch_array($sqllmsContact)) {
                        //------------------------------------------------
                        $srno++;
                        echo'
                        <tr>
                            <th class="text-center">'.$srno.'</th>
                            <td>'.$valueContact['msg_subject'].'</td>
                            <td>'.$valueContact['first_name'].'</td>
                            <td>'.$valueContact['last_name'].'</td>
                            <td>'.$valueContact['email'].'</td>
                            <td>'.$valueContact['phone_number'].'</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".exampleModal'.$valueContact['contact_id'].'"><i class="bx bx-show-alt"></i></button>
                            </td>
                            <!-- Modal -->
                            <div class="modal fade exampleModal'.$valueContact['contact_id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">'.$valueContact['msg_subject'].'</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-justify">
                                                <p>'.$valueContact['message'].'</p>
                                            </div>
                                        </div>
                                        <!--<div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <!-- end modal -->
                        </tr>';
                        }
                        echo' 
                    </tbody>
                </table>';
            }
            else{
                echo'<h3 class="text text-danger text-center">No Record Found!</h3>';
            }
            echo'
            </div>
            <!-- end table-responsive -->
        </div>
    </div>
</div>';
?>