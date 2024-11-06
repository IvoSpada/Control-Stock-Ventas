/*------------------------------------------------
---JAVASCRIPT PARA VALIDACIONES DE FORMULARIOS----
--------------------------------------------------*/
function cerrarPestaña() {
    window.close();
}

document.addEventListener("DOMContentLoaded", () => {
    const reloadButton = document.getElementById("reloadButton");

    // Agregar un botón para recargar la página
    reloadButton.addEventListener("click", () => {
        // Recargar la página sin enviar el formulario
        window.location.href = window.location.href; // Redirigir a la misma página
    });
});

//si se esta mandando un mail;
document.addEventListener('DOMContentLoaded', function() {
    const botonEnviar = document.getElementById('enviar-mail');
    const formulario = document.getElementById('form-recuperar');
    const instruccion = document.getElementById('descripcion');


    // Habilitar o deshabilitar el botón en función de la variable `enviando`
    botonEnviar.disabled = enviando;
    // Ocultar el formulario si `enviando` es true
    if (enviando) {
        formulario.style.display = 'none'; // Asegúrate de usar comillas alrededor de 'none'
        instruccion.textContent = 'Verifica tu mail para restablecer tu contraseña';
    }

    // Desactivar el botón al enviar el formulario
    formulario.addEventListener('submit', function() {
        botonEnviar.disabled = true;
        botonEnviar.innerText = "Procesando...";
    });
});