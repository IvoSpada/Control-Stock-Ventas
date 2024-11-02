<div class='encabezado'>
    <h1 class="nombre-pagina">Olvide la Contraseña</h1>
    <p class="descripcion-pagina">Restablece tu contraseña escribiendo el E-mail de recuperación</p>
</div>

<div class='login-Admin'>
    <?php include_once __DIR__ . "/../templates/alertas.php"?>
    
    <form method="POST" action="/olvide" id='form-recuperar'>
        <div class="input-group">
            <label class="label-login" for='email'>E-mail</label>
            <input name="email" id="email" class="input-login" type='email' placeholder="Tu Email">
        </div>
        <div class="acciones">
        <a href="/login?user=Administrador">Iniciar Sesión</a>
        <button class="ov-btn-slide-top" type='submit' id="enviar-mail">Recuperar Contraseña</button>
        </div>
    </form>
</div>
<script>
    // Pasar el valor de $enviando a JavaScript
    const enviando = <?php echo json_encode($enviando); ?>;
</script>

<script src="/build/js/alert.js"></script>
<script src="/build/js/form.js"></script>
