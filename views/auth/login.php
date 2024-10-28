

<div class='encabezado'>
    <h1 class="nombre-pagina">Iniciar Sesión <?php echo htmlspecialchars($nombreUsuario); ?></h1>
    <p class="descripcion-pagina">Ingresa la contraseña para Iniciar Sesion</p>
</div>

<div class='login-Admin'>
    <?php include_once __DIR__ . "/../templates/alertas.php"?>
    <form method="POST" action="/login?user=<?php echo urlencode($nombreUsuario); ?>">
        <div class="input-group">
            <label class="label-login" for='password'>Contraseña</label>
            <input name="contraseña" id="password" class="input-login" type='password' placeholder="Tu Contraseña">
        </div>
        <div class='botones'>
            <!-- <button type="button"><a href="./"><span>Atras</span></a></button> -->
            <button class="ov-btn-slide-top"><a href="/">Atrás</a></button>
            <!-- <button type="submit"><span>Ingresar</span></button> -->
            <button class="ov-btn-slide-top" type='submit'>Ingresar</button>
        </div>
    </form>
    <?php if (urlencode($nombreUsuario) == 'Administrador' && !$email == NULL): ?>
    <a href="/olvide">¿Olvidaste la Contraseña? </a>
    <?php endif; ?>
</div>
