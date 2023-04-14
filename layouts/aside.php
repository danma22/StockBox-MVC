<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="assets/img/logo.png"/>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">StockBox</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <?php if ($_SESSION['type'] == 1 && $_SESSION['id_store'] == -1) { ?>
        <!-- Tiendas -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Tiendas</span>
        </li>
        <li class="menu-item" id="itemTiendas">
            <a href="index.php?controller=StoreController&action=loadPage" class="menu-link">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div data-i18n="Store">Tiendas</div>
            </a>
        </li>
        <li class="menu-item" id="itemAddTiendas">
            <a href="index.php?controller=StoreController&action=addStorePage" class="menu-link">
                <i class="menu-icon tf-icons bx bx-customize"></i>
                <div data-i18n="AddStore">Añadir tienda</div>
            </a>
        </li>

        <?php } else { ?>
        
        <!-- General -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">General</span>
        </li>
        <li class="menu-item" id="itemInicio">
            <a href="index.php?controller=DashboardController&action=loadPage" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-alt"></i>
                <div data-i18n="Home">Inicio</div>
            </a>
        </li>
        <li class="menu-item" id="itemUsuarios">
            <a href="index.php?controller=UserController&action=loadPage" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Users">Usuarios</div>
            </a>
        </li>

        <!-- Stock -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Stock</span>
        </li>
        <li class="menu-item" id="itemInventario">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Inventario">Inventario</div>
            </a>
        </li>
        <li class="menu-item" id="itemCategorias">
            <a href="index.php?controller=CategoriesController&action=loadPage" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category-alt"></i>
                <div data-i18n="Category">Categorias</div>
            </a>
        </li>

        <!-- Ventas -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Ventas</span>
        </li>
        <li class="menu-item" id="itemVenta">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-coin"></i>
                <div data-i18n="Inventario">Realizar venta</div>
            </a>
        </li>
        <li class="menu-item" id="itemHistorialVenta">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-coin-stack"></i>
                <div data-i18n="Category">Historial de ventas</div>
            </a>
        </li>

        <?php } ?>
    </ul>
</aside>
<!-- / Menu -->