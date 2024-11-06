
/*---------------------------------------------
----CODIGO JS PARA EL POP-UP DE EMPLEADOS----
-----------------------------------------------*/
document.addEventListener("DOMContentLoaded", () => {
const addEmployeeBtn = document.getElementById("addEmployeeBtn");
const employeePopup = document.getElementById("employeePopup");
const employeeForm = document.getElementById("employeeForm");
const passwordField = document.getElementById("password");
const confirmPasswordField = document.getElementById("confirmPassword");

// Abrir el popup
addEmployeeBtn.addEventListener("click", () => {
    employeePopup.style.display = "block"; // Muestra el popup
    employeeForm.reset(); // Resetea el formulario
});

// Cerrar el popup
window.closePopup = () => {
    employeePopup.style.display = "none"; // Oculta el popup
};

// Eliminar div de error anterior, si existe
const removeErrorDiv = () => {
    const existingErrorDiv = document.querySelector(".alerta.error");
    if (existingErrorDiv) {
    existingErrorDiv.remove();
    }
};

// Validaciones antes de enviar el formulario
employeeForm.addEventListener("submit", (event) => {
    event.preventDefault(); // Evita que el formulario se envíe inmediatamente

    let isValid = true;
    let errorMessage = "";

    // Limpiar mensajes de error previos
    removeErrorDiv();

    // Validaciones
    if (passwordField.value !== confirmPasswordField.value) {
        isValid = false;
        errorMessage = "Las contraseñas no coinciden.";
    }
    if (!employeeForm.dni.value) {
        isValid = false;
        errorMessage = "El Dni es obligatorio.";
    }
    if (!employeeForm.nombre.value) {
        isValid = false;
        errorMessage = "El nombre es obligatorio.";
    }

    // Si las validaciones son exitosas, enviar el formulario
    if (isValid) {
        // Si todo es válido, deja que el formulario se envíe normalmente
        employeeForm.submit();
    } else {
        // Si no es válido, crea un div de error
        const errorDiv = document.createElement("div");
        errorDiv.className = "alerta error";
        errorDiv.textContent = errorMessage;

        // Agregar el div de error al formulario
        employeeForm.insertBefore(errorDiv, employeeForm.firstChild);
    }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const employeeList = document.getElementById("employeeList");
    const employeeDetailPopup = document.getElementById("employeeDetailPopup");
    
    // Manejar el clic en las filas para abrir el popup con más detalles
    employeeList.addEventListener("click", (event) => {
        // Asegurarse de que el clic no es en un botón
        if (event.target && event.target.nodeName === "TD" && !event.target.closest("button")) {
            const row = event.target.parentNode;
            const id = row.cells[0].innerText;
            const name = row.cells[1].innerText;
            const dni = row.cells[2] ? row.cells[2].innerText : "N/A";
            const rol = row.cells[3] ? row.cells[3].innerText : "N/A";

            // Mostrar los detalles en el popup
            showEmployeeDetails(id, name, dni, rol);
        }
    });

    // Función para cerrar el popup
    window.closeDetailPopup = () => {
        employeeDetailPopup.style.display = "none";
    };

    // Función para abrir el popup de detalles con la información correcta
    function showEmployeeDetails(id, name, dni, rol) {
        const popup = document.getElementById("employeeDetailPopup");

        // Asignar valores al popup
        document.getElementById("popupId").textContent = `ID: ${id}`;
        document.getElementById("popupName").textContent = `Nombre: ${name}`;
        document.getElementById("popupDni").textContent = `DNI: ${dni}`;
        document.getElementById("popupMail").textContent = `Rol: ${rol}`;

        // Mostrar el popup
        popup.style.display = "block";
    }
});

// Función para obtener productos y actualizar la tabla
async function cargarEmpleados() {
    try {
        const response = await fetch('/api/empleados'); // Cambia la ruta si es necesario
        if (!response.ok) throw new Error('Error en la consulta a la API');

        const empleados = await response.json();
        const tableBody = document.getElementById('employee-table-body');
        tableBody.innerHTML = ''; // Limpiar el contenido existente

        empleados.forEach(empleado => {
            const row = document.createElement('tr');
            // Verificar si admin es 1 o 0 y asignar el texto correspondiente
            const rol = empleado.admin == 1 ? 'Administrador' : 'Empleado';
            row.innerHTML = `
                <td>${empleado.id}</td>
                <td>${empleado.nombre}</td>
                <td>${empleado.dni}</td>
                <td>${rol}</td>
                <td class="actions">
                    <i class="info-button fa-solid fa-circle-info"></i>
                    <i class="edit-button fa-solid fa-pen-to-square" onclick="editarEmpleado(${empleado.id})"></i>
                    <i class="delete-button fa-solid fa-trash" onclick="eliminarEmpleado(${empleado.id})"></i>
                </td>
            `;
            
            tableBody.appendChild(row);
        });
    } catch (error) {
        console.error('Error al cargar los empleados:', error);
    }
}

// Llama a la función al cargar la página
cargarEmpleados();
