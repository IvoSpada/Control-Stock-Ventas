<!-- Main Content -->
<div class="main-content">
    <h1>Proveedores</h1>
    <div class="supplier-container">
        <h2>Administrar Lista de Proveedores</h2>
        <button id="addSupplierBtn" class="button-add">Agregar Proveedor</button>
        <table id="supplierList" class="default-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Correo</th>
                    <th style="display: none;">Descripción</th> <!-- Columna oculta -->
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Distribuidora Central</td>
                    <td>555-1234</td>
                    <td>contacto@distcentral.com</td>
                    <td style="display: none;">Proveedor de artículos de oficina y papelería</td>
                    <!-- Columna oculta -->
                </tr>
                <tr>
                    <td>2</td>
                    <td>Insumos Médicos Global</td>
                    <td>555-5678</td>
                    <td>ventas@insumosglobal.com</td>
                    <td style="display: none;">Especializados en equipos médicos y hospitalarios</td>
                    <!-- Columna oculta -->
                </tr>
                <tr>
                    <td>3</td>
                    <td>Electrodomésticos Alba</td>
                    <td>555-8765</td>
                    <td>soporte@alba.com</td>
                    <td style="display: none;">Distribuidor de electrodomésticos y línea blanca</td>
                    <!-- Columna oculta -->
                </tr>
            </tbody>

        </table>

        <!-- Popup para mostrar detalles del proveedor -->
        <div id="supplierDetailPopup" class="popup">
            <div class="popup-content">
                <div class="popup-header">
                    <span class="close" onclick="closeDetailPopup()">&times;</span>
                </div>
                <h2>Detalles del Proveedor</h2>
                <p id="popupId"></p>
                <p id="popupName"></p>
                <p id="popupContact"></p>
                <p id="popupMail"></p>
                <p id="popupDescr"></p> <!-- Aquí se muestra solo la descripción -->
                <div class="popup-footer">
                    <button class="edit-button" onclick="editSupplier()">Editar</button>
                    <button class="delete-button" onclick="deleteSupplier()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup para agregar/editar proveedor (solo un popup) -->
    <div id="supplierPopup" class="popup">
        <div class="popup-content">
            <span class="close-popup" onclick="closePopup()">&times;</span>
            <h3 id="popupTitle">Agregar Proveedor</h3>
            <form id="supplierForm">
                <input type="hidden" id="supplierId" />
                <div class="input-group">
                    <label for="supplierName">Nombre:</label>
                    <input type="text" id="supplierName" name="proveedorNombre" />
                </div>
                <div class="input-group">
                    <label for="supplierContact">Telefono:</label>
                    <input type="text" id="supplierContact" name="proveedorTelefono" />
                </div>
                <div class="input-group">
                    <label for="supplierMail">E-mail:</label>
                    <input type="text" id="supplierMail" name="proveedorMail" />
                </div>
                <div class="input-group">
                    <label for="supplierDescription">Descripcion:</label>
                    <textarea id="supplierDescription" name="proveedorDesc"></textarea>
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