</div>
</div>
</section>
<script>
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
</script>