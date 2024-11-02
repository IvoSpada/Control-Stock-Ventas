<<<<<<< HEAD


=======
/*--------------------------------------------------
---CÓDIGO JS PARA BORRAR ALERTA A LOS 4 SEGUNDOS----
----------------------------------------------------*/
const alertas = document.querySelectorAll(".alerta");
alertas.forEach((alerta) => {
  setTimeout(() => {
    alerta.remove();
  }, 4000);
});
>>>>>>> 3e2505d544e5e2eab552f4355c9eb8f9abef2558

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

/* CODIGO PARA EL ASIDE RESPONSIVE EN MOBILE */

function toggleSidebar() {
  const sidebar = document.querySelector(".sidebar");
  sidebar.classList.toggle("show"); // Añade o quita la clase 'show'
}

// Cerrar el dropdown si se hace clic fuera de él

/*---------------------------------------------
---CODIGO JS PARA EL POP-UP DE PROVEEDOR----
-----------------------------------------------*/
document.addEventListener("DOMContentLoaded", () => {
  const addSupplierBtn = document.getElementById("addSupplierBtn");
  const supplierPopup = document.getElementById("supplierPopup");
  const supplierForm = document.getElementById("supplierForm");
  const supplierList = document.getElementById("supplierList");

  // Abrir el popup
  addSupplierBtn.addEventListener("click", () => {
    supplierPopup.style.display = "block"; // Muestra el popup
    supplierForm.reset(); // Resetea el formulario
    console.log("boton apretado");
  });

  // Cerrar el popup
  window.closePopup = () => {
    supplierPopup.style.display = "none"; // Oculta el popup
  };

  // Manejar el envío del formulario
  supplierForm.addEventListener("submit", (event) => {
    event.preventDefault(); // Previene el comportamiento por defecto

    const id = supplierList.rows.length; // Genera un ID basado en el número de filas
    const name = document.getElementById("supplierName").value;
    const contact = document.getElementById("supplierContact").value;
    const mail = document.getElementById("supplierMail").value;
    const descr = document.getElementById("supplierDescription").value;

    const newRow = supplierList.insertRow();
    newRow.innerHTML = `
                    <td>${id}</td>
                    <td>${name}</td>
                    <td>${contact}</td>
                    <td>${mail}</td>
                    <td>${descr}</td>
                `;
    // Cerrar el popup
    closePopup();
  });
});
/*---------------------------------------------
---RESPONSIVE PARA CELULARES DE PROVEEDORES----
-----------------------------------------------*/
document.addEventListener("DOMContentLoaded", () => {
  const supplierList = document.getElementById("supplierList");
  const supplierDetailPopup = document.getElementById("supplierDetailPopup");

  // Manejar el click en las filas para abrir el popup con más detalles
  supplierList.addEventListener("click", (event) => {
    if (event.target && event.target.nodeName === "TD") {
      const row = event.target.parentNode;
      const id = row.cells[0].innerText;
      const name = row.cells[1].innerText;
      const contact = row.cells[2] ? row.cells[2].innerText : "N/A";
      const mail = row.cells[3] ? row.cells[3].innerText : "N/A";
      const descr = row.cells[4] ? row.cells[4].innerText : "N/A";

      // Mostrar los detalles en el popup
      showSupplierDetails(id, name, contact, mail, descr);
    }
  });

  // Función para cerrar el popup
  window.closeDetailPopup = () => {
    supplierDetailPopup.style.display = "none";
  };

  // Función para abrir el popup de detalles con la información correcta
  function showSupplierDetails(id, name, contact, mail, descr) {
    const popup = document.getElementById("supplierDetailPopup");

    // Asignar valores al popup
    document.getElementById("popupId").textContent = `ID: ${id}`;
    document.getElementById("popupName").textContent = `Nombre: ${name}`;
    document.getElementById(
      "popupContact"
    ).textContent = `Teléfono: ${contact}`;
    document.getElementById("popupMail").textContent = `Correo: ${mail}`;
    document.getElementById("popupDescr").textContent = `Descripción: ${descr}`; // Mostrar solo la descripción

    // Mostrar el popup
    popup.style.display = "block";
  }
});

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

