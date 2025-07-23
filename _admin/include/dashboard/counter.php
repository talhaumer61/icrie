<?php
//BLOGS   
$sqllmsBlog  = $dblms->querylms("SELECT COUNT(blog_id) AS blogs
                                        FROM ".BLOGS."  WHERE blog_id != ''");
$valueBLog  = mysqli_fetch_array($sqllmsBlog);

//CONTACTAS  
$sqllmsContact  = $dblms->querylms("SELECT COUNT(contact_id) AS contacts
                                        FROM ".CONTACT." WHERE contact_id != ''");
$valueContact = mysqli_fetch_array($sqllmsContact); 

//TUTOR 
$sqllmsTeam  = $dblms->querylms("SELECT COUNT(tutor_id) AS team
                                    FROM ".TUTORS." WHERE tutor_id != '' ");
$valueTeam = mysqli_fetch_array($sqllmsTeam); 

//MOUS
$sqllmsEvent  = $dblms->querylms("SELECT COUNT(event_id) AS events
                                    FROM ".EVENTS." WHERE event_id != ''");
$valueEvent   = mysqli_fetch_array($sqllmsEvent); 

echo'
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium">Blogs</p>
                                <h4 class="mb-0">'.$valueBLog['blogs'].'</h4>
                            </div>

                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                <span class="avatar-title">
                                    <i class="fa fa-mail-bulk font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium">Contacts</p>
                                <h4 class="mb-0">'.$valueContact['contacts'].'</h4>
                            </div>

                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                        <i class="fa fa-envelope font-size-24"></i>
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium">Tutors</p>
                                <h4 class="mb-0">'.$valueTeam['team'].'</h4>
                            </div>

                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                        <i class="fa fa-users font-size-24"></i>
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium">Event</p>
                                <h4 class="mb-0">'.$valueEvent['events'].'</h4>
                            </div>

                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                        <i class="fas fa-signature font-size-24"></i>
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>';
?>