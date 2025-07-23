<?php
    echo ' 
        '.titleMaker('Not Found 404').'   
        <div class="error section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="error-page">
                            <h1>4<span>0</span>4</h1>
                            <h2>Oops! Page not found.</h2>
                            <p>The page <b>'.CONTROLER.'</b> you are looking for is not available or doesn’t belong to this website!</p>						
                            <a class="btn-one" href="'.SITE_URL.'index">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
?>