<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Stock y Ventas</title>
    <link rel="icon" href="/build/images/LogoLetrasBlancas.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="/build/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php if ($_SERVER['REQUEST_URI'] !== '/' && $_SERVER['REQUEST_URI'] !== '/login'): ?>
<div class="container">
    <!-- Header -->
    <header class="header">
        <button class="toggle-sidebar" onclick="toggleSidebar()">☰</button> <!-- Botón para abrir/cerrar -->
        <div class="user-menu">
            <span id="username">Administrador</span>
            <div class="dropdown">
                <button class="dropdown-button" onclick="toggleDropdown()">Cambiar Usuario</button>
                <div id="dropdownContent" class="dropdown-content">
                    <a href="/admin/perfil">Perfil</a>
                    <a href="/logout">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar">
    <button class="close-sidebar" onclick="toggleSidebar()">✖</button> <!-- Botón para cerrar -->
        <div class="logo">Stock y Ventas HB</div>
        <nav class="nav">
            <ul>
                <p>Empleado</p>
                <li><a href="/admin/dashboard" class="<?= ($_SERVER['REQUEST_URI'] === '/admin/dashboard') ? 'selected' : ''; ?>">
                    <i class="fas fa-tachometer-alt"></i> Panel de control <i class="fas fa-arrow-right"></i>
                </a></li>
                <li><a href="/caja" class="<?= ($_SERVER['REQUEST_URI'] === '/caja') ? 'selected' : ''; ?>">
                    <i class="fas fa-cash-register"></i> Caja <i class="fas fa-arrow-right"></i>
                </a></li>
                <li><a href="/historialVentas" class="<?= ($_SERVER['REQUEST_URI'] === '/historialVentas') ? 'selected' : ''; ?>">
                    <i class="fas fa-history"></i> Historial de ventas <i class="fas fa-arrow-right"></i>
                </a></li>
                <li><a href="/cuentasCorrientes" class="<?= ($_SERVER['REQUEST_URI'] === '/cuentasCorrientes') ? 'selected' : ''; ?>">
                    <i class="fas fa-user-friends"></i> Cuentas Corrientes <i class="fas fa-arrow-right"></i>
                </a></li>

                <p>Admin</p>
                <li><a href="/admin/stock" class="<?= ($_SERVER['REQUEST_URI'] === '/admin/stock') ? 'selected' : ''; ?>">
                    <i class="fas fa-warehouse"></i> Stock <i class="fas fa-arrow-right"></i>
                </a></li>
                <li><a href="/admin/proveedor" class="<?= ($_SERVER['REQUEST_URI'] === '/admin/proveedor') ? 'selected' : ''; ?>">
                    <i class="fas fa-box"></i> Proveedor <i class="fas fa-arrow-right"></i>
                </a></li>
                <li><a href="/admin/productos" class="<?= ($_SERVER['REQUEST_URI'] === '/admin/productos') ? 'selected' : ''; ?>">
                    <i class="fas fa-box"></i> Productos <i class="fas fa-arrow-right"></i>
                </a></li>
                <li><a href="/admin/historialCajas" class="<?= ($_SERVER['REQUEST_URI'] === '/admin/historialCajas') ? 'selected' : ''; ?>">
                    <i class="fas fa-receipt"></i> Historial de cajas <i class="fas fa-arrow-right"></i>
                </a></li>
                <li><a href="/admin/categorias" class="<?= ($_SERVER['REQUEST_URI'] === '/admin/categorias') ? 'selected' : ''; ?>">
                    <i class="fa-solid fa-list"></i> Categorías <i class="fas fa-arrow-right"></i>
                </a></li>
                <li><a href="/admin/empleados" class="<?= ($_SERVER['REQUEST_URI'] === '/admin/empleados') ? 'selected' : ''; ?>">
                    <i class="fa-solid fa-user"></i> Empleados <i class="fas fa-arrow-right"></i>
                </a></li>
            </ul>
        </nav>
    </aside>

    <?php endif; ?>

    <?php echo $contenido; ?>

    <?php if ($_SERVER['REQUEST_URI'] !== '/' && $_SERVER['REQUEST_URI'] !== '/login'): ?>
</div>
    <?php endif; ?>
</body>
</html>