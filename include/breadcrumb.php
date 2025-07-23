<?php
echo'
    <div class="inner-page-hero" style="background-image: url(assets/images/background/team-bg.jpg);">
        <div class="container">
            <div class="hero-heading-title">
                <h2>'.(ZONE ? moduleName(ZONE) : moduleName(CONTROLER)).'</h2>
            </div>
            <ul class="bradcrumb">
                <li><a href="'.SITE_URL.'">Home</a></li>
                <li><a href="#">'.moduleName(CONTROLER).'</a></li>
                '.(ZONE ? '<li><a href="#">'.moduleName(ZONE).'</a></li>' : '').'
            </ul>
        </div>
    </div>
';

// echo '
//     <div class="page-banner-area events-pages event-details">
//         <div class="container-fluid">
//             <div class="single-page-banner-content">
//                 <h1>'.(ZONE ? moduleName(ZONE) : moduleName(CONTROLER)).'</h1>
//                 <ul>
//                     <li><a href="'.SITE_URL.'">Home</a></li>
//                     <li>'.moduleName(CONTROLER).'</li>
//                     '.(ZONE ? '<li>'.moduleName(ZONE).'</li>' : '').'
//                 </ul>
//             </div>
//         </div>
//         <div class="page-banner-shape-1">
//             <img src="'.SITE_URL.'assets/site/images/banner/banner-one-shape-1.png" alt="images">
//         </div>
//         <div class="page-banner-shape-2">
//             <img src="'.SITE_URL.'assets/site/images/banner/banner-one-shape-2.png" alt="images">
//         </div>
//         <div class="page-banner-shape-3">
//             <img src="'.SITE_URL.'assets/site/images/banner/banner-one-shape-3.png" alt="images">
//         </div>
//     </div>
// ';
?>