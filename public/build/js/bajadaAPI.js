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

/*-------------------------------
---BAJADA DE DATOS DE EMPLEADOS--
---------------------------------*/
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
            
            row.innerHTML = `
                <td>${empleado.id}</td>
                <td>${empleado.nombre}</td>
                <td>${empleado.dni}</td>
                <td>${empleado.correo}</td>
            `;
            
            tableBody.appendChild(row);
        });
    } catch (error) {
        console.error('Error al cargar los empleados:', error);
    }
}
// Llama a la función al cargar la página
cargarEmpleados();