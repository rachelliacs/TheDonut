<div class="admin-list">
    <div class="card-header">
        <h4>Add New Order</h4>
    </div>
    <div class="form-input">
        <label for="productSearch">Search Product:</label>
        <input type="text" id="productSearch" oninput="searchProducts(products)">
    </div>

    <table id="productTable" class="table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="selectedProducts"></tbody>
    </table>

    <table id="customerPicksTable" class="table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Qtity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="customerPicks"></tbody>
    </table>

    <div>
        <label>Total Amount:</label>
        <span id="totalAmount">0</span>
    </div>

    <button onclick="submitOrder()">Submit Order</button>
</div>
</div>