<!-- Main Content -->
<div class="main-content">
    <h1>Categorías</h1>
    <div class="category-container">
        <h2>Administrar Lista de Categorías</h2>
        <button id="addCategoryBtn" class="button-add">Agregar Categoría</button>
        <table id="categoryList" class="default-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th> <!-- Columna oculta -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Papelería Escolar</td>
                    <td>Proveedor de artículos para escuelas y oficinas</td>
                    <!-- Columna oculta -->
                </tr>
                <tr>
                    <td>2</td>
                    <td>Materiales de Construcción Gómez</td>
                    <td>Distribuidor de cemento, arena y materiales para construcción</td>
                    <!-- Columna oculta -->
                </tr>
                <tr>
                    <td>3</td>
                    <td>Frutas y Verduras Selectas</td>
                    <td>Proveedor de productos agrícolas frescos para supermercados</td>
                    <!-- Columna oculta -->
                </tr>
            </tbody>

        </table>

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