<?php
//------------------------------------------------    
$sqllmsNewsletter  = $dblms->querylms("SELECT id, status, date, email
                                    FROM ".NEWSLETTER." 
                                    WHERE id != '' ORDER BY id DESC LIMIT 5"); 
//------------------------------------------------ 
echo'
<div class="col-lg-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Recent Newsletter Subscription</h4>
            <div class="table-responsive">';
            if(mysqli_num_rows($sqllmsNewsletter) > 0){
                echo'
                <table class="table table-centered table-nowrap mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>';
                        $srno = 0 ;
                        //------------------------------------------------
                        while($valueLetter = mysqli_fetch_array($sqllmsNewsletter)) {
                        //------------------------------------------------
                        $srno++;
                        echo'
                        <tr>
                            <th class="text-center">'.$srno.'</th>
                            <td>'.$valueLetter['email'].'</td>
                            <td>'.$valueLetter['date'].'</td>
                            <td class="text-center">'.get_admstatus($valueLetter['status']).'</td>
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