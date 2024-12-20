/*------------------------------------------------
---JAVASCRIPT PARA VALIDACIONES DE FORMULARIOS----
--------------------------------------------------*/

//si se esta mandando un mail;
document.addEventListener('DOMContentLoaded', function() {
    const botonEnviar = document.getElementById('enviar-mail');
    const formulario = document.getElementById('form-recuperar');

    // Habilitar o deshabilitar el botón en función de la variable `enviando`
    botonEnviar.disabled = enviando;
    // Ocultar el formulario si `enviando` es true
    if (enviando) {
        formulario.style.display = 'none'; // Asegúrate de usar comillas alrededor de 'none'
    }

    // Desactivar el botón al enviar el formulario
    formulario.addEventListener('submit', function() {
        botonEnviar.disabled = true;
        botonEnviar.innerText = "Procesando...";
    });
});