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
