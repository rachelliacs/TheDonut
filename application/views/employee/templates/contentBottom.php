</div>
</div>
</section>
<script>
    var products = <?php echo json_encode($products); ?>;
</script>

<script>
    function searchProducts(products) {

        // Get the search query entered by the user
        const searchQuery = document.getElementById('productSearch').value.trim().toLowerCase();

        // If the search query is empty, display all products
        if (searchQuery === '') {
            // Show all products in the table (assuming products are stored in a JavaScript array)
            displayAllProducts();
            return;
        }

        // Filter products based on the search query
        const filteredProducts = products.filter(product => {
            // You can customize the search criteria based on your product data structure
            return product.productName.toLowerCase().includes(searchQuery);
        });

        // Update the product table with the filtered products
        updateProductTable(filteredProducts);
    }

    function displayAllProducts() {
        // Show all products in the table
        updateProductTable(products);
    }

    function updateProductTable(products) {
        const selectedProducts = document.getElementById('selectedProducts');

        // Clear the existing table rows
        selectedProducts.innerHTML = '';

        // Populate the table with the filtered products
        products.forEach(product => {
            const row = document.createElement('tr');
            row.innerHTML = `
            <td class="align-middle">${product.productID}</td>
            <td class="align-middle">${product.productName}</td>
            <td class="align-middle">${product.productStock}</td>
            <td class="align-middle">${(product.productSellingPrice * 1).toFixed(3)
                } IDR   </td >
        <td class="align-middle"><button onclick="addProductToOrder('${product.productID}', '${product.productName}')">Add</button></td>
        `;
            selectedProducts.appendChild(row);
        });
    }

    function getProductPrice(productID) {
        // Make an AJAX request to fetch the product price from the server
        // Replace 'your_backend_endpoint' with the actual endpoint on your server to retrieve the product price
        // Make sure your backend returns the price in the response
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `employee / orderManual ? productID = ${productID}`);
            xhr.onload = () => {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    const productPrice = response.price; // Assuming the response contains the product price
                    resolve(productPrice);
                } else {
                    reject('Error retrieving product price');
                }
            };
            xhr.onerror = () => {
                reject('Error retrieving product price');
            };
            xhr.send();
        });
    }

    function addProductToOrder(productID, productName) {
        // Check if the product is already in the list
        if (!document.getElementById(`quantity_${productID}`)) {
            // Add the selected product to the target table below
            const targetTable = document.getElementById('customerPicks');
            const targetRow = targetTable.insertRow();
            const productSellingPrice = getProductPrice(productID);
            targetRow.innerHTML = `
            <td class= "align-middle"> ${productID}</td>
            <td class="align-middle">${productName}</td>
            <td class="align-middle"><input type="number" id="quantity_${productID}_target" value="1" min="1"></td>
            <td class="align-middle">${(productSellingPrice * 1).toFixed(3)} IDR</td>
            <td class="align-middle"><button onclick="removeProduct('${productID}')">Remove</button></td>
        `;
        }
    }

    function removeProduct(productID) {
        // Remove the selected product from the "Customer Picks" table
        const row = document.getElementById(`quantity_${productID}_target`).parentNode.parentNode;
        row.parentNode.removeChild(row);
        updateTotalAmount();
    }

    function updateTotalAmount() {
        // Calculate and update the total amount
        const rows = document.getElementById('customerPicks').getElementsByTagName('tr');
        let totalAmount = 0;
        for (let i = 0; i < rows.length; i++) {
            const quantity = parseInt(rows[i].getElementsByTagName('input')[0].value, 10);
            const productID = rows[i].getElementsByTagName('td')[0].textContent; // Get the product ID
            const productPrice = getProductPrice(productID); // Get the price of the product
            totalAmount += quantity * productPrice;
        }
        document.getElementById('totalAmount').textContent = totalAmount.toFixed(2); // Display the total amount with 2 decimal places
    }

    function submitOrder() {
        // Implement logic to submit the order with selected products and quantities
        // This may involve sending an AJAX request to the server
        // Display success/failure message to the user
    }
