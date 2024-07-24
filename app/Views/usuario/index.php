<?= view('partials/superior', $headerData) ?>

<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="mb-3">Gestión de Usuarios</h4>
              <a href="<?= base_url('usuario/create') ?>" class="btn btn-primary">Crear Nuevo Usuario</a>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>RUT</th>
                    <th>Alias</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo</th>
                    <th>Fono</th>
                    <th>Tipo Usuario</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                      <td><?= $usuario['USUARIO_ID'] ?></td>
                      <td><?= $usuario['USUARIO_NOMBRE'] ?></td>
                      <td><?= $usuario['USUARIO_RUT'] ?></td>
                      <td><?= $usuario['USUARIO_ALIAS'] ?></td>
                      <td><?= $usuario['USUARIO_PATERNO'] ?></td>
                      <td><?= $usuario['USUARIO_MATERNO'] ?></td>
                      <td><?= $usuario['USUARIO_CORREO'] ?></td>
                      <td><?= $usuario['USUARIO_FONO'] ?></td>
                      <td><?= $usuario['TIPO_USUARIO_NOMBRE'] ?></td>
                      <td>
                        <a href="<?= base_url('usuario/edit/'.$usuario['USUARIO_ID']) ?>" class="btn btn-warning btn-sm">Editar</a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $usuario['USUARIO_ID'] ?>)">Eliminar</button>
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
    deleteForm.action = `<?= base_url('usuario/delete/') ?>${id}`;
    const confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
    confirmDeleteModal.show();
  }
</script>

<?= view('partials/inferior', $headerData) ?>