/*---------------------------------------------
----CODIGO JS PARA EL POP-UP DE EMPLEADOS----
-----------------------------------------------*/
document.addEventListener("DOMContentLoaded", () => {
  const addEmployeeBtn = document.getElementById("addEmployeeBtn");
  const employeePopup = document.getElementById("employeePopup");
  const employeeForm = document.getElementById("employeeForm");
  const employeeList = document.getElementById("employeeList");

  // Abrir el popup
  addEmployeeBtn.addEventListener("click", () => {
    employeePopup.style.display = "block"; // Muestra el popup
    employeeForm.reset(); // Resetea el formulario
    console.log("boton apretado");
  });

  // Cerrar el popup
  window.closePopup = () => {
    employeePopup.style.display = "none"; // Oculta el popup
  };

  // Manejar el envío del formulario
  employeeForm.addEventListener("submit", (event) => {
    event.preventDefault(); // Previene el comportamiento por defecto

    const id = employeeList.rows.length; // Genera un ID basado en el número de filas
    const name = document.getElementById("employeeName").value;
    const dni = document.getElementById("employeeDNI").value;
    const mail = document.getElementById("employeeMail").value;

    const newRow = employeeList.insertRow();
    newRow.innerHTML = `
                    <td>${id}</td>
                    <td>${name}</td>
                    <td>${dni}</td>
                    <td>${mail}</td>
                `;
    // Cerrar el popup
    closePopup();
  });
});

/*---------------------------------------------
  ---RESPONSIVE PARA CELULARES DE EMPLEADOS----
  -----------------------------------------------*/
document.addEventListener("DOMContentLoaded", () => {
  const employeeList = document.getElementById("employeeList");
  const employeeDetailPopup = document.getElementById("employeeDetailPopup");

  // Manejar el click en las filas para abrir el popup con más detalles
  employeeList.addEventListener("click", (event) => {
    if (event.target && event.target.nodeName === "TD") {
      const row = event.target.parentNode;
      const id = row.cells[0].innerText;
      const name = row.cells[1].innerText;
      const dni = row.cells[2] ? row.cells[2].innerText : "N/A";
      const mail = row.cells[3] ? row.cells[3].innerText : "N/A";

      // Mostrar los detalles en el popup
      showEmployeeDetails(id, name, dni, mail);
    }
  });

  // Función para cerrar el popup
  window.closeDetailPopup = () => {
    employeeDetailPopup.style.display = "none";
  };

  // Función para abrir el popup de detalles con la información correcta
  function showEmployeeDetails(id, name, dni, mail) {
    const popup = document.getElementById("employeeDetailPopup");

    // Asignar valores al popup
    document.getElementById("popupId").textContent = `ID: ${id}`;
    document.getElementById("popupName").textContent = `Nombre: ${name}`;
    document.getElementById("popupDni").textContent = `DNI: ${dni}`;
    document.getElementById("popupMail").textContent = `Correo: ${mail}`;

    // Mostrar el popup
    popup.style.display = "block";
  }
});

