<?= view('partials/superior', $headerData) ?>

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
                    <h4 class="fs-16 mb-1">Good Morning, <?= $user['user_nombre'] ?>!
                      <small>(<?= session()->get('condominio_seleccionado')['CONDOMINIO_NOMBRE'] ?>)</small>
                    </h4>
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
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> <?= $headerData['title'] ?></p>
                      </div>
                      <!-- <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                          <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                        </h5>
                      </div> -->
                    </div>
                    <div class="justify-content-between mt-4">
                      <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                          <?= session()->getFlashdata('success') ?>
                        </div>
                      <?php endif; ?>
                      <div class="row">
                        <div class="col-xl-6 col-md-8">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Cambiar Contraseña</h4>
                              <form action="<?= base_url('usuarios/updatePassword') ?>" method="POST">
                                <!-- <div class="mb-3">
                                  <label for="current_password" class="form-label">Contraseña Actual</label>
                                  <input type="password" class="form-control" id="current_password" name="current_password" required>
                                </div> -->
                                <div class="mb-3">
                                  <label for="new_password" class="form-label">Nueva Contraseña</label>
                                  <input type="password" class="form-control" id="new_password" name="new_password" required>
                                </div>
                                <div class="mb-3">
                                  <label for="confirm_password" class="form-label">Confirmar Contraseña Nueva</label>
                                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Cambiar</button>
                              </form>
                            </div>
                          </div>
                        </div>
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


<?= view('partials/inferior', $headerData) ?>