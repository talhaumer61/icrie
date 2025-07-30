<?php
    $typeId = null;
    foreach ($function_type as $type) {
        if ($type['type_href'] === ZONE) {
            $typeId = $type['type_id'];
            break;
        }
    }
    $sqlArrayFunction = array(
        'select' => 'f.functions_id, f.functions_title, f.functions_href, f.functions_file, f.functions_photo, f.functions_desc, f.id_type, f.id_sub_type, f.date_added',
        'where'  => array(
            'f.functions_status' => '1',
            'f.id_type'       => $typeId,
            'f.is_deleted'       => '0'
        ),
        'return_type' => 'all'
    );                  
    $rowsFunctions  = $dblms->getRows(FUNCTIONS. ' f', $sqlArrayFunction);

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
                                <a href="'.SITE_URL_WEB.CONTROLER.'/'.ZONE.'?href='.$val['functions_href'].'">
                                <img src="'.SITE_URL.'uploads/images/functions/'.$val['functions_photo'].'" alt="blog-image"></a>
                            </div>
                            <div class="blog-item-meta">
                                <p><a href="'.SITE_URL_WEB.CONTROLER.'/'.ZONE.'">'.(!empty($val['id_sub_type'])?get_publication_type($val['id_sub_type']):get_functiontypes($val['id_type'])).'</a></p>
                                <p><a href="#">On '.date("d M, Y",strtotime($val['date_added'])).'</a></p>
                            </div>
                            <div class="blog-item-details">
                                <h3><a href="'.SITE_URL_WEB.CONTROLER.'/'.ZONE.'?href='.$val['functions_href'].'">'.$val['functions_title'].'</a></h3>
                                <a href="'.SITE_URL_WEB.CONTROLER.'/'.ZONE.'?href='.$val['functions_href'].'" class="btn-link"><span>continue reading</span> <i class="flaticon-next"></i></a>
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