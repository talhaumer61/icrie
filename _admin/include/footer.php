<?php
// if ($footer_hide != '1') {
  echo '
  <footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 footer-copyright">
          <p class="mb-0">'.COPY_RIGHTS_ORG.'</p>
        </div>
        <div class="col-md-6">
          <p class="pull-right mb-0">Powered by: <a href="'.COPY_RIGHTS_URL.'">'.COPY_RIGHTS.'</a></p>
        </div>
      </div>
    </div>
  </footer>';
// }
echo '
</div>
</div>

<!-- INCLUDES MODAL FUNCTIONS -->
<script type="text/javascript">
    function showAjaxModalZoom(url) {
        $.ajax( {
          url: url,
          success: function ( response ) {
              jQuery( \'#show_modal\' ).html( response );
              $("#show_modal").modal("show");
          }
        });
    }
</script>
<!-- AJAX MODAL AND CANVAS -->
<div class="modal fade" id="show_modal"></div>

<script type="text/javascript">
    function confirm_modal( delete_url ) {
        swal( {
            title: "Are you sure?",
            text: "Are you sure that you want to delete this information?",
            type: "warning",
            showCancelButton: true,
            showLoaderOnConfirm: true,
            closeOnConfirm: false,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel",
            cancelButtonColor: "#f5f7fa",
            confirmButtonColor: "#ed5e5e"
        }, function () {
            $.ajax( {
                url: delete_url,
                type: "POST"
            } )
            .done( function ( data ) {
                swal( {
                    title: "Deleted",
                    text: "Information has been successfully deleted",
                    type: "success"
                }, function () {
                    location.reload();
                } );
            } )
            .error( function ( data ) {
                swal( "Oops", "We couldn\'t\ connect to the server!", "error" );
            } );
        } );
    }
</script>
    <!-- latest jquery-->
    <script src="'.SITE_URL.'admin/assets/js/jquery-3.5.1.min.js"></script>
    <!-- feather icon js-->
    <script src="'.SITE_URL.'admin/assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="'.SITE_URL.'admin/assets/js/sidebar-menu.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/config.js"></script>
    <!-- Bootstrap js-->
    <script src="'.SITE_URL.'admin/assets/js/bootstrap/popper.min.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <script src="'.SITE_URL.'admin/assets/js/chart/chartist/chartist.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/chart/knob/knob.min.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/chart/knob/knob-chart.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/prism/prism.min.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/clipboard/clipboard.min.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/counter/jquery.waypoints.min.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/counter/jquery.counterup.min.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/counter/counter-custom.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/custom-card/custom-card.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/dropzone/dropzone.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/dropzone/dropzone-script.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/vector-map/map/jquery-jvectormap-au-mill.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/vector-map/map/jquery-jvectormap-in-mill.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/vector-map/map/jquery-jvectormap-asia-mill.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/dashboard/default.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="'.SITE_URL.'admin/assets/js/script.js"></script>
    
    <!-- Plugins JS start-->
    <script src="'.SITE_URL.'admin/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/tooltip-init.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/chart/chartjs/chart.min.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/owlcarousel/owl.carousel.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/owlcarousel/owl-custom.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/select2/select2.full.min.js"></script>
    <script src="'.SITE_URL.'admin/assets/js/select2/select2-custom.js"></script>
  </body>
</html>';
// include_once "sessionMsg.php";
?>