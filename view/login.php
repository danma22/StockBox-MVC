<?php 
  require "layouts/header.php";
?>

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
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
              <p class="mb-4">Inicia sesión y empieza a organizar tu negocio como nunca</p>

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

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
