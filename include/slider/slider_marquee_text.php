<?php
    $sqlArray   = array ( 
                            'select' 		=>	' slider_title '
                            ,'where' 		=>	array( 
                                                          'slider_status'	=> '1'
                                                        , 'is_deleted'	    => '0'
                                                    )
                            ,'return_type' 	=> 'all' 
                        ); 
    $rows  = $dblms->getRows(SLIDER, $sqlArray);
    echo '
        <div class="text__slider two">
            <div class="text-slide">
                <div class="sliders scroll">
                    <ul>';
                        foreach($rows as $key => $val): 
                            echo '            
                            <li><h2><a href="#" style="color: var(--primary-color-1);">'.$val['slider_title'].'</a><span style="color: var(--primary-color-1);">✦</span></h2></li>';
                        endforeach;
                        echo '
                    </ul>
                </div>
            </div>
        </div>';
?>