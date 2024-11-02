<div class="main-content">
<h1>Stock</h1>
    <section class="dashboard">
        <h3>Aministrar Lista de Stock</h3>
        <div class="stock-card-container" id="stockCardContainer">
            <div class="card stock-card"
                onclick="showProductDetails(1, 'Camiseta Básica', 'Tienda de Ropa XYZ', 301, 'M', 'Negro', 25)">
                <h3>Camiseta Básica</h3>
                <p>Stock: 25</p>
                <p>Talla: M</p>
                <p>Color: Negro</p>
            </div>
            <div class="card stock-card"
                onclick="showProductDetails(2, 'Pantalón Jeans', 'Tienda de Ropa XYZ', 302, 'L', 'Azul', 12)">
                <h3>Pantalón Jeans</h3>
                <p>Stock: 12</p>
                <p>Talla: L</p>
                <p>Color: Azul</p>
            </div>
            <div class="card stock-card"
                onclick="showProductDetails(3, 'Chaqueta de Cuero', 'Tienda de Ropa XYZ', 303, 'S', 'Marrón', 8)">
                <h3>Chaqueta de Cuero</h3>
                <p>Stock: 8</p>
                <p>Talla: S</p>
                <p>Color: Marrón</p>
            </div>
            <div class="card stock-card"
                onclick="showProductDetails(4, 'Sudadera con Capucha', 'Tienda de Ropa XYZ', 304, 'XL', 'Gris', 20)">
                <h3>Sudadera con Capucha</h3>
                <p>Stock: 20</p>
                <p>Talla: XL</p>
                <p>Color: Gris</p>
            </div>
            <div class="card stock-card"
                onclick="showProductDetails(5, 'Camisa de Vestir', 'Tienda de Ropa XYZ', 305, 'L', 'Blanco', 15)">
                <h3>Camisa de Vestir</h3>
                <p>Stock: 15</p>
                <p>Talla: L</p>
                <p>Color: Blanco</p>
            </div>
            <div class="card stock-card"
                onclick="showProductDetails(6, 'Pantalón Corto', 'Tienda de Ropa XYZ', 306, 'M', 'Negro', 18)">
                <h3>Pantalón Corto</h3>
                <p>Stock: 18</p>
                <p>Talla: M</p>
                <p>Color: Negro</p>
            </div>
            <div class="card stock-card"
                onclick="showProductDetails(7, 'Abrigo de Invierno', 'Tienda de Ropa XYZ', 307, 'L', 'Rojo', 10)">
                <h3>Abrigo de Invierno</h3>
                <p>Stock: 10</p>
                <p>Talla: L</p>
                <p>Color: Rojo</p>
            </div>
            <div class="card stock-card"
                onclick="showProductDetails(8, 'Vestido de Verano', 'Tienda de Ropa XYZ', 308, 'S', 'Floral', 5)">
                <h3>Vestido de Verano</h3>
                <p>Stock: 5</p>
                <p>Talla: S</p>
                <p>Color: Floral</p>
            </div>
            <div class="card stock-card"
                onclick="showProductDetails(9, 'Buzo de Algodón', 'Tienda de Ropa XYZ', 309, 'M', 'Azul', 22)">
                <h3>Buzo de Algodón</h3>
                <p>Stock: 22</p>
                <p>Talla: M</p>
                <p>Color: Azul</p>
            </div>
            <div class="card stock-card"
                onclick="showProductDetails(10, 'Falda Larga', 'Tienda de Ropa XYZ', 310, 'M', 'Negro', 14)">
                <h3>Falda Larga</h3>
                <p>Stock: 14</p>
                <p>Talla: M</p>
                <p>Color: Negro</p>
            </div>
            <div class="card stock-card"
                onclick="showProductDetails(11, 'Camisa Casual', 'Tienda de Ropa XYZ', 311, 'S', 'Verde', 30)">
                <h3>Camisa Casual</h3>
                <p>Stock: 30</p>
                <p>Talla: S</p>
                <p>Color: Verde</p>
            </div>
            <div class="card stock-card"
                onclick="showProductDetails(12, 'Pantalón Cargo', 'Tienda de Ropa XYZ', 312, 'L', 'Caqui', 19)">
                <h3>Pantalón Cargo</h3>
                <p>Stock: 19</p>
                <p>Talla: L</p>
                <p>Color: Caqui</p>
            </div>
            <div class="card stock-card"
                onclick="showProductDetails(13, 'Chaqueta de Deportivo', 'Tienda de Ropa XYZ', 313, 'XL', 'Negro', 7)">
                <h3>Chaqueta de Deportivo</h3>
                <p>Stock: 7</p>
                <p>Talla: XL</p>
                <p>Color: Negro</p>
            </div>
            <div class="card stock-card"
                onclick="showProductDetails(14, 'Pantalón de Chándal', 'Tienda de Ropa XYZ', 314, 'M', 'Gris', 13)">
                <h3>Pantalón de Chándal</h3>
                <p>Stock: 13</p>
                <p>Talla: M</p>
                <p>Color: Gris</p>
            </div>
            <div class="card stock-card"
                onclick="showProductDetails(15, 'Top Deportivo', 'Tienda de Ropa XYZ', 315, 'S', 'Rosa', 11)">
                <h3>Top Deportivo</h3>
                <p>Stock: 11</p>
                <p>Talla: S</p>
                <p>Color: Rosa</p>
            </div>

        </div>

    </section>

    <!-- Pop-up de detalles del producto -->
    <div id="productDetailPopup" class="popup">
        <div class="popup-content">
            <div class="popup-header">
                <span class="close" onclick="closeDetailPopup()">&times;</span>
            </div>
            <div class="popup-body">
                <h2>Detalles del Producto</h2>
                <p><strong>ID del Producto:</strong> <span id="popupProductId"></span></p>
                <p><strong>Nombre del Producto:</strong> <span id="popupProductName"></span></p>
                <p><strong>Nombre del Proveedor:</strong> <span id="popupSupplierName"></span></p>
                <p><strong>ID del Proveedor:</strong> <span id="popupSupplierId"></span></p>
                <p><strong>Stock:</strong> <span id="popupStock"></span></p>
                <p><strong>Talla:</strong> <span id="popupSize"></span></p>
                <p><strong>Color:</strong> <span id="popupColor"></span></p>
            </div>
        </div>
    </div>
</div>
<script src="/build/js/script.js"></script>