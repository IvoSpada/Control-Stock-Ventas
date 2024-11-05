

<div class='encabezado'>
    <h1 class="nombre-pagina">Iniciar Sesión <?php echo htmlspecialchars($nombreUsuario); ?></h1>
    <p class="descripcion-pagina">Ingresa la contraseña para Iniciar Sesion</p>
</div>

<div class='login-Admin'>
    <?php include_once __DIR__ . "/../templates/alertas.php"?>
    <form method="POST" action="/login?user=<?php echo urlencode($idUsuario); ?>">
        <div class="input-group">
            <label class="label-login" for='password'>Contraseña</label>
            <input name="contraseña" id="password" class="input-login input-alert" type='password' placeholder="Tu Contraseña">
        </div>
        <div class='acciones'>
            <a href="/">Atrás</a>
            <button class="ov-btn-slide-top" type='submit'>Ingresar</button>
        </div>
    </form>
    <?php if ($admin): ?>
    <a href="/olvide">¿Olvidaste la Contraseña? </a>
    <?php endif; ?>
</div>

<script src="/build/js/alert.js"></script> 
