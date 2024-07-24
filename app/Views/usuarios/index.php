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
                        <div class="ms-2 mb-3 col">
                          <a href="<?= base_url('/usuarios/create') ?>" class="btn btn-success waves-effect waves-light">+</a>
                        </div>
                      </div>
                      <div class="row">

                        <div class="col">
                          <table class="table table-bordered dt-responsive nowrap table-striped align-middle">
                            <thead>
                              <tr>
                                <th>Nombre</th>
                                <th>Rut</th>
                                <th>Tipo de Usuario</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($usuarios as $usuario) : ?>
                                <?php if ($usuario['USUARIO_RUT'] != session()->get('user_rut')
                                  && $usuario['TIPO_USUARIO_NOMBRE'] != 'Administrador Condominio'
                                  && $usuario['TIPO_USUARIO_NOMBRE'] != 'Administrador Web'
                                ) : ?>
                                  <tr>
                                    <th scope="row"><?= $usuario['USUARIO_NOMBRE'] ?></th>
                                    <td><?= $usuario['USUARIO_RUT'] ?></td>
                                    <td>
                                      <?php foreach ($usuario_tipos as $tipo){
                                        echo $tipo->TIPO_USUARIO_NOMBRE;
                                      } ?>
                                      <?= $usuario['TIPO_USUARIO_NOMBRE'] ?>
                                    </td>
                                    <td>
                                      <a href="<?= base_url('/usuarios/edit/' . $usuario['USUARIO_ID']) ?>" class="btn btn-warning btn-sm">Editar</a>
                                      <a href="<?= base_url('/usuarios/delete/' . $usuario['USUARIO_ID']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Eliminar</a>                                    
                                    </td>
                                  </tr>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
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