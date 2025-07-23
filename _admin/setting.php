
<?php
	include "dbsetting/lms_vars_config.php";
	include "dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "functions/login_func.php";
	include "functions/functions.php";
	checkCpanelLMSALogin();
    include ("include/header.php");
    include ("include/setting/query.php");
    if(isset($_SESSION['msg'])) { 
        echo'
        <script>
            $().ready(function() 
            {
                toastr.options = 
                {
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
    echo'
    <div class="page-content">
        <div class="container-fluid">';
            include ("include/page_title.php");
            include ("include/setting/list.php");
            include ("include/setting/edit.php");     
            echo'
        </div>
    </div>';
    include ("include/footer.php");
    echo'
    <!-- Summernote js -->
    <script src="assets/libs/summernote/summernote-bs4.min.js"></script>
    <!-- init js -->
    <script src="assets/js/pages/form-editor.init.js"></script>
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
?>