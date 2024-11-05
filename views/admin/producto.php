<!-- Main Content -->
<div class="main-content">
    <h1>Productos</h1>
    <div class="product-container">
        <h2>Administrar Lista de Productos</h2>
        <button id="addProductBtn" class="button-add">Agregar Producto</button>
        <table id="productList" class="default-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th style="display: none;">ID Categoría</th> <!-- Columna oculta -->
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody id="product-table-body">
                <!-- Las filas se generarán aquí con JavaScript -->
            </tbody>
        </table>

        <!-- Popup para mostrar detalles del producto -->
        <div id="productDetailPopup" class="popup">
            <div class="popup-content">
                <div class="popup-header">
                    <span class="close" onclick="closeDetailPopup()">&times;</span>
                </div>
                <h2>Detalles del Producto</h2>
                <p id="popupId"></p>
                <p id="popupName"></p>
                <p id="popupBrand"></p>
                <p id="popupCategoryId"></p> <!-- ID Categoría en el popup de detalles -->
                <p id="popupDescr"></p> <!-- Descripción en el popup -->
                <div class="popup-footer">
                    <button class="edit-button" onclick="editProduct()">Editar</button>
                    <button class="delete-button" onclick="deleteProduct()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup para agregar/editar producto -->
    <div id="productPopup" class="popup">
        <div class="popup-content">
            <span class="close-popup" onclick="closePopup()">&times;</span>
            <h3 id="popupTitle">Agregar Producto</h3>
            <form id="productForm">
                <input type="hidden" id="productId" />
                <div class="input-group">
                    <label for="productName">Nombre:</label>
                    <input type="text" id="productName" name="productName" />
                </div>
                <div class="input-group">
                    <label for="productBrand">Marca:</label>
                    <input type="text" id="productBrand" name="productBrand" />
                </div>
                <div class="input-group">
                    <label for="productCategoryId">ID Categoría:</label>
                    <input type="text" id="productCategoryId" name="productCategoryId" />
                </div>
                <div class="input-group">
                    <label for="productDescription">Descripción:</label>
                    <textarea id="productDescription" name="productDescription"></textarea>
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
<script src="/build/js/bajadaAPI.js"></script>