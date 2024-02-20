</div>
</div>
</section>
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
            form.action = '<?php echo base_url('admin/orderdata/delete'); ?>';
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