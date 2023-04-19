
<?php
  session_start();
  include_once "layouts/header.php"; 
  include_once "model/CategoriesModel.php";

  $category_data = array();
  if (isset($id_category)) {
    $category_data = searchCategory($id_category);
  } else {
    $id_category = "";
  }
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
              <h4 class="fw-bold py-3 mb-4"> Categorias</h4>

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

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic with Icons -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0"><?php echo $page[0] ?></h5>
                    </div>

                    <div class="card-body">
                      <div class="alert alert-danger" role="alert" id="alert" style="display:none"></div>
                      <form id="addCategoryForm" method="POST">
                        <input type="hidden" name="id" id="id" value="<?php echo $id_category ?>">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name">Nombre</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text">
                                <i class="bx bx-category-alt"></i>
                              </span>
                              <?php if (count($category_data) != 0) { ?>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre de la categoria" value="<?php echo $category_data['name'] ?>"/>
                              <?php } else { ?>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre de la categoria"/>
                              <?php } ?>
                              
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Descripción</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text">
                                <i class="bx bx-comment-detail"></i>
                              </span>
                              <?php if (count($category_data) != 0) { ?>
                                <input type="text" id="desc" name="desc" class="form-control" placeholder="Descripción de la categoria" value="<?php echo $category_data['description'] ?>"/>
                              <?php } else { ?>
                                <input type="text" id="desc" name="desc" class="form-control" placeholder="Descripción de la categoria"/>
                              <?php } ?>
                              
                            </div>
                          </div>
                        </div>

                        <div class="row justify-content-end">
                          <div class="col-sm-2">
                            <input type="submit" class="btn btn-primary w-100" value="Enviar" name="submit">
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
    <script src="view/js/category.js"></script>

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
