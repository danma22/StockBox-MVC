<?php 
  require "layouts/header.php";
?>

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Toast  -->
          <div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 hide" id="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
            <div class="toast-header">
              <i class="bx bx-bell me-2"></i>
              <div class="me-auto fw-semibold" id="toastHeader"></div>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toastBody"> </div>
          </div>
          <!-- / Toast  -->

          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <span class="app-brand-logo demo" style="margin-right: 7px;">
                  <img src="assets/img/logo.png"/>
                </span>
                <span class="app-brand-text demo text-body fw-bolder">StockBox</span>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">¡Bienvenido a StockBox! 👋</h4>
              <p class="mb-1">Inicia sesión y empieza a organizar tu negocio como nunca</p>
              <p class="mb-1">Integrantes:</p>
              <p class="mb-1">Rodolfo Cervantes Cabrera</p>
              <p class="mb-4">Daniel Eduardo Macias Estrada</p>

              <form id="authForm" class="mb-3" action="" method="POST">
                <div class="alert alert-danger" role="alert" id="alert" style="display:none"></div>
                <div class="mb-3">
                  <label for="user" class="form-label">Usuario</label>
                  <input type="text" class="form-control" id="user" name="user" placeholder="Ingresa tu nombre de usuario" autofocus/>
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="pass">Contraseña</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="pass" class="form-control" name="pass"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <input type="submit" class="btn btn-primary d-grid w-100" value="Iniciar sesión" name="submit">
                </div>
              </form>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    
    <!-- / Content -->
    
    <!-- Core JS -->
    <!-- build:js view/assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="view/js/login.js"></script>

    <script>
      $(document).ready(function () {
          // Si existe le toast, entonces se muestra
          <?php if (count($_SESSION['toast']) > 0) { ?>
              <?php if ($_SESSION['toast']['exito'] == true) { ?>
                  $("#toastHeader").html("<?php echo $_SESSION['toast']['header'] ?>");
                  $("#toastBody").html("<?php echo $_SESSION['toast']['body'] ?>");
                  $("#toast").removeClass("bg-danger");
                  $("#toast").addClass("bg-success");
              <?php } else {?>
                  $("#toastHeader").html("<?php echo $_SESSION['toast']['header'] ?>");
                  $("#toastBody").html("<?php echo $_SESSION['toast']['body'] ?>");
                  $("#toast").removeClass("bg-success");
                  $("#toast").addClass("bg-danger");
              <?php } ?>
              const toast = new bootstrap.Toast(document.getElementById('toast'));
              toast.show();
              <?php $_SESSION['toast'] = array(); ?>
          <?php } ?>
          
      });
    </script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
