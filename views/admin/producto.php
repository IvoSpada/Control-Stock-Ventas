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
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Lápices de Colores</td>
                    <td>Marca: Faber-Castell</td>
                    <td style="display: none;">1</td> <!-- ID Categoría: Papelería Escolar -->
                    <td>Paquete de 12 lápices de colores de alta calidad</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Cuaderno A4</td>
                    <td>Marca: Norma</td>
                    <td style="display: none;">1</td> <!-- ID Categoría: Papelería Escolar -->
                    <td>Cuaderno de 80 hojas cuadriculadas</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Marcadores Permanentes</td>
                    <td>Marca: Sharpie</td>
                    <td style="display: none;">1</td> <!-- ID Categoría: Papelería Escolar -->
                    <td>Set de 4 marcadores de colores surtidos</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Cemento Portland</td>
                    <td>Marca: Holcim</td>
                    <td style="display: none;">2</td> <!-- ID Categoría: Materiales de Construcción -->
                    <td>Bolsa de 50 kg de cemento de alta resistencia</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Bloques de Concreto</td>
                    <td>Marca: Bloquera Nacional</td>
                    <td style="display: none;">2</td> <!-- ID Categoría: Materiales de Construcción -->
                    <td>Bloques de concreto para construcción de muros</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Pintura Acrílica</td>
                    <td>Marca: Behr</td>
                    <td style="display: none;">2</td> <!-- ID Categoría: Materiales de Construcción -->
                    <td>Galón de pintura acrílica para interiores</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Manzanas Fuji</td>
                    <td>Marca: Frutas Selectas</td>
                    <td style="display: none;">3</td> <!-- ID Categoría: Frutas y Verduras Selectas -->
                    <td>Manzanas frescas Fuji por kilogramo</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Plátanos</td>
                    <td>Marca: Frutas Selectas</td>
                    <td style="display: none;">3</td> <!-- ID Categoría: Frutas y Verduras Selectas -->
                    <td>Plátanos de alta calidad por kilogramo</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Zanahorias</td>
                    <td>Marca: Frutas Selectas</td>
                    <td style="display: none;">3</td> <!-- ID Categoría: Frutas y Verduras Selectas -->
                    <td>Zanahorias frescas por kilogramo</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Pepinos</td>
                    <td>Marca: Frutas Selectas</td>
                    <td style="display: none;">3</td> <!-- ID Categoría: Frutas y Verduras Selectas -->
                    <td>Pepinos frescos por kilogramo</td>
                </tr>
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