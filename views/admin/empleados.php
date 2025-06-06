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
                <tr>
                    <td>1</td>
                    <td>Ana López</td>
                    <td>123-456-789</td>
                    <td>ana.lopez@example.com</td>
                    <td style="display: none;">Gerente de ventas con 5 años de experiencia</td> <!-- Columna oculta -->
                </tr>
                <tr>
                    <td>2</td>
                    <td>Carlos Pérez</td>
                    <td>987-654-321</td>
                    <td>carlos.perez@example.com</td>
                    <td style="display: none;">Especialista en logística y transporte</td> <!-- Columna oculta -->
                </tr>
                <tr>
                    <td>3</td>
                    <td>Lucía García</td>
                    <td>456-789-123</td>
                    <td>lucia.garcia@example.com</td>
                    <td style="display: none;">Asistente administrativa bilingüe</td> <!-- Columna oculta -->
                </tr>
                <tr>
                    <td>4</td>
                    <td>Servicios Gráficos Luna</td>
                    <td>555-4321</td>
                    <td>info@graficosluna.com</td>
                    <td style="display: none;">Impresión y diseño gráfico para empresas</td> <!-- Columna oculta -->
                </tr>
                <tr>
                    <td>6</td>
                    <td>Ana Torres</td>
                    <td>123456789</td>
                    <td>ana.torres@email.com</td>
                    <td style="display: none;">Encargada de Recursos Humanos</td> <!-- Columna oculta -->
                </tr>
                <tr>
                    <td>7</td>
                    <td>Martín López</td>
                    <td>987654321</td>
                    <td>martin.lopez@email.com</td>
                    <td style="display: none;">Supervisor de Producción</td> <!-- Columna oculta -->
                </tr>
                <tr>
                    <td>8</td>
                    <td>Elena García</td>
                    <td>456789123</td>
                    <td>elena.garcia@email.com</td>
                    <td style="display: none;">Analista de Finanzas</td> <!-- Columna oculta -->
                </tr>
                <tr>
                    <td>9</td>
                    <td>Carlos Ruiz</td>
                    <td>789123456</td>
                    <td>carlos.ruiz@email.com</td>
                    <td style="display: none;">Asistente Administrativo</td> <!-- Columna oculta -->
                </tr>
                <tr>
                    <td>10</td>
                    <td>Valeria Martínez</td>
                    <td>321456789</td>
                    <td>valeria.martinez@email.com</td>
                    <td style="display: none;">Especialista en Logística</td> <!-- Columna oculta -->
                </tr>
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
                    <input type="text" id="employeeName" name="empleadoNombre" />
                </div>
                <div class="input-group">
                    <label for="employeeDNI">DNI:</label>
                    <input type="text" id="employeeDNI" name="empleadoDNI" />
                </div>
                <div class="input-group">
                    <label for="employeeMail">E-mail:</label>
                    <input type="text" id="employeeMail" name="empleadoMail" />
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