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
                <!-- Aquí se agregarán dinámicamente las filas via JS -->
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
<script>

    /* CODIGO PARA EL ASIDE RESPONSIVE EN MOBILE */

    function toggleSidebar() {
        const sidebar = document.querySelector(".sidebar");
        sidebar.classList.toggle("show"); // Añade o quita la clase 'show'
    }

    // Cerrar el dropdown si se hace clic fuera de él
    window.onclick = function (event) {
        if (!event.target.matches(".dropdown-button")) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains("show")) {
                    openDropdown.classList.remove("show");
                }
            }
        }

        // Cerrar la barra lateral si se hace clic fuera de ella
        const sidebar = document.querySelector(".sidebar");
        if (
            sidebar.classList.contains("show") &&
            !event.target.matches(".toggle-sidebar")
        ) {
            sidebar.classList.remove("show");
        }
    };

    /*---------------------------------------------
    ----CODIGO JS PARA EL POP-UP DE CATEGORIAS----
    -----------------------------------------------*/
    document.addEventListener("DOMContentLoaded", () => {
        const addCategoryBtn = document.getElementById("addCategoryBtn");
        const categoryPopup = document.getElementById("categoryPopup");
        const categoryForm = document.getElementById("categoryForm");
        const categoryList = document.getElementById("categoryList");

        // Abrir el popup
        addCategoryBtn.addEventListener("click", () => {
            categoryPopup.style.display = "block"; // Muestra el popup
            categoryForm.reset(); // Resetea el formulario
        });

        // Cerrar el popup
        window.closePopup = () => {
            categoryPopup.style.display = "none"; // Oculta el popup
        };

        // Manejar el envío del formulario
        categoryForm.addEventListener("submit", (event) => {
            event.preventDefault(); // Previene el comportamiento por defecto

            const id = categoryList.rows.length; // Genera un ID basado en el número de filas
            const name = document.getElementById("categoryName").value;
            const descr = document.getElementById("categoryDescription").value;

            const newRow = categoryList.insertRow();
            newRow.innerHTML = `
                    <td>${id}</td>
                    <td>${name}</td>
                    <td>${descr}</td>
                `;
            // Cerrar el popup
            closePopup();
        });
    });
    /*---------------------------------------------
    ---RESPONSIVE PARA CELULARES DE CATEGORÍAS----
    -----------------------------------------------*/
    document.addEventListener("DOMContentLoaded", () => {
        const categoryList = document.getElementById("categoryList");
        const categoryDetailPopup = document.getElementById("categoryDetailPopup");

        // Manejar el click en las filas para abrir el popup con más detalles
        categoryList.addEventListener("click", (event) => {
            if (event.target && event.target.nodeName === "TD") {
                const row = event.target.parentNode;
                const id = row.cells[0].innerText;
                const name = row.cells[1].innerText;
                const descr = row.cells[2] ? row.cells[2].innerText : "N/A";

                // Mostrar los detalles en el popup
                showCategoryDetails(id, name, descr);
            }
        });

        // Función para cerrar el popup
        window.closeDetailPopup = () => {
            categoryDetailPopup.style.display = "none";
        };

        // Función para abrir el popup de detalles con la información correcta
        function showCategoryDetails(id, name, descr) {
            const popup = document.getElementById("categoryDetailPopup");

            // Asignar valores al popup
            document.getElementById("popupId").textContent = `ID: ${id}`;
            document.getElementById("popupName").textContent = `Nombre: ${name}`;
            document.getElementById("popupDescr").textContent = `Descripción: ${descr}`; // Mostrar solo la descripción

            // Mostrar el popup
            popup.style.display = "block";
        }
    });

</script>
