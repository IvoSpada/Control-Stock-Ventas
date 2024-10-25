

<div class='encabezado'>
    <h1 class="nombre-pagina">Iniciar Sesion <?php echo htmlspecialchars($nombreUsuario); ?></h1>
    <p class="descripcion-pagina">Ingresa la contraseña para Iniciar Sesion</p>
</div>
<?php include_once __DIR__ . "/../templates/alertas.php"?>
<div class='login-Admin'>
    <form method="POST" action="/login?user=<?php echo urlencode($nombreUsuario); ?>">
        <label for="password">Contraseña:</label>
        <input type="password" name="contraseña" id="password">
        <div class='botones'>
            <!-- <button type="button"><a href="./"><span>Atras</span></a></button> -->
            <button class="ov-btn-slide-top"><a href="/">Atras</a></button>
            <!-- <button type="submit"><span>Ingresar</span></button> -->
            <button class="ov-btn-slide-top" type='submit'>Ingresar</button>
        </div>
    </form>
</div>
