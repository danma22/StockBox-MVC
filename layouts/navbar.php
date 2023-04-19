
<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
    <?php if (isset($_SESSION['name_store'])) { ?>
        <div class="col-2">
            <span class="fw-semibold d-block">Tienda: <?php echo $_SESSION['name_store'] ?> </span>
        </div>
        
    <?php } ?>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <li class="nav-item lh-1 me-3">
                <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                    <img src="assets/img/icons/pageIcons/usuario.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                </div>
                <div class="flex-grow-1">
                    <span class="fw-semibold d-block"> <?php echo $_SESSION['username'] ?> </span>
                    <?php if ($_SESSION['type'] == 1) { ?>
                        <small class="text-muted">SuperAdmin</small>
                    <?php } else { ?>
                        <small class="text-muted">Admin</small>
                    <?php } ?>
                </div>
                </div>
            </li>
            <!-- / User -->

            <!-- Log out -->
            <li class="nav-item lh-2 me-3">
                <a class="dropdown-item" href="index.php?controller=LoginController&action=logOut&data=1">
                    <i class="bx bx-power-off me-2"></i>
                    <span class="align-middle">Cerrar sesión</span>
                </a>
            </li>
            <!-- / Log out -->
        </ul>
    </div>
</nav>

<!-- / Navbar -->