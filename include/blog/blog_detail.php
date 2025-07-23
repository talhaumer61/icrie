<?php
$sqlArrayFunction = array(
                        'select' => 'blog_title, blog_date, blog_href, blog_photo, blog_brief_detail, blog_detail'
                        ,'where'  => array(
                            'blog_status'      => 1,
                            'is_deleted'       => 0,
                            'blog_href'       =>  cleanvars(ZONE)
                        ),
                        'return_type' => 'single'
);                  
$blog  = $dblms->getRows(BLOGS, $sqlArrayFunction);
echo '
    <div class="blog-list-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-block">
                        <div class="single-blog-image">
                            <img class="w-100" src="'.SITE_URL.'uploads/images/blogs/'.$blog['blog_photo'].'" alt="blog-image">
                        </div>
                        <div class="blog-item-meta">
                            <p><a href="#">By Deni</a></p>
                            <p><a href="#">On 25 Dec 2024</a></p>
                        </div>
                    </div>
                    <div class="blog-block">
                        <div class="single-blog-details">
                            <h3>'.ucwords($blog['blog_title']).'</h3>
                            <p>'.$blog['blog_brief_detail'].'</p>
                            <p>'.$blog['blog_detail'].'</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
';
?>