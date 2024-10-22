
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
                <li><a href="#"><i class="fas fa-tachometer-alt"></i> Panel de control <i
                            class="fas fa-arrow-right"></i></a></li>
                <li><a href="#"><i class="fas fa-cash-register"></i> Caja <i class="fas fa-arrow-right"></i></a></li>
                <li><a href="#"><i class="fas fa-history"></i> Historial de ventas <i
                            class="fas fa-arrow-right"></i></a></li>
                <li><a href="#"><i class="fas fa-user-friends"></i> Cuentas Corrientes <i
                            class="fas fa-arrow-right"></i></a></li>

                <p>Admin</p>
                <li><a href="#"><i class="fas fa-warehouse"></i> Stock <i class="fas fa-arrow-right"></i></a></li>
                <li><a href="/admin/productos"><i class="fas fa-box"></i> Productos <i class="fas fa-arrow-right"></i></a></li>
                <li><a href="#"><i class="fas fa-receipt"></i> Historial de cajas <i class="fas fa-arrow-right"></i></a>
                </li>
                <li><a href="#"><i class="fa-solid fa-list"></i></i> Categorías <i class="fas fa-arrow-right"></i></a>
                </li>
                <li><a href="#"><i class="fa-solid fa-user"></i> Empleados <i class="fas fa-arrow-right"></i></a>
                </li>
            </ul>
        </nav>

        

    </aside>


    <!-- Main Content -->
    <div class="main-content">
        <!-- Dashboard -->
        <section class="dashboard">
            <h1>Bienvenido al Sistema de Gestión de Stock HB</h1>
            <div class="card-container">

                <div class="card">
                    <h3>Herramienta 1</h3>
                    <p>"text"</p>
                </div>
                <div class="card">
                    <h3>Herramienta 2</h3>
                    <p>"text"</p>
                </div>
                <div class="card">
                    <h3>Herramienta 3</h3>
                    <p>"text"</p>
                </div>
                <div class="card">
                    <h3>Herramienta 4</h3>
                    <p>"text"</p>
                </div>
                <div class="card">
                    <h3>Herramienta 5</h3>
                    <p>"text"</p>
                </div>
                <div class="card">
                    <h3>Herramienta 6</h3>
                    <p>"text"</p>
                </div>
                <div class="card">
                    <h3>Herramienta 7</h3>
                    <p>"text"</p>
                </div>
                <div class="card">
                    <h3>Herramienta 8</h3>
                    <p>"text"</p>
                </div>
            </div>
        </section>
    </div>
</div>
<footer class="footer">

</footer>
<script src="/build/js/script.js"></script>