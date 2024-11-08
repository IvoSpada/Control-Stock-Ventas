/*---------------------------------------------
---CODIGO JS PARA EL POP-UP DE PROVEEDOR----
-----------------------------------------------*/
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
//   supplierForm.addEventListener("submit", (event) => {
//     event.preventDefault(); // Previene el comportamiento por defecto

//     const id = supplierList.rows.length; // Genera un ID basado en el número de filas
//     const name = document.getElementById("supplierName").value;
//     const contact = document.getElementById("supplierContact").value;
//     const mail = document.getElementById("supplierMail").value;
//     const descr = document.getElementById("supplierDescription").value;

//     const newRow = supplierList.insertRow();
//     newRow.innerHTML = `
//                     <td>${id}</td>
//                     <td>${name}</td>
//                     <td>${contact}</td>
//                     <td>${mail}</td>
//                     <td>${descr}</td>
//                     `;
//     // Cerrar el popup
//     closePopup();
//   });
});

/*---------------------------------------------
---RESPONSIVE PARA CELULARES DE PROVEEDORES----
-----------------------------------------------*/
document.addEventListener("DOMContentLoaded", () => {
  const supplierList = document.getElementById("supplierList");
  const supplierDetailPopup = document.getElementById("supplierDetailPopup");

  // Manejar el click en las filas para abrir el popup con más detalles
  supplierList.addEventListener("click", (event) => {
    if (event.target && event.target.nodeName === "TD") {
      const row = event.target.parentNode;
      const id = row.cells[0].innerText;
      const name = row.cells[1].innerText;
      const contact = row.cells[2] ? row.cells[2].innerText : "N/A";
      const mail = row.cells[3] ? row.cells[3].innerText : "N/A";
      const descr = row.cells[4] ? row.cells[4].innerText : "N/A";

      // Mostrar los detalles en el popup
      showSupplierDetails(id, name, contact, mail, descr);
    }
  });

  // Función para cerrar el popup
  window.closeDetailPopup = () => {
    supplierDetailPopup.style.display = "none";
  };

  // Función para abrir el popup de detalles con la información correcta

  async function showSupplierDetails(id) {
    try {
      // Hacer una solicitud a la API para obtener los detalles del proveedor
      const response = await fetch(`/api/proveedores?id=${id}`); // Asegúrate de que la URL sea la correcta
      if (!response.ok)
        throw new Error("Error al obtener los detalles del proveedor");

      // Obtener los datos JSON
      const proveedor = await response.json();

      const popup = document.getElementById("supplierDetailPopup");

      // Asignar valores al popup usando la respuesta de la API
      document.getElementById("popupId").textContent = `ID: ${proveedor.id}`;
      document.getElementById(
        "popupName"
      ).textContent = `Nombre: ${proveedor.nombre}`;

      // Manejo del contacto (teléfono o correo o ambos)
      let contactoHTML = "";
      let contactoButtonHTML = "";

      if (proveedor.telefono && proveedor.email) {
        // Si ambos datos están disponibles, mostramos un botón para ver ambos
        contactoButtonHTML = `
                <button class="button-contactos" onclick="showContactPopup('${proveedor.telefono}', '${proveedor.email}')">
                    Ver Contactos
                </button>
            `;
      } else if (proveedor.telefono) {
        // Si solo el teléfono está disponible, lo mostramos
        contactoHTML = `
                <p>Teléfono: ${proveedor.telefono}</p>
            `;
      } else if (proveedor.email) {
        // Si solo el correo está disponible, lo mostramos
        contactoHTML = `
                <p>Correo: ${proveedor.email}</p>
            `;
      } else {
        // Si no hay ninguno de los dos, indicamos que no hay contacto
        contactoHTML = `
                <p>No disponible</p>
            `;
      }

      // Asignar los contactos al popup
      document.getElementById("popupContact").innerHTML = contactoHTML;
      document.getElementById("popupContactButton").innerHTML =
        contactoButtonHTML;

      // Mostrar la descripción
      document.getElementById("popupDescr").textContent = `Descripción: ${
        proveedor.descripcion || "N/A"
      }`;

      // Mostrar el popup
      popup.style.display = "block";
    } catch (error) {
      console.error("Error al obtener los detalles del proveedor:", error);
    }
  }
});

