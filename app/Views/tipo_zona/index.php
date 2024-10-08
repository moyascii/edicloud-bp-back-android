<?= view('partials/superior', $headerData) ?>

<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="mb-3">Gestión de Tipos de Zona</h4>
              <a href="<?= base_url('tipo_zona/create') ?>" class="btn btn-primary">Crear Nuevo Tipo de Zona</a>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Zona</th>
                    <th>Comuna</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($tipos_zona as $tipo_zona): ?>
                    <tr>
                      <td><?= $tipo_zona['TIPO_ZONA_ID'] ?></td>
                      <td><?= $tipo_zona['TIPO_ZONA_NOMBRE'] ?></td>
                      <td><?= $tipo_zona['ZONA_NOMBRE'] ?></td>
                      <td><?= $tipo_zona['COMUNA_NOMBRE'] ?></td>
                      <td>
                        <a href="<?= base_url('tipo_zona/edit/'.$tipo_zona['TIPO_ZONA_ID']) ?>" class="btn btn-warning btn-sm">Editar</a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $tipo_zona['TIPO_ZONA_ID'] ?>)">Eliminar</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?= view('partials/footer') ?>
</div>

<!-- Modal de Confirmación de Eliminación -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que deseas eliminar este registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form id="deleteForm" action="" method="post" class="d-inline">
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function confirmDelete(id) {
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = `<?= base_url('tipo_zona/delete/') ?>${id}`;
    const confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
    confirmDeleteModal.show();
  }
</script>

<?= view('partials/inferior', $headerData) ?>
