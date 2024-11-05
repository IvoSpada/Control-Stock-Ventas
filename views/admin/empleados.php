<!-- Main Content -->
<div class="main-content">
    <h1>Empleados</h1>
    <div class="employee-container">
        <h2>Administrar Lista de Empleados</h2>
        <button id="addEmployeeBtn" class="button-add">Agregar Empleado</button>
        <table id="employeeList" class="default-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
            <tbody id="employee-table-body">
                <!-- Las filas se generarán aquí con JavaScript -->
            </tbody>
        </table>

        <!-- Popup para mostrar detalles del empleado -->
        <div id="employeeDetailPopup" class="popup">
            <div class="popup-content">
                <div class="popup-header">
                    <span class="close" onclick="closeDetailPopup()">&times;</span>
                </div>
                <h2>Detalles del Empleado</h2>
                <p id="popupId"></p>
                <p id="popupName"></p>
                <p id="popupDni"></p>
                <p id="popupMail"></p>
                <div class="popup-footer">
                    <button class="edit-button" onclick="editEmployee()">Editar</button>
                    <button class="change-password-button">Cambiar Contraseña</button>
                    <!-- Botón extra para cambiar contraseña -->
                    <button class="delete-button" onclick="deleteEmployee()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup para agregar/editar empleado (solo un popup) -->
    <div id="employeePopup" class="popup">
        <div class="popup-content">
            <span class="close-popup" onclick="closePopup()">&times;</span>
            <h3 id="popupTitle">Agregar Empleado</h3>
            <form id="employeeForm">
                <input type="hidden" id="employeeId" />
                <div class="input-group">
                    <label for="employeeName">Nombre:</label>
                    <input type="text" id="employeeName" name="nombre" />
                </div>
                <div class="input-group">
                    <label for="employeeDNI">DNI:</label>
                    <input type="text" id="employeeDNI" name="dni" />
                </div>
                <div class="input-group">
                    <label for="employeeMail">E-mail:</label>
                    <input type="text" id="employeeMail" name="email" />
                </div>
                <div class="input-group">
                    <label for="employeeMail">¿Es Administrador?</label>
                    <div class="radio-group">
                        <div>
                        <label for="radioadmin">Sí</label>
                        <input type="radio" name="admin" id="radioadmin" value="1">
                        </div>
                        <div>
                        <label for="radioadmin">No</label>
                        <input type="radio" name="admin" id="radioadmin" value="0">
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <label for="employeeMail">Contraseña:</label>
                    <input type="text" id="employeeMail" name="email" />
                </div>
                <button type="submit" class="button-submit">Guardar</button>
            </form>
            <div class="popup-footer">
            </div>
        </div>
    </div>
</div>

<footer class="footer"></footer>
<script src="/build/js/script.js"></script>
<script src="/build/js/popUps.js"></script>
<script src="/build/js/responsivesTablas.js"></script>
<script src="/build/js/bajadaAPI.js"></script>