<?php
$sqlArrayFunction = array(
                        'select' => 'journal_title, journal_href, journal_photo'
                        ,'where'  => array(
                            'journal_status'      => 1,
                            'is_deleted'       => 0
                        ),
                        'return_type' => 'all'
);                  
$journals  = $dblms->getRows(JOURNALS, $sqlArrayFunction);
echo '
    <div class="blog-list-section">
        <div class="container">
            <div class="row">';
            foreach ($journals as $key =>$value){
                echo'
                <div class="col-lg-4 col-md-6">
                    <div class="blog-block">
                        <div class="blog-list-item-two">
                            <div class="blog-image">
                                <a href="'.SITE_URL_WEB.'journals/'.$value['journal_href'].'">
                                <img src="'.SITE_URL.'uploads/images/journals/'.$value['journal_photo'].'" alt="blog-image"></a>
                            </div>
                            <div class="blog-item-meta">
                                <p><a href="#">On </a></p>
                            </div>
                            <div class="blog-item-details">
                                <h5><a href="'.SITE_URL_WEB.'journals/'.$value['journal_href'].'">'.ucwords($value['journal_title']).'</a></h5>
                                <a href="'.SITE_URL_WEB.'journals/'.$value['journal_href'].'" class="btn-link-two"> <i class="flaticon-next"></i></a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
                echo'
            </div>
        </div>
    </div>
';
?>