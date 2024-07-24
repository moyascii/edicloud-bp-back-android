</div>
  <!-- END layout-wrapper -->



  <!-- @@include("partials/customizer.html") -->


  <!-- @@include("partials/vendor-scripts.html")
 -->
  <?= view('partials/vendor-scripts') ?>

  <!-- apexcharts -->
  <script src="<?= base_url('assets/libs/apexcharts/apexcharts.min.js') ?> "></script>

  <!-- Vector map-->
  <script src="<?= base_url('assets/libs/jsvectormap/js/jsvectormap.min.js') ?>"></script>
  <script src="<?= base_url('assets/libs/jsvectormap/maps/world-merc.js') ?>"></script>

  <!--Swiper slider js-->
  <script src="<?= base_url('assets/libs/swiper/swiper-bundle.min.js') ?>"></script>

  <!-- Dashboard init -->
  <script src="<?= base_url('assets/js/pages/dashboard-ecommerce.init.js') ?>"></script>
  <script src="<?= base_url('assets/js/pages/datatables.init.js') ?>"></script>
  <!-- App js -->
  <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>

</html>