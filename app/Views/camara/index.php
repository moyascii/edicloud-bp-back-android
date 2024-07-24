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
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Información del Usuario</p>
                      </div>
                      <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                          <i class="ri-arrow-right-up-line fs-13 align-middle"></i> Info Usuario
                        </h5>
                      </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                      <div>
                        <?php $usuario = session()->get() ?>

                        <h1>Detectar patente de vehículo</h1>
                        <video id="video" width="640" height="480" autoplay></video>
                        <button id="capture">Capturar Imagen</button>
                        <canvas id="canvas" width="640" height="480" style="display:none;"></canvas>
                        <p id="licensePlate"></p>
                        <p id="country"></p>
                      </div>
                      <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-success-subtle rounded fs-3">
                          <i class="bx bx-dollar-circle text-success"></i>
                        </span>
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

<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@3.3.0"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/handpose"></script>
<script src="https://cdn.jsdelivr.net/npm/tesseract.js@2.1.1/dist/tesseract.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const context = canvas.getContext('2d');
    const captureButton = document.getElementById('capture');
    const licensePlate = document.getElementById('licensePlate');
    const country = document.getElementById('country');

    // Access the webcam.
    navigator.mediaDevices.getUserMedia({ video: true })
      .then(stream => {
        video.srcObject = stream;
        video.onloadedmetadata = () => {
          video.play();
        };
      })
      .catch(err => {
        console.error("Error accessing the camera: ", err);
      });

    captureButton.addEventListener('click', () => {
      context.drawImage(video, 0, 0, canvas.width, canvas.height);
      detectLicensePlate();
    });

    function detectLicensePlate() {
      Tesseract.recognize(
        canvas,
        'eng',
        {
          logger: m => console.log(m)
        }
      ).then(({ data: { text } }) => {
        licensePlate.innerText = `License Plate: ${text}`;
        identifyCountry(text);
      });
    }

    function identifyCountry(plate) {
      // Simple regex checks for different country formats
      if (/^[A-Z]{2}[0-9]{4}[A-Z]{2}$/.test(plate)) {
        country.innerText = "Country: Chile";
      } else if (/^[A-Z]{1,3}[0-9]{1,4}$/.test(plate)) {
        country.innerText = "Country: Argentina";
      } else if (/^[A-Z]{1,3}[0-9]{1,3}[A-Z]{1,2}$/.test(plate)) {
        country.innerText = "Country: Brazil";
      } else {
        country.innerText = "Country: Unknown";
      }
    }
  });
</script>

<?= view('partials/inferior', $headerData) ?>
