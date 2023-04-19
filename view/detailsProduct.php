
<?php
  session_start();
  include_once "layouts/header.php"; 
  include_once "model/ProductModel.php";
  include_once "model/CategoriesModel.php";
  include_once "model/StockModel.php";

  $product_data = array();
  if (isset($id_product)) {
    $product_data = searchProduct($id_product);
  } else {
    $id_product = "";
  }

  $stock_history = getStockLog($id_product);
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
                <h4 class="fw-bold py-3 mb-4"> Detalles del producto</h4>

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

                <!-- Información de producto -->
                <div class="row">
                  <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                      <div class="d-flex align-items-start row">
                        <div class="col-sm-7">
                          <div class="card-body">
                            <h5 class="card-title text-primary"><?php echo $product_data['name'] ?></h5>
                            <div class="demo-inline-spacing mt-3 mb-3">
                              <ul class="list-group">
                                <li class="list-group-item d-flex align-items-center">
                                  <i class="bx bx-barcode me-2"></i>
                                  Código: <?php echo $product_data['code'] ?>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                  <i class="bx bx-purchase-tag-alt me-2"></i>
                                  Precio: $<?php echo $product_data['price'] ?>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                  <i class="bx bx-category-alt me-2"></i>
                                  Categoria: <?php echo $product_data['name_category'] ?>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                  <i class="bx bx-table me-2"></i>
                                  Stock: <?php echo $product_data['stock'] ?>
                                </li>
                              </ul>
                            </div>

                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                              <span class="bx bx-edit-alt"></span>
                              Actualizar Stock
                            </button>
                          </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                          <div class="card-body pb-0 px-0 px-md-4">
                            <img src="assets/img/illustrations/3d_delivery_box_parcel.jpg" height="240" alt="View Details Product">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>

                <!-- / Información de producto -->

                <!-- Historial de cambios de stock -->
                <h4 class="fw-bold py-3 mb-4"> Historial de cambios de stock</h4>
                <table id="example" class="display table-responsive text-nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Nota</th>
                      <th>Referencia</th>
                      <th>Cantidad</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($stock_history as $key => $data) { ?>
                      <tr>
                        <td><?php echo $data['date_added'] ?></td>
                        <td><?php echo $data['note'] ?></td>
                        <td><?php echo $data['reference'] ?></td>
                        <td><?php echo $data['quantity'] ?></td>
                      </tr>

                    <?php } ?>

                  </tbody>
                </table>


              </div>
            </div>
            <!--/ Responsive Table -->

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

    <!-- Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Agregar o eliminar stock</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger" role="alert" id="alert" style="display:none"></div>
            <form id="addStockForm" method="POST">
              <input type="hidden" name="id" id="id" value="<?php echo $id_product ?>">
              <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['username'] ?>">
              <input type="hidden" name="stock" id="stock" value="<?php echo $product_data['stock'] ?>">
              <div class="row">
                <div class="col mb-3">
                  <label for="ref" class="form-label">Referencia</label>
                  <input type="text" id="ref" name="ref" class="form-control" placeholder="Ingresa un código de referencia" />
                </div>
              </div>
              <div class="row">
                <div class="col mb-3">
                  <label for="units" class="form-label">Unidades</label>
                  <input type="number" id="units" name="units" class="form-control" placeholder="Ingresa las unidades a actualizar" />
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"> Cancelar </button>
            <button type="button" id="addStock" class="btn btn-primary modifyStock">Agregar Stock</button>
            <button type="button" id="delStock" class="btn btn-danger modifyStock">Eliminar Stock</button>
          </div>
        </div>
      </div>
    </div>
    <!-- / Modal -->

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
    <script src="view/js/stockLog.js"></script>
    <script type="text/javascript" language="javascript" src="assets/datatables/js/jquery.dataTables.js"></script>

    <script>
      $(document).ready(function () {
          $('#example').DataTable();

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


