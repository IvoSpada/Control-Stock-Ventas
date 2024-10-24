<!-- Pagina de seleccion de usuario -->

<div class='encabezado'>
    <h1 class="nombre-pagina">Ingresar</h1>
    <p class="descripcion-pagina">Selecciona un usuario para ingresar</p>
</div>
<div class="usuarios">
    <form method="POST" action="/"> 
        <?php include_once __DIR__ . "/../templates/mostrarEmpleados.php" ?>
    </form>
</div>