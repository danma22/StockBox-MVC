
<?php
  session_start();
  include_once "layouts/header.php"; 
  include_once "model/UserModel.php";
  $users = getUsers($_SESSION['id_store']);
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
            <div class="row justify-content-between">
                <div class="col-sm-1">
                  <h4 class="fw-bold py-3 mb-4"> Usuarios</h4>
                </div>

                <div class="col-sm-2">
                  <a href="index.php?controller=UserController&action=addUserPage" class="btn btn-secondary">
                    <span class="bx bx-edit-alt"></span>
                    Añadir usuario
                  </a>
                </div>
              </div>

              <table id="example" class="display table-responsive text-nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre(s)</th>
                    <th>Apellidos</th>
                    <th>Nombre de usuario</th>
                    <th>Correo electrónico</th>
                    <th>Fecha Agregado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $key => $data) { ?>
                    <tr>
                      <td><?php echo $data['id'] ?></td>
                      <td><?php echo $data['name'] ?></td>
                      <td><?php echo $data['lastname_p'].' '.$data['lastname_m'] ?></td>
                      <td><?php echo $data['username'] ?></td>
                      <td><?php echo $data['email'] ?></td>
                      <td><?php echo $data['date_added'] ?></td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0);">
                              <i class="bx bx-edit-alt me-1"></i> Editar
                            </a>
                            <a class="dropdown-item" href="javascript:void(0);">
                              <i class="bx bx-trash me-1"></i> Eliminar
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr>

                  <?php } ?>

                </tbody>
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