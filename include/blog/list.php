<?php
$sqlArrayFunction = array(
                        'select' => 'blog_title, blog_date, blog_href, blog_photo'
                        ,'where'  => array(
                            'blog_status'      => 1,
                            'is_deleted'       => 0
                        ),
                        'return_type' => 'all'
);                  
$blog  = $dblms->getRows(BLOGS, $sqlArrayFunction);
echo '
    <div class="blog-list-section">
        <div class="container">
            <div class="row">';
            foreach ($blog as $key =>$value){
                echo'
                <div class="col-lg-4 col-md-6">
                    <div class="blog-block">
                        <div class="blog-list-item-two">
                            <div class="blog-image">
                                <a href="'.SITE_URL_WEB.'blog/'.$value['blog_href'].'">
                                <img src="'.SITE_URL.'uploads/images/blogs/'.$value['blog_photo'].'" alt="blog-image"></a>
                            </div>
                            <div class="blog-item-meta">
                                <p><a href="#">On '.$value['blog_date'].'</a></p>
                            </div>
                            <div class="blog-item-details">
                                <h5><a href="'.SITE_URL_WEB.'blog/'.$value['blog_href'].'">'.ucwords($value['blog_title']).'</a></h5>
                                <a href="'.SITE_URL_WEB.'blog/'.$value['blog_href'].'" class="btn-link-two"> <i class="flaticon-next"></i></a>
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