</div>
  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html -->
  <footer class="footer">
    <div
      class="d-sm-flex justify-content-center justify-content-sm-between"
    >
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
        Copyright © 2024 ARCHTYPE. All Rights Reserved.
      </span>
      
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
      Designed & Developed by 
   <a class="custom-link link-underline link-underline-opacity-0" target="_blank" href="https://www.touchmediaads.com/"><b>Touchmedia Ads</b></a>
      </span>
    </div>
  </footer>
  <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>

<!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= ASSET; ?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= ASSET; ?>js/off-canvas.js"></script>
    <script src="<?= ASSET; ?>js/template.js"></script>
    <script src="<?= ASSET; ?>js/settings.js"></script>
    <script src="<?= ASSET; ?>js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?= ASSET; ?>js/jquery.cookie.js" type="text/javascript"></script>
    <script src="<?= ASSET; ?>js/dashboard.js"></script>
    <script src="<?= ASSET; ?>js/config.js"></script>
    <script src="<?= ASSET; ?>js/noticeCreate.js"></script>
    <script src="<?= ASSET; ?>js/editNotice.js"></script>
    <script src="<?= ASSET; ?>js/main_cat.js"></script>
    <script src="<?= ASSET; ?>js/post_create.js"></script>
    <script src="<?= ASSET; ?>js/update_MainCat.js"></script>
    <script src="<?= ASSET; ?>js/update_SubCat.js"></script>
    <script src="<?= ASSET; ?>js/event_SubCat.js"></script>
    <script src="<?= ASSET; ?>js/event_edit.js"></script>
    <!-- Summernote js link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- I will add this code seperate js file -->
    <!-- <script>
    $(document).ready(function() {
        $("#your_summernote").summernote({
          height: 300
        });
        $('.dropdown-toggle').dropdown();
    });
  </script> -->

    <?php
    if(isset($footData) && isset($footData['js'])){
        foreach($footData['js'] as $js){
            echo "<script src='".ASSET."js/".$js.".js'></script>";
        }
    }
    ?>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
  </body>
</html>