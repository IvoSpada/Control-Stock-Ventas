<h1 class="nombre-pagina"><?php echo $title?></h1>

<?php include_once __DIR__ . "/../templates/alertas.php"?>

<button class="user ov-btn-slide-top" onclick="cerrarPestaña()" >Cerrar ventana</button>

<script>
    function cerrarPestaña() {
        window.close();
    }
</script>