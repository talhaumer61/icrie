<?php
    $typeId = null;
    foreach ($pub_type as $type) {
        if ($type['type_href'] === ZONE) {
            $typeId = $type['type_id'];
            break;
        }
    }
    $sqlArrayFunction = array(
        'select' => 'publication_id, publication_title, publication_href, publication_file, publication_photo, publication_desc, id_type, date_added',
        'where'  => array(
            'publication_status' => '1',
            'id_type'       => $typeId,
            'is_deleted'       => '0'
        ),
        'return_type' => 'all'
    );                  
    $rowsFunctions  = $dblms->getRows(PUBLICATIONS, $sqlArrayFunction);

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
                                <a href="'.SITE_URL_WEB.CONTROLER.'/'.ZONE.'?href='.$val['publication_href'].'">
                                <img src="'.SITE_URL.'uploads/images/publications/'.$val['publication_photo'].'" alt="blog-image"></a>
                            </div>
                            <div class="blog-item-meta">
                                <p><a href="'.SITE_URL_WEB.CONTROLER.'/'.ZONE.'">'.(!empty($val['id_sub_type'])?get_publication_type($val['id_sub_type']):get_functiontypes($val['id_type'])).'</a></p>
                                <p><a href="#">On '.date("d M, Y",strtotime($val['date_added'])).'</a></p>
                            </div>
                            <div class="blog-item-details">
                                <h3><a href="'.SITE_URL_WEB.CONTROLER.'/'.ZONE.'?href='.$val['publication_href'].'">'.$val['publication_title'].'</a></h3>
                                <a href="'.SITE_URL_WEB.CONTROLER.'/'.ZONE.'?href='.$val['publication_href'].'" class="btn-link"><span>continue reading</span> <i class="flaticon-next"></i></a>
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