</script>
<script>
    // DELETES
    function confirmDeleteUser(userID) {
        if (confirm('Are you sure you want to delete this user?')) {
            // If user confirms, submit the form with the userID
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '<?php echo base_url('admin/userdata/delete'); ?>';
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'userID';
            input.value = userID;
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    }
    function confirmDeleteProduct(productID) {
        if (confirm('Are you sure you want to delete this product?')) {
            // If user confirms, submit the form with the productID
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '<?php echo base_url('admin/productdata/delete'); ?>';
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'productID';
            input.value = productID;
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    }
    function confirmDeleteProductCategory(productCategoryID) {
        if (confirm('Are you sure you want to delete this product category?')) {
            // If user confirms, submit the form with the productCategoryID
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '<?php echo base_url('admin/productcategory/delete'); ?>';
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'productCategoryID';
            input.value = productCategoryID;
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    }
    function confirmDeleteOrder(orderID) {
        if (confirm('Are you sure you want to delete this order?')) {
            // If user confirms, submit the form with the orderID
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '<?php echo base_url('employee/orderdata/delete'); ?>';
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'orderID';
            input.value = orderID;
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    }
    // EDITS
    // Event listener for edit button click
    $('.edit-btn').click(function () {
        // Get data from the clicked edit button
        var productImage = $(this).data('productimage');
        $('#productimage').attr('src', productImage); // Set image source

        var userID = $(this).data('userid');
        var userName = $(this).data('username');
        var userStatus = $(this).data('userstatus');
        var userEmail = $(this).data('useremail');
        var userPhone = $(this).data('userphone');
        var userPassword = $(this).data('userpassword');
        var storeID = $(this).data('storeid');
        var storeName = $(this).data('storename');
        var storeLogo = $(this).data('storelogo');
        var storeDesc = $(this).data('storedesc');
        var productID = $(this).data('productid');
        var productName = $(this).data('productname');
        var productDesc = $(this).data('productdesc');
        var productStock = $(this).data('productstock');
        var productPrice = $(this).data('productprice');
        var productSellingPrice = $(this).data('productsellingprice');
        var productCategoryID = $(this).data('productcategoryid');
        var productCategoryName = $(this).data('productcategoryname');
        var orderID = $(this).data('orderid');
        var orderMethod = $(this).data('ordermethod');
        var orderStatus = $(this).data('orderstatus');

        // Set data to the form fields
        $('#userid').val(userID);
        $('#username').val(userName);
        $('#userstatus').val(userStatus);
        $('#useremail').val(userEmail);
        $('#userphone').val(userPhone);
        $('#userpassword').val(userPassword);
        $('#storeid').val(storeID);
        $('#storename').val(storeName);
        $('#storelogo').val(storeLogo);
        $('#storedesc').val(storeDesc);
        $('#productid').val(productID);
        $('#productname').val(productName);
        $('#productdesc').val(productDesc);
        $('#productstock').val(productStock);
        $('#productprice').val(productPrice);
        $('#productsellingprice').val(productSellingPrice);
        $('#productcategoryid').val(productCategoryID);
        $('#productcategoryname').val(productCategoryName);
        $('#orderid').val(orderID);
        $('#ordermethod').val(orderMethod);
        $('#orderstatus').val(orderStatus);

        // Show the popup form
        $('#edit-popup').show();
    });

    $('.add-btn').click(function () {
        // Show the popup form
        $('#add-popup').show();
    });

    // Event listener for close button click
    $('#close-edit-popup').click(function () {
        // Hide the popup form
        $('#edit-popup').hide();
    });

    // Event listener for close button click
    $('#close-add-popup').click(function () {
        // Hide the popup form
        $('#add-popup').hide();
    });
</script>

<script>
    document.querySelector('.dropdown-toggle').addEventListener('click', function () {
        document.querySelector('.dropdown-menu').classList.toggle('show');
    });
</script>

<!-- Local JS -->
<!-- <script src="<?= base_url(); ?>application/assets/js/script.js"></script> -->
<script src="<?= base_url(); ?>templates/Ultras/js/jquery-1.11.0.min.js"></script>
<script src="<?= base_url(); ?>templates/Ultras/js/plugins.js"></script>
<script src="<?= base_url(); ?>templates/Ultras/js/script.js"></script>

<!-- Online JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>