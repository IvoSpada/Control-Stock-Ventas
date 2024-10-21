function toggleDropdown() {
  const dropdown = document.getElementById("dropdownMenu");
  dropdown.classList.toggle("show");
}

function toggleDropdown() {
  var dropdownContent = document.getElementById("dropdownContent");
  dropdownContent.classList.toggle("show");
}

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
};

/* CODIGO PARA EL ASIDE RESPONSIVE EN MOBILE */
/* EL CODIGO COMENTADO ES UNA FUNCIONALIDAD EN DESAROLLO PERO AHORA MISMO IMPOSIBLE DE TESTEAR, 
SE PUEDE VOLVER A ACTIVAR CUANDO SE PONGAN LOS LINKS EN LOS BOTONES */

function toggleSidebar() {
    const sidebar = document.querySelector(".sidebar");
    sidebar.classList.toggle("show"); // Añade o quita la clase 'show'
}

// Cerrar el dropdown si se hace clic fuera de él
// window.onclick = function (event) {
//     if (!event.target.matches(".dropdown-button")) {
//         var dropdowns = document.getElementsByClassName("dropdown-content");
//         for (var i = 0; i < dropdowns.length; i++) {
//             var openDropdown = dropdowns[i];
//             if (openDropdown.classList.contains("show")) {
//                 openDropdown.classList.remove("show");
//             }
//         }
//     }

//     // Cerrar la barra lateral si se hace clic fuera de ella
//     const sidebar = document.querySelector(".sidebar");
//     if (sidebar.classList.contains("show") && !event.target.matches(".toggle-sidebar")) {
//         sidebar.classList.remove("show");
//     }
// };
