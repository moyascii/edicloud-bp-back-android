<?= view('partials/superior', ['title' => 'Seleccionar Condominio']) ?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h4 class="fs-16 mb-1">Hola, <?= session()->get('user_nombre') ?>!</h4>
                    <p class="text-muted mb-0">Selecciona el condominio al que deseas ingresar:</p>

                    <form action="<?= base_url('/login/selectCondominio') ?>" method="post">
                        <div class="form-group">
                            <label for="condominio">Condominio</label>
                            <select id="condominio" name="condominio_id" class="form-control">
                                <?php foreach ($condominios as $condominio): ?>
                                    <option value="<?= $condominio['CONDOMINIO_ID'] ?>"><?= $condominio['CONDOMINIO_NOMBRE'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('partials/inferior') ?>
