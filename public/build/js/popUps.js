document.addEventListener("DOMContentLoaded", () => {
  const addSupplierBtn = document.getElementById("addSupplierBtn");
  const supplierPopup = document.getElementById("supplierPopup");
  const supplierForm = document.getElementById("supplierForm");
  const supplierList = document.getElementById("supplierList");

  let editingId = null;

  addSupplierBtn.addEventListener("click", () => {
    editingId = null;
    supplierPopup.style.display = "block";
    supplierForm.reset();
    document.getElementById("popupTitle").textContent = "Agregar Proveedor";
  });

  window.closePopup = () => {
    supplierPopup.style.display = "none";
  };

  function addSupplierRow(name, contact, mail, descr) {
    const id = supplierList.rows.length + 1;
    const newRow = supplierList.insertRow();
    newRow.dataset.id = id;

    newRow.innerHTML = `
      <td>${id}</td>
      <td>${name}</td>
      <td>${contact}</td>
      <td>${mail}</td>
      <td style="display:none;">${descr}</td>
    `;

    newRow.addEventListener("click", () => {
      openDetailPopup(id, name, contact, mail, descr);
    });
  }

  function updateSupplierRow(id, name, contact, mail, descr) {
    const rows = supplierList.rows;
    for (let i = 0; i < rows.length; i++) {
      if (rows[i].cells[0].innerText == id) {
        rows[i].cells[1].innerText = name;
        rows[i].cells[2].innerText = contact;
        rows[i].cells[3].innerText = mail;
        rows[i].cells[4].innerText = descr;
        break;
      }
    }
  }

  const supplierDetailPopup = document.getElementById("supplierDetailPopup");

  function openDetailPopup(id, name, contact, mail, descr) {
    document.getElementById("popupId").textContent = `ID: ${id}`;
    document.getElementById("popupName").textContent = `Nombre: ${name}`;
    document.getElementById("popupContact").textContent = `Teléfono: ${contact}`;
    document.getElementById("popupMail").textContent = `Correo: ${mail}`;
    document.getElementById("popupDescr").textContent = `Descripción: ${descr}`;
    supplierDetailPopup.style.display = "block";
    supplierDetailPopup.dataset.currentId = id;
  }

  window.closeDetailPopup = () => {
    supplierDetailPopup.style.display = "none";
  };

  window.editSupplier = () => {
    const id = supplierDetailPopup.dataset.currentId;
    if (!id) return;

    const row = [...supplierList.rows].find((r) => r.cells[0].innerText === id);
    if (!row) return;

    editingId = id;
    document.getElementById("supplierName").value = row.cells[1].innerText;
    document.getElementById("supplierContact").value = row.cells[2].innerText;
    document.getElementById("supplierMail").value = row.cells[3].innerText;
    document.getElementById("supplierDescription").value = row.cells[4].innerText;

    document.getElementById("popupTitle").textContent = "Editar Proveedor";
    supplierPopup.style.display = "block";
    supplierDetailPopup.style.display = "none";
  };

  // ✅ Eliminar proveedor con AJAX
  window.deleteSupplier = async () => {
    const id = supplierDetailPopup.dataset.currentId;
    if (!id) return;

    if (confirm("¿Estás seguro de eliminar este proveedor?")) {
      try {
        const response = await fetch("/api/proveedores/eliminar", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ id }),
        });

        const result = await response.json();

        if (result.success) {
          alert("Proveedor eliminado correctamente");
          supplierDetailPopup.style.display = "none";
          location.reload(); // o actualiza tabla manualmente si prefieres
        } else {
          alert("Error al eliminar: " + (result.message || "Fallo en el servidor"));
        }
      } catch (err) {
        console.error("Error al eliminar proveedor:", err);
        alert("No se pudo eliminar el proveedor.");
      }
    }
  };

  // Añadir eventos click a filas existentes
  for (let i = 1; i < supplierList.rows.length; i++) {
    const row = supplierList.rows[i];
    row.addEventListener("click", () => {
      const id = row.cells[0].innerText;
      const name = row.cells[1].innerText;
      const contact = row.cells[2].innerText;
      const mail = row.cells[3].innerText;
      const descr = row.cells[4].innerText;
      openDetailPopup(id, name, contact, mail, descr);
    });
  }
});

/* PRODUCTOS DETALLE - STOCK */
function showProductDetails(productId, productName, supplierName, supplierId, size, color, stock) {
  document.getElementById("popupProductId").textContent = productId;
  document.getElementById("popupProductName").textContent = productName;
  document.getElementById("popupSupplierName").textContent = supplierName;
  document.getElementById("popupSupplierId").textContent = supplierId;
  document.getElementById("popupSize").textContent = size;
  document.getElementById("popupColor").textContent = color;
  document.getElementById("popupStock").textContent = stock;
  document.getElementById("productDetailPopup").style.display = "block";
}

function closeDetailPopup() {
  document.getElementById("productDetailPopup").style.display = "none";
}

document.querySelectorAll(".card").forEach((card) => {
  const stockText = card.querySelector("p:nth-child(2)").textContent;
  const stock = parseInt(stockText.split(": ")[1], 10);
  if (stock < 10) {
    card.classList.add("low-stock");
  } else if (stock <= 20) {
    card.classList.add("medium-stock");
  } else {
    card.classList.add("high-stock");
  }
});