<!-- Main Content -->
<div class="main-content">
    <h1>Categorías</h1>
    <div class="category-container">
        <h2>Administrar Lista de Categorías</h2>
        <button id="addCategoryBtn" class="button-add">Agregar Categoría</button>
        <table id="categoryList" class="default-table" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th> <!-- Columna que podemos ocultar si es necesario -->
            </tr>
        </thead>
        <tbody id="categoria-table-body">
            <!-- Las filas se generarán aquí con JavaScript -->
        </tbody>
    </table>

    <script>
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
    </script>

        <!-- Popup para mostrar detalles de la categoria -->
        <div id="categoryDetailPopup" class="popup">
            <div class="popup-content">
                <div class="popup-header">
                    <span class="close" onclick="closeDetailPopup()">&times;</span>
                </div>
                <h2>Detalles de la Categoría</h2>
                <p id="popupId"></p>
                <p id="popupName"></p>
                <p id="popupDescr"></p> <!-- Aquí se muestra solo la descripción -->
                <div class="popup-footer">
                    <button class="edit-button" onclick="editCategory()">Editar</button>
                    <button class="delete-button" onclick="deleteCategory()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup para agregar/editar categoría (solo un popup) -->
    <div id="categoryPopup" class="popup">
        <div class="popup-content">
            <span class="close-popup" onclick="closePopup()">&times;</span>
            <h3 id="popupTitle">Agregar Categoría</h3>
            <form id="categoryForm">
                <input type="hidden" id="categoryId" />
                <div class="input-group">
                    <label for="categoryName">Nombre:</label>
                    <input type="text" id="categoryName" name="categoriaNombre" />
                </div>
                <div class="input-group">
                    <label for="categoryDescription">Descripción:</label>
                    <textarea id="categoryDescription" name="categoriaDesc"></textarea>
                </div>
                <button type="submit" class="button-submit">Guardar</button>
            </form>
        </div>
    </div>
</div>
<footer class="footer"></footer>
<script src="/build/js/script.js"></script>
<script src="/build/js/popUps.js"></script>
<script src="/build/js/responsivesTablas.js"></script>