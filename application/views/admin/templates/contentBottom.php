</div>
</div>
</section>
<script>
    $(document).ready(function () {
        $('#salesfilter').change(function () {
            var month = $(this).val();
            $.ajax({
                url: '<?php echo base_url('admin/salesList/filter'); ?>',
                type: 'post',
                data: { month: month },
                success: function (response) {
                    $('#salesTable tbody').html(response);
                }
            });
        });

        $('#printButton').click(function () {
            // Logic to print sales list
        });
    });
</script>
<script>
    // JavaScript function to trigger PDF download
    function printSales() {
        var selectedMonth = document.getElementById('salesfilter').value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'controller/generatePDF', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.responseType = 'blob'; // Set response type to blob
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var blob = new Blob([xhr.response], { type: 'application/pdf' });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'sales_report.pdf';
                link.click();
            }
        };
        xhr.send('salesfilter=' + selectedMonth);
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

<script>
    document.querySelector('.dropdown-toggle').addEventListener('click', function () {
        document.querySelector('.dropdown-menu').classList.toggle('show');
    });
</script>

<!-- Local JS -->
<script src="<?= base_url(); ?>templates/Ultras/js/jquery-1.11.0.min.js"></script>
<script src="<?= base_url(); ?>templates/Ultras/js/plugins.js"></script>
<script src="<?= base_url(); ?>templates/Ultras/js/script.js"></script>
<!-- Online JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>