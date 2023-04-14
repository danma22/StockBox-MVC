
<?php
  session_start();
  include_once "layouts/header.php"; 
  include_once "model/StoreModel.php";
  $stores = getStores()
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
              <h4 class="fw-bold py-3 mb-4"> Tiendas</h4>

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

              <table id="example" class="display table-responsive text-nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Activa</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($stores as $key => $data) { ?>
                    <tr>
                      <td><?php echo $data['id'] ?></td>
                      <td><?php echo $data['name'] ?></td>
                      <td>
                        <?php if ($data['active'] == 1) { ?>
                          <span class="badge rounded-pill bg-label-success">Activo</span>
                        <?php } else { ?>
                          <span class="badge rounded-pill bg-label-danger">Inactivo</span>
                        <?php } ?>
                      </td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?controller=StoreController&action=loadStoreDashboard&data=<?php echo $data['id']?>"">
                              <i class="bx bx-door-open me-1"></i> Ingresa
                            </a>
                            <a class="dropdown-item" href="index.php?controller=StoreController&action=updateStorePage&data=<?php echo $data['id']?>">
                              <i class="bx bx-edit-alt me-1"></i> Editar
                            </a>
                            <a class="dropdown-item" href="index.php?controller=StoreController&action=delStore&data=<?php echo $data['id']?>">
                              <i class="bx bx-trash me-1"></i> Eliminar
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr>

                  <?php } ?>

                </tbody>
                <tfoot>
                  <tr>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Activa</th>
                      <th>Acciones</th>
                    </tr>
                  </tr>
                </tfoot>
              </table>
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
