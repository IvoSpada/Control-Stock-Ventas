

/*---------------------------------------------
----CODIGO JS PARA EL POP-UP DE CATEGORIAS----
-----------------------------------------------*/
document.addEventListener("DOMContentLoaded", () => {
    const addCategoryBtn = document.getElementById("addCategoryBtn");
    const categoryPopup = document.getElementById("categoryPopup");
    const categoryForm = document.getElementById("categoryForm");
    const categoryList = document.getElementById("categoryList");
    
    // Abrir el popup
    addCategoryBtn.addEventListener("click", () => {
        categoryPopup.style.display = "block"; // Muestra el popup
        categoryForm.reset(); // Resetea el formulario
    });
    
    // Cerrar el popup
    window.closePopup = () => {
        categoryPopup.style.display = "none"; // Oculta el popup
    };
    
    // Manejar el envío del formulario
    categoryForm.addEventListener("submit", (event) => {
        event.preventDefault(); // Previene el comportamiento por defecto
    
        const id = categoryList.rows.length; // Genera un ID basado en el número de filas
        const name = document.getElementById("categoryName").value;
        const descr = document.getElementById("categoryDescription").value;
    
        const newRow = categoryList.insertRow();
        newRow.innerHTML = `
                        <td>${id}</td>
                        <td>${name}</td>
                        <td>${descr}</td>
                    `;
        // Cerrar el popup
        closePopup();
    });
});


/*---------------------------------------------
---RESPONSIVE PARA CELULARES DE CATEGORÍAS----
-----------------------------------------------*/
document.addEventListener("DOMContentLoaded", () => {
    const categoryList = document.getElementById("categoryList");
    const categoryDetailPopup = document.getElementById("categoryDetailPopup");
    
    // Manejar el click en las filas para abrir el popup con más detalles
    categoryList.addEventListener("click", (event) => {
        if (event.target && event.target.nodeName === "TD") {
        const row = event.target.parentNode;
        const id = row.cells[0].innerText;
        const name = row.cells[1].innerText;
        const descr = row.cells[2] ? row.cells[2].innerText : "N/A";
    
        // Mostrar los detalles en el popup
        showCategoryDetails(id, name, descr);
        }
    });
    
    // Función para cerrar el popup
    window.closeDetailPopup = () => {
        categoryDetailPopup.style.display = "none";
    };
    
    // Función para abrir el popup de detalles con la información correcta
    function showCategoryDetails(id, name, descr) {
        const popup = document.getElementById("categoryDetailPopup");
    
        // Asignar valores al popup
        document.getElementById("popupId").textContent = `ID: ${id}`;
        document.getElementById("popupName").textContent = `Nombre: ${name}`;
        document.getElementById("popupDescr").textContent = `Descripción: ${descr}`; // Mostrar solo la descripción
    
        // Mostrar el popup
        popup.style.display = "block";
    }
});

/*-------------------------------
---BAJADA DE DATOS DE CATEGORIA--
---------------------------------*/
// Función para obtener categorías y actualizar la tabla
async function cargarCategorias() {
    try {
        const response = await fetch('/api/categorias');
        if (!response.ok) throw new Error('Error en la consulta a la API');

        const categorias = await response.json();
        const tableBody = document.getElementById('categoria-table-body');
        tableBody.innerHTML = ''; // Limpiar el contenido existente

        categorias.forEach(categoria => {
            const row = document.createElement('tr');
            
            row.innerHTML = `
                <td>${categoria.id}</td>
                <td>${categoria.nombre}</td>
                <td>${categoria.descripcion}</td>
            `;
            
            tableBody.appendChild(row);
        });
    } catch (error) {
        console.error('Error al cargar las categorías:', error);
    }
}
// Llama a la función al cargar la página
cargarCategorias();