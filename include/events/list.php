<?php
    $eventTypes = [
        'wiefc' => 1,
        'symposium' => 2,
        'guest-lecture' => 3,
        'workshop-and-seminar' => 4,
    ];


    $sqlArrayFunction = array(
        'select' => 'event_title, event_photo, event_type, event_date, event_href',
        'where'  => array(
            'event_type' => $eventTypes[ZONE],
            'event_status' => '1',
            'is_deleted'       => '0'
        ),
        'return_type' => 'all'
    );                  
    $rowsFunctions  = $dblms->getRows(EVENTS, $sqlArrayFunction, $sql);
    // echo $sql;exit;

    echo'
    <div class="inner-page-hero" style="background-image: url('.SITE_URL_WEB.'assets/images/background/blog-hero-bg.jpg);">
        <div class="container">
            <div class="hero-heading-title">
                <h2>'.moduleName(ZONE).'</h2>
            </div>
            <ul class="bradcrumb">
                <li><a href="#">'.moduleName(CONTROLER).'</a></li>
                <li><a href="#">'.moduleName(ZONE).'</a></li>
            </ul>
        </div>
    </div>
    <div class="blog-list-section">
        <div class="container">
            <div class="row">';
            if($rowsFunctions){
                foreach($rowsFunctions as $key => $val){
                echo '
                <div class="col-lg-6 col-md-12">
                    <div class="blog-block">
                        <div class="blog-list-item">
                            <div class="blog-image">
                                <a href="'.SITE_URL_WEB.CONTROLER.'/'.ZONE.'?href='.$val['event_href'].'">
                                <img src="'.SITE_URL.'uploads/images/events/'.$val['event_photo'].'" alt="event-image"></a>
                            </div>
                            <div class="blog-item-meta">
                                <p><a href="'.SITE_URL_WEB.CONTROLER.'/'.ZONE.'">'.(get_eventtype($val['event_type'])).'</a></p>
                                <p><a href="#">On '.date("d M, Y",strtotime($val['event_date'])).'</a></p>
                            </div>
                            <div class="blog-item-details">
                                <h3><a href="'.SITE_URL_WEB.CONTROLER.'/'.ZONE.'?href='.$val['event_href'].'">'.$val['event_title'].'</a></h3>
                                <a href="'.SITE_URL_WEB.CONTROLER.'/'.ZONE.'?href='.$val['event_href'].'" class="btn-link"><span>continue reading</span> <i class="flaticon-next"></i></a>
                            </div>
                        </div>
                    </div>
                </div>';
                }
            }
            else{
                echo '
                    <div class="text-center bg-light row align-items-center p-3">
                        <h2 class="text-danger m-0">No Data Found</h2>
                    </div>
                ';
            }
                echo'
            </div>
        </div>
    </div>
        ';
?>