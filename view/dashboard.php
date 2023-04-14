<?php
  session_start();
  include_once "layouts/header.php";
?>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        
        <?php  include_once "layouts/aside.php"; ?>

        <!-- Layout container -->
        <div class="layout-page">
          
          <?php  include_once "layouts/navbar.php"; ?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-3 col-md-6 col-12 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img src="assets/img/icons/pageIcons/product.png" alt="Products" />
                        </div>
                      </div>
                      <span class="fw-semibold d-block mb-1">Total de productos</span>
                      <h3 class="card-title text-nowrap mb-2 text-success">234</h3>
                      <a class="btn btn-secondary d-grid w-100" name="submit" href="">Ver más</a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img src="assets/img/icons/pageIcons/users.png" alt="Users" />
                        </div>
                      </div>
                      <span class="fw-semibold d-block mb-1">Total de usuarios</span>
                      <h3 class="card-title text-nowrap mb-2 text-success">23</h3>
                      <a class="btn btn-secondary d-grid w-100" name="submit" href="">Ver más</a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img src="assets/img/icons/pageIcons/categories.png" alt="Categories" />
                        </div>
                      </div>
                      <span class="fw-semibold d-block mb-1">Total de categorias</span>
                      <h3 class="card-title text-nowrap mb-2 text-success">6</h3>
                      <a class="btn btn-secondary d-grid w-100" name="submit" href="index.php?controller=CategoriesController&action=loadPage">Ver más</a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <img src="assets/img/icons/pageIcons/changes.png" alt="Changes" />
                        </div>
                      </div>
                      <span class="fw-semibold d-block mb-1">Total de cambios realizados</span>
                      <h3 class="card-title text-nowrap mb-2 text-success">23</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <?php  include_once "layouts/footer.php"; ?>

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
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
    <script src="assets/js/dashboards-analytics.js"></script>

    <?php 
      if ($page[1] != "") {
        echo "<script>
            $('.menu-item').removeClass('active');
            $('#".$page[1]."').addClass('active');
        </script>"; 
      }
    ?>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
