<?php
$sqlArrayFunction = array(
    'select' => 'blog_title, blog_date, blog_href, blog_photo'
    ,'where'  => array(
        'blog_status'      => 1,
        'is_deleted'       => 0
    ),
    'limit' => '3',
    'return_type' => 'all'
);                  
$blog  = $dblms->getRows(BLOGS, $sqlArrayFunction);
echo '
<section class="blog-one pb-5">
    <div class="blog-shape-one-1">
        <img src="assets/images/shape/blog-shape.png" alt="shape">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="heading-box text-center">
                    <span class="heading-subtitle wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;">🤝 Blogs</span>
                    <h2 class="heading-title wow fadeInUp animated animated animated" style="visibility: visible; animation-name: fadeInUp;"><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">R</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">c</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">n</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">t</span></span><span> </span><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">N</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">e</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">w</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">s</span></span><span> </span><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">&amp;</span></span><span> </span><span style="display: inline-block; opacity: 1;"><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">B</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">l</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">o</span><span style="opacity: 1; transform: translateX(0px); transition: opacity 0.3s, transform 0.3s;">g</span></span></h2>
                    <p class="heading-details">Discover effective strategies for managing your loan repayments and
                        staying on track
                        financially. Our tips will help you navigate repayment challenges and achieve financial
                        stability.</p>
                </div>
            </div>
        </div>
        <div class="row gutter-y-30">';
        foreach ($blog as $key => $value) {
            echo'
            <div class="col-lg-4 col-md-6">
                <div class="blog-one-box">
                    <div class="blog-one-image">
                        <a href="'.SITE_URL_WEB.'blog/'.$value['blog_href'].'">
                            <img src="'.SITE_URL.'uploads/images/blogs/'.$value['blog_photo'].'" alt="blog-image">
                        </a>
                    </div>
                    <div class="blog-one-meta">
                        <p><a href="#">On '.$value['blog_date'].'</a></p>
                    </div>
                    <div class="blog-one-details">
                        <h5><a href="'.SITE_URL_WEB.'blog/'.$value['blog_href'].'">'.$value['blog_title'].'</a></h5>
                        <a href="'.SITE_URL_WEB.'blog/'.$value['blog_href'].'" class="btn-link"><span>Read More</span><i class="flaticon-next"></i></a>
                    </div>
                </div>
            </div>';
        }
            echo '
        </div>
    </div>
</section>
';
?>