<?= view('partials/superior', $headerData) ?>

<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="mb-3">Editar Usuario</h4>
            </div>
            <div class="card-body">
              <form id="editForm" action="<?= base_url('usuario/update/'.$usuario['USUARIO_ID']) ?>" method="post">
                <div class="form-group">
                  <label for="USUARIO_NOMBRE">Nombre</label>
                  <input type="text" name="USUARIO_NOMBRE" class="form-control" value="<?= $usuario['USUARIO_NOMBRE'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="USUARIO_RUT">RUT</label>
                  <input type="text" name="USUARIO_RUT" class="form-control" value="<?= $usuario['USUARIO_RUT'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="USUARIO_ALIAS">Alias</label>
                  <input type="text" name="USUARIO_ALIAS" class="form-control" value="<?= $usuario['USUARIO_ALIAS'] ?>">
                </div>
                <div class="form-group">
                  <label for="USUARIO_PATERNO">Apellido Paterno</label>
                  <input type="text" name="USUARIO_PATERNO" class="form-control" value="<?= $usuario['USUARIO_PATERNO'] ?>">
                </div>
                <div class="form-group">
                  <label for="USUARIO_MATERNO">Apellido Materno</label>
                  <input type="text" name="USUARIO_MATERNO" class="form-control" value="<?= $usuario['USUARIO_MATERNO'] ?>">
                </div>
                <!-- <div class="form-group">
                  <label for="USUARIO_CLAVE">Clave</label>
                  <input type="password" name="USUARIO_CLAVE" class="form-control" required>
                </div> -->
                <div class="form-group">
                  <label for="USUARIO_CORREO">Correo</label>
                  <input type="email" name="USUARIO_CORREO" class="form-control" value="<?= $usuario['USUARIO_CORREO'] ?>">
                </div>
                <div class="form-group">
                  <label for="USUARIO_FONO">Fono</label>
                  <input type="text" name="USUARIO_FONO" class="form-control" value="<?= $usuario['USUARIO_FONO'] ?>">
                </div>
                <div class="form-group">
                  <label for="TIPO_USUARIO_ID">Tipo Usuario</label>
                  <select name="TIPO_USUARIO_ID" class="form-control" required>
                    <?php foreach ($tipos_usuario as $tipo_usuario): ?>
                      <option value="<?= $tipo_usuario['TIPO_USUARIO_ID'] ?>" <?= $usuario['TIPO_USUARIO_ID'] == $tipo_usuario['TIPO_USUARIO_ID'] ? 'selected' : '' ?>>
                        <?= $tipo_usuario['TIPO_USUARIO_NOMBRE'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <button type="button" class="btn btn-primary mt-3" onclick="confirmSave()">Guardar</button>
                <a href="<?= base_url('usuario') ?>" class="btn btn-secondary mt-3">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?= view('partials/footer') ?>
</div>

<!-- Modal de Confirmación de Guardar -->
<div class="modal fade" id="confirmSaveModal" tabindex="-1" aria-labelledby="confirmSaveModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmSaveModalLabel">Confirmar Guardar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que deseas guardar este registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="submitEditForm()">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script>
  function confirmSave() {
    const confirmSaveModal = new bootstrap.Modal(document.getElementById('confirmSaveModal'));
    confirmSaveModal.show();
  }

  function submitEditForm() {
    document.getElementById('editForm').submit();
  }
</script>

<?= view('partials/inferior', $headerData) ?>