/*---------------------------------------------
---CODIGO JS PARA EL POP-UP DE PRODUCTOS----
-----------------------------------------------*/
document.addEventListener("DOMContentLoaded", () => {
  const addProductBtn = document.getElementById("addProductBtn");
  const productPopup = document.getElementById("productPopup");
  const productForm = document.getElementById("productForm");
  const productList = document.getElementById("productList");

  // Abrir el popup
  addProductBtn.addEventListener("click", () => {
    productPopup.style.display = "block"; // Muestra el popup
    productForm.reset(); // Resetea el formulario
    console.log("boton apretado");
  });

  // Cerrar el popup
  window.closePopup = () => {
    productPopup.style.display = "none"; // Oculta el popup
  };

  // Manejar el envío del formulario
  productForm.addEventListener("submit", (event) => {
    event.preventDefault(); // Previene el comportamiento por defecto

    const id = productList.rows.length; // Genera un ID basado en el número de filas
    const name = document.getElementById("productName").value;
    const brand = document.getElementById("productBrand").value;
    const categoryId = document.getElementById("productCategoryId").value;
    const descr = document.getElementById("productDescription").value;

    const newRow = productList.insertRow();
    newRow.innerHTML = `
            <td>${id}</td>
            <td>${name}</td>
            <td>${brand}</td>
            <td style="display: none;">${categoryId}</td> <!-- ID Categoría oculto -->
            <td>${descr}</td>
        `;

    // Cerrar el popup
    closePopup();
  });
});

/*---------------------------------------------
---RESPONSIVE PARA CELULARES DE PRODUCTOS----
-----------------------------------------------*/
document.addEventListener("DOMContentLoaded", () => {
  const productList = document.getElementById("productList");
  const productDetailPopup = document.getElementById("productDetailPopup");

  // Manejar el click en las filas para abrir el popup con más detalles
  productList.addEventListener("click", (event) => {
    if (event.target && event.target.nodeName === "TD") {
      const row = event.target.parentNode;
      const id = row.cells[0].innerText;
      const name = row.cells[1].innerText;
      const brand = row.cells[2].innerText;
      const categoryId = row.cells[3] ? row.cells[3].innerText : "N/A"; // ID Categoría oculto
      const descr = row.cells[4].innerText;

      showProductDetails(id, name, brand, categoryId, descr);
    }
  });

  // Función para cerrar el popup
  window.closeDetailPopup = () => {
    productDetailPopup.style.display = "none";
  };

  // Función para abrir el popup de detalles con la información correcta
  function showProductDetails(id, name, brand, categoryId, descr) {
    document.getElementById("popupId").textContent = `ID: ${id}`;
    document.getElementById("popupName").textContent = `Nombre: ${name}`;
    document.getElementById("popupBrand").textContent = `Marca: ${brand}`;
    document.getElementById(
      "popupCategoryId"
    ).textContent = `ID Categoría: ${categoryId}`;
    document.getElementById("popupDescr").textContent = `Descripción: ${descr}`;

    productDetailPopup.style.display = "block";
  }
});
/*---------------------------------------------
-----------MOSTRAR DETALLES EN STOCK-----------
-----------------------------------------------*/

// Función para mostrar los detalles del producto en el pop-up
function showProductDetails(
  productId,
  productName,
  supplierName,
  supplierId,
  size,
  color,
  stock
) {
  document.getElementById("popupProductId").textContent = productId;
  document.getElementById("popupProductName").textContent = productName;
  document.getElementById("popupSupplierName").textContent = supplierName;
  document.getElementById("popupSupplierId").textContent = supplierId;
  document.getElementById("popupSize").textContent = size;
  document.getElementById("popupColor").textContent = color;
  document.getElementById("popupStock").textContent = stock;

  // Mostrar el pop-up
  document.getElementById("productDetailPopup").style.display = "block";
}

// Función para cerrar el pop-up
function closeDetailPopup() {
  document.getElementById("productDetailPopup").style.display = "none";
}
// Configura las clases de color para cada tarjeta según el stock
document.querySelectorAll(".card").forEach((card) => {
  const stockText = card.querySelector("p:nth-child(2)").textContent;
  const stock = parseInt(stockText.split(": ")[1], 10);

  if (stock < 10) {
    card.classList.add("low-stock");
  } else if (stock >= 10 && stock <= 20) {
    card.classList.add("medium-stock");
  } else if(stock > 20) {
    card.classList.add("high-stock");
  }
});