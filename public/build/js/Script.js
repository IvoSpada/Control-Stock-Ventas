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

/* CODIGO JS PARA EL POP-UP DE PRODUCTO */
document.addEventListener("DOMContentLoaded", () => {
  const addSupplierBtn = document.getElementById("addSupplierBtn");
  const supplierPopup = document.getElementById("supplierPopup");
  const supplierForm = document.getElementById("supplierForm");
  const supplierList = document.getElementById("supplierList");

  // Abrir el popup
  addSupplierBtn.addEventListener("click", () => {
    supplierPopup.style.display = "block"; // Muestra el popup
    supplierForm.reset(); // Resetea el formulario
    console.log("boton apretado");
  });

  // Cerrar el popup
  window.closePopup = () => {
    supplierPopup.style.display = "none"; // Oculta el popup
  };

  // Manejar el envío del formulario
  supplierForm.addEventListener("submit", (event) => {
    event.preventDefault(); // Previene el comportamiento por defecto

    const id = supplierList.rows.length + 1; // Genera un ID basado en el número de filas
    const name = document.getElementById("supplierName").value;
    const contact = document.getElementById("supplierContact").value;
    const mail = document.getElementById("supplierMail").value;
    const desc = document.getElementById("supplierDescription").value;

          const newRow = supplierList.insertRow();
          newRow.innerHTML = `
                    <td>${id}</td>
                    <td>${name}</td>
                    <td>${contact}</td>
                    <td>${mail}</td>
                    <td class="actions">
                        <button onclick="editSupplier(this)">Editar</button>
                        <button onclick="deleteSupplier(this)">Eliminar</button>
                        <button onclick="deleteSupplier(this)">Descripción</button>
                    </td>
                `;
          // Cerrar el popup
          closePopup();
  });
});
