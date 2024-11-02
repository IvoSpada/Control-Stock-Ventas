
<!-- Main Content -->
<div class="main-content">
    <h1>Información Perfil</h1>
        <div class="recuperar">
            <form action="/admin/perfil" class="form" method="POST">
                <h3>Mail de recuperación</h3>
            <?php if($confirmarMail){ include_once __DIR__ . "/../templates/alertas.php"; } ?>
                <div class="flex-column">
                    <label>Email</label>
                </div>
                <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 32 32" height="20"><g data-name="Layer 3" id="Layer_3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
                    <input placeholder="Ingrese mail de recuperación" class="input" type="email" value="<?= !empty($email) ? htmlspecialchars($email) : '' ?>" name="email" <?php if(!empty($email)){echo 'disabled';}?>>
                </div>
                <input type="hidden" name="formulario" value="recuperar_mail">
                <?php if(empty($email)){echo '<button class="ov-btn-slide-top" type="submit">Confirmar</button>';}?>
            </form>
        </div>
        <div class="datos">
            <form action="/admin/perfil" class="form" method="POST">
                <h3>Cambiar Contraseña</h2>
                <?php if($cambiarcontraseña){ include_once __DIR__ . "/../templates/alertas.php"; } ?>
                <div class="flex-column">
                    <label>Contraseña Actual</label>
                </div>
                <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="-64 0 512 512" height="20"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>        
                    <input placeholder="ingresa tu contraseña actual" class="input" type="password" name="contraseña">
                </div>
                <div class="flex-column">
                    <label>Contraseña Nueva</label>
                </div>
                <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="-64 0 512 512" height="20"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>        
                    <input placeholder="ingresa tu nueva contraseña" class="input" type="password" name="contraseñaNueva">
                </div>
                <div class="flex-column">
                    <label>Repetir contraseña</label>
                </div>
                <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="-64 0 512 512" height="20"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>        
                    <input placeholder="Repita la contraseña nueva" class="input" type="password" name="repetirContraseña">
                </div>
                <input type="hidden" name="formulario" value="cambiar_contraseña">
                <button class="ov-btn-slide-top" type='submit'>Aplicar</button>
            </form>
        </div>
</div>
<script src="/build/js/Script.js"></script>
<script src="/build/js/popUps.js"></script>
<script src="/build/js/responsivesTablas.js"></script>