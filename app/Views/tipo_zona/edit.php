<?= view('partials/superior', $headerData) ?>

<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="mb-3">Editar Tipo de Zona</h4>
            </div>
            <div class="card-body">
              <form id="editForm" action="<?= base_url('tipo_zona/update/'.$tipo_zona['TIPO_ZONA_ID']) ?>" method="post">
                <div class="form-group">
                  <label for="TIPO_ZONA_NOMBRE">Nombre</label>
                  <input type="text" name="TIPO_ZONA_NOMBRE" class="form-control" value="<?= $tipo_zona['TIPO_ZONA_NOMBRE'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="ZONA_ID">Zona</label>
                  <select name="ZONA_ID" class="form-control" required>
                    <?php foreach ($zonas as $zona): ?>
                      <option value="<?= $zona['ZONA_ID'] ?>" <?= $tipo_zona['ZONA_ID'] == $zona['ZONA_ID'] ? 'selected' : '' ?>>
                        <?= $zona['ZONA_NOMBRE'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="COMUNA_ID">Comuna</label>
                  <select name="COMUNA_ID" class="form-control" required>
                    <?php foreach ($comunas as $comuna): ?>
                      <option value="<?= $comuna['COMUNA_ID'] ?>" <?= $tipo_zona['COMUNA_ID'] == $comuna['COMUNA_ID'] ? 'selected' : '' ?>>
                        <?= $comuna['COMUNA_NOMBRE'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <button type="button" class="btn btn-primary mt-3" onclick="confirmSave()">Guardar</button>
                <a href="<?= base_url('tipo_zona') ?>" class="btn btn-secondary mt-3">Cancelar</a>
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
