<?php
    $sqlArrayFunction   = array ( 
                                    'select' 		=>	'functions_id'
                                    ,'where' 		=>	array('is_deleted' => '0')
                                    ,'return_type' 	=> 'count' 
                                ); 
    $sqlArrayTeam       = array ( 
                                    'select' 		=>	'team_id'
                                    ,'where' 		=>	array('is_deleted' => '0')
                                    ,'return_type' 	=> 'count' 
                                ); 
    $sqlArrayBlog       = array ( 
                                    'select' 		=>	'blog_id'
                                    ,'where' 		=>	array('is_deleted' => '0')
                                    ,'return_type' 	=> 'count' 
                                ); 

    $sqlArrayFunction['where']['id_functions'] = '1';
    $count1  = $dblms->getRows(FUNCTIONS, $sqlArrayFunction);
    $sqlArrayFunction['where']['id_functions'] = '2';
    $count2  = $dblms->getRows(FUNCTIONS, $sqlArrayFunction);
    $sqlArrayFunction['where']['id_functions'] = '3';
    $count3  = $dblms->getRows(FUNCTIONS, $sqlArrayFunction);

    $count4  = $dblms->getRows(TEAMS, $sqlArrayTeam);
    $count5  = $dblms->getRows(BLOGS, $sqlArrayBlog);
    echo '
        <div class="counter__two section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="counter__two-bg">
                            <div class="counter__two-item">
                                <div class="counter__two-item-icon">
                                    <i class="flaticon-team"></i>
                                </div>
                                <div class="counter__two-item-content">
                                    <h2><span class="counter">'.$count1.'</span>+</h2>
                                    <h6>Research</h6>
                                </div>
                            </div>
                            <div class="counter__two-item">
                                <div class="counter__two-item-icon">
                                    <i class="fal fa-books"></i>
                                </div>
                                <div class="counter__two-item-content">
                                    <h2><span class="counter">'.$count2.'</span>+</h2>
                                    <h6>Publications</h6>
                                </div>
                            </div>
                            <div class="counter__two-item">
                                <div class="counter__two-item-icon">
                                    <i class="fa-regular fa-newspaper"></i>
                                </div>
                                <div class="counter__two-item-content">
                                    <h2><span class="counter">'.($count1*$count2).'</span>+</h2>
                                    <h6>Journal</h6>
                                </div>
                            </div>				
                            <div class="counter__two-item">
                                <div class="counter__two-item-icon">
                                    <i class="fa-regular fa-calendar"></i>
                                </div>
                                <div class="counter__two-item-content">
                                    <h2><span class="counter">'.$count5.'</span>+</h2>
                                    <h6>Events</h6>
                                </div>
                            </div>				
                            <div class="counter__two-item">
                                <div class="counter__two-item-icon">
                                    <i class="flaticon-project-management"></i>
                                </div>
                                <div class="counter__two-item-content">
                                    <h2><span class="counter">'.$count3.'</span>+</h2>
                                    <h6>Training And Capacity Building</h6>
                                </div>
                            </div>
                            <div class="counter__two-item">
                                <div class="counter__two-item-icon">
                                    <i class="flaticon-costumer"></i>
                                </div>
                                <div class="counter__two-item-content">
                                    <h2><span class="counter">'.$count4.'</span>+</h2>
                                    <h6>Team</h6>
                                </div>
                            </div>								
                        </div>
                    </div>
                </div>
            </div>
        </div>';
?>