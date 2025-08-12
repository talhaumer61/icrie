<?php
$condition = array ( 
    'select'       =>  "gallery_id, gallery_status, gallery_photo, gallery_title"
   ,'where' 	    =>  array( 
                                'gallery_status'    => 1
                               ,'is_deleted'       => 0
                           )
   ,'return_type'  =>  'all' 
  ); 
$gallery = $dblms->getRows(GALLERY, $condition);
$condition = array ( 
    'select'       =>  "type_id, type_status, type_name, type_icon, type_href"
   ,'where' 	    =>  array( 
                               'is_deleted'       => 0
                           )
   ,'return_type'  =>  'all' 
  ); 
$type = $dblms->getRows(FUNCTION_TYPES, $condition);
$condition = array ( 
    'select'       =>  "setting_id , setting_status, setting_email, setting_web_name, setting_photo, setting_desc"
   ,'where' 	    =>  array( 
                                'setting_status'    => 1
                               ,'is_deleted'       => 0
                           )
   ,'return_type'  =>  'single' 
  ); 
$web = $dblms->getRows(SETTING, $condition);
$condition = array ( 
    'select'       =>  "info_phone"
   ,'where' 	    =>  array( 
                                'info_status'    => 1
                           )
   ,'return_type'  =>  'single' 
  ); 
$info = $dblms->getRows(CONTACT_INFO, $condition);
echo'
<footer class="footer-one">
    <div class="container">
        <div class="footer-main-one">
            <div class="footer-one-inner py-4">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 footer-about">
                        <div class="footer-one-about">
                            <a href="#">
                                <img src="'.SITE_URL_WEB.'assets/images/logo.png" alt="footer-logo" height="160px">
                            </a>
                        </div>
                        <div>
                            <p>'.html_entity_decode($web['setting_desc']).'</p>
                        </div>';
                        /*
                        echo'
                        <div class="footer-one-about-contact">
                            <h4>Contact us</h4>
                            <ul>
                                <li><a href="mailto:'.$web['setting_email'].'"><i class="flaticon-envelope"></i>'.$web['setting_email'].'</a></li>
                                <li><a href="tel:+020.098.45611"><i class="flaticon-phone"></i>'.$info['info_phone'].'</a></li>
                            </ul>
                        </div>';
                        */
                        echo'
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="footer-one-link">
                            <h3>Functions</h3>
                            <ul>
                                <li>
                                    <i class="flaticon-right-arrow"></i>
                                    <a href="'.SITE_URL_WEB.'function/consultancy-advisory-services">Consultancy & Advisory Services</a>
                                </li>
                                <li>
                                    <i class="flaticon-right-arrow"></i>
                                    <a href="'.SITE_URL_WEB.'function/training-and-capacity-building">Training and Capacity Building</a>
                                </li>
                                <li>
                                    <i class="flaticon-right-arrow"></i>
                                    <a href="'.SITE_URL_WEB.'function/course">Course</a>
                                </li>
                                <li>
                                    <i class="flaticon-right-arrow"></i>
                                    <a href="'.SITE_URL_WEB.'function/aaoifi-certificate-registration">AAOIFI Certificate Registration</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="footer-one-link m-0">
                            <h3>Publications</h3>
                            <ul>
                                <li><i class="flaticon-right-arrow"></i><a href="'.SITE_URL_WEB.'publications/books">Books</a></li>
                                <li><i class="flaticon-right-arrow"></i><a href="'.SITE_URL_WEB.'publications/articles">Articles</a></li>
                                <li><i class="flaticon-right-arrow"></i><a href="'.SITE_URL_WEB.'publications/reports">Reports</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="footer-one-link m-0">
                            <h3>Page</h3>
                            <ul>
                                <li><i class="flaticon-right-arrow"></i><a href="'.SITE_URL_WEB.'about-us">About Us</a></li>
                                <li><i class="flaticon-right-arrow"></i><a href="'.SITE_URL_WEB.'faq">FAQS</a></li>
                                <li><i class="flaticon-right-arrow"></i><a href="'.SITE_URL_WEB.'contact">Contact Us</a></li>
                                <li><i class="flaticon-right-arrow"></i><a href="'.SITE_URL_WEB.'team">Team</a></li>
                            </ul>
                        </div>
                    </div>
                    ';
                    /*
                    echo'
                    <div class="col-xl-4 col-md-6">
                        <div class="footer-One-subscribe">
                            <h3>Gallery</h3>
                            <div class="footer-gallery">
                                <div class="row g-2">';
                                
                                    foreach($gallery as $image):
                                    /*echo'
                                        <div class="col-3">
                                            <a class="img-popup" href="'.SITE_URL.'uploads/images/gallery/'.$image['gallery_photo'].'">
                                                <img src="'.SITE_URL.'uploads/images/gallery/'.$image['gallery_photo'].'" alt="Gallery Image" class="img-fluid">
                                            </a>
                                        </div>
                                    ';*/
                                    /*
                                    echo'
                                        <div class="gallery-item col-6">
                                            <a href="javascript:void(0);" class="image-popup" data-image="'.SITE_URL.'uploads/images/gallery/'.$image['gallery_photo'].'">
                                                <img src="'.SITE_URL.'uploads/images/gallery/'.$image['gallery_photo'].'" />
                                            </a>
                                        </div>
                                    ';
                                    endforeach; 
                                    echo'
                                </div>
                            </div>
                        </div>
                    </div>';
                    */
                    echo'
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="footer-lower">
            <div class="container">
                <div class="row row-gap-3">
                    <div class="col-md-12 text-center">
                        <div class="footer-copy-right-one">
                            <p>© Copyright '.date("Y").' '.$web['setting_web_name'].'. All rights reserved by <a href="'.COPY_RIGHTS_URL.'">'.COPY_RIGHTS.'</a></p>
                        </div>
                    </div>';
                    /*
                    echo'
                    <div class="col-md-6 text-center">
                        <div class="footer-buttom-link text-end">
                            <ul>
                                <li><a href="#">Terms & Condition</a></li>
                                <li><a href="#">Privacy policy</a></li>
                            </ul>
                        </div>
                    </div>';
                    */
                    echo'
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="imageModal" class="ImgModal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <img id="modalImage" src="" alt="Preview" />
    </div>
