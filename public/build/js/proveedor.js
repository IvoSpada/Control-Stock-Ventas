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
    supplierForm.addEventListener("submit", (event) => {
    event.preventDefault(); // Previene el comportamiento por defecto

    const id = supplierList.rows.length; // Genera un ID basado en el número de filas
    const name = document.getElementById("supplierName").value;
    const contact = document.getElementById("supplierContact").value;
    const mail = document.getElementById("supplierMail").value;
    const descr = document.getElementById("supplierDescription").value;

    const newRow = supplierList.insertRow();
    newRow.innerHTML = `
                    <td>${id}</td>
                    <td>${name}</td>
                    <td>${contact}</td>
                    <td>${mail}</td>
                    <td>${descr}</td>
                    `;
    // Cerrar el popup
    closePopup();
    });
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
    function showSupplierDetails(id, name, contact, mail, descr) {
    const popup = document.getElementById("supplierDetailPopup");

    // Asignar valores al popup
    document.getElementById("popupId").textContent = `ID: ${id}`;
    document.getElementById("popupName").textContent = `Nombre: ${name}`;
    document.getElementById(
        "popupContact"
    ).textContent = `Teléfono: ${contact}`;
    document.getElementById("popupMail").textContent = `Correo: ${mail}`;
    document.getElementById("popupDescr").textContent = `Descripción: ${descr}`; // Mostrar solo la descripción

    // Mostrar el popup
    popup.style.display = "block";
    }
});



/*-----------------------------------
--- BAJADA DE DATOS DE PROVEEDORES --
-------------------------------------*/
// Función para obtener proveedores y actualizar la tabla
async function cargarProveedores() {
    try {
        const response = await fetch('/api/proveedores'); // Cambia la ruta si es necesario
        if (!response.ok) throw new Error('Error en la consulta a la API');

        const proveedores = await response.json();
        const tableBody = document.getElementById('provider-table-body');
        tableBody.innerHTML = ''; // Limpiar el contenido existente

        proveedores.forEach(proveedor => {
            const row = document.createElement('tr');
            
            row.innerHTML = `
                <td>${proveedor.id}</td>
                <td>${proveedor.nombre}</td>
                <td>${proveedor.telefono}</td>
                <td>${proveedor.email}</td>
                <td style="display: none;">${proveedor.descripcion}</td> <!-- Columna oculta -->
            `;
            
            tableBody.appendChild(row);
        });
    } catch (error) {
        console.error('Error al cargar los proveedores:', error);
    }
}
// Llama a la función al cargar la página
cargarProveedores();

