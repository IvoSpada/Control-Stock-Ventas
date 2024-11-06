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
    