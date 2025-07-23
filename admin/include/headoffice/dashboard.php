<?php
// BLOGS
$condition = array ( 
                     'select'       =>  "blog_id"
                    ,'where' 	    =>  array( 
                                                'blog_status'    => 1
                                                ,'is_deleted'    => 0
                                            )
                    ,'return_type'  =>  'count' 
                   ); 
$countBlogs = $dblms->getRows(BLOGS, $condition);

// CONTACTS
$condition = array ( 
                     'select'       =>  "contact_id"
                    ,'where' 	    =>  array( 
                                                'contact_status'    => 1
                                                ,'is_deleted'    => 0
                                            )
                    ,'return_type'  =>  'count' 
                   ); 
$countContacts = $dblms->getRows(QUERIES, $condition);

// TUTORS
$condition = array ( 
                     'select'       =>  "tutor_id "
                    ,'where' 	    =>  array( 
                                                'tutor_status'    => 1
                                                ,'is_deleted'    => 0
                                            )
                    ,'return_type'  =>  'count' 
                   ); 
$countTutors = $dblms->getRows(TUTORS, $condition);

// EVENTS
$condition = array ( 
                     'select'       =>  "event_id "
                    ,'where' 	    =>  array( 
                                                'event_status'    => 1
                                                ,'is_deleted'    => 0
                                            )
                    ,'return_type'  =>  'count' 
                   ); 
$countEvents = $dblms->getRows(EVENTS, $condition);

// QUERIES
$condition = array ( 
    'select'       =>  "contact_id, msg_subject, message, first_name, last_name, email, phone_number"
   ,'where' 	    =>  array( 
                                'contact_status'    => 1
                               ,'is_deleted'        => 0
                           )
   ,'return_type'  =>  'all' 
  ); 
$CONTACT = $dblms->getRows(QUERIES, $condition);

echo'
<div class="page-body dashboard-2-main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-xl-3 col-lg-3">
                <div class="card o-hidden border-0">
                    <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg></div>
                            <div class="media-body"><span class="m-0">News & Blogs</span>
                                <h4 class="mb-0 counter">'.$countBlogs.'</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag icon-bg"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-3">
                <div class="card o-hidden border-0">
                    <div class="bg-danger b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg></div>
                            <div class="media-body"><span class="m-0">Contacts</span>
                                <h4 class="mb-0 counter">'.$countContacts.'</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag icon-bg"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-3">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg></div>
                            <div class="media-body"><span class="m-0">Tutors</span>
                                <h4 class="mb-0 counter">'.$countTutors.'</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database icon-bg"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-3">
                <div class="card o-hidden border-0">
                    <div class="bg-dark b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg></div>
                            <div class="media-body"><span class="m-0">Events</span>
                                <h4 class="mb-0 counter">'.$countEvents.'</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database icon-bg"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Recent Queries</h4>
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th width="20" class="text-center">Sr.</th>
                                        <th>Subject</th>
                                        <th>First Name</th>
                                        <th class="text-center">Last Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                    $srno=0;
                                    if ($CONTACT) {
                                        foreach ($CONTACT as $row) {
                                            $srno++;
                                            echo'                        
                                            <tr>
                                                <td class="text-center">'.$srno.'</td>
                                                <td>'.$row['msg_subject'].'</td>
                                                <td>'.$row['first_name'].'</td>
                                                <td class="text-center">'.$row['last_name'].'</td>
                                                <td class="text-center">'.$row['email'].'</td>
                                                <td class="text-center">'.$row['phone_number'].'</td>
                                                <td class="text-center">
                                                    <a class="btn btn-secondary btn-xs" onclick="showAjaxModalZoom(\''.SITE_URL.'include/modals/email_queries/view.php?view=query_detail&edit_id='.$row['contact_id'].'\');"><i class="fa-solid fa-eye"></i></a>
                                                </td>
                                            </tr>';
                                        } 
                                    }
                                    echo'
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';
?>