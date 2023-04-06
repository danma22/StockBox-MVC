<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="view/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>StockBox | Log in</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="view/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="view/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="view/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="view/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="view/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="view/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="view/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="view/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="view/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <span class="app-brand-logo demo" style="margin-right: 7px;">
                  <img src="view/assets/img/logo.png"/>
                </span>
                <span class="app-brand-text demo text-body fw-bolder">StockBox</span>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">¡Bienvenido a StockBox! 👋</h4>
              <p class="mb-4">Inicia sesión y empieza a organizar tu negocio como nunca</p>

              <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
                <div class="mb-3">
                  <label for="user" class="form-label">Usuario</label>
                  <input type="text" class="form-control" id="user" name="user" placeholder="Ingresa tu nombre de usuario" autofocus/>
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Contraseña</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="pass" class="form-control" name="pass"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Iniciar sesión</button>
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
    <script src="view/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="view/assets/vendor/libs/popper/popper.js"></script>
    <script src="view/assets/vendor/js/bootstrap.js"></script>
    <script src="view/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="view/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="view/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
