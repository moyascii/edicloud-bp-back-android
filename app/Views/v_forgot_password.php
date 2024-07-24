<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Validación de RUT</title>
  <meta name="description" content="The small framework with powerful features">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="/favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-secondary-subtle">
  <div class="container">
    <div class="row mt-5">
      <div class="mx-auto col-12 col-md-4 bg-light p-4 rounded">
        <?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
          <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('login/reset_password') ?>">
          <div class="mb-3">
            <label for="rut" class="form-label">RUT</label>
            <input type="text" class="form-control" id="rut" name="rut" placeholder="Ejemplo: 12345678-9">
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById("rut").addEventListener("input", function() {
        var rut = this.value;
        // Expresión regular para validar el RUT sin puntos y con guión
        var regex = /^\d{7,8}-\d{1}$/;

        if (!regex.test(rut)) {
          // Si el RUT no es válido, muestra un mensaje o realiza una acción
          console.log("El formato del RUT no es válido. Debe ser sin puntos y con guión.");
          // Aquí puedes, por ejemplo, mostrar un mensaje de error en la interfaz
        } else {
          // Si el RUT es válido, puedes realizar alguna acción aquí
          console.log("El RUT es válido.");
        }
      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
