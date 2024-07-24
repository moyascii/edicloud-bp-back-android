<?= view('partials/main', $headerData) ?>

<head>

  <!-- @@include("partials/title-meta.html", {"title": "Dashboard"}) -->
  <?= view('partials/title-meta', $headerData) ?>

  <!-- jsvectormap css -->
  <link href="<?= base_url('assets/libs/jsvectormap/css/jsvectormap.min.css') ?> " rel="stylesheet" type="text/css" />

  <!--Swiper slider css-->
  <link href="<?= base_url('assets/libs/swiper/swiper-bundle.min.css') ?>" rel="stylesheet" type="text/css" />

  <!-- @@include("partials/head-css.html") -->
  <?= view('partials/head-css') ?>

</head>

<body>

  <!-- Begin page -->
  <div id="layout-wrapper">

    <!-- Menú -->
    <?= view('partials/topbar', $user) ?>
    <?= view('partials/sidebar', $headerData) ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid">

          <div class="row">
            <div class="col">

              <div class="h-100">
                <div class="row mb-3 pb-1">
                  <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                      <div class="flex-grow-1">
                        <h4 class="fs-16 mb-1">Good Morning, <?= $user['user_nombre'] ?>!</h4>
                        <p class="text-muted mb-0">Este es tu Dashboard.</p>
                      </div>
                      
                    </div><!-- end card header -->
                  </div>
                  <!--end col-->
                </div>
                <!--end row-->

                <div class="row">
                  <div class="col-xl-12 col-md-12">
                    <!-- card -->
                    <div class="card card-animate">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Título</p>
                          </div>
                          <div class="flex-shrink-0">
                            <h5 class="text-success fs-14 mb-0">
                              <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                            </h5>
                          </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                          <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="559.25">0</span>k </h4>
                            <a href="" class="text-decoration-underline">View net earnings</a>
                          </div>
                          <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-success-subtle rounded fs-3">
                              <i class="bx bx-dollar-circle text-success"></i>
                            </span>
                          </div>
                        </div>
                      </div><!-- end card body -->
                    </div><!-- end card -->
                  </div><!-- end col -->

                </div> <!-- end row-->

                

              </div> <!-- end .h-100-->

            </div> <!-- end col -->


          </div>

        </div>
        <!-- container-fluid -->
      </div>
      <!-- End Page-content -->

      <!-- @@include("partials/footer.html") -->
      <?= view('partials/footer') ?>
    </div>
    <!-- end main content-->

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

  <!-- App js -->
  <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>

</html>