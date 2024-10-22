

<div class='encabezado'>
    <h1 class="nombre-pagina">Iniciar Sesion Admin</h1>
    <p class="descripcion-pagina">Ingresa la contraseña para Iniciar Sesion</p>
</div>
<?php include_once __DIR__ . "/../templates/alertas.php"?>
<div class='login-Admin'>
    <form action="./login" method='POST' >
        <label for="password">Contraseña:</label>
        <input type="password" name="contraseña" id="password">
        <div class='botones'>
            <button type="button"><a href="./"><span>Atras</span></a></button>
            <button type="submit"><span>Ingresar</span></button>
        </div>
    </form>
</div>
