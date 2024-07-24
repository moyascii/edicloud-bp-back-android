<?= view('partials/superior', $headerData) ?>

<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">

      <div class="row">
        <div class="col">
          <div class="h-100">
            <div class="row mb-3 pb-1">
              <div class="col-12">
                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                  <h4 class="fs-16 mb-1">Hola, <?= $user['user_nombre'] ?>!</h4>
                  <p class="text-muted mb-0">Este es tu Dashboard para la gestión de usuarios.</p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xl-12 col-md-12">
                <div class="card card-animate">
                  <div class="card-body">
                    <form action="<?= base_url('/usuarios/store') ?>" method="post">
                      <div class="row">
                        <div class="mb-3 col-md-6">
                          <label for="usuarioRut" class="form-label">RUT del Usuario</label>
                          <input type="text" class="form-control" id="usuarioRut" name="USUARIO_RUT" placeholder="RUT del Usuario" required>
                          <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger">
                              <?= session()->getFlashdata('error') ?>
                            </div>
                          <?php endif; ?>
                        </div>

                        <div class="mb-3 col-md-6">
                          <label for="usuarioNombre" class="form-label">Nombre</label>
                          <input type="text" class="form-control" id="usuarioNombre" name="USUARIO_NOMBRE" placeholder="Nombre del Usuario">
                        </div>

                        <div class="mb-3 col-md-6">
                          <label for="usuarioPaterno" class="form-label">Apellido Paterno</label>
                          <input type="text" class="form-control" id="usuarioPaterno" name="USUARIO_PATERNO" placeholder="Apellido Paterno">
                        </div>

                        <div class="mb-3 col-md-6">
                          <label for="usuarioMaterno" class="form-label">Apellido Materno</label>
                          <input type="text" class="form-control" id="usuarioMaterno" name="USUARIO_MATERNO" placeholder="Apellido Materno">
                        </div>

                        <div class="mb-3 col-md-6">
                          <label for="usuarioCorreo" class="form-label">Correo Electrónico</label>
                          <input type="email" class="form-control" id="usuarioCorreo" name="USUARIO_CORREO" placeholder="Correo Electrónico">
                        </div>

                        <div class="mb-3 col-md-6">
                          <label for="usuarioFono" class="form-label">Teléfono</label>
                          <input type="text" class="form-control" id="usuarioFono" name="USUARIO_FONO" placeholder="Teléfono de Contacto">
                        </div>

                        <div class="mb-3 col-md-6">
                          <label for="usuarioTipo" class="form-label>">Tipo de Usuario</label>
                          <select class="form-select mb-3" name="tipo_usuario_id" aria-label="Default select example">
                            <?php foreach ($tipos_usuario as $tipo_usuario) : ?>
                              <?php if (!($user['user_type'] == 'Administrador Condominio' && $tipo_usuario['TIPO_USUARIO_NOMBRE'] == 'Administrador Web')): ?>
                                <option value="<?= $tipo_usuario['TIPO_USUARIO_ID'] ?>">
                                  <?= $tipo_usuario['TIPO_USUARIO_NOMBRE'] ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>


                        <div class="text-end">
                          <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                          <a href="<?= base_url('/usuarios') ?>" class="btn btn-secondary">Volver</a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <?= view('partials/footer') ?>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const rutInput = document.getElementById("usuarioRut");
    const form = document.querySelector("form");

    form.addEventListener("submit", function(event) {
      const rutValue = rutInput.value;
      const rutPattern = /^[0-9]{7,8}-[0-9kK]$/; // RUT sin puntos y con guión

      if (!rutPattern.test(rutValue)) {
        event.preventDefault(); // Evita que se envíe el formulario
        alert("Por favor, ingrese un RUT válido (sin puntos y con guión, ej: 11222333-4).");
      }
    });
  });
</script>

<?= view('partials/inferior', $headerData) ?>