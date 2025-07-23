
<?php
	include "dbsetting/lms_vars_config.php";
	 
	include "dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "functions/login_func.php";
	include "functions/functions.php";
	checkCpanelLMSALogin();
//---------------------------------------------------
    include ("include/header.php");
//---------------------------------------------------
//---------------------------------------------------
echo'
    <div class="page-content">
        <div class="container-fluid">';
//---------------------------------------------------
            include ("include/page_title.php");
//---------------------------------------------------
            include ("include/newsletter/list.php");
//---------------------------------------------------         
echo'
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->';
//---------------------------------------------------
include ("include/footer.php");
//---------------------------------------------------
echo'
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