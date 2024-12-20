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
-----------MOSTRAR DETALLES EN STOCK-----------
-----------------------------------------------
-----------ESTO TAMBIEN ES UN POP-UP-----------*/

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
    } else if (stock > 20) {
      card.classList.add("high-stock");
    }
  });