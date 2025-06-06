document.addEventListener("DOMContentLoaded", () => {
  const supplierList = document.getElementById("supplierList");
  const supplierForm = document.getElementById("supplierForm");
  const supplierPopup = document.getElementById("supplierPopup");
  const addSupplierBtn = document.getElementById("addSupplierBtn");

  const supplierDetailPopup = document.getElementById("supplierDetailPopup");

  let idProveedorEditando = null;
  let proveedorActual = null; // proveedor mostrado en el popup de detalles

  async function loadSuppliers() {
    try {
      const response = await fetch("/api/proveedores/listar");
      if (!response.ok) throw new Error(`HTTP ${response.status}`);

      const data = await response.json();
      supplierList.innerHTML = "";

      data.forEach((supplier) => {
        const row = document.createElement("tr");
        row.innerHTML = `
          <td>${supplier.id}</td>
          <td>${supplier.nombre}</td>
          <td>${supplier.telefono}</td>
          <td>${supplier.email}</td>
          <td>${supplier.descripcion}</td>
          <td>${supplier.direccion}</td>
        `;

        row.addEventListener("click", () => {
          proveedorActual = supplier; // guardamos el proveedor actual
          openDetailPopup(supplier);
        });

        supplierList.appendChild(row);
      });
    } catch (error) {
      console.error("Error cargando proveedores:", error.message);
    }
  }

  function openDetailPopup(supplier) {
    document.getElementById("popupId").textContent = `ID: ${supplier.id}`;
    document.getElementById(
      "popupName"
    ).textContent = `Nombre: ${supplier.nombre}`;
    document.getElementById(
      "popupContact"
    ).textContent = `Teléfono: ${supplier.telefono}`;
    document.getElementById(
      "popupMail"
    ).textContent = `Correo: ${supplier.email}`;
    document.getElementById(
      "popupDescr"
    ).textContent = `Descripción: ${supplier.descripcion}`;
    document.getElementById(
      "popupAddress"
    ).textContent = `Dirección: ${supplier.direccion}`;

    supplierDetailPopup.style.display = "block";
  }

  window.closeDetailPopup = () => {
    supplierDetailPopup.style.display = "none";
  };

  window.editSupplier = () => {
    if (!proveedorActual) return;
    idProveedorEditando = proveedorActual.id;

    supplierForm.elements["supplierName"].value = proveedorActual.nombre;
    supplierForm.elements["supplierContact"].value = proveedorActual.telefono;
    supplierForm.elements["supplierMail"].value = proveedorActual.email;
    supplierForm.elements["supplierDescription"].value =
      proveedorActual.descripcion;
    supplierForm.elements["supplierAddress"].value = proveedorActual.direccion;

    supplierPopup.style.display = "block";
    supplierDetailPopup.style.display = "none";
  };

  window.deleteSupplier = async () => {
    if (!proveedorActual) return;

    if (confirm("¿Estás seguro de eliminar este proveedor?")) {
      try {
        const response = await fetch("/api/proveedores/eliminar", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ id: proveedorActual.id }),
        });

        if (!response.ok) throw new Error(`HTTP ${response.status}`);

        const result = await response.json();
        if (result.success) {
          alert("Proveedor eliminado correctamente");
          supplierDetailPopup.style.display = "none";
          loadSuppliers();
        } else {
          alert("Error al eliminar proveedor: " + result.message);
        }
      } catch (error) {
        console.error("Error al eliminar proveedor:", error.message);
      }
    }
  };

  supplierForm.addEventListener("submit", async (e) => {
    e.preventDefault(); // evita que se recargue la página

    const formData = new FormData(supplierForm);

    const supplierData = {
      nombre: formData.get("supplierName"),
      telefono: formData.get("supplierContact"),
      email: formData.get("supplierMail"),
      descripcion: formData.get("supplierDescription"),
      direccion: formData.get("supplierAddress"),
    };

    let url = "/api/proveedores/crear";
    if (idProveedorEditando) {
      supplierData.id = idProveedorEditando;
      url = "/api/proveedores/actualizar";
    }

    try {
      const response = await fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(supplierData),
      });

      if (!response.ok) throw new Error(`HTTP ${response.status}`);

      const result = await response.json();

      if (result.success) {
        alert(
          idProveedorEditando ? "Proveedor actualizado" : "Proveedor agregado"
        );
        supplierForm.reset();
        supplierPopup.style.display = "none";
        idProveedorEditando = null;
        loadSuppliers();
      } else {
        alert("Error: " + result.message);
      }
    } catch (error) {
      console.error("Error en agregar/actualizar proveedor:", error.message);
    }
  });

  addSupplierBtn.addEventListener("click", () => {
    idProveedorEditando = null;
    supplierForm.reset();
    supplierPopup.style.display = "block";
  });

  loadSuppliers();
});
