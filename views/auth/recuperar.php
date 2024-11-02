<div class='encabezado'>
    <h1 class='nombre-pagina'>Recuperar Contraseña</h1>
    <p class="descripcion-pagina">Coloca tu nueva contraseña a continuación</p>
</div>

<div class='login-Admin'>
    <?php include_once __DIR__ . "/../templates/alertas.php"; if ($error) return;?>
    <form method="POST" action="/recuperar?token=<?php echo htmlspecialchars($token); ?>">
        <div class="input-group">
            <label class="label-login" for="password">Contraseña:</label>
            <input class="input-login input-alert" type="password" id="password" name="contraseña" placeholder="Tu Contraseña" >
        </div>   
        <div class="input-group">
            <label class="label-login" for="repContraseña">Repetir contraseña:</label>
            <input class="input-login input-alert" type="password" id="repContraseña" name="repContraseña" placeholder="Repita la contraseña" >
        </div>
        <div class="acciones">
        <a href="/login?user=Administrador">Iniciar Sesión</a>
        <button class="ov-btn-slide-top" type='submit'>Restablecer Contraseña</button>
        </div>
    </form>
</div>

<script src="/build/js/alert.js"></script>