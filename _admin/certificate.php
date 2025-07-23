<?php

	include "dbsetting/vars_setting.php";

	include "dbsetting/classdbconection.php";

	$dblms = new dblms();

	include "functions/login_func.php";

	include "functions/functions.php";

	checkCpanelLMSALogin();

	

//---------------------------------------------------

    include ("include/header.php");

    include ("include/certificate/query.php");

//---------------------------------------------------

if(isset($_SESSION['msg'])) { 

    

    echo'

    <script>

        $().ready(function() {

            

            toastr.options = {

                "closeButton": true,

                "debug": false,

                "newestOnTop": false,

                "progressBar": true,

                "positionClass": "toast-top-right",

                "preventDuplicates": false,

                "onclick": null,

                "showDuration": 300,

                "hideDuration": 1000,

                "timeOut": 5000,

                "extendedTimeOut": 1000,

                "showEasing": "swing",

                "hideEasing": "linear",

                "showMethod": "fadeIn",

                "hideMethod": "fadeOut"

            } 

              '.$_SESSION['msg']['status'].'

    

        }); 

    </script>';

    unset($_SESSION['msg']);

}

//---------------------------------------------------



echo'

    <div class="page-content">

        <div class="container-fluid">';

//---------------------------------------------------

            include ("include/page_title.php");

//---------------------------------------------------

            include ("include/certificate/list.php");

            // include ("include/certificate/edit.php");

//---------------------------------------------------         

echo'

        </div>

        <!-- container-fluid -->

    </div>

    <!-- End Page-content -->

    ';

//---------------------------------------------------

    include ("include/certificate/modal/add.php");

    include ("include/certificate/modal/edit.php");

//---------------------------------------------------

include ("include/footer.php");

//---------------------------------------------------

echo'





    <script type="text/javascript">

        $(document).ready(function(){

            //---edit item link clicked-------

            $(".edit-certificate").click(function(){

            

                //get variables from "edit link" data attributes

                let cretificate_id      = $(this).attr("data-certificate-id");

                let cretificate_name 	= $(this).attr("data-certificate-name");

                let certificate_status  = $(this).attr("data-certificate-status");

                let certificate_img 	= $(this).attr("data-certificate-img");

                

                $("#certificate_name_edit")         .val(cretificate_name);

                $("#editid")                        .val(cretificate_id);

                $("#certificate_status_edit")		.select2().select2("val", certificate_status); 





            });

            

        });

    </script>



    <!-- JAVASCRIPT -->

    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/libs/metismenu/metisMenu.min.js"></script>

    <script src="assets/libs/simplebar/simplebar.min.js"></script>

    <script src="assets/libs/node-waves/waves.min.js"></script>



    <!-- apexcharts -->

    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>



    

    

    <!-- App js -->

    <script src="assets/js/app.js"></script>



   





</body>

</html>';

//---------------------------------------------------