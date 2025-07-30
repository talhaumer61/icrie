<?php
$sqlArrayFunction = array(
                        'select' => 'journal_title, journal_href, journal_photo, journal_desc'
                        ,'where'  => array(
                            'journal_status'      => 1,
                            'is_deleted'       => 0,
                            'journal_href'       =>  cleanvars(ZONE)
                        ),
                        'return_type' => 'single'
);                  
$journal  = $dblms->getRows(JOURNALS, $sqlArrayFunction);
echo '
    <div class="blog-list-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-block">
                        <div class="single-blog-image">
                            <img class="w-100" src="'.SITE_URL.'uploads/images/journals/'.$journal['journal_photo'].'" alt="blog-image">
                        </div>
                        <div class="blog-item-meta">
                            <p><a href="#">By Deni</a></p>
                            <p><a href="#">On 25 Dec 2024</a></p>
                        </div>
                    </div>
                    <div class="blog-block">
                        <div class="single-blog-details">
                            <h3>'.ucwords($journal['journal_title']).'</h3>
                            <p>'.$journal['journal_desc'].'</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
';
?>