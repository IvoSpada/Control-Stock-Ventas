
/*--------------------------------------------------
---CÓDIGO JS PARA BORRAR ALERTA A LOS 4 SEGUNDOS----
----------------------------------------------------*/
const alertas = document.querySelectorAll(".alerta");
alertas.forEach((alerta) => {
  setTimeout(() => {
    alerta.remove();
  }, 4000);
});

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

// Cerrar el dropdown si se hace clic fuera de él
window.onclick = function (event) {
  if (!event.target.matches(".dropdown-button")) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }

  // Cerrar la barra lateral si se hace clic fuera de ella
  const sidebar = document.querySelector(".sidebar");
  if (
    sidebar.classList.contains("show") &&
    !event.target.matches(".toggle-sidebar")
  ) {
    sidebar.classList.remove("show");
  }
};

/* CODIGO PARA EL ASIDE RESPONSIVE EN MOBILE */
function toggleSidebar() {
  const sidebar = document.querySelector(".sidebar");
  sidebar.classList.toggle("show"); // Añade o quita la clase 'show'
}

// Cerrar el dropdown si se hace clic fuera de él
document.addEventListener("DOMContentLoaded", () => {
  const reloadButton = document.getElementById("reloadButton");

  // Agregar un botón para recargar la página
  reloadButton.addEventListener("click", () => {
      // Recargar la página sin enviar el formulario
      window.location.href = window.location.href; // Redirigir a la misma página
  });
});

document.addEventListener('DOMContentLoaded', function() {
    console.log(tipoContacto);
});
