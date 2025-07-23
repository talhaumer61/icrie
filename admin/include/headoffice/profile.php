<?php
include_once ('profile/query.php');
echo'  
<title>Manage Profile - '.TITLE_HEADER.'</title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Manage Profile</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">';
                include_once ('profile/view.php');
                echo'
            </div>
        </div>
    </div>
</div>';
?>