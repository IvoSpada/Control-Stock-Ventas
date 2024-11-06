

/*---------------------------------------------
---CÓDIGO JS PARA EL POP-UP DE PRODUCTOS----
-----------------------------------------------*/
document.addEventListener("DOMContentLoaded", () => {
    const addProductBtn = document.getElementById("addProductBtn");
    const productPopup = document.getElementById("productPopup");
    const productForm = document.getElementById("productForm");
    const productList = document.getElementById("productList");

    // Abrir el popup de productos
    addProductBtn.addEventListener("click", () => {
        openPopup("productPopup");
        productForm.reset();
        console.log("boton apretado");
    });

    // Cerrar el popup de productos
    productForm.addEventListener("submit", (event) => {
        event.preventDefault();
        // Código para manejar el envío de formulario
        closePopup("productPopup");
    });

    // Manejar el envío del formulario
    productForm.addEventListener("submit", (event) => {
        event.preventDefault(); // Previene el comportamiento por defecto

        const id = productList.rows.length; // Genera un ID basado en el número de filas
        const name = document.getElementById("productName").value;
        const brand = document.getElementById("productBrand").value;
        const categoryId = document.getElementById("productCategoryId").value;
        const descr = document.getElementById("productDescription").value;

        const newRow = productList.insertRow();
        newRow.innerHTML = `
                <td>${id}</td>
                <td>${name}</td>
                <td>${brand}</td>
                <td style="display: none;">${categoryId}</td> <!-- ID Categoría oculto -->
                <td>${descr}</td>
            `;

        // Cerrar el popup
        closePopup();
    });
});


/*---------------------------------------------
---RESPONSIVE PARA CELULARES DE PRODUCTOS----
-----------------------------------------------*/
document.addEventListener("DOMContentLoaded", () => {
    const productList = document.getElementById("productList");
    const productDetailPopup = document.getElementById("productDetailPopup");

    // Manejar el click en las filas para abrir el popup con más detalles
    productList.addEventListener("click", (event) => {
        if (event.target && event.target.nodeName === "TD") {
        const row = event.target.parentNode;
        const id = row.cells[0].innerText;
        const name = row.cells[1].innerText;
        const brand = row.cells[2].innerText;
        const categoryId = row.cells[3] ? row.cells[3].innerText : "N/A"; // ID Categoría oculto
        const descr = row.cells[4].innerText;

        showProductDetails(id, name, brand, categoryId, descr);
        }
    });

    // Función para cerrar el popup
    window.closeDetailPopup = () => {
        productDetailPopup.style.display = "none";
    };

    // Función para abrir el popup de detalles con la información correcta
    function showProductDetails(id, name, brand, categoryId, descr) {
        document.getElementById("popupId").textContent = `ID: ${id}`;
        document.getElementById("popupName").textContent = `Nombre: ${name}`;
        document.getElementById("popupBrand").textContent = `Marca: ${brand}`;
        document.getElementById(
        "popupCategoryId"
        ).textContent = `ID Categoría: ${categoryId}`;
        document.getElementById("popupDescr").textContent = `Descripción: ${descr}`;

        productDetailPopup.style.display = "block";
    }
});

/*-------------------------------
---BAJADA DE DATOS DE PRODUCTOS--
---------------------------------*/
// Función para obtener productos y actualizar la tabla
async function cargarProductos() {
    try {
        const response = await fetch('/api/productos'); // Cambia la ruta si es necesario
        if (!response.ok) throw new Error('Error en la consulta a la API');

        const productos = await response.json();
        const tableBody = document.getElementById('product-table-body');
        tableBody.innerHTML = ''; // Limpiar el contenido existente

        productos.forEach(producto => {
            const row = document.createElement('tr');
            
            row.innerHTML = `
                <td>${producto.id}</td>
                <td>${producto.nombre}</td>
                <td>${producto.marca}</td>
                <td style="display: none;">${producto.categoriaID}</td> <!-- ID Categoría Oculto -->
                <td>${producto.descripcion}</td>
            `;
            
            tableBody.appendChild(row);
        });
    } catch (error) {
        console.error('Error al cargar los productos:', error);
    }
}

// Llama a la función al cargar la página
cargarProductos();