</div>

    <!-- footer one end -->
    <!-- serach popup start -->
    <div class="search-popup">
        <button class="close-search "></button>
        <form method="post" action="https://thegenius.co/html/loanlift/blog.html">
            <div class="form-group">
                <input type="search" name="search" placeholder="Search Here" required="">
                <button type="submit"><i class="flaticon-search"></i></button>
            </div>
        </form>
    </div>
    <!-- serach popup end -->
    <!-- mobile-nav start -->
    <div class="mobile-nav-wrapper">
        <div class="mobile-nav-overlay mobile-nav-toggler"></div>
        <div class="mobile-nav-content">
            <a href="#" class="mobile-nav-close mobile-nav-toggler">
                <span></span>
                <span></span>
            </a>
            <div class="logo-box">
                <a href="index.html"><img width="150" src="'.SITE_URL_WEB.'assets/images/logo.png" alt="logo"></a>
            </div>
            <div class="mobile-nav-container">';
                echo '
                <ul class="mobile-menu-list">';
                    foreach(navBarMaker() as $key => $val) {
                        echo '
                        <li class="'.(!empty($val['links']) ? 'menu-item-has-children dropdown' : '').'">
                            <a href="'.SITE_URL_WEB.$key.'">
                                '.moduleName(strtolower($val['name'])).'
                                '.(!empty($val['links']) ? '<i class="fa-solid fa-chevron-down"></i>' : '').'
                            </a>';
                            
                        if (!empty($val['links'])) {
                            echo '<ul>';
                            foreach($val['links'] as $SubKey => $SubVal) {
                                echo '
                                <li>
                                    <a href="'.SITE_URL_WEB.$SubKey.'">
                                    '.$SubVal['name'] .'
                                    </a>
                                </li>';
                            }
                            echo '</ul>';
                        }

                        echo '</li>';
                    }
                echo '
                </ul>
            </div>
        </div>
    </div>
    <!-- mobile-nav end -->
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top-text">back top</span>
        <span class="scroll-to-top-wrapper"><span class="scroll-to-top-inner"></span></span>
    </a>

    
    <script>
    


document.addEventListener("DOMContentLoaded", function () {

    const modal = document.getElementById("imageModal");
    const modalImage = document.getElementById("modalImage");
    const closeBtn = document.querySelector(".close");
    const imageLinks = document.querySelectorAll(".image-popup");

    // Open modal on image click
    imageLinks.forEach(link => {
        link.addEventListener("click", function () {
            const imageUrl = this.getAttribute("data-image");
            modalImage.src = imageUrl;
            modal.style.display = "block";
        });
    });

    // Close modal on close button click
    closeBtn.addEventListener("click", function () {
        modal.style.display = "none";
    });

    // Close modal on outside click
    modal.addEventListener("click", function (e) {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });
});




</script>

    <script src="'.SITE_URL_WEB.'assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="'.SITE_URL_WEB.'assets/vendors/jquery/jquery-3.7.1.min.js"></script>
    <script src="'.SITE_URL_WEB.'assets/vendors/slick/slick.min.js"></script>
     <script src="'.SITE_URL_WEB.'assets/vendors/select2/select2.min.js"></script>
    <script src="'.SITE_URL_WEB.'assets/vendors/wow/wow.js"></script>
    <script src="'.SITE_URL_WEB.'assets/vendors/nouislider/js/nouislider.min.js"></script>
    <script src="'.SITE_URL_WEB.'assets/vendors/nouislider/js/wNumb.min.js"></script>
    <script src="'.SITE_URL_WEB.'assets/vendors/youtube-popup/youtube-popup.jquery.js"></script>
    <script src="'.SITE_URL_WEB.'assets/js/custom.js"></script>
    <script src="'.SITE_URL_WEB.'assets/js/zakat-calculator.js"></script>
</body>

</html>
';
?>