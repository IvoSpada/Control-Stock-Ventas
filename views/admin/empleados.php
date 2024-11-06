<!-- Main Content -->
<div class="main-content">
    <?php include_once __DIR__ . "/../templates/alertas.php"?>
    <h1>Empleados</h1>
    <div class="employee-container">
        <h2>Administrar Lista de Empleados</h2>
        <div class="acciones-agregar">
        <button id="addEmployeeBtn" class="button-add">Agregar Empleado</button>
        <i class="fa-solid fa-arrows-rotate" id="reloadButton"></i>
        </div>
        <table id="employeeList" class="default-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>

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
            <form id="employeeForm"  method="POST">
                <input type="hidden" id="employeeId" />
                <div class="input-group">
                    <label for="employeeName">Nombre:</label>
                    <input type="text" id="employeeName" name="nombre" />
                </div>
                <div class="input-group">
                    <label for="employeeDNI">DNI:</label>
                    <input type="number" id="employeeDNI" name="dni" />
                </div>
                <div class="input-group">
                    <label for="employeeMail">E-mail:</label>
                    <input type="text" id="employeeMail" name="email" />
                </div>
                <div class="input-group">
                    <label for="employeeMail">¿Es Administrador?</label>
                    <div class="radio-group">
                        <div class='label-radio'>
                            <label for="radioadmin">Sí</label>
                            <input type="radio" name="admin" id="radioadmin1" value="1" required>
                        </div>
                        <div class='label-radio'>
                            <label for="radioadmin">No</label>
                            <input type="radio" name="admin" id="radioadmin0" value="0" required>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="contraseña" />
                </div>
                <div class="input-group">
                    <label for="confirmPassword">Repetir Contraseña:</label>
                    <input type="password" id="confirmPassword" name="RepContraseña" />
                </div>
                <button type="submit" class="button-submit">Guardar</button>
            </form>
            <div class="popup-footer"></div>
        </div>
    </div>
</div>

<footer class="footer"></footer>
<script src="/build/js/script.js"></script>
<script src="/build/js/empleados.js"></script>