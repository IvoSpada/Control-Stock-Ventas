
<!-- Main Content -->
<div class="main-content">
    <h1>Productos</h1>
    <div class="supplier-container">
        <h2>Manage Supplier List</h2>
        <button id="addSupplierBtn" class="button-add">Agregar Proveedor</button>
        <table class="supplier-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>E-mail</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody id="supplierList">
                <!-- Aquí se llenarán los proveedores -->
            </tbody>
        </table>
    </div>
</div>

<!-- Mueve el popup fuera del aside y dentro de main-content -->
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
                <textarea id="supplierDescription" name="proveedorDesc" ></textarea>
            </div>
            <button type="submit" class="button-submit">Guardar</button>
        </form>
    </div>
</div>
<script src="/build/js/script.js"></script>