/*---------------------------------------------
--- BAJADA DE DATOS DE PROVEEDORES --
-------------------------------------*/
// Función para obtener proveedores y actualizar la tabla
async function cargarProveedores() {
  try {
    const response = await fetch("/api/proveedores"); // Cambia la ruta si es necesario
    if (!response.ok) throw new Error("Error en la consulta a la API");

    const proveedores = await response.json();
    const tableBody = document.getElementById("provider-table-body");
    tableBody.innerHTML = ""; // Limpiar el contenido existente

    // Almacenar la respuesta JSON para usarla en el popup
    window.proveedoresList = proveedores;

    proveedores.forEach((proveedor) => {
      const row = document.createElement("tr");

      // Buscar el tipo de contacto correspondiente al proveedor
      const tipo =
        tipoContacto.find((contacto) => contacto.id === proveedor.id)?.tipo ||
        "sin_contacto";

      // Maquetar la fila según el tipo de contacto
      let contactoHTML = "";
      if (tipo === "ambos") {
        contactoHTML = `
                    <td>
                        <button class="button-contactos" onclick="showContactPopup('${proveedor.telefono}', '${proveedor.email}')">
                            Ver Contactos
                        </button>
                    </td>
                `;
      } else if (tipo === "telefono") {
        contactoHTML = `
                    <td>${proveedor.telefono}</td>
                `;
      } else if (tipo === "email") {
        contactoHTML = `
                    <td>${proveedor.email}</td>
                `;
      } else {
        contactoHTML = `
                    <td>No disponible</td>
                `;
      }

      row.innerHTML = `
                <td>${proveedor.id}</td>
                <td>${proveedor.nombre}</td>
                ${contactoHTML}
                <td style="display: none;">${proveedor.descripcion}</td> <!-- Columna oculta -->
            `;

      tableBody.appendChild(row);
    });
  } catch (error) {
    console.error("Error al cargar los proveedores:", error);
  }
}

// Función para mostrar el popup con los contactos
function showContactPopup(telefono, email) {
  const popup = document.getElementById("contactPopup");
  document.getElementById("popupPhone").textContent = `Teléfono: ${telefono}`;
  document.getElementById("popupEmail").textContent = `Correo: ${email}`;
  popup.style.display = "block";
}

// Función para cerrar el popup de contactos
function closeContactPopup() {
  const popup = document.getElementById("contactPopup");
  popup.style.display = "none";
}

cargarProveedores();

document.addEventListener("DOMContentLoaded", function () {
  console.log(tipoContacto);
});
/*---------------------------------------------
--- SUBIDA DE DATOS DE PROVEEDORES --
-------------------------------------*/
document.getElementById("supplierForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevenir el comportamiento por defecto (que es cerrar el popup y enviar el formulario)

    let isValid = true;
    let errorMessage = "";

    // Limpiar mensajes de error previos
    removeErrorDiv();

    // Validaciones
    if (!document.getElementById("supplierName").value) {
        isValid = false;
        errorMessage = "El nombre del proveedor es obligatorio.";
    }
    if (!document.getElementById("supplierContact").value && !document.getElementById("supplierMail").value) {
        isValid = false;
        errorMessage = "Debes proporcionar al menos un medio de contacto (email o celular).";
    }

    // Si las validaciones son exitosas, enviar el formulario
    if (isValid) {
        // Si todo es válido, deja que el formulario se envíe normalmente
        this.submit(); // Enviar el formulario manualmente
    } else {
        // Si no es válido, crea un div de error y muestra el mensaje
        const errorDiv = document.createElement("div");
        errorDiv.className = "alerta error";
        errorDiv.textContent = errorMessage;

        // Agregar el div de error al formulario
        this.insertBefore(errorDiv, this.firstChild);
    }
});


// Función para eliminar mensajes de error previos
function removeErrorDiv() {
    const existingErrorDiv = document.querySelector(".alerta.error");
    if (existingErrorDiv) {
        existingErrorDiv.remove();
    }
}
