
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
              <h4 class="fw-bold py-3 mb-4"> Formulario</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic with Icons -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Añadir tienda</h5>
                    </div>

                    <div class="card-body">
                      <form>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Nombre</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text">
                                <i class="bx bx-buildings"></i>
                              </span>
                              <input
                                type="text"
                                id="basic-icon-default-company"
                                class="form-control"
                                placeholder="Doña Tota"
                                aria-label="Doña Tota"
                                aria-describedby="basic-icon-default-company2"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-company">¿Activo?</label>
                          <div class="col-sm-10">
                            <div class="row">
                              <div class="form-check col-sm-1">
                                <input class="form-check-input" type="radio" value="1" name="activo" checked/>
                                <label class="form-check-label" for="defaultCheck1"> Activo </label>
                              </div>
                              <div class="form-check col-sm-1">
                                <input class="form-check-input" type="radio" value="0" name="activo" />
                                <label class="form-check-label" for="defaultCheck3"> Desactivado </label>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row justify-content-end">
                          <div class="col-sm-1">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                          </div>
                        </div>
                      </form>
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
    <script type="text/javascript" language="javascript" src="assets/datatables/js/jquery.dataTables.js"></script>

    <script>
      $(document).ready(function () {
          $('#example').DataTable();
      });
    </script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
