<?= view('partials/superior', $headerData) ?>

<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="mb-3">Crear Nuevo Permiso de Alarma</h4>
            </div>
            <div class="card-body">
              <form id="createForm" action="<?= base_url('permisos_alarma/store') ?>" method="post">
                <div class="form-group">
                  <label for="ALARMA_ID">Alarma</label>
                  <select name="ALARMA_ID" class="form-control" required>
                    <?php foreach ($alarmas as $alarma): ?>
                      <option value="<?= $alarma['ALARMA_ID'] ?>"><?= $alarma['ALARMA_NOMBRE'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="USUARIO_ID">Usuario</label>
                  <select name="USUARIO_ID" class="form-control" required>
                    <?php foreach ($usuarios as $usuario): ?>
                      <option value="<?= $usuario['USUARIO_ID'] ?>"><?= $usuario['USUARIO_NOMBRE'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <button type="button" class="btn btn-primary mt-3" onclick="confirmSave()">Guardar</button>
                <a href="<?= base_url('permisos_alarma') ?>" class="btn btn-secondary mt-3">Cancelar</a>
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
        <button type="button" class="btn btn-primary" onclick="submitCreateForm()">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script>
  function confirmSave() {
    const confirmSaveModal = new bootstrap.Modal(document.getElementById('confirmSaveModal'));
    confirmSaveModal.show();
  }

  function submitCreateForm() {
    document.getElementById('createForm').submit();
  }
</script>

<?= view('partials/inferior', $headerData) ?>
