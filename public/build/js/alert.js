/*--------------------------------------------------
---CÓDIGO JS PARA BORRAR ALERTA A LOS 4 SEGUNDOS----
----------------------------------------------------*/
// const alertas = document.querySelectorAll('.alerta');
// alertas.forEach(alerta => {
//     setTimeout(() => {
//         alerta.remove();
//     }, 5000);
// });


/*------------------------------------------------------
---BORRAR LA ALERTA CUANDO SE HACE FOCUS EN EL CAMPO----
--------------------------------------------------------*/
// Selecciona todos los que tengan la clase "input-alert"
document.querySelectorAll('.input-alert').forEach(input => {
    input.addEventListener('focus', function() {
        document.querySelectorAll('.alerta').forEach(alert => {
            alert.style.display = 'none';
        });
    });
});