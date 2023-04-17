
<?php
  session_start();
  include_once "layouts/header.php"; 
  include_once "model/ProductModel.php";
  $products = getProducts($_SESSION['id_store']);
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
                  <h4 class="fw-bold py-3 mb-4"> Inventario</h4>
                </div>

                <div class="col-sm-2">
                  <a href="index.php?controller=InventoryController&action=addInventoryPage" class="btn btn-secondary">
                    <span class="bx bx-edit-alt"></span>
                    Añadir producto
                  </a>
                </div>
              </div>

              <table id="example" class="display table-responsive text-nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Fecha agregado</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($products as $key => $data) { ?>
                    <tr>
                      <td><?php echo $data['code'] ?></td>
                      <td><?php echo $data['name'] ?></td>
                      <td><?php echo $data['date_added'] ?></td>
                      <td><?php echo $data['price'] ?></td>
                      <td><?php echo $data['name_c'] ?></td>
                      <td><?php echo $data['stock'] ?></td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?controller=InventoryController&action=updateInventoryPage&data=<?php echo $data['id']?>">
                              <i class="bx bx-edit-alt me-1"></i> Editar
                            </a>
                            <a class="dropdown-item actions" data-bs-toggle="modal" data-bs-target="#modalDelete" data-url="index.php?controller=InventoryController&action=delProducts&data=<?php echo $data['id']?>">
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

    <!-- Modal para eliminar -->
    <div class="modal fade" id="modalDelete" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">¿Desea eliminar el registro?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Una vez elimine el este registro, no hay forma de revertirlo
          </div>
          <div class="modal-footer">
            <button type="button" id="closeModal" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" id="delete" class="btn btn-danger">Eliminar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- / Modal para eliminar -->

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
    <script src="assets/js/user.js"></script>

    <script>
      $(document).ready(function () {
          $('#example').DataTable();

          $(".actions").click(function(event) {
              var boton = $(event.target);
              $("#delete").data('url', boton.data("url"));
          });

          $("#delete").click(function(event) {
              window.location.href = $(this).data("url");
          });
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